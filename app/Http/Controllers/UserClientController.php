<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserClientRequest;
use App\Http\Requests\UpdateUserClientRequest;
use App\Models\UserClient;

class UserClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserClient  $userClient
     * @return \Illuminate\Http\Response
     */
    public function show(UserClient $userClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserClient  $userClient
     * @return \Illuminate\Http\Response
     */
    public function edit(UserClient $userClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserClientRequest  $request
     * @param  \App\Models\UserClient  $userClient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserClientRequest $request, UserClient $userClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserClient  $userClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserClient $userClient)
    {
        //
    }
}
