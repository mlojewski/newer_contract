@extends('layouts.app')
@section('content')

<!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
<section class="inner-section single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>Jobs listing</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
          SINGLE BANNER PART END
=======================================-->


<!--=====================================
            AD LIST PART START
=======================================-->
<section class="inner-section ad-list-part">
    <div class="container">
        <div class="row content-reverse">
            <div class="col-lg-4 col-xl-3">
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by Salary</h6>
                            <form class="product-widget-form" action="{{route('ad.filter')}}">
                                <div class="product-widget-group">
                                    <input type="number" name="min_salary" placeholder="min">
                                    <input type="number" name="max_salary" placeholder="max">
                                </div>
                                <button type="submit" class="product-widget-btn">
                                    <i class="fas fa-search"></i>
                                    <span>search</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by sport</h6>
                            <form class="product-widget-form" action="{{route('ad.filter')}}">
                                <ul class="product-widget-list product-widget-scroll">

                                        @foreach($sports as $sport)
                                        <li class="product-widget-item">
                                            <input type="radio" id={{$sport->name}} name="sport" value={{$sport->id}} >
                                            <label for={{$sport->name}}>{{$sport->name}}</label><br>
                                        </li>
                                        @endforeach

                                </ul>
                                <button type="submit" class="product-widget-btn">
                                    <span>Search</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by Country</h6>
                            <form class="product-widget-form" action="{{route('ad.filter')}}">
                                <ul class="product-widget-list product-widget-scroll">

                                    @foreach($countries as $country)
                                        <li class="product-widget-item">
                                            <input type="radio" id={{$country->name}} name="country" value="{{$country->name}}" >
                                            <label for={{$country->name}}>{{$country->name}}</label><br>
                                        </li>
                                        @endforeach


                                </ul>
                                <button type="submit" class="product-widget-btn">
                                    <span>Search</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by type</h6>
                            <form class="product-widget-form" action="{{route('ad.filter')}}">

                                <ul class="product-widget-list product-widget-scroll">
                                    @foreach($person_types as $type)
                                        <li class="product-widget-item">
                                            <input type="radio" id={{$type->name}} name="person_type" value={{$type->id}} >
                                            <label for={{$type->name}}>{{$type->name}}</label><br>
                                        </li>
                                    @endforeach

                                </ul>
                                <button type="submit" class="product-widget-btn">
                                    <i class="fas fa-broom"></i>
                                    <span>Search</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="header-filter">--}}
{{--                            <div class="filter-show">--}}
{{--                                <label class="filter-label">Show :</label>--}}
{{--                                <select class="custom-select filter-select">--}}
{{--                                    <option value="1">12</option>--}}
{{--                                    <option value="2">24</option>--}}
{{--                                    <option value="3">36</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="filter-short">--}}
{{--                                <label class="filter-label">Short by :</label>--}}
{{--                                <select class="custom-select filter-select">--}}
{{--                                    <option selected>default</option>--}}
{{--                                    <option value="3">trending</option>--}}
{{--                                    <option value="1">featured</option>--}}
{{--                                    <option value="2">recommend</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="filter-action">--}}
{{--                                <a href="ad-column3.html" title="Three Column" class="active"><i class="fas fa-th"></i></a>--}}
{{--                                <a href="ad-column2.html" title="Two Column"><i class="fas fa-th-large"></i></a>--}}
{{--                                <a href="ad-column1.html" title="One Column"><i class="fas fa-th-list"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="ad-feature-slider slider-arrow">--}}
{{--                            <div class="feature-card">--}}
{{--                                <a href="#" class="feature-img">--}}
{{--                                    <img src="images/product/10.jpg" alt="feature">--}}
{{--                                </a>--}}
{{--                                <div class="cross-inline-badge feature-badge">--}}
{{--                                    <span>featured</span>--}}
{{--                                    <i class="fas fa-book-open"></i>--}}
{{--                                </div>--}}
{{--                                <button type="button" class="feature-wish">--}}
{{--                                    <i class="fas fa-heart"></i>--}}
{{--                                </button>--}}
{{--                                <div class="feature-content">--}}
{{--                                    <ol class="breadcrumb feature-category">--}}
{{--                                        <li><span class="flat-badge rent">rent</span></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">private car</li>--}}
{{--                                    </ol>--}}
{{--                                    <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>--}}
{{--                                    <div class="feature-meta">--}}
{{--                                        <span class="feature-price">$1200<small>/Monthly</small></span>--}}
{{--                                        <span class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="feature-card">--}}
{{--                                <a href="#" class="feature-img">--}}
{{--                                    <img src="images/product/01.jpg" alt="feature">--}}
{{--                                </a>--}}
{{--                                <div class="cross-inline-badge feature-badge">--}}
{{--                                    <span>featured</span>--}}
{{--                                    <i class="fas fa-book-open"></i>--}}
{{--                                </div>--}}
{{--                                <button type="button" class="feature-wish">--}}
{{--                                    <i class="fas fa-heart"></i>--}}
{{--                                </button>--}}
{{--                                <div class="feature-content">--}}
{{--                                    <ol class="breadcrumb feature-category">--}}
{{--                                        <li><span class="flat-badge booking">booking</span></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">Property</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">House</li>--}}
{{--                                    </ol>--}}
{{--                                    <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>--}}
{{--                                    <div class="feature-meta">--}}
{{--                                        <span class="feature-price">$800<small>/perday</small></span>--}}
{{--                                        <span class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="feature-card">--}}
{{--                                <a href="#" class="feature-img">--}}
{{--                                    <img src="images/product/08.jpg" alt="feature">--}}
{{--                                </a>--}}
{{--                                <div class="cross-inline-badge feature-badge">--}}
{{--                                    <span>featured</span>--}}
{{--                                    <i class="fas fa-book-open"></i>--}}
{{--                                </div>--}}
{{--                                <button type="button" class="feature-wish">--}}
{{--                                    <i class="fas fa-heart"></i>--}}
{{--                                </button>--}}
{{--                                <div class="feature-content">--}}
{{--                                    <ol class="breadcrumb feature-category">--}}
{{--                                        <li><span class="flat-badge sale">sale</span></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">gadget</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">iphone</li>--}}
{{--                                    </ol>--}}
{{--                                    <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>--}}
{{--                                    <div class="feature-meta">--}}
{{--                                        <span class="feature-price">$1150<small>/Negotiable</small></span>--}}
{{--                                        <span class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="feature-card">--}}
{{--                                <a href="#" class="feature-img">--}}
{{--                                    <img src="images/product/06.jpg" alt="feature">--}}
{{--                                </a>--}}
{{--                                <div class="cross-inline-badge feature-badge">--}}
{{--                                    <span>featured</span>--}}
{{--                                    <i class="fas fa-book-open"></i>--}}
{{--                                </div>--}}
{{--                                <button type="button" class="feature-wish">--}}
{{--                                    <i class="fas fa-heart"></i>--}}
{{--                                </button>--}}
{{--                                <div class="feature-content">--}}
{{--                                    <ol class="breadcrumb feature-category">--}}
{{--                                        <li><span class="flat-badge sale">sale</span></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">cycle</li>--}}
{{--                                    </ol>--}}
{{--                                    <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>--}}
{{--                                    <div class="feature-meta">--}}
{{--                                        <span class="feature-price">$455<small>/fixed</small></span>--}}
{{--                                        <span class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row">
                    @foreach($ads as $ad)
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="{{Storage::url($ad->user->organization->logo->path)}}" alt="product">
                                </div>
{{--                                <div class="cross-vertical-badge product-badge">--}}
{{--                                    <i class="fas fa-clipboard-check"></i>--}}
{{--                                    <span>recommend</span>--}}
{{--                                </div>--}}
                                <div class="product-type">
                                    <span class="flat-badge booking">{{$ad->sport->name}}</span>
                                </div>
{{--                                <ul class="product-action">--}}
{{--                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                    <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                </ul>--}}
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item">@foreach($ad->personTypes->take(2) as $type) {{$type->name}},  @endforeach</li>

                                </ol>
                                <h5 class="product-title">
                                    <a href={{route('ad.single', ['id' => $ad->id])}}>{{$ad->title}}</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>{{$ad->city->name}}, {{$ad->city->country->name}}</span>
                                    <span><i class="fas fa-clock"></i>{{$ad->created_at->format('d-m-Y')}}</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">{{$ad->salary}}<span>/ {{$ad->salary_per}}</span></h5>
{{--                                    <div class="product-btn">--}}
{{--                                        <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                        <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="footer-pagection">--}}
{{--                            <p class="page-info">Showing 12 of 60 Results</p>--}}
{{--                            <ul class="pagination">--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#">--}}
{{--                                        <i class="fas fa-long-arrow-alt-left"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item">...</li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">67</a></li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#">--}}
{{--                                        <i class="fas fa-long-arrow-alt-right"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</section>
<!--=====================================
            AD LIST PART END
=======================================-->
@endsection
