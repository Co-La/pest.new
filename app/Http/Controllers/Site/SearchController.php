<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends SiteController
{
    public function __construct(\App\Repositories\MenusRepository $m_rep, \App\Repositories\CompaniesRepository $c_rep, \App\Repositories\ArticlesRepository $a_rep) {
        parent::__construct($m_rep, $c_rep, $a_rep);
    }
    
    
    public function index(Request $request) 
    {
       if($request->isMethod('GET'))  {
           $companies = $this->c_rep->get();
           $list = [];
           foreach($companies as $company) {
               $list[$company->id] = ['name' => $company->name];               
           }           
           return response()->json($list);
       }        
    }
}
