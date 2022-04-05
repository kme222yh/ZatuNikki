<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Reading;
use App\Models\Book;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Book $book)
    {
        $readings = [];
        if($book->id){
            $readings = $book->readings()->orderBy('updated_at', 'desc')->get()->toArray();
        } else {
            $books = $request->user()->books()->get();
            foreach ($books as $book) {
                $readings = array_merge($readings, $book->readings()->orderBy('updated_at', 'desc')->get()->toArray());
            }
            $book->id = null;
        }
        return view('book.reading.list', [
            "readings" => $readings,
            "book" => $book,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        return view('book.reading.new', [
            "book" => $book,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        $reading = new Reading;
        $reading->title = $request->title;
        $reading->contents = $request->contents;
        $reading->book_id = $book->id;
        $reading->save();
        return redirect()->route('book.reading.edit', ['reading' => $reading]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function show(Reading $reading)
    {
        return view('book.reading.show', [
            "reading" => $reading,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function edit(Reading $reading)
    {
        return view('book.reading.edit', ['reading' => $reading]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reading $reading)
    {
        $reading->title = $request->title;
        $reading->contents = $request->contents;
        $reading->save();
        return redirect()->route('book.reading.edit', ['reading' => $reading]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reading $reading)
    {
        $reading->delete();
        return redirect()->route('book.reading.list');
    }
}
