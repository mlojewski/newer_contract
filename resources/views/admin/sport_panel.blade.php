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
                            <h3>Sports</h3>
                            <a href="{{route('sport.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><p>Icon</p><p>Actions</p></li>
                            @foreach($sports as $sport)
                                <li><h5>{{$sport->name}}</h5>
                                    @if($sport->SportLogo)
                                        <p>
                                            <img style="max-height: 40px" src="{{Storage::url($sport->SportLogo->path)}}">
                                        </p>
                                    @endif

                                <p>
                                    <form method="POST" action = "{{route('sport.delete', ['id' => $sport->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="GET" action = "{{route('sport.edit', ['id' => $sport->id])}}">
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
