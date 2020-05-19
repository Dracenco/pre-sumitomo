<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
</script>
@extends('layout.header')
@section('title', 'Gestione Campi')
@section('content')

@include('layout.menu')
<section id="content-scheda-prodotto" data-equalizer-watch>
    <div class="row large-12 prima-riga">
        <div class="medium-12 large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href='<?php echo url('dashboard'); ?>'>HomePage</a></li>
                    <li class="disabled">Gestione Campi</li>
                </ul>
            </nav>
        </div>
    </div>

    @if ($ruoli['gestione campi'] == 'F' || $ruoli['gestione campi'] == 'W')
    <div class="expanded row">
        <div class="medium-12 large-12 columns">
            <div id="error">
                <?php
                  if(isset($_GET['ok']))
                      echo "Operazione eseguita";
                  elseif(isset($_GET['no']))
                      echo "Impossibile eseguire l'operazione";
                ?>
            </div>
        </div>
    </div>

    <div class="expanded row">
        <div class="medium-12 large-12 columns">
            <div class="contenitore-campi">
                <ul class="tabs" data-tabs id="riga1">
                    <li class="tabs-title"><a href="#panel1">Coltura</a></li>
                    <li class="tabs-title"><a href="#panel2">Sotto coltura</a></li>
                    <li class="tabs-title"><a href="#panel3">Categorie di avversit&agrave;</a></li>
                    <li class="tabs-title"><a href="#panel4">Avversità controllate</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="riga1">
                    <div class="tabs-panel" id="panel1">
                        <div class="card card-tabs operazione-campi">
                           <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel1c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel2c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                           </div>

                           <div class="tabs-content" data-tabs-content="collapsing-tabs">

                            <div class="tabs-panel is-active" id="panel1c">
                                <form class="gestione-campi-nuova-coltura" method="post">
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nome coltura<input type="text" name="nome-coltura" id="nome-coltura"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sinonimi (separati da virgola)<textarea name="sinonimi-coltura"></textarea></label>
                                        </div>
                                    </div>
                                    <div class="large-3 columns end">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
                            </div>

                            <div class="tabs-panel" id="panel2c">
                                <form class="gestione-campi-modifica-coltura" method="post">
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Seleziona la coltura da modificare<select name="coltura-modifica" id="coltura-modifica"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nuovo nome coltura<input type="text" name="nuovo-nome-coltura" id="nuovo-nome-coltura"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sinonimi (separati da virgola)<textarea name="nuovo-sinonimi-coltura" id="nuovo-sinonimi-coltura"></textarea></label>
                                        </div>
                                    </div>
                                    <div class="large-3 columns end">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel2">
                        <div class="card card-tabs operazione-campi">
                           <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel4c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel5c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                           </div>

                           <div class="tabs-content" data-tabs-content="collapsing-tabs">

                           <div class="tabs-panel is-active" id="panel4c">
                                <form class="gestione-campi-nuova-sottocoltura" method="post">
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Coltura<select name="sottocoltura" id="sottocoltura"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nome sotto coltura<input type="text" name="nome-sottocoltura" id="nome-sottocoltura"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sinonimi (separati da virgola)<textarea name="sinonimi-sottocoltura" id="sinonimi-sottocoltura"></textarea></label>
                                        </div>
                                    </div>
                                    <div class="large-3 columns end">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
                            </div>

                           <div class="tabs-panel" id="panel5c">
                                <form class="gestione-campi-modifica-sottocoltura" method="post">
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Coltura<select name="scelta-sottocoltura" id="scelta-sottocoltura"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Seleziona la sotto coltura da modificare<select name="sottocoltura-modifica" id="sottocoltura-modifica"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nuovo nome sottocoltura<input type="text" name="nuovo-nome-sottocoltura" id="nuovo-nome-sottocoltura"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sinonimi (separati da virgola)<textarea name="nuovo-sinonimi-sottocoltura" id="nuovo-sinonimi-sottocoltura"></textarea></label>
                                        </div>
                                    </div>
                                    <div class="large-3 columns end">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel3">
                        <div class="card card-tabs operazione-campi">
                           <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel7c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel8c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                           </div>

                           <div class="tabs-content" data-tabs-content="collapsing-tabs">

                            <div class="tabs-panel is-active" id="panel7c">
                                <form class="nuova-categoria-avversita" method="post">
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nome categoria di avversit&agrave;<input type="text" name="nome-nuova-categoria-avversita" id="nome-nuova-categoria-avversita"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sinonimi (separati da virgola)<textarea name="sinonimi-nome-nuova-categoria-avversita" id="sinonimi-nome-nuova-categoria-avversita"></textarea></label>
                                        </div>
                                    </div>
                                    <div class="large-3 columns end">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
                            </div>

                            <div class="tabs-panel" id="panel8c">
                                <form class="modifica-categoria-avversita" method="post">
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Categoria da modificare<select name="modifica-categora" id="modifica-categora"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nuovo nome categoria<input type="text" name="nuovo-nome-categoria-avversita" id="nuovo-nome-categoria-avversita"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sinonimi (separati da virgola)<textarea name="nuovo-sinonimi-categoria-avversita" id="nuovo-sinonimi-categoria-avversita"></textarea></label>
                                        </div>
                                    </div>
                                    <div class="large-3 columns end">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel4">
                        <div class="card card-tabs operazione-campi">
                           <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel10c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel11c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                           </div>

                           <div class="tabs-content" data-tabs-content="collapsing-tabs">

                            <div class="tabs-panel is-active" id="panel10c">
                                <form class="nuova-avversita-db" method="post">
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Categoria<select name="categoria-nuova-avversita" id="categoria-nuova-avversita"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nome avversit&agrave;<input type="text" name="nome-nuova-avversita" id="nome-nuova-avversita"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nome avversit&agrave; in latino<input type="text" name="nome-nuova-avversita-latino" id="nome-nuova-avversita-latino"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sinonimi (separati da virgola)<textarea name="sinonimi-nuova-avversita" id="sinonimi-nuova-avversita"></textarea></label>
                                        </div>
                                    </div>
                                    <div class="large-3 columns end">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
                            </div>

                            <div class="tabs-panel" id="panel11c">
                                <form class="modifica-nome-avversita" method="post">
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Categoria<select name="categoria-modifica-avversita" id="categoria-modifica-avversita"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Avversità da modificare<select name="avversita-da-modificare" id="avversita-da-modificare"><option value="">Scegli</option></select></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nuovo nome avversità<input type="text" name="nuovo-nome-avversita-da-modificare" id="nuovo-nome-avversita-da-modificare"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                            <label>Nuovo nome avversità in latino<input type="text" name="nuovo-nome-avversita-da-modificare-latino" id="nuovo-nome-avversita-da-modificare-latino"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-3 columns end">
                                          <label>Sinonimi (separati da virgola)<textarea name="nuovo-sinonimi-avversita-da-modificare" id="nuovo-sinonimi-avversita-da-modificare"></textarea></label>
                                        </div>
                                    </div>
                                    <div class="large-3 columns end">
                                        <input type="submit" name="SALVA" value="SALVA" class="float-right">
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <ul class="tabs" data-tabs id="riga2">
                    <li class="tabs-title"><a href="#panel5">Linea distributiva</a></li>
                    <li class="tabs-title"><a href="#panel6">Principi attivi</a></li>
                    <li class="tabs-title"><a href="#panel7">Famiglia</a></li>
                    <li class="tabs-title"><a href="#panel8">Sotto famiglia</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="riga2">
                    <div class="tabs-panel" id="panel5">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel13c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel14c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel13c">
                                    <form class="form-nuova-linea" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nome linea<input type="text" name="nome-linea" id="nome-linea"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Sigla linea<input type="text" name="sigla-linea" id="sigla-linea"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>

                                <div class="tabs-panel" id="panel14c">
                                    <form class="form-modifica-linea" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona la linea da modificare<select name="modifica-linea" id="modifica-linea"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo nome linea<input type="text" name="nuovo-nome-linea" id="nuovo-nome-linea"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Sigla linea<input type="text" name="nuovo-sigla-linea" id="nuovo-sigla-linea"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>

                    <div class="tabs-panel" id="panel6">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel15c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel16c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel15c">
                                    <form class="form-principio-attivo" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Principio attivo<input type="text" name="nome-principio-attivo" id="nome-principio-attivo"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>

                                <div class="tabs-panel" id="panel16c">
                                    <form class="form-modifica-principio-attivo" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona il principio attivo da modificare<select name="modifica-principio-attivo" id="modifica-principio-attivo"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo nome principio attivo<input type="text" name="nuovo-principio-attivo" id="nuovo-principio-attivo"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel7">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel17c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel18c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel17c">
                                    <form class="form-famiglia" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Famiglia<input type="text" name="nome-famiglia" id="nome-famiglia"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Sigla famiglia<input type="text" name="sigla-famiglia" id="sigla-famiglia"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>

                                <div class="tabs-panel" id="panel18c">
                                    <form class="form-modifica-famiglia" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona la famiglia da modificare<select name="modifica-famiglia" id="modifica-famiglia"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo nome famiglia<input type="text" name="nuova-famiglia" id="nuova-famiglia"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Sigla famiglia<input type="text" name="nuova-sigla-famiglia" id="nuova-sigla-famiglia"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel8">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel19c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel20c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel19c">
                                    <form class="form-nuova-sotto-famiglia" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Famiglia<select name="scelta-famiglia" id="scelta-famiglia"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova sotto famiglia<input type="text" name="nome-sotto-famiglia" id="nome-sotto-famiglia"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Sigla sotto famiglia<input type="text" name="sigla-sotto-famiglia" id="sigla-sotto-famiglia"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel20c">
                                    <form class="form-modifica-sotto-famiglia" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Famiglia<select name="scelta-famiglia" id="scelta-famiglia"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona la sotto famiglia da modificare<select name="modifica-sotto-famiglia" id="modifica-sotto-famiglia"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo nome sotto famiglia<input type="text" name="nuova-sotto-famiglia" id="nuova-sotto-famiglia"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Sigla sotto famiglia<input type="text" name="nuova-sigla-sotto-famiglia" id="nuova-sigla-sotto-famiglia"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <ul class="tabs" data-tabs id="riga3">
                    <li class="tabs-title"><a href="#panel9">PM</a></li>
                    <li class="tabs-title"><a href="#panel10">IVA</a></li>
                    <li class="tabs-title"><a href="#panel11">Ecotassa</a></li>
                    <li class="tabs-title"><a href="#panel12">Formulazione</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="riga3">
                    <div class="tabs-panel" id="panel9">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel21c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel22c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel21c">
                                    <form class="form-pm" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo PM<input type="text" name="nuovo-pm" id="nuovo-pm"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>

                                <div class="tabs-panel" id="panel22c">
                                    <form class="form-modifica-pm" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona PM<select name="modifica-pm" id="modifica-pm"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo nome PM<input type="text" name="nuovo-valore-pm" id="nuovo-valore-pm"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel10">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel23c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel24c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel23c">
                                    <form class="form-iva" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo valore IVA<input type="text" name="valore-iva" id="valore-iva"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel24c">
                                    <form class="form-modifica-valore-iva" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona l'iva da modificare<select name="modifica-valore-iva" id="modifica-valore-iva"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo valore IVA<input type="text" name="nuovo-valore-iva" id="nuovo-valore-iva"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel11">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel25c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel26c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel25c">
                                    <form class="form-ecotassa" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo valore ecotassa<input type="text" name="valore-ecotassa" id="valore-ecotassa"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel26c">
                                    <form class="form-modifica-ecotassa" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona l'ecotassa da modificare<select name="modifica-ecotassa" id="modifica-ecotassa"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo valore ecotassa<input type="text" name="nuovo-valore-ecotassa" id="nuovo-valore-ecotassa"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel12">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel27c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel28c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel27c">
                                    <form class="form-formulazione" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova formulazione<input type="text" name="nuova-formulazione" id="nuova-formulazione"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel28c">
                                    <form class="form-modifica-formulazione" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona la formulazione da modificare<select name="modifica-formulazione" id="modifica-formulazione"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova formulazione<input type="text" name="nuovo-valore-formulazione" id="nuovo-valore-formulazione"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <ul class="tabs" data-tabs id="riga4">
                    <li class="tabs-title"><a href="#panel13">Fornitore/Tit. Commercio e registrazione</a></li>
                    <li class="tabs-title"><a href="#panel15">Avvertenze</a></li>
                    <li class="tabs-title"><a href="#panel16">Frasi H</a></li>
                    <li class="tabs-title"><a href="#panel17">Gruppo Imballaggio</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="riga4">
                    <div class="tabs-panel" id="panel13">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel29c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel30c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel29c">
                                    <form class="form-fornitore" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo Fornitore/Tit. Commercio e registrazione<input type="text" name="nuovo-fornitore" id="nuovo-fornitore"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel30c">
                                    <form class="form-modifica-fornitore" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona la voce da modificare<select name="modifica-fornitore" id="modifica-fornitore"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo Fornitore/Tit. Commercio e registrazione<input type="text" name="nuovo-valore-fornitore" id="nuovo-valore-fornitore"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel15">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel33c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel34c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel33c">
                                    <form class="form-avvertenza" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova avvertenza<input type="text" name="nuova-avvertenza" id="nuova-avvertenza"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel34c">
                                    <form class="form-modifica-avvertenza" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona avvertenza<select name="modifica-avvertenza" id="modifica-avvertenza"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova avvertenza<input type="text" name="nuovo-valore-avvertenza" id="nuovo-valore-avvertenza"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel16">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel35c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel36c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel35c">
                                    <form class="form-fraseh" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova frase H<input type="text" name="nuova-fraseh" id="nuova-fraseh"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel36c">
                                    <form class="form-modifica-fraseh" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona frase H<select name="modifica-fraseh" id="modifica-fraseh"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova frase H<input type="text" name="nuovo-valore-fraseh" id="nuovo-valore-fraseh"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel17">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel37c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel38c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel37c">
                                    <form class="form-gruppo-imballaggio" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo gruppo imballaggio<input type="text" name="nuovo-gruppo-imballaggio" id="nuovo-gruppo-imballaggio"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel38c">
                                    <form class="form-modifica-gruppo-imballaggio" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona gruppo imballaggio<select name="modifica-gruppo-imballaggio" id="modifica-gruppo-imballaggio"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo gruppo imballaggio<input type="text" name="nuovo-valore-gruppo-imballaggio" id="nuovo-valore-gruppo-imballaggio"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <ul class="tabs" data-tabs id="riga5">
                    <li class="tabs-title"><a href="#panel18">Numero ONU ADR</a></li>
                    <li class="tabs-title"><a href="#panel19">Classe ADR</a></li>
                    <li class="tabs-title"><a href="#panel20">Classificazione seveso</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="riga5">
                    <div class="tabs-panel" id="panel18">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel39c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel40c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel39c">
                                    <form class="form-onu" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo numero ONU<input type="text" name="nuovo-onu" id="nuovo-onu"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel40c">
                                    <form class="form-modifica-onu" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona numero ONU<select name="modifica-onu" id="modifica-onu"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo numero ONU<input type="text" name="nuovo-valore-onu" id="nuovo-valore-onu"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel19">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel41c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel42c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel41c">
                                    <form class="form-adr" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo numero ONU ADR<input type="text" name="nuovo-adr" id="nuovo-adr"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>

                                <div class="tabs-panel" id="panel42c">
                                    <form class="form-modifica-adr" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona numero ONU ADR<select name="modifica-adr" id="modifica-adr"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuovo numero ONU ADR<input type="text" name="nuovo-valore-adr" id="nuovo-valore-adr"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel20">
                        <div class="contenitore-info">
                           <div class="card card-tabs operazione-campi">
                            <div class="card-divider">
                                <ul class="tabs menu align-left" data-active-collapse="true" data-tabs id="collapsing-tabs">
                                    <li class="tabs-title is-active"><a href="#panel43c">Aggiungi<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                    <li class="tabs-title"><a href="#panel44c">Modifica<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                                <div class="tabs-panel is-active" id="panel43c">
                                    <form class="form-seveso" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova classificazione seveso<input type="text" name="nuovo-seveso" id="nuovo-seveso"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                                <div class="tabs-panel" id="panel44c">
                                    <form class="form-modifica-seveso" method="post">
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Seleziona classificazione seveso<select name="modifica-seveso" id="modifica-seveso"><option value="">Scegli</option></select></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-3 columns end">
                                                <label>Nuova classificazione seveso<input type="text" name="nuovo-valore-seveso" id="nuovo-valore-seveso"></label>
                                            </div>
                                        </div>
                                        <div class="large-3 columns end"><input type="submit" name="SALVA" value="SALVA" class="float-right"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="expanded row">
       <div class="medium-12 large-12 columns">
           <div class="report">Non hai i permessi per visualizzare questa pagina</div>
       </div>
    </div>
    @endif
