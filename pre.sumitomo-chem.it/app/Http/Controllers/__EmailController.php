<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller{
    
   public function sendContatti(Request $request){
        $title ='Nuova richiesta di contatto dal sito sumitomo-chem.it';
        $nome = $request->get('nome');
		$provincia = $request->get('provincia');
		$telefono = $request->get('telefono');
		$messaggio = $request->get('messaggio');
		$coltura = $request->get('coltura');
		$email = $request->get('email');
		$promomail = $request->get('promomail');
		
		$corpomail="Richiesta di ".$nome."<br>Provincia: ".$provincia."<br>Telefono: ".$telefono."<br>Email: ".$email."<br>Iscrizione newsletter: ".$promomail."<br>Coltura: ".$coltura."<br>Messaggio: ".nl2br($messaggio)."<br><br>";
		 		 
        Mail::send(['html' => 'emails.send'], ['title' => $title, 'content' => $corpomail], function ($message){

            $message->from('info@sumitomo-chem.it', 'Sumitomo Chemical Italia');
        });

        return response()->json(['message' => 'Request completed']);      
    }
    
    public function sendFrodi(Request $request){
        $title ='Segnalazione di frode dal sito sumitomo-chem.it';
        $content = 'Ciao sono una segnalazione di frode';

		$nome_frodi = $request->get('nome_frodi');
		$telefono_frodi = $request->get('telefono_frodi');
		$messaggio_frodi = $request->get('messaggio_frodi');
		$email_frodi = $request->get('email_frodi');	
		
		$corpomail="Segnalazione da parte di ".$nome_frodi."<br>Telefono: ".$telefono_frodi."<br>Email: ".$email_frodi."<br>Messaggio: ".nl2br($messaggio_frodi)."<br><br>";
       
	   Mail::send(['html' => 'emails.send'], ['title' => $title, 'content' => $corpomail], function ($message){
            $message->to('odv@sumitomo-chem.it')->subject('Segnalazione di frode dal sito sumitomo-chem.it');           
        });

        return response()->json(['message' => 'Request completed']);      
    }
}
