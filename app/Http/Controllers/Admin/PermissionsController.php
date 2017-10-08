<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PermissionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CategoriesRepository;
use App\Repositories\RolesRepository;


class PermissionsController extends AdminController
{
    protected $rol_rep;
    protected $perm_rep;

    public function __construct(CategoriesRepository $cat_rep, PermissionsRepository $perm_rep, RolesRepository $rol_rep)
    {
        parent::__construct($cat_rep);
        $this->view = env('THEM').'.admin.home';
        $this->rol_rep = $rol_rep;
        $this->perm_rep = $perm_rep;
        $this->title = 'Lista permisiunilor';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->getPermissions();
        $roles  = $this->getRoles();
        $this->content = view(env('THEM'). '.admin.permissions_content')->with(['permissions'=> $permissions, 'roles' => $roles, 'title' =>$this->title]);
        return $this->getView();
    }

    /**
     * Get permissions colection
     *
     * @return \Illuminate\Http\Response
     */
    protected function getPermissions()
    {
        $permissions = $this->perm_rep->get();
        return $permissions;
    }

    /**
     * Get roles colection
     *
     * @return \Illuminate\Http\Response
     */
    protected function getRoles()
    {
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
        if(is_array($result)  &&  !empty($result['error'])) {
            return back()->withInput($result);
        }
        return back()->withInput($result);
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
