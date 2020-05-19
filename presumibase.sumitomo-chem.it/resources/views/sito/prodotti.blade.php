<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Prodotti')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Prodotti</li>
                    </ul>
                </nav>
            </div>
        </div>

        <!---->
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Prodotti</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="prodotti_head" method="post">
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorImg" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="large-6 columns">
                            <div class="preload_img_slide_hp1"><label>Immagine attuale</label></div>
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
                             <label>Titolo</label><br><textarea name="prodotti_titolo" id="prodotti_titolo" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="large-12 columns">
                            <div id="error" class="errorSottoTitolo" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Sotto titolo</label><br><textarea name="prodotti_sottotitolo" id="prodotti_sottotitolo" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" id="salva" style="margin-left:10px">
                        <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="1">
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

    $('.img_slide').change(function(){                
        var filename = $(this,"input[type='file']").val();
        $(this).prev('.valueSlide').html(filename);
    });

    CKEDITOR.replace('prodotti_titolo');
    CKEDITOR.replace('prodotti_sottotitolo');

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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=3",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                if(value.id == 35){ $("#prodotti_titolo").text(value.description); }
                if(value.id == 36){ $("#prodotti_sottotitolo").val(value.description); }
            });
        }
    });

    var fielIdImg1 = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=35",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg1 = value.id; 
            });
            if(fielIdImg1 != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg1;
                $(".preload_img_slide_hp1").append("<img src='" + src1 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $("form.prodotti_head").submit(function(e) {
        e.preventDefault();           
        
            /*immagine */

            var slider_uno_immagine = '';
            var validazionecampi = true;
            var error ='';

            var myObj ;
            var data = new FormData();
                       
            var files = $("#HeaderImmagine").get(0).files;

            myObj = { "Name": utente , "IdSezione": 35, "Visibile": true };
            myJSON = JSON.stringify(myObj);
            data.append("data", myJSON);

            if(files.length > 0){  
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=35",      
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
                                url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=35",      
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
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=35",      
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

            var testoTitolo = CKEDITOR.instances.prodotti_titolo.getData();
            testoTitolo = testoTitolo.replace(/(\r\n|\n|\r)/gm, "");
            testoTitolo = testoTitolo.replace(/"/g,"\\\"");

            var testoSottotitolo = CKEDITOR.instances.prodotti_sottotitolo.getData();
            testoSottotitolo = testoSottotitolo.replace(/(\r\n|\n|\r)/gm, "");
            testoSottotitolo = testoSottotitolo.replace(/"/g,"\\\"");
           
        
            post_data='{ "ID" : 35 , "Name" :  "Titolo prodotti" , "Description": "' + testoTitolo + '", "Visibile" : true , "IdPagina" : 3 }';
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

            post_data='{ "ID" : 36 , "Name" :  "Testo prodotti" , "Description": "' + testoSottotitolo + '", "Visibile" : true , "IdPagina" : 3 }';
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

    });

</script>
@stop
