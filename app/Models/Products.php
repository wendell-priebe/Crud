<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    
    protected $guarded = [];
    protected $keyType = 'string'; // sem isso não funciona o uuid
    protected $table  = 'products';
    // public $timestamps = false;
    use HasFactory;

    public function getIndex(){
        return $this->paginate(10);
    }
}
