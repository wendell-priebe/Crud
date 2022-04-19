<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    
    protected $guarded = [];
    protected $keyType = 'string'; // sem isso não funciona o uuid
    protected $table  = 'payment_type';
    // public $timestamps = false;
    use HasFactory;

    public function orderSales(){
        return $this->hasMany(OrderSales::class, 'cod_payment', 'id');
    }
}
