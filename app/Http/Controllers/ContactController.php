<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestContact;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends FrontendController
{
   	public function getContent()
    {
    	return view('contact');
    }

    public function saveContent(RequestContact $requestContact)
    {
    	$data = $requestContact->except('_token');
    	$data['created_at'] = $data['updated_at'] =  Carbon::now();
     	Contact::insert($data);

    	return redirect()->back();
    }
}
