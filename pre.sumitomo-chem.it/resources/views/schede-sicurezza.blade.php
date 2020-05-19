@extends('layout.container')

@section('title', 'Schede di sicurezza - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
          <div class="item-image"></div>
            <div class="item-content">
                <h1 class="item-title" id="sicurezza_titolo"></h1>
                <p class="item-text" id="sicurezza_sottotitolo"></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')    
        <!-- page-title -->
        <header class="page-title_wrap light">
          <div class="row">
            <div class="small-12 columns">
              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                  <li><a href="<?php echo url('/'); ?>">Home</a></li>
                  <li><a href="<?php echo url('sicurezza'); ?>">Sicurezza</a></li>
                  <li>Schede di Sicurezza / Etichette Ministeriali</li>
                </ul>
              </nav>
              <h2 class="page-title">SCHEDE DI SICUREZZA (SDS)<br>ETICHETTE MINISTERIALI (ET. MIN.)</h2>
            </div>
          </div>
        </header>
        <!-- page-title -->

        <section class="full-box_wrap">
          <div class="full-box fit">
            <section class="row">
              <div class="small-12 medium-6 columns">
                <header>
                  <h3 class="sumitomo-color">Cerca</h3>
                </header>
                <p>Inserisci il nome del prodotto per accedere alla Scheda di Sicurezza e all'Etichetta Ministeriale.</p>
                <div style="position:relative;display:inline">
                    <form method="post" class="ricercasds">
                        <input type="text" id="cercaSds" class="input-group-field" />                        
                        <input type="submit" class="button btn-secondary" value="Cerca">
                        <div class="suggesstion-box"></div>
                    </form>
                </div>
              </div>
              <div class="small-12 medium-6 columns" id="docSicurezza"></div>
            </section>

            <section class="row">
              <div class="small-12 medium-6 columns">
                <header>
                  <h3 class="inner-title">SDS ON DEMAND</h3>
                </header>
                <p>SDS OnDemand è un'applicazione web gratuita e innovativa ideata e realizzata da Image Line srl, che permette a chi opera nei settori della chimica e dei mezzi tecnici per l'agricoltura di inviare al proprio portfolio clienti gli aggiornamenti delle schede di sicurezza degli agrofarmaci e le istruzioni di sicurezza di tutti i vari preparati ad uso commerciale.</p>
              </div>
              <div class="small-12 medium-6 columns">
                <header>
                  <h3 class="inner-title show-for-medium">&nbsp;</h3>
                </header>
                <p>SDS OnDemand rispetta i requisiti della normativa, permette di ricevere i documenti in tempo reale, crea un contatto diretto tra azienda e distributore (evitando eventuali errori di comunicazione).</p>
                <ul class="list reset-list simple-list">
                  <li>
                    <a href="http://sdsondemand.imagelinenetwork.com/it/accedi/" target="_blank">Accedi al servizio SDS OnDemand</a>
                  </li>
                </ul>
              </div>
            </section>
          </div>
        </section>

        <section class="full-box_wrap">
          <div class="full-box dark-color">
            <div class="row">
              <div class="small-12 medium-6 columns">
                <header>
                  <h2 class="section-title">Scarica qui</h2>
                </header>
              </div>
              <div class="small-12 medium-6 columns fake-icon">
                <span class="icon-download rounded-bg text-highlight"></span>
              </div>
            </div>

            <div class="row">
              <div class="small-12 medium-6 columns">
                <div class="text-box">
                  <p>
                    <strong>Tutte le Schede di Sicurezza (SDS) e le Etichette Ministeriali (ET. MIN.) Sumitomo Chemical Italia e Siapa</strong>
                  </p>
                </div>
              </div>
              <div class="small-12 medium-6 columns">
                <ul class="list reset-list simple-list" id="zip"></ul>
              </div>
            </div>
          </div>
        </section>

    @include('layout.rete-vendita') 
    @include('layout.disclaimer') 
    @yield('script')

@endsection

@section('script')
<script type="text/javascript">        
   $("#cercaSds").keyup(function(){
       var elencoRicerca='';
       
       if($(this).val().length >= 2){
		$.ajax({
		   type: "GET",
           beforeSend: function (request) {
                request.setRequestHeader("lang", "it");                
           }, 
		   url:UrlWebService + "api/Site/SearchAllProduct?name=" + $(this).val(),
		   success: function (result) { 
            
           $.each(result.data, function(index, value){ 
		   console.log(value.name);
                elencoRicerca = elencoRicerca + '<a class="prodottosds" id="' + value.code + '=' + value.name + '">' + value.name + '</a>';
           });   
            
           $(".suggesstion-box").html(elencoRicerca);
            
            $("a.prodottosds").click(function(e) {
                e.preventDefault();
                var myId = $(this).attr('id');
                var res = myId.split("=");
                $("#suggesstion-box").html('');
                $("#cercaSds").attr('name', res[0]);
                $("#cercaSds").val( res[1] );
            });
    
        },
        error: function (request, status, errorThrown) {}			
		});
        }
	});
    
    $("form.ricercasds").submit(function(e) {
        e.preventDefault();
        $(".nomeprodottoSicurezza").html('');
        $("#docSicurezza").html('');
        
        var idProdotto = $('#cercaSds').attr("name");
        var stringSicurezza = '<header><h3 class="sumitomo-color">Scarica</h3><h4 class="h3 nomeprodottoSicurezza"></h4></header><ul class="list reset-list simple-list">';
        
         $.ajax({
		   type: "GET",
           beforeSend: function (request) {
                request.setRequestHeader("lang", "it");                
           }, 
		   url:UrlWebService + "api/Site/GetProduct?code=" + idProdotto,
            success: function (result) {
                        
                if(!(result.data.schedaCLP.id === undefined || result.data.schedaCLP.id === null)){
                    stringSicurezza = stringSicurezza + '<li><a href="' + UrlWebService + 'api/Download/DownloadFile?fileId=' + result.data.schedaCLP.id + '" id="DownsdsClp">Scheda di Sicurezza</a></li>';
                }
                
                if(!(result.data.etichettaCLP.id === undefined || result.data.etichettaCLP.id === null)){
                    stringSicurezza = stringSicurezza + '<li><a href="' + UrlWebService + 'api/Download/DownloadFile?fileId=' + result.data.etichettaCLP.id + '" id="DownsdsClp">Etichetta Ministeriale</a></li>';
                }
                
                if(!(result.data.schedaDPD.id === undefined || result.data.schedaDPD.id === null)){
                    stringSicurezza = stringSicurezza + '<li><a href="' + UrlWebService + 'api/Download/DownloadFile?fileId=' + result.data.schedaDPD.id + '" id="DownsdsClp">Scheda di Sicurezza DPD</a></li>';
                }
                
                if(!(result.data.etichettaDPD.id === undefined || result.data.etichettaDPD.id === null)){
                    stringSicurezza = stringSicurezza + '<li><a href="' + UrlWebService + 'api/Download/DownloadFile?fileId=' + result.data.etichettaDPD.id + '" id="DownsdsClp">Etichetta Ministeriale DPD</a></li>';
                }
                                    
                stringSicurezza = stringSicurezza + '</ul>';
                
            $(".nomeprodottoSicurezza").html(result.data.name);
            $("#docSicurezza").append(stringSicurezza);
        },
        error: function (request, status, errorThrown) {}			
		});        
    });
    
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");                
        }, 
        contentType: true,
        processData: false,
        async:false,
        url: UrlWebService + "api/Site/GetFamigliaList?all=false",
        success: function (result) {
            var zip = '';
            $.each(result.data, function(index, value){ 
               if(!(value.name == 'Nutrizionali' || value.name =='PGR' || value.name =='Trappole e feromoni')){ 
                categoriaId = value.value;                                        
                zip = zip + '<li><strong>' + value.name + '</strong><a href="' + UrlWebService + 'api/Download/DownloadAllSDS?categoryId=' + categoriaId + '">SDS</a><a href="' + UrlWebService + 'api/Download/DownloadAllEtichette?categoryId=' + categoriaId + '">ET. MIN.</a></li>';
               } 
            });
            
            $("#zip").append(zip);
            
        },
        error: function (request, status, errorThrown) {}
    });       
    
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=5",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                if(value.id == 47){ $("#sicurezza_titolo").html(value.description); }
                if(value.id == 48){ $("#sicurezza_sottotitolo").html(value.description); }
            });
        }
    });

    var fielIdImg1 = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=47",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg1 = value.id; 
            });
            if(fielIdImg1 != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg1;
                $(".item-image").append("<img src='" + src1 + "' alt='Sumitomo Chemical Italia - Sicurezza'/>");
            }
        },
        error: function (request, status, errorThrown){}
    });
</script>
@stop