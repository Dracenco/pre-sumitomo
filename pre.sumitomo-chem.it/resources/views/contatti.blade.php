@extends('layout.container')

@section('title', 'Contatti - Sumitomo Chemical Italia')

@section('metatagSeo')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div class="teaser-carousel">
        <div class="item light-color">
            <div class="item-image">
                <img src="{{ asset('images/sum_webIST_2400x640_contatti.jpg') }}" alt="Contatti Sumitomo Chemical Italia">
            </div>
            <div class="item-content">
                <h1 class="item-title">contatti</h1>
                <p class="item-text">Per avere informazioni rapide e precise compilate il modulo sottostante segnalando il problema oppure rivolgetevi direttamente ai nostri esperti.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
    @include('layout.rete-vendita')

        <section class="locations">
          <div class="row">
            <div class="small-12 medium-10 large-7 float-center">
              <h5 class="sumitomo-color text-center">sede amministrativa e legale</h5>
              <div class="row vert-gap">
                <div class="small-12 medium-7 columns">
                  <ul class="list reset-list list-icon-group">
                    <li>
                      <div>
                        <span class="icon-map sumitomo-color"></span>
                        <span>
                          <strong>SUMITOMO CHEMICAL ITALIA S.r.l.</strong>
                          <br>Via Caldera, 21 - 20153 Milano
                        </span>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="small-12 medium-5 columns end">
                  <ul class="list reset-list list-icon-group">
                    <li>
                      <div>
                        <span class="icon-phone"></span>
                        <span>(+39) 02 452801</span>
                      </div>
                      <div>
                        <span class="icon-fax"></span>
                        <span>(+39) 02 45280400</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <ul class="social-share icon-list text-center">
            <li>
                <a href="https://www.facebook.com/sumitomochemicalitalia" class="icon-facebook" target="_blank"></a>
              </li>

              <li><a href="https://twitter.com/sumitomochemit" class="icon-twitter" target="_blank"></a></li>
              
              <li>
                <a href="https://www.youtube.com/channel/UCZbH7EQxBdMIa4NeWcTjj6Q" class="icon-youtube" target="_blank"></a>
              </li>
              <li>
                <a href="https://www.linkedin.com/company/10533416/" class="icon-linkedin" target="_blank"></a>
              </li>
          </ul>
        </section>

        <section class="contact-form">
          <div class="row">
            <div class="small-12 columns">
              <h5 class="text-center">PER ULTERIORI INFORMAZIONI, COMPILARE IL MODULO SOTTOSTANTE</h5>
            </div>
          </div>
          <section class="contact-us-section">
            <div id="error"></div>
            <div id="success"></div>
            <form class="contatti" method="post">
              <div class="row">
                <div class="input-group">
                  <div class="small-12 medium-6 columns">
                    <label for="nome" class="show-for-sr"></label>
                    <input type="text" placeholder="Nome e cognome*" name="nome" id="nome" >
                  </div>
                  <div class="small-12 medium-6 columns">
                    <label for="email" class="show-for-sr"></label>
                    <input type="email" placeholder="e-mail*" name="email" id="email" >
                  </div>
                  <div class="small-12 medium-6 columns">
                    <label for="telefono" class="show-for-sr"></label>
                    <input type="text" placeholder="Telefono" name="telefono" id="telefono" >
                  </div>
                  <div class="small-12 medium-6 columns">
                    <label for="provincia" class="show-for-sr"></label>
                    <input type="text" placeholder="Provincia*" name="provincia" id="provincia" >
                  </div>
                  <div class="small-12 medium-12 columns">
                    <label for="coltura" class="show-for-sr"></label>
                    <input type="text" placeholder="Coltura*" name="coltura" id="coltura" >
                  </div>
                  <div class="small-12 columns">
                    <label for="messaggio" class="show-for-sr"></label>
                    <textarea placeholder="Messaggio*" name="messaggio" id="messaggio" ></textarea>
                  </div>
                </div>
                <div class="small-12 columns">
                  <p class="small-text">* Campi obbligatori</p>
                  <label class="checkbox" for="personalData" tabindex="0">
                    <span class="footer-text-size" id="informativa">Ai sensi dell'art. 6 comma 1 del Regolamento (UE) sulla Protezione dei Dati Personali 2016/679 e del D.lgs. 196/2003, non è necessario il Suo consenso al trattamento dei dati da Lei conferiti e necessari, che saranno utilizzati solo per dare riscontro alla sua richiesta.</span>
                  </label><br>
                  <label class="checkbox" for="promo" tabindex="0">
                    <input type="checkbox" class="form-control" name="promo" id="promo" value="false">
                    <span class="footer-text-size">Presto idoneo, libero e specifico consenso, per la raccolta ed il trattamento dei dati personali ai fini dell'invio da parte della Società, di comunicazioni tecniche, commerciali, promozionali e materiale pubblicitario.</span>
                  </label>
                  
                </div>
              </div>
              <div class="row">
                <div class="text-center float-center">
                  <div class="columns"><br>
				            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input type="submit" class="button btn-sumitomo" value="Invia" name="Invia" />
                    <h6>LEGGI L’INFORMATIVA DI SINTESI PER IL TRATTAMENTO DEI DATI PERSONALI</h6>
                    <a href="<?php echo url('privacy-policy'); ?>" role="button" class="button btn-transparent">Leggi</a>
                  </div>
                </div>
              </div>
            </form>
          </section>
        </section>

        <section class="full-box_wrap vert-gap">
          <div class="full-box toggle-panel">

            <section class="row">
              <header class="small-12 medium-5">
                <h2 class="section-title text-left">SEGNALAZIONI DI VIOLAZIONE ALL’ORGANISMO DI VIGILANZA</h2>
              </header>
              <div class="small-12 medium-6 columns">
                <article>
                  <header>
                    <h3>Cos’è?</h3>
                  </header>
                  <p>Attraverso il sistema di segnalazione è possibile, ai dipendenti ed ai terzi, segnalare problematiche relative al mancato rispetto di quanto prescritto nel Modello Organizzativo, o nelle procedure aziendali adottate da Sumitomo. Il conferimento dei suoi dati è facoltativo, tuttavia la segnalazione in forma anonima potrà rendere meno efficace l'accertamento dei fatti e l'eventuale raccolta di informazioni aggiuntive. Le ricordiamo che la segnalazione verrà ricevuta dai soli componenti dell'Organismo di
