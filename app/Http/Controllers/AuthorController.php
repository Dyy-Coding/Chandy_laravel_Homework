<?php

namespace App\Http\Controllers;

use App\Models\AuthorModel;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = AuthorModel::all(); // Get all authors from DB

        return response()->json([
            'message' => 'Get authors successful.',
            'data' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
        ]);

        $author = AuthorModel::create($validated);

        return response()->json([
            'message' => 'Author created successfully.',
            'data' => $author
        ], 201);
    }

    /**
     * Display the specified resource along with the books by the author.
     */
    public function show($id)
    {
        $author = AuthorModel::with('books')->find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found.'
            ], 404);
        }

        return response()->json([
            'message' => 'Author found.',
            'data' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $author = AuthorModel::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found.'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'bio' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
        ]);

        $author->update($validated);

        return response()->json([
            'message' => 'Author updated successfully.',
            'data' => $author,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = AuthorModel::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found.'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'message' => 'Author deleted successfully.'
        ]);
    }
}
