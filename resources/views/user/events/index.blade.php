@extends('template.app')

@section('content')
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                @include('user.events.content')


            </div>

        </div>
    </div>
</section>
@endsection