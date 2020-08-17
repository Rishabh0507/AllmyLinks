<?php

namespace App\Http\Controllers;

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\paypal\createPayment;
use PayPal\Api\PaymentExecution;

class paymentController extends Controller
{
    public function payment()
    {
        return view('payment');
    }

    public function create()
    {
        $payment = new createPayment;
        $payment->create();
    }

    public function ExecutePayment() {

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AQ4dBADpotwyZlmOTQwuyBMIatDDsvQ6LD-8AatHTlebxF7l4mu0F-yXF3Np_Dd-HqdhzZsP4tGtx9Bv',     // ClientID
                'EB1T-y-RQ0SpLJxDe2ASMwSBTSz43T2KaAQXgcEimu-YxbajjphSKf23Qan17IDmgpfPSl4zyedBdjyT'      // ClientSecret
            )
        );

        $paymentId =  request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(2.2)
        ->setTax(1.3)
        ->setSubtotal(17.50);

        $amount->setCurrency('USD');
        $amount->setTotal(21);
        $amount->setDetails($details);
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $apiContext);
        return $result;
    }
}
