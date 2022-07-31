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
          
          print_r("I am stripe");
          print_r($customer_id);
          return true;    //create product
      
          $product = $stripe->products->create([
      
            'name' => 'Diamond',
      
            'id'   => '123',
      
            'metadata' => [
      
              'name' => "silver",
      
              'last-date' => '30-7-2021'
      
            ]
      
          ]);
      
          $product_id = $product->id;
      
          //define product price and recurring interval
      
          $price = $stripe->prices->create([
      
            'unit_amount' => 2000,
      
            'currency' => 'usd',
      
            'recurring' => ['interval' => 'month'],
      
            'product' => $product_id,
      
          ]);
      
          $price_id = $price->id;
      
          //CREATE SUBSCRIPTION
      
        //   $subscription = $stripe->subscriptions->create([
      
        //     'customer' => $customer_id,
      
        //     'items' => [
      
        //       ['price' => $price_id],
      
        //     ],
      
        //     'metadata' => [
      
        //       'start_date' => '30-7-2021',
      
        //       'total_months' => '11',
      
        //       'end_date' => '30-5-2022'
      
        //     ]
      
        //   ]);
        // Stripe\Charge::create([
        //     "amount" => 100 * 100,
        //     "currency" => "usd",
        //     "customer" => $customer->id,
        //     "description" => "Test payment from itsolutionstuff.com.",
        //     "shipping" => [
        //         "name" => "Jenny Rosen",
        //         "address" => [
        //             "line1" => "510 Townsend St",
        //             "postal_code" => "98140",
        //             "city" => "San Francisco",
        //             "state" => "CA",
        //             "country" => "US",
        //         ],
        //     ]
        // ]);
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
