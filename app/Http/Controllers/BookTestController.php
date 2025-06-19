<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;

class BookTestController extends Controller
{
    // Get all books
    public function index()
    {
        return response()->json([
            'message' => 'Books retrieved successfully.',
            'data' => BookModel::all(),
        ]);
    }

    // Store new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_id' => 'required|uuid',
            'title' => 'required|string',
            'isbn' => 'required|string|unique:books,isbn',
            'publication_year' => 'required|integer',
            'genre' => 'required|string',
            'available_copies' => 'required|integer',
        ]);

        $book = BookModel::create($validated);

        return response()->json([
            'message' => 'Book created successfully.',
            'data' => $book,
        ], 201);
    }

    // Get a single book by ID
    public function show($id)
    {
        $book = BookModel::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        return response()->json([
            'message' => 'Book retrieved successfully.',
            'data' => $book,
        ]);
    }

    // Update book
    public function update(Request $request, $id)
    {
        $book = BookModel::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        $validated = $request->validate([
            'author_id' => 'sometimes|uuid',
            'title' => 'sometimes|string',
            'isbn' => 'sometimes|string|unique:books,isbn,' . $id,
            'publication_year' => 'sometimes|integer',
            'genre' => 'sometimes|string',
            'available_copies' => 'sometimes|integer',
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
