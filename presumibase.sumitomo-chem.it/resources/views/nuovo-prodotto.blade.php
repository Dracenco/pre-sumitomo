<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
</script>
@extends('layout.header')
@section('title', 'Nuovo prodotto')
@section('content')
@include('layout.menu')

<section id="content-scheda-prodotto" data-equalizer-watch>
    <div class="row prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo url('elenco-prodotti'); ?>">Prodotti</a></li>
                    <li class="disabled">Nuovo prodotto</li>
                </ul>
            </nav>
        </div>
    </div>

    @if ($ruoli['nuovo prodotto'] == 'F' || $ruoli['nuovo prodotto'] == 'W')
    <div class="row">
        <div class="medium-12 large-12 columns">
            <div class="scheda-nuovo-prodotto">
                <div class="row collapse">
                    <div class="medium-12 large-12 columns"><h1>Crea prodotto</h1></div>
                </div>
                <div class="expanded row">
                    <div class="medium-12 large-12 columns"><div id="error"></div></div>
                </div>

                <form class="nuovo_prodotto" method="post">
                    <div class="row">
                        <div class="large-3 columns">
                            <label>Nome prodotto<sup>&#42;</sup><input type="text" name="nome-prodotto" id="nome-prodotto"></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Logo prodotto</label>
                            <label for="custom-file-upload" class="filupp">
                                <span class="filupp-file-name js-value"></span>
                                <input type="file" name="logo" value="1" id="custom-file-upload"/>
                            </label>
                        </div>
                        <div class="large-3 columns">
                            <label>Linea distributiva<sup>&#42;</sup><select name="linea-distributiva" id="linea-distributiva"><option value="">Scegli</option></select></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Product Manager<sup>&#42;</sup><select name="pm" id="pm"><option value="">Scegli</option></select></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                            <label>Famiglia<sup>&#42;</sup><select name="famiglia" id="famiglia"><option value="">Scegli</option></select></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Sotto famiglia<sup>&#42;</sup><select name="sotto-famiglia" id="sotto-famiglia"><option value="">Scegli</option></select></label>
                        </div>
                        <div class="large-3 columns end">
                            <label>Fornitore<select name="fornitore" id="fornitore"><option value="">Scegli</option></select></label>
                        </div>
                    </div>

                    <div class="row">
                        <div id="a"></div>
                        <div class="riga-nuovo-principio-attivo" id="riga-0">
                            <div id="concatena-principio-0"></div>
                            <div id="datafor"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-3 columns">
                            <label>Numero di registrazione<input type="text" name="numero-registrazione" id="numero-registrazione"></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Data registrazione<input type="date" name="data-registrazione" id="data-registrazione"></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Composizione<input type="text" name="composizione" id="composizione"></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Formulazione<select name="formulazione" id="formulazione"><option value="">Scegli</option></select></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label>Miscibilit&agrave;<textarea name="miscibilita" id="miscibilita"></textarea></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label>Descrizione sintetica<textarea name="descrizione-sintetica" id="descrizione-sintetica"></textarea></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label>Caratteristiche<textarea name="caratteristiche" id="caratteristiche"></textarea></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label>Meccanismi d'azione<textarea name="meccanismo-azione" id="meccanismo-azione"></textarea></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label>Indicazioni corretto impiego<textarea name="corretto-impiego" id="corretto-impiego"></textarea></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                            <label>Catalogo
                                <select name="catalogo" id="catalogo">
                                    <option value="">Scegli</option>
                                    <option value="true">Si</option>
                                    <option value="false">No</option>
                                </select>
                            </label>
                        </div>
                        <div class="large-3 columns">
                            <label>Sito
                                <select name="sito" id="sito">
                                    <option value="">Scegli</option>
                                    <option value="true">Si</option>
                                    <option value="false">No</option>
                                </select>
                            </label>
                        </div>
                        <div class="large-3 columns end">
                            <label>Sumilist
                                <select name="sumilist" id="sumilist">
                                    <option value="">Scegli</option>
                                    <option value="true">Si</option>
                                    <option value="false">No</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                            <label>IVA<select name="iva" id="iva"><option value="">Scegli</option></select></label>
                        </div>
                        <div class="large-3 columns end">
                            <label>Ecotassa per legge<select name="ecotassa-legge" id="ecotassa-legge"><option value="">Scegli</option></select></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row medium-up-2 large-up-4" id="loghi-bio">
                                <div class="column column-block">
                                    <span>Biologico</span><img src="{{ URL::asset('img/bio.png') }}" class="thumbnail biologico">
                                    <div class="check-loghi-bio" id="bio"><input type="checkbox" name="bio" value="si"></div>
                                </div>
                                <div class="column column-block">
                                   <span>Biorazionale</span><img src="{{ URL::asset('img/logo-biorazionale.png') }}" class="thumbnail" style="margin-top:19px;">
                                    <div class="check-loghi-bio" id="biorazionale"><input type="checkbox" name="biorazionale" value="si"></div>
                                </div>
                                <div class="column column-block">
                                    <span>Idrosolubile</span><img src="{{ URL::asset('img/idrosolubile.png') }}" class="thumbnail idrosolubile">
                                    <div class="check-loghi-bio" id="idrosolubile"><input type="checkbox" name="idrosolubile" value="si"></div>
                                </div>
                                <div class="column column-block">
                                    <span>MATER-BI</span><img src="{{ URL::asset('img/materbi_on.png') }}" class="thumbnail" style="margin-top:21px;">
                                    <div class="check-loghi-bio" id="materbi"><input type="checkbox" name="materbi_on" value="si"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="accordion" data-accordion>
                        <li class="accordion-item is-active" data-accordion-item>
                            <a href="#" class="accordion-title">Regulatory</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info">
                                    <div class="row collapse">
                                        <div class="medium-12 large-4 columns"><span>Indicazioni di Pericolo</span></div>
                                        <div class="large-12 columns">
                                            <div class="row large-up-12" id="indicazioni-pericolo"></div>
                                        </div>
                                    </div>
                                    <div class="row collapse">
                                        <div class="large-12 columns"><span>Avvertenze</span></div>
                                        <div id="avvertenze"></div>
                                    </div>
                                    <div class="row collapse" id="frasi-h">
                                        <div class="large-12 columns"><span>Frasi H</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="large-2 columns">
                                          <label>Data Tracciabilit&agrave;<input type="date" name="data-tracciabilita" id="data-tracciabilita"></label>
                                        </div>
                                        <div class="large-4 columns">
                                          <label>Titolare Registrazione<select name="titolare-registrazione" id="titolare-registrazione"><option value="">Scegli</option></select></label>
                                        </div>
                                        <div class="large-2 columns">
                                            <label>Scadenza titolare<input type="date" name="scadenza-titolare" id="data-scadenza-titolare"></label>
                                        </div>
                                        <div class="large-2 columns">
                                            <label>Scadenza rivenditore<input type="date" name="scadenza-rivenditore" id="data-scadenza-rivenditore"></label>
                                        </div>
                                        <div class="large-2 columns">
                                            <label>Scadenza impiego<input type="date" name="scadenza-impiego" id="data-scadenza-impiego"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-6 columns">
                                          <label>Note scadenza<textarea name="note-scadenza" id="note-scadenza"></textarea></label>
                                        </div>
                                        <div class="large-6 columns">
                                          <label>Note regulatory<textarea name="note-regulatory" id="note-regulatory"></textarea></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item is-active" data-accordion-item>
                            <a href="#" class="accordion-title">ADR Trasporto</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info">
                                    <div class="row ">
                                        <div class="large-6 columns">
                                          <label>Titolare commercio<select name="titolare-commercio" id="titolare-commercio"><option value="">Scegli</option></select></label>
                                        </div>
                                        <div class="large-6 columns">
                                          <label>Densit&agrave;:&nbsp;<input type="text" name="densita" id="densita"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns">
                                            <label>Gruppo imballaggio ADR<select name="gruppo-imballaggio-adr" id="gruppo-imballaggio-adr"><option value="">Scegli</option></select></label>
                                        </div>
                                        <div class="large-3 columns">
                                          <label>Numero ONU ADR<select name="numero-onu-adr" id="numero-onu-adr"><option value="">Scegli</option></select></label>
                                        </div>
                                        <div class="large-3 columns">
                                            <label>Classe ADR<select name="classe-adr" id="classe-adr"><option value="">Scegli</option></select></label>
                                        </div>
                                        <div class="large-3 columns end">
                                            <label>Esenzione quantit&agrave; limitata
                                             <select name="esenzione-quantita-limitata" id="esenzione-quantita-limitata">
                                                 <option value="">Scegli</option>
                                                 <option value="true">Si</option>
                                                 <option value="false">No</option>
                                             </select>
                                          </label>
                                        </div>
                                    </div>
                                    <div class="row collapse" id="classificazione-seveso">
                                        <div class="large-12 columns"><span>Classificazione Seveso</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="large-6 columns">
                                          <label>Principio Attivo Responsabile della Pericolosit&agrave; ADR<textarea name="pericolosita-adr" id="pericolosita-adr"></textarea></label>
                                        </div>
                                        <div class="large-6 columns">
                                          <label>Note Supply Chain e Sicurezza<textarea name="note-supply-chain" id="note-supply-chain"></textarea></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                        <a href="" class="pulsante-annulla">ANNULLA</a>
                    </div>
                </form>
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
        beforeSend: function (request){
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result){
            $.each(result.data, function(index, value){ $("ul.menu").append('<li> <a href="{!! url("prodotti") !!}' + '/' + value.id + '" >' + value.name + '</a></li>'); });
        },
        error: function (request, status, errorThrown){}
    });

    var int=2;
    $("#datafor").append('<div class="large-12 columns"><div data-for="principio-0-' + (int - 1) + '" class="add-riga-principio more">+</div><span id="label-id-avversita">Aggiungi principio attivo</span></div>');

    $(document).on('click', 'div.add-riga-principio', function(){
        var principioattivoMore = '';
        var riga = $(this).attr("data-for");
        var res = riga.split("-");

        var NumeroRighePrincipi=$("select[class^='scelta-principio-attivo-0-']").last().attr("class");
        var resRighePrincipi = NumeroRighePrincipi.split("-");
        var num = Number(resRighePrincipi[4]) + 1;

        $('div#riga-' + res[1] + ' .add-riga-principio').attr('data-for','principio-' + res[1] + '-' + num + '');
        $('div#concatena-principio-' + res[1]).append('<div id="principio-' + res[1] + '-' + num + '"><div class="large-3 columns"><label>Principio attivo<select name="scelta-principio-attivo-' + res[1] + '-' + num + '" class="scelta-principio-attivo-' + res[1] + '-' + num + '"><option value="">Scegli</option></select></label></div></div>');

        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPrincipioAttivo",
            async:false,
            success: function (result) {
              $.each(result.data, function(index, value){
                  principioattivoMore = principioattivoMore + '<option value="' + value.id + '">' + value.name + '</option>'
              });
                $("select.scelta-principio-attivo-" + res[1] + '-' + num ).append(principioattivoMore);
            },
            error: function (request, status, errorThrown){}
        });
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

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCompany",
        success: function (result) {
            $.each(result.data, function(index, value){ linea_distributiva = linea_distributiva + '<option value="' + value.id + '" >' + value.name + '</option>' });
            $("select#linea-distributiva").append(linea_distributiva);
        },
        error: function (request, status, errorThrown) {}
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
            $.each(result.data, function(index, value){ famiglia = famiglia + '<option value="' + value.id + '" >' + value.name + '</option>' });
            $("select#famiglia").append(famiglia);
        },
        error: function (request, status, errorThrown){}
    });

    $('select#famiglia').on('change', function() {
        var categoryid = this.value;
        $("#sotto-famiglia").html('');
        sottofamiglia = '';

        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetSubCategoryForCategory?categoryid=" + categoryid,
            async:false,
            success: function (result) {
                $.each(result.data, function(index, value){ sottofamiglia = sottofamiglia + '<option value="' + value.id + '" >' + value.symbol + ' - ' + value.name + '</option>' });
                $("#sotto-famiglia").append(sottofamiglia);
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
            $.each(result.data, function(index, value){ pm = pm + '<option value="' + value.id + '" >' + value.name + '</option>' });
            $("select#pm").append(pm);
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
            $.each(result.data, function(index, value){ fornitore = fornitore + '<option value="' + value.id + '" >' + value.name + '</option>' });
            $("select#fornitore").append(fornitore);
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

    var IntPrincAttivi = 1;
    $.ajax({
          type: "GET",
          beforeSend: function (request) {
              request.setRequestHeader("Authorization", "Bearer " + token );
              request.setRequestHeader("lang", "it");
          },
          url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPrincipioAttivo",
          success: function (result) {
              $.each(result.data, function(indexP, valueP){
                  principioattivo = principioattivo + '<option value="' + valueP.id + '" ' + '>' + valueP.name + '</option>';
              });
              $('div#a').append('<div id="principio-0-' + IntPrincAttivi + '"><div class="large-3 columns"><label>Principio attivo<select name="scelta-principio-attivo-0-' + IntPrincAttivi + '" class="scelta-principio-attivo-0-' + IntPrincAttivi + '"><option value="">Scegli</option>' + principioattivo + '</select></label></div></div>');

          },
          error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=formulation&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){ formulazioneprodotto= formulazioneprodotto + '<option value="' + value.value + '" >' + value.name + ' - ' + value.description + '</option>'; });
            $("select#formulazione").append(formulazioneprodotto);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllIVA",
        success: function (result) {
            $.each(result.data, function(index, value){ ivaprodotto = ivaprodotto + '<option value="' + value.id + '" >' + value.name + '</option>' });
            $("select#iva").append(ivaprodotto);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllEtax",
        success: function (result) {
            $.each(result.data, function(index, value){ ecotaxprodotto = ecotaxprodotto + '<option value="' + value.id + '" >' + value.name + '</option>' });
            $("select#ecotassa-legge").append(ecotaxprodotto);
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
            $.each(result.data, function(index, value){ trademarkProdotto= trademarkProdotto + '<option value="' + value.id + '" >' + value.name + ' - ' + value.description + '</option>'; });   $("select#titolare-registrazione").append(trademarkProdotto);
        },
        error: function (request, status, errorThrown){}
    });

    var holdertradeProdotto = '';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
        success: function (result) {
            $.each(result.data, function(index,value){ holdertradeProdotto= holdertradeProdotto + '<option value="' + value.id + '" >' + value.name + ' - ' + value.description + '</option>'; }); $("select#titolare-commercio").append(holdertradeProdotto);
        },
        error: function (request, status, errorThrown){}
    });

    var checkFrasiH = '';
    var checkFrasiHArray = new Array();
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=hazard_code_clp&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){ checkFrasiHArray.push('<div class="riga-frasi-h"><input type="checkbox" name="frasiH" value="' + value.value + '" ><span>' + value.name + '</span></div>'); });

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
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllAdviceClp",
        success: function (result) {
            $.each(result.data, function(index, value){ avvertenze = avvertenze + '<div class="large-3 columns"><input type="checkbox" name="Pericolo" value="' + value.id + '"><span>' + value.name + '</span></div>'; });
            $("div#avvertenze").append(avvertenze);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=packing_group&all=true",
        success: function (result) {
            $.each(result.data, function(index, value){ gruppo_imballaggio_adr= gruppo_imballaggio_adr + '<option value="' + value.value + '" >' + value.name + '</option>'; });
            $("select#gruppo-imballaggio-adr").append(gruppo_imballaggio_adr);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=trasportation_code&all=true",
        success: function (result){
            $.each(result.data, function(index, value){ trasportation_code= trasportation_code + '<option value="' + value.value + '" >' + value.name + '</option>'; });
            $("select#numero-onu-adr").append(trasportation_code);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=adrclassification&all=true",
        success: function (result){
            $.each(result.data, function(index, value){ adrclassification= adrclassification + '<option value="' + value.value + '" >' + value.name + '</option>'; });
            $("select#classe-adr").append(adrclassification);
        },
        error: function (request, status, errorThrown){}
    });

    var CSevesoCLPArray = new Array();
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=classificazione_seveso&all=false",
        success: function (result) {
            $.each(result.data, function(index, value){ CSevesoCLPArray.push('<div class="riga-frasi-h"><input type="checkbox" name="seveso" value="' + value.value + '"><span>' + value.name + '</span></div>'); });

            var lenghtCSevesoCLPArray = CSevesoCLPArray.length;
            var colonneCSevesoCLPArray = '';
            var i = 1;

            lenghtCSevesoCLPArray = parseInt((lenghtCSevesoCLPArray/4) + 1);

            $.each(CSevesoCLPArray, function(index, value){
                if(i==1){ colonneCSevesoCLPArray = colonneCSevesoCLPArray + '<div class="large-3 columns">'; }

                colonneCSevesoCLPArray = colonneCSevesoCLPArray + value ;

                i = i + 1;
                if(i>lenghtCSevesoCLPArray){
                    colonneCSevesoCLPArray = colonneCSevesoCLPArray + '</div>';
                    i=1;
                }
            });
            $("div#classificazione-seveso").append(colonneCSevesoCLPArray);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.nuovo_prodotto', function(e){
       e.preventDefault();

        var logo = '';
        var validazionecampi = true;
        var error ='';
        var data = new FormData();
        var files = $("#custom-file-upload").get(0).files;

        if(files.length==1){
            myObj = { "CreatedBy": utente , "FileType": {"ID": 6} };
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
                async:false,
                contentType: false,
                processData: false,
                data: data,
                success: function (result) {
                    if(result.returnCode == '-1'){ $(".error-logo").html('Impossibile caricare il logo');
                    }else{ logo= '"logo": { "id": ' + result.data + ' },'; }
                },
                error: function (request, status, errorThrown){}
            });
        }

       var lastmodifiedby = utente;

       if($(this).find('input#nome-prodotto').val() != ''){
            var name = $(this).find('input#nome-prodotto').val();
       }else{
            var name = '';
            validazionecampi = false;
            error = error + "Nome prodotto richiesto<br>";
       }

       if($(this).find('textarea#note-supply-chain').val() != ''){
            var NoteSupplyChainESicurezza = JSON.stringify($(this).find('textarea#note-supply-chain').val());
       }else{
            var NoteSupplyChainESicurezza = '""';
       }

       if($(this).find('select#esenzione-quantita-limitata').val() != ''){
            var EsenzioneQuantitaLimitata = $(this).find('select#esenzione-quantita-limitata').val();
       }else{
            var EsenzioneQuantitaLimitata = 'false';
       }

       if($(this).find('textarea#meccanismo-azione').val() != ''){
            var MeccanismiDiAzione = JSON.stringify($(this).find('textarea#meccanismo-azione').val());
       }else{
            var MeccanismiDiAzione = '""';
       }

       if($(this).find('select#sito').val() != ''){
            var site = $(this).find('select#sito').val();
       }else{
            var site = 'false';
       }

       if($(this).find('select#catalogo').val() != ''){
            var catalog = $(this).find('select#catalogo').val();
       }else{
            var catalog = 'false';
       }

       if($(this).find('select#sumilist').val()){
            var sumilist = $(this).find('select#sumilist').val();
       }else{
            var sumilist = 'false';
       }

       if("input:checkbox[name=bio]:checked"){
           var bio = "true";
       }else{
           var bio = "false";
       }

       if($("input:checkbox[name=biorazionale]:checked").is(':checked')){
           var biorazionale = "true";
       }else{
           var biorazionale = "false";
       }

       if($("input:checkbox[name=idrosolubile]:checked").is(':checked')){
           var idrosolubile = "true";
       }else{
           var idrosolubile = "false";
       }

       if($("input:checkbox[name=materbi_on]:checked").is(':checked')){
           var materbi = "true";
       }else{
           var materbi = "false";
       }

       var now = new Date();
       var d = now.getDate();
       var m =  now.getMonth();
       m += 1;
       var y = now.getFullYear();
       var createdDate = y + '-' + m + '-' + d + 'T00:00:00';

       if($(this).find('input#data-registrazione').val() != ''){
           var registrationDate = $(this).find('input#data-registrazione').val();
       }else{
           var registrationDate = "0000-00-00T00:00:00";
       }

       if($(this).find('input#numero-registrazione').val() != ''){
          var registrationNumber = '"registrationNumber" : "' + $(this).find('input#numero-registrazione').val() + '",';
       }else{
           var registrationNumber = '';
       }

       if($(this).find('input#composizione').val() != ''){
           var composition = JSON.stringify($(this).find('input#composizione').val());
       }else{
           var composition = '""';
       }

       if($(this).find('textarea#miscibilita').val() != ''){
           var miscibilita = JSON.stringify($(this).find('textarea#miscibilita').val());
       }else{
           var miscibilita = '""';
       }

       if($(this).find('textarea#descrizione-sintetica').val() != ''){
           var shortDescription = JSON.stringify($(this).find('textarea#descrizione-sintetica').val());
       }else{
           var shortDescription = '""';
       }

       if($(this).find('textarea#caratteristiche').val() != ''){
           var characteristics = JSON.stringify($(this).find('textarea#caratteristiche').val());
       }else{
           var characteristics = '""';
       }

       if($(this).find('textarea#corretto-impiego').val() != ''){
           var indicationUse = JSON.stringify($(this).find('textarea#corretto-impiego').val());
       }else{
           var indicationUse = '""';
       }

       if($(this).find('select#linea-distributiva').val() != ''){
           var company = '"Company" : { "id" : ' + $(this).find('select#linea-distributiva').val() + ' },';
       }else{
           var company = '';
       }

       if($(this).find('select#pm').val() != ''){
           var productManager = '"productManager" : { "id" : ' + $(this).find('select#pm').val() + ' },';
       }else{
           var productManager = '';
       }

       if($(this).find('select#titolare-commercio').val() != ''){
           var Holdertrade = '"Holdertrade" : { "id" : ' + $(this).find('select#titolare-commercio').val() + ' },';
       }else{
           var Holdertrade = '';
       }

       if($(this).find('select#titolare-registrazione').val() != ''){
           var Trademark = '"Trademark" : { "id" : ' + $(this).find('select#titolare-registrazione').val() + ' },';
       }else{
           var Trademark = '';
       }

       /*if($(this).find('select#principio-attivo').val() != ''){
           var principiAttivi = '"principiAttivi" : [ { "id" : ' + $(this).find('select#principio-attivo').val() + ' } ],';
       }else{
           var principiAttivi = '';
       }*/

       /*principi attivi*/
       var principiAttivi = '';
       var NumeroRighePrincipi=$("select[class^='scelta-principio-attivo-0-']").last().attr("class");
       var resRighePrincipi = NumeroRighePrincipi.split("-");
       NumeroRighePrincipi = resRighePrincipi[4];

       var NumPrincipiAttivi=1;
       var arrayPrincipioAttivo = '';

       while(NumPrincipiAttivi <= NumeroRighePrincipi){
         var principioId=$('select[name="scelta-principio-attivo-0-' + NumPrincipiAttivi + '"]').val();

         if(principioId != ''){ arrayPrincipioAttivo = arrayPrincipioAttivo + '{ "id" : "' + principioId + '" },'; }
         NumPrincipiAttivi++;
       }

       arrayPrincipioAttivo = arrayPrincipioAttivo.slice(0, -1);

       principiAttivi = '"principiAttivi" : [ ' + arrayPrincipioAttivo + ' ],';
       /*fine principi attivi*/

       if($(this).find('select#formulazione').val() != ''){
           var formulation = '"formulation" : { "id" : ' + $(this).find('select#formulazione').val() + ' },';
       }else{
           var formulation = '';
       }

       if($(this).find('select#famiglia').val() != ''){
           var categoria = '"categoria" : { "id" : ' + $(this).find('select#famiglia').val() + ' },';
       }else{
           var categoria = '';
           validazionecampi = false;
           error = error + "Campo famiglia richiesto<br>";
       }

       if($(this).find('select#sotto-famiglia').val() != ''){
           var subCategoria = '"subCategoria" : { "id" : ' + $(this).find('select#sotto-famiglia').val() + ' },';
       }else{
           var subCategoria = '';
           validazionecampi = false;
           error = error + "Campo Sotto famiglia richiesto<br>";
       }

       if($(this).find('select#fornitore').val() != ''){
           var provider = '"provider" : { "id" : ' + $(this).find('select#fornitore').val() + ' },';
       }else{
           var provider = '';
       }

       if($(this).find('select#iva').val() != ''){
           var iva = '"iva" : { "id" : ' + $(this).find('select#iva').val() + ' },';
       }else{
           var iva = '';
       }

       if($(this).find('select#ecotassa-legge').val() != ''){
           var etax = '"etax" : { "id" : ' + $(this).find('select#ecotassa-legge').val() + ' },';
       }else{
           var etax = '';
       }

       if($(this).find('textarea#note-scadenza').val() != ''){
           var regulatory_NoteScadenza = JSON.stringify($(this).find('textarea#note-scadenza').val());
       }else{
           var regulatory_NoteScadenza = '""';
       }

       if($(this).find('textarea#note-regulatory').val() != ''){
           var regulatory_NoteRegulatory = JSON.stringify($(this).find('textarea#note-regulatory').val());
       }else{
           var regulatory_NoteRegulatory = '""';
       }

       if($(this).find('input#data-tracciabilita').val() != ''){
           var regulatory_DataTracciabilita = $(this).find('input#data-tracciabilita').val();
       }else{
           var regulatory_DataTracciabilita = "0000-00-00T00:00:00";
       }

       if($(this).find('input#data-scadenza-titolare').val() != ''){
           var regulatory_deadlineOwner = $(this).find('input#data-scadenza-titolare').val();
       }else{
           var regulatory_deadlineOwner = "0000-00-00T00:00:00";
       }

       if($(this).find('input#data-scadenza-rivenditore').val() != ''){
           var regulatory_deadlineSeller = $(this).find('input#data-scadenza-rivenditore').val();
       }else{
           var regulatory_deadlineSeller = "0000-00-00T00:00:00";
       }

       if($(this).find('input#data-scadenza-impiego').val() != ''){
           var regulatory_deadlineUse = $(this).find('input#data-scadenza-impiego').val();
       }else{
           var regulatory_deadlineUse = "0000-00-00T00:00:00";
       }

       var regulatory_adviceClp_id = new Array();
       var regulatory_adviceClpJson = '';
       var regulatory_adviceClpJsonString = "";

       $("input:checkbox[name=Pericolo]:checked").each(function(){ regulatory_adviceClp_id.push($(this).val()); });
       if(regulatory_adviceClp_id.length > 0) {
           $.each(regulatory_adviceClp_id, function(index, value){
               regulatory_adviceClpJson = '{ "id": ' + value + '}' ;
               regulatory_adviceClpJsonString = '"adviceClp" : ' + regulatory_adviceClpJson + ' ,';
           });
       }

       var regulatory_frasiH_id = new Array();
       var regulatory_frasiHJson = '';
       $("input:checkbox[name=frasiH]:checked").each(function(){ regulatory_frasiH_id.push($(this).val()); });
       if(regulatory_frasiH_id.length > 0) {
          $.each(regulatory_frasiH_id, function(index, value){ regulatory_frasiHJson = regulatory_frasiHJson + '{ "id": ' + value + '},' ; });
          regulatory_frasiHJson = regulatory_frasiHJson.slice(0, -1);

          var regulatory_frasiHJsonString = '"frasiH": [ ' + regulatory_frasiHJson + ' ],';
       }else{
           var regulatory_frasiHJsonString = "";
       }

       var regulatory_indicazioniPericoloCLP_id = new Array();
       var regulatory_indicazioniPericoloCLPJson = '';
       $("input:checkbox[name=pittogrammi]:checked").each(function(){ regulatory_indicazioniPericoloCLP_id.push($(this).val()); });
       if(regulatory_indicazioniPericoloCLP_id.length > 0) {
           $.each(regulatory_indicazioniPericoloCLP_id, function(index, value){ regulatory_indicazioniPericoloCLPJson = regulatory_indicazioniPericoloCLPJson + '{ "id": ' + value + '},' ; });
           regulatory_indicazioniPericoloCLPJson = regulatory_indicazioniPericoloCLPJson.slice(0, -1);
           var regulatory_indicazioniPericoloCLPJsonString = '"indicazioniPericoloCLP": [ ' + regulatory_indicazioniPericoloCLPJson + ' ],';
       }else{
           var regulatory_indicazioniPericoloCLPJsonString = "";
       }

       if($(this).find('input#densita').val() != ''){
           var adrTrasporto_densita = '"densita" : "' + $(this).find('input#densita').val() + '",';
       }else{
           var adrTrasporto_densita = '';
       }

       if($(this).find('select#gruppo-imballaggio-adr').val() != ''){
           var adrTrasporto_GruppoImballaggio = '"GruppoImballaggio": "' + $(this).find('select#gruppo-imballaggio-adr').val() + '",';
       }else{
           var adrTrasporto_GruppoImballaggio = '';
       }

       if($(this).find('select#classe-adr').val() != ''){
           var adrTrasporto_classeADR_id = '"classeADR" : { "id" : ' + $(this).find('select#classe-adr').val() + ' },';
       }else{
           var adrTrasporto_classeADR_id = '';
       }

       if($(this).find('textarea#pericolosita-adr').val() != ''){
           var adrTrasporto_PrincipioAttivoAdr = '"PrincipioAttivoAdr" : ' + JSON.stringify($(this).find('textarea#pericolosita-adr').val()) + ',';
       }else{
           var adrTrasporto_PrincipioAttivoAdr = '';
       }

       if($(this).find('select#numero-onu-adr').val() != ''){
           var adrTrasporto_NumeroOnuAdr = '"NumeroOnuAdr" : "' + $(this).find('select#numero-onu-adr').val() + '",';
       }else{
           var adrTrasporto_NumeroOnuAdr = '';
       }

       var adrTrasporto_ClassificazioniSeveso = new Array();
       var adrTrasporto_ClassificazioniSevesoJson = '';
       $("input:checkbox[name=seveso]:checked").each(function(){ adrTrasporto_ClassificazioniSeveso.push($(this).val()); });

       if(adrTrasporto_ClassificazioniSeveso.length > 0) {
           $.each(adrTrasporto_ClassificazioniSeveso, function(index, value){ adrTrasporto_ClassificazioniSevesoJson = adrTrasporto_ClassificazioniSevesoJson + '{ "id": ' + value + '},' ; });   adrTrasporto_ClassificazioniSevesoJson = adrTrasporto_ClassificazioniSevesoJson.slice(0, -1);
           var adrTrasporto_ClassificazioniSevesoJsonString = '"ClassificazioniSeveso": [ ' + adrTrasporto_ClassificazioniSevesoJson + ' ]';
       }else{
           var adrTrasporto_ClassificazioniSevesoJsonString = '';
       }

       var adr = '';
       adr = adrTrasporto_classeADR_id + adrTrasporto_densita + adrTrasporto_GruppoImballaggio + adrTrasporto_PrincipioAttivoAdr + adrTrasporto_NumeroOnuAdr + adrTrasporto_ClassificazioniSevesoJsonString;

       if(adr.slice(-1) == ","){ adr = adr.slice(0, -1); }

       if(adr != ''){ adr = '"adrTrasporto": { ' + adr + ' },'; }

       var post_data='';

       post_data = '{ ' + company + productManager + Holdertrade + Trademark + ' "NoteSupplyChainESicurezza" : ' + NoteSupplyChainESicurezza + ', "EsenzioneQuantitaLimitata" : "' + EsenzioneQuantitaLimitata + '", "site" : "' + site + '", "catalog" : "' + catalog + '", "bio" : "' + bio + '" , "biorazionale" : "' + biorazionale + '", "idrosolubile" : "' + idrosolubile + '" , "materbi" : "' + materbi + '", ' + logo + ' "createdDate" : "' + createdDate + '", "lastModifiedDate" : "' + createdDate + '", "registrationDate" : "' + registrationDate + '", ' + principiAttivi + registrationNumber + ' "composition" : ' + composition + ', ' + formulation + ' "miscibilita" : ' + miscibilita + ', "shortDescription" : ' + shortDescription + ', "characteristics" : ' + characteristics + ', "indicationUse" : ' + indicationUse + ', ' + categoria + subCategoria + provider + iva + etax + ' "regulatory" : { ' + regulatory_adviceClpJsonString + ' "DataTracciabilita": "' + regulatory_DataTracciabilita + '", "NoteScadenza": ' + regulatory_NoteScadenza + ', "NoteRegulatory": ' + regulatory_NoteRegulatory + ',  "deadlineOwner" : "' + regulatory_deadlineOwner + '", "deadlineSeller" : "' + regulatory_deadlineSeller + '", "deadlineUse" : "' + regulatory_deadlineUse + '" , ' + regulatory_indicazioniPericoloCLPJsonString + regulatory_frasiHJsonString + ' "name" : null },'  + adr + ' "sumilist": "' + sumilist + '", "name": "' + name + '", "createdby" : "' + utente + '", "MeccanismiDiAzione" : ' + MeccanismiDiAzione + ' }';

       if(validazionecampi){
           $.ajax({
              type: "POST",
              beforeSend: function (request) {
                   request.setRequestHeader("Authorization", "Bearer " + token );
                   request.setRequestHeader("lang", "it");
              },
              url: "{{ config('constants.UrlWebService') }}api/Products/Create",
              dataType: "json",
              data: JSON.parse(post_data),
              success: function (result) {
                   if(result.returnCode != 0 ){ $("#error").html('Impossibile creare il prodotto: ' + result.errors);
                   }else{ $("#error").html('Nuovo prodotto correttamente creato'); }
                   $("html, body").animate({ scrollTop: 0 }, "slow");
                },
               error: function (request, status, errorThrown){
                    $("#error").html('Impossibile creare un nuovo prodotto.<br>' + error);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            });
       }else{
           $("#error").html('Impossibile creare un nuovo prodotto.<br>' + error);
           $("html, body").animate({ scrollTop: 0 }, "slow");
       }
    });

    function escapeSpecialChars(jsonString){
        return jsonString.replace(/\n/g, "\\n").replace(/\r/g, "\\r").replace(/\t/g, "\\t").replace(/\f/g, "\\f");
    }
</script>
@stop
