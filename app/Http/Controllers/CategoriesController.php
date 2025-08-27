<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categories; // gunakan file Categories dari folder Models

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Categories::orderBy('id', 'desc')->get();//mengambil semuah data dari table view->Categories
        $title = "Kategori Kamar";//memberikan nama
        return view('categories.index', compact('datas', 'title'));//menampilkan index.blade.php pada folder view->categories
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');//menampilkan file create.blade.php pada folder cie->categories
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categories::create([
            'name'  => $request->name,//jika di input maka akan reques ke field name
            'slug'  => Str::slug($request->name),//maka slug untuk bisa di baca URL
        ]);
        return redirect()->to('categories');//setelah di jalankan maka akan dialihkan ke folder view->categories
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Categories::find($id);//mengambil $id dari folder view->categories
        $title = "Ubah Kategori Kamar";//menampilkan tulisan aja
        return view('categories.edit', compact('edit', 'title'));//menjalankan fiel edit.blade.php pada folder views->categories
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Categories::find($id);//mencari data dari dari table categories
        $categories->name = $request->name;//mengambil field name pada table categories
        $categories->slug = Str::slug($request->name);//mengambil slug untuk jadi URL
        $categories->save();//setelah diubah maka akan disimpan
        return redirect()->to('categories');//user akan di alihkan ke halaman categories
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::find($id)->delete();//memanggil field id dari Categories.php pada folder Models
        return redirect()->to('categories');//user akan di alihkan ke halaman categories
    }
}
