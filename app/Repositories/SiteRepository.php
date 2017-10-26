<?php

namespace App\Repositories;

use Config;
use Illuminate\Support\Facades\Session;
use Image;
use DB;

class SiteRepository {
    
    protected $model;
    protected $prod_nr;
    protected $prod_ID;
    protected $prod_price;
    
    public function get($select = '*', $take = FALSE, $where = FALSE, $paginate = FALSE, $orderBy = []) {
        
        $result = $this->model->select($select);


        if($take) {

            $result->take($take);
        }

        if($where) {

            $result->where($where[0],$where[1]);
        }

        if($orderBy) {
            $result->orderBy($orderBy[0], $orderBy[1]);
        }

        if($paginate) { 
           $pagin = $result->paginate($paginate);
            return $this->checkJson($pagin);
        }
        return $this->checkJson($result->get());
    }
    
    public function getFirst() {
        
        $result = $this->model->first();
        return $this->checkJson($result);
    }
    
    public function getByID($id, $select = '*') 
    {          
        $result = $this->model->select($select)->where('id', $id)->first();
        return $this->checkJson($result);
    }

    public function checkJson($result)
    {
        if (count($result) > 1) {
            foreach ($result as $item) {
                if (isset($item->image) && is_object(json_decode($item->image))) {
                    $item->image = json_decode($item->image);
                }
            }
        }
        if(count($result) == 1) {
            if (isset($result->image) && is_object(json_decode($result->image))) {
                $result->image = json_decode($result->image);
            }
        }
        return $result;
    }
    
    
    public function takeOne($where = [], $id= FALSE, $select = '*') 
    {
        $result = $this->model->select($select);
        if($where) {
           $result->where($where[0],$where[1]);
        }
        
        if($id) {
            $result->where('id', $id);            
        }
                         
        return $result->first();
    }


    public function loadTab()
    {
        $result = DB::table('products')->select()->get();
        
        return $result;
    }
    
   // add session bag products,  array (id => number)   
    
    public function putSession($id, $nbr, $price) {
       
       //put session id = array(nbr,price)  
           if(!Session::has('bag'))  {
              Session::put('bag');
              Session::put('bag.full_price', 0);
              Session::put('bag.products.'.$id, ['nbr' => $nbr, 'price' => $price]);              
          }          
          if(Session::has('bag.products.'.$id)) {             
              Session::put('bag.products.'.$id, ['nbr' => $nbr, 'price' => $price]);              
          } else {
              Session::put('bag.products.'.$id, ['nbr' => $nbr, 'price' => $price]); 
          }
          
         $totalPrice = 0;         
            foreach(Session::get('bag.products') as $product) {              
              $totalPrice = $totalPrice + intval($product['price']);
          }          
          Session::put('bag.full_price', $totalPrice);
        
       }   
       
       
    
    public function getItemsByID($id_arr, $select = '*')             
    {
        $result = $this->model->select($select)->whereIn('id', $id_arr);        
        return $result->get();
    }
    
    public function getLeftJoin () {        
        
        $result = DB::table('companies')->join('countries', 'companies.countries', '=', 'countries.id')->select('countries.code', 'countries.name_en', 'companies.name', 'companies.id');
        return $result->paginate(15);
    }
    
    public function del($id) {

        if(\Gate::denies('DELETE_TEXT', function() {
            abort(404);
        }));

        $result = $this->model->find($id);
        if($result->delete()) {            
            return true;
        }
    }
    
    
    public function getAllByID($id, $paginate = FALSE) {
        
        if(is_array($id)) {
            $result = $this->model->select('*')->where($id[0],$id[1]);            
        } 
        if(is_numeric($id)) {
            $result = $this->model->select('*')->where($id); 
        }
        
        if($paginate) {
            
            return $result->paginate($paginate);
        }
        
        return $result->get();
        
        
    }

    public function save($request) {

        if(\Gate::denies('SAVE_TEXT', function() {
            abort(404);
        }));

        if($request->isMethod('POST')) {
            $input = $request->except('_token');
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $image = new \stdClass();
                $rand = str_random(5).'.jpg';
                $image->small = 'sm_'.$rand;
                $image->big = 'big_'.$rand;
                Image::make($file)->fit(235,156)->save(public_path().'/'.env('THEM').'/image/articles/'.$image->small);
                Image::make($file)->save(public_path().'/'.env('THEM').'/image/articles/'.$image->big);
                $input['image'] = json_encode($image);
            }
            $this->model->fill($input)->save();
            return ['status' => 'Datele au fost pastrate'];
        } else {
            return ['error' => 'A intervenit o eroare'];
        }

    }

    public function update($request, $id) {

        if($request->isMethod('PUT')) {
            if(\Gate::denies('UPDATE_TEXT', function() {
                abort(404);
            }));
            $input = $request->except('_token', '_method');
            if(isset($input['parasite_id']) && is_array($input['parasite_id'])) {
                $input['parasite_id'] = implode(',', $input['parasite_id']);
            }
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $image = new \stdClass();
                $rand = str_random(5).'.jpg';
                $image->small = 'sm_'.$rand;
                $image->big = 'big_'.$rand;
                Image::make($file)->fit(235,156)->save(public_path().'/'.env('THEM').'/image/articles/'.$image->small);
                Image::make($file)->save(public_path().'/'.env('THEM').'/image/articles/'.$image->big);
                $input['image'] = json_encode($image);
            }


            $result = $this->model->find($id);
            $result->update($input);
            return ['status' => 'Datele au fost modificate'];
        } else {
            return ['error' => 'A intervenit o eroare'];
        }

    }


   
}



