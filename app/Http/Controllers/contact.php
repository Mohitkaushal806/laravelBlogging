<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\contacts;
use App\Mail\reply_mail;

class contact extends Controller
{
    public function index(Request $r){
        $email = $r->post('email');
        $message = $r->post('message');
        $model = new contacts;
        $model->email = $email;
        $model->message = $message;
        if($model->save()){
            $r->session()->flash('contact_insert' , 1);
        }else{
            $r->session()->flash('contact_insert' , 2);
        }
        return redirect('/');
    }

    public function sent_reply(Request $r){
        $msg_id = $r->post('msgID');
        $res = contacts::where('id' , $msg_id)->get();
        $details = [
            'title' => "Mohit kaushal",
            'body' => $r->post('msg')
        ];
        $email = "kaushalmohit806@gmail.com";
        Mail::to($res[0]->email)->send(new reply_mail($details));
        echo "success";
        
    }
}
