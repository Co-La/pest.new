<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Site\SiteController;
use App\Repositories\MenusRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\ArticlesRepository;
use Cache;
use DB;

class IndexController extends SiteController
{
    
   public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep, CompaniesRepository $c_rep) {
       parent::__construct($m_rep, $c_rep, $a_rep);
       $this->title = 'STIRI';
       
   }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {

        Cache::remember('firstnews', 20, function() {
            return  $firstnews = $this->getArticle();
        });

        $this->vars = array_add($this->vars, 'content', Cache::get('firstnews'));
        return $this->getView();
    }
    
       
    public function getArticle() {
        
        $article = $this->a_rep->getFirst();
        $firstnews = view(env('THEM').'.site.firstnews')->with('article', $article)->render();
        return $firstnews;
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
