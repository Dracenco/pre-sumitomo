<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
    var modificaColtura = "<?php echo $cat.'/'.$prodotto.'/'.$id ?>";
</script>

@extends('layout.header')
@section('title', 'Colture')

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
                        <li class="disabled">Colture</li>
                    </ul>
                </nav>
            </div>
        </div>

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
         @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
         <div class="expanded row">
             <div class="medium-12 large-12 columns">

                <div class="contenitore-tab-scheda-prodotto">
                    <ul class="accordion" data-accordion>
                        <li class="accordion-item is-active" data-accordion-item>
                            <a href="#" class="accordion-title">Colture</a>
                            <div class="accordion-content" data-tab-content>
                               <div class="contenitore-info" style="padding:0;">
                                    <ul class="accordion">
                                        <li class="accordion-item is-active" role="presentation" data-accordion-item>
                                            <div class="accordion-content" data-tab-content aria-hidden="true"><div class="accordion_colture"></div></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
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
        success: function (result){
            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $("#breadcrumbs_nome_prodotto").append(result.data.name);

            var avvertenzeArray = new Array();
            var colture= result.data.colture;
            var i=30;

            $.each(colture, function(index, value){
                var phi=value.tempoDiCarenza;

                colture= '<div class="accordion-section"><div class="operazioni-coltura"><div class="modifica-coltura"><a href="{!! url("modifica-coltura/' + modificaColtura + '/' + value.id + '") !!}"><img src="{{ URL::asset('img/matita_bianca.png') }}" class="matita"></a></div><div class="duplica-coltura"><a href="{!! url("duplica-coltura/' + modificaColtura + '/' + value.id + '") !!}"><img src="{{ URL::asset('img/duplica.png') }}" class="matita"></a></div><div class="elimina-coltura"><button class="button" type="button" data-toggle="elimina-coltura' + i + '"><img src="{{ URL::asset('img/cestino_bianco.png') }}"></button><div class="dropdown-pane" id="elimina-coltura' + i + '" data-dropdown > <div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="elimina-coltura-conferma"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></div><a class="accordion-section-title" href="#accordion-' + i +'">' + value.name + '</a><div id="accordion-' + i +'" class="accordion-section-content"><div class="riga_intestazione_avversita"><div class="intestazione_tempo_carenza">Intervallo di sicurezza</div><div class="intestazione_avversita_controllate">Avversit&agrave; controllata</div><div class="intestazione_dosi">Dosi</div><div class="intestazione_impiego">Modalit&agrave; d\'impiego</div></div>';

                colture = colture + '<div class="contenitore_avversita"><div class="tempo_carenza">' + phi + '</div>';

                avvertenzeArray = value.avversita;

                $.each(avvertenzeArray, function(index_avversita, value_avversita){
                    var i = 0;
                    var array_dosi = new Array();
                    var array_impiego = new Array();

                    $.each(value_avversita.dosi, function(index_dosi, value_dosi){
						var dosiLine= (value_dosi.name).replace(/\n/g, "<br />");
                        array_dosi.push(dosiLine);
                    });

                    $.each(value_avversita.impieghi, function(index_impieghi, value_impieghi){
                         var impieghiLine= (value_impieghi.name).replace(/\n/g, "<br />");
                         array_impiego.push(impieghiLine);
                    });

                    colture = colture + '<div class="contenitore_avversita_controllata">';

                    var arrAvversita = value_avversita.name;
                    var arrAvversitaId = value_avversita.id;
                    var arrDosi = array_dosi[i];
                    var arrImpiego = array_impiego[i];

                    if(typeof arrAvversita !== 'undefined' && arrAvversita.length > 0) {
                        if(arrAvversita != ''){
                            colture = colture + '<div class="avversita_controllate"><div class="operazioni-avversita"><div class="modifica-coltura"><a href="{!! url("modifica-avversita/' + modificaColtura + '/' + value.id + '/' + arrAvversitaId + '") !!}"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-coltura"><button class="button" type="button" data-toggle="elimina-avversita' + arrAvversitaId + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane" id="elimina-avversita' + arrAvversitaId + '" data-dropdown > <div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="elimina-avversita-conferma"><input type="hidden" name="id" value="' + arrAvversitaId + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></div>' + arrAvversita + '</div>';
                        }else{
                            colture = colture + '<div class="avversita_controllate">&nbsp;</div>';
                        }
                    }else{
                        colture = colture + '<div class="avversita_controllate">&nbsp;</div>';
                    }

                    if(typeof arrDosi !== 'undefined' && arrDosi.length > 0) {
                        if(arrDosi != ''){
                            colture = colture + '<div class="colonna_dosi">' + arrDosi + '</div>';
                        }else{
                            colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                        }
                    }else{
                        colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                    }

                    if(typeof arrImpiego !== 'undefined' && arrImpiego.length > 0) {
                        if(arrImpiego != ''){
                            colture = colture + '<div class="colonna_impiego">' + arrImpiego + '</div>';
                        }else{
                            colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                        }
                    }else{
                        colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                    }

                    colture = colture + '</div>';

                    array_dosi.splice(0, 1);
                    array_impiego.splice(0, 1);

                    i = i + 1;

                    if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                        while(array_dosi.length>0){
                            colture = colture + '<div class="contenitore_avversita_controllata"><div class="avversita_controllate">&nbsp;</div>';

                            if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                                if(array_dosi[0] != ''){
                                    colture = colture + '<div class="colonna_dosi">' + array_dosi[0] + '</div>';
                                }else{
                                    colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                                }
                            }else{
                                colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                            }

                            if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                                if(array_impiego[0] != ''){
                                    colture = colture + '<div class="colonna_impiego">' + array_impiego[0] + '</div>';
                                }else{
                                    colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                                }
                            }else{
                                colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                            }

                            colture = colture + '</div>';

                            array_dosi.splice(0, 1);
                            array_impiego.splice(0, 1);
                        }
                    }

                    if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                        while(array_impiego.length > 0){
                            colture = colture + '<div class="contenitore_avversita_controllata"><div class="avversita_controllate">&nbsp;</div>';

                            if(typeof array_dosi !== 'undefined' && array_dosi.length > 0) {
                                if(array_dosi[0] != ''){
                                    colture = colture + '<div class="colonna_dosi">' + array_dosi[0] + '</div>';
                                }else{
                                    colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                                }
                            }else{
                                colture = colture + '<div class="colonna_dosi">&nbsp;</div>';
                            }

                            if(typeof array_impiego !== 'undefined' && array_impiego.length > 0) {
                                if(array_impiego[0] != ''){
                                    colture = colture + '<div class="colonna_impiego">' + array_impiego[0] + '</div>';
                                }else{
                                    colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                                }
                            }else{
                                colture = colture + '<div class="colonna_impiego">&nbsp;</div>';
                            }

                            colture = colture + '</div>';

                            array_dosi.splice(0, 1);
                            array_impiego.splice(0, 1);
                        }
                    }
                });

                colture = colture + '</div></div>';
                $(".accordion_colture").append(colture);
                i++;
            });

            function close_accordion_section() {
                $('.accordion_colture .accordion-section-title').removeClass('active');
                $('.accordion_colture .accordion-section-content').slideUp(300).removeClass('open');
            }

            $('.accordion-section-title').click(function(e) {
                var currentAttrValue = $(this).attr('href');

                if($(e.target).is('.active')) {
                    close_accordion_section();
                }else {
                    close_accordion_section();
                    $(this).addClass('active');
                    $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
                }
                e.preventDefault();
            });

        },
        complete: function (result){ $('.accordion').foundation(); },
        error: function (request, status, errorThrown) {}
    });

    $(document).on('click', '.elimina-coltura-conferma', function(e){
        e.preventDefault();
        var formData = $(this).find('input').attr('name','id').val();
        var url = window.location.href;
        post_data={ 'id' : formData };

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/ElementiDiColtura/Delete",
            data: post_data,
            success: function(data){
                $(".dropdown-pane.is-open").css('visibility', 'hidden');
                url += '?ok';
                window.location.href = url;
            },
            failure: function(errMsg) {
                $(".dropdown-pane.is-open").css('visibility', 'hidden');
                url += '?no';
                window.location.href = url;
            }
        });
    });

   $(document).on('click', '.elimina-avversita-conferma', function(e) {
        e.preventDefault();
        var formData = $(this).find('input').attr('name','id').val();
        var url = window.location.href;
        post_data={ 'id' : formData };

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/ElementiDiAvversita/Delete",
            data: post_data,
            success: function(data){
                $(".dropdown-pane.is-open").css('visibility', 'hidden');
                url += '?ok';
                window.location.href = url;
            },
            failure: function(errMsg) {
                $(".dropdown-pane.is-open").css('visibility', 'hidden');
                url += '?no';
                window.location.href = url;
            }
        });
    });
</script>
@stop
