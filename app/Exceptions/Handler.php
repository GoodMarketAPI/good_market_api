<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof NotFoundHttpException) {
            return response()->json([
                'result'  => false,
                'message' => 'Đường dẫn không tồn tại'
            ], 404);
        }
        if($exception instanceof ModelNotFoundException) {
            return response()->json([
                'result'  => false,
                'message' => 'Không tìm thấy dữ liêu'
            ], 404);
        }

        if($exception instanceof AuthenticationException) {
            return response()->json([
                'result'  => false,
                'message' => 'Token không hợp lệ',
                'data'    => [],
            ], 401);
        }

        return parent::render($request, $exception);
    }
}
