<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $authors = Author::all();

        return view('admin', compact('genres', 'authors'));
    }

    public function storeGenre(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Genre::create($validated);

        return redirect('/admin')->with(
            'success', 'Genre berhasil ditambahkan!'
        );
    }

    public function storeAuthor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create($validated);

        return redirect('/admin')->with(
            'success', 'Author berhasil ditambahkan!'
        );
    }
}
