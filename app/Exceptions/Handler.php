<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;
use Request;
use Illuminate\Auth\AuthenticationException;
use Response;

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

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // return $request->expectsJson()
        //     ? response()->json(['message' => 'Unauthenticated.'], 401)
        //     : redirect()->guest(route('authentication.index'));

        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        // $guard = array_get($exception->guards(), 0);

        // switch ($guard) {
        //     case 'client':
        //         $login = 'login';
        //         break;
        //     case 'user':
        //         $login = 'user.login';
        //         break;

        //     default:
        //         # code...
        //         break;
        // }

        // return redirect()->guest(route(''))
        return redirect()->back();
    }
}
