<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use PhpParser\Node\Stmt\Return_;
use Session;
USE Illuminate\Support\Facades\Redirect;
session_start();


class SuperAdminController extends Controller
{
    public function index()
    {
        $this->authCheck();
        return view('admin.pages.dashboard');
    }

    public function addCategory()
    {
        return view('admin.pages.add-category');
    }

    public function saveCategory(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_slug'] = str_slug($request->category_name);
        $data['category_description'] = $request->category_description;
        $data['status'] = $request->status;

//        Category::create($dat a);
       DB::table('category')
           ->insert($data);
        Session::put('message', 'Category Info Saved Successfully!');
        return redirect('/add-category');

//            ->with('msg', "category Saved");
//        $test = $request->all();8ik,
//        dd($test);

    }
    public function adminLogout()
    {
        Session::put('admin_id','');
        Session::put('admin_name','');

        Session::put('message','You are successfully Logged Out!');
        return Redirect::to('/admin');
    }
    public function ManageCategory()
    {
        $all_category=DB::table('category')
            ->get();

        return view('admin.pages.manage_category')
            ->with('all_category', $all_category);
    }
    public function ManageBlog()
    {
        $all_blog = DB::table('tbl_blog')
            ->get();
        return view('admin.pages.manage_blog')
            ->with('all_blog', $all_blog);
    }
    Public function unpublishCategory($category_id)
    {
        DB::table('category')
            ->where('id', $category_id)
            ->update(['status'=>0]);
        Return Redirect::to('/manage-category');

    }
    Public function publishCategory($category_id)
    {
        DB::table('category')
            ->where('id', $category_id)
            ->update(['status'=>1]);
        Return Redirect::to('/manage-category');

    }
    Public function editCategory($category_id)
    {
        $category_info=DB::table('category')
            ->where('id', $category_id)
            ->first();
        Return view('admin.pages.edit-category')
            ->with('category_info', $category_info);
    }
    public function editBlog($blog_id)
    {
        $blog_info = DB::table('tbl_blog')
            ->where ('id', $blog_id)
            ->first();
        $category_info=DB::table('category')
            ->get();
        Return view('admin.pages.edit-blog')
            ->with('blog_info', $blog_info)
            ->with('category_info', $category_info);
    }

    public function updateCategory(Request $request)
    {
        $data=array();
        $category_id=$request->category_id;
        echo $category_id;

        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;


        DB::table('category')
            ->where('id',$category_id)
            ->update($data);
       Return Redirect::to('/edit-category/'.$category_id);
    }
    public function updateBlog(Request $request)
    {

        $data = array();
        $blog_id = $request->blog_id;
        $data['category_id'] = $request->category_id;
        $data['blog_title'] = $request->blog_title;
        $data['blog_long_description'] = $request->long_description;
        $data['blog_short_description'] = $request->short_description;
        $data['author_name'] = Session::get('admin_name');
        $data['publication_status'] = $request->status;

//       echo '<pre>';
//        print_r($data);

        /*
         * image upload
         */
        $files = $request->file('image');

        if ($files != NULL) {
            $filename = $files->getClientOriginalName();
            $picture = date('his').$filename;
            $image_url = 'public/blog_image/'. $picture;
            $destinationPath = base_path().'/public/blog_image/';
            $success = $files->move($destinationPath, $picture);


            if ($success) {

                $data['blog_image'] = $image_url;
                DB::table('tbl_blog')
                    ->where('id', $blog_id)
                    ->update($data);
                Session::put('message', 'Blog added Successfully');
                unlink($request->blog_old_image);
                Return Redirect::to('/manage-blog');
//            Return Redirect::to('/edit-blog/' . $blog_id);
            }
        }
        else {

            DB::table('tbl_blog')
                ->where('id', $blog_id)
                ->update($data);
            Session::put('message', 'Blog Updated Successfully');
            Return Redirect::to('/edit-blog/'.$blog_id);
        }

    }




    Public function deleteCategory($category_id)
    {
        DB::table('category')
            ->where('id', $category_id)
            ->delete();
        Return Redirect::to('/manage-category');
    }
    Public function deleteBlog($blog_id)
    {
        DB::table('tbl_blog')
            ->where('id', $blog_id)
            ->delete();
        Return Redirect::to('/manage-blog');
    }

    public function authCheck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==NULL)
        {
            return Redirect::to('/admin')->send();
        }
    }
    public function addBlog(){
        $category_info=DB::table('category')
            ->get();
        Return view('admin.pages.add-blog')
            ->with('category_info', $category_info);
    }



    public function saveBlog(Request $request)
    {
        $data=array();
        $data['category_id']=$request->category_id;
        $data['blog_title']=$request->blog_title;
        $data['blog_long_description']=$request->long_description;
        $data['blog_short_description']=$request->short_description;
        $data['author_name']=Session::get('admin_name');
        $data['publication_status']=$request->status;

        /*
         * image upload
         */
        $files=$request->file('blog_image');
        $filename=$files->getClientOriginalName();
        $picture=date('his').$filename;
        $image_url='public/blog_image/'.$picture;
        $destinationPath=base_path().'/public/blog_image/';
        $success=$files->move($destinationPath,$picture);

            if ($success)
            {
                $data['blog_image']=$image_url;
                DB::table('tbl_blog')
                    ->insert($data);
            }

        Session::put('message','Blog added Successfully');
        Return Redirect::to('/add-blog');
    }

}