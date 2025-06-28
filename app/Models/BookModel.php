<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'author_id',
        'title',
        'isbn',
        'publication_year',
        'genre',
        'available_copies',
    ];

    // 📌 Relationship: Book belongs to Author
    public function author()
    {
        return $this->belongsTo(AuthorModel::class, 'author_id', 'id');
    }
}
