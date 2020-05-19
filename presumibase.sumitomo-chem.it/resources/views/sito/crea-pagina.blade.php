<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Nuova pagina')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Nuova pagina</li>
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
                <div class="contenitore-info" style="padding:0">
                    <div id="elenco-pagine"></div>
                </div>
             </div>
         </div>
        <!---->

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

    /*CREA NUOVA PAGINA*/
    
   /* post_data='{ "Name" : "NEWS CSR", "Description": "NEWS CSR", "Code" : true }';
    $.ajax({
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/CreatePagina",
        dataType: "json",
        data: JSON.parse(post_data),
        success: function(data){
            $("#error").html();
            if(data.returnCode == '-1'){
                $("#error").html('Impossibile creare la pagina: ' + data.errors);
            }else{
                $("#error").html('Pagina correttamente creata');
            }
        },
         error: function (request, status, errorThrown) {}
    });*/

    /*MODIFICA PAGINA*/

    /*post_data='{ "ID" : 7, "Name" : "Cookies", "Description": "Cookies", "Code" : true }';
    $.ajax({
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/UpdatePagina",
        dataType: "json",
        data: JSON.parse(post_data),
        success: function(data){
            $("#error").html();
            if(data.returnCode == '-1'){
                $("#error").html('Impossibile aggiornare la pagina: ' + data.errors);
            }else{
                $("#error").html('Pagina correttamente aggiornata');
            }
        },
         error: function (request, status, errorThrown) {}
    });*/

    /*ELIMINA PAGINA*/

   /* post_data='{ "ID" : 12 }';
    $.ajax({
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/DeletePagina",
        dataType: "json",
        data: JSON.parse(post_data),
        success: function(data){
            $("#error").html();
            if(data.returnCode == '-1'){
                $("#error").html('Impossibile eliminare la pagina: ' + data.errors);
            }else{
                $("#error").html('Pagina correttamente eliminata');
            }
        },
         error: function (request, status, errorThrown) {}
    });*/


    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoPagine" ,
        success: function (results){
           var tab = '';
            $('#elenco-pagine').html();
            $.each(results.data, function(index, value){
                tab = tab + '<div class="row collapse"><div class="medium-12 large-12 columns">' + value.id + ' - ' + value.name  + '</div></div>';
            });

            $('#elenco-pagine').html(tab);
        }
    });



</script>
@stop
