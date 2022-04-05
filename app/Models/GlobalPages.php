<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class GlobalPages extends Model{
  protected $keyType = 'string'; // sem isso não funciona o uuid
    
  public function uuid4(){

    //return Str::uuid(); // gera um UUID versão 4, ex: 85c44b2b-c65a-43b9-8619-6f6d3e45008b
    //return Uuid::uuid1(); // gera um UUID versão 1, ex: aa3ccbb2-4c43-11eb-a8a1-0242ac1b0002
    return Uuid::uuid4(); // gera um UUID versão 4, ex: d066faaf-c49c-44e2-a32c-c138dee7b5e2
  }
}
