<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use App\Repositories\CulturesRepository;

class CulturesController extends AdminController
{
    protected $cult_rep;

    public function __construct(CategoriesRepository $cat_rep, CulturesRepository $cult_rep)
    {
        parent::__construct($cat_rep);
        $this->view = env('THEM').'.admin.home';
        $this->cult_rep = $cult_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cultures = $this->getCultures();
        $page_title = 'Culturi';
        $this->content = view(env('THEM').'.admin.culture_content')->with(['cultures'=> $cultures, 'page_title' => $page_title])->render();
        return $this->getView();
    }


    //get cultures colection
    protected function getCultures() {

       $cultures = $this->cult_rep->get('*', FALSE, FALSE, \Config::get('settings.list_products'));
        return $cultures;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->content = view(env('THEM').'.admin.culture_content_edit')->render();
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
        $result = $this->cult_rep->save($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        }
        return redirect('admin/cultures')->with($result);
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
        $culture = $this->cult_rep->getByID($id);
        $this->content = view(env('THEM').'.admin.culture_content_edit')->with('culture', $culture)->render();
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
        $result = $this->cult_rep->update($request, $id);
        if(is_array($result)) {
            return redirect('admin/cultures')->with($result);
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
        $del = $this->cult_rep->del($id);
        if($del) {
            return response()->json(['true' => TRUE]);
        }
    }
}
