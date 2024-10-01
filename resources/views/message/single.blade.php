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
                        <h2>blog details</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="blog-list.html">blog-list</a></li>
                            <li class="breadcrumb-item active" aria-current="page">blog-details</li>
                        </ol>
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
                        <h2><a href="#">{{$message->title}}</a></h2>
                    </div>
                    <ul class="blog-details-meta">

                        <li>
                            <a href="#">
                                <i class="far fa-calendar-alt"></i>
                                <p>{{$recipient->name}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-folder-open"></i>
                                <p>{{$sender->name}}</p>
                            </a>
                        </li>

                        </li>

                    </ul>

                    <div class="blog-details-content">
                        <div class="description">
                            <p>{{$message->message_content}}</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-details-navigate">
                                <form method="POST" action = "{{route('message.delete', ['id' => $message->id])}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"> Delete</button>
                                </form>
                                @if(auth()->user() && !auth()->user()->is_admin && auth()->user()->person_id != null)
                                    <a href="{{route('person_panel.message_panel')}}">
                                        @elseif(auth()->user() && auth()->user()->organization_id != null && !auth()->user()->is_admin)

                                <a href="{{route('organization_panel.message_panel')}}">
                                    @endif
                                    <span>Return to messages</span>

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
