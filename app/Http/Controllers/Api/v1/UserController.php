<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Object_;

class UserController extends Controller
{
    public function profile()
    {
        try {
            $user = auth()->user();
            return $this->success($user, "Thông tin người dùng");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e->getMessage(), $e);
        }
    }

    public function update(UserRequest $request)
    {
        try {
            $user       = User::find(auth()->id());
            $old_avatar = $user->avatar;
            if ($request->hasFile('avatar')) {
                $avatar       = date('Y_m_d_H_i_s') . '-' . uniqid() . "." . strtolower($request->file('avatar')->getClientOriginalExtension());
                $user->avatar = $avatar;
            }
            if ($user->update($request->except(['avatar']))) {
                if ($request->hasFile('avatar')) {
                    if (\Storage::exists('users/avatars/' . $old_avatar)) {
                        \Storage::delete('users/avatars/' . $old_avatar);
                    }
                    \Storage::putFileAs('users/avatars', $request->file('avatar'), $avatar);
                }
                return $this->success($user, "Cập nhật thành công");
            }
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e->getMessage(), $e);
        }
    }
}
