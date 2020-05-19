<div class="expanded row">
    <div class="medium-12 large-12 columns">
        <div id="logo-prodotto"></div>
        <div id="pulsanti-prodotto">
            <div class="button-group" id="menu-pulsanti-prodotto">
                @if ($ruoli['database prodotti'] != 'N')
                  <a href='{{ url("storico-prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">STORICO</a>
                  <a href='{{ url("comunicazioni-prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">COMUNICAZIONI</a>
                  <a href='{{ url("codici-prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">CODICI</a>
                @endif
                @if ($ruoli['database prodotti'] == 'F' || $ruoli['database prodotti'] == 'W')
                  <a href='{{ url("duplica-prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">DUPLICA</a>
                  <a href='{{ url("gestione-colture/".$categoria."/".$prodotto."/".$id) }}' class="button">COLTURE</a>
                  <a href='{{ url("ministero/".$categoria."/".$prodotto."/".$id) }}' class="button">Et. MINISTERIALE/SDS</a>
                  <a href='{{ url("modifica-prodotto/".$categoria."/".$prodotto."/".$id) }}' class="button">MODIFICA PRODOTTO</a>
                @endif
            </div>
        </div>
    </div>
</div>
