<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogs;
class blog extends Controller
{
    public function index(){
        return view('client/index')->with('blogs' , blogs::where('upload_form' , 1)->get());
    }

    public function blog_insert(Request $r){
        $blog_title = $r->post('blog_title');
        $blog = $r->post('blog');
        $blog_img = $r->file('blog_img');
        $ext = $blog_img->extension();
        $file = time() . '.' . $ext;

        $blog_img->storeAs('public/uploads' , $file);
        $model = new blogs;
        $model->blog_title = $blog_title;
        $model->blog = $blog;
        $model->blog_img = $file;
        $model->status = 0;
        $model->upload_form = 1;
        if($model->save()){
            $r->session()->flash('blog_insert' , 1);
        }else{
            $r->session()->flash('blog_insert' , 2);
        }
        return redirect('/');
    }
}
