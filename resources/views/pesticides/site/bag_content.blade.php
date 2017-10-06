<div class="container bag-header-div">
    <div class="row">
        <div class='col-lg-12 col-md-12 col-sm-12' style="text-align: right" id="paying-system">
            <div class="row">
                <div class="col-7"></div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-3 baying-card"><img src="{{ asset(env('THEM')) }}/image/visa.png" alt=""></div>
                        <div class="col-3 baying-card"><img src="{{ asset(env('THEM')) }}/image/visa_e.png" alt=""></div>
                        <div class="col-3 baying-card"><img src="{{ asset(env('THEM')) }}/image/mastercard.png" alt=""></div>
                        <div class="col-3 baying-card"><img src="{{ asset(env('THEM')) }}/image/paypal.png" alt=""></div>       
                    </div>
                </div>
                
            </div> 
            
        </div>
        
    </div>

</div>

<div class='container' id="bag-content-div"> 
    @if($products && count($products) !== 0)
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12"></div>
        <div class="col-lg-5 col-md-4 col-sm-12"></div>
        <div class="col-lg-2 col-md-3 col-sm-12" style="text-align: center">Pret</div>
        <div class="col-lg-2 col-md-2 col-sm-12" style="text-align: center">Cantitate</div>
    </div>
    <hr>
    
    
    
    @foreach($products as $product)
    <div class="row single-product-row">         
        <div class="col-lg-3 col-md-3 col-sm-12 image-col">
            {{ Html::image(asset(env('THEM')).'/image/no_img.png', 'imagine', ['width' => '150'])   }}
        </div>
        <div class="col-lg-5 col-md-4 col-sm-12 product-col">
            <ul class="group list-group" >
                <li class="item">Denumire produs: <span class="p-name-value">{{ $product->name }}</span></li>
                <li class="item">Producator: <span class="p-name-value">{{ $product->company->name }}</span></li>
                <li class="item">Ambalaj: <span class="p-name-value">{{ $product->pack }}</span></li>   
                <li class="item">
                    {{ Html::link(route('del', ['id' => $product->id]), 'sterge', ['class' => 'link']) }}

                </li> 
            </ul>

        </div>
        <div class="col-lg-2 col-md-3 col-sm-12 unit-price-col">
           
            <p>                
                <strong >{{ Session::get('bag.products.'.$product->id.'.price') / Session::get('bag.products.'.$product->id.'.nbr')  }} </strong> 
                <span>MDL</span>            
            </p>             
            <span>pret/unitate</span>           
        </div>

        <div class="col-lg-2 col-md-2 col-sm-12 product-unit-col" >           
                <div class="row center-block select-count-item" >                
                    <p m_route="{{ route('minus') }}" class='minus_item bag-minus col-4'>-</p>
                    <input value="{{ Session::get('bag.products.'.$product->id.'.nbr')}}" class="input-row number_item number_item_bag col-4"  product_id="{{ $product->id }}">  
                    <p m_route="{{ route('plus') }}" class='plus_item bag-plus col-4'>+</p>                          
                </div>            
        </div>
    </div>   
    <hr>
    
    @endforeach
    
    <div class="row">
            <h4 class="all_item_price">{{ Session::get('bag.full_price') }} <span>MDL</span></h4>
    </div>
    


    
    <div class="row">    
        {{ Html::link(route('deliv'), 'Proceseaza comanda', ['class' => 'btn btn-success ml-auto']) }}
    </div>
    
    @else
    
    <div style="margin-top: 40px; margin-bottom: 40px">
        
        <h3 class="title text-danger" style='text-align: center; font-size: 20px' >COSUL DE CUMPARATURI ESTE GOL! <span style="margin-left: 10px">  </span> SELECTATI PRODUSE IN RUBRICA  <a href='{{ route('companies') }}'> <strong> PESTICIDE </strong> </a></h3>
        
    </div>
    
    
    @endif


</div>    



