<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::with('books')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:authors'
        ]);

        return Author::create($validated);
    }

    public function show($id)
    {
        return Author::with('books')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $id
        ]);

        $author->update($validated);

        return $author;
    }

    public function destroy($id)
    {
        Author::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Author deleted successfully'
        ]);
    }
}
