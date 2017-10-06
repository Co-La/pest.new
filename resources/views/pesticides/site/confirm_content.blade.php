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

<div class="row justify-content-center page-content" id="pesty_list">

    <div class="col-lg-9 col-sm-12" >
        <h3 style="margin: 20px 0 20px 0; color: #6077d6;">Confirma comanda </h3>
        <form action="https://www.bpay.md/user-api/payment1" method="POST" class="form-horizontal" id="contact-form">
            <div class="row">
                <div class="group col-12">
                    <label class="control-label col-lg-12" for="name">{{ Auth::user() ? Auth::user()->name : $_POST['name'] }}</label>
                    <input type="hidden" name="data" value="{{ isset($data) ? $data : '' }}">
                    <input type="hidden" name="key" value="{{ isset($sign) ? $sign : '' }}">                    
                </div>                                  
            </div> 
            <div class="row">
                <div class="group col-12">
                    <label class="control-label col-lg-12" for="email">{{ Auth::user() ? Auth::user()->email : $_POST['email'] }}</label>                    
                </div>                 
            </div>
           
            <div class="row">
                <div class="group col-lg-12">
                    <label class="control-label col-lg-12" for="company">{{ Auth::user() ? Auth::user()->company : $_POST['company'] }}</label>
                   
                </div>
                <div class="group col-lg-12">
                    <label class="control-label col-lg-12" for="adress">{{ Auth::user() ? Auth::user()->adress : $_POST['adress'] }}</label>                    
                </div>                    
            </div>
            <div class="row">
                <div class="group col-lg-12">
                    <label class="control-label col-lg-12" for="message">{{ Auth::user() ? Auth::user()->adress : $_POST['message'] }}</label>                                           
                </div>
            </div>  

            <div class="row">                     
                <h4 class="all_item_price">{{ Session::get('bag.full_price') }} <span>MDL</span></h4>               
            </div>

            <div class="row">                   
                <div class="group col-lg-12">                       
                    <input class="btn btn-success pull-right" name="submit" type="submit" value="Confirma comanda">
                    {{ csrf_field() }}
                </div>                                    
            </div>


        </form>

    </div>

    <div class="col-md-auto col-xs-auto auto-img auto-img-registr">
        <img src="{{ asset(env('THEM')) }}/image/registr.jpg" alt="contact_img" class="rounded">

    </div>

</div>
