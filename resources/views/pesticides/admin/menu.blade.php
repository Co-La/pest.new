<div id="left">
    <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
        </div>
        <div class="user-wrapper bg-dark">
            <a class="user-link" href="">
                <img class="media-object img-thumbnail user-img" alt="User Picture" src="{{ env('THEM') }}/admin/assets/img/user.gif">
                <span class="label label-danger user-label">16</span>
            </a>

            <div class="media-body">
                <h5 class="media-heading">Lazari</h5>
                <ul class="list-unstyled user-info">
                    <li><a href="">Administrator</a></li>
                    <li>Last Access : <br>
                        <small><i class="fa fa-calendar"></i>&nbsp;28 Sept 16:32</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #menu -->
    <ul id="menu" class="bg-blue dker">
        <li class="nav-header">Menu</li>
        <li class="nav-divider"></li>
        <li class="">
            <a href="{{ route('home') }}">
                <i class="fa fa-home"></i><span class="">&nbsp;Acasa</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('companies') }}">
                <i class="fa fa-building"></i><span class="link-title">&nbsp;Producatori</span>
            </a>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa fa-cog"></i>
                <span class="link-title">Produse</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                @if(isset($categories))
                @foreach($categories as $category)
                 <li>
                    <a href="{{ route('products', ['id' => $category->id]) }}">
                        <i class="fa fa-angle-right"></i>&nbsp; {{ $category->name }}</a>
                </li>                
                @endforeach  
                @endif  
            </ul>
        </li>

        <li class="">
            <a href="{{ route('cultures') }}">
                <i class="fa fa-leaf"></i><span class="link-title">&nbsp;Culturi</span>
            </a>
        </li>
        <li class="">
            <a href="{{route('parazites')}}">
                <i class="fa fa-bug"></i><span class="link-title">&nbsp;Paraziti</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('methods') }}">
                <i class="fa fa-umbrella"></i><span class="link-title">&nbsp;Metode de utilizare</span>
            </a>
        </li>                   



        <li>
            <a href="{{ route('registers') }}">
                <i class="fa fa-table"></i>
                <span class="link-title">Registrul</span>
            </a>
        </li>
        <li>
            <a href="typography.html">
                <i class="fa fa-font"></i>
                <span class="link-title">Articole</span> 
            </a>
        </li>
        <li>
            <a href="maps.html">
                <i class="fa fa-commenting"></i><span class="link-title">
                    Comentarii
                </span>
            </a>
        </li>
        <li>
            <a href="{{  route('permissions') }}">
                <i class="fa fa-user"></i>
                <span class="link-title">
                    Utilizatori
                </span>
            </a>
        </li>

        <li class="nav-divider"></li>
        <li>
            <a href="login.html">
                <i class="fa fa-sign-out"></i>
                <span class="link-title">
                    Iesire
                </span>
            </a>
        </li>                    
    </ul>
    <!-- /#menu -->
</div>
