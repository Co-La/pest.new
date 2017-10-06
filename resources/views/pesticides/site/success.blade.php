@extends(env('THEM').'.layouts.site')

@section('search')
    @include(env('THEM').'.site.search')
@endsection

@section('navigation')
    {!! $menus !!}
@endsection

@section('content')
<div class="alert alert-success">
    <h3 class="op-status">
        Operatiune indeplinita cu succes!
    </h3>
    
</div>
@endsection

@section('listnews')
     {!! $listnews !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection
