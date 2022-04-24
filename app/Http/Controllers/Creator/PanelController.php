<?php

namespace App\Http\Controllers\Creator;

use App\Article;
use App\Category;
use App\Comments;
use App\Http\Controllers\Controller;
use App\Tags;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    //

    public function dashboard()
    {
        
        $total_article = Article::count();
        $total_article_by_user = Article::where('author_id', Auth::user()->id)->count();
        $total_creator = User::where('level', 'creator')->count();
        $total_category = Category::count();
        $total_tags = Tags::count();
        $total_videos = Video::count();
        $total_like = Article::sum('like');
        $total_like_article_by_user = Article::where('author_id', Auth::user()->id)->sum('like');
        $total_comment = Comments::count();


        return view('creator.dashboard.index', compact('total_article', 'total_article_by_user', 'total_creator', 'total_category', 'total_tags', 'total_videos',  'total_like_article_by_user', 'total_like'));
    }
}
