<div class="inner bg-light lter">
    <div  class="row" id="alert-div"></div>
    <div class="col-lg-12">
        <h1></h1>
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

                    </tbody>
            </table>


        </div>
    {{  csrf_field() }}
        <input type="submit" value="Pastreaza" class="btn btn-success">
        </form>
    </div>
</div>