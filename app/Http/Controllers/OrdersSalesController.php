<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{
    GlobalPages,
    OrderSales,
    Clients
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        //dd($orderSales);
        return view('orders.index', [
            'orderSales' => $orderSales 
        ]);
    }

    public function create(){
        $orderSales = $this->orderSales->getIndex(); 
        $clients = DB::table('clients')->get();
        $typePay = DB::table('payment_type')->get();
        $products = DB::table('products')->get();
        return view('orders.create', [
            'orderSales' => $orderSales,
            'clients' => $clients,
            'typePay' => $typePay,
            'products' => $products,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'amount' => 'required',
            'status' => 'required',
            'cod_client' => 'required',
        ],[
            'amount.required' => 'Nome é obrigatório',
            'status.required' => 'E-mail é obrigatório',
            'cod_client.required' => 'Senha é obrigatório',
        ]);
        
        $this->orderSales->storeOrder($request);
    }
    

}
