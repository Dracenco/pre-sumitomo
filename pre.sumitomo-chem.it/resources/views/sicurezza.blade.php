@extends('layout.container')

@section('title', 'Sicurezza - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="In questa pagina si forniscono indicazioni e suggerimenti d'uso per l'impiego dei prodotti agrofarmaci. ">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image"></div>
            <div class="item-content">
                <h1 class="item-title" id="sicurezza_titolo"></h1>
                <p class="item-text" id="sicurezza_sottotitolo"></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')    
        <section class="full-box_wrap">
          <div class="full-box fit">
            <div class="content">
              <div>
                <div>
                  <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <h2 class="section-title">SCHEDE DI SICUREZZA ETICHETTE MINISTERIALI</h2>
                  </header>
                  <div class="text-box">
                    <p>Consulta e scarica i documenti relativi ai prodotti utilizzati.</p>
                    <a href="<?php echo url('schede-sicurezza'); ?>" class="button">Vai</a>
                  </div>
                </div>
              </div>
             
              <div class="image-box">
                <img src="{{ asset('images/sum_webIST_600x520_antiveleni.jpg') }}" alt="">
                <div>
                  <header>
                    <h2 class="section-title">CENTRI ANTIVELENI</h2>
                  </header>
                  <div class="text-box">
                    <p>Consulta le principali strutture antiveleno presenti in Italia, operative 24 ore su 24, in caso di intossicazione o avvelenamento.</p>
                    <a href="<?php echo url('centri-antiveleni'); ?>" class="button">Vedi tutti</a>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </section>

        <section class="full-box_wrap">
          <div class="full-box fit">
            <div class="content">
              <div class="image-box">
                <img src="{{ asset('images/sum_webIST_600x520_adr-csr.jpg') }}" alt="">
                <div>
                  <div>
                    <header>
                      <h2 class="section-title inner-title">NORME ADR</h2>
                    </header>
                    <div class="text-box">
                      <p>Il trasporto su strada di merci pericolose.<br>Scarica le tabelle ADR relative a classe, gruppo di imballaggio e numero ONU.</p>
                      <ul class="list reset-list list-icon-group">
                        <li id="ModuloAdr"></li>
                      </ul>
                    </div>
                  </div>
                  
                  <div style="float:left">
                    <header>
                      <h2 class="section-title inner-title">CLASSIFICAZIONE CLP</h2>
                    </header>
                    <div class="text-box">
                      <p>Pittogrammi, frasi H e classi di pericolo. Consulta le tabelle relative ai pericoli fisici e alle loro avvertenze.</p>
                      <ul class="list reset-list list-icon-group">
                        <li id="ModuloClp"></li>
                      </ul>
                    </div>
                  </div>
                  
                </div>
              </div>
             
              <div>
                <div>
                  <header>
                    <h2 class="section-title">UTILIZZO DEGLI AGROFARMACI E DEI DPI</h2>
                  </header>
                  <div class="text-box">
                    <p>Consulta il manuale, redatto da Agrofarma, strumento utile e semplice per tutti gli utilizzatori di agrofarmaci affinchè la manipolazione e l’impiego di questi prodotti, in tutte le fasi, sia sicuro per l’operatore.</p>
                    <ul class="list reset-list check-list">
                      <li>
                        <span>Misure preventive</span>
                      </li>
                      <li>
                        <span>Preparazione della miscela</span>
                      </li>
                      <li>
                        <span>Applicazione degli agrofarmaci</span>
                      </li>
                      <li>
                        <span>Cosa fare dopo l'applicazione</span>
                      </li>
                    </ul>

                    <ul class="list reset-list list-icon-group">
                      <li id="ModuloDpi"></li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>

        <section class="full-box_wrap">
          <div class="full-box toggle-panel">

            <section class="row">
              <header class="small-12 medium-5">
                <h2 class="section-title text-left">SEGNALAZIONI DI VIOLAZIONE ALL'ORGANISMO DI VIGILANZA</h2>
              </header>
              <div class="small-12 medium-6 columns">
                <article>
                  <header>
                    <h3>Cos'è?</h3>
                  </header>
                  <p>Attraverso il sistema di segnalazione è possibile, ai dipendenti ed ai terzi, segnalare problematiche relative al mancato rispetto di quanto prescritto nel Modello Organizzativo, o nelle procedure aziendali adottate da Sumitomo. Il conferimento dei suoi dati è facoltativo, tuttavia la segnalazione in forma anonima potrà rendere meno efficace l'accertamento dei fatti e l'eventuale raccolta di informazioni aggiuntive. Le ricordiamo che la segnalazione verrà ricevuta dai soli componenti dell'Organismo di Vigilanza che si obbliga a tutelare il segnalante contro ogni forma di ritorsione, dimiscriminazione o penalizzazione, nel rispetto della legge e dei diritti delle persone accusate erroneamente o in mala fede.</p>
                </article>
              </div>
              <div class="small-12 medium-6 columns">
                <article>
                  <header>
                    <h3>Cosa comunicare?</h3>
                  </header>
                  <p>Alcuni esempi, non esaustivi, di possibili segnalazioni comprendono:</p>
                  <ul class="list reset-list check-list">
                    <li>
                      <span>situazioni di conflitto di interesse ritenute non conosciute dall'azienda;</span>
                    </li>
                    <li>
                      <span>atti di corruzione di terzi verso dipendenti o da parte di questi ultimi verso terzi;</span>
                    </li>
                    <li>
                      <span>frodi;</span>
                    </li>
                    <li>
                      <span>utilizzo improprio dei beni aziendali;</span>
                    </li>
                    <li>
                      <span>intenzionale comunicazione di informazioni false a Pubbliche Amministrazioni.</span>
                    </li>
                  </ul>
                  <p class="small-text"><em>Non verranno prese in considerazione segnalazioni vaghe, poco circostanziate, oppure che in maniera evidente risultino effettuate in malafede o abbiano contenuto calunnioso o diffamatorio.</em></p>
                </article>
              </div>
            </section>

            <section class="toggle-content row" id="toggle-content" data-toggler=".opened">
              <div class="btn_wrap text-right">
                <div class="columns">
                  <a href="javascript:;" role="button" class="open-btn" aria-label="Apri" data-toggle="toggle-content">segnala</a>
                </div>
              </div>

              <button class="close-btn" aria-label="Chiudi" type="button" data-toggle="toggle-content">
                <span aria-hidden="true">&times;</span>
              </button>

              <div class="small-12 medium-6 columns">
                <article>
                  <header>
                    <h3>Cosa comunicare?</h3>
                  </header>
                  <p>Le segnalazioni possono essere inviate compilando il modulo adiacente o via cartacea al seguente indirizzo:</p>
                  <p>
                    <strong>Sumitomo Chemical Italia S.r.l.</strong>
                    <br>
                    <strong>Via Caldera 21 - 20153 Milano</strong>
                    <br>
                    Oppure indirizzate alla Email <strong>odv@sumitomo-chem.it</strong>
                  </p>
                </article>
              </div>
              <div class="small-12 medium-6 columns">
                <section class="contact-us-section">
                  <div id="error_frodi"></div><div id="success_frodi"></div>
                  <form class="frodi" method="post">
				    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input type="text" placeholder="Nome e cognome*" name="nome_frodi" id="nome_frodi" >
                    <input type="email" placeholder="e-mail*" name="email_frodi" id="email_frodi" >
                    <input type="tel" placeholder="telefono" name="telefono_frodi" id="telefono_frodi" >
                    <textarea placeholder="Messaggio*" name="messaggio_frodi" id="messaggio_frodi" ></textarea>
                    <label class="checkbox" for="privacy_frodi" tabindex="0">
                      <input type="checkbox" class="form-control" name="privacy_frodi" id="privacy_frodi" value="false">
                      <span class="footer-text-size" id="informativa_frodi">Ai sensi dell'art. 6 co. 1 del Regolamento (UE) sulla Protezione dei Dati personali 2016/679 e del D.lgs. 196/2003, non è necessario il Suo consenso al trattamento dei dati da Lei conferiti, che saranno utilizzati solo per dare riscontro alla sua richiesta.</span>
                    </label>
                    <input type="submit" class="button btn-sumitomo" value="Invia" name="invia" />
                  </form>
                </section>
              </div>
            </section>

          </div>
        </section>

    @include('layout.rete-vendita') 
    @include('layout.disclaimer')    
@endsection

@section('script')
<script type="text/javascript">      
    
    $("form.frodi").submit(function(e) {
        e.preventDefault();
            
        var validazionecampi = true;
        var error ='I seguenti campi sono obbligatori:<br>';
        var nome_frodi='';
        var email_frodi='';
        var telefono_frodi='';
        var messaggio_frodi='';
        var privacy_frodi=false;
        var token = '';
		
        nome_frodi = escapeHTML($('#nome_frodi').val());
        email_frodi = escapeHTML($('#email_frodi').val());
        telefono_frodi = escapeHTML($('#telefono_frodi').val());
        messaggio_frodi = escapeHTML($('#messaggio_frodi').val());
        token = escapeHTML($('[name="_token"]').val());
        
		  if(nome_frodi==''){
            $("#nome_frodi").css("border","1px solid #e4352c");
            validazionecampi = false;
            error = error + "Nome e cognome<br>";
        }else{
            $("#nome_frodi").removeAttr("style");            
        }
        
        if(email_frodi==''){
            $("#email_frodi").css("border","1px solid #e4352c");
            validazionecampi = false;
            error = error + "E-mail<br>";
        }else{
            $("#email_frodi").removeAttr("style");            
        }
        
        if(messaggio_frodi==''){
            $("#messaggio_frodi").css("border","1px solid #e4352c");
            validazionecampi = false;
            error = error + "Messaggio<br>";
        }else{
            $("#messaggio_frodi").removeAttr("style");            
        }
        
        if($("input:checkbox[name=privacy_frodi]:checked").is(':checked')){
            privacy_frodi = "true";
            $("#informativa_frodi").removeAttr("style");  
        }else{
            privacy_frodi = "false";
            error = error + "Informativa trattativa dati personali<br>";
            $("#informativa_frodi").css("color","#e4352c");
        }
                                                     
        if(validazionecampi){
            
            var myObj = { "Name": nome_frodi, "PhoneNumber": telefono_frodi, "Message": messaggio_frodi, "Email": email_frodi} 
			      var myObjEmail = {_token:token, nome_frodi:nome_frodi, telefono_frodi: telefono_frodi, messaggio_frodi: messaggio_frodi, email_frodi: email_frodi};   
            var myJSON = JSON.stringify(myObj);  
            
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("lang", "it");    
                    request.setRequestHeader("Content-Type", "application/json")    
                }, 
                url: UrlWebService + "api/Site/CreateSegnalazione",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){                  
                    if(data.returnCode == '-1'){
                        $("#error_frodi").html('Impossibile inviare la segnalazione');
                    }else{
                                               
                        $.ajax({
                            type: "GET",
                            url: 'sendFrode',
                            data: myObjEmail,
							              dataType: 'json',
							
							success: function(data){
								var result = data.message;
								if(result == "Request completed"){
									$("#error_frodi").html('');
									$(".frodi").css('display','none');
									$("#success_frodi").html('Messaggio correttamente inviato.<br> Risponderemo il prima possibile.<br><br>Cordiali saluti<br>Sumitomo Chemical Italia');
								}else{
									$("#error_frodi").html('Impossibile inviare il messaggio.');
								}
							},
							error: function(){
								$("#error_frodi").html('Impossibile inviare il messaggio.');
							}
                        });  
                    }
                },
                 error: function (request, status, errorThrown) {}                             
            });        
        }else{
            $("#error_frodi").html(error);
        }     
        
    });


    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=5",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                if(value.id == 47){ $("#sicurezza_titolo").html(value.description); }
                if(value.id == 48){ $("#sicurezza_sottotitolo").html(value.description); }
            });
        }
    });

    var fielIdImg1 = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=47",      
        async:false,
        success: function (result){
                        if(result != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
                $(".item-image").append("<img src='" + src1 + "' alt='Sumitomo Chemical Italia - Sicurezza'/>");
            }
           // $.each(result.data, function(index, value){           
         //       fielIdImg1 = value.id; 
       //     });

        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
            beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=49",
        async:false,
        success: function (results){
                    $("#ModuloAdr").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + results + '" target="_blank"><span class="icon-download"></span><span>Scarica il pdf</span></a>'); 
            // $.each(results.data, function(index, value){               
             //   if(value.idSezione == 49){ 
            //    }
    
        },
        
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=50",
        async:false,
        success: function (results){
                    $("#ModuloClp").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + results + '" target="_blank"><span class="icon-download"></span><span>Scarica il pdf</span></a>'); 
          //  $.each(results.data, function(index, value){               
            //    if(value.idSezione == 50){ 
              //  }
        //    });
        },
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=51",
        async:false,
        success: function (results){
                    $("#ModuloDpi").html('<a href="{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=' + results + '" target="_blank"><span class="icon-download"></span><span>Scarica il manuale</span></a>'); 
         //   $.each(results.data, function(index, value){               
         //       if(value.idSezione == 51){ 
        //        }
          //  });
        },
    });


    
</script>
@stop