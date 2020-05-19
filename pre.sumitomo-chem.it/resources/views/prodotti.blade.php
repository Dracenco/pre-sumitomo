@extends('layout.container')

@section('title', 'Prodotti - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="Sumitomo Chemical Italia possiede un'ampia gamma di prodotti agrofarmaci per i trattamenti fitosanitari.">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
          <div class="teaser-carousel">
            <div class="item light-color">
              <div class="item-image"></div>
              <div class="item-content">
                <h1 class="item-title"></h1>
                <p class="item-text"></p>
              </div>
            </div>
          </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
   $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=3",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                if(value.id == 35){ $(".item-title").html(value.description).text(); }
                if(value.id == 36){ $(".item-text").html(value.description).text(); }
            });
        }
    });

    var fielIdImg1 = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=35",      
        async:false,
        success: function (result){
          if(result != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                $(".item-image").append("<img src='" + src1 + "' />");
            }
//            $.each(result.data, function(index, value){           
//                fielIdImg1 = value.id; 
//            });

        },
        error: function (request, status, errorThrown){}
    });

    var SchedeDifesaSumitomo = '';
    var srcX = '';
    var fielIdImgX = '';
	var fielIdImg = '';
	var i=0;
	
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=14",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                var idFile = value.id;
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idFile,      
                    async:false,
                    success: function (result){
                        $.each(result.data, function(index, valueImg){   
							if(i == 0){
								fielIdImg = valueImg.id;
								i = i+ 1;
							}else{
								fielIdImgX = valueImg.id;
								i = 0;
							}
                        });
                        srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
						srcXImg = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg;
                        SchedeDifesaSumitomo = SchedeDifesaSumitomo + '<div class="column column-block"><div class="positionImage "><img src="' + srcXImg + '" class="thumbnail" alt=""><a href="' + srcX + '" target="_blank"><div class="centerScheda">' + value.name +  '<br><span class="spazioEpoche">' + value.description +  '</span></div></a></div><div class="aziendaSchede aziendaSchedeSumi"></div></div>';
                    },
                    error: function (request, status, errorThrown){}
                });
            });
           
            
        }        
    });   

    var SchedeDifesaSiapa = '';
	var srcX  = '';
    var fielIdImgX = '';    
	var fielIdImg = '';
	var ix =0;

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=15",
       
        success: function (results){
            $.each(results.data, function(index, value){
                var idFileSiapa = value.id;
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + idFileSiapa,      
                    async:false,
                    success: function (result){
                        $.each(result.data, function(index, valueImg){           
                            if(ix == 0){
								fielIdImg = valueImg.id;
								ix = ix + 1;
							}else{
								fielIdImgX = valueImg.id;
								ix = 0;
							} 
                        });
                         srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
						srcXImg = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg;
                        SchedeDifesaSumitomo = SchedeDifesaSumitomo + '<div class="column column-block"><div class="positionImage "><img src="' + srcXImg + '" class="thumbnail" alt=""><a href="' + srcX + '" target="_blank"><div class="centerScheda">' + value.name +  '<br><span class="spazioEpoche">' + value.description +  '</span></div></a></div><div class="aziendaSchede aziendaSchedeSiapa"></div></div>';
                   },
                    error: function (request, status, errorThrown){}
                });
            });
            $('#schededifesa').append(SchedeDifesaSumitomo).foundation(); 
            
        }        
    });

   

    
    </script>

@stop

@section('content')
    @include('layout.fascia-prodotti')
    @include('layout.ricerca-tecnica')
    @include('layout.schede-difesa')
    @include('layout.rete-vendita')
    @include('layout.fascia-news')     
    @include('layout.link-utili')    
    @include('layout.disclaimer')    
@endsection

