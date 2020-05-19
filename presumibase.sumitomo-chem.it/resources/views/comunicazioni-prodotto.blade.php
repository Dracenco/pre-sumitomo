<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
</script>

@extends('layout.header')
@section('title', 'Comunicazioni prodotto')

@section('content')
@include('layout.menu')
<section id="content-comunicazioni-prodotto" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                        <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                        <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="nome-prodotto"></a></li>
                        <li class="disabled">Comunicazioni prodotto</li>
                    </ul>
                </nav>
            </div>
        </div>

        @include('layout.menu-pulsanti-prodotto')

        <div class="expanded row">
            <div class="medium-12 large-12 columns"><div id="error"></div></div>
        </div>
      @if ($ruoli['database prodotti'] != 'N')
         <div class="expanded row">
             <div class="medium-12 large-12 columns">

               @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                <div class="row collapse">
                 <div class="medium-12 large-12 columns">
                     <div class="form-carica-documenti">
                         <form class="upload_doc">
                             <div class="row">
                                 <div class="large-3 columns">
                                     <label>Descrizione<sup>*</sup></label>
                                 </div>
                                 <div class="large-3 columns end">
                                     <input type="text" name="descrizione" id="descrizione">
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="large-3 columns">
                                     <label>Documento da caricare<sup>*</sup></label>
                                 </div>
                                 <div class="large-3 columns end">
                                     <label for="custom-file-upload" class="filupp"><span class="filupp-file-name js-value"></span><input type="file" name="attachment-file" value="1" id="custom-file-upload"/></label>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="large-3 columns"><label>Destinazione documento<sup>*</sup></label></div>
                                 <div class="large-3 columns end">
                                    <select name="destinazione" id="destinazione">
                                        <option value="">Scegli</option>
                                        <option value="Si">Web</option>
                                        <option value="No">File tecnici/Stampa</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="large-3 columns"><label>Mostra sul sito</label></div>
                                 <div class="large-3 columns end">
                                    <select name="sito" id="sito">
                                        <option value="">Scegli</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="large-6 columns end"><input type="submit" name="CARICA" value="CARICA"></div>
                             </div>
                        </form>
                     </div>
                 </div>
                </div>
                @endif
                <div class="row collapse">
                    <div class="medium-12 large-12 columns">
                       @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                       <form class="UpdateComunicazioni">
                           <table id="tabella-comunicazioni" class="file-web">
                               <thead>
                                   <tr>
                                       <th width="300">WEB</th>
                                       <th width="150" class="text-center">SITO</th>
                                       <th width="150" class="text-center">SCARICA</th>
                                       <th width="150" class="text-center">DATA UPLOAD</th>
                                   </tr>
                               </thead>
                               <tbody></tbody>
                           </table>
                           <input type="submit" name="SALVA" value="SALVA">
                       </form>
                       @else
                          <table id="tabella-comunicazioni" class="file-web">
                                 <thead>
                                     <tr>
                                         <th width="300">WEB</th>
                                         @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                                         <th width="150" class="text-center">SITO</th>
                                         @else
                                         <th width="150" class="text-center"></th>
                                         @endif
                                         <th width="150" class="text-center">SCARICA</th>
                                         <th width="150" class="text-center">DATA UPLOAD</th>
                                     </tr>
                                 </thead>
                                 <tbody></tbody>
                            </table>
                       @endif

                    </div>
                </div>

                <div class="row expanded collapse">
                    <div class="large-12 columns"><div class="separatore"></div></div>
                </div>

                 <div class="row collapse">
                    <div class="medium-12 large-12 columns">
                        <table id="tabella-comunicazioni" class="file-tecnici">
                            <thead>
                                <tr>
                                    <th width="300">FILE TECNICI/STAMPA</th>
                                    <th width="150"></th>
                                    <th width="150" class="text-center">SCARICA</th>
                                    <th width="150" class="text-center">DATA UPLOAD</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>
      @else
          <div class="expanded row">
            <div class="medium-12 large-12 columns">
              <div class="report">Non hai i permessi per visualizzare questa pagina</div>
            </div>
          </div>
      @endif
</section>
@endsection

