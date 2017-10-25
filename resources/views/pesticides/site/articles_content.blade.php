<div class="row justify-content-center page-content">
    <div class="col-md-9 col-sm-6 col-sm-12">
        <div class="row articles-list">
            @if(isset($articles))
            @foreach($articles as $article)
            <div class="col-12 blog-articles">            
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <a href="{{ route('article', ['id' => $article->id])}}" alt="title">
                            <img class="blog-article-image" src="{{ asset(env('THEM')) }}/image/articles/{{ isset($article->image->big) ? $article->image->big : $article->image }}" alt="article_image"/>
                        </a>
                    </div>
                    <div class="col-md-7 col-sm-12 article-text-content">
                        <p style="text-align: right; font-size: 12px">{{ $article->created_at ? $article->created_at->format('Y/m/d H:m') : '' }}</p>
                        <a href="{{ route('article', ['id' => $article->id])}}"><h3>{{ $article->title }}</h3></a>
                        <a href="{{ route('filter', ['id' => $article->filter_id])}}" class="filter_ch" ><h6>{{ $article->filter->name }}</h6></a>
                        <p class="text-justify">{{ str_limit($article->text, 250) }}</p>
                        <a href ="{{ route('article', ['id' => $article->id])}}">Ready more</a>
                    </div>
                </div>
                <hr>
            </div>
            @endforeach
            @endif 
        </div>
        
        <div class="row pagination-div">
            <ul class="pagination">
                @if($articles->lastPage() !== NULL )
                        @if($articles->currentPage() !== 1)
                            <li><a href="{{ $articles->url($articles->currentPage() - 1) }}">&#171;</a></li>
                        @endif
                        @for($i = 1; $i <= $articles->lastPage(); $i++)
                            <li><a href="{{ $articles->url($i) }}">{{ $i }}</a></li>
                        @endfor
                        @if($articles->lastPage() > $articles->currentPage())
                            <li><a href="{{ $articles->url($articles->currentPage() + 1) }}">&#187;</a></li>
                        @endif
                @endif
                
            </ul>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-sm-12" >
        <div class="row blog-articles" id="sidebar" >  
            <h5 class="text-center" style="width: 100%; padding-top: 30px">Ultimile comentarii</h5>
            <div class="row" style="text-align: center">
                <div class="col-12">
                    <a href="">
                        <img class="col-12" src="{{ asset(env('THEM')) }}/image/no_img.png"  alt="contact_image"/>
                    </a>
                    <p>2017/03/24 12:20</p>
                    <a style="width: 100%; text-align: center; padding-top: 10px; padding-bottom: 10px" href="#" alt="comment">Ready more coment</a>
                </div>
            </div>
        </div> 
    </div>
</div>