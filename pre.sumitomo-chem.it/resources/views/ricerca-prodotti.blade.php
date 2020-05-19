@extends('layout.container')

@section('title', 'Risultati ricerca - Sumitomo Chemical Italia')

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
                  <h1 class="page-title">Ricerca per:<br></h1>
                  <p>                      
                    @if( $linea_name != '')
                        Linea: {{ $linea_name }} <br>
                    @endif
                      @if( $famiglia_name != '')
                        Famiglia: {{ $famiglia_name }} <br>
                    @endif
                      @if( $coltura_name != '') 
                        Coltura: {{ $coltura_name }} <br>
                    @endif
                      @if( $avversita_name != '')
                        Avversità: {{ $avversita_name }} <br>
                    @endif
                      @if( $principio_attivo_name != '')
                        Principio attivo : {{ $principio_attivo_name }} <br>
                    @endif
                      @if( $biologico )
                        Biologico: Si
                    @endif
                   </p>
              </div>
            </div>
            <div class="small-12 medium-6 columns">
            </div>
          </div>
        </header>

        <section class="boxes_wrap" id="products">
            
          <div class="boxes row insect"><img src="images/loading.gif" id="loading"></div>
        </section>
        
    @include('layout.rete-vendita') 
    @include('layout.disclaimer') 
    @yield('script')
@endsection

@section('script')
<script type="text/javascript">      

    var stringRicerca='';
    <?php
    if($linea != ''){ ?> stringRicerca = stringRicerca + "&linea=" + <?php echo filter_var($linea, FILTER_SANITIZE_STRING); ?> ; <?php }        
    if($famiglia != ''){ ?> stringRicerca = stringRicerca + "&famiglia=" + <?php echo filter_var($famiglia, FILTER_SANITIZE_STRING); ?> ; <?php }           
    if($coltura != ''){ ?> stringRicerca = stringRicerca + "&coltura=" + <?php echo filter_var($coltura, FILTER_SANITIZE_STRING); ?> ; <?php }    
    if($avversita != ''){ ?> stringRicerca = stringRicerca + "&avversita=" + <?php echo filter_var($avversita, FILTER_SANITIZE_STRING); ?> ; <?php }     
    if($principio_attivo != ''){ ?> stringRicerca = stringRicerca + "&principioattivo=" + <?php echo filter_var($principio_attivo, FILTER_SANITIZE_STRING); ?> ; <?php } 
    
    if($biologico){ 
        ?> stringRicerca = stringRicerca + "&biologico=true"; <?php
    }
    ?>
    
    stringRicerca = stringRicerca.substring(1, stringRicerca.length);   
    
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");   
            $('#loading').show();
        }, 
        url: UrlWebService + "api/Site/SearchProduct?" + stringRicerca,
      crossDomain: true,
      contentType: "html",
        success: function (result) { 
            $('#loading').hide();
            var prodotti = '';
            var count = result.data;
            count = count.length;
            
            if(count > 0){
                $.each(result.data, function(index, value){ 

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
                    var urlSeo = value.urlsumitomo;
                    urlSeo = urlSeo.substr(1);
                    var url = '{!! URL::to("' + urlSeo + '") !!}';

                    prodotti = prodotti + '<div class="columns"><div class="box equal-height" tabindex="0"><div class="item-content"><div class="image"><img src="' + logo + '"></div><div class="item-name">' + value.principiattivi_name + '</div><div><div class="item-cat">' + value.category_name + '</div><div class="item-prod">' + logoAzienda + '</div></div></div><div class="item-hidden-desc"><div class="item-name">' + value.name + '</div><div><div class="item-cat">' + value.category_name + '</div></div><div class="item-link"><a href="' + url + '">Scopri di pi&ugrave;</a></div></div><a href="' + url + '" class="cta"><span class="show-for-sr">Scopri di pi&ugrave;</span></a></div></div>'; 

                }); 
                
                $(".insect").append(prodotti); 
                
            }else{
                $(".insect").append("Nessun prodotto trovato"); 
            }            
        },
        error: function (request, status, errorThrown) {
            $('#loading').hide();
            $(".insect").append("Nessun prodotto trovato"); 
        }
    });  
    
</script>
@stop