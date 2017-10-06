@if(count($items) > 0)
<div class="row footer">   
    <div class="col-lg-3">
        <ul>
            <li>MENU</li>
            @foreach($items->roots() as $item)
            <li><a href="{{ $item->url() }}">{{ $item->title }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-lg-3">
        <ul>
            <li>Acount</li>
            <li><a href="">My acount</a></li>
            <li><a href="">Order</a></li>
            <li><a href="">Transport</a></li>
        </ul>               
    </div>
    <div class="col-lg-6 footer-info" >            
        <svg id="img_svg_big" data-name="{{ asset(env('THEM')) }}/img_svg_big" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 79.7 28"><defs><style>.cls-1{font-size:25px;fill:#fff;font-family:Arizonia;}.cls-2{font-size:18px;}</style></defs><title>logoSVG</title><text class="cls-1" transform="translate(0 19.6)">Co<tspan class="cls-2" x="26.2" y="0">&amp;&amp;</tspan><tspan x="49.2" y="0">La</tspan></text></svg>
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo odit quis minima tenetur, blanditiis, ex sed. Laudantium minima adipisci veritatis sint vero voluptas eos, dolores laboriosam odio, ipsam officiis commodi.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut laboriosam asperiores odio esse maiores placeat tempora aliquam 
        <p>  
    </div>            

</div>
@endif
