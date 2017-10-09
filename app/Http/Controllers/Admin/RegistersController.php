<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use App\Repositories\RegistersRepository;

class RegistersController extends AdminController
{
    protected $reg_rep;

    public function __construct(CategoriesRepository $cat_rep, RegistersRepository $reg_rep)
    {
        parent::__construct($cat_rep);
        $this->reg_rep = $reg_rep;
        $this->view = env('THEM').'.admin.home';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = $this->getRegisters();
        $page_title = 'Registrul produselor';
        $this->content = view(env('THEM').'.admin.register_content')->with(['registers' => $registers, 'page_title' => $page_title])->render();
        return $this->getView();
    }

    //get all regiter items
    protected function getRegisters()    {
        return $this->reg_rep->get('*', FALSE, FALSE, config('settings.list_products'));
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
