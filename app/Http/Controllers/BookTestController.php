<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;

class BookTestController extends Controller
{
    // Get all books with authors
    public function index()
    {
        $books = BookModel::with('author')->get();

        return response()->json([
            'message' => 'Books retrieved successfully.',
            'data' => $books,
        ]);
    }

    // Store new book with validation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_id' => 'required|uuid|exists:authors,id',
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'publication_year' => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
            'genre' => 'required|string|max:100',
            'available_copies' => 'required|integer|min:0',
        ]);

        $book = BookModel::create($validated);

        return response()->json([
            'message' => 'Book created successfully.',
            'data' => $book,
        ], 201);
    }

    // Get a single book by ID with author
    public function show($id)
    {
        $book = BookModel::with('author')->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        return response()->json([
            'message' => 'Book retrieved successfully.',
            'data' => $book,
        ]);
    }

    // Update book with validation
    public function update(Request $request, $id)
    {
        $book = BookModel::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        $validated = $request->validate([
            'author_id' => 'sometimes|required|uuid|exists:authors,id',
            'title' => 'sometimes|required|string|max:255',
            'isbn' => 'sometimes|required|string|unique:books,isbn,' . $book->id,
            'publication_year' => 'sometimes|required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
            'genre' => 'sometimes|required|string|max:100',
            'available_copies' => 'sometimes|required|integer|min:0',
        ]);

        $book->update($validated);

        return response()->json([
            'message' => 'Book updated successfully.',
            'data' => $book,
        ]);
    }

    // Delete book
    public function destroy($id)
    {
        $book = BookModel::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully.',
        ]);
    }
}
