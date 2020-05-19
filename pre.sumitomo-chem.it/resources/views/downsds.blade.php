<?php $cat = ''; ?>
<script> 
    var codeProduct = "<?php if(isset($code)){ echo filter_var($code, FILTER_SANITIZE_STRING); }else{ echo ''; } ?>";
    
    if(codeProduct==''){
        window.location.replace('https://sumitomo-chem.it');
    }
</script>
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
    var nomeProdotto = '';
   	
    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");                
        },
        url: UrlWebService + "api/Site/GetProduct?code=" + codeProduct,
        async:false,
        success: function (result) {                           
            nomeProdotto=result.data.name;                    
        },       
        error: function (request, status, errorThrown) {}
    }); 
    
   
var req = new XMLHttpRequest();
req.open("GET", UrlWebService + 'api/Download/DownloadSDS?code=' + codeProduct, true);
req.responseType = "blob";
req.onreadystatechange = function () {
  if (req.readyState === 4 && req.status === 200) {
    if (typeof window.navigator.msSaveBlob === 'function') {
      window.navigator.msSaveBlob(req.response, nomeProdotto + ".pdf");
    } else {
      var blob = req.response;
      var link = document.createElement('a');
      link.href = window.URL.createObjectURL(blob);
      link.download = nomeProdotto + ".pdf";
      document.body.appendChild(link);
      link.click();
    }
  }
};
req.send();
</script>
@stop