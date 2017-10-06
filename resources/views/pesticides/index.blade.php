@extends(env('THEM').'.layouts.site')

@section('search')
    @include(env('THEM').'.site.search')
@endsection

@section('navigation')
    {!! $menus !!}
@endsection

@section('slider')
    @include(env('THEM').'.site.slider')
@endsection

@section('bar_title')
    @include(env('THEM').'.site.bar_title')
@endsection

@section('firstnews')
    {!! $firstnews !!}
@endsection

@section('listnews')
     {!! $listnews !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection
