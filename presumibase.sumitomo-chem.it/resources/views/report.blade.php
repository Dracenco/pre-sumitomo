<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header')
@section('title', 'Report')
@section('content')
@include('layout.menu')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li class="disabled">Report</li>
                    </ul>
                </nav>
            </div>
        </div>

        @if ($ruoli['report'] != 'N')
           @if ($ruoli['report'] != 'R')
            <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div class="report">

                    <div class="expanded row">
                        <div class="medium-12 large-12 columns">
                            <div id="error"></div>
                        </div>
                    </div>

                    <ul class="tabs" data-tabs id="report">
                        <li class="tabs-title is-active" style="width:100%"><a href="#panel1" aria-selected="true">Report per Codice Prodotto</a></li>
                    </ul>

                    <div class="tabs-content" data-tabs-content="report">
                        <div class="tabs-panel is-active" id="panel1">
                            <div id="codice">
                                <h4>Selezionare uno o pi&ugrave; filtri da i menu sottostanti.<br>Se non viene selezionato nessun filtro, il report sar&agrave; completo (tutti i codici prodotto presenti nel database).</h4>

                                <form class="report-codice" method="post">
                                    <div class="row">
                                        <div class="large-3 columns">
                                          <label>Linea distributiva
                                             <select name="linea-distributiva" id="linea-distributiva"><option value="">Scegli</option></select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Famiglia
                                            <select name="famiglia" id="famiglia"><option value="">Scegli</option></select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Nome prodotto
                                              <select name="nome-prodotto" id="nome-prodotto"><option value="0">Scegli</option></select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                              <label>Codice prodotto
                                                <select name="codiceprodotto" id="codiceprodotto"><option value="">Scegli</option></select>
                                              </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns">
                                              <label>Codice SAP
                                                <select name="codicesap" id="codicesap"><option value="">Scegli</option></select>
                                              </label>
                                        </div>
                                        <div class="large-3 columns">
                                            <label>Stato codice prodotto
                                                <select name="stato-codice-prodotto" id="stato-codice-prodotto"><option value="">Scegli</option></select>
                                            </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Product Manager
                                              <select name="pm" id="pm"><option value="">Scegli</option></select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns end">
                                          <label>Numero di registrazione Et. Ministeriale
                                            <input type="text" name="numero-registrazione-et-ministeriale" id="numero-registrazione-et-ministeriale">
                                          </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="large-3 columns">
                                          <label>Inizio Data registrazione
                                            <input type="date" name="data-registrazione" id="data-registrazione">
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Fine Data registrazione
                                            <input type="date" name="data-registrazione-end" id="data-registrazione-end">
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Principio attivo
                                              <select name="principio-attivo" id="principio-attivo"><option value="">Scegli</option></select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns end">
                                          <label>Formulazione
                                            <select name="formulazione" id="formulazione"><option value="">Scegli</option></select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Numero ONU ADR
                                            <select name="numero-onu-adr" id="numero-onu-adr"><option value="">Scegli</option></select>
                                          </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="large-3 columns">
                                          <label>Biologico
                                            <select name="biologico" id="biologico">
                                                <option value="">Scegli</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Biorazionale
                                            <select name="biorazionale" id="biorazionale">
                                                <option value="">Scegli</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Idrosolubile
                                            <select name="idrosolubile" id="idrosolubile">
                                                <option value="">Scegli</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>MATER-BI
                                            <select name="mater-bi" id="mater-bi">
                                                <option value="">Scegli</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                          </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns">
                                          <label>IVA
                                             <select name="iva" id="iva"><option value="">Scegli</option></select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns end">
                                          <label>Ecotassa per legge
                                             <select name="ecotassa-legge" id="ecotassa-legge"><option value="">Scegli</option></select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Catalogo
                                            <select name="catalogo" id="catalogo">
                                                <option value="">Scegli</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Sito
                                            <select name="sito" id="sito">
                                                <option value="">Scegli</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                          </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sumilist
                                            <select name="sumilist" id="sumilist">
                                                <option value="">Scegli</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Inizio Data creazione
                                            <input type="date" name="data-creazione" id="data-creazione">
                                          </label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Fine Data creazione
                                            <input type="date" name="data-creazione-fine" id="data-creazione-fine">
                                          </label>
                                        </div>
                                        <div class="large-3 columns end">
                                          <label>Data ultima modifica (Inizio)
                                            <input type="date" name="data-ultima-modifica-start" id="data-ultima-modifica-start">
                                          </label>
                                        </div>
                                        <div class="large-3 columns end">
                                          <label>Data ultima modifica (Fine)
                                            <input type="date" name="data-ultima-modifica" id="data-ultima-modifica">
                                          </label>
                                        </div>
                                    </div>

                                    <div class="row collapse">
                                        <div class="medium-12 large-4 columns"><span>Indicazioni di Pericolo CLP</span></div>
                                        <div class="large-12 columns">
                                            <div class="row large-up-12" id="indicazioni-pericolo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse" id="avvertenze">
                                        <div class="large-12 columns"><span>Avvertenze</span></div>
                                    </div>
                                    <div class="row collapse" id="frasi-h">
                                        <div class="large-12 columns"><span>Frasi H</span></div>
                                    </div>

                                    <div class="large-12 columns">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
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
                $("ul.menu").append('<li> <a href="{!! url("prodotti") !!}' + '/' + value.id + '" >' + value.name + '</a></li>');
            });
        },
        error: function (request, status, errorThrown) {}
    });

    var linea_distributiva = '';
    var famiglia = '';
    var sottofamiglia='';
    var pm='';
    var fornitore='';
    var principioattivo='';
    var formulazioneprodotto='';
    var ivaprodotto='';
    var ecotaxprodotto='';
    var trademarkProdotto='';
    var dataScadenzaTitolare='';
    var dataTracciabilita='';
    var dataScadenzaRivenditore='';
    var dataScadenzaUso='';
    var gruppo_imballaggio_adr='';
    var trasportation_code='';
    var adrclassification='';
    var avvertenze='';
    var avvertenzeDpd='';
    var select_stato='';
    var prodotti='';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetAll?categoryID=&nameStartWith=",
        success: function (result) {
            $.each(result.data, function(index, value){
                prodotti = prodotti + '<option value="' + value.id + '-' + value.code + '" >' + value.name + '</option>'
            });
            $("select#nome-prodotto").append(prodotti);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCompany",
        success: function (result) {
            $.each(result.data, function(index, value){
                linea_distributiva = linea_distributiva + '<option value="' + value.id + '" >' + value.name + '</option>'
            });
            $("select#linea-distributiva").append(linea_distributiva);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result) {
            $.each(result.data, function(index, value){
                famiglia = famiglia + '<option value="' + value.id + '" >' + value.name + '</option>'
            });
            $("select#famiglia").append(famiglia);
        },
        error: function (request, status, errorThrown) {}
    });

    $('select#linea-distributiva').on('change', function() {
        $("#nome-prodotto").html('<option value="">Scegli</option>');
        $("#famiglia").html('<option value="">Scegli</option>');
        $("select#codiceprodotto").html('<option value="0" >Scegli</option>');
        var prodotti = '<option value="">Scegli</option>';
        var famiglia = '<option value="">Scegli</option>';
        var categoryid = this.value;

        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
            success: function (result) {
                $.each(result.data, function(index, value){
                    famiglia = famiglia + '<option value="' + value.id + '" >' + value.name + '</option>'
                });
                $("select#famiglia").append(famiglia);
            },
            error: function (request, status, errorThrown) {}
        });

        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/GetAll?categoryID=" + + categoryid + "&nameStartWith=",
            success: function (result) {
                $.each(result.data, function(index, value){
                    prodotti = prodotti + '<option value="' + value.id + '-' + value.code + '" >' + value.name + '</option>'
                });
                $("select#nome-prodotto").append(prodotti);
            },
            error: function (request, status, errorThrown){}
        });
    });

    $('select#famiglia').on('change', function(){
        var categoryid = this.value;
        $("#nome-prodotto").html('');
        $("select#codiceprodotto").html('<option value="0" >Scegli</option>');
        var prodotti = '<option value="">Scegli</option>';

        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/GetAll?categoryID=" + + categoryid + "&nameStartWith=",
            success: function (result) {
                $.each(result.data, function(index, value){
                    prodotti = prodotti + '<option value="' + value.id + '-' + value.code + '" >' + value.name + '</option>'
                });
                $("select#nome-prodotto").append(prodotti);
            },
            error: function (request, status, errorThrown){}
        });
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProductManager",
        success: function (result) {
            $.each(result.data, function(index, value){
                pm = pm + '<option value="' + value.id + '" >' + value.name + '</option>'
            });
            $("select#pm").append(pm);
        },
        error: function (request, status, errorThrown){}
    });

    var img='';
    var pittogrammiClp ='';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=pictogram_hazard_clp&all=false",
        success: function (result) {
            $.each(result.data, function(index, value){

            if(!(value.name == "NO" || value.name == "NESSUNO")){
                    img = "src='{{ url('/') }}/img/ind_pericolo_clp/" + value.name + ".png'";
                    pittogrammiClp = pittogrammiClp + "<div class='column column-block end'><img " + img + "class='thumbnail'><span>" + value.name + "</span><div class='check-loghi-bio' id='" + value.name + "'><input type='checkbox' name='pittogrammi' value='" + value.value + "'></div></div>";
                }
            });
            $("div#indicazioni-pericolo").append(pittogrammiClp);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
        success: function (result) {
            $.each(result.data, function(index, value){
                fornitore = fornitore + '<option value="' + value.id + '" >' + value.name + '</option>'
            });
            $("select#fornitore").append(fornitore);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPrincipioAttivo",
        success: function (result) {
            $.each(result.data, function(index, value){
                principioattivo = principioattivo + '<option value="' + value.id + '" >' + value.name + '</option>'
            });
            $("select#principio-attivo").append(principioattivo);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=formulation&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){
                formulazioneprodotto= formulazioneprodotto + '<option value="' + value.id + '" >' + value.name + ' - ' + value.description + '</option>';
            });
            $("select#formulazione").append(formulazioneprodotto);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllIVA",
        success: function (result) {
            $.each(result.data, function(index, value){
                ivaprodotto = ivaprodotto + '<option value="' + value.id + '" >' + value.name + '</option>'
            });
            $("select#iva").append(ivaprodotto);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllEtax",
        success: function (result) {
            $.each(result.data, function(index, value){
                ecotaxprodotto = ecotaxprodotto + '<option value="' + value.id + '" >' + value.name + '</option>'
            });
            $("select#ecotassa-legge").append(ecotaxprodotto);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
        success: function (result) {
            $.each(result.data, function(index, value){
                trademarkProdotto= trademarkProdotto + '<option value="' + value.id + '" >' + value.name + ' - ' + value.description + '</option>';
            });
            $("select#titolare-registrazione").append(trademarkProdotto);
        },
        error: function (request, status, errorThrown) {}
    });

    var checkFrasiH = '';
    var checkFrasiHArray = new Array();

    checkFrasiHArray.push('<div class="riga-frasi-h"><input type="checkbox" name="frasiH" id="tuttiH" value="" onClick="check_uncheck_checkbox(this.checked);"><span>Tutti</span></div>');

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=hazard_code_clp&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){
              if(value.value != -1 && value.value != 120){
                checkFrasiHArray.push('<div class="riga-frasi-h"><input type="checkbox" name="frasiH" class="selezionah" value="' + value.value + '" ><span>' + value.name + '</span></div>');
              }
            });

            var lenghtFrasiH = checkFrasiHArray.length;
            var colonneFrasiH = '';
            var i = 1;

            lenghtFrasiH = parseInt((lenghtFrasiH/4) + 1);

            $.each(checkFrasiHArray, function(index, value){
                if(i==1){ colonneFrasiH = colonneFrasiH + '<div class="large-3 columns">'; }

                colonneFrasiH = colonneFrasiH + value ;
                i = i + 1;

                if(i>lenghtFrasiH){
                    colonneFrasiH = colonneFrasiH + '</div>';
                    i=1;
                }
            });

            $("div#frasi-h").append(colonneFrasiH);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllAdviceClp",
        success: function (result) {
            $.each(result.data, function(index, value){
                avvertenze = avvertenze + '<div class="large-3 columns"><input type="checkbox" name="Pericolo" value="' + value.id + '"><span>' + value.name + '</span></div>';
            });
            $("div#avvertenze").append(avvertenze);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=packing_group&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){
                gruppo_imballaggio_adr= gruppo_imballaggio_adr + '<option value="' + value.value + '" >' + value.name + '</option>';
            });
            $("select#gruppo-imballaggio-adr").append(gruppo_imballaggio_adr);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=trasportation_code&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){
                trasportation_code= trasportation_code + '<option value="' + value.value + '" >' + value.name + '</option>';
            });
            $("select#numero-onu-adr").append(trasportation_code);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=adrclassification&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){
                adrclassification= adrclassification + '<option value="' + value.value + '" >' + value.name + '</option>';
            });
            $("select#classe-adr").append(adrclassification);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetAll?categoryID=&nameStartWith=",
        success: function (result) {
            $.each(result.data, function(index, value){
                prodotti = prodotti + '<option value="' + value.id + '-' + value.code + '" >' + value.name + '</option>'
            });
            $("select#nome-prodotto").append(prodotti);
        },
        error: function (request, status, errorThrown){}
    });

     $('select#nome-prodotto').on('change', function() {
         $("select#codiceprodotto").html('<option value="0" >Scegli</option>');
         $("select#codicesap").html('<option value="0" >Scegli</option>');
         var Codeid = this.value;
         var res = Codeid.split("-");
         var selectcodice = '';
         var selectsap = '';

         if(Codeid != 0 ){
             if(Codeid != '' ){

                 $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Products/GetCodici?code=" +  res[1],
                    success: function (result) {
                        if(result.data != null ){
                            $.each(result.data.codiciProdotto, function(index, value){
                                selectcodice = selectcodice + '<option value="' + value.id + '" data-sap="'+value.sapProductCode+'" >' + value.code + '</option>';
                                selectsap = selectsap + '<option value="'+value.sapProductCode+'">'+value.sapProductCode+'</option>';
                            });
                            $("select#codiceprodotto").append(selectcodice);
                            $("select#codicesap").append(selectsap);
                        }else{
                            $("select#codiceprodotto").html('<option value="0" >Scegli</option>');
                            $("select#codicesap").html('<option value="0" >Scegli</option>');
                        }
                    },
                    error: function (request, status, errorThrown){}
                });
             }else{
                $("select#codiceprodotto").html('<option value="0" >Scegli</option>');
                $("select#codicesap").html('<option value="0" >Scegli</option>');
             }
        }else{
            $("select#codiceprodotto").html('<option value="0" >Scegli</option>');
        }
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=status&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){
                select_stato= select_stato + '<option value="' + value.value + '" >' + value.name + '</option>';
            });
            $("select#stato-codice-prodotto").append(select_stato);
        },
        error: function (request, status, errorThrown){}
    });

    var Stringcolture = '';
    var categoria = '';

    $(document).on('submit', '.report-codice', function(e) {
       e.preventDefault();

       $("#error").html('Report in elaborazione. Al termine verrà scaricato automaticamente. ');
       $("html, body").animate({ scrollTop: 0 }, "slow");

        var StringaFiltri = '{';

        if($(this).find('select#nome-prodotto').val() != ''){
            var Codeid = $(this).find('select#nome-prodotto').val();
            var res = Codeid.split("-");
            if(res[0] != 0){
                StringaFiltri = StringaFiltri + ' "ProductId" : ' + res[0] + ' ,';
            }
        }

        if($(this).find('select#codiceprodotto').val() != ''){
            var ID = $(this).find('select#codiceprodotto').val();
            if(ID != 0 ){
                StringaFiltri = StringaFiltri + ' "ID" : ' + $(this).find('select#codiceprodotto').val() + ' ,';
            }
        }

        if($(this).find('select#codicesap').val() != ''){
            var ID = $(this).find('select#codicesap').val();
            if(ID != 0 ){
                StringaFiltri = StringaFiltri + ' "SapProductCode" : ' + $(this).find('select#codicesap').val() + ' ,';
            }
        }

        if($(this).find('select#famiglia').val() != ''){
            StringaFiltri = StringaFiltri + ' "CategoryId" : ' + $(this).find('select#famiglia').val() + ' ,';
        }

        if($(this).find('select#linea-distributiva').val() != ''){
            StringaFiltri = StringaFiltri + ' "CompanyId" : ' + $(this).find('select#linea-distributiva').val() + ' ,';
        }

        if($(this).find('select#stato-codice-prodotto').val() != ''){
            StringaFiltri = StringaFiltri + ' "StatusId" : ' + $(this).find('select#stato-codice-prodotto').val() + ' ,';
        }

        if($(this).find('select#pm').val() != ''){
            StringaFiltri = StringaFiltri + ' "ProductManagerId" : ' + $(this).find('select#pm').val() + ' ,';
        }

        if($(this).find('input#numero-registrazione-et-ministeriale').val() != ''){
            StringaFiltri = StringaFiltri + ' "RegistrationNumber" : ' + $(this).find('input#numero-registrazione-et-ministeriale').val() + ' ,';
        }

        if($(this).find('input#data-registrazione').val() != ''){
            StringaFiltri = StringaFiltri + ' "RegistrationDateStart" : "' + $(this).find('input#data-registrazione').val() + '" ,';
        }

        if($(this).find('input#data-registrazione-end').val() != ''){
            StringaFiltri = StringaFiltri + ' "RegistrationDateEnd" : "' + $(this).find('input#data-registrazione-end').val() + '" ,';
        }

        if($(this).find('select#principio-attivo').val() != ''){
            StringaFiltri = StringaFiltri + ' "PrincipioAttivoId" : ' + $(this).find('select#principio-attivo').val() + ' ,';
        }

        if($(this).find('select#formulazione').val() != ''){
            StringaFiltri = StringaFiltri + ' "FormulationId" : ' + $(this).find('select#formulazione').val() + ' ,';
        }

        if($(this).find('select#numero-onu-adr').val() != ''){
            StringaFiltri = StringaFiltri + ' "IdNumeroOnuAdr" : ' + $(this).find('select#numero-onu-adr').val() + ' ,';
        }

        if($(this).find('select#biologico').val() != ''){
            StringaFiltri = StringaFiltri + ' "Bio" : ' + $(this).find('select#biologico').val() + ' ,';
        }

        if($(this).find('select#biorazionale').val() != ''){
            StringaFiltri = StringaFiltri + ' "Biorazionale" : ' + $(this).find('select#biorazionale').val() + ' ,';
        }

        if($(this).find('select#idrosolubile').val() != ''){
            StringaFiltri = StringaFiltri + ' "Idrosolubile" : ' + $(this).find('select#idrosolubile').val() + ' ,';
        }

        if($(this).find('select#mater-bi').val() != ''){
            StringaFiltri = StringaFiltri + ' "Materbi" : ' + $(this).find('select#mater-bi').val() + ' ,';
        }

        if($(this).find('select#iva').val() != ''){
            StringaFiltri = StringaFiltri + ' "IvaId" : ' + $(this).find('select#iva').val() + ' ,';
        }

        if($(this).find('select#ecotassa-legge').val() != ''){
            StringaFiltri = StringaFiltri + ' "EtaxId" : ' + $(this).find('select#ecotassa-legge').val() + ' ,';
        }

        if($(this).find('select#catalogo').val() != ''){
            StringaFiltri = StringaFiltri + ' "Catalog" : ' + $(this).find('select#catalogo').val() + ' ,';
        }

        if($(this).find('select#sito').val() != ''){
            StringaFiltri = StringaFiltri + ' "Site" : ' + $(this).find('select#sito').val() + ' ,';
        }

        if($(this).find('select#sumilist').val() != ''){
            StringaFiltri = StringaFiltri + ' "Listino" : ' + $(this).find('select#sumilist').val() + ' ,';
        }

        if($(this).find('input#data-creazione').val() != ''){
            StringaFiltri = StringaFiltri + ' "CreatedStart" : "' + $(this).find('input#data-creazione').val() + '" ,';
        }

        if($(this).find('input#data-creazione-fine').val() != ''){
            StringaFiltri = StringaFiltri + ' "CreatedEnd" : "' + $(this).find('input#data-creazione-fine').val() + '" ,';
        }

        if($(this).find('input#data-ultima-modifica-start').val() != ''){
            StringaFiltri = StringaFiltri + ' "ModifiedStart" : "' + $(this).find('input#data-ultima-modifica-start').val() + '" ,';
        }

        if($(this).find('input#data-ultima-modifica').val() != ''){
            StringaFiltri = StringaFiltri + ' "ModifiedEnd" : "' + $(this).find('input#data-ultima-modifica').val() + '" ,';
        }

        var regulatory_adviceClp_id = new Array();
        var regulatory_adviceClpJson = '';
        var regulatory_adviceClpJsonString = "";

        $("input:checkbox[name=Pericolo]:checked").each(function(){ regulatory_adviceClp_id.push($(this).val()); });

        if(regulatory_adviceClp_id.length > 0) {
            $.each(regulatory_adviceClp_id, function(index, value){
                regulatory_adviceClpJson = regulatory_adviceClpJson + value + ',' ;
            });
            regulatory_adviceClpJson = regulatory_adviceClpJson.slice(0, -1);

            StringaFiltri = StringaFiltri + ' "AdviceClpId" : ' + regulatory_adviceClpJson + ' ,';
        }

        var regulatory_frasiH_id = new Array();
        var regulatory_frasiHJson = '';
        $("input:checkbox[name=frasiH]:checked").each(function(){ regulatory_frasiH_id.push($(this).val()); });

        if(regulatory_frasiH_id.length > 0) {
            $.each(regulatory_frasiH_id, function(index, value){
              if(value!=''){
                regulatory_frasiHJson = regulatory_frasiHJson + value + ',' ;
              }
            });
            regulatory_frasiHJson = regulatory_frasiHJson.slice(0, -1);

            StringaFiltri = StringaFiltri + '"ProductHazardCodeClpIds" : [ ' + regulatory_frasiHJson + ' ] ,';
        }

        var regulatory_indicazioniPericoloCLP_id = new Array();
        var regulatory_indicazioniPericoloCLPJson = '';
        $("input:checkbox[name=pittogrammi]:checked").each(function(){ regulatory_indicazioniPericoloCLP_id.push($(this).val()); });

        if(regulatory_indicazioniPericoloCLP_id.length > 0) {
            $.each(regulatory_indicazioniPericoloCLP_id, function(index, value){
                regulatory_indicazioniPericoloCLPJson = regulatory_indicazioniPericoloCLPJson + value + ',' ;
            });
            regulatory_indicazioniPericoloCLPJson = regulatory_indicazioniPericoloCLPJson.slice(0, -1);

            StringaFiltri = StringaFiltri + ' "PictogramHazardClpIds" : [ ' + regulatory_indicazioniPericoloCLPJson + ' ] ,';
        }

        StringaFiltri = StringaFiltri.slice(0, -1);
        StringaFiltri = StringaFiltri + '}';

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Report/GetReportCodiceProdotto",
                dataType: "json",
                data: JSON.parse(StringaFiltri),
                success: function (result) {
                    var data = result.data;

                    if(data == ''){
                        $("#error").html('Nessun risultato trovato');
                    }else{
                        $("#error").html('Report pronto e in download.');
                        JSONToCSVConvertor(data, "Report", true);
                    }
                },
                error: function (request, status, errorThrown){
                    $("#error").html('Impossibile creare il report.<br>' + error);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            });
    });








    function check_uncheck_checkbox(isChecked) {
      	if(isChecked) {
      		$('.selezionah').each(function() {
      			this.checked = true;
      		});
      	} else {
      		$('.selezionah').each(function() {
      			this.checked = false;
      		});
      	}
    }
</script>
@stop
