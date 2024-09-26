@extends('layouts.admin_panel')

@section('panel_content')
    <!--=====================================
                PROFILE PART START
    =======================================-->
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Genders</h3>
                            <a href="{{route('gender.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><p>Actions</p></li>
                            @foreach($genders as $gender)
                                <li><h5>{{$gender->name}}</h5><p>
                                    <form method="POST" action = "{{route('gender.delete', ['id' => $gender->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="GET" action = "{{route('gender.edit', ['id' => $gender->id])}}">
                                        <button class="btn btn-warning" type="submit"> Edytuj</button>
                                    </form>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Organization Types</h3>
                            <a href="{{route('organization_type.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><p>Actions</p></li>
                            @foreach($organization_types as $type)
                                <li><h5>{{$type->name}}</h5><p>
                                    <form method="POST" action = "{{route('organization_type.delete', ['id' => $type->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="get" action = "{{route('organization_type.edit', ['id' => $type->id])}}">
                                        <button class="btn btn-warning" type="submit"> edytuj</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Person Types</h3>
                            <a href="{{route('person_type.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><p>Actions</p></li>
                            @foreach($person_types as $ptype)
                                <li><h5>{{$ptype->name}}</h5><p>
                                    <form method="POST" action = "{{route('person_type.delete', ['id' => $ptype->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="get" action = "{{route('person_type.edit', ['id' => $ptype->id])}}">
                                        <button class="btn btn-warning" type="submit"> edytuj</button>
                                    </form>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Languages</h3>
                            <a href="{{route('language.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><p>Actions</p></li>
                            @foreach($languages as $language)
                                <li><h5>{{$language->name}}</h5><p>
                                    <form method="POST" action = "{{route('language.delete', ['id' => $language->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="get" action = "{{route('language.edit', ['id' => $language->id])}}">
                                        <button class="btn btn-warning" type="submit"> edytuj</button>
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
