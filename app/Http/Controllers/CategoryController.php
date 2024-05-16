<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(Request $request)
    {
        Category::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')->with('status', 'Berhasil tambah kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Category::find($id)->update($request->all());

        return redirect()->route('category.index')->with('status','Berhasil update kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('category.index')->with('status', 'Berhasil menghapus kategori');
    }
}
