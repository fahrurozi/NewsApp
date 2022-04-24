<div class="comments-area" id="comments-area">
    <h4>{{$jumlah_comment}} Comments</h4>
    @foreach($comments as $comment)
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="desc">
                    <p class="comment">
                        {{$comment->comment}}
                    </p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <h5>
                                <a href="#">{{$comment->name}}</a>
                            </h5>
                            <p class="date">{{ \Carbon\Carbon::parse($comment->updated_at)->format('d F Y \- H:i')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>