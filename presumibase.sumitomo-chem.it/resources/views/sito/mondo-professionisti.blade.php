<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Notizie mondo Sumitomo')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Notizie mondo Sumitomo</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error_sito"></div>
            </div>
        </div>

        <!---->
        <div class="expanded row">
            <div class="large-3 columns"><div class="titolo_sezione"><h2>Notizie mondo Sumitomo</h2></div></div>
            <div class="large-9 columns">
              <div id="pulsanti-prodotto">
              <div class="button-group" id="menu-pulsanti-prodotto" style="width:1010px">
                  <a href="<?php echo url('sito/notizie'); ?>" class="float-right button">NUOVA NOTIZIA</a>
                  <a href="<?php echo url('sito/mondo-agricoltura'); ?>" class="float-right button">MONDO AGRICOLTURA</a>
                  <a href="<?php echo url('sito/mondo-sumitomo'); ?>" class="float-right button">MONDO SUMITOMO CHEMICAL</a>
                  <a href="<?php echo url('sito/mondo-professionisti'); ?>" class="float-right button">MONDO PROFESSIONISTI</a>
                  <a href="<?php echo url('sito/notizie-csr'); ?>" class="float-right button">CSR</a>
            </div>
              </div>
            </div>
        </div>

        <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="row collapse" style="border:0;">
                    <div class="medium-12 large-12 columns">
                        <table id="elenco-codici" class="tabella-notizie" style="background: #bdbdbd;">
                            <thead>
                                <tr >
                                    <th style="width: 100px;float: left;">&nbsp;</th>
                                    <th style="float: left;">Titolo</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>

        <!---->

      </section>

@endsection

@section('script')
<script type="text/javascript">
    var utente = '';
    var Notizia = '';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Users/GetUserInfo",
        async:false,
        success: function (result) {
            utente=result.firstName + ' ' + result.lastName;
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=18",
        async:false,
        success: function (resultsSection){
            $.each(resultsSection.data, function(index, value){
              Notizia = Notizia + '<tr><td style="width: 100px;float: left;"><div class="modifica-coltura"><a href="{!! url("sito/modifica-notizia/' + value.id + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + value.id + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + value.id + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-notizia"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td style="float: left;padding: 16px 0 0 0;">' + value.name + '</td><td>';                                         
            });              
            $('.tabella-notizie tbody').append(Notizia).foundation();           
        }
    });

    var NotiziaUpdate = '';

    $(document).on('click', '.cancella-notizia', function(e) {
        e.preventDefault();
        var formData = $(this).find('input').attr('name','id').val();
        var SchedeDifesaSumitomoDelete = '';
        $(".tabella-notizie tbody").empty();

        post_data={ 'id' : formData };

        $.ajax({
            type: "GET",
              beforeSend: function (request) {
              request.setRequestHeader("Authorization", "Bearer " + token );
              request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoTestiSezione?IdSezione=" + formData,
            async:false,
            success: function (resultsSection){
                $.each(resultsSection.data, function(index, valueX){
                  post_dataX={ 'id' : valueX.id };
                  $.ajax({
                      type: "POST",
                      beforeSend: function (request) {
                          request.setRequestHeader("Authorization", "Bearer " + token );
                          request.setRequestHeader("lang", "it");
                      },
                      url: "{{ config('constants.UrlWebService') }}api/Site/DeleteTestoSezione",
                      async:false,
                      data: post_dataX,
                      success: function(data){},
                      failure: function(errMsg){}
                  }); 
                });                           
            }
        });
        
        

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteSezione",
            data: post_data,
            async:false,
            success: function(data){                
                $("#error_sito").html("Notiza correttamente eliminata");
                var NotiziaUpdate = '';
                $.ajax({
                    type: "GET",
                        beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=18",
                    
                    success: function (resultsSection){
                        $.each(resultsSection.data, function(index, value){
                          NotiziaUpdate = NotiziaUpdate + '<tr><td style="width: 100px;float: left;"><div class="modifica-coltura"><a href="{!! url("sito/modifica-notizia/' + value.id + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + value.id + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + value.id + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-notizia"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td style="float: left;padding: 16px 0 0 0;">' + value.name + '</td><td>';                                         
                        });              
                        $('.tabella-notizie tbody').append(NotiziaUpdate).foundation();           
                    }
                });
            },
            failure: function(errMsg) {
                $("#error_sito").html("Impossibile eliminare la notizia");
            }
        });
    });

</script>
@stop
