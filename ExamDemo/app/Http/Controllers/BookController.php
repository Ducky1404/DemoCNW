<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:50',
            'category' => 'required | max:50',
            'year' => 'required | integer',
            'quantity' => 'required | integer',
        ]);

        $books = Book::create($validateData);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::find($id);

        return view('book.detail', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::find($id);

        return view('book.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $books = Book::find($id);

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required',
            'quantity' => 'required',
        ]);

        $books->update($validateData);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::find($id);
        $books->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
