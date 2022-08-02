<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontends.payments.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        $customer = Stripe\Customer::create(array(

            "address" => [
                "line1" => "Virani Chowk",
                "postal_code" => "360001",
                "city" => "Rajkot",
                "state" => "GJ",
                "country" => "IN",
            ],

            "email" => "demo@gmail.com",
            "name" => "Hardik Savani",
            "source" => $request->stripeToken
        ));


        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "customer" => $customer->id,
            "description" => "Test payment from itsolutionstuff.com.",
            "shipping" => [
                "name" => "Jenny Rosen",
                "address" => [
                    "line1" => "510 Townsend St",
                    "postal_code" => "98140",
                    "city" => "San Francisco",
                    "state" => "CA",
                    "country" => "US",
                ],
            ]
        ]);
    }


    public function payment($data)
    {
       
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customerData = array(

            "address" => [
                "line1" => $data['street_address'],
                "postal_code" => $data['zipcode'],
                "city" => $data['city'],
                "state" => $data['state'],
                "country" => $data['country'],
            ],

            "email" => $data['user']['email'],
            "name" => $data['user']['first_name'].' '.$data['user']['last_name'],
            // "source" => $request->stripeToken
        );

        $customer = Stripe\Customer::create($customerData);
        
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')     
          );
      
          $customer_id = $customer->id;
          
          
          $productData = array(
            'name' => $data['cart']['service_name'],
            // 'id'   => $data['cart']['service_id'],
            'metadata' => [
              'name' => $data['cart']['service_name'],
              'id' => $data['cart']['service_id']
            ]
        );
        $product = $stripe->products->create($productData);
        $product_id = $product->id;
        
        $priceData = array(
                'unit_amount' => $data['paymentAmount']*100,
                'currency' => 'usd',
                'recurring' => ['interval' => 'month','interval_count' => json_decode($data['cart']['subscription_type'])->duration],
                'product' => $product_id,
            );
        $price = $stripe->prices->create($priceData);
          
              
        $price_id = $price->id;
        $url  = url('/');
        $stripe_session = Stripe\Checkout\Session::create([
            'success_url' => $url.'/checkout/payment/success?payment_method=stripe&session_id='.$data['paymentToken'],
            'cancel_url' => $url.'/checkout/payment/canceled',
            'mode' => 'subscription',
            'line_items' => [[
              'price' => $price_id,
              // For metered billing, do not pass quantity
              'quantity' => 1,
            ]],
        ]);
        return $stripe_session['url'];
        // redirect()->to($stripe_session['url']);
        
        
        //   $plan_id = date('YmdHis');
        //   $my_original_plan =  \Stripe\Plan::create(array(
        //     "id"  => $plan_id,
        //     "interval"  =>  "month",
        //     'interval_count' => json_decode($data['cart']['subscription_type'])->duration,
        //     "currency"  => "usd",
        //     "product" => $productData,
        //     "amount"  => json_decode($data['cart']['subscription_type'])->amount*100,
        //     'trial_period_days' => $data['cart']['trial_period']
        // ));

 

        //   $productData = array(
        //     'name' => date('YmdHis'),
        //     'id'   => date('YmdHis'),
        //     'metadata' => [
        //       'name' => $data['cart']['service_name'],
        //       'id' => $data['cart']['service_id']
        //     ]
        // );
        //   
      
        
        //   $product_id = $product->id;
      
          //define product price and recurring interval
      
        //   
          //CREATE SUBSCRIPTION
      
        //   $subscription = $stripe->subscriptions->create([
      
        //     'customer' => $customer_id,
      
        //     'items' => [
      
        //       ['price' => $price_id],
        // items: [{ plan: stripePlanID, quantity: 1 }],
        //     ],
      
        //     'metadata' => [
      
        //       'start_date' => '30-7-2021',
      
        //       'total_months' => '11',
      
        //       'end_date' => '30-5-2022'
      
        //     ]
      
        // ]);
        // $charge = Stripe\Charge::create([
        //     "amount" => json_decode($data['cart']['subscription_type'])->amount*100,
        //     "currency" => "usd",
        //     "customer" => $customer->id,
        //     "description" => "Test payment from itsolutionstuff.com.",
        //     "shipping" => $customerData,
        //     "items" => [ 'plan' => $plan_id, 'quantity'=> 1 ]
        // ]);
        // echo "<pre>";
        // print_r("================");
        // print_r($charge);
        // echo "<pre>";
        // print_r($charge);
        // die;

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
