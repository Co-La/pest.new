@extends(env('THEM').'.layouts.admin')

@section('topnav')
    {!! $topnav !!}
@endsection

@section('bartitle')
    {!! $bartitle !!}
@endsection

@section('menu')
    {!! $menu !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection

@section('modal')
    @include(env('THEM').'.admin.modal')
@endsection
