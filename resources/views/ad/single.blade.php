@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/custom/ad-details.css')}}">

    <!--=====================================
          SINGLE BANNER PART START
    =======================================-->
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>ad details left</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->


    <!--=====================================
                AD DETAILS PART START
    =======================================-->
    <section class="inner-section ad-details-part">
        <div class="container">
            <div class="row content-reverse">
                <div class="col-lg-4">

                    <!-- PRICE CARD -->
                    <div class="common-card price">
                        <h3>{{$ad->salary}}<span>{{$ad->salary_per}}</span></h3>
                        <i class="fas fa-money-bill-wave"></i>
                    </div>

                    <!-- NUMBER CARD -->

                        <button type="button" id="green-button" class="common-card number">
                            <h3>Apply now<span></span></h3>
                            <i class="fas fa-clock"></i>
                        </button>


                    <!-- AUTHOR CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">author info</h5>
                        </div>
                        <div class="ad-details-author">
                            <a href="#" class="author-img active">
                                <img src="{{Storage::url($ad->user->organization->logo->path)}}" alt="avatar">
                            </a>
                            <div class="author-meta">
                                <h4><a href="{{route('user.show',['id' => $ad->user->id])}}">{{$ad->user->organization->name}}</a></h4>
                                <h5>{{$ad->user->organization->location}}</h5>

                            </div>
                            <div class="author-widget">
{{--                                <a href="profile.html" title="Profile" class="fas fa-eye"></a>--}}
                                <a href="{{url($ad->user->organization->fb_url)}}" title="Facebook" class="fab fa-facebook"></a>
                                <a href="{{url($ad->user->organization->www_url)}}" title="WWW" class="fas fa-link"></a>
                                <a href="{{url($ad->user->organization->li_url)}}" title="Linkedin" class="fab fa-linkedin"></a>
                                <a href="{{url($ad->user->organization->ig_url)}}" title="Instagram" class="fab fa-instagram"></a>
                            </div>
                            <ul class="author-list">
                                <li><h6>Joined at</h6><p>{{$ad->user->organization->created_at->format('Y-m-d')}}</p></li>
                                <li><h6>type</h6><p>{{$ad->user->organization->organizationType->name}}</p></li>
{{--                                <li><h6>total follower</h6><p>56</p></li>--}}
                            </ul>
                        </div>
                    </div>

