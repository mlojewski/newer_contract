@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/custom/blog-details.css')}}">
    <!--=====================================
                 SINGLE BANNER PART START
       =======================================-->
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{$blog->title}}</h2>
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>--}}
{{--                            <li class="breadcrumb-item"><a href="blog-list.html">blog-list</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">blog-details</li>--}}
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
                    BLOG DETAILS PART START
        ===========================================-->
<section class="blog-details-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="blog-details-title">
                    <h2><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit maxime tempore natus laborum autem.</a></h2>
                </div>
                <ul class="blog-details-meta">

                    <li>
                        <a href="#">
                            <i class="far fa-calendar-alt"></i>
                            <p>{{$blog->created_at->format('d-m-Y')}}</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="far fa-folder-open"></i>
                            <p>{{$blog->category}}</p>
                        </a>
                    </li>

                    </li>

                </ul>
                <div class="blog-details-image">
                    <img src="{{Storage::url($blog->blog_photos[0]->path)}}" alt="ll">
                </div>
                <div class="blog-details-content">
                    <div class="description">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore incidunt harum ea a dolorem neque labore animi? Asperiores necessitatibus voluptate ut iure alias, odit animi consequuntur fugiat esse atque sit aut reprehenderit mollitia dignissimos quasi vel quo neque eaque voluptates provident qui. At, debitis corporis. Asperiores quod, dolorum earum sunt eveniet dolores similique amet? Neque vel dolores quasi reiciendis rem dicta amet, ab tempore? Porro quos, alias nisi adipisci sed et architecto quis ipsam minus sint! Consequuntur minima excepturi dolor, nostrum dolore asperiores, atque laudantium magnam consequatur pariatur porro repellendus Perspiciatis labore libero quibusdam nobis dicta eum ipsam enim nisi.</p>
                    </div>
                    <div class="sub-content">
                        <h3>How to manage your advertise?</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos quasi deleniti voluptatem sint incidunt quos corporis recusandae repudiandae aspernatur voluptates omnis illum quaerat quidem veritatis, facilis enim quis quo ipsam ipsa doloribus, nostrum adipisci eligendi <a href="#">consequuntur</a> consequatur. Animi molestias ab ex eius, doloremque corporis sunt alias non deleniti doloribus</p>
                    </div>
                    <div class="quote-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id distinctio nulla velit est quidem repellendus esse non saepe cumque sapiente.</p>
                        <h5><a href="">jaurge anderson</a></h5>
                    </div>
                    <ul class="list-content">
                        <li>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quaerat tenetur, <a href="#">aperiam</a> odit, ratione eligendi nulla quae praesentium quo, a reiciendis inventore facilis veniam voluptates.</p>
                        </li>
                        <li>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad ullam impedit, architecto porro voluptas sequi ab beatae saepe quo magnam</p>
                        </li>
                        <li>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Ad ullam impedit architecto porro.</p>
                        </li>
                    </ul>
                </div>
                <div class="blog-details-widget">

                    <ul class="share-list">
                        <li><h4>Share:</h4></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-details-navigate">
                            <a href="#">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <span>Previous Post</span>
                            </a>
                            <a href="#">
                                <span>Next Post</span>
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================================
            BLOG DETAILS PART END
===========================================-->
@endsection
