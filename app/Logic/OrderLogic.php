<?php
/**
 * User: sqc
 * Date: 18-6-28
 * Time: 下午5:12
 */

namespace App\Logic;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\ShopOrder;
use App\Http\Resources\ShopOrder as ShopOrderResource;

class OrderLogic
{

    public function getOrderList($where){
        $list = ShopOrder::getOrderAndOrderGoodsList($where);
        return ShopOrderResource::collection($list);
    }

    public function getOrderDetail($where)
    {
        $info = ShopOrder::with('orderGoods')->where($where)->first();
        return new ShopOrderResource($info);
    }

    public function completeOrder($orderID)
    {
    }
}