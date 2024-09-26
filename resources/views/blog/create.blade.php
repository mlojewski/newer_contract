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
                        <h2>ad post</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Blog Create</a></li>
                        </ol>
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
                    <form class="adpost-form" id="blogForm" action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3>Blog</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Blog photo</label>
                                        <input type="file" name="photo_url" class="form-control" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Blog Category</label>
                                        <input type="text" class="form-control" name="category" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Blog content</label>
                                        <textarea class="form-control" name="body" required = "required"></textarea>
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
