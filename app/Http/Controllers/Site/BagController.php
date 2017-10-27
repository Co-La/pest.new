<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Repositories\MenusRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use App\Bag;
use DB;

class BagController extends SiteController
{
    
    public function __construct(MenusRepository $m_rep, CompaniesRepository $c_rep, ArticlesRepository $a_rep, ProductsRepository $p_rep) {
        parent::__construct($m_rep, $c_rep, $a_rep );
        $this->p_rep = $p_rep;
        $this->title = 'Cos';
    }
    
    public function index(Request $request)
    {
      $bag = $request->session()->get('bag.products');  
        if($bag) {            
            $bag_product_ID = array_keys($bag);
        }        

        if(!empty($bag_product_ID)) {            
           $product_content = $this->getProductContent($bag_product_ID); 
        }  else {
            $product_content = FALSE;
        }  
        $this->content = view(env('THEM').'.site.bag_content')->with('products', $product_content)->render();   
        return $this->getView();
    }
        
    
    public function bagAdd(Request $request)
    {
        if($request->isMethod('POST')) {
            
            $prod_ID = $request['id'];            
            $prod_NR = $request['item_nbr'];
            $price = $request['price'];            
            if(isset($price) && $price !== 0) {
                $this->p_rep->putSession($prod_ID, $prod_NR, $price);
            }  
        }
    }
    
    
    public function delivery()
    {
        $this->title = 'Adresa';
        $this->content = view(env('THEM').'.site.delivery_content')->render();
        return $this->getView();
    }
    
    public function success()
    {
        $this->title = 'Sarcina indeplinita!';
        $this->page = env('THEM').'.site.success';
        return $this->getView();
    }
    
    
    public function errors()
    {
        $this->title = 'Eroare!';
        $this->page = env('THEM').'.site.errors';
        return $this->getView();
    }
    
    public function confirm(MessageRequest $request)
    {
        $signature = Config::get('settings.signeture');
        $xmldata = $this->getXML();
        $data = base64_encode($xmldata);
        $sign = md5(md5($xmldata).md5($signature));
        if($request->isMethod('POST')) {
            
            $input = $request->except('_token', 'submit');
        }    
        
    if(empty($input['name']) || empty($input['email']) || empty($input['adress'])) {            
            return redirect('/bag/delivery')->withInput();
        }
                
        $price = Session::get('bag.full_price');
        
        if(!isset($price) || $price == 0) {            
            return redirect('home')->withInput();            
        }   
        
        if(Session::get('bag.order_id')) {
             $order_id = Session::get('bag.order_id');            
        }
        
        if(Session::has('bag.products')) {
            $products = Session::get('bag.products');
            $items = [];
            foreach($products as $key => $product) {
               $item = ['name' => $key, 'number' => $product['nbr'], 'price' => $product['price']];
               array_push($items, $item);
            }
            
           $product = json_encode($items);
        }
         
           $order_item = ['order_id' => $order_id, 'name' => $input['name'], 'adress' => $input['adress'], 'product' => $product, 'price' => $price, 'message' => $input['message'] ];        
           $order = new Bag($order_item);          
           $order->save();
           foreach($items as $item) {
                $order_product = new \App\Bproduct($item);
                $order_new = Bag::find(DB::table('bags')->select('*')->where('order_id', $order_id)->first()->id);          
                $order_new->bproducts()->save($order_product);               
           }

        $this->content = view(env('THEM').'.site.confirm_content')->with(['data' => $data, 'sign' => $sign])->render();       
        return $this->getView();
        
    }
     
    public function payed(Request $request)
    {
        $signature = Config::get('settings.signeture'); // строка, для подписи, указанная при регистрации мерчанта 
        if($request->isMethod('POST')) {
           $data = $request->data; 
           $key = $request->key; 
        }        
        $xmldata = base64_decode($data); 
        $vrfsign = md5(md5($xmldata).md5($signature)); 
          if ($key == $vrfsign) 
          { 
            $xml = simplexml_load_string($xmldata); 
             if ((string)$xml->comand == "check") 
             { 
            // проверка существования указанного order_id 
            // 100 - номер существует, 50 - номер не существует 
            echo "<?xml version='1.0' encoding=\"utf8\"?>"; 
            echo "<result>"; 
            echo "<code>50</code>"; 
            echo "<text>not exist</text>"; 
            echo "</result>"; 
           } 
           elseif ((string)$xml->comand=="pay") 
           { 
               
            // здесь осуществляем обработку данного платежа 

            echo "<?xml version='1.0' encoding=\"utf8\"?>"; 
            echo "<result>"; 
            echo "<code>100</code>"; 
            echo "<text>success</text>"; 
            echo "</result>"; 
           } 
           else 
           { 
            echo "<?xml version='1.0' encoding=\"utf8\"?>"; 
            echo "<result>"; 
            echo "<code>30</code>"; 
            echo "<text>unknown method</text>"; 
            echo "</result>"; 
           } 
      } 
      else 
      { 
            echo "<?xml version='1.0' encoding=\"utf8\"?>"; 
            echo "<result>"; 
            echo "<code>30</code>"; 
            echo "<text>incorrect signature</text>"; 
            echo "</result>"; 
      }
        
    }
    
    
    
