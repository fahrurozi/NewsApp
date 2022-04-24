@extends('template.app')

@section('content')
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                
                    <h1 class="widget_title">Category</h1>
                    <br><br>
                    <ul class="">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{route('user.category_detail', $category->name)}}" class="d-flex">
                                <h4>{{$category->name}}</h4>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                
            </div>
        </div>
    </div>
</section>



@endsection