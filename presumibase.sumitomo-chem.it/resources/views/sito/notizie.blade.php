<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Notizie')

@section('content')

@include('layout.menu-sito')

<section id="content-elenco-codici">
    <div class="row large-12 prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='{{ url("/") }}'>Sito</a></li>
                    <li class="disabled">Notizie</li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="expanded row">
        <div class="medium-12 large-12 columns">
            <div id="error_sito"></div>
        </div>
    </div>

        <!---->
    <div class="expanded row">
        <div class="large-3 columns"><div class="titolo_sezione"><h2>Nuova notizia</h2></div></div>
        <div class="large-9 columns">
          <div id="pulsanti-prodotto">
            <div class="button-group" id="menu-pulsanti-prodotto" style="width:1010px">
                  <a href="<?php echo url('sito/notizie'); ?>" class="float-right button">NUOVA NOTIZIA</a>
                  <a href="<?php echo url('sito/mondo-agricoltura'); ?>" class="float-right button">MONDO AGRICOLTURA</a>
                  <a href="<?php echo url('sito/mondo-sumitomo'); ?>" class="float-right button">MONDO SUMITOMO CHEMICAL</a>
                  <a href="<?php echo url('sito/notizie-csr'); ?>" class="float-right button">CSR</a>
            </div>
          </div>
        </div>
    </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="nuova_notizia" method="post">
                   <div class="row">
                       <div class="large-6 end columns">
                           <label>Collocazione notizia</label><br>
                           <select name="mondo_notiza" id="mondo_notiza" style="width:250px">
                             <option name="">Scegli</option>
                             <option value="AGRICOLTURA">MONDO AGRICOLTURA</option>
                             <option value="SUMITOMO">MONDO SUMITOMO CHEMICAL</option>
                             <option value="CSR">CSR</option>
                           </select>
                       </div>
                   </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Titolo</label><br><textarea name="nuova_notizia_titolo" id="nuova_notizia_titolo" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="row">
                       <div class="large-12 columns">
                           <label>Testo</label><br><textarea name="nuova_notizia_testo" id="nuova_notizia_testo" style="height:100px"></textarea>
                       </div>
                     </div>
                     <div class="row">
                       <div class="large-6 columns">
                           <label>Autore</label><br><input type="text" name="nuova_notizia_autore" id="nuova_notizia_autore" style="width:250px">
                       </div>
                       <div class="large-6 columns">
                           <label>Data</label><br><input type="text" name="nuova_notizia_data" id="nuova_notizia_data" style="width:250px">
                       </div>
                     </div>
                     <div class="row">
                        <div class="large-6 columns">
                             <label>Immagine preview (Nome file: preview.png / preview.jpg / preview.jpeg)</label>
                             <label for="immaginePreview" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="immaginePreview" value="1" id="immaginePreview" class="img_slide"/>
                             </label>                           
                         </div>
                     
                        <div class="large-6 columns">
                             <label>Immagine header</label>
                             <label for="immagine" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="immagine" value="1" id="immagine" class="img_slide"/>
                             </label>                           
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

    CKEDITOR.replace('nuova_notizia_titolo');
    CKEDITOR.replace('nuova_notizia_testo');

    $("form.nuova_notizia").submit(function(e) {
        e.preventDefault();  
        var IdPagina ='';
        var Namesezione = '';
        var idSezione = '';

        var nuova_notizia_titolo = CKEDITOR.instances.nuova_notizia_titolo.getData();
        nuova_notizia_titolo = nuova_notizia_titolo.replace(/(\r\n|\n|\r)/gm, "");
        nuova_notizia_titolo = nuova_notizia_titolo.replace(/"/g,"\\\"");

        var nuova_notizia_testo = CKEDITOR.instances.nuova_notizia_testo.getData();
        nuova_notizia_testo = nuova_notizia_testo.replace(/(\r\n|\n|\r)/gm, "");
        nuova_notizia_testo = nuova_notizia_testo.replace(/"/g,"\\\"");

        var autore = $('#nuova_notizia_autore').val();
        var dataMese = $('#nuova_notizia_data').val();
        var mondo_notiza = $('#mondo_notiza').val();

        if(mondo_notiza == 'AGRICOLTURA'){
            IdPagina = 16;
            Namesezione = 'NEWS MONDO AGRICOLTURA';
        }
        if(mondo_notiza == 'SUMITOMO'){
            IdPagina = 17;
            Namesezione = 'NEWS MONDO SUMITOMO CHEMICAL';
        }
        if(mondo_notiza == 'CSR'){
            IdPagina = 19;
            Namesezione = 'NEWS CSR';
        }
    
        post_data='{ "Name" : "' + nuova_notizia_titolo + '", "Description": "' + Namesezione + '", "Visibile" : true, "IdPagina" : "' + IdPagina + '"}';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/CreateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            async:false,
            success: function(data){
                $("#error_sito").html();
                if(data.returnCode == '-1'){
                    $("#error_sito").html('Impossibile creare la notizia');
                }else{
                    idSezione = data.data;
                }
            },
            error: function (request, status, errorThrown) {}
        });

        if(idSezione != ''){

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
            var files = $("#immaginePreview").get(0).files;

            myObj = { "Name": 'Preview' , "IdSezione": idSezione, "Visibile":true };
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
                            $(".errorImgPreview").html("File correttamente caricato");
                        },
                        error: function (request, status, errorThrown){
                            $(".errorImgPreview").html("Impossibile caricare il file");
                        }
                });
            }  

            post_dataTesto='{ "Text" : "' + nuova_notizia_testo + '", "Colore": "' + autore + '#' + dataMese + '" ,"IdPadre" : "' + idSezione + '"}';
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/CreateTestoSezione",
                dataType: "json",
                data: JSON.parse(post_dataTesto),
                success: function(data){
                    $("#error_sito").html();
                    if(data.returnCode == '-1'){
                        $("#error_sito").html('Impossibile creare la notizia');
                    }else{
                        $("#error_sito").html('Notizia creata');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }
                },
                error: function (request, status, errorThrown) {}
            });




        }
    
    });

</script>
@stop
