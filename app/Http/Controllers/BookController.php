<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = new Book();
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }
        $book->quantity = $request->input('quantity');
        $book->publication_date = $request->input('publication_date');
        $book->save();
        Session::flash('success', 'Thêm mới sách thành công');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        if ($request->hasFile('image')) {
            $currentImage = $book->image;
            if ($currentImage) {
                Storage::delete('/public/' . $currentImage);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }
        $book->quantity = $request->input('quantity');
        $book->publication_date = $request->input('publication_date');
        $book->save();

        Session::flash('success', 'Sửa thông tin sách thành công');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        Session::flash('success', 'Xóa sách thành công');
        return redirect()->route('books.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect('books.index');
        }
        $books = Book::where('name','LIKE', '%' . $keyword . '%');
        return view('books.index', compact('books'));
    }
}
