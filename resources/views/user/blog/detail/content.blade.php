<div class="single-post">
    <div class="feature-img">
        <img class="img-fluid" src="{{asset('images/'.$article->image)}}" alt="">
    </div>
    <div class="blog_details">
        <h2>{{$article->title}}
        </h2>
        <ul class="blog-info-link mt-3 mb-4">
            <li><a href="#"><i class="fa fa-user"></i> {{$article->users->name}}</a></li>
            <li><a href="#comments-area"><i class="fa fa-comments"></i> {{$jumlah_comment}} Comments</a></li>
        </ul>
        {!! $article->content!!}
    </div>
</div>