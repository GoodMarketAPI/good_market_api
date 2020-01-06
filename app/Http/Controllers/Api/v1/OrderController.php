<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Object_;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $number_per_page = $request->number_per_page ? $request->number_per_page : 10;
            $user = User::find(auth()->id());
            return $this->success($user->orders()->paginate($number_per_page), "Danh sách đơn hàng");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $order = Order::where('id', $id)
                ->where('user_id', auth()->id())
                ->first();
            if(!$order){
                throw new \Exception('Dữ liệu không tồn tại', 200);
            }
            return $this->success($order, "Chi tiết đơn hàng");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
