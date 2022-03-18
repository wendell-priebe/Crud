<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getIndex(){
        $orderSales = $this
            ->join('payment_type', 'cod_payment', '=', 'payment_type.id')
            ->join('clients', 'cod_client', '=', 'clients.id')
            ->join('users', 'cod_user', '=', 'users.id')
            ->select('clients.name as client', 'status', 'dt_order', 'discount_value', 'amount', 'users.name as user')
            ->get();
        return $orderSales;
    }

}
