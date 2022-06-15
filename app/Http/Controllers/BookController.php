<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        //$b = Book::where('author','=','suzan')->orderBy('id','DESC')->get();

        return view('admin.book.book_list',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'admin'){
            return  view('admin.book.book_create');
        }
        return "Only admin is allowed to create book!";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'title' => 'required|unique:books',
            'author' => 'required',

        ]);
        $newbook = new Book();
        $newbook->title = $request->title;
        $newbook->author = $request->author;
        $newbook->publisher = $request->publisher;
        $newbook->publishing_year = $request->publishing_year;
        $newbook->price = $request->price;
        if($request->hasFile('image')){
            $path = 'assets/books_images';
            $file = $request->file('image');
            $file->move($path,$file->getClientOriginalName());
            $newbook->image = $path.'/'.$file->getClientOriginalName();
        }

        $newbook->save();
        session()->flash('successMessage','Book information successfully created');
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $book = Book::where('id','=',$id)->first();
//        $book = Book::where('id','=',$id)->get();
        if(auth()->user()->role =='admin') {

            $book = Book::findOrFail($id);
            return view('admin.book.book_edit', compact('book'));
        }
        return "Only admin is allowed to edit book info.";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->publishing_year = $request->publishing_year;
        $book->save();

        session()->flash('successMessage','Book information successfully updated');

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if($book->image != null){
            unlink($book->image);
        }

        $book->delete();

        session()->flash('successMessage','Book information successfully deleted');
        return redirect()->back();
    }
}
