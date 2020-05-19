<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Chi siamo')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Chi siamo</li>
                    </ul>
                </nav>
            </div>
        </div>

        <!---->
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Chi siamo</h2></div></div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="chi_siamo" method="post">
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorImg" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="large-6 columns">
                            <div class="preload_img_slide_hp"><label>Immagine attuale</label></div>
                        </div>
                         <div class="large-6 columns"> 
                             <label>Immagine</label>  
                                <label for="HeaderImmagine" class="filupp">
                                    <span class="filupp-file-name valueSlide"></span>
                                    <input type="file" name="HeaderImmagine" value="1" id="HeaderImmagine" class="img_slide"/>
                                </label>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorTitolo" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Titolo</label><br><textarea name="chisiamo_titolo" id="chisiamo_titolo" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorSottoTitolo" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Sotto titolo</label><br><textarea name="chisiamo_sottotitolo" id="chisiamo_sottotitolo" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorIntroduzione" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Testo introduzione</label><br><textarea name="chi_siamo_introduzione" id="chi_siamo_introduzione" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorSpirito" style="margin:0"></div>  
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Lo spirito e i principi di Sumitomo</label><br><textarea name="chi_siamo_spirito" id="chi_siamo_spirito" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorsicurezza" style="margin:0"></div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="large-12 columns">
                             <label>Sicurezza e responsabilità</label><br><textarea name="chi_siamo_sicurezza" id="chi_siamo_sicurezza" style="height:100px"></textarea>
                         </div>
                    </div>
                    <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorpunti_sicurezza" style="margin:0"></div> 
                        </div>
                    </div>        
                    <div class="row">
                         <div class="large-12 columns">
                             <label>Punti sicurezza e responsabilità</label><br><textarea name="chi_siamo_punti_sicurezza" id="chi_siamo_punti_sicurezza"></textarea>
                         </div>
                    </div>
                     <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" id="salva" style="margin-left:10px">
                     </div>
                 </form>
               </div>
            </div>
        </div>               
                     
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Documenti</h2></div></div>
        </div>

         <div class="expanded row">
             <div class="medium-6 large-6 columns">
                <div class="scheda-nuovo-prodotto formFile">
                    <div class="expanded row" style="margin-bottom:15px">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorCodice" style="margin:0"></div>
                        </div>
                    </div>
                  <form class="codice_etico" method="post">
                      <div class="row">
                          <div class="large-12 columns">
                              <label>Codice etico</label><br><input type="file" name="codice_etico" id="codice_etico">
                          </div>
                      </div>
                      <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" >
                        <a href="" class="pulsante-annulla">ANNULLA</a>
                      </div>
                  </form>
                  <div class="row">
                    <div class="large-12 columns">
                        <div id="CodiceAttuale" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
                    </div>
                 </div>
                </div>
             </div>
             <div class="expanded row">
                 <div class="medium-6 large-6 columns">
                    <div class="scheda-nuovo-prodotto formFile">
                        <div class="expanded row" style="margin-bottom:15px">
                            <div class="medium-12 large-12 columns">
                                <div id="error" class="errorCorruzione" style="margin:0"></div>
                            </div>
                        </div>
                      <form class="corruzione" method="post">
                          <div class="row">
                              <div class="large-12 columns">
                                  <label>Prevenzione della corruzione</label><br><input type="file" name="docCorruzione" id="docCorruzione">
                              </div>
                          </div>
                          <div class="large-12 columns">
                              <input type="submit" name="SALVA" value="SALVA" >
                              <a href="" class="pulsante-annulla">ANNULLA</a>
                          </div>
                      </form>
                      <div class="row">
                            <div class="large-12 columns">
                                <div id="CorruzioneAttuale" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
         </div>

         <div class="expanded row">
             <div class="large-12 columns"><div style="float:left; border-bottom: 1px solid #979797; width:100%; margin-bottom:20px">&nbsp;</div></div>
         </div>

         <div class="expanded row">
             <div class="medium-6 large-6 columns">
                <div class="scheda-nuovo-prodotto formFile">
                    <div class="expanded row" style="margin-bottom:15px">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorModelloGenerale" style="margin:0"></div>
                        </div>
                    </div>
                  <form class="modello_generale" method="post">
                      <div class="row">
                          <div class="large-12 columns">
                              <label>Modello 231 (generale)</label><br><input type="file" name="modello_generale" id="modello_generale">
                          </div>
                      </div>
                      <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" >
                        <a href="" class="pulsante-annulla">ANNULLA</a>
                      </div>
                  </form>
                  <div class="row">
                        <div class="large-12 columns">
                            <div id="ModuloGeneraleAttuale" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="medium-6 large-6 columns">
                <div class="scheda-nuovo-prodotto formFile">
                    <div class="expanded row" style="margin-bottom:15px">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorModelloParziale" style="margin:0"></div>
                        </div>
                    </div>
                  <form class="modello_parziale" method="post">
                      <div class="row">
                          <div class="large-12 columns">
                              <label>Modello 231 (parziale)</label><br><input type="file" name="modello_parziale" id="modello_parziale">
                          </div>
                      </div>
                      <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" >
                        <a href="" class="pulsante-annulla">ANNULLA</a>
                      </div>
                  </form>
                  <div class="row">
                        <div class="large-12 columns">
                            <div id="ModuloParzialeAttuale" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
                        </div>
                    </div>
                </div>
                </div>
             </div>
         </div>

         <div class="expanded row">
             <div class="large-12 columns"><div style="float:left; border-bottom: 1px solid #979797; width:100%; margin-bottom:20px">&nbsp;</div></div>
         </div>

        <!---->

      </section>
