@extends('layout.container')

@section('title', 'Chi siamo - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="Sumitomo Chemical Italia nasce nel 2011 come filiale italiana di Sumitomo Chemical. Scopri la nostra storia.">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
            </div>
            <div class="item-content">
                <h1 class="item-title" id="chisiamo_titolo"></h1>
                <p class="item-text" id="chisiamo_sottotitolo"></div>
        </div>
    </div>
</section>
@endsection

@section('content')
    
        <section class="full-box_wrap">
          <div class="full-box simple-text">
            <div class="content">
              <div class="text-center" id="chi_siamo_introduzione"></div>
            </div>
          </div>
        </section>
        
        <section class="infographic-strip_wrap">
          <div class="infographic-strip dark-color">
            <div class="item-content">
              <div class="item-body">
                <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                  <h2 class="section-title">SUMITOMO CHEMICAL COMPANY<br>LEADER GLOBALE IN DIVERSI SETTORI DELLA CHIMICA</h2>
                </header>
                <div>

                  <div>
                    <div>
                      <div>
                        <span>
                          <i class="icon-health-crop-science"></i>
                        </span>
                      </div>
                    </div>
                    <div>
                      <span class="stat-text sumitomo-primary-color">HEALTH &amp; CROP SCIENCE</span>
                    </div>
                  </div>
                  
                  <div>
                    <div>
                      <div>
                        <span>
                          <i class="icon-pharmaceutical"></i>
                        </span>
                      </div>
                    </div>
                    <div>
                      <span class="stat-text sumitomo-primary-color">FARMACEUTICO</span>
                    </div>
                  </div>

                  <div>
                    <div>
                      <div>
                        <span>
                          <i class="icon-information-tecnology"></i>
                        </span>
                      </div>
                    </div>
                    <div>
                      <span class="stat-text sumitomo-primary-color">INFORMATION TECHNOLOGY</span>
                    </div>
                  </div>

                  <div>
                    <div>
                      <div>
                        <span>
                          <i class="icon-energy-and-material"></i>
                        </span>
                      </div>
                    </div>
                    <div>
                      <span class="stat-text sumitomo-primary-color">ENERGIA E MATERIALI FUNZIONALI</span>
                    </div>
                  </div>

                  <div>
                    <div>
                      <div>
                        <span>
                          <i class="icon-petrochemicals-and-plastics"></i>
                        </span>
                      </div>
                    </div>
                    <div>
                      <span class="stat-text sumitomo-primary-color">PETROLCHIMICO E PLASTICHE</span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="full-box_wrap">
          <div class="full-box simple-text no-bg toggle-panel">
            <div class="content">
              <div class="text-center">
                <header>
                  <h2 class="section-title">La storia</h2>
                </header>
                <p class="large-text">Il XVII secolo segna l'inizio della lunga e prosperosa attività di <strong>Sumitomo</strong>.<br>Il XX secolo vede la nascita solida e rigogliosa <strong>Siapa</strong>, al servizio dei consorzi agrari italiani.</p>
              </div>
            </div>

            <section class="toggle-content no-bg row" id="toggle-content" data-toggler=".opened">
              <div class="btn_wrap text-center">
                <div class="columns">
                  <a href="javascript:;" role="button" class="open-btn btn-sumitomo full" aria-label="Apri" data-toggle="toggle-content">scopri</a>
                </div>
              </div>

              <section class="timeline_wrap">
                <div class="timeline">
                  <button class="close-btn" aria-label="Chiudi" type="button" data-toggle="toggle-content">
                    <span aria-hidden="true">&times;</span>
                  </button>

                  <div class="row logo_wrap">
                    <div class="small-8 medium-6 columns">
                      <img src="{{ asset('images/sumitomo.svg') }}" alt="" class="sumitomo-logo">
                    </div>
                    <div class="small-4 medium-6 columns">
                      <img src="{{ asset('images/siapa.svg') }}" alt="" class="active siapa-logo">
                    </div>
                  </div>

                  <div>
                    <ul class="sumitomo-tl list reset-list">
                      <li class="highlight">
                        <div class="row">
                          <h4>1600</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/sum_webIST_170x130_sci1600.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>La casa di Sumitomo inizia le sue attività grazie al suo fondatore <strong>Masatomo Sumitomo</strong></p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>1690</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/sum_webIST_170x130_sci1690.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Iniziano le attività estrattive della <strong>miniera di rame di Besshi</strong></p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>1915</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/comeeravamo2.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Nasce <strong>Sumitomo Fertilizers Manufactory</strong>, in seguito chiamata <strong>Sumitomo Chemical</strong>, per supportare gli agricoltori migliorando le attività agricole e i loro raccolti e prevenire l'inquinamento causato
                              dall'emissione dei gas delle lavorazioni del rame</p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  
                  <div>
                    <ul class="siapa-tl list reset-list">
                      <li>
                        <div class="row">
                          <h4>1948</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/siapa.jpg') }}" alt="Siapa">
                          </div>
                          <div class="small-8 columns">
                            <p>Per iniziativa di <strong>Leonida Mizzi</strong>, Direttore Generale della Federconsorzi, nasce Siapa, <strong>Società Italo Americana Prodotti Antiparassitari</strong>, con l'obiettivo di rinnovare l'agricoltura italiana,
                              importando le più importanti novità dagli Stati Uniti. L'agricoltura italiana fa un salto qualitativo importante, allineandosi alle principali agricolture del mondo</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>Anni '50</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/50.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>All'interno dei Consorzi Agrari, SIAPA costituisce i “<strong>Centri Lotta Antiparassitaria</strong>” per diffondere fra gli agricoltori la conoscenza dei nuovi prodotti, dei nuovi formulati e dei mezzi tecnici</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>Anni '60</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/comeeravamo5.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Viene fondato il <strong>Centro Esperienze e Ricerche (CER)</strong> con lo scopo di selezionare e sperimentare nuove molecole. Si sviluppano, inoltre, gli <strong>Uffici Fitoiatrici</strong>, che offrono agli agricoltori un'assistenza
                              tecnica qualificata che ancor oggi è uno dei punti di forza dell'attività di SIAPA</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>Anni '70</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/70.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Inizia una profonda diversificazione con linee di <strong>prodotto innovative</strong>, come le attrezzature fitoiatriche AMICA, i prodotti orto garden, gli ammendanti e i fertilizzanti speciali, legati al servizio di analisi
                              del terreno, e i prodotti industriali per la protezione civile e dell'ambiente</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>Anni '80</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/80.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p><strong>Siapa è all'avanguardia nella lotta all'inquinamento ambientale</strong>, individuando mezzi di lotta alternativi, di concreta affidabilità ecologica e riducendo l'impatto degli agrofarmaci attraverso formulazioni più
                              efficaci
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>Anni '90</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/90.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Dopo essere stata coinvolta nella crisi della Federconsorzi, Siapa viene acquisita dal <strong>Gruppo Caffaro</strong>, specializzato nella produzione di agrofarmaci rameici, e più tardi è assorbita da Isagro SpA. Siapa entra
                              poi nella Joint Venture <strong>Isagro Italia srl</strong>, costituita dapprima tra Isagro SpA e l'americana Rhom&Haas e poi sempre tra Isagro SpA e la giapponese <strong>Sumitomo Chemical</strong></p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  
                  <div>
                    <ul class="sumitomo-tl list reset-list">
                      <li>
                        <div class="row">
                          <h4>2001</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/sum_webIST_170x130_sci2001.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p><strong>Valent BioScience Corporation</strong> viene acquisita da Sumitomo Chemical</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>2002</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/2002.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Nasce <strong>Isagro Italia</strong> srl joint venture tra Sumitomo Chemical e Isagro SpA</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>2010</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/2010.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Nell'Aprile 2010 <strong>Nufarm</strong> e Sumitomo Chemical hanno con successo stretto legami distributivi in 19 diversi paesi nel mondo, Italia compresa</p>
                          </div>
                        </div>
                      </li>
                      <li class="highlight">
                        <div class="row">
                          <h4>2011</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/sum_webIST_170x130_sci2011.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Sumitomo Chemical prende il pieno controllo della joint venture; viene fondata così <strong>Sumitomo Chemical Italia srl</strong></p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  
                  <div>
                    <ul class="siapa-tl list reset-list">
                      <li class="highlight">
                        <div class="row">
                          <h4>2011</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/2011.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Insieme ad Isagro Italia srl Siapa viene interamente acquisita da Sumitomo Chemical; viene fondata così <strong>Sumitomo Chemical Italia srl</strong></p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  
                  <div class="last">
                    <ul class="sumitomo-tl list reset-list">
                      <li>
                        <div class="row">
                          <h4>2012</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/2012.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Nell'Agosto del 2012 viene siglato un accordo tra Nufarm e Sumitomo Chemical Italia, acquisendo quest'ultima il diritto alla distribuzione dei prodotti Nufarm in Italia.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <h4>2012</h4>
                          <div class="small-4 columns">
                            <img src="{{ asset('images/2012b.jpg') }}" alt="">
                          </div>
                          <div class="small-8 columns">
                            <p>Nel Marzo 2015 Valent BioScience Corporation acquisisce <strong>Mycorrhizal Applications Inc</strong>, azienda specializzata nella produzione di micorrize.<br>Nell'Ottobre del 2015 Sumitomo Chemical festeggia i <strong>100 anni di attività</strong> nei suoi 5 diversi settori chimici rappresentati nel vascello volante che simboleggia la fiducia, la gioia e il desiderio di creare un nuovo percorso verso il futuro</p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  
                  <div class="circle">
                    <div class="content">
                      <h4>2017</h4>
                      <span>Sumitomo Chemical Italia e Siapa celebrano <strong>l'anniversario dei 15 anni di attività</strong> in Italia</span>
                    </div>
                  </div>
        
                </div>
              </section>

            </section>
          </div>
        </section>
        
        <section class="infographic-strip_wrap">
          <div class="infographic-strip no-bg">
            <div class="item-content" style="background-image:url('{{ asset('images/sum_webIST_2400x800_spirito.jpg') }}">
              <div class="item-body">
                <header>
                  <h2 class="section-title sumitomo-color">LO SPIRITO E I PRINCIPI DI SUMITOMO</h2>
                </header>
                <div class="simple-text">
                  <div class="text-center" id="chi_siamo_spirito"></div>
                </div>
              </div>

            </div>
          </div>
        </section>
        
        <section class="full-box_wrap">
          <div class="full-box fit">
            <div class="content">

              <div class="image-box">
                <img src="{{ asset('images/sum_webIST_600x520_princici.jpg') }}" alt="">
                <div>
                  <div>
                    <header>
                      <h2 class="section-title">I PRINCIPI FONDAMENTALI DELLA FILOSOFIA DI SUMITOMO</h2>
                    </header>
                    <div>
                      <ul class="list reset-list check-list">
                        <li>
                          <span>Ci impegniamo a creare nuovo valore attraverso l'innovazione</span>
                        </li>
                        <li>
                          <span>Lavoriamo per contribuire al benessere della società grazie alle nostre attività</span>
                        </li>
                        <li>
                          <span>Sviluppiamo una cultura aziendale vivace e partecipativa e continuiamo ad essere una azienda sulla quale la società possa contare</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              
              <div>
                <div>
                  <div>
                    <p class="sumitomo-color">
                      <strong>Il nostro obiettivo è diventare un'impresa nella quale la società possa avere completa fiducia come presenza solida e capillare.</strong>
                    </p>
                    <p class="vert-gap">Per conoscere in modo più approfondito il nostro codice etico, scarica i seguenti documenti:</p>
                    <ul class="list reset-list list-icon-group two-cells vert-gap">
                      <li id="CodiceAttuale"></li>
                      <li id="ModuloGeneraleAttuale"></li>
                      <li id="ModuloParzialeAttuale"></li>
                      <li id="CorruzioneAttuale"></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="full-box_wrap">
          <div class="full-box simple-text">
            <div class="content">
              <div class="full-width">
                <header>
                  <h2 class="section-title text-left">LE LINEE DI COMPORTAMENTO CHE I DIPENDENTI SEGUONO <span class="line-break show-for-medium"></span>NEL REALIZZARE, GIORNO PER GIORNO, LE LORO ATTIVITÀ</h2>
                </header>
                <div class="small-12 columns">
                  <ol class="list reset-list number-list two-columns">
                    <li>
                      <span>Rispetteremo la filosofia di Sumitomo ed agiremo come buoni cittadini degni di alta stima </span>
                    </li>
                    <li>
                      <span>Osserveremo le leggi e i regolamenti, sia nel nostro Paese che all'estero, e realizzeremo le nostre attività in accordo con le regole della Società </span>
                    </li>
                    <li>
                      <span>Svilupperemo, forniremo prodotti utili e sicuri e produrremo tecnologie che contribuiranno in modo significativo allo sviluppo della Società </span>
                    </li>
                    <li>
                      <span>Ci adopereremo per ridurre a zero gli incidenti sul lavoro e per preservare l'ambiente </span>
                    </li>
                    <li>
                      <span>Agiremo nelle nostre attività sulla base di una libera e leale competizione </span>
                    </li>
                    <li>
                      <span>Ci sforzeremo di fare del nostro posto di lavoro un luogo caldo e stimolante </span>
                    </li>
                    <li>
                      <span>Ognuno di noi si sforzerà nell'ambito delle sue possibilità di aumentare la propria professionalità e di raggiungere competenza ed esperienza nel proprio campo di responsabilità </span>
                    </li>
                    <li>
                      <span>Comunicheremo attivamente con i vari stakeholders, come i nostri azionisti, i clienti, e le comunità locali </span>
                    </li>
                    <li>
                      <span>Come membro di una società internazionale rispetteremo le culture ed i costumi di ogni regione del mondo e contribuiremo a sviluppare quelle regioni </span>
                    </li>
                    <li>
                      <span>Ci sforzeremo per sviluppare continuamente la nostra Azienda grazie alle attività di business, condotte in linea con i principi guida di Sumitomo</span>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="infographic-strip_wrap">
          <div class="infographic-strip light-color">
            <div class="item-content" style="background-image:url('{{ URL::asset('images/sum_webIST_2400x800_chisiamo.jpg') }}">
              <div class="item-body">
                <header>
                  <h2 class="section-title">SICUREZZA E RESPONSABILITÀ</h2>
                </header>
                <div class="simple-text">
                  <div class="text-center" id="chi_siamo_sicurezza"></div>
                </div>
              </div>

            </div>
          </div>
        </section>

        <section class="full-box_wrap">
          <div class="full-box simple-text grey5">
            <div class="content">
              <div class="full-width">
                <div class="small-12 columns" id="chi_siamo_punti_sicurezza">
                  <p class="small-text text-center"><em>Comitato Responsible Care di Sumitomo Chemical Italia.</em></p>
                </div>
              </div>
            </div>
          </div>
        </section>

        @include('layout.fascia-news')
        
    @include('layout.rete-vendita')    
    @include('layout.disclaimer')    
@endsection

@section('script')
<script type="text/javascript">

var fielIdImg1 = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=37",      
        //async:false,
        success: function (result){
         //   $.each(result.data, function(index, value){           
        //        fielIdImg1 = value.id; 
       //     });
            if(result != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                $(".item-image").append("<img src='" + src1 + "' alt='Sumitomo Chemical Italia - Chi siamo'/>");
            }
        },
        error: function (request, status, errorThrown){}
    });

   $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=4",
        //async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                if(value.id == 37){ $("#chisiamo_titolo").html(value.description); }
                if(value.id == 38){ $("#chisiamo_sottotitolo").html(value.description); }                
                if(value.id == 40){ $("#chi_siamo_introduzione").html(value.description); }
                if(value.id == 39){ $("#chi_siamo_spirito").html(value.description); }
                if(value.id == 41){ $("#chi_siamo_sicurezza").html(value.description); }
                if(value.id == 42){ $("#chi_siamo_punti_sicurezza").html(value.description); }
            });
        }
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=43",
        //async:false,
        success: function (results){
                         
            
                    $("#CodiceAttuale").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + results + '"><span class="icon-download"></span><span>Codice Etico</span></a>'); 
        
  
        }
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=44",
        //async:false,
        success: function (results){
        $("#CorruzioneAttuale").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + results + '" target="_blank"><span class="icon-download"></span><span>Manuale della prevenzione della corruzione</span></a>'); 
        }
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=45",
        //async:false,
        success: function (results){
                 
                
                    $("#ModuloGeneraleAttuale").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + results + '"><span class="icon-download"></span><span>Modello 231 (generale)</span></a>'); 
                
   
        }
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=46",
        //async:false,
        success: function (results){
               
                    $("#ModuloParzialeAttuale").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + results + '"><span class="icon-download"></span><span>Modello 231 (speciale)</span></a>'); 
                
        }
    });
    </script>
@stop