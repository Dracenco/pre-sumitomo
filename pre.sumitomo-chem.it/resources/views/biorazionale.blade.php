@extends('layout.container')

@section('title', 'Agricoltura biorazionale - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_bio.jpg') }}" alt="Agricoltura biorazionale">
            </div>
            <div class="item-content">
                <p class="item-title">biorazionale</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')

    <section class="biorational_wrap">
          <div class="biorational">
            <div class="row">
              <div class="small-12 columns">
                <div id="biorational-carousel" class="owl-carousel owl-theme">

                  

                  
                  

                </div>
              </div>
              <div class="small-12 columns text-center hide-for-medium">
                <a href="#" class="button btn-secondary">Vedi tutte</a>
              </div>
            </div>
          </div>
        </section>

    <section class="infographic-strip_wrap">
          <div class="infographic-strip biorational-family">

            <div class="item-content" style="background-image:url('{{ asset('images/sum_webIST_2400x800_bio.jpg') }} ')">
              <div class="item-body">
                <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                  <h2 class="item-title section-title">
                    la famiglia dei prodotti biorazionali
                  </h2>
                </header>
                <div class="statistics">
                  <div>
                    <div>
                      <span class="stat-text">micorrize</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span class="stat-text">nutrizionali<br>e stimolanti</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span class="stat-text">regolatori<br>di crescita</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span class="stat-text">monitoraggio<br>e confusione<br>sessuale</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span class="stat-text">agrofarmaci<br>biologici</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span class="stat-text">difesa<br>tradizionale</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="boxes_wrap" id="products">            
            <div class="boxes row insect"><img src="images/loading.gif" id="loading"></div>
          </section>

    @include('layout.link-utili')
    @include('layout.disclaimer')

@endsection

