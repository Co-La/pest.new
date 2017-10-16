<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use App\Repositories\ArticlesRepository;
use Hash;
use App\User;


class ArticlesController extends AdminController
{
    protected $art_rep;

    public function __construct(CategoriesRepository $cat_rep, ArticlesRepository $art_rep)
    {
        parent::__construct($cat_rep);
        $this->art_rep = $art_rep;
        $this->view = env('THEM').'.admin.home';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->getArticles();
        $page_title = 'Articole';
        $this->content = view(env('THEM').'.admin.articles_content')->with(['articles'=> $articles, 'page_title' => $page_title])->render();
        return $this->getView();
    }

    protected function getArticles()
    {
        return $this->art_rep->get('*', FALSE, FALSE, config('settings.list_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->content = view(env('THEM').'.admin.article_content_edit')->render();
        return $this->getView();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->art_rep->save($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        }
        return redirect('admin/articles')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->getArticle($id);
        $this->content = view(env('THEM').'.admin.article_content_edit')->with('article', $article)->render();
        return $this->getView();
    }

    protected function getArticle($id) {
        return $this->art_rep->getByID($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->art_rep->update($request, $id);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        }
        return redirect('admin/articles')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->art_rep->del($id);
        if($del) {
            return response()->json(['true' => TRUE]);
        }
    }
}
