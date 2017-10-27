<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MenusRepository;
use App\Repositories\ArticlesRepository;
use Cache;
use Menu;
use App\Repositories\CompaniesRepository;

class SiteController extends Controller
{
    protected $title;
    protected $templ;
    protected $vars;
    protected $page;
    protected $menus;
    protected $content;
    protected $m_rep;
    protected $a_rep;
    protected $f_men;
    protected $p_rep;
    protected $c_rep;
    protected $cat_rep;
    protected $s_rep;
    protected $comm_rep;
    protected $search;
    protected $bar_title;


    public function __construct(MenusRepository $m_rep, CompaniesRepository $c_rep, ArticlesRepository $a_rep) {
        $this->m_rep = $m_rep;
        $this->c_rep = $c_rep;
        $this->a_rep = $a_rep;
        $this->page = env('THEM').'.site.home';
        $this->search = view(env('THEM').'.site.search');
        $this->bar_title = view(env('THEM').'.site.bar_title');
    }


    public function getView() 
    {
        if(!Cache::has('items')) {
            $items = Cache::remember('items', 20, function () {
                return $this->getMenu();
            });
        }
        if(!Cache::has('listnews')) {
            Cache::remember('listnews', 20, function () {
                return $this->getListNews();
            });
        }
        if(!Cache::has('menus')) {
            Cache::remember('menus', 20, function () use ($items) {
                return view(env('THEM') . '.site.navigation')->with('items', $items)->render();
            });
        }
        if(!Cache::has('footer')) {
            Cache::remember('footer', 20, function () use ($items) {
                return view(env('THEM') . '.site.footer')->with('items', $items)->render();
            });
        }
        $this->vars = array_add($this->vars, 'search', $this->search);
        $this->vars = array_add($this->vars, 'bar_title', $this->bar_title);
        $this->vars = array_add($this->vars, 'title', $this->title);
        $this->vars = array_add($this->vars, 'menus', Cache::get('menus'));
        $this->vars = array_add($this->vars, 'content', $this->content);
        $this->vars = array_add($this->vars, 'listnews', Cache::get('listnews'));
        $this->vars = array_add($this->vars, 'footer', Cache::get('footer'));





        return view($this->page)->with($this->vars);
    }
    
    public function getMenu() 
    {        
        $menus = $this->m_rep->get();
        
        $items = Menu::make('newMenu', function($menu) use($menus) {
            
            foreach($menus as $item) {
                if($item->parent == 0) {
                $menu->add($item->title, $item->path)->id($item->id);                 
                } else {
                    if($menu->find($item->parent)) {
                        $menu->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }                    
                }
            }
        });
        return $items;
    }
    
   public function getCompanies() 
    {
        $result = $this->c_rep->get(['id', 'name', 'countries']); 
        return $result;
    }
    
    public function getArticles() {
        
        $articles = $this->a_rep->get('*', config('settings.limit_articles'));
        return $articles;
    }
    
    protected function getListNews() 
    {
        $articles = $this->getArticles();
        $list = view(env('THEM').'.site.listnews')->with('articles', $articles)->render();
        return $list;
    }
    
    
    public function exChange($price, $cur) {
        
        $obj = simplexml_load_file('https://www.bnm.md/ro/official_exchange_rates?get_xml=1&date='.date('d.m.Y'));        
       $ex_price = 0;
       foreach($obj as $val) {           
           if($val->CharCode == $cur) {               
               $ex_price = round($price * floatval($val->Value),1);
           } 
       }        
        return $ex_price;
    }
}
