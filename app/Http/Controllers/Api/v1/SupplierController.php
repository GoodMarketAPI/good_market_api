<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Object_;

class SupplierController extends Controller
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
            $query = Supplier::query();
            if($request->has_sale){
                $query->whereHas('sales', function($q){
                    $q->where('start', '<=', Carbon::today())
                        ->where('end', '>=', Carbon::today());
                });
            }
            $suppliers = $query->paginate($number_per_page);
            return $this->success($suppliers, "Danh sách đối tác");
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
            $supplier = Supplier::find($id);
            if (!$supplier) {
                throw new \Exception('Dữ liệu không tồn tại', 200);
            }
            return $this->success($supplier, "Chi tiết đối tác");
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
