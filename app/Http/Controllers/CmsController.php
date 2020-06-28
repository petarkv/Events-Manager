<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Category;

class CmsController extends Controller
{
    public function contact(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            //Send Contact Email
            $email = "mile.javakv@gmail.com";
            $messageData = [
                'name'=>$data['name'],
                'email'=>$data['email'],
                'subject'=>$data['subject'],
                'comment'=>$data['message']
            ];            
            Mail::send('emails.contact_us',$messageData,function($message)use($email){
                $message->to($email)->subject('Events Manager Contact');
                $message->from('mile.javakv@gmail.com','Events Manager');                
            });
            return \redirect()->back()->with('flash_message_success','Thanks for your enquiry.
                    We will get back to you soon.');
        }

        $categories = Category::get();
        return \view('pages.contact_us')->with(\compact('categories'));    
    }

    public function help(){
        return \view('pages.inquiry');
    }
}
