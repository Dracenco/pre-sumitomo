<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Schede difesa')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Schede difesa</li>
                    </ul>
                </nav>
            </div>
        </div>

        <!---->
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Schede difesa Sumitomo</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="schedaDifesaSumitomo" method="post">
                    <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorColturaSumitomo" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorDescrizioneSumitomo" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Coltura</label><input type="text" name="coltura" id="coltura">
                         </div>
                         <div class="large-6 columns">
                             <label>Descrizione</label><input type="text" name="descrizione" id="descrizione">
                         </div>
                     </div>
                     <div class="row">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorImg" style="margin:0"></div>
                        </div>
                     </div>
                    <div class="row">
                         <div class="large-6 columns end">
                             <label>Immagine</label><input type="file" name="immagine" id="immagine">
                         </div>
                     </div>
                     <div class="row">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorPdf" style="margin:0"></div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="large-6 columns end">
                             <label>PDF</label><input type="file" name="pdf" id="pdf">
                         </div>
                     </div>
                     <div class="large-12 columns">
                       <input type="submit" name="SALVA" value="SALVA" class="float-right">
                       <a href="" class="pulsante-annulla float-right">ANNULLA</a>
                     </div>
                 </form>
               </div>
            </div>
        </div>

        <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="row collapse" style="border:0;">
                    <div class="medium-12 large-12 columns">
                        <table id="elenco-codici" class="tabella-schede-sumitomo" style="background: #bdbdbd;">
                            <thead>
                                <tr >
                                    <th>&nbsp;</th>
                                    <th>COLTURA</th>
                                    <th>DESCRIZIONE</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>

        <div class="expanded row" style="margin-top:50px;">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Schede difesa Siapa</h2></div></div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
               <form class="schedaDifesaSiapa" method="post">
                    <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorColturaSiapa" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorDescrizioneSiapa" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Coltura</label><input type="text" name="colturaSiapa" id="colturaSiapa">
                         </div>
                         <div class="large-6 columns">
                             <label>Descrizione</label><input type="text" name="descrizioneSiapa" id="descrizioneSiapa">
                         </div>
                     </div>
                     <div class="row">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorImgSiapa" style="margin:0"></div>
                        </div>
                     </div>
                    <div class="row">
                         <div class="large-6 columns end">
                             <label>Immagine</label><input type="file" name="immagineSiapa" id="immagineSiapa">
                         </div>
                     </div>
                     <div class="row">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorPdfSiapa" style="margin:0"></div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="large-6 columns end">
                             <label>PDF</label><input type="file" name="pdfSiapa" id="pdfSiapa">
                         </div>
                     </div>
                     <div class="large-12 columns">
                       <input type="submit" name="SALVA" value="SALVA" class="float-right">
                       <a href="" class="pulsante-annulla float-right">ANNULLA</a>
                     </div>
                 </form>
               </div>
            </div>
        </div>      

                   <div class="expanded row">
                        <div class="medium-12 large-12 columns">
                            <div class="row collapse" style="border:0;">
                                <div class="medium-12 large-12 columns">
                                    <table id="elenco-codici" class="tabella-schede-siapa" style="background: #bdbdbd;">
                                        <thead>
                                            <tr >
                                                <th>&nbsp;</th>
                                                <th>COLTURA</th>
                                                <th>DESCRIZIONE</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        <!---->

      </section>

@endsection

