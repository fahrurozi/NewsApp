<div class="youtube-area video-padding d-none d-sm-block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="video-items-active">
                    @foreach($data_video as $video1)
                    <div class="video-items text-center">
                        <video controls>
                            <source src="{{asset('videos/'.$video1->video)}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="video-info">
            <div class="row">
                <div class="col-12">
                    <div class="testmonial-nav text-center">
                        @foreach($data_video as $video2)
                        <div class="single-video">
                            <video controls>
                                <source src="{{asset('videos/'.$video2->video)}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <div class="video-intro">
                                <h4>Old Spondon News - 2020 </h4>
                            </div>
                        </div>
                       @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>