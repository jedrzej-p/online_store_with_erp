<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('Positions')->where('status', 1)->with(array('User' => function($query)
        {
            $query->select('users.id','users.name','users.surname','users.NIP','users.city','users.post_code','users.street','users.building_number', 'users.enova_code');}))->get();

        return response()->json($orders);
    }

    public function setStatus(Request $request) {
        $table = $request->json()->all();

        foreach($table as $orderList)
        {
            $order = Order::where('uuid', $orderList['uuid'])->first();
            if($order)
            {
                $order->status = $orderList['status'];
                $order->save();

            }
        }
        return response()->json($request->json()->all());
    }
}
