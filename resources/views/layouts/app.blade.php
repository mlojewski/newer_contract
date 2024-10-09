<!DOCTYPE html>
<html lang="en">
<head>
    <!--=====================================
                META-TAG PART START
    =======================================-->
    <!-- REQUIRE META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- AUTHOR META -->
    <meta name="author" content="Kameleon Brand design">

    <!-- TEMPLATE META -->
    <meta name="name" content="New Contract">
    <meta name="type" content="Job and contract ads">
    <meta name="title" content="New Contract - THE place for sport jobs">
    <meta name="keywords" content="sport, ads, classified ads, contract, business, directory, jobs, marketing, portal, advertising, ad listing, ad posting,">
    <!--=====================================
                META-TAG PART END
    =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>New Contract - sport opportunities portal</title>

    <!--=====================================
                CSS LINK PART START
    =======================================-->
    <!-- FAVICON -->
    <link rel="icon" href="{{asset('images/new_contract_favicon.png')}}">

    <!-- FONTS -->
    <link rel="stylesheet" href="{{asset('fonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/font-awesome/fontawesome.css')}}">

    <!-- VENDOR -->
    <link rel="stylesheet" href="{{asset('css/vendor/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom/index.css')}}">
    <!--=====================================
                CSS LINK PART END
    =======================================-->
</head>
<body>
<!--=====================================
            HEADER PART START
=======================================-->
<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-left">
{{--                <button type="button" class="header-widget sidebar-btn">--}}
{{--                    <i class="fas fa-align-left"></i>--}}
{{--                </button>--}}
                <a href="/" class="header-logo" >
                    <img id="logo" src="{{asset('poziom bez claim NEW CONTRACT (1).png')}}" alt="logo">
                </a>
                @if(auth()->user() && auth()->user()->is_admin)
                    <a href="{{route('panel')}}" class="btn btn-inline post-btn"> <span>panel</span></a>

                @elseif(auth()->user() && !auth()->user()->is_admin && auth()->user()->person_id != null)
                    <a href="{{route('person_panel.panel',['id' => auth()->user()->id])}}" class="btn btn-inline post-btn">
                        <i class="fas fa-person-booth"></i>
                        <span>Your profile</span>
                    </a>
                @elseif(auth()->user() && auth()->user()->organization_id != null && !auth()->user()->is_admin)
                    <a href="{{route('organization_panel.panel',['id' => auth()->user()->id])}}" class="btn btn-inline post-btn" >
                        <i class="fas fa-person-booth"></i>
                        <span>Your profile</span>
                    </a>
                @else
                    <a href="/forms" class="btn btn-inline post-btn">
                        <i class="fas fa-person-booth"></i>
                        <span>Login</span>
                    </a>
                @endif

