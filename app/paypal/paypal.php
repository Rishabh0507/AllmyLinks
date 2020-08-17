<?php


namespace App\paypal;


class paypal
{
    protected $apiContext;
 public function __construct()
 {
     $this->apiContext = new \PayPal\Rest\ApiContext(
         new \PayPal\Auth\OAuthTokenCredential(
             config('services.paypal.id'),
             config('services.paypal.secret')
         )
     );
 }

}
