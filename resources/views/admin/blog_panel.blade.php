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
                            <a href="{{route('blog.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Category</h4><p>TITLE </p><p>Actions</p></li>
                            @foreach($blogs as $blog)
                                <li><h5>{{$blog->category}}</h5><p><a href="/blog/{{$blog->id}}">{{$blog->title}}</a> </p>
                                    <p>
                                    <form method="POST" action = "{{route('blog.delete', ['id' => $blog->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Delete</button>
                                    </form>
                                    <form method="GET" action = "{{route('blog.edit', ['id' => $blog->id])}}">
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
