<div class="navigation-top">
    <div class="d-sm-flex justify-content-between text-center">
        <p class="like-info"><a class="align-middle" href="{{route('blog.like',$article->id)}}" style="cursor: pointer;"><i class="fa fa-heart" style="color: #506172; @if($article->like >=1) color: red !important @endif "></i></a> {{$article->like}}
            people like this</p>
            
        <div class="col-sm-4 text-center my-2 my-sm-0">
            <p class="comment-count"><span class="align-middle"><i class="fa fa-comment" style="@if($jumlah_comment >=1) color: red !important @endif"></i></span> {{$jumlah_comment}} Comments</p>
        </div>
        
    </div>

</div>
<!-- <div class="blog-author">
    <div class="media align-items-center">
        <img src="assets/img/blog/author.png" alt="">
        <div class="media-body">
            <a href="#">
                <h4>Harvard milan</h4>
            </a>
            <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                our dominion twon Second divided from</p>
        </div>
    </div>
</div> -->