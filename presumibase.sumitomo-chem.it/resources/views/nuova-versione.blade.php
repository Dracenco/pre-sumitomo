<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php echo isset($cat) ? $cat : '';?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php echo isset($prodotto) ? $prodotto : '';?>";
    var idprodotto="<?php echo isset($idprodotto) ? $idprodotto : '';?>";
    var id_codice="<?php echo isset($id) ? $id : '';?>";
    var versione_codice = "<?php echo isset($version) ? $version : '';?>";

    var lcode = "<?php echo isset($lcode) ? $lcode : '';?>";
    var companyId = "<?php echo isset($companyId) ? $companyId : '';?>";
</script>

@extends('layout.header')
@section('title', 'Nuova Versione')
@section('content')
@include('layout.menu')
<section id="content-scheda-prodotto">
    <div class="row prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                    <li><a href='{{ url("prodotti/".$cat) }}' id="breadcrumbs_categoria"></a></li>
                    <li><a href='{{ url("prodotto/".$cat."/".$prodotto."/".$idprodotto) }}' id="nome-prodotto"></a></li>
                    <li><a href='{{ url("codici-prodotto/".$cat."/".$prodotto."/".$idprodotto) }}'>Codici prodotto</a></li>
                    <li class="disabled">Nuova Versione</li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="expanded row">
        <div class="medium-12 large-12 columns">
            <div id="error"></div><div id="error" class="error-logo"></div>
        </div>
    </div>

    @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
     <div class="row">
        <div class="medium-12 large-12 columns">
            <div class="scheda-nuovo-prodotto">
                <form class="nuova_versione" method="post">
                    <div class="row">
                        <div class="large-3 columns">
                            <label>Versione (Suggerita: {{$version + 1}})<sup>&#42;</sup><input type="text" name="version_code" id="version_code"></label>
                        </div>

                        <div class="large-3 columns end">
                            <label>Stato<select name="stato_id" id="stato_id"><option value="">Scegli...</option></select></label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="large-3 columns">
                            <label>Barcode Imballo Secondario<sup>&#42;</sup><input type="text" name="barcode_imballo_secondario" id="barcode_imballo_secondario"></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Data Tracciabilit&agrave;<sup>&#42;</sup><input type="date" name="data_tracciabilita" id="data_tracciabilita"></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Deadline Owner<sup>&#42;</sup><input type="date" name="deadline_owner" id="deadline_owner"></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Deadline Seller<sup>&#42;</sup><input type="date" name="deadline_seller" id="deadline_seller"></label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="large-3 columns">
                            <label>Deadline Use<sup>&#42;</sup><input type="date" name="deadline_use" id="deadline_use"></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Seleziona numero ONU<sup>&#42;</sup><select name="trasportation_code_id" id="trasportation_code_id"><option value="">Scegli...</option></select></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Fornitore<sup>&#42;</sup><select name="provider_id" id="provider_id"><option value="">Scegli...</option></select></label>
                        </div>
                        <?php /*<div class="large-3 columns">
                            <label>Avvertenza<sup>&#42;</sup><select name="advice_clip_id" id="advice_clip_id"><option value="">Scegli...</option></select></label>
                        </div>*/ ?>
                        <div class="large-3 columns">
                            <label>Eco Tassa<sup>&#42;</sup><select name="ecotax_id" id="ecotax_id"><option value="">Scegli...</option></select></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                            <label>Numero ONU ADR<sup>&#42;</sup>
                            <select name="adr_classification_id" id="adr_classification_id"><option value="">Scegli...</option></select></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Gruppo Imballaggio<sup>&#42;</sup><select name="packing_group_id" id="packing_group_id"><option value="">Scegli...</option></select></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Principio attivo
                            <select name="principio_attivo_adr" id="principio_attivo_adr"><option value="">Scegli...</option></select></label>
                        </div>
                        <div class="large-3 columns">
                            <label>Titolare Registrazione<select name="titolare-registrazione" id="titolare-registrazione"><option value="">Scegli...</option></select></label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="medium-12 large-4 columns"><span>Indicazioni di Pericolo</span></div>
                        <div class="large-12 columns">
                            <div class="row large-up-12" id="indicazioni-pericolo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns"><span>Avvertenze</span></div>
                        <div id="avvertenze"></div>
                    </div>
                    <div class="row" id="frasi-h">
                        <div class="large-12 columns"><span>Frasi H</span></div>
                    </div>
                    <div class="row" id="classificazione-seveso">
                        <div class="large-12 columns"><span>Classificazione Seveso</span></div>
                    </div>
                    

                    <div class="large-12 columns">
                        <input type="hidden" class="createdDate" id="createdDate">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                        <a href="" class="pulsante-annulla">ANNULLA</a>
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

    var CSevesoCLP = new Array();
    var CSevesoCLPArray = new Array();
    var indicazioniPericoloFrasiH = new Array();
    var checkFrasiH = '';
    var checkFrasiHArray = new Array();
    var indicazioniPericoloCLP = new Array();
    var pittogrammiClp = '';
    var adviceClp = new Array();

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        async:false,
        success: function (result){

            //var CSevesoCLP = new Array();
            //var CSevesoCLPArray = new Array();
            $.each(result.data.adrTrasporto.classificazioniSeveso, function(index, value){ 
                CSevesoCLP.push(value.id); 
            });

            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=classificazione_seveso&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(CSevesoCLP.indexOf(value.value) != -1){ select_string = 'checked="checked"'; }
                        CSevesoCLPArray.push('<div class="riga-frasi-h"><input type="checkbox" name="seveso" ' + select_string + ' value="' + value.value + '"><span>' + value.name + '</span></div>');
                    });

                    var lenghtCSevesoCLPArray = CSevesoCLPArray.length;
                    var colonneCSevesoCLPArray = '';
                    var i = 1;

                    lenghtCSevesoCLPArray = parseInt((lenghtCSevesoCLPArray/4) + 1);

                    $.each(CSevesoCLPArray, function(index, value){
                        if(i==1){ colonneCSevesoCLPArray = colonneCSevesoCLPArray + '<div class="large-3 columns">'; }

                        colonneCSevesoCLPArray = colonneCSevesoCLPArray + value ;

                        i = i + 1;
                        if(i>lenghtCSevesoCLPArray){
                            colonneCSevesoCLPArray = colonneCSevesoCLPArray + '</div>';
                            i=1;
                        }
                    });
                    $("div#classificazione-seveso").append(colonneCSevesoCLPArray);
                },
                error: function (request, status, errorThrown){}
            });


            //var indicazioniPericoloFrasiH = new Array();
            $.each(result.data.regulatory.frasiH, function(index, value){ 
                indicazioniPericoloFrasiH.push(value.name); 
            });

            //var checkFrasiH = '';
            //var checkFrasiHArray = new Array();
            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=hazard_code_clp&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(indicazioniPericoloFrasiH.indexOf(value.name) != -1){ select_string = 'checked="checked"'; };
                        checkFrasiHArray.push('<div class="riga-frasi-h"><input type="checkbox" name="frasiH" ' + select_string + ' value="' + value.value + '" ><span>' + value.name + '</span></div>');
                    });

                    var lenghtFrasiH = checkFrasiHArray.length;
                    var colonneFrasiH = '';
                    var i = 1;

                    lenghtFrasiH = parseInt((lenghtFrasiH/4) + 1);

                    $.each(checkFrasiHArray, function(index, value){
                        if(i==1){ colonneFrasiH = colonneFrasiH + '<div class="large-3 columns">'; }

                        colonneFrasiH = colonneFrasiH + value ;

                        i = i + 1;
                        if(i>lenghtFrasiH){
                            colonneFrasiH = colonneFrasiH + '</div>';
                            i=1;
                        }
                    });
                    $("div#frasi-h").append(colonneFrasiH);
                },
                error: function (request, status, errorThrown){}
            });


            //var indicazioniPericoloCLP = new Array();
            $.each(result.data.regulatory.indicazioniPericoloCLP, function(index, value){
                if(value.name!='NO'){ indicazioniPericoloCLP.push(value.name); }
            });

            var img='';
            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=pictogram_hazard_clp&all=false",
                success: function (result) {
                    $.each(result.data, function(index, value){

                        if(!(value.name == "NO" || value.name == "NESSUNO")){
                            select_string = '';
                            if(indicazioniPericoloCLP.indexOf(value.name) != -1){ select_string = 'checked="checked"'; }
                            img = "src='{{ url('/') }}/img/ind_pericolo_clp/" + value.name + ".png'";
                            pittogrammiClp = pittogrammiClp + "<div class='column column-block end'><img " + img + "class='thumbnail'><span>" + value.name + "</span><div class='check-loghi-bio' id='" + value.name + "'><input type='checkbox' name='pittogrammi' value='" + value.value + "' " + select_string + "></div></div>";
                        }
                    });
                    $("div#indicazioni-pericolo").append(pittogrammiClp);
                },
                error: function (request, status, errorThrown){}
            });

            //var adviceClp = new Array();
            $.each(result.data.regulatory.adviceClp, function(index, value){ 
                adviceClp.push(value); 
            });

            var avvertenze='';
            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllAdviceClp",
                success: function (result) {
                    $.each(result.data, function(index, value){
                        select_string = '';
                        if(adviceClp.indexOf(value.id) != -1){ select_string = 'checked="checked"'; }
                        avvertenze = avvertenze + '<div class="large-3 columns"><input type="radio" name="Pericolo" ' + select_string + ' value="' + value.id + '"><span>' + value.name + '</span></div>';
                    });
                    $("div#avvertenze").append(avvertenze);
                },
                error: function (request, status, errorThrown){}
            });

        },
        error: function(request, status, errorThrown){
            console.log('callback error');
        }
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        async:false,
        success: function (result) {
            $.each(result.data, function(index, value){
                var categoria_attiva='';

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
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        success: function (result){
            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' /> <br />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $("a#nome-prodotto").append(result.data.name);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
        success: function (result) {
            $.each(result.data, function(index, value){ 
                $('#provider_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                $('#titolare-registrazione').append('<option value="'+value.id+'">'+value.name+' - '+value.description+'</option>');
            });
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllTransportationCode",
        success: function (result) {
            $.each(result.data, function(index, value){ 
                $('#trasportation_code_id').append('<option value="'+value.id+'">'+value.name+'</option>'); 
            });
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=status&all=false",
        success: function (result) {
            $.each(result.data, function(index, value){ 
                $('#stato_id').append('<option value="'+value.value+'">'+value.name+'</option>'); 
            });
        },
        error: function (request, status, errorThrown){}
    });

    /*$.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllAdviceClp",
        success: function (result) {
            $.each(result.data, function(index, value){ 
                $('#advice_clip_id').append('<option value="'+value.id+'">'+value.name+'</option>'); 
            });
        },
        error: function (request, status, errorThrown){}
    });*/

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPackingGroup",
        success: function (result) {
            $.each(result.data, function(index, value){ 
                $('#packing_group_id').append('<option value="'+value.id+'">'+value.name+'</option>'); 
            });
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllEtax",
        success: function (result) {
            $.each(result.data, function(index, value){ 
                $('#ecotax_id').append('<option value="'+value.id+'">'+value.name+'</option>'); 
            });
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllADRClassification",
        success: function (result) {
            $.each(result.data, function(index, value){ 
                $('#adr_classification_id').append('<option value="'+value.id+'">'+value.name+'</option>'); 
            });
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPrincipioAttivo",
        success: function (result) {
            $.each(result.data, function(index, value){ 
                $('#principio_attivo_adr').append('<option value="'+value.id+'">'+value.name+'</option>'); 
            });
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetCodiceDetail?lcode=" +  lcode + "&companyId=" +  companyId + "&version=" + versione_codice,
        success: function (results){
            console.log(results);

            var data_version = results.data.productStato.version;
            $('#barcode_imballo_secondario').val(data_version.barcodeImballoSecondario);

            if(data_version.dataTracciabilita != '0001-01-01T00:00:00'){
                $('#data_tracciabilita').val(data_version.dataTracciabilita.substring(0,10));
            }
            if(data_version.deadlineOwner != '0001-01-01T00:00:00'){
                $('#deadline_owner').val(data_version.deadlineOwner.substring(0,10));
            }
            if(data_version.deadlineSeller != '0001-01-01T00:00:00'){
                $('#deadline_seller').val(data_version.deadlineSeller.substring(0,10));
            }
            if(data_version.deadlineUse != '0001-01-01T00:00:00'){
                $('#deadline_use').val(data_version.deadlineUse.substring(0,10));
            }

            //$('#advice_clip_id').val(results.data.productStato.version.adviceClipID);
            $('input[name="Pericolo"][value="'+data_version.adviceClipID+'"]').prop('checked', true);
            $.each(data_version.indicazioniPericoloCLP, function(index, value) {
                $('input[name="pittogrammi"][value="'+value.id+'"]').prop('checked', true);
            });
            $.each(data_version.frasiH, function(index, value) {
                $('input[name="frasiH"][value="'+value.id+'"]').prop('checked', true);
            });
            $.each(data_version.classificazioniSeveso, function(index, value) {
                $('input[name="seveso"][value="'+value.id+'"]').prop('checked', true);
            });

            if(data_version.trasportationCodeID > 0) {
                $('#trasportation_code_id').val(data_version.trasportationCodeID);
            }
            if(data_version.providerId > 0) {
                $('#provider_id').val(data_version.providerId);
            }
            if(data_version.ecoTaxID > 0) {
                $('#ecotax_id').val(data_version.ecoTaxID);
            }
            if(data_version.aDrclassificationID > 0) {
                $('#adr_classification_id').val(data_version.aDrclassificationID);
            }
            if(data_version.packingGroupID > 0) {
                $('#packing_group_id').val(data_version.packingGroupID);
            }
            if(data_version.principioAttivoAdr > 0) {
                $('#principio_attivo_adr').val(data_version.principioAttivoAdr);
            }
            if(data_version.trademarkID > 0) {
                $('#titolare-registrazione').val(data_version.trademarkID);
            }
            //hidden
            $('#trademarkid').val(data_version.trademarkID);
            $('#stato_id').val(data_version.statusID);
        },
        error: function(request, status, errorThrown) {
            console.log('callback error');
        }
    });

    $(document).on('submit', '.nuova_versione', function(e) {
        e.preventDefault();
        var frasi_h = Array();
        $.each($('input[name="frasiH"]:checked'), function(index, value) {
            var obj = {
                'id': $(value).val()
            };
            frasi_h.push(obj);
        });
        var classificazione_seveso = Array();
        $.each($('input[name="seveso"]:checked'), function(index, value) {
            var obj = {
                'id': $(value).val()
            };
            classificazione_seveso.push(obj);
        });
        var indicazioni_pericolo_clp = Array();
        $.each($('input[name="pittogrammi"]:checked'), function(index, value) {
            var obj = {
                'id': $(value).val()
            };
            indicazioni_pericolo_clp.push(obj);
        });
        var indicazioni_pericolo_dpd = Array();
        $.each($('input[name="Pericolo"]:checked'), function(index, value) {
            var obj = {
                'id': $(value).val()
            }
            indicazioni_pericolo_dpd.push(obj);
        });
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
               request.setRequestHeader("Authorization", "Bearer " + token );
               request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Products/CreateCodeVersion",
            dataType: "json",
            data: {
                'id': id_codice,
                'version': $('#version_code').val(),
                'BarcodeImballoSecondario': $('#barcode_imballo_secondario').val(),
                'DataTracciabilita': $('#data_tracciabilita').val()+'T00:00:00',
                'DeadlineOwner': $('#deadline_owner').val()+'T00:00:00',
                'DeadlineSeller': $('#deadline_seller').val()+'T00:00:00',
                'DeadlineUse': $('#deadline_use').val(),
                'TrasportationCodeID': $('#trasportation_code_id').val(),
                'ProviderId': $('#provider_id').val(),
                'AdviceClipID': $('input[name="Pericolo"]:checked').val(),//$('#advice_clip_id').val(),
                'EcoTaxID': $('#ecotax_id').val(),
                'ADrclassificationID': $('#adr_classification_id').val(),
                'PackingGroupID': $('#packing_group_id').val(),
                'PrincipioAttivoAdr': $('#principio_attivo_adr').val(),
                'CreatedBy': utente,
                'TrademarkID': $('#titolare-registrazione').val(),
                'StatusID': $('#stato_id').val(),
                'ClassificazioniSeveso': classificazione_seveso,
                'FrasiH': frasi_h,
                'FrasiR': Array(),
                'IndicazioniPericoloCLP': indicazioni_pericolo_clp,
                'IndicazioniPericoloDPD': indicazioni_pericolo_dpd
            },
            success: function (result) {
               if(result.returnCode != 0 ){ $("#error").html('Impossibile create la nuova versione: ' + result.errors);
               }else{ $("#error").html('Nuova versione correttamente creata'); }
               $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function (request, status, errorThrown) {
               $("#error").html('Impossibile creare nuova versione.');
               $("html, body").animate({ scrollTop: 0 }, "slow");
            }
        });
    });
</script>
@stop
