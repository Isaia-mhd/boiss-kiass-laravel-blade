<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout(Basket $basket)
    {
        return view('payment.checkout', ['basket'=> $basket]);
    }

    public function payment(Request $request, Basket $basket)
    {
       try{
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => $basket->articles->name],
                    'unit_amount' => $basket->price_unit * 100, // Amount in cents (... USD)
                ],
                'quantity' => $basket->quantity,
            ]],
            'mode' => 'payment',
            'success_url' => route('success', ["basket" => $basket]),
            'cancel_url' => route('cancel'),
        ]);

        return redirect($session->url);
       } catch (\Stripe\Exception\ApiConnectionException $e) {
        // Network error (e.g., no internet or Stripe service is down)
        return back()->with('error', 'Could not connect to Stripe. Please check your internet connection.');
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // General Stripe API error
        return back()->with('error', 'Payment error: ' . $e->getMessage());
    } catch (\Exception $e) {
        // Other errors (server issues, etc.)
        return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
    }
    }


    public function success($basket)
    {
        try {
            $paid = Basket::find($basket);
            $paid->update([
                "status" => "Paid"
            ]);
            return redirect()->route("basket.show")->with("success", "Article was paid successfully !");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function cancel()
    {
        return "Payment Cancelled!";
    }
}
