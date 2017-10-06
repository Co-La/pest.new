<div class="row" style="height: auto" id="product_store">
    {{ Form::open(['url' => route('customer'), 'class'=> 'form-inline col-lg-12 col-md-12 col-sm-12', 'id' => 'select_pest_info' ]) }}
    <div class="col-lg-4 col-md-4 col-sm-12 product-price product_info_div">

        {{ Html::image(asset(env('THEM').'/image/no_img.png')) }}
        <h2 id='full_price' class="item_total_price">0 <span>LEI</span></h2>
        <div id="select_item_number">
            <div class="row">
                <p class='minus_item' m_route="{{ route('minus') }}">-</p>
                {{ Form::text('quantity', '1', ['class' => 'form-control col-3 number_item']) }}
                <p class='plus_item' m_route="{{ route('plus') }}">+</p>
            </div>

            {{ Form::button('Pastreaaz in cos', ['class' => 'btn btn-success', 'type' => 'submit','id' => 'bag-product-save']) }}
        </div>

    </div>

    <div class="col-lg-8 col-md-8 col-sm-12 list-input-info product_info_div">
        <div class="row input-row">
            <div class="col-lg-3 col-md-3 col-sm-6 div-input-item">
                {{ Form::label('activ_sub', 'Substanta activa', ['class' => 'control-label']) }}
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6 div-input-item">
                {{ Form::text('activ_sub', old('activ_sub'), ['class' => 'form-control', 'width' => '100%', 'disabled', 'id' => 'activ_sub']) }}
                {{ Form::hidden('id', '', ['id' => 'product_id']) }}
            </div>
        </div>


        <div class="row input-row">
            <div class="col-lg-3 col-md-3 col-sm-6 div-input-item">
                {{ Form::label('grup', 'Grupa', ['class' => 'control-label']) }}
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6 div-input-item">
                {{ Form::text('grup', old('grup'), ['class' => 'form-control', 'width' => '100%', 'disabled', 'id' => 'grup']) }}
            </div>
        </div>

        <div class="row input-row">
            <div class="col-lg-3 col-md-3 col-sm-6 div-input-item">
                {{ Form::label('date', 'Data', ['class' => 'control-label']) }}
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6 div-input-item">
                {{ Form::text('date', old('date'), ['class' => 'form-control', 'width' => '100%', 'disabled', 'id' => 'date']) }}
            </div>
        </div>

        <div class="row input-row">
            <div class="col-lg-3 col-md-3 col-sm-6 div-input-item">
                {{ Form::label('packet', 'Ambalaj', ['class' => 'control-label']) }}
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6 div-input-item">
                {{ Form::text('packet', old('packet'), ['class' => 'form-control', 'width' => '100%', 'disabled', 'id' => 'packet']) }}
            </div>
        </div>


        <div class="row input-row">
            <div class="col-lg-3 col-md-3 col-sm-3 div-input-item">
                {{ Form::label('price', ' Pret: /Valuta', ['class' => 'control-label']) }}
            </div>
            <div class="container col-lg-9">
                <div class="row">
                    <div class="col-6 div-input-item">
                        {{ Form::text('price', old('price'), ['class' => 'form-control', 'width' => '100%', 'disabled', 'id' => 'price']) }}
                    </div>
                    <div class="col-6 div-input-item">
                        {{ Form::text('curr', old('curr'), ['class' => 'form-control', 'width' => '100%', 'disabled', 'id' => 'curr']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row input-row">
            <div class="col-lg-3 col-md-3 col-sm-3 div-input-item select_pest_info-last-input">
                {{ Form::label('price_mdl', ' Pret: /Lei', ['class' => 'control-label']) }}
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 div-input-item select_pest_info-last-input">
                {{ Form::text('price_mdl', old('price'), ['class' => 'form-control', 'width' => '100%', 'disabled', 'id' => 'price_mdl']) }}
            </div>
        </div>


    </div>


    {{ Form::close() }}


</div>