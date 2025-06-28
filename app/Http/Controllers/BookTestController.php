<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
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
    public function store(StorePostRequest $request)
    {
       
        $book = BookModel::create($request->all() );

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
    public function update(StorePostRequest $request, $id)
    {
        $book = BookModel::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

      

        $book->update($request->all());

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
