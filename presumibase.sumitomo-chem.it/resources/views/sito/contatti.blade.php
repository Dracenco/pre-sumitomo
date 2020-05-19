<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Contatti ricevuti')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Contatti</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="pulsanti-prodotto">
                    <div class="button-group" id="menu-pulsanti-prodotto">
                      <form class="scarica" method="post">
                        <input type="submit" name="SCARICA" value="SCARICA" class="float-right button">
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error_sito"></div>
            </div>
        </div>

        <!---->
         <div class="expanded row">
             <div class="medium-12 large-12 columns">
                <div class="contenitore-info" style="padding:0">
                    <div class="expanded row collapse" style="border:0;">
                        <div class="medium-12 large-12 columns">
                            <table id="elenco-codici" class="contatti">
                                <thead>
                                    <tr>
                                        <td>
                                        <div class="elimina-contatto">&nbsp;</div>
                                        <div class="contatto-contatto">CONTATTO</div>
                                        <div class="contatto-email">E-MAIL</div>
                                        <div class="contatto-esplodi">&nbsp;</div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
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

    var stringContatto='';
    var count=1;

	 $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetAllInformazione",
        success: function (result) {
            $.each(result.data, function(index, value){

                if(value.newsletter===true) {
                    var newsletter = 'Si';
                }if(value.newsletter===false) {
                    var newsletter = 'No';
                }

                stringContatto = stringContatto + '<tr><td><div class="elimina-contatto"><div class="elimina-codice"><button class="button" type="button" data-toggle="elimina-codice' + count + '"><img src="{{ URL::asset('img/cestino_nero.png') }}"></button><div class="dropdown-pane float-right" id="elimina-codice' + count + '" data-dropdown ><div class="row"><div class="large-12 columns">Confermi l\'eliminazione?</div></div><div class="row"><div class="large-12 columns"><form class="cancella-codice"><input type="hidden" name="id" value="' + value.id + '"><input type="submit" name="OK" value="OK" ></form></div></div></div></div></div><div class="contatto-contatto">' + value.name + '</div><div "contatto-email">' + value.email + '</div><div class="open_freccia_storico contatto-esplodi-img"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></div></td></tr><tr class="riga-contatto" id="open-storico-' + count + '"><td><div class="row"><div class="medium-4 large-4 columns"><span>Professione:&nbsp;</span>' + value.professione.description + '</div><div class="medium-4 large-4 columns"><span>Provincia:&nbsp;</span>' + value.provincia + '</div><div class="medium-4 large-4 columns"><span>Telefono:&nbsp;</span>' + value.phoneNumber + '</div></div><div class="row"><div class="medium-7 large-7 columns"><span>Coltura:&nbsp;</span>' + value.coltura + '</div><div class="medium-5 large-5 columns"><span>Newsletter:&nbsp;</span>' + newsletter + '</div></div><div class="row"><div class="medium-12 large-12 columns"><span>Messaggio:&nbsp;</span><br>' + value.message + '</div></div></td></td></tr>';

                count++;

            });
            $('#elenco-codici tbody').append(stringContatto).foundation();

        },
        error: function (request, status, errorThrown){}
    });

    $(".contatti").on("click", "a[class^='open-storico-']", function(event) {
        event.preventDefault();

        var nameclass = $(this).attr("class");

        if($("tbody tr#" + nameclass ).is(':visible')){
            $("tbody tr").removeAttr("style");
        }else{
            $("tbody tr#" + nameclass ).css('display','table-row');
            $("tbody tr").not("#" + nameclass ).css('display','');
        }
    });

    $(document).on('submit', '.scarica', function(e) {
       e.preventDefault();

       $("#error").html('Report in elaborazione. Al termine verrà scaricato automaticamente. ');
       $("html, body").animate({ scrollTop: 0 }, "slow");

       downloadFile("{{ config('constants.UrlWebService') }}api/Download/DownloadAllInformazioniCSV", { 'Authorization': 'Bearer ' + token }, "RichiestaInformazioni.csv");
    });
</script>
@stop
