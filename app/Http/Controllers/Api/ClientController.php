<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\Client\StoreRequest;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return httpResponse(Client::all());
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
            return httpResponse(Client::create($request->all()), __('Cliente cadastrado com sucesso!'));
        } catch (\Exception $e) {
            return httpResponse([], __('Erro ao cadastrar o cliente!'), false, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return httpResponse($client);
    }
}
