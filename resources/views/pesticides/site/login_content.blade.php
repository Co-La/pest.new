    <!--endTitle page-->
    
    <div class="row justify-content-center page-content" id="pesty_list">
     
       <div class="col-lg-9 col-sm-12" >          
           <form action="{{ route('login') }}" method="POST" class="form-horizontal contact-form-cl" id="login-form">
               <div class="row">                   
                   <div class="group col-lg-6">
                       <label class="control-label col-lg-12" for="email">Email</label>
                       <input class="form-control" id="email" name="email" type="email">
                   </div>

                   
                   <div class="group col-lg-6">
                       <label class="control-label col-lg-12" for="pass">Parola</label>
                       <input class="form-control" id="pass" name="password" type="password">
                   </div>
               </div>
               
               
               <div class="row">   
                    <div class="group col-lg-12">                       
                       <input class="btn btn-success pull-right" name="submit" type="submit" value="Selecteaza">
                       {{ csrf_field() }}
                   </div>                                    
               </div>
           </form>
           
       </div>
       
        <div class="col-md-auto col-xs-auto auto-img auto-img-registr">
           <img src="{{ asset(env('THEM')) }}/image/registr.jpg" alt="contact_img" class="rounded">
           
       </div>
       
       
    </div>
    
    
    
