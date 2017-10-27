@if(count($article) > 0)
<div class="row f_index_news" id="big_news">
    <div class="col-lg-5 ">          
        <a href="{{ route('article', ['id' => $article->id]) }}"><img src="{{ asset(env('THEM')) }}/image/articles/{{ isset($article->image->big) ? $article->image->big : 'no-img.png' }}" alt="" class="rounded img-thumbnail" width="400" height="300"></a>
        <span class="news_date"><strong>{{ ($article->created_at) ? $article->created_at->format('m F Y / H:m') : '' }}</strong></span>           
    </div>

    <div class="col-lg-7 text-justify f_index_text" >
        <a href="{{ route('article', ['id' => $article->id]) }}"><h5>{{ str_limit($article->title, 150) }} </h5></a>
        <p>
            {!!  str_limit($article->text,500) !!}
        </p>
        <a href="{{ route('article', ['id' => $article->id]) }}" class="btn btn-success pull-right">Citeste</a>
    </div>
    <div class="row">
        <div class="col-12">
            <video controls width="100%" poster="{{ asset(env('THEM')) }}/video/ag_chem.jpg" >
                <source src="{{ asset(env('THEM')) }}/video/ag_chem.webm" type='video/webm; codecs="vp8, vorbis"'>
                <source src="{{ asset(env('THEM')) }}/video/ag_chem.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                <source src="{{ asset(env('THEM')) }}/video/ag_chem.ogv" type='video/ogg;  codecs="theora, vorbis"'>
            </video>
        </div>
    </div>
</div>
@endif