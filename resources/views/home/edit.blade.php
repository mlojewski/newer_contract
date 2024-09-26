@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{asset('css/custom/ad-post.css')}}">
    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    <section class="single-banner dashboard-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>Home content edit</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->

    <!--=====================================
                        ADPOST PART START
            =======================================-->
    <section class="adpost-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form class="adpost-form" id="blogForm" action="{{route('home.update', ['id'=>$content->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3>Home</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Featured title</label>
                                        <input type="text" class="form-control" value="{{$content->featured_title}}" name="featured_title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Featured content</label>
                                        <input type="text" class="form-control" name="featured_content" value="{{$content->featured_content}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Top sports title</label>
                                        <input type="text" class="form-control" value="{{$content->top_sports_title}}" name="top_sports_title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Top sports content</label>
                                        <input type="text" class="form-control" name="top_sports_content" value="{{$content->top_sports_content}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Partners title</label>
                                        <input type="text" class="form-control" value="{{$content->partners_title}}" name="partners_title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Partners content</label>
                                        <input type="text" class="form-control" name="partners_content" value="{{$content->partners_content}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Top countries title</label>
                                        <input type="text" class="form-control" value="{{$content->top_countries_title}}" name="top_countries_title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Top countries content</label>
                                        <input type="text" class="form-control" name="top_countries_content" value="{{$content->top_countries_title}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Blog title</label>
                                        <input type="text" class="form-control" value="{{$content->blog_title}}" name="blog_title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Blog content</label>
                                        <input type="text" class="form-control" name="blog_content" value="{{$content->blog_content}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Dual title</label>
                                        <input type="text" class="form-control" value="{{$content->dual_title}}" name="dual_title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Dual content</label>
                                        <input type="text" class="form-control" name="dual_content" value="{{$content->dual_content}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Pricing title</label>
                                        <input type="text" class="form-control" value="{{$content->pricing_title}}" name="pricing_title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Pricing content</label>
                                        <input type="text" class="form-control" name="pricing_content" value="{{$content->pricing_content}}">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-inline">
                                <i class="fas fa-check-circle"></i>
                                <span>Publish</span>
                            </button>
                        </div>

                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Recent articles</h3>
                        </div>
                        <ul class="account-card-text">
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                ADPOST PART END
    =======================================-->

@endsection
