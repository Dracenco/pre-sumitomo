<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Centri antiveleno')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Centri antiveleno</li>
                    </ul>
                </nav>
            </div>
        </div>

        <!---->
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione" style="margin-top:20px"><h2>Nuovo centro antiveleno</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="nuovo_antiveleno" method="post">

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
                     <div class="large-12 columns ">
                       <input type="submit" name="SALVA" value="SALVA" class="float-right">
                       <a href="" class="pulsante-annulla float-right">ANNULLA</a>
                     </div>
                 </form>
               </div>
            </div>
        </div>

        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Centri antiveleno</h2></div></div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns contenitore-info">

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

    var stringCentro='';
    var count=1;
    $.ajax({
         type: "GET",
         beforeSend: function (request) {
             request.setRequestHeader("Authorization", "Bearer " + token );
             request.setRequestHeader("lang", "it");
         },
         url: "{{ config('constants.UrlWebService') }}api/Site/GetCentriAntiveleni",
         success: function (result) {
             $.each(result.data, function(index, value){

                 stringCentro = stringCentro + '<div class="row expanded"><div class="medium-12 large-12 columns riga-gestione-sito"><div class="operazioni-sito"><div class="modifica-coltura"><a href="{!! url("sito/modifica-centro/' + value.id + '") !!}"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-contatto"><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-centro"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></div><div class="contatto-contatto">' + value.city + ' - ' + value.name + '</div></div></div>';

                 count++;
             });
             $('.contenitore-info').append(stringCentro).foundation();
         },
         error: function (request, status, errorThrown){}
     });

     $("form.nuovo_antiveleno").submit(function(e) {
         e.preventDefault();

         var nome = $('#nome_centroantiveleno').val();
         var descrizione = $('#descrizione_centroantiveleno').val();
         var indirizzo = $('#indirizzo_centroantiveleno').val();
         var citta = $('#citta_centroantiveleno').val();
         var telefono = $('#telefono_centroantiveleno').val();

         post_data='{ "Name" :  "' + nome + '" , "Description": "' + descrizione + '", "City" : "' + citta + '" , "Address" : "' + indirizzo + '", "PhoneNumber" : "' + telefono + '" }';

         $.ajax({
             type: "POST",
             beforeSend: function (request) {
                 request.setRequestHeader("Authorization", "Bearer " + token );
                 request.setRequestHeader("lang", "it");
             },
             url: "{{ config('constants.UrlWebService') }}api/Site/CreateCentroAntiveleni",
             dataType: "json",
             data: JSON.parse(post_data),
             success: function(data){
                 if(data.returnCode == '-1'){
                     $("#error").html('Impossibile inserire i dati');
                 }else{
                     $("#error").html('Centro antiveleno correttamente inserito');

                     stringCentro='';
                     $('.contenitore-info').empty();
                     $.ajax({
                          type: "GET",
                          beforeSend: function (request) {
                              request.setRequestHeader("Authorization", "Bearer " + token );
                              request.setRequestHeader("lang", "it");
                          },
                          url: "{{ config('constants.UrlWebService') }}api/Site/GetCentriAntiveleni",
                          success: function (result) {
                              $.each(result.data, function(index, value){

                                  stringCentro = stringCentro + '<div class="row collapse"><div class="medium-12 large-12 columns riga-gestione-sito"><div class="operazioni-coltura"><div class="modifica-coltura"><a href="{!! url("sito/modifica-centro/' + value.id + '") !!}"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-contatto"><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-centro"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></div><div class="contatto-contatto">' + value.city + ' - ' + value.name + '</div></div></div></div>';

                                  count++;
                              });
                              $('.contenitore-info').append(stringCentro).foundation();
                          },
                          error: function (request, status, errorThrown){}
                      });

                 }
             },
              error: function (request, status, errorThrown){
                     $("#error").html('Impossibile inserire i dati');
              }
         });
     });

     $(document).on('click', '.cancella-centro', function(e) {
         e.preventDefault();

         var formData = $(this).find('input').attr('name','id').val();
         var url = window.location.href;
         post_data={ 'id' : formData };

         $.ajax({
             type: "POST",
             beforeSend: function (request) {
                 request.setRequestHeader("Authorization", "Bearer " + token );
                 request.setRequestHeader("lang", "it");
             },
             url: "{{ config('constants.UrlWebService') }}api/Site/DeleteCentroAntiveleni",
             data: post_data,
             success: function(data){
                 $("#error").html('Centro antiveleno correttamente eliminato');

                 stringCentro='';
                 $('.contenitore-info').empty();
                   $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetCentriAntiveleni",
                        success: function (result) {
                            $.each(result.data, function(index, value){

                                stringCentro = stringCentro + '<div class="row collapse"><div class="medium-12 large-12 columns riga-gestione-sito"><div class="operazioni-coltura"><div class="modifica-coltura"><a href="{!! url("modifica-centro/' + value.id + '") !!}"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-contatto"><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-centro"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></div><div class="contatto-contatto">' + value.city + ' - ' + value.name + '</div></div></div></div>';

                                count++;
                            });
                            $('.contenitore-info').append(stringCentro).foundation();
                        },
                        error: function (request, status, errorThrown){}
                  });
             },
             failure: function(errMsg) {
                $("#error").html('Impossibile eliminare i dati');
             }
         });
     });
</script>
@stop
