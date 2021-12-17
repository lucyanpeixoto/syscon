<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Client;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public static function store($request)
    {
        try {             
            DB::beginTransaction();

            $client = Client::find($request->get('client')['id']);
            $seller = Auth::user()->seller;
            $products = self::formatArrayProductToSaveRelationship($request->get('products'));

            $amout = self::getTotalAmout($request->get('products'));

            $order = new Order;
            $order->client()->associate($client);
            $order->seller()->associate($seller);
            $order->amount = $amout;
            $order->save();

            $order->products()->attach($products);

            DB::commit();

            $order->load('products');

            return $order;
            
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public static function update($request, Order $order)
    {
        try {             
            DB::beginTransaction();

            $client = Client::find($request->get('client')['id']);
            $seller = Auth::user()->seller;
            $products = self::formatArrayProductToSaveRelationship($request->get('products'));

            $amout = self::getTotalAmout($request->get('products'));

            $order->client()->associate($client);
            $order->seller()->associate($seller);
            $order->amount = $amout;
            $order->save();

            $order->products()->sync($products);

            DB::commit();

            $order->load('products');
            return $order;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    private static function formatArrayProductToSaveRelationship($data) 
    {
        foreach ($data as $item) {
            $products[$item['id']] = ['quantity' => $item['quantity']];
        }
        return $products;
    }

    private static function getTotalAmout($data)
    {
        $amout = 0;

        foreach ($data as $item) {
            $product = Product::find($item['id']);
            $amout += $product->price * $item['quantity'];
        }

        return $amout;
    }
}
