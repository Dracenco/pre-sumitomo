<?php $ruoli = Session::get('permessi'); ?>
<script>
    var cat="<?php if(isset($cat)){ echo $cat; }else{ echo ''; } ?>";
    var url_prodotti='{{ url("prodotti") }}';
    var prodotto="<?php if(isset($prodotto)){ echo $prodotto; }else{ echo ''; } ?>";
    var idprodotto="<?php if(isset($id)){ echo $id; }else{ echo ''; } ?>";
</script>

@extends('layout.header')
@section('title', 'Storico prodotto')
@section('content')
@include('layout.menu')

      <section id="content-scheda-prodotto" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("prodotti") }}'>Prodotti</a></li>
                        <li><a href='{{ url("prodotti/".$categoria) }}' id="breadcrumbs_categoria"></a></li>
                        <li><a href='{{ url("prodotto/".$categoria."/".$prodotto."/".$id) }}' id="nome-prodotto"></a></li>
                        <li class="disabled">Storico prodotto</li>
                    </ul>
                </nav>
            </div>
        </div>
        @if ($ruoli['database prodotti'] != 'N')
        @include('layout.menu-pulsanti-prodotto')

          <div class="expanded row">
             <div class="medium-12 large-12 columns">

                <div class="contenitore-tab-scheda-prodotto">
                    <ul class="accordion" data-accordion>
                        <li class="accordion-item " data-accordion-item>
                            <a href="#" class="accordion-title">Storico Upload SDS</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info" style="padding:0">
                                    <div class="expanded row collapse" style="border:0;">
                                        <div class="medium-12 large-12 columns">
                                            <table id="elenco-codici" class="elenco-sds">
                                              <thead>
                                                <tr>
                                                  <th width="520">SDS</th>
                                                  <th width="230">DATA UPLOAD</th>
                                                  <th width="230">DATA CREAZIONE</th>
                                                  <th width="230">UTENTE</th>
                                                  <th></th>
                                                </tr>
                                              </thead>
                                              <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item" data-accordion-item>
                            <a href="#" class="accordion-title">Storico Upload Et. Ministeriali</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info" style="padding:0">
                                    <div class="expanded row collapse" style="border:0;">
                                        <div class="medium-12 large-12 columns">
                                            <table id="elenco-codici" class="elenco-et">
                                              <thead>
                                                <tr>
                                                  <th width="520">ET. MINISTERIALI</th>
                                                  <th width="230">DATA UPLOAD</th>
                                                  <th width="230">DATA CREAZIONE</th>
                                                  <th width="230">UTENTE</th>
                                                  <th></th>
                                                </tr>
                                              </thead>
                                              <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item" data-accordion-item>
                            <a href="#" class="accordion-title">Storico Upload Logo</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info" style="padding:0">
                                    <div class="expanded row collapse" style="border:0;">
                                        <div class="medium-12 large-12 columns">
                                            <table id="elenco-codici" class="elenco-logo">
                                              <thead>
                                                <tr>
                                                  <th width="520">LOGO</th>
                                                  <th width="230">DATA UPLOAD</th>
                                                  <th width="230">DATA CREAZIONE</th>
                                                  <th width="230">UTENTE</th>
                                                  <th></th>
                                                </tr>
                                              </thead>
                                              <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item" data-accordion-item>
                            <a href="#" class="accordion-title">Storico Artwork</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info" style="padding:0">
                                  <div class="expanded row collapse" style="border:0;">
                                        <div class="medium-12 large-12 columns">
                                            <table id="elenco-codici" class="elenco-artwork">
                                              <thead>
                                                <tr>
                                                  <th width="520">ARTWORK</th>
                                                  <th width="230">DATA UPLOAD</th>
                                                  <th width="230">DATA CREAZIONE</th>
                                                  <th width="230">UTENTE</th>
                                                  <th></th>
                                                </tr>
                                              </thead>
                                              <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion-item is-active" data-accordion-item>
                            <a href="#" class="accordion-title">Storico modifiche prodotto</a>
                            <div class="accordion-content" data-tab-content>
                                <div class="contenitore-info" style="padding:0">
                                 <div class="expanded row collapse" style="border:0;">
                                     <div class="medium-12 large-12 columns">
                                         <table id="elenco-codici" class="storico-modifiche">
                                             <thead>
                                                <tr>
                                                  <th width="600">MODIFICHE PRODOTTO</th>
                                                  <th width="300">DATA MODIFICA</th>
                                                  <th>UTENTE</th>
                                                  <th></th>
                                                </tr>
                                             </thead>
                                             <tbody></tbody>
                                         </table>
                                     </div>
                                 </div>
                                </div>
                            </div>
                        </li>
                    </ul>
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
        url: "{{ config('constants.UrlWebService') }}api/Products/Get?code=" + prodotto,
        success: function (result) {
            var src = "{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + result.data.logo.id;
            $("#logo-prodotto").append("<img src='" + src + "' />");
            $("#breadcrumbs_categoria").append(result.data.categoria.name);
            $(".breadcrumbs li a#nome-prodotto").append(result.data.name);
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request){
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/GestioneCampi/GetAllCategory",
        success: function (result) {
            $.each(result.data, function(index, value){
                var categoria_attiva='';
                url_prodotto= "{{ url('prodotti') }}/" + value.id;

                if(cat == value.id){ categoria_attiva='class="categoria-attiva"';
                }else{ categoria_attiva=''; }

                $("ul.menu").append('<li> <a href="{!! url("prodotti") !!}' + '/' + value.id + '" ' + categoria_attiva + ' >' + value.name + '</a></li>');
            });
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request){
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetStorico?code=" + prodotto,
        success: function (result){

            var sds = '';
            var et = '';
            var logo = '';
            var artwork = '';
            var download = '';

            $.each(result.data.uploadSDS, function(index, value){
               download="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.fileID;
               sds = sds + '<tr><td>' + value.fileName + '</td><td>' + formatoData(value.uploadDate) + '</td><td>' + formatoData(value.createDate) + '</td><td>' + value.createdBy + '</td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a></td></tr>';
            });
            $(".elenco-sds tbody").append(sds);

            $.each(result.data.uploadEtichettaMinisteriale, function(index, value){
               download="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.fileID;
               et = et + '<tr><td>' + value.fileName + '</td><td>' + formatoData(value.uploadDate) + '</td><td>' + formatoData(value.createDate) + '</td><td>' + value.createdBy + '</td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a></td></tr>';
            });
            $(".elenco-et tbody").append(et);

            $.each(result.data.uploadLogo, function(index, value){
               download="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.fileID;
               logo = logo + '<tr><td>' + value.fileName + '</td><td>' + formatoData(value.uploadDate) + '</td><td>' + formatoData(value.createDate) + '</td><td>' + value.createdBy + '</td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a></td></tr>';
            });
            $(".elenco-logo tbody").append(logo);

            $.each(result.data.uploadArtwork, function(index, value){
               download="{{ config('constants.UrlWebService') }}api/Download/DownloadFile?fileId=" + value.fileID;
               artwork = artwork + '<tr><td>' + value.fileName + '</td><td>' + formatoData(value.createDate) + '</td><td>' + formatoData(value.createDate) + '</td><td>' + value.createdBy + '</td><td><a href="' + download + '"><img src="{{ URL::asset('img/download.png') }}"></a></td></tr>';
            });
            $(".elenco-artwork tbody").append(artwork);
        },
        error: function (request, status, errorThrown) {}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request){
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Products/GetStoricoModifiche?code=" + prodotto,
        success: function (result){
            var stringModifiche = '';
            var count=1;

            $.each(result.data, function(index, value){
              var dataJson = value.last_modified_date;
              var date = new Date(parseInt(dataJson.replace(/(^.*\()|([+-].*$)/g, '')) );
              var dateformat = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();

              if(value.name_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica nome prodotto</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.name_old + '</div></div></div></div></td></tr>';
                count++;
              }

              if(value.logo_name_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica logo prodotto</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.logo_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.logo_name_old + '</div></div></div></div></td></tr>';
                count++;
              }

              if(value.composition_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica Composizione</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.composition + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.composition_old + '</div></div></div></div></td></tr>';
                count++;
              }

              if(value.registration_number_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica numero di registrazione</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.registration_number + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.registration_number_old + '</div></div></div></div></td></tr>';
                count++;
              }

              if(value.registration_date_old != null){
                var dataRegistrationJson = value.registration_date;
                var dateReg = new Date(parseInt(dataRegistrationJson.replace(/(^.*\()|([+-].*$)/g, '')) );
                var dateRegFormat = dateReg.getDate() + "/" + (dateReg.getMonth() + 1) + "/" + dateReg.getFullYear();

                var dataRegistrationOldJson = value.registration_date_old;
                var dateRegOld = new Date(parseInt(dataRegistrationOldJson.replace(/(^.*\()|([+-].*$)/g, '')) );
                var dateRegOldformat = dateRegOld.getDate() + "/" + (dateRegOld.getMonth() + 1) + "/" + dateRegOld.getFullYear();

                stringModifiche = stringModifiche + '<tr><td width="600">Modifica data di registrazione</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + dateRegFormat + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + dateRegOldformat + '</div></div></div></div></td></tr>';
                count++;
              }

              if(value.company_name_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica linea distributiva</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.company_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.company_name_old + '</div></div></div></div></td></tr>';
                count++;
              }

              if(value.category_product_name_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica famiglia</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.category_product_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.category_product_name_old + '</div></div></div></div></td></tr>';
                count++;
              }

              if(value.sub_category_product_name_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica sotto famiglia</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.sub_category_product_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.sub_category_product_name_old + '</div></div></div></div></td></tr>';
                count++;
              }

             if(value.provider_name_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica fornitore</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.provider_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.provider_name_old + '</div></div></div></div></td></tr>';
                count++;
              }

             if(value.product_manager_name_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica PM</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.product_manager_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.product_manager_name_old + '</div></div></div></div></td></tr>';
                count++;
              }

              if(value.formulation_name_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica formulazione</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.formulation_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.formulation_name_old + '</div></div></div></div></td></tr>';
                count++;
              }

             if(value.miscibilita_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica miscibilità</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.miscibilita + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.miscibilita_old + '</div></div></div></div></td></tr>';
                count++;
              }

            if(value.short_description_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica descrizione sintetica</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.short_description + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.short_description_old + '</div></div></div></div></td></tr>';
                count++;
              }

            if(value.characteristics_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica caratteristiche</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.characteristics + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.characteristics_old + '</div></div></div></div></td></tr>';
                count++;
              }

            if(value.indication_use_old != null){
                stringModifiche = stringModifiche + '<tr><td width="600">Modifica indicazioni d\'uso</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.indication_use + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.indication_use_old + '</div></div></div></div></td></tr>';
                count++;
              }

            if(value.site_old != null){
              if(value.site==true){ var site = "Si"; }
              if(value.site==false){ var site = "No"; }
              if(value.site_old==true){ var site_old = "Si"; }
              if(value.site_old==false){ var site_old = "No"; }

              if(value.site==true){}
              stringModifiche = stringModifiche + '<tr><td width="600">Modifica campo "Sito"</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + site + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + site_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.catalog_old != null){
              if(value.catalog==true){ var catalog = "Si"; }
              if(value.catalog==false){ var catalog = "No"; }
              if(value.catalog_old==true){ var catalog_old = "Si"; }
              if(value.catalog_old==false){ var catalog_old = "No"; }

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica campo "Catalogo"</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + catalog + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + catalog_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.bio_old != null) {
              if(value.bio==true){ var bio = "Si"; }
              if(value.bio==false){ var bio = "No"; }
              if(value.bio_old==true){ var bio_old = "Si"; }
              if(value.bio_old==false){ var bio_old = "No"; }

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica campo "Biologico"</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + bio + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + bio_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.biorazionale_old != null){
              if(value.biorazionale==true){ var biorazionale = "Si"; }
              if(value.biorazionale==false){ var biorazionale = "No"; }
              if(value.biorazionale_old==true){ var biorazionale_old = "Si"; }
              if(value.biorazionale_old==false){ var biorazionale_old = "No"; }

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica campo "Biorazionale"</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + biorazionale + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + biorazionale_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.idrosolubile_old != null){
              if(value.idrosolubile==true){ var idrosolubile = "Si"; }
              if(value.idrosolubile==false){ var idrosolubile = "No"; }
              if(value.idrosolubile_old==true){ var idrosolubile_old = "Si"; }
              if(value.idrosolubile_old==false){ var idrosolubile_old = "No"; }

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica campo "Idrosolubile"</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + idrosolubile + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + idrosolubile_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.materbi_old != null){
              if(value.materbi==true){ var materbi = "Si"; }
              if(value.materbi==false){ var materbi = "No"; }
              if(value.materbi_old==true){ var materbi_old = "Si"; }
              if(value.materbi_old==false){ var materbi_old = "No"; }

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica campo "Mater-bi"</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + materbi + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + materbi_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.i_va_id_old_name != null) {
              stringModifiche = stringModifiche + '<tr><td width="600">Modifica IVA</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.i_va_id_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.i_va_id_old_name + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.eco_tax_id_name_old != null) {
              stringModifiche = stringModifiche + '<tr><td width="600">Modifica ecotassa</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.eco_tax_id_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.eco_tax_id_name_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.last_etichetta_clp_name_old != null) {
              stringModifiche = stringModifiche + '<tr><td width="600">Modifica etichetta ministeriale</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.last_etichetta_clp_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.last_etichetta_clp_name_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.last_scheda_clp_name_old != null) {
              stringModifiche = stringModifiche + '<tr><td width="600">Modifica scheda di sicurezza</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.last_scheda_clp_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.last_scheda_clp_name_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.pittogrammi_old != null) {
              if(value.pittogrammi==null){ var pittogrammi = "";
              }else{ var pittogrammi = value.pittogrammi; }

              if(value.pittogrammi_old==null){ var pittogrammi_old = "";
              }else{ var pittogrammi_old = value.pittogrammi_old; }

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica indicazioni di pericolo</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + pittogrammi + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + pittogrammi_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.indicazioni_pericolo_old != null){
              if(value.indicazioni_pericolo==null){ var indicazioni_pericolo = "";
              }else{ var indicazioni_pericolo = value.indicazioni_pericolo; }

              if(value.indicazioni_pericolo_old==null){ var indicazioni_pericolo_old = "";
              }else{ var indicazioni_pericolo_old = value.indicazioni_pericolo_old; }

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica frasi H</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + indicazioni_pericolo + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + indicazioni_pericolo_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.classificazione_seveso_old != null){
              if(value.classificazione_seveso==null){ var classificazione_seveso = "";
              }else{ var classificazione_seveso = value.classificazione_seveso; }

              if(value.classificazione_seveso_old==null){ var classificazione_seveso_old = "";
              }else{ var classificazione_seveso_old = value.classificazione_seveso_old; }

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica classificazione seveso</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + classificazione_seveso + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + classificazione_seveso_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.principi_attivi_old != null) {
              stringModifiche = stringModifiche + '<tr><td width="600">Modifica principi attivi</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.principi_attivi + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.principi_attivi_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.a_drclassification_name_old != null){
              stringModifiche = stringModifiche + '<tr><td width="600">Modifica ADR</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.a_drclassification_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.a_drclassification_name_old + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.deadline_use_old != null){
              var datadeadlineNew_useJson = value.deadline_use;
              var datadeadlNew = new Date(parseInt(datadeadlineNew_useJson.replace(/(^.*\()|([+-].*$)/g, '')) );
              var datadeadlNewformat = datadeadlNew.getDate() + "/" + (datadeadlNew.getMonth() + 1) + "/" + datadeadlNew.getFullYear();

              var datadeadline_useJson = value.deadline_use_old;
              var datadeadlOld = new Date(parseInt(datadeadline_useJson.replace(/(^.*\()|([+-].*$)/g, '')) );
              var datadeadlOldformat = datadeadlOld.getDate() + "/" + (datadeadlOld.getMonth() + 1) + "/" + datadeadlOld.getFullYear();

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica Scadenza impiego</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + datadeadlNewformat + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + datadeadlOldformat + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.deadline_seller_old != null){
              var datasellerNew_useJson = value.deadline_seller;
              var datasellerNew = new Date(parseInt(datasellerNew_useJson.replace(/(^.*\()|([+-].*$)/g, '')) );
              var datasellerlNewformat = datasellerNew.getDate() + "/" + (datasellerNew.getMonth() + 1) + "/" + datasellerNew.getFullYear();

              var dataseller_oldline_useJson = value.deadline_seller_old;
              var dataseller_oldOld = new Date(parseInt(dataseller_oldline_useJson.replace(/(^.*\()|([+-].*$)/g, '')) );
              var datadseller_oldformat = dataseller_oldOld.getDate() + "/" + (dataseller_oldOld.getMonth() + 1) + "/" + dataseller_oldOld.getFullYear();

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica Scadenza rivenditore</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + datasellerlNewformat + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + datadseller_oldformat + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.deadline_owner_old != null){
              var dataownerNew_useJson = value.deadline_owner;
              var dataownerNew = new Date(parseInt(dataownerNew_useJson.replace(/(^.*\()|([+-].*$)/g, '')) );
              var dataownerNewformat = dataownerNew.getDate() + "/" + (dataownerNew.getMonth() + 1) + "/" + dataownerNew.getFullYear();

              var dataownerJson = value.deadline_owner_old;
              var dataownerOld = new Date(parseInt(dataownerJson.replace(/(^.*\()|([+-].*$)/g, '')) );
              var datadownerOldformat = dataownerOld.getDate() + "/" + (dataownerOld.getMonth() + 1) + "/" + dataownerOld.getFullYear();

              stringModifiche = stringModifiche + '<tr><td width="600">Modifica Scadenza titolare</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + dataownerNewformat + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + datadownerOldformat + '</div></div></div></div></td></tr>';
              count++;
            }

            if(value.advice_clp_name_old != null){
              stringModifiche = stringModifiche + '<tr><td width="600">Modifica Avvertenze</td><td width="300">' + dateformat + '</td><td>' + value.last_modified_by + '</td><td class="open_freccia_storico"><a href="#" class="open-storico-' + count + '"><img src="{{ URL::asset("img/freccia-accordion.png") }}"></a></td></tr><tr id="open-storico-' + count + '"><td colspan="4"><div class="campo-modificato"><div class="expanded row"><div class="medium-12 large-6 columns"><span>Stato attuale:</span><div class="contenitore-stato">' + value.advice_clp_name + '</div></div><div class="medium-12 large-6 columns"><span>Stato precedente:</span><div class="contenitore-stato">' + value.advice_clp_name_old + '</div></div></div></div></td></tr>';
              count++;
            }
          });

          $('.storico-modifiche tbody').append(stringModifiche).foundation();
          stringModifiche='';
        },
        error: function (request, status, errorThrown){}
    });

    $(".storico-modifiche").on("click", "a[class^='open-storico-']", function(event){
        event.preventDefault();
        var nameclass = $(this).attr("class");

        if($("tbody tr#" + nameclass ).is(':visible')){
            $("tbody tr").removeAttr("style");
        }else{
            $("tbody tr#" + nameclass ).css('display','table-row');
            $("tbody tr").not("#" + nameclass ).css('display','');
        }
    });
</script>
@stop
