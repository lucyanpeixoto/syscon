<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Client;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Services\OrderService;
use App\Http\Resources\OrderResource;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return httpResponse(new OrderResource(Order::all()));
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
            return httpResponse(new OrderResource(OrderService::store($request)), __('Pedido realizado com sucesso!'));
        } catch (Exception $e) {
            return httpResponse([], __('Erro ao realizar o pedido!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return httpResponse(new OrderResource($order));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Order $order)
    {
        try {
            $request->validated();
            return httpResponse(new OrderResource(OrderService::update($request, $order)), __('Pedido alterado com sucesso!'));
        } catch (Exception $e) {
            return httpResponse([], __('Erro ao realizar o pedido!'));
        }
    }
}
