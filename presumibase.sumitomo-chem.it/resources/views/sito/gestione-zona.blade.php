<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
<script>
    var id = '<?php echo $id ?>';
</script>
@extends('layout.header-site')
@section('title', 'Rete vendita - Responsabili di Zona')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Rete vendita - Responsabili di Zona</li>
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
                
                <div id="pulsanti-prodotto">
                    <div class="button-group" id="menu-pulsanti-prodotto">
                    <a href="<?php echo url('sito/nuova-zona/'.$id); ?>" class="button">NUOVA ZONA</a>  
                        <a href="<?php echo url('sito/rete-vendita'); ?>" class="button">GESTIONE AGENTI</a>
                        <a href="<?php echo url('sito/area-vendita'); ?>" class="button">GESTIONE AREE</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Responsabili di Zona</h2></div></div>
        </div>

        <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="row collapse" style="border:0;">
                    <div class="medium-12 large-12 columns">
                        <table id="elenco-codici" style="background: #bdbdbd;">
                            <thead>
                                <tr >
                                    <th></th>
                                    <th>AGENTE</th>
                                    <th>REGIONE</th>
                                    <th>PROVINCIA</th>
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetAllZona?IdArea=" + id,        
        async:false,
        success: function (result){
            var elencoZone = '';
            var responsabileZona = '';
            var i=1;

            $.each(result.data, function(index, value){

                var idZona = value.idZona; 
                var idManagerZona = value.idManagerZona ;
                var desc = value.description;

                var ZoneAgente = '';
                var ProvAgente = '';
                var temp = new Array();
                var regione = new Array();
                var provDett = '';

                if ( typeof(desc) !== "undefined" && desc !== null ){ regione = desc.split("#"); }

                for (a in regione ) {                
                    if(regione[a] != ''){
                        provincia = regione[a].split("@");
                        provDett = provincia[1];
                        if ( typeof(provDett) == "undefined" && provDett == null ){ provDett = '';}
                        ProvAgente = ProvAgente + provDett + '<br>';
                        ZoneAgente = ZoneAgente + provincia[0] + '<br>'; 
                    }
                }
                
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetAgente?IdAgente=" + idManagerZona,
                    async:false,
                    success: function (result){ responsabileZona = result.data.name+ ' ' + result.data.surname; },
                    error: function (request, status, errorThrown){}
                });
                                
                var regioneZona = '';
                var ProvinciaZona = '';

                elencoZone= elencoZone + '<tr><td><div class="modifica-coltura"><a href="{!! url("sito/modifica-zona/' + value.id + '/' + id + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + i + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + i + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-zona"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + responsabileZona + '</td><td>' + ZoneAgente + '</td><td>' + ProvAgente + '</td><td>';
                
                i++;
            });
            
            $('#elenco-codici tbody').append(elencoZone).foundation();
          
        },
        error: function (request, status, errorThrown){}
    });
    
    $(document).on('click', '.cancella-zona', function(e) {
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
            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteZona",
            data: post_data,
            success: function(data){
                $("#error").html('Zona correttamente eliminata');
                $('#elenco-codici tbody').html('');
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {
                        request.setRequestHeader("Authorization", "Bearer " + token );
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetAllZona?IdArea=" + id,        
                    async:false,
                    success: function (result){
                        var elencoZone = '';
                        var responsabileZona = '';
                        var i=1;

                        $.each(result.data, function(index, value){

                            var idZona = value.idZona; 
                            var idManagerZona = value.idManagerZona ;
                            var desc = value.description;

                            var ZoneAgente = '';
                            var ProvAgente = '';
                            var temp = new Array();
                            var regione = new Array();
                            var provDett = '';

                            if ( typeof(desc) !== "undefined" && desc !== null ){ regione = desc.split("#"); }

                            for (a in regione ) {                
                                if(regione[a] != ''){
                                    provincia = regione[a].split("@");
                                    provDett = provincia[1];
                                    if ( typeof(provDett) == "undefined" && provDett == null ){ provDett = '';}
                                    ProvAgente = ProvAgente + provDett + '<br>';
                                    ZoneAgente = ZoneAgente + provincia[0] + '<br>'; 
                                }
                            }
                            
                            $.ajax({
                                type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetAgente?IdAgente=" + idManagerZona,
                                async:false,
                                success: function (result){ responsabileZona = result.data.name+ ' ' + result.data.surname; },
                                error: function (request, status, errorThrown){}
                            });
                                            
                            var regioneZona = '';
                            var ProvinciaZona = '';

                            elencoZone= elencoZone + '<tr><td><div class="modifica-coltura"><a href="{!! url("sito/modifica-zona/' + value.id + '/' + id + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + i + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + i + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-zona"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + responsabileZona + '</td><td>' + ZoneAgente + '</td><td>' + ProvAgente + '</td><td>';
                            
                            i++;
                        });
                        
                        $('#elenco-codici tbody').append(elencoZone).foundation();
                    
                    },
                    error: function (request, status, errorThrown){}
                });
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            failure: function(errMsg) {
                $("#error").html('Impossibile eliminare la zona');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
        });
    });

</script>
@stop