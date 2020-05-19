@extends('layout.container')

@section('title', 'News Agricoltura - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
          <div class="teaser-carousel">
            <div class="item light-color">
              <div class="item-image">
                <img src="{{ asset('images/news02.jpg') }}" alt="News Agricoltura">
              </div>
              <div class="item-content">
                <h1 class="item-title">NEWS AGRICOLTURA</h1>
                <p class="item-text">Le principali notizie dal mondo agricolo e professionale</p>
              </div>
            </div>
          </div>
        </section>
@endsection

@section('content')
<header class="page-title_wrap light">
          <div class="row">
            <div class="small-12 columns">
              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                  <li><a href="<?php echo url('/'); ?>">Home</a></li>
                  <li><a href="<?php echo url('news'); ?>">News</a></li>
                  <li>News agricoltura</li>
                </ul>
              </nav>
              <h2 class="page-title">News agricoltura</h2>
            </div>
          </div>
</header>

 <section class="boxes_wrap news">
        <div class="boxes row">
            
            
        </div>
    </section>

    @include('layout.ricerca-tecnica')     
    @include('layout.link-utili')    
    @include('layout.disclaimer')    
@endsection

@section('script')
<script type="text/javascript">
var NotiziaAgri = '';
var titoloAgri = '';
var srcX = '';

var res = [];
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
	
	$('.boxes').append(NotiziaAgri).foundation();
</script>
@stop