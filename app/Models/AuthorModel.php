<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AuthorModel extends Model
{
    use HasFactory;

    protected $table = 'authors';        // Optional if class name matches table
    protected $primaryKey = 'id';        // Optional, Laravel defaults to 'id'
    public $incrementing = false;        // UUIDs are not auto-increment
    protected $keyType = 'string';       // UUIDs are strings

    protected $fillable = [
        'id',
        'name',
        'bio',
        'nationality',
    ];

    // Automatically assign UUID when creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // Relationships
    public function books()
    {
        return $this->hasMany(BookModel::class, 'author_id', 'id');
    }
}
