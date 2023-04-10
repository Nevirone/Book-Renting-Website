<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;

class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = \Auth::user()->id;
        $borrows = Borrow::where('user_id', $user_id)->get();
        $books = [];
        $borrow_ids = [];
        foreach($borrows as $borrow) {
            $book = Book::find($borrow->book_id);
            array_push($books, $book);
            array_push($borrow_ids, $borrow->id);
        }
        
        return view('dashboard', ['books' => $books, 'borrow_ids' => $borrow_ids]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($book_id)
    {
        if (\Auth::user() == null) {
            return view('welcome');
        }

        $lending = new Borrow();
        $book = Book::find($book_id);

        $lending->user_id = \Auth::user()->id;
        $lending->book_id = $book_id;

        if($lending->save()) {
            $book->amount = $book->amount - 1;
            
            if($book->save()) {
                return redirect('books');
            }
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
        
        $lending = Borrow::find($id);
        $book = Book::find($lending->book_id);
        if($lending->delete()) {

            $amount = $book->amount;
            $amount = $amount + 1;

            $book->amount = $amount; 
            if($book->save()) {
                return redirect('dashboard');
            }
        }
        return view('dashboard');
    }
}
