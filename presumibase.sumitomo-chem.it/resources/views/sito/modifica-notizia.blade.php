<?php $ruoli = Session::get('permessi'); ?>
<script>
    var idnotizia="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
</script>
@extends('layout.header-site')
@section('title', 'Modifica notizia')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Modifica notizia</li>
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
            <div class="large-3 columns"><div class="titolo_sezione"><h2>Modifica notizia</h2></div></div>
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
               <form class="update_notizia" method="post">
                   <div class="row">
                       <div class="large-6 end columns">
                           <label>Collocazione notizia</label><br>
                           <select name="mondo_notiza" id="mondo_notiza" style="width:250px">
                             <option name="">Scegli</option>                             
                           </select>
                       </div>
                   </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Titolo</label><br><textarea name="notizia_titolo" id="notizia_titolo" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="row">
                       <div class="large-12 columns">
                           <label>Testo</label><br><textarea name="notizia_testo" id="notizia_testo" style="height:100px"></textarea>
                       </div>
                     </div>
                     <div class="row">
                       <div class="large-6 columns">
                           <label>Autore</label><br><input type="text" name="notizia_autore" id="notizia_autore" style="width:250px">
                       </div>
                       <div class="large-6 columns">
                           <label>Data</label><br><input type="text" name="notizia_data" id="notizia_data" style="width:250px">
                       </div>
                     </div>
                     <div class="row">                     
                       <div class="large-6 columns">
                            <div class="preload_img_preview"><label>Immagine preview attuale</label></div>
                       </div>
                       <div class="large-6 columns">
                             <label>Immagine preview (Nome file: preview.png / preview.jpg / preview.jpeg)</label>
                             <label for="immaginePreview" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="immaginePreview" value="1" id="immaginePreview" class="img_slide"/>
                             </label>                           
                         </div>
                       </div>

                       <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img"><label>Immagine header attuale</label></div>
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
                      <input type="hidden" class="idnotizia" id="idnotizia">
                      <input type="hidden" class="idSezioneTesto" id="idSezioneTesto">
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

    CKEDITOR.replace('notizia_titolo');
    CKEDITOR.replace('notizia_testo');

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoTestiSezione?IdSezione=" + idnotizia,
        async:false,
        success: function (resultsSection){
            $.each(resultsSection.data, function(index, valueX){                  
                $("#notizia_testo").val(valueX.text);                    
                var res = valueX.colore.split("#");
                $("#notizia_autore").val(res[0]);
                $("#notizia_data").val(res[1]);
                $("input#idSezioneTesto").val(valueX.id);
            });                           
        }
    });

    $.ajax({
        type: "GET", 
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idnotizia,      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImgX = value.id; 
                var name = value.name;
                var res = name.split(".");
                if(res[0] == 'preview'){
                    var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                    $(".preload_img_preview").append("<img src='" + srcX + "' /> <br />");
                }else{
                    var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                    $(".preload_img").append("<img src='" + srcX + "' /> <br />");
                }
            });
            
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetSezione?idSezione=" + idnotizia,
        async:false,
        success: function (resultsSection){
            $("#notizia_titolo").val(resultsSection.data.name);
            $("input#idnotizia").val(idnotizia);

            var descrizione = resultsSection.data.description;
            var select_string_agricoltura = '';
            var select_string_sumitomo = '';
            var select_string_csr = '';

            if(descrizione == "NEWS MONDO AGRICOLTURA"){ 
              select_string_agricoltura = 'selected="selected"'; 
            }
            if(descrizione == "NEWS MONDO SUMITOMO CHEMICAL"){ 
              select_string_sumitomo = 'selected="selected"'; 
            }
            if(descrizione == "NEWS CSR"){ 
              select_string_csr = 'selected="selected"'; 
            }

            var linea_distributiva = '<option value="AGRICOLTURA" ' + select_string_agricoltura + '>MONDO AGRICOLTURA</option><option value="SUMITOMO" ' + select_string_sumitomo + '>MONDO SUMITOMO CHEMICAL</option><option value="CSR" ' + select_string_csr + '>CSR</option>';
                      
            $("select#mondo_notiza").append(linea_distributiva);
        } 
    });

    $("form.update_notizia").submit(function(e) {
        e.preventDefault();  

        var notizia_titolo = CKEDITOR.instances.notizia_titolo.getData();
        notizia_titolo = notizia_titolo.replace(/(\r\n|\n|\r)/gm, "");
        notizia_titolo = notizia_titolo.replace(/"/g,"\\\"");

        var notizia_testo = CKEDITOR.instances.notizia_testo.getData();
        notizia_testo = notizia_testo.replace(/(\r\n|\n|\r)/gm, "");
        notizia_testo = notizia_testo.replace(/"/g,"\\\"");

        var autore = $('#notizia_autore').val();
        var dataMese = $('#notizia_data').val();
        var mondo_notiza = $('#mondo_notiza').val();

        var idnotizia = $('#idnotizia').val();
        var idSezioneTesto = $('#idSezioneTesto').val();

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

        var data = new FormData();
        var files = $("#immagine").get(0).files;

        myObj = { "Name": utente , "IdSezione": idnotizia, "Visibile":true };
        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ 
            
          $.ajax({
              type: "GET",
              beforeSend: function (request) {           
                request.setRequestHeader("lang", "it");
              },
              url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idnotizia,      
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
                      url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=" + idnotizia,      
                      dataType: "json",
                      data: JSON.parse(post_data),
                      success: function (result){},
                      error: function (request, status, errorThrown){}
                    });
                });          
              },
              error: function (request, status, errorThrown){}
          });

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
                success: function (result) {},
                error: function (request, status, errorThrown){}
            }); 
               
            $.ajax({
                type: "GET",
                beforeSend: function (request) {           
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idnotizia,      
                async:false,
                success: function (result){
                    $.each(result.data, function(index, value){           
                        fielIdImgX = value.id; 
                        var name = value.name;
                        var res = name.split(".");
                        if(res[0] == 'preview'){
                            $(".preload_img_preview").html('');
                            var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                            $(".preload_img_preview").append("<img src='" + srcX + "' /> <br />");
                        }else{
                            $(".preload_img").html('');
                            var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                            $(".preload_img").append("<img src='" + srcX + "' /> <br />");
                        }
                    });
                    
                },
                error: function (request, status, errorThrown){}
            });               
        }  
        
        var dataX = new FormData();
        var files = $("#immaginePreview").get(0).files;

        myObj = { "Name": 'Preview' , "IdSezione": idnotizia, "Visibile":true };
        myJSON = JSON.stringify(myObj);
        dataX.append("data", myJSON);

        dataX.append("UploadedImage", files[0]); 
            
        if(files.length > 0){ 

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
                data: dataX,
                success: function (result) {},
                error: function (request, status, errorThrown){}
            });

            $.ajax({
                type: "GET",
                beforeSend: function (request) {           
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idnotizia,      
                async:false,
                success: function (result){
                    $.each(result.data, function(index, value){           
                        fielIdImgX = value.id; 
                        var name = value.name;
                        var res = name.split(".");
                        if(res[0] == 'preview'){
                            $(".preload_img_preview").html('');
                            var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                            $(".preload_img_preview").append("<img src='" + srcX + "' /> <br />");
                        }else{
                            $(".preload_img").html('');
                            var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                            $(".preload_img").append("<img src='" + srcX + "' /> <br />");
                        }
                    });
                    
                },
                error: function (request, status, errorThrown){}
            });
        }

        post_SezioneTesto='{ "ID" : "' + idSezioneTesto + '", "Text" : "' + notizia_testo + '", "Colore": "' + autore + '#' + dataMese + '", "IdPadre" : "' + idnotizia + '"}';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateTestoSezione",
            dataType: "json",
            data: JSON.parse(post_SezioneTesto),
            success: function(data){},
            error: function (request, status, errorThrown) {}
        });

        post_data='{ "ID" : "' + idnotizia + '", "Name" : "' + notizia_titolo + '", "Description": "' + Namesezione + '", "Visibile" : true, "IdPagina" : "' + IdPagina + '"}';
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
                    $("#error_sito").html('Impossibile aggiornare la notizia');
                }else{
                    $("#error_sito").html('Notizia correttamente aggiornata');
                }
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function (request, status, errorThrown) {}
        });
        
    });
</script>
@stop
