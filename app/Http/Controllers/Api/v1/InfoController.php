<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Banner;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use App\Models\District;
use App\Models\Province;
use App\Models\VoucherCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Object_;

class InfoController extends Controller
{
    public function company(){
        try {
            $data = json_decode(file_get_contents(public_path('data/company.json')));
            return $this->success($data, "Thông tin công ty");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    public function listBanners(){
        try {
            return $this->success(Banner::all(), "Danh sách banner");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    public function listCategories(){
        try {
            return $this->success(Category::whereNull('parent_id')->get(), "Danh sách danh mục");
        } catch (\Exception $e) {
            return $this->error(new Object_(), $e);
        }
    }

    public function listProvinces(){
        try {
            $provinces = Province::with('districts.wards')->get();
            return $this->success($provinces, "Danh sách tỉnh thành");
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
