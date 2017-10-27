<div class="container menu-list">
    <div class="row" >
        <nav class="navbar navbar-expand-lg navbar-light col-lg-12">
            <a href="" class="navbar-brand">
                <svg id="img_svg" data-name="img_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 79.7 28"><defs><style>.cls-1{font-size:26px;fill:#fff;font-family:Arizonia;}.cls-2{font-size:18px;}</style></defs><title>logoSVG</title><text class="cls-1" transform="translate(0 19.6)">Co<tspan class="cls-2" x="26.2" y="0">&amp;&amp;</tspan><tspan x="49.2" y="0">La</tspan></text></svg>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#divnavigation">
                <i class="navbar-toggler-icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="divnavigation">
                @if(isset($items))
                <ul class="navbar-nav ml-auto">
                    @include(env('THEM').'.site.custom_menu', ['menus' => $items->roots()])
                </ul>
                @endif
            </div>
        </nav>
    </div>
</div>
