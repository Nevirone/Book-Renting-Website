<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'asc')->get();
        return view('books/books', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book;
        return view('books/bookForm', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user() == null) {
            return view('welcome');
        }
        
        if (\Auth::user()->isAdmin() == false) {
            return view('welcome');
        }

        $this->validate($request, [
            'amount' => 'integer',
            'title' => 'required|min:5|max:50',
            'author' => 'required|min:3|max:55',
            'genre' => 'required|min:3|max:15',
            'cost' => 'required|decimal:0,2',
        ]);

        $book = new Book();
        $book->amount = $request->amount;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->cost = $request->cost * 100;

        if($book->save()) {
            return redirect('books');
        }

        return view('books/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::user() == null) {
            return view('welcome');
        }
        
        if (\Auth::user()->isAdmin() == false) {
            return view('welcome');
        }

        $book = Book::find($id);
        if($book->delete()) {
            return redirect('books');
        }
        return view('books/books');
    }
}
