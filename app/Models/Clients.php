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
}
