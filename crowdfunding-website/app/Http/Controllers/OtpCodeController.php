<?php

namespace App\Http\Controllers;

use App\Models\OtpCode;
use App\Http\Requests\StoreOtpCodeRequest;
use App\Http\Requests\UpdateOtpCodeRequest;

class OtpCodeController extends Controller
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
     * @param  \App\Http\Requests\StoreOtpCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOtpCodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtpCode  $otpCode
     * @return \Illuminate\Http\Response
     */
    public function show(OtpCode $otpCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtpCode  $otpCode
     * @return \Illuminate\Http\Response
     */
    public function edit(OtpCode $otpCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOtpCodeRequest  $request
     * @param  \App\Models\OtpCode  $otpCode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOtpCodeRequest $request, OtpCode $otpCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtpCode  $otpCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtpCode $otpCode)
    {
        //
    }
}
