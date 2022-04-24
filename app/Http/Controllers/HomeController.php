<?php

namespace App\Http\Controllers;

use App\About;
use App\Article;
use App\Category;
use App\Comments;
use App\Events;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Auth::check());
        $articles_slider = Article::orderBy('id', 'desc')->has('users')->with('users')->paginate(3);
        $article_trending_2 = Article::orderBy('id', 'desc')->has('users')->with('users')->offset(3)->limit(2)->get();
        $last_article = Article::orderBy('id', 'desc')->has('users')->with('users')->first();

        $list_category = Category::orderBy('id', 'asc')->paginate(5);

        $article_category = array();
        for ($i = 0; $i <= 4; $i++) {
            if ((isset($list_category[$i]) and Article::get()->isNotEmpty()) == true) {
                $article_category[$i] = Article::orderBy('id', 'desc')->has('users')->with('users')->where('category', $list_category[$i]->name)->paginate(5);
            }
        }

        $data_events = Events::orderBy('id', 'desc')->paginate(15);
            
        $data_video = Video::all();

        return view('user.home.index', compact('articles_slider', 'article_trending_2', 'list_category', 'article_category', 'data_video', 'last_article',  'data_events'));
    }

    public function blog_detail($slug)
    {
        $article = Article::where('slug', $slug)->has('users')->with('users')->first();
        $list_category = Category::orderBy('id', 'asc')->paginate(6);
        $article_recent = Article::orderBy('id', 'desc')->has('users')->with('users')->paginate(4);
        $comments = Comments::where('article_id', $article->id)->get();
        $jumlah_comment = Comments::where('article_id', $article->id)->count();

        return view('user.blog.detail.index', compact('article', 'list_category', 'article_recent', 'comments', 'jumlah_comment'));
    }

    public function like($id)
    {
        $article = Article::find($id);
        $article->increment('like');

        return back();
    }

    public function storeComment(Request $request, $id)
    {
        $buku = Article::where('id', $id)->get()->first();

        $comment = new Comments;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->article_id = $id;
        $comment->save();
        return redirect('/blog/' . $buku->slug)->with('pesan', 'Komentar Berhasil ditambahkan');
    }
}
