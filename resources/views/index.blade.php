@extends('layouts.app')
@section('content')
<!--=====================================
            BANNER PART START
=======================================-->
<section class="banner-part">
    <div class="container">
        <div class="banner-content">
            <h1>New Contract</h1>
            <p>The job portal for athletes, coaches and other sport related professions</p>
            <a href="{{route('ad.index')}}" class="btn btn-outline">
                <i class="fas fa-eye"></i>
                <span>Show all jobs</span>
            </a>
        </div>
    </div>
</section>
<!--=====================================
            BANNER PART END
=======================================-->


<!--=====================================
            SUGGEST PART START
=======================================-->
<section class="suggest-part">
    <div class="container">
        <div class="suggest-slider slider-arrow">
            @foreach($person_types as $type)
                <a href="/ad/filter?type={{$type->name}}" class="suggest-card">
                    <img src="{{Storage::url($type->icon->path)}}" alt="car">

                    <h6>{{$type->name}}</h6>
                    <p>{{count($type->ads)}} ads</p>
                </a>
            @endforeach
        </div>
    </div>
</section>
<!--=====================================
            SUGGEST PART END
=======================================-->


<!--=====================================
            FEATURE PART START
=======================================-->
<section class="section feature-part">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-5">
                <div class="section-side-heading">
                    <h2>{{$content->featured_title}}</h2>
                    <p>{{$content->featured_content}}</p>
                    <a href="/ad/filter?is_promoted=1" class="btn btn-inline">
                        <i class="fas fa-eye"></i>
                        <span>Pokaż wszystkie promowane</span>
                    </a>
                </div>
            </div>
            <div class="col-md-7 col-lg-7">
                <div class="feature-card-slider slider-arrow">
                    @foreach($promoted_ads as $ad)

                        <div class="feature-card">
                            <a href="/ad/{{$ad->id}}" class="feature-img">
                                <img src="{{Storage::url($ad->user->organization->logo->path)}}" alt="feature">
                            </a>
                            <div class="cross-inline-badge feature-badge">
                                <span>featured</span>
                                <i class="fas fa-book-open"></i>
                            </div>
                            <button type="button" class="feature-wish">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="feature-content">
                                <ol class="breadcrumb feature-category">

                                    <li><span class="flat-badge rent"> @foreach($ad->PersonTypes as $type){{$type->name}}  @endforeach</span></li>
                                    <li class="breadcrumb-item"><a href="#">{{$ad->city->name}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$ad->city->country->name}}</li>
                                </ol>
                                <h3 class="feature-title"><a href="{{route('ad.single', ['id' => $ad->id])}}">{{$ad->title}}</a></h3>
                                <div class="feature-meta">
                                    <span class="feature-price">{{$ad->salary}}<small>{{$ad->salary_per}}</small></span>
                                    <span class="feature-time"><i class="fas fa-football-ball"></i>{{$ad->sport->name}}</span>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="feature-thumb-slider">
                    @foreach($promoted_ads as $ad)

                    <div class="feature-thumb"><img src="{{Storage::url($ad->user->organization->logo->path)}}" alt="feature"></div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
<!--=====================================
            FEATURE PART END
=======================================-->

<!--=====================================
            CATEGORY PART START
=======================================-->
<section class="section category-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>{{$content->top_sports_title}}</h2>
                    <p>{{$content->top_sports_content}}</p>
                </div>
            </div>
        </div>
        <div class="row">

                @foreach($sports as $sport)
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head">
                            <img src="images/category/electronics.jpg" alt="category">
                            <a href="/ad/filter?sport={{$sport->id}}" class="category-content">
                                <h4>{{$sport->name}}</h4>
                                <p>({{count($sport->ads)}})</p>
                            </a>
                        </div>
                        <ul class="category-list">

                            @foreach($sportSortedAds as $ad)

                                @if($ad['sport'] == $sport->name)
                                    @foreach($ad['personTypes'] as $type)
                                        @if($type['count'] != 0)
                                            <li><a href="/ad/filter?person_type={{$type['name']}}&sport={{$ad['sport_id']}}"><h6>{{$type['name']}}</h6><p>{{$type['count']}}</p></a></li>
                                        @endif

                                    @endforeach
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </div>
                @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-20">
                    <a href="category-list.html" class="btn btn-inline">
                        <i class="fas fa-eye"></i>
                        <span>view all sports</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
            CATEGORY PART END
