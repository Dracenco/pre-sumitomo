<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler{

    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];
   
    public function report(Exception $exception){
        parent::report($exception);
    }

    public function render($request, Exception $e){
    
		
        if(config('app.debug')) {
            return parent::render($request, $e);
        }

        if($e instanceof \Illuminate\Session\TokenMismatchException){
            return response()->view('errors.404', [], 404);
        }

        if ($e instanceof TokenMismatchException) {
            return response()->view('errors.404', [], 404);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->view('errors.404', [], 404);
        }    

        if ($e instanceof ErrorException) {
            return response()->view('errors.404', [], 404);
        }  
        
        if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){
            return response()->view('errors.404', [], 404);
        }
        
        if($e instanceof InvalidArgumentException) {
            return response()->view('errors.404', [], 404);
        }  
        
        if ($e instanceof \ErrorException) {
        return response()->view('errors.500', [], 500);
    } else {
        return parent::render($request, $e);
    }


        if ($e instanceof CustomException) {
            return response()->view('errors.404', [], 404);
        }
        return parent::render($request, $e);
    }

    protected function unauthenticated($request, AuthenticationException $exception){
        if ($request->expectsJson()){
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return response()->view('errors.404', [], 404);
    }
}