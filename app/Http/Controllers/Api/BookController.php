<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return Book::with('author')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_id'     => 'required|exists:authors,id',
            'title'         => 'required|string|max:255',
            'isbn'          => 'required|unique:books',
            'published_year' => 'required|integer|min:1900|max:' . date('Y')
        ]);

        return Book::create($validated);
    }

    public function show($id)
    {
        return Book::with('author')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'author_id'     => 'required|exists:authors,id',
            'title'         => 'required|string|max:255',
            'isbn'          => 'required|unique:books,isbn,' . $id,
            'published_year' => 'required|integer|min:1900|max:' . date('Y')
        ]);

        $book->update($validated);

        return $book;
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
}