@section('script')
<script type="text/javascript">
    var utente='';
    var SchedeDifesaSumitomo = '';
    var srcX = '';
    var fielIdImgX = '';

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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=14",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                var idFile = value.id;
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idFile,      
                    async:false,
                    success: function (result){
                        $.each(result.data, function(index, valueImg){           
                            fielIdImgX = valueImg.id; 
                        });
                        srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                        SchedeDifesaSumitomo = SchedeDifesaSumitomo + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + value.id + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + value.id + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-scheda-sumitomo"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.name +  '</td><td>' + value.description +  '</td><td><a href="' + srcX + '" target="_blank"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>';
                    },
                    error: function (request, status, errorThrown){}
                });
            });

            $('.tabella-schede-sumitomo tbody').append(SchedeDifesaSumitomo).foundation(); 
        }        
    });
  
    $("form.schedaDifesaSumitomo").submit(function(e) {
        e.preventDefault();  
       
        $(".tabella-schede-sumitomo tbody").empty();
        var coltura = $('#coltura').val();
        var descrizione = $('#descrizione').val();
        var idSezione = '';
        var SchedeDifesaSumitomoUpdate = '';

        post_data='{ "Name" : "' + coltura + '", "Description": "' + descrizione + '", "Visibile" : true, "IdPagina" : 14}';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/CreateSezione",
            dataType: "json",
            async:false,
            data: JSON.parse(post_data),
            success: function(data){
                $("#error").html();
                if(data.returnCode == '-1'){
                    $(".errorColturaSumitomo").html('Impossibile creare la sezione: ');
                }else{
                    $(".errorColturaSumitomo").html('Sezione correttamente creata');
                    idSezione = data.data;
                }
            },
            error: function (request, status, errorThrown) {}
        });

        var data = new FormData();
        var files = $("#immagine").get(0).files;

        myObj = { "Name": utente , "IdSezione": idSezione, "Visibile":true };
        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ 
            data.append("UploadedImage", files[0]); 

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
                        $(".errorImg").html("File correttamente caricato");
                    },
                    error: function (request, status, errorThrown){
                        $(".errorImg").html("Impossibile caricare il file");
                    }
            });
        }    

        var data = new FormData();
        var files = $("#pdf").get(0).files;

        myObj = { "Name": utente , "IdSezione": idSezione, "Visibile":true };
        myJSON= JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ 
            data.append("UploadedImage", files[0]); 

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
                        $(".errorPdf").html("File correttamente caricato");
                    },
                    error: function (request, status, errorThrown){
                        $(".errorPdf").html("Impossibile caricare il file");
                    }
            }); 
        }       
        
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=14",
           
            success: function (results){
                
                $.each(results.data, function(index, value){
                    var idFile = value.id;
                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {           
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idFile,      
                        async:false,
                        success: function (result){
                            $.each(result.data, function(index, valueImg){           
                                fielIdImgX = valueImg.id; 
                            });
                            srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                            SchedeDifesaSumitomoUpdate = SchedeDifesaSumitomoUpdate + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + value.id + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + value.id + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-scheda-sumitomo"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.name +  '</td><td>' + value.description +  '</td><td><a href="' + srcX + '" target="_blank"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>';
                        },
                        error: function (request, status, errorThrown){}
                    });                    
                });
                $('.tabella-schede-sumitomo tbody').append(SchedeDifesaSumitomoUpdate).foundation(); 
            }        
        }); 
        
    });

    $(document).on('click', '.cancella-scheda-sumitomo', function(e) {
        e.preventDefault();
        var formData = $(this).find('input').attr('name','id').val();
        var SchedeDifesaSumitomoDelete = '';
        $(".tabella-schede-sumitomo tbody").empty();

        post_data={ 'id' : formData };
        
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteSezione",
            data: post_data,
            success: function(data){                
                $(".errorColturaSumitomo").html("Scheda correttamente eliminata");

                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=14",
                    async:false,
                    success: function (results){
                        $.each(results.data, function(index, value){
                            var idFile = value.id;
                            $.ajax({
                                type: "GET",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("lang", "it");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idFile,      
                                async:false,
                                success: function (result){
                                    $.each(result.data, function(index, valueImg){           
                                        fielIdImgX = valueImg.id; 
                                    });
                                    srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                                    SchedeDifesaSumitomoDelete = SchedeDifesaSumitomoDelete + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + value.id + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + value.id + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-scheda-sumitomo"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.name +  '</td><td>' + value.description +  '</td><td><a href="' + srcX + '" target="_blank"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>';
                                },
                                error: function (request, status, errorThrown){}
                            });
                        });

                        $('.tabella-schede-sumitomo tbody').append(SchedeDifesaSumitomoDelete).foundation(); 
                    }        
                });
            },
            failure: function(errMsg) {
                $(".errorColturaSumitomo").html("Impossibile eliminare la scheda");
            }
        });
    });


    var SchedeDifesaSiapa = '';
    var fielIdImgX = '';
    var srcX  = '';
    
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=15",
       
        success: function (results){
            $.each(results.data, function(index, value){
                var idFileSiapa = value.id;
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idFileSiapa,      
                    async:false,
                    success: function (result){
                        $.each(result.data, function(index, valueImg){           
                            fielIdImgX = valueImg.id; 
                        });
                         srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                         SchedeDifesaSiapa = SchedeDifesaSiapa + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + value.id + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + value.id + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-scheda-siapa"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.name +  '</td><td>' + value.description +  '</td><td><a href="' + srcX + '" target="_blank"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>';
                     },
                    error: function (request, status, errorThrown){}
                });
            });
            $('.tabella-schede-siapa tbody').append(SchedeDifesaSiapa).foundation(); 
        }        
    });
  
    $("form.schedaDifesaSiapa").submit(function(e) {
        e.preventDefault();     
        
        $(".tabella-schede-siapa tbody").empty();
        var coltura = $('#colturaSiapa').val();
        var descrizione = $('#descrizioneSiapa').val();
        var idSezione = '';
        var SchedeDifesaSiapaUpdate = '';

        post_data='{ "Name" : "' + coltura + '", "Description": "' + descrizione + '", "Visibile" : true, "IdPagina" : 15}';

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/CreateSezione",
            dataType: "json",
            async:false,
            data: JSON.parse(post_data),
            success: function(data){
                $("#error").html();
                if(data.returnCode == '-1'){
                    $(".errorColturaSiapa").html('Impossibile creare la sezione');
                }else{
                    $(".errorColturaSiapa").html('Sezione correttamente creata');
                    idSezione = data.data;
                }
            },
            error: function (request, status, errorThrown) {}
        });

        var data = new FormData();
        var files = $("#immagineSiapa").get(0).files;

        myObj = { "Name": utente , "IdSezione": idSezione, "Visibile":true };
        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ 
            data.append("UploadedImage", files[0]); 

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
                        $(".errorImgSiapa").html("File correttamente caricato");
                    },
                    error: function (request, status, errorThrown){
                        $(".errorImgSiapa").html("Impossibile caricare il file");
                    }
            });
        }    

        var data = new FormData();
        var files = $("#pdfSiapa").get(0).files;

        myObj = { "Name": utente , "IdSezione": idSezione, "Visibile":true };
        myJSON= JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ 
            data.append("UploadedImage", files[0]); 

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
                        $(".errorPdfSiapa").html("File correttamente caricato");
                    },
                    error: function (request, status, errorThrown){
                        $(".errorPdfSiapa").html("Impossibile caricare il file");
                    }
            }); 
        }       
        
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=15",
           
            success: function (results){
                
                $.each(results.data, function(index, value){
                    var idFile = value.id;
                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {           
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idFile,      
                        async:false,
                        success: function (result){
                            $.each(result.data, function(index, valueImg){           
                                fielIdImgXSiapa = valueImg.id; 
                            });
                            srcXSiapa = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgXSiapa;
                            SchedeDifesaSiapaUpdate = SchedeDifesaSiapaUpdate + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + value.id + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + value.id + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-scheda-sumitomo"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.name +  '</td><td>' + value.description +  '</td><td><a href="' + srcXSiapa + '" target="_blank"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>';
                        },
                        error: function (request, status, errorThrown){}
                    });                    
                });
                $('.tabella-schede-siapa tbody').append(SchedeDifesaSiapaUpdate).foundation(); 
            }        
        }); 
        
    });

    $(document).on('click', '.cancella-scheda-siapa', function(e) {
        e.preventDefault();
        var formData = $(this).find('input').attr('name','id').val();
        var SchedeDifesaSiapaDelete = '';
        $('.tabella-schede-siapa tbody').empty();
        post_data={ 'id' : formData };
        
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteSezione",
            data: post_data,
            success: function(data){                
                $(".errorColturaSiapa").html("Scheda correttamente eliminata");
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=15",
                
                    success: function (results){
                        $.each(results.data, function(index, value){
                            var idFileSiapa = value.id;
                            $.ajax({
                                type: "GET",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("lang", "it");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idFileSiapa,      
                                async:false,
                                success: function (result){
                                    $.each(result.data, function(index, valueImg){           
                                        fielIdImgX = valueImg.id; 
                                    });
                                    srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                                    SchedeDifesaSiapaDelete = SchedeDifesaSiapaDelete + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + value.id + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + value.id + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-scheda-siapa"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.name +  '</td><td>' + value.description +  '</td><td><a href="' + srcX + '" target="_blank"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>';
                                },
                                error: function (request, status, errorThrown){}
                            });
                        });
                        $('.tabella-schede-siapa tbody').append(SchedeDifesaSiapaDelete).foundation(); 
                    }        
                });
            },
            failure: function(errMsg) {
                $(".errorColturaSiapa").html("Impossibile eliminare la scheda");
            }
        });
    });
</script>
@stop