{{--                    <!-- OPENING CARD -->--}}
{{--                    <div class="common-card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h5 class="card-title">opening hour</h5>--}}
{{--                        </div>--}}
{{--                        <ul class="ad-details-opening">--}}
{{--                            <li>--}}
{{--                                <h6>Saturday</h6>--}}
{{--                                <p>09:00am - 05:00pm</p>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <h6>Sunday</h6>--}}
{{--                                <p>09:00am - 05:00pm</p>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <h6>monday</h6>--}}
{{--                                <p>09:00am - 05:00pm</p>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <h6>tuesday</h6>--}}
{{--                                <p>09:00am - 05:00pm</p>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <h6>wednesday</h6>--}}
{{--                                <p>09:00am - 05:00pm</p>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <h6>thursday</h6>--}}
{{--                                <p>09:00am - 05:00pm</p>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <h6>friday</h6>--}}
{{--                                <p>closed</p>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                    <!-- LOCATION CARD -->--}}
{{--                    <div class="common-card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h5 class="card-title">area map</h5>--}}
{{--                        </div>--}}
{{--                        <iframe class="ad-details-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.3406974350205!2d90.48469931445422!3d23.663771197998262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b0d5983f048d%3A0x754f30c82bcad3cd!2sJalkuri%20Bus%20Stop!5e0!3m2!1sen!2sbd!4v1610539261654!5m2!1sen!2sbd"></iframe>--}}
{{--                    </div>--}}

                    <!-- SAFETY CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">safety tips</h5>
                        </div>
                        <div class="ad-details-safety">
                            <p>Feel free to verify the author</p>
                            <p>Clarify job expectations in advance</p>
                            <p>Research the country’s labor laws</p>
                            <p>Check visa and work permit requirements</p>
                            <p>Clarify job expectations in advance</p>
                            <p>Review contract terms thoroughly</p>
                        </div>
                    </div>

                    <!-- FEATURE CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">featured ads</h5>
                        </div>
                        <div class="ad-details-feature slider-arrow">
                            @foreach($featured as $feature)
                                <div class="feature-card">
{{--                                    <a href="#" class="feature-img">--}}
{{--                                        <img src="images/product/10.jpg" alt="feature">--}}
{{--                                    </a>--}}
                                    <div class="cross-inline-badge feature-badge">
                                        <span>featured</span>
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <button type="button" class="feature-wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <div class="feature-content">
                                        <ol class="breadcrumb feature-category">
                                            <li><span class="flat-badge rent">{{$feature->sport->name}}</span></li>

                                        </ol>
                                        <h3 class="feature-title"><a href="ad-details-left.html">{{$feature->title}}</a></h3>
                                        <div class="feature-meta">
                                            <span class="feature-price">{{$feature->salary}}<small>/{{$feature->salary_per}}</small></span>
                                            <span class="feature-time"><i class="fas fa-clock"></i>{{$feature->city->name}},</br> {{$feature->city->country->name}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <!-- AD DETAILS CARD -->
                    <div class="common-card">
                        <ol class="breadcrumb ad-details-breadcrumb">
                            <li><span class="flat-badge sale">{{$ad->sport->name}}</span></li>

                        </ol>
                        <h5 class="ad-details-address">{{$ad->city->name}}, {{$ad->city->country->name}}</h5>
                        <h3 class="ad-details-title">{{$ad->title}}</h3>
{{--                        <div class="ad-details-meta">--}}
{{--                            <a class="view">--}}
{{--                                <i class="fas fa-eye"></i>--}}
{{--                                <span><strong>(134)</strong>preview</span>--}}
{{--                            </a>--}}
{{--                            <a class="click">--}}
{{--                                <i class="fas fa-mouse"></i>--}}
{{--                                <span><strong>(76)</strong>click</span>--}}
{{--                            </a>--}}
{{--                            <a href="#review" class="rating">--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <span><strong>(29)</strong>review</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="ad-details-slider-group">
                            <div class="ad-details-slider slider-arrow">
                                <div><img src="{{Storage::url($ad->user->organization->logo->path)}}" alt="details"></div>
{{--                                <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                                <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                                <div><img src="images/product/01.jpg" alt="details"></div>--}}
                            </div>
{{--                            <div class="cross-vertical-badge ad-details-badge">--}}
{{--                                <i class="fas fa-clipboard-check"></i>--}}
{{--                                <span>recommend</span>--}}
{{--                            </div>--}}
                        </div>
{{--                        <div class="ad-thumb-slider">--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ad-details-action">--}}
{{--                            <button type="button" class="wish"><i class="fas fa-heart"></i>bookmark</button>--}}
{{--                            <button type="button"><i class="fas fa-exclamation-triangle"></i>report</button>--}}
{{--                            <button type="button" data-toggle="modal" data-target="#ad-share">--}}
{{--                                <i class="fas fa-share-alt"></i>--}}
{{--                                share--}}
{{--                            </button>--}}
{{--                        </div>--}}
                    </div>

                    <!-- SPECIFICATION CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">Specification</h5>
                        </div>
                        <ul class="ad-details-specific">
                            <li>
                                <h6>Offered salary:</h6>
                                <p>{{$ad->salary}}, {{$ad->salary_per}}</p>
                            </li>
                            <li>
                                <h6>Target Group:</h6>
                                <p>@foreach($ad->personTypes as $type)  {{$type->name}}, @endforeach</p>
                            </li>
                            <li>
                                <h6>published:</h6>
                                <p>{{$ad->created_at->format('Y-m-d')}}</p>
                            </li>
                            <li>
                                <h6>location:</h6>
                                <p>{{$ad->city->name}}, {{$ad->city->country->name}}</p>
                            </li>
                        </ul>
                    </div>

                    <!-- DESCRIPTION CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">Ad description</h5>
                        </div>
                        <p class="ad-details-desc">{{$ad->ad_content}}</p>
                    </div>

                    <!-- REVIEWS CARD -->
                    <div class="common-card" id="review">
                        <div class="card-header">
                            <h5 class="card-title">Requirements</h5>
                        </div>
                        <p class="ad-details-desc">{{$ad->requirements}}</p>
                    </div>
                    @if($ad->is_dual == 1)
                    <div class="common-card" id="review">
                        <div class="card-header">
                            <h5 class="card-title">Dual career</h5>
                        </div>
                        <p class="ad-details-desc">{{$ad->dual_content}}</p>
                    </div>
                    @endif
@if(Auth::id())
                        @if(auth()->user()->person_id != null )
                            <div class="common-card" id="form">
                                <div class="card-header">
                                    <h5 class="card-title">Apply</h5>
                                </div>
                                <form class="review-form" action="{{route('recruitment.store')}}" method="POST">
                                    @csrf
                                    <p class="ad-details-desc">There is no need to fill in your contact data, as you are logged to you account, those will be sent automatically</p>
                                    <div class="review-form-grid">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="sender" value={{Auth::id()}}>
                                            <input type="hidden" class="form-control" name="ad" value={{$ad->id}}>
                                            <input type="hidden" class="form-control" name="recipient" value={{$ad->user->id}}>
                                            <input type="hidden" class="form-control" name="title" value="Application for your {{$ad->title}} ad">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message_content" class="form-control">Dear Sir/Madam, I am writing to apply for the {{$ad->title}} ad I found on New Contract. Feel free to reach out to me in order to discuss details.</textarea>

                                    </div>
                                    <button type="submit" class="btn btn-inline review-submit">
                                        <i class="fas fa-tint"></i>
                                        <span>Send</span>
                                    </button>
                                </form>
                            </div>
                        @endif
@endif

                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                AD DETAILS PART END
    =======================================-->


    <!--=====================================
                RELATED PART START
    =======================================-->
{{--    <section class="inner-section related-part">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="section-center-heading">--}}
{{--                        <h2>Related This <span>Ads</span></h2>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="related-slider slider-arrow">--}}
{{--                        <div class="product-card">--}}
{{--                            <div class="product-media">--}}
{{--                                <div class="product-img">--}}
{{--                                    <img src="images/product/01.jpg" alt="product">--}}
{{--                                </div>--}}
{{--                                <div class="product-type">--}}
{{--                                    <span class="flat-badge sale">sale</span>--}}
{{--                                </div>--}}
{{--                                <ul class="product-action">--}}
{{--                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                    <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="product-content">--}}
{{--                                <ol class="breadcrumb product-category">--}}
{{--                                    <li><i class="fas fa-tags"></i></li>--}}
{{--                                    <li class="breadcrumb-item"><a href="#">Luxury</a></li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">Duplex House</li>--}}
{{--                                </ol>--}}
{{--                                <h5 class="product-title">--}}
{{--                                    <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                </h5>--}}
{{--                                <div class="product-meta">--}}
{{--                                    <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                    <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-info">--}}
{{--                                    <h5 class="product-price">$1500<span>/negotiable</span></h5>--}}
{{--                                    <div class="product-btn">--}}
{{--                                        <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                        <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-card">--}}
{{--                            <div class="product-media">--}}
{{--                                <div class="product-img">--}}
{{--                                    <img src="images/product/03.jpg" alt="product">--}}
{{--                                </div>--}}
{{--                                <div class="product-type">--}}
{{--                                    <span class="flat-badge sale">sale</span>--}}
{{--                                </div>--}}
{{--                                <ul class="product-action">--}}
{{--                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                    <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="product-content">--}}
{{--                                <ol class="breadcrumb product-category">--}}
{{--                                    <li><i class="fas fa-tags"></i></li>--}}
{{--                                    <li class="breadcrumb-item"><a href="#">stationary</a></li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">books</li>--}}
{{--                                </ol>--}}
{{--                                <h5 class="product-title">--}}
{{--                                    <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                </h5>--}}
{{--                                <div class="product-meta">--}}
{{--                                    <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                    <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-info">--}}
{{--                                    <h5 class="product-price">$470<span>/fixed</span></h5>--}}
{{--                                    <div class="product-btn">--}}
{{--                                        <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                        <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-card">--}}
{{--                            <div class="product-media">--}}
{{--                                <div class="product-img">--}}
{{--                                    <img src="images/product/10.jpg" alt="product">--}}
{{--                                </div>--}}
{{--                                <div class="product-type">--}}
{{--                                    <span class="flat-badge sale">sale</span>--}}
{{--                                </div>--}}
{{--                                <ul class="product-action">--}}
{{--                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                    <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="product-content">--}}
{{--                                <ol class="breadcrumb product-category">--}}
{{--                                    <li><i class="fas fa-tags"></i></li>--}}
{{--                                    <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">private car</li>--}}
{{--                                </ol>--}}
{{--                                <h5 class="product-title">--}}
{{--                                    <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                </h5>--}}
{{--                                <div class="product-meta">--}}
{{--                                    <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                    <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-info">--}}
{{--                                    <h5 class="product-price">$3300<span>/fixed</span></h5>--}}
{{--                                    <div class="product-btn">--}}
{{--                                        <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                        <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-card">--}}
{{--                            <div class="product-media">--}}
{{--                                <div class="product-img">--}}
{{--                                    <img src="images/product/09.jpg" alt="product">--}}
{{--                                </div>--}}
{{--                                <div class="product-type">--}}
{{--                                    <span class="flat-badge sale">sale</span>--}}
{{--                                </div>--}}
{{--                                <ul class="product-action">--}}
{{--                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                    <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="product-content">--}}
{{--                                <ol class="breadcrumb product-category">--}}
{{--                                    <li><i class="fas fa-tags"></i></li>--}}
{{--                                    <li class="breadcrumb-item"><a href="#">animals</a></li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">cat</li>--}}
{{--                                </ol>--}}
{{--                                <h5 class="product-title">--}}
{{--                                    <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                </h5>--}}
{{--                                <div class="product-meta">--}}
{{--                                    <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                    <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-info">--}}
{{--                                    <h5 class="product-price">$900<span>/Negotiable</span></h5>--}}
{{--                                    <div class="product-btn">--}}
{{--                                        <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                        <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-card">--}}
{{--                            <div class="product-media">--}}
{{--                                <div class="product-img">--}}
{{--                                    <img src="images/product/02.jpg" alt="product">--}}
{{--                                </div>--}}
{{--                                <div class="product-type">--}}
{{--                                    <span class="flat-badge sale">sale</span>--}}
{{--                                </div>--}}
{{--                                <ul class="product-action">--}}
{{--                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                    <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="product-content">--}}
{{--                                <ol class="breadcrumb product-category">--}}
{{--                                    <li><i class="fas fa-tags"></i></li>--}}
{{--                                    <li class="breadcrumb-item"><a href="#">fashion</a></li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">shoes</li>--}}
{{--                                </ol>--}}
{{--                                <h5 class="product-title">--}}
{{--                                    <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                </h5>--}}
{{--                                <div class="product-meta">--}}
{{--                                    <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                    <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-info">--}}
{{--                                    <h5 class="product-price">$384<span>/fixed</span></h5>--}}
{{--                                    <div class="product-btn">--}}
{{--                                        <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                        <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="center-50">--}}
{{--                        <a href="ad-column3.html" class="btn btn-inline">--}}
{{--                            <i class="fas fa-eye"></i>--}}
{{--                            <span>view all related</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--=====================================
                RELATED PART START
    =======================================-->
    <script>
        document.getElementById('green-button').addEventListener('click', function() {
            var formDiv = document.getElementById('form');
            var offsetTop = formDiv.offsetTop - 50;
            window.scrollTo({ top: offsetTop, behavior: 'smooth' });
        });
    </script>
@endsection
