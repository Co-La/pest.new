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
                        <a href='{{ route('newProd') }}'><h5>Adauga un produs</h5></a>
                    </header>
                    <div id="collapse4" class="body">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Denumirea produsului</th>
                                    <th>Data inregistrarii</th>
                                    <th>Toxicitatea</th>  
                                    <th>Substanta activa</th>                                    
                                    <th>Compania</th>
                                    <th>Statut</th>
                                    <th>Imagine</th>
                                    <th>Pret</th>
                                    <th>Valuta</th>
                                    <th>Ambalaj</th>                                    
                                </tr>
                            </thead>                            
                            <tbody>
                                @if(isset($products))
                                @foreach($products as $product)
                                <tr class="row-{{$product->id}}">
                                    <td>{{ $product->id }}</td>
                                    <td><a href="{{ route('editProd', $product->id)}}" class="editComp" alt="product">{{ $product->name }}</a></td>
                                    <td>{{ isset($product->registered) ? $product->registered : '' }}</td>
                                    <td>{{ $product->level }}</td> 
                                    <td>{{ $product->substance }}</td> 
                                    <td>{{ $product->company->id }}</td> 
                                    <td>{{ $product->used }}</td> 
                                    <td>{{ $product->image }}</td> 
                                    <td>{{ $product->price }}</td> 
                                    <td>{{ $product->curr }}</td>
                                    <td>{{ $product->pack }}</td>
                                    <td><a href="{{ route('delProd', ['id' => $product->id]) }}" data-token="{{ csrf_token() }}" data-id="{{$product->id}}" class="del_item"> <i class="fa fa-trash-o"></i> </a></td> 
                                </tr>

                                @endforeach
                                @endif
                            </tbody>   
                            <td colspan="4"></td>
                            <td></td>                            
                        </table>

                        {{ $products->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>