<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';
    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', '%' .$searchTerm. '%')
                     ->orWhere('author', 'like', '%' .$searchTerm. '%');
    }
}
