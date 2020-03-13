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
    
    public function category(){
        return $this->hasOne('App\Category');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    public function usersFavorites(){
        return $this->hasMany(User::class, 'favorites');
    }

    public function usersLease(){
        return $this->hasMany(User::class, 'leases');
    }
}
