<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Rete vendita')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Rete vendita</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">              
                <div id="error" style="margin: 30px 0 0 15px; float: left; font-size: 18px;">
                <?php
                  if(isset($_GET['ok']))
                      echo "Operazione eseguita";
                  elseif(isset($_GET['no']))
                      echo "Impossibile eseguire l'operazione";
                ?>
                </div>              
                
                <div id="pulsanti-prodotto">
                    <div class="button-group" id="menu-pulsanti-prodotto">                                    
                        <a href="<?php echo url('sito/nuova-area-vendita'); ?>" class="button">NUOVA AREA</a>
                        <a href="<?php echo url('sito/rete-vendita'); ?>" class="button">GESTIONE AGENTI</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Aree</h2></div></div>
        </div>

        <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="row collapse" style="border:0;">
                    <div class="medium-12 large-12 columns">
                        <table id="elenco-codici" style="background: #bdbdbd;">
                            <thead>
                                <tr >
                                    <th></th>
                                    <th>AZIENDA</th>
                                    <th>AREA</th>
                                    <th>CAPO AREA</th>
                                    <th>ZONE</th>
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
    var utente='';

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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetAllArea",
        async:false,
        success: function (result){
          var elencoZone = '';
          var i=1;
          var azienda = '';

          $.each(result.data, function(index, value){
              if(value.idSocieta == 1){
                azienda = 'Sumitomo Chemical Italia'
              }
              if(value.idSocieta == 2){
                azienda = 'Siapa'
              }

              var capoarea = '';
               $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetAgente?IdAgente=" + value.idAreaManager,
                    async:false,
                    success: function (result){
                        capoarea = result.data.name+ ' ' + result.data.surname;
                    },
                    error: function (request, status, errorThrown){}
                });

              elencoZone= elencoZone + '<tr><td><div class="modifica-coltura"><a href="{!! url("sito/modifica-area/' + value.id + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + i + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + i + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-area"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + azienda + '</td><td>' + value.descriptionArea + '</td><td>' + capoarea + '</td><td><a href="{!! url("sito/gestione-zona/' + value.id + '") !!}" style="text-align:center;height: 30px;width: 185px; line-height: 29px; font-size: 12px; font-weight: 700; margin-left: 0px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px;border-radius: 4px; background-color: #424242; color: #FFFFFF;">GESTIONE ZONE</a></td><td>';
                           
              i++;
          });
          $('#elenco-codici tbody').append(elencoZone).foundation();
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('click', '.cancella-area', function(e) {
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
            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteArea",
            data: post_data,
            success: function(data){
                url += '?ok';
                window.location.href = url;
            },
            failure: function(errMsg) {
                url += '?no';
                window.location.href = url;
            }
        });
    });
</script>
@stop
