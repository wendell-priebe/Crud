<?php

namespace App\Http\Controllers;

use App\Models\GlobalPages;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $products;
    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function index(){
        $products = $this->products->getIndex(); 
        return view('products.index', [
            'products' => $products 
        ]);
    }

    public function create(Request $request){
        $products = $this->products->getIndex(); 
        return view('products.index', [
            'products' => $products 
        ]);

        $id = new GlobalPages();
        $data['id'] = $id->uuid4();
    }

    
}
