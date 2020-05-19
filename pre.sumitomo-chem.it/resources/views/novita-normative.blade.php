@extends('layout.container')

@section('title', 'Novità normative - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
          <div class="teaser-carousel">
            <div class="item light-color">
              <div class="item-image">
                <img src="{{ asset('images/news04.jpg') }}" alt="NOVITA' NORMATIVE">
              </div>
              <div class="item-content">
                <h1 class="item-title">NOVIT&Agrave; NORMATIVE</h1>
                <p class="item-text">Le principali notizie dal mondo agricolo e professionale</p>
              </div>
            </div>
          </div>
</section>
@endsection

@section('content')
    <header class="page-title_wrap light">
          <div class="row">
            <div class="small-12 columns">
              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                  <li><a href="<?php echo url('/'); ?>">Home</a></li>
                  <li><a href="<?php echo url('news'); ?>">News</a></li>
                  <li>Novità normative</li>
                </ul>
              </nav>
              <h2 class="page-title">NOVIT&Agrave; NORMATIVE</h2>
            </div>
          </div>
    </header>

    <section class="boxes_wrap news">
        <div class="boxes row">
        </div>
    </section>
    @include('layout.ricerca-tecnica')      
    @include('layout.link-utili')    
    @include('layout.disclaimer')    
@endsection