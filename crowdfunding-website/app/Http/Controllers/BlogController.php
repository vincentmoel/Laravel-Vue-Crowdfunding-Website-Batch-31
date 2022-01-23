<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    public function random($count)
    {
        $blogs = Blog::inRandomOrder()->limit($count)->get();


        $data['blogs'] = $blogs;

        return response()->json([
            'code'      => '200',
            'status'    => 'success',
            'message'   => 'success',
            'data'      => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'image' => 'required',

        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'description'=> $request->description
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_extension = $image->getClientOriginalExtension();
            $image_name = $blog->id. "." . $image_extension;
            $image_folder = '/photos/blog/';
            $image_location = $image_folder . $image_name;
            
            try{
                $image->move(public_path($image_folder), $image_name);

                $blog->update(['image' => $image_location]);
            }catch(\Exception $e){
                return response()->json([
                    'code'      => '000',
                    'status'    => 'failed',
                    'message'   => 'failed upload photo profile',
                ]);
            }
        }
        
        
        $data['blog'] = $blog;
        return response()->json([
            'code'      => 200,
            'status'    => 'success',
            'message'   => 'success',
            'data'      => $data
        ]);
    }
}
