<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{
    GlobalPages,
    OrderSales,
    Clients
};
use Illuminate\Http\Request;

class OrdersSalesController extends Controller
{
    protected $orderSales;
    protected $client;
    public function __construct(OrderSales $orderSales, Clients $client)
    {
        $this->orderSales = $orderSales;
        $this->client = $client;
    }

    public function index(){
        $orderSales = $this->orderSales->getIndex(); 
        return view('orders.index', [
            'orderSales' => $orderSales 
        ]);

        $id = new GlobalPages();
        $data['id'] = $id->uuid4();
    }

    

}
