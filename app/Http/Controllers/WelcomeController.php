<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $blog= view('pages.blog');

        return view('home')
            ->with('blog',$blog);
    }
    public function portfolio()
    {
        $portfolio= view('pages.portfolio');

        return view('home')
            ->with('portfolio',$portfolio);
    }
    public function blogDetails($blog_id)
    {
        $blog_info=DB::table('tbl_blog')
            ->where('id', $blog_id)
            ->first();
        /* Hit Counter Starts*/
        $data['hit_counter']=$blog_info->hit_counter+1;
        DB::table('tbl_blog')
            ->where('id', $blog_id)
            ->update($data);
        /* Hit Counter End*/
        $blog_info=DB::table('tbl_blog')
            ->where('id', $blog_id)
            ->first();

        $blog_details= view('pages.blog_details')
            ->with('blog_info', $blog_info);

        return view('home')
            ->with('blog_details', $blog_details);

    }
}