    public function plusItem(Request $request)
    {
        if($request->isMethod('POST')) {            
        $prod_NR = $request['item_nbr']; 
        $prod_ID = $request['id'];
        $price = $this->getPrice($prod_ID); 
        $nbr = $prod_NR + 1;     
        Session::put('bag.products.'.$prod_ID, ['nbr' => $nbr, 'price' => $nbr * $price]);
        $total = $this->getFullPrice();
           $arr =['price' => $price,'nbr' => $nbr, 'total' => $total];      
            
            return response()->json($arr);
        }        
        
    }
        
    public function minusItem(Request $request)
    {
        if($request->isMethod('POST')) {          
        $prod_NR = $request['item_nbr']; 
        $prod_ID = $request['id'];
        $price = $this->getPrice($prod_ID);  
         if($prod_NR > 1) {                    
           $nbr = $prod_NR - 1; 
           } else {
                $nbr = 1;                     
           }           
           Session::put('bag.products.'.$prod_ID, ['nbr' => $nbr, 'price' => $nbr * $price]);
           $total = $this->getFullPrice();           
           $arr =['price' => $price,'nbr' => $nbr, 'total' => $total]; 
            return response()->json($arr);
        }       
       
    }
    
    
    public function del_item($id)
    {
        if(count(Session::get('bag.products')) > 1 ) {                 
           
            $price = Session::get('bag.products.'.$id.'.price');
            $full_price = $this->getFullPrice();            
            $this->putFullPrice($full_price - $price);
            Session::forget('bag.products.'.$id);                                
        } else {
            Session::forget('bag');                       
        }
        
        return back();
    }
    
    
    
    
    
    public function getFullPrice()
    {
       $total = 0;
        foreach(Session::get('bag.products') as $product) {            
           $total += $product['price'];
        }        
        return $total;
    }
    
    public function putFullPrice($total)
    {
        Session::put('bag.full_price', $total); 
    }
            
    
    public function getProductContent($id_arr)
    {
        $result = $this->p_rep->getItemsByID($id_arr, ['id','name', 'price', 'pack', 'curr', 'image', 'company_id']);
        $result->load('company');
        return $result;
    }
    
    public function getPrice($id)
    {
        $item_price = DB::table('products')->select(['price', 'curr'])->where('id', $id)->first();
        if($item_price->price > 0 ) {
            $price = $this->exChange($item_price->price, $item_price->curr);            
            return $price;            
        }  else {                
            return false;
        }
        
    }
    
    
    
    
    public function getXML()
    {
        $merchantid = 'pesticid_md';
        $order_id = 'pest_id_'.rand(1, 10000);
        Session::put('bag.order_id', $order_id);
        //dd($order_id);
        $xml =   '<payment>            
        <type>1.2</type>
        <merchantid>'.$merchantid.'</merchantid>
        <amount>'.Session::get('bag.full_price').'</amount>
        <description>'.'Plata pentru produse de uz fitosanitar'.'</description>
        <method>bpay</method>
        <order_id>'.$order_id.'</order_id>
        <success_url>'.htmlspecialchars("http://pesticid.md/success").'</success_url>
        <fail_url>'.htmlspecialchars("http://pesticid.md/errors").'</fail_url>   
        <callback_url>'.htmlspecialchars("http://pesticid.md/payed").'</callback_url>
        <lang>ro</lang>
        <advanced1></advanced1>
        <advanced2></advanced2>
        <istest>ISTEST</istest>
        <getUrl>GET_URL</getUrl>
        </payment>';
        
        return $xml;
    }
   
}
