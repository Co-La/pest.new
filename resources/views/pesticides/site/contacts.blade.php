@extends(env('THEM').'.layouts.site')

@section('search')
    @include(env('THEM').'.site.search')
@endsection

@section('navigation')
    {!! $menus !!}
@endsection

@section('bar_title')
    @include(env('THEM').'.site.bar_title')
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('listnews')
     {!! $listnews !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection

