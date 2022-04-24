<?php

namespace App\Http\Controllers\Creator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Tags;
use App\User;
use Image;
use File;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $batas = 10;
        if (Auth::user()->level == 'admin') {
            $data_article = Article::orderBy('id', 'desc')->has('users')->with('users')->paginate($batas);
        } else {
            $data_article = Article::where('author_id', Auth::user()->id)->orderBy('id', 'desc')->has('users')->with('users')->paginate($batas);
        }

        $no = $batas * ($data_article->currentPage() - 1);

        return view('creator.article.index', compact('data_article', 'no'));
    }

    public function create()
    {
        $data_category = Category::all();
        $data_tags = Tags::all();

        return view('creator.article.create', compact('data_category', 'data_tags'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
                'tags' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ],
            [
                'title.required' => "judul wajib diisi",
                'content.required' => "konten wajib diisi",
                'tags.required' => "tags wajib diisi",
                'category.required' => "category wajib diisi",
                'image.required' => "gambar wajib diisi",
            ]
        );

        $article = new Article;
        $article->title = $request->title;
        $article->slug =  str_replace(' ', '-', strtolower($request->title));
        $article->content = $request->content;
        $article->author_id = Auth::user()->id;
        $article->category = $request->category;
        // $article->tags = implode(';',$request->tags);
        $article->tags = json_encode($request->tags);

        $image = $request->image;
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200, 200)->save(public_path('thumb/' . $namafile));
        Image::make($image)->resize(750, 645)->save(public_path('cover/' . $namafile));
        $image->move('images/', $namafile);
        $article->image = $namafile;

        $article->save();
        return redirect('/panel/article')->with('pesan', 'Data Article Berhasil disimpan');
    }

    public function edit($id)
    {
        $data_article = Article::find($id);
        $data_category = Category::all();
        $data_tags = Tags::all();
        $article_tags = json_decode($data_article->tags);

        return view('creator.article.edit', compact('data_article', 'data_category', 'data_tags', 'article_tags'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
                'tags' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ],
            [
                'title.required' => "judul wajib diisi",
                'content.required' => "konten wajib diisi",
                'tags.required' => "tags wajib diisi",
                'category.required' => "category wajib diisi",
                'image.required' => "gambar wajib diisi",
            ]
        );

        $article = Article::find($id);
        $article->title = $request->title;
        $article->slug = str_replace(' ', '-', strtolower($request->title));;
        $article->content = $request->content;
        $article->author_id = Auth::user()->id;
        $article->category = $request->category;
        $article->tags = json_encode($request->tags);

        if ($request->image != NULL) {
            $oldfilename = $article->image;
            $image_path_thumb = "thumb/" . $oldfilename;
            $image_path_images = "images/" . $oldfilename;
            if (File::exists($image_path_images)) {
                File::delete($image_path_thumb);
                File::delete($image_path_images);
            }
            $image = $request->image;
            $namafile = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('thumb/' . $namafile);
            Image::make($image)->resize(750, 645)->save(public_path('cover/' . $namafile));
            $image->move('images/', $namafile);

            $article->image = $namafile;
        }
        $article->update();
        return redirect('/panel/article')->with('pesan', 'Data Article Berhasil diupdate');
    }



    public function delete($id)
    {
        $data_article = Article::find($id);
        $filename = $data_article->image;
        $image_path_thumb = "thumb/" . $filename;
        $image_path_images = "images/" . $filename;
        if (File::exists($image_path_images)) {
            File::delete($image_path_thumb);
            File::delete($image_path_images);
        }
        $data_article->delete();
        return redirect('/panel/article')->with('pesan', 'Data Article Berhasil dihapus');
    }
}
