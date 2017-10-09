<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>
    <div class="col-lg-12">
        <h1>  {{isset($culture->name) ? 'Redacteaza'.' '.strtoupper($culture->name) : 'Adauga cultura nou'}}</h1>
        @if(isset($culture['id']))
            {{ Form::open(['url' => route('updateCult', ['id' => $culture['id']]), 'method' => 'PUT', 'class' => 'form-horizontal']) }}
        @else
            {{ Form::open(['url' => route('storeCult'), 'method' => 'POST', 'class' => 'form-horizontal']) }}

        @endif
        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('id', 'ID', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('id', isset($culture['id']) ? $culture['id'] : old('id'), ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('name', 'Denumirea culturii', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('name', isset($culture['name']) ? $culture['name'] : old('name'), ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>
            <div class="form-group col-12">
                <div class="col-lg-8" style="text-align: right">
                    {{ Form::button('Selecteaza', ['class' => 'btn btn-success', 'type' => 'submit','id' => 'addCult' ]) }}
                    {{ csrf_field() }}
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>