@section('script')
<script type="text/javascript">
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result) {
            $.each(result.data, function(index, value){
                var categoria_attiva='';

                url_prodotto= "{{ url('prodotti') }}/" + value.id;

                if(cat == value.id){
                    categoria_attiva='class="categoria-attiva"';
                }else{
                    categoria_attiva='';
                }
                $("ul.menu").append('<li> <a href="{!! url("prodotti") !!}' + '/' + value.id + '" ' + categoria_attiva + ' >' + value.name + '</a></li>');
            });
        },
        error: function (request, status, errorThrown){ }
    });

	$.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        success: function (result) {
            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $(".breadcrumbs li a#nome-prodotto").append(result.data.name);
        },
        error: function (request, status, errorThrown){}
    });

    var productId ='';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetComunicazioni?code=" + prodotto,
        async:false,
        success: function (result) {

            var file_web = '';
            var file_tecnici = '';
            var download = '';
            var checked='';
            var tec='';
            productId = result.data.productId;

            $.each(result.data.comunicazioni, function(index, value){

                download = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.file.fileID;
                checked='';

                if(value.web){
                    if(value.sito){ checked='checked'; }
                    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                      file_web = file_web + '<tr><td>' + value.description + '</td><td><input type="checkbox" name="file" value="' + value.id + '" ' + checked +' ></td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td>' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                    @else
                      file_web = file_web + '<tr><td>' + value.description + '</td><td></td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td>' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                    @endif
                }
            });

            $.each(result.data.comunicazioniTecnici, function(index, value){
                download = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.file.fileID;
                if(value.tecnici){
                    file_tecnici = file_tecnici + '<tr><td>' + value.description + '</td><td> </td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td class="text-center">' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                }
            });
            $(".file-web tbody").append(file_web);
            $(".file-tecnici tbody").append(file_tecnici);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.UpdateComunicazioni', function(e){
        e.preventDefault();
        var selected = new Array();
        var id_file='';

        $("input:checkbox[name=file]").each(function() {
            if($(this).is(':checked')) {
                id_file = id_file + '{ "id" : "' + $(this).val() + '", "sito" : true },';
            }else{
                id_file = id_file + '{ "id" : "' + $(this).val() + '", "sito" : false },';
            }
        });

        id_file=id_file.slice(0,-1);

        post_data='{ "comunicazioni" : [' + id_file + '] }';

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/UpdateComunicazioni",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $("#error").html('Impossibile aggiornare le informazioni');
                }else{
                    $("#error").html('Informazioni aggiornate');
                    $('.file-web tbody').html('').foundation();
                    $('.file-tecnici tbody').html('').foundation();
                    $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Products/GetComunicazioni?code=" + prodotto,
                        async:false,
                        success: function (result) {

                            var file_web = '';
                            var file_tecnici = '';
                            var download = '';
                            var checked='';
                            var tec='';
                            productId = result.data.productId;

                            $.each(result.data.comunicazioni, function(index, value){

                                download = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.file.fileID;
                                checked='';

                                if(value.web){
                                    if(value.sito){ checked='checked'; }
                                    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                                      file_web = file_web + '<tr><td>' + value.description + '</td><td><input type="checkbox" name="file" value="' + value.id + '" ' + checked +' ></td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td>' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                                    @else
                                      file_web = file_web + '<tr><td>' + value.description + '</td><td></td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td>' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                                    @endif
                                }
                            });

                            $.each(result.data.comunicazioniTecnici, function(index, value){

                                download = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.file.fileID;
                                if(value.tecnici){
                                    file_tecnici = file_tecnici + '<tr><td>' + value.description + '</td><td> </td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td class="text-center">' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                                }
                            });
                            $(".file-web tbody").append(file_web);
                            $(".file-tecnici tbody").append(file_tecnici);
                        },
                        error: function (request, status, errorThrown){}
                    });
                }
            },
            failure: function(errMsg) { $("#error").html('Impossibile aggiornare le informazioni'); }
        });
    });

    $(document).on('submit', '.upload_doc', function(e){
       e.preventDefault();

       var descrizione = $(this).find('input#descrizione').val();
       var destinazione = $(this).find('select#destinazione').val();
       var filetecnici='';
       var fileweb='';

       if(destinazione=='Si'){
            filetecnici = false;
            fileweb = true;
       }else{
            filetecnici = true;
            fileweb = false;
       }

       var sito = $(this).find('select#sito').val();

       if(sito=='Si'){ sito = true;
       }else{ sito = false; }

       var data = new FormData();
       var files = $(this).find('#custom-file-upload').get(0).files;

        myObj = {
            "ProductId": productId,
            "Comunicazioni": [{
                "Description": descrizione,
                "CompanyId": 1,
                "Web": fileweb,
                "Tecnici": filetecnici,
                "Sito": sito,
                "File": {
                    "FileTypeID": 8,
                    "CreatedBy": utente
                }
            }]
        };

        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ data.append("UploadedImage", files[0]); }

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Upload/UploadComunicazione",
                contentType: false,
                processData: false,
                data: data,
                success: function (result) {
                    if(result.returnCode == '-1'){
                        $("#error").html('Impossibile caricare il file');
                    }else{
                        $("#error").html('File correttamente caricato');
                        $('.file-web tbody').html('').foundation();
                        $('.file-tecnici tbody').html('').foundation();
                        $('.upload_doc').trigger('reset');
                        $('.upload_doc span.filupp-file-name').html('');
                        var productId ='';
                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Products/GetComunicazioni?code=" + prodotto,
                            async:false,
                            success: function (result) {

                                var file_web = '';
                                var file_tecnici = '';
                                var download = '';
                                var checked='';

                                productId = result.data.productId;

                                $.each(result.data.comunicazioni, function(index, value){
                                    download = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.file.fileID;
                                    checked='';

                                    if(value.web){
                                        if(value.sito){ checked='checked'; }
                                        @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                                          file_web = file_web + '<tr><td>' + value.description + '</td><td><input type="checkbox" name="file" value="' + value.id + '" ' + checked +' ></td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td>' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                                        @else
                                          file_web = file_web + '<tr><td>' + value.description + '</td><td></td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td>' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                                        @endif
                                    }

                                });

                                $.each(result.data.comunicazioniTecnici, function(index, value){
                                    download = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.file.fileID;
                                    if(value.tecnici){
                                        file_tecnici = file_tecnici + '<tr><td>' + value.description + '</td><td> </td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a><td class="text-center">' + formatoData(value.file.uploadDate) + '</td></td></tr>';
                                    }
                                });
                                $(".file-web tbody").append(file_web);
                                $(".file-tecnici tbody").append(file_tecnici);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                },
                error: function (request, status, errorThrown) {
                     $("#error").html('Impossibile caricare il file');
                }
            });
        });
</script>
@stop
