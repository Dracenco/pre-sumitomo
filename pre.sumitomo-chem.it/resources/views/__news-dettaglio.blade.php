@extends('layout.container')

@section('title', 'Sumitomo Chemical e BASF fanno un passo decisivo nello sviluppo di un nuovo fungicida - Sumitomo Chemical Italia')


@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image"></div>
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
                  <li id="link_bread"></li>
                  <li id="title-breadcrumbs"></li>
                </ul>
              </nav>
              <span class="tag"></span>
              
              <h2 class="page-title"></h2>
            </div>
          </div>
        </header>
        
        <section class="article_wrap">
          <article class="row collapse">
            <div class="small-12 columns" id="notizia_testo"></div>
          </article>

          <ul class="social-share icon-list text-center">
            <li>
                <a href="https://www.facebook.com/sumitomochemicalitalia" class="icon-facebook" target="_blank"></a>
              </li>
              <li>
                <a href="https://twitter.com/Sumitomochemit" class="icon-twitter" target="_blank"></a>
              </li>
              <li>
                <a href="https://www.youtube.com/channel/UCZbH7EQxBdMIa4NeWcTjj6Q" class="icon-youtube" target="_blank"></a>
              </li>
              <li>
                <a href="https://www.linkedin.com/company/10533416/" class="icon-linkedin" target="_blank"></a>
              </li>
          </ul>
        </section>
    @include('layout.link-utili')    
    @include('layout.disclaimer')
    
@endsection

@section('script')
<script type="text/javascript"> 
    var idnotizia="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
      var res = '';

      $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoTestiSezione?IdSezione=" + idnotizia,
        async:false,
        success: function (resultsSection){
            $.each(resultsSection.data, function(index, valueX){                  
                $("#notizia_testo").html(valueX.text);                    
                res = valueX.colore.split("#");
            });                           
        }
    });

    $.ajax({
        type: "GET", 
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idnotizia,      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImgX = value.id; 
                var name = value.name;
                var res = name.split(".");
                if(res[0] == 'preview'){
                }else{
                  var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                  $(".item-image").append("<img src='" + src1 + "'>");
                  $("#imgResponsive").append("<img src='" + src1 + "' class=\"image-responsive\">");
                }
            });            
        },
        error: function (request, status, errorThrown){}
    });
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetSezione?idSezione=" + idnotizia,
        async:false,
        success: function (resultsSection){
            var titolo = resultsSection.data.name;
            titolo =titolo.replace(/<\/?[^>]+(>|$)/g, "");
            $("#title-breadcrumbs").html(titolo);   
            $(".page-title").html(resultsSection.data.name + '<span class="author">Di '+ res[0] + ' | ' + res[1] + '</span>');       
            var descrizione = resultsSection.data.description;
            var string_news = '';

            if(descrizione == "NEWS MONDO AGRICOLTURA"){ 
              $("#link_bread").html('<a href="news-agricoltura">NEWS AGRICOLTURA</a>'); 
              $(".tag").html("NEWS AGRICOLTURA");
            }
            if(descrizione == "NEWS MONDO SUMITOMO CHEMICAL"){ 
              $("#link_bread").html('<a href="news-sumitomo">NEWS SUMITOMO CHEMICAL</a>');  
              $(".tag").html("NEWS SUMITOMO CHEMICAL");
            }
            if(descrizione == "NEWS CSR"){ 
              $("#link_bread").html('<a href="news/' + idnotizia + '">NEWS CSR</a>');  
              $(".tag").html('NEWS CSR');
            }
           
        } 
    });
    </script>
@stop