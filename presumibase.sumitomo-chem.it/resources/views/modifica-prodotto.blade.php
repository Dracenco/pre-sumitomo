<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
</script>

@extends('layout.header')
@section('title', 'Modifica prodotto')
@section('content')
@include('layout.menu')
<section id="content-scheda-prodotto">
    <div class="row prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                    <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                    <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="nome-prodotto"></a></li>
                    <li class="disabled">Modifica prodotto</li>
                </ul>
            </nav>
        </div>
    </div>
    @include('layout.menu-pulsanti-prodotto')
    <div class="expanded row">
        <div class="medium-12 large-12 columns">
            <div id="error"></div><div id="error" class="error-logo"></div>
        </div>
    </div>

    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
     <div class="row">
        <div class="medium-12 large-12 columns">
            <div class="scheda-nuovo-prodotto">
                <form class="modifica_prodotto" method="post">
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
                            <label>Catalogo<select name="catalogo" id="catalogo"><option value="">Scegli</option></select></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Sito<select name="sito" id="sito"><option value="">Scegli</option></select></label>
                        </div>
                        <div class="large-3 columns end">
                            <label>Sumilist<select name="sumilist" id="sumilist"><option value="">Scegli</option></select></label>
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
                                    <span>Biologico</span><img src="{{ URL::asset('img/bio.png') }}" class="thumbnail biologico" alt="">
                                    <div class="check-loghi-bio" id="divbio"></div>
                                </div>
                                <div class="column column-block">
                                    <span>Biorazionale</span><img src="{{ URL::asset('img/logo-biorazionale.png') }}" class="thumbnail" alt="" style="margin-top:19px;">
                                    <div class="check-loghi-bio" id="divbiorazionale"></div>
                                </div>
                                <div class="column column-block">
                                    <span>Idrosolubile</span><img src="{{ URL::asset('img/idrosolubile.png') }}" class="thumbnail idrosolubile" alt="">
                                    <div class="check-loghi-bio" id="dividrosolubile"></div>
                                </div>
                                <div class="column column-block">
                                    <span>MATER-BI</span><img src="{{ URL::asset('img/materbi_on.png') }}" class="thumbnail" alt="" style="margin-top:21px;">
                                    <div class="check-loghi-bio" id="divmaterbi"></div>
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
                                        <div class="large-6 columns">
                                          <label>Data Tracciabilit&agrave;<input type="date" name="data-tracciabilita" id="data-tracciabilita"></label>
                                        </div>
                                        <div class="large-6 columns">
                                          <label>Titolare Registrazione<select name="titolare-registrazione" id="titolare-registrazione"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-12 columns">
                                          <label>Note<textarea name="note-scadenza" id="note-scadenza"></textarea></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion-item is-active" data-accordion-item>
                            <a href="#" class="accordion-title">ADR Trasporto</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info">
                                    <div class="row">
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
                                            <label>Esenzione quantit&agrave; limitata<select name="esenzione-quantita-limitata" id="esenzione-quantita-limitata"><option value="">Scegli</option></select></label>
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
                        <li class="accordion-item is-active" data-accordion-item>
                            <a href="#" class="accordion-title">Propagazione modifiche</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info codici-prodotto-scheda-prodotto" style="padding:0px">
                                 <div class="expanded row" style="border-bottom:0px;padding:0px">
                                     <div class="medium-12 large-12 columns" style="margin-bottom:0px">
                                        <div class="row collapse" style="border:0;padding:0px">
                                            <div class="medium-12 large-12 columns" style="margin-bottom:0px">
                                                <table id="elenco-codici">
                                                    <thead>
                                                        <tr>
                                                            <th width="5"></th>
                                                            <th width="300">CODICE PRODOTTO</th>
                                                            <th width="300">CODICE SAP</th>
                                                            <th width="300">STATO</th>
                                                            <th >DATA ULTIMA MODIFICA</th>
                                                            <th width="200">CONFEZIONE</th>
                                                            <th width="200">PALLET</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                     </div>
                                 </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="large-12 columns">
                        <input type="hidden" class="idcodicelogo" id="idcodicelogo">
                        <input type="hidden" class="createdDate" id="createdDate">
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
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        async:false,
        success: function (result) {
            $.each(result.data, function(index, value){
                var categoria_attiva='';

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

    var select_string = '';
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
    var pittogrammiClp ='';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        async:false,
        success: function (result){
            var categoria_id=result.data.categoria.id;
            var subCategoria_id=result.data.subCategoria.id;
            var company_id=result.data.company.id;
            var pm_id=result.data.productManager.id;
            $("input.idcodicelogo").val(result.data.logo.id);
            $("input.createdDate").val(result.data.createdDate);

            if(result.data.registrationDate!='0001-01-01T00:00:00'){
                var data_di_registrazione=result.data.registrationDate;
                data_di_registrazione=data_di_registrazione.substring(0,10);
            }else{
                data_di_registrazione='';
            }

            if(result.data.regulatory.dataTracciabilita!=null){
                dataTracciabilita=result.data.regulatory.dataTracciabilita;
                dataTracciabilita=dataTracciabilita.substring(0,10);
            }

            if(result.data.regulatory.deadlineOwner!=null){
                dataScadenzaTitolare=result.data.regulatory.deadlineOwner;
                dataScadenzaTitolare=dataScadenzaTitolare.substring(0,10);
            }

            if(result.data.regulatory.deadlineSeller!=null){
                dataScadenzaRivenditore=result.data.regulatory.deadlineSeller;
                dataScadenzaRivenditore=dataScadenzaRivenditore.substring(0,10);
            }

            if(result.data.regulatory.deadlineUse!=null){
                dataScadenzaUso=result.data.regulatory.deadlineUse;
                dataScadenzaUso=dataScadenzaUso.substring(0,10);
            }

            var principiAttivi_id='';
            var gruppo_imballaggio_adr_id=result.data.adrTrasporto.gruppoImballaggio;
            var trasportation_code_id=result.data.adrTrasporto.numeroOnuAdr;

            var provider_id=result.data.provider.id;
            var formulation_id=result.data.formulation.id;
            var iva_id=result.data.iva.id;
            var etax_id=result.data.etax.id;
            var trademark=result.data.trademark.id
            var holdertrade=result.data.holdertrade.id

            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' /> <br />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $("a#nome-prodotto").append(result.data.name);
            $("#codice_identificativo").val(prodotto);
            $("input#nome-prodotto").val(result.data.name);

            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCompany",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(value.id == company_id){ select_string = 'selected="selected"'; }
                        linea_distributiva = linea_distributiva + '<option value="' + value.id + '" ' + select_string + '>' + value.name + '</option>'
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
                async:false,
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(value.id == categoria_id){ select_string = 'selected="selected"'; }
                        famiglia = famiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.name + '</option>'
                    });
                    $("select#famiglia").append(famiglia);
                },
                error: function (request, status, errorThrown){}
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
                            new_sottofamiglia = value.symbol;
                        }
                        sottofamiglia = sottofamiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.name + '</option>'
                    });
                    $("#sotto-famiglia").append(sottofamiglia);
                },
                error: function (request, status, errorThrown){}
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
                        select_string = '';
                        if(value.id == pm_id){ select_string = 'selected="selected"'; }
                        pm = pm + '<option value="' + value.id + '" ' + select_string + '>' + value.name + '</option>'
                    });
                    $("select#pm").append(pm);
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
                        select_string = '';
                        if(value.id == provider_id){ select_string = 'selected="selected"'; }
                        fornitore = fornitore + '<option value="' + value.id + '" ' + select_string + '>' + value.name + '</option>'
                    });
                    $("select#fornitore").append(fornitore);
                },
                error: function (request, status, errorThrown) {}
            });

            var IntPrincAttivi = 1;
            if(Object.keys(result.data.principiAttivi).length == 0 ){

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
            }

            $.each(result.data.principiAttivi, function(index, value){

              principiAttivi_id=value.id;

                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPrincipioAttivo",
                    async:false,
                    success: function (result) {
                        $.each(result.data, function(indexP, valueP){
                            select_string = '';
                            if(valueP.id == principiAttivi_id){ select_string = 'selected="selected"'; }
                            principioattivo = principioattivo + '<option value="' + valueP.id + '" ' + select_string + '>' + valueP.name + '</option>';
                        });
                        $('div#a').append('<div id="principio-0-' + IntPrincAttivi + '"><div class="large-3 columns"><label>Principio attivo<select name="scelta-principio-attivo-0-' + IntPrincAttivi + '" class="scelta-principio-attivo-0-' + IntPrincAttivi + '"><option value="">Scegli</option>' + principioattivo + '</select></label></div></div>');
                        principioattivo = '';
                    },
                    error: function (request, status, errorThrown){}
                });
                IntPrincAttivi++;
            });


            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=formulation&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(formulation_id == value.value){ select_string = 'selected="selected"'; }
                        formulazioneprodotto= formulazioneprodotto + '<option value="' + value.value + '" ' + select_string + '>' + value.name + ' - ' + value.description + '</option>';
                    });
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
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(value.id == iva_id){ select_string = 'selected="selected"'; }
                        ivaprodotto = ivaprodotto + '<option value="' + value.id + '" ' + select_string + '>' + value.name + '</option>'
                    });
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
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(value.id == etax_id){ select_string = 'selected="selected"'; }
                        ecotaxprodotto = ecotaxprodotto + '<option value="' + value.id + '" ' + select_string + '>' + value.name + '</option>'
                    });
                    $("select#ecotassa-legge").append(ecotaxprodotto);
                },
                error: function (request, status, errorThrown){}
            });

            var indicazioniPericoloCLP = new Array();
            $.each(result.data.regulatory.indicazioniPericoloCLP, function(index, value){
                if(value.name!='NO'){ indicazioniPericoloCLP.push(value.name); }
            });

            var img='';
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
                            select_string = '';
                            if(indicazioniPericoloCLP.indexOf(value.name) != -1){ select_string = 'checked="checked"'; }
                            img = "src='{{ url('/') }}/img/ind_pericolo_clp/" + value.name + ".png'";
                            pittogrammiClp = pittogrammiClp + "<div class='column column-block end'><img " + img + "class='thumbnail'><span>" + value.name + "</span><div class='check-loghi-bio' id='" + value.name + "'><input type='checkbox' name='pittogrammi' value='" + value.value + "' " + select_string + "></div></div>";
                        }
                    });
                    $("div#indicazioni-pericolo").append(pittogrammiClp);
                },
                error: function (request, status, errorThrown){}
            });

            var CSevesoCLP = new Array();
            var CSevesoCLPArray = new Array();
            $.each(result.data.adrTrasporto.classificazioniSeveso, function(index, value){ CSevesoCLP.push(value.id); });

            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=classificazione_seveso&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(CSevesoCLP.indexOf(value.value) != -1){ select_string = 'checked="checked"'; }
                        CSevesoCLPArray.push('<div class="riga-frasi-h"><input type="checkbox" name="seveso" ' + select_string + ' value="' + value.value + '"><span>' + value.name + '</span></div>');
                    });

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

            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(trademark == value.id){ select_string = 'selected="selected"'; }
                        trademarkProdotto= trademarkProdotto + '<option value="' + value.id + '" ' + select_string + '>' + value.name + ' - ' + value.description + '</option>';
                    });
                    $("select#titolare-registrazione").append(trademarkProdotto);
                },
                error: function (request, status, errorThrown){}
            });

            var holdertradeProdotto='';

            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(holdertrade == value.id){ select_string = 'selected="selected"'; }
                        holdertradeProdotto= holdertradeProdotto + '<option value="' + value.id + '" ' + select_string + '>' + value.name + ' - ' + value.description + '</option>';
                    });
                    $("select#titolare-commercio").append(holdertradeProdotto);
                },
                error: function (request, status, errorThrown){}
            });

            $("input#numero-registrazione").val(result.data.registrationNumber);
            $("input#data-registrazione").val(data_di_registrazione);
            $("input#composizione").val(result.data.composition);
            $("textarea#miscibilita").val(result.data.miscibilita);
            $("textarea#descrizione-sintetica").val(result.data.shortDescription);
            $("textarea#caratteristiche").val(result.data.characteristics);
            $("textarea#meccanismo-azione").val(result.data.meccanismiDiAzione);
            $("textarea#corretto-impiego").val(result.data.indicationUse);
            $("input#data-tracciabilita").val(dataTracciabilita);
            $("input#data-scadenza-titolare").val(dataScadenzaTitolare);
            $("input#data-scadenza-rivenditore").val(dataScadenzaRivenditore);
            $("input#data-scadenza-impiego").val(dataScadenzaUso);
            $("textarea#note-scadenza").val(result.data.regulatory.noteScadenza);

            if(result.data.sumlist){
                $("select#sumilist").append('<option value="true" selected="selected">Si</option><option value="false">No</option>');
            }else{
                $("select#sumilist").append('<option value="true">Si</option><option value="false" selected="selected">No</option>');
            }

            if(result.data.site){
                $("select#sito").append('<option value="true" selected="selected">Si</option><option value="false">No</option>');
            }else{
                $("select#sito").append('<option value="true">Si</option><option value="false" selected="selected">No</option>');
            }

            if(result.data.catalog){
                $("select#catalogo").append('<option value="true" selected="selected">Si</option><option value="false">No</option>');
            }else{
                $("select#catalogo").append('<option value="true">Si</option><option value="false" selected="selected">No</option>');
            }

            if(result.data.esenzioneQuantitaLimitata){
                $("select#esenzione-quantita-limitata").append('<option value="true" selected="selected">Si</option><option value="false">No</option>');
            }else{
                $("select#esenzione-quantita-limitata").append('<option value="true">Si</option><option value="false" selected="selected">No</option>');
            }

            if(result.data.bio){
                $("div#divbio").append('<input type="checkbox" name="bio" id="bio" value="si" checked="checked">');
            }else{
                $("div#divbio").append('<input type="checkbox" name="bio" id="bio" value="si">');
            }

            if(result.data.biorazionale){
                $("div#divbiorazionale").append('<input type="checkbox" name="biorazionale" id="biorazionale" value="si" checked="checked">');
            }else{
                $("div#divbiorazionale").append('<input type="checkbox" name="biorazionale" id="biorazionale" value="si">');
            }

            if(result.data.idrosolubile){
                $("div#dividrosolubile").append('<input type="checkbox" name="idrosolubile" id="idrosolubile" value="si" checked="checked">');
            }else{
                $("div#dividrosolubile").append('<input type="checkbox" name="idrosolubile" id="idrosolubile" value="si">');
            }

            if(result.data.materbi){
                $("div#divmaterbi").append('<input type="checkbox" name="materbi_on" id="materbi_on" value="si" checked="checked">');
            }else{
                $("div#divmaterbi").append('<input type="checkbox" name="materbi_on" id="materbi_on" value="si">');
            }

            var indicazioniPericoloFrasiH = new Array();
            $.each(result.data.regulatory.frasiH, function(index, value){ indicazioniPericoloFrasiH.push(value.name); });

            var checkFrasiH = '';
            var checkFrasiHArray = new Array();
            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=hazard_code_clp&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(indicazioniPericoloFrasiH.indexOf(value.name) != -1){ select_string = 'checked="checked"'; };
                        checkFrasiHArray.push('<div class="riga-frasi-h"><input type="checkbox" name="frasiH" ' + select_string + ' value="' + value.value + '" ><span>' + value.name + '</span></div>');
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
                error: function (request, status, errorThrown){}
            });

            var adviceClp = new Array();
            $.each(result.data.regulatory.adviceClp, function(index, value){ adviceClp.push(value); });

            var avvertenze='';
            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllAdviceClp",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(adviceClp.indexOf(value.id) != -1){ select_string = 'checked="checked"'; }
                        avvertenze = avvertenze + '<div class="large-3 columns"><input type="checkbox" name="Pericolo" ' + select_string + ' value="' + value.id + '"><span>' + value.name + '</span></div>';
                    });
                    $("div#avvertenze").append(avvertenze);
                },
                error: function (request, status, errorThrown){}
            });

            $("input#densita").val(result.data.adrTrasporto.densita);
            $("textarea#pericolosita-adr").val(result.data.adrTrasporto.principioAttivoAdr);
            $("textarea#note-supply-chain").val(result.data.noteSupplyChainESicurezza);

            var seveso='';

            $.each(result.data.adrTrasporto.classificazioniSeveso, function(index, value){ seveso = seveso + value.name + ', ' ; });
            seveso=seveso.slice(0,-2);

            $("input#classificazione-seveso").val(seveso);

            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=packing_group&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(gruppo_imballaggio_adr_id == value.name){ select_string = 'selected="selected"'; }
                        gruppo_imballaggio_adr= gruppo_imballaggio_adr + '<option value="' + value.value + '" ' + select_string + '>' + value.name + '</option>';
                    });
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
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=trasportation_code&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(trasportation_code_id == value.name){ select_string = 'selected="selected"'; }
                        trasportation_code= trasportation_code + '<option value="' + value.value + '" ' + select_string + '>' + value.name + '</option>';
                    });
                    $("select#numero-onu-adr").append(trasportation_code);
                },
                error: function (request, status, errorThrown){}
            });

            var adrclassification = result.data.adrTrasporto.classeADR.name;
            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=adrclassification&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if (!(adrclassification === undefined || adrclassification === null)) {
                            if(adrclassification.indexOf(value.name) != -1){ select_string = 'selected="selected"'; }
                        }
                        adrclassification= adrclassification + '<option value="' + value.value + '" ' + select_string + '>' + value.name + '</option>';
                    });
                    $("select#classe-adr").append(adrclassification);
                },
                error: function (request, status, errorThrown){}
            });
        },
        error: function (request, status, errorThrown){}
    });

    var codici='';
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

                if(!(value.unitOfMeasure.name == null)){ unitaMisura = value.unitOfMeasure.name; }

                if(!(value.packingMultiply.name == null)){ valuePackingMultiply = value.packingMultiply.name + ' x '; }

                if(!(value.pallet == null)){ pallet = value.pallet; }

                packingDescription = value.packing.description;
                packingDescription = packingDescription.split('=');

                packingDescription = packingDescription[1].replace("L/KG", "");
                packingDescription = packingDescription.replace("KG\L", "");

                codici= codici + '<tr><td><input type="checkbox" name="codice" value="' + value.id + '"></td><td>' + value.code + '</td><td>'+value.sapProductCode+'</td><td>' + value.statusName + '</td><td>' + formatoData(value.versionLastModifiedDate) + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td></tr>';
            });
            $('#elenco-codici tbody').append(codici).foundation();
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
                $.each(result.data, function(index, value){
                    select_string = '';
                    if(value.id == categoryid){
                        select_string = 'selected="selected"';
                        new_sottofamiglia = value.symbol;
                    }
                    sottofamiglia = sottofamiglia + '<option value="' + value.id + '" ' + select_string + '>' + value.name + '</option>'
                });
                $("#sotto-famiglia").append(sottofamiglia);
            },
            error: function (request, status, errorThrown) {}
        });
    });

    $(document).on('submit', '.modifica_prodotto', function(e) {
       e.preventDefault();

        var myObj ;
        var files = $(this).find('#custom-file-upload').get(0).files;
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
                contentType: false,
                processData: false,
                data: data,
                success: function (result) {
                    if(result.returnCode == '-1'){
                        $(".error-logo").html('Impossibile caricare il logo');
                    }else{
                        post_data = '{ "id" : ' + idprodotto + ', "logo" : { "id" : ' + result.data + ' }, "lastmodifiedby" : "' + utente + '" }';

                        $.ajax({
                            type: "POST",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                                request.setRequestHeader("charset" , "utf-8");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Products/Update",
                            dataType: "json",
                            data: JSON.parse(post_data),
                            success: function (result){
                                $.ajax({
                                    type: "GET",
                                    beforeSend: function (request) {
                                        request.setRequestHeader("Authorization", "Bearer " + token );
                                        request.setRequestHeader("lang", "it");
                                    },
                                    url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
                                    success: function (results){
                                        $("#logo-prodotto").html('');
                                        var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + results.data.logo.id;
                                        $("#logo-prodotto").append("<img src='" + src + "' /> <br />");
                                    },
                                error: function (request, status, errorThrown){}
                                });
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                },
                error: function (request, status, errorThrown){}
            });
        }

       var lastmodifiedby = utente;
       var name = '';
       var NoteSupplyChainESicurezza = '';
       var EsenzioneQuantitaLimitata = 'false';
       var MeccanismiDiAzione = '';
       var site = 'false';
       var catalog = 'false';
       var sumilist = 'false';
       var bio = "false";
       var biorazionale = "false";
       var idrosolubile = "false";
       var materbi = "false";
       var registrationNumber = '';
       var composition = '';
       var miscibilita = '';
       var shortDescription = '';
       var characteristics = '';
       var indicationUse = '';
       var createdDate = "1753-02-02T00:00:00";
       var company = '';
       var productManager = '';
       var Holdertrade = '';
       var Trademark = '';
       var formulation = '';
       var categoria = '';
       var subCategoria = '';
       var provider = '';
       var regulatory_NoteScadenza = '';
       var adrTrasporto_densita = '';
       var classeADR = '';
       var adrTrasporto_PrincipioAttivoAdr = '';

       if($(this).find('input#nome-prodotto').val() != ''){ name = $(this).find('input#nome-prodotto').val(); }
       if($(this).find('textarea#note-supply-chain').val() != ''){ NoteSupplyChainESicurezza = $(this).find('textarea#note-supply-chain').val(); }
       if($(this).find('select#esenzione-quantita-limitata').val() != ''){ EsenzioneQuantitaLimitata = $(this).find('select#esenzione-quantita-limitata').val(); }
       if($(this).find('textarea#meccanismo-azione').val() != ''){ MeccanismiDiAzione = $(this).find('textarea#meccanismo-azione').val(); }
       if($(this).find('select#sito').val() != ''){ site = $(this).find('select#sito').val(); }
       if($(this).find('select#catalogo').val() != ''){ catalog = $(this).find('select#catalogo').val(); }
       if($(this).find('select#sumilist').val()){ sumilist = $(this).find('select#sumilist').val(); }
       if($(this).find('input#numero-registrazione').val() != ''){ registrationNumber = $(this).find('input#numero-registrazione').val(); }
       if($(this).find('input#composizione').val() != ''){ composition = $(this).find('input#composizione').val(); }
       if($(this).find('textarea#miscibilita').val() != ''){ miscibilita = $(this).find('textarea#miscibilita').val(); }
       if($(this).find('textarea#descrizione-sintetica').val() != ''){ shortDescription = $(this).find('textarea#descrizione-sintetica').val(); }
       if($(this).find('textarea#caratteristiche').val() != ''){ characteristics = $(this).find('textarea#caratteristiche').val(); }
       if($(this).find('textarea#corretto-impiego').val() != ''){ indicationUse = $(this).find('textarea#corretto-impiego').val(); }
       if($(this).find('select#famiglia').val() != ''){ categoria = $(this).find('select#famiglia').val(); }
       if($(this).find('select#sotto-famiglia').val() != ''){ subCategoria = $(this).find('select#sotto-famiglia').val(); }
       if($(this).find('textarea#note-scadenza').val() != ''){ regulatory_NoteScadenza = $(this).find('textarea#note-scadenza').val(); }
       if($(this).find('textarea#pericolosita-adr').val() != ''){ adrTrasporto_PrincipioAttivoAdr = $(this).find('textarea#pericolosita-adr').val();}
       if($(this).find('input#densita').val() != ''){ adrTrasporto_densita = $(this).find('input#densita').val(); }
       if($("#bio").is(':checked')){ bio = "true"; }
       if($("#biorazionale").is(':checked')){ biorazionale = "true"; }
       if($("#idrosolubile").is(':checked')){ idrosolubile = "true"; }
       if($("#materbi_on").is(':checked')){ materbi = "true"; }

       if($(this).find('input#createdDate').val() != ''){
           createdDate = $(this).find('input#createdDate').val();
           if(createdDate == "0001-01-01"){ createdDate = "1753-02-02T00:00:00"; }
       }

       /*principi attivi*/
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
       arrayPrincipioAttivo = "[" + arrayPrincipioAttivo + "]";

       var principiAttiviObjB = JSON.parse(arrayPrincipioAttivo);
       var principiAttiviObj = { "principiAttivi": principiAttiviObjB };
       /*fine principi attivi*/

       var now = new Date();
       var d = now.getDate();
       var m =  now.getMonth();
       m += 1;
       var y = now.getFullYear();
       var lastModifiedDate = y + '-' + m + '-' + d + 'T00:00:00';

       var registrationDateObj;
       if($(this).find('input#data-registrazione').val() != ''){
           var regulatory_DataRegistrazione = $(this).find('input#data-registrazione').val();
           registrationDateObj = { "registrationDate": regulatory_DataRegistrazione };
       }

       if($(this).find('select#linea-distributiva').val() != ''){
           company = '{ "id" : "' + $(this).find('select#linea-distributiva').val() + '" }';
           company = JSON.parse(company);
       }

       if($(this).find('select#pm').val() != ''){
           productManager = '{ "id" : "' + $(this).find('select#pm').val() + '" }';
           productManager = JSON.parse(productManager);
       }

       if($(this).find('select#titolare-commercio').val() != ''){
           Holdertrade = '{ "id" : "' + $(this).find('select#titolare-commercio').val() + '" }';
           Holdertrade = JSON.parse(Holdertrade);
       }

       if($(this).find('select#titolare-registrazione').val() != ''){
           Trademark = '{ "id" : "' + $(this).find('select#titolare-registrazione').val() + '" }';
           Trademark = JSON.parse(Trademark);
       }

       if($(this).find('select#formulazione').val() != ''){
           formulation = '{ "id" : "' + $(this).find('select#formulazione').val() + '" }';
           formulation = JSON.parse(formulation);
       }

       if($(this).find('select#fornitore').val() != ''){
           provider = '{ "id" : "' + $(this).find('select#fornitore').val() + '" }';
           provider = JSON.parse(provider);
       }

       var ivaObj;
       if($(this).find('select#iva').val() != ''){
           var iva =  $(this).find('select#iva').val();
           ivaObj = { "iva": { "id" : iva } };
       }

       var etaxObj;
       if($(this).find('select#ecotassa-legge').val() != ''){
           var etax = $(this).find('select#ecotassa-legge').val();
           etaxObj = { "etax": { "id" : etax } };
       }

       var DataTracciabilitaObj;
       if($(this).find('input#data-tracciabilita').val() != ''){
           var regulatory_DataTracciabilita = $(this).find('input#data-tracciabilita').val();
           DataTracciabilitaObj = { "DataTracciabilita": regulatory_DataTracciabilita };
       }

       var deadlineOwnerObj;
       if($(this).find('input#data-scadenza-titolare').val() != ''){
           var regulatory_deadlineOwner = $(this).find('input#data-scadenza-titolare').val();
           deadlineOwnerObj = { "deadlineOwner": regulatory_deadlineOwner };
       }

       var deadlineSellerObj;
       if($(this).find('input#data-scadenza-rivenditore').val() != ''){
           var regulatory_deadlineSeller = $(this).find('input#data-scadenza-rivenditore').val();
           deadlineSellerObj = { "deadlineSeller": regulatory_deadlineSeller };
       }

       var deadlineUseObj;
       if($(this).find('input#data-scadenza-impiego').val() != ''){
           var regulatory_deadlineUse = $(this).find('input#data-scadenza-impiego').val();
           deadlineUseObj = { "deadlineUse": regulatory_deadlineUse };
       }

       if($(this).find('select#classe-adr').val() != ''){
           classeADR = '{ "id" : "' + $(this).find('select#classe-adr').val() + '" }';
           classeADR = JSON.parse(classeADR);
       }

       var regulatory_indicazioniPericoloCLP_id = new Array();
       var regulatory_indicazioniPericoloCLPJson = '';
       var regulatory_indicazioniPericoloCLPJsonString = '';
       $("input:checkbox[name=pittogrammi]:checked").each(function(){ regulatory_indicazioniPericoloCLP_id.push($(this).val()); });

       if(regulatory_indicazioniPericoloCLP_id.length > 0) {
           $.each(regulatory_indicazioniPericoloCLP_id, function(index, value){ regulatory_indicazioniPericoloCLPJson = regulatory_indicazioniPericoloCLPJson + '{ "id" : "' + value + '" },'; });

           regulatory_indicazioniPericoloCLPJsonString = regulatory_indicazioniPericoloCLPJson.slice(0, -1);
           regulatory_indicazioniPericoloCLPJsonString = "[" + regulatory_indicazioniPericoloCLPJsonString + "]";
           var indicazioniPericoloCLPObj = JSON.parse(regulatory_indicazioniPericoloCLPJsonString);
       }else{
           regulatory_indicazioniPericoloCLPJsonString = "[]";
           var indicazioniPericoloCLPObj = JSON.parse(regulatory_indicazioniPericoloCLPJsonString);
       }

       var regulatory_adviceClp_id = new Array();
       var regulatory_adviceClpJsonString = '';

       var adviceClpObj;
       $("input:checkbox[name=Pericolo]:checked").each(function(){ regulatory_adviceClp_id.push($(this).val()); });

       if(regulatory_adviceClp_id.length > 0) {
           $.each(regulatory_adviceClp_id, function(index, value){ regulatory_adviceClpJsonString = value; });
           adviceClpObj = { "adviceClp": { "id" : regulatory_adviceClpJsonString } };
       }

       var regulatory_frasiH_id = new Array();
       var regulatory_frasiHJson = '';
       var regulatory_frasiHJsonString = '';
       $("input:checkbox[name=frasiH]:checked").each(function(){ regulatory_frasiH_id.push($(this).val()); });

       if(regulatory_frasiH_id.length > 0) {
           $.each(regulatory_frasiH_id, function(index, value){ regulatory_frasiHJson = regulatory_frasiHJson + '{ "id" : "' + value + '" },'; });
           regulatory_frasiHJsonString = regulatory_frasiHJson.slice(0, -1);
           regulatory_frasiHJsonString = "[" + regulatory_frasiHJsonString + "]";
           var regulatory_frasiHObj = JSON.parse(regulatory_frasiHJsonString);
       }else{
           regulatory_frasiHJsonString = "[]";
           var regulatory_frasiHObj = JSON.parse(regulatory_frasiHJsonString);
       }

       var adrTrasporto_ClassificazioniSeveso = new Array();
       var adrTrasporto_ClassificazioniSevesoJson = '';
       var adrTrasporto_ClassificazioniSevesoJsonString ='';

       $("input:checkbox[name=seveso]:checked").each(function(){ adrTrasporto_ClassificazioniSeveso.push($(this).val()); });

       if(adrTrasporto_ClassificazioniSeveso.length > 0) {
            $.each(adrTrasporto_ClassificazioniSeveso,function(index, value){ adrTrasporto_ClassificazioniSevesoJson = adrTrasporto_ClassificazioniSevesoJson + '{ "id" : "' + value + '" },'; });
            adrTrasporto_ClassificazioniSevesoJsonString = adrTrasporto_ClassificazioniSevesoJson.slice(0, -1);
            adrTrasporto_ClassificazioniSevesoJsonString = "[" + adrTrasporto_ClassificazioniSevesoJsonString + "]";
            var obj = JSON.parse(adrTrasporto_ClassificazioniSevesoJsonString);
       }else{
           adrTrasporto_ClassificazioniSevesoJsonString = "[]";
           var obj = JSON.parse(adrTrasporto_ClassificazioniSevesoJsonString);
       }

       var codiceArray = new Array();
       var codiceArrayJson = '';
       var codiceArrayJsonString ='';

       $("input:checkbox[name=codice]:checked").each(function(){ codiceArray.push($(this).val()); });

       if(codiceArray.length > 0) {
            $.each(codiceArray,function(index, value){ codiceArrayJson = codiceArrayJson + '{ "id" : "' + value + '" },'; });
            codiceArrayJsonString = codiceArrayJson.slice(0, -1);
            codiceArrayJsonString = "[" + codiceArrayJsonString + "]";
            var objCodice = JSON.parse(codiceArrayJsonString);
       }else{
           codiceArrayJsonString = "[]";
           var objCodice = JSON.parse(codiceArrayJsonString);
       }

       var CodiceObj = { "CodiciProdotto": objCodice };

       var adrTrasporto_GruppoImballaggioObj;
       if($(this).find('select#gruppo-imballaggio-adr').val() != ''){
           var adrTrasporto_GruppoImballaggio = $(this).find('select#gruppo-imballaggio-adr').val();
           adrTrasporto_GruppoImballaggioObj = { "GruppoImballaggio": adrTrasporto_GruppoImballaggio };
       }

       var NumeroOnuAdrObj;
       if($(this).find('select#numero-onu-adr').val() != ''){
           var NumeroOnuAdr = $(this).find('select#numero-onu-adr').val();
           NumeroOnuAdrObj = { "NumeroOnuAdr": NumeroOnuAdr };
       }

       var regulatoryObj;
       regulatoryObj = { "NoteScadenza": regulatory_NoteScadenza, "indicazioniPericoloCLP" : indicazioniPericoloCLPObj, "frasiH" : regulatory_frasiHObj, "name" : null };

       $.extend(regulatoryObj, DataTracciabilitaObj);
       $.extend(regulatoryObj, deadlineOwnerObj);
       $.extend(regulatoryObj, deadlineSellerObj);
       $.extend(regulatoryObj, deadlineUseObj);
       $.extend(regulatoryObj, adviceClpObj);

       var regulatoryTrasportoObjCompleto;
       regulatoryTrasportoObjCompleto = {"regulatory": regulatoryObj}

       var adrTrasportoObj;
       adrTrasportoObj = { classeADR,"densita" : adrTrasporto_densita, "PrincipioAttivoAdr": adrTrasporto_PrincipioAttivoAdr, "ClassificazioniSeveso": obj };

       $.extend(adrTrasportoObj, adrTrasporto_GruppoImballaggioObj);
       $.extend(adrTrasportoObj, NumeroOnuAdrObj);

       var adrTrasportoObjCompleto;
       adrTrasportoObjCompleto = {"adrTrasporto": adrTrasportoObj}

       myObj = { "id": idprodotto, company, "NoteSupplyChainESicurezza": NoteSupplyChainESicurezza, "EsenzioneQuantitaLimitata": EsenzioneQuantitaLimitata, productManager, Holdertrade, Trademark, "MeccanismiDiAzione": MeccanismiDiAzione, "site": site, "catalog": catalog, "bio": bio, "sumlist": sumilist, "biorazionale": biorazionale , "idrosolubile": idrosolubile, "materbi": materbi, "lastModifiedDate": lastModifiedDate, "registrationNumber": registrationNumber, "composition": composition, formulation , "miscibilita": miscibilita, "shortDescription": shortDescription, "characteristics": characteristics, "indicationUse": indicationUse, "categoria" : { "id" : categoria }, "subCategoria": { "id" : subCategoria }, provider, "name": name, "lastmodifiedby": utente };

       $.extend(myObj, regulatoryTrasportoObjCompleto);
       $.extend(myObj, adrTrasportoObjCompleto);
       $.extend(myObj, principiAttiviObj);
       $.extend(myObj, CodiceObj);
       $.extend(myObj, ivaObj);
       $.extend(myObj, etaxObj);
       $.extend(myObj, registrationDateObj);
       var myJSON = JSON.stringify(myObj);

       $.ajax({
           type: "POST",
           beforeSend: function (request) {
               request.setRequestHeader("Authorization", "Bearer " + token );
               request.setRequestHeader("lang", "it");
               request.setRequestHeader("Content-Type", "application/json")
           },
           url: "{{ config('constants.UrlWebService') }}api/Products/Update",
           contentType: true,
           processData: false,
           async:false,
           data: myJSON,
           success: function (result) {
               if(result.returnCode != 0 ){ $("#error").html('Impossibile modificare il prodotto: ' + result.errors);
               }else{ $("#error").html('Prodotto correttamente modificato'); }
               $("html, body").animate({ scrollTop: 0 }, "slow");
           },
           error: function (request, status, errorThrown) {
               $("#error").html('Impossibile modifica il prodotto.');
               $("html, body").animate({ scrollTop: 0 }, "slow");
           }
       });
    });
</script>
@stop
