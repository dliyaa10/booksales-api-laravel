<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    // READ ALL: khusus admin
    public function index(): JsonResponse
    {
        $transactions = Transaction::with(['user', 'book'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Data transaksi berhasil diambil',
            'data' => $transactions,
        ], 200);
    }

    // CREATE: customer yang login
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'book_id' => 'required|integer|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = $request->user();

        $transaction = DB::transaction(function () use ($validated, $user) {
            $book = Book::whereKey($validated['book_id'])
                ->lockForUpdate()
                ->firstOrFail();

            $quantity = (int) $validated['quantity'];

            if ($book->stock < $quantity) {
                throw new \RuntimeException('Stok buku tidak mencukupi');
            }

            $totalAmount = $book->price * $quantity;

            $book->decrement('stock', $quantity);

            return Transaction::create([
                'order_number' => 'ORD-' . strtoupper(Str::random(12)),
                'customer_id' => $user->id,
                'book_id' => $book->id,
                'quantity' => $quantity,
                'total_amount' => $totalAmount,
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaction->load(['user', 'book']),
        ], 201);
    }

    // SHOW: hanya pemilik transaksi
    public function show(Request $request, string $id): JsonResponse
    {
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        if ($transaction->customer_id != $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses ke transaksi ini',
            ], 403);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data transaksi berhasil diambil',
            'data' => $transaction,
        ], 200);
    }

    // UPDATE: hanya pemilik transaksi
    public function update(Request $request, string $id): JsonResponse
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        if ($transaction->customer_id != $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses ke transaksi ini',
            ], 403);
        }

        $validated = $request->validate([
            'book_id' => 'required|integer|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated, $transaction) {
            $oldBook = Book::whereKey($transaction->book_id)
                ->lockForUpdate()
                ->firstOrFail();

            $newBook = Book::whereKey($validated['book_id'])
                ->lockForUpdate()
                ->firstOrFail();

            $quantity = (int) $validated['quantity'];

            // Kembalikan stok transaksi sebelumnya
            $oldBook->increment('stock', $transaction->quantity);

            // Cek stok setelah stok lama dikembalikan
            $newBook->refresh();

            if ($newBook->stock < $quantity) {
                throw new \RuntimeException('Stok buku tidak mencukupi');
            }

            // Kurangi stok untuk transaksi yang baru
            $newBook->decrement('stock', $quantity);

            $transaction->update([
                'book_id' => $newBook->id,
                'quantity' => $quantity,
                'total_amount' => $newBook->price * $quantity,
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui',
            'data' => $transaction->fresh()->load(['user', 'book']),
        ], 200);
    }

    // DESTROY: khusus admin
    public function destroy(string $id): JsonResponse
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        DB::transaction(function () use ($transaction) {
            $book = Book::whereKey($transaction->book_id)
                ->lockForUpdate()
                ->first();

            if ($book) {
                $book->increment('stock', $transaction->quantity);
            }

            $transaction->delete();
        });

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dihapus',
        ], 200);
    }
}
