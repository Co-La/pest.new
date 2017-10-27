@extends(env('THEM').'.layouts.site')

@section('search')
    {!! isset($search) ? $search : '' !!}
@endsection

@section('navigation')
    {!! $menus !!}
@endsection

@section('bar_title')
    {!! isset($bar_title) ? $bar_title : '' !!}
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


