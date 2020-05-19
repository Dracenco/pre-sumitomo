<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
<script>
    var id = '<?php echo $id ?>';
    var idArea = '<?php echo $idZona ?>';
</script>
@extends('layout.header-site')
@section('title', 'Rete vendita - Modifica zona')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Rete vendita - Modifica zona</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="logo-prodotto">
                    <div id="error" style="margin: 30px 0 0 15px; float: left; font-size: 16px;width:300px">
                    <?php
                    if(isset($_GET['ok']))
                        echo "Operazione eseguita";
                    elseif(isset($_GET['no']))
                        echo "Impossibile eseguire l'operazione";
                    ?>
                    </div> 
                </div>
                <div id="pulsanti-prodotto" style="width:650px">
                    <div class="button-group" id="menu-pulsanti-prodotto">
                        <a href="<?php echo url('sito/gestione-zona/'.$id); ?>" class="button">GESTIONE ZONA</a>  
                        <a href="<?php echo url('sito/rete-vendita'); ?>" class="button">AGENTI</a>                        
                        <a href="<?php echo url('sito/area-vendita'); ?>" class="button">GESTIONE AREE</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Modifica zona</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto">
                 <form class="UpdateZona" method="post">
                     <div class="row">
                        <div class="large-6 columns end">
                            <label>Responsabile zona</label>
                            <select name="capo_area" id="capo_area" style="width:250px"><option value="">Scegli</option></select>
                         </div>
                     </div>
                     <div id="agentiZone"></div>
                     <div class="large-12 columns">
                         <input type="hidden" name="idArea" id="idArea" value="<?php echo $idZona ?>">
                         <input type="hidden" name="idZona" id="idZona" value="<?php echo $id ?>">
                         <input type="submit" name="SALVA" value="SALVA" class="float-right">
                         <a href="" class="pulsante-annulla">ANNULLA</a>
                     </div>
                 </form>
               </div>
            </div>
        </div>


        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Zone</h2></div></div>
        </div>

        <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="row collapse" style="border:0;">
                    <div class="medium-12 large-12 columns">
                        <table id="elenco-codici" style="background: #bdbdbd;">
                            <thead>
                                <tr >
                                    <th></th>
                                    <th>RESPONSABILE DI ZONA</th>
                                    <th>REGIONE</th>
                                    <th>PROVINCE</th>
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetZona?IdZona=" + id,
        async:false,
        success: function (result){
            var descrizione = result.data.description;
            var idManagerZona = result.data.idManagerZona;
            
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
                    if(value.id == idManagerZona){ select_string = 'selected="selected"'; }
                       
                    elencoAgenti = elencoAgenti + '<option value="' + value.id + '" ' + select_string + '>' + value.name + ' ' + value.surname + '</option>';
                    i++;
                });
                $("#capo_area").append(elencoAgenti);
                },
                error: function (request, status, errorThrown){}
            });

            var i=1;
            var stringForm = '';
            var ZoneAgente = '';
            var ProvAgente = '';

            if ( typeof(descrizione) !== "undefined" && descrizione !== null ){ regione = descrizione.split("#"); 

            for (var x = 1; x < regione.length; x++) {
                stringForm = stringForm + '<div class="row"><div class="large-12 columns"><label>Riga ' + x + '</label></div></div>';
                provincia = regione[x].split("@");

                ProvAgente = provincia[0];
                ZoneAgente = provincia[1];

                if ( typeof(ProvAgente) == "undefined" && ProvAgente == null ){ ProvAgente = '';}                    
                if ( typeof(ZoneAgente) == "undefined" && ZoneAgente == null ){ ZoneAgente = '';}   
                    
                stringForm = stringForm + '<div class="row"><div class="large-6 columns"><label>Regione</label><input type="text" name="regione' + x + '" id="regione' + x + '" value="' + ProvAgente + '"></div><div class="large-6 columns"><label>Province</label><input type="text" name="province' + x + '" id="province' + x + '" value="' + ZoneAgente + '"></div></div>';
            }
			}else{
				
                     stringForm = stringForm + '<div class="row"><div class="large-12 columns"><label>Riga 1</label></div> </div>  <div class="row"><div class="large-6 columns"><label>Regione</label><input type="text" name="regione1" id="regione1"></div><div class="large-6 columns"><label>Province</label><input type="text" name="province1" id="province1"></div></div><div class="row"><div class="large-12 columns"><label>Riga 2</label></div></div><div class="row"> <div class="large-6 columns"><label>Regione</label><input type="text" name="regione2" id="regione2"></div><div class="large-6 columns"><label>Province</label><input type="text" name="province2" id="province2"></div></div><div class="row"><div class="large-12 columns"><label>Riga 3</label></div> </div> <div class="row"><div class="large-6 columns"><label>Regione</label><input type="text" name="regione3" id="regione3"></div> <div class="large-6 columns"><label>Province</label><input type="text" name="province3" id="province3"></div></div><div class="row"><div class="large-12 columns"><label>Riga 4</label></div></div><div class="row"><div class="large-6 columns"> <label>Regione</label><input type="text" name="regione4" id="regione4"></div><div class="large-6 columns"> <label>Province</label><input type="text" name="province4" id="province4"></div></div><div class="row"><div class="large-12 columns"><label>Riga 5</label></div></div><div class="row"><div class="large-6 columns"><label>Regione</label><input type="text" name="regione5" id="regione5"></div><div class="large-6 columns"><label>Province</label><input type="text" name="province5" id="province5"></div></div>';
			}
			
            $("#agentiZone").append(stringForm);

        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetAllAgente",
        success: function (result){
            var elencoAgenti = '';
            var i=1;
            var select_string = '';

            $.each(result.data, function(index, value){                        
                elencoAgenti = elencoAgenti + '<option value="' + value.id + '">' + value.name + ' ' + value.surname + '</option>';
                i++;
            });

            $("#capo_area").append(elencoAgenti);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.UpdateZona', function(e) {
        e.preventDefault();
        
        var capo_areaId = $('#capo_area').val(); 
        var idArea = $('#idArea').val();
        var idZona = $('#idZona').val();
		var regione = '';
        var riga1 = '#';
        var riga2 = '#';
        var riga3 = '#';
        var riga4 = '#';
        var riga5 = '#';

        if($(this).find('input#regione1').val() != ''){
            riga1 = riga1 + $(this).find('input#regione1').val();
        }

        if($(this).find('input#province1').val() != ''){
            riga1 = riga1 + '@' + $(this).find('input#province1').val();
        }

        if($(this).find('input#regione2').val() != ''){
            riga2 = riga2 + $(this).find('input#regione2').val();
        }

        if($(this).find('input#province2').val() != ''){
            riga2 = riga2 + '@' + $(this).find('input#province2').val();
        }

        if($(this).find('input#regione3').val() != ''){
            riga3 = riga3 + $(this).find('input#regione3').val();
        }

        if($(this).find('input#province3').val() != ''){
            riga3 = riga3 + '@' + $(this).find('input#province3').val();
        }
        
        if($(this).find('input#regione4').val() != ''){
            riga4 = riga4 + $(this).find('input#regione4').val();
        }

        if($(this).find('input#province4').val() != ''){
            riga4 = riga4 + '@' + $(this).find('input#province4').val();
        }
       
        if($(this).find('input#regione5').val() != ''){
            riga5 = riga5 + $(this).find('input#regione5').val();
        }

        if($(this).find('input#province5').val() != ''){
            riga5 = riga5 + '@' + $(this).find('input#province5').val();
        }

        var descrizioneZona = riga1 + riga2 + riga3 + riga4 + riga5;

        post_data='{ "id" : "' + idZona + '", "idArea" : "' + idArea + '", "idManagerZona" : "' + capo_areaId + '", "Description" : "' + descrizioneZona + '"}';

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
                request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateZona",
                contentType: true,
                processData: false,
                async:false,
                data: post_data,
                success: function(data){
                    $("#error").html();
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire una nuova zona: ' + data.errors);
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }else{
                        $("#error").html('Zona correttamente inserita');
                        $('#elenco-codici tbody').html('');
                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Site/GetAllZona?IdArea=" + idArea,        
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

                                    if ( typeof(desc) !== "undefined" && desc !== null ){ regione = desc.split("#"); 

                                    for (a in regione ) {                
                                        if(regione[a] != ''){
                                            provincia = regione[a].split("@");
                                            provDett = provincia[1];
                                            if ( typeof(provDett) == "undefined" && provDett == null ){ provDett = '';}
                                            ProvAgente = ProvAgente + provDett + '<br>';
                                            ZoneAgente = ZoneAgente + provincia[0] + '<br>'; 
                                        }
                                    }
                                    }else{
										
									
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

                                    elencoZone= elencoZone + '<tr><td><div class="modifica-coltura"><a href="{!! url("sito/modifica-zona/' + value.id + '/' + idArea + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + i + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + i + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-zona"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + responsabileZona + '</td><td>' + ZoneAgente + '</td><td>' + ProvAgente + '</td><td>';
                                    
                                    i++;
                                });
                                
                                $('#elenco-codici tbody').append(elencoZone).foundation();
                            
                            },
                            error: function (request, status, errorThrown){}
                        });
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        
                    }
                },
                error: function (request, status, errorThrown) {}
            });
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetAllZona?IdArea=" + idArea,        
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

            if ( typeof(desc) !== "undefined" && desc !== null ){ regione = desc.split("#"); 

            for (a in regione ) {                
                if(regione[a] != ''){
                    provincia = regione[a].split("@");
                    provDett = provincia[1];
                    if ( typeof(provDett) == "undefined" && provDett == null ){ provDett = '';}
                    ProvAgente = ProvAgente + provDett + '<br>';
                    ZoneAgente = ZoneAgente + provincia[0] + '<br>'; 
                }
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

            elencoZone= elencoZone + '<tr><td><div class="modifica-coltura"><a href="{!! url("sito/modifica-zona/' + value.id + '/' + idArea + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + i + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + i + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-zona"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + responsabileZona + '</td><td>' + ZoneAgente + '</td><td>' + ProvAgente + '</td><td>';
              
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
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetAllZona?IdArea=" + idArea,        
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

                            if ( typeof(desc) !== "undefined" && desc !== null ){ regione = desc.split("#"); 

                            for (a in regione ) {                
                                if(regione[a] != ''){
                                    provincia = regione[a].split("@");
                                    provDett = provincia[1];
                                    if ( typeof(provDett) == "undefined" && provDett == null ){ provDett = '';}
                                    ProvAgente = ProvAgente + provDett + '<br>';
                                    ZoneAgente = ZoneAgente + provincia[0] + '<br>'; 
                                }
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

                            elencoZone= elencoZone + '<tr><td><div class="modifica-coltura"><a href="{!! url("sito/modifica-zona/' + value.id + '/' + idArea + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + i + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + i + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-zona"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + responsabileZona + '</td><td>' + ZoneAgente + '</td><td>' + ProvAgente + '</td><td>';
                            
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