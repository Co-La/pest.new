@foreach($menus as $menu) 
    <li class="nav-item"><a href="{{ $menu->url() }}" class="nav-link">{{ $menu->title }}</a></li>
    @if($menu->hasChildren())
        <ul class="dropdown-menu">
            @include(env('THEM').'.site.custom_menu', ['menus' => $menu->children()])        
        </ul>        
    @endif
@endforeach

