@extends('layout.containerCsr')

@section('title', 'CSR - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
          <div class="teaser-carousel">
            <div class="item light-color">
              <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_chisiamo.jpg') }}" alt="CORPORATE SOCIAL RESPONSABILITY">
              </div>
              <div class="item-content">
                <h1 class="item-title">CORPORATE SOCIAL RESPONSABILITY</h1>
                <p class="item-text">Sumitomo Chemical Italia promuove il programma Responsible Care nelle sue attività commerciali contribuendo allo sviluppo sostenibile della società</p>
              </div>
            </div>
          </div>
        </section>
@endsection

@section('content')    
        <section class="full-box_wrap">
          <div class="full-box simple-text">
            <div class="content">
              <div class="text-center">
                <p><strong>Sumitomo Chemical Italia auspica di comportarsi nel modo più corretto ed etico possibile,</strong><br>andando oltre il semplice rispetto della legge e arricchendo le scelte di gestione con proposte volte a migliorare gli aspetti sociali e ambientali. A tal fine vara programmi di Corporate Social Responsibility (CSR) nei quali crede fortemente e investe da anni.</p>
              </div>
            </div>
          </div>
        </section>
        
        <section class="csr_wrap full-box_wrap">
          <div class="csr full-box grey5">
            <div class="row">
              <div class="small-12 columns">
                <div id="csr-carousel" class="owl-carousel owl-theme">
                  <!-- slide 1 -->
                  <div>
                    <h2 class="item-title section-title">17 GOALS TO TRANSFORM OUR WORLD</h2>
                    <div class="layout">
                      <div class="item-image">
                        <div><img class="owl-lazy" data-src="{{ asset('images/logo-goals.png') }}" alt="17 GOALS TO TRANSFORM OUR WORLD"></div>
                      </div>
                    </div>
                  </div>
                  
                  <div>
                    <h2 class="item-title section-title">Attività di Responsible care in Italia</h2>
                    <div class="layout">
                      <div class="item-image threeCol">
                        <div><img class="owl-lazy" data-src="{{ asset('images/zero-hunger.svg') }}" alt="Zero hunger"></div>
                        <div><img class="owl-lazy" data-src="{{ asset('images/quality-education.svg') }}" alt="Quality education"></div>
                        <div><img class="owl-lazy" data-src="{{ asset('images/climate-action.svg') }}" alt="Climate action"></div>
                      </div>
                    </div>
                  </div>
                  
                  <div>
                    <h2 class="item-title section-title">ZERO HUNGER</h2>
                    <div class="layout image-left">
                      <div class="item-image">
                        <div><img class="owl-lazy" data-src="{{ asset('images/zero-hunger.svg') }}" alt="Zero hunger"></div>
                      </div>
                      <div class="item-content">
                        <p class="item-text">Identificare, sviluppare e promuovere strategie di protezione delle colture, combinando prodotti di diversa provenienza per garantire il massimo rendimento con il minimo impatto sull’ambiente. Strategie biorazionali sono realizzate con prodotti di SCC, VBC e terze parti per ridurre il residuo sul cibo, la pressione sull’ambiente e i rischi per gli utenti e le parti interessate. Promuoviamo questa strategia sul nostro sito web, e con diversi sistemi di comunicazione, interna ed esterna. Coinvolgiamo in questa attività tutti dipendenti, collaboratori, agenti, clienti e fornitori di Sumitomo Chemical Italia.</p>
                      </div>
                    </div>
                  </div>
                  
                  <div>
                    <h2 class="item-title section-title">Quality education</h2>
                    <div class="layout image-left">
                      <div class="item-image">
                        <div><img class="owl-lazy" data-src="{{ asset('images/quality-education.svg') }}" alt="Quality education"></div>
                      </div>
                      <div class="item-content">
                        <p class="item-text">Collaboriamo con scuole superiori e Università, in accordo con il Ministero della pubblica istruzione, per avvicinare i giovani alla scienza e al mondo del lavoro con un piano specifico che coinvolge 20 studenti all’anno. Tutti gli dipendenti di SCI sono coinvolti in questa formazione al fine di trasferire la loro esperienza alle nuove generazioni.</p>
                      </div>
                    </div>
                  </div>
                  
                  <div>
                    <h2 class="item-title section-title">Climate action</h2>
                    <div class="layout image-left">
                      <div class="item-image">
                        <div><img class="owl-lazy" data-src="{{ asset('images/climate-action.svg') }}" alt="Climate action"></div>
                      </div>
                      <div class="item-content">
                        <p class="item-text">Abbiamo adottato una «Car Policy» specifica che identifica i veicoli per la flotta SCI in base al livello più basso di emissioni di CO2. Tutti i driver SCI sono stati coinvolti nei criteri di scelta per renderli informati circa l’importanza di questa semplice scelta per l’ambiente.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="small-12 columns text-center">
                <a href="#" class="button btn-secondary">Scopri</a>
              </div>
            </div>
          </div>
        </section>
        
        <section class="infographic-strip_wrap">
          <div class="infographic-strip csr-family">
            <div class="item-content" style="background-image:url('{{ asset('images/csr-01.jpg') }}">
              <div class="item-body">
                <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                  <h2 class="item-title section-title">
                    Progetto alternanza scuola-lavoro
                  </h2>
                </header>
              </div>
            </div>
          </div>
        </section>
        
        <section class="full-box_wrap">
          <div class="full-box simple-text no-bg toggle-panel">
            <div class="content">
              <div class="text-center">
                <p><strong>Dagli uffici ai banchi di scuola, dai banchi agli uffici. Così Sumitomo Chemical Italia si avvicina agli istituti di formazione superiore, affiancando giovani studenti in un percorso di tirocinio verso il mondo del lavoro.</strong></p>
                <p>Dalla forte relazione scuola-lavoro, parte il progetto di stage formativo di Sumitomo Chemical Italia, durante il quale gli studenti del Liceo Scientifico Statale milanese “Elio Vittorini”, avranno l’opportunità di essere coinvolti in prima persona in alcuni progetti aziendali:</p>
              </div>
            </div>

            <section class="toggle-content no-bg" id="toggle-content" data-toggler=".opened">
              <div class="btn_wrap text-center">
                <div class="columns">
                  <a href="javascript:;" role="button" class="open-btn btn-sumitomo full" aria-label="Apri" data-toggle="toggle-content">scopri i progetti</a>
                </div>
              </div>

              <section class="panel_wrap full-box grey5">
                <div class="row">
                  <header>
                    <h2 class="section-title">Progetti affrontati</h2>
                    <button class="close-btn" aria-label="Chiudi" type="button" data-toggle="toggle-content">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </header>

                  <div class="small-12 columns">
                    <ol class="list reset-list number-list two-columns align-top">
                      <li>
                        <span>Marketing e comunicazione</span>
                        <ul class="list letter-list">
                          <li>Definizione di piano di comunicazione</li>
                          <li>Analisi della comunicazione via web delle principali ditte del settore e relazione</li>
                          <li>Comunicazione Corporate</li>
                          <li>Analisi della rassegna stampa</li>
                          <li>Controllo del piano di pubblicità e utilizzo dei mezzi di comunicazione</li>
                        </ul>
                      </li>
                      <li>
                        <span>Import ed Export: analisi del fabbisogno alimentare in Italia e potenzialità produttive</span>
                      </li>
                      <li>
                        <span>Marketing e vendite</span>
                        <ul class="list letter-list">
                          <li>Analisi del prodotto e relativi vantaggi competitivi</li>
                          <li>Analisi dell’utilizzo del prodotto e sua utilità</li>
                          <li>Analisi comparativa delle diverse soluzioni possibili</li>
                        </ul>
                      </li>
                      <li>
                        <span>Struttura del mercato agricolo nazionale</span>
                      </li>
                      <li>
                        <span>I mercati agricoli internazionali e la posizione dell’agroalimentare italiano</span>
                      </li>
                      <li>
                        <span>Marketing e analisi di mercato</span>
                        <ul class="list letter-list">
                          <li>Definizione dei principi di analisi del mercato</li>
                          <li>Identificazione dei principali mercati agricoli nazionali attraverso l’incrocio di diversi database</li>
                          <li>Definizione di prodotto e analisi di potenziale</li>
                          <li>Preparazione di un piano di sviluppo prodotto</li>
                          <li>Analisi dei competitor e benchmark</li>
                        </ul>
                      </li>
                    </ol>
                  </div>

                </div>
              </section>

            </section>
          </div>
        </section>
        
        <section class="infographic-strip_wrap">
          <div class="infographic-strip dark-color">
            <div class="item-content">
              <div class="item-body">
                <header>
                  <h2 class="section-title">Il Progetto consiste in due sessioni della durata di 40 ore ciascuna</h2>
                </header>
                <div class="simple-text">
                  <ol class="list reset-list check-list">
                    <li>
                      <span>Analisi struttura aziendale, affiancamento teorico pratico nell’ambito delle diverse funzioni, esercitazione (preparazione curriculum vitae, colloquio di lavoro)</span>
                    </li>
                    <li>
                      <span>Svolgimento di attività pratiche, sviluppo di un progetto individuale, in affiancamento a tutor aziendale con esposizione finale.</span>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section>
       
        <section class="infographic-strip_wrap">
          <div class="infographic-strip biorational-family">
            <div class="item-content" style="background-image:url('{{ asset('images/slider-2400x800px-156-chisiamo.png') }}') ">
              <div class="item-body">
                <header>
                  <h2 class="item-title section-title">
                    Progetto riduzione emissioni CO2
                  </h2>
                </header>
                <div>
                  <div>
                    <div>
                      <span class="simple-text"><strong>Valutazione emissioni riscaldamento uffici, e riduzione consumi elettrici</strong> (lampadine a led, interruttori temporizzati, ecc…)</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span class="simple-text"><strong>Valutazione e riduzione emissioni CO2 trasporto prodotti</strong> (spostamento merci da Turati ad Apulia via treno, flotta mezzi di trasporto fornitori minimo EURO5, ecc…)</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span class="simple-text"><strong>Valutazione e riduzione emissioni  CO2 spostamenti dipendenti</strong> (sensibilizzazione personale, incentivi utilizzo mezzi pubblici, ecc…)</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <section class="news_wrap">
          <div class="news" id="news" data-magellan-target="news">
            <header>
              <h2 class="section-title">
                Progetti CSR
                <a href="<?php echo url('progetti-csr'); ?>" class="button btn-secondary show-for-medium">Vedi tutti</a>
              </h2>
            </header>
            <div class="row">
              <div class="small-12 columns">
                <div id="news-carousel" class="owl-carousel owl-theme owlCsr"></div>
              </div>
              <div class="small-12 columns text-center hide-for-medium">
                <a href="<?php echo url('progetti-csr'); ?>" class="button btn-secondary">Vedi tutti</a>
              </div>
            </div>
          </div>
        </section>
       
    @include('layout.disclaimer')    
@endsection

@section('script')
<script type="text/javascript">  
var NotiziaCsr = '';
var titoloCsr = '';
var srcX = '';

var res = [];
	$.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=19",
        async:false,
        success: function (resultsSection){
            $.each(resultsSection.data, function(index, value){
              res.push(value.id);              
            });                 
        }
    });
	
	//	
	res = res.slice(-3);
	res.reverse();

	for (var i = 0; i < res.length; i++) {      
        
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
              url: "https://pre.sumitomo-chem.it/proxy/apiMultiple?id=" + res[i],      
              async:false,
              success: function (result){
                            
                      fielIdImgX = result.id; 
                      name = result.name;
                      resI = name.split(".");
                      if(resI[0] == 'preview'){                        
                          srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                      }
                     
              },
              error: function (request, status, errorThrown){}
            });
           NotiziaCsr = NotiziaCsr + '<div class="box"><div class="image"><img class="owl-lazy" data-src="' + srcX + '"></div><div class="item-content equal-height"><p class="item-text">' + resultsSection.data.name + '</p> </div><a href="{!! url("news/' + res[i] + '") !!}" class="cta"><span class="show-for-sr">Approfondisci la notizia</span></a></div>';                                         
			
			fielIdImgX = ''; 
             srcX = '';
             name = '';
             resI = '';
          } 
      });
    }
	
	 $('#news-carousel').html(NotiziaCsr).foundation();    

</script>
@stop