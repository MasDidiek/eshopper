<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function view($id)
    {
        $products = Product::find($id);
        return view('product_detail', compact('products'));
    }


    public function productApi()
    {
        $products = Product::all();

        return response()->json([
            'message' => 'success',
            'data' => $products
        ]);
    }

    public function productDetailApi($id)
    {
        $product = Product::find($id);

        return response()->json([
            'message' => 'success',
            'data' => $product
        ]);
    }
}
