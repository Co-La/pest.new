<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>
    <div class="col-lg-12">
        <h1>{{ isset($article->name) ? 'Redacteaza '.$article->name : 'Articol nou' }}</h1>
          {{ Form::open(['url' => isset($article->id) ? route('updateArt', $article->id) : route('storeArt'), 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) }}

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('id', 'ID', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('id', isset($article['id']) ? $article['id'] : old('id'), ['class' => 'form-control col-lg-4', 'disabled']) }}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('title', 'Titlul articol', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('title', isset($article['title']) ? $article['title'] : old('title'), ['class' => 'form-control col-lg-4', 'data-placeholder' => "Selectati tara..."]) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('text', 'Statut', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::textarea('text', isset($article['text']) ? $article['text'] : old('title'), ['id' => 'ckeditor2','class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('status', 'Statut', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    {{ Form::text('status', isset($article['status']) ? $article['status'] : old('title'), ['class' => 'form-control col-lg-4', 'data-placeholder' => "Selectati tara..."]) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('image', 'Imagine', ['class' => 'control-label col-lg-3']) }}
                <div class="col-lg-5">
                    @if(isset($article->image))
                    {{Html::image(asset(env('THEM')).'/image/articles/'.json_decode($article->image)->small, 'imagine', ['class' => 'img-rounded'] )}}
                    @endif
                    {{ Form::file('image', ['class' => 'form-control col-lg-4']) }}
                </div>
            </div>
        </div>

        @if(isset($article->id))
            <input type="hidden" name="_method" value="PUT">
        @endif


        <div class="form-group col-12">
                <div class="col-lg-8" style="text-align: right">
                    {{ Form::button('Selecteaza', ['class' => 'btn btn-success', 'type' => 'submit','id' => 'addArt' ]) }}
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