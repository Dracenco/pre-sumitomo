<?php $ruoli = Session::get('permessi'); ?>
@extends('layout.header')

@section('title', 'Dashboard')

@section('content')

<section id="dashboard">
    <div class="menu">

      <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/frodi'); ?>">SEGNALAZIONE FRODI</a>
            </div>
        </div>
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/contatti'); ?>">CONTATTI</a>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/catalogo'); ?>">Catalogo</a>
            </div>
        </div>
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/rete-vendita'); ?>">Rete vendita</a>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/home-page'); ?>">Home Page</a>
            </div>
        </div>
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/notizie'); ?>">Notizie</a>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/prodotti'); ?>">Prodotti</a>
            </div>
        </div>
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/chi-siamo'); ?>">Chi siamo</a>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/sicurezza'); ?>">Sicurezza</a>
            </div>
        </div>
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/schede-difesa'); ?>">Schede difesa</a>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/centri-antiveleni'); ?>">Centri antiveleni</a>
            </div>
        </div>
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/biorazionale'); ?>">Biorazionale</a>
            </div>
        </div>

      </div>

      <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/privacy'); ?>">Privacy/Policy</a>
            </div>
        </div>
        <div class="small-12 medium-6 large-6 columns">
            <div class="link-sezioni">
                <a href="<?php echo url('sito/cookies'); ?>">Cookies</a>
            </div>
        </div>
      </div>

    </div>
</section>

 @endsection
