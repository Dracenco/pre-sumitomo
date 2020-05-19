@extends('layout.container')

@section('title', 'Privacy Policy - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_contatti.jpg') }}" alt="Privacy Policy">
            </div>
            <div class="item-content">
                <h1 class="item-title">Privacy Policy</h1>
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
                  <li>Privacy Policy</li>
                </ul>
              </nav>
              <h2 class="page-title">Privacy Policy</h2> 
        </div>
    </div>
</header>

<section class="notelegali_wrap">
      <div class="row">
        <div class="small-12 columns" id="testo"> </div>
      </div>
</section>
    
    @include('layout.rete-vendita')
    @include('layout.link-utili')
    @include('layout.disclaimer')
@endsection

@section('script')
<script type="text/javascript"> 
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=1",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                $("#testo").html(value.description).text;
            });
        }
    });
    </script>
@stop