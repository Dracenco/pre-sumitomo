<div class="expanded row collapse">
    <div class="medium-12 large-12 columns">
        <div class="button-group" id="menu-orizzontale">
            <a href="<?php echo url('dashboard'); ?>" class="button @if($app === 'sumibase') is-active @endif">SUMIBASE</a>
            @if ($ruoli['sumipec'] == 'F' || $ruoli['sumipec'] == 'W')
            <a href="https://login.magnews.it/sso/login" class="button" target="_blank">SUMIPEC</a>
            @endif
            @if ($ruoli['gestione sito'] == 'F' || $ruoli['gestione sito'] == 'W')
            <a href="<?php echo url('sito'); ?>" class="button @if($app === 'sito') is-active @endif">GESTIONE SITO</a>
            @endif
        </div>
    </div>
</div>