=======================================-->

<!--=====================================
            RECOMEND PART START
=======================================-->
<section class="section recomend-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>{{$content->partners_title}}</h2>
                    <p>{{$content->partners_content}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recomend-slider slider-arrow">
                    @foreach($partners as $partner)

                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="{{Storage::url($partner->organization->logo->url)}}" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-clipboard-check"></i>
                                    <span>recommend</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge booking">{{$partner->ads[0]->sport->name}}</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="#">Luxury</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                                </ol>
                                <h5 class="product-title">
                                    <a href="ad-details-left.html">{{$partner->ads[0]->title}}</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>{{$partner->ads[0]->city->name}}</span>
                                    <span><i class="fas fa-clock"></i>{{$partner->ads[0]->created_at->format('d-m-Y')}}</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">{{$partner->ads[0]->salary}}<span>/{{$partner->ads[0]->salary_per}}</span></h5>
                                    <div class="product-btn">
                                        <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/03.jpg" alt="product">
                            </div>
                            <div class="cross-vertical-badge product-badge">
                                <i class="fas fa-clipboard-check"></i>
                                <span>recommend</span>
                            </div>
                            <div class="product-type">
                                <span class="flat-badge sale">sale</span>
                            </div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">stationary</a></li>
                                <li class="breadcrumb-item active" aria-current="page">books</li>
                            </ol>
                            <h5 class="product-title">
                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">$470<span>/fixed</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/10.jpg" alt="product">
                            </div>
                            <div class="cross-vertical-badge product-badge">
                                <i class="fas fa-clipboard-check"></i>
                                <span>recommend</span>
                            </div>
                            <div class="product-type">
                                <span class="flat-badge rent">rent</span>
                            </div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">automobile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">private car</li>
                            </ol>
                            <h5 class="product-title">
                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">$3300<span>/per month</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/09.jpg" alt="product">
                            </div>
                            <div class="cross-vertical-badge product-badge">
                                <i class="fas fa-clipboard-check"></i>
                                <span>recommend</span>
                            </div>
                            <div class="product-type">
                                <span class="flat-badge sale">sale</span>
                            </div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">animals</a></li>
                                <li class="breadcrumb-item active" aria-current="page">cat</li>
                            </ol>
                            <h5 class="product-title">
                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">$900<span>/Negotiable</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/02.jpg" alt="product">
                            </div>
                            <div class="cross-vertical-badge product-badge">
                                <i class="fas fa-clipboard-check"></i>
                                <span>recommend</span>
                            </div>
                            <div class="product-type">
                                <span class="flat-badge sale">sale</span>
                            </div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">fashion</a></li>
                                <li class="breadcrumb-item active" aria-current="page">shoes</li>
                            </ol>
                            <h5 class="product-title">
                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">$384<span>/fixed</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-50">
                    <a href="ad-list-column3.html" class="btn btn-inline">
                        <i class="fas fa-eye"></i>
                        <span>view all recommend</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
            RECOMEND PART START
=======================================-->

<!--=====================================
            CITY PART START
=======================================-->
<section class="section city-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>{{$content->top_countries_title}}</h2>
                    <p>{{$content->top_countries_content}}</p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($countries as $country)
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href='/ad/filter?country={{$country['country']->name}}' class="city-card" style="background:url({{Storage::url($country['country']->flag->path)}}) no-repeat center; background-size: cover">
                        <div class="city-content">
                            <h4>{{$country['country']->name}}</h4>
                            <p>{{$country['ads_count']}} ads</p>
                        </div>
                    </a>
                </div>

            @endforeach

        <div class="row">
            <div class="col-lg-12">
                <div class="center-20">
                    <a href='{{route('ad.index')}}' class= "btn btn-inline">
                        <i class="fas fa-eye"></i>
                        <span>view all ads</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!--=====================================
            CITY PART END
=======================================-->

<!--=====================================
             BLOG PART START
=======================================-->
<section class="blog-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>{{$content->blog_title}}</h2>
                    <p>{{$content->blog_content}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-slider slider-arrow">

                    @foreach($blogs as $blog)
                        <div class="blog-card">
                            <div class="blog-img">
                                <img src="{{Storage::url($blog->blog_photos[0]->path)}}" alt="blog">
                                <div class="blog-overlay">
                                    <span class="marketing">{{$blog->category}}</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <a href="#" class="blog-avatar">
                                    <img src="{{asset('new_contract_favicon.png')}}" alt="avatar">
                                </a>
                                <ul class="blog-meta">

                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>{{$blog->created_at->format('d-m-Y')}}</p>
                                    </li>
                                </ul>
                                <div class="blog-text">
                                    <h4><a href="{{route('blog.single', ['id' => $blog->id])}}">{{$blog->title}}</a></h4>
                                    <p>{{Str::limit($blog->body, 150)}}</p>
                                </div>
                                <a href="{{route('blog.single', ['id' => $blog->id])}}" class="blog-read">
                                    <span>read more</span>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-btn">
                    <a href="{{route('blog.index')}}" class="btn btn-inline">
                        <i class="fas fa-eye"></i>
                        <span>view all blogs</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
             BLOG PART END
=======================================-->



{{--<!--=====================================--}}
{{--            TREND PART START--}}
{{--=======================================-->--}}
{{--<section class="section trend-part">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="section-center-heading">--}}
{{--                    <h2>Popular Trending <span>Ads</span></h2>--}}
{{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-11 col-lg-8 col-xl-6">--}}
{{--                <div class="product-card standard">--}}
{{--                    <div class="product-media">--}}
{{--                        <div class="product-img">--}}
{{--                            <img src="images/product/01.jpg" alt="product">--}}
{{--                        </div>--}}
{{--                        <div class="cross-vertical-badge product-badge">--}}
{{--                            <i class="fas fa-bolt"></i>--}}
{{--                            <span>trending</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-type">--}}
{{--                            <span class="flat-badge booking">booking</span>--}}
{{--                        </div>--}}
{{--                        <ul class="product-action">--}}
{{--                            <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                            <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                            <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="product-content">--}}
{{--                        <ol class="breadcrumb product-category">--}}
{{--                            <li><i class="fas fa-tags"></i></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">property</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">house</li>--}}
{{--                        </ol>--}}
{{--                        <h5 class="product-title">--}}
{{--                            <a href="ad-details-right.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                        </h5>--}}
{{--                        <div class="product-meta">--}}
{{--                            <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                            <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-info">--}}
{{--                            <h5 class="product-price">$974<span>/per day</span></h5>--}}
{{--                            <div class="product-btn">--}}
{{--                                <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-11 col-lg-8 col-xl-6">--}}
{{--                <div class="product-card standard">--}}
{{--                    <div class="product-media">--}}
{{--                        <div class="product-img">--}}
{{--                            <img src="images/product/02.jpg" alt="product">--}}
{{--                        </div>--}}
{{--                        <div class="cross-vertical-badge product-badge">--}}
{{--                            <i class="fas fa-bolt"></i>--}}
{{--                            <span>trending</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-type">--}}
{{--                            <span class="flat-badge sale">sale</span>--}}
{{--                        </div>--}}
{{--                        <ul class="product-action">--}}
{{--                            <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                            <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                            <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="product-content">--}}
{{--                        <ol class="breadcrumb product-category">--}}
{{--                            <li><i class="fas fa-tags"></i></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">fashion</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">shoes</li>--}}
{{--                        </ol>--}}
{{--                        <h5 class="product-title">--}}
{{--                            <a href="ad-details-right.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                        </h5>--}}
{{--                        <div class="product-meta">--}}
{{--                            <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                            <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-info">--}}
{{--                            <h5 class="product-price">$384<span>/fixed</span></h5>--}}
{{--                            <div class="product-btn">--}}
{{--                                <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-11 col-lg-8 col-xl-6">--}}
{{--                <div class="product-card standard">--}}
{{--                    <div class="product-media">--}}
{{--                        <div class="product-img">--}}
{{--                            <img src="images/product/03.jpg" alt="product">--}}
{{--                        </div>--}}
{{--                        <div class="cross-vertical-badge product-badge">--}}
{{--                            <i class="fas fa-bolt"></i>--}}
{{--                            <span>trending</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-type">--}}
{{--                            <span class="flat-badge sale">sale</span>--}}
{{--                        </div>--}}
{{--                        <ul class="product-action">--}}
{{--                            <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                            <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                            <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="product-content">--}}
{{--                        <ol class="breadcrumb product-category">--}}
{{--                            <li><i class="fas fa-tags"></i></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">stationary</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">book</li>--}}
{{--                        </ol>--}}
{{--                        <h5 class="product-title">--}}
{{--                            <a href="ad-details-right.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                        </h5>--}}
{{--                        <div class="product-meta">--}}
{{--                            <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                            <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-info">--}}
{{--                            <h5 class="product-price">$78<span>/Negotiable</span></h5>--}}
{{--                            <div class="product-btn">--}}
{{--                                <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-11 col-lg-8 col-xl-6">--}}
{{--                <div class="product-card standard">--}}
{{--                    <div class="product-media">--}}
{{--                        <div class="product-img">--}}
{{--                            <img src="images/product/04.jpg" alt="product">--}}
{{--                        </div>--}}
{{--                        <div class="cross-vertical-badge product-badge">--}}
{{--                            <i class="fas fa-bolt"></i>--}}
{{--                            <span>trending</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-type">--}}
{{--                            <span class="flat-badge sale">sale</span>--}}
{{--                        </div>--}}
{{--                        <ul class="product-action">--}}
{{--                            <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                            <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                            <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="product-content">--}}
{{--                        <ol class="breadcrumb product-category">--}}
{{--                            <li><i class="fas fa-tags"></i></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">electronics</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">television</li>--}}
{{--                        </ol>--}}
{{--                        <h5 class="product-title">--}}
{{--                            <a href="ad-details-right.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                        </h5>--}}
{{--                        <div class="product-meta">--}}
{{--                            <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                            <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-info">--}}
{{--                            <h5 class="product-price">$756<span>/fixed</span></h5>--}}
{{--                            <div class="product-btn">--}}
{{--                                <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-11 col-lg-8 col-xl-6">--}}
{{--                <div class="product-card standard">--}}
{{--                    <div class="product-media">--}}
{{--                        <div class="product-img">--}}
{{--                            <img src="images/product/05.jpg" alt="product">--}}
{{--                        </div>--}}
{{--                        <div class="cross-vertical-badge product-badge">--}}
{{--                            <i class="fas fa-bolt"></i>--}}
{{--                            <span>trending</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-type">--}}
{{--                            <span class="flat-badge sale">sale</span>--}}
{{--                        </div>--}}
{{--                        <ul class="product-action">--}}
{{--                            <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                            <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                            <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="product-content">--}}
{{--                        <ol class="breadcrumb product-category">--}}
{{--                            <li><i class="fas fa-tags"></i></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">gadget</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">headphone</li>--}}
{{--                        </ol>--}}
{{--                        <h5 class="product-title">--}}
{{--                            <a href="ad-details-right.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                        </h5>--}}
{{--                        <div class="product-meta">--}}
{{--                            <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                            <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-info">--}}
{{--                            <h5 class="product-price">$245<span>/Negotiable</span></h5>--}}
{{--                            <div class="product-btn">--}}
{{--                                <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-11 col-lg-8 col-xl-6">--}}
{{--                <div class="product-card standard">--}}
{{--                    <div class="product-media">--}}
{{--                        <div class="product-img">--}}
{{--                            <img src="images/product/06.jpg" alt="product">--}}
{{--                        </div>--}}
{{--                        <div class="cross-vertical-badge product-badge">--}}
{{--                            <i class="fas fa-bolt"></i>--}}
{{--                            <span>trending</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-type">--}}
{{--                            <span class="flat-badge rent">rent</span>--}}
{{--                        </div>--}}
{{--                        <ul class="product-action">--}}
{{--                            <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                            <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                            <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="product-content">--}}
{{--                        <ol class="breadcrumb product-category">--}}
{{--                            <li><i class="fas fa-tags"></i></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">cycle</li>--}}
{{--                        </ol>--}}
{{--                        <h5 class="product-title">--}}
{{--                            <a href="ad-details-right.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                        </h5>--}}
{{--                        <div class="product-meta">--}}
{{--                            <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                            <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                        </div>--}}
{{--                        <div class="product-info">--}}
{{--                            <h5 class="product-price">$75<span>/per hour</span></h5>--}}
{{--                            <div class="product-btn">--}}
{{--                                <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="center-20">--}}
{{--                    <a href="ad-list-column3.html" class="btn btn-inline">--}}
{{--                        <i class="fas fa-eye"></i>--}}
{{--                        <span>view all trend</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!--=====================================--}}
{{--            TREND PART END--}}
{{--=======================================-->--}}


{{--<!--=====================================--}}
{{--            NICHE PART START--}}
{{--=======================================-->--}}
{{--<section class="section niche-part">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="section-center-heading">--}}
{{--                    <h2>Browse Our Top <span>Niche</span></h2>--}}
{{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="niche-nav">--}}
{{--                    <ul class="nav nav-tabs">--}}
{{--                        <li><a href="#ratings" class="nav-link active" data-toggle="tab">top ratings</a></li>--}}
{{--                        <li><a href="#advertiser" class="nav-link" data-toggle="tab">top advertiser</a></li>--}}
{{--                        <li><a href="#engaged" class="nav-link" data-toggle="tab">top engaged</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="tab-pane active" id="ratings">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/07.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge booking">booking</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">Luxury</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">resort</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1590<span>/per week</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/08.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">gadget</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">mobile</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$454<span>/fixed</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/09.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">animal</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">cat</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$235<span>/Negotiable</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/10.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge rent">rent</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">private car</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$768<span>/per month</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/11.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge booking">booking</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">Luxury</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">Duplex house</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1470<span>/per day</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/13.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">electronics</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">laptop</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1550<span>/fixed</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/14.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge rent">rent</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">bike</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$90<span>/per hour</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/15.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">gadget</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">camera</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1200<span>/Negotiable</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div> <!-- Rating ads -->--}}

{{--        <div class="tab-pane " id="advertiser">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/08.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">gadget</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">mobile</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$454<span>/fixed</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/07.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge booking">booking</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">Luxury</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">resort</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1590<span>/per week</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/10.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge rent">rent</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">private car</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$768<span>/per month</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/09.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">animal</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">cat</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$235<span>/Negotiable</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/13.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">electronics</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">laptop</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1550<span>/fixed</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/11.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge booking">booking</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">Luxury</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">Duplex house</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1470<span>/per day</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/15.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">gadget</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">camera</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1200<span>/Negotiable</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/14.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge rent">rent</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">bike</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$90<span>/per hour</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div> <!-- Advertiser ads -->--}}

{{--        <div class="tab-pane" id="engaged">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/15.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">gadget</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">camera</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1200<span>/Negotiable</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/07.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge booking">booking</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">Luxury</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">resort</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1590<span>/per week</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/09.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">animal</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">cat</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$235<span>/Negotiable</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/10.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge rent">rent</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">private car</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$768<span>/per month</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/08.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">gadget</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">mobile</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$454<span>/fixed</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/13.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge sale">sale</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">electronics</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">laptop</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1550<span>/fixed</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/14.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge rent">rent</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">bike</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$90<span>/per hour</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="product-card">--}}
{{--                        <div class="product-media">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="images/product/11.jpg" alt="product">--}}
{{--                            </div>--}}
{{--                            <div class="cross-vertical-badge product-badge">--}}
{{--                                <i class="fas fa-fire"></i>--}}
{{--                                <span>top niche</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-type">--}}
{{--                                <span class="flat-badge booking">booking</span>--}}
{{--                            </div>--}}
{{--                            <ul class="product-action">--}}
{{--                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-content">--}}
{{--                            <ol class="breadcrumb product-category">--}}
{{--                                <li><i class="fas fa-tags"></i></li>--}}
{{--                                <li class="breadcrumb-item"><a href="#">Luxury</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">Duplex house</li>--}}
{{--                            </ol>--}}
{{--                            <h5 class="product-title">--}}
{{--                                <a href="ad-details-left.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                            </h5>--}}
{{--                            <div class="product-meta">--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                            </div>--}}
{{--                            <div class="product-info">--}}
{{--                                <h5 class="product-price">$1470<span>/per day</span></h5>--}}
{{--                                <div class="product-btn">--}}
{{--                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                    <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div> <!-- Engaged ads -->--}}

{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="center-20">--}}
{{--                    <a href="ad-list-column3.html" class="btn btn-inline">--}}
{{--                        <i class="fas fa-eye"></i>--}}
{{--                        <span>view all ads</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!--=====================================--}}
{{--            NICHE PART END--}}
{{--=======================================-->--}}


<!--=====================================
            INTRO PART START
=======================================-->
<section class="intro-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>{{$dual->title}}</h2>
                    <p>{{$content->dual_content}}</p>
                    <a href="ad-post.html" class="btn btn-outline">
                        <i class="fas fa-plus-circle"></i>
                        <span>Read more on dual career</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
            INTRO PART END
=======================================-->


<!--=====================================
             PRICE PART START
=======================================-->
<section class="price-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>{{$content->pricing_title}}</h2>
                    <p>{{$content->pricing_content}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="price-card">
                    <div class="price-head">
                        <i class="flaticon-bicycle"></i>
                        <h3>€00</h3>
                        <h4>Free Plan</h4>
                    </div>
                    <ul class="price-list">
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>In 2023 all general ads are free</p>
                        </li>
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>Valid for 21 days</p>
                        </li>
                        <li>
                            <i class="fas fa-times"></i>
                            <p>No possibility to refresh ad</p>
                        </li>
                        <li>
                            <i class="fas fa-times"></i>
                            <p>No social media boost</p>
                        </li>
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>Limited Support</p>
                        </li>
                    </ul>
                    <div class="price-btn">
                        <a href="{{route('user.forms')}}" class="btn btn-inline">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Register Now</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="price-card price-active">
                    <div class="price-head">
                        <i class="flaticon-car-wash"></i>
                        <h3>€18</h3>
                        <h4>Standard Plan</h4>
                    </div>
                    <ul class="price-list">
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>Ad listed in promoted section</p>
                        </li>
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>35 days validity</p>
                        </li>
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>One 14 days refresh available</p>
                        </li>
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>Boost on FB, Li and IG</p>
                        </li>
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>Premium  Support</p>
                        </li>
                    </ul>
                    <div class="price-btn">
                        <a href="user-form.html" class="btn btn-inline">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Register Now</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="price-card">
                    <div class="price-head">
                        <i class="flaticon-airplane"></i>
                        <h3>50%</h3>
                        <h4>Discount</h4>
                    </div>
                    <ul class="price-list">
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>For all ads directed to ladies</p>
                        </li>
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>For all ads featuring dual career</p>
                        </li>
                        <li>
                            <i class="fas fa-plus"></i>
                            <p>For every 3rd ad you post on NewContract</p>
                        </li>
                    </ul>
                    <div class="price-btn">
                        <a href="user-form.html" class="btn btn-inline">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Register Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
             PRICE PART END
=======================================-->



@endsection
