<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Catalogo')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Catalogo</li>
                    </ul>
                </nav>
            </div>
        </div>

        <!---->
         <div class="expanded row">
             <div class="medium-5 large-5 columns end">
                <div class="scheda-nuovo-prodotto formFile">
                <div class="expanded row" style="margin-top:15px; margin-bottom:15px">
                    <div class="medium-12 large-12 columns">
                        <div id="error" class="sumitomoCatalogo" style="margin:0"></div>
                    </div>
                </div>
                  <form class="cat_sumitomo" method="post">
                      <div class="row">
                          <div class="large-12 columns">
                              <label>Catalogo Sumitomo Chemical Italia</label><br><input type="file" name="cat_sumitomo" id="cat_sumitomo">
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

         <div class="row">
            <div class="large-12 columns">
                <div id="catalogoSumitomo" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
            </div>
         </div>

         <div class="expanded row">
             <div class="large-12 columns"><div style="float:left; border-bottom: 1px solid #979797; width:100%; margin-bottom:20px">&nbsp;</div></div>
        </div>

         <div class="expanded row">
             <div class="medium-5 large-5 columns end">
                <div class="scheda-nuovo-prodotto formFile">
                    <div class="expanded row" style="margin-top:15px; margin-bottom:15px">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="siapaCatalogo" style="margin:0"></div>
                        </div>
                    </div>
                  <form class="cat_siapa" method="post">
                      <div class="row">
                          <div class="large-12 columns">
                              <label>Catalogo Siapa</label><br><input type="file" name="cat_siapa" id="cat_siapa">
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

         <div class="row">
            <div class="large-12 columns">
                <div id="catalogoSiapa" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
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

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=33",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                /*Catalogo Sumitomo*/
                if(value.idSezione == 33){ 
                    $("#catalogoSumitomo").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                }
            });
        }
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=34",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                /*Catalogo Siapa*/
                if(value.idSezione == 34){  
                    $("#catalogoSiapa").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                }
            });
        }
    });

    $(document).on('submit', '.cat_sumitomo', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#cat_sumitomo").get(0).files;

        myObj = { "Name": utente , "IdSezione": 33, "Visibile":true };
        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ data.append("UploadedImage", files[0]); }

        $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UploadImmagine",
                contentType: false,
                processData: false,
                async:false,
                data: data,
                success: function (result) {                   
                    $(".sumitomoCatalogo").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=33",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){               
                                /*Catalogo Sumitomo*/
                                if(value.idSezione == 33){ 
                                    $("#catalogoSumitomo").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".sumitomoCatalogo").html("Impossibile caricare il file");
                }
        });
    });

    $(document).on('submit', '.cat_siapa', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#cat_siapa").get(0).files;

        myObj = { "Name": utente , "IdSezione": 34, "Visibile":true };
        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ data.append("UploadedImage", files[0]); }

        $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UploadImmagine",
                contentType: false,
                processData: false,
                async:false,
                data: data,
                success: function (result) {                   
                    $(".siapaCatalogo").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=34",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){               
                                /*Catalogo Sumitomo*/
                                if(value.idSezione == 34){ 
                                    $("#catalogoSiapa").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".siapaCatalogo").html("Impossibile caricare il file");
                }
        });
    });
</script>
@stop
