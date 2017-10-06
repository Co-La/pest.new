<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use Gate;

class IndexController extends AdminController

{
    
    public function __construct(CategoriesRepository $cat_rep) {
        parent::__construct($cat_rep);

        $this->view = env('THEM').'.admin.home';
        $this->content = '';
        $this->title = 'Pesticid-admin';
        $this->topnav = view(env('THEM').'.admin.topnav')->render();
        $this->bartitle = view(env('THEM').'.admin.bartitle')->render();        
        $this->footer = view(env('THEM').'.admin.footer')->render();
    }
    
    
    public function index() {

        if(Gate::denies('VIEW_ADMIN')) {
            abort('404');
        }
        
        return $this->getView();
    }
}
