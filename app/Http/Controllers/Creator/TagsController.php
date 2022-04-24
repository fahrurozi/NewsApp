<?php

namespace App\Http\Controllers\Creator;

use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    //

    public function index()
    {
        $batas = 10;
        $data_tags = Tags::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_tags->currentPage() - 1);

        return view('creator.tags.index', compact('data_tags', 'no'));
    }

    public function create()
    {
        return view('creator.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Nama Tag harus diisi',
            ]
        );

        $tags = new Tags;
        $tags->name = $request->name;
        $tags->save();

        return redirect()->route('tags')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tags = Tags::find($id);
        return view('creator.tags.edit', compact('tags'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Nama Tag harus diisi',
            ]
        );

        $tags = Tags::find($id);
        $tags->name = $request->name;
        $tags->update();

        return redirect()->route('tags')->with('pesan', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $tags = Tags::find($id);
        $tags->delete();

        return redirect()->route('tags')->with('pesan', 'Data berhasil dihapus');
    }
}