</section>
@endsection

@section('script')
<script type="text/javascript">
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result) {
            $.each(result.data, function(index, value){
                $("nav ul.menu").append('<li> <a href="{!! url("prodotti") !!}' + '/' + value.id + '" >' + value.name + '</a></li>');
            });
        },
        error: function (request, status, errorThrown){}
    });

    var colture ='';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=farming_category&all=false",
        success: function (result) {
            $.each(result.data, function(index, value){ colture = colture + '<option value="' + value.value + '" >' + value.name + '</option>' });
            $("select#coltura-modifica").append(colture);
            $("select#sottocoltura").append(colture);
            $("select#scelta-sottocoltura").append(colture);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.gestione-campi-nuova-coltura', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nome-coltura').val() != ''){
            var nomecoltura = $(this).find('input#nome-coltura').val();
        }else{
            var nomecoltura = '';
            validazionecampi = false;
            error = error + "Nome coltura richiesta<br>";
        }

        if($(this).find('textarea#sinonimi-coltura').val() != ''){
            var sinonimicoltura = $(this).find('textarea#sinonimi-coltura').val();
        }else{
            var sinonimicoltura = '""';
        }

        var myObj;
        myObj = { "sinonimi" : sinonimicoltura , "name" :  nomecoltura };
        var myJSON = JSON.stringify(myObj);

        if(nomecoltura==''){
            $("#nome-coltura").parent().css("color","red");
        }else{
            $("#nome-coltura").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Colture/Create",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile creare la coltura');
                    }else{
                        $("#error").html('Nuova coltura correttamente inserita');

                        var colture ='';
                        $("select#coltura-modifica").html('');
                        $("select#sottocoltura").html('');
                        $("select#scelta-sottocoltura").html('');

                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=farming_category&all=false",
                            success: function (result) {
                                $.each(result.data, function(index, value){
                                    colture = colture + '<option value="' + value.value + '" >' + value.name + '</option>'
                                });
                                $("select#coltura-modifica").append(colture);
                                $("select#sottocoltura").append(colture);
                                $("select#scelta-sottocoltura").append(colture);
                            },
                            error: function (request, status, errorThrown) {}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile creare la coltura:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $('select#coltura-modifica').on('change', function() {
        var colturaid = this.value;
        $.ajax({
            type: "GET",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
            url: "{{ config('constants.UrlWebService') }}api/Colture/GetAll",
            success: function (result) {
                $("#nuovo-sinonimi-coltura").html('');
                $.each(result.data, function(index, value){
                    if(colturaid == value.id){ $("#nuovo-sinonimi-coltura").html(value.sinonimi); }
                });
            },
            error: function (request, status, errorThrown){}
        });
    });

    $(document).on('submit', '.gestione-campi-modifica-coltura', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#coltura-modifica').val() != ''){
            var colturaModifica = $(this).find('select#coltura-modifica').val();
        }else{
            var colturaModifica = '';
            validazionecampi = false;
            error = error + "Selezionare la coltura<br>";
        }

        if($(this).find('input#nuovo-nome-coltura').val() != ''){
            var nuovoNomeColtura = $(this).find('input#nuovo-nome-coltura').val();
        }else{
            var nuovoNomeColtura = '';
            validazionecampi = false;
            error = error + "Indicare il nome della coltura <br>";
        }

        if($(this).find('textarea#nuovo-sinonimi-coltura').val() != ''){
            var nuovoSinonimiColtura = $(this).find('textarea#nuovo-sinonimi-coltura').val();
        }else{
            var nuovoSinonimiColtura = '';
        }

        if(colturaModifica==''){
            $("#coltura-modifica").parent().css("color","red");
        }else{
            $("#coltura-modifica").parent().removeAttr("style");
        }

        if(nuovoNomeColtura==''){
            $("#nuovo-nome-coltura").parent().css("color","red");
        }else{
            $("#nuovo-nome-coltura").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : colturaModifica ,"sinonimi" : nuovoSinonimiColtura , "name" :  nuovoNomeColtura };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Colture/Update",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare la coltura');
                    }else{
                        $("#error").html('Coltura correttamente modificata');

                        var colture ='';
                        $("select#coltura-modifica").html('<option value="">Scegli</option>');
                        $("select#sottocoltura").html('<option value="">Scegli</option>');
                        $("select#scelta-sottocoltura").html('<option value="">Scegli</option>');

                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=farming_category&all=false",
                            success: function (result) {
                                $.each(result.data, function(index, value){ colture = colture + '<option value="' + value.value + '" >' + value.name + '</option>' });
                                $("select#coltura-modifica").append(colture);
                                $("select#sottocoltura").append(colture);
                                $("select#scelta-sottocoltura").append(colture);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile modificare la coltura:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.gestione-campi-nuova-sottocoltura', function(e){
        e.preventDefault();
        var validazionecampi = true;
        var error ='';

        if($(this).find('select#sottocoltura').val() != ''){
            var sottocolturaId = $(this).find('select#sottocoltura').val();
        }else{
            var sottocolturaId = '';
            validazionecampi = false;
            error = error + "Selezionare la coltura <br>";
        }

        if($(this).find('input#nome-sottocoltura').val() != ''){
            var nomeSottocoltura = $(this).find('input#nome-sottocoltura').val();
        }else{
            var nomeSottocoltura = '';
            validazionecampi = false;
            error = error + "Inserire un nome per la sottocoltura<br>";
        }

        if($(this).find('textarea#sinonimi-sottocoltura').val() != ''){
            var sinonimicoltura = $(this).find('textarea#sinonimi-sottocoltura').val();
        }else{
            var sinonimicoltura = '';
        }

        if(sottocolturaId==''){
            $("#sottocoltura").parent().css("color","red");
        }else{
            $("#sottocoltura").parent().removeAttr("style");
        }

        if(nomeSottocoltura==''){
            $("#nome-sottocoltura").parent().css("color","red");
        }else{
            $("#nome-sottocoltura").parent().removeAttr("style");
        }

        var myObj;

        myObj = { "sinonimi" : sinonimicoltura , "name" :  nomeSottocoltura , "coltura" : { "id" :  sottocolturaId }};
        var myJSON = JSON.stringify(myObj);

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Colture/CreateSottocoltura",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile creare la sotto coltura');
                    }else{
                        $("#error").html('Nuova sotto coltura correttamente inserita');
                        $("select#sottocoltura-modifica").html('<option value="">Scegli</option>');

                        var colture ='';
                        $("select#scelta-sottocoltura").html('<option value="">Scegli</option>');

                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=farming_category&all=false",
                            success: function (result) {
                                $.each(result.data, function(index, value){ colture = colture + '<option value="' + value.value + '" >' + value.name + '</option>' });
                                $("select#scelta-sottocoltura").append(colture);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile creare la sotto coltura:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $('select#scelta-sottocoltura').on('change', function() {
        var categoryid = this.value;
        $("#sottocoltura-modifica").html('<option value="">Scegli</option>');
        var sottofamiglia = '';

        var myObj;

        myObj = { "id" :  categoryid };
        var myJSON = JSON.stringify(myObj);

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
                request.setRequestHeader("Content-Type", "application/json")
            },
            url: "{{ config('constants.UrlWebService') }}api/Colture/GetSottocolturePerColtura",
            contentType: true,
            processData: false,
            async:false,
            data: myJSON,
            success: function (result) {
                $.each(result.data, function(index, value){ sottofamiglia = sottofamiglia + '<option value="' + categoryid + '-' + value.id + '" >' + value.name + '</option>'; });
                $("#sottocoltura-modifica").append(sottofamiglia);
            },
            error: function (request, status, errorThrown){}
        });
    });

    $('select#sottocoltura-modifica').on('change', function(){
        var categoryid = this.value;
        var res = categoryid.split("-");
        $("input#nuovo-nome-sottocoltura").html('');
        $("textarea#nuovo-sinonimi-sottocoltura").html('');
        var sottofamiglia = '';

        var myObj;

        myObj = { "id" :  res[0] };
        var myJSON = JSON.stringify(myObj);

        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
                request.setRequestHeader("Content-Type", "application/json")
            },
            url: "{{ config('constants.UrlWebService') }}api/Colture/GetSottocolturePerColtura",
            contentType: true,
            processData: false,
            async:false,
            data: myJSON,
            success: function (result) {
                $.each(result.data, function(index, value){
                    if(value.id == res[1]){
                        $("input#nuovo-nome-sottocoltura").html(value.name);
                        $("textarea#nuovo-sinonimi-sottocoltura").val(value.sinonimi);
                    }
                });
            },
            error: function (request, status, errorThrown){}
        });
    });

    $(document).on('submit', '.gestione-campi-modifica-sottocoltura', function(e) {
       e.preventDefault();
        var validazionecampi = true;
        var error ='';

        if($(this).find('select#scelta-sottocoltura').val() != ''){
            var colturaId = $(this).find('select#scelta-sottocoltura').val();
        }else{
            var colturaId = '';
            validazionecampi = false;
            error = error + "Selezionare la coltura <br>";
        }

        if($(this).find('select#sottocoltura-modifica').val() != ''){
            var sottoColturaId = $(this).find('select#sottocoltura-modifica').val();
        }else{
            var sottoColturaId = '';
            validazionecampi = false;
            error = error + "Selezionare la sotto coltura <br>";
        }

        if($(this).find('input#nuovo-nome-sottocoltura').val() != ''){
            var nomeSottocoltura = $(this).find('input#nuovo-nome-sottocoltura').val();
        }else{
            var nomeSottocoltura = '';
            validazionecampi = false;
            error = error + "Inserire un nome per la sottocoltura<br>";
        }

        if($(this).find('textarea#nuovo-sinonimi-sottocoltura').val() != ''){
            var sinonimiSottocoltura = $(this).find('textarea#nuovo-sinonimi-sottocoltura').val();
        }else{
            var sinonimiSottocoltura = '';
        }

        if(colturaId==''){
            $("#scelta-sottocoltura").parent().css("color","red");
        }else{
            $("#scelta-sottocoltura").parent().removeAttr("style");
        }

        if(sottoColturaId==''){
            $("#sottocoltura-modifica").parent().css("color","red");
        }else{
            $("#sottocoltura-modifica").parent().removeAttr("style");
        }

        if(nomeSottocoltura==''){
            $("#nuovo-nome-sottocoltura").parent().css("color","red");
        }else{
            $("#nuovo-nome-sottocoltura").parent().removeAttr("style");
        }

        if(validazionecampi){
            var res = sottoColturaId.split("-");

            var myObj;

            myObj = { "id" : res[1], "sinonimi" : sinonimiSottocoltura , "name" :  nomeSottocoltura };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Colture/UpdateSottocoltura",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare la sotto coltura');
                    }else{
                        $("#error").html('Sotto coltura correttamente modificata');
                        $("select#sottocoltura-modifica").html('<option value="">Scegli</option>');

                        var colture ='';
                        $("select#scelta-sottocoltura").html('<option value="">Scegli</option>');

                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Products/GetGenericList?listName=farming_category&all=false",
                            success: function (result) {
                                $.each(result.data, function(index, value){ colture = colture + '<option value="' + value.value + '" >' + value.name + '</option>' });
                                $("select#scelta-sottocoltura").append(colture);
                            },
                            error: function (request, status, errorThrown) {}
                        });
                        $("input#nuovo-nome-sottocoltura").val('');
                        $("textarea#nuovo-sinonimi-sottocoltura").val('');
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile modificare la sotto coltura:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var categoria = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAllCategorie",
        success: function (result) {
            $.each(result.data, function(index, value){  categoria = categoria + '<option value="' + value.id + '" >' + value.name + '</option>' });
            $("select#modifica-categora").append(categoria);
            $("select#categoria-nuova-avversita").append(categoria);
            $("select#categoria-modifica-avversita").append(categoria);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.nuova-categoria-avversita', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nome-nuova-categoria-avversita').val() != ''){
            var nomeCategoriaAvversita = $(this).find('input#nome-nuova-categoria-avversita').val();
        }else{
            var nomeCategoriaAvversita = '';
            validazionecampi = false;
            error = error + "Nome categoria richiesto<br>";
        }

        if($(this).find('textarea#sinonimi-nome-nuova-categoria-avversita').val() != ''){
            var sinonimiCategoriaAvversita = $(this).find('textarea#sinonimi-nome-nuova-categoria-avversita').val();
        }else{
            var sinonimiCategoriaAvversita = '';
        }

        var myObj;
        myObj = { "sinonimi" : sinonimiCategoriaAvversita , "name" :  nomeCategoriaAvversita };
        var myJSON = JSON.stringify(myObj);

        if(nomeCategoriaAvversita==''){
            $("#nome-nuova-categoria-avversita").parent().css("color","red");
        }else{
            $("#nome-nuova-categoria-avversita").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Avversita/CreateCategoria ",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile creare la categoria');
                    }else{
                        $("#error").html('Categoria correttamente inserita');

                        $("select#modifica-categora").html('<option value="">Scegli</option>');
                        $("select#categoria-nuova-avversita").html('<option value="">Scegli</option>');
                        $("select#categoria-modifica-avversita").html('<option value="">Scegli</option>');

                        var categoria = '';
                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAllCategorie",
                            success: function (result) {
                                $.each(result.data, function(index, value){ categoria = categoria + '<option value="' + value.id + '" >' + value.name + '</option>' });
                                $("select#modifica-categora").append(categoria);
                                $("select#categoria-nuova-avversita").append(categoria);
                                $("select#categoria-modifica-avversita").append(categoria);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile creare la categoria:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $('select#modifica-categora').on('change', function() {
        var categoriaid = this.value;
        var categoria = '';
        $("input#nuovo-nome-categoria-avversita").html('');
        $("textarea#nuovo-sinonimi-categoria-avversita").html('');

        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAllCategorie",
            success: function (result) {
                $.each(result.data, function(index, value){
                    if(value.id == categoriaid){ $("#nuovo-sinonimi-categoria-avversita").append(value.sinonimi); }
                });
            },
            error: function (request, status, errorThrown){}
        });
    });

    $(document).on('submit', '.modifica-categoria-avversita', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-categora').val() != ''){
            var modificaCategoria = $(this).find('select#modifica-categora').val();
        }else{
            var modificaCategoria = '';
            validazionecampi = false;
            error = error + "Selezionare la categoria<br>";
        }

        if($(this).find('input#nuovo-nome-categoria-avversita').val() != ''){
            var nuovoNomeCategoria = $(this).find('input#nuovo-nome-categoria-avversita').val();
        }else{
            var nuovoNomeCategoria = '';
            validazionecampi = false;
            error = error + "Indicare il nome della categoria <br>";
        }

        if($(this).find('textarea#nuovo-sinonimi-categoria-avversita').val() != ''){
            var nuovoSinonimiCategoria = $(this).find('textarea#nuovo-sinonimi-categoria-avversita').val();
        }else{
            var nuovoSinonimiCategoria = '';
        }

        if(modificaCategoria==''){
            $("#modifica-categora").parent().css("color","red");
        }else{
            $("#modifica-categora").parent().removeAttr("style");
        }

        if(nuovoNomeCategoria==''){
            $("#nuovo-nome-categoria-avversita").parent().css("color","red");
        }else{
            $("#nuovo-nome-categoria-avversita").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : modificaCategoria ,"sinonimi" : nuovoSinonimiCategoria , "name" :  nuovoNomeCategoria };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Avversita/UpdateCategoria",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare la categoria');
                    }else{
                        $("#error").html('Categoria correttamente modificata');
                        $("select#modifica-categora").html('<option value="">Scegli</option>');
                        $("select#categoria-nuova-avversita").append('<option value="">Scegli</option>');
                        $("select#categoria-modifica-avversita").append('<option value="">Scegli</option>');

                        var categoria = '';
                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAllCategorie",
                            success: function (result) {
                                $.each(result.data, function(index, value){ categoria = categoria + '<option value="' + value.id + '" >' + value.name + '</option>' });
                                $("select#modifica-categora").append(categoria);
                                $("select#categoria-nuova-avversita").append(categoria);
                                $("select#categoria-modifica-avversita").append(categoria);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile modificare la coltura:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.nuova-avversita-db', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nome-nuova-avversita').val() != ''){
            var nomeNuovaAvversita = $(this).find('input#nome-nuova-avversita').val();
        }else{
            var nomeNuovaAvversita = '';
            validazionecampi = false;
            error = error + "Nome avversità richiesto<br>";
        }

        if($(this).find('input#nome-nuova-avversita-latino').val() != ''){
            var nomeNuovaAvversitaLatino = $(this).find('input#nome-nuova-avversita-latino').val();
        }else{
            var nomeNuovaAvversitaLatino = '';
        }

        if($(this).find('textarea#sinonimi-nuova-avversita').val() != ''){
            var sinonimiNuovaAvversita = $(this).find('textarea#sinonimi-nuova-avversita').val();
        }else{
            var sinonimiNuovaAvversita = '';
        }

        if($(this).find('select#categoria-nuova-avversita').val() != ''){
            var CategoriaNuovaAvversita = $(this).find('select#categoria-nuova-avversita').val();
        }else{
            var CategoriaNuovaAvversita = '';
            validazionecampi = false;
            error = error + "Selezionare la categoria<br>";
        }

        var myObj;
        myObj = { "sinonimi" : sinonimiNuovaAvversita , "name" :  nomeNuovaAvversitaLatino, "description" : nomeNuovaAvversita ,"categoria" : { "id" : CategoriaNuovaAvversita } };
        var myJSON = JSON.stringify(myObj);

        if(nomeNuovaAvversita==''){
            $("#nome-nuova-avversita").parent().css("color","red");
        }else{
            $("#nome-nuova-avversita").parent().removeAttr("style");
        }

        if(CategoriaNuovaAvversita==''){
            $("#categoria-nuova-avversita").parent().css("color","red");
        }else{
            $("#categoria-nuova-avversita").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Avversita/Create",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire la nuova avversità');
                    }else{
                        $("#error").html('Avversità correttamente inserita');
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire la nuova avversità:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $('select#categoria-modifica-avversita').on('change', function() {
        var colturaid = this.value;

        var myObj;
        myObj = { "id" : colturaid };
        var myJSON = JSON.stringify(myObj);

        $("select#avversita-da-modificare").html('<option value="">Scegli</option>');
        var avversita = '';

        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAvversitaPerCategoria",
            contentType: true,
            processData: false,
            async:false,
            data: myJSON,
            success: function (result) {
                $.each(result.data, function(index, value){ avversita = avversita + '<option value="' + value.id + '-' + colturaid + '" >' + value.description + ' (' + value.name + ')</option>' });
                $("select#avversita-da-modificare").append(avversita);
            },
            error: function (request, status, errorThrown){}
        });
    });

    $('select#avversita-da-modificare').on('change', function() {

        var avversitaid = this.value;
        var res = avversitaid.split("-");
        var myObj;
        myObj = { "id" : res[1] };
        var myJSON = JSON.stringify(myObj);

        $("input#nuovo-nome-avversita-da-modificare").html('');
        $("input#nuovo-nome-avversita-da-modificare-latino").html('');
        $("textarea#nuovo-sinonimi-avversita-da-modificare").html('');

        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAvversitaPerCategoria",
            contentType: true,
            processData: false,
            async:false,
            data: myJSON,
            success: function (result) {
                $.each(result.data, function(index, value){
                    if(value.id == res[0]){
                        $("input#nuovo-nome-avversita-da-modificare").val(value.description);
                        $("input#nuovo-nome-avversita-da-modificare-latino").val(value.name);
                        $("textarea#nuovo-sinonimi-avversita-da-modificare").val(value.sinonimi);
                    }
                });
            },
            error: function (request, status, errorThrown){}
        });
    });

    $(document).on('submit', '.modifica-nome-avversita', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#categoria-modifica-avversita').val() != ''){
            var categoriaModificaAvversita = $(this).find('select#categoria-modifica-avversita').val();
        }else{
            var categoriaModificaAvversita = '';
            validazionecampi = false;
            error = error + "Selezionare la categoria<br>";
        }

        if($(this).find('select#avversita-da-modificare').val() != ''){
            var avversitaMod = $(this).find('select#avversita-da-modificare').val();
            var res = avversitaMod.split("-");
            var avversitaDaModificare = res[0];
        }else{
            var avversitaDaModificare = '';
            validazionecampi = false;
            error = error + "Selezionare l'avversità<br>";
        }

        if($(this).find('input#nuovo-nome-avversita-da-modificare').val() != ''){
            var nuovoNomeAvversitaDaModificare = $(this).find('input#nuovo-nome-avversita-da-modificare').val();
        }else{
            var nuovoNomeAvversitaDaModificare = '';
            validazionecampi = false;
            error = error + "Indicare il nuovo nome di avversità <br>";
        }

        if($(this).find('input#nuovo-nome-avversita-da-modificare-latino').val() != ''){
            var nuovoNomeAvversitaDaModificareLatino = $(this).find('input#nuovo-nome-avversita-da-modificare-latino').val();
        }else{
            var nuovoNomeAvversitaDaModificareLatino = '';
        }

        if($(this).find('textarea#nuovo-sinonimi-avversita-da-modificare').val() != ''){
            var nuovoSinonimiAvversitaModificare = $(this).find('textarea#nuovo-sinonimi-avversita-da-modificare').val();
        }else{
            var nuovoSinonimiAvversitaModificare = '';
        }

        if(categoriaModificaAvversita==''){
            $("#categoria-modifica-avversita").parent().css("color","red");
        }else{
            $("#categoria-modifica-avversita").parent().removeAttr("style");
        }

        if(avversitaDaModificare==''){
            $("#avversita-da-modificare").parent().css("color","red");
        }else{
            $("#avversita-da-modificare").parent().removeAttr("style");
        }

        if(nuovoNomeAvversitaDaModificare==''){
            $("#nuovo-nome-avversita-da-modificare").parent().css("color","red");
        }else{
            $("#nuovo-nome-avversita-da-modificare").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj= { "id" : avversitaDaModificare, "sinonimi" : nuovoSinonimiAvversitaModificare, "name" : nuovoNomeAvversitaDaModificareLatino, "description" : nuovoNomeAvversitaDaModificare };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/Avversita/Update",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html("Impossibile modificare l'avversità");
                    }else{
                        $("#error").html('Avversità correttamente modificata');
                        $("#nuovo-nome-avversita-da-modificare").val("");
                        $("#nuovo-nome-avversita-da-modificare-latino").val("");
                        $("select#avversita-da-modificare").html('<option value="">Scegli</option>');
                        $("select#categoria-modifica-avversita").html('<option value="">Scegli</option>');
                        $("#nuovo-sinonimi-avversita-da-modificare").val("");

                        var categoria = '';
                        $.ajax({
                            type: "GET",
                            beforeSend: function (request) {
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Avversita/GetAllCategorie",
                            success: function (result) {
                                $.each(result.data, function(index, value){ categoria = categoria + '<option value="' + value.id + '" >' + value.name + '</option>' });
                                $("select#categoria-modifica-avversita").append(categoria);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile modificare l\'avversità:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-nuova-linea', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nome-linea').val() != ''){
            var nomeNuovaLinea = $(this).find('input#nome-linea').val();
        }else{
            var nomeNuovaLinea = '';
            validazionecampi = false;
            error = error + "Nome linea richiesto<br>";
        }

        if($(this).find('input#sigla-linea').val() != ''){
            var siglaLinea = $(this).find('input#sigla-linea').val();
        }else{
            var siglaLinea = '';
            validazionecampi = false;
            error = error + "Sigla linea richiesto<br>";
        }

        var myObj;
        myObj = { "sigla" : siglaLinea ,"name" : nomeNuovaLinea};
        var myJSON = JSON.stringify(myObj);

        if(nomeNuovaLinea==''){
            $("#nome-linea").parent().css("color","red");
        }else{
            $("#nome-linea").parent().removeAttr("style");
        }
        if(siglaLinea==''){
            $("#sigla-linea").parent().css("color","red");
        }else{
            $("#sigla-linea").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertCompany",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire la nuova linea');
                    }else{
                        $("#error").html('Linea distributiva correttamente inserita');

                        var lineaDistributiva = '';
                        $("select#modifica-linea").html('<option value="">Scegli</option>');
                        $("#nome-linea").val('');
                        $("#sigla-linea").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCompany",
                            success: function (result) {
                                $.each(result.data, function(index, value){ lineaDistributiva = lineaDistributiva + '<option value="' + value.id + '" >' + value.sigla + ' - ' + value.name + '</option>'; });
                                $("select#modifica-linea").append(lineaDistributiva);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire la nuova linea:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var lineaDistributiva = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCompany",
        success: function (result) {
            $.each(result.data, function(index, value){ lineaDistributiva = lineaDistributiva + '<option value="' + value.id + '" >' + value.sigla + ' - ' + value.name + '</option>'; });
            $("select#modifica-linea").append(lineaDistributiva);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-linea', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-linea').val() != ''){
            var Idlinea = $(this).find('select#modifica-linea').val();
        }else{
            var Idlinea = '';
            validazionecampi = false;
            error = error + "Selezionare la linea da modificare<br>";
        }

        if($(this).find('input#nuovo-nome-linea').val() != ''){
            var nomeNuovaLinea = $(this).find('input#nuovo-nome-linea').val();
        }else{
            var nomeNuovaLinea = '';
            validazionecampi = false;
            error = error + "Nome linea richiesto<br>";
        }

        if($(this).find('input#nuovo-sigla-linea').val() != ''){
            var nomesiglaLinea = $(this).find('input#nuovo-sigla-linea').val();
        }else{
            var nomesiglaLinea = '';
            validazionecampi = false;
            error = error + "Sigla linea richiesto<br>";
        }

        if(Idlinea==''){
            $("#modifica-linea").parent().css("color","red");
        }else{
            $("#modifica-linea").parent().removeAttr("style");
        }

        if(nomeNuovaLinea==''){
            $("#nuovo-nome-linea").parent().css("color","red");
        }else{
            $("#nuovo-nome-linea").parent().removeAttr("style");
        }

        if(nomesiglaLinea==''){
            $("#nuovo-sigla-linea").parent().css("color","red");
        }else{
            $("#nuovo-sigla-linea").parent().removeAttr("style");
        }

        if(validazionecampi){
            var myObj;
            myObj = { "id" : Idlinea, "sigla" : nomesiglaLinea ,"name" : nomeNuovaLinea };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateCompany",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare la linea distributiva');
                    }else{
                        $("#error").html('Linea distributiva correttamente modificata');

                        var lineaDistributiva = '';
                        $("select#modifica-linea").html('<option value="">Scegli</option>');
                        $("#nuovo-nome-linea").val('');
                        $("#nuovo-sigla-linea").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCompany",
                            success: function (result) {
                                $.each(result.data, function(index, value){ lineaDistributiva = lineaDistributiva + '<option value="' + value.id + '" >' + value.sigla + ' - ' + value.name + '</option>'; });
                                $("select#modifica-linea").append(lineaDistributiva);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown) {}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-principio-attivo', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nome-principio-attivo').val() != ''){
            var nomePrincipioAttivo = $(this).find('input#nome-principio-attivo').val();
        }else{
            var nomePrincipioAttivo = '';
            validazionecampi = false;
            error = error + "Nome principio attivo richiesto<br>";
        }

        var myObj;
        myObj = { "name" : nomePrincipioAttivo};
        var myJSON = JSON.stringify(myObj);

        if(nomePrincipioAttivo==''){
            $("#nome-principio-attivo").parent().css("color","red");
        }else{
            $("#nome-principio-attivo").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertPrincipioAttivo",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il principio attivo');
                    }else{
                        $("#error").html('Principio attivo correttamente inserito');

                        var PrincipioAttivo = '';
                        $("select#modifica-principio-attivo").html('<option value="">Scegli</option>');
                        $("#nome-principio-attivo").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPrincipioAttivo",
                            success: function (result) {
                                $.each(result.data, function(index, value){ PrincipioAttivo = PrincipioAttivo + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-principio-attivo").append(PrincipioAttivo);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il principio attivo:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var PrincipioAttivo = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPrincipioAttivo",
        success: function (result) {
            $.each(result.data, function(index, value){ PrincipioAttivo = PrincipioAttivo + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-principio-attivo").append(PrincipioAttivo);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-principio-attivo', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-principio-attivo').val() != ''){
            var IdPrincipioAttivo = $(this).find('select#modifica-principio-attivo').val();
        }else{
            var IdPrincipioAttivo = '';
            validazionecampi = false;
            error = error + "Selezionare il principio attivo da modificare<br>";
        }

        if($(this).find('input#nuovo-principio-attivo').val() != ''){
            var nomePrincipioAttivo = $(this).find('input#nuovo-principio-attivo').val();
        }else{
            var nomePrincipioAttivo = '';
            validazionecampi = false;
            error = error + "Nome linea richiesto<br>";
        }

        if(IdPrincipioAttivo==''){
            $("#modifica-principio-attivo").parent().css("color","red");
        }else{
            $("#modifica-principio-attivo").parent().removeAttr("style");
        }

        if(nomePrincipioAttivo==''){
            $("#nuovo-principio-attivo").parent().css("color","red");
        }else{
            $("#nuovo-principio-attivo").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : IdPrincipioAttivo, "name" :  nomePrincipioAttivo };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdatePrincipioAttivo",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il principio attivo');
                    }else{
                        $("#error").html('Principio attivo correttamente modificata');

                        var PrincipoAttivoNew = '';
                        $("select#modifica-principio-attivo").html('<option value="">Scegli</option>');
                        $("#nuovo-principio-attivo").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPrincipioAttivo",
                            success: function (result) {
                                $.each(result.data, function(index, value){ PrincipoAttivoNew = PrincipoAttivoNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-principio-attivo").append(PrincipoAttivoNew);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-famiglia', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nome-famiglia').val() != ''){
            var nomefamiglia = $(this).find('input#nome-famiglia').val();
        }else{
            var nomefamiglia = '';
            validazionecampi = false;
            error = error + "Nome famiglia richiesta<br>";
        }

        if($(this).find('input#sigla-famiglia').val() != ''){
            var siglaFamiglia = $(this).find('input#sigla-famiglia').val();
        }else{
            var siglaFamiglia = '';
            validazionecampi = false;
            error = error + "Sigla famiglia richiesto<br>";
        }

        var myObj;
        myObj = { "symbol" : siglaFamiglia ,"name" : nomefamiglia};
        var myJSON = JSON.stringify(myObj);

        if(nomefamiglia==''){
            $("#nome-famiglia").parent().css("color","red");
        }else{
            $("#nome-famiglia").parent().removeAttr("style");
        }

        if(siglaFamiglia==''){
            $("#sigla-famiglia").parent().css("color","red");
        }else{
            $("#sigla-famiglia").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertCategory",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire la nuova famiglia');
                    }else{
                        $("#error").html('Famiglia correttamente inserita');

                        var Newfamiglia = '';
                        $("select#modifica-famiglia").html('<option value="">Scegli</option>');
                        $("select#scelta-famiglia").html('<option value="">Scegli</option>');
                        $("#nome-famiglia").val('');
                        $("#sigla-famiglia").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
                            success: function (result) {
                                $.each(result.data, function(index,value){ Newfamiglia = Newfamiglia + '<option value="' + value.id + '" >' + value.symbol + ' - ' + value.name + '</option>'; });
                                $("select#modifica-famiglia").append(Newfamiglia);
                                $("select#scelta-famiglia").append(Newfamiglia);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire la nuova famiglia:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var nomefamiglia = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result) {
            $.each(result.data, function(index, value){ nomefamiglia = nomefamiglia + '<option value="' + value.id + '" >' + value.symbol + ' - ' + value.name + '</option>'; });
            $("select#modifica-famiglia").append(nomefamiglia);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-famiglia', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-famiglia').val() != ''){
            var Idfamiglia = $(this).find('select#modifica-famiglia').val();
        }else{
            var Idfamiglia = '';
            validazionecampi = false;
            error = error + "Selezionare la famiglia da modificare<br>";
        }

        if($(this).find('input#nuova-famiglia').val() != ''){
            var nomeFamiglia = $(this).find('input#nuova-famiglia').val();
        }else{
            var nomeFamiglia = '';
            validazionecampi = false;
            error = error + "Nome famiglia richiesto<br>";
        }

        if($(this).find('input#nuova-sigla-famiglia').val() != ''){
            var SiglaNuovaFamiglia = $(this).find('input#nuova-sigla-famiglia').val();
        }else{
            var SiglaNuovaFamiglia = '';
            validazionecampi = false;
            error = error + "Sigla famiglia richiesta<br>";
        }

        if(Idfamiglia==''){
            $("#modifica-famiglia").parent().css("color","red");
        }else{
            $("#modifica-famiglia").parent().removeAttr("style");
        }

        if(nomeFamiglia==''){
            $("#nuova-famiglia").parent().css("color","red");
        }else{
            $("#nuova-famiglia").parent().removeAttr("style");
        }

        if(SiglaNuovaFamiglia==''){
            $("#nuova-sigla-famiglia").parent().css("color","red");
        }else{
            $("#nuova-sigla-famiglia").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : Idfamiglia, "symbol" : SiglaNuovaFamiglia, "name" :  nomeFamiglia };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateCategory",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare la famiglia');
                    }else{
                        $("#error").html('Famiglia correttamente modificata');

                        var FamigliaNew = '';
                        $("select#modifica-famiglia").html('<option value="">Scegli</option>');
                        $("select#scelta-famiglia").html('<option value="">Scegli</option>');
                        $("#nuova-famiglia").val('');
                        $("#nuova-sigla-famiglia").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
                            success: function (result) {
                                $.each(result.data, function(index,value){ FamigliaNew = FamigliaNew + '<option value="' + value.id + '" >' + value.symbol + ' - ' + value.name + '</option>'; });
                                $("select#modifica-famiglia").append(FamigliaNew);
                                $("select#scelta-famiglia").append(FamigliaNew);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $('select#scelta-famiglia').on('change', function() {
        var categoryid = this.value;
        $("#modifica-sotto-famiglia").html('');
        var sottofamiglia = '';

        $.ajax({
            type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetSubCategoryForCategory?categoryid=" + categoryid,
            async:false,
            success: function (result) {
                $.each(result.data, function(index, value){ sottofamiglia = sottofamiglia + '<option value="' + value.id + '" >' + value.symbol + ' - ' + value.name + '</option>' });
                $("#modifica-sotto-famiglia").append(sottofamiglia);
            },
            error: function (request, status, errorThrown){}
        });
    });

    var nomeSotfamiglia = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result) {
            $.each(result.data, function(index, value){ nomeSotfamiglia = nomeSotfamiglia + '<option value="' + value.id + '" >' + value.symbol + ' - ' + value.name + '</option>'; });
            $("select#scelta-famiglia").append(nomeSotfamiglia);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-nuova-sotto-famiglia', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#scelta-famiglia').val() != ''){
            var FamigliaId = $(this).find('select#scelta-famiglia').val();
        }else{
            var FamigliaId = '';
            validazionecampi = false;
            error = error + "Selezionare la Famiglia <br>";
        }

        if($(this).find('input#nome-sotto-famiglia').val() != ''){
            var nomeSottoFamiglia = $(this).find('input#nome-sotto-famiglia').val();
        }else{
            var nomeSottoFamiglia = '';
            validazionecampi = false;
            error = error + "Nome sotto famiglia richiesta<br>";
        }

        if($(this).find('input#sigla-sotto-famiglia').val() != ''){
            var SiglaSottoFamiglia = $(this).find('input#sigla-sotto-famiglia').val();
        }else{
            var SiglaSottoFamiglia = '';
            validazionecampi = false;
            error = error + "Sigla sotto famiglia richiesta<br>";
        }

        if(SiglaSottoFamiglia==''){
            $("#sigla-sotto-famiglia").parent().css("color","red");
        }else{
            $("#sigla-sotto-famiglia").parent().removeAttr("style");
        }

        if(nomeSottoFamiglia==''){
            $("#nome-sotto-famiglia").parent().css("color","red");
        }else{
            $("#nome-sotto-famiglia").parent().removeAttr("style");
        }

        if(FamigliaId==''){
            $("#scelta-famiglia").parent().css("color","red");
        }else{
            $("#scelta-famiglia").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "categoryid" : FamigliaId, "name" :  nomeSottoFamiglia, "symbol" : SiglaSottoFamiglia };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertSubCategory",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire la nuova sotto famiglia');
                    }else{
                        $("#error").html('Sotto famiglia correttamente inserita');

                        var Newfamiglia = '';
                        $("select#modifica-sotto-famiglia").html('<option value="">Scegli</option>');
                        $("#nome-sotto-famiglia").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllSubcategory",
                            success: function (result) {
                                $.each(result.data, function(index,value){ Newfamiglia = Newfamiglia + '<option value="' + value.id + '" >' + value.symbol + ' - ' + value.name + '</option>'; });
                                $("select#modifica-sotto-famiglia").append(Newfamiglia);
                                $("#nome-sotto-famiglia").val('');
                                $("#sigla-sotto-famiglia").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire la nuova sotto famiglia:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-modifica-sotto-famiglia', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-sotto-famiglia').val() != ''){
            var Idsottofamiglia = $(this).find('select#modifica-sotto-famiglia').val();
        }else{
            var Idsottofamiglia = '';
            validazionecampi = false;
            error = error + "Selezionare la famiglia da modificare<br>";
        }

        if($(this).find('input#nuova-sotto-famiglia').val() != ''){
            var nomesottoFamiglia = $(this).find('input#nuova-sotto-famiglia').val();
        }else{
            var nomesottoFamiglia = '';
            validazionecampi = false;
            error = error + "Nome sotto famiglia richiesto<br>";
        }

        if($(this).find('input#nuova-sigla-sotto-famiglia').val() != ''){
            var SiglasottoFamiglia = $(this).find('input#nuova-sigla-sotto-famiglia').val();
        }else{
            var SiglasottoFamiglia = '';
            validazionecampi = false;
            error = error + "Sigla famiglia richiesto<br>";
        }

        if(Idsottofamiglia==''){
            $("#modifica-sotto-famiglia").parent().css("color","red");
        }else{
            $("#modifica-sotto-famiglia").parent().removeAttr("style");
        }

        if(nomesottoFamiglia==''){
            $("#nuova-sotto-famiglia").parent().css("color","red");
        }else{
            $("#nuova-sotto-famiglia").parent().removeAttr("style");
        }

        if(SiglasottoFamiglia==''){
            $("#nuova-sotto-famiglia").parent().css("color","red");
        }else{
            $("#nuova-sotto-famiglia").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : Idsottofamiglia, "name" : nomesottoFamiglia, "symbol" : SiglasottoFamiglia };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateSubcategory",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    var FamigliaNew = '';

                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare la famiglia');
                    }else{
                        $("#error").html('Famiglia correttamente modificata');

                        var FamigliaNew = '';
                        $("select#modifica-famiglia").html('<option value="">Scegli</option>');
                        $("#nuova-famiglia").val('');
                        $("select#modifica-sotto-famiglia").html('<option value="">Scegli</option>');
                        $("#nuova-sotto-famiglia").val('');
                        $("#nuova-sigla-sotto-famiglia").val('');
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-pm', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuovo-pm').val() != ''){
            var nomePM = $(this).find('input#nuovo-pm').val();
        }else{
            var nomePM = '';
            validazionecampi = false;
            error = error + "Nome PM richiesto<br>";
        }

        var myObj;
        myObj = { "name" : nomePM};
        var myJSON = JSON.stringify(myObj);

        if(nomePM==''){
            $("#nuovo-pm").parent().css("color","red");
        }else{
            $("#nuovo-pm").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertProductManager",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il PM');
                    }else{
                        $("#error").html('PM correttamente inserito');

                        var Pm = '';
                        $("select#modifica-pm").html('<option value="">Scegli</option>');
                        $("#nuovo-pm").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProductManager",
                            success: function (result) {
                                $.each(result.data, function(index, value){ Pm = Pm + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-pm").append(Pm);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo PM:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var Pmanager = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProductManager",
        success: function (result) {
            $.each(result.data, function(index, value){ Pmanager = Pmanager + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-pm").append(Pmanager);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-pm', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-pm').val() != ''){
            var IdPM = $(this).find('select#modifica-pm').val();
        }else{
            var IdPM = '';
            validazionecampi = false;
            error = error + "Selezionare il PM da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-pm').val() != ''){
            var nomeNuovoPM = $(this).find('input#nuovo-valore-pm').val();
        }else{
            var nomeNuovoPM = '';
            validazionecampi = false;
            error = error + "Nome PM richiesto<br>";
        }

        if(IdPM==''){
            $("#modifica-pm").parent().css("color","red");
        }else{
            $("#modifica-pm").parent().removeAttr("style");
        }

        if(nomeNuovoPM==''){
            $("#nuovo-valore-pm").parent().css("color","red");
        }else{
            $("#nuovo-valore-pm").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : IdPM, "name" :  nomeNuovoPM };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateProductManager",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il PM');
                    }else{
                        $("#error").html('PM correttamente modificata');

                        var PMNew = '';
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProductManager",
                            success: function (result) {
                                $("select#modifica-pm").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ PMNew = PMNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-pm").append(PMNew);
                                $("#nuovo-valore-pm").val('');
                            },
                            error: function (request, status, errorThrown) {}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-iva', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#valore-iva').val() != ''){
            var Iva = $(this).find('input#valore-iva').val();
        }else{
            var Iva = '';
            validazionecampi = false;
            error = error + "Valore IVA richiesto<br>";
        }

        var myObj;
        myObj = { "name" : Iva};
        var myJSON = JSON.stringify(myObj);

        if(Iva==''){
            $("#valore-iva").parent().css("color","red");
        }else{
            $("#valore-iva").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertIVA",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('IVA correttamente inserita');

                        var NewIva = '';
                        $("select#modifica-valore-iva").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-iva").val('');
                        $("#valore-iva").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllIVA",
                            success: function (result) {
                                $.each(result.data, function(index, value){ NewIva = NewIva + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-valore-iva").append(NewIva);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown) {}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var selectIva = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllIVA",
        success: function (result) {
            $.each(result.data, function(index, value){ selectIva = selectIva + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-valore-iva").append(selectIva);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-valore-iva', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-valore-iva').val() != ''){
            var IdIVA = $(this).find('select#modifica-valore-iva').val();
        }else{
            var IdIVA = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-iva').val() != ''){
            var nomeIva = $(this).find('input#nuovo-valore-iva').val();
        }else{
            var nomeIva = '';
            validazionecampi = false;
            error = error + "Valore IVA richiesto<br>";
        }

        if(IdIVA==''){
            $("#modifica-valore-iva").parent().css("color","red");
        }else{
            $("#modifica-valore-iva").parent().removeAttr("style");
        }

        if(nomeIva==''){
            $("#nuovo-valore-iva").parent().css("color","red");
        }else{
            $("#nuovo-valore-iva").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : IdIVA, "name" :  nomeIva };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateIVA",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore IVA correttamente modificata');
                        var IVANew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllIVA",
                            success: function (result) {
                                $("select#modifica-valore-iva").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ IVANew = IVANew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-valore-iva").append(IVANew);
                                $("#nuovo-valore-iva").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-ecotassa', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#valore-ecotassa').val() != ''){
            var ecotassa = $(this).find('input#valore-ecotassa').val();
        }else{
            var ecotassa = '';
            validazionecampi = false;
            error = error + "Valore Ecotassa richiesto<br>";
        }

        var myObj;
        myObj = { "name" : ecotassa};
        var myJSON = JSON.stringify(myObj);

        if(ecotassa==''){
            $("#valore-ecotassa").parent().css("color","red");
        }else{
            $("#valore-ecotassa").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertEtax",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Ecotassa correttamente inserita');

                        var Newecotassa = '';
                        $("select#modifica-ecotassa").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-ecotassa").val('');
                        $("#valore-ecotassa").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllEtax",
                            success: function (result) {
                                $.each(result.data, function(index, value){ Newecotassa = Newecotassa + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-ecotassa").append(Newecotassa);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown) {}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var selectEcotassa = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllEtax",
        success: function (result) {
            $.each(result.data, function(index, value){ selectEcotassa = selectEcotassa + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-ecotassa").append(selectEcotassa);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-ecotassa', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-ecotassa').val() != ''){
            var Idecotassa = $(this).find('select#modifica-ecotassa').val();
        }else{
            var Idecotassa = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-ecotassa').val() != ''){
            var nomeEcotassa = $(this).find('input#nuovo-valore-ecotassa').val();
        }else{
            var nomeEcotassa = '';
            validazionecampi = false;
            error = error + "Valore ecotassa richiesto<br>";
        }

        if(Idecotassa==''){
            $("#modifica-ecotassa").parent().css("color","red");
        }else{
            $("#modifica-ecotassa").parent().removeAttr("style");
        }

        if(nomeEcotassa==''){
            $("#nuovo-valore-ecotassa").parent().css("color","red");
        }else{
            $("#nuovo-valore-ecotassa").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : Idecotassa, "name" :  nomeEcotassa };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateEtax",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var nomeEcotassaNew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllEtax",
                            success: function (result) {
                                $("select#modifica-ecotassa").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ nomeEcotassaNew = nomeEcotassaNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-ecotassa").append(nomeEcotassaNew);
                                $("#nuovo-valore-ecotassa").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-formulazione', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuova-formulazione').val() != ''){
            var Formulation = $(this).find('input#nuova-formulazione').val();
        }else{
            var Formulation = '';
            validazionecampi = false;
            error = error + "Valore formulazione richiesto<br>";
        }

        var myObj;
        myObj = { "name" : Formulation};
        var myJSON = JSON.stringify(myObj);

        if(Formulation==''){
            $("#nuova-formulazione").parent().css("color","red");
        }else{
            $("#nuova-formulazione").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertFormulation",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Formulazione correttamente inserita');

                        var Newformulazione = '';
                        $("select#modifica-formulazione").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-formulazione").val('');
                        $("#nuova-formulazione").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllFormulation",
                            success: function (result) {
                                $.each(result.data, function(index, value){ Newformulazione = Newformulazione + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-formulazione").append(Newformulazione);
                            },
                            error: function (request, status, errorThrown) {}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var selectFormulazione = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllFormulation",
        success: function (result) {
            $.each(result.data, function(index, value){ selectFormulazione = selectFormulazione + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-formulazione").append(selectFormulazione);
        },
        error: function (request, status, errorThrown) {}
    });

    $(document).on('submit', '.form-modifica-formulazione', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-formulazione').val() != ''){
            var IdFormulazione = $(this).find('select#modifica-formulazione').val();
        }else{
            var IdFormulazione = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-formulazione').val() != ''){
            var nomeFormulazione = $(this).find('input#nuovo-valore-formulazione').val();
        }else{
            var nomeFormulazione = '';
            validazionecampi = false;
            error = error + "Valore ecotassa richiesto<br>";
        }

        if(IdFormulazione==''){
            $("#modifica-formulazione").parent().css("color","red");
        }else{
            $("#modifica-formulazione").parent().removeAttr("style");
        }

        if(nomeFormulazione==''){
            $("#nuovo-valore-formulazione").parent().css("color","red");
        }else{
            $("#nuovo-valore-formulazione").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : IdFormulazione, "name" :  nomeFormulazione };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateFormulation",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var nomeEcotassaNew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllFormulation",
                            success: function (result) {
                                $("select#modifica-formulazione").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ nomeEcotassaNew = nomeEcotassaNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-formulazione").append(nomeEcotassaNew);
                                $("#nuovo-valore-formulazione").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-avvertenza', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuova-avvertenza').val() != ''){
            var Avvertenza = $(this).find('input#nuova-avvertenza').val();
        }else{
            var Avvertenza = '';
            validazionecampi = false;
            error = error + "Nuovo valore richiesto<br>";
        }

        var myObj;
        myObj = { "name" : Avvertenza};
        var myJSON = JSON.stringify(myObj);

        if(Avvertenza==''){
            $("#nuova-avvertenza").parent().css("color","red");
        }else{
            $("#nuova-avvertenza").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertAdviceClp",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Avvertenza correttamente inserita');

                        var NewAvvertenza = '';
                        $("select#modifica-avvertenza").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-avvertenza").val('');
                        $("#nuova-avvertenza").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllAdviceClp",
                            success: function (result) {
                                $.each(result.data, function(index, value){ NewAvvertenza = NewAvvertenza + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-avvertenza").append(NewAvvertenza);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var selectAvvertenza = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllAdviceClp",
        success: function (result) {
            $.each(result.data, function(index, value){ selectAvvertenza = selectAvvertenza + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-avvertenza").append(selectAvvertenza);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-avvertenza', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-avvertenza').val() != ''){
            var Idavvertenza = $(this).find('select#modifica-avvertenza').val();
        }else{
            var Idavvertenza = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-avvertenza').val() != ''){
            var nomeavvertenza = $(this).find('input#nuovo-valore-avvertenza').val();
        }else{
            var nomeavvertenza = '';
            validazionecampi = false;
            error = error + "Valore avvertenza richiesto<br>";
        }

        if(Idavvertenza==''){
            $("#modifica-avvertenza").parent().css("color","red");
        }else{
            $("#modifica-avvertenza").parent().removeAttr("style");
        }

        if(nomeavvertenza==''){
            $("#nuovo-valore-avvertenza").parent().css("color","red");
        }else{
            $("#nuovo-valore-avvertenza").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : Idavvertenza, "name" :  nomeavvertenza };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateAdviceClp",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var AvvertenzaNew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllAdviceClp",
                            success: function (result) {
                                $("select#modifica-avvertenza").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ AvvertenzaNew = AvvertenzaNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-avvertenza").append(AvvertenzaNew);
                                $("#nuovo-valore-avvertenza").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-fornitore', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuovo-fornitore').val() != ''){
            var Fornitore = $(this).find('input#nuovo-fornitore').val();
        }else{
            var Fornitore = '';
            validazionecampi = false;
            error = error + "Nuovo valore richiesto<br>";
        }

        var myObj;
        myObj = { "name" : Fornitore};
        var myJSON = JSON.stringify(myObj);

        if(Fornitore==''){
            $("#nuovo-fornitore").parent().css("color","red");
        }else{
            $("#nuovo-fornitore").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertProvider",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Valore correttamente inserito');

                        var Newfornitore = '';
                        $("select#modifica-fornitore").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-fornitore").val('');
                        $("#nuovo-fornitore").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
                            success: function (result) {
                                $.each(result.data, function(index, value){ Newfornitore = Newfornitore + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-fornitore").append(Newfornitore);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var selectFornitore = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
        success: function (result) {
            $.each(result.data, function(index, value){ selectFornitore = selectFornitore + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-fornitore").append(selectFornitore);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-fornitore', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-fornitore').val() != ''){
            var IdFornitore = $(this).find('select#modifica-fornitore').val();
        }else{
            var IdFornitore = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-fornitore').val() != ''){
            var nomeFornitore = $(this).find('input#nuovo-valore-fornitore').val();
        }else{
            var nomeFornitore = '';
            validazionecampi = false;
            error = error + "Valore richiesto<br>";
        }

        if(IdFornitore==''){
            $("#modifica-fornitore").parent().css("color","red");
        }else{
            $("#modifica-fornitore").parent().removeAttr("style");
        }

        if(nomeFornitore==''){
            $("#nuovo-valore-fornitore").parent().css("color","red");
        }else{
            $("#nuovo-valore-fornitore").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : IdFornitore, "name" :  nomeFornitore };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateProvider",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var FornitoreNew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllProvider",
                            success: function (result) {
                                $("select#modifica-fornitore").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ FornitoreNew = FornitoreNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-fornitore").append(FornitoreNew);
                                $("#nuovo-valore-fornitore").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-fraseh', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuova-fraseh').val() != ''){
            var FraseH = $(this).find('input#nuova-fraseh').val();
        }else{
            var FraseH = '';
            validazionecampi = false;
            error = error + "Nuovo valore richiesto<br>";
        }

        var myObj;
        myObj = { "name" : FraseH};
        var myJSON = JSON.stringify(myObj);

        if(FraseH==''){
            $("#nuova-fraseh").parent().css("color","red");
        }else{
            $("#nuova-fraseh").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertHazardCodeClp",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Valore correttamente inserito');

                        var NewH = '';
                        $("select#modifica-fraseh").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-fraseh").val('');
                        $("#nuova-fraseh").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllHazardCodeClp",
                            success: function (result) {
                                $.each(result.data, function(index, value){ NewH = NewH + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-fraseh").append(NewH);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var selectH = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllHazardCodeClp",
        success: function (result) {
            $.each(result.data, function(index, value){ selectH = selectH + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-fraseh").append(selectH);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-fraseh', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-fraseh').val() != ''){
            var IdFraseH = $(this).find('select#modifica-fraseh').val();
        }else{
            var IdFraseH = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-fraseh').val() != ''){
            var nomeFraseH = $(this).find('input#nuovo-valore-fraseh').val();
        }else{
            var nomeFraseH = '';
            validazionecampi = false;
            error = error + "Valore richiesto<br>";
        }

        if(IdFraseH==''){
            $("#modifica-fraseh").parent().css("color","red");
        }else{
            $("#modifica-fraseh").parent().removeAttr("style");
        }

        if(nomeFraseH==''){
            $("#nuovo-valore-fraseh").parent().css("color","red");
        }else{
            $("#nuovo-valore-fraseh").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : IdFraseH, "name" :  nomeFraseH };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateHazardCodeClp",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var FraseHNew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllHazardCodeClp",
                            success: function (result) {
                                $("select#modifica-fraseh").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ FraseHNew = FraseHNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-fraseh").append(FraseHNew);
                                $("#nuovo-valore-fraseh").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-gruppo-imballaggio', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuovo-gruppo-imballaggio').val() != ''){
            var Gruppo = $(this).find('input#nuovo-gruppo-imballaggio').val();
        }else{
            var Gruppo = '';
            validazionecampi = false;
            error = error + "Nuovo valore richiesto<br>";
        }

        var myObj;

        myObj = { "name" : Gruppo};
        var myJSON = JSON.stringify(myObj);

        if(Gruppo==''){
            $("#nuovo-gruppo-imballaggio").parent().css("color","red");
        }else{
            $("#nuovo-gruppo-imballaggio").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertPackingGroup",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Valore correttamente inserito');

                        var NewGruppo = '';
                        $("select#modifica-gruppo-imballaggio").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-gruppo-imballaggio").val('');
                        $("#nuovo-gruppo-imballaggio").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPackingGroup",
                            success: function (result) {
                                $.each(result.data, function(index, value){ NewGruppo = NewGruppo + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-gruppo-imballaggio").append(NewGruppo);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var GruppoImb = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPackingGroup",
        success: function (result) {
            $.each(result.data, function(index, value){ GruppoImb = GruppoImb + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-gruppo-imballaggio").append(GruppoImb);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-gruppo-imballaggio', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-gruppo-imballaggio').val() != ''){
            var IdGruppo = $(this).find('select#modifica-gruppo-imballaggio').val();
        }else{
            var IdGruppo = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-gruppo-imballaggio').val() != ''){
            var nomeGruppo = $(this).find('input#nuovo-valore-gruppo-imballaggio').val();
        }else{
            var nomeGruppo = '';
            validazionecampi = false;
            error = error + "Valore richiesto<br>";
        }

        if(IdGruppo==''){
            $("#modifica-gruppo-imballaggio").parent().css("color","red");
        }else{
            $("#modifica-gruppo-imballaggio").parent().removeAttr("style");
        }

        if(nomeGruppo==''){
            $("#nuovo-valore-gruppo-imballaggio").parent().css("color","red");
        }else{
            $("#nuovo-valore-gruppo-imballaggio").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : IdGruppo, "name" :  nomeGruppo };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdatePackingGroup",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var GruppoNew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllPackingGroup",
                            success: function (result){
                                $("select#modifica-gruppo-imballaggio").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ GruppoNew = GruppoNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-gruppo-imballaggio").append(GruppoNew);
                                $("#nuovo-valore-gruppo-imballaggio").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-onu', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuovo-onu').val() != ''){
            var Onu = $(this).find('input#nuovo-onu').val();
        }else{
            var Onu = '';
            validazionecampi = false;
            error = error + "Nuovo valore richiesto<br>";
        }

        var myObj;
        myObj = { "name" : Onu};
        var myJSON = JSON.stringify(myObj);

        if(Onu==''){
            $("#nuovo-onu").parent().css("color","red");
        }else{
            $("#nuovo-onu").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertTransportationCode",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Valore correttamente inserito');

                        var NewOnu = '';
                        $("select#modifica-onu").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-onu").val('');
                        $("#nuovo-onu").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllTransportationCode",
                            success: function (result) {
                                $.each(result.data, function(index, value){ NewOnu = NewOnu + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-onu").append(NewOnu);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var OnuAdr = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllTransportationCode",
        success: function (result) {
            $.each(result.data, function(index, value){ OnuAdr = OnuAdr + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-onu").append(OnuAdr);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-onu', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-onu').val() != ''){
            var IdOnu = $(this).find('select#modifica-onu').val();
        }else{
            var IdOnu = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-onu').val() != ''){
            var nomeOnu = $(this).find('input#nuovo-valore-onu').val();
        }else{
            var nomeOnu = '';
            validazionecampi = false;
            error = error + "Valore richiesto<br>";
        }

        if(IdOnu==''){
            $("#modifica-onu").parent().css("color","red");
        }else{
            $("#modifica-onu").parent().removeAttr("style");
        }

        if(nomeOnu==''){
            $("#nuovo-valore-onu").parent().css("color","red");
        }else{
            $("#nuovo-valore-onu").parent().removeAttr("style");
        }

        if(validazionecampi){
            var myObj;
            myObj = { "id" : IdOnu, "name" :  nomeOnu };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateTransportationCode",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var OnuNew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllTransportationCode",
                            success: function (result) {
                                $("select#modifica-onu").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ OnuNew = OnuNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-onu").append(OnuNew);
                                $("#nuovo-valore-onu").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-adr', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuovo-adr').val() != ''){
            var ADR = $(this).find('input#nuovo-adr').val();
        }else{
            var ADR = '';
            validazionecampi = false;
            error = error + "Nuovo valore richiesto<br>";
        }

        var myObj;
        myObj = { "name" : ADR};
        var myJSON = JSON.stringify(myObj);

        if(ADR==''){
            $("#nuovo-adr").parent().css("color","red");
        }else{
            $("#nuovo-adr").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertADRClassification",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Valore correttamente inserito');

                        var NewADR = '';
                        $("select#modifica-adr").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-adr").val('');
                        $("#nuovo-adr").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllADRClassification",
                            success: function (result) {
                                $.each(result.data, function(index, value){ NewADR = NewADR + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-adr").append(NewADR);
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var GetAdr = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllADRClassification",
        success: function (result) {
            $.each(result.data, function(index, value){ GetAdr = GetAdr + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-adr").append(GetAdr);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-adr', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-adr').val() != ''){
            var Idadr = $(this).find('select#modifica-adr').val();
        }else{
            var Idadr = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-adr').val() != ''){
            var nomeadr = $(this).find('input#nuovo-valore-adr').val();
        }else{
            var nomeadr = '';
            validazionecampi = false;
            error = error + "Valore richiesto<br>";
        }

        if(Idadr==''){
            $("#modifica-adr").parent().css("color","red");
        }else{
            $("#modifica-adr").parent().removeAttr("style");
        }

        if(nomeadr==''){
            $("#nuovo-valore-adr").parent().css("color","red");
        }else{
            $("#nuovo-valore-adr").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : Idadr, "name" :  nomeadr };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateADRClassification",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var adrNew = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllADRClassification",
                            success: function (result) {
                                $("select#modifica-adr").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ adrNew = adrNew + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-adr").append(adrNew);
                                $("#nuovo-valore-adr").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $(document).on('submit', '.form-seveso', function(e) {
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('input#nuovo-seveso').val() != ''){
            var seveso = $(this).find('input#nuovo-seveso').val();
        }else{
            var seveso = '';
            validazionecampi = false;
            error = error + "Nuovo valore richiesto<br>";
        }

        var myObj;
        myObj = { "name" : seveso};
        var myJSON = JSON.stringify(myObj);

        if(seveso==''){
            $("#nuovo-seveso").parent().css("color","red");
        }else{
            $("#nuovo-seveso").parent().removeAttr("style");
        }

        if(validazionecampi){
            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/InsertClassificazioneSeveso",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile inserire il nuovo valore');
                    }else{
                        $("#error").html('Valore correttamente inserito');

                        var NewSeveso = '';
                        $("select#modifica-seveso").html('<option value="">Scegli</option>');
                        $("#nuovo-valore-seveso").val('');
                        $("#nuovo-seveso").val('');
                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllClassificazioneSeveso",
                            success: function (result) {
                                $.each(result.data, function(index, value){ NewSeveso = NewSeveso + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-seveso").append(NewSeveso);
                            },
                            error: function (request, status, errorThrown) {}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html('Impossibile inserire il nuovo valore:<br>' + error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    var Getseveso = '';
    $.ajax({
        type: "GET",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllClassificazioneSeveso",
        success: function (result) {
            $.each(result.data, function(index, value){ Getseveso = Getseveso + '<option value="' + value.id + '" >' + value.name + '</option>'; });
            $("select#modifica-seveso").append(Getseveso);
        },
        error: function (request, status, errorThrown){}
    });

    $(document).on('submit', '.form-modifica-seveso', function(e){
       e.preventDefault();

        var validazionecampi = true;
        var error ='';

        if($(this).find('select#modifica-seveso').val() != ''){
            var Idseveso = $(this).find('select#modifica-seveso').val();
        }else{
            var Idseveso = '';
            validazionecampi = false;
            error = error + "Selezionare il valore da modificare<br>";
        }

        if($(this).find('input#nuovo-valore-seveso').val() != ''){
            var nomeseveso = $(this).find('input#nuovo-valore-seveso').val();
        }else{
            var nomeseveso = '';
            validazionecampi = false;
            error = error + "Valore richiesto<br>";
        }

        if(Idseveso==''){
            $("#modifica-seveso").parent().css("color","red");
        }else{
            $("#modifica-seveso").parent().removeAttr("style");
        }

        if(nomeseveso==''){
            $("#nuovo-valore-seveso").parent().css("color","red");
        }else{
            $("#nuovo-valore-seveso").parent().removeAttr("style");
        }

        if(validazionecampi){

            var myObj;
            myObj = { "id" : Idseveso, "name" :  nomeseveso };
            var myJSON = JSON.stringify(myObj);

            $.ajax({
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                    request.setRequestHeader("Content-Type", "application/json")
                },
                url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/UpdateClassificazioneSeveso",
                contentType: true,
                processData: false,
                async:false,
                data: myJSON,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $("#error").html('Impossibile modificare il valore');
                    }else{
                        $("#error").html('Valore correttamente modificato');
                        var Newseveso = '';

                        $.ajax({
                            type: "GET",
                                beforeSend: function (request) {
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                },
                            url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllClassificazioneSeveso",
                            success: function (result) {
                                $("select#modifica-seveso").html('<option value="">Scegli</option>');
                                $.each(result.data, function(index, value){ Newseveso = Newseveso + '<option value="' + value.id + '" >' + value.name + '</option>'; });
                                $("select#modifica-seveso").append(Newseveso);
                                $("#nuovo-valore-seveso").val('');
                            },
                            error: function (request, status, errorThrown){}
                        });
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                },
                 error: function (request, status, errorThrown){}
            });
        }else{
            $("#error").html(error);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });
</script>
@stop
