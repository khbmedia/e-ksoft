<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ItemController extends Controller
{
    public function get_item($tenancy){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/Item/GetItemByTenancy?TenancyName=".$tenancy."&BranchId=");
        return $response->json();
    }
    public function get_category($tenancy){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/Category/GetCategoryByTenancy?TenancyName=".$tenancy);
        return $response->json();
    }
    public function get_customer_name($tenancy,$name){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/Customer/GetCustomerByName?TenancyName=".$tenancy."&CustomerName=".$name);
        return $response->json();
    }
    // checkout and update Order
    public function get_checkout(Request $request){
        $response=Http::post("http://acc.ksoft.solutions/api/services/app/SaleOrder/CreateOrUpdateSaleOrderByTenancy",$request->all());
        return $response->json();
    }
    public function get_printpreview($tenancy,$id){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/SaleOrder/GetSaleOrderInfoByTenancy?TenancyName=".$tenancy."&Id=".$id);
        return $response->json();
    }
    public function get_order($tenancy,$loginame){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/SaleOrder/GetSaleOrdersByTenancy?TenancyName=".$tenancy."&CustomerName=".$loginame);
        return $response->json();
    }
    public function get_edit_order($tenancy,$id){
        $response=Http::get("http://acc.ksoft.solutions/api/services/app/SaleOrder/GetSaleOrderForEditByTenancy?TenancyName=".$tenancy."&Id=".$id);
        return $response->json();
    }
   
    public function get_delete($tenancy,$id){
        $response=Http::delete("http://acc.ksoft.solutions/api/services/app/SaleOrder/DeleteSaleOrderByTenancy?TenancyName=".$tenancy."&Id=".$id);
        return $response->json();
    }
}
