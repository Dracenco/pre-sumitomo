<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
</script>
@extends('layout.header')
@section('title', 'Nuovo codice')
@section('content')
@include('layout.menu')
<section id="content-elenco-codici" data-equalizer-watch>
    <div class="row large-12 prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                    <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                    <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="nome-prodotto"></a></li>
                    <li class="disabled">Nuovo codice</li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="expanded row">
        <div class="medium-12 large-12 columns">
        <div id="logo-prodotto"></div>
            <div id="pulsanti-prodotto">
                <div class="button-group" id="menu-pulsanti-prodotto">
                    <a href='{{ url("codici-prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">CODICI</a>
                    <a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">SCHEDA PRODOTTO</a>
                </div>
            </div>
        </div>
    </div>

    <div class="expanded row">
        <div class="medium-12 large-12 columns"><div id="error"></div></div>
    </div>
    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
    <div class="row">
        <div class="medium-12 large-12 columns">
            <div class="scheda-nuovo-prodotto">
                <form class="crea-codice">
                    <div class="row">
                        <div class="large-4 columns">
                            <label>Linea distributiva<sup>*</sup><select name="linea_distributiva" id="linea_distributiva"></select></label>
                        </div>
                        <div class="large-4 columns">
                            <label>Famiglia<sup>*</sup><select name="famiglia" id="famiglia"></select></label>
                        </div>
                        <div class="large-4 columns">
                            <label>Sotto famiglia<sup>*</sup><select name="sottofamiglia" id="sottofamiglia"></select></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-4 columns">
                            <label>Imballo primario<sup>*</sup>
                                <select name="imballo_primario" id="imballo_primario"><option value="">Scegli</option></select>
                            </label>
                        </div>
                        <div class="large-4 columns">
                            <label>Unit&agrave; di misura<sup>*</sup><select name="unita_misura" id="unita_misura"><option value="">Scegli</option></select></label>
                        </div>
                        <div class="large-4 columns">
                            <label>Imballo secondario<sup>*</sup><select name="imballo_secondario" id="imballo_secondario"><option value="">Scegli</option></select></label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="large-2 columns">
                            <label>SAP Codice Prodotto<sup>*</sup><input type="text" name="sap_product_code" id="sap_product_code"></label>
                        </div>
                        <div class="large-2 columns end">
                            <label>Versionamento<sup>*</sup><input type="text" name="versionamento" id="versionamento" readonly value="01"></label>
                        </div>
                    </div>
                    <div class="row">
                        <?php /*<div class="large-10 columns text-right">
                            <div id="contenitore_preview_code">
                                <span id="codice_in_creazione">Codice in creazione:&nbsp;</span>
                                <div id="preview_code">
                                    <span id="new_linea_distributiva"></span>
                                    <span id="new_famiglia"></span>
                                    <span id="new_sottofamiglia"></span>
                                    <span><?php echo $prodotto ?></span>
                                    <span id="new_imballo_primario"></span>
                                    <span id="new_imballo_secondario"></span>
                                    <span id="new_versionamento">V0</span>
                                </div>
                            </div>
                        </div>*/ ?>
                        <div class="large-12 columns text-right">
                            <input type="submit" name="CREA" value="CREA" class="float-right">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="data"></div>
    @endif

    <div class="expanded row">
        <div class="medium-12 large-12 columns">
            <div class="row collapse" style="border:0;">
                <div class="medium-12 large-12 columns">
                    <table id="riepilogo-codici">
                        <thead>
                            <tr>
                                <th width="45"></th>
                                <th width="250">CODICE SAP</th>
                                <th width="250">STATO</th>
                                <th width="250">DATA ULTIMA MODIFICA</th>
                                <th width="150">CONFEZIONE</th>
                                <th width="150">PALLET</th>
                                <th width="5"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
    $.ajax({
        type: "GET",
        beforeSend: function (request){
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function(result){
            $.each(result.data, function(index, value){
                var categoria_attiva='';
                url_prodotto= "{{ url('prodotti') }}/" + value.id;

                if(cat == value.id){ categoria_attiva='class="categoria-attiva"';
                }else{ categoria_attiva=''; }
                $("ul.menu").append('<li> <a href="{!! url("prodotti") !!}' + '/' + value.id + '" ' + categoria_attiva + ' >' + value.name + '</a></li>');
            });
        },
        error: function (request, status, errorThrown){}
    });

    var categoria_id='';
    var subCategoria_id='';
    var company_id='';

    $.ajax({
        type: "GET",
        beforeSend: function (request){
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        async:false,
        success: function (result){
            categoria_id=result.data.categoria.id;
            subCategoria_id=result.data.subCategoria.id;
            company_id=result.data.company.id;

            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' /> <br />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $("a#nome-prodotto").append(result.data.name);
            $("#codice_identificativo").val(prodotto);
        },
        error: function (request, status, errorThrown){}
    });

    var codici='';
    var count=1;

    $.ajax({
        type: "GET",
        beforeSend: function (request){
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  prodotto,
        success: function (result) {
            $.each(result.data.codiciProdotto, function(index, value){

                if(value.unitOfMeasure.name == null){ var unitaMisura = '';
                }else{ var unitaMisura = value.unitOfMeasure.name; }

                if(value.packingMultiply.name == null){ var valuePackingMultiply = ' ';
                }else{ var valuePackingMultiply = value.packingMultiply.name + ' x '; }

                if(value.pallet == null){ var pallet = ' ';
                }else{ var pallet = value.pallet; }

                var packingDescription = value.packing.description;
                packingDescription = packingDescription.split('=');
                packingDescription = packingDescription[1].replace("L/KG", "");
                packingDescription = packingDescription.replace("KG\L", "");

                //var link = "{{ url('duplica-codice') }}" + "/" + categoria_id + "/" +prodotto + "/" + value.id;
                var link = "{{ url('duplica-codice') }}" + "/" + categoria_id + "/" + prodotto + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");

                if(formatoData(value.versionLastModifiedDate) == '01-01-0001'){ var versionLastModifiedDate = '';
                }else{ var versionLastModifiedDate = formatoData(value.versionLastModifiedDate); }

                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                  codici= codici + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>'+value.sapProductCode+'</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td><td></td></tr>';
                @else
                  codici= codici + '<tr><td><div class="elimina-codice"></div></td><td>'+value.sapProductCode+'</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td><td></td><td></td></tr>';
                @endif

                count++;
            });
            $('#riepilogo-codici tbody').append(codici).foundation();
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('click', '.cancella-codice', function(e) {
        e.preventDefault();
        var formData = $(this).find('input').attr('name','id').val();
        var url = window.location.href;

        post_data={ 'id' : formData };

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/DeleteCode",
            data: post_data,
            success: function(data){
                $(".dropdown-pane.is-open").css('visibility', 'hidden');
                url += '?ok';
                window.location.href = url;
            },
            failure: function(errMsg) {
                $(".dropdown-pane.is-open").css('visibility', 'hidden');
                url += '?no';
                window.location.href = url;
            }
        });
    });

    var linea = '<option value="">Scegli</option>';
    var famiglia = '<option value="">Scegli</option>';
    var sottofamiglia = '<option value="">Scegli</option>';
    var imballo_primario = '';
    var imballo_secondario = '';
    var pallet = '';
    var unita_misura = '';
    var select_string = '';
    //var new_linea_distributiva = '';
    //var new_famiglia = '';
    //var new_sottofamiglia = '';
    //var new_imballo_primario = '';
    //var new_imballo_secondario = '';
    //var new_unita_misura = '';
    //var new_versionamento = '';

    //$("#new_imballo_primario").html('-');
    //$("#new_imballo_secondario").html('-');

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCompany",
        async:false,
        success: function (result) {
            $.each(result.data, function(index, value){
                select_string = '';
                if(value.id == company_id){
                    select_string = 'selected="selected"';
                    // $("#new_linea_distributiva").append(value.sigla);
                }
                linea = linea + '<option value="' + value.id + '" ' + select_string + '>' + value.sigla + ' - ' + value.name + '</option>';
            });
            $("#linea_distributiva").append(linea);
        },
        error: function (request, status, errorThrown) {}
    });

    /*$('select#linea_distributiva').on('change', function() {
        $("#new_linea_distributiva").html('');
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetCompany?id=" + this.value,
            async:false,
            success: function (result){ $("#new_linea_distributiva").html(result.data.sigla); },
            error: function (request, status, errorThrown) {}
        });
    });*/

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        async:false,
        success: function (result) {
            $.each(result.data, function(index, value){
                select_string = '';
                if(value.id == categoria_id){
                    select_string = 'selected="selected"';
                    //$("#new_famiglia").html(value.symbol);
                }
                famiglia = famiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.symbol + ' - ' + value.name + '</option>'
            });
            $("#famiglia").append(famiglia);
        },
        error: function (request, status, errorThrown) {}
    });

    /*$('select#famiglia').on('change', function() {
        $("#new_famiglia").html('');
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetCategory?id=" + this.value,
            async:false,
            success: function (result){ $("#new_famiglia").html(result.data.symbol); },
            error: function (request, status, errorThrown) {}
        });
    });*/

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetSubCategoryForCategory?categoryid=" + categoria_id,
        async:false,
        success: function (result) {
            $.each(result.data, function(index, value){
                select_string = '';
                if(value.id == subCategoria_id){
                    select_string = 'selected="selected"';
                    //$("#new_sottofamiglia").html(value.symbol);
                }
                sottofamiglia = sottofamiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.symbol + ' - ' + value.name + '</option>'
            });
            $("#sottofamiglia").append(sottofamiglia);
        },
        error: function (request, status, errorThrown) {}
    });

    $('select#famiglia').on('change', function() {
        var categoryid = this.value;
        //$("#new_sottofamiglia").html('');
        $("#sottofamiglia").html('');
        sottofamiglia = '<option value="">Scegli</option>';
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetSubCategoryForCategory?categoryid=" + categoryid,
            async:false,
            success: function (result) {
                $.each(result.data, function(index, value){
                    select_string = '';
                    if(value.id == subCategoria_id){ select_string = 'selected="selected"'; }
                    //$("#new_sottofamiglia").html('-');
                    sottofamiglia = sottofamiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.symbol + ' - ' + value.name + '</option>'
                });
                $("#sottofamiglia").append(sottofamiglia);
            },
            error: function (request, status, errorThrown) {}
        });
    });

    /*$('select#sottofamiglia').on('change', function() {
        $("#new_sottofamiglia").html('');
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetSubCategory?id=" + this.value,
            async:false,
            success: function (result){ $("#new_sottofamiglia").html(result.data.symbol); },
            error: function (request, status, errorThrown){}
        });
    });*/

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=packing&all=false",
        async:false,
        success: function (result) {
            $.each(result.data, function(index, value){
                var description = value.description;
                description = description.split('=');
                imballo_primario = imballo_primario + '<option value="' + value.value + '">' + value.name + ' - ' + description[1] + '</option>'
            });
            $("#imballo_primario").append(imballo_primario);
        },
        error: function (request, status, errorThrown){}
    });

    $('select#imballo_primario').on('change', function() {
        //$("#new_imballo_primario").html('');
        var text = $("select#imballo_primario option:selected" ).text();
        text = text.split(' - ');
        if(text[0]=='Scegli'){ text[0] = '-' }
        if(text=='Scegli'){ text = '-' }
        //$("#new_imballo_primario").html(text[0]);
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=packing_multiply&all=false",
        async:false,
        success: function (result) {
            $.each(result.data, function(index, value){
                select_string = '';
                var description = value.description;
                description = description.split('=');
                imballo_secondario = imballo_secondario + '<option value="' + value.value + '">' + value.name + ' - ' + description[1] + '</option>'
            });
            $("#imballo_secondario").append(imballo_secondario);
        },
        error: function (request, status, errorThrown){}
    });

    $('select#imballo_secondario').on('change', function() {
        //$("#new_imballo_secondario").html('');
        var text = $("select#imballo_secondario option:selected" ).text();
        text = text.split(' - ');
        if(text[0]=='Scegli'){ text[0] = '-' }
        //$("#new_imballo_secondario").html(text[0]);
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=unit_of_measure&all=false",
        success: function (result) {
            $.each(result.data, function(index, value){
                select_string = '';
                unita_misura = unita_misura + '<option value="' + value.value + '">' + value.name + '</option>'
            });
            $("#unita_misura").append(unita_misura);
        },
        error: function (request, status, errorThrown){}
    });

    $('select#versionamento').on('change', function() {
        //$("#new_versionamento").html('');
        //$("#new_versionamento").html($('select#versionamento').val() );
    });

    $("form.crea-codice").submit(function(e) {
        e.preventDefault();

        var esenzione=false;
        var prezzo = 0;
        var linea_distributiva = $('#linea_distributiva').val();
        var famiglia = $('#famiglia').val();
        var sottofamiglia = $('#sottofamiglia').val();
        var imballo_primario = $('#imballo_primario').val();
        var imballo_secondario = $('#imballo_secondario').val();
        var unita_misura = $('#unita_misura').val();
        var versionamento = $('#versionamento').val();
        var sap_product_code = $('#sap_product_code').val();

        if(imballo_primario==''){ $("#imballo_primario").parent().css("color","red");
        }else{ $("#imballo_primario").parent().removeAttr("style"); }

        if(imballo_secondario==''){ $("#imballo_secondario").parent().css("color","red");
        }else{ $("#imballo_secondario").parent().removeAttr("style"); }

        if(unita_misura==''){ $("#unita_misura").parent().css("color","red");
        }else{ $("#unita_misura").parent().removeAttr("style"); }

        if(sap_product_code==''){ $("#sap_product_code").parent().css("color","red");
        }else{ $("#sap_product_code").parent().removeAttr("style"); }

        post_data='{ "company" : { "id" : ' + linea_distributiva + '}, "category" : { "id" : ' + famiglia + ' }, "subcategory" : { "id" : ' + sottofamiglia + ' }, "product" : { "code" : "' + prodotto + '" } , "packing" : { "id" : "' + imballo_primario + '" } , "packingmultiply" : { "id" : "' + imballo_secondario + '" } , "unitofmeasure" : { "id" : "' + unita_misura +  '" } , "CreatedBy" :  "' + utente + '" , "BarcodeImballoPrimario": "", "BarcodeImballoSecondario" : "", "Versione" : "' + versionamento + '", "SapProductCode" : "'+sap_product_code+'" }';
        
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/CreateCode",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $("#error").html('Impossibile creare un nuovo codice');
                }else{
                    $("#error").html('Codice prodotto correttamente creato');
                    $('#riepilogo-codici tbody').html('').foundation();

                    var codici='';
                    var count=1;

                    $.ajax({
                        type: "GET",
                        beforeSend: function (request){
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  prodotto,
                        success: function (result) {
                            $.each(result.data.codiciProdotto, function(index, value){
                                //var link = "{{ url('duplica-codice') }}" + "/" + categoria_id + "/" +prodotto + "/" + value.id;
                                var link = "{{ url('duplica-codice') }}" + "/" + categoria_id + "/" + prodotto + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");

                                if(value.unitOfMeasure.name == null){ var unitaMisura = '';
                                }else{ var unitaMisura = value.unitOfMeasure.name; }

                                if(value.packingMultiply.name == null){ var valuePackingMultiply = ' ';
                                }else{ var valuePackingMultiply = value.packingMultiply.name + ' x '; }

                                if(value.pallet == null){ var pallet = ' ';
                                }else{ var pallet = value.pallet; }

                                var packingDescription = value.packing.description;
                                packingDescription = packingDescription.split('=');
                                packingDescription = packingDescription[1].replace("L/KG", "");
                                packingDescription = packingDescription.replace("KG\L", "");
                                packingDescription = packingDescription.replace("KG\\L", "");

                                if(formatoData(value.versionLastModifiedDate) == '01-01-0001'){ var versionLastModifiedDate = '';
                                }else{ var versionLastModifiedDate = formatoData(value.versionLastModifiedDate); }

                                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                                  codici= codici + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td><td></td></tr>';
                                @else
                                  codici= codici + '<tr><td><div class="elimina-codice"></div></td><td>'+value.sapProductCode+'</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td><td></td><td></td></tr>';
                                @endif

                                count++;
                            });
                            $('#riepilogo-codici tbody').append(codici).foundation();
                        },
                        error: function (request, status, errorThrown){}
                    });
                }
            },
             error: function (request, status, errorThrown){}
        });
    });

    //$('select#imballo_primario').on('change', function(){ new_imballo_primario = this.value; });
    //$('select#imballo_secondario').on('change', function(){ new_imballo_secondario = this.value; });
</script>
@stop
