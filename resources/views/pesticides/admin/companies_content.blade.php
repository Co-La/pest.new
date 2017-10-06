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
                        <a href='{{ route('newComp') }}'><h5>Adauga o companie</h5></a>
                    </header>
                    <div id="collapse4" class="body">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Denumirea companiei</th>
                                    <th>Tara de origine</th>
                                    <th>Codul tarii</th>  
                                    <th></th>
                                </tr>
                            </thead>                            
                            <tbody>
                                @if(isset($companies))
                                @foreach($companies as $company)
                                <tr class="row-{{$company->id}}">
                                    <td>{{ $company->id }}</td>
                                    <td><a href="{{ route('editComp', $company->id)}}" class="editComp" alt="company">{{ $company->name }}</a></td>
                                    <td>{{ $company->name_en }}</td>
                                    <td>{{ $company->code }}</td> 
                                    <td><a href="{{ route('delComp', $company->id) }}" data-token="{{ csrf_token() }}" data-id="{{$company->id}}" class="del_item"> <i class="fa fa-trash-o"></i> </a></td> 
                                </tr>
                                
                                @endforeach
                                @endif
                            </tbody>   
                            <td colspan="4"></td>
                            <td></td>                            
                        </table>
                        
                        {{ $companies->links() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>