<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{

    protected $guarded = [];
    protected $keyType = 'string'; // sem isso não funciona o uuid
    protected $table  = 'clients';
    public $timestamps = false;
    use HasFactory;

    public function getClients(string|null  $search = null){
        $clients = $this->where(function($query) use ($search){
            if($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();
        return $clients;
    }

    public function orderSales(){
        return $this->hasMany(OrderSales::class, 'cod_client', 'id');
    }

}
