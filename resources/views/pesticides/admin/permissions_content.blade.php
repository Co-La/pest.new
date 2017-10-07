<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>
    <div class="col-lg-12">
        <h1>{{  $title }}</h1>
        <div class="container">
            <form action="{{ route('save')  }}" method="POST" class="form-horizontal">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>PERMISIUNI</th>
                        <th>ADMIN</th>
                        <th>MODERATOR</th>
                        <th>UTILIZATOR</th>
                    </tr>
                </thead>
                    <tbody>
                        @if(!$permissions->isEmpty())
                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission-> name }}</td>
                                @foreach($roles as $role)
                                    @if($role->hasPermission($permission-> name))
                                        <td><input  checked type="checkbox" name="{{ $role->id }}[]" value="{{  $permission->id }}"></td>
                                     @else
                                        <td><input  type="checkbox" name="{{ $role->id }}[]" value="{{  $permission->id }}"></td>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
            </table>


        </div>
    {{  csrf_field() }}
        <input type="submit" value="Pastreaza" class="btn btn-success">

        </form>
    </div>
</div>