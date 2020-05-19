<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php echo isset($cat) ? $cat : ''; ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto = "<?php echo isset($prodotto) ? $prodotto : ''; ?>";
    var id_codice = "<?php echo isset($idcodice) ? $idcodice : ''; ?>";
    var sap_code = "<?php echo isset($sap_code) ? $sap_code : ''; ?>";
    var version = "<?php echo isset($version) ? $version : ''; ?>";
</script>

@extends('layout.header')
@section('title', 'Duplica codice prodotto')
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
                        <li class="disabled">Duplica codice prodotto</li>
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
            <div class="medium-12 large-12 columns">
                <div id="error">
                <?php
                  if(isset($_GET['ok']))
                      echo "Operazione eseguita";
                  elseif(isset($_GET['no']))
                      echo "Impossibile eseguire l'operazione";
                ?>
                </div>
            </div>
        </div>
        @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
         <div class="expanded row" class="operazioni-pagina">
             <div class="medium-12 large-12 columns">
                <div class="row collapse" style="border:0;">
                    <div class="medium-12 large-12 columns">
                        <table id="elenco-codici">
                            <thead>
                                <tr>
                                    <th width="250">CODICE ORIGINARIO</th>
                                    <th width="250">STATO ORIGINARIO</th>
                                    <th width="250">DATA ULTIMA MODIFICA</th>
                                    <th width="150">CONFEZIONE</th>
                                    <th width="150">PALLET</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>

         <div class="row operazioni-pagina">
             <div class="medium-12 large-12 columns">
                 <div class="contenitore-tab-stato-codice-prodotto contenitore-tab-stato-codice-prodotto-duplica">
                     <ul class="tabs" data-tabs id="stato-codice-prodotto-tabs">
                         <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Nuovo versionamento</a></li>
                         <li class="tabs-title"><a href="#panel2">Crea nuovo codice</a></li>
                     </ul>
                     <div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs">
                         <div class="tabs-panel is-active" id="panel1"></div>
                         <div class="tabs-panel" id="panel2">
                            <div class="row">
                                <div class="medium-12 large-12 columns">
                                    <div class="scheda-nuovo-prodotto">
                                        <form class="crea-codice-da-duplica">
                                                <div class="row">
                                                    <div class="large-4 columns">
                                                        <label>Linea distributiva<sup>*</sup>
                                                            <select name="linea_distributiva" id="linea_distributiva"></select>
                                                        </label>
                                                    </div>
                                                    <div class="large-4 columns">
                                                        <label>Famiglia<sup>*</sup>
                                                            <select name="famiglia" id="famiglia"></select>
                                                        </label>
                                                    </div>
                                                    <div class="large-4 columns">
                                                        <label>Sotto famiglia<sup>*</sup>
                                                            <select name="sottofamiglia" id="sottofamiglia"></select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-4 columns">
                                                        <label>Codice identificativo
                                                            <input type="text" name="codice_identificativo" id="codice_identificativo" disabled>
                                                        </label>
                                                    </div>
                                                    <div class="large-2 columns">
                                                        <label>Imballo primario<sup>*</sup>
                                                            <select name="imballo_primario" id="imballo_primario">
                                                                <option value="">Scegli</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="large-2 columns">
                                                        <label>Unit&agrave; di misura<sup>*</sup>
                                                            <select name="unita_misura" id="unita_misura">
                                                                <option value="">Scegli</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="large-2 columns">
                                                        <label>Imballo secondario<sup>*</sup>
                                                            <select name="imballo_secondario" id="imballo_secondario">
                                                                <option value="">Scegli</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="large-2 columns">
                                                        <label>Versionamento<sup>*</sup>
                                                            <select name="versionamento" id="versionamento">
                                                                <option value="V0">V0</option>
                                                                <option value="V1">V1</option>
                                                                <option value="V2">V2</option>
                                                                <option value="V3">V3</option>
                                                                <option value="V4">V4</option>
                                                                <option value="V5">V5</option>
                                                                <option value="V6">V6</option>
                                                                <option value="V7">V7</option>
                                                                <option value="V8">V8</option>
                                                                <option value="V9">V9</option>
                                                                <option value="V10">V10</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-2 columns">
                                                        <label>SAP Codice Prodotto<sup>*</sup><input type="text" name="sap_product_code" id="sap_product_code"></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-10 columns text-right">
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
                                                    </div>
                                                    <div class="large-2 columns">
                                                        <input type="submit" name="CREA" value="CREA" class="float-right">
                                                    </div>
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

        <section id="content-elenco-codici" style="width:100%;margin-top: 20px">
         <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="row collapse" style="border:0;">
                    <div class="medium-12 large-12 columns">
                        <table id="elenco-codici-aggiornato">
                            <thead>
                                <tr>
                                    <th width="45"></th>
                                    <th width="250">CODICE PRODOTTO</th>
                                    <th width="250">STATO</th>
                                    <th width="250">DATA ULTIMA MODIFICA</th>
                                    <th width="150">CONFEZIONE</th>
                                    <th width="150">PALLET</th>
                                    <th width="90">DUPLICA</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>
        </section>
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

    var categoria_id='';
    var subCategoria_id='';
    var company_id='';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        async:false,
        success: function (result){
            categoria_id=result.data.categoria.id;
            subCategoria_id=result.data.subCategoria.id;
            company_id=result.data.company.id;
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
    var statusName='';
    var companyid='';
    var ccode='';
    var statuscode='';

     $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  prodotto,
        async:false,
        success: function (result) {
            $.each(result.data.codiciProdotto, function(index, value){

                if(value.id == id_codice){
                    companyid = value.company.id;
                    ccode = value.code;
                    statuscode = value.statusName;

                    if(value.unitOfMeasure.name == null){
                        var unitaMisura = '';
                    }else{
                        var unitaMisura = value.unitOfMeasure.name;
                    }

                    if(value.packingMultiply.name == null){
                        var valuePackingMultiply = ' ';
                    }else{
                        var valuePackingMultiply = value.packingMultiply.name + ' x ';
                    }

                    if(value.pallet == null){
                        var pallet = ' ';
                    }else{
                        var pallet = value.pallet;
                    }

                    var packingDescription = value.packing.description;
                    packingDescription = packingDescription.split('=');

                    packingDescription = packingDescription[1].replace("L/KG", "");
                    packingDescription = packingDescription.replace("KG\L", "");
                    packingDescription = packingDescription.replace("KG\\L", "");

                    if(formatoData(value.versionLastModifiedDate) == '01-01-0001'){
                        var versionLastModifiedDate = '';
                    }else{
                        var versionLastModifiedDate = formatoData(value.versionLastModifiedDate);
                    }

                    codici= '<tr><td>' + value.code + '</td><td>' + statuscode + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td>';
               }

            });
            $('#elenco-codici tbody').append(codici).foundation();

            var codici='';
            var count=1;
            var statusName='';
            var duplica='';
            var url_duplica='';

             $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  prodotto,
                success: function (result) {
                    $.each(result.data.codiciProdotto, function(index, value){

                        select_stato='';
                        //url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + id_codice + "/" + value.id;
                        url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + id_codice + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");
                        duplica='<a href="{!! url("' + url_duplica + '") !!}" class="duplica">Duplica</a>';

                        if(value.unitOfMeasure.name == null){
                            var unitaMisura = '';
                        }else{
                            var unitaMisura = value.unitOfMeasure.name;
                        }

                        if(value.packingMultiply.name == null){
                            var valuePackingMultiply = ' ';
                        }else{
                            var valuePackingMultiply = value.packingMultiply.name + ' x ';
                        }

                        if(value.pallet == null){
                            var pallet = ' ';
                        }else{
                            var pallet = value.pallet;
                        }

                        var packingDescription = value.packing.description;
                        packingDescription = packingDescription.split('=');

                        packingDescription = packingDescription[1].replace("L/KG", "");
                        packingDescription = packingDescription.replace("KG\L", "");

                        if(formatoData(value.versionLastModifiedDate) == '01-01-0001'){
                            var versionLastModifiedDate = '';
                        }else{
                            var versionLastModifiedDate = formatoData(value.versionLastModifiedDate);
                        }

                        codici= codici + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('public/img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.code + '</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td><td>' + duplica + '</td></tr> ';
                        count++;
                    });
                    $('#elenco-codici-aggiornato tbody').append(codici).foundation();
                },
                error: function (request, status, errorThrown){}
            });
        },
        error: function (request, status, errorThrown){}
    });

    var tab ='';
    var oldcode='';
    var newcode='';
    var versione ='';
    var num_versione='';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodiceDetail?lcode=" +  ccode + "&companyId=" +  companyid + (version != undefined && version.length > 0 ? "&version=" + version : ""),
        success: function (results) {

            oldcode = results.data.productStato.productCode;
            newcode = results.data.productStato.productCode;

            versione = oldcode.substr(oldcode.length - 2);

            if(versione.charAt(0) == 'V'){
                num_versione = versione.charAt(1);
                num_versione = Number(num_versione) + 1;
                newcode = oldcode.substr(0 ,oldcode.length - 2) + 'V' + num_versione;
            }else{
                newcode = oldcode + 'V1';
            }

            select_stato='';

            tab='<div class="contenitore-info"><div class="row collapse"><div class="medium-12 large-6 columns"><span>Codice Prodotto Originario:&nbsp;</span>' + oldcode + '</div><div class="medium-12 large-6 columns"><span>Stato:&nbsp;</span>' + statuscode + '</div></div><div class="row collapse"><div class="medium-12 large-6 columns end"><span>Nuovo codice creato:&nbsp;</span><span class="newcodecolor">' + newcode + '</span></div></div><div class="row collapse"><div class="medium-12 large-6 columns end"><span>Nuovo stato codice di origine</span></div></div><div class="row collapse"><div class="medium-12 large-6 columns end">';

            tab= tab + '<form class="duplica_codice_prodotto"><div class="small-2 columns"><label class="text-left">Stato</label></div><div class="small-7 columns">';
            tab= tab + '<select name="status" id="status"><option value="">Scegli</option>';

            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=status&all=false",
                async:false,
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';

                        if(statuscode == value.name){ select_string = 'selected="selected"'; }
                            select_stato= select_stato + '<option value="' + value.value + '" ' + select_string + '>' + value.name + '</option>';
                        });
                    },
                error: function (request, status, errorThrown){}
            });

            tab= tab +  select_stato +'</select></div><div class="small-3 columns"><input type="hidden" id="idcodice" value="' + id_codice + '"><input type="hidden" id="newcode" value="' + newcode + '"><input type="hidden" id="sap_prod_code" value="'+sap_code+'"><input type="submit" name="CREA" value="CREA" id="crea-codice"></div></form>';

            tab = tab + '</div></div></div>';

            $('#panel1').append(tab).foundation();
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('click', '#crea-codice', function(event) {
        event.preventDefault();

        var IDCodiceDiPartenza = $('#idcodice').val();
        var IDStatoDaApplicareACodiceDiPartenza = $('#status').val();
        var Code = $('#newcode').val();
        var sap_prod_code = $('#sap_prod_code').val();

        post_data='{ "IDCodiceDiPartenza" : "' + IDCodiceDiPartenza + '", "IDStatoDaApplicareACodiceDiPartenza": "' + IDStatoDaApplicareACodiceDiPartenza + '", "Code" : "' + Code + '", "CreatedBy" :  "' + utente + '", "SapProductCode" : "'+sap_prod_code+'" }';

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/CreateCodeFromCode",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $("#error").html('Impossibile creare un nuovo codice: ' + data.errors);
                }else{
                    $("#error").html('Codice prodotto correttamente creato');
                    $('.operazioni-pagina').html('').foundation();
                    $('#elenco-codici-aggiornato tbody').html('').foundation();

                    var codici='';
                    var count=1;
                    var statusName='';
                    var duplica='';
                    var url_duplica='';

                     $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  prodotto,
                        success: function (result) {
                            $.each(result.data.codiciProdotto, function(index, value){

                                select_stato='';
                                //url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + id_codice + "/" + value.id;
                                url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + id_codice + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");
                                duplica='<a href="{!! url("' + url_duplica + '") !!}" class="duplica">Duplica</a>';

                                if(value.unitOfMeasure.name == null){
                                    var unitaMisura = '';
                                }else{
                                    var unitaMisura = value.unitOfMeasure.name;
                                }

                                if(value.packingMultiply.name == null){
                                    var valuePackingMultiply = ' ';
                                }else{
                                    var valuePackingMultiply = value.packingMultiply.name + ' x ' ;
                                }

                                if(value.pallet == null){
                                    var pallet = ' ';
                                }else{
                                    var pallet = value.pallet;
                                }

                                var packingDescription = value.packing.description;
                                packingDescription = packingDescription.split('=');

                                packingDescription = packingDescription[1].replace("L/KG", "");
                                packingDescription = packingDescription.replace("KG\L", "");
                                packingDescription = packingDescription.replace("KG\\L", "");

                                if(formatoData(value.versionLastModifiedDate) == '01-01-0001'){
                                    var versionLastModifiedDate = '';
                                }else{
                                    var versionLastModifiedDate = formatoData(value.versionLastModifiedDate);
                                }

                                codici= codici + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('public/img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.code + '</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td><td>' + duplica + '</td></tr> ';

                                count++;
                            });
                            $('#elenco-codici-aggiornato tbody').append(codici).foundation();
                        },
                        error: function (request, status, errorThrown){}
                    });
                }
            },
             error: function (request, status, errorThrown) {}
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

    var new_linea_distributiva = '';
    var new_famiglia = '';
    var new_sottofamiglia = '';
    var new_imballo_primario = '';
    var new_imballo_secondario = '';
    var new_unita_misura = '';
    var new_versionamento = '';

    $("#new_imballo_primario").html('-');
    $("#new_imballo_secondario").html('-');

    $('select#versionamento').on('change', function() {
        $("#new_versionamento").html('');
        $("#new_versionamento").html($('select#versionamento').val() );
    });

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
                    $("#new_linea_distributiva").append(value.sigla);
                }
                linea = linea + '<option value="' + value.id + '" ' + select_string + '>' + value.sigla + ' - ' + value.name + '</option>';
            });
            $("#linea_distributiva").append(linea);
        },
        error: function (request, status, errorThrown) {}
    });

    $('select#linea_distributiva').on('change', function() {
        $("#new_linea_distributiva").html('');
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetCompany?id=" + this.value,
            async:false,
            success: function (result) {
                 $("#new_linea_distributiva").html(result.data.sigla);
            },
            error: function (request, status, errorThrown) {}
        });
    });

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
                    $("#new_famiglia").html(value.symbol);
                }
                famiglia = famiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.symbol + ' - ' + value.name + '</option>'
            });
            $("#famiglia").append(famiglia);
        },
        error: function (request, status, errorThrown) {}
    });

    $('select#famiglia').on('change', function() {
        $("#new_famiglia").html('');
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetCategory?id=" + this.value,
            async:false,
            success: function (result) {
                 $("#new_famiglia").html(result.data.symbol);
            },
            error: function (request, status, errorThrown) {}
        });
    });

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
                    $("#new_sottofamiglia").html(value.symbol);
                }
                sottofamiglia = sottofamiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.symbol + ' - ' + value.name + '</option>'
            });
            $("#sottofamiglia").append(sottofamiglia);
        },
        error: function (request, status, errorThrown) {}
    });

    $('select#famiglia').on('change', function() {
        var categoryid = this.value;
        $("#new_sottofamiglia").html('');
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
                    if(value.id == subCategoria_id){
                        select_string = 'selected="selected"';
                    }
                    $("#new_sottofamiglia").html('-');
                    sottofamiglia = sottofamiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.symbol + ' - ' + value.name + '</option>'
                });
                $("#sottofamiglia").append(sottofamiglia);
            },
            error: function (request, status, errorThrown) {}
        });
    });

    $('select#sottofamiglia').on('change', function() {
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
            error: function (request, status, errorThrown) {}
        });
    });

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
        error: function (request, status, errorThrown) {}
    });

    $('select#imballo_primario').on('change', function() {
        $("#new_imballo_primario").html('');
        var text = $("select#imballo_primario option:selected" ).text();
        text = text.split(' - ');
        if(text[0]=='Scegli'){ text[0] = '-' }
        if(text=='Scegli'){ text = '-' }
        $("#new_imballo_primario").html(text[0]);
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
        error: function (request, status, errorThrown) {}
    });

    $('select#imballo_secondario').on('change', function() {
        $("#new_imballo_secondario").html('');
        var text = $("select#imballo_secondario option:selected" ).text();
        text = text.split(' - ');
        if(text[0]=='Scegli'){ text[0] = '-' }
        $("#new_imballo_secondario").html(text[0]);
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
        error: function (request, status, errorThrown) {}
    });

    $("form.crea-codice-da-duplica").submit(function(e) {
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

        if(imballo_primario==''){
            $("#imballo_primario").parent().css("color","red");
        }else{
            $("#imballo_primario").parent().removeAttr("style");
        }

        if(imballo_secondario==''){
            $("#imballo_secondario").parent().css("color","red");
        }else{
            $("#imballo_secondario").parent().removeAttr("style");
        }

        if(unita_misura==''){
            $("#unita_misura").parent().css("color","red");
        }else{
            $("#unita_misura").parent().removeAttr("style");
        }

        if(sap_product_code==''){
            $("#sap_product_code").parent().css("color","red");
        }else{
            $("#sap_product_code").parent().removeAttr("style");
        }

        post_data='{ "company" : { "id" : ' + linea_distributiva + '}, "category" : { "id" : ' + famiglia + ' }, "subcategory" : { "id" : ' + sottofamiglia + ' }, "product" : { "code" : ' + prodotto + ' } , "packing" : { "id" : "' + imballo_primario + '" } , "packingmultiply" : { "id" : "' + imballo_secondario + '" } , "unitofmeasure" : { "id" : "' + unita_misura +  '" } , "CreatedBy" :  "' + utente + '" , "BarcodeImballoPrimario": "", "BarcodeImballoSecondario" : "", "Versione" : "' + versionamento + '", "SapProductCode": "'+sap_product_code+'" }';

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
                    $('.operazioni-pagina').html('').foundation();
                    $('#elenco-codici-aggiornato tbody').html('').foundation();

                    var codici='';
                    var count=1;
                    var statusName='';
                    var duplica='';
                    var url_duplica='';

                     $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                        },
                        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  prodotto,
                        success: function (result) {
                            $.each(result.data.codiciProdotto, function(index, value){

                                select_stato='';
                                //url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + value.id;
                                url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");
                                duplica='<a href="{!! url("' + url_duplica + '") !!}" class="duplica">Duplica</a>';

                                if(value.unitOfMeasure.name == null){
                                    var unitaMisura = '';
                                }else{
                                    var unitaMisura = value.unitOfMeasure.name;
                                }

                                if(value.packingMultiply.name == null){
                                    var valuePackingMultiply = ' ';
                                }else{
                                    var valuePackingMultiply = value.packingMultiply.name + ' x ';
                                }

                                if(value.pallet == null){
                                    var pallet = ' ';
                                }else{
                                    var pallet = value.pallet;
                                }

                                var packingDescription = value.packing.description;
                                packingDescription = packingDescription.split('=');

                                packingDescription = packingDescription[1].replace("L/KG", "");
                                packingDescription = packingDescription.replace("KG\L", "");
                                packingDescription = packingDescription.replace("KG\\L", "");

                                codici= codici + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('public/img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.code + '</td><td>' + value.statusName + '</td><td>' + formatoData(value.versionLastModifiedDate) + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td><td>' + duplica + '</td></tr> ';

                                count++;
                            });
                            $('#elenco-codici-aggiornato tbody').append(codici).foundation();
                        },
                        error: function (request, status, errorThrown){}
                    });
                }
            },
             error: function (request, status, errorThrown) {}
        });
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
                url += '?ok';
                window.location.href = url;
            },
            failure: function(errMsg) {
                url += '?no';
                window.location.href = url;
            }
        });
    });
</script>
@stop
