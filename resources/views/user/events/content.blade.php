<div class="single-post">
    <div class="feature-img">
        <img class="img-fluid" src="{{asset('images/events/'.$data_events->image)}}" alt="">
    </div>
    <div class="blog_details">
        <h2>{{$data_events->name}}
        </h2>
        <ul class="blog-info-link mt-3 mb-4">
            <li><a href="#"><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($data_events->date)->isoFormat('DD MMM YYYY')}}</a></li>

        </ul>
        <div>
            {{$data_events->description}}
        </div>

    </div>
</div>