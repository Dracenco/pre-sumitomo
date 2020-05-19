@extends('layout.container')

@section('title')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection



@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_prod.jpg') }}" alt="">
            </div>
            <div class="item-content">
                <p class="item-title">prodotti</p>
                <p class="item-text">Scopri i vantaggi e le caratteristiche tecniche dei nostri prodotti</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
    @include('layout.fascia-prodotti')
    @include('layout.ricerca-tecnica')

@if (isset($anchor))
    <input type="hidden" name="anchor" value="{{ $anchor }}">
@endif
        <header class="page-title_wrap">
          <div class="row">
            <div class="small-12 medium-5 columns" id="DettaglioProdottoAncor">
              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                  <li><a href="index.html">Home </a></li>
                  <li><a href="<?php echo url('prodotti'); ?>">Prodotti</a></li>
                  <li id="categoria" class="nomeCategoria"></li>
                  <li id="nomeCategoriaBread"></li>
                </ul>
              </nav>
              <h1 class="page-title nomeCategoria"></h1>
            </div>
            <div class="small-12 medium-7 columns">
              <ul class="list reset-list icon-list documentiProdotto">
                <li id="sdsDownCLp"></li>
                <li id="EtMinDownCLp"></li>
                <li><a href="#" id="link-materiale-informativo"><span class="icon-info-mat"></span><spna>Materiale<br>informativo</spna></a></li>
              </ul>
            </div>
          </div>
        </header>

        <section class="product-details_wrap">
          <article class="product-details">
            <div class="row">
              <div class="small-12 columns">
                <header>
                  <div class="row">
                    <div class="small-12 medium-6 columns">
                      <h2 id="logo-prodotto"></h2>
                    </div>
                    <div class="small-12 medium-6 columns">
                      <ul class="list reset-list icon-list" id="loghibio"></ul>
                    </div>
                  </div>
                  <p id="descrizioneSintetica"></p>
                </header>

                <section class="product-data_wrap">
                  <div class="product-data">
                    <ul class="list reset-list data-list">
                      <li><p id="composizione"></p></li>
                      <li><p class="three-columns"><span id="formulazione"></span><span id="registrazione"></span><span id="dataRegistrazione"></span></p></li>
                      <li><p id="titolareReg"></p></li>
                      <li><p id="caratteristiche"></p></li>
                      <li><p class="three-columns"><span id="meccanismiDiAzioneLine"></span><span id="adviceClp"></span><span id="frasiH"></span></p></li>
                      <li id="showClp"><strong>Pittogrammi:</strong><ul class="list icon-list" id="imgClp"></ul></li>
                    </ul>
                  </div>
                </section>
              </div>

              <div class="responsive-tabs_wrap">
                <div class="responsive-tabs">

                  <ul class="tabs" data-responsive-accordion-tabs="tabs small-accordion medium-tabs" data-allow-all-closed="true" id="tabs" >
                    <li class="tabs-title is-active">
                      <a href="#coltureelenco">
                        <span>colture<span class="line-break show-for-medium"></span> e dosi</span>
                      </a>
                    </li>
                    <li class="tabs-title">
                      <a href="#miscibilita">
                        <span>miscibilit&agrave;<span class="line-break show-for-medium"></span> e corretto impiego</span>
                      </a>
                    </li>
                    <li class="tabs-title">
                      <a href="#materiale-informativo">
                        <span>materiale<span class="line-break show-for-medium"></span> informativo</span>
                      </a>
                    </li>
                    <li class="tabs-title">
                      <a href="#adr-trasporto">
                        <span>adr trasporto</span>
                      </a>
                    </li>
                  </ul>

                  <div class="tabs-content" data-tabs-content="tabs" id="coltureelenco">
                    <div class="tabs-panel is-active" id="colturaMix">
                        <ul class="accordion coltureAccordion" data-accordion id="deeplinked-accordion"></ul>
                    </div>

                    <div class="tabs-panel" id="miscibilita">
                      <div class="row">
                        <div class="small-12 columns">
                          <div id="miscibilitabox">
                              <h3>Miscibilit&agrave;</h3>
                              <p id="miscibilitaTesto"></p>
                          </div>
                          <div id="impiegobox">
                              <h3>Indicazioni Corretto Impiego</h3>
                              <p id="correttoImpiegoTesto"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tabs-panel" id="materiale-informativo">
                      <div class="row">
                        <div class="small-12 medium-9 large-7 columns">
                          <p>Scarica il materiale informativo in formato PDF.</p>
                          <ul class="list reset-list list-icon-group" id="materialeinformatico"></ul>
                        </div>
                      </div>
                    </div>
                    <div class="tabs-panel" id="adr-trasporto">
                      <div class="row">
                        <div class="small-12 columns">
                          <section class="product-data_wrap">
                            <div class="product-data">
                              <ul class="list reset-list data-list" id="adr"></ul>
                            </div>
                          </section>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </article>
        </section>

    @include('layout.rete-vendita')
    @include('layout.link-utili')
    @include('layout.disclaimer')
    @yield('script')
