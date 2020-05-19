<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Privacy')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Privacy</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error"></div>
            </div>
        </div>

        <!---->
         <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="scheda-nuovo-prodotto">
                  <form class="testoPrivacy" method="post">
                      <div class="row">
                          <div class="large-12 columns">
                              <label>Testo Privacy/Policy</label><br><textarea name="privacy" id="textareaSito"></textarea>
                          </div>
                      </div>
                      <div class="large-12 columns">
                          <input type="submit" name="SALVA" value="SALVA" class="float-right">
                          <a href="" class="pulsante-annulla">ANNULLA</a>
                      </div>
                  </form>
                </div>
             </div>
         </div>
        <!---->

      </section>

@endsection

@section('script')
<script type="text/javascript">
    var utente='';
    var CampiHidden='';

    /*$.ajax({
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
    });*/

var r='';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=1",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                CampiHidden= '<input type="hidden" name="idSezione" id="idSezione" value="' + value.id + '"><input type="hidden" name="nameSezione" value="' + value.name + '" id="nameSezione" ><input type="hidden" name="idPagina" id="idPagina" value="' + value.idPagina + '">';
                $("#textareaSito").text(value.description);
            });

            $("form.testoPrivacy").append(CampiHidden);
        }
    });

    $("form.testoPrivacy").submit(function(e) {
        e.preventDefault();

        var Description = CKEDITOR.instances.textareaSito.getData();
        Description = Description.replace(/(\r\n|\n|\r)/gm, "");
        Description = Description.replace(/"/g,"\\\"");

        post_data='{ "ID" : 1 , "Name" :  "Privacy" , "Description": "' + Description + '", "Visibile" : true , "IdPagina" : 1 }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $("#error").html('Impossibile aggiornare il testo');
                }else{
                    $("#error").html('Testo correttamente aggiornato');
                }
            },
             error: function (request, status, errorThrown){
                    $("#error").html('Impossibile aggiornare il testo');
             }
        });
    });

CKEDITOR.replace('textareaSito');
</script>
@stop
