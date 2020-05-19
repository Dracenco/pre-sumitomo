@extends('layout.header')

@section('title', 'Login')

@section('content')
      <section id="login">
          <div id="form-login">
            <div id="risultato-login"></div><!--id="formlogin"-->
            <form method="POST" action="" autocomplete="off" id="formlogin">
               
                <div class="row">
                  
                    <div class="large-12 columns">
                        <div class="input-wrapper">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <input type="text" name="username" id="username" placeholder="Username">
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="large-12 columns">
                        <div class="input-wrapper">
                            <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                            <input type="password" name="password" id="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <input type="submit" name="iscriviti" value="Sign In">
                    </div>
                </div> 
            </form>                   
          </div>              
      </section>
      
 @endsection