{{--                <button type="button" class="header-widget search-btn">--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </button>--}}
            </div>
            @if(!Auth::user() || !auth()->user()->is_admin)
                <form class="header-form" action="{{route('ad.filter')}}">
                    <div class="header-search">
                        <button type="submit" title="Search Submit "><i class="fas fa-search"></i></button>
                        <input type="text" placeholder="Filter the ads">
                        <button type="button" title="Search Option" class="option-btn"><i class="fas fa-sliders-h"></i></button>
                    </div>
                    <div class="header-option">
                        <div class="option-grid">
                            <div class="option-group"><input type="number" name="min_salary" placeholder="Min Salary"></div>
                            <div class="option-group"><input type="number" name="max_salary" placeholder="Max Salary"></div>
                            <div class="option-group">
                                <label class="form-label" >Sport</label><br>
                                <select name="sport" id="sport">
                                    <option value=0>Any</option>
                                    @foreach(\App\Models\Sport::all() as $sport)
                                        <option value="{{$sport->id}}">{{$sport->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="option-group">
                                <label class="form-label">User type</label><br>
                                <select name="person_type" id="person_type">
                                    <option value=0>Any</option>
                                    @foreach(\App\Models\PersonType::all() as $type)
                                        <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="option-group"><input type="text" name="city" placeholder="City"></div>
                            <div class="option-group"><input type="text"  name="country" placeholder="Country"></div>

                            <button type="submit"><i class="fas fa-search"></i><span>Search</span></button>
                        </div>
                    </div>
                </form>

                <form class="header-form" action="{{route('person.filter')}}">
                    <div class="header-search">
                        <button type="submit" title="Search Submit "><i class="fas fa-search"></i></button>
                        <input type="text" placeholder="Filter the users">
                        <button type="button" title="Search Option" class="option-btn"><i class="fas fa-sliders-h"></i></button>
                    </div>
                    <div class="header-option">

                        <div class="option-grid">
                            <button type="submit"><i class="fas fa-search"></i><span>Search</span></button>
                            <div class="option-group">
                                <label class="form-label" >Sport</label><br>
                                <select name="sport" id="sport">
                                    <option value=0>Any</option>
                                    @foreach(\App\Models\Sport::all() as $sport)
                                        <option value="{{$sport->id}}">{{$sport->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="option-group">
                                <label class="form-label">User type</label><br>
                                <select name="person_type" id="person_type">
                                    <option value=0>Any</option>
                                    @foreach(\App\Models\PersonType::all() as $type)
                                        <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="option-group">
                                <label class="form-label">Language</label><br>
                                <select name="language" id="language">
                                    <option value=0>Any</option>
                                    @foreach(\App\Models\Language::all() as $language)
                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="option-group">
                                <label class="form-label">Gender</label><br>
                                <select name="gender" id="gender">
                                    <option value=0>Any</option>
                                    @foreach(\App\Models\Gender::all() as $gender)
                                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="option-group"><input type="text"  name="country" placeholder="Country"></div>
                        </div>
                    </div>
                </form>
            @endif

            <div class="header-right">
{{--                <ul class="header-list">--}}
{{--                    <li class="header-item">--}}
{{--                        <a href="bookmark.html" class="header-widget">--}}
{{--                            <i class="fas fa-heart"></i>--}}
{{--                            <sup>0</sup>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="header-item">--}}
{{--                        <button type="button" class="header-widget">--}}
{{--                            <i class="fas fa-envelope"></i>--}}
{{--                            <sup>0</sup>--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-card">--}}
{{--                            <div class="dropdown-header">--}}
{{--                                <h5>message (2)</h5>--}}
{{--                                <a href="message.html">view all</a>--}}
{{--                            </div>--}}
{{--                            <ul class="message-list">--}}
{{--                                <li class="message-item unread">--}}
{{--                                    <a href="message.html" class="message-link">--}}
{{--                                        <div class="message-img active">--}}
{{--                                            <img src="images/avatar/01.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="message-text">--}}
{{--                                            <h6>miron mahmud <span>now</span></h6>--}}
{{--                                            <p>How are you my best frien...</p>--}}
{{--                                        </div>--}}
{{--                                        <span class="message-count">4</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <a href="message.html" class="message-link">--}}
{{--                                        <div class="message-img active">--}}
{{--                                            <img src="images/avatar/03.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="message-text">--}}
{{--                                            <h6>shipu ahmed <span>3m</span></h6>--}}
{{--                                            <p><span>me:</span>How are you my best frien...</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="message-item unread">--}}
{{--                                    <a href="message.html" class="message-link">--}}
{{--                                        <div class="message-img">--}}
{{--                                            <img src="images/avatar/02.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="message-text">--}}
{{--                                            <h6>tahmina bonny <span>2h</span></h6>--}}
{{--                                            <p>How are you my best frien...</p>--}}
{{--                                        </div>--}}
{{--                                        <span class="message-count">12</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <a href="message.html" class="message-link">--}}
{{--                                        <div class="message-img active">--}}
{{--                                            <img src="images/avatar/04.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="message-text">--}}
{{--                                            <h6>nasrullah <span>5d</span></h6>--}}
{{--                                            <p>How are you my best frien...</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <a href="message.html" class="message-link">--}}
{{--                                        <div class="message-img">--}}
{{--                                            <img src="images/user.png" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="message-text">--}}
{{--                                            <h6>saikul azam <span>7w</span></h6>--}}
{{--                                            <p><span>me:</span>How are you my best frien...</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <a href="message.html" class="message-link">--}}
{{--                                        <div class="message-img active">--}}
{{--                                            <img src="images/avatar/02.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="message-text">--}}
{{--                                            <h6>munni akter <span>9m</span></h6>--}}
{{--                                            <p>How are you my best frien...</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <a href="message.html" class="message-link">--}}
{{--                                        <div class="message-img active">--}}
{{--                                            <img src="images/avatar/03.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="message-text">--}}
{{--                                            <h6>shahin alam <span>1y</span></h6>--}}
{{--                                            <p>How are you my best frien...</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="header-item">--}}
{{--                        <button type="button" class="header-widget">--}}
{{--                            <i class="fas fa-bell"></i>--}}
{{--                            <sup>0</sup>--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-card">--}}
{{--                            <div class="dropdown-header">--}}
{{--                                <h5>Notification (1)</h5>--}}
{{--                                <a href="notification.html">view all</a>--}}
{{--                            </div>--}}
{{--                            <ul class="notify-list">--}}
{{--                                <li class="notify-item active">--}}
{{--                                    <a href="#" class="notify-link">--}}
{{--                                        <div class="notify-img">--}}
{{--                                            <img src="images/avatar/01.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="notify-content">--}}
{{--                                            <p class="notify-text"><span>miron mahmud</span> has added the advertisement post of your <span>booking</span> to his wishlist.</p>--}}
{{--                                            <span class="notify-time">just now</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="notify-item">--}}
{{--                                    <a href="#" class="notify-link">--}}
{{--                                        <div class="notify-img">--}}
{{--                                            <img src="images/avatar/02.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="notify-content">--}}
{{--                                            <p class="notify-text"><span>tahmina bonny</span> gave you a <span>comment</span> and 5 star <span>review.</span></p>--}}
{{--                                            <span class="notify-time">2 hours ago</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="notify-item">--}}
{{--                                    <a href="#" class="notify-link">--}}
{{--                                        <div class="notify-img">--}}
{{--                                            <img src="images/avatar/03.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="notify-content">--}}
{{--                                            <p class="notify-text"><span>shipu ahmed</span> and <span>4 other</span> have seen your contact number</p>--}}
{{--                                            <span class="notify-time">3 minutes ago</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="notify-item">--}}
{{--                                    <a href="#" class="notify-link">--}}
{{--                                        <div class="notify-img">--}}
{{--                                            <img src="images/avatar/02.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="notify-content">--}}
{{--                                            <p class="notify-text"><span>miron mahmud</span> has added the advertisement post of your <span>booking</span> to his wishlist.</p>--}}
{{--                                            <span class="notify-time">5 days ago</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="notify-item">--}}
{{--                                    <a href="#" class="notify-link">--}}
{{--                                        <div class="notify-img">--}}
{{--                                            <img src="images/avatar/04.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="notify-content">--}}
{{--                                            <p class="notify-text"><span>labonno khan</span> gave you a <span>comment</span> and 5 star <span>review.</span></p>--}}
{{--                                            <span class="notify-time">4 months ago</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="notify-item">--}}
{{--                                    <a href="#" class="notify-link">--}}
{{--                                        <div class="notify-img">--}}
{{--                                            <img src="images/avatar/01.jpg" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="notify-content">--}}
{{--                                            <p class="notify-text"><span>azam khan</span> and <span>4 other</span> have seen your contact number</p>--}}
{{--                                            <span class="notify-time">1 years ago</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}

            </div>
            @if(!Auth::user())
                <a href="/forms" class="header-widget header-user">
                    <img src="{{asset('images/user.png')}}" alt="user">
                    <span>Login / Register</span>
                </a>
            @else()
                <form method="post" action="/logout" class="mt-6 space-y-6">
                    @csrf
                    <button class="btn btn-inline post-btn" type="submit"> Logout</button>

                </form>
            @endif


        </div>

        @if(session()->has('pop_up'))
            <div class="container">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{session()->get('pop_up')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </div>
        @endif
    </div>

</header>
<!--=====================================
            HEADER PART END
=======================================-->


<!--=====================================
            SIDEBAR PART START
=======================================-->
{{--<aside class="sidebar-part">--}}
{{--    <div class="sidebar-body">--}}
{{--        <div class="sidebar-header">--}}
{{--            <a href="index.html" class="sidebar-logo"><img src="images/logo.png" alt="logo"></a>--}}
{{--            <button class="sidebar-cross"><i class="fas fa-times"></i></button>--}}
{{--        </div>--}}
{{--        <div class="sidebar-content">--}}
{{--            <div class="sidebar-profile">--}}
{{--                <a href="#" class="sidebar-avatar"><img src="images/avatar/01.jpg" alt="avatar"></a>--}}
{{--                <h4><a href="#" class="sidebar-name">Jackon Honson</a></h4>--}}
{{--                <a href="ad-post.html" class="btn btn-inline sidebar-post">--}}
{{--                    <i class="fas fa-plus-circle"></i>--}}
{{--                    <span>post your ad</span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="sidebar-menu">--}}
{{--                <ul class="nav nav-tabs">--}}
{{--                    <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Main Menu</a></li>--}}
{{--                    <li><a href="#author-menu" class="nav-link" data-toggle="tab">Author Menu</a></li>--}}
{{--                </ul>--}}

{{--                <div class="tab-pane active" id="main-menu">--}}
{{--                    <ul class="navbar-list">--}}
{{--                        <li class="navbar-item"><a class="navbar-link" href="index.html">Home</a></li>--}}
{{--                        <li class="navbar-item navbar-dropdown">--}}
{{--                            <a class="navbar-link" href="#">--}}
{{--                                <span>Categories</span>--}}
{{--                                <i class="fas fa-plus"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-list">--}}
{{--                                <li><a class="dropdown-link" href="category-list.html">category list</a></li>--}}
{{--                                <li><a class="dropdown-link" href="category-details.html">category details</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="navbar-item navbar-dropdown">--}}
{{--                            <a class="navbar-link" href="#">--}}
{{--                                <span>Advertise List</span>--}}
{{--                                <i class="fas fa-plus"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-list">--}}
{{--                                <li><a class="dropdown-link" href="ad-list-column3.html">ad list column 3</a></li>--}}
{{--                                <li><a class="dropdown-link" href="ad-list-column2.html">ad list column 2</a></li>--}}
{{--                                <li><a class="dropdown-link" href="ad-list-column1.html">ad list column 1</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="navbar-item navbar-dropdown">--}}
{{--                            <a class="navbar-link" href="#">--}}
{{--                                <span>Advertise details</span>--}}
{{--                                <i class="fas fa-plus"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-list">--}}
{{--                                <li><a class="dropdown-link" href="ad-details-grid.html">ad details grid</a></li>--}}
{{--                                <li><a class="dropdown-link" href="ad-details-left.html">ad details left</a></li>--}}
{{--                                <li><a class="dropdown-link" href="ad-details-right.html">ad details right</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="navbar-item navbar-dropdown">--}}
{{--                            <a class="navbar-link" href="#">--}}
{{--                                <span>Pages</span>--}}
{{--                                <i class="fas fa-plus"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-list">--}}
{{--                                <li><a class="dropdown-link" href="about.html">About Us</a></li>--}}
{{--                                <li><a class="dropdown-link" href="compare.html">Ad Compare</a></li>--}}
{{--                                <li><a class="dropdown-link" href="cities.html">Ad by Cities</a></li>--}}
{{--                                <li><a class="dropdown-link" href="price.html">Pricing Plan</a></li>--}}
{{--                                <li><a class="dropdown-link" href="user-form.html">User Form</a></li>--}}
{{--                                <li><a class="dropdown-link" href="404.html">404</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="navbar-item navbar-dropdown">--}}
{{--                            <a class="navbar-link" href="#">--}}
{{--                                <span>blogs</span>--}}
{{--                                <i class="fas fa-plus"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-list">--}}
{{--                                <li><a class="dropdown-link" href="blog-list.html">Blog list</a></li>--}}
{{--                                <li><a class="dropdown-link" href="blog-details.html">blog details</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="navbar-item"><a class="navbar-link" href="contact.html">Contact</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="tab-pane" id="author-menu">--}}
{{--                    <ul class="navbar-list">--}}
{{--                        <li class="navbar-item"><a class="navbar-link" href="dashboard.html">Dashboard</a></li>--}}
{{--                        <li class="navbar-item"><a class="navbar-link" href="profile.html">Profile</a></li>--}}
{{--                        <li class="navbar-item"><a class="navbar-link" href="ad-post.html">Ad Post</a></li>--}}
{{--                        <li class="navbar-item"><a class="navbar-link" href="my-ads.html">My Ads</a></li>--}}
{{--                        <li class="navbar-item"><a class="navbar-link" href="setting.html">Settings</a></li>--}}
{{--                        <li class="navbar-item navbar-dropdown">--}}
{{--                            <a class="navbar-link" href="bookmark.html">--}}
{{--                                <span>bookmark</span>--}}
{{--                                <span>0</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navbar-item navbar-dropdown">--}}
{{--                            <a class="navbar-link" href="message.html">--}}
{{--                                <span>Message</span>--}}
{{--                                <span>0</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navbar-item navbar-dropdown">--}}
{{--                            <a class="navbar-link" href="notification.html">--}}
{{--                                <span>Notification</span>--}}
{{--                                <span>0</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navbar-item"><a class="navbar-link" href="user-form.html">Logout</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="sidebar-footer">--}}
{{--                <p>All Rights Reserved By <a href="#">Classicads</a></p>--}}
{{--                <p>Developed By <a href="https://themeforest.net/user/mironcoder">Mironcoder</a></p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</aside>--}}
<!--=====================================
            SIDEBAR PART END
=======================================-->

@yield('content')

<!--=====================================
            MOBILE-NAV PART START
=======================================-->
<nav class="mobile-nav">
    <div class="container">
        <div class="mobile-group">
            <a href="index.html" class="mobile-widget">
                <i class="fas fa-home"></i>
                <span>home</span>
            </a>
            <a href="/forms" class="mobile-widget">
                <i class="fas fa-user"></i>
                <span>join me</span>
            </a>
            <a href="ad-post.html" class="mobile-widget plus-btn">
                <i class="fas fa-plus"></i>
                <span>Ad Post</span>
            </a>
            <a href="notification.html" class="mobile-widget">
                <i class="fas fa-bell"></i>
                <span>notify</span>
                <sup>0</sup>
            </a>
            <a href="message.html" class="mobile-widget">
                <i class="fas fa-envelope"></i>
                <span>message</span>
                <sup>0</sup>
            </a>
        </div>
    </div>
</nav>
<!--=====================================
            MOBILE-NAV PART END
=======================================-->


<!--=====================================
            FOOTER PART PART
=======================================-->
<footer class="footer-part">
    <div class="container">
        <div class="row newsletter">
            <div class="col-lg-6">
                <div class="news-content">
                    <h2>Subscribe for Latest Offers</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, aliquid reiciendis! Exercitationem soluta provident non.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <form class="news-form">
                    <input type="text" placeholder="Enter Your Email Address">
                    <button class="btn btn-inline">
                        <i class="fas fa-envelope"></i>
                        <span>Subscribe</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-content">
                    <h3>Contact Us</h3>
                    <ul class="footer-address">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <p>KKM Ltd, Chmielna 2/31<span>00-020 Warsaw, Poland</span></p>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <p><span>info@newcontract.eu</span></p>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-content">
                    <h3>Quick Links</h3>
                    <ul class="footer-widget">
                        <li><a href="{{route('ad.index')}}">All ads</a></li>
                        <li><a href="{{route('dual.index')}}">Dual Career</a></li>
                        <li><a href="{{route('profile')}}">My Account</a></li>
                        <li><a href="{{route('blog.index')}}">Blog</a></li>
{{--                        <li><a href="#">Faq</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-content">
                    <h3>Information</h3>
                    <ul class="footer-widget">
                        <li><a href="{{route('about.index')}}">About Us</a></li>
                        <li><a href="#">Privacy policy</a></li>
{{--                        <li><a href="#">Secure Payment</a></li>--}}
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
            </div>
{{--            <div class="col-sm-6 col-md-6 col-lg-3">--}}
{{--                <div class="footer-info">--}}
{{--                    <a href="#"><img src="images/logo.png" alt="logo"></a>--}}
{{--                    <ul class="footer-count">--}}
{{--                        <li>--}}
{{--                            <h5>929,238</h5>--}}
{{--                            <p>Registered Users</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <h5>242,789</h5>--}}
{{--                            <p>Community Ads</p>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="footer-card-content">--}}
{{--                    <div class="footer-payment">--}}
{{--                        <a href="#"><img src="images/pay-card/01.jpg" alt="01"></a>--}}
{{--                        <a href="#"><img src="images/pay-card/02.jpg" alt="02"></a>--}}
{{--                        <a href="#"><img src="images/pay-card/03.jpg" alt="03"></a>--}}
{{--                        <a href="#"><img src="images/pay-card/04.jpg" alt="04"></a>--}}
{{--                    </div>--}}
{{--                    <div class="footer-option">--}}
{{--                        <button type="button" data-toggle="modal" data-target="#language"><i class="fas fa-globe"></i>English</button>--}}
{{--                        <button type="button" data-toggle="modal" data-target="#currency"><i class="fas fa-dollar-sign"></i>USD</button>--}}
{{--                    </div>--}}
{{--                    <div class="footer-app">--}}
{{--                        <a href="#"><img src="images/play-store.png" alt="play-store"></a>--}}
{{--                        <a href="#"><img src="images/app-store.png" alt="app-store"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="footer-end">
        <div class="container">
            <div class="footer-end-content">
                <p>All Copyrights Reserved &copy; 2023 - Developed by KKM Ltd. </p>
                <ul class="footer-social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</footer>
<!--=====================================
            FOOTER PART END
=======================================-->


<!--=====================================
          CURRENCY MODAL PART START
=======================================-->
{{--<div class="modal fade" id="currency">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h4>Choose a Currency</h4>--}}
{{--                <button class="fas fa-times" data-dismiss="modal"></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <button class="modal-link active">United States Doller (USD) - $</button>--}}
{{--                <button class="modal-link">Euro (EUR) - €</button>--}}
{{--                <button class="modal-link">British Pound (GBP) - £</button>--}}
{{--                <button class="modal-link">Australian Dollar (AUD) - A$</button>--}}
{{--                <button class="modal-link">Canadian Dollar (CAD) - C$</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--=====================================
          CURRENCY MODAL PART END
=======================================-->


<!--=====================================
          LANGUAGE MODAL PART END
=======================================-->
{{--<div class="modal fade" id="language">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h4>Choose a Language</h4>--}}
{{--                <button class="fas fa-times" data-dismiss="modal"></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <button class="modal-link active">English</button>--}}
{{--                <button class="modal-link">bangali</button>--}}
{{--                <button class="modal-link">arabic</button>--}}
{{--                <button class="modal-link">germany</button>--}}
{{--                <button class="modal-link">spanish</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--=====================================
           LANGUAGE MODAL PART END
=======================================-->


<!--=====================================
            JS LINK PART START
=======================================-->
<!-- VENDOR -->
<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('js/vendor/popper.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/vendor/slick.min.js')}}"></script>

<!-- CUSTOM -->
<script src="{{asset('js/custom/slick.js')}}"></script>
<script src="{{asset('js/custom/main.js')}}"></script>
<!--=====================================
            JS LINK PART END
=======================================-->
</body>
</html>
