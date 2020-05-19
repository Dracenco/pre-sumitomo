 <section class="search-bar_wrap">
    <div class="search-bar"  data-magellan-target="ricerca-tecnica">

    <header>
        <h3 class="bar-title">Ricerca</h3>
    </header>

    <form method="post" action="<?php echo url('ricerca-prodotti'); ?>" class="row custom"> 
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
              <div class="small-12 columns form-fields" id="ricerca-tecnica">
                <div>
                  <button class="dropdown-button titleLinea" type="button" data-toggle="line-dropdown">
                    <span>Linea</span>
                  </button>
                  <div class="dropdown-pane" id="line-dropdown" data-dropdown data-auto-focus="true" data-close-on-click="true">
                    <span class="dropdown-title">Linea</span>
                    <div class="container">
                      <div class="row collapse">
                        <div class="small-12 columns filter-list" id="linea-ricerca"></div>
                      </div>
                      <div class="row selection-btn">
                        <div class="small-12 columns">
                          <a href="" class="button btn-block selectLinea">Seleziona</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <button class="dropdown-button titleFamiglia" type="button" data-toggle="family-dropdown">
                    <span>Famiglia</span>
                  </button>
                  <div class="dropdown-pane" id="family-dropdown" data-dropdown data-auto-focus="true" data-close-on-click="true">
                    <span class="dropdown-title">Famiglia</span>
                    <div class="container">
                      <div class="row collapse">
                        <div class="small-12 columns filter-list" id="famiglia-ricerca"></div>
                      </div>
                      <div class="row selection-btn">
                        <div class="small-12 columns">
                          <a href="" class="button btn-block selectFamiglia">Seleziona</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <button class="dropdown-button titleColtura" type="button" data-toggle="culture-dropdown">
                    <span>Coltura</span>
                  </button>
                  <div class="dropdown-pane" id="culture-dropdown" data-dropdown data-auto-focus="true" data-close-on-click="true">
                    <span class="dropdown-title">Coltura</span>
                    <div class="container">
                      <div class="row collapse">
                        <div class="small-12 columns filter-list" id="coltura-ricerca"></div>
                      </div>
                      <div class="row selection-btn">
                        <div class="small-12 columns">
                          <a href="" class="button btn-block selectColtura">Seleziona</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <button class="dropdown-button titleAvversita" type="button" data-toggle="adversity-dropdown">
                    <span>Avversit&agrave;</span>
                  </button>
                  <div class="dropdown-pane" id="adversity-dropdown" data-dropdown data-auto-focus="true" data-close-on-click="true">
                    <span class="dropdown-title">Avversit&agrave;</span>
                    <div class="container">
                      <div class="row collapse">
                        <div class="small-12 columns filter-list" id="avversita-ricerca"></div>
                      </div>
                      <div class="row selection-btn">
                        <div class="small-12 columns">
                          <a href="" class="button btn-block selectAvversita">Seleziona</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <button class="dropdown-button titlePrincAttivo" type="button" data-toggle="activePrinciple-dropdown">
                    <span>Principio attivo</span>
                  </button>
                  <div class="dropdown-pane" id="activePrinciple-dropdown" data-dropdown data-auto-focus="true" data-close-on-click="true">
                    <span class="dropdown-title">Principio attivo</span>
                    <div class="container">
                      <div class="row collapse">
                        <div class="small-12 columns filter-list" id="principio-ricerca"></div>
                      </div>
                      <div class="row selection-btn">
                        <div class="small-12 columns">
                          <a href="" class="button btn-block selectPrincAttivo">Seleziona</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <label class="checkbox btn-bio" for="checkbox-5-1" tabindex="0">
                    <input type="checkbox" class="form-control" name="biologico" id="checkbox-5-1" value="true">
                    <span>Biologico</span>
                  </label>
                </div>
                <div>
                  <div class="button-group">                    
                    <input type="reset" class="button btn-primary btn-block" value="Reset">
                    <input type="submit" class="button btn-primary btn-block" value="Cerca">
                  </div>
                </div>
              </div>
    </form>
    </div>
</section>   