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
                        <a href='{{ route('newMeth') }}'><h5>Adauga o metoda</h5></a>
                    </header>
                    <div id="collapse4" class="body">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Metoda</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($methods))
                                @foreach($methods as $method)
                                    <tr class="row-{{$method->id}}">
                                        <td>{{ $method->id }}</td>
                                        <td><a href="{{ route('editMeth', $method->id)}}" class="editComp" alt="parasite">{!! strtoupper($method->utilization) !!}</a></td>
                                        <td><a href="{{ route('delMeth', $method->id) }}" data-token="{{ csrf_token() }}" data-id="{{$method->id}}" class="del_item"> <i class="fa fa-trash-o"></i> </a></td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{ $methods->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>