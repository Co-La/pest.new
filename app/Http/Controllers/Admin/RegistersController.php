<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegisterRequest;
use App\Register;
use App\Repositories\CulturesRepositrory;
use App\Repositories\MethodsRepository;
use App\Repositories\ParasitesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use App\Repositories\RegistersRepository;
use App\Repositories\CulturesRepository;
use DB;

class RegistersController extends AdminController
{
    protected $reg_rep;

    public function __construct(CategoriesRepository $cat_rep,
                                RegistersRepository $reg_rep,
                                CulturesRepository $cul_rep,
                                ProductsRepository $p_rep,
                                MethodsRepository $m_rep,
                                ParasitesRepository $par_rep
                                )
    {
        parent::__construct($cat_rep);
        $this->reg_rep = $reg_rep;
        $this->view = env('THEM').'.admin.home';
        $this->cul_rep = $cul_rep;
        $this->p_rep = $p_rep;
        $this->m_rep = $m_rep;
        $this->par_rep = $par_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = $this->getRegisters();
        $parasites = [];
        foreach($registers as $register) {
            $parasites[$register->id] = DB::table('parasites')->whereIn('id', explode(",",$register->parasite_id))->get();
        }
        $page_title = 'Registrul produselor';
        $this->content = view(env('THEM').'.admin.register_content')->with(['registers' => $registers,
                                                                            'page_title' => $page_title,
                                                                            'parasites' => $parasites])
                                                                            ->render();
        return $this->getView();
    }

    //get all regiter items
    protected function getRegisters()    {
        $orderBy = ['id', 'desc'];
        return $this->reg_rep->get('*', FALSE, FALSE, config('settings.register_products'), $orderBy);
    }

//    protected function changeForeign()
//    {
//        $items = $this->reg_rep->get();
//        foreach($items as $item) {
//        $item->where('id', $item->id)->update(['product_id' => $item->accessory_id, 'culture_id' => $item->cultivation_id]);
//        }
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cultures = count($this->getCultures()) > 0 ? $this->getCultures() : '';
        $products = count($this->getProducts()) > 0 ? $this->getProducts() : '';
        $methods = count($this->getMethods()) > 0 ? $this->getMethods() : '';
        $parazites = count($this->getParazites()) > 0 ? $this->getParazites() : '';
        $this->title = 'Redacaterea produselor';
        $this->content = view(env('THEM').'.admin.register_edit_content')->with([   'cultures'  =>  $cultures,
                                                                                    'products'  =>  $products,
                                                                                    'methods'   =>  $methods,
                                                                                    'parazites' =>  $parazites
                                                                                ])->render();
        return $this->getView();
    }

    protected function getCultures()
    {
        $cultures = $this->cul_rep->get();

        $arr = [];
        foreach($cultures as $culture) {
            $arr[$culture->id] = $culture->name;
        }
        return $arr;
    }

    protected function getProducts()
    {
        $products = $this->p_rep->get();
        $arr = [];
        foreach($products as $product) {
            $arr[$product->id] = $product->name;
        }
        return $arr;
    }

    protected function getMethods()
    {
        $methods = $this->m_rep->get();
        $arr = [];
        foreach($methods as $method) {
            $arr[$method->id] = $method->utilization;
        }
        return $arr;
    }


    protected function getParazites()
    {
        $parazites = $this->par_rep->get();
        $arr = [];
        foreach($parazites as $parazite) {
            array_push($arr, ['id'=> $parazite->id, 'name' => $parazite->science_name]);
        }
        return array_sort($arr, function($value) {
            return $value['name'];
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $result = $this->reg_rep->saveRegister($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        }
        return redirect('admin/registers')->with($result);
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
        $register = $this->getRegister($id);
        $cultures = count($this->getCultures()) > 0 ? $this->getCultures() : '';
        $products = count($this->getProducts()) > 0 ? $this->getProducts() : '';
        $methods = count($this->getMethods()) > 0 ? $this->getMethods() : '';
        $parazites = count($this->getParazites()) > 0 ? $this->getParazites() : '';
        $this->content = view(env('THEM').'.admin.register_edit_content')->with([   'register'=> $register,
                                                                                    'cultures'  =>  $cultures,
                                                                                    'products'  =>  $products,
                                                                                    'methods'   =>  $methods,
                                                                                    'parazites' =>  $parazites
                                                                                ])->render();
        return $this->getView();
    }

    protected function getRegister($id)    {
        return $this->reg_rep->getByID($id);
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
        $result = $this->reg_rep->update($request, $id);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        }
        return redirect('admin/registers')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->reg_rep->del($id);
        if($del) {
            return response()->json(['true' => TRUE]);
        }
    }
}
