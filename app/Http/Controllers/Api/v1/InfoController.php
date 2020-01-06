<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use App\Models\Province;
use App\Models\VoucherCode;
use phpDocumentor\Reflection\Types\Object_;

class InfoController extends Controller
{
    public function listCategories(){
        try {
            return $this->success(Category::all(), "Danh sách danh mục");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    public function listProvinces(){
        try {
            return $this->success(Province::with('districts')->get(), "Danh sách tỉnh thành");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    public function listVoucherCodes(){
        try {
            return $this->success(VoucherCode::all(), "Danh sách voucher");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    public function listDiscountCodes(){
        try {
            return $this->success(DiscountCode::all(), "Danh sách mã giảm giá");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }
}
