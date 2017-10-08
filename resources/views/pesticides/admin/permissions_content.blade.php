<div class="inner bg-light lter">
    <div class="row" id="alert-div"></div>
    <div class="col-lg-12">
        <h1>{{  $title }}</h1>
        <div class="container">
            <form action="" method="POST" class="form-horizontal">
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
                        @if(isset($permissions))
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{  $permission->name }}</td>
                                    @foreach($roles as $role)
                                        <td>
                                            @if($role->hasPermission($permission->name))
                                                <input  checked type="checkbox" name="{{ $role->id}}[]" value="{{ $permission->id }}">
                                            @else
                                                <input  type="checkbox" name="{{ $role->id}}[]" value="{{ $permission->id }}">
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                {{  csrf_field() }}
                <input type="submit" value="Pastreaza" class="btn btn-success"/>
                </forrm>
        </div>
    </div>
</div>


