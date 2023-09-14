<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*
    public function contact(){
        return view('contact-us');
    }
    */
    public function sendEmail(Request $request){
        $datalis=[
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to('enas4alpha@gmail.com')->send(new ContactMail($datalis));
        return back()->with('message_sent','Your Message has been sent successfully!');
       // return redirect()->route('home')->with('message', 'Your Entry saved');

    }

}
