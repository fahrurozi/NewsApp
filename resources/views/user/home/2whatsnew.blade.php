    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-4">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach($list_category as $category)
                                            <a class="nav-item nav-link" id="nav-{{strtolower($category->name)}}-tab" data-toggle="tab" href="#nav-{{strtolower($category->name)}}" role="tab" aria-controls="nav-profile" aria-selected="@if($category->id == 1) true @else false @endif ">{{$category->name}}</a>
                                            @endforeach
                                            <!-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Lifestyle</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Travel</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Fashion</a>
                                            <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Sports</a>
                                            <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Technology</a> -->
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    @foreach($list_category as $ic=>$category)
                                    <div class="tab-pane fade @if($category->id == 1) show active @endif" id="nav-{{strtolower($category->name)}}" role="tabpanel" aria-labelledby="nav-{{strtolower($category->name)}}-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            @if(!empty($article_category))
                                            @foreach($article_category[$ic] as $ia=>$article)
                                            @if($ia == 0)
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <img src="{{asset('cover/'.$article->image)}}" alt="">
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="{{url('/blog',$article->slug)}}">{{$article->title}}</a></h4>
                                                        <span>by {{$article->users->name}} - {{ \Carbon\Carbon::parse($article->updated_at)->isoFormat('MMM DD, YYYY')}}</span>
                                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($article->content)), 115, $end='...') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @endif

                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    @if(!empty($article_category))
                                                    @foreach($article_category[$ic] as $ia=>$article)
                                                    @if($ia > 0)
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="{{asset('images/'.$article->image)}}" style="width: 124px; height: 104px; object-fit: cover;" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">{{$article->category}}</span>
                                                                <h4><a href="{{url('/blog',$article->slug)}}">{{$article->title}}</a></h4>
                                                                <p>{{ \Carbon\Carbon::parse($article->updated_at)->isoFormat('MMM DD, YYYY')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <img src="{{asset('themes/assets/img/gallery/whats_news_details1.png')}}" alt="">
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="latest_news.html">Secretart for Economic Air plane that looks like</a></h4>
                                                        <span>by Alice cloe - Jun 19, 2020</span>
                                                        <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- Right single caption -->
                                            <!-- <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="{{asset('themes/assets/img/gallery/whats_right_img1.png')}}" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="{{asset('themes/assets/img/gallery/whats_right_img2.png')}}" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="{{asset('themes/assets/img/gallery/whats_right_img3.png')}}" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorg">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="{{asset('themes/assets/img/gallery/whats_right_img4.png')}}" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorr">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4">
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{asset('themes/assets/img/news/icon-fb.png')}}" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{asset('themes/assets/img/news/icon-tw.png')}}" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{asset('themes/assets/img/news/icon-ins.png')}}" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{asset('themes/assets/img/news/icon-yo.png')}}" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Most Recent</h4>
                        </div>
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">

                                @if($last_article)
                                <img src="{{asset('cover/'. $last_article->image) }}" style="height: 240px;" alt="">
                                <div class="most-recent-cap">
                                    <span class="bgbeg">{{$last_article->category}}</span>
                                    <h4><a href="{{url('/blog',$last_article->slug)}}">{{$last_article->title}}</a></h4>
                                    <p>{{$last_article->users->name}} | {{\Carbon\Carbon::createFromTimeStamp(strtotime($last_article->updated_at))->diffForHumans()}}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- Single -->
                        @foreach($article_trending_2 as $article_trending_2_item)
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                <img src="{{asset('cover/'. $article_trending_2_item->image)}}" style="width: 85px;" alt="">
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="{{url('/blog',$article_trending_2_item->slug)}}">{{$article_trending_2_item->title}}</a></h4>
                                <p>{{$article_trending_2_item->users->name}} | {{\Carbon\Carbon::createFromTimeStamp(strtotime($article_trending_2_item->updated_at))->diffForHumans()}}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->