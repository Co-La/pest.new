@if(count($articles) > 0 && is_object($articles))
<div class="row f-news"> 
    @foreach($articles as $article)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 view view-fifth">
        <img src="{{ asset(env('THEM')) }}/image/{{ $article->image }}" />
        <div class="mask">
            <h2>Articol nou</h2>
            <p>{{ ($article->created_at !== NULL) ? $article->created_at->format('F m d / H:m') : 'Articol nou' }}</p>
            <a href="{{ route('article', ['id' => $article->id]) }}" class="info">Citeste mai mult</a>
        </div>
    </div>   
    @endforeach
    
</div>

@endif

