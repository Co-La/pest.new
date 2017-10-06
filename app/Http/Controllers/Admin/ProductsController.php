<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductsController extends AdminController
{
    public function __construct(CategoriesRepository $cat_rep, ProductsRepository $p_rep, \App\Repositories\CompaniesRepository $c_rep) {
        parent::__construct($cat_rep);
        $this->view = env('THEM').'.admin.home';
        $this->p_rep = $p_rep;
        $this->c_rep = $c_rep;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    
    
    //take products by id
     public function getProducts($id) {
         
        $res = $this->p_rep->getAllByID($id, config('settings.list_products'));
        return $res;
     }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = $this->getCompanies();
        $items = $this->getCategories();
        $level = ['Grupa de toxicitate', 'I', 'II', 'III', 'IV'];
        $used = ['Statutul produsului', '1', '0'];
        $curr = ['Valuta','USD', 'EUR'];        
        $categories['empty'] = 'Selecteaza categoria'; 
        foreach($items as $item) {
           $categories[$item->id] = $item->name;
       }        
        $page_title = 'Adauga produs'; 
        
        
        $this->content = view(env('THEM').'.admin.product_edit')->with(['page_title'    => $page_title, 
                                                                        'companies'     => $companies, 
                                                                        'categories'    => $categories,
                                                                        'level'          => $level,
                                                                        'used'          => $used,
                                                                        'curr'          => $curr
                                                                    ])->render();
   
        return $this->getView();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if($request->isMethod('POST')) {
            
            $input = $request->except('_token');            
            $product = new Product($input);            
            if($product->save()) {                
                return redirect('admin/products/'.$input['category_id'])->with('status', 'Informatia a fost pastrata');
            } 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pr_id = ['category_id', $id];
        $products = $this->getProducts($pr_id); 
        $page_title = strtoupper($this->cat_rep->getByID($id)->name);  
        $this->content = view(env('THEM').'.admin.products_content')->with(['products'=> $products, 'page_title' => $page_title])->render();
        return $this->getView();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->getProduct($id); 
        $companies = $this->getCompanies();
        $items = $this->getCategories();
        $level = ['Grupa de toxicitate', 'I', 'II', 'III', 'IV'];         
        $used = ['Statutul produsului', '1', '0'];
        $curr = ['Valuta','USD', 'EUR'];
        $categories['empty'] = 'Selecteaza categoria';
        foreach($items as $item) {
           $categories[$item->id] = $item->name;
       }
        //dd($companies);
        $page_title = 'Redactarea produsului'; 
        $this->content = view(env('THEM').'.admin.product_edit')->with(['page_title'    => $page_title, 
                                                                        'companies'     => $companies, 
                                                                        'categories'    => $categories,
                                                                        'level'          => $level,
                                                                        'used'          => $used,
                                                                        'curr'          => $curr,
                                                                        'product'       => $product
                                                                    ])->render();
        
        return $this->getView();
    }
    
    protected function getProduct($id) {
        
        $result = $this->p_rep->getByID($id);
        return $result;
    }
    
    
    protected function getCompanies() {
        
       $result = $this->c_rep->get(['id', 'name']);
       $companies['empty'] = 'Selectati compania';
       foreach($result as $item) {
           $companies[$item->id] = $item->name;
       }
       return $companies;
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
        $del = $this->p_rep->del($id); 
        if($del) {           
           return response()->json(['true' => TRUE]);
       }
    }
}
