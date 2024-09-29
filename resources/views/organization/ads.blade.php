@extends('layouts.organization_panel')

@section('panel_content')

    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Ads</h3>
                            <a href="{{route('ad.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Title</h4><p>Is the ad active</p><p>Actions</p></li>
                            @foreach($ads as $ad)
                                <li><h5><a href="/ad/edit/{{$ad->id}}">{{$ad->title}}</a></h5><p>@if($ad->is_valid == 1) YES @else NO @endif </p>
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
