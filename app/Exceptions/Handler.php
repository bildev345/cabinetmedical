<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        session()->flash('error', 'Vous devez être authentifié pour accéder à cette page.');

        return redirect()->guest($exception->redirectTo() ?? route('login.create'));
    }
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    /*public function register()
    {
        $this->reportable(function (ModelNotFoundException $e) {
            // You can log the exception here or display a custom message
            return response()->view('errors.custom', [], 404);
        });
    }*/
    public function register()
    {
        $this->renderable(function (ModelNotFoundException $e) {
            // You can log the exception here or display a custom message
            return response()->view('errors.custom', [], 404);
        });
    }
}
