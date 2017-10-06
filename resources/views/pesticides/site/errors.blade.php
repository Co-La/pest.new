@extends(env('THEM').'.layouts.site')

@section('search')
    @include(env('THEM').'.site.search')
@endsection

@section('navigation')
    {!! $menus !!}
@endsection

@section('content')
<div class="alert alert-danger">
    <h3 class="op-status eror">
        A avut loc o eroare!
    </h3>
    
</div>
@endsection

@section('listnews')
     {!! $listnews !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection
