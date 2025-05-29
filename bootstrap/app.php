<?php

use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'customAuth' => AuthenticateMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, Request $request) {

            $ignore = [
                ValidationException::class,
                AuthenticationException::class,
            ];

            if (in_array(get_class($e), $ignore)) {
                return;
            }

            $isRedirect = $request->session()->get('handling-exception', false);

            if ($isRedirect) {
                $request->session()->forget('handling-exception');
                return;
            } else {
                $request->session()->put('handling-exception', true);
                return redirect()
                    ->back()
                    ->with('error', 'Ocorreu um erro inesperado, mas fique tranquilo que o problema já foi reportado a nossa equipe.');
            }
        });
    })->create();
