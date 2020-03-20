<?php

namespace App\Policies;
use App\Lease;
use App\Book;
use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any books.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the book.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return mixed
     */
    public function view(User $user, Book $book)
    {
        //
    }

    /**
     * Determine whether the user can create books.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }
    public function canCommenting(User $user,Book $book)
    {
        return Comment::where('user_id' , Auth::id() ) -> where('book_id',$book->id)->exists()? false : true ;
    }
    /**
     * Determine whether the user can update the book.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return mixed
     */
    public function update(User $user, Book $book)
    {
        //
        return $user->id == $book->id;
    }

    /**
     * Determine whether the user can delete the book.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return mixed
     */
    public function delete(User $user, Book $book)
    {
        //
    }
    public function canLease(User $user,Book $book)
    {
        return Lease::where('user_id' , Auth::id() ) -> where('book_id' , $book->id )-> where('deleted_at', null) -> exists()?false : true ;
        // return true;
    }
    public function canReturn(User $user,Book $book)
    {
        return Lease::where('user_id' , Auth::id() ) -> where('book_id' , $book->id )->where('deleted_at', null) -> exists();

    }
    /**
     * Determine whether the user can restore the book.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return mixed
     */
    public function restore(User $user, Book $book)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the book.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return mixed
     */
    public function forceDelete(User $user, Book $book)
    {
        //
    }
}
