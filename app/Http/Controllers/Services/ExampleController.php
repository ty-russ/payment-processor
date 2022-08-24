<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;

class ExampleController extends Controller
{
   
    function initialize () {
            // Setup payment gateway
            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey('abc123');
            
            // Example form data
            $formData = [
                'number' => '4242424242424242',
                'expiryMonth' => '6',
                'expiryYear' => '2016',
                'cvv' => '123'
            ];
            
            // Send purchase request
            $response = $gateway->purchase(
                [
                    'amount' => '10.00',
                    'currency' => 'USD',
                    'card' => $formData
                ]
            )->send();
            
            // Process response
            if ($response->isSuccessful()) {
                
                // Payment was successful
                print_r($response);
            
            } elseif ($response->isRedirect()) {
                
                // Redirect to offsite payment gateway
                $response->redirect();
            
            } else {
            
                // Payment failed
                echo $response->getMessage();
            }



    }

  
}
