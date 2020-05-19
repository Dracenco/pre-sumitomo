<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdottiController extends Controller{
    
    public function checkParametriUrl($categoria, $prodotto, $idprodotto){
        if($prodotto==NULL ){
            return view('prodotti', ['mostra' => 'si', 'app' => 'sumibase', 'cat' => 'all']);
        }else{
            $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
            return view('scheda-prodotto')->with($data);
        }
    }

    public function ArchivioCodiciProdotto($categoria, $prodotto, $idprodotto){        
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);   
        return view('codici-prodotto')->with($data);    
    }
    
    public function StoricoProdotto($categoria, $prodotto, $idprodotto){        
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
        return view('storico-prodotto')->with($data);        
    }
    
    public function DuplicaProdotto($categoria, $prodotto, $idprodotto){        
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
        return view('duplica-prodotto')->with($data);        
    }
        
    public function ComunicazioniProdotto($categoria, $prodotto, $idprodotto){        
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
        return view('comunicazioni-prodotto')->with($data);        
    }
    
    public function CreaCodice($categoria, $prodotto, $idprodotto){        
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
        return view('nuovo-codice')->with($data);        
    }
    
    public function DuplicaCodiceProdotto($categoria, $prodotto, $idprodotto, $idcodice, $sap_code = null, $version = null){        
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'idcodice'=> $idcodice, 'id' => $idprodotto );
        if($sap_code != null && strlen($sap_code) > 0) {
            $data['sap_code'] = $sap_code;
        }
        if($version != null && strlen($version) > 0) {
            $data['version'] = $version;
        }
        return view('duplica-codice')->with($data);        
    }
    
    public function ModificaProdotto($categoria, $prodotto, $idprodotto){      
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
        return view('modifica-prodotto')->with($data);        
    }

    public function CreaVersione($cat, $prodotto, $idprodotto, $id, $version, $lcode, $companyId){
        $data = array( 'cat' => $cat, 'prodotto' => $prodotto, 'idprodotto' => $idprodotto, 'id' => $id, 'version' => $version, 'mostra'=> 'si', 'route' => 'prodotti', 'app' => 'sumibase', 'lcode' => $lcode, 'companyId' => $companyId);
        return view('nuova-versione')->with($data);        
    }

    public function ModificaVersione($lcode, $companyId, $version, $productVersionId, $cat, $prodotto, $idprodotto, $id){
        $data = array( 'lcode' => $lcode, 'companyId' => $companyId, 'version' => $version, 'mostra'=> 'si', 'route' => 'prodotti', 'app' => 'sumibase', 'productVersionId' => $productVersionId, 'cat' => $cat, 'prodotto' => $prodotto, 'idprodotto' => $idprodotto, 'id' => $id);
        return view('modifica-versione')->with($data);        
    }
    
    public function MinisteroProdotto($categoria, $prodotto, $idprodotto){        
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
        return view('ministero')->with($data);        
    }
    
    public function GestioneColture($categoria, $prodotto, $idprodotto){        
        $data = array('categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
        return view('gestione-colture')->with($data);        
    }
    
    public function ModificaColtura($categoria, $prodotto, $idprodotto, $idcoltura){      
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto, 'idcoltura' => $idcoltura);
        return view('modifica-coltura')->with($data);        
    }
    
    public function NuovaColtura($categoria, $prodotto, $idprodotto){        
        $data = array('categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto);
        return view('prodotto-nuova-coltura')->with($data);        
    }
            
    public function ModificaAvversita($categoria, $prodotto, $idprodotto, $idcoltura, $idavversita){      
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto, 'idcoltura' => $idcoltura,'idavversita' => $idavversita);
        return view('modifica-avversita')->with($data);        
    }
    
    public function DuplicaColtura($categoria, $prodotto, $idprodotto, $idcoltura){      
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto, 'idcoltura' => $idcoltura);
        return view('duplica-coltura')->with($data);        
    }
    
    public function NuovaAvversita($categoria, $prodotto, $idprodotto, $idcoltura){      
        $data = array( 'categoria' => $categoria, 'prodotto' => $prodotto, 'mostra'=> 'si', 'route' => 'prodotti', 'cat' => $categoria, 'app' => 'sumibase', 'id' => $idprodotto, 'idcoltura' => $idcoltura);
        return view('coltura-nuova-avversita')->with($data);        
    }
    
}
