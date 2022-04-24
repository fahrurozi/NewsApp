    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            @foreach($articles_slider as $slider)
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{asset('cover/'. $slider->image)}}" alt="">
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{$slider->category}}</span>
                                            <h2><a href="{{url('/blog',$slider->slug)}}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{$slider->title}}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">by {{$slider->users->name}} - {{ \Carbon\Carbon::parse($slider->updated_at)->isoFormat('MMM DD, YYYY')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                        <!-- Trending Top -->
                        <div class="row">
                            @foreach($article_trending_2 as $item)
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{asset('cover/'. $item->image)}}" style="height: 315px;" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgb">{{$item->category}}</span>
                                            <h2><a href="{{url('/blog',$item->slug)}}">{{$item->title}}</a></h2>
                                            <p>by {{$item->users->name}} - {{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('MMM DD, YYYY')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->