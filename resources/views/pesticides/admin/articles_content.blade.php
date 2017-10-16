<div class="inner bg-light lter">
    <div  class="row alert-div"></div>
    <div class="col-lg-12">
        <h1>{{ $page_title }}</h1>
        @if(session('status'))
            <div  class="alert alert-success"><h4>{{ session('status') }}</h4></div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="fa fa-table"></i></div>
                        <a href='{{ route('newArt') }}'><h5>Adauga un articol</h5></a>
                    </header>
                    <div id="collapse4" class="body">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titlul stirei</th>
                                <th>Text stire</th>
                                <th>Statut</th>
                                <th>Imagine</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($articles))
                                @foreach($articles as $article)
                                    <tr class="row-{{$article->id}}">
                                        <td>{{ $article->id }}</td>
                                        <td><a href="{{ route('editArt', $article->id)}}" class="editComp" alt="company">{{ str_limit($article->title, 70) }}</a></td>
                                        <td>{{ str_limit($article->text, 100) }}</td>
                                        <td>{{ $article->status }}</td>
                                        <td>{{ $article->image }}</td>
                                        <td><a href="{{ route('delArt', $article->id) }}" data-token="{{ csrf_token() }}" data-id="{{$article->id}}" class="del_item"> <i class="fa fa-trash-o"></i> </a></td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        {{ $articles->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>