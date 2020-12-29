<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $table = "books";
    public $priamry_key = "id";
    public $fillable = [
    	'name',
        'image',
        'isbn',
        'author',
        'publisher',
        'publish_year',
        'category_id',
    ];
    public $dates = ['created_at', 'updated_at'];

    public function Category() {
        return $this->belongsTo(Category::class);
    }
}
