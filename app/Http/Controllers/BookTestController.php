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


    public function index()
        {
            return response()->json([
                'message' => 'Get Data successful.',
                'data' => $this->books
            ]);
        }


}
