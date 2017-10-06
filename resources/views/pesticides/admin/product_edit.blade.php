<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>    
    <div class="col-lg-12">
        <h1>{{ $page_title }}</h1>
        @if(isset($product['id']))
        {{ Form::open(['url' => route('updateProd', ['id' => $product['id']]), 'method' => 'PUT', 'class' => 'form-horizontal']) }} 
        @else
        {{ Form::open(['url' => route('storeProd'), 'method' => 'POST', 'class' => 'form-horizontal']) }} 

        @endif
        <ul class="list-group">
            <li class="list-group-item">
                <div class="form-group col-12">
                    {{ Form::label('company_id', 'Compania producatoare', ['class' => 'control-label col-lg-3']) }}                    
                    <div class="col-lg-5">
                        {{ Form::select('company_id', $companies, isset($product->company->id) ? $product->company->id : null, ['class' => 'form-control chzn-select']) }} 
                    </div>
                </div>                 

                <div class="form-group col-12">
                    {{ Form::label('category_id', 'Categoria', ['class' => 'control-label col-lg-3']) }}                    
                    <div class="col-lg-5">
                        {{ Form::select('category_id', $categories, isset($product->category->id) ? $product->category->id : null, ['class' => 'form-control chzn-select']) }} 
                    </div>                
                </div> 


            </li>
            <li class="list-group-item">
                <div class="row">                    
                    <div class="form-group col-12">
                        {{ Form::label('id', 'ID', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-1">
                            {{ Form::text('id', isset($product['id']) ? $product['id'] : old('id'), ['class' => 'form-control col-lg-4', 'disabled']) }} 

                        </div>
                    </div>              
                </div>
                <div class="row">

                    <div class="form-group col-12">
                        {{ Form::label('code', 'Numarul de inregistrare', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::text('code', isset($product['code']) ? $product['code'] : old('registered'), ['class' => 'form-control col-lg-4', 'data-placeholder' => "Selectati tara..."]) }} 
                        </div>
                    </div>                                                   
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        {{ Form::label('registered', 'Data inregistrarii', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::text('registered', isset($product['registered']) ? $product['registered'] : old('registered'), ['class' => 'form-control col-lg-4', 'id' => 'datepicker']) }} 
                        </div>
                    </div>  
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        {{ Form::label('level', 'Grupa de toxicitatea', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::select('level', $level, isset($product->level) ? $product->level : old('level'), ['class' => 'form-control chzn-select']) }} 
                        </div>
                    </div> 
                </div>


            </li>
            <li class="list-group-item">

                <div class="row">

                    <div class="form-group col-12">
                        {{ Form::label('name', 'Numele produsului', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::text('name', isset($product['name']) ? $product['name'] : old('name'), ['class' => 'form-control col-lg-4', 'data-placeholder' => "Selectati tara..."]) }} 
                        </div>
                    </div>              
                </div>


                <div class="row">
                    <div class="form-group col-12">
                        {{ Form::label('substance', 'Substanta activa', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::text('substance', isset($product['substance']) ? $product['substance'] : old('substance'), ['class' => 'form-control col-lg-4', 'data-placeholder' => "Selectati tara..."]) }} 
                        </div>
                    </div>              
                </div>
                <div class="row">

                    <div class="form-group col-12">
                        {{ Form::label('used', 'Statut', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::select('used', $used, isset($product->used) ? $product->used : old('used'), ['class' => 'form-control chzn-select']) }} 
                        </div>                
                    </div>    
                </div>


            </li>

            <li class="list-group-item">

                <div class="row">
                    <div class="form-group col-12">
                        {{ Form::label('price', 'Pretul', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::text('price', isset($product['price']) ? $product['price'] : old('price'), ['class' => 'form-control col-lg-4']) }} 
                        </div>
                    </div>              
                </div>

                <div class="row">

                    <div class="form-group col-12">
                        {{ Form::label('curr', 'Valuta', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::select('curr', $curr, isset($product->curr) ? $product->curr : old('curr'), ['class' => 'form-control chzn-select']) }} 
                        </div>                
                    </div> 
                </div>


                <div class="row">
                    <div class="form-group col-12">
                        {{ Form::label('pack', 'Ambalaj', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::text('pack', isset($product['pack']) ? $product['pack'] : old('pack'), ['class' => 'form-control col-lg-4']) }} 
                        </div>
                    </div>              
                </div>
            </li>


            <li class="list-group-item">
                <div class="row">
                    <div class="form-group col-12">
                        {{ Form::label('image', 'Imagine', ['class' => 'control-label col-lg-3']) }}                    
                        <div class="col-lg-5">
                            {{ Form::text('image', isset($product['image']) ? $product['image'] : old('image'), ['class' => 'form-control col-lg-4']) }} 
                        </div>
                    </div>              
                </div>

                <div class="row">

                    <div class="form-group col-12">                                      
                        <div class="col-lg-8" style="text-align: right">
                            {{ Form::button('Selecteaza', ['class' => 'btn btn-success', 'type' => 'submit','id' => 'addProduct' ]) }} 
                            {{ csrf_field() }}
                        </div>
                    </div> 
                </div>
            </li>
            
            
        </ul>    
        
        
        
        
        
        
        
        
        
        


        {{ Form::close() }}  



    </div>
</div>
