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
                            <h3>Countries</h3>
                            <a href="{{route('country.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><p>flag </p><p>Actions</p></li>
                            @foreach($countries as $country)
                                <li><h5>{{$country->name}}</h5>
                                    @if($country->flag)
                                        <p><img style="max-height: 40px" src="{{Storage::url($country->flag->path)}}"> </p>
                                    @endif
                                    <form method="POST" action = "{{route('country.delete', ['id' => $country->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="GET" action = "{{route('country.edit', ['id' => $country->id])}}">
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
