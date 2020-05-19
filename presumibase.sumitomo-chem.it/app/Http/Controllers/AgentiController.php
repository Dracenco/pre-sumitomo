<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AgentiController extends Controller{

    public function ModificaAgente($id){
        $data = array( 'id' => $id, 'mostra'=> 'si', 'route' => 'modifica-agente',  'app' => 'sito');
        return view('sito/modifica-agente')->with($data);
    }

}
