@extends('layouts.admin_panel')

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
                            <h3>Cities</h3>
                            <a href="{{route('city.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>city</h4><p>In </p><p>actions</p></li>
                            @foreach($cities as $city)
                                <li><h5>{{$city->name}}</h5><p>{{$city->country->name}}</p>
                                    <form method="POST" action = "{{route('city.delete', ['id' => $city->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="GET" action = "{{route('city.edit', ['id' => $city->id])}}">
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
