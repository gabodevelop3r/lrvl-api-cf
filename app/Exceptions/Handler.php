<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {

        $this->renderable(function (Throwable $e, $request) {
            if($request->expectsJson()){
                return $this->handleApiExceptions($request, $e);
            }
        });
        
        
        
        $this->reportable(function (Throwable $e ) {
            //
        });
      
    }

    public function handleApiExceptions($request, $exception){

        // validar si el objecto es una instancia de ModelNotFoundException
        if($exception->getPrevious()  instanceof ModelNotFoundException){
            return response()->json(['error'=>'Model Not Found'],404);   
        }
        $this->reportable(function (Throwable $e ) {
            //
        });
    }

    
    
}
