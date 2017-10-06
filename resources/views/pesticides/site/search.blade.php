<nav class="navbar">
    <form class="form-inline" id="search-fields" action="{{ route('search') }}">
        <input type="text" id="search-input" name="search">
         {{ csrf_field() }}
        <a href=""><i class="fa fa-search"></i></a>
        <ul class="list-group" id="search-result"></ul> 
    </form>        
    <ul class="user-nav">
          
        @if(Auth::user())
        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">iesi</a></li>
        @else
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">inregistare</a></li> 
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">intra</a></li>
        @endif
        <li class="nav-item"><a class="nav-link" href="{{ route('bag') }}">cos</a></li>
    </ul>               
</nav>  
