<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required',
    		'subject' => 'required',
    		'message' => 'required',
    	]);

    	$sendMessage = new Contact();
    	$sendMessage->name = $request->name;
    	$sendMessage->email = $request->email;
    	$sendMessage->subject = $request->subject;
    	$sendMessage->message = $request->message;
    	$sendMessage->save();

    	Toastr::success('Message Send Succesfully. We will contact you soon.', 'Success', ["positionClass"=>"toast-top-right"]);
    	return redirect()->back();
    }
}
