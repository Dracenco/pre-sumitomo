<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GestioneSitoController extends Controller{

    public function ModificaCentroAntiveleno($id){
        $data = array( 'mostra'=> 'si', 'app' => 'sito', 'id' => $id);
        return view('sito/modifica-centro')->with($data);
    }

    public function ModificaPaginaProdotti(){
        $data = array( 'mostra'=> 'si', 'app' => 'sito', 'id' => $id);
        return view('sito/modifica-centro')->with($data);
    }

    public function ModificaNotizia($id){
        $data = array( 'mostra'=> 'si', 'app' => 'sito', 'id' => $id, 'route' => 'modifica-notizia');
        return view('sito/modifica-notizia')->with($data);
    }  

      

}
