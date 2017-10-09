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
                        <a href='{{ route('newParaz') }}'><h5>Adauga un daunator</h5></a>
                    </header>
                    <div id="collapse4" class="body">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Denumirea daunatorului</th>
                                <th>Denumirea stiintifica</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($parasites))
                                @foreach($parasites as $parasite)
                                    <tr class="row-{{$parasite->id}}">
                                        <td>{{ $parasite->id }}</td>
                                        <td><a href="{{ route('editParaz', $parasite->id)}}" class="editComp" alt="parasite">{{ strtoupper($parasite->name) }}</a></td>
                                        <td>{{ $parasite->science_name }}</td>
                                        <td><a href="{{ route('delParaz', $parasite->id) }}" data-token="{{ csrf_token() }}" data-id="{{$parasite->id}}" class="del_item"> <i class="fa fa-trash-o"></i> </a></td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{ $parasites->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>