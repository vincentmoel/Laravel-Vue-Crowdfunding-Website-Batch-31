<?php

namespace Database\Seeders;

use App\Models\Blog;
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
        Blog::create([
            'title'         => 'Judul 1',
            'description'   => 'Desc 1',
            'image'         => 'https://dummyimage.com/1920x1080/000/fff'
        ]);
        Blog::create([
            'title'         => 'Judul 2',
            'description'   => 'Desc 2',
            'image'         => 'https://dummyimage.com/1920x1080/000/fff'
        ]);
        Blog::create([
            'title'         => 'Judul 3',
            'description'   => 'Desc 3',
            'image'         => 'https://dummyimage.com/1920x1080/000/fff'
        ]);
    }
}