@section('script')
<script type="text/javascript">      
    var stringRicerca='linea=&famiglia=&coltura=&avversita=&principioattivo=&biologico=';
    var prodotti = '';
    var idProd = new Array();
    
     $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");   
            $('#loading').show();
        }, 
        url: UrlWebService + "api/Site/SearchProduct?" + stringRicerca,
        crossDomain: true,
        contentType: "html",        
        async:false,
        success: function (result) { 
            $('#loading').hide();
            var count = result.data;
            count = count.length;
			console.log(result);
              if(count > 0){
                $.each(result.data, function(index, value){ 
                  idProd[value.code] = value.urlsumitomo.substr(1);

                      if(value.company_name == "Sumitomo Chemical Italia"){
                          var logoAzienda = "<img src='{{ asset('images/igeta-sumitomo.png') }}' alt='Sumitomo Chemical Italia'>";
                      }

                      if(value.company_name == "Siapa"){
                          var logoAzienda = "<img src='{{ asset('images/siapa.svg') }}' alt='Sumitomo Chemical Italia'>";
                      }

                      if(value.company_name == "Codistributori" || value.company_name == "Etichetta unica"){
                          var logoAzienda = "<img src='{{ asset('images/igeta-sumitomo.png') }}' alt='Sumitomo Chemical Italia'><img src='{{ asset('images/siapa.svg') }}' alt='Sumitomo Chemical Italia'>";
                      }

                      var logo= 'data:image/png;base64,' + value.file_content;

                      var urlFormat = value.urlsumitomo;
                      urlFormat = urlFormat.substring(1)
                      var url = '{!! URL::to("' + urlFormat + '") !!}';
          
                      if(value.biorazionale == 1){
                          prodotti = prodotti + '<div class="columns"><div class="box equal-height" tabindex="0"><div class="item-content"><div class="image"><img src="' + logo + '"></div><div class="item-name">' + value.principiattivi_name + '</div><div><div class="item-cat">' + value.category_name + '</div><div class="item-prod">' + logoAzienda + '</div></div></div><div class="item-hidden-desc"><div class="item-name">' + value.name + '</div><div><div class="item-cat">' + value.category_name + '</div></div><div class="item-link"><a href="' + url + '">Scopri di pi&ugrave;</a></div></div><a href="' + url + '" class="cta"><span class="show-for-sr">Scopri di pi&ugrave;</span></a></div></div>'; 
                      }
                                         
                    });                            
            }       
            $(".insect").append(prodotti); 
        },
        error: function (request, status, errorThrown){}
     });      

    var var1titolo = '';
    var var1testo = '';
    var var2titolo = '';
    var var2testo = '';
    var var3titolo = '';
    var var3testo = '';             
    var var4titolo = '';
    var var4testo = '';
    var var5titolo = '';
    var var5testo = '';              
    var var6titolo = '';
    var var6testo = '';
    var fielIdImg1 = '';
    var fielIdImg2 = '';
    var fielIdImg3 = '';
    var fielIdImg4 = '';
    var fielIdImg5 = '';
    var fielIdImg6 = '';
    var slide = '';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=13",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.id == 52){ var1titolo = value.description; }
                if(value.id == 53){ var1testo = value.description; }
                if(value.id == 54){ var2titolo = value.description; }
                if(value.id == 55){ var2testo = value.description; }
                if(value.id == 56){ var3titolo = value.description; }
                if(value.id == 57){ var3testo = value.description; }               
                if(value.id == 58){ var4titolo = value.description; }
                if(value.id == 59){ var4testo = value.description; }
                if(value.id == 60){ var5titolo = value.description; }
                if(value.id == 61){ var5testo = value.description; }                
                if(value.id == 62){ var6titolo = value.description; }
                if(value.id == 63){ var6testo = value.description; }   
           
            });
        }
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=52",      
        async:false,
        success: function (result){
//            $.each(result.data, function(index, value){           
//                fielIdImg1 = value.id; 
//            });
            if(result != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                slide = slide + '<div class="layout"><div class="item-image"><img class="owl-lazy" data-src="' + src1 + '"></div><div class="item-content"><h2 class="item-title">' + var1titolo + '</h2><p class="item-text">' + var1testo + '</p></div></div>';
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=54",      
        async:false,
        success: function (result){
    //        $.each(result.data, function(index, value){           
      //          fielIdImg2 = value.id; 
     //       });
            if(result != ''){
                var src2 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                slide = slide + '<div class="layout"><div class="item-image"><img class="owl-lazy" data-src="' + src2 + '"></div><div class="item-content"><h2 class="item-title">' + var2titolo + '</h2><p class="item-text">' + var2testo + '</p></div></div>';
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=56",      
        async:false,
        success: function (result){
//            $.each(result.data, function(index, value){           
//                fielIdImg3 = value.id; 
//            });
            if(result != ''){
                var src3 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                slide = slide + '<div class="layout"><div class="item-image"><img class="owl-lazy" data-src="' + src3 + '"></div><div class="item-content"><h2 class="item-title">' + var3titolo + '</h2><p class="item-text">' + var3testo + '</p></div></div>';
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=58",      
        async:false,
        success: function (result){
//            $.each(result.data, function(index, value){           
//                fielIdImg4 = value.id; 
//            });
            if(result != ''){
                var src4 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                slide = slide + '<div class="layout"><div class="item-image"><img class="owl-lazy" data-src="' + src4 + '"></div><div class="item-content"><h2 class="item-title">' + var4titolo + '</h2><p class="item-text">' + var4testo + '</p></div></div>';
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=60",      
        async:false,
        success: function (result){
//            $.each(result.data, function(index, value){           
//                fielIdImg5 = value.id; 
//            });
            if(result != ''){
                var src5 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                slide = slide + '<div class="layout"><div class="item-image"><img class="owl-lazy" data-src="' + src5 + '"></div><div class="item-content"><h2 class="item-title">' + var5titolo + '</h2><p class="item-text">' + var5testo + '</p></div></div>';
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=62",      
        async:false,
        success: function (result){
//            $.each(result.data, function(index, value){           
//             fielIdImg6 = value.id; 
//            });
            if(result != ''){
                var src6 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                slide = slide + '<div class="layout"><div class="item-image"><img class="owl-lazy" data-src="' + src6 + '"></div><div class="item-content"><h2 class="item-title">' + var6titolo + '</h2><p class="item-text">' + var6testo + '</p></div></div>';
            }
        },
        error: function (request, status, errorThrown){}
    });
    $("#biorational-carousel").append(slide);
</script>
@stop