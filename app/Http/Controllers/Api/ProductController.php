<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Lot;
use App\Models\Color;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return httpResponse(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            $request->validated();

            $lot = Lot::find($request->get('lot')["id"]);
            $color = Color::find($request->get('color')["id"]);

            $product = new Product;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->lot()->associate($lot);
            $product->color()->associate($color);
            $product->save();

            return httpResponse($product, __('Produto cadastrado com sucesso'));
        } catch (\Exception $e) {
            return httpResponse([], $e->getMessage(), false, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return httpResponse($product);
    }

    public function update(UpdateRequest $request, Product $product) 
    {
        try {
        $request->validated();

        $lot = Lot::find($request->get('lot')["id"]);
        $color = Color::find($request->get('color')["id"]);
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->lot()->associate($lot);
        $product->color()->associate($color);
        $product->save();

        return httpResponse($product, __('Produto alterado com sucesso'));
        } catch (\Exception $e) {
            return httpResponse([], $e->getMessage(), false, 400);
        }
    }

}
