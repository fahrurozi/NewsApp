<div class="about-details section-padding30">
    <div class="container">
        <div class="row">
            @if($data_about)
            <div class="offset-xl-1 col-lg-8">
                <div class="about-details-cap mb-50">
                    <h4>Our Mission</h4>
                    <p>{{$data_about->mission}}</p>
                </div>
                <div class="about-details-cap mb-50">
                    <h4>Our Vision</h4>
                    <p>{{$data_about->vision}}</p>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>