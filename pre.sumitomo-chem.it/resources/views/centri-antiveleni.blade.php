@extends('layout.container')

@section('title', 'Centri antiveleni - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="Consulta l'elenco dei centri antiveleni distribuiti in tutt'Italia da contattare in caso di avvelenamento o pericolo.">
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
        <header class="page-title_wrap light">
          <div class="row">
            <div class="small-12 medium-6 columns">
              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                  <li><a href="<?php echo url('/'); ?>">Home</a></li>
                  <li><a href="<?php echo url('sicurezza'); ?>">Sicurezza</a></li>
                  <li>Centri Antiveleni</li>
                </ul>
              </nav>
              <h2 class="page-title">centri antiveleni</h2>
            </div>
            <div class="small-12 medium-6 columns">
              <ul class="list reset-list icon-list">
                <li>
                  <span class="icon-map-sign sumitomo-color"></span>
                </li>
              </ul>
            </div>
          </div>
        </header>

        <section class="boxes_wrap antiveleni">
          <div class="boxes row"></div>
        </section>

        <div class="simple-content">
          <div class="row">
            <div class="small-12 columns">
              <span class="icon-alert sumitomo-color"></span>
              <h4 class="title">DA TUTTA ITALIA È ANCHE POSSIBILE CHIAMARE IL <span class="sumitomo-color">112</span>, DAL QUALE SI VERRÀ MESSI IN CONTATTO CON IL CENTRO ANTIVELENI PIÙ VICINO.</h4>
              <p>L’elenco dei Centri Antiveleni sopra riportato include strutture di cui non è possibile, conoscere la piena ottemperanza ai criteri di idoneità riconosciuti su scala nazionale. Si invita a verificare sempre con una telefonata l’effettiva operatività del centro di vostro interesse, i periodi di apertura, gli orari e la disponibilità di personale medico abilitato.</p>
            </div>
          </div>
        </div>
    @include('layout.rete-vendita') 
    @include('layout.disclaimer')    
@endsection

@section('script')

<script type="text/javascript">    
var stringCentro='';
$.ajax({
    type: "GET",
        beforeSend: function (request) {             
        request.setRequestHeader("lang", "it");
    },
    url: "{{ config('constants.UrlWebService') }}api/Site/GetCentriAntiveleni",
    success: function (result) {
        $.each(result.data, function(index, value){
            stringCentro = stringCentro + '<div class="columns"><div class="box equal-height" tabindex="0"><div class="item-content"> <h3 class="item-title">' + value.city + '</h3><p class="small-text"><strong class="text-highlight">' + value.name + '</strong><br><span>' + value.description + '</span><br><strong>' + value.address + '<br>' + value.phoneNumber + '</strong></p></div></div></div>';
        });
        $('.boxes').append(stringCentro).foundation();
    },
    error: function (request, status, errorThrown){}
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