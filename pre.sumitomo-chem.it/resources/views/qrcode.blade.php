<?php $cat = ''; ?>
@extends('layout.container')
@section('title', 'Schede di sicurezza - Sumitomo Chemical Italia')

@section('content')

    <section id="error404" style="margin-top:100px;">
        <div class="row">
            <div class="small-12 medium-12 columns ">
                <p>Il download della scheda di sicurezza sarà avviato a breve in modo automatico.</p>
                <p>In caso di problemi con il download, ci informi subito via mail <a href="mailto:info@sumitomo-chem.it">info@sumitomo-chem.it</a></p>
                <p>Cordiali saluti</p>
                <p>Sumitomo Chemical Italia</p>
            </div>
        </div>
    </section> 

    @include('layout.fascia-prodotti')
    @include('layout.ricerca-tecnica')  
    @include('layout.rete-vendita')        
    @include('layout.link-utili')    
    @include('layout.disclaimer')   
    @yield('script')
@endsection

@section('script')
<script type="text/javascript">  
                                                       
var req = new XMLHttpRequest();
req.open("GET", UrlWebService + 'api/Download/DownloadSDSFromOldUrl?oldUrl=<?php echo filter_var($url, FILTER_SANITIZE_STRING); ?>', true);
req.responseType = "blob";
req.onreadystatechange = function () {
  if (req.readyState === 4 && req.status === 200) {
    if (typeof window.navigator.msSaveBlob === 'function') {
      window.navigator.msSaveBlob(req.response, "<?php echo $nome_prodotto ?>");
    } else {
      var blob = req.response;
      var link = document.createElement('a');
      link.href = window.URL.createObjectURL(blob);
      link.download = "<?php echo $nome_prodotto ?>";
      document.body.appendChild(link);
      link.click();
    }
  }
};
req.send();
</script>
@stop