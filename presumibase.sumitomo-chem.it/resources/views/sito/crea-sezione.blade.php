<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Sezioni')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Pagine - sezioni</li>
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

        <!--
        <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="contenitore-info" style="padding:0">
                <h1>Sezioni</h1><br><div id="elenco-sezioni"></div>
                </div>
             </div>
         </div>
        -->

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

    /*CREA NUOVA SEZIONE Titolo*/
    /*post_data='{ "Name" : "Testo Slider 6", "Description": "", "Visibile" : true, "IdPagina" : 13}';
    $.ajax({
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/CreateSezione",
        dataType: "json",
        data: JSON.parse(post_data),
        success: function(data){
            $("#error").html();
            if(data.returnCode == '-1'){
                $("#error").html('Impossibile creare la sezione: ' + data.errors);
            }else{
                $("#error").html('Sezione correttamente creata');
            }
        },
         error: function (request, status, errorThrown) {}
    });*/

    /*MODIFICA SEZIONE*/
    /*post_data='{ "ID" : 57, "Name" : "Testo Slider 3", "Description": "", "Visibile" : true, "IdPagina" : 13 }';
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
            $("#error").html();
            if(data.returnCode == '-1'){
                $("#error").html('Impossibile aggiornare la pagina: ' + data.errors);
            }else{
                $("#error").html('Pagina correttamente aggiornata');
            }
        },
         error: function (request, status, errorThrown) {}
    });*/

    /*ELIMINA SEZIONE*/
  /*post_data='{ "ID" : 130}';
    $.ajax({
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/DeleteSezione",
        dataType: "json",
        data: JSON.parse(post_data),
        success: function(data){
            $("#error").html();
            if(data.returnCode == '-1'){
                $("#error").html('Impossibile eliminare la sezione: ' + data.errors);
            }else{
                $("#error").html('Sezione correttamente eliminata');
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoPagine",
        async:false,
        success: function (results){
           var tab = '';
            $('#elenco-pagine').html();
            $.each(results.data, function(index, valuePagina){
                tab = tab + '<div class="row collapse"><div class="medium-12 large-12 columns"><b>Pagina: </b>' + valuePagina.id + ' - ' + valuePagina.name  + '</div><b>Sezioni</b><br>';

                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=" + valuePagina.id,
                    async:false,
                    success: function (resultsSection){
                        $.each(resultsSection.data, function(index, value){
                            tab = tab + '<div class="row"><div class="medium-12 large-12 columns">' + value.id + ' - ' + value.name  + '</div></div>';
                        });                        
                    }
                });

                tab = tab + '</div><div style="margin-bottom:20px"></div>';
            });

            $('#elenco-pagine').html(tab);
        }
    });
</script>
@stop
