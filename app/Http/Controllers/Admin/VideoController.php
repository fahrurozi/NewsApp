<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Video;
use File;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $batas = 10;
        $data_videos = Video::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_videos->currentPage() - 1);

        return view('admin.video.index', compact('data_videos', 'no'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'video' => 'required|mimes:mp4,mkv|max:200000',
            ],
            [
                'name.required' => 'name video harus diisi',
                'video.required' => 'Video harus diisi',
                'video.mimes' => 'Format video yang diperbolehkan hanya MP4 dan MKV',
                'video.max' => 'Ukuran video maksimal 200 MB',
            ]
        );

        $data_video = new Video;
        $data_video->name = $request->name;

        $file = $request->video;
        $namafile = time() . '.' . $file->getClientOriginalExtension();
        $file->move('videos/', $namafile);
        $data_video->video = $namafile;

        $data_video->save();
        return redirect('/panel/videos')->with('pesan', 'Data Video Berhasil disimpan');
    }

    public function edit($id)
    {
        $data_video = Video::find($id);

        return view('admin.video.edit', compact('data_video'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'video' => 'mimes:mp4,mkv|max:200000',
            ],
            [
                'name.required' => 'name video harus diisi',
                'video.mimes' => 'Format video yang diperbolehkan hanya MP4 dan MKV',
                'video.max' => 'Ukuran video maksimal 200 MB',
            ]
        );

        $data_video = Video::find($id);


        $data_video->name = $request->name;
        if ($request->video != NULL) {
            $oldfilename = $data_video->video;
            $video_path = "videos/" . $oldfilename;

            if (File::exists($video_path)) {
                File::delete($video_path);
            }
            $file = $request->video;
            $namafile = time() . '.' . $file->getClientOriginalExtension();
            $file->move('videos/', $namafile);
            $data_video->video = $namafile;
        }
        $data_video->update();
        return redirect('/panel/videos')->with('pesan', 'Data Video Berhasil diupdate');
    }


    public function delete($id)
    {
        $data_video = Video::find($id);

        $filename = $data_video->video;
        $video_path = "videos/" . $filename;
        if (File::exists($video_path)) {
            File::delete($video_path);
        }
        $data_video->delete();

        return redirect('/panel/videos')->with('pesan', 'Data Video Berhasil dihapus');
    }
}
