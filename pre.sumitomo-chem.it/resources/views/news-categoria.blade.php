@extends('layout.container')

@section('title', 'Categoria News - Sumitomo Chemical Italia')

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ URL::asset('images/sum_webIST_2400x640_news.jpg') }}" alt="">
            </div>
            <div class="item-content">
                <h1 class="item-title">news</h1>
                <p class="item-text">Le principali notizie dal mondo agricolo e professionale</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
    <section class="news_wrap">
          <div class="news">
            <header>
              <h2 class="section-title text-left">
                Mondo {{ categoria }}
                <a href="novita-normative.html" class="button btn-transparent show-for-medium">Vedi tutte</a>
              </h2>
            </header>
            <div class="row">
              <div class="small-12 columns">
                <div id="agri-world-carousel" class="owl-carousel owl-theme">
                  <div class="box">
                    <div class="image">
                      <img class="owl-lazy" data-src="assets/images/temp/news-1.jpg" alt="">
                    </div>
                    <div class="item-content equal-height">
                      <p class="item-text">Giovani in agricoltura: contributi ISMEA per primo insediamento.</p>
                    </div>
                    <a href="dettaglio-news.html" class="cta">
                      <span class="show-for-sr">Approfondisci la notizia</span>
                    </a>
                  </div>
                  <div class="box">
                    <div class="image">
                      <img class="owl-lazy" data-src="assets/images/temp/news-2.jpg" alt="">
                    </div>
                    <div class="item-content equal-height">

                      <p class="item-text">Allarme in diverse zone d’Italia: attacco precoce della Processionaria del Pino.</p>
                    </div>
                    <a href="dettaglio-news.html" class="cta">
                      <span class="show-for-sr">Approfondisci la notizia</span>
                    </a>
                  </div>
                  <div class="box">
                    <div class="image">
                      <img class="owl-lazy" data-src="assets/images/temp/news-3.jpg" alt="">
                    </div>
                    <div class="item-content equal-height">
                      <p class="item-text">Prolectus 50 WG, efficacia e rapidità contro la monilia delle drupacee.</p>
                    </div>
                    <a href="dettaglio-news.html" class="cta">
                      <span class="show-for-sr">Approfondisci la notizia</span>
                    </a>
                  </div>
                  <div class="box">
                    <div class="image">
                      <img class="owl-lazy" data-src="assets/images/temp/news-1.jpg" alt="">
                    </div>
                    <div class="item-content equal-height">
                      <p class="item-text">Giovani in agricoltura: contributi ISMEA per primo insediamento.</p>
                    </div>
                    <a href="dettaglio-news.html" class="cta">
                      <span class="show-for-sr">Approfondisci la notizia</span>
                    </a>
                  </div>
                  <div class="box">
                    <div class="image">
                      <img class="owl-lazy" data-src="assets/images/temp/news-2.jpg" alt="">
                    </div>
                    <div class="item-content equal-height">

                      <p class="item-text">Allarme in diverse zone d’Italia: attacco precoce della Processionaria del Pino.</p>
                    </div>
                    <a href="dettaglio-news.html" class="cta">
                      <span class="show-for-sr">Approfondisci la notizia</span>
                    </a>
                  </div>
                  <div class="box">
                    <div class="image">
                      <img class="owl-lazy" data-src="assets/images/temp/news-3.jpg" alt="">
                    </div>
                    <div class="item-content equal-height">
                      <p class="item-text">Prolectus 50 WG, efficacia e rapidità contro la monilia delle drupacee.</p>
                    </div>
                    <a href="dettaglio-news.html" class="cta">
                      <span class="show-for-sr">Approfondisci la notizia</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="small-12 columns text-center hide-for-medium">
                <a href="novita-normative.html" class="button btn-secondary">Vedi tutte</a>
              </div>
            </div>
          </div>
        </section>
    @include('layout.ricerca-tecnica')       
    @include('layout.link-utili')    
    @include('layout.disclaimer')    
@endsection