<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailsendController extends Controller
{
    public function create()
    {
        return view('ContactUs');
    }
    public function send(Request $request){
        $content =[
            'subject'=>$request->subject,
            'content'=>$request->content,
            'email'=>$request->email,
           
            
        ];
        

       Mail::to('Basma@example.com')->send(new SendMail($content ));
        
        return 'Done';
    }
}
   






   
    

   
