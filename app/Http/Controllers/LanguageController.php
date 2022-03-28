<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends FrontendController
{
    public function index(Request $request,$languages)
    {
    	
        if ($languages) {
            Session::put('languages', $languages);
        }
        return redirect()->back();
    }
}
