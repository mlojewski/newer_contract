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
                            <h3>Blogs</h3>
                            <a href="{{route('person.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><h4>Last name </h4><p>Birthday</p><p>actions</p></li>
                            @foreach($people as $person)
                                <li><h5>{{$person->name}}</h5><p>{{$person->last_name}}</p><p>{{$person->birth_date}}</p>
                                    <form method="POST" action = "{{route('person.delete', ['id' => $person->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="GET" action = "{{route('person.edit', ['id' => $person->id])}}">
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
