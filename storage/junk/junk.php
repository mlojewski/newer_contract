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

