<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;


class paypal extends Controller
{
    //pay for become member of the Auction

    public function payment(Request $request)
    { $user_id=$request->user_id;
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypaltoken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('payment.success',compact('user_id')),
                    "cancel_url" => route('payment.cancel'),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            'currency_code' => 'USD',
                            "value" => $request->member_value,
                           
                            // Make sure 'value' is used for the price

                        ],
                       

                    ],
                ],
            ]);

            foreach ($response['links'] as $link) {
                if ($link['rel'] == "approve") {
                    return redirect()->away($link['href']);
                }
            }
        } catch (\Exception $e) {
            // Handle API request errors here, e.g., log the error message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function success(Request $request , $id)
    {
       
          $memberinfo=$request;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypaltoken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // use carbon library
        $expirationDate = Carbon::now()->addYear();

        if (isset($response['status']) && $response['status'] == "COMPLETED") {
           DB::table('payments')->insert([
                'user_id' => $id,
                'user_name' => $response['payment_source']['paypal']['name']['given_name'] . $response['payment_source']['paypal']['name']['surname'],
                'user_email' => $response['payment_source']['paypal']['email_address'],
                'payment_status' => $response['payment_source']['paypal']['account_status'],
                'currency' => 'USD',
                'amount' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                'expiration_date' => $expirationDate,
            ]);
            DB::table('users')->update([
                'role'=>'buyer'
            ]);
            // approve payment
            return redirect()->route('home');
        } else {

            return response()->json('Failed payment');
        }


    }

    public function cancel()
    {
        dd('cancelled the order');

    }


}