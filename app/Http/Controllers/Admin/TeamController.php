<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;
use Image;
use File;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $batas = 10;
        $data_teams = Team::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_teams->currentPage() - 1);

        return view('admin.teams.index', compact('data_teams', 'no'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
                'position.required' => 'Posisi tidak boleh kosong',
                'position.max' => 'Posisi tidak boleh lebih dari 255 karakter',
                'image.required' => 'Foto tidak boleh kosong',
                'image.image' => 'Foto harus berupa gambar',
                'image.mimes' => 'Ekstensi foto yang diizinkan hanya jpeg, png, dan jpg',
            ]
        );
        $team = new Team;
        $team->name = $request->name;
        $team->position = $request->position;

        $image = $request->image;
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images/teams/', $namafile);
        $team->image = $namafile;

        $team->save();
        return redirect()->route('teams')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team->name = $request->name;
        $team->position = $request->position;

        if ($request->image != NULL) {
            $oldfilename = $team->image;
            $image_path_images = "images/teams/" . $oldfilename;
            if (File::exists($image_path_images)) {
                File::delete($image_path_images);
            }
            $image = $request->image;
            $namafile = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/teams', $namafile);

            $team->image = $namafile;
        }

        $team->save();
        return redirect()->route('teams')->with('pesan', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('teams')->with('pesan', 'Data berhasil dihapus');
    }
}
