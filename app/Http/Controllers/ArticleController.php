<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Banner;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function getArticle()
    {
    	$articles = Article::select('id','a_name','a_slug','a_description','a_avatar','created_at')
        ->orderByDesc('id')->paginate(10);

        $articleHot = Article::select('id','a_name','a_slug','a_description','a_avatar','created_at')
        ->where('a_hot',Article::HOT)->orderByDesc('updated_at')->limit(4)->get();

        $banner = Banner::where('banner_status',Banner::STATUS_PUBLIC)->where('banner_type','=',4)->orderByDesc('updated_at')->limit(1)->get();

        $viewData = [
            'articles' => $articles,
            'articleHot' => $articleHot,
            'banner' => $banner
        ];
    	return view('article.index',$viewData);
    }

    public function getDetailArticle(Request $request)
    {
    	$arrayUrl = (preg_split("/(-)/i", $request->segment(2)));
    	$id = array_pop($arrayUrl);
    	if($id)
    	{
    		$articleDetail = Article::find($id);
    		$articleHot = Article::select('id','a_name','a_slug','a_description','a_avatar','created_at')
            ->where('a_hot',Article::HOT)->orderByDesc('updated_at')->limit(4)->get();

    		$viewData = [
    			'articleDetail' => $articleDetail,
    			'articleHot' => $articleHot,

    		];

    		return view('article.detail',$viewData);
    	}
    	return redirect('/');
    }
}
