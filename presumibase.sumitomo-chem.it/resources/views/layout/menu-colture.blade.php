<div class="expanded row">
    <div class="medium-12 large-12 columns">
        <div id="logo-prodotto"></div>
        <div id="pulsanti-prodotto">
            <div class="button-group" id="menu-pulsanti-prodotto">modifica-avversita
              @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                @if(\Request::is('modifica-coltura/*') || \Request::is('modifica-avversita/*'))
                <a href='{{ url("coltura-nuova-avversita/".$categoria."/".$prodotto."/".$id."/".$idcoltura) }}' class="button">AGGIUNGI AVVERSIT&Agrave;</a>
                @endif
                <a href='{{ url("prodotto-nuova-coltura/".$categoria."/".$prodotto."/".$id) }}' class="button">AGGIUNGI COLTURA</a>
              @endif                
              @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                <a href='{{ url("gestione-colture/".$categoria."/".$prodotto."/".$id) }}' class="button">COLTURE</a>
                <a href='{{ url("modifica-prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">MODIFICA PRODOTTO</a>
              @endif
                <a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">SCHEDA PRODOTTO</a>
            </div>
        </div>
    </div>
</div>
