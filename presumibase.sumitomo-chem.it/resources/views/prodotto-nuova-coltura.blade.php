<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
    var modificaColtura = "<?php echo $cat.'/'.$prodotto.'/'.$id ?>";
</script>
@extends('layout.header')
@section('title', 'Nuova coltura')
@section('content')
@include('layout.menu')
<section id="content-scheda-prodotto" data-equalizer-watch>
    <div class="row large-12 prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                    <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                    <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="breadcrumbs_nome_prodotto"></a></li>
                    <li><a href='{{ url("gestione-colture/".$categoria."/".$prodotto."/".$id) }}'>Colture</a></li>
                    <li class="disabled">Nuova coltura</li>
                </ul>
            </nav>
        </div>
    </div>

    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
        @include('layout.menu-colture')
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error">
                <?php
                if(isset($_GET['ok']))
                    echo "Operazione eseguita";
                elseif(isset($_GET['no']))
                    echo "Impossibile eseguire l'operazione";
                ?>
                </div>
            </div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error"></div><div id="insert"></div>
            </div>
        </div>

        <div class="row">
                <div class="medium-12 large-12 columns">
                    <div class="scheda-nuovo-prodotto">
                        <form class="prodotto-nuova-coltura">
                            <div class="row">
                                <div class="large-3 columns end">
                                    <label>Coltura
                                        <select name="scelta-coltura" id="scelta-coltura"><option value="">Scegli</option></select>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 columns end">
                                    <label>Seleziona la sotto coltura
                                        <select name="sottocoltura" id="sottocoltura"><option value="">Scegli</option></select>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 columns end">
                                    <label>Intervallo di sicurezza
                                        <input type="text" name="carenza" id="carenza">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 columns end">
                                    <input type="submit" name="CREA" value="CREA" class="float-right">
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
            </div>

        <div class="row nuove-avversita">
                <div class="medium-12 large-12 columns">
                    <h1>Selezionare le avversità da assegnare alla coltura</h1>
                </div>

                <div class="medium-12 large-12 columns">
                    <div class="scheda-nuovo-prodotto">
                        <form class="prodotto-nuova-avversita" method="post">
                            <div class="riga-avversita">
                                <div class="riga-nuova-avversita" id="riga-0">

                                    <div id="concatena-avversita-0">
                                        <div class="row" id="avversita-0-0">
                                            <div class="large-3 columns">
                                                <label>Categoria di avversità
                                                    <select name="scelta-coltura-avversita-0-0" class="scelta-coltura-avversita-0-0"><option value="">Scegli</option></select>
                                                </label>
                                            </div>
                                            <div class="large-3 columns end">
                                                <label>Avversità
                                                    <select name="ProdAvversita-0-0" class="ProdAvversita-0-0"><option value="a">Scegli</option></select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <div data-for="avversita-0-0" class="add-riga-avversita more">+</div><span id="label-id-avversita">Aggiungi avversità</span>
                                        </div>
                                    </div>
                                    <div id="concatena-dosi-0">
                                        <div class="row" id="dosi-0-0">
                                            <div class="large-6 columns end">
                                                <label>Dosi
                                                    <textarea name="dosi-0-0" class="dosi dosi-0-0"></textarea>
                                                </label>
                                            </div>
                                            <div class="large-6 columns end">
                                                <label>Modalità d'impiego
                                                    <textarea name="impiego-0-0" class="impiego impiego-0-0"></textarea>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <div data-for="dosi-0-0" class="add-riga-dosi more">+</div><span id="label-id-avversita">Aggiungi campi Dose/Impiego</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row bordo-riga">
                                <div class="large-12 columns">
                                    <div id="add-avversita" data-for="riga-0" class="more">+</div><span id="label-id-avversita">Nuova riga di avversità</span>
                                </div>
                            </div>
                            <div class="large-12 columns">
                                <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                <a href='{{ url("prodotto-nuova-coltura/".$categoria."/".$prodotto."/".$id) }}' class="pulsante-annulla">ANNULLA</a>
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
            $("#breadcrumbs_nome_prodotto").append(result.data.name);
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
            $("select#scelta-coltura").append(colture);
        },
        error: function (request, status, errorThrown) {}
    });

    $('select#scelta-coltura').on('change', function() {
        var categoryid = this.value;
        $("#sottocoltura").html('<option value="">Scegli</option>');
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
                $("#sottocoltura").append(sottofamiglia);

            },
            error: function (request, status, errorThrown) {}
        });
    });

    $(document).on('submit', '.prodotto-nuova-coltura', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#scelta-coltura').val() != ''){
            var categoria = $(this).find('select#scelta-coltura').val();
        }else{
            var categoria = '';
            validazionecampi = false;
            error = error + "Selezionare la coltura<br>";
        }

        if($(this).find('select#sottocoltura').val() != ''){
            var sottoCategoria = $(this).find('select#sottocoltura').val();
            var NomeSottoCategoria = $('select[name="sottocoltura"] option:selected').text();
        }else{
            var sottoCategoria = '';
            validazionecampi = false;
            error = error + "Indicare la sotto coltura<br>";
        }

        if($(this).find('input#carenza').val() != ''){
            var carenza = $(this).find('input#carenza').val();
        }else{
            var carenza = '';
        }

        if(categoria==''){
            $("#scelta-coltura").parent().css("color","red");
        }else{
            $("#scelta-coltura").parent().removeAttr("style");
        }

        if(sottoCategoria==''){
            $("#sottocoltura").parent().css("color","red");
        }else{
            $("#sottocoltura").parent().removeAttr("style");
        }

        var sottocategoria = { "sottocoltura":[{ "id" : sottoCategoria }]};
        if(validazionecampi){

            var myObj;
            var ordine = 1;
            myObj = { "ordine" : ordine ,"tempodicarenza" : carenza , "prodotto" : { "code" : prodotto } };

            $.extend( myObj, sottocategoria );

            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/ElementiDiColtura/Create",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile aggiungere la coltura');
                    }else{
                        var idcoltura = data.data.id;
                        $('<input>').attr({ type: 'hidden', id: 'idcoltura', name: 'idcoltura', value: idcoltura }).appendTo('form.prodotto-nuova-avversita');
                        $("#insert").html('Coltura <strong>' + NomeSottoCategoria + '</strong> correttamente inserita. Procedere ad inserire le avversità per la coltura selezionata.');
                        $("#error").html('');
                        $(".scheda-nuovo-prodotto").css('display','inline');
                        $(".nuove-avversita").css('display','inline');
                        $(".prodotto-nuova-coltura").css('display','none');
                    }
                },
                 error: function (request, status, errorThrown) {}
            });
        }else{
            $("#error").html('Impossibile aggiungere la coltura:<br>' + error);

        }
    });

    var categoria = '';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAllCategorie",
        success: function (result) {
            $.each(result.data, function(index, value){
                categoria = categoria + '<option value="' + value.id + '" >' + value.name + '</option>'
            });
            $("select.scelta-coltura-avversita-0-0").append(categoria);
        },
        error: function (request, status, errorThrown) {}
    });

    $('select.scelta-coltura-avversita-0-0').on('change', function() {

        var colturaid = this.value;
        var avversita = '';
        $("select.ProdAvversita-0-0").html('<option value="a">Scegli</option>');

        var myObj;

        myObj = { "id" : colturaid };
        var myJSON = JSON.stringify(myObj);

        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAvversitaPerCategoria",
            contentType: true,
            processData: false,
            async:false,
            data: myJSON,
            success: function (result) {
                $.each(result.data, function(index, value){
                    avversita = avversita + '<option value="' + value.id + '" >' + value.description + ' (' + value.name + ')</option>'
                });
                $("select.ProdAvversita-0-0").append(avversita);
            },
            error: function (request, status, errorThrown) {}
        });
    });

    var header_count_avversita = 1;
    var line_count_avversita = 1;
    $('#add-avversita').click(function() {

        var rigaAvv = $(this).attr("data-for");
        var resAvv = rigaAvv.split("-");
        var numAvv = Number(resAvv[1]) + 1;

        $('div.riga-avversita').append('<div class="riga-nuova-avversita" id="riga-'+ numAvv +'"><div id="concatena-avversita-'+ numAvv +'"><div class="row" id="avversita-'+ numAvv +'-0"><div class="large-3 columns"><label>Categoria di avversità<select name="scelta-coltura-avversita-'+ numAvv +'-0" class="scelta-coltura-avversita-'+ numAvv +'-0"><option value="">Scegli</option></select></label></div><div class="large-3 columns end"><label>Avversità<select name="ProdAvversita-'+ numAvv +'-0" class="ProdAvversita-'+ numAvv +'-0"><option value="a">Scegli</option></select></label></div></div></div><div class="row"><div class="large-12 columns"><div data-for="avversita-'+ numAvv +'-0" class="add-riga-avversita more">+</div><span id="label-id-avversita">Aggiungi avversità</span></div></div><div id="concatena-dosi-'+ numAvv +'"><div class="row" id="dosi-'+ numAvv +'-0"><div class="large-6 columns end"><label>Dosi<textarea name="dosi-'+ numAvv +'-0" class="dosi dosi-'+ numAvv +'-0"></textarea></label></div><div class="large-6 columns end"><label>Modalità d\'impiego<textarea name="impiego-'+ numAvv +'-0" class="impiego impiego-'+ numAvv +'-0"></textarea></label></div></div></div><div class="row"><div class="large-12 columns"><div data-for="dosi-'+ numAvv +'-0" class="add-riga-dosi more">+</div><span id="label-id-avversita">Aggiungi campi Dose/Impiego</span></div></div>');

        $('#add-avversita').attr('data-for','riga-' + numAvv );


        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAllCategorie",
            async:false,
            success: function (result) {
                $.each(result.data, function(index, value){
                    var cat = value.id + '-' + line_count_avversita;
                    categoria = categoria + '<option value="' + cat + '" >' + value.name + '</option>'
                });
                $("select.scelta-coltura-avversita-" + numAvv + '-0').append(categoria);
            },
            error: function (request, status, errorThrown) {}
        });

        $("select[class^='scelta-coltura-avversita-']").on('change', function() {

            var colturaid = this.value;
            var str = $(this).attr("class");
            var res = str.split("-");
            var avversita = '';

            $("select.ProdAvversita-" + res[3] + '-' + res[4]).html('<option value="a">Scegli</option>');

            var myObj;
            myObj = { "id" : colturaid };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAvversitaPerCategoria",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function (result) {
                    $.each(result.data, function(index, value){
                        avversita = avversita + '<option value="' + value.id + '" >' + value.description + ' (' + value.name + ')</option>'
                    });
                    $("select.ProdAvversita-" + res[3] + '-' + res[4]).append(avversita);
                },
                error: function (request, status, errorThrown) {}
            });
        });

        line_count_avversita++;
    });

    $(document).on('click', 'div.add-riga-avversita', function() {

        var riga = $(this).attr("data-for");
        var res = riga.split("-");
        var num= Number(res[2]) + 1;

        $('div#riga-' + res[1] + ' .add-riga-avversita').attr('data-for','avversita-' + res[1] + '-' + num + '');

        $('div#concatena-avversita-' + res[1]).append('<div class="row" id="avversita-' + res[1] + '-' + num + '"><div class="large-3 columns"><label>Categoria di avversità<select name="scelta-coltura-avversita-' + res[1] + '-' + num + '" class="scelta-coltura-avversita-' + res[1] + '-' + num + '"><option value="">Scegli</option></select></label></div><div class="large-3 columns end"><label>Avversità<select name="ProdAvversita-' + res[1] + '-' + num + '" class="ProdAvversita-' + res[1] + '-' + num + '"><option value="a">Scegli</option></select></label></div></div>');

        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAllCategorie",
            async:false,
            success: function (result) {
                $.each(result.data, function(index, value){
                    var cat = value.id + '-' + line_count_avversita;
                    categoria = categoria + '<option value="' + cat + '" >' + value.name + '</option>'
                });
                $("select.scelta-coltura-avversita-" + res[1] + '-' + num ).append(categoria);
            },
            error: function (request, status, errorThrown) {}
        });

        $("select[class^='scelta-coltura-avversita']").on('change', function() {

            var colturaid = this.value;
            var str = $(this).attr("class");
            var resColtura = str.split("-");
            var avversita = '';

            $("select.ProdAvversita-" + resColtura[3] + '-' + resColtura[4]).html('<option value="a">Scegli</option>');

            var myObj;
            myObj = { "id" : colturaid };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAvversitaPerCategoria",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function (result) {
                    $.each(result.data, function(index, value){
                        avversita = avversita + '<option value="' + value.id + '" >' + value.description + ' (' + value.name + ')</option>'
                    });
                    $("select.ProdAvversita-" + resColtura[3] + '-' + resColtura[4]).append(avversita);
                },
                error: function (request, status, errorThrown) {}
            });
        });

        line_count_avversita++;
    });

    $(document).on('click', 'div.add-riga-dosi', function() {

        var riga = $(this).attr("data-for");
        var res = riga.split("-");
        var num= Number(res[2]) + 1;

        $('div#riga-' + res[1] + ' .add-riga-dosi').attr('data-for','dosi-' + res[1] + '-' + num + '');

        $('div#concatena-dosi-' + res[1]).append('<div class="row" id="dosi-' + res[1] + '-' + num + '"><div class="large-6 columns end"><label>Dosi<textarea name="dosi-' + res[1] + '-' + num + '" class="dosi dosi-' + res[1] + '-' + num + '"></textarea></label></div><div class="large-6 columns end"><label>Modalità d\'impiego<textarea name="impiego-' + res[1] + '-' + num + '" class="impiego impiego-' + res[1] + '-' + num + '"></textarea></label></div></div>');
    });


    $(document).on('submit', '.prodotto-nuova-avversita', function(e) {
       e.preventDefault();

        var NumeroRigheColture=$("div[id^='riga-']").last().attr("id");  /* numero di righe di avversità da creare */
        var resRigheColture = NumeroRigheColture.split("-");
        NumeroRigheColture = resRigheColture[1];

        var elementodicoltura = $('input[name="idcoltura"]').val(); /* id coltura da assegnare alle avversità */

        var i=0;

        while(i <= NumeroRigheColture){

            var intAvversita=0;
            var intDosi=0;
            var intImpiego=0;
            var arrayAvversita = '';
            var arrayDosi = '';
            var arrayImpiego = '';
            var myObj = '';

            var NumeroAvversita=$('select[name^="ProdAvversita-' + i + '"]').last().attr("class");
            var NumeroDosi=$('textarea[name^="dosi-' + i + '"]').last().attr("class");
            var NumeroImpiego=$('textarea[name^="impiego-' + i + '"]').last().attr("class");

            var resNumeroAvversita = NumeroAvversita.split("-");
            NumeroAvversita = resNumeroAvversita[2];

            var resNumeroDosi = NumeroDosi.split("-");
            NumeroDosi = resNumeroDosi[2];

            var resNumeroImpiego = NumeroImpiego.split("-");
            NumeroImpiego = resNumeroImpiego[2];

            while(intAvversita <= NumeroAvversita){
                var avversita=$('select[name^="ProdAvversita-' + i + '-' + intAvversita + '"]').val();
                avversita = avversita.replace(/[\n\r]/g, "\\n");
                if (!(avversita=='a')) {
                    arrayAvversita = arrayAvversita + '{ "ID" : "' + avversita + '" },';
                }
                intAvversita++;
            }

            while(intDosi <= NumeroDosi){
                var dosi=$('textarea[name^="dosi-' + i + '-' + intDosi + '"]').val() ;
				dosi = dosi.replace(/[\n\r]/g, "\\n");
                arrayDosi = arrayDosi + '{ "name" : "' + dosi + '", "ordine" : ' + i + '},';
                intDosi++;
            }

            while(intImpiego <= NumeroImpiego){
                var impiego=$('textarea[name^="impiego-' + i + '-' + intImpiego + '"]').val();
				impiego = impiego.replace(/[\n\r]/g, "\\n");
                arrayImpiego = arrayImpiego + '{ "name" : "' + impiego + '", "ordine" : ' + i + '},';
                intImpiego++;
            }

            arrayAvversita = arrayAvversita.slice(0, -1);
            arrayAvversita = "[" + arrayAvversita + "]";
            var objAvversita = JSON.parse(arrayAvversita);

            arrayDosi = arrayDosi.slice(0, -1);
            arrayDosi = "[" + arrayDosi + "]";
            var objDosi = JSON.parse(arrayDosi);

            arrayImpiego = arrayImpiego.slice(0, -1);
            arrayImpiego = "[" + arrayImpiego + "]";
            var objImpiego = JSON.parse(arrayImpiego);

            myObj = { "ordine": 1, "elementodicoltura" : { "id" : elementodicoltura }, "avversita" : objAvversita, "dosi" : objDosi, "impieghi" : objImpiego };

            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/ElementiDiAvversita/Create",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function (result) {
                    if(result.returnCode != 0 ){
                        $("#error").html('Impossibile modificare le avversità: ' + result.errors);
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }else{
                        $("#error").html('Avversità correttamente aggiunte');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }

                },
                error: function (request, status, errorThrown) {
                    $("#error").html('Impossibile modificare le avversità.');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            });

            i++;
        }

   });
</script>
@stop
