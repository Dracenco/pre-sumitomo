     <nav id="menu">
          <ul class="accordion" data-accordion>
                <li class="accordion-item @if($route === 'frodi') is-active @endif"><a href="<?php echo url('sito/frodi'); ?>">Segnalazioni frodi</a></li>
                <li class="accordion-item @if($route === 'contatti') is-active @endif"><a href="<?php echo url('sito/contatti'); ?>">Contatti</a></li>
                <li class="accordion-item @if($route === 'catalogo') is-active @endif"><a href="<?php echo url('sito/catalogo'); ?>">Catalogo</a></li>

                <li class="accordion-item @if($route === 'rete-vendita') is-active @endif"><a href="<?php echo url('sito/rete-vendita'); ?>">Rete vendita</a></li>
                <li class="accordion-item @if($route === 'home-page') is-active @endif"><a href="<?php echo url('sito/home-page'); ?>">Home page</a></li>
                <li class="accordion-item @if($route === 'notizie') is-active @endif"><a href="<?php echo url('sito/notizie'); ?>">Notizie</a></li>

                <li class="accordion-item @if($route === 'prodotti') is-active @endif"><a href="<?php echo url('sito/prodotti'); ?>">Prodotti</a></li>
                <li class="accordion-item @if($route === 'chi-siamo') is-active @endif"><a href="<?php echo url('sito/chi-siamo'); ?>">Chi siamo</a></li>

                <li class="accordion-item @if($route === 'sicurezza') is-active @endif"><a href="<?php echo url('sito/sicurezza'); ?>">Sicurezza</a></li>
                <li class="accordion-item @if($route === 'centri-antiveleni') is-active @endif"><a href="<?php echo url('sito/centri-antiveleni'); ?>">Centri antiveleni</a></li>

                <li class="accordion-item @if($route === 'biorazionale') is-active @endif"><a href="<?php echo url('sito/biorazionale'); ?>">Biorazionale</a></li>
                <li class="accordion-item @if($route === 'schede-difesa') is-active @endif"><a href="<?php echo url('sito/schede-difesa'); ?>">Schede Difesa</a></li>

                <li class="accordion-item @if($route === 'privacy') is-active @endif"><a href="<?php echo url('sito/privacy'); ?>">Privacy</a></li>
                <li class="accordion-item @if($route === 'cookies') is-active @endif"><a href="<?php echo url('sito/cookies'); ?>">Cookies</a></li>

                <li class="accordion-item"><a href="{{ action('LoginController@Logout') }}">Logout</a></li>
          </ul>
      </nav>
