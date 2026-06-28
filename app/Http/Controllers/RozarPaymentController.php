<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
class RozarPaymentController extends Controller
{
    public function index()
    {
        return view('rozarpayment.index');
    }

    public function store(Request $request)
    {
        try{

            $amount = $request->input('amount');
            // echo $amount;
             $api = new Api(config('services.razor.key') , config('services.razor.secret'));
             $data = [
                'receipt'=>'order_'.rand(1000,9999),
                'amount'=>$amount * 100,
                'currency'=>'INR',
                'payment_capture'=>1
             ];
             $order = $api->order->create($data);
             echo "<h1>" . $order['id'] . "</h1>";   
            }catch(Exception $e){
                echo $e->getMessage(); 
            }
    }
}
