<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data_about = About::all()->first();
        return view('admin.about.index', compact('data_about'));
    }

    public function update(Request $request)
    {

        if (About::all()->first()) {
            $data_about = About::all()->first();
        } else {
            $data_about = new About();
        }

        $data_about->description = $request->description;
        $data_about->mission = $request->mission;
        $data_about->vision = $request->vision;
        $data_about->save();

        return redirect()->route('about')->with('pesan', 'Data berhasil diubah');
    }
}
