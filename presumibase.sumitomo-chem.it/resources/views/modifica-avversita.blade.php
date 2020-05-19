<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
    var idcoltura="<?php if(isset($idcoltura)){ echo $idcoltura; }else{ echo ''; } ?>";
    var idavversita="<?php if(isset($idavversita)){ echo $idavversita; }else{ echo ''; } ?>";
    var modificaColtura = "<?php echo $cat.'/'.$prodotto.'/'.$id ?>";
</script>

@extends('layout.header')
@section('title', 'Modifica avversità')
@section('content')

@include('layout.menu')
<section id="content-scheda-prodotto" data-equalizer-watch>
    <div class="row large-12 prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                    <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                    <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="breadcrumbs_name" ></a></li>
                    <li><a href='{{ url("gestione-colture/".$categoria."/".$prodotto."/".$id) }}' id="breadcrumbs_coltura"></a></li>
                    <li class="disabled">Modifica avversità</li>
                </ul>
            </nav>
        </div>
    </div>
    @include('layout.menu-colture')

    <div class="expanded row">
        <div class="medium-12 large-12 columns"><div id="error"></div></div>
    </div>

    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
      <div class="row">
        <div class="medium-12 large-12 columns">
            <div class="scheda-nuovo-prodotto">
                <form class="prodotto-nuova-avversita" method="post">
                    <div class="riga-avversita">
                        <div class="riga-nuova-avversita" id="riga-0">
                            <div id="concatena-avversita-0"></div>
                            <div class="row">
                                <div class="large-12 columns" id="datafor"></div>
                            </div>
                            <div id="concatena-dosi-0"></div>
                            <div class="row">
                                <div class="large-12 columns" id="dataforDosi"></div>
                            </div>
                        </div>
                    </div>

                    <div class="large-12 columns">
                        <input type="hidden" name="idcoltura" value="<?php echo $idavversita ?>" id="idcoltura">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                        <a href='{{ url("gestione-colture/".$categoria."/".$prodotto."/".$id) }}' class="pulsante-annulla">ANNULLA</a>
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
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request){
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        async:false,
        success: function (result){
            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $("#breadcrumbs_name").append(result.data.name);

            var colture= result.data.colture;
            var RigaAvversita= '';
            var NameAvversita = new Array();
            var array_dosi = new Array();
            var array_impiego = new Array();

            $.each(colture, function(index, value){
                var avversita = value.avversita;

                $.each(avversita, function(index_avversita, value_avversita){
                    if(value_avversita.id == idavversita){
                        $("#breadcrumbs_coltura").append('Coltura: ' + trim(value.name));
                        NameAvversita = value_avversita.name
                        $.each(value_avversita.dosi, function(index_dosi, value_dosi){ array_dosi.push(value_dosi.name); });
                        $.each(value_avversita.impieghi, function(index_impieghi, value_impieghi){ array_impiego.push(value_impieghi.name); });
                    }
                });
            });

            var resAvv = NameAvversita.split(",");
            var SelectAvversita = '';
            var int=0;
            var intDosi=0;
            var intImpiego=0;
            var arrayAssociativo = new Array();
            var IdAvversita = '';

            while(int <= (resAvv.length - 1)){
                var IdAvversita = '';
                var AvvName = resAvv[int].trim();
                var resAvvName = AvvName.split('(');
                var AvvNameSim = resAvvName[0].trim();
				var AvvNameLat = resAvvName[1].trim();
				AvvNameLat = AvvNameLat.slice(0, -1);

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

                            var myObj;
                            myObj = { "id" : value.id };
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
                                            if(value.description == AvvNameSim && value.name == AvvNameLat){
                                                IdAvversita = value.id;
                                            }
                                        });
                                    },
                                    error: function (request, status, errorThrown){}
                                });
                        });

                    },
                    error: function (request, status, errorThrown) {}
                });

                SelectAvversita = SelectAvversita + '<div class="row" id="avversita-0-' + int + '"><div class="large-3 columns"><label>Categoria di avversità<select name="scelta-coltura-avversita-0-' + int + '" class="scelta-coltura-avversita-0-' + int + '"><option value="">Scegli</option></select></label></div><div class="large-3 columns end"><label>Avversità<select name="ProdAvversita-0-' + int + '" class="ProdAvversita-0-' + int + '"><option value="0">Cancella</option><option value="' + IdAvversita + '" selected>' + AvvName + '</option></select></label></div></div>';

                int++;
            }

            $("#concatena-avversita-0").append(SelectAvversita);
            $("#datafor").append('<div data-for="avversita-0-' + (int - 1) + '" class="add-riga-avversita more">+</div><span id="label-id-avversita">Aggiungi avversità</span>');

            if(array_dosi.length >= array_impiego.length){
                while(intDosi <= (array_dosi.length - 1)){
                    arrayAssociativo[intDosi] = new Array(array_dosi[intDosi],array_impiego[intDosi]);
                    intDosi++
                }
            }else{
                while(intImpiego <= (array_impiego.length - 1)){
                    arrayAssociativo[intImpiego] = new Array(array_dosi[intImpiego],array_impiego[intImpiego]);
                    intImpiego++
                }
            }

            var Selectimpieghi = '';
            var SelectDosi = '';
            var xDosi = 0;

            for(var i = 0; i < arrayAssociativo.length; i++) {
                var cube = arrayAssociativo[i];
                Selectimpieghi = Selectimpieghi + '<div class="row" id="dosi-0-' + i + '">';

                for(var j=0; j<cube.length;j++){

                    if(cube[j] === undefined || cube[j] === null){
                        var text = '';
                    }else{
                        var text = cube[j];
                    }

                    if(j == 0){
                        SelectDosi = SelectDosi + '<div class="large-6 columns end"><label>Dosi<textarea name="dosi-0-' + i + '" class="dosi dosi-0-' + i + '">' + text + '</textarea></label></div>';
                    }else{
                        SelectDosi = SelectDosi + '<div class="large-6 columns end"><label>Modalità d\'impiego<textarea name="impiego-0-' + i + '" class="impiego impiego-0-' + i + '">' + text + '</textarea></label></div>';
                    }
                    Selectimpieghi = Selectimpieghi + SelectDosi;
                    SelectDosi = '';
                }

                Selectimpieghi =  Selectimpieghi + '</div>';
                xDosi++
            }
            $("#concatena-dosi-0").append(Selectimpieghi);
            $("#dataforDosi").append('<div data-for="dosi-0-' + (xDosi - 1) + '" class="add-riga-dosi more">+</div><span id="label-id-avversita">Aggiungi campi Dose/Impiego</span>');
        },
        error: function (request, status, errorThrown){}
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
            $("select[class^='scelta-coltura-avversita-']").append(categoria);
        },
        error: function (request, status, errorThrown) {}
    });

    $("select[class^='scelta-coltura-avversita-']").on('change', function(){

            var colturaid = this.value;
            var str = $(this).attr("class");
            var res = str.split("-");
            var avversita = '';

            $("select.ProdAvversita-" + res[3] + '-' + res[4]).html('<option value="">Scegli</option>');

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
                    $.each(result.data, function(index, value){ avversita = avversita + '<option value="' + value.id + '" >' + value.description + ' (' + value.name + ')</option>' });
                    $("select.ProdAvversita-" + res[3] + '-' + res[4]).append(avversita);
                },
                error: function (request, status, errorThrown){}
            });
        });

    var header_count_avversita = 1;
    var line_count_avversita = 1;
    var colture = '';

    $(document).on('click', 'div.add-riga-dosi', function(){

        var riga = $(this).attr("data-for");
        var res = riga.split("-");
        var num= Number(res[2]) + 1;

        $('div#riga-' + res[1] + ' .add-riga-dosi').attr('data-for','dosi-' + res[1] + '-' + num + '');

        $('div#concatena-dosi-' + res[1]).append('<div class="row" id="dosi-' + res[1] + '-' + num + '"><div class="large-6 columns end"><label>Dosi<textarea name="dosi-' + res[1] + '-' + num + '" class="dosi dosi-' + res[1] + '-' + num + '"></textarea></label></div><div class="large-6 columns end"><label>Modalità d\'impiego<textarea name="impiego-' + res[1] + '-' + num + '" class="impiego impiego-' + res[1] + '-' + num + '"></textarea></label></div></div>');
    });

    $(document).on('click', 'div.add-riga-avversita', function(){

        var riga = $(this).attr("data-for");
        var res = riga.split("-");
        var num= Number(res[2]) + 1;

        $('div#riga-' + res[1] + ' .add-riga-avversita').attr('data-for','avversita-' + res[1] + '-' + num + '');

        $('div#concatena-avversita-' + res[1]).append('<div class="row" id="avversita-' + res[1] + '-' + num + '"><div class="large-3 columns"><label>Categoria di avversità<select name="scelta-coltura-avversita-' + res[1] + '-' + num + '" class="scelta-coltura-avversita-' + res[1] + '-' + num + '"><option value="">Scegli</option></select></label></div><div class="large-3 columns end"><label>Avversità<select name="ProdAvversita-' + res[1] + '-' + num + '" class="ProdAvversita-' + res[1] + '-' + num + '"><option value="">Scegli</option></select></label></div></div>');

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
            error: function (request, status, errorThrown){}
        });

        $("select[class^='scelta-coltura-avversita']").on('change', function() {

            var colturaid = this.value;
            var str = $(this).attr("class");
            var resColtura = str.split("-");
            var avversita = '';

            $("select.ProdAvversita-" + resColtura[3] + '-' + resColtura[4]).html('<option value="">Scegli</option>');

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
                    $.each(result.data, function(index, value){ avversita = avversita + '<option value="' + value.id + '" >' + value.description + ' (' + value.name + ')</option>' });
                    $("select.ProdAvversita-" + resColtura[3] + '-' + resColtura[4]).append(avversita);
                },
                error: function (request, status, errorThrown){}
            });
        });
        line_count_avversita++;
    });

    $(document).on('submit', '.prodotto-nuova-avversita', function(e) {
       e.preventDefault();

        var NumeroRigheColture=$("div[id^='riga-']").last().attr("id");
        var resRigheColture = NumeroRigheColture.split("-");
        NumeroRigheColture = resRigheColture[1];

        var elementodicoltura = $('input[name="idcoltura"]').val();
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
                if(avversita != 0){ arrayAvversita = arrayAvversita + '{ "ID" : "' + avversita + '" },'; }
                intAvversita++;
            }

            while(intDosi <= NumeroDosi){
                var dosi=$('textarea[name^="dosi-' + i + '-' + intDosi + '"]').val();
				dosi = dosi.replace(/[\n\r]/g, "\\n");
                if(dosi != ''){ arrayDosi = arrayDosi + '{ "name" : "' + dosi + '", "ordine" : ' + i + '},'; }
                intDosi++;
            }

            while(intImpiego <= NumeroImpiego){
                var impiego=$('textarea[name^="impiego-' + i + '-' + intImpiego + '"]').val();
				impiego = impiego.replace(/[\n\r]/g, "\\n");
                if(impiego != ''){ arrayImpiego = arrayImpiego + '{ "name" : "' + impiego + '", "ordine" : ' + i + '},'; }
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

            myObj = { "id" : elementodicoltura , "ordine": 1, "avversita" : { "id" : elementodicoltura }, "avversita" : objAvversita, "dosi" : objDosi, "impieghi" : objImpiego };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/ElementiDiAvversita/Update",
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
