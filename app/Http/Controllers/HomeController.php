<?php

namespace App\Http\Controllers;

use App\Models\BookModel; // Import the Book model
use Illuminate\Http\Request; // Import the Request class for handling form data

class HomeController extends Controller
{
    /**
     * Display a list of all books on the home page.
     * This method is triggered when visiting '/' route.
     */
    public function index()
    {
        $books = BookModel::latest()->get(); // Fetch all books sorted by latest
        return view('Home', compact('books')); // Pass the books to Home.blade.php
    }

    /**
     * Show the form to create a new book.
     * This method is triggered when visiting '/create'
     */
    public function create()
    {
        return view('Create'); // Load the form for adding a new book
    }

    /**
     * Store a newly created book from the submitted form.
     * This method handles POST request to '/store'
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'author_id' => 'required|uuid', // Must be a valid UUID
            'title' => 'required|string|max:255', // Required string with max length
            'isbn' => 'required|string|max:20',
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'), // Year must be realistic
            'genre' => 'required|string|max:100',
            'available_copies' => 'required|integer|min:0' // At least 0 copies
        ]);

        // Insert the new book into the database
        BookModel::create($validated);

        // Redirect to home page with success message
        return redirect('/')->with('success', '📚 Book added successfully!');
    }

    /**
     * Show the form to edit an existing book.
     * This is triggered when visiting '/edit/{id}'
     */
    public function edit($id)
    {
        $book = BookModel::findOrFail($id); // Find the book or fail with 404
        return view('Edit', compact('book')); // Send the book data to Edit.blade.php
    }

    /**
     * Update the book after editing.
     * This handles PUT/PATCH request to '/update/{id}'
     */
    public function update(Request $request, $id)
    {
        // Validate the updated form inputs
        $validated = $request->validate([
            'author_id' => 'required|uuid',
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:20',
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:100',
            'available_copies' => 'required|integer|min:0'
        ]);

        // Find the book to be updated
        $book = BookModel::findOrFail($id);
        $book->update($validated); // Update with validated data

        // Redirect to home with success message
        return redirect('/')->with('success', '✅ Book updated successfully!');
    }

    /**
     * Delete the selected book from the database.
     * This handles DELETE request to '/delete/{id}'
     */
    public function destroy($id)
    {
        $book = BookModel::findOrFail($id); // Find the book or return 404
        $book->delete(); // Delete the book record

        // Redirect to home with deletion message
        return redirect('/')->with('success', '🗑️ Book deleted successfully!');
    }
}
