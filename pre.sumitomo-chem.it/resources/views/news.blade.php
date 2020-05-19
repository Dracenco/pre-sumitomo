@extends('layout.container')

@section('title', 'News - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/news.jpg') }}" alt="Le principali notizie dal mondo agricolo e professionale">
            </div>
            <div class="item-content">
                <h1 class="item-title">news</h1>
                <p class="item-text">Le principali notizie dal mondo agricolo e professionale</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
        <section class="news_wrap">
          <div class="news">
            <header>
              <h2 class="section-title text-left">
              News agricoltura
                <a href="<?php echo url('news/news-agricoltura'); ?>" class="button btn-transparent show-for-medium">Vedi tutte</a>
              </h2>
            </header>
            <div class="row">
              <div class="small-12 columns">
                <div id="agri-world-carousel" class="owl-carousel owl-theme"></div>
              </div>
              <div class="small-12 columns text-center hide-for-medium">
                <a href="<?php echo url('news/news-agricoltura'); ?>" class="button btn-secondary">Vedi tutte</a>
              </div>
            </div>
          </div>
        </section>

        <hr> 

       <section class="news_wrap">
          <div class="news">
            <header>
              <h2 class="section-title text-left">
                News sumitomo chemical
                <a href="<?php echo url('news/news-sumitomo'); ?>" class="button btn-transparent show-for-medium">Vedi tutte</a>
              </h2>
            </header>
            <div class="row">
              <div class="small-12 columns">
                <div id="sumitomo-chem-carousel" class="owl-carousel owl-theme"></div>
              </div>
              <div class="small-12 columns text-center hide-for-medium">
                <a href="<?php echo url('news/news-sumitomo'); ?>" class="button btn-secondary">Vedi tutte</a>
              </div>
            </div>
          </div>
        </section>
        <hr>
        
    @include('layout.ricerca-tecnica')       
    @include('layout.link-utili')    
    @include('layout.disclaimer')    
@endsection

@section('script')
<script type="text/javascript">  
var res = [];
var NotiziaAgri = '';
var srcX = '';

	$.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=16",
        async:false,
        success: function (resultsSection){
            $.each(resultsSection.data, function(index, value){
              res.push(value.id);              
            });                 
        }
    });
	res = res.slice(-3);
	res.reverse();	
	for (i = 0; i < res.length; i++) {      
        
        $.ajax({
          type: "GET",
          beforeSend: function (request) {
              request.setRequestHeader("lang", "it");
          },
          url: "{{ config('constants.UrlWebService') }}api/Site/GetSezione?idSezione=" + res[i],
          async:false,
          success: function (resultsSection){          
              $.ajax({
              type: "GET", 
                  beforeSend: function (request) {           
                  request.setRequestHeader("lang", "it");
              },
              url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + res[i],      
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
          
             NotiziaAgri = NotiziaAgri + '<div class="columns"><div class="box equal-height" tabindex="0"><div class="image"><img src="' + srcX + '" alt=""></div><div class="item-content"><p class="item-text">' + resultsSection.data.name + '</p></div><a href="{!! url("news/' + res[i] + '") !!}" class="cta"><span class="show-for-sr">Approfondisci la notizia</span></a></div></div>';                         
			 fielIdImgX = ''; 
             srcX = '';
             name = '';
             resI = '';
          } 
      });
    }
	
	$('#agri-world-carousel').append(NotiziaAgri).foundation();
	
	
	var resSumi = [];
	var Notizia = '';
	$.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=17",
        async:false,
        success: function (resultsSection){
            $.each(resultsSection.data, function(index, value){
              resSumi.push(value.id);              
            });                 
        }
    });
	resSumi = resSumi.slice(-3);
	resSumi.reverse();	
	for (i = 0; i < resSumi.length; i++) {      
        
        $.ajax({
          type: "GET",
          beforeSend: function (request) {
              request.setRequestHeader("lang", "it");
          },
          url: "{{ config('constants.UrlWebService') }}api/Site/GetSezione?idSezione=" + resSumi[i],
          async:false,
          success: function (resultsSection){          
              $.ajax({
              type: "GET", 
                  beforeSend: function (request) {           
                  request.setRequestHeader("lang", "it");
              },
              url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + resSumi[i],      
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
          
             Notizia = Notizia + '<div class="columns"><div class="box equal-height" tabindex="0"><div class="image"><img src="' + srcX + '" alt=""></div><div class="item-content"><p class="item-text">' + resultsSection.data.name + '</p></div><a href="{!! url("news/' + res[i] + '") !!}" class="cta"><span class="show-for-sr">Approfondisci la notizia</span></a></div></div>';                         
			 fielIdImgX = ''; 
             srcX = '';
             name = '';
             resI = '';
          } 
      });
    }
	
	$('#sumitomo-chem-carousel').append(Notizia).foundation();

</script>
@stop