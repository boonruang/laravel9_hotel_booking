<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email',
        ]);  
        
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else{

            $token = hash('sha256',time());

            $obj = new Subscriber();
            $obj->email = $request->email;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();

            $verification_link = url('subscriber/verify/'.$request->email.'/'.$token);

            // Send email
            $subject = 'Subscriber Verification';
            $message = 'Please click on the link below to confirm subscription: <br>';
            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a>';
    

            \Mail::to($request->email)->send(new Websitemail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>'Please check your email to confirm subscription']);
        }        
    }

    public function verify($email,$token)
    {
        $obj = Subscriber::where('email',$email)->where('token',$token)->first();
        $obj->token = '';
        $obj->status = 1;
        $obj->update();

    }
}
