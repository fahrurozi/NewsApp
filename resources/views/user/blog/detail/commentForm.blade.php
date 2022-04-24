<div class="comment-form">
    <h4>Leave a Reply</h4>
    <form class="form-contact comment_form" method="POST"  action="{{route('blog.comment', $article->id)}}" id="commentForm">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                </div>
            </div>
            
            <div class="col-12">
                <div class="form-group">
                    <input class="form-control" name="name" id="wnameebsite" type="text" placeholder="Name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
        </div>
    </form>
</div>