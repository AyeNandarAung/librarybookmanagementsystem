<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //All Books In Library
        return Book::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()//Request $request

    {
        
        /*
        $validatedData = $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'genre_id' =>'required',
            'book_status'=>'required'
        ]);*/

        //Adding New Book
        $book = new Book;
        $book->title = request()->title;
        $book->author_name = request()->author_name;
        $book->genre_id = request()->genre_id;// should be real time data like 'romance','thriller'
        $book->book_status = request()->book_status;//Should be Default available
        $book->save();
        
        return $book;
        //return response(['status'=>200,'message'=>'Adding Book']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Book $book
    {
        //Book Details
        $book = Book::find($id);
        $data = [
            "book name" => $book->title,
            "author name" => $book->author_name,
            "book genre" => $book->genre->name

        ];

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)//Request $request, Book $book
    {
        //Update Book's Data
        //
        $book = Book::find($id);

        $title = $request->input("title");
        $author_name = $request->input("author_name");
        $book_status =  $request->input("book_status");
        $genre_id =  $request->input("genre_id");
        $book->title = $title;        
        $book->author_name = $author_name;
        $book->book_status = $book_status;
        $book->genre_id = $genre_id;

        
        /*
         $book->genre_id = $request->input("genre_id");
        $book->book_status = $request->input("book_status");
        $data = $request->all();
        echo $data;
        $title = $data['title'];
        $author_name = $data['author_name']; $book->author_name = $author_name;*/
       
       

        //$author_name = $request->input("author_name");
        //$book->title = $title;
        //Book::create(['title' => $title],['author_name' => $book->title]);
        
        echo $request;
        echo $title;
        echo $author_name;
        $book->save()
        
        
        //echo $book->title;
        //$book->author_name = request()->author_name;
        //$book->genre_id = request()->genre_id;// should be real time data like 'romance','thriller'
        //$book->book_status = request()->book_status;//Should be Default available
        ;
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // Need to check authorization
        $book = Book::find($id);
        $book->delete();
        return $book;


    }
}
