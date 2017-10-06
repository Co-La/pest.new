<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\CompaniesRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\CategoriesRepository;
use App\Company;

class CompaniesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct(CategoriesRepository $cat_rep, CompaniesRepository $c_rep) {
        parent::__construct($cat_rep);
        $this->view = env('THEM').'.admin.home';       
        $this->title = 'Pesticid-admin';
        $this->topnav = view(env('THEM').'.admin.topnav')->render();
        $this->bartitle = view(env('THEM').'.admin.bartitle')->render();        
        $this->footer = view(env('THEM').'.admin.footer')->render();
        $this->c_rep = $c_rep;
    }
    
    
    public function index() {
        $companies = $this->getCompaniesFrom();
        $page_title = 'COMPANII';
        $this->content = view(env('THEM').'.admin.companies_content')->with(['companies'=> $companies,'page_title' => $page_title])->render();
        return $this->getView();
    }
    
    
    public function getCompaniesFrom() {
        $companies = $this->c_rep->getLeftJoin();    
        return $companies;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $items = $this->getCountries();
       $countries['nume'] = ['Selecteaza tara'];
      foreach($items as $country) {
          $countries[$country->id] = $country->name_ro;          
      }        
       $this->content = view(env('THEM').'.admin.companies_edit_content')->with('countries', $countries)->render();        
       return $this->getView();
    }
    
    public function getCountries() {
        
        $countries= DB::table('countries')->select('name_ro', 'id')->get();
        return $countries;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->isMethod('POST')) {
           
          $company = new Company();
          $company->fill($request->except('_token', 'id'));
          if($company->save()) {              
              return redirect('admin/companies')->with('status', 'Informatia a fost pastrata cu succes');
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
      $items = $this->getCountries();
      $countries = [];
      $company = $this->getCompany($id);      
    
      foreach($items as $country) {
          $countries[$country->id] = $country->name_ro;          
      }    
       $this->content = view(env('THEM').'.admin.companies_edit_content')->with(['countries'=> $countries, 'company' => $company])->render();        
       return $this->getView();
    }
    
    
     public function getCompany($id) {
            
        $company = $this->c_rep->takeOne(FALSE, $id);
            
        return $company->toArray();
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
        if($request->isMethod('PUT')) {            
           $input = $request->except('_method','_token', 'id');
           $company = Company::find($id); 
           if($company->update($input)) {
               return redirect('admin/companies')->with('status', 'Informatia a fost pastrata cu succes');               
           }
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
       $del = $this->c_rep->del($id); 
       if($del) {           
           return response()->json(['true' => TRUE]);
       } 
    }
}
