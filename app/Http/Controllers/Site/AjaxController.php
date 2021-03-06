<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ArticlesRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\MenusRepository;



class AjaxController extends SiteController
{
    public function __construct(MenusRepository $m_rep, CompaniesRepository $c_rep, ProductsRepository $p_rep, ArticlesRepository $a_rep) {
        parent::__construct($m_rep, $c_rep, $a_rep);
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
    }
    
    public function ajaxIndex(Request $request)
    {
        if($request->isMethod('GET')) {
           
            $product_ID = ['id', $request['prod_id']];
            $product = $this->p_rep->takeOne($product_ID);
            if(isset($product->price) && count($product->price) > 0) {                
                $product->price_mdl = $this->exChange($product->price, $product->curr);
            }    
            
            return response()->json($product->toArray());
        }

    }

    public function filter($id)
    {
        $filter_id = ['filter_id', $id];
        $articles = $this->a_rep->getAllByID($filter_id);
        foreach($articles as $article) {
            $article->image = json_decode($article->image);
        }
        return $articles->load('filter');
    }

}
