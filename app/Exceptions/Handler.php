<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e) {
            //
            return response()->json(['message' => 'Object Not Found'], 404);
        });
        $this->renderable(function (AuthenticationException $e) {
            //
            return response()->json(['message' => 'Unauthenticated or Token Expired'], 429);
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthorizationException) {
            return response()->view('errors.403', [], 403);
        }
        if ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();
            if ($statusCode == 429) {
                return response()->view('errors.404', [], 429);
            } elseif ($statusCode == 404) {
                return response()->view('errors.404', [], 404);
            } elseif ($statusCode == 500) {
                return response()->view('errors.500', [], 500);
            }
        }

        return parent::render($request, $exception);
    }
}
