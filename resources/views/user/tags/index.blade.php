@extends('template.app')

@section('content')
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                
                    <h1 class="widget_title">Tags</h1>
                    <br><br>
                    <ul class="">
                        @foreach($tags as $item)
                        <li>
                            <a href="{{route('user.tags_detail', $item->name)}}" class="d-flex">
                                <h4>{{$item->name}}</h4>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                
            </div>
        </div>
    </div>
</section>



@endsection