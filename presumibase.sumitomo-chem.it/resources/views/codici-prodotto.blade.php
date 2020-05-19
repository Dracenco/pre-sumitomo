<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
</script>

@extends('layout.header')
@section('title', 'Codici prodotto')
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
                        <li class="disabled">Codici prodotto</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="logo-prodotto"></div>
                <div id="pulsanti-prodotto">
                    <div class="button-group" id="menu-pulsanti-prodotto">
                      @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                      <a href='{{ url("nuovo-codice/".$categoria."/".$prodotto."/".$id) }}' class="button">CREA CODICE</a>
                      @endif
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

        <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="row collapse" style="border:0;">
                    <div class="medium-12 large-12 columns">
                        <table id="elenco-codici">
                            <thead>
                                <tr>
                                    <th width="45"></th>
                                    <th width="250">CODICE SAP</th>
                                    <th width="250">VERSIONE SAP</th>
                                    <th width="250">DATA ULTIMA MODIFICA</th>
                                    <th width="150">CONFEZIONE</th>
                                    <th width="150">PALLET</th>
                                    <th width="250">AZIONE</th>
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
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result) {
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

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        success: function (result){
            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' /> <br />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $("a#nome-prodotto").append(result.data.name);
        },
        error: function (request, status, errorThrown){}
    });

    var codici='';
    var count=1;
    var statusName='';
    var select_string = '';
    var duplica='';
    var url_duplica='';
    var select_string_esenzione='';
    var unitaMisura='';
    var packingDescription='';
    var valuePackingMultiply='';
    var pallet='';

	 $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  prodotto,
        success: function (result) {
            $.each(result.data.codiciProdotto, function(index, value){
                select_string_esenzione='';
                select_stato='';
                //url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + idprodotto + "/" + value.id;
                url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + idprodotto + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");
                duplica='<a href="{!! url("' + url_duplica + '") !!}" class="duplica">Duplica</a>';

                if(value.unitOfMeasure.name == null){ unitaMisura = '';
                }else{ unitaMisura = value.unitOfMeasure.name; }

                if(value.packingMultiply.name == null){ valuePackingMultiply = ' ';
                }else{ valuePackingMultiply = value.packingMultiply.name + ' x '; }

                if(value.pallet == null){ pallet = ' ';
                }else{ pallet = value.pallet; }

                packingDescription = value.packing.description;
                packingDescription = packingDescription.split('=');
                packingDescription = packingDescription[1].replace("L/KG", "");
                packingDescription = packingDescription.replace("KG\L", "");
                packingDescription = packingDescription.replace("KG\\L", "");

                if(formatoData(value.versionLastModifiedDate) == '01-01-0001'){ var versionLastModifiedDate = '';
                }else{ var versionLastModifiedDate = formatoData(value.versionLastModifiedDate); }

                if(formatoData(value.created) == '01-01-0001'){ var created = '';
                }else{ var created = formatoData(value.created); }

                var dataScadenzaTitolare= '';
                var dataScadenzaRivenditore = '';
                var dataScadenzaUso= '';
                var NoteCodice = '';
                var NoteRegulatory = '';

                if(value.deadlineOwner!='0001-01-01T00:00:00'){
                    dataScadenzaTitolare=value.deadlineOwner;
                    dataScadenzaTitolare=dataScadenzaTitolare.substring(0,10);
                }
                if(value.deadlineSeller!='0001-01-01T00:00:00'){
                    dataScadenzaRivenditore=value.deadlineSeller;
                    dataScadenzaRivenditore=dataScadenzaRivenditore.substring(0,10);
                }
                if(value.deadlineUse!='0001-01-01T00:00:00'){
                    dataScadenzaUso=value.deadlineUse;
                    dataScadenzaUso=dataScadenzaUso.substring(0,10);
                }
                if (!(value.note === undefined || value.note === null)) {
                    NoteCodice = value.note;
                    NoteCodice = NoteCodice.replace(/<br\s?\/?>/g,"\n");
                }
                if (!(value.noteRegulatory === undefined || value.noteRegulatory === null)) {
                    NoteRegulatory = value.noteRegulatory;
                    NoteRegulatory = NoteRegulatory.replace(/<br\s?\/?>/g,"\n");
                }
                //https://sumibase.sumitomo-chem.it/nuova-versione/1/332/311/1767/undefined
                var version = value.version === undefined ? '0' : value.version;
                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                  codici= codici + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>'+value.sapProductCode+'</td><td>'+version+'</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura +'</td><td>' + pallet + '</td><td><a href="{{url("nuova-versione")}}/'+cat+'/'+prodotto+'/'+idprodotto+'/'+value.id+'/'+version+'/'+value.code+'/'+value.company.id+'">CREA VERSIONE</a></td><td><a href="#" class="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr> <tr id="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><td colspan="8" class="colonna-stato-codice-prodotto"><div class="stato-codice-prodotto"><div class="info-codice"><span>Codice creato da:&nbsp;</span>' + value.createdBy + '</div><div class="info-codice"><span>Data creazione:&nbsp;</span>' + created + '</div></div><div class="form-modifica-stato"><div class="row"><form class="cambio_stato_prodotto"><div class="row">';
                @else
                  codici= codici + '<tr><td><div class="elimina-codice"></div></td><td>'+value.sapProductCode+'</td><td>'+version+'</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura +'</td><td>' + pallet + '</td><td><a href="{{url("nuova-versione")}}/'+cat+'/'+prodotto+'/'+idprodotto+'/'+value.id+'/'+value.version+'/'+value.code+'/'+value.company.id+'">CREA VERSIONE</a></td><td></td><td><a href="#" class="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr> <tr id="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + version + '"><td colspan="8" class="colonna-stato-codice-prodotto"><div class="stato-codice-prodotto"><div class="info-codice"><span>Codice creato da:&nbsp;</span>' + value.createdBy + '</div><div class="info-codice"><span>Data creazione:&nbsp;</span>' + created + '</div></div>';
                @endif
                



                /*statusName = value.statusName;

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
                            if(statusName == value.name){ select_string = 'selected="selected"'; }

                            select_stato= select_stato + '<option value="' + value.value + '" ' + select_string + '>' + value.name + '</option>';
                        });
                    },
                    error: function (request, status, errorThrown){}
                });*/

                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')

                  codici= codici + '<div class="large-2 columns"><label class="text-left">Pallet</label></div><div class="large-3 columns end"><input type="text" name="pallet" id="pallet" value="' + pallet + '" style="margin-top:-5px;"></div></div><input type="hidden" class="idcodice" value="' + value.id + '"><input type="hidden" class="companyid" value="' + value.company.id + '"><input type="hidden" class="sap_prod_code" value="' + value.sapProductCode + '"><div class="row"><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Barcode primario</label></div><div class="large-3 columns end"><input type="text" class="barcodeprimario" id="barcodeprimario' + value.id + value.code + '"></div></div><div class="row"><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Prezzo minimo di vendita</label></div><div class="large-3 columns"><input type="text" name="prezzo" id="prezzominimodivendita' + value.id + value.code + '" class="prezzominimodivendita"></div><div class="large-2 columns end"><label class="text-left" style="margin-top:14px">Esenzione quantit&agrave; limitata</label></div><div class="large-3 columns end"><select name="esenzione" id="esenzione" class="esenzione" style="margin-top:10px"><option value="">Scegli</option>';

                  select_string_esenzione='<option value="Si">Si</option><option value="No" selected="selected">No</option>';

                  if(value.esenzioneQuantitaLimitata){ select_string_esenzione='<option value="Si" selected="selected">Si</option><option value="No">No</option>'; }

                  codici= codici + select_string_esenzione + '</select></div></div><div class="row"><div class="large-6 columns"><label>Note<textarea name="note-codice" id="note-codice">' + NoteCodice + '</textarea></label></div><div class="large-6 columns"><label>Note Regulatory <textarea name="note-regulatory" id="note-regulatory">' + NoteRegulatory + '</textarea></label></div></div><div class="row"><div class="large-12 columns" style="margin-top:3px"><input type="submit" name="MODIFICA" value="MODIFICA CODICE" style="width:auto !important;"></div></div></form></div></div>';

                  codici = codici + '<div class="medium-12 large-8 columns"><span>Versione:&nbsp;</span>'+value.version+' <a href="{{url('modifica-versione/')}}/'+value.code+'/'+value.company.id+'/'+value.version+'/'+value.productVersionId+'/'+cat+'/'+prodotto+'/'+idprodotto+'/'+value.id+'" style="float:none;font-weight:bold;color:red;">MODIFICA VERSIONE</a></div>';

                  codici= codici + '</div></div><div class="contenitore-tab-stato-codice-prodotto"> <div class="row"><div class="columns"><ul class="tabs" data-tabs id="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><li class="tabs-title is-active"><a href="#panel1' + value.id + value.code + value.version + '" aria-selected="true">Dati codice prodotto</a></li><li class="tabs-title"><a href="#panel2' + value.id + value.code + value.version + '">Artwork</a></li></ul><div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><div class="tabs-panel is-active" id="panel1' + value.id + value.code + value.version + '"></div><div class="tabs-panel " id="panel2' + value.id + value.code + value.version + '"></div></div></div></div></td></tr>';

                @else
                  codici= codici + '</div></div><div class="contenitore-tab-stato-codice-prodotto"> <div class="row"><div class="columns"><ul class="tabs" data-tabs id="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><li class="tabs-title is-active"><a href="#panel1' + value.id + value.code + value.version + '" aria-selected="true">Dati codice prodotto</a></li><li class="tabs-title"><a href="#panel2' + value.id + value.code + value.version + '">Artwork</a></li></ul><div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><div class="tabs-panel is-active" id="panel1' + value.id + value.code + value.version + '"></div><div class="tabs-panel " id="panel2' + value.id + value.code + value.version + '"></div></div></div></div></td></tr>';
                @endif

                count++;
            });
            $('#elenco-codici tbody').append(codici).foundation();
        },
        error: function (request, status, errorThrown){}
    });

    $("#content-elenco-codici").on("click", "a[class^='open-stato-codice-prodotto-']", function(event){
        event.preventDefault();

        $("div[id^='panel2']").html('').foundation();
        $("li.tabs-title").attr("aria-hidden","false");

        var nameclass = $(this).attr("class");

        var myarr = nameclass.split("-");
        var myvar = myarr[4] + ":" + myarr[5];
        console.log(myarr[5]);
        console.log(myarr[6]);
        console.log(myarr[8]);

        if($("tbody tr#" + nameclass ).is(':visible')){
            $("tbody tr").removeAttr("style");
        }else{
            $("tbody tr#" + nameclass ).css('display','table-row');
            $("tbody tr").not("#" + nameclass ).css('display','');
        }
        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/GetCodiceDetail?lcode=" +  myarr[5] + "&companyId=" +  myarr[6] + "&version=" + myarr[8],
            success: function (results){
                console.log(results);
                var barcodeprimario = results.data.productStato.barcodeImballoPrimario;
                var barcodesecondario = results.data.productStato.barcodeImballoSecondario;
                var prezzominimodivendita = results.data.productStato.prezzoMinimoDiVendita;
                $('#barcodeprimario' + myarr[4] + myarr[5]).val(barcodeprimario);
                $('#barcodesecondario' + myarr[4] + myarr[5]).val(barcodesecondario);
                $('#prezzominimodivendita' + myarr[4] + myarr[5]).val(prezzominimodivendita);

                var frasi_h='';
                var frasi_r='';
                var indicazioniPericoloDPD='';
                var indicazioniPericoloCLP='';
                var immagini_clp='<div class="img_regulatory">';
                var immagini_dpd='<div class="img_regulatory">';
                var contArt = 1;

                $.each(results.data.productStato.frasiH, function(index, value){ frasi_h = frasi_h + value.name + ', '; });

                $.each(results.data.productStato.frasiR, function(index, value){ frasi_r = frasi_r + value.name + ', '; });

                $.each(results.data.productStato.indicazioniPericoloDPD, function(index, value){
                   indicazioniPericoloDPD = indicazioniPericoloDPD + value.name + ', ' ;

                    if(value.name=='Xi' || value.name=='Xn'){
                        immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/Xi.png") !!}"><span>' + value.name + '</span></div>';
                    }
                    if(value.name=='T+' || value.name=='T'){
                        immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/T.png") !!}"><span>' + value.name + '</span></div>';
                    }
                    if(value.name=='N'){
                        immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/N.png") !!}"><span>' + value.name + '</span></div>';
                    }
                    if(value.name=='C'){
                        immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/C.png") !!}"><span>' + value.name + '</span></div>';
                    }
                    if(value.name=='E'){
                        immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/E.png") !!}"><span>' + value.name + '</span></div>';
                    }
                    if(value.name=='F' || value.name=='F+'){
                        immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/F.png") !!}"><span>' + value.name + '</span></div>';
                    }
                    if(value.name=='NC+Xi'){
                        immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/Xi.png") !!}"><span>' + value.name + '</span></div>';
                    }
                    if(value.name=='O'){
                        immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/O.png") !!}"><span>' + value.name + '</span></div>';
                    }
                });

                immagini_dpd = immagini_dpd + '</div>';

                $.each(results.data.productStato.indicazioniPericoloCLP, function(index, value){
                   indicazioniPericoloCLP = indicazioniPericoloCLP + value.name + ', ' ;

                    if(value.name!='NO'){
                        if(value.name != undefined){
                            immagini_clp = immagini_clp + '<div><img src="{!! URL::asset("img/ind_pericolo_clp/' + value.name + '.png") !!}"><span>' + value.name + '</span></div>';
                        }
                    }
                });

                immagini_clp = immagini_clp + '</div>';

                frasi_h=frasi_h.slice(0,-2);
                frasi_r=frasi_r.slice(0,-2);
                indicazioniPericoloDPD=indicazioniPericoloDPD.slice(0,-2);
                indicazioniPericoloCLP=indicazioniPericoloCLP.slice(0,-2);

                if(formatoData(results.data.productStato.dataTracciabilita) == '01-01-0001'){
                    var dataTracciabilita = '';
                }else{
                    var dataTracciabilita = formatoData(results.data.productStato.dataTracciabilita);
                }

                if(formatoData(results.data.productStato.registrationDate) == '01-01-0001'){
                    var registrationDate = '';
                }else{
                    var registrationDate = formatoData(results.data.productStato.registrationDate);
                }

                if(results.data.productStato.numRegistrazione == '' || results.data.productStato.numRegistrazione == null ){
                    var numRegistrazione = '';
                }else{
                    var numRegistrazione = 'N<sup>&deg;</sup> ' + results.data.productStato.numRegistrazione;
                }

                var formulazione = '';
                if (!(results.data.productStato.formulation === undefined || results.data.productStato.formulation === null)) {
                    formulazione = results.data.productStato.formulation;
                }

                var LineaDistributiva = '';
                if (!(results.data.productStato.company.name === undefined || results.data.productStato.company.name === null)) {
                    LineaDistributiva = results.data.productStato.company.name;
                }

                var PrincAttivo = '';
                if (!(results.data.productStato.principiAttiviName === undefined || results.data.productStato.principiAttiviName === null)) {
                    PrincAttivo = results.data.productStato.principiAttiviName;
                }

                var composition = '';
                if (!(results.data.productStato.composition === undefined || results.data.productStato.composition === null)) {
                    composition = results.data.productStato.composition;
                }

                var provider = '';
                if (!(results.data.productStato.provider.name === undefined || results.data.productStato.provider.name === null)) {
                    provider = results.data.productStato.provider.name;
                }

                var adviceClp = '';
                if (!(results.data.productStato.adviceClp.name === undefined || results.data.productStato.adviceClp.name === null)) {
                    adviceClp = results.data.productStato.adviceClp.name;
                }

                if(frasi_h == "undefined" ){ frasi_h = ''; }
                if(frasi_r == "undefined" ){ frasi_r = ''; }

                var trademark = '';
                if (!(results.data.productStato.trademark.description === undefined || results.data.productStato.trademark.description === null)) {
                    trademark = results.data.productStato.trademark.description;
                }

                var onu = '';
                if (!(results.data.productStato.numeroOnuAdr === undefined || results.data.productStato.numeroOnuAdr === null)) {
                    onu = results.data.productStato.numeroOnuAdr
                }

                var classeADR = '';
                if (!(results.data.productStato.classeADR.name === undefined || results.data.productStato.classeADR.name === null)) {
                    classeADR = results.data.productStato.classeADR.name
                }

                var gruppoImballaggio = '';
                if (!(results.data.productStato.gruppoImballaggio === undefined || results.data.productStato.gruppoImballaggio === null)) {
                    gruppoImballaggio = results.data.productStato.gruppoImballaggio
                }

                var principioAttivoAdr = '';
                if (!(results.data.productStato.principioAttivoAdr === undefined || results.data.productStato.principioAttivoAdr === null)) {
                    principioAttivoAdr = results.data.productStato.principioAttivoAdr
                }

                var holderTrade = '';
                if (!(results.data.productStato.holderTrade.description === undefined || results.data.productStato.holderTrade.description === null)) {
                    holderTrade = results.data.productStato.holderTrade.description
                }

                var Seveso = '';
                if (!(results.data.productStato.classificSeveso === undefined || results.data.productStato.classificSeveso === null)) {
                    Seveso = results.data.productStato.classificSeveso
                }

            tab= '<div class="contenitore-info"><div class="row collapse"><div class="medium-12 large-4 columns"><span>Famiglia:&nbsp;</span>' + results.data.productStato.categoria.name + '</div><div class="medium-12 large-4 columns"><span>Sotto famiglia:&nbsp;</span>' + results.data.productStato.subCategoria.name + '</div><div class="medium-12 large-4 columns"><span>Linea distributiva:&nbsp;</span>' + LineaDistributiva + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Registrazione:&nbsp;</span>' + numRegistrazione + '</div><div class="medium-12 large-4 columns"><span>Data registrazione:&nbsp;</span>' + registrationDate + '</div><div class="medium-12 large-4 columns"><span>Formulazione:&nbsp;</span>' + formulazione + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Principio attivo:&nbsp;</span>' + PrincAttivo + '</div><div class="medium-12 large-4 columns end"><span>Composizione:&nbsp;</span>' + composition + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>IVA:&nbsp;</span>' + results.data.productStato.iva.name + '</div><div class="medium-12 large-4 columns end"><span>Ecotassa per legge:&nbsp;</span>' + results.data.productStato.etax.name + '</div></div><div class="row collapse"><div class="medium-12 large-12 columns"><span>Fornitore:&nbsp;</span>' + provider + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Indicazioni di Pericolo CLP:</span><br> ' + immagini_clp + '</div><div class="medium-12 large-8 columns"><span>Indicazioni di Pericolo DPD:</span><br> ' + immagini_dpd + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Consigli di prudenza:</span>' + adviceClp + '<br><span>Frasi H: </span>' + frasi_h + '</div><div class="medium-12 large-8 columns"><span>Frasi R: </span>' + frasi_r + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Data di tracciabilit&agrave;:&nbsp;</span>' + dataTracciabilita + '</div><div class="medium-12 large-8 columns"><span>Titolare registrazione:&nbsp;</span>' + trademark + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Numero ONU ADR:&nbsp;</span>' + onu + '</div><div class="medium-12 large-4 columns"><span>Classe ADR:&nbsp;</span>' + classeADR + '</div><div class="medium-12 large-4 columns"><span>Gruppo imballaggio ADR:&nbsp;</span>' + gruppoImballaggio + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Principio Attivo Responsabile della Pericolosit&agrave; ADR:&nbsp;</span>' + principioAttivoAdr + '</div><div class="medium-12 large-8 columns"><span>Titolare commercio:&nbsp;</span>' + holderTrade + '</div></div><div class="row collapse"><div class="medium-12 large-8 columns"><span>Classificazione seveso:&nbsp;</span>' + Seveso + '</div></div></div></div>';

            $('#panel1' + myarr[4] + myarr[5] + myarr[8]).append(tab).foundation();

            @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
              var artwork_tab='<div class="contenitore-artwork"><div class="expanded row collapse" style="border:0;"><div class="form-carica-artwork"><div id="UploadedImage"></div><form class="upload_artwork"><input type="hidden" class="idcodice" value="' + results.data.productStato.productCodeId + '"><input type="hidden" class="sap_prod_code" value="' + myarr[7] + '"><div class="row"><div class="medium-3 columns"><label>Carica artwork<sup>*</sup></label><label for="custom-file-upload" class="filupp"><span class="filupp-file-name js-value"></span><input type="file" name="attachment-file" id="custom-file-upload"/></label></div><div class="small-3 columns end"><input type="submit" name="CARICA" value="CARICA"></div></div> </form></div></div></div><div class="expanded row collapse" style="border:0;"><div class="medium-12 large-12 columns"><table id="elenco-codici"><thead><tr><th width="520">ARTWORK</th><th width="160">DATA UPLOAD</th><th width="170">CARICATO DA</th><th width="100">SCARICA</th><th width="250">COD. A BARRE IMBALLO PRIM.</th><th width="250">COD. A BARRE IMBALLO SEC.</th></tr></thead><tbody>';
            @else
              var artwork_tab='<div class="contenitore-artwork"><div class="expanded row collapse" style="border:0;"></div></div><div class="expanded row collapse" style="border:0;"><div class="medium-12 large-12 columns"><table id="elenco-codici"><thead><tr><th width="520">ARTWORK</th><th width="160">DATA UPLOAD</th><th width="170">CARICATO DA</th><th width="100">SCARICA</th><th width="250">COD. A BARRE IMBALLO PRIM.</th><th width="250">COD. A BARRE IMBALLO SEC.</th></tr></thead><tbody>';
            @endif

            $.each(results.data.productStato.version.artworks, function(index, value){
                if(formatoData(value.uploadDate) == '01-01-0001'){
                    var uploadDate = '';
                }else{
                    var uploadDate = formatoData(value.uploadDate);
                }

                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                  artwork_tab = artwork_tab + '<tr><td><div class="elimina-codice" style="float:left;top:0px;left:-9px; width:50px"><button class="button" type="button" data-toggle="elimina-art' + contArt + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-art' + contArt + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-artwork"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div>' + value.name + '</td><td>' + uploadDate + '</td><td>' + value.modifiedBy + '</td><td><a href="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=' + value.id + '"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>' + value.barcodeImballoPrimario + '</td><td>' + value.barcodeImballoSecondario + '</td></tr>';
                @else
                  artwork_tab = artwork_tab + '<tr><td>' + value.name + '</td><td>' + uploadDate + '</td><td>' + value.modifiedBy + '</td><td><a href="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=' + value.id + '"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>' + value.barcodeImballoPrimario + '</td><td>' + value.barcodeImballoSecondario + '</td></tr>';
                @endif

                contArt++;
            });

                artwork_tab= artwork_tab + '</tbody></table></div></div></div></div>';
                $('#panel2' + myarr[4] + myarr[5] + myarr[8]).append(artwork_tab).foundation();
            }
        });
    });

    $(document).on('submit', '.cambio_stato_prodotto', function(e) {
       var codici='';
       var count=1;
       e.preventDefault();

       var id = $(this).find('input.idcodice').val();
       var company = $(this).find('input.companyid').val();
       //var statusid = $(this).find('select#status').val();
       var BarcodeImballoPrimario = $(this).find('input.barcodeprimario').val();
       var BarcodeImballoSecondario = $(this).find('input.barcodesecondario').val();
       var PrezzoMinimoDiVendita = $(this).find('input.prezzominimodivendita').val();
       var esenzione = $(this).find('select#esenzione').val();
       var newPallet = $(this).find('input#pallet').val();

       var scadenzaTitolare = '';
       var scadenzaRivenditore = '';
       var scadenzaImpiego = '';

       scadenzaTitolare = $(this).find('input#data-scadenza-titolare').val();
       scadenzaRivenditore = $(this).find('input#data-scadenza-rivenditore').val();
       scadenzaImpiego = $(this).find('input#data-scadenza-impiego').val();

       var noteCodice = $(this).find('textarea#note-codice').val();
       var noteRegulatory = $(this).find('textarea#note-regulatory').val();

        if(esenzione=='Si') {
            esenzione = true;
        }if(esenzione=='No') {
            esenzione = false;
        }

        noteCodice = noteCodice.replace(/\r?\n/g, '<br />');
        noteRegulatory = noteRegulatory.replace(/\r?\n/g, '<br />');

        var sap_product_code = $(this).find('input.sap_prod_code').val(); //da capire come recuperare il valore

        //post_data=' { "id" : "' + id + '", "ModifiedBy" :  "' + utente + '", "StatusID" : "' + statusid + '", "PrezzoMinimoDiVendita" : "' + PrezzoMinimoDiVendita + '", "EsenzioneQuantitaLimitata" : "' + esenzione + '", "BarcodeImballoPrimario": "' + BarcodeImballoPrimario + '" , "BarcodeImballoSecondario" : "' + BarcodeImballoSecondario + '", "pallet" : "' + newPallet + '" , "Company" : { "id" : ' + company + ' }, "Note" : "' + noteCodice + '", "NoteRegulatory" :  "' + noteRegulatory + '", "DeadlineOwner" : "' + scadenzaTitolare + '", "DeadlineSeller" : "' + scadenzaRivenditore + '", "DeadlineUse" : "' + scadenzaImpiego + '", "SapProductCode" : "'+sap_product_code+'" }';
		post_data=' { "id" : "' + id + '", "ModifiedBy" :  "' + utente + '", "PrezzoMinimoDiVendita" : "' + PrezzoMinimoDiVendita + '", "EsenzioneQuantitaLimitata" : "' + esenzione + '", "BarcodeImballoPrimario": "' + BarcodeImballoPrimario + '" , "BarcodeImballoSecondario" : "' + BarcodeImballoSecondario + '", "pallet" : "' + newPallet + '" , "Company" : { "id" : ' + company + ' }, "Note" : "' + noteCodice + '", "NoteRegulatory" :  "' + noteRegulatory + '", "DeadlineOwner" : "' + scadenzaTitolare + '", "DeadlineSeller" : "' + scadenzaRivenditore + '", "DeadlineUse" : "' + scadenzaImpiego + '", "SapProductCode" : "'+sap_product_code+'" }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/UpdateCode",
            dataType: "json",
            data: {
                id: id,
                ModifiedBy: utente,
                //StatusID: statusid,
                PrezzoMinimoDiVendita: PrezzoMinimoDiVendita,
                EsenzioneQuantitaLimitata: esenzione,
                BarcodeImballoPrimario: BarcodeImballoPrimario,
                pallet: newPallet,
                Company: {
                    id: company
                },
                Note: noteCodice,
                NoteRegulatory: noteRegulatory,
                SapProductCode: sap_product_code
            },
            success: function(data){
                if(data.returnCode == '-1'){
                    $("#error").html('Impossibile modificare lo stato del codice prodotto');
                }else{
                    $("#error").html('Stato codice correttamente modificato');
                    location.reload();
                    /*$('#elenco-codici tbody').html('').foundation();
                    var select_string='';
                    var select_string_esenzione='';
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
                                select_string_esenzione='';

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

                                if(formatoData(value.created) == '01-01-0001'){
                                    var created = '';
                                }else{
                                    var created = formatoData(value.created);
                                }

                                if(formatoData(value.versionLastModifiedDate) == '01-01-0001'){
                                    var versionLastModifiedDate = '';
                                }else{
                                    var versionLastModifiedDate = formatoData(value.versionLastModifiedDate);
                                }

                                //url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + idprodotto + "/" + value.id;
                                url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + idprodotto + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");
                                duplica='<a href="{!! url("' + url_duplica + '") !!}" class="duplica">Duplica</a>';

                                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                                  codici= codici + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + value.code + '</td><td>'+value.sapProductCode+'</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura +'</td><td>' + pallet + '</td><td><a href="#" class="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr> <tr id="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><td colspan="8" class="colonna-stato-codice-prodotto"><div class="stato-codice-prodotto"><div class="info-codice"><span>Codice creato da:&nbsp;</span>' + value.createdBy + '</div><div class="info-codice"><span>Data creazione:&nbsp;</span>' + created + '</div></div><div class="form-modifica-stato"><div class="row">';
                                  codici= codici + '<form class="cambio_stato_prodotto"><div class="row"><div class="large-2 columns"><label class="text-left">Stato</label></div><div class="large-3 columns"><select name="status" id="status"><option value="">Scegli</option>';

                                @else
                                  codici= codici + '<tr><td></td><td>' + value.code + '</td><td>'+value.sapProductCode+'</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura +'</td><td>' + pallet + '</td><td><a href="#" class="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr> <tr id="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><td colspan="8" class="colonna-stato-codice-prodotto"><div class="stato-codice-prodotto"><div class="info-codice"><span>Codice creato da:&nbsp;</span>' + value.createdBy + '</div><div class="info-codice"><span>Data creazione:&nbsp;</span>' + created + '</div></div><div class="form-modifica-stato"><div class="row">';
                                @endif

                                statusName = value.statusName;

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
                                            if(statusName == value.name){ select_string = 'selected="selected"'; }

                                            select_stato= select_stato + '<option value="' + value.value + '" ' + select_string + '>' + value.name + '</option>';
                                        });
                                    },
                                    error: function (request, status, errorThrown){}
                                });

                                var dataScadenzaTitolare= '';
                                var dataScadenzaRivenditore= '';
                                var dataScadenzaUso= '';
                                var NoteCodice = '';
                                var NoteRegulatory = '';

                                if(value.deadlineOwner!='0001-01-01T00:00:00'){
                                    dataScadenzaTitolare=value.deadlineOwner;
                                    dataScadenzaTitolare=dataScadenzaTitolare.substring(0,10);
                                }

                                if(value.deadlineSeller!='0001-01-01T00:00:00'){
                                    dataScadenzaRivenditore=value.deadlineSeller;
                                    dataScadenzaRivenditore=dataScadenzaRivenditore.substring(0,10);
                                }

                                if(value.deadlineUse!='0001-01-01T00:00:00'){
                                    dataScadenzaUso=value.deadlineUse;
                                    dataScadenzaUso=dataScadenzaUso.substring(0,10);
                                }

                                if (!(value.note === undefined || value.note === null)) {
                                    NoteCodice = value.note;
                                    NoteCodice = NoteCodice.replace(/<br\s?\/?>/g,"\n");
                                }

                                if (!(value.noteRegulatory === undefined || value.noteRegulatory === null)) {
                                    NoteRegulatory = value.noteRegulatory;
                                    NoteRegulatory = NoteRegulatory.replace(/<br\s?\/?>/g,"\n");
                                }

                                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')

                                  codici= codici +  select_stato +'</select></div><div class="large-2 columns"><label class="text-left">Pallet</label></div><div class="large-3 columns end"><input type="text" name="pallet" id="pallet" value="' + pallet + '" style="margin-top:-5px;"></div></div><input type="hidden" class="idcodice" value="' + value.id + '"><input type="hidden" class="companyid" value="' + value.company.id + '"><div class="row"><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Barcode primario</label></div><div class="large-3 columns"><input type="text" class="barcodeprimario" id="barcodeprimario' + value.id + value.code + '"></div><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Barcode Secondario</label></div><div class="large-3 columns end"><input type="text" class="barcodesecondario" id="barcodesecondario' + value.id + value.code + '"></div></div><div class="row"><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Prezzo minimo di vendita</label></div><div class="large-3 columns"><input type="text" name="prezzo" id="prezzominimodivendita' + value.id + value.code + '" class="prezzominimodivendita"></div><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Esenzione quantit&agrave; limitata</label></div><div class="large-3 columns end"><select name="esenzione" id="esenzione" class="esenzione" style="margin-top:10px"><option value="">Scegli</option>';

                                  select_string_esenzione='<option value="Si">Si</option><option value="No" selected="selected">No</option>';

                                  if(value.esenzioneQuantitaLimitata){ select_string_esenzione='<option value="Si" selected="selected">Si</option><option value="No">No</option>'; }

                                  if(value.pallet == null){
                                      var pallet = ' ';
                                  }else{
                                      var pallet = value.pallet;
                                  }

                                  codici= codici + select_string_esenzione + '</select></div></div><div class="row"><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Scadenza titolare</label></div><div class="large-3 columns"><input type="date" name="scadenza-titolare" id="data-scadenza-titolare" value="' + dataScadenzaTitolare + '"></div><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Scadenza rivenditore</label></div><div class="large-3 end columns"><input type="date" name="scadenza-rivenditore" id="data-scadenza-rivenditore" value="' + dataScadenzaRivenditore + '"></div></div><div class="row"><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Scadenza impiego</label></div><div class="large-3 columns end"><input type="date" name="scadenza-impiego" id="data-scadenza-impiego" value="' + dataScadenzaUso + '"></div></div><div class="row"><div class="large-6 columns"><label>Note<textarea name="note-codice" id="note-codice">' + NoteCodice + '</textarea></label></div><div class="large-6 columns"><label>Note Regulatory <textarea name="note-regulatory" id="note-regulatory">' + NoteRegulatory + '</textarea></label></div></div><div class="row"><div class="large-12 columns" style="margin-top:3px"><input type="submit" name="MODIFICA" value="MODIFICA"></div></div></form>';

                                  codici= codici + '</div></div><div class="contenitore-tab-stato-codice-prodotto"> <div class="row"><div class="columns"><ul class="tabs" data-tabs id="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><li class="tabs-title is-active"><a href="#panel1' + value.id + value.code + value.version + '" aria-selected="true">Dati codice prodotto</a></li><li class="tabs-title"><a href="#panel2' + value.id + value.code + value.version + '">Artwork</a></li></ul><div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><div class="tabs-panel is-active" id="panel1' + value.id + value.code + value.version + '"></div><div class="tabs-panel " id="panel2' + value.id + value.code + value.version + '"></div></div></div></div></td></tr>';

                                @else
                                  codici= codici + '</div></div><div class="contenitore-tab-stato-codice-prodotto"> <div class="row"><div class="columns"><ul class="tabs" data-tabs id="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><li class="tabs-title is-active"><a href="#panel1' + value.id + value.code + value.version + '" aria-selected="true">Dati codice prodotto</a></li><li class="tabs-title"><a href="#panel2' + value.id + value.code + value.version + '">Artwork</a></li></ul><div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><div class="tabs-panel is-active" id="panel1' + value.id + value.code + value.version + '"></div><div class="tabs-panel " id="panel2' + value.id + value.code + value.version + '"></div></div></div></div></td></tr>';
                                @endif

                                count++;
                            });
                            $('#elenco-codici tbody').append(codici).foundation();
                        },
                        error: function (request, status, errorThrown){}
                    });*/
                }
            },
             error: function (request, status, errorThrown) {}
        });
    });

    $(document).on('submit', '.upload_artwork', function(e){
       e.preventDefault();
       var id = $(this).find('input.idcodice').val();
       var data = new FormData();
       var files = $(this).find('#custom-file-upload').get(0).files;

        myObj = {
            "ProductCodeId": id,
            "Artworks": [{
                "File": {
                    "FileTypeID": 1,
                    "CreatedBy": utente
                }
            }]
        };

        myJSON = JSON.stringify(myObj);
        data.append("data", myJSON);

        if (files.length > 0){ data.append("UploadedImage", files[0]); }

        if (files.length > 0) {

            var codici='';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Upload/UploadArtwork",
                contentType: false,
                processData: false,
                data: data,
                success: function (result){
                    if(result.returnCode == '-1'){
                        $("#error").html('Impossibile caricare il file');
                    }else{
                        $("#error").html('File correttamente caricato');
                        $('#elenco-codici tbody').html('').foundation();

                        var select_string='';
                        var select_string_esenzione='';
                         $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  prodotto,
                            success: function (result) {
                                $('#elenco-codici tbody').html('').foundation();
                                var ciclo_uno = 1;
                                var active_tab1='';
                                var active_tab2='is-active';
                                var active_tab3='';
                                var open_prima_riga= 'style="display: table-row;"';

                                $.each(result.data.codiciProdotto, function(index, value){

                                    if(ciclo_uno>1){
                                        active_tab1='is-active';
                                        active_tab2='';
                                        active_tab3='';
                                        open_prima_riga= '';
                                    }

                                    select_stato='';
                                    select_string_esenzione='';

                                    if(value.unitOfMeasure.name == null){ var unitaMisura = '';
                                    }else{ var unitaMisura = value.unitOfMeasure.name; }

                                    if(value.packingMultiply.name == null){ var valuePackingMultiply = ' ';
                                    }else{ var valuePackingMultiply = value.packingMultiply.name + ' x '; }

                                    if(value.pallet == null){ var pallet = ' ';
                                    }else{ var pallet = value.pallet; }

                                    //url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + idprodotto + "/" + value.id;
                                    url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + idprodotto + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");
                                    duplica='<a href="{!! url("' + url_duplica + '") !!}" class="duplica">Duplica</a>';

                                    var packingDescription = value.packing.description;
                                    packingDescription = packingDescription.split('=');
                                    packingDescription = packingDescription[1].replace("L/KG", "");
                                    packingDescription = packingDescription.replace("KG\L", "");
                                    packingDescription = packingDescription.replace("KG\\L", "");

                                    if(formatoData(value.created) == '01-01-0001'){
                                        var created = '';
                                    }else{
                                        var created = formatoData(value.created);
                                    }

                                    if(formatoData(value.versionLastModifiedDate) == '01-01-0001'){
                                        var versionLastModifiedDate = '';
                                    }else{
                                        var versionLastModifiedDate = formatoData(value.versionLastModifiedDate)
                                    }

                                    $("li.tabs-title").attr("aria-hidden","false");

                                    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')

                                      codici= codici + '<tr><td><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>'+value.sapProductCode+'</td><td>'+value.version+'</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura +'</td><td>' + pallet + '</td><td><a href="#" class="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr> <tr id="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '" ' + open_prima_riga + '><td colspan="8" class="colonna-stato-codice-prodotto"><div class="stato-codice-prodotto"><div class="info-codice"><span>Codice creato da:&nbsp;</span>' + value.createdBy + '</div><div class="info-codice"><span>Data creazione:&nbsp;</span>' + created + '</div></div><div class="form-modifica-stato"><div class="row">';

                                      codici= codici + '<form class="cambio_stato_prodotto"><div class="row"><div class="large-2 columns"><label class="text-left">Stato</label></div><div class="large-3 columns end"><select name="status" id="status"><option value="">Scegli</option>';

                                    @else

                                      codici= codici + '<tr><td></td><td>' + value.code + '</td><td>'+value.sapProductCode+'</td><td>'+value.version+'</td><td>' + value.statusName + '</td><td>' + versionLastModifiedDate + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura +'</td><td>' + pallet + '</td><td></td><td><a href="#" class="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr> <tr id="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '" ' + open_prima_riga + '><td colspan="8" class="colonna-stato-codice-prodotto"><div class="stato-codice-prodotto"><div class="info-codice"><span>Codice creato da:&nbsp;</span>' + value.createdBy + '</div><div class="info-codice"><span>Data creazione:&nbsp;</span>' + created + '</div></div>';
                                    @endif

                                    statusName = value.statusName;

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
                                                if(statusName == value.name){ select_string = 'selected="selected"'; }

                                                select_stato= select_stato + '<option value="' + value.value + '" ' + select_string + '>' + value.name + '</option>';
                                            });
                                        },
                                        error: function (request, status, errorThrown){}
                                    });

                                    var dataScadenzaTitolare= '';
                                    var dataScadenzaRivenditore= '';
                                    var dataScadenzaUso= '';
                                    var NoteCodice = '';
                                    var NoteRegulatory = '';

                                    if(value.deadlineOwner!='0001-01-01T00:00:00'){
                                        dataScadenzaTitolare=value.deadlineOwner;
                                        dataScadenzaTitolare=dataScadenzaTitolare.substring(0,10);
                                    }

                                    if(value.deadlineSeller!='0001-01-01T00:00:00'){
                                        dataScadenzaRivenditore=value.deadlineSeller;
                                        dataScadenzaRivenditore=dataScadenzaRivenditore.substring(0,10);
                                    }

                                    if(value.deadlineUse!='0001-01-01T00:00:00'){
                                        dataScadenzaUso=value.deadlineUse;
                                        dataScadenzaUso=dataScadenzaUso.substring(0,10);
                                    }

                                    if (!(value.note === undefined || value.note === null)) {
                                        NoteCodice = value.note;
                                        NoteCodice = NoteCodice.replace(/<br\s?\/?>/g,"\n");
                                    }

                                    if (!(value.noteRegulatory === undefined || value.noteRegulatory === null)) {
                                        NoteRegulatory = value.noteRegulatory;
                                        NoteRegulatory = NoteRegulatory.replace(/<br\s?\/?>/g,"\n");
                                    }

                                    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')

                                      codici= codici +  select_stato +'</select></div><div class="large-2 columns"><label class="text-left">Pallet</label></div><div class="large-3 columns end"><input type="text" name="pallet" id="pallet" value="' + pallet + '" style="margin-top:-5px;"></div></div><input type="hidden" class="idcodice" value="' + value.id + '"><input type="hidden" class="companyid" value="' + value.company.id + '"><div class="row"><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Barcode primario</label></div><div class="large-3 columns end"><input type="text" class="barcodeprimario" id="barcodeprimario' + value.id + value.code + '"></div></div><div class="row"><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Prezzo minimo di vendita</label></div><div class="large-3 columns"><input type="text" name="prezzo" id="prezzominimodivendita' + value.id + value.code + '" class="prezzominimodivendita"></div><div class="large-2 columns"><label class="text-left" style="margin-top:14px">Esenzione quantit&agrave; limitata</label></div><div class="large-3 columns end"><select name="esenzione" id="esenzione" class="esenzione" style="margin-top:10px"><option value="">Scegli</option>';

                                      select_string_esenzione='<option value="Si">Si</option><option value="No" selected="selected">No</option>';

                                      if(value.esenzioneQuantitaLimitata){ select_string_esenzione='<option value="Si" selected="selected">Si</option><option value="No">No</option>'; }

                                      if(value.pallet == null){ var pallet = ' ';
                                      }else{ var pallet = value.pallet; }

                                      codici= codici + select_string_esenzione + '</select></div></div><div class="row"><div class="large-6 columns"><label>Note<textarea name="note-codice" id="note-codice">' + NoteCodice + '</textarea></label></div><div class="large-6 columns"><label>Note Regulatory <textarea name="note-regulatory" id="note-regulatory">' + NoteRegulatory + '</textarea></label></div></div><div class="row"><div class="large-12 columns" style="margin-top:3px"><input type="submit" name="MODIFICA" value="MODIFICA CODICE" style="width: auto !important;"></div></div></form>';

                                      codici= codici + '</div></div><div class="contenitore-tab-stato-codice-prodotto"><div class="row"><div class="columns"><ul class="tabs" data-tabs id="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><li class="tabs-title ' + active_tab1 + '"><a href="#panel1' + value.id + value.code + '" aria-selected="true">Dati codice prodotto</a></li><li class="tabs-title ' + active_tab2 + '"><a href="#panel2' + value.id + value.code + '">Artwork</a></li></ul><div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><div class="tabs-panel is-active" id="panel1' + value.id + value.code + '"></div><div class="tabs-panel" id="panel2' + value.id + value.code + '"></div></div></div></div></td></tr>';
                                    @else
                                      codici= codici + '</div></div><div class="contenitore-tab-stato-codice-prodotto"><div class="row"><div class="columns"><ul class="tabs" data-tabs id="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><li class="tabs-title ' + active_tab1 + '"><a href="#panel1' + value.id + value.code + '" aria-selected="true">Dati codice prodotto</a></li><li class="tabs-title ' + active_tab2 + '"><a href="#panel2' + value.id + value.code + '">Artwork</a></li></ul><div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><div class="tabs-panel is-active" id="panel1' + value.id + value.code + '"></div><div class="tabs-panel" id="panel2' + value.id + value.code + '"></div></div></div></div></td></tr>';
                                    @endif


                                    var artwork_tab='<div class="contenitore-artwork"><div class="expanded row collapse" style="border:0;"><div class="form-carica-artwork"><div id="UploadedImage"></div><form class="upload_artwork"><input type="hidden" class="idcodice" value="' + value.id + '"><div class="row"><div class="medium-3 columns"><label>Carica artwork<sup>*</sup></label><label for="custom-file-upload" class="filupp"><span class="filupp-file-name js-value"></span><input type="file" name="attachment-file" id="custom-file-upload"/></label></div><div class="small-3 columns end"><input type="submit" name="CARICA" value="CARICA"></div></div> </form></div></div></div><div class="expanded row collapse" style="border:0;"><div class="medium-12 large-12 columns"><table id="elenco-codici"><thead><tr><th width="520">ARTWORK</th><th width="160">DATA UPLOAD</th><th width="170">CARICATO DA</th><th width="100">SCARICA</th><th width="250">COD. A BARRE IMBALLO PRIM.</th><th width="250">COD. A BARRE IMBALLO SEC.</th></tr></thead><tbody>';

                                    $.ajax({
                                        type: "GET",
                                        beforeSend: function (request) {
                                            request.setRequestHeader("Authorization", "Bearer " + token );
                                            request.setRequestHeader("lang", "it");
                                        },
                                        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodiceDetail?lcode=" +  value.code + "&companyId=" +  value.company.id + "&version=" + value.version,
                                        success: function (results){
                                            console.log(results);
                                            var barcodeprimario = results.data.productStato.barcodeImballoPrimario;
                                            var barcodesecondario = results.data.productStato.barcodeImballoSecondario;
                                            var prezzominimodivendita = results.data.productStato.prezzoMinimoDiVendita;
                                            $('#barcodeprimario' + value.code + value.company.id).val(barcodeprimario);
                                            $('#barcodesecondario' + value.code + value.company.id).val(barcodesecondario);
                                            $('#prezzominimodivendita' + value.code + value.company.id).val(prezzominimodivendita);

                                            var frasi_h='';
                                            var frasi_r='';
                                            var indicazioniPericoloDPD='';
                                            var indicazioniPericoloCLP='';
                                            var immagini_clp='<div class="img_regulatory">';
                                            var immagini_dpd='<div class="img_regulatory">';
                                            var contArt = 1;

                                            $.each(results.data.productStato.frasiH, function(index, value){ frasi_h = frasi_h + value.name + ', '; });
                                            $.each(results.data.productStato.frasiR, function(index, value){ frasi_r = frasi_r + value.name + ', '; });

                                            $.each(results.data.productStato.indicazioniPericoloDPD, function(index, value){
                                               indicazioniPericoloDPD = indicazioniPericoloDPD + value.name + ', ' ;

                                                if(value.name=='Xi' || value.name=='Xn'){
                                                    immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/Xi.png") !!}"><span>' + value.name + '</span></div>';
                                                }
                                                if(value.name=='T+' || value.name=='T'){
                                                    immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/T.png") !!}"><span>' + value.name + '</span></div>';
                                                }
                                                if(value.name=='N'){
                                                    immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/N.png") !!}"><span>' + value.name + '</span></div>';
                                                }
                                                if(value.name=='C'){
                                                    immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/C.png") !!}"><span>' + value.name + '</span></div>';
                                                }
                                                if(value.name=='E'){
                                                    immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/E.png") !!}"><span>' + value.name + '</span></div>';
                                                }
                                                if(value.name=='F' || value.name=='F+'){
                                                    immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/F.png") !!}"><span>' + value.name + '</span></div>';
                                                }
                                                if(value.name=='NC+Xi'){
                                                    immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/Xi.png") !!}"><span>' + value.name + '</span></div>';
                                                }
                                                if(value.name=='O'){
                                                    immagini_dpd = immagini_dpd + '<div><img src="{!! URL::asset("img/ind_pericolo_dpd/O.png") !!}"><span>' + value.name + '</span></div>';
                                                }
                                            });

                                            immagini_dpd = immagini_dpd + '</div>';

                                            $.each(results.data.productStato.indicazioniPericoloCLP, function(index, value){
                                               indicazioniPericoloCLP = indicazioniPericoloCLP + value.name + ', ' ;

                                                if(value.name!='NO'){
                                                    if(value.name!='undefined'){
                                                        immagini_clp = immagini_clp + '<div><img src="{!! URL::asset("img/ind_pericolo_clp/' + value.name + '.png") !!}"><span>' + value.name + '</span></div>';
                                                    }
                                                }
                                            });

                                            immagini_clp = immagini_clp + '</div>';

                                            frasi_h=frasi_h.slice(0,-2);
                                            frasi_r=frasi_r.slice(0,-2);
                                            indicazioniPericoloDPD=indicazioniPericoloDPD.slice(0,-2);
                                            indicazioniPericoloCLP=indicazioniPericoloCLP.slice(0,-2);

                                            if(formatoData(results.data.productStato.dataTracciabilita) == '01-01-0001'){
                                                var dataTracciabilita = '';
                                            }else{
                                                var dataTracciabilita = formatoData(results.data.productStato.dataTracciabilita);
                                            }

                                            if(formatoData(results.data.productStato.registrationDate) == '01-01-0001'){
                                                var registrationDate = '';
                                            }else{
                                                var registrationDate = formatoData(results.data.productStato.registrationDate);
                                            }

                                            if(results.data.productStato.numRegistrazione == '' || results.data.productStato.numRegistrazione == null ){
                                                var numRegistrazione = '';
                                            }else{
                                                var numRegistrazione = 'N<sup>&deg;</sup> ' + results.data.productStato.numRegistrazione;
                                            }

                                            var formulazione = '';
                                            if (!(results.data.productStato.formulation === undefined || results.data.productStato.formulation === null)) {
                                                formulazione = results.data.productStato.formulation;
                                            }

                                            var LineaDistributiva = '';
                                            if (!(results.data.productStato.company.name === undefined || results.data.productStato.company.name === null)) {
                                                LineaDistributiva = results.data.productStato.company.name;
                                            }

                                            var PrincAttivo = '';
                                            if (!(results.data.productStato.principiAttiviName === undefined || results.data.productStato.principiAttiviName === null)) {
                                                PrincAttivo = results.data.productStato.principiAttiviName;
                                            }

                                            var composition = '';
                                            if (!(results.data.productStato.composition === undefined || results.data.productStato.composition === null)) {
                                                composition = results.data.productStato.composition;
                                            }

                                            var provider = '';
                                            if (!(results.data.productStato.provider.name === undefined || results.data.productStato.provider.name === null)) {
                                                provider = results.data.productStato.provider.name;
                                            }

                                            var adviceClp = '';
                                            if (!(results.data.productStato.adviceClp.name === undefined || results.data.productStato.adviceClp.name === null)) {
                                                adviceClp = results.data.productStato.adviceClp.name;
                                            }

                                            if(frasi_h == "undefined"){ frasi_h = ''; }
                                            if(frasi_r == "undefined"){ frasi_r = ''; }

                                            var trademark = '';
                                            if (!(results.data.productStato.trademark.description === undefined || results.data.productStato.trademark.description === null)) {
                                                trademark = results.data.productStato.trademark.description;
                                            }

                                            var onu = '';
                                            if (!(results.data.productStato.numeroOnuAdr === undefined || results.data.productStato.numeroOnuAdr === null)) {
                                                onu = results.data.productStato.numeroOnuAdr
                                            }

                                            var classeADR = '';
                                            if (!(results.data.productStato.classeADR.name === undefined || results.data.productStato.classeADR.name === null)) {
                                                classeADR = results.data.productStato.classeADR.name
                                            }

                                            var gruppoImballaggio = '';
                                            if (!(results.data.productStato.gruppoImballaggio === undefined || results.data.productStato.gruppoImballaggio === null)) {
                                                gruppoImballaggio = results.data.productStato.gruppoImballaggio
                                            }

                                            var principioAttivoAdr = '';
                                            if (!(results.data.productStato.principioAttivoAdr === undefined || results.data.productStato.principioAttivoAdr === null)) {
                                                principioAttivoAdr = results.data.productStato.principioAttivoAdr
                                            }

                                            var holderTrade = '';
                                            if (!(results.data.productStato.holderTrade.description === undefined || results.data.productStato.holderTrade.description === null)) {
                                                holderTrade = results.data.productStato.holderTrade.description
                                            }

                                            var Seveso = '';
                                            if (!(results.data.productStato.classificSeveso === undefined || results.data.productStato.classificSeveso === null)) {
                                                Seveso = results.data.productStato.classificSeveso
                                            }

                                            tab= '<div class="contenitore-info"><div class="row collapse"><div class="medium-12 large-4 columns"><span>Famiglia:&nbsp;</span>' + results.data.productStato.categoria.name + '</div><div class="medium-12 large-4 columns"><span>Sotto famiglia:&nbsp;</span>' + results.data.productStato.subCategoria.name + '</div><div class="medium-12 large-4 columns"><span>Linea distributiva:&nbsp;</span>' + LineaDistributiva + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Registrazione:&nbsp;</span>' + numRegistrazione + '</div><div class="medium-12 large-4 columns"><span>Data registrazione:&nbsp;</span>' + registrationDate + '</div><div class="medium-12 large-4 columns"><span>Formulazione:&nbsp;</span>' + formulazione + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Principio attivo:&nbsp;</span>' + PrincAttivo + '</div><div class="medium-12 large-4 columns end"><span>Composizione:&nbsp;</span>' + composition + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>IVA:&nbsp;</span>' + results.data.productStato.iva.name + '</div><div class="medium-12 large-4 columns end"><span>Ecotassa per legge:&nbsp;</span>' + results.data.productStato.etax.name + '</div></div><div class="row collapse"><div class="medium-12 large-12 columns"><span>Fornitore:&nbsp;</span>' + provider + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Indicazioni di Pericolo CLP:</span><br> ' + immagini_clp + '</div><div class="medium-12 large-8 columns"><span>Indicazioni di Pericolo DPD:</span><br> ' + immagini_dpd + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Consigli di prudenza:</span>' + adviceClp + '<br><span>Frasi H: </span>' + frasi_h + '</div><div class="medium-12 large-8 columns"><span>Frasi R: </span>' + frasi_r + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Data di tracciabilit&agrave;:&nbsp;</span>' + dataTracciabilita + '</div><div class="medium-12 large-8 columns"><span>Titolare registrazione:&nbsp;</span>' + trademark + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Numero ONU ADR:&nbsp;</span>' + onu + '</div><div class="medium-12 large-4 columns"><span>Classe ADR:&nbsp;</span>' + classeADR + '</div><div class="medium-12 large-4 columns"><span>Gruppo imballaggio ADR:&nbsp;</span>' + gruppoImballaggio + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Principio Attivo Responsabile della Pericolosit&agrave; ADR:&nbsp;</span>' + principioAttivoAdr + '</div><div class="medium-12 large-8 columns"><span>Titolare commercio:&nbsp;</span>' + holderTrade + '</div></div><div class="row collapse"><div class="medium-12 large-8 columns"><span>Classificazione seveso:&nbsp;</span>' + Seveso + '</div></div></div></div>';

                                            $('#panel1' + value.id + value.code).append(tab).foundation();

                                            $.each(results.data.productStato.version.artworks, function(index, value){

                                                if(formatoData(value.uploadDate) == '01-01-0001'){
                                                    var uploadDate = '';
                                                }else{
                                                    var uploadDate = formatoData(value.uploadDate);
                                                }

                                                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')

                                                  artwork_tab = artwork_tab + '<tr><td><div class="elimina-codice" style="float:left;top:0px;left:-9px; width:50px"><button class="button" type="button" data-toggle="elimina-art' + contArt + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-art' + contArt + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-artwork"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div>' + value.name + '</td><td>' + uploadDate + '</td><td>' + value.modifiedBy + '</td><td><a href="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=' + value.id + '"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>' + value.barcodeImballoPrimario + '</td><td>' + value.barcodeImballoSecondario + '</td></tr>';

                                                @else
                                                  artwork_tab = artwork_tab + '<tr><td>' + value.name + '</td><td>' + uploadDate + '</td><td>' + value.modifiedBy + '</td><td><a href="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=' + value.id + '"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>' + value.barcodeImballoPrimario + '</td><td>' + value.barcodeImballoSecondario + '</td></tr>';
                                                @endif
                                                contArt++;
                                            });

                                            artwork_tab= artwork_tab + '</tbody></table></div></div></div></div>';

                                            $('#panel2' + value.id + value.code).append(artwork_tab).foundation();
                                            },
                                            error: function (request, status, errorThrown){}
                                        });

                                    count++;
                                    ciclo_uno++;
                                });

                                $('#elenco-codici tbody').append(codici).foundation();
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    },
                    error: function (request, status, errorThrown){ $("#UploadedImage").html('Impossibile caricare il file'); }
                });
            }else{ $("#error").html('Carica un file valido!'); }
        });

    $(document).on('click', '.cancella-artwork', function(e) {
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
            url: "{{ config('constants.UrlWebService') }}api/Upload/DeleteArtwork ",
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
</script>
@stop
