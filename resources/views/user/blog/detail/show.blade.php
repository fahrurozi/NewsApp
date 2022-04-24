    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                @include('user.blog.detail.content')
                @include('user.blog.detail.author')
                @include('user.blog.detail.listComment')
                @include('user.blog.detail.commentForm')
                
                
                </div>
                @include('user.blog.detail.rightSideBar')
            </div>
        </div>
    </section>
