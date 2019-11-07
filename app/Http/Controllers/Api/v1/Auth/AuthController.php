<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Object_;

class AuthController extends Controller
{
    /**
     * Client Register
     */
    public function register(UserRequest $request)
    {
        try {

            $user           = new User($request->except('password', 'referral_phone', 'referral_code'));

            if($request->referral_phone || $request->referral_code){
                $referral_user = User::where('phone', $request->referral_phone)->orWhere('user_code', $request->referral_code)->first();
                if(!$referral_user){
                    throw new \Exception('Mã giới thiệu không đúng');
                }
                $user->referral_id = $referral_user->id;
            }

            $user->password = Hash::make($request->password);
            if ($request->hasFile('avatar')) {
                $user->avatar = date('Y_m_d_H_i_s') . '-' . uniqid() . "." . strtolower($request->file('avatar')->getClientOriginalExtension());
            }

            if ($user->save()) {
                // Update Avatar
                if ($request->hasFile('avatar')) {
                    \Storage::putFileAs('users/avatars', $request->file('avatar'), $user->avatar);
                }
                $user->access_token = $user->createToken(env('PASSPORT_SECRET_KEY'))->accessToken;
                return $this->success($user, "Đăng kí thành công");
            }
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e->getMessage(), $e);
        }
    }

    /**
     * Client Login
     */
    public function login(UserLoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)
                ->first();

            if (!$user) {
                throw new \Exception('Tài khoản không tồn tại', 200);
            }

            if (!\Hash::check($request->password, $user->password)) {
                throw new \Exception('Email hoặc mật khẩu không đúng', 200);
            }

            if($request->device_token){
                User::where('device_token', $request->device_token)->update(['device_token' => NULL]);
                $user->device_token = $request->device_token;
            }

            if ($user->save()) {
                $user->access_token = $user->createToken(env('PASSPORT_SECRET_KEY'))->accessToken;
                return $this->success($user, "Đăng nhập thành công");
            }
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e->getMessage(), $e, $e->getCode() ? $e->getCode() : 500);
        }
    }

    public function loginSocial(UserLoginSocialRequest $request)
    {
        try {
            $facebook_id = filter_var($request->facebook_id, FILTER_SANITIZE_NUMBER_INT);
            $google_id   = filter_var($request->google_id, FILTER_SANITIZE_NUMBER_INT);

            if ($facebook_id) {
                $user = User::where('facebook_id', $facebook_id)->first();
            } else {
                $user = User::where('google_id', $google_id)->first();
            }

            if (!$user) {
                if (!$request->email) {
                    throw new \Exception("Vui lòng nhập email", 422);
                }
                $user = User::firstOrNew(['email' => $request->email]);

                if (!$user->facebook_id && $facebook_id) {
                    $user->facebook_id = $facebook_id;
                }

                if (!$user->google_id && $google_id) {
                    $user->google_id = $google_id;
                }
            }

            if ($request->name && !$user->name) {
                $user->name = $request->name;
            }

            if ($request->device_token) {
                $user->device_token = $request->device_token;
            }

            if (!$user->avatar) {
                $user->avatar = $request->avatar;
            }

            // Save to database
            if ($user->save()) {
                $user->access_token = $user->createToken(env('PASSPORT_SECRET_KEY'))->accessToken;
            }

            return $this->success($user, "Đăng nhập thành công");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e->getMessage(), $e, $e->getCode() ? $e->getCode() : 500);
        }
    }

    /**
     * Logout
     */
    public function logout()
    {
        try {
            $doctor = auth()->user();
            $doctor->token()->revoke();
            $doctor->device_token = NULL;
            if ($doctor->save()) {
                return $this->success(new \stdClass(), "Đăng xuất thành công");
            }
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e->getMessage(), $e);
        }
    }
}
