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
                        <a href='{{ route('newCult') }}'><h5>Adauga o cultura</h5></a>
                    </header>
                    <div id="collapse4" class="body">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Denumirea culturei</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($cultures))
                                @foreach($cultures as $culture)
                                    <tr class="row-{{$culture->id}}">
                                        <td>{{ $culture->id }}</td>
                                        <td><a href="{{ route('editCult', $culture->id)}}" class="editComp" alt="company">{{ $culture->name }}</a></td>
                                        <td><a href="{{ route('delCult', $culture->id) }}" data-token="{{ csrf_token() }}" data-id="{{$culture->id}}" class="del_item"> <i class="fa fa-trash-o"></i> </a></td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        {{ $cultures->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>