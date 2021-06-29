<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function select2()
    {
        $results = [];

        foreach (Product::all() as $product)
        {
            $test = new \stdClass();
            $test->id = $product->id;
            $test->text = $product->name;
            $results[] = $test;
        }

        return response()->json([
            'results' => $results,
            'pagination' => [
                'more' => false
            ]
        ]);
    }
}
