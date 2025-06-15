<?php

namespace App\Http\Controllers;

use App\Models\AuthorModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $authors = [
            [
                'id' => 1,
                'name' => 'F. Scott Fitzgerald',
                'bio' => 'American novelist and short story writer, known for The Great Gatsby.',
                'nationality' => 'American',
            ],
            [
                'id' => 2,
                'name' => 'Harper Lee',
                'bio' => 'American novelist best known for To Kill a Mockingbird.',
                'nationality' => 'American',
            ],
            [
                'id' => 3,
                'name' => 'George Orwell',
                'bio' => 'English novelist, essayist, journalist, and critic.',
                'nationality' => 'British',
            ],
            [
                'id' => 4,
                'name' => 'Robert C. Martin',
                'bio' => 'Software engineer and author known for Clean Code.',
                'nationality' => 'American',
            ],
            [
                'id' => 5,
                'name' => 'Andrew Hunt',
                'bio' => 'Computer programmer and co-author of The Pragmatic Programmer.',
                'nationality' => 'American',
            ],
            [
                'id' => 6,
                'name' => 'David Thomas',
                'bio' => 'Programmer and co-author of The Pragmatic Programmer.',
                'nationality' => 'American',
            ],
        ];

    public function index()
    {
        //
         return response()->json([
                'message' => 'Get Data authors successful.',
                'data' => $this->authors
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

         // Validate input
                $validated = $request->validate([
                    'name' => 'required|string',
                    'bio' => 'nullable|string',
                    'nationality' => 'required|string',
                ]);

                // Generate a new ID (auto-increment-like logic)
                $newId = count($this->authors) + 1;

                // Create new book array
                $newAuthors = array_merge($validated, [
                    'id' => $newId,
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ]);

                // Push to array (only in memory, not stored permanently)
                $this->authors[] = $newAuthors;

                // Return response
                return response()->json([
                    'message' => 'Book created (demo only, not saved).',
                    'data' => $newAuthors
                ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AuthorModel $authorModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthorModel $authorModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuthorModel $authorModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthorModel $authorModel)
    {
        //
    }
}
