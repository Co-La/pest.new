<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Site\SiteController;

class RegisterController extends SiteController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct(\App\Repositories\MenusRepository $m_rep, \App\Repositories\CompaniesRepository $c_rep, \App\Repositories\ArticlesRepository $a_rep) {
       parent::__construct($m_rep, $c_rep, $a_rep);
       $this->middleware('guest');
   }
   
   public function showRegistrationForm()
    {
        $this->page = env('THEM').'.site.home';
        $this->title = 'Inregistrare';
        $months = $this->monthGenerate();
        $dates = $this->daysGenerate();
        $years = $this->yearsGenerate();        
        $content = view(env('THEM').'.site.register_content')->with(['years' => $years,'months' => $months, 'dates' => $dates]) ->render();
        $this->vars = array_add($this->vars, 'content', $content);
        
        return $this->getView();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'year' => 'required|integer',
            'month' => 'required|integer',
            'day' => 'required|integer',
            'company' => 'string|max:255',
            'adress' => 'required|string|max:255',
            'alias' => 'required|string|max:255|unique:users',
        ]);
    }
    
    
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'born' => strval($data['year'].'-'.$data['month'].'-'.$data['day']),
            'company' => $data['company'],
            'adress' => $data['adress'],
            'alias' => $data['alias'],
            'role_id' => 3,
        ]);
    }
    
    public function monthGenerate() {
        
        $arr = [];
        for($i = 1; $i <= 12; $i++) {            
           $arr[$i] = $i; 
        }
        
        return $arr;
    }
    
    public function daysGenerate() {
        
        $arr = [];
        for($i = 1; $i <= 31; $i++) {            
           $arr[$i] = $i; 
        }
        
        return $arr;
    }
    
    public function yearsGenerate() {
         $arr = [];
        for($i = 2017; $i >= 1946; $i--) {            
                      
            $arr[$i] = $i; 
        }
        
        return $arr;
        
    }


}