Vigilanza che si obbliga a tutelare il segnalante contro ogni forma di ritorsione, discriminazione o penalizzazione, nel rispetto della legge e dei diritti delle persone accusate erroneamente o in mala fede.</p>
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
                    <strong>Sumitomo Chemical Italia S.r.l.<br>Via Caldera 21 - 20153 Milano</strong>
                  </p>
                  <p>
                    <strong>Oppure indirizzare alla E-mail <a href="mailto:odv@sumitomo-chem.it" style="color:#e4352c">odv@sumitomo-chem.it</a></strong>
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

    @include('layout.disclaimer')
@endsection

@section('script')
<script type="text/javascript">
    $("form.contatti").submit(function(e) {
        e.preventDefault();

        var validazionecampi = true;
        var error ='I seguenti campi sono obbligatori:<br>';
        var nome='';
        var email='';
        var telefono='';
        var coltura='';
        var provincia='';
        var professione='1';
        var messaggio='';
        var personalData=true;
        var promo=false;
		    var promomail=false;
        var token ='';

        nome = escapeHTML($('#nome').val());
        email = escapeHTML($('#email').val());
        telefono = escapeHTML($('#telefono').val());
        coltura = escapeHTML($('#coltura').val());
        provincia = escapeHTML($('#provincia').val());
        messaggio = escapeHTML($('#messaggio').val());
        token = escapeHTML($('[name="_token"]').val());

        if($("input:checkbox[name=promo]:checked").is(':checked')){
            promo = "true";
			promomail = "Si";
        }else{
            promo = "false";
			promomail = "No";
        }

        if(nome==''){
            $("#nome").css("border","1px solid #e4352c");
            validazionecampi = false;
            error = error + "Nome e cognome<br>";
        }else{
            $("#nome").removeAttr("style");
        }

        if(email==''){
            $("#email").css("border","1px solid #e4352c");
            validazionecampi = false;
            error = error + "E-mail<br>";
        }else{
            $("#email").removeAttr("style");
        }

        if(provincia==''){
            $("#provincia").css("border","1px solid #e4352c");
            validazionecampi = false;
            error = error + "Provincia<br>";
        }else{
            $("#provincia").removeAttr("style");
        }

        if(coltura==''){
            $("#coltura").css("border","1px solid #e4352c");
            validazionecampi = false;
            error = error + "Coltura<br>";
        }else{
            $("#coltura").removeAttr("style");
        }

        if(messaggio==''){
            $("#messaggio").css("border","1px solid #e4352c");
            validazionecampi = false;
            error = error + "Messaggio<br>";
        }else{
            $("#messaggio").removeAttr("style");
        }

        var myObj = { "Name": nome, "Provincia": provincia, "PhoneNumber": telefono, "Message": messaggio, "Coltura": coltura, "Email": email, "IdProfessione": professione, "Newsletter": promo };
        var myObjEmail = {_token:token, nome:nome, provincia:provincia, telefono: telefono, messaggio: messaggio, coltura: coltura, email: email, professione: professione, promomail: promomail};
        var myJSON = JSON.stringify(myObj);

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: UrlWebService + "api/Site/CreateInformazione",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inviare il messaggio.');
                    }else{

						$.ajax({
                            type: "GET",
                            url: 'sendContatto',
                            data: myObjEmail,
							dataType: 'json',

							success: function(data){
								var result = data.message;
								if(result == "Request completed"){
									$("#error").html('');
									$(".contatti").css('display','none');
									$("#success").html('Messaggio correttamente inviato.<br> Risponderemo il prima possibile.<br><br>Cordiali saluti<br>Sumitomo Chemical Italia');
								}else{
									$("#error").html('Impossibile inviare il messaggio.');
								}
							},
							error: function(){
								$("#error").html('Impossibile inviare il messaggio.');
							}
                        });
                    }
                },
                 error: function (request, status, errorThrown) {}
            });
        }else{
            $("#error").html(error);
        }

    });

    $("form.frodi").submit(function(e) {
        e.preventDefault();

        var validazionecampi = true;
        var error ='I seguenti campi sono obbligatori:<br>';
        var nome_frodi='';
        var email_frodi='';
        var telefono_frodi='';
        var messaggio_frodi='';
        var privacy_frodi=true;
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
</script>
@stop
