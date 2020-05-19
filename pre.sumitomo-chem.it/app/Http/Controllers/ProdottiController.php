<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdottiController extends Controller{
    
    public $linea = '';
    public $lineaName = '';
    public $famiglia = '';
    public $famigliaName = '';
    public $coltura = '';
    public $colturaName = '';
    public $princAttivo = '';
    public $princAttivoName = '';
    public $avversita = '';
    public $avversitaName = '';
    
    public $chiave = '';
            
    public function checkParametriRicerca(Request $request){
                
        if(!empty($request->input('linea'))){
            foreach($request->input('linea') as $key=>$value){
                list($id,$name) = explode('-', $value); 
                $this->lineaName = $this->lineaName.', '.$name ;
                $this->linea = $this->linea.','.$id ;
            }
        }
        
        if(!empty($request->input('famiglia'))){
            foreach($request->input('famiglia') as $key=>$value){
                list($id,$name) = explode('-', $value); 
                $this->famigliaName = $this->famigliaName.', '.$name ;
                $this->famiglia = $this->famiglia.','.$id ;
            }
        }
        
        if(!empty($request->input('coltura'))){
            foreach($request->input('coltura') as $key=>$value){
                list($id,$name) = explode('-', $value); 
                $this->colturaName = $this->colturaName.', '.$name ;
                $this->coltura = $this->coltura.','.$id ;
            }
        }
        
        if(!empty($request->input('principio'))){
            foreach($request->input('principio') as $key=>$value){
                list($id,$name) = explode('-', $value); 
                $this->princAttivoName = $this->princAttivoName.', '.$name ;
                $this->princAttivo = $this->princAttivo.','.$id ;
            }
        }
        
        if(!empty($request->input('avversita'))){
            foreach($request->input('avversita') as $key=>$value){
                list($id,$name) = explode('-', $value); 
                $this->avversitaName = $this->avversitaName.', '.$name ;
                $this->avversita = $this->avversita.','.$id ;
            }
        }
        
        $data = array(
            'linea' => trim($this->linea , ','),'famiglia' => trim($this->famiglia , ','), 'coltura' => trim($this->coltura , ','), 'avversita' => trim($this->avversita , ','),
            'principio_attivo' => trim($this->princAttivo , ','), 'biologico' => $request->input('biologico'),
            'linea_name' => trim($this->lineaName, ','),'famiglia_name' => trim($this->famigliaName, ','), 'coltura_name' => trim($this->colturaName, ','), 'avversita_name' => trim($this->avversitaName, ','), 'principio_attivo_name' => trim($this->princAttivoName, ','),
        );
                
        return view('ricerca-prodotti')->with($data);
    }
    
    public function checkRicercaSemplice(Request $request){
                
        if(!empty($request->input('ricercaProdotti'))){
            $this->chiave = trim($request->input('ricercaProdotti'));
        }
                
        $data = array('chiave' => $this->chiave);
        return view('ricerca')->with($data);        
    }
    
    public function checkParametriUrl($categoria, $prodotto){
        if($prodotto==NULL ){
            return view('prodotti', ['mostra' => 'si', 'app' => 'sumibase', 'cat' => 'all']);
        }else{
            $data = array( 'cat' => $categoria, 'prodotto' => $prodotto, 'anchor' => 'DettaglioProdotto');
            return view('prodotto')->with($data);
        }
    }
    
    public function CategoriaProdotti($categoria){
        $anchor = 'product';
        if (empty($categoria)){            
            return redirect()->route('/');
        }else{
            $data = array( 'cat' => $categoria, 'anchor' => 'ListaProdotti' );
            return view('categoria')->with($data);
        }
    }    
    
    public function QrCode($nome, $slug, $pdf){        
        list($nomeProdotto, $estensione) = explode('.', $pdf);
        $data = array( 'url' => 'http://www.sumitomo-chem.it/sumidata/prodotti/'.$nome.'/'.$slug.'/'.$pdf, 'nome_prodotto' => $nomeProdotto.'.pdf');
        return view('qrcode')->with($data);       
    }
    
    public function SdsQrCode($code=''){  
        
        if($code==''){
            return redirect()->route('prodotti');
        }else{
            $data = array( 'code' => $code);
			return view('downsds')->with($data);   
        }
    }
	
	
    
    
}