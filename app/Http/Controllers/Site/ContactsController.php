<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Site\SiteController;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailSend;

class ContactsController extends SiteController
{
    
    public function __construct(\App\Repositories\MenusRepository $m_rep, \App\Repositories\CompaniesRepository $c_rep, \App\Repositories\ArticlesRepository $a_rep) {
        parent::__construct($m_rep, $c_rep, $a_rep);
        $this->title = 'Contacte';
    }
    
    public function index()
    {
        $content = view(env('THEM').'.site.contacts_content')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->getView();
    }
    
    public function message(MessageRequest $request) {
      
        if($request->isMethod('POST')) {  
            
            $input = $request->except('_token', 'submit');            
            Mail::to(config('settings.admin_mail'))->send(new MailSend($input)); 
                
           return redirect('/contacts')->with('status', 'Messajul a fost transmis cu succes !!!');
           
        }
    }
}
