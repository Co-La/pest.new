<div class="row justify-content-center page-content" id="pesty_list">

    <div class="col-lg-5 col-sm-12" >        
        <form action="{{ route('contacts')  }}" method="POST" class="form-horizontal contact-form-cl" id="contact-form">
            <div class="row">
                <div class="group col-lg-6">
                    <label class="control-label col-lg-12" for="name">Nume</label>
                    <input class="form-control" name="name" type="text">
                </div>
                <div class="group col-lg-6">
                    <label class="control-label col-lg-12" for="prenume">Prenume</label>
                    <input class="form-control" name="prenume" type="text">
                </div>                   
            </div>
            <div class="row">
                <div class="group col-lg-12">
                    <label class="control-label col-lg-12" for="email">Email</label>
                    <input class="form-control" name="email" type="text">
                </div>
                <div class="group col-lg-12">
                    <label class="control-label col-lg-12" for="adress">Adresa</label>
                    <input class="form-control" name="adress" type="text">
                </div>                   
            </div>
            <div class="row">
                <div class="group col-lg-12">
                    <label class="control-label col-lg-12" for="message">Mesaj</label>
                    <textarea class="form-control" name="message"></textarea>
                </div>

                <div class="group col-lg-12">                       
                    <input id="sendMessage" class="btn btn-success pull-right" name="submit" type="submit" value="Trimite mesaj">
                </div>

            </div>
            
            {{ csrf_field() }}
        </form>

    </div>

    <div class="col-md-auto col-xs-auto auto-img">
        <img src="{{ asset(env('THEM')) }}/image/contact_img.jpg" alt="contact_img" class="rounded">

    </div>

</div>