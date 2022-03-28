<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestArticle;
use App\Models\Article;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::whereRaw(1);

        if($request->filter)
        {
            $articles->where('a_name','like','%'.$request->filter.'%');
        }
        $articles = $articles->get();  

        $viewData = [
            'articles' => $articles
        ];

        return view('admin::article.index',$viewData);
    }

    public function create()
    {
        return view('admin::article.create');
    }

    public function store(RequestArticle $requestArticle)
    {
        $this->insert_update($requestArticle);
        return redirect()->back()->with('success','Thêm mới thành công.');
    }

    public function edit($id)
    {
        $article =  Article::find($id);
        return view('admin::article.update',compact('article'));
    }

    public function update(RequestArticle $requestArticle,$id)
    {
        $this->insert_update($requestArticle,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }

    public function insert_update($requestArticle,$id='')
    {
        $article = new Article();

        if($id)
        {
            $article = Article::find($id);
        }

        $article->a_name = $requestArticle->a_name;
        $article->a_slug = str_slug($requestArticle->a_name);
        $article->a_description = $requestArticle->a_description;
        $article->a_content = $requestArticle->a_content;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_description;

        if($requestArticle->hasFile('a_avatar'))
        {
            $file = upload_image('a_avatar');
            if(isset($file['name']))
            {
                $article->a_avatar = $file['name'];
            }
        }
        
        $article->save(); 
    }
    public function action($action,$id)
    {
        $messages = '';
        if($action)
        {
            $article = Article::find($id);
            switch ($action) {
                case 'delete':
                    $article->delete();
                    $messages = 'Xóa thành công.';
                    break;
                case 'active':
                    $article->a_active = $article->a_active ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $article->save();
                    break;  
                case 'hot':
                    $article->a_hot = $article->a_hot ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $article->save();
                    break;      
            }
            
        }
        return redirect()->back()->with('success',$messages);
    }
}
