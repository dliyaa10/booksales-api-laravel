<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    public function index(): JsonResponse
    {
        $genres = Genre::getData();

        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil diambil',
            'data' => $genres
        ], 200);
    }
}
