<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        //
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
       
        if ($this->isHttpException($exception)) {
            /* if ($exception->getStatusCode() == 404) {
                return response()->view('404', compact('view_data'), 404);
            } */
             

            if ($exception instanceof TokenMismatchException){
                return redirect()->route('login');
            }

        
            if ($exception->getStatusCode() == 419) {
                $request->session()->put('url.intended', url()->current());
                return response()->view('web.pages.419', 419);
            }

        }

        return parent::render($request, $exception);
    }
}
