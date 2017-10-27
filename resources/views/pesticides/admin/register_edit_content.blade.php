<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>
    <div class="col-lg-12">
        <h1>{{ isset($register) ? 'Redacteaza '.$register->product->name : 'Adauga registru' }}</h1>
        {{ Form::open(['url' => isset($register->id) ? route('updateReg', $register->id) : route('storeReg'), 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) }}

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('id', 'ID', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('id', isset($register['id']) ? $register['id'] : old('id'), ['class' => 'form-control col-lg-4', 'disabled']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('product_id', 'Denumirea produsului', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::select('product_id', $products, isset($register->product_id) ? $register->product_id : NULL ,  ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('culture_id', 'Cultura', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                        {{ Form::select('culture_id', $cultures, isset($register->culture_id) ? $register->culture_id : NULL ,  ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('method_id', 'Metoda de prelucrare', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {!! Form::select('method_id', $methods, isset($register->method_id) ? $register->method_id : NULL ,  ['class' => 'form-control col-lg-4']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('dose', 'Norma de consum', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('dose', isset($register['dose']) ? $register['dose'] : old('dose'), ['class' => 'form-control col-lg-4', 'data-placeholder' => "Selectati tara..."]) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('exit_date', 'Data iesirii in cimp', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('exit_date', isset($register['exit_date']) ? $register['exit_date'] : old('exit_date'), ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('last_utilization', 'Ultimul tratament', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('last_utilization', isset($register['last_utilization']) ? $register['last_utilization'] : old('exit_date'), ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-12">

                    {{ Form::label('parazites', 'Daunatorii', ['class' => 'control-label col-lg-3']) }}
                    <div class="col-lg-5" style="height: 280px; border: 1px solid gray; overflow-y: scroll">
                        <ul class="list-unstyled">
                            @if (isset($parazites))
                                @foreach($parazites as $parazite)
                                    @if(isset($register->parasite_id))
                                        <li>
                                            @if(in_array($parazite['id'],explode(',',$register->parasite_id)))
                                                {{ Form::checkbox('parasite_id[]', $parazite['id'], true) }}
                                                {{ Form::label('parasite_id', $parazite['name']) }}
                                            @else
                                                {{ Form::checkbox('parasite_id[]', $parazite['id']) }}
                                                {{ Form::label('parasite_id', $parazite['name']) }}
                                            @endif
                                        </li>
                                    @else
                                        <li>
                                                {{ Form::checkbox('parasite_id[]', $parazite['id']) }}
                                                {{ Form::label('parasite_id', $parazite['name']) }}
                                        </li>


                                    @endif
                                @endforeach
                            @endif
                        </ul>


                   </div>


            </div>
        </div>


        @if(isset($register->id))
            <input type="hidden" name="_method" value="PUT">
        @endif


        <div class="form-group col-12">
            <div class="col-lg-8" style="text-align: right">
                {{ Form::button('Selecteaza', ['class' => 'btn btn-success', 'type' => 'submit','id' => 'addReg' ]) }}
                {{ csrf_field() }}
            </div>
        </div>
    </div>


    {{ Form::close() }}



</div>
</div>

<script type="text/javascript">
    CKEDITOR.replace('text');
</script>