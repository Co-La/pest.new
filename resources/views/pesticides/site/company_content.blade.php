@if(isset($companies) && is_array($companies))
    <div class="row page-content" id="pesty_list">

        <div class="col-lg-6 col-md-6 col-sm-6 category-select">
            {{ Form::open(['url' => route('ajax'), 'class'=> 'form-horizontal contact-form-cl', 'id' => 'select_item' ]) }}
            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                {{ Form::label('product', 'Produse', ['class' => 'control-label']) }}
                {{ Form::select('product',(isset($products) && isset($company['name'])) ? $products : [], null, ['class' => 'form-control', 'id' => 'product_ID']) }}
            </div>
            {{Form::close()}}
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6 category-select">
            {{ Form::open(['url' => route('companies'), 'class'=> 'form-horizontal contact-form-cl', 'id' => 'select_company_item' ]) }}
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                {{ Form::label('company', 'Producatori', ['class' => 'control-label']) }}
                @if(isset($company['id']))
                    {{ Form::select('company', $companies, '/companies/'.$company['id'] , ['class' => 'form-control', 'id' => 'company_ID']) }}
                @else
                    {{ Form::select('company', $companies, NULL , ['class' => 'form-control', 'id' => 'company_ID']) }}
                @endif

            </div>
            {{Form::close()}}
        </div>

    </div>

    <div class="row">

        <div class="container pest_content_container">
            <hr>
            @if(isset($products))
                @include(env('THEM').'.site.company_content_custom')
            @endif
            <hr>
        </div>

    </div>

@endif

