<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{
    GlobalPages,
    OrderSales,
    Clients
};
use DateTime;
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
        $id = new GlobalPages();
        $idOrder = $id->uuid4();
        $user = Auth::user();
        $date = new DateTime();
        $productValue = DB::table('products')->where('id', '=', $request->product)->get();
        // dd($user->id);

        $this->validate($request, [
            'amount' => 'required',
            'status' => 'required',
            'cod_client' => 'required',
        ],[
            'amount.required' => 'Nome é obrigatório',
            'status.required' => 'E-mail é obrigatório',
            'cod_client.required' => 'Senha é obrigatório',
        ]);

        DB::table('orders_sales')->insert([
            ['dt_order' => $date->format('Y-m-d')],
            ['id' => $idOrder],
            ['amount' => $request->amount],
            ['discount_value' => $request->discount_value],
            ['freight_value' => $request->freight_value],
            ['status' => $request->status],
            ['note' => $request->note],
            ['dt_delivery' => $date->format('Y-m-d')],
            // ['dt_delivery' => $request->dt_delivery],
            ['cod_payment' => $request->cod_payment],
            ['cod_client' => $request->cod_client],
            ['cod_user' => $user->id],
        ]);

        // foreach ($request->sales as $product) {
            DB::table('sales')->insert([
                ['id' => $id->uuid4()],
                ['cod_order' => $idOrder],
                ['cod_product' => $request->product],
                ['quantity' => $request->qtde],
                ['unitary_value' => $productValue->value],
            ]);
        // }
    }
    

}
