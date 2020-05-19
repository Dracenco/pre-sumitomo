@extends('layout.container')

@section('title', 'Ricerca prodotti - Sumitomo Chemical Italia')

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_prod.jpg') }}" alt="Ricerca prodotti Sumitomo Chemical Italia">
            </div>
        </div>
    </div>
</section>
@endsection

@section('content') 
   
    @include('layout.ricerca-tecnica')
    
     <!-- page-title -->
        <header class="page-title_wrap">
          <div class="row">
            <div class="small-12 medium-6 columns">
              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                  <li><a href="<?php echo url('/'); ?>">Home</a></li>
                  <li>Ricerca prodotti</li>
                </ul>
              </nav>
              <div id="parameriDiRicerca">
                @if( $chiave == '')
                    <h1 class="page-title">Impossibile eseguire la ricerca.<br>Inserisci una chiave di ricerca valida</h1>
                @else
                    <h1 class="page-title">Ricerca per: {{ $chiave }}</h1>
                @endif
              </div>
            </div>
            <div class="small-12 medium-6 columns">
            </div>
          </div>
        </header>       
        
        <section class="boxes_wrap" >
          <div class="boxes row insect" id="products">
            <div class="boxes row insect"><img src="images/loading.gif" id="loading"></div>
          </div>
        </section>
        
    @include('layout.rete-vendita') 
    @include('layout.disclaimer') 
    @yield('script')
@endsection


@section('script')
<script type="text/javascript">      

    var chiaveRicerca='<?php echo filter_var($chiave, FILTER_SANITIZE_STRING); ?>';
    if(chiaveRicerca != ''){
        $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it"); 
            $('#loading').show();
        },             
		url:UrlWebService + "api/Site/SearchAllProduct?name=" + chiaveRicerca,
		contentType: "html",
		success: function (result) { 
            var prodotti = '';
            $('#loading').hide();
            
            var count = result.data;
            count = count.length;
            
            if(count > 0){
               $.each(result.data, function(index, value){
                var url = value.urlsumitomo;
                   /**/
                   $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("lang", "it");                
                    }, 
                    url: UrlWebService + "api/Site/GetProductIdFromUrlSumitomo?urlSumitomo=" + url,
                    async:false,
                    success: function (result) { 
                      codeProduct = result.data.code;               

                      $.ajax({
                        type: "GET",
                        beforeSend: function (request) {
                            request.setRequestHeader("lang", "it");                
                        },
                        url: UrlWebService + "api/Site/GetProduct?code=" + codeProduct,
                        async:false,
                        success: function (result) { 

                            if(result.data.site){ 
                               if(result.data.company.name == "Sumitomo Chemical Italia"){
                                    var logoAzienda = "<img src='{{ asset('images/igeta-sumitomo.png') }}' alt='Sumitomo Chemical Italia'>";
                                }

                                if(result.data.company.name == "Siapa"){
                                    var logoAzienda = "<img src='{{ asset('images/siapa.svg') }}' alt='Sumitomo Chemical Italia'>";
                                }

                                if(result.data.company.name == "Codistributori" || result.data.company.name == "Etichetta unica"){
                                    var logoAzienda = "<img src='{{ asset('images/igeta-sumitomo.png') }}' alt='Sumitomo Chemical Italia'><img src='{{ asset('images/siapa.svg') }}' alt='Sumitomo Chemical Italia'>";
                                }

                                var src = UrlWebService + "api/Download/DownloadFile?fileId=" + result.data.logo.id;

                                var principiAttivi='';
                                $.each(result.data.principiAttivi, function(index, value){
                                     principiAttivi=value.name;
                                });

                                var urlDef = '{!! URL::to("' + url + '") !!}';

                                prodotti = prodotti + '<div class="columns"><div class="box equal-height" tabindex="0"><div class="item-content"><div class="image"><img src="' + src + '"></div><div class="item-name">' + principiAttivi + '</div><div><div class="item-cat">' + result.data.categoria.name + '</div><div class="item-prod">' + logoAzienda + '</div></div></div><div class="item-hidden-desc"><div class="item-name">' + result.data.name + '</div><div><div class="item-cat">' + result.data.categoria.name + '</div></div><div class="item-link"><a href="' + urlDef + '">Scopri di pi&ugrave;</a></div></div><a href="' + urlDef + '" class="cta"><span class="show-for-sr">Scopri di pi&ugrave;</span></a></div></div>'; 
                            }
                        },
                        error: function (request, status, errorThrown) {}
                      });                        

                    },
                    error: function (request, status, errorThrown) {}
                }); 
               });    
                $("#products").append(prodotti); 
            }else{
                $("#products").append("Nessun prodotto trovato"); 
            }   
        },
        error: function (request, status, errorThrown) {
            $('#loading').hide();
            $("#products").append("Nessun prodotto trovato");
        }	
    });
    }
        
</script>
@stop