<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
    var idcoltura="<?php if(isset($idcoltura)){ echo $idcoltura; }else{ echo ''; } ?>";
    var modificaColtura = "<?php echo $cat.'/'.$prodotto.'/'.$id ?>";
</script>

@extends('layout.header')
@section('title', 'Duplica coltura')

@section('content')
@include('layout.menu')
      <section id="content-scheda-prodotto" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                        <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                        <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="breadcrumbs_name"></a></li>
                        <li><a href='{{ url("gestione-colture/".$categoria."/".$prodotto."/".$id) }}'>Colture</a></li>
                        <li class="disabled">Duplica coltura</li>
                    </ul>
                </nav>
            </div>
        </div>

        @include('layout.menu-colture')
        @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
         <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error" style="margin-left:15px"></div>
                <div class="numbColture">Confermando verrà creata una nuova riga di coltura applicata al prodotto con le colture qui sotto indicate con associate tutte le avversità della coltura originaria.<br>Se si desiderano modificare le colture copiando le sole avversità selezionare le nuove colture dalle tendine. </div>
             </div>
          </div>

         <div class="expanded row">
             <div class="medium-12 large-12 columns"><div class="scheda-nuovo-prodotto"></div></div>
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
        error: function (request, status, errorThrown) {}
    });

	$.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        async:false,
        success: function (result) {
            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $("#breadcrumbs_name").append(result.data.name);

            var stringModificaColtura='<form class="modificaColtura"><div class="row medium-up-2 large-up-2 collapse">';
            var avvertenzeArray = new Array();
            var colture= result.data.colture;
            var i=1;

            $.each(colture, function(index, value){

                if(value.id == idcoltura){
                    var colture = trim(value.name);

                    colture = colture.replace('(', ',');
                    colture = colture.replace(')', ',');

                    if( (colture.slice(-1)) == ','){ colture = colture.substring(0, colture.length - 1); }

                    var resAvv = colture.split(",");
                    var sottocolture = value.sottocoltura;

                    $.each(sottocolture, function(indexsottocolture, valueSottocolture){
                        stringModificaColtura = stringModificaColtura + '<div class="column column-block"><div class="row"><div class="large-12 columns"><label>Coltura<select name="scelta-coltura-' + i + '" class="scelta-coltura-' + i + '"><option value="">Scegli</option></select></label></div></div><div class="row"><div class="large-12 columns"><label>Seleziona la sotto coltura<select name="sottocoltura-' + i + '" class="sottocoltura-' + i + '"><option value="0">Cancella</option><option value="' + valueSottocolture.id + '" selected>' + valueSottocolture.name + '</option></select></label></div></div></div>';
                        i++;
                    });

                    stringModificaColtura = stringModificaColtura + '</div><div class="row" style="padding-top:20px"><div class="large-12 columns"><label>Intervallo di sicurezza<input type="text" name="carenza" id="carenza" value="' + value.tempoDiCarenza + '"></label></div></div><div class="row"><div class="large-12 columns "><input type="hidden" id="idcoltura" name="idcoltura" value="' + idcoltura + '"><input type="submit" name="DUPLICA" value="DUPLICA" class="float-right"></div></div></form>'

                    $(".scheda-nuovo-prodotto").append(stringModificaColtura);
                }
            });
        },
        error: function (request, status, errorThrown) {}
    });

    var colture = '';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=farming_category&all=false",
        success: function (result) {
            $.each(result.data, function(index, value){
                colture = colture + '<option value="' + value.value + '" >' + value.name + '</option>'
            });
            $("select[class^='scelta-coltura-']").append(colture);
        },
        error: function (request, status, errorThrown) {}
    });

    $("select[class^='scelta-coltura-']").on('change', function() {

        var categoryid = this.value;
        var str = $(this).attr("class");
        var res = str.split("-");

        $("select.sottocoltura-" + res[2]).html('<option value="">Scegli</option><option value="0">Cancella</option>');

        var sottofamiglia = '';
        var myObj;

        myObj = { "id" :  categoryid };
        var myJSON = JSON.stringify(myObj);

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
                request.setRequestHeader("Content-Type", "application/json")
            },
            url: "{{ config('constants.UrlWebService') }}api/Colture/GetSottocolturePerColtura",
            contentType: true,
            processData: false,
            async:false,
            data: myJSON,
            success: function (result) {
                $.each(result.data, function(index, value){
                    sottofamiglia = sottofamiglia + '<option value="' + value.id + '" >' + value.name + '</option>';
                });
                $('select.sottocoltura-' + res[2]).append(sottofamiglia);
            },
            error: function (request, status, errorThrown) {}
        });
    });

    $(document).on('submit', '.modificaColtura', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';
        var NumeroColture=$("select[class^='sottocoltura-']").last().attr("class");
        var resRigheColture = NumeroColture.split("-");
        NumeroColture = resRigheColture[1];

        if($(this).find('input#idcoltura').val() != ''){
            var idcolturaDuplica = $(this).find('input#idcoltura').val();
        }else{
            var idcolturaDuplica = '';
            validazionecampi = false;
        }

        if($(this).find('input#carenza').val() != ''){
            var carenza = $(this).find('input#carenza').val();
        }else{
            var carenza = '';
        }

        var x=1;
        var arrayColture = '';

        while(x <= NumeroColture){
            var SottoColturaId = $(this).find('select.sottocoltura-' + x).val();
            if(SottoColturaId != 0){ arrayColture = arrayColture + '{ "id" : "' + SottoColturaId + '" },';  }
            x++;
        }

        arrayColture = arrayColture.slice(0, -1);

        var ordine = 1;
        var ErrorDuplica = '';
        post_data=' { "ordine" : ' + ordine + ', "tempodicarenza" :  "' + carenza + '", "prodotto" : { "code" : "' + prodotto + '"}, "sottocoltura" : [' + arrayColture + '] }';

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/ElementiDiColtura/Create",
                dataType: "json",
                async:false,
                data: JSON.parse(post_data),
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile duplicare le coltur.');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }else{
                        var IdNuovaColtura = data.data.id;

                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Products/GetColture?code=" + prodotto,
                            async:false,
                            success: function (result) {
                                $.each(result.data, function(index, value){

                                    if(value.id == idcoltura){
                                        var ListAvversita= value.avversita;

                                        $.each(ListAvversita, function(indexAvv, valueAvv){

                                            var myObj;
                                            myObj = { "ID" : valueAvv.id , "ElementoDiColtura" : { "ID" : IdNuovaColtura } };
                                            var myJSON = JSON.stringify(myObj);

                                            $.ajax({
                                                type: "POST",
                                                beforeSend: function (request) {
                                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                                    request.setRequestHeader("lang", "it");
                                                    request.setRequestHeader("Content-Type", "application/json")
                                                },
                                                url: "{{ config('constants.UrlWebService') }}api/ElementiDiAvversita/Duplicate",
                                                contentType: true,
                                                processData: false,
                                                async:false,
                                                data: myJSON,
                                                success: function (result){ ErrorDuplica = 'Colture correttamente duplicate'; },
                                                error: function (request, status, errorThrown){ ErrorDuplica = 'Impossibile duplicare le colture.'; }
                                            });
                                        });
                                    }
                                });
                                $("#error").html(ErrorDuplica);
                                $("html, body").animate({ scrollTop: 0 }, "slow");
                            },
                             error: function (request, status, errorThrown) {
                                 $("#error").html('Impossibile duplicare le colture.');
                                 $("html, body").animate({ scrollTop: 0 }, "slow");
                             }
                        });
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }
                },
                error: function (request, status, errorThrown){
                    $("#error").html('Impossibile duplicare le colture.');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            });
        }else{
            $("#error").html('Impossibile duplicare le colture.');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });
</script>
@stop
