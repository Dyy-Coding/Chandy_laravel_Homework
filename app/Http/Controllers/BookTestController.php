<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;

class BookTestController extends Controller
{
    // GET /api/books


  private $books = [
    [
        'id' => 1,
        'title' => 'The Pragmatic Programmer',
        'author_id' => '123e4567-e89b-12d3-a456-426614174000',
        'isbn' => '9780201616224',
        'publication_year' => 1999,
        'genre' => 'Programming',
        'available_copies' => 10,
        'created_at' => '2025-06-14 18:47:16',
        'updated_at' => '2025-06-14 18:47:16',
    ],
    [
        'id' => 2,
        'title' => 'The Great Gatsby',
        'author_id' => '11111111-1111-1111-1111-111111111111',
        'isbn' => '9780743273565',
        'publication_year' => 1925,
        'genre' => 'Fiction',
        'available_copies' => 5,
        'created_at' => '2025-06-14 18:47:16',
        'updated_at' => '2025-06-14 18:47:16',
    ],
    [
        'id' => 3,
        'title' => 'To Kill a Mockingbird',
        'author_id' => '22222222-2222-2222-2222-222222222222',
        'isbn' => '9780061120084',
        'publication_year' => 1960,
        'genre' => 'Fiction',
        'available_copies' => 3,
        'created_at' => '2025-06-14 18:47:16',
        'updated_at' => '2025-06-14 18:47:16',
    ],
    [
        'id' => 4,
        'title' => '1984',
        'author_id' => '33333333-3333-3333-3333-333333333333',
        'isbn' => '9780451524935',
        'publication_year' => 1949,
        'genre' => 'Dystopian',
        'available_copies' => 4,
        'created_at' => '2025-06-14 18:47:16',
        'updated_at' => '2025-06-14 18:47:16',
    ],
    [
        'id' => 5,
        'title' => 'Clean Code',
        'author_id' => '44444444-4444-4444-4444-444444444444',
        'isbn' => '9780132350884',
        'publication_year' => 2008,
        'genre' => 'Programming',
        'available_copies' => 6,
        'created_at' => '2025-06-14 18:47:16',
        'updated_at' => '2025-06-14 18:47:16',
    ],
];

    // Get all data from books
    public function index()
        {
            return response()->json([
                'message' => 'Get Data successful.',
                'data' => $this->books
            ]);
        }
    

        // Create data 
        public function create(Request $request)
            {
                // Validate input
                $validated = $request->validate([
                    'title' => 'required|string',
                    'author_id' => 'required|uuid',
                    'isbn' => 'required|string',
                    'publication_year' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
                    'genre' => 'required|string',
                    'available_copies' => 'required|integer|min:0',
                ]);

                // Generate a new ID (auto-increment-like logic)
                $newId = count($this->books) + 1;

                // Create new book array
                $newBook = array_merge($validated, [
                    'id' => $newId,
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ]);

                // Push to array (only in memory, not stored permanently)
                $this->books[] = $newBook;

                // Return response
                return response()->json([
                    'message' => 'Book created (demo only, not saved).',
                    'data' => $newBook
                ], 201);
            }
        
        // Show data spaciafic $id 
        public function show($id)
            {
                // Search for the book by ID
                foreach ($this->books as $book) {
                    if ($book['id'] == $id) {
                        return response()->json([
                            'message' => 'Book found.',
                            'data' => $book
                        ]);
                    }
                }

                // If book not found
                return response()->json([
                    'message' => 'Book not found.'
                ], 404);
            }
        
        // Update the data by $id 
        public function update(Request $request, $id)
                {
                    // Validate input
                    $validated = $request->validate([
                        'title' => 'sometimes|string',
                        'author_id' => 'sometimes|uuid',
                        'isbn' => 'sometimes|string',
                        'publication_year' => 'sometimes|digits:4|integer|min:1000|max:' . date('Y'),
                        'genre' => 'sometimes|string',
                        'available_copies' => 'sometimes|integer|min:0',
                    ]);

                    foreach ($this->books as &$book) {
                        if ($book['id'] == $id) {
                            // Update only provided fields
                            foreach ($validated as $key => $value) {
                                $book[$key] = $value;
                            }
                            $book['updated_at'] = now()->toDateTimeString();

                            return response()->json([
                                'message' => 'Book updated (demo only).',
                                'data' => $book,
                            ]);
                        }
                    }

                    return response()->json([
                        'message' => 'Book not found.',
                    ], 404);
                }






}
