<?php
// formularze filtrowania w nagłówku menu
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

// ikonki z menu - polubienie itp
                <ul class="header-list">
                    <li class="header-item">
                        <a href="bookmark.html" class="header-widget">
                            <i class="fas fa-heart"></i>
                            <sup>0</sup>
                        </a>
                    </li>
                    <li class="header-item">
                        <button type="button" class="header-widget">
                            <i class="fas fa-envelope"></i>
                            <sup>0</sup>
                        </button>
                        <div class="dropdown-card">
                            <div class="dropdown-header">
                                <h5>message (2)</h5>
                                <a href="message.html">view all</a>
                            </div>
                            <ul class="message-list">
                                <li class="message-item unread">
                                    <a href="message.html" class="message-link">
                                        <div class="message-img active">
                                            <img src="images/avatar/01.jpg" alt="avatar">
                                        </div>
                                        <div class="message-text">
                                            <h6>miron mahmud <span>now</span></h6>
                                            <p>How are you my best frien...</p>
                                        </div>
                                        <span class="message-count">4</span>
                                    </a>
                                </li>
                                <li class="message-item">
                                    <a href="message.html" class="message-link">
                                        <div class="message-img active">
                                            <img src="images/avatar/03.jpg" alt="avatar">
                                        </div>
                                        <div class="message-text">
                                            <h6>shipu ahmed <span>3m</span></h6>
                                            <p><span>me:</span>How are you my best frien...</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="message-item unread">
                                    <a href="message.html" class="message-link">
                                        <div class="message-img">
                                            <img src="images/avatar/02.jpg" alt="avatar">
                                        </div>
                                        <div class="message-text">
                                            <h6>tahmina bonny <span>2h</span></h6>
                                            <p>How are you my best frien...</p>
                                        </div>
                                        <span class="message-count">12</span>
                                    </a>
                                </li>
                                <li class="message-item">
                                    <a href="message.html" class="message-link">
                                        <div class="message-img active">
                                            <img src="images/avatar/04.jpg" alt="avatar">
                                        </div>
                                        <div class="message-text">
                                            <h6>nasrullah <span>5d</span></h6>
                                            <p>How are you my best frien...</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="message-item">
                                    <a href="message.html" class="message-link">
                                        <div class="message-img">
                                            <img src="images/user.png" alt="avatar">
                                        </div>
                                        <div class="message-text">
                                            <h6>saikul azam <span>7w</span></h6>
                                            <p><span>me:</span>How are you my best frien...</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="message-item">
                                    <a href="message.html" class="message-link">
                                        <div class="message-img active">
                                            <img src="images/avatar/02.jpg" alt="avatar">
                                        </div>
                                        <div class="message-text">
                                            <h6>munni akter <span>9m</span></h6>
                                            <p>How are you my best frien...</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="message-item">
                                    <a href="message.html" class="message-link">
                                        <div class="message-img active">
                                            <img src="images/avatar/03.jpg" alt="avatar">
                                        </div>
                                        <div class="message-text">
                                            <h6>shahin alam <span>1y</span></h6>
                                            <p>How are you my best frien...</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-item">
                        <button type="button" class="header-widget">
                            <i class="fas fa-bell"></i>
                            <sup>0</sup>
                        </button>
                        <div class="dropdown-card">
                            <div class="dropdown-header">
                                <h5>Notification (1)</h5>
                                <a href="notification.html">view all</a>
                            </div>
                            <ul class="notify-list">
                                <li class="notify-item active">
                                    <a href="#" class="notify-link">
                                        <div class="notify-img">
                                            <img src="images/avatar/01.jpg" alt="avatar">
                                        </div>
                                        <div class="notify-content">
                                            <p class="notify-text"><span>miron mahmud</span> has added the advertisement post of your <span>booking</span> to his wishlist.</p>
                                            <span class="notify-time">just now</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="notify-item">
                                    <a href="#" class="notify-link">
                                        <div class="notify-img">
                                            <img src="images/avatar/02.jpg" alt="avatar">
                                        </div>
                                        <div class="notify-content">
                                            <p class="notify-text"><span>tahmina bonny</span> gave you a <span>comment</span> and 5 star <span>review.</span></p>
                                            <span class="notify-time">2 hours ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="notify-item">
                                    <a href="#" class="notify-link">
                                        <div class="notify-img">
                                            <img src="images/avatar/03.jpg" alt="avatar">
                                        </div>
                                        <div class="notify-content">
                                            <p class="notify-text"><span>shipu ahmed</span> and <span>4 other</span> have seen your contact number</p>
                                            <span class="notify-time">3 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="notify-item">
                                    <a href="#" class="notify-link">
                                        <div class="notify-img">
                                            <img src="images/avatar/02.jpg" alt="avatar">
                                        </div>
                                        <div class="notify-content">
                                            <p class="notify-text"><span>miron mahmud</span> has added the advertisement post of your <span>booking</span> to his wishlist.</p>
                                            <span class="notify-time">5 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="notify-item">
                                    <a href="#" class="notify-link">
                                        <div class="notify-img">
                                            <img src="images/avatar/04.jpg" alt="avatar">
                                        </div>
                                        <div class="notify-content">
                                            <p class="notify-text"><span>labonno khan</span> gave you a <span>comment</span> and 5 star <span>review.</span></p>
                                            <span class="notify-time">4 months ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="notify-item">
                                    <a href="#" class="notify-link">
                                        <div class="notify-img">
                                            <img src="images/avatar/01.jpg" alt="avatar">
                                        </div>
                                        <div class="notify-content">
                                            <p class="notify-text"><span>azam khan</span> and <span>4 other</span> have seen your contact number</p>
                                            <span class="notify-time">1 years ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
//sidebar na głóœnej
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
