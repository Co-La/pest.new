@if(isset($companies) && is_array($companies))
    <div class="row page-content" id="pesty_list">

        <div class="col-lg-6 col-md-6 col-sm-6 category-select">
            {{ Form::open(['url' => route('ajax'), 'class'=> 'form-horizontal contact-form-cl', 'id' => 'select_item' ]) }}
            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                {{ Form::label('product', 'Produse', ['class' => 'control-label']) }}
                {{ Form::select('product',(isset($products)) ? $products : [], null, ['class' => 'form-control', 'id' => 'product_ID']) }}
            </div>
            {{Form::close()}}
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6 category-select">
            {{ Form::open(['url' => isset($company['id']) ? route('company', $company['id']) : route('companies'), 'class'=> 'form-horizontal contact-form-cl', 'id' => 'select_company_item' ]) }}
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                {{ Form::label('company', 'Producatori', ['class' => 'control-label']) }}
                {{ Form::select('company', $companies, isset($company['id']) ? ($company['id']) : NULL, ['class' => 'form-control', 'id' => 'company_ID']) }}

            </div>
            {{Form::close()}}
        </div>

    </div>

    <div class="row">

        <div class="container pest_content_container">
            <hr>
                {!! isset($company_custom) ? $company_custom : '' !!}
            <hr>
        </div>

    </div>

@endif


