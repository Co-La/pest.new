<div class="row justify-content-center" id="schemes-container">
    <div class="col-lg-10" id="image-schemes">
        @if(isset($schemes))
            @foreach($schemes as $k => $schem)
                @if(($k === 0) || ($k%4 === 0))
                    <div class="row gallery">               
                @endif
                        <div class="group col-lg-3 col-md-6 col-sm-12">
                            <h5>{{ $schem->name }}</h5>
                            <a href="{{asset(env('THEM'))}}/image/schemes/{{ $schem->image }}"><img src="{{ asset(env('THEM')) }}/image/schemes/{{ $schem->image }}" alt=""/></a>                            
                        </div> 
                @if((($k+1)%4 === 0) || (count($schemes) == ($k+1)))
                     </div>    
                @endif       
            @endforeach 
        @endif 
        
      </div>  
    
</div> 



