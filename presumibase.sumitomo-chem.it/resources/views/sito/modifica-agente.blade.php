<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');

?>
<script>
    var id = '<?php echo $id ?>';
</script>
@extends('layout.header-site')
@section('title', 'Modifica agente')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Modifica agente</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">              
                <div id="error" style="margin: 30px 0 0 15px; float: left; font-size: 18px;"></div>     
                <div id="pulsanti-prodotto" style="width:500px">
                    <div class="button-group" id="menu-pulsanti-prodotto">
                        <a href="<?php echo url('sito/rete-vendita'); ?>" class="button">AGENTI</a>
                        <a href="<?php echo url('sito/nuovo-agente'); ?>" class="button">NUOVO AGENTE</a>
                    </div>
                </div>
            </div>
        </div>

        <!---->
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Modifica agente</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto">
                 <form class="modificaAgente" method="post">
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Nome</label><br><input type="text" name="nome_agente" id="nome_agente">
                         </div>
                         <div class="large-6 columns">
                             <label>Cognome</label><br><input type="text" name="cognome_agente" id="cognome_agente">
                         </div>
                     </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Telefono</label><br><input type="text" name="telefono_agente" id="telefono_agente">
                         </div>
                         <div class="large-6 columns">
                             <label>Email</label><br><input type="text" name="email_agente" id="email_agente">
                         </div>
                     </div>
                     <div class="large-12 columns">
                         <input type="hidden" name="id" id="idAgente" value="<?php echo $id ?>">
                         <input type="submit" name="SALVA" value="SALVA" class="float-right">
                         <a href="" class="pulsante-annulla">ANNULLA</a>
                     </div>
                 </form>
               </div>
            </div>
        </div>

        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Agenti</h2></div></div>
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
                                    <th>EMAIL</th>
                                    <th>TELEFONO</th>
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetAgente?IdAgente=" + id,
        async:false,
        success: function (result){
            $('#nome_agente').val(result.data.name);
            $('#cognome_agente').val(result.data.surname);
            $('#telefono_agente').val(result.data.phoneNumber);
            $('#email_agente').val(result.data.email);
        },
        error: function (request, status, errorThrown){}
    });


    $(document).on('submit', '.modificaAgente', function(e) {
        e.preventDefault();
        var nome = $('#nome_agente').val();
        var cognome = $('#cognome_agente').val();
        var telefono = $('#telefono_agente').val();
        var email = $('#email_agente').val();
        var id = $('#idAgente').val();

        post_data={ "ID" : id ,"Name" :  nome , "Surname":  cognome , "PhoneNumber" :  telefono , "Email" :  email };
        var myJSON = JSON.stringify(post_data);
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
              request.setRequestHeader("Authorization", "Bearer " + token );
              request.setRequestHeader("lang", "it");
              request.setRequestHeader("Content-Type", "application/json")
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateAgente",
            contentType: true,
            processData: false,
            async:false,
            data: myJSON,
            success: function(data){
                $("#error").html();
                if(data.returnCode == '-1'){
                    $("#error").html('Impossibile aggiornare i dati: ' + data.errors);
                }else{
                    $("#error").html('Agente correttamente aggiornato');

                    $('#elenco-codici tbody').html('');

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

                            $.each(result.data, function(index, value){

                                var name = ''; 
                                var surname = '' ;
                                var email =  '';
                                var phoneNumber = '';

                                if ( typeof(value.name) !== "undefined" && value.name !== null ) { name = value.name; }
                                if ( typeof(value.surname) !== "undefined" && value.surname !== null ) { surname = value.surname; }
                                if ( typeof(value.email) !== "undefined" && value.email !== null ) { email = value.email; }
                                if ( typeof(value.phoneNumber) !== "undefined" && value.phoneNumber !== null ) { phoneNumber = value.phoneNumber; }
                                                
                                elencoAgenti= elencoAgenti + '<tr><td><div class="modifica-coltura"><a href="{!! url("sito/modifica-agente/' + value.id + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + i + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + i + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-agente"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + name + ' ' + surname + '</td><td>' + email + '</td><td>' + phoneNumber + '</td><td>';
                                
                                i++;
                            });
                            
                            $('#elenco-codici tbody').append(elencoAgenti).foundation();
                            
                            },
                            error: function (request, status, errorThrown){}
                        });
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
        url: "{{ config('constants.UrlWebService') }}api/Site/GetAllAgente",
        async:false,
        success: function (result){
          var elencoAgenti = '';
          var i=1;

          $.each(result.data, function(index, value){

            var name = ''; 
            var surname = '' ;
            var email =  '';
            var phoneNumber = '';

            if ( typeof(value.name) !== "undefined" && value.name !== null ) { name = value.name; }
            if ( typeof(value.surname) !== "undefined" && value.surname !== null ) { surname = value.surname; }
            if ( typeof(value.email) !== "undefined" && value.email !== null ) { email = value.email; }
            if ( typeof(value.phoneNumber) !== "undefined" && value.phoneNumber !== null ) { phoneNumber = value.phoneNumber; }
                            
            elencoAgenti= elencoAgenti + '<tr><td><div class="modifica-coltura"><a href="{!! url("sito/modifica-agente/' + value.id + '") !!}" style="margin-left:0;"><img src="{{ URL::asset('img/matita_nera.png') }}" class="matita"></a></div><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + i + '" style="margin: 7px 0 0 10px;"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + i + '" data-dropdown><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-agente"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></td><td>' + name + ' ' + surname + '</td><td>' + email + '</td><td>' + phoneNumber + '</td><td>';
              
            i++;
          });
          
          $('#elenco-codici tbody').append(elencoAgenti).foundation();
          
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('click', '.cancella-agente', function(e) {
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
            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteAgente",
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
