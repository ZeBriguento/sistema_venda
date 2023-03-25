<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaypalController extends Controller
{
    private $gateway;

    public function index()
    {
        # code...
    }
    public function payment(Request $request)
    {
       

        $system = System::get()->first();

        // dd($system);
        //use Omnipay\Omnipay;
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId($system->paypal_client_id);
        $this->gateway->setSecret($system->paypal_client_secret);
        $this->gateway->setTestMode($system->paypal_mode);




        # code...
    }
    public function erro()
    {
        # code...
    }
    public function sucesso()
    {
        # code...
    }
}
