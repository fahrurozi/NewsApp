<!-- Team Start -->
<div class="team-area section-padding30">
    <div class="container">
        <div class="row">
            <div class="cl-xl-7 col-lg-8 col-md-10">
                <!-- Section Tittle -->
                <div class="section-tittles mb-70">
                    <span>Our Professional members </span>
                    <h2>Our Team Mambers</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single Tem -->
            @foreach($data_team as $team)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                <div class="single-team mb-30">
                    <div class="team-img">
                        <img src="{{asset('/images/teams/'.$team->image)}}" style="width: 360px; height: 451px; object-fit: cover;" alt="">
                    </div>
                    <div class="team-caption">
                        <h3><a href="#">{{$team->name}}</a></h3>
                        <span>{{$team->position}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->