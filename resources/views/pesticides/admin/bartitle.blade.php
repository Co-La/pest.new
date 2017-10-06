<header class="head">
    <div class="search-bar">
        <form class="main-search" action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cautare pe site ...">
                <span class="input-group-btn">
                    <button class="btn btn-primary btn-sm text-muted" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.main-search -->                                
    </div>
    <!-- /.search-bar -->
    <div class="main-bar">
        <a href="" alt="home">
            <h3>
                <i class="fa fa-home"></i>&nbsp;
                {{ isset($title) ? $title : 'Pagina noua' }}
            </h3>
        </a>
    </div>
    <!-- /.main-bar -->
</header>