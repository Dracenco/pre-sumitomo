<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}" dir="ltr">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title')</title>

      <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/apple-icon-57x57.png') }}">
      <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/apple-icon-60x60.png') }}">
      <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-icon-72x72.png') }}">
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon-76x76.png') }}">
      <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-icon-114x114.png') }}">
      <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/apple-icon-120x120.png') }}">
      <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/apple-icon-144x144.png') }}">
      <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/apple-icon-152x152.png') }}">
      <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-icon-180x180.png') }}">
      <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/android-icon-192x192.png') }}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
      <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
      <link rel="manifest" href="{{ URL::asset('images/manifest.json') }}">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="{{ asset('images/ms-icon-144x144.png') }}">
      <meta name="theme-color" content="#ffffff">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      @yield('metatagSeo')
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    </head>

    <body>
    <div class="off-canvas-wrapper page-layout @if(Request::is('/')) page-home @endif">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

        <header>
            <section class="title-bar_wrap" data-sticky-container>
                <div class="title-bar sticky is-anchored is-at-top" data-sticky data-sticky-on="small" data-margin-top="0">
                    <div class="row">
                      <div class="title-bar-left small-9 medium-4 columns">
                        <h1 class="logo">
                          <a href="<?php echo url('/'); ?>"><span class="show-for-sr">Sumitomo Chemical Italia - Siapa Milano</span></a>
                        </h1>
                      </div>

                      <div class="title-bar-right small-3 medium-8 columns">
                        <div data-responsive-toggle="widemenu" data-hide-for="medium">
                          <button class="title-bar-title" data-open="offCanvasRight">Menu</button>
                        </div>

                        <div class="top-bar_wrap" data-show-for="medium">
                          <nav id="widemenu" class="top-bar">
                            <ul class="menu top-bar-right">
                              <li><a href="<?php echo url('chi-siamo'); ?>">Chi siamo</a></li>
                              <li><a href="<?php echo url('prodotti'); ?>">Prodotti</a></li>
                              <li><a href="<?php echo url('biorazionale'); ?>">Biorazionale</a></li>
                              <li><a href="<?php echo url('sicurezza'); ?>">Sicurezza</a></li>
                              <li><a href="<?php echo url('csr'); ?>">CSR</a></li>
                              <li><a href="<?php echo url('contatti'); ?>">Contatti</a></li>
                              <li><button class="search-btn" data-open="searchForm"><i class="icon-search"></i></button></li>
                            </ul>
                          </nav>
                          <div id="searchForm" class="off-canvas position-top search_wrap" data-off-canvas data-position="top">
                            <div class="form-group columns small-12 medium-11" >
                              <form method="post" action="<?php echo url('ricerca'); ?>" style="position:absolute; width:100%">
                                  <label class="show-for-sr" id="searchLabel">Cerca i nostri prodotti</label>
                                  <input type="text" placeholder="Cerca i nostri prodotti" aria-labelledby="searchLabel" name="ricercaProdotti" id="cercaProdotto">
                                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                  <button class="close-button" aria-label="Close menu" type="button" data-close="searchForm">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </section>

            @yield('slider')

            <div class="sds_wrap" data-sticky-container>
                <a href="<?php echo url('schede-di-sicurezza'); ?>" class="sticky is-anchored is-at-top" data-sticky data-sticky-on="small" data-margin-top="0"></a>
            </div>
        </header>

        <aside class="off-canvas position-right mobile-menu" id="offCanvasRight" data-off-canvas data-transition="overlap" data-position="right">
            <button class="close-button" aria-label="Close menu" type="button" data-close><span aria-hidden="true">&times;</span></button>

            <div class="search_wrap">
                <div class="input-group-btn">
                    <div class="input-group">
                        <form method="post" action="<?php echo url('ricerca'); ?>" >
                            <input class="input-group-field" type="text" placeholder="Cerca i nostri prodotti" name="ricercaProdotti" id="ricercaProdotti">
                            <div class="input-group-button">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <button type="button" class="button"><span class="icon-search"></span></button>
                                <div id="suggesstion-box"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <nav>
                <ul class="menu vertical first-level">
                    <li><a href="<?php echo url('chi-siamo'); ?>" class="menu-item">Chi siamo</a></li>
                    <li><a href="<?php echo url('prodotti#mainContent'); ?>" class="menu-item">Prodotti</a></li>
                    <li><a href="<?php echo url('biorazionale'); ?>" class="menu-item">Biorazionale</a></li>
                    <li><a href="<?php echo url('sicurezza'); ?>" class="menu-item">Sicurezza</a></li>
                    <li><a href="<?php echo url('csr'); ?>">CSR</a></li>
                    <li><a href="<?php echo url('contatti'); ?>" class="menu-item">Contatti</a></li>
                </ul>
                <ul class="menu vertical second-level" data-magellan data-options="barOffset:25">
                    <li><a href="#ricerca-tecnica" class="menu-item">ricerca tecnica</a></li>
                    <li><a href="<?php echo url('rete-vendita-sumitomo'); ?>" class="menu-item">Rete vendita Sumitomo</a></li>
                    <li><a href="<?php echo url('rete-vendita-siapa'); ?>" class="menu-item">Rete vendita Siapa</a></li>
                    <li><a href="<?php echo url('news'); ?>" class="menu-item">news</a></li>
                    <li><a href="<?php echo url('biorazionale#adversity_wrap'); ?>" class="menu-item">scheda difesa</a></li>
                    <li><a href="{{ asset('catalogo/Catalogo_prodotti_completo_Sumitomo.pdf') }}" target="_blank" class="menu-item">Catalogo Sumitomo Chemical Italia</a></li>
                    <li><a href="{{ asset('catalogo/Catalogo_prodotti_Siapa.pdf') }}" target="_blank" class="menu-item">Catalogo Siapa</a></li>
                </ul>
            </nav>
        </aside>

        <main id="mainContent" class="off-canvas-content" data-off-canvas-content>@yield('content')</main>

        <footer>
         <div class="row">
          <div class="small-12 medium-3 columns">
            <img src="{{ asset('images/sumitomo-siapa-logo-white.svg') }}" alt="Sumitomo Chemical italia - Siapa" class="logo">
          </div>
          <div class="small-12 medium-5 columns">
            <ul class="list reset-list list-inline">
              <li><a href="https://www.facebook.com/sumitomochemicalitalia" class="icon-facebook" target="_blank"></a></li>
              <li><a href="https://twitter.com/sumitomochemit" class="icon-twitter" target="_blank"></a></li>
              <li><a href="https://www.youtube.com/channel/UCZbH7EQxBdMIa4NeWcTjj6Q" class="icon-youtube" target="_blank"></a></li>
              <li><a href="https://www.linkedin.com/company/10533416/" class="icon-linkedin" target="_blank"></a></li>
            </ul>
          </div>
          <div class="small-12 medium-4 columns">
            <ul class="list reset-list list-inline">
              <li><a href="<?php echo url('privacy-policy'); ?>">Privacy Policy</a></li>
              <li><a href="<?php echo url('cookies'); ?>">Cookies</a></li>
            </ul>
          </div>
        </div>
        <hr class="show-for-medium">
        <div class="row">
          <div class="small-12 columns">
              <p>&copy;{{ date('Y') }} SUMITOMO CHEMICAL ITALIA s.r.l. - C.F. e P.IVA 11123640150 - <a href="https://www.sdwwg.it" target="_blank">Credits</a></p>
            <p>SUMITOMO CHEMICAL ITALIA S.r.l. - Via Caldera, 21 - 20153 Milano - Tel: +39 02 452801 - Fax: +39 02 45280400<br>&copy; Copyright 2011 e successivi SUMITOMO CHEMICAL ITALIA s.r.l. - P.Iva 11123640150 - Capitale Sociale Euro 1.000.000 i.v.</p>
          </div>
        </div>
      </footer>

        </div>
    </div>

    <script src="{{ URL::asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/lib/foundation.min.js') }}"></script>
    <script src="{{ URL::asset('js/lib/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ URL::asset('js/lib/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('js/sumitomo.js') }}"></script>
    @yield('script')

    <script type=text/blocked>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-62723177-1', 'auto');
      ga('send', 'pageview');
    </script>

    <script type="text/javascript">
	var resSiapa = [];
	$.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=16",
        async:false,
        success: function (resultsSection){
            $.each(resultsSection.data, function(index, value){
              resSiapa.push(value.id);

            });                  
        }
    });

	
	var resSumitomo = [];
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=17",
        async:false,
        success: function (resultsSection){
            $.each(resultsSection.data, function(index, value){
              resSumitomo.push(value.id);

            });                   
        }
    });
 
	var children = $.merge(resSiapa, resSumitomo);//mergeTwo(resSiapa, resSumitomo);
  
    var array_last;
    var notizia = '';
    var srcX = '';
    var resI = '';
    var name = '';

    array_last = children.slice(-3);
    array_last.reverse();
 
    $.each(array_last, function(ind, vl) {
      $.ajax({
          type: "GET",
          beforeSend: function (request) {
              request.setRequestHeader("lang", "it");
          },
          url: "{{ config('constants.UrlWebService') }}api/Site/GetSezione?idSezione=" + vl,
          async:false,
          success: function (resultsSection){          
            $.ajax({
              type: "GET", 
                  beforeSend: function (request) {           
                  request.setRequestHeader("lang", "it");
              },
              url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + vl,      
              async:false,
              success: function (result){
                  $.each(result.data, function(index, value){           
                      

                      fielIdImgX = value.id; 
                      name = value.name;
                      resI = name.split(".");
                      if(resI[0] == 'preview'){                        
                          srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                      }
                  });               
              },
              error: function (request, status, errorThrown){}
            });
            notizia = notizia + '<div class="box"><div class="image"><img class="owl-lazy" data-src="' + srcX + '"></div><div class="item-content equal-height"><p class="item-text">' + resultsSection.data.name + '</p> </div><a href="{!! url("news/' + vl + '") !!}" class="cta"><span class="show-for-sr">Approfondisci la notizia</span></a></div>';          
            fielIdImgX = ''; 
            srcX = '';
            name = '';
            resI = '';
          } 
      });
    });
	
    /*for (i = 0; i < array_last.length; i++) {      
        
        $.ajax({
          type: "GET",
          beforeSend: function (request) {
              request.setRequestHeader("lang", "it");
          },
          url: "{{ config('constants.UrlWebService') }}api/Site/GetSezione?idSezione=" + array_last[i],
          //async:false,
          success: function (resultsSection){          
              $.ajax({
              type: "GET", 
                  beforeSend: function (request) {           
                  request.setRequestHeader("lang", "it");
              },
              url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + array_last[i],      
              //async:false,
              success: function (result){
                  $.each(result.data, function(index, value){           
                      

                      fielIdImgX = value.id; 
                      name = value.name;
                      resI = name.split(".");
                      if(resI[0] == 'preview'){                        
                          srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                      }
                  });               
              },
              error: function (request, status, errorThrown){}
            });
            notizia = Notizia + '<div class="box"><div class="image"><img class="owl-lazy" data-src="' + srcX + '"></div><div class="item-content equal-height"><p class="item-text">' + resultsSection.data.name + '</p> </div><a href="{!! url("news/' + array_last[i] + '") !!}" class="cta"><span class="show-for-sr">Approfondisci la notizia</span></a></div>';          
            fielIdImgX = ''; 
            srcX = '';
            name = '';
                      resI = '';
          } 
      });
    }*/

    $("#news-carousel").append(notizia);
	
	
	/*function mergeTwo(arr1, arr2) {
	  let merged = [];
	  let index1 = 0;
	  let index2 = 0;
	  let current = 0;

	  while (current < (arr1.length + arr2.length)) {
		  let unmerged1 = arr1[index1];
		  let unmerged2 = arr2[index2];

		  // if next comes from arr1
		  if (unmerged1 < unmerged2) {
			  merged[current] = unmerged1;
			  index1++;

		  // if next comes from arr2
		  } else {
			  merged[current] = unmerged2;
			  index2++;
		  }

		  current++;
	  }

	  return merged;
	}*/


	
    if($(window).width() >= 640){
        var widthInput = $("#cercaProdotto").width();
        $("#searchForm").css('display', 'inline');
    }else{
        $("#searchForm").css('display', 'none');
    }

    $(window).on('resize', function(){
        if($(window).width() >= 640){
            var widthInput = $("#cercaProdotto").width();
            $("#searchForm").css('display', 'inline');
        }else{
            $("#searchForm").css('display', 'none');
        }
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=10",
        //async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                if(value.id == 9){ $(".note").html(value.description).text();; }                
            });
        }
    });
    
    $.ajax({
        type: "GET",
        beforeSend: function (request) {

            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=33",
        //async:false,
        success: function (result){
            $("#catalogoSumitomo").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + result + '" target="_blank" title="Scarica il catalogo Sumitomo Chemical Italia" class="sumitomoCatalogo"><span class="catalogo-scarica_sumit"></span><span>Catalogo<br>Sumitomo<br>Chemical Italia</span></a>');
            $("#catalogoSumitomoFascia").html('<div><a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + result + '" target="_blank" title="Scarica il catalogo completo Sumitomo Chemical Italia" class="sumitomoCatalogo link"><span><i class="catalogo-scarica_sumit"></i></span>Catalogo<br>Sumitomo<br>Chemical Italia</a></div>');


         /*   $.each(results.data, function(index, value){
            if(value.idSezione == 33){
                    $("#catalogoSumitomo").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '" target="_blank" title="Scarica il catalogo Sumitomo Chemical Italia" class="sumitomoCatalogo"><span class="catalogo-scarica_sumit"></span><span>Catalogo<br>Sumitomo<br>Chemical Italia</span></a>');
                    $("#catalogoSumitomoFascia").html('<div><a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '" target="_blank" title="Scarica il catalogo completo Sumitomo Chemical Italia" class="sumitomoCatalogo link"><span><i class="catalogo-scarica_sumit"></i></span>Catalogo<br>Sumitomo<br>Chemical Italia</a></div>');
                }
            });*/
        }
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {

            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=34",
       // async:false,
        success: function (result){
                  $("#catalogoSiapa").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + result + '" target="_blank" title="Scarica il catalogo Siapa" class="siapaCatalogo"><span class="catalogo-scarica_siapa"></span><span>Catalogo<br>Siapa</span></a>');
                  $("#catalogoSiapaFascia").html('<div><a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + result + '" target="_blank" title="Scarica il catalogo completo Siapa" class="siapaCatalogo link"><span><i class="catalogo-scarica_siapa"></i></span>Catalogo<br>Siapa</a></div>');


         /*   $.each(results.data, function(index, value){
            if(value.idSezione == 33){
                    $("#catalogoSumitomo").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '" target="_blank" title="Scarica il catalogo Sumitomo Chemical Italia" class="sumitomoCatalogo"><span class="catalogo-scarica_sumit"></span><span>Catalogo<br>Sumitomo<br>Chemical Italia</span></a>');
                    $("#catalogoSumitomoFascia").html('<div><a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + value.id + '" target="_blank" title="Scarica il catalogo completo Sumitomo Chemical Italia" class="sumitomoCatalogo link"><span><i class="catalogo-scarica_sumit"></i></span>Catalogo<br>Sumitomo<br>Chemical Italia</a></div>');
                }
            });*/
        }
    });
        </script>
    </body>
</html>
