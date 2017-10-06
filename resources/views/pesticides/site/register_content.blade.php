       <!--endTitle page-->
    
    <div class="row justify-content-center page-content" id="pesty_list">
     
       <div class="col-md-9 col-sm-12" >           
           <form action="{{ route('register') }}" method="POST" class="form-horizontal contact-form-cl" id="register-form">
               <div class="row">
                   <div class="group col-md-6">
                       <label class="control-label col-md-12" for="name">Nume</label>
                       <input class="form-control" id="name" name="name" type="text">
                   </div>
                   <div class="group col-md-6">
                       <label class="control-label col-md-12" for="email">Email</label>
                       <input class="form-control" id="email" name="email" type="email">
                   </div>                   
               </div>
               
               <div class="row">
                   <div class="group col-md-4">
                       <label class="control-label col-md-12" for="alias">Alias</label>
                       <input class="form-control" id="password" name="alias" type="text">
                   </div>                   
                   <div class="group col-md-4">
                       <label class="control-label col-md-12" for="password">Parola</label>
                       <input class="form-control" id="password" name="password" type="password">
                   </div>
                   <div class="group col-md-4">
                       <label class="control-label col-lg-md" for="password_confirmation">Confirma parola</label>
                       <input class="form-control" id="password_confirmation" name="password_confirmation" type="password">
                   </div>                   
               </div>
               <br>
               
               <div class="row">
                   <div class="group col-md-4">
                       <label class="control-label col-md-12" for="year">Anul nasterii</label>
                       <select class="form-control" id="year" name="year">
                           @if(isset($years))
                                    <option>Anul nasterii</option>
                                @foreach($years as $year)
                                    <option> {{ $year }} </option>
                                @endforeach
                           @endif
                           
                           
                       </select>                       
                   </div>
                   <div class="group col-md-4">
                       <label class="control-label col-md-12" id="month" for="month">Luna</label>
                       <select class="form-control" name="month">
                            @if(isset($months))
                                    <option>Luna</option>
                                @foreach($months as $month)
                                    <option> {{ $month }} </option>
                                @endforeach
                           @endif
                       </select>
                   </div> 
                   <div class="group col-md-4">
                       <label class="control-label col-md-12" for="day">Ziua</label>
                       <select class="form-control" id="day" name="day">
                            @if(isset($dates))
                                    <option>Ziua</option>
                                @foreach($dates as $date)
                                    <option> {{ $date }} </option>
                                @endforeach
                           @endif
                       </select>
                   </div> 
                   
               </div>
               
               <br>
               <div class="row">
                   <div class="group col-md-12">
                       <label class="control-label col-md-12" for="company">Compania</label>
                       <input class="form-control" id="company" name="company" type="text">
                   </div>
                   <div class="group col-md-12">
                       <label class="control-label col-md-12" for="adress">Adresa</label>
                       <input class="form-control" id="adress" name="adress" type="text">
                   </div>                    
               </div>
               <div class="row">
                   <div class="group col-md-12">
                       <label class="control-label col-md-12" for="messaj">Mesaj</label>
                       <textarea class="form-control" id="messaj" name="messaj"></textarea>
                   </div>
                                   
                    <div class="group col-md-12">                       
                       <input class="btn btn-success pull-right" name="submit" type="submit" value="Trimite forma">
                       {{ csrf_field() }}
                   </div>                                    
               </div>
           </form>
           
       </div>
       
        <div class="col-md-auto col-xs-auto auto-img auto-img-registr">
           <img src="{{ asset(env('THEM')) }}/image/registr.jpg" alt="contact_img" class="rounded">
           
       </div>
       
       
       
       
       
    </div>
    
    
    
  