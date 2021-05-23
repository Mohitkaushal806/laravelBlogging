<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\blogs;
use App\Models\contacts;

class Admin_controller extends Controller
{
    public function index(Request $r){
        $email = $r->post('email');
        $pass = $r->post('pass');
        $res = admin::where(array('email' => $email , 'password' => $pass))->get();
        if(isset($res[0]->email)){
            $r->session()->put('email' , $res[0]->email);
            $r->session()->put('admin_id' , $res[0]->id);
            return redirect('/admin/dashboard');
        }else{
            $r->session()->flash('error' , 1);
            return redirect('/admin');
        }
    }

    public function dashboard_data(Request $r){
        return view('admin/admin_portal')->with('blogs' , blogs::all());
    }
    public function contact_data(Request $r){
        return view('admin/admin_portal_contact_us')->with('contacts' , contacts::all());
    }

    public function set_trend_blog(Request $r){
        $blog_id = $r->post('blog_id');
        $status = $r->post('status');
        $data['status'] = $status;
        if(blogs::where('blog_id' , $blog_id)->update($data)){
            echo "success";
        }
    }
    
    public function delete_blog(Request $r){
        $blog_id = $r->post('blog_id');
        if(blogs::destroy(array('blog_id' => $blog_id))){
            echo "success";
        }
    }
    public function get_blog(Request $r){
        $blog_id = $r->post('blog_id');
        return blogs::where('blog_id' , $blog_id)->get();
    }
    public function edit_blog(Request $r){
        $blog_id = $r->post('blog_id');
        $blog = $r->post('blog');
        $data["blog"] = $blog;
        if(blogs::where('blog_id' , $blog_id)->update($data)){
            echo "success";
        }
    }

}
