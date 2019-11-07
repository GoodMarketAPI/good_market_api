<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use phpDocumentor\Reflection\Types\Object_;


class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone'    => 'required|size:10|string',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required'   => 'Vui lòng nhập :attribute.',
            'phone'      => 'Vui lòng nhập đúng :attribute.',
            'phone.size' => ':attribute phải là :size số',
            'string'     => 'Vui lòng nhập đúng :attribute.',
        ];
    }

    public function attributes()
    {
        return [
            'phone'    => 'Số điện thoại',
            'password' => 'Mật khẩu',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if (request()->is('api/*')) {
            throw new HttpResponseException(
                response()->json([
                    'result'  => false,
                    'message' => $validator->errors()->first(),
                    'data'    => new Object_()
                ], 400)
            );
        }
        return parent::failedValidation($validator);
    }
}
