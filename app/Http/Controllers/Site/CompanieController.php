<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Repositories\CompaniesRepository;
use App\Repositories\MenusRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\CategoriesRepository;
use Cache;
use App\Category;


class CompanieController extends SiteController
{

    public function __construct(MenusRepository $m_rep, CompaniesRepository $c_rep, ArticlesRepository $a_rep, ProductsRepository $p_rep,CategoriesRepository $cat_rep) {
        parent::__construct($m_rep, $c_rep, $a_rep);
        $this->p_rep = $p_rep;
        $this->cat_rep = $cat_rep;
        $this->title = 'PESTICIDE';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $companies = $this->getCompanies();
       $this->content = view(env('THEM').'.site.company_content')->with('companies', $companies)->render();
       $this->vars = array_add($this->vars, 'content', $this->content);
        return $this->getView();
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       Cache::remember('companies', 20, function() {
           return $this->getCompanies();
       });
        $company = $this->getCompany($id);
        $products = $this->getProducts($id);
        $company_custom = view(env('THEM').'.site.company_content_custom');
        $this->content = view(env('THEM').'.site.company_content')->with([  'company'   =>  $company,
                                                                            'products'  =>  $products,
                                                                            'companies' =>  Cache::get('companies'),
                                                                            'company_custom' => $company_custom
                                                                        ])->render();
        $this->vars = array_add($this->vars, 'content', $this->content);
        return $this->getView();
    }
    
    public function getCompany($id)
    {
      $company = $this->c_rep->takeOne(FALSE , $id, ['id', 'name']);
        return $company->toArray();
    }
    
    public function getCompanies() 
    {
        $companies = $this->c_rep->get(['id','name']);
        $arr = [];
        $arr['0'] = 'Selectati compania';
        foreach($companies as $company) {           
            $arr[$company->id] = $company->name;
        }
        return $arr;
    }
    
    public function getProducts($id) {

        $company_id = ['company_id', [$id]];
        $products = $this->p_rep->ItemsByID($company_id, ['id', 'name', 'category_id', 'company_id']);
        if(count($products) > 0) {
            $products->load('category', 'company');
        }
        $list = array();
        $list[0] = 'Selectati produsul';
        foreach($products as $product) {
            $list[Category::where('id', $product->category_id)->first()->name][$product->id] = $product->name;
        }
        return $list;
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
