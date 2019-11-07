<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use phpDocumentor\Reflection\Types\Object_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data, $message, $options = [])
    {
        $response = [
            'result'  => true,
            'message' => $message,
            'data'    => $data
        ];
        if(count($options)) {
            $response = array_merge($response, $options);
        }
        return response()->json($response);
    }

    public function error($data, $message, \Exception $e, $code = 500, $options = [])
    {
        $response = [
            'result'  => false,
            'message' => $message,
            'data'    => $data,
            'line'    => $e->getLine(),
            'file'    => $e->getFile(),
        ];
        if(count($options)) {
            $response = array_merge($response, $options);
        }
        return response()->json($response, $code);
    }

    public function validationError($data = Object_::class, $validators = [])
    {
        return response()->json([
            'result'  => false,
            'message' => "Vui lòng kiểm tra lại dữ liệu",
            'data'    => $data,
            'errors'  => $validators[0]
        ], 400);
    }
}
