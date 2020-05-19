<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($categoria)){ echo $categoria; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
</script>

@extends('layout.header')
@section('title', 'Et. Ministeriali e schede di sicurezza')

@section('content')
@include('layout.menu')

      <section id="content-scheda-prodotto" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                        <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                        <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="nome-prodotto"></a></li>
                        <li class="disabled">Et. ministeriali - SDS</li>
                    </ul>
                </nav>
            </div>
        </div>

        @include('layout.menu-pulsanti-prodotto')

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error"></div>
            </div>
        </div>

        @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
          <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div class="row operazioni-pagina">
                    <div class="medium-12 large-12 columns">
                        <div class="contenitore-tab-stato-codice-prodotto contenitore-tab-stato-codice-prodotto-duplica">
                            <ul class="tabs" data-tabs id="stato-codice-prodotto-tabs">
                                {{--<li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Nuova Etichetta Ministeriale</a></li>--}}
                                <li class="tabs-title is-active"><a href="#panel2">Nuova Scheda di Sicurezza</a></li>
                            </ul>
                            <div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs">
                                {{--<div class="tabs-panel is-active" id="panel1">
                                    <div class="form-carica-documenti">
                                        <form class="upload_doc_min" method="post">
                                            <div class="row">
                                                <div class="large-3 columns">
                                                    <label>Scegli file</label>
                                                </div>
                                                <div class="large-3 columns end">
                                                    <label for="custom-file-upload" class="filupp"><span class="filupp-file-name js-value"></span><input type="file" name="attachment-file" value="1" id="custom-file-upload"/></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-6 columns end"><input type="submit" name="CARICA" value="CARICA"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>--}}
                                <div class="tabs-panel is-active" id="panel2">
                                    <div class="form-carica-documenti">
                                        <form class="upload_doc_sds" method="post">
                                            <div class="row">
                                                <div class="large-3 columns">
                                                    <label>Scegli file</label>
                                                </div>
                                                <div class="large-3 columns end">
                                                    <label for="custom-file-upload" class="filupp"><span class="filupp-file-name js-value"></span><input type="file" name="attachment-file" value="1" id="custom-file-upload"/></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-6 columns end"><input type="submit" name="CARICA" value="CARICA"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        error: function (request, status, errorThrown){}
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

    /*$('.upload_doc_min').on('submit', function (e){
        e.preventDefault();

        var data = new FormData();
        var files = $("#custom-file-upload").get(0).files;

        myObj = { "CreatedBy": utente , "FileType": {"ID": 2} };
        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ data.append("UploadedImage", files[0]); }

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Upload/UploadFile",
            contentType: false,
            processData: false,
            data: data,
            success: function (result) {
                if(result.returnCode == '-1'){
                    $("#error").html('Impossibile caricare il file');
                }else{
                    $('.upload_doc_min').trigger('reset');
                    $('.upload_doc_min span.filupp-file-name').html('');
                    $('.upload_doc_sds').trigger('reset');
                    $('.upload_doc_sds span.filupp-file-name').html('');

                    var post_data = '{ "id" : ' + idprodotto + ', "etichettaCLP" : { "id": ' + result.data + ' } , "lastmodifiedby" : "' + utente + '" }';

                    $.ajax({
                        type: "POST",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Products/Update",
                        dataType: "json",
                        data: JSON.parse(post_data),
                        success: function (result){ $("#error").html('Etichetta ministeriale correttamente caricata'); },
                        error: function (request, status, errorThrown){ $("#error").html('Impossibile caricare il file'); }
                    });
                }
            },
            error: function (request, status, errorThrown){}
        });
    });*/

    $('.upload_doc_sds').on('submit', function (e) {
        e.preventDefault();

        var data = new FormData();
        var files = $("#custom-file-upload").get(0).files;

        myObj = { "CreatedBy": utente , "FileType": {"ID": 6}, "ProductId": idprodotto };
        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if(files.length > 0){ data.append("UploadedImage", files[0]); }

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Upload/UploadFileSDSToProduct",
            contentType: false,
            processData: false,
            data: data,
            success: function (result) {
                if(result.returnCode == '-1'){
                    $("#error").html('Impossibile caricare il file');
                }else{
                    //$('.upload_doc_min').trigger('reset');
                    //$('.upload_doc_min span.filupp-file-name').html('');
                    $('.upload_doc_sds').trigger('reset');
                    $('.upload_doc_sds span.filupp-file-name').html('');
                    var idFile= result.data;
                    var post_data = '{ "id" : ' + idprodotto + ', "schedaCLP" : { "id": ' + result.data + ' } , "lastmodifiedby" : "' + utente + '" }';

                    $.ajax({
                        type: "POST",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Products/Update",
                        dataType: "json",
                        data: JSON.parse(post_data),
                        success: function (result) {
                            $("#error").html('Scheda di sicurezza correttamente caricata');
                        },
                        error: function (request, status, errorThrown) {
                            $("#error").html('Impossibile caricare il file');
                        }
                    });
                }
            },
            error: function (request, status, errorThrown){ }
        });
    });
</script>
@stop
