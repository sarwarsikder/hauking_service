<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;


class PayPalPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment($info)
    {
        $data = [];
        $data['items'] = [
            [
                'name' => $info['cart']['service_name'],
                'price' => json_decode($info['cart']['subscription_type'])->amount,
                'desc'  => 'Description for ItSolutionStuff.com',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = date('YmdHis');
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('service-checkout-payment-success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = json_decode($info['cart']['subscription_type'])->amount;

        $provider = new ExpressCheckout;
        
       
        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        // $startdate = Carbon::now()->toAtomString();
        // $profile_desc = !empty($data['subscription_desc']) ? $data['subscription_desc'] :
        // $data['invoice_description'];
        // $data = [
        //     'PROFILESTARTDATE' => $startdate,
        //     'DESC' => $profile_desc,
        //     'BILLINGPERIOD' => 'Month', // Can be 'Day', 'Week', 'SemiMonth', 'Month', 'Year'
        //     'BILLINGFREQUENCY' => 1, //
        //     'AMT' => 10, // Billing amount for each billing cycle
        //     'CURRENCYCODE' => 'USD', // Currency code
        //     'TRIALBILLINGPERIOD' => 'Day', 
        //     'TRIALBILLINGFREQUENCY' => 10, // (Optional) set 12 for monthly, 52 for yearly
        //     'TRIALTOTALBILLINGCYCLES' => 1, // (Optional) Change it accordingly
        //     'TRIALAMT' => 0, // (Optional) Change it accordingly
        // ];
        // $response = $provider->createRecurringPaymentsProfile($data, $response['TOKEN']);
        echo "<pre>";
        print_r($response);
        die;
        return $response['paypal_link'];
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    
    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successfully. You can create success page here.');
        }

        dd('Something is wrong.');
    }

    public function paymentCancel(){
        
    }

    /**
     * After payment make it recurring
     */
    public function getPaymentStatus(Request $request)
    {
        $response = PayPal::getProvider()->getExpressCheckoutDetails($request->token);

        $data['items'] = [
            [
                'name' => 'Product 1',
                'price' => 9.99
            ]
        ];

        $data['total'] = 9.99;
        $data['invoice_id'] = 4;
        $data['invoice_description'] = $data['invoice_id'];
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/cart');

        $response = PayPal::getProvider()->doExpressCheckoutPayment($data, $response['TOKEN'], $response['PAYERID']);

        $data = [
            'CURRENCYCODE' => 'EUR',
            'PROFILESTARTDATE' => \Carbon\Carbon::now()->addDays(14)->toAtomString(),
            'DESC' => 4,
            'BILLINGPERIOD' => 'Month', // Can be 'Day', 'Week', 'SemiMonth', 'Month', 'Year'
            'BILLINGFREQUENCY' => 1, // set 12 for monthly, 52 for yearly
            'AMT' => 9.99, // Billing amount for each billing cycle
            'CURRENCYCODE' => 'USD', // Currency code 
            'TRIALBILLINGPERIOD' => 'Day',  // (Optional) Can be 'Day', 'Week', 'SemiMonth', 'Month', 'Year'
            'TRIALBILLINGFREQUENCY' => 14, // (Optional) set 12 for monthly, 52 for yearly 
            'TRIALTOTALBILLINGCYCLES' => 1, // (Optional) Change it accordingly
            'TRIALAMT' => 0, // (Optional) Change it accordingly
        ];
        $response = PayPal::getProvider()->createRecurringPaymentsProfile($data, $request->token);
        //$response = PayPal::getProvider()->doExpressCheckoutPayment($data, $request->token, $request->PayerID);
        dd($response);
    }
}
