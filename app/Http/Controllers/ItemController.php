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
}
