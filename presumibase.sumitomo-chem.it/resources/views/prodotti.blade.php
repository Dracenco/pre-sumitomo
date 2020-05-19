<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
<script>
    var startwith="<?php if(isset($startwith)){ echo $startwith; }else{ echo ''; } ?>";
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
</script>
@extends('layout.header')
@section('title', 'Dashboard')
@section('content')
@include('layout.menu')
<section id="content" data-equalizer-watch>
    <div class="row large-up-12 prima-riga" id="alfabeto">
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
    <div id="result"></div>

    @if ($ruoli['database prodotti'] != 'N')
    <div class="expanded row collapse">
        <div class="medium-12 large-12 columns">
            <table id="elenco-prodotti">
                <thead>
                    <tr>
                      <th>PRODOTTO </th>
                      <th width="180">LINEA</th>
                      <th width="180">CATEGORIA</th>
                      <th width="170">PM</th>
                      <th width="120" class="text-center">SITO</th>
                      <th width="140" class="text-center">CATALOGO</th>
                      <th width="170" class="text-center">DUPLICA</th>
                      <th width="120" class="text-center">ARCHIVIO</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    @else
    <div class="expanded row">
       <div class="medium-12 large-12 columns">
           <div class="report">Non hai i permessi per visualizzare questa pagina</div>
       </div>
    </div>
    @endif

</section>
@endsection

@section('script')
<script type="text/javascript">
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result) {
            $.each(result.data, function(index, value){
                var categoria_attiva='';
                url_prodotto= "{{ url('prodotti') }}/" + value.id;

                if(cat == value.id){
                    categoria_attiva='class="categoria-attiva"';
                }else{
                    categoria_attiva='';
                }

                $("ul.menu").append('<li> <a href="{!! url("prodotti") !!}' + '/' + value.id + '" ' + categoria_attiva + ' >' + value.name + '</a></li>');
            });
        },
        error: function (request, status, errorThrown){}
    });

	var ajaxRequest = $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetAll?categoryID=" + cat + "&nameStartWith=" + startwith,
        success: function (result) {
            $.each(result.data, function(index, value){
                var url= '{!! url("prodotto") !!}' + '/' + value.categoria.id + '/' + value.code + '/' + value.id;
                var url_duplica= '{!! url("duplica-prodotto") !!}' + '/' + value.categoria.id + '/' + value.code + '/' + value.id;
                var url_codice_prodotto= '{!! url("codici-prodotto") !!}' + '/' + value.categoria.id + '/' + + value.code + '/' + value.id;

                if(value.site){
                    var sito= '{!! URL::asset("img/green.png") !!}';
                }else{
                    var sito= '{!! URL::asset("img/red.png") !!}';
                }

                if(value.catalog){
                    var catalogo= '{!! URL::asset("img/green.png") !!}';
                }else{
                    var catalogo= '{!! URL::asset("img/red.png") !!}';
                }

                @if ($ruoli['database prodotti'] != 'R')
                  var rowProdotto = '<tr><td><a href="' + url + '">' + value.name + '</a></td><td>' + value.company.name + '</td><td>' + value.categoria.name + '</td><td>' + value.productManager.name + '</td><td><img src="' + sito + '"></td><td><img src="' + catalogo + '"></td><td><a href="' + url_duplica + '" class="duplica">Duplica</a></td><td><a href="' + url_codice_prodotto + '" class="shape"><img src="{{ URL::asset('img/shape.png') }}"></a></td></tr>';
                @else
                  var rowProdotto = '<tr><td><a href="' + url + '">' + value.name + '</a></td><td>' + value.company.name + '</td><td>' + value.categoria.name + '</td><td>' + value.productManager.name + '</td><td><img src="' + sito + '"></td><td><img src="' + catalogo + '"></td><td></td><td><a href="' + url_codice_prodotto + '" class="shape"><img src="{{ URL::asset('img/shape.png') }}"></a></td></tr>';
                @endif
                $("#elenco-prodotti tbody").append(rowProdotto);
            });
        },
        error: function (request, status, errorThrown) {}
    });
</script>
@stop
