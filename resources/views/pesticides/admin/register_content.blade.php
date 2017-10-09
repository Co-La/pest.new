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
                        <a href='{{ route('newReg') }}'><h5>Adauga in registru</h5></a>
                    </header>
                    <div id="collapse4" class="body">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Denumirea produs</th>
                                <th>Cultura</th>
                                <th>Norma de consum</th>
                                <th>Daunatori</th>
                                <th>Metoda utilizare</th>
                                <th>Termen iesire cimp</th>
                                <th>Ultim tratament</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($registers))
                                @foreach($registers as $register)
                                    <tr class="row-{{$register->id}}">
                                        <td>{{ $register->id }}</td>
                                        <td><a href="{{ route('editReg', $register->id)}}" class="editComp" alt="company">{{ $register->product->name }}</a></td>
                                        <td>{{ str_limit($register->culture->name, 50) }}</td>
                                        <td>{{ $register->dose }}</td>
                                        <td>{{ $register->parasite_id }}</td>
                                        <td>{{ str_limit($register->method->utilization, 100) }}</td>
                                        <td>{{ $register->exit_date }}</td>
                                        <td>{{ str_limit($register->last_utilization,30)   }}</td>
                                        <td><a href="{{ route('delReg', $register->id) }}" data-token="{{ csrf_token() }}" data-id="{{$register->id}}" class="del_item"> <i class="fa fa-trash-o"></i> </a></td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>

                        </table>

                        {{ $registers->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>