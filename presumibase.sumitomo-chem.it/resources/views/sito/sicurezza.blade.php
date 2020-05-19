<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Sicurezza')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Sicurezza</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!---->
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Sicurezza</h2></div></div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="sicurezza" method="post">
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
                             <label>Titolo</label><br><textarea name="sicurezza_titolo" id="sicurezza_titolo" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorSottoTitolo" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Sotto titolo</label><br><textarea name="sicurezza_sottotitolo" id="sicurezza_sottotitolo" style="height:100px"></textarea>
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
                            <div id="error" class="errorAdr" style="margin:0"></div>
                        </div>
                    </div>
                  <form class="adr" method="post">
                      <div class="row">
                          <div class="large-12 columns">
                              <label>Norme adr</label><br><input type="file" name="adr" id="adr">
                          </div>
                      </div>
                      <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" >
                        <a href="" class="pulsante-annulla">ANNULLA</a>
                      </div>
                  </form>
                  <div class="row">
                        <div class="large-12 columns">
                            <div id="ModuloAdr" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="expanded row">
                 <div class="medium-6 large-6 columns">
                    <div class="scheda-nuovo-prodotto formFile">
                    <div class="expanded row" style="margin-bottom:15px">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorClp" style="margin:0"></div>
                        </div>
                    </div>
                      <form class="clp" method="post">
                          <div class="row">
                              <div class="large-12 columns">
                                  <label>Classificazione CLP</label><br><input type="file" name="clp" id="clp">
                              </div>
                          </div>
                          <div class="large-12 columns">
                              <input type="submit" name="SALVA" value="SALVA" >
                              <a href="" class="pulsante-annulla">ANNULLA</a>
                          </div>
                      </form>
                      <div class="row">
                        <div class="large-12 columns">
                            <div id="ModuloClp" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
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
             <div class="medium-6 large-6 columns end">
                <div class="scheda-nuovo-prodotto formFile">
                <div class="expanded row" style="margin-bottom:15px">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorDpi" style="margin:0"></div>
                        </div>
                    </div>
                  <form class="utilizzo-agrofarmaci" method="post">
                      <div class="row">
                          <div class="large-12 columns">
                              <label>Utilizzo agrofarmaci e DPI</label><br><input type="file" name="utilizzo-agrofarmaci" id="utilizzo-agrofarmaci">
                          </div>
                      </div>
                      <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" >
                        <a href="" class="pulsante-annulla">ANNULLA</a>
                      </div>
                  </form>
                  <div class="row">
                        <div class="large-12 columns">
                            <div id="ModuloDpi" style="display: block; margin: 0 0 0 15px;; font-size: 0.875rem;color: #424242;"></div>
                        </div>
                    </div>
                </div>
             </div>
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

    CKEDITOR.replace('sicurezza_titolo');
    CKEDITOR.replace('sicurezza_sottotitolo');

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=5",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                if(value.id == 47){ $("#sicurezza_titolo").val(value.description); }
                if(value.id == 48){ $("#sicurezza_sottotitolo").val(value.description); }
            });
        }
    });

    var fielIdImg1 = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=47",      
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

    $("form.sicurezza").submit(function(e) {
        e.preventDefault();           
    
            var slider_uno_immagine = '';
            var validazionecampi = true;
            var error ='';

            var myObj ;
            var data = new FormData();
                       
            var files = $("#HeaderImmagine").get(0).files;

            myObj = { "Name": utente , "IdSezione": 47, "Visibile": true };
            myJSON = JSON.stringify(myObj);
            data.append("data", myJSON);

            if(files.length > 0){  
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=47",      
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
                                url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=47",      
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
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=47",      
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

            var testoTitolo = CKEDITOR.instances.sicurezza_titolo.getData();
            testoTitolo = testoTitolo.replace(/(\r\n|\n|\r)/gm, "");
            testoTitolo = testoTitolo.replace(/"/g,"\\\"");

            var testoSottotitolo = CKEDITOR.instances.sicurezza_sottotitolo.getData();
            testoSottotitolo = testoSottotitolo.replace(/(\r\n|\n|\r)/gm, "");
            testoSottotitolo = testoSottotitolo.replace(/"/g,"\\\"");          
             
            post_data='{ "ID" : 47 , "Name" :  "Titolo sicurezza" , "Description": "' + testoTitolo + '", "Visibile" : true , "IdPagina" : 5 }';
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

            post_data='{ "ID" : 48 , "Name" :  "Sotto titolo sicurezza" , "Description": "' + testoSottotitolo + '", "Visibile" : true , "IdPagina" : 5 }';
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

            $("html, body").animate({ scrollTop: 0 }, "slow");

    });

    $(document).on('submit', '.adr', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#adr").get(0).files;

        myObj = { "Name": utente , "IdSezione": 49, "Visibile":true };
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
                    $(".errorAdr").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=49",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){  
                                if(value.idSezione == 49){ 
                                    $("#ModuloAdr").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".errorAdr").html("Impossibile caricare il file");
                }
        });
    });

    $(document).on('submit', '.clp', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#clp").get(0).files;

        myObj = { "Name": utente , "IdSezione": 50, "Visibile":true };
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
                    $(".errorClp").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=50",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){  
                                if(value.idSezione == 50){ 
                                    $("#ModuloClp").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".errorClp").html("Impossibile caricare il file");
                }
        });
    });

    $(document).on('submit', '.utilizzo-agrofarmaci', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = $("#utilizzo-agrofarmaci").get(0).files;

        myObj = { "Name": utente , "IdSezione": 51, "Visibile":true };
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
                    $(".errorDpi").html("File correttamente caricato");

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=51",
                        async:false,
                        success: function (results){
                            $.each(results.data, function(index, value){  
                                if(value.idSezione == 51){ 
                                    $("#ModuloDpi").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                                }
                            });
                        }
                    });
                },
                error: function (request, status, errorThrown){
                    $(".errorDpi").html("Impossibile caricare il file");
                }
        });
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=49",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.idSezione == 49){ 
                    $("#ModuloAdr").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=50",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.idSezione == 50){ 
                    $("#ModuloClp").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?idSezione=51",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.idSezione == 51){ 
                    $("#ModuloDpi").html('File attuale: <a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '">' + value.name + "</a>"); 
                }
            });
        }
    });
</script>
@stop
