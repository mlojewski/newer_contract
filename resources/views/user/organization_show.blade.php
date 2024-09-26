@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/custom/ad-details.css')}}">

    <section class="single-banner">
        @if(session()->has('pop_up'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{session()->get('pop_up')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="single-content">
                        <h2>{{$user->name}}</h2>
                        {{--                        <ol class="breadcrumb">--}}
                        {{--                            <li class="breadcrumb-item"><a href="index.html">Contact</a></li>--}}
                        {{--                            <li class="breadcrumb-item active" aria-current="page">contact</li>--}}
                        {{--                        </ol>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dash-header-part">
        <div class="container">
            <div class="dash-header-card">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="dash-header-left">
                            <div class="dash-avatar">
                                <a href="#"><img src="{{Storage::url($user->organization->logo->path)}}" alt="avatar"></a>
                            </div>
                            <div class="dash-intro">
                                <h4>{{$user->name}} </h4>
                                <h5></h5>
                                <ul class="dash-meta">
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <span>{{$user->email}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="dash-header-right">
                            <div class="dash-focus dash-list">
                                <h2>{{$user->organization->OrganizationType->name}}</h2>
                                <p>Type</p>
                            </div>
                            <div class="dash-focus dash-book">
                                <h2>{{$user->organization->location}}</h2>
                                <p>Location</p>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="dash-menu-list">--}}
{{--                            <ul>--}}
{{--                                <li><a href="{{route('profile')}}">Your profile</a></li>--}}
{{--                                <li><a href="{{route('organization.edit', ['id' => $user->organization->id])}}">Edit</a></li>--}}
{{--                                <li><a href="{{route('organization.ads', ['id' =>$user->id])}}">Your Ads</a></li>--}}
{{--                                <li><a href="/logout">logout</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!--=====================================
            DASHBOARD HEADER PART END
    =======================================-->

    <!--=====================================
               PROFILE PART START
    =======================================-->
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Languages</h3>
                        </div>
                        @foreach($user->organization->languages as $language)
                            {{$language->name}}
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Company description</h3>
                        </div>
                        {{$user->organization->description}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Social Media</h3>
                        </div>
                        @if($user->organization->fb_url)
                            <i class="fas fa-envelope"> Facebook </i>
                            <span>{{$user->organization->fb_url}}</span> <br>

                        @endif
                        @if($user->organization->ig_url)
                            <i class="fas fa-map-marker-alt">Instagram </i>
                            <span>{{$user->organization->ig_url}}</span><br>
                        @endif
                        @if($user->organization->li_url)

                            <i class="fas fa-map-marker-alt">LinkedIn</i>
                            <span>{{$user->organization->li_url}}</span> <br>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
        <section class="inner-section related-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading">
                            <h2>Related This <span>Ads</span></h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="related-slider slider-arrow">
                            @foreach($user->ads as $ad)

                                <div class="product-card">
                                    <div class="product-media">
                                        <div class="product-img">
                                            <img src="{{Storage::url($user->organization->logo->path)}}" alt="product">
                                        </div>
                                        <div class="product-type">
                                            <span class="flat-badge sale">{{$ad->sport->name}}</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                       
                                        <h5 class="product-title">
                                            <a href="{{route('ad.single', ['id' => $ad->id])}}">{{$ad->title}}</a>
                                        </h5>
                                        <div class="product-meta">
                                            <span><i class="fas fa-map-marker-alt"></i>{{$ad->city->name}}, {{$ad->city->country->name}}</span>

                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-price">{{$ad->salary}}<span>{{$ad->salary_per}}</span></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-img">
                                        <img src="{{Storage::url($user->organization->logo->path)}}" alt="product">
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
                                        <li class="breadcrumb-item"><a href="#">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                                    </ol>
                                    <h5 class="product-title">
                                        <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                    </h5>
                                    <div class="product-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>
                                        <span><i class="fas fa-clock"></i>30 min ago</span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-price">$1500<span>/negotiable</span></h5>
                                        <div class="product-btn">
                                            <a href="compare.html" title="Compare" class="fas fa-compress"></a>
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="product-card">--}}
{{--                                <div class="product-media">--}}
{{--                                    <div class="product-img">--}}
{{--                                        <img src="images/product/03.jpg" alt="product">--}}
{{--                                    </div>--}}
{{--                                    <div class="product-type">--}}
{{--                                        <span class="flat-badge sale">sale</span>--}}
{{--                                    </div>--}}
{{--                                    <ul class="product-action">--}}
{{--                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                        <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <ol class="breadcrumb product-category">--}}
{{--                                        <li><i class="fas fa-tags"></i></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">stationary</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">books</li>--}}
{{--                                    </ol>--}}
{{--                                    <h5 class="product-title">--}}
{{--                                        <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="product-meta">--}}
{{--                                        <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                        <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-info">--}}
{{--                                        <h5 class="product-price">$470<span>/fixed</span></h5>--}}
{{--                                        <div class="product-btn">--}}
{{--                                            <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                            <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-card">--}}
{{--                                <div class="product-media">--}}
{{--                                    <div class="product-img">--}}
{{--                                        <img src="images/product/10.jpg" alt="product">--}}
{{--                                    </div>--}}
{{--                                    <div class="product-type">--}}
{{--                                        <span class="flat-badge sale">sale</span>--}}
{{--                                    </div>--}}
{{--                                    <ul class="product-action">--}}
{{--                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                        <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <ol class="breadcrumb product-category">--}}
{{--                                        <li><i class="fas fa-tags"></i></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">automobile</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">private car</li>--}}
{{--                                    </ol>--}}
{{--                                    <h5 class="product-title">--}}
{{--                                        <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="product-meta">--}}
{{--                                        <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                        <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-info">--}}
{{--                                        <h5 class="product-price">$3300<span>/fixed</span></h5>--}}
{{--                                        <div class="product-btn">--}}
{{--                                            <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                            <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-card">--}}
{{--                                <div class="product-media">--}}
{{--                                    <div class="product-img">--}}
{{--                                        <img src="images/product/09.jpg" alt="product">--}}
{{--                                    </div>--}}
{{--                                    <div class="product-type">--}}
{{--                                        <span class="flat-badge sale">sale</span>--}}
{{--                                    </div>--}}
{{--                                    <ul class="product-action">--}}
{{--                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                        <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <ol class="breadcrumb product-category">--}}
{{--                                        <li><i class="fas fa-tags"></i></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">animals</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">cat</li>--}}
{{--                                    </ol>--}}
{{--                                    <h5 class="product-title">--}}
{{--                                        <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="product-meta">--}}
{{--                                        <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                        <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-info">--}}
{{--                                        <h5 class="product-price">$900<span>/Negotiable</span></h5>--}}
{{--                                        <div class="product-btn">--}}
{{--                                            <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                            <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-card">--}}
{{--                                <div class="product-media">--}}
{{--                                    <div class="product-img">--}}
{{--                                        <img src="images/product/02.jpg" alt="product">--}}
{{--                                    </div>--}}
{{--                                    <div class="product-type">--}}
{{--                                        <span class="flat-badge sale">sale</span>--}}
{{--                                    </div>--}}
{{--                                    <ul class="product-action">--}}
{{--                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li>--}}
{{--                                        <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>--}}
{{--                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <ol class="breadcrumb product-category">--}}
{{--                                        <li><i class="fas fa-tags"></i></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">fashion</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">shoes</li>--}}
{{--                                    </ol>--}}
{{--                                    <h5 class="product-title">--}}
{{--                                        <a href="#">Lorem ipsum dolor sit amet consect adipisicing elit</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="product-meta">--}}
{{--                                        <span><i class="fas fa-map-marker-alt"></i>Uttara, Dhaka</span>--}}
{{--                                        <span><i class="fas fa-clock"></i>30 min ago</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-info">--}}
{{--                                        <h5 class="product-price">$384<span>/fixed</span></h5>--}}
{{--                                        <div class="product-btn">--}}
{{--                                            <a href="compare.html" title="Compare" class="fas fa-compress"></a>--}}
{{--                                            <button type="button" title="Wishlist" class="far fa-heart"></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--=====================================
                RELATED PART START
    =======================================-->
    <!--=====================================
                PROFILE PART END
    =======================================-->

@endsection
