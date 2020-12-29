<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = "categories";
    public $priamry_key = "id";
    public $fillable = [
    	'name',
    	'language'
    ];
    public $dates = ['created_at', 'updated_at'];

    public function Books() {
        return $this->hasMany(Book::class);
    }
}
