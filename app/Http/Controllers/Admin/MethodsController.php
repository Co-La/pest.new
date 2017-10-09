<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use App\Repositories\MethodsRepository;

class MethodsController extends AdminController
{
    protected $meth_rep;

    public function __construct(CategoriesRepository $cat_rep, MethodsRepository $meth_rep)
    {
        parent::__construct($cat_rep);
        $this->view = env('THEM').'.admin.home';
        $this->meth_rep = $meth_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = $this->getMethods();
        $page_title = 'Metode de utilizare';
        $this->content = view(env('THEM').'.admin.utilization_content')->with(['methods' => $methods, 'page_title' => $page_title])->render();
        return $this->getView();
    }

    protected function getMethods() {

        return $this->meth_rep->get('*', FALSE, FALSE, config('settings.list_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->content = view(env('THEM').'.admin.utilization_content_edit')->render();
        return $this->getView();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->meth_rep->save($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        }
        return redirect('admin/methods')->with($result);
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
        $method = $this->meth_rep->getByID($id);
        $this->content = view(env('THEM').'.admin.utilization_content_edit')->with('method', $method)->render();
        return $this->getView();
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
        $result = $this->meth_rep->update($request, $id);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        } else {
            return redirect('admin/methods')->with($result);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->meth_rep->del($id);
        if($del) {
            return response()->json(['true' => TRUE]);
        }
    }
}
