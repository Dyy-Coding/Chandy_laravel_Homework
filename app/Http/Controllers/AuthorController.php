<?php

namespace App\Http\Controllers;

use App\Models\AuthorModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorPostRequest;
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
    public function create(AuthorPostRequest $request)
    {

                // Generate a new ID (auto-increment-like logic)
                $newId = count($this->authors) + 1;

                // Create new author array
                $newAuthors = array_merge($request->all(), [
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
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         // Search for the author by ID
                foreach ($this->authors as $author) {
                    if ($author['id'] == $id) {
                        return response()->json([
                            'message' => 'Author found.',
                            'data' => $author
                        ]);
                    }
                }

                // If author not found
                return response()->json([
                    'message' => 'Author not found.'
                ], 404);
    }


    /**
     * Update the specified resource in storage.
     */
    // Update the data by $id 
        public function update(Request $request, $id)
                {
                   

                    foreach ($this->authors as &$author) {
                        if ($author['id'] == $id) {
                            // Update only provided fields
                            foreach ($request->all() as $key => $value) {
                                $author[$key] = $value;
                            }
                            $author['updated_at'] = now()->toDateTimeString();

                            return response()->json([
                                'message' => 'Auhtor updated (demo only).',
                                'data' => $author,
                            ]);
                        }
                    }

                    return response()->json([
                        'message' => 'Author not found.',
                    ], 404);
                }

    /**
     * Remove the specified resource from storage.
     */
    // delete data by $id
    public function delete($id)
        {
            foreach ($this->authors as $index => $author) {
                if ($author['id'] == $id) {
                    // Remove author from array
                    array_splice($this->authors, $index, 1);

                    return response()->json([
                        'message' => 'Author deleted (demo only).',
                    ]);
                }
            }

            return response()->json([
                'message' => 'Author not found.',
            ], 404);
        }
}
