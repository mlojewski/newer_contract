@extends('layouts.user_panel')

@section('panel_content')
    <!--=====================================
                PROFILE PART START
    =======================================-->
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Received</h3>

                        </div>
                        <ul class="account-card-list">
                            <li><h4>Title</h4><p>Already read?</p><p>Actions</p></li>
                            @foreach($received as $message)
                                <li><h5>@if($message->is_viewed != 1) <b><a href="/message/show/{{$message->id}}">{{$message->title}}</a></b>@else <a href="/message/show/{{$message->id}}">{{$message->title}}</a> @endif</h5><p>@if($message->is_viewed == 1) Yes @else No @endif</p>

                                </li>
                            @endforeach
                        </ul>

                        <div class="account-title">
                            <h3>Sent</h3>

                        </div>
                        <ul class="account-card-list">
                            <li><h4>Title</h4><p>Was viewed?</p><p>Actions</p></li>
                            @foreach($sent as $message)
                                <li><h5><a href="/message/show/{{$message->id}}">{{$message->title}}</a></h5><p>@if($message->is_viewed == 1) Yes @else No @endif</p>
                                    <p>
{{--                                    <form method="Get" action = "{{route('ad.deactivate', ['id' => $ad->id])}}">--}}
{{--                                        @csrf--}}
{{--                                        <button class="btn btn-danger" type="submit"> Deactivate</button>--}}
{{--                                    </form>--}}

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                PROFILE PART END
    =======================================-->
@endsection()
