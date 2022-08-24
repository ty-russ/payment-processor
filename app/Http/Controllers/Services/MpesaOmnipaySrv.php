<?php


use Omnipay\Omnipay;
use Omnipay\Mpesa;


//send path
  $gateway = Omnipay::create('Mpesa');
  $gateway->setShortCode('174379');
  $gateway->setConsumerKey('');
  $gateway->setConsumerSecret('');
  $gateway->setPassKey('');
  $gateway->setTestMode('sandbox'); 

      $purchase = $gateway->purchase(array(
         'amount' => '100',
         'phone_number' => '254708374149',
         'account' => 'apitest',
         'description' => 'This is a purchase',
         'callbackUrl' => 'https://example.com/callback_url.php',
       ));
       
       
       if ($response->isSuccessful()) {
             echo "Input your pin to purchase!";

       }else{
           // Payment failed
           return $response->getMessage();
      } 

      $data = $response->getData();
      echo '<pre>';print_r($data);echo '</pre>';