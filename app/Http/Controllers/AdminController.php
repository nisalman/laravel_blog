<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
Use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin_login');
    }
    public function adminLoginCheck(Request $request)
    {
        $email_address = $request->email_address;
        $password = $request->password;
//        echo $email_address.'----',$password;
        $result = DB::table('admin')
            ->select('*')
            ->where('admin_email', $email_address)
            ->where('admin_password', md5($password))
            ->first();
        if ($result) {
            Session::put('admin_id', $result->id);
            Session::put('admin_name', $result->admin_name);
            Session::put('access_label', $result->access_label);
            echo'<pre>';
            print_r($result) ;
            return Redirect::to('/dashboard');
        } else {
            Session::put('exception', 'Your USER ID or Password is Invalid!');
            return Redirect::to('/admin');

            /*this is sample comment*/
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}