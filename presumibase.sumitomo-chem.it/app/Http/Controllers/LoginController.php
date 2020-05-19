<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LoginController extends Controller{

    public function checkToken(Request $request){
        $token = $request->input('token');
        $ruoli = $request->input('role');
        $nome = $request->input('nome');

        if($token=='NULL' ){
            return redirect('/');
        }else{
            Session::put('token', $token);
            Session::put('nome', $nome);

            $ruolo=explode('][',$ruoli);

            foreach ($ruolo as $key => $value) {
              $value=trim($value, "]");
              $value=trim($value, "[");
              list($ruolosezione,$permessi) = explode('#',$value);

              if($ruolosezione!='listini'){
                if($ruolosezione!='modifica semafori'){
                  $ArrayRuoli[$ruolosezione] = $permessi;
                }
              }
              
            }
            Session::put('permessi', $ArrayRuoli);

            return redirect()->route('dashboard')->with('nome', $nome);
        }
    }

    public function Logout(Request $request){
        Session::flush();
        return redirect('/');
    }
}
