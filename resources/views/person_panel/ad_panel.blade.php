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
                            <h3>Active ads</h3>

                        </div>
                        <ul class="account-card-list">
                            <li><h4>Title</h4><p>Owner</p><p>Actions</p></li>
                            @foreach($active as $ad)
                                <li><h5><a href="/ad/{{$ad->id}}">{{$ad->title}}</a></h5><p>{{$ad->user->name}} </p>
                                    <p>
                                    <form method="POST" action = "{{route('ad.delete', ['id' => $ad->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Delete</button>
                                    </form>
                                    <form method="GET" action = "{{route('ad.edit', ['id' => $ad->id])}}">
                                        <button class="btn btn-warning" type="submit"> Edit</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>

                        <div class="account-title">
                            <h3>Inactive ads</h3>

                        </div>
                        <ul class="account-card-list">
                            <li><h4>Title</h4><p>Owner</p><p>Actions</p></li>
                            @foreach($inactive as $ad)
                                <li><h5><a href="/ad/{{$ad->id}}">{{$ad->title}}</a></h5><p>{{$ad->user->name}} </p>
                                    <p>
                                    <form method="POST" action = "{{route('ad.delete', ['id' => $ad->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Delete</button>
                                    </form>
                                    <form method="GET" action = "{{route('ad.edit', ['id' => $ad->id])}}">
                                        <button class="btn btn-warning" type="submit"> Edit</button>
                                    </form>
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
