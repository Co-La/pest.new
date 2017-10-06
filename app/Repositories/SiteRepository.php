<?php

namespace App\Repositories;

use Config;
use Illuminate\Support\Facades\Session;
use DB;

class SiteRepository {
    
    protected $model;
    protected $prod_nr;
    protected $prod_ID;
    protected $prod_price;
    
    public function get($select = '*', $take = FALSE, $where = FALSE, $paginate = FALSE) {
        
        $result = $this->model->select($select);
               
        
        if($take) {
            
            $result->take($take);
        }
        
        if($where) {
            
            $result->where($where[0],$where[1]);
        }
        
        if($paginate) { 
            return  $result->paginate($paginate);
        }
        
        return $result->get();
    }
    
    public function getFirst() {
        
        $result = $this->model->first();
        return $result;
    }
    
    public function getByID($id, $select = '*') 
    {          
        $result = $this->model->select($select)->where('id', $id)->first();  
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
   
   
}



