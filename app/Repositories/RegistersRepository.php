<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 09.10.2017
 * Time: 16:22
 */

namespace App\Repositories;
use App\Repositories\SiteRepository;
use App\Register;

class RegistersRepository extends SiteRepository
{
    public function __construct(Register $register)
    {
        $this->model = $register;
    }

    public function saveRegister($request)    {
        if($request->isMethod('POST')) {
            $input = $request->except('_token');
            $input['parasite_id'] = implode(',', $input['parasite_id']);
            $register = new Register();
            $register->fill($input);
            if($register->save()) {
                return ['status' => 'Datele au fost pastrate'];
            } else {
                return ['error' => 'A intervenit o eroare'];
            }
        }
    }
}