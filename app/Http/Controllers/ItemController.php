<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ItemController extends Controller
{
    public function get_item(){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/Item/GetItemByTenancy?TenancyName=KCCL&BranchId=1");
        return $response->json();
    }
    public function get_category(){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/Category/GetCategoryByTenancy/GetItemByTenancy?TenancyName=KCCL");
        return $response->json();
    }
    public function get_customer_name($name){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/Customer/GetCustomerByName?TenancyName=KCCL&CustomerName=".$name);
        return $response->json();
    }
    public function get_checkout($dataCheckout){
        $response=Http::post("http://acc.ksoft.solutions/api/services/app/SaleOrder/CreateOrUpdateSaleOrderByTenancy".$dataCheckout);
        return $response->json();
    }
    public function get_order($loginame){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/SaleOrder/GetSaleOrdersByTenancy?TenancyName=KCCL&CustomerName=".$loginame);
        return $response->json();
    }
    public function get_delete($id){
        $response=Http::delete("http://acc.ksoft.solutions/api/services/app/SaleOrder/DeleteSaleOrderByTenancy?TenancyName=KCCL&Id=".$id);
        return $response->json();
    }
}
