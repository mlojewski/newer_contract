<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory(10)->create();
        BlogPhoto::factory(10)->create();

        $blogPhotos = BlogPhoto::all();
        foreach ($blogPhotos as $photo) {
            $photo->blog_id = $photo->id;
            $photo->save();
        }
    }
}
