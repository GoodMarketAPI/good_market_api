<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use phpDocumentor\Reflection\Types\Object_;

class UserRequest extends FormRequest
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
        if (!auth()->id()) {
            return [
                'email'    => 'required|email|string|unique:users,email',
                'phone'    => 'required|string|size:10|unique:users,phone',
                'password' => 'required|string|min:6|confirmed',
                'name'     => 'required|string',
            ];
        } else {
            return [
                'name'     => 'string',
                'email'    => 'email|string',
                'phone'    => 'nullable|string|size:10',
                'address'  => 'nullable|string',
                'birthday' => 'date|date_format:Y-m-d',
                'gender'   => 'integer|in:0,1',
                'avatar'   => 'image|mimes:jpeg,png,jpg,svg|max:5120',
            ];
        }
    }

    public function messages()
    {
        return [
            'required'           => 'Vui lòng nhập :attribute.',
            'name.max'           => 'Vui lòng nhập :attribute tối đa :max kí tự',
            'phone.size'         => ':attribute phải là :size số',
            'password.min'       => 'Vui lòng nhập :attribute tối thiểu :max kí tự',
            'password.confirmed' => ':attribute không khớp',
            'unique'             => ':attribute đã được sử dụng.',
            'date'               => 'Vui lòng nhập đúng :attribute.',
            'email'              => 'Vui lòng nhập đúng :attribute.',
            'string'             => 'Vui lòng nhập đúng :attribute.',
            'date_format'        => 'Vui lòng nhập đúng :attribute.',
            'integer'            => 'Vui lòng nhập đúng :attribute.',
            'in'                 => 'Vui lòng nhập đúng :attribute.',
            'image'              => 'Vui lòng chọn đúng :attribute',
            'mimes'              => 'Vui lòng chọn :attribute với định dạng: jpeg, png, jpg, svg',
            'avatar.max'         => 'Vui lòng chọn :attribute có kích thước <= 5MB',
        ];
    }

    public function attributes()
    {
        return [
            'phone'                 => 'Số điện thoại',
            'email'                 => 'Email',
            'password'              => 'Mật khẩu',
            'password_confirmation' => 'Mật khẩu',
            'name'                  => 'Họ và tên',
            'birthday'              => 'Ngày sinh',
            'address'               => 'Địa chỉ',
            'gender'                => 'Giới tính',
            'avatar'                => 'Ảnh đại diện',
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
