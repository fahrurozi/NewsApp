<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category</h4>
            <ul class="list cat-list">
                @foreach($list_category as $category)
                <li>
                    <a href="{{route('user.category_detail', $category->name)}}" class="d-flex">
                        <p>{{ $category->name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </aside>
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Recent Post</h3>
            @foreach($article_recent as $recent_article)
            <div class="media post_item">
                <img src="{{asset('images/'.$recent_article->image)}}" style="width: 80px; height: 80px; object-fit: cover;" alt="post">
                <div class="media-body">
                    <a href="{{url('/blog',$recent_article->slug)}}">
                        <h3>{{ \Illuminate\Support\Str::limit($recent_article->title, 22, $end='...') }}</h3>
                    </a>
                    <p>{{\Carbon\Carbon::createFromTimeStamp(strtotime($recent_article->updated_at))->diffForHumans()}}</p>
                </div>
            </div>
            @endforeach
        </aside>
        <aside class="single_sidebar_widget tag_cloud_widget">
            <h4 class="widget_title">Tag Clouds</h4>
            <ul class="list">
                @foreach(json_decode($article->tags) as $tag)
                <li>
                    <a href="{{route('user.tags_detail', $tag)}}">{{ $tag }}</a>
                </li>
                @endforeach
            </ul>
        </aside>
        <li>
            <a href="#"></a>
        </li>
    </div>
</div>