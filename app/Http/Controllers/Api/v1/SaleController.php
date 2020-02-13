<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Sale;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Object_;

class SaleController extends Controller
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

            $supplier = Supplier::find($request->supplier_id);
            if (!$supplier) {
                throw new \Exception('Dữ liệu không tồn tại');
            }
            $sales = Sale::where('supplier_id', $supplier->id)
                ->paginate($number_per_page);

            return $this->success($sales, "Danh sách chương trình khuyến mại");
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
        try {
            $sale = Sale::find($id);
            if (!$sale) {
                throw new \Exception('Dữ liệu không tồn tại');
            }
            return $this->success($sale, "Chi tiết chương trình khuyến mại");
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
