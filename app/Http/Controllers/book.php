<?php

namespace App\Http\Controllers;

use App\Models\Book as ModelsBook;
use Illuminate\Http\Request;

class book extends Controller
{
    public function create()
    {
        return view('newbook');
    }
    public function store(Request $request)
    {

        $books = new ModelsBook();
        $books->title = $request->title;
        $books->price = $request->price;

        $books->save();

        return redirect('admin/home');
    }
    public function showOneBook($id)
    {
        $id = ModelsBook::find($id);
        return view('onebook')->with('id', $id);
    }
    public function edit($editid)
    {
        $editid = ModelsBook::find($editid);
        return view('editbook')->with('editid', $editid);
    }
    public function update(Request $request, $book)
    {
        $book = ModelsBook::find($book);
        $book->title = $request->get('title');
        $book->price = $request->get('price');

        $book->save();
        return redirect('admin/home');
    }
    public function delete($id)
    {
        $id = ModelsBook::find($id);
        $id->delete();
        return redirect('admin/home');
    }
}
