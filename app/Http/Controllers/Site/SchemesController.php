<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Site\SiteController;
use App\Repositories\SchemesRepository;
use App\Repositories\MenusRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\ArticlesRepository;
use Cache;

class SchemesController extends SiteController
{
    public function __construct(MenusRepository $m_rep, CompaniesRepository $c_rep, ArticlesRepository $a_rep, SchemesRepository $s_rep) {
        parent::__construct($m_rep, $c_rep, $a_rep);
        $this->title = 'Scheme';
        $this->s_rep = $s_rep;
    }
    
    public function index() {

        if(!Cache::has('schem_content')) {
            Cache::remember('schem_content', 20, function() {
                $schemes = $this->getSchemes();
                return view(env('THEM').'.site.schemes_content')->with('schemes', $schemes)->render();
            });
        }
        $this->vars = array_add($this->vars, 'content', \Cache::get('schem_content'));
        return $this->getView();
    }
    
    public function getSchemes() {
        
        $schemes = $this->s_rep->get();
        return $schemes;
    }
}
