<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Site\SiteController;
use App\Repositories\PermissionsRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\RolesRepository;
use Gate;

class PermissionsController extends AdminController
{

    protected $perm_rep;

    public function __construct(CategoriesRepository $cat_rep, PermissionsRepository $perm_rep, RolesRepository $rol_rep)
    {
        parent::__construct($cat_rep);
        $this->view = env('THEM').'.admin.home';
        $this->perm_rep = $perm_rep;
        $this->rol_rep = $rol_rep;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Lista permisiunilor';
        $permissions = $this->getPermissions();
        $roles = $this->getRoles();
        $this->content =  view(env('THEM').'.admin.permissions_content')->with(['permissions' => $permissions, 'roles' => $roles, 'title' => $this->title])->render();

        return $this->getView();
    }

    /**
     * Get permissons collections
     *
     * @return arrays collections
     */

    protected  function getPermissions() {

        $permissions = $this->perm_rep->get();
        return $permissions;
    }


    /**
     * Get roles collections
     *
     * @return arrays collections
     */

    protected  function getRoles() {

        $roles = $this->rol_rep->get();
        return $roles;
    }


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
        $result = $this->perm_rep->changePermissions($request);

        if(is_array($result)  && !empty($result['error'])) {
            return back()->with($result);
        }
        return back()->with($result);
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
