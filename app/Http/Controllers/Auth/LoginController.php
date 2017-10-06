<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Site\SiteController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends SiteController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->page = env('THEM').'.site.login';
        $this->title = 'Autentificare';
    }
    
    
    public function showLoginForm()
    {
        $content = view(env('THEM').'.site.login_content')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->getView();
    }
    
     public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect($this->redirectTo);
    }
}
