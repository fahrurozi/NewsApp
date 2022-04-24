<!--? About Area Start-->
<div class="support-company-area pt-100 pb-100 section-bg fix" data-background="{{asset('themes/assets/img/gallery/section_bg02.jpg')}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="support-location-img">
                    <img src="{{asset('themes/assets/img/gallery/about.png')}}" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="right-caption">
                    <!-- Section Tittle -->
                    <div class="section-tittles section-tittles2 mb-50">
                        <span>Our Top Services</span>
                        <h2>Our Best Services</h2>
                    </div>
                    <div class="support-caption">
                        @if($data_about)
                        <p class="pera-top">{{$data_about->description}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Area End-->