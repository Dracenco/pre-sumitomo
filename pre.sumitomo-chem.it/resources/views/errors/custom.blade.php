<?php $cat = ''; ?>
@extends('layout.container')

@section('title', 'Errore - Sumitomo Chemical Italia')

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_prod.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection

@section('content') 
   
    @include('layout.fascia-prodotti')
    @include('layout.ricerca-tecnica')
            
        <section id="error404">
          <div class="row">
            <div class="small-12 medium-12 columns ">
                <h1>Si è verificato un errore nell'elaborare la tua richiesta.</h1>
                <p>Verifica l'esattezza dell'indirizzo oppure continua la navigazione dalla nostra <a href="<?php echo url('/'); ?>">HomePage</a></p>  
            </div>
          </div>
        </section>        
   
@endsection

@section('script')
<script type="text/javascript">      

    
    
</script>
@stop