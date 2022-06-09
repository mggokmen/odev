<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class BrandController extends Controller
{

    // brand list
    public function index()
    {

        $brands = Brand::All();
        return view('brand.list', [
            'brands' => $brands ?? null
        ]);
    }
    // brand list


    // Add new brand form
    public function new()
    {

        return view('brand.new');
    }
    // Add new brand form


    // Create new brand and redirect list
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect(route('brand.new'))
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $brand = new Brand;
            $brand->name = $request->input('name');
            $brand->save();
        } catch (QueryException $e) {

            return redirect(route('brand.new'))
                ->withErrors("['name':'Bu isimle bir kayıt bulunuyor']")
                ->withInput();
        }


        return redirect(route('brand.list'));
    }
    // Create new brand and redirect list


    // Edit a brand name
    public function edit($brand_id)
    {

        $brand = Brand::findOrFail($brand_id);

        return view('brand.edit', [
            'brand' => $brand
        ]);
    }
    // Edit e brand name

    // Save edit brand and redirect list
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255'
        ]);

        $brand_id = $request->input('brand_id');

        if ($validator->fails()) {
            return redirect(route('brand.edit', ['brand_id' => $brand_id]))
                ->withErrors($validator)
                ->withInput();
        }

        $brand = Brand::findOrFail($brand_id);
        $brand->name = $request->input('name');
        $brand->touch();

        return redirect(route('brand.list'));
    }
    // Save edit brand and redirect list


    // Delete a brand
    public function drop($brand_id)
    {

        $brand = Brand::findOrFail($brand_id);
        $brand->delete();

        return redirect(route('brand.list'));
    }
    // Edit e brand name

}
