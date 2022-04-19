<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\{
    GlobalPages,
    PaymentType,
    Clients
};
use DateTime;

class OrderSales extends Model
{
    protected $guarded = [];
    protected $keyType = 'string'; // sem isso não funciona o uuid
    protected $table  = 'orders_sales';
    // public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        //ex: 'body',
        // 'visible',
    ];
    protected $casts = [
        //ex: 'visible' => 'boolean',
    ];

    public function client(){
        return $this->belongsTo(Clients::class);
    }
    public function paymentType(){
        return $this->belongsTo(PaymentType::class);
    }


    public function getIndex(){
        $orderSales = $this
            ->join('payment_type', 'cod_payment', '=', 'payment_type.id')
            ->join('clients', 'cod_client', '=', 'clients.id')
            ->join('users', 'cod_user', '=', 'users.id')
            ->select('clients.name as client', 'status', 'dt_order', 'discount_value', 'amount', 'users.name as user')
            ->paginate(10);
        return $orderSales;
    }

    public function storeOrder($request){
        $id = new GlobalPages();
        $idOrder = $id->uuid4();
        $user = Auth::user();
        $date = new DateTime();
        $productValue = DB::table('products')->where('id', '=', $request->product)->first();
        $cod_payment = $this->paymentType->find($request->cod_payment);
        //  dd($this->paymentType($cod_payment->id));

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
            // ['cod_payment' => $cod_payment->id],
            ['cod_payment' => cod_payment()->associate($cod_payment)],
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
