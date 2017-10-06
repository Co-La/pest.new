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

</div>     <!--endTitle page-->
    
    <div class="row justify-content-center page-content" id="pesty_list">
     
       <div class="col-lg-9 col-sm-12" >
           <h3 style="margin: 20px 0 20px 0; color: #6077d6;">Introduce-ti datele de contact </h3>
           <form action="{{ route('confirm') }}" method="POST" class="form-horizontal contact-form-cl" id="contact-form">
               <div class="row">
                   <div class="group col-lg-6">
                       <label class="control-label col-lg-12" for="name">Nume</label>
                       <input class="form-control" id="name" name="name" type="text" value="{{ Auth::user() ? Auth::user()->name : old('name') }}" >
                   </div>
                   <div class="group col-lg-6">
                       <label class="control-label col-lg-12" for="email">Email</label>
                       <input class="form-control" id="email" name="email" type="email" value="{{ Auth::user() ? Auth::user()->email : old('email') }}">
                   </div>                   
               </div> 
               
               <br>
               <div class="row">
                   <div class="group col-lg-12">
                       <label class="control-label col-lg-12" for="company">Compania</label>
                       <input class="form-control" id="company" name="company" type="text" value="{{ Auth::user() ? Auth::user()->company : old('company') }}">
                   </div>
                   <div class="group col-lg-12">
                       <label class="control-label col-lg-12" for="adress">Adresa</label>
                       <input class="form-control" id="adress" name="adress" type="text" value="{{ Auth::user() ? Auth::user()->adress : old('adress') }}">
                   </div>                    
               </div>
               <div class="row">
                   <div class="group col-lg-12">
                       <label class="control-label col-lg-12" for="message">Mesaj</label>
                       <textarea class="form-control" id="message" name="message">{{ Auth::user() ? Auth::user()->adress : old('message') }}</textarea>                       
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

