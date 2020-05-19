<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
</script>

@extends('layout.header')
@section('title', 'Duplica prodotto')

@section('content')

@include('layout.menu')
<section id="content-elenco-codici" data-equalizer-watch>
    <div class="row large-12 prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                    <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                    <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="breadcrumbs_nome"></a></li>
                    <li class="disabled">Duplica prodotto</li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="expanded row">
            <div class="medium-12 large-12 columns"><div id="error"></div></div>
    </div>

     @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
        <div class="row">
        <div class="medium-12 large-9 columns">
            <div class="scheda-nuovo-prodotto">
                <form class="crea-codice">
                    <div class="row">
                        <div class="large-4 columns end">
                            <label>Nome nuovo prodotto<input type="text" name="nome_prodotto" id="nome_prodotto"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-4 columns end">
                            <input type="submit" name="CREA" value="CREA" class="float-right margin-top-none">
                        </div>
                    </div>
                </form>
            </div>
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
    var id_prodotto='';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        async:false,
        success: function (result){
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $("#breadcrumbs_nome").append(result.data.name);
            id_prodotto=result.data.id;
        },
        error: function (request, status, errorThrown){}
    });

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

                if(cat == value.id){ categoria_attiva='class="categoria-attiva"';
                }else{ categoria_attiva=''; }

                $("ul.menu").append('<li> <a href="{!! url("prodotti") !!}' + '/' + value.id + '" ' + categoria_attiva + ' >' + value.name + '</a></li>');
            });
        },
        error: function (request, status, errorThrown){}
    });

    $("form.crea-codice").submit(function(e){
        e.preventDefault();

        var nome_prodotto = $('#nome_prodotto').val();

        if(nome_prodotto==''){
            $("#nome_prodotto").parent().css("color","red");
        }else{
            $("#nome_prodotto").parent().removeAttr("style");
        }

        post_data='{ "IDProdottoDiPartenza" :  "' + id_prodotto + '"  , "Name" :  "' + nome_prodotto + '" , "CreatedBy": "' + utente + '" }';

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/CreateFromProduct",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $("#error").html('Impossibile creare un nuovo prodotto');
                }else{
                    $("#error").html('Prodotto correttamente creato');

                    window.setTimeout(function () {
                        location.href = '{!! url("prodotto") !!}' + '/' + cat + '/' + data.data.code + '/' + data.data.code ;
                    }, 2000);
                }
            },
            error: function (request, status, errorThrown) {}
        });
    });
</script>
@stop