@endsection

@section('script')
<script type="text/javascript">

    $('.img_slide').change(function(){                
        var filename = $(this,"input[type='file']").val();
        $(this).prev('.valueSlide').html(filename);
    });
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

    CKEDITOR.replace('chisiamo_titolo');
    CKEDITOR.replace('chisiamo_sottotitolo');
    CKEDITOR.replace('chi_siamo_spirito');
    CKEDITOR.replace('chi_siamo_introduzione');
    CKEDITOR.replace('chi_siamo_sicurezza');
    CKEDITOR.replace('chi_siamo_punti_sicurezza');
    
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=4",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                if(value.id == 37){ $("#chisiamo_titolo").val(value.description); }
                if(value.id == 38){ $("#chisiamo_sottotitolo").val(value.description); }
                if(value.id == 39){ $("#chi_siamo_spirito").val(value.description); }
                if(value.id == 40){ $("#chi_siamo_introduzione").val(value.description); }
                if(value.id == 41){ $("#chi_siamo_sicurezza").val(value.description); }
                if(value.id == 42){ $("#chi_siamo_punti_sicurezza").val(value.description); }
            });
        }
    });

    var fielIdImg1 = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=37",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg1 = value.id; 
            });
            if(fielIdImg1 != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg1;
                $(".preload_img_slide_hp").append("<img src='" + src1 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $("form.chi_siamo").submit(function(e) {
        e.preventDefault();           
        
            /*immagine */

            var slider_uno_immagine = '';
            var validazionecampi = true;
            var error ='';

            var myObj ;
            var data = new FormData();
                       
            var files = $("#HeaderImmagine").get(0).files;

            myObj = { "Name": utente , "IdSezione": 37, "Visibile": true };
            myJSON = JSON.stringify(myObj);
            data.append("data", myJSON);

            if(files.length > 0){  
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=37",      
                    async:false,
                    success: function (result){
                        $.each(result.data, function(index, value){           
                            
                            post_data = '{ "id" : ' + value.id + '}';
                            $.ajax({
                                type: "POST",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                    request.setRequestHeader("charset" , "utf-8");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=37",      
                                dataType: "json",
                                data: JSON.parse(post_data),
                                success: function (result){},
                                error: function (request, status, errorThrown){}
                            });
                        });
                        
                    },
                    error: function (request, status, errorThrown){}
                });

                $(".preload_img_slide_hp").html('');
                data.append("UploadedImage", files[0]);                         
                var ajaxRequest = $.ajax({
                      type: "POST",
                      beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                      },
                      url: "{{ config('constants.UrlWebService') }}api/Site/UploadImmagine",
                      contentType: false,
                      processData: false,
                      data: data,
                      async:false,
                      success: function (result) {
                        $(".errorImg").html('Immagine correttamente caricata');
                            $.ajax({
                                type: "GET",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("lang", "it");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=37",      
                                async:false,
                                success: function (result){
                                    $.each(result.data, function(index, value){           
                                        fielIdImgX = value.id; 
                                    });
                                    var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                                    $(".preload_img_slide_hp").append("<img src='" + srcX + "' /> <br />");
                                },
                                error: function (request, status, errorThrown){}
                            });
                      },
                      error: function (request, status, errorThrown) {
                        $(".errorImg").html('Impossibile caricare l\'immagine');
                      }
                });
                
            }

            var testoTitolo = CKEDITOR.instances.chisiamo_titolo.getData();
            testoTitolo = testoTitolo.replace(/(\r\n|\n|\r)/gm, "");
            testoTitolo = testoTitolo.replace(/"/g,"\\\"");

            var testoSottotitolo = CKEDITOR.instances.chisiamo_sottotitolo.getData();
            testoSottotitolo = testoSottotitolo.replace(/(\r\n|\n|\r)/gm, "");
            testoSottotitolo = testoSottotitolo.replace(/"/g,"\\\"");

            var chi_siamo_spirito = CKEDITOR.instances.chi_siamo_spirito.getData();
            chi_siamo_spirito = chi_siamo_spirito.replace(/(\r\n|\n|\r)/gm, "");
            chi_siamo_spirito = chi_siamo_spirito.replace(/"/g,"\\\"");

            var chi_siamo_introduzione = CKEDITOR.instances.chi_siamo_introduzione.getData();
            chi_siamo_introduzione = chi_siamo_introduzione.replace(/(\r\n|\n|\r)/gm, "");
            chi_siamo_introduzione = chi_siamo_introduzione.replace(/"/g,"\\\"");

            var chi_siamo_sicurezza = CKEDITOR.instances.chi_siamo_sicurezza.getData();
            chi_siamo_sicurezza = chi_siamo_sicurezza.replace(/(\r\n|\n|\r)/gm, "");
            chi_siamo_sicurezza = chi_siamo_sicurezza.replace(/"/g,"\\\"");

            var chi_siamo_punti_sicurezza = CKEDITOR.instances.chi_siamo_punti_sicurezza.getData();
            chi_siamo_punti_sicurezza = chi_siamo_punti_sicurezza.replace(/(\r\n|\n|\r)/gm, "");
            chi_siamo_punti_sicurezza = chi_siamo_punti_sicurezza.replace(/"/g,"\\\"");
           
             
            post_data='{ "ID" : 37 , "Name" :  "Titolo chi siamo" , "Description": "' + testoTitolo + '", "Visibile" : true , "IdPagina" : 4 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorTitolo").html('Impossibile aggiornare il titolo');
                    }else{
                        $(".errorTitolo").html('Titolo correttamente aggiornato');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorTitolo").html('Impossibile aggiornare il testo');
                }
            });   

            post_data='{ "ID" : 38 , "Name" :  "Sotto titolo chi siamo" , "Description": "' + testoSottotitolo + '", "Visibile" : true , "IdPagina" : 4 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorSottoTitolo").html('Impossibile aggiornare il sotto titolo');
                    }else{
                        $(".errorSottoTitolo").html('Sotto titolo correttamente aggiornato');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorSottoTitolo").html('Impossibile aggiornare il testo');
                }
            });  

            post_data='{ "ID" : 39 , "Name" :  "Spirito chi siamo" , "Description": "' + chi_siamo_spirito + '", "Visibile" : true , "IdPagina" : 4 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorSpirito").html('Impossibile aggiornare la sezione');
                    }else{
                        $(".errorSpirito").html('Seziome correttamente aggiornata');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorSpirito").html('Impossibile aggiornare il testo');
                }
            });  

            post_data='{ "ID" : 40 , "Name" :  "Introduzione chi siamo" , "Description": "' + chi_siamo_introduzione + '", "Visibile" : true , "IdPagina" : 4 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorIntroduzione").html('Impossibile aggiornare la sezione');
                    }else{
                        $(".errorIntroduzione").html('Seziome correttamente aggiornata');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorIntroduzione").html('Impossibile aggiornare la sezione');
                }
            });        

            post_data='{ "ID" : 41 , "Name" :  "Sicurezza chi siamo" , "Description": "' + chi_siamo_sicurezza + '", "Visibile" : true , "IdPagina" : 4 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorsicurezza").html('Impossibile aggiornare la sezione');
                    }else{
                        $(".errorsicurezza").html('Seziome correttamente aggiornata');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorsicurezza").html('Impossibile aggiornare la sezione');
                }
            }); 

            post_data='{ "ID" : 42 , "Name" :  "Punti sicurezza chi siamo" , "Description": "' + chi_siamo_punti_sicurezza + '", "Visibile" : true , "IdPagina" : 4 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorpunti_sicurezza").html('Seziome correttamente aggiornata');
                    }else{
                        $(".errorpunti_sicurezza").html('Sotto titolo correttamente aggiornato');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorpunti_sicurezza").html('Impossibile aggiornare la sezione');
                }
            });    

            $("html, body").animate({ scrollTop: 0 }, "slow");

    });

    /*Codice etico*/
    $(document).on('submit', '.codice_etico', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#codice_etico").get(0).files;

        myObj = { "Name": utente , "IdSezione": 43, "Visibile":true };
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
                    $(".errorCodice").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=43",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){  
                                if(value.idSezione == 43){ 
                                    $("#CodiceAttuale").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".errorCodice").html("Impossibile caricare il file");
                }
        });
    });

    /*Prevenzione della corruzione*/
    $(document).on('submit', '.corruzione', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#docCorruzione").get(0).files;

        myObj = { "Name": utente , "IdSezione": 44, "Visibile":true };
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
                    $(".errorCorruzione").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=44",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){   
                                if(value.idSezione == 44){ 
                                    $("#CorruzioneAttuale").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".errorCorruzione").html("Impossibile caricare il file");
                }
        });
    });

    /*Modello 231 generale*/
    $(document).on('submit', '.modello_generale', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#modello_generale").get(0).files;

        myObj = { "Name": utente , "IdSezione": 45, "Visibile":true };
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
                    $(".errorModelloGenerale").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=45",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){  
                                if(value.idSezione == 45){ 
                                    $("#ModuloGeneraleAttuale").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".errorModelloGenerale").html("Impossibile caricare il file");
                }
        });
    });

    /*Modello 231 parziale*/
    $(document).on('submit', '.modello_parziale', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#modello_parziale").get(0).files;

        myObj = { "Name": utente , "IdSezione": 46, "Visibile":true };
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
                    $(".errorModelloParziale").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=46",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){               
                                if(value.idSezione == 46){ 
                                    $("#ModuloParzialeAttuale").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".errorModelloParziale").html("Impossibile caricare il file");
                }
        });
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=43",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.idSezione == 43){ 
                    $("#CodiceAttuale").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=44",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.idSezione == 44){ 
                    $("#CorruzioneAttuale").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=45",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.idSezione == 45){ 
                    $("#ModuloGeneraleAttuale").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=46",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.idSezione == 46){ 
                    $("#ModuloParzialeAttuale").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                }
            });
        }
    });

</script>
@stop
