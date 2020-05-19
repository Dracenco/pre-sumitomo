<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
<script>
    var id = '<?php echo $id ?>';
</script>
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

        <!---->

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
                <div id="pulsanti-prodotto"  style="width:500px">
                    <div class="button-group" id="menu-pulsanti-prodotto">
                        <a href="<?php echo url('sito/rete-vendita'); ?>" class="button">AREE</a>
                        <a href="<?php echo url('sito/nuova-area-vendita'); ?>" class="button">NUOVA AREA</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Modifica Area</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto">
                 <form class="modificaArea" method="post">
                     <div class="row">
                         <div class="large-6 columns">
                           <label>Azienda</label><br>
                           <select name="azienda" id="azienda" style="width:250px"><option value="">Scegli</option></select>
                         </div>
                         <div class="large-6 columns">
                            <label>Capo area</label><br>
                            <select name="capo_area" id="capo_area" style="width:250px"><option value="">Scegli</option></select>
                         </div>
                     </div>
                     <div class="row">
                         <div class="large-12 columns">
                             <label>Descrizione</label><br><textarea name="descrizione" id="descrizione"></textarea>
                         </div>                         
                     </div>
                     <div class="large-12 columns">
                         <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                         <input type="submit" name="SALVA" value="SALVA" class="float-right">
                         <a href="" class="pulsante-annulla">ANNULLA</a>
                     </div>
                 </form>
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetArea?IdArea=" + id,
        async:false,
        success: function (result){
            var idSocieta = result.data.idSocieta;
            var idAreaManager = result.data.idAreaManager;

            $('#descrizione').val(result.data.descriptionArea);

            var SelectAzienda = '<option value="1" ';
            if(idSocieta == 1){ SelectAzienda = SelectAzienda + 'selected="selected"'; }

            SelectAzienda = SelectAzienda +  '>Sumitomo Chemical Italia</option><option value="2"';

            if(idSocieta == 2){ SelectAzienda = SelectAzienda +  'selected="selected"'; }

            SelectAzienda = SelectAzienda +  '>Siapa</option>';

            $("#azienda").append(SelectAzienda);
            
            $.ajax({
                type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/GetAllAgente",
                async:false,
                success: function (result){
                var elencoAgenti = '';
                var i=1;
                var select_string = '';

                $.each(result.data, function(index, value){
                    select_string = '';
                    if(value.id == idAreaManager){ select_string = 'selected="selected"'; }
                       
                    elencoAgenti = elencoAgenti + '<option value="' + value.id + '" ' + select_string + '>' + value.name + ' ' + value.surname + '</option>';
                    i++;
                });
                $("#capo_area").append(elencoAgenti);
                },
                error: function (request, status, errorThrown){}
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

    $(document).on('submit', '.modificaArea', function(e) {
        e.preventDefault();
        var aziendaIdModifica = $('#azienda').val();
        var capo_areaIdModifica = $('#capo_area').val();
        var descrizioneModifica = $('#descrizione').val();
        var idModifica = $('#id').val();
        
        post_data={ "ID" : idModifica ,"DescriptionArea" :  descrizioneModifica , "IdSocieta":  aziendaIdModifica , "IdAreaManager" :  capo_areaIdModifica };
        var myJSON = JSON.stringify(post_data);
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
              request.setRequestHeader("Authorization", "Bearer " + token );
              request.setRequestHeader("lang", "it");
              request.setRequestHeader("Content-Type", "application/json")
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateArea",
            contentType: true,
            processData: false,
            async:false,
            data: myJSON,
            success: function(data){
                $("#error").html();
                if(data.returnCode == '-1'){
                    $("#error").html('Impossibile aggiornare i dati: ' + data.errors);
                }else{
                    $("#error").html('Area correttamente aggiornata');

                    $('#elenco-codici tbody').html('');

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
                }
            },
             error: function (request, status, errorThrown) {}
        });
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
