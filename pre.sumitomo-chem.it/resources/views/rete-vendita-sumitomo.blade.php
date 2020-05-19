@extends('layout.container')

@section('title', 'Rete vendita Sumitomo Chemical Italia - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="La nostra azienda si avvale di una rete vendita dedicata, presente in diverse aree. Scopri i capi area più vicina a te.">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_rv_sumitomo.jpg') }}" alt="Rete vendita Sumitomo Chemical Italia">
            </div>
            <div class="item-content">
                <h1 class="item-title">rete vendita</h1>
                <p class="item-text">I nostri professionisti al servizio di rivenditori privati e cooperative</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
     <section class="sales-network_wrap">
          <div class="sales-network">
            <a href="<?php echo url('rete-vendita-sumitomo'); ?>" class="active sumitomo-logo">
              <img src="{{ asset('images/sumitomo.svg') }}" alt="">
            </a>
            <a href="<?php echo url('rete-vendita-siapa'); ?>" class="siapa-logo">
              <img src="{{ asset('images/siapa.svg') }}" alt="">
            </a>
          </div>
        </section>

        <section class="boxes_wrap network sumitomo">
          <div class="boxes row"></div>
        </section>

    @include('layout.fascia-news')
    @include('layout.rete-vendita')
    @include('layout.disclaimer')
@endsection

@section('script')
<script type="text/javascript"> 
var elencoZone = '';
$.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetAllArea",
        async:false,
        success: function (result){
          
          var i=1;          
          var capoarea = '';
          var capoareaEmail = '';
          var capoareaTelefono = '';
          var idArea = '';

          $.each(result.data, function(index, value){
              idArea = value.id;
              if(value.idSocieta == 1){
                        
               capoarea = '';
               capoareaEmail = '';
               capoareaTelefono = '';

               $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetAgente?IdAgente=" + value.idAreaManager,
                    async:false,
                    success: function (result){
                        capoarea = result.data.name + ' ' + result.data.surname;
                        capoareaEmail = result.data.email;
                        capoareaTelefono = result.data.phoneNumber;

                        elencoZone = elencoZone +  '<div class="columns"><div class="box equal-height" tabindex="0"><div class="item-content"><h3 class="item-title">' + value.descriptionArea + '</h3><h4 class="item-subtitle">capo area</h4><p class="small-text"><strong class="text-highlight">' + capoarea + '</strong><br><span>' + capoareaTelefono + '</span><br><strong><a href="mailto:' + capoareaEmail + '">' + capoareaEmail + '</a></strong><h4 class="item-subtitle item-link">responsabili di zona<a data-open="network_0' + i + '" class="text-highlight">clicca qui</a></h4></p></div><div class="reveal large" id="network_0' + i + '" aria-labelledby="network_0' + i + '-title" data-reveal data-animation-in="fade-in" data-animation-out="fade-out"><button class="close-button" data-close aria-label="Chiudi la finestra" type="button"><span aria-hidden="true">&times;</span></button><section class="area"><h3 class="item-subtitle" id="network_0' + i + '-title">' + value.descriptionArea + '</h3><p class="row item-title"><span class="small-12 medium-3 columns">' + capoarea + '</span><span class="small-12 medium-3 columns dark-color">' + capoareaTelefono + '</span></p><span class="email"><a href="mailto:' + capoareaEmail + '">' + capoareaEmail + '</a></span><h3 class="item-subtitle" id="network_0' + i + '-title">Responsabili di Zona</h3><ul class="list reset-list" id="responsabiliZona">';     
                    

                        $.ajax({
                              type: "GET",
                              beforeSend: function (request) {
                                  request.setRequestHeader("lang", "it");
                              },
                              url: "{{ config('constants.UrlWebService') }}api/Site/GetAllZona?IdArea=" + idArea,        
                              async:false,
                              success: function (result){
                                  
                                  var responsabileZona = '';
                                  var phoneNumber = '';
                                  var i=1;

                                  $.each(result.data, function(index, value){

                                    elencoZone= elencoZone + '<li class="row">';
                                      var idZona = value.idZona; 
                                      var idManagerZona = value.idManagerZona ;
                                      var desc = value.description;

                                      var ZoneAgente = '';
                                      var ProvAgente = '';
                                      var temp = new Array();
                                      var regione = new Array();
                                      var provDett = '';

                                      $.ajax({
                                          type: "GET",
                                          beforeSend: function (request) {
                                              request.setRequestHeader("lang", "it");
                                          },
                                          url: "{{ config('constants.UrlWebService') }}api/Site/GetAgente?IdAgente=" + idManagerZona,
                                          async:false,
                                          success: function (result){ responsabileZona = result.data.name+ ' ' + result.data.surname; phoneNumber = result.data.phoneNumber;},
                                          error: function (request, status, errorThrown){}
                                      });   

                                      elencoZone= elencoZone + '<div class="small-12 medium-3 columns"><strong class="text-highlight">' + responsabileZona +'</strong></div><div class="small-12 medium-6 columns">';

                                      if ( typeof(desc) !== "undefined" && desc !== null ){ regione = desc.split("#"); }

                                      for (a in regione ) {                
                                          if(regione[a] != ''){
                                            ProvAgente = '';
                                            ZoneAgente = '';
                                              provincia = regione[a].split("@");
                                              provDett = provincia[1];
                                              if ( typeof(provDett) == "undefined" && provDett == null ){ provDett = '';}
                                              ProvAgente = ProvAgente + provDett;
                                              ZoneAgente = ZoneAgente + provincia[0]; 
                                              elencoZone= elencoZone + '<div class="row"><div class="small-5 medium-offset-1 columns"><strong>' + ZoneAgente + '</strong></div><div class="small-6 columns"><span class="prov">' + ProvAgente + '</span></div></div>';
                                          }
                                      }                                      
                                                                                                         
                                      var regioneZona = '';
                                      var ProvinciaZona = '';

                                      elencoZone= elencoZone + '</div><div class="small-12 medium-3 columns"><span>' + phoneNumber + '</span></div>';
                                      elencoZone= elencoZone + '</li>';
                                     
                                  });
                                                                
                              },
                              error: function (request, status, errorThrown){}
                          });                                                 
                    },
                    error: function (request, status, errorThrown){}
                });
                                  
                elencoZone = elencoZone +  '</ul></section></div></div></div>';     
              i++;
            }
          });
          $('.boxes').append(elencoZone).foundation();
        },
        error: function (request, status, errorThrown){}
    });
    </script>
@stop