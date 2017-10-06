<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>    
    <div class="col-lg-12">
        <h1>Lista companiilor</h1>
        @if(isset($company['id']))
        {{ Form::open(['url' => route('updateComp', ['id' => $company['id']]), 'method' => 'PUT', 'class' => 'form-horizontal']) }} 
        @else
        {{ Form::open(['url' => route('storeComp'), 'method' => 'POST', 'class' => 'form-horizontal']) }} 
        
        @endif
           
             
           
          <div class="row">
              <div class="form-group col-12">
                  {{ Form::label('id', 'ID', ['class' => 'control-label col-lg-3']) }}                    
                    <div class="col-lg-5">
                        {{ Form::text('id', isset($company['id']) ? $company['id'] : old('id'), ['class' => 'form-control col-lg-4']) }} 
                        
                    </div>
                </div>              
          </div>
          
          <div class="row">
              <div class="form-group col-12">
                  {{ Form::label('name', 'Numele companiei', ['class' => 'control-label col-lg-3']) }}                    
                    <div class="col-lg-5">
                        {{ Form::text('name', isset($company['name']) ? $company['name'] : old('name'), ['class' => 'form-control col-lg-4', 'data-placeholder' => "Selectati tara..."]) }} 
                    </div>
                </div>              
          </div>
          
          <div class="row">
              <div class="form-group col-12">
                  {{ Form::label('countries', 'Numele tarii', ['class' => 'control-label col-lg-3']) }}                    
                    <div class="col-lg-5">
                        {{ Form::select('countries', $countries, isset($countries['id']) ? $countries['id'] : null, ['class' => 'form-control chzn-select']) }} 
                    </div>
                </div>    
              
              <div class="form-group col-12">                                      
                  <div class="col-lg-8" style="text-align: right">
                        {{ Form::button('Selecteaza', ['class' => 'btn btn-success', 'type' => 'submit','id' => 'addCompany' ]) }} 
                        {{ csrf_field() }}
                    </div>
                </div> 
          </div>
               
          
          {{ Form::close() }}  



    </div>
</div>
