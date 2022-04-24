<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;

class EventsController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $batas = 10;
        $data_events = Events::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_events->currentPage() - 1);

        return view('admin.events.index', compact('data_events', 'no'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $events = new Events;
        $events->name = $request->name;
        $events->slug =  str_replace(' ', '-', strtolower($request->name));
        $events->description = $request->description;
        $events->date = $request->date;

        $image = $request->image;
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200, 200)->save(public_path('thumb/' . $namafile));
        Image::make($image)->resize(750, 645)->save(public_path('cover/' . $namafile));
        $image->move('images/events/', $namafile);
        $events->image = $namafile;

        $events->save();
        return redirect('/panel/events')->with('pesan', 'Data Events Berhasil disimpan');
    }

    public function edit($id)
    {
        $events = Events::find($id);
        return view('admin.events.edit', compact('events'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $events = Events::find($id);
        $events->name = $request->name;
        $events->description = $request->description;
        $events->date = $request->date;

        if ($request->image != NULL) {
            $oldfilename = $events->image;
            $image_path_images = "images/events/" . $oldfilename;
            if (File::exists($image_path_images)) {
                File::delete($image_path_images);
            }
            $image = $request->image;
            $namafile = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/events', $namafile);

            $events->image = $namafile;
        }

        $events->update();
        return redirect()->route('events')->with('pesan', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $events = Events::find($id);
        $filename = $events->image;
        $image_path_thumb = "thumb/" . $filename;
        $image_path_images = "images/events/" . $filename;
        if (File::exists($image_path_images)) {
            File::delete($image_path_thumb);
            File::delete($image_path_images);
        }
        $events->delete();
        return redirect('/panel/events')->with('pesan', 'Data Events Berhasil dihapus');
    }
}
