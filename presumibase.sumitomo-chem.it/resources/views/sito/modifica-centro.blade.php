<?php
$ruoli = Session::get('permessi');
$route = Route::currentRouteName();
?>
<script>
    var id="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
</script>

@extends('layout.header-site')
@section('title', 'Modifica centro antiveleno')

@section('content')
@include('layout.menu-sito')
<section id="content-scheda-prodotto">
    <div class="row large-12 prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='{{ url("/") }}'>Sito</a></li>
                    <li class="disabled">Modifica centro antiveleno</li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="expanded row">
        <div class="large-12 columns"><div class="titolo_sezione" style="margin-top:20px"><h2>Modifica centro antiveleno</h2></div></div>
    </div>
     <div class="row">
        <div class="medium-12 large-12 columns">
            <div class="scheda-nuovo-prodotto">
                <form class="modifica_centro" method="post">
                    <div class="expanded row">
                        <div class="medium-12 large-12 columns">
                            <div id="error"></div><div id="error" class="error-logo" ></div>
                        </div>
                    </div>
                    <div class="expanded row">
                        <div class="medium-12 large-12 columns">
                            <div id="error"></div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="large-6 columns">
                          <label>Nome centro</label><br><input type="text" name="nome_centroantiveleno" id="nome_centroantiveleno">
                      </div>
                      <div class="large-6 columns">
                          <label>Descrizione</label><br><input type="text" name="descrizione_centroantiveleno" id="descrizione_centroantiveleno">
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-6 columns">
                          <label>Indirizzo</label><br><input type="text" name="indirizzo_centroantiveleno" id="indirizzo_centroantiveleno">
                      </div>
                      <div class="large-6 columns">
                          <label>Citt&agrave;</label><br><input type="text" name="citta_centroantiveleno" id="citta_centroantiveleno">
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-6 columns end">
                          <label>Telefono</label><br><input type="text" name="telefono_centroantiveleno" id="telefono_centroantiveleno">
                      </div>
                    </div>
                    <div class="large-12 columns">
                        <input type="hidden" class="id" id="id">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                        <a href="" class="pulsante-annulla">ANNULLA</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
<script type="text/javascript">
    var utente='';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Users/GetUserInfo",
        async:false,
        success: function (result) {
            utente=result.firstName + ' ' + result.lastName;
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetCentroAntiveleni?code=" + id,
        async:false,
        success: function (result){
            $("input#nome_centroantiveleno").val(result.data.name);
            $("input#descrizione_centroantiveleno").val(result.data.description);
            $("input#indirizzo_centroantiveleno").val(result.data.address);
            $("input#citta_centroantiveleno").val(result.data.city);
            $("input#telefono_centroantiveleno").val(result.data.phoneNumber);
            $("input#id").val(id);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.modifica_centro', function(e) {
       e.preventDefault();

       var name = '';
       var descrizione = '';
       var citta = '';
       var indirizzo = '';
       var telefono = '';
       var id = '';

       if($(this).find('input#nome_centroantiveleno').val() != ''){ name = $(this).find('input#nome_centroantiveleno').val(); }
       if($(this).find('input#descrizione_centroantiveleno').val() != ''){ descrizione = $(this).find('input#descrizione_centroantiveleno').val(); }
       if($(this).find('input#indirizzo_centroantiveleno').val() != ''){ indirizzo = $(this).find('input#indirizzo_centroantiveleno').val(); }
       if($(this).find('input#citta_centroantiveleno').val() != ''){ citta = $(this).find('input#citta_centroantiveleno').val(); }
       if($(this).find('input#telefono_centroantiveleno').val() != ''){ telefono = $(this).find('input#telefono_centroantiveleno').val(); }
       if($(this).find('input#id').val() != ''){ id = $(this).find('input#id').val(); }
 
       post_data={ "ID" : id ,"Name" :  name , "Description":  descrizione , "City" :  citta , "Address" :  indirizzo , "PhoneNumber" :  telefono };
       var myJSON = JSON.stringify(post_data);

       $.ajax({
           type: "POST",
           beforeSend: function (request) {
               request.setRequestHeader("Authorization", "Bearer " + token );
               request.setRequestHeader("lang", "it");
               request.setRequestHeader("Content-Type", "application/json")
           },
           url: "{{ config('constants.UrlWebService') }}api/Site/UpdateCentroAntiveleni",
           dataType: "json",
           data: myJSON,
           success: function (result) {
               if(result.returnCode != 0 ){ 
                   $("#error").html('Impossibile modificare il centro antiveleno: ' + result.errors);
                }else{ 
                    $("#error").html('Modifica correttamente eseguita'); 
                }
               $("html, body").animate({ scrollTop: 0 }, "slow");
           },
           error: function (request, status, errorThrown) {
               $("#error").html('Impossibile modifica il centro antiveleno.');
               $("html, body").animate({ scrollTop: 0 }, "slow");
           }
       });
    });
</script>
@stop
