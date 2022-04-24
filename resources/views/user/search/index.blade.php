@extends('template.app')

@section('content')
<div class="about-area2 gray-bg pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-content">
                    <h2>{{ $keyword }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="whats-news-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        @foreach($data_artikel as $item)
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img">
                                                    <img src="{{asset('cover/'.$item->image)}}" alt="">
                                                </div>
                                                <div class="whates-caption whates-caption2">
                                                    <h4><a href="#">{{$item->title}}</a></h4>
                                                    <span>by {{$item->users->name}} - {{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('MMM DD, YYYY')}}</span>
                                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($item->content)), 115, $end='...') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- About US End -->


@endsection