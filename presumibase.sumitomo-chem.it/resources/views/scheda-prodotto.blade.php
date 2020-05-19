<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
</script>

@extends('layout.header')
@section('title', 'Scheda prodotto')

@section('content')
@include('layout.menu')
<section id="content-scheda-prodotto" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                        <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                        <li class="disabled"></li>
                    </ul>
                </nav>
            </div>
        </div>
        @if ($ruoli['database prodotti'] != 'N')
          @include('layout.menu-pulsanti-prodotto')
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

                <div class="contenitore-tab-scheda-prodotto">
                    <ul class="accordion" data-accordion>
                        <li class="accordion-item is-active" data-accordion-item>
                            <a href="#" class="accordion-title">Marketing &amp; Sales Product</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info contenitore-info-marketing"></div>
                            </div>
                        </li>

                        <li class="accordion-item" data-accordion-item>
                            <a href="#" class="accordion-title">Colture</a>
                            <div class="accordion-content" data-tab-content>
                               <div class="contenitore-info" style="padding:0;">
                                    <ul class="accordion">
                                        <li class="accordion-item is-active" role="presentation" data-accordion-item>
                                              <div class="accordion-content" data-tab-content aria-hidden="true">
                                                <div class="accordion_colture"></div>
                                              </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="accordion-item" data-accordion-item>
                            <a href="#" class="accordion-title ">Regulatory</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info contenitore-info-regulatory"></div>
                            </div>
                        </li>

                        <li class="accordion-item" data-accordion-item>
                            <a href="#" class="accordion-title">ADR Trasporto</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info contenitore-info-adr"></div>
                            </div>
                        </li>

                        <li class="accordion-item" data-accordion-item>
                            <a href="#" class="accordion-title">Codici Prodotto</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info codici-prodotto-scheda-prodotto" style="padding:0px">
                                 <div class="expanded row" style="border-bottom:0px;padding-bottom:0px">
                                     <div class="medium-12 large-12 columns">
                                        <div class="row collapse" style="border:0;padding-bottom:0px">
                                            <div class="medium-12 large-12 columns">
                                                <table id="elenco-codici">
                                                    <thead>
                                                        <tr>
                                                            <th width="300">CODICE SAP</th>
                                                            <th width="300">STATO</th>
                                                            <th width="00">DATA ULTIMA MODIFICA</th>
                                                            <th width="200">CONFEZIONE</th>
                                                            <th width="200">PALLET</th>
                                                            <th width="5"></th>
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
    var contArt = 1;

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
        error: function (request, status, errorThrown) {}
    });

	var ajaxRequest = $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        async:false,
        success: function (result) {
            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $(".breadcrumbs li.disabled").append(result.data.name);

            var sito='';
            var catalogo='';
            var sumilist='';
            var bio='';
            var biorazionale='';
            var idrosolubile='';
            var materbi='';
            var esenzioneQuantitaLimitata='';

            var et_clp="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.etichettaCLP.id;
            var sds_clp="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.schedaCLP.id;

            if(formatoData(result.data.etichettaCLP.lastModifiedDate) == '01-01-0001'){
                var dataEtichettaCLP = '';
            }else{
                var dataEtichettaCLP = 'Data upload ' + formatoData(result.data.etichettaCLP.lastModifiedDate);
            }

            if(formatoData(result.data.schedaCLP.lastModifiedDate) == '01-01-0001'){
                var dataSchedaCLP = '';
            }else{
                var dataSchedaCLP = 'Data upload ' + formatoData(result.data.schedaCLP.lastModifiedDate);
            }

            if(result.data.etichettaCLP.id === undefined || result.data.etichettaCLP.id === null ){
                var linkEtichettaClp = '<div class="pulsante-download">FILE NON PRESENTE</div>';
            }else{
              @if ($ruoli['database prodotti'] != 'R')
                var linkEtichettaClp = '<a href="' + et_clp + '" class="pulsante-download">DOWNLOAD</a>' + dataEtichettaCLP + '<div class="elimina-codice" style="float:left;top:0px;left:-9px; width:50px"><button class="button" type="button" data-toggle="elimina-codice1"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice1" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-min"><input type="submit" name="OK" value="OK" ></form></div></div></div></div>';
              @else
                var linkEtichettaClp = '<a href="' + et_clp + '" class="pulsante-download">DOWNLOAD</a>' + dataEtichettaCLP;
              @endif
            }

            if(result.data.schedaCLP.id === undefined || result.data.schedaCLP.id === null ){
                var linkSdsClp = '<div class="pulsante-download">FILE NON PRESENTE</div>';
            }else{
              @if ($ruoli['database prodotti'] != 'R')
                var linkSdsClp = '<a href="' + sds_clp + '" class="pulsante-download">DOWNLOAD</a>' + dataSchedaCLP + '<div class="elimina-codice" style="float:left;top:0px;left:-9px; width:50px"><button class="button" type="button" data-toggle="elimina-codice2"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice2" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-sds"><input type="submit" name="OK" value="OK" ></form></div></div></div></div>';
              @else
                var linkSdsClp = '<a href="' + sds_clp + '" class="pulsante-download">DOWNLOAD</a>' + dataSchedaCLP;
              @endif
            }

            var et_dpd="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.etichettaDPD.id;
            var sds_dpd="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.schedaDPD.id;

            if(result.data.site){ sito='<img src="{{ URL::asset('img/check.png') }}">';
            }else{ sito='<img src="{{ URL::asset('img/ko.png') }}">'; }

            if(result.data.catalog){ catalogo='<img src="{{ URL::asset('img/check.png') }}">';
            }else{ catalogo='<img src="{{ URL::asset('img/ko.png') }}">'; }

            if(result.data.sumlist){ sumilist='<img src="{{ URL::asset('img/check.png') }}">';
            }else{ sumilist='<img src="{{ URL::asset('img/ko.png') }}">'; }

            if(result.data.esenzioneQuantitaLimitata){ esenzioneQuantitaLimitata = 'Si';
            }else{ esenzioneQuantitaLimitata = 'No'; }

            if(result.data.bio){
                bio='<div class="column column-block resize-icon align-icon"><img src="{{ URL::asset('img/bio.png') }}"></div>';
            }else{
                bio='<div class="column column-block"></div>';
            }

            if(result.data.biorazionale){
                biorazionale='<div class="column column-block align-icon"><img src="{{ URL::asset('img/logo-biorazionale.png') }}"></div>';
            }else{
                biorazionale='<div class="column column-block"></div>';
            }

            if(result.data.idrosolubile){
                idrosolubile='<div class="column column-block resize-icon"><img src="{{ URL::asset('img/idrosolubile.png') }}"></div>';
            }else{
                idrosolubile='<div class="column column-block"></div>';
            }

            if(result.data.materbi){
                materbi='<div class="column column-block align-icon"><img src="{{ URL::asset('img/materbi_on.png') }}"></div>';
            }else{
                materbi='<div class="column column-block"></div>';
            }

            var principiAttivi='';
            $.each(result.data.principiAttivi, function(index, value){ principiAttivi = principiAttivi + value.name + ', '; });
            principiAttivi = principiAttivi.slice(0, -2);

            if(formatoData(result.data.etichettaDPD.lastModifiedDate) == '01-01-0001'){
                var dataEtichettaDPD = '';
            }else{
                var dataEtichettaDPD = 'Data upload ' + formatoData(result.data.etichettaDPD.lastModifiedDate);
            }

            if(formatoData(result.data.schedaDPD.lastModifiedDate) == '01-01-0001'){
                var dataSchedaDPD = '';
            }else{
                var dataSchedaDPD = 'Data upload ' + formatoData(result.data.schedaDPD.lastModifiedDate);
            }

            if(result.data.registrationNumber == '' || result.data.registrationNumber == null ){
                var registrazione = '';
            }else{
                var registrazione = 'N<sup>&deg;</sup> ' + result.data.registrationNumber;
            }

            if(formatoData(result.data.registrationDate) == '01-01-0001'){
                var dataRegistrazione = '';
            }else{
                var dataRegistrazione = formatoData(result.data.registrationDate);
            }

            if(formatoData(result.data.createdDate) == '01-01-0001'){
                var createdDate = '';
            }else{
                var createdDate = formatoData(result.data.createdDate);
            }

            if(result.data.composition == '' || result.data.composition == null ){
                var compositionLine = '';
            }else{
                var compositionLine = (result.data.composition).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            if(result.data.miscibilita == '' || result.data.miscibilita == null ){
                var miscibilitaLine = '';
            }else{
                var miscibilitaLine = (result.data.miscibilita).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            if(result.data.shortDescription == '' || result.data.shortDescription == null ){
                var shortDescriptionLine = '';
            }else{
                var shortDescriptionLine = (result.data.shortDescription).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            if(result.data.characteristics == '' || result.data.characteristics == null ){
                var characteristicsLine = '';
            }else{
                var characteristicsLine = (result.data.characteristics).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            if(result.data.meccanismiDiAzione == '' || result.data.meccanismiDiAzione == null ){
                var meccanismiDiAzioneLine = '';
            }else{
                var meccanismiDiAzioneLine = (result.data.meccanismiDiAzione).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            if(result.data.indicationUse == '' || result.data.indicationUse == null ){
                var indicationUseLine = '';
            }else{
                var indicationUseLine = (result.data.indicationUse).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            var iva = '';
            if(!(result.data.iva.name === undefined || result.data.iva.name === null)){ iva = result.data.iva.name; }

            var etax = '';
            if(!(result.data.etax.name === undefined || result.data.etax.name === null)){ etax = result.data.etax.name; }

            var formulazione = '';
            if (!(result.data.formulation.name === undefined || result.data.formulation.name === null)){
                formulazione = result.data.formulation.name + ' - ' + result.data.formulation.description;
            }

            var productManager = '';
            if (!(result.data.productManager.name === undefined || result.data.productManager.name === null)){
                productManager = result.data.productManager.name;
            }

            var provider = '';
            if (!(result.data.provider.name === undefined || result.data.provider.name === null)) {
                provider = result.data.provider.name;
            }

            var marketing='<div class="row collapse"><div class="medium-6 large-4 columns"><span>Nome prodotto:&nbsp;</span>' + result.data.name + '</div><div class="medium-6 large-4 columns"><span>Famiglia:&nbsp;</span>' + result.data.categoria.name + '</div><div class="medium-6 large-4 columns"><span>Sotto famiglia:&nbsp;</span>' + result.data.subCategoria.name + '</div></div><div class="row collapse"><div class="medium-6 large-4 columns"><span>Data creazione:&nbsp;</span>' + createdDate + '</div><div class="medium-6 large-4 columns"><span>Data ultima modifica:&nbsp;</span>' + formatoData(result.data.lastModifiedDate) + '</div><div class="medium-6 large-4 columns"><span>Linea distributiva:&nbsp;</span>' + result.data.company.name + '</div></div><div class="row collapse"><div class="medium-6 large-4 columns"><span>Product Manager:&nbsp;</span>' + productManager + '</div><div class="medium-6 large-4 columns"><span>Registrazione:&nbsp;</span>' + registrazione + '</div><div class="medium-6 large-4 columns"><span>Data registrazione:&nbsp;</span>' + dataRegistrazione + '</div></div><div class="row collapse"><div class="medium-6 large-8 columns"><span>Principio attivo:&nbsp;</span>' + principiAttivi + '</div><div class="medium-6 large-4 columns"><span>Fornitore:&nbsp;</span>' + provider + '</div></div><div class="row collapse"><div class="medium-6 large-4 columns"><span>Formulazione:&nbsp;</span>' + formulazione + '</div><div class="medium-6 large-8 columns"><span>Composizione:&nbsp;</span>' + compositionLine + '</div></div><div class="row collapse"><div class="large-12 columns"><span>Miscibilit&agrave;:</span><br>' + miscibilitaLine + '</div></div><div class="row collapse"><div class="large-12 columns"><span>Descrizione Sintetica:</span><br>' + shortDescriptionLine + '</div></div><div class="row collapse"><div class="large-12 columns"><span>Caratteristiche:</span><br>' + characteristicsLine + '</div></div><div class="row collapse"><div class="large-12 columns"><span>Meccanismi d\'azione:</span><br>' + meccanismiDiAzioneLine + '</div></div><div class="row collapse"><div class="large-12 columns"><span>Indicazioni Corretto Impiego:</span><br>' + indicationUseLine + '</div></div><div class="row collapse"><div class="large-12 columns"><div class="spazio-catalogo"><span>Catalogo:&nbsp;</span>' + catalogo + '</div><div class="spazio-catalogo"><span>Sito:&nbsp;</span>' + sito + '</div> <div class="spazio-catalogo"><span>Sumilist:&nbsp;</span>' + sumilist + '</div> <div class="row collapse medium-up-2 large-up-8" style="border:0px;margin-top:25px">' + bio + biorazionale + idrosolubile + materbi + '</div> </div></div><div class="row collapse"><div class="medium-6 large-3 columns"><span>IVA:&nbsp;</span>' + iva + '</div><div class="medium-6 large-3 columns end"><span>Ecotassa per legge:&nbsp;</span>' + etax + '</div></div><div class="row collapse sds-min"><div class="medium-12 large-6 columns"><span>Et. Ministeriale CLP</span>' + linkEtichettaClp + '</div><div class="medium-12 large-6 columns"><span style="width:70px">SDS CLP</span>' + linkSdsClp + '</div></div><div class="row collapse sds-min"><div class="medium-12 large-6 columns"><span>Et. Ministeriale DPD</span> <a href="' + et_dpd + '" class="pulsante-download">DOWNLOAD</a> ' + dataEtichettaDPD + '</div><div class="medium-12 large-6 columns"><span style="width:70px">SDS DPD</span> <a href="' + sds_dpd + '" class="pulsante-download">DOWNLOAD</a> ' + dataSchedaDPD + '</div></div><div class="row collapse"><div class="medium-6 large-8 columns"><span>QrCode:&nbsp;</span> https://www.sumitomo-chem.it/sds/' + prodotto + '</div></div>';

            $(".contenitore-info-marketing").append(marketing);

            var avvertenzeArray = new Array();
            var colture= result.data.colture;
            var i=30;

            $.each(colture, function(index, value){
                var phi=value.tempoDiCarenza;

                colture= '<div class="accordion-section"><div class="operazioni-coltura" style="width:0px"></div><a class="accordion-section-title" style="width:100%;padding-left:20px" href="#accordion-' + i +'">' + value.name + '</a><div id="accordion-' + i +'" class="accordion-section-content"><div class="riga_intestazione_avversita"><div class="intestazione_tempo_carenza">Intervallo di sicurezza</div><div class="intestazione_avversita_controllate">Avversit&agrave; controllata</div><div class="intestazione_dosi">Dosi</div><div class="intestazione_impiego">Modalit&agrave; d\'impiego</div></div>';
                colture = colture + '<div class="contenitore_avversita"><div class="tempo_carenza">' + phi + '</div>';

                avvertenzeArray = value.avversita;

                $.each(avvertenzeArray, function(index_avversita, value_avversita){
                    var i = 0;
                    var array_dosi = new Array();
                    var array_impiego = new Array();

                    $.each(value_avversita.dosi, function(index_dosi, value_dosi){
						            var dosiLine= (value_dosi.name).replace(/\n/g, "<br />");
                        array_dosi.push(dosiLine);
                    });

                    $.each(value_avversita.impieghi, function(index_impieghi, value_impieghi){
						             var impieghiLine= (value_impieghi.name).replace(/\n/g, "<br />");
                         array_impiego.push(impieghiLine);
                    });

                    colture = colture + '<div class="contenitore_avversita_controllata">';

                    var arrAvversita = value_avversita.name;
                    var arrDosi = array_dosi[i];
                    var arrImpiego = array_impiego[i];

                    if(typeof arrAvversita !== 'undefined' && arrAvversita.length > 0) {
                        if(arrAvversita != ''){
                            colture = colture + '<div class="avversita_controllate">' + arrAvversita + '</div>';
                        }else{
                            colture = colture + '<div class="avversita_controllate">&nbsp;</div>';
                        }
                    }else{
                        colture = colture + '<div class="avversita_controllate">&nbsp;</div>';
                    }

                    if(typeof arrDosi !== 'undefined' && arrDosi.length > 0) {
                        if(arrDosi != ''){
                            colture = colture + '<div class="colonna_dosi">' + arrDosi + '</div>';
                        }else{
                            colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                        }
                    }else{
                        colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                    }

                    if(typeof arrImpiego !== 'undefined' && arrImpiego.length > 0) {
                        if(arrImpiego != ''){
                            colture = colture + '<div class="colonna_impiego">' + arrImpiego + '</div>';
                        }else{
                            colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                        }
                    }else{
                        colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                    }

                    colture = colture + '</div>';

                    array_dosi.splice(0, 1);
                    array_impiego.splice(0, 1);

                    i = i + 1;
                    if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                        while(array_dosi.length>0){
                            colture = colture + '<div class="contenitore_avversita_controllata"><div class="avversita_controllate">&nbsp;</div>';

                            if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                                if(array_dosi[0] != ''){
                                    colture = colture + '<div class="colonna_dosi">' + array_dosi[0] + '</div>';
                                }else{
                                    colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                                }
                            }else{
                                colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                            }

                            if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                                if(array_impiego[0] != ''){
                                    colture = colture + '<div class="colonna_impiego">' + array_impiego[0] + '</div>';
                                }else{
                                    colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                                }
                            }else{
                                colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                            }

                            colture = colture + '</div>';
                            array_dosi.splice(0, 1);
                            array_impiego.splice(0, 1);
                        }
                    }

                    if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                        while(array_impiego.length > 0){
                            colture = colture + '<div class="contenitore_avversita_controllata"><div class="avversita_controllate">&nbsp;</div>';

                            if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                                if(array_dosi[0] != ''){
                                    colture = colture + '<div class="colonna_dosi">' + array_dosi[0] + '</div>';
                                }else{
                                    colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                                }
                            }else{
                                colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                            }

                            if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                                if(array_impiego[0] != ''){
                                    colture = colture + '<div class="colonna_impiego">' + array_impiego[0] + '</div>';
                                }else{
                                    colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                                }
                            }else{
                                colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                            }

                            colture = colture + '</div>';

                            array_dosi.splice(0, 1);
                            array_impiego.splice(0, 1);
                        }
                    }
                });

                colture = colture + '</div></div>';
                   $(".accordion_colture").append(colture);
                i++;
            });

            function close_accordion_section() {
                $('.accordion_colture .accordion-section-title').removeClass('active');
                $('.accordion_colture .accordion-section-content').slideUp(300).removeClass('open');
            }

            $('.accordion-section-title').click(function(e) {
                var currentAttrValue = $(this).attr('href');

                if($(e.target).is('.active')) {
                    close_accordion_section();
                }else {
                    close_accordion_section();
                    $(this).addClass('active');
                    $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
                }
                e.preventDefault();
            });

            var regulatory='';
            var frasi_h='';
                var frasi_r='';
                var indicazioniPericoloDPD='';
                var indicazioniPericoloCLP='';
                var immagini_clp='<div class="img_regulatory">';
                var immagini_dpd='<div class="img_regulatory">';

                $.each(result.data.regulatory.frasiH, function(index, value){ frasi_h = frasi_h + value.name + ', '; });
                $.each(result.data.regulatory.frasiR, function(index, value){ frasi_r = frasi_r + value.name + ', '; });

                $.each(result.data.regulatory.indicazioniPericoloDPD, function(index, value){
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

                $.each(result.data.regulatory.indicazioniPericoloCLP, function(index, value){
                   indicazioniPericoloCLP = indicazioniPericoloCLP + value.name + ', ' ;

                    if(value.name!='NO'){
                        if(value.name != undefined ){
                            immagini_clp = immagini_clp + '<div><img src="{!! URL::asset("img/ind_pericolo_clp/' + value.name + '.png") !!}"><span>' + value.name + '</span></div>';
                        }
                    }
                });

                immagini_clp = immagini_clp + '</div>';

                frasi_h=frasi_h.slice(0,-2);
                frasi_r=frasi_r.slice(0,-2);
                indicazioniPericoloDPD=indicazioniPericoloDPD.slice(0,-2);
                indicazioniPericoloCLP=indicazioniPericoloCLP.slice(0,-2);

                if(formatoData(result.data.regulatory.dataTracciabilita) == '01-01-0001'){
                    var dataTracciabilita = '';
                }else{
                    var dataTracciabilita = formatoData(result.data.regulatory.dataTracciabilita);
                }

                if(formatoData(result.data.regulatory.deadlineOwner) == '01-01-0001'){
                    var deadlineOwner = '';
                }else{
                    var deadlineOwner = formatoData(result.data.regulatory.deadlineOwner);
                }

                if(formatoData(result.data.regulatory.deadlineSeller) == '01-01-0001'){
                    var deadlineSeller = '';
                }else{
                    var deadlineSeller = formatoData(result.data.regulatory.deadlineSeller);
                }

                if(formatoData(result.data.regulatory.deadlineUse) == '01-01-0001'){
                    var deadlineUse = '';
                }else{
                    var deadlineUse = formatoData(result.data.regulatory.deadlineUse);
                }

                var trademark = '';
                if (!(result.data.trademark.description === undefined || result.data.trademark.description === null)) {
                    trademark = result.data.trademark.description;
                }

                if(result.data.regulatory.noteScadenza == '' || result.data.regulatory.noteScadenza == null ){
                    var Note = '';
                }else{
                    var Note = (result.data.regulatory.noteScadenza).replace(/(\r\n|\n|\r)/gm, "<br>");
                }

                if (frasi_h == "undefined" ){ frasi_h = ''; }
                if (frasi_r == "undefined" ){ frasi_r = ''; }

                var adviceClp = '';
                if (!(result.data.regulatory.adviceClp.name === undefined || result.data.regulatory.adviceClp.name === null)) {
                    adviceClp = result.data.regulatory.adviceClp.name;
                }

            regulatory='<div class="row collapse"><div class="medium-12 large-4 columns"><span>Indicazioni di Pericolo CLP:</span><br> ' + immagini_clp + '</div><div class="medium-12 large-8 columns"><span>Indicazioni di Pericolo DPD:</span><br> ' + immagini_dpd + '</div></div<div class="row collapse"><div class="medium-12 large-4 columns"><span>Consigli di prudenza:&nbsp;</span>' + adviceClp + '<br><span>Frasi H:&nbsp;</span>' + frasi_h + '</div><div class="medium-12 large-8 columns"><span>Frasi R:&nbsp;</span>' + frasi_r + '</div></div><div class="row collapse"><div class="medium-6 large-4 columns"><span>Data di tracciabilit&agrave;:&nbsp;</span>' + dataTracciabilita + '</div><div class="medium-6 large-8 columns"><span>Titolare registrazione:&nbsp;</span>' + trademark + '</div></div><div class="row collapse"><div class="medium-12 large-12 columns"><span>Note: </span><br>' + Note + '</div></div>';

            $(".contenitore-info-regulatory").append(regulatory);

            var adr='';
            var seveso='';

            $.each(result.data.adrTrasporto.classificazioniSeveso, function(index, value){ seveso = seveso + value.name + ', ' ; });
            seveso=seveso.slice(0,-2);

            if (seveso == "undefined" ){ seveso = ''; }

            var principioAttivoAdrLine = '';
            if (!(result.data.adrTrasporto.principioAttivoAdr === undefined || result.data.adrTrasporto.principioAttivoAdr === null)) {
                principioAttivoAdrLine = (result.data.adrTrasporto.principioAttivoAdr).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            var holdertrade = '';
            if (!(result.data.holdertrade.description === undefined || result.data.holdertrade.description === null)) {
                holdertrade = result.data.holdertrade.description;
            }

            var noteSupplyChainESicurezza = '';
            if (!(result.data.noteSupplyChainESicurezza === undefined || result.data.noteSupplyChainESicurezza === null)) {
                noteSupplyChainESicurezza = (result.data.noteSupplyChainESicurezza).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            var densita = '';
            if (!(result.data.adrTrasporto.densita === undefined || result.data.adrTrasporto.densita === null)) {
                densita = result.data.adrTrasporto.densita;
            }

            var gruppoImballaggio = '';
            if (!(result.data.adrTrasporto.gruppoImballaggio === undefined || result.data.adrTrasporto.gruppoImballaggio === null)) {
                gruppoImballaggio = result.data.adrTrasporto.gruppoImballaggio;
            }

            var numeroOnuAdr = '';
            if (!(result.data.adrTrasporto.numeroOnuAdr === undefined || result.data.adrTrasporto.numeroOnuAdr === null)) {
                numeroOnuAdr = result.data.adrTrasporto.numeroOnuAdr;
            }

            var classeADR = '';
            if (!(result.data.adrTrasporto.classeADR.name === undefined || result.data.adrTrasporto.classeADR.name === null)) {
                classeADR = result.data.adrTrasporto.classeADR.name;
            }

            adr='<div class="row collapse"><div class="medium-6 large-6 columns"><span>Densit&agrave;:&nbsp;</span>' + densita + '</div><div class="medium-6 large-3 columns"><span>Classificazione seveso:&nbsp;</span>' + seveso + '</div><div class="medium-6 large-3 columns"><span>Gruppo imballaggio ADR:&nbsp;</span>' + gruppoImballaggio + '</div></div><div class="row collapse"><div class="medium-6 large-6 columns"><span>Numero ONU ADR:&nbsp;</span>' + numeroOnuAdr + '</div><div class="medium-6 large-6 columns"><span>Classe ADR:&nbsp;</span>' + classeADR + '</div></div><div class="row collapse"><div class="medium-12 large-6 columns"><span>Esenzione quantit&agrave; limitata:&nbsp;</span>' + esenzioneQuantitaLimitata + '</div><div class="medium-12 large-6 columns"><span>Titolare commercio:&nbsp;</span>' + holdertrade + '</div></div><div class="row collapse"><div class="medium-12 large-12 columns"><span>Principio Attivo Responsabile della Pericolosit&agrave; ADR:&nbsp;</span><br>' + principioAttivoAdrLine + '</div></div><div class="row collapse"><div class="medium-12 large-12 columns"><span>Note Supply Chain e Sicurezza</span><br>' + noteSupplyChainESicurezza + '</div></div>';

            $(".contenitore-info-adr").append(adr);
        },
        complete: function (result){ $('.accordion').foundation(); },
        error: function (request, status, errorThrown){}
    });

    var codici='';
    var count=1;
    var duplica='';
    var url_duplica='';
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

                //url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + idprodotto + "/" + value.id;
                url_duplica = "duplica-codice/" + cat + "/" + prodotto + "/" + idprodotto + "/" + value.id + (value.sapProductCode != undefined && value.sapProductCode.length > 0 ? "/" + value.sapProductCode : "") + (value.version != undefined && value.version > 0 ? "/" + value.version : "");
                @if ($ruoli['database prodotti'] != 'R')
                  duplica='<a href="{!! url("' + url_duplica + '") !!}" class="duplica">Duplica</a>';
                @else
                  duplica='';
                @endif

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

                if(formatoData(value.created) == '01-01-0001'){ var created = '';
                }else{ var created = formatoData(value.created); }

                codici= codici + '<tr><td>'+value.sapProductCode+'</td><td>' + value.statusName + '</td><td>' + formatoData(value.versionLastModifiedDate) + '</td><td>' + valuePackingMultiply + packingDescription + ' ' + unitaMisura + '</td><td>' + pallet + '</td><td><a href="#" class="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr> <tr id="open-stato-codice-prodotto-' + value.id + '-' + value.code + '-' + value.company.id + '-' + value.sapProductCode + '-' + value.version + '"><td colspan="8" class="colonna-stato-codice-prodotto"><div class="stato-codice-prodotto"><div class="info-codice"><span>Codice creato da:&nbsp;</span>' + value.createdBy + '</div><div class="info-codice"><span>Data creazione:&nbsp;</span>' + created + '</div></div><div class="contenitore-tab-stato-codice-prodotto"> <div class="row"><div class="columns"><ul class="tabs" data-tabs id="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><li class="tabs-title is-active"><a href="#panel1' + value.id + value.code + '" aria-selected="true">Dati codice prodotto</a></li><li class="tabs-title"><a href="#panel2' + value.id + value.code + '">Artwork</a></li></ul><div class="tabs-content" data-tabs-content="stato-codice-prodotto-tabs-' + value.id + '-' + value.code + '"><div class="tabs-panel is-active" id="panel1' + value.id + value.code + '"></div><div class="tabs-panel " id="panel2' + value.id + value.code + '"></div></div></div></div></td></tr>';

                count++;
            });
            $('#elenco-codici tbody').append(codici).foundation();
        },
        error: function (request, status, errorThrown){}
    });

    $("#elenco-codici").on("click", "a[class^='open-stato-codice-prodotto-']", function(event) {
        event.preventDefault();

        $("li.tabs-title").attr("aria-hidden","false");

        var nameclass = $(this).attr("class");
        var myarr = nameclass.split("-");
        var myvar = myarr[4] + ":" + myarr[5];

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

                var frasi_h='';
                var frasi_r='';
                var indicazioniPericoloDPD='';
                var indicazioniPericoloCLP='';
                var immagini_clp='<div class="img_regulatory">';
                var immagini_dpd='<div class="img_regulatory">';

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
                        if(value.name != undefined ){
                            immagini_clp = immagini_clp + '<div><img src="{!! URL::asset("img/ind_pericolo_clp/' + value.name + '.png") !!}"><span>' + value.name + '</span></div>';
                        }
                    }
                });
                immagini_clp = immagini_clp + '</div>';

                frasi_h=frasi_h.slice(0,-2);
                frasi_r=frasi_r.slice(0,-2);
                indicazioniPericoloDPD=indicazioniPericoloDPD.slice(0,-2);
                indicazioniPericoloCLP=indicazioniPericoloCLP.slice(0,-2);

                if(formatoData(results.data.productStato.registrationDate) == '01-01-0001'){ var registrationDate = '';
                }else{ var registrationDate = formatoData(results.data.productStato.registrationDate) }

                if(formatoData(results.data.productStato.dataTracciabilita) == '01-01-0001'){ var dataTracciabilita = '';
                }else{ var dataTracciabilita = formatoData(results.data.productStato.dataTracciabilita) }

                if(formatoData(results.data.productStato.deadlineOwner) == '01-01-0001'){ var deadlineOwner = '';
                }else{ var deadlineOwner = formatoData(results.data.productStato.deadlineOwner) }

                if(formatoData(results.data.productStato.deadlineSeller) == '01-01-0001'){ var deadlineSeller = '';
                }else{ var deadlineSeller = formatoData(results.data.productStato.deadlineSeller) }

                if(formatoData(results.data.productStato.deadlineUse) == '01-01-0001'){ var deadlineUse = '';
                }else{ var deadlineUse = formatoData(results.data.productStato.deadlineUse) }

                if(results.data.productStato.numRegistrazione == ''){  var registrazione = '';
                }else{ var registrazione = 'N<sup>&deg;</sup> ' + results.data.productStato.numRegistrazione; }

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

                if (frasi_h == "undefined" ){ frasi_h = ''; }
                if (frasi_r == "undefined" ){ frasi_r = ''; }

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

                var etax = '';
                if (!(results.data.productStato.etax.name === undefined || results.data.productStato.etax.name === null)) {
                    etax = results.data.productStato.etax.name
                }

                var iva = '';
                if (!(results.data.productStato.iva.name === undefined || results.data.productStato.iva.name === null)) {
                    iva = results.data.productStato.iva.name
                }

                tab= '<div class="contenitore-info"><div class="row collapse"><div class="medium-12 large-4 columns"><span>Famiglia:&nbsp;</span>' + results.data.productStato.categoria.name + '</div><div class="medium-12 large-4 columns"><span>Sotto famiglia:&nbsp;</span>' + results.data.productStato.subCategoria.name + '</div><div class="medium-12 large-4 columns"><span>Linea distributiva:&nbsp;</span>' + LineaDistributiva + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Registrazione:&nbsp;</span>' + registrazione + '</div><div class="medium-12 large-4 columns"><span>Data registrazione:&nbsp;</span>' + registrationDate + '</div><div class="medium-12 large-4 columns"><span>Formulazione:&nbsp;</span>' + formulazione + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Principio attivo:&nbsp;</span>' + PrincAttivo + '</div><div class="medium-12 large-4 columns end"><span>Composizione:&nbsp;</span>' + composition + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>IVA:&nbsp;</span>' + iva + '</div><div class="medium-12 large-4 columns end"><span>Ecotassa per legge:&nbsp;</span>' + etax + '</div></div><div class="row collapse"><div class="medium-12 large-12 columns"><span>Fornitore:&nbsp;</span>' + provider + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Indicazioni di Pericolo CLP:</span><br> ' + immagini_clp + '</div><div class="medium-12 large-8 columns"><span>Indicazioni di Pericolo DPD:</span><br> ' + immagini_dpd + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Consigli di prudenza:</span>' + adviceClp + '<br><span>Frasi H:</span>' + frasi_h + '</div><div class="medium-12 large-8 columns"><span>Frasi R:</span>' + frasi_r + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Data di tracciabilit&agrave;:&nbsp;</span>' + dataTracciabilita + '</div><div class="medium-12 large-8 columns"><span>Titolare registrazione:&nbsp;</span>' + trademark + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Scadenza titolare:&nbsp;</span>' + deadlineOwner + '</div><div class="medium-12 large-4 columns"><span>Scadenza rivenditore:&nbsp;</span>' + deadlineSeller + '</div><div class="medium-12 large-4 columns"><span>Scadenza impiego:&nbsp;</span>' + deadlineUse + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Numero ONU ADR:&nbsp;</span>' + onu + '</div><div class="medium-12 large-4 columns"><span>Classe ADR:&nbsp;</span>' + classeADR + '</div><div class="medium-12 large-4 columns"><span>Gruppo imballaggio ADR:&nbsp;</span>' + gruppoImballaggio + '</div></div><div class="row collapse"><div class="medium-12 large-4 columns"><span>Principio Attivo Responsabile della Pericolosit&agrave; ADR:&nbsp;</span>' + principioAttivoAdr + '</div><div class="medium-12 large-8 columns"><span>Titolare commercio:&nbsp;</span>' + holderTrade + '</div></div><div class="row collapse"><div class="medium-12 large-8 columns"><span>Classificazione seveso:&nbsp;</span>' + Seveso + '</div></div></div></div>';

                $('#panel1' + myarr[4] + myarr[5]).append(tab).foundation();

                var artwork_tab='<div class="contenitore-artwork"><div class="expanded row collapse" style="border:0;"><div class="medium-12 large-12 columns"><table id="elenco-codici"><thead><tr><th width="520">ARTWORK</th><th width="160">DATA UPLOAD</th><th width="170">CARICATO DA</th><th width="100">SCARICA</th><th width="250">COD. A BARRE IMBALLO PRIM.</th><th width="250">COD. A BARRE IMBALLO SEC.</th></tr></thead><tbody>';

                $.each(results.data.productStato.version.artworks, function(index, value){

                    if(formatoData(value.uploadDate) == '01-01-0001'){ var uploadDate = '';
                    }else{ var uploadDate = formatoData(value.uploadDate); }

                    @if ($ruoli['database prodotti'] != 'R')
                      artwork_tab = artwork_tab + '<tr><td><div class="elimina-codice" style="float:left;top:0px;left:-9px; width:50px"><button class="button" type="button" data-toggle="elimina-art' + contArt + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-art' + contArt + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-artwork"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div>' + value.name + '</td><td>' + uploadDate + '</td><td>' + value.modifiedBy + '</td><td><a href="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=' + value.id + '"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>' + value.barcodeImballoPrimario + '</td><td>' + value.barcodeImballoSecondario + '</td></tr>';
                    @else
                      artwork_tab = artwork_tab + '<tr><td><div class="elimina-codice" style="float:left;top:0px;left:-9px; width:50px"></div>' + value.name + '</td><td>' + uploadDate + '</td><td>' + value.modifiedBy + '</td><td><a href="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=' + value.id + '"><img src="{{ URL::asset('img/download.png') }}"></a></td><td>' + value.barcodeImballoPrimario + '</td><td>' + value.barcodeImballoSecondario + '</td></tr>';
                    @endif
                    contArt++;
                });
                artwork_tab= artwork_tab + '</tbody></table></div></div></div></div>';
                $('#panel2' + myarr[4] + myarr[5]).append(artwork_tab).foundation();
            }
        });
    });

    $(document).on('click', '.cancella-min', function(e) {
        e.preventDefault();
        var url = window.location.href;
        var post_data = '{ "ID" : ' + idprodotto + '}';

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/ResetEtichettaCLP",
                dataType: "json",
                data: JSON.parse(post_data),
                success: function (result) {
                    url += '?ok';
                    window.location.href = url;
                },
                error: function (request, status, errorThrown) {
                    url += '?no';
                    window.location.href = url;
                }
        });
    });

    $(document).on('click', '.cancella-sds', function(e) {
        e.preventDefault();
        var url = window.location.href;
        var post_data = '{ "ID" : ' + idprodotto + ' }';

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/ResetSchedaCLP",
                dataType: "json",
                data: JSON.parse(post_data),
                success: function (result) {
                    url += '?ok';
                    window.location.href = url;
                },
                error: function (request, status, errorThrown) {
                    url += '?no';
                    window.location.href = url;
                }
        });
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
</script>
@stop
