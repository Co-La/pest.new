@foreach($items as $comment)
<li>
    <div class="row blog-comment">
        <div class="col-md-2 col-sm-12 blog-avatar">
            <img image_path="{{ asset(env('THEM')) }}" src="{{ asset(env('THEM')) }}/image/no_avatar.png" alt="user_image">
        </div>
        <div class="col-md-2 col-sm-12 blog-comment-text">                    
            <div class="row comment-date">
                <h6 class="col-12 blog-user">{{ $comment->alias }}</h6>
                <p>{{ $comment->created_at->format('F m d, H:m')  }}</p>
                <p class="add_new_comment" parent_id="{{ $comment->id }}">Adauga un comentariu</p>

            </div> 
        </div>     
        <div class="col-md-8 col-sm-12 blog-comment-text">
            <p class="blog-user-text">{{ $comment->text }}</p>                    
        </div>
    </div>

    <div class="row">
        <div class="form-place col-md-5 col-sm-12"></div>        
    </div>

    <hr>    
    <ul class="children">
        @if(isset($comments[$comment->id]))
        @include(env('THEM').'.site.comment_custom', ['items' => $comments[$comment->id]])
        @endif
    </ul>
   
</li>
@endforeach





