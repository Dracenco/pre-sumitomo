@extends('layout.container')

@section('title', 'Condizioni generali - Sumitomo Chemical Italia')

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_contatti.jpg') }}" alt="">
            </div>
            <div class="item-content">
                <h1 class="item-title">Condizioni generali</h1>
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
                  <li>Condizioni generali</li>
                </ul>
              </nav>
              <h2 class="page-title">Condizioni generali</h2>
        </div>
    </div>
</header>

<section class="notelegali_wrap">
      <div class="row">
        <div class="small-12 columns">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et nunc eget dolor molestie commodo. Phasellus ac dolor eu ante condimentum faucibus quis euismod nulla. Nulla eu odio feugiat elit placerat dapibus. Ut erat dui, auctor id pulvinar ac, congue sed mi. Vestibulum tempor malesuada erat, eu tempor erat. Etiam consectetur mi eget faucibus varius. Aliquam erat volutpat. Proin semper massa sed posuere feugiat. Morbi bibendum eleifend mattis. Sed aliquam id odio sed interdum. Sed a massa quis orci congue hendrerit. Vivamus dapibus lacus nec dolor laoreet efficitur.</p>
            
<p>Cras congue elit at velit gravida egestas. Nulla fermentum accumsan orci, sed porttitor turpis suscipit eget. Suspendisse pretium fermentum viverra. Proin dictum ex vel risus scelerisque tristique. Aliquam erat volutpat. Vestibulum ut eleifend lacus. Praesent euismod metus et nulla porttitor luctus. Ut pulvinar lacus ipsum, quis auctor sem consectetur non. Nam dignissim congue libero et condimentum.</p>

<p>Nunc rhoncus posuere interdum. Morbi rutrum lorem ut lectus ultrices dictum. Pellentesque egestas lorem a tellus rutrum, nec dignissim turpis lacinia. Nam id malesuada orci. Aliquam eleifend vitae lorem dignissim volutpat. Suspendisse vitae malesuada nibh, a consequat arcu. Quisque nulla libero, laoreet quis justo vulputate, rhoncus dictum diam. Vestibulum et maximus lacus. Mauris egestas lorem nec nisl varius, id sodales magna viverra. Nullam ultricies velit ac nulla facilisis tincidunt. Nam ac porttitor massa. Maecenas quis purus eget nibh malesuada pulvinar vitae a augue. Aliquam eu odio elementum, malesuada purus in, maximus lacus.</p>

<p>In rutrum dui id est dapibus posuere. Nulla dui mauris, congue eu sem a, placerat rutrum erat. Vestibulum lacinia vitae elit id elementum. Maecenas egestas, nisi vitae tempus tristique, ligula lacus imperdiet nisl, commodo maximus dui risus eget ante. In sagittis rhoncus sem, vel tristique enim. In quis nibh consequat, rhoncus metus a, scelerisque erat. Praesent non porttitor tortor, vitae tincidunt nisi. Maecenas nec elit commodo felis dictum congue. Aliquam quis mauris id tortor vulputate pellentesque sit amet quis eros. Integer hendrerit gravida ipsum, at sollicitudin leo maximus lobortis. Nam sagittis ipsum eu pretium lacinia. In euismod velit ex, ac pharetra tortor mollis vitae. Sed ultrices enim est, tristique ullamcorper nibh hendrerit vitae. Curabitur ante eros, vehicula in sagittis vel, auctor et nulla. Nulla et posuere felis. Nulla ultricies consequat arcu sit amet condimentum.</p>

<p>Curabitur vitae nulla aliquet, mattis erat ut, eleifend sapien. Praesent rhoncus odio et pretium ultrices. Donec eros mauris, feugiat volutpat interdum sit amet, pulvinar vel nibh. In porttitor lacus eget facilisis mattis. Etiam convallis dictum velit sit amet bibendum. Quisque mollis magna congue tellus cursus dapibus id quis metus. Vivamus sagittis lacinia nibh scelerisque feugiat. Aenean dui est, congue vel libero et, condimentum eleifend mi. Duis tempor lacus quis urna ultrices, vel rutrum massa ultrices. Aenean at velit sed sem pretium congue in vel lacus. Duis sit amet lacus id mauris scelerisque consectetur at id diam.</p>
          </div>
      </div>
</section>

    <!-- rete vendita -->
    @include('layout.rete-vendita')
    <!-- rete vendita -->

    <!-- link utili -->
    @include('layout.link-utili')
    <!-- link utili -->
    
    <!-- disclaimer -->
    @include('layout.disclaimer')
    <!-- disclaimer -->
@endsection