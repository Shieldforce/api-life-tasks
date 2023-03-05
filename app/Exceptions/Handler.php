<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $levels = [
        //
    ];


    protected $dontReport = [
        //
    ];


    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        $statusCode = $this->isHttpException($e) ? $e->getStatusCode() : 422;
        if ($e instanceof ValidationException && $request->wantsJson()) {
            $messages = $e->validator->errors()->all();
            $message = array_shift($messages);
            if ($additional = count($messages)) {
                $pluralized = $additional === 1 ? __('erro') : __('erros');
                $message .= __(" (e :additional mais :pluralized)", compact('additional', 'pluralized'));
            }
            return response()->json(['message' => $message, 'errors' => $e->errors()], $statusCode);
        }
        return parent::render($request, $e);
    }
}
