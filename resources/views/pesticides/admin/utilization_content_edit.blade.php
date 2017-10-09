<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>
    <div class="col-lg-12">
        <h1>Editare metoda</h1>
        @if(isset($method['id']))
            {{ Form::open(['url' => route('updateMeth', ['id' => $method['id']]), 'method' => 'PUT', 'class' => 'form-horizontal']) }}
        @else
            {{ Form::open(['url' => route('storeMeth'), 'method' => 'POST', 'class' => 'form-horizontal']) }}

        @endif


        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('id', 'ID', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('id', isset($method['id']) ? $method['id'] : old('id'), ['class' => 'form-control col-lg-4', 'disabled']) }}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('utilization', 'Methoda de utilizare', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::textarea('utilization', isset($method['utilization']) ? $method['utilization'] : old('name'), ['id' => 'editor1', 'class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <div class="col-lg-8" style="text-align: right">
                    {{ Form::button('Selecteaza', ['class' => 'btn btn-success', 'type' => 'submit','id' => 'addMethod' ]) }}
                    {{ csrf_field() }}
                </div>
            </div>
        </div>


        {{ Form::close() }}



    </div>
</div>
