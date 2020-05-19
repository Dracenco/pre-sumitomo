<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller{
    
    public function all(){        
        return view('news');
    }   
        
    public function DettaglioNotizia($id){
        $data = array('id' => $id);
        return view('news-dettaglio')->with($data);
    }  
}
