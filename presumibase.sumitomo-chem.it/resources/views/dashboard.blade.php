@extends('layout.header')
@section('title', 'Dashboard')
@section('content')
<section id="dashboard">
  <?php $ruoli = Session::get('permessi'); ?>

    @if ($ruoli['database prodotti'] != 'N')
      <ul class="vertical menu" data-accordion-menu>
        <li>
            <a href="#">DATABASE PRODOTTI</a>
            <ul class="menu vertical nested">
                <li>
                <div class="row medium-up-3 large-up-6" id="pulsanti-categorie">
                    <div class="column column-block">
                        <a href="<?php echo url('prodotti/3'); ?>">Insetticidi</a>
                    </div>
                    <div class="column column-block">
                        <a href="<?php echo url('prodotti/1'); ?>">Erbicidi</a>
                    </div>
                    <div class="column column-block">
                        <a href="<?php echo url('prodotti/2'); ?>">Fungicidi</a>
                    </div>
                    <div class="column column-block">
                        <a href="<?php echo url('prodotti/4'); ?>">Vari</a>
                    </div>
                    <div class="column column-block">
                        <a href="<?php echo url('prodotti/5'); ?>">Nutrizionali</a>
                    </div>
                    <div class="column column-block">
                        <a href="<?php echo url('prodotti'); ?>">Vedi tutti</a>
                    </div>
                </div>
                <div class="row large-up-12" id="alfabeto">
                    <div class="column column-block">
                        <a href="<?php echo url('elenco-prodotti'); ?>" style="width:50px">Tutti</a>
                        <a href="<?php echo url('elenco-prodotti/a'); ?>">A</a>
                        <a href="<?php echo url('elenco-prodotti/b'); ?>">B</a>
                        <a href="<?php echo url('elenco-prodotti/c'); ?>">C</a>
                        <a href="<?php echo url('elenco-prodotti/d'); ?>">D</a>
                        <a href="<?php echo url('elenco-prodotti/e'); ?>">E</a>
                        <a href="<?php echo url('elenco-prodotti/f'); ?>">F</a>
                        <a href="<?php echo url('elenco-prodotti/g'); ?>">G</a>
                        <a href="<?php echo url('elenco-prodotti/h'); ?>">H</a>
                        <a href="<?php echo url('elenco-prodotti/i'); ?>">I</a>
                        <a href="<?php echo url('elenco-prodotti/j'); ?>">J</a>
                        <a href="<?php echo url('elenco-prodotti/k'); ?>">K</a>
                        <a href="<?php echo url('elenco-prodotti/l'); ?>">L</a>
                        <a href="<?php echo url('elenco-prodotti/m'); ?>">M</a>
                        <a href="<?php echo url('elenco-prodotti/n'); ?>">N</a>
                        <a href="<?php echo url('elenco-prodotti/o'); ?>">O</a>
                        <a href="<?php echo url('elenco-prodotti/p'); ?>">P</a>
                        <a href="<?php echo url('elenco-prodotti/q'); ?>">Q</a>
                        <a href="<?php echo url('elenco-prodotti/r'); ?>">R</a>
                        <a href="<?php echo url('elenco-prodotti/s'); ?>">S</a>
                        <a href="<?php echo url('elenco-prodotti/t'); ?>">T</a>
                        <a href="<?php echo url('elenco-prodotti/u'); ?>">U</a>
                        <a href="<?php echo url('elenco-prodotti/v'); ?>">V</a>
                        <a href="<?php echo url('elenco-prodotti/w'); ?>">W</a>
                        <a href="<?php echo url('elenco-prodotti/x'); ?>">X</a>
                        <a href="<?php echo url('elenco-prodotti/y'); ?>">Y</a>
                        <a href="<?php echo url('elenco-prodotti/z'); ?>">Z</a>
                        <a href="<?php echo url('elenco-prodotti/0'); ?>">0-9</a>
                    </div>
                </div>
                </li>
            </ul>
        </li></ul>
    @endif

    @if ($ruoli['report'] == 'F' || $ruoli['report'] == 'W')
        <div class="link-sezioni"><a href="<?php echo url('report'); ?>">REPORT</a></div>
    @endif

    @if ($ruoli['nuovo prodotto'] == 'F' || $ruoli['nuovo prodotto'] == 'W')
        <div class="link-sezioni"><a href="<?php echo url('nuovo-prodotto'); ?>">NUOVO PRODOTTO</a></div>
    @endif

    @if ($ruoli['gestione campi'] == 'F' || $ruoli['gestione campi'] == 'W')
        <div class="link-sezioni"><a href="<?php echo url('gestione-campi'); ?>">GESTIONE CAMPI</a></div>
    @endif

    @if ($ruoli['sumipec'] == 'F' || $ruoli['sumipec'] == 'W')
        <div class="link-sezioni"><a href="https://login.magnews.it/sso/login" target="_blank">SUMIPEC</a></div>
    @endif

    @if ($ruoli['gestione sito'] == 'F' || $ruoli['gestione sito'] == 'W')
      <div class="link-sezioni"><a href="<?php echo url('sito'); ?>">GESTIONE SITO</a></div>
    @endif

</section>
 @endsection
