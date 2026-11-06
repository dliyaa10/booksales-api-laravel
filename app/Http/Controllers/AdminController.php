<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // MENAMPILKAN DASHBOARD
    public function index()
    {
        $genres = Genre::all();
        $authors = Author::all();

        return view('admin', compact('genres', 'authors'));
    }

    // CREATE GENRE
    public function storeGenre(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Genre::create($validated);

        return redirect('/admin#genres')
            ->with('success', 'Genre berhasil ditambahkan!');
    }

    // UPDATE GENRE
    public function updateGenre(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($validated);

        return redirect('/admin#genres')
            ->with('success', 'Genre berhasil diperbarui!');
    }

    // DELETE GENRE
    public function destroyGenre($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect('/admin#genres')
            ->with('success', 'Genre berhasil dihapus!');
    }

    // CREATE AUTHOR
    public function storeAuthor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create($validated);

        return redirect('/admin#authors')
            ->with('success', 'Author berhasil ditambahkan!');
    }

    // UPDATE AUTHOR
    public function updateAuthor(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::findOrFail($id);
        $author->update($validated);

        return redirect('/admin#authors')
            ->with('success', 'Author berhasil diperbarui!');
    }

    // DELETE AUTHOR
    public function destroyAuthor($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect('/admin#authors')
            ->with('success', 'Author berhasil dihapus!');
    }
}