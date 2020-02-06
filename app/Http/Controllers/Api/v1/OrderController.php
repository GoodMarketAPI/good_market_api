<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Order;
use App\Models\OrderDetail;
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
            $user            = User::find(auth()->id());
            return $this->success($user->orders()->paginate($number_per_page), "Danh sách đơn hàng");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user     = User::find(auth()->id());
            $products = $request->products;
            if ($request->has('products') && $request->products) {
                $products = str_replace('\"', '"', $request->products);
                foreach ($products as &$product) {
                    $product = json_decode($product);
                }
            }

            \DB::beginTransaction();
            $order = Order::create([
                'user_id'              => $user->id,
                'receiver_name'        => $request->receiver_name,
                'receiver_phone'       => $request->receiver_phone,
                'receiver_address'     => $request->receiver_address,
                'receiver_district_id' => $request->receiver_district_id,
                'receiver_latitude'    => $request->receiver_latitude,
                'receiver_longitude'   => $request->receiver_longitude,
                'sub_total'            => 0,
                'total'                => 0,
                'note'                 => $request->note,
            ]);

            $sub_total = 0;
            foreach ($products as $product) {
                OrderDetail::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'product_preprocessing_id' => $product->product_preprocessing_id ? $product->product_preprocessing_id : NULL,
                    'quantity'   => $product->quantity,
                    'price'      => $product->price,
                ]);
                $sub_total += $product->price;
            }

            $total = $sub_total;

            $order->sub_total = $sub_total;
            $order->total     = $total;

            if ($order->save()) {
                \DB::commit();
                $order->order_details;
                return $this->success($order, "Đặt hàng thành công");
            }
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $order = Order::where('id', $id)
                ->where('user_id', auth()->id())
                ->first();
            if (!$order) {
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
