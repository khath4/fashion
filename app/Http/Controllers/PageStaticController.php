<?php

namespace App\Http\Controllers;
use App\Models\PageStatic;
use Illuminate\Http\Request;

class PageStaticController extends FrontendController
{
    public function about()
    {
    	$page =  PageStatic::where('ps_type',PageStatic::TYPE_ABOUT)->first();

    	return view('page-statics.about',compact('page'));
    }

    public function shopping()
    {
    	$page =  PageStatic::where('ps_type',PageStatic::TYPE_INFO_SHOPPING)->first();

    	return view('page-statics.shopping',compact('page'));
    }
    public function security()
    {
    	$page =  PageStatic::where('ps_type',PageStatic::TYPE_SECURITY)->first();

    	return view('page-statics.security',compact('page'));
    }

    public function policy()
    {
    	$page =  PageStatic::where('ps_type',PageStatic::TYPE_POLICE)->first();

    	return view('page-statics.policy',compact('page'));
    }
}
