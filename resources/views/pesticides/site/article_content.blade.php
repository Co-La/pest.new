@if($article)
<div class="row f_index_news" id="big_news">
    <div class="col-lg-5 ">          
        <a href="{{ route('blogs') }}"><img src="{{ asset(env('THEM')) }}/image/articles/{{ isset($article->image->big) ? $article->image->big : 'no-img.png' }}" alt="" class="rounded img-thumbnail" width="400" height="300"></a>
        <span class="news_date"><strong>{{ ($article->created_at) ? $article->created_at->format('m F Y / H:m') : '' }}</strong></span>           
    </div>

    <div class="col-lg-7 text-justify f_index_text" >
        <h5>{{ str_limit($article->title, 150) }} </h5>
        <p>
            {{ $article->text }}
        </p>  
        <div class="back" style="text-align: right"><a href="{{ route('blogs') }}" class="btn btn-success btn-sm" alt="back">Lista articolelor</a></div>

    </div>  

</div>
@endif

  <hr>
  <!-- start comments containers-->
  <div class="container">
      @if(isset($comments))
      <div class="col-12">
         
          <div id="write-comments" class="add_new_comment" parent_id="0">Scrie un comentariu <span class="fa fa-long-arrow-down"></span></div>
          <h3 style="color: #89878f">Comentarii (<span id="comments-number">{{ count($comments) ? count($comments) : '0' }}</span>)</h3>
          <!-- one comment-->
          
          <ul id="list-parent-coment">
              @foreach($comments as $k => $comment)
              
              @if($k !== 0)
                @break
              @endif
                 @include(env('THEM').'.site.comment_custom', ['items' => $comment]) 
              @endforeach                           
          </ul>       
          
          <!-- end one comment-->

      </div>
    @endif
      <p>* pentru a scrie un comentariu este necesara autorizarea</p>      
  </div>
  <div id="comment-parrent" class="col-md-5 col-sm-12"></div>
 
  <div id="hidden-comment-form">
    {{ Form::open(['url' => route('addcom'), 'method' => 'POST',  'class' => 'form-horizontal', 'id' => 'comment-form']) }}
    {{ csrf_field() }}
  <div class="blog-comment-text">
    {{ Form::textarea('text','' ,['class' => 'form-control comment-form-textarea', 'art_id' => $article->id ]) }}     
    {{ Form::button('Posteaza', ['class' => 'btn btn-success btn-sm', 'type' => 'submit', 'id' => 'comment-form-btn']) }}
    
 </div>
{{  Form:: close() }}  
      
  </div>  

