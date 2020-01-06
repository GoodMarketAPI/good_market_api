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

    public function error($data, \Exception $e, $options = [])
    {
        $response = [
            'result'  => false,
            'data'    => $data,
            'message' => $e->getMessage(),
            'line'    => $e->getLine(),
            'file'    => $e->getFile()
        ];
        if(count($options)) {
            $response = array_merge($response, $options);
        }
        return response()->json($response, $e->getCode() && $e->getCode() < 500 ? $e->getCode() : 500);
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
