<?php

namespace App\Http\Controllers\Creator;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;

class CategoryController extends Controller
{
    public function index()
    {
        $batas = 10;
        $data_category = Category::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_category->currentPage() - 1);

        return view('creator.category.index', compact('data_category', 'no'));
    }

    public function create()
    {
        return view('creator.category.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Nama kategori harus diisi',
            ]
        );

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data_category = Category::find($id);

        return view('creator.category.edit', compact('data_category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Nama kategori harus diisi',
            ]
        );

        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();

        return redirect()->route('category')->with('pesan', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category')->with('pesan', 'Data berhasil dihapus');
    }
}
