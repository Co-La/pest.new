<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use App\Repositories\ParasitesRepository;

class ParazitesController extends AdminController
{
    protected $par_rep;

    public function __construct(CategoriesRepository $cat_rep, ParasitesRepository $par_rep)    {
        parent::__construct($cat_rep);
        $this->view = env('THEM').'.admin.home';
        $this->par_rep = $par_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parasites = $this->getParasites();
        $page_title = 'Lista daunatorilor';
        $this->content = view(env('THEM').'.admin.parasites_content')->with(['parasites' => $parasites, 'page_title' => $page_title])->render();
        return $this->getView();
    }

    protected function getParasites() {

        return $this->par_rep->get('*', FALSE, FALSE, config('settings.list_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->content = view(env('THEM').'.admin.parasites_content_edit')->render();
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
        $result = $this->par_rep->save($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        }
        return redirect('admin/parazites')->with($result);
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
        $parasite = $this->getParasite($id);
        $this->content = view(env('THEM').'.admin.parasites_content_edit')->with('parasite', $parasite)->render();
        return $this->getView();
    }

    protected function getParasite($id) {

        return $this->par_rep->getByID($id);
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
        $result = $this->par_rep->update($request, $id);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result)->withInput();
        }
        return redirect('admin/parazites')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->par_rep->del($id);
        if($del) {
            return response()->json(['true' => TRUE]);
        }
    }
}
