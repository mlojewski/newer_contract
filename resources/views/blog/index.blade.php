@extends('layouts.app')

@section('content')

    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>New Contract blog</h2>
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">blog-list</li>--}}
{{--                        </ol>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->


    <!--=========================================
                BLOG LIST PART START
    ===========================================-->
    <section class="blog-part">
        <div class="container">
            <div class="row content-reverse">
{{--                <div class="col-lg-4">--}}
{{--                    <div class="row">--}}

{{--                        <!-- SEARCH BAR -->--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="blog-sidebar">--}}
{{--                                <div class="blog-sidebar-title">--}}
{{--                                    <h5>Search</h5>--}}
{{--                                </div>--}}
{{--                                <form class="blog-src">--}}
{{--                                    <input type="text" placeholder="Search...">--}}
{{--                                    <button><i class="fas fa-search"></i></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- POPULAR POST -->--}}
{{--                        <div class="col-md-8 col-lg-12 m-auto">--}}
{{--                            <div class="blog-sidebar">--}}
{{--                                <div class="blog-sidebar-title">--}}
{{--                                    <h5>popular post</h5>--}}
{{--                                </div>--}}
{{--                                <ul class="blog-suggest">--}}
{{--                                    <li>--}}
{{--                                        <div class="suggest-img">--}}
{{--                                            <a href="#"><img src="images/blog-suggest/01.jpg" alt="blog"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="suggest-content">--}}
{{--                                            <div class="suggest-title">--}}
{{--                                                <h4><a href="blog-details.html">Lorem ipsum dolor amet elit cusamus aliquid.</a></h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="suggest-meta">--}}
{{--                                                <div class="suggest-date">--}}
{{--                                                    <i class="far fa-calendar-alt"></i>--}}
{{--                                                    <p>02 feb 2020</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="suggest-comment">--}}
{{--                                                    <i class="far fa-comments"></i>--}}
{{--                                                    <p>16</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="suggest-img">--}}
{{--                                            <a href="#"><img src="images/blog-suggest/02.jpg" alt="blog"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="suggest-content">--}}
{{--                                            <div class="suggest-title">--}}
{{--                                                <h4><a href="blog-details.html">Lorem ipsum dolor amet elit cusamus aliquid.</a></h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="suggest-meta">--}}
{{--                                                <div class="suggest-date">--}}
{{--                                                    <i class="far fa-calendar-alt"></i>--}}
{{--                                                    <p>02 feb 2020</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="suggest-comment">--}}
{{--                                                    <i class="far fa-comments"></i>--}}
{{--                                                    <p>13</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="suggest-img">--}}
{{--                                            <a href="#"><img src="images/blog-suggest/03.jpg" alt="blog"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="suggest-content">--}}
{{--                                            <div class="suggest-title">--}}
{{--                                                <h4><a href="blog-details.html">Lorem ipsum dolor amet elit cusamus aliquid.</a></h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="suggest-meta">--}}
{{--                                                <div class="suggest-date">--}}
{{--                                                    <i class="far fa-calendar-alt"></i>--}}
{{--                                                    <p>02 feb 2020</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="suggest-comment">--}}
{{--                                                    <i class="far fa-comments"></i>--}}
{{--                                                    <p>19</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- TOP CATEGORY -->--}}
{{--                        <div class="col-md-8 col-lg-12 m-auto">--}}
{{--                            <div class="blog-sidebar">--}}
{{--                                <div class="blog-sidebar-title">--}}
{{--                                    <h5>Top categories</h5>--}}
{{--                                </div>--}}
{{--                                <ul class="blog-cate">--}}
{{--                                    <li>--}}
{{--                                        <h5><a href="#">Technology</a></h5>--}}
{{--                                        <p>23</p>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <h5><a href="#">Education</a></h5>--}}
{{--                                        <p>17</p>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <h5><a href="#">Business</a></h5>--}}
{{--                                        <p>09</p>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <h5><a href="#">Freelancing</a></h5>--}}
{{--                                        <p>12</p>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- BEST TAGS -->--}}
{{--                        <div class="col-md-8 col-lg-12 m-auto">--}}
{{--                            <div class="blog-sidebar">--}}
{{--                                <div class="blog-sidebar-title">--}}
{{--                                    <h5>Best tags</h5>--}}
{{--                                </div>--}}
{{--                                <ul class="blog-tag">--}}
{{--                                    <li><a href="#">domain</a></li>--}}
{{--                                    <li><a href="#">cloud</a></li>--}}
{{--                                    <li><a href="#">web</a></li>--}}
{{--                                    <li><a href="#">offer</a></li>--}}
{{--                                    <li><a href="#">support</a></li>--}}
{{--                                    <li><a href="#">payment</a></li>--}}
{{--                                    <li><a href="#">E-commerce</a></li>--}}
{{--                                    <li><a href="#">Sequerity</a></li>--}}
{{--                                    <li><a href="#">solution</a></li>--}}
{{--                                    <li><a href="#">knowladge</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- FOLLOW US -->--}}
{{--                        <div class="col-md-8 col-lg-12 m-auto">--}}
{{--                            <div class="blog-sidebar">--}}
{{--                                <div class="blog-sidebar-title">--}}
{{--                                    <h5>follow us</h5>--}}
{{--                                </div>--}}
{{--                                <ul class="blog-icon">--}}
{{--                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-12">
                    <div class="row">

                            @foreach($blogs as $blog)
                        <div class="col-sm-10 col-md-6 col-lg-6 m-auto">
                            <div class="blog-card">
                                <div class="blog-img">

                                    <img src={{Storage::url($blog->blog_photos[0]->path)}} alt="blog">
                                    <div class="blog-overlay">
                                        <span class="marketing">{{$blog->category}}</span>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <p class="blog-avatar">
                                        <img src="{{asset('/images/new_contract_favicon.png')}}" alt="avatar">
                                    </p>
                                    <ul class="blog-meta">

                                        <li>
                                            <i class="fas fa-clock"></i>
                                            <p>{{$blog->created_at->format('d/m/Y')}}</p>
                                        </li>
                                    </ul>
                                    <div class="blog-text">
                                        <h4><a href="blog/{{$blog->id}}">{{$blog->title}}</a></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum perspiciatis...</p>
                                    </div>
                                    <a href="blog/{{$blog->id}}" class="blog-read">
                                        <span>read more</span>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                        <div class="col-sm-10 col-md-6 col-lg-6 m-auto">

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">...</li>
                                <li class="page-item"><a class="page-link" href="#">67</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================================
                    BLOG LIST PART END
    ===========================================-->

@endsection
