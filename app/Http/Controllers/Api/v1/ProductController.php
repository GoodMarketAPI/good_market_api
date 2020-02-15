<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Product;
use App\Models\SaleProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Object_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {try {
        $number_per_page = $request->number_per_page ? $request->number_per_page : 10;

        $query = Product::query();

        if ($request->keyword) {
            $query->where('name', 'LIKE', "%$request->keyword%");
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate($number_per_page);

        return $this->success($products, "Danh sách sản phẩm");
    } catch (\Exception $e) {
        return $this->error(new Object_(), $e);
    }

    }

    public function getSale(Request $request)
    {
        try {
            $number_per_page = $request->number_per_page ? $request->number_per_page : 10;

            $products = Product::whereHas('sale_products', function ($q) {
                $q->where('start', '<=', Carbon::today())
                    ->where('end', '>=', Carbon::today());
            })
                ->with('sale_products')
                ->paginate($number_per_page);
            foreach ($products as $product){
                $product->sale_products->makeHidden('product');
            }

            return $this->success($products, "Danh sách sản phẩm khuyến mại");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    public function getBestSelling(Request $request)
    {
        try {
            $number_per_page = $request->number_per_page ? $request->number_per_page : 10;

            $products = Product::withCount('order_details')
                ->orderByDesc('order_details_count')
                ->paginate($number_per_page);

            return $this->success($products, "Danh sách sản phẩm bán chạy");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    public function getHotToday(Request $request)
    {
        try {
            $number_per_page = $request->number_per_page ? $request->number_per_page : 10;

            $products = Product::whereHas('sale_products', function ($q) {
                $q->where('start', '<=', Carbon::today())
                    ->where('end', '>=', Carbon::today());
            })
                ->with('sale_products')
                ->paginate($number_per_page);
            foreach ($products as $product){
                $product->sale_products->makeHidden('product');
            }

            return $this->success($products, "Danh sách sản phẩm hot hôm nay");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
