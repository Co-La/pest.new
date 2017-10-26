<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepository;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $vars = [];
    protected $user;
    protected $title;
    protected $content;
    protected $view;
    protected $topnav;
    protected $bartitle;
    protected $menu;
    protected $footer;
    protected $c_rep;
    protected $cat_rep;
    protected $p_rep;
    protected $cul_rep;
    protected $m_rep;
    protected $par_rep;


    public function __construct(CategoriesRepository $cat_rep) {        
        $this->user = Auth::user();        
        $this->cat_rep = $cat_rep;        
    }
    
    
    public function getView() {
        
       
        
        $categories = $this->getCategories();     
        $menu = view(env('THEM').'.admin.menu')->with('categories', $categories)->render();
        $this->vars = array_add($this->vars, 'menu', $menu);
        $this->vars = array_add($this->vars, 'title', $this->title);
        $this->vars = array_add($this->vars, 'content', $this->content);
        $this->vars = array_add($this->vars, 'topnav', $this->topnav);
        $this->vars = array_add($this->vars, 'bartitle', $this->bartitle);
        $this->vars = array_add($this->vars, 'menu', $this->menu);
        $this->vars = array_add($this->vars, 'footer', $this->footer);
        return view($this->view)->with($this->vars);
    }
    
    
    public function getCategories() {        
        $cat = $this->cat_rep->get();
        return $cat;
    }
}
