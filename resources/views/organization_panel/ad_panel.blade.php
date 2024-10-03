@extends('layouts.organization_panel')

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
                            <h3>Ads</h3>
                            <a href="{{route('ad.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Title</h4><p>Is active?</p><p>Actions</p></li>
                            @foreach($ads as $ad)
                                <li><h5><a href="/ad/edit/{{$ad->id}}">{{$ad->title}}</a></h5><p>@if($ad->is_valid == 1) Yes @else No @endif</p>
                                    <p>
                                    <form method="Get" action = "{{route('ad.deactivate', ['id' => $ad->id])}}">
                                        @csrf
                                        <button class="btn btn-danger" type="submit"> Deactivate</button>
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
