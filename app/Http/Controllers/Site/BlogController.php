<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Site\SiteController;
use App\Repositories\MenusRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\CommentsRepository;



class BlogController extends SiteController
{
    public function __construct(MenusRepository $m_rep, CompaniesRepository $c_rep, ArticlesRepository $a_rep, CommentsRepository $comm_rep) {
        parent::__construct($m_rep, $c_rep, $a_rep);
        $this->page = env('THEM').'.site.articles';
        $this->title = 'Blog';
        $this->comm_rep = $comm_rep;
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->getArticles();
        //dd($articles);
        $content = view(env('THEM').'.site.articles_content')->with('articles', $articles)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->getView();
    }
    
    public function getArticles() {
        parent::getArticles();
        $articles = $this->a_rep->get('*', FALSE, FALSE, config('settings.paginate'));
       
        return $articles;
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                
        $this->page = env('THEM').'.site.article';
        $this->title = 'Articol';        
        $article = $this->a_rep->getByID($id);  
        $comments = $this->getComments($id); 
        //dd($comments);
        $this->content = view(env('THEM').'.site.article_content')->with(['article'=> $article, 'comments' => $comments])->render();       
        return $this->getView();
    }
    
    
    
    
    public function getComments($id) {
        
        $article = $this->a_rep->getByID($id);
        $article->load('comments');
        $comments = $article->comments->groupBy('parent');
        return $comments;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
