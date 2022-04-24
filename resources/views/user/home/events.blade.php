<div class="weekly3-news-area pt-80 pb-130">
    <div class="container">
        <div class="weekly3-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-wrapper">
                        <!-- Slider -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="weekly3-news-active dot-style d-flex">
                                    @foreach($data_events as $event)
                                    <div class="weekly3-single">
                                        <div class="weekly3-img">
                                            <img src="{{asset('images/events/'.$event->image)}}" style="width: 263px; height: 210px; object-fit: cover;"  alt="">
                                        </div>
                                        <div class="weekly3-caption">
                                            <h4><a href="{{route('user.events',$event->slug)}}">{{$event->name}}</a></h4>
                                            <p>{{ \Carbon\Carbon::parse($event->date)->isoFormat('DD MMM YYYY')}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>