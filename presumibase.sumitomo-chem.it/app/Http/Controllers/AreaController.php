<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AreaController extends Controller{

    public function ModificaArea($id){
        $data = array( 'id' => $id, 'mostra'=> 'si', 'route' => 'modifica-area',  'app' => 'sito');
        return view('sito/modifica-area')->with($data);
    }

    public function GestioneZona($id){
        $data = array( 'id' => $id, 'mostra'=> 'si', 'route' => 'gestione-zona',  'app' => 'sito');
        return view('sito/gestione-zona')->with($data);
    }

    public function NuovaZona($id){
        $data = array( 'id' => $id, 'mostra'=> 'si', 'route' => 'nuova-zona',  'app' => 'sito');
        return view('sito/nuova-zona')->with($data);
    }

    public function ModificaZona($id,$idZona){
        $data = array( 'idZona' => $idZona, 'id' => $id, 'mostra'=> 'si', 'route' => 'modifica-zona',  'app' => 'sito');
        return view('sito/modifica-zona')->with($data);
    }
    
    
}
