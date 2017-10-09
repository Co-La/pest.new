<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>
    <div class="col-lg-12">
        <h1>{{ isset($parasite->id) ? 'Redactare '.$parasite->name : 'Daunator nou' }}</h1>
        @if(isset($parasite['id']))
            {{ Form::open(['url' => route('updateParaz', ['id' => $parasite['id']]), 'method' => 'PUT', 'class' => 'form-horizontal']) }}
        @else
            {{ Form::open(['url' => route('storeParaz'), 'method' => 'POST', 'class' => 'form-horizontal']) }}

        @endif
        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('id', 'ID', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('id', isset($parasite['id']) ? $parasite['id'] : old('id'), ['class' => 'form-control col-lg-4']) }}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('name', 'Nume daunator', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('name', isset($parasite['name']) ? $parasite['name'] : old('name'), ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('science_name', 'Nume stiintific', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('science_name', isset($parasite['science_name']) ? $parasite['science_name'] : old('science_name'), ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <div class="col-lg-8" style="text-align: right">
                    {{ Form::button('Selecteaza', ['class' => 'btn btn-success', 'type' => 'submit','id' => 'addParaz' ]) }}
                    {{ csrf_field() }}
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>