<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    public function list($brand_id)
    {

        $products = Product::where('brand_id', $brand_id)->get();
        return view('product.list', [
            'products' => $products ?? null,
            'brand_id' => $brand_id
        ]);
    }

    public function new($brand_id)
    {

        return view('product.new', [
            'brand_id' => $brand_id
        ]);
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'brand_id' => 'required|integer'
        ]);

        $brand_id = $request->input('brand_id');
        $name = $request->input('name');

        if ($validator->fails()) {
            return redirect(route('product.new', ['brand_id' => $brand_id]))
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $products = new Product;
            $products->name = $name;
            $products->brand_id = $brand_id;
            $products->save();
        } catch (QueryException $e) {

            return redirect(route('product.new', ['brand_id' => $brand_id]))
                ->withErrors("['name':'Bu isimle bir kayıt bulunuyor']")
                ->withInput();
        }


        return redirect(route('product.list', [
            'brand_id' => $products->brand_id
        ]));
    }



    // Edit a product name
    public function edit($product_id)
    {

        $product = Product::findOrFail($product_id);

        return view('product.edit', [
            'product' => $product
        ]);
    }
    // Edit e product name

    // Save edit product and redirect list
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255'
        ]);

        $product_id = $request->input('product_id');

        if ($validator->fails()) {
            return redirect(route('product.edit', ['product_id' => $product_id]))
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::findOrFail($product_id);
        $product->name = $request->input('name');
        $product->touch();

        return redirect(route('product.list', [
            'brand_id' => $product->brand_id
        ]));
    }
    // Save edit product and redirect list


    // Delete a product
    public function drop($product_id)
    {

        $product = Product::findOrFail($product_id);
        $brand_id = $product->brand_id;
        $product->delete();

        return redirect(route('product.list', [
            'brand_id', $product->brand_id
        ]));
    }
    // Edit e product name
}