@endsection

@section('script')
<script type="text/javascript">
    if ( $( "[name='anchor']" ).length ) {
        window.location = '#DettaglioProdottoAncor';
    }
    
   var codeProduct = '';

   $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: UrlWebService + "api/Site/GetProductIdFromUrlSumitomo?urlSumitomo=/<?php echo filter_var( Request::path(), FILTER_SANITIZE_STRING); ?>",
        async:false,
        success: function (result) {
           codeProduct = result.data.code;
        },
        error: function (request, status, errorThrown) {}
    });

   $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: UrlWebService + "api/Site/GetProduct?code=" + codeProduct,
        async:false,
        success: function (result) {

            var src = UrlWebService + "api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<span class='show-for-sr'>" + result.data.name + "</span><img src='" + src + "' title='" + result.data.name + "' class='logo'>");

            $(".nomeCategoria").append(result.data.categoria.name);
            $("#nomeCategoriaBread").append(result.data.name);
            $("title").append(result.data.name + ' - Sumitomo Chemical Italia');

            var materialeInformatico = '';

            if (!(result.data.schedaCLP.id === undefined || result.data.schedaCLP.id === null)) {

                var stringSdsClp='<a href="' + UrlWebService + "api/Download/DownloadFile?fileId=" + result.data.schedaCLP.id + '"><span class="icon-download-sds"></span><span>scheda<br>di sicurezza</span></a>';

                materialeInformatico = '<li><a href="' + UrlWebService + "api/Download/DownloadFile?fileId=" + result.data.schedaCLP.id + '"><span class="icon-download"></span><span>Scheda di Sicurezza</span></a></li>';

                $("#sdsDownCLp").append(stringSdsClp);
            }

            if (!(result.data.etichettaCLP.id === undefined || result.data.etichettaCLP.id === null)) {

                var stringEtMinClp='<a href="' + UrlWebService + "api/Download/DownloadFile?fileId=" + result.data.etichettaCLP.id + '"><span class="icon-download-sds"></span><span>Etichetta<br>ministeriale</span></a>';

                materialeInformatico = materialeInformatico + '<li><a href="' + UrlWebService + "api/Download/DownloadFile?fileId=" + result.data.etichettaCLP.id + '"><span class="icon-download"></span><span>Etichetta Ministeriale</span></a></li>';

                $("#EtMinDownCLp").append(stringEtMinClp);
            }

            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("lang", "it");
                },
                url: UrlWebService + "api/site/GetProductComunicazioni?code=" + codeProduct,
                async:false,
                success: function (result) {
                    $.each(result.data.comunicazioni, function(index, value){
                        materialeInformatico = materialeInformatico + '<li><a href="' + UrlWebService + "api/Download/DownloadFile?fileId=" + value.file.fileID + '"><span class="icon-download"></span><span>' + value.description + '</span></a></li>';
                    });
               },
                error: function (request, status, errorThrown) {}
            });

            $("#materialeinformatico").append(materialeInformatico);

            if(result.data.shortDescription == '' || result.data.shortDescription == null ){
                var shortDescriptionLine = '';
            }else{
                var shortDescriptionLine = (result.data.shortDescription).replace(/(\r\n|\n|\r)/gm, "<br>");
            }
            $("#descrizioneSintetica").html(shortDescriptionLine);
            $('meta[name=description]').attr('content', shortDescriptionLine);

            if(result.data.composition == '' || result.data.composition == null ){
                var compositionLine = '';
            }else{
                var compositionLine = (result.data.composition).replace(/(\r\n|\n|\r)/gm, "<br>");
            }
            $("#composizione").html("<strong>Composizione: </strong>" + compositionLine);

            if (!(result.data.formulation.name === undefined || result.data.formulation.name === null)) {
                $("#formulazione").html("<strong>Formulazione: </strong>" + result.data.formulation.name + ' - ' + result.data.formulation.description + "<span class='line-break hide-for-medium'></span>");
            }else{
                $("#formulazione").html("<strong>Formulazione: </strong>");
            }

            if(result.data.registrationNumber == '' || result.data.registrationNumber == null ){
                var registrazione = '';
            }else{
                var registrazione = result.data.registrationNumber;
            }

            if(formatoData(result.data.registrationDate) == '01-01-0001'){
                var dataRegistrazione = '';
            }else{
                var dataRegistrazione = formatoData(result.data.registrationDate);
            }

            $("#registrazione").html("<strong>Registrazione:</strong> N<sup>&deg;</sup> " + registrazione + "<span class='line-break hide-for-medium'></span>");
            $("#dataRegistrazione").html("<strong>Data registrazione: </strong>" + dataRegistrazione);

            if(result.data.characteristics == '' || result.data.characteristics == null ){
                var characteristicsLine = '';
                $("#caratteristiche").css('display','none');
            }else{
                var characteristicsLine = (result.data.characteristics).replace(/(\r\n|\n|\r)/gm, "<br>");
                $("#caratteristiche").html("<strong>Caratteristiche:</strong><br>" + characteristicsLine );
            }

            if(result.data.trademark.description == '' || result.data.trademark.description == null || result.data.trademark.description == undefined ){
                var titolareReg = '';
                $("#titolareReg").css('display','none');
            }else{
                var titolareReg = (result.data.trademark.description).replace(/(\r\n|\n|\r)/gm, "<br>");
                $("#titolareReg").html("<strong>Titolare della registrazione:</strong> " + titolareReg );
            }

            if(result.data.meccanismiDiAzione == '' || result.data.meccanismiDiAzione == null ){
                var meccanismiDiAzioneLine = '';
                $("#meccanismiDiAzioneLine").css('display','none');
            }else{
                var meccanismiDiAzioneLine = (result.data.meccanismiDiAzione).replace(/(\r\n|\n|\r)/gm, "<br>");
                $("#meccanismiDiAzioneLine").html("<strong>Meccanismi d'azione:</strong> " + meccanismiDiAzioneLine );
            }

            if(result.data.regulatory.adviceClp.name == '' || result.data.regulatory.adviceClp.name == null || result.data.regulatory.adviceClp.name == undefined ){
                var adviceClp = 'Nessuna';
            }else{
                var adviceClp = (result.data.regulatory.adviceClp.name).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            $("#adviceClp").html("<strong>Avvertenze di pericolo:</strong> " + adviceClp );

            var frasi_h='';
            $.each(result.data.regulatory.frasiH, function(index, value){
                if(!(value.name == '' || value.name == null || value.name == 'undefined')) {
                    frasi_h = frasi_h + value.name + ', ';
                }
            });
            frasi_h=frasi_h.slice(0,-2);

            if(frasi_h =='') {
                $("#frasiH").html('');
            }else{
                $("#frasiH").html("<strong>Frasi H:</strong> " + frasi_h);
            }

            var immagini_clp='';
            var indicazioniPericoloCLP = '';
            $.each(result.data.regulatory.indicazioniPericoloCLP, function(index, value){

                if(!(value.name == '' || value.name == null || value.name == 'undefined')) {
                indicazioniPericoloCLP = indicazioniPericoloCLP + value.name + ', ' ;

                    if(value.name!='NO'){
                        immagini_clp = immagini_clp + '<li><img src="{!! URL::asset("images/ind_pericolo_clp/' + value.name + '.png") !!}"><br><span>' + value.name + '</span></li>';
                    }
                }
            });

            if(immagini_clp =='') {
                $("#showClp").css('display','none');
            }else{
                $("#imgClp").html(immagini_clp);
            }

            var stringLoghiBio='';

            if(result.data.bio){
                stringLoghiBio = stringLoghiBio + '<li><img src="{{ URL::asset('images/loghibio/bio.png') }}" alt="Consentito in agricoltura biologica"></li>';
            }

            if(result.data.biorazionale){
               stringLoghiBio = stringLoghiBio + '<li><img src="{{ URL::asset('images/loghibio/logo-biorazionale.png') }}" alt="Biorazionale"></li>';
            }

            if(result.data.idrosolubile){
                stringLoghiBio = stringLoghiBio + '<li><img src="{{ URL::asset('images/loghibio/idrosolubile.png') }}" alt="Idrosolubile"></li>';
            }

            if(result.data.materbi){
                stringLoghiBio = stringLoghiBio + '<li><img src="{{ URL::asset('images/loghibio/materbi_on.png') }}" alt="MATER-BI"></li>';
            }

            $("#loghibio").html(stringLoghiBio);

            var principiAttivi='';
            $.each(result.data.principiAttivi, function(index, value){
                 principiAttivi=value.name;
            });

            if(result.data.miscibilita == '' || result.data.miscibilita == null || result.data.miscibilita == undefined ){
                var miscibilitaLine = '';
                $("#miscibilitabox").css('display','none');
            }else{
                var miscibilitaLine = (result.data.miscibilita).replace(/(\r\n|\n|\r)/gm, "<br>");
                $("#miscibilitaTesto").html(miscibilitaLine);
            }

            if(result.data.indicationUse == '' || result.data.indicationUse == null || result.data.indicationUse == undefined ){
                var titolareReg = '';
                $("#impiegobox").css('display','none');
            }else{
                var indicationUseLine = (result.data.indicationUse).replace(/(\r\n|\n|\r)/gm, "<br>");
                $("#correttoImpiegoTesto").html(indicationUseLine);
            }

            var seveso='';
            $.each(result.data.adrTrasporto.classificazioniSeveso, function(index, value){
               seveso = seveso + value.name + ', ' ;
            });
            seveso=seveso.slice(0,-2);

            if(result.data.adrTrasporto.principioAttivoAdr == '' || result.data.adrTrasporto.principioAttivoAdr == null ){
                var principioAttivoAdrLine = '';
            }else{
                var principioAttivoAdrLine = (result.data.adrTrasporto.principioAttivoAdr).replace(/(\r\n|\n|\r)/gm, "<br>");
            }

            if(result.data.esenzioneQuantitaLimitata){
                var esenzioneQuantitaLimitata = 'Si';
            }else{
                var esenzioneQuantitaLimitata = 'No';
            }

            var adr = '';

            if (!(result.data.adrTrasporto.numeroOnuAdr === undefined || result.data.adrTrasporto.numeroOnuAdr === null)) {
                adr = adr + '<li><p><strong>Numero ONU: </strong>' + result.data.adrTrasporto.numeroOnuAdr + '</p></li>';
            }

            if (!(result.data.adrTrasporto.classeADR.name === undefined || result.data.adrTrasporto.classeADR.name === null)) {
                adr = adr + '<li><p><strong>Classe: </strong>' + result.data.adrTrasporto.classeADR.name + '</p></li>';
            }

            if (!(result.data.adrTrasporto.gruppoImballaggio === undefined || result.data.adrTrasporto.gruppoImballaggio === null)) {
                adr = adr + '<li><p><strong>Gruppo Imballaggio: </strong>' + result.data.adrTrasporto.gruppoImballaggio + '</p></li>';
            }

            if (!(principioAttivoAdrLine === undefined || principioAttivoAdrLine === null)) {
                adr = adr + '<li><p><strong>Principio attivo responsabile della pericolosità: </strong>' + principioAttivoAdrLine + '</p></li>';
            }

            if (!(seveso === undefined || seveso === null)) {
                adr = adr + '<li><p><strong>Classificazione Seveso: </strong>' + seveso + '</p></li>';
            }

            if (!(seveso === undefined || seveso === null)) {
                adr = adr + '<li><p><strong>Esenzione quantità limitata: </strong>' + esenzioneQuantitaLimitata + '</p></li>';
            }

            $("#adr").html(adr);

            var avvertenzeArray = new Array();
            var colture= result.data.colture;
            var i=30;
            var StringColture ='';

            $.each(colture, function(index, value){

                var phi='';

				if (!(value.tempoDiCarenza === undefined || value.tempoDiCarenza === null)) {
					phi = value.tempoDiCarenza;
                }

                StringColture = StringColture + '<li class="accordion-item" data-accordion-item><a href="#deeplink' + i +'" class="accordion-title">' + value.name + '</a><div class="accordion-content" data-tab-content id="deeplink' + i +'"><div class="riga_intestazione_avversita"><div class="intestazione_tempo_carenza">Intervallo di sicurezza</div><div class="intestazione_avversita_controllate">Avversit&agrave; controllata/Utilizzo</div><div class="intestazione_dosi">Dosi</div><div class="intestazione_impiego">Modalit&agrave; d\'impiego</div></div>';

                StringColture = StringColture + '<div class="contenitore_avversita"><div class="tempo_carenza">' + phi + '</div>';

                avvertenzeArray = value.avversita;

                $.each(avvertenzeArray, function(index_avversita, value_avversita){
                    var ix = 0;
                    var array_dosi = new Array();
                    var array_impiego = new Array();

                    $.each(value_avversita.dosi, function(index_dosi, value_dosi){
                        array_dosi.push(value_dosi.name);
                    });

                    $.each(value_avversita.impieghi, function(index_impieghi, value_impieghi){
                         array_impiego.push(value_impieghi.name);
                    });

                    StringColture = StringColture + '<div class="contenitore_avversita_controllata">';

                    var arrAvversita = value_avversita.name;
                    var arrDosi = array_dosi[ix];
                    var arrImpiego = array_impiego[ix];


                    if(typeof arrAvversita !== 'undefined' && arrAvversita.length > 0) {
                        if(arrAvversita != ''){
							              arrAvversita = arrAvversita.replace(/\n/g, "<br />");
                            StringColture = StringColture + '<div class="avversita_controllate"><span class="mobileAvversita">Avversit&agrave; controllata/Utilizzo</span>' + arrAvversita + '<span class="mobilePhi">Intervallo di sicurezza: ' + phi +  '</span>'+ '</div>';
                        }else{
                            StringColture = StringColture + '<div class="avversita_controllate">&nbsp;</div>';
                        }
                    }else{
                        StringColture = StringColture + '<div class="avversita_controllate">&nbsp;</div>';
                    }

                    if(typeof arrDosi !== 'undefined' && arrDosi.length > 0) {
                        if(arrDosi != ''){
							arrDosi = arrDosi.replace(/\n/g, "<br />");
                            StringColture = StringColture + '<div class="colonna_dosi"><span class="mobileDosi">Dosi</span>' + arrDosi + '</div>';
                        }else{
                            StringColture = StringColture + '<div class="colonna_dosi">&nbsp;</div>';
                        }
                    }else{
                        StringColture = StringColture + '<div class="colonna_dosi">&nbsp;</div>';
                    }

                    if(typeof arrImpiego !== 'undefined' && arrImpiego.length > 0) {
                        if(arrImpiego != ''){
							arrImpiego = arrImpiego.replace(/\n/g, "<br />");
                            StringColture = StringColture + '<div class="colonna_impiego"><span class="mobileImpiego">Modalit&agrave; d\'impiego</span>' + arrImpiego + '</div>';
                        }else{
                            StringColture = StringColture + '<div class="colonna_impiego">&nbsp;</div>';
                        }
                    }else{
                        StringColture = StringColture + '<div class="colonna_impiego">&nbsp;</div>';
                    }

                    StringColture = StringColture + '</div>';

                    array_dosi.splice(0, 1);
                    array_impiego.splice(0, 1);

                     ix = ix + 1;

                    if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                        while(array_dosi.length>0){
                            StringColture = StringColture + '<div class="contenitore_avversita_controllata"><div class="avversita_controllate">&nbsp;</div>';

                            if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                                if(array_dosi[0] != ''){
                                    StringColture = StringColture + '<div class="colonna_dosi">' + array_dosi[0] + '</div>';
                                }else{
                                    StringColture = StringColture + '<div class="colonna_dosi">&nbsp;</div>';
                                }
                            }else{
                                StringColture = StringColture + '<div class="colonna_dosi">&nbsp;</div>';
                            }

                            if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                                if(array_impiego[0] != ''){
                                    StringColture = StringColture + '<div class="colonna_impiego">' + array_impiego[0] + '</div>';
                                }else{
                                    StringColture = StringColture + '<div class="colonna_impiego">&nbsp;</div>';
                                }
                            }else{
                                StringColture = StringColture + '<div class="colonna_impiego">&nbsp;</div>';
                            }

                            StringColture = StringColture + '</div>';

                             array_dosi.splice(0, 1);
                            array_impiego.splice(0, 1);
                        }
                    }

                    if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                        while(array_impiego.length > 0){
                            StringColture = StringColture + '<div class="contenitore_avversita_controllata"><div class="avversita_controllate">&nbsp;</div>';

                            if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                                if(array_dosi[0] != ''){
                                    StringColture = StringColture + '<div class="colonna_dosi">' + array_dosi[0] + '</div>';
                                }else{
                                    StringColture = StringColture + '<div class="colonna_dosi">&nbsp;</div>';
                                }
                            }else{
                                StringColture = StringColture + '<div class="colonna_dosi">&nbsp;</div>';
                            }

                            if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                                if(array_impiego[0] != ''){
                                    StringColture = StringColture + '<div class="colonna_impiego">' + array_impiego[0] + '</div>';
                                }else{
                                    StringColture = StringColture + '<div class="colonna_impiego">&nbsp;</div>';
                                }
                            }else{
                                StringColture = StringColture + '<div class="colonna_impiego">&nbsp;</div>';
                            }

                            StringColture = StringColture + '</div>';

                            array_dosi.splice(0, 1);
                            array_impiego.splice(0, 1);
                        }
                    }
                });

                StringColture = StringColture + '</div></div></li>';
                i++;
            });
             $("#deeplinked-accordion").append(StringColture);
        },

        error: function (request, status, errorThrown) {},
        complete: function(data) {
            Foundation.reInit(['accordion'])
        }
    });

   $("#link-materiale-informativo").click(function (event) {
        event.preventDefault();
        $("#materiale-informativo").addClass("is-active");
        $("#materiale-informativo-label").attr("aria-selected","true");
        $("#miscibilita, #colturaMix, #adr-trasporto").removeClass("is-active");
        $("#miscibilita-label, #coltureelenco-label, #adr-trasporto-label").attr("aria-selected","false");
        $('html, body').animate({
            scrollTop: $("#materiale-informativo").offset().top
        }, 2000);
   });

    $("a#miscibilita-label,a#materiale-informativo-label,a#adr-trasporto-label").click(function (event) {
        event.preventDefault();
        $("#coltureelenco div.tabs-panel").removeClass("is-active");
    });

    $("a#miscibilita-label,a#coltureelenco-label,a#adr-trasporto-label").click(function (event) {
        event.preventDefault();
        $("#materiale-informativo-label").attr("aria-selected","false");
    });

    $("a#coltureelenco-label").click(function (event) {
        event.preventDefault();
        $("#colturaMix").addClass("is-active");
        $("#miscibilita, #materiale-informativo, #adr-trasporto").removeClass("is-active");
    });
</script>
@stop
