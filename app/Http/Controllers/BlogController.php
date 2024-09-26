<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogPhoto;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('blog_photos')->get();

        return view('blog.index', ['blogs' => $blogs]);
    }

    public function show($id)
    {
        $blog = Blog::with('blog_photos')->where('id', $id)->first();

        return view('blog.single', ['blog' => $blog]);
    }

    public function create()
    {
        return view('blog.create');
    }
    public function store(Request $request)
    {
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->body = $request->body;
        $blog ->save();

        if ($request->photo_url) {
            $path = $request->photo_url->store('public/blog_photos');

            $blogPhoto = new BlogPhoto();
            $blogPhoto->path = $path;
            $blogPhoto->blog_id = $blog->id;

            $blogPhoto->save();
        }

        return redirect('admin/blog_panel');
    }

    public function delete($id)
    {
       Blog::destroy($id);

        return redirect('/admin/panel');
    }

    public function edit($id)
    {

        $blog = Blog::with('blog_photos')->where('id', $id)->first();

        return view('blog.edit', [
            'blog' => $blog
        ]);
    }

    public function update($id, Request $request)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->body = $request->body;

        if ($request->photo_url) {
            $path = $request->photo_url->store('public/blog_photos');

            $blogPhoto = BlogPhoto::where('blog_id', $blog->id)->first();
            if ($blogPhoto == null) {
                $blogPhoto = new BlogPhoto();
            }

            $blogPhoto->path = $path;
            $blogPhoto->blog_id = $blog->id;

            $blogPhoto->save();
        }
        $blog ->save();
        return redirect('/admin/panel');
    }

}
