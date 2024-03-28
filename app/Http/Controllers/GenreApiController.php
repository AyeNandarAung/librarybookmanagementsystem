<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreApiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             
        return Genre::all();
        
       // 
    }
   
/*
 
    public function genreSearch(Request $request){
        $genre = Genre::find();

    }
    public function findGenre($Request $request){
        $genre = Genre::find($id);
        
        //$bookList = Book::find($genre->id);
        return $genre;

    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $genre = new Genre;
        $genre->name = request()->name;
        $genre->save();
        return $genre;
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Genre $genre
    {
        //return Genre::find($id);
        //Showing All Books search by genre

        $genre = Genre::find($id);
        $books = Genre::find($id)->books;

        $data = [
            "Status" =>200,
            "Genre" => $genre->name,
            "Book Lists" => $books
           
        ];
        /*
        $data = [
            
            "all books" => Genre::with('book')->get()
           
        ];*///"all books" =>[$genre->book->title],"Genre" => $genre->name,
        return $data;
        


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update($id)//Request $request, Genre $genre
    {
        //
        $genre = Genre::find($id);
        $genre->name = request()->name;
        $genre->save();
        return $genre;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//Genre $genre
    {
        //
        $genre = Genre::find($id);
        $genre->delete();
        return $genre;
    }
}
