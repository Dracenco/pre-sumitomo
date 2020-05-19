     <nav id="menu">
          <ul class="accordion" data-accordion>
              @if ($ruoli['database prodotti'] != 'N')
              <li class="accordion-item @if($route === 'prodotti' || $route === 'elenco-prodotti') is-active @endif" data-accordion-item>
                  <a href="#" class="accordion-title">Prodotti</a>
                  <div class="accordion-content" data-tab-content>
                      <ul class="menu vertical nested"></ul>
                  </div>
              </li>
              @endif
              @if ($ruoli['nuovo prodotto'] == 'F' || $ruoli['nuovo prodotto'] == 'W')
              <li class="accordion-item @if($route === 'nuovo-prodotto') is-active @endif"><a href="<?php echo url('nuovo-prodotto'); ?>">Nuovo Prodotto</a></li>
              @endif
              @if ($ruoli['report'] == 'F' || $ruoli['report'] == 'W')
              <li class="accordion-item @if($route === 'report') is-active @endif"><a href="<?php echo url('report'); ?>">Report</a></li>
              @endif
              @if ($ruoli['gestione sito'] == 'F' || $ruoli['gestione sito'] == 'W')
              <li class="accordion-item @if($route === 'gestione-campi') is-active @endif"><a href="<?php echo url('gestione-campi'); ?>">Gestione Campi</a></li>
              @endif
                <!--<li class="accordion-item" data-accordion-item>
                    <a href="#" class="accordion-title">Search</a>
                    <div class="accordion-content" id="cerca-menu" data-tab-content>
                        <form method="" action="">
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="nome-prodotto" placeholder="Nome prodotto">
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="coltura" placeholder="Coltura">
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="avversita" placeholder="Avversità">
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="principio-attivo" placeholder="Pricipio attivo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="submit" name="CERCA" value="CERCA">
                                </div>
                            </div>
                        </form>
                    </div>
                </li>-->
                <li class="accordion-item"><a href="{{ action('LoginController@Logout') }}">Logout</a></li>
          </ul>
      </nav>
