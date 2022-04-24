<?php

namespace App\Http\Controllers;

use App\About;
use App\Article;
use App\Category;
use App\Tags;
use App\Team;
use App\Events;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
    //
    public function about_us()
    {
        $data_about = About::all()->first();
        $data_team = Team::all();

        return view('user.about.index', compact('data_about', 'data_team'));
    }

    public function article()
    {
        $batas = 4;
        $data_article = Article::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_article->currentPage() - 1);

        return view('user.article.index', compact('data_article', 'no'));
    }

    public function category()
    {
        $categories = Category::all();

        return view('user.category.index', compact('categories'));
    }

    public function category_detail($slug)
    {
        $categories = Category::where('name', $slug)->first();
        $list_article = Article::where('category', $slug)->has('users')->with('users')->get();

        return view('user.category.list', compact('categories', 'list_article'));
    }

    public function tags()
    {
        $tags = Tags::all();

        return view('user.tags.index', compact('tags'));
    }

    public function tags_detail($slug)
    {
        $tags = Tags::where('name', $slug)->first();
        $all_articles = Article::all();
        $list_article = array();

        foreach ($all_articles as $article) {
            if (in_array($slug, json_decode($article->tags))) {
                array_push($list_article, $article);
            }
        }

        return view('user.tags.list', compact('tags', 'list_article'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $data_artikel = Article::where('title', 'like', "%" . $keyword . "%")->get();


        return view('user.search.index', compact('data_artikel', 'keyword'));
    }

    public function events($slug){
        $data_events = Events::where('slug', $slug)->first();

        return view('user.events.index', compact('data_events'));
    }
}
