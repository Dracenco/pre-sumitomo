@extends('layout.container')

@section('title', ucfirst($cat)." - Sumitomo Chemical Italia")

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')

@if (isset($anchor))
    <input type="hidden" name="anchor" value="{{ $anchor }}">
@endif
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                @if ($cat == 'insetticidi')
                    <img src="{{ asset('images/insetticidi.jpg') }}" alt="Insettici - Sumitomo Chemical Italia">
                @elseif ($cat == 'fungicidi')
                    <img src="{{ asset('images/fungicidi.jpg') }}" alt="Fungicidi - Sumitomo Chemical Italia">
                @elseif ($cat == 'erbicidi')
                    <img src="{{ asset('images/erbicidi.jpg') }}" alt="Erbicidi - Sumitomo Chemical Italia">
                @elseif ($cat == 'vari')
                    <img src="{{ asset('images/vari.jpg') }}" alt="Prodotti per l'agricoltura - Sumitomo Chemical Italia">
                 @elseif ($cat == 'biologico')
                    <img src="{{ asset('images/biologico.jpg') }}" alt="Prodotti per agricoltura biologica Sumitomo Chemical Italia">
                @endif
            </div>
            <div class="item-content">
                <h1 class="item-title">{{ $cat }}</h1>
                <p class="item-text">Scopri i vantaggi e le caratteristiche tecniche dei nostri prodotti</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
    @include('layout.fascia-prodotti')
    @include('layout.ricerca-tecnica')

     <!-- page-title -->
        <header class="page-title_wrap">
          <div class="row">
            <div class="small-12 medium-6 columns" id="ListaProdotti">
              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                  <li><a href="<?php echo url('/'); ?>">Home</a></li>
                  <li><a href="<?php echo url('prodotti'); ?>">Prodotti</a></li>
                  <li>{{ $cat }}</li>
                </ul>
              </nav>
              <h1 class="page-title">{{ $cat }}</h1>
            </div>
            <div class="small-12 medium-6 columns">

              <?php echo public_path(); ?>
              <ul class="list reset-list icon-list" id="zip">

              </ul>
            </div>
          </div>
        </header>

        <section class="boxes_wrap" id="products">
          <div class="boxes row insect" id="elencoProdottoajax"></div>
        </section>

    @include('layout.rete-vendita')
    @include('layout.disclaimer')
    @yield('script')
@endsection

@section('script')
<script type="text/javascript">

    if ( $( "[name='anchor']" ).length ) {
        window.location = '#ListaProdotti';
    }

    var categoria= "<?php echo filter_var($cat, FILTER_SANITIZE_STRING); ?>" ;
    var categoriaId = '';

    if(categoria == "insetticidi"){
       categoria = "Insetticidi";
    }
    if(categoria == "fungicidi"){
       categoria = "Fungicidi";
    }
    if(categoria == "erbicidi"){
       categoria = "Erbicidi";
    }
    if(categoria == "vari"){
       categoria = "Vari";
    }

    var bio="&biologico";
    if(categoria == "biologico"){
        categoria = "Biologico";
        bio = "&biologico=true";
    }

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        contentType: true,
        processData: false,
        async:false,
        url: UrlWebService + "api/Site/GetFamigliaList?all=true",
        success: function (result) {
            $.each(result.data, function(index, value){
                if(value.name==categoria){
                    categoriaId = value.value;

                    var zip = '<li><a href="' + UrlWebService + 'api/Download/DownloadAllSDS?categoryId=' + categoriaId + '"><span class="icon-download-sds"></span><span>s.d.s.<br>' + categoria + '</span></a></li><li><a href="' + UrlWebService + 'api/Download/DownloadAllEtichette?categoryId=' + categoriaId + '"><span class="icon-ministerial-label"></span><span>ET. MIN.<br>' + categoria + '</span></a></li>';
                    $("#zip").append(zip);
                }
            });
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: UrlWebService + "api/Site/SearchProduct?famiglia=" + categoriaId + bio,
        success: function (result) {
            var prodottiString = '';

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

                var logo= 'data:image/png;base64,' + value.file_content ;

                var urlFormat = value.urlsumitomo;
                urlFormat = urlFormat.substring(1)
                var url = '{!! URL::to("' + urlFormat + '") !!}';

                prodottiString = prodottiString + '<div class="columns"><div class="box equal-height" tabindex="0"><div class="item-content"><div class="image"><img src="' + logo + '"></div><div class="item-name">' + value.principiattivi_name + '</div><div><div class="item-cat">' + value.category_name + '</div><div class="item-prod">' + logoAzienda + '</div></div></div><div class="item-hidden-desc"><div class="item-name">' + value.name + '</div><div><div class="item-cat">' + value.category_name + '</div></div><div class="item-link"><a href="' + url + '">Scopri di pi&ugrave;</a></div></div><a href="' + url + '" class="cta"><span class="show-for-sr">Scopri di pi&ugrave;</span></a></div></div>';        

            });
            $("#elencoProdottoajax").append(prodottiString);
        },
        error: function (request, status, errorThrown) {}
    });
</script>
@stop