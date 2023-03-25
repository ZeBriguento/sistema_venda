<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripePaymentController extends Controller
{
    //
    public function stripeGet()
    {
        return view('admin.stripe.index');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET '));
        Stripe\Charge::create([
            'amount'=> $request->amount,
            'currency' => $request->currency,
            'source' => $request->stripeToken,
            'description' => $request->description,
        ]);

        return redirect()->route('stripes.get')->with('status', 'Pagamento efectuado com sucesso');
    }
}
