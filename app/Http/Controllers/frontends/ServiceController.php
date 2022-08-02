<?php

namespace App\Http\Controllers\frontends;

use App\Http\Controllers\Controller;
use App\Http\Controllers\payments\PayPalPaymentController;
use App\Http\Controllers\payments\StripePaymentController;
use App\Service\HaukingService;
use Illuminate\Http\Request;
use App\Http\Requests\FrontendRequest\BillingRequest;
use App\Models\Frequency;
use App\Models\Service;
use App\Models\ServiceOrders;
use App\Models\Timezone;
use App\Models\ServiceSubscriptions;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Tax;
use App\Models\State;
use App\Models\Cart;
use App\Models\BillingAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class ServiceController extends Controller
{
    private array $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $hauking_service = new HaukingService($request->toArray());

            $this->data['haukings'] = $hauking_service->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('frontends.services.service_list', $this->data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $session_id = Session::getId();
        // dd($session_id);
        $service = Service::where('id', $id)->first();
        // $session_id = Session::getId();
        // dd($session_id);
        // return $service;
        $this->data['service'] = $service;

        return view('frontends.services.service_details', $this->data);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $checkCart = Cart::where('session_id', Session::getId())->first();
        if($checkCart){
            $this->data['checkCart'] = $checkCart;
            $this->data['state'] = State::all();
            return view('frontends.services.service_checkout', $this->data);
        }else{
            return redirect('/')->with('page_message', 'Cart id empty!');
        }
//         if (Auth::check()) {
//            /* $user_id = Auth::id();
//             $session_id = Session::getId();
//             $this->data['checkCart'] = Cart::where(function ($query) use ($user_id, $session_id) {
//                 $query->where('user_id', '=', $user_id)
//                     ->orWhere('session_id', '=', $session_id);
//             })->first();*/
//             $this->data['checkCart'] = 
           
//         } else {
//             $this->data['checkCart'] = Cart::where('session_id', Session::getId())->first();
//         }
//         $this->data['state'] = State::all();
// //        if (count($this->data['checkCart']) == 0) {
// //            return redirect('/')->with('page_message', 'Cart id empty!');
// //        }

//         return view('frontends.services.service_checkout', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $order_id)
    {
        $service_orders = ServiceOrders::where('order_id', $order_id)->with('service')->first();

        $this->data['timezones'] = Timezone::all();
        $this->data['frequency'] = Frequency::all();
        $this->data['service'] = $service_orders;

        // return $this->data;
        return view('frontends.services.service_update', $this->data);
    }

    public function checkCouponCode(Request $request){
        try {
            if ($request->ajax()) {
                // print_r("adad");
                $coupon = Coupon::where("coupon_code",$request->code)->first();
                if($coupon){
                    return Response::json(array(
                        'status' => true,
                        'data' => $coupon,
                        "message" =>"Coupon added successfully"
                    ), 200);
                }else{
                    return Response::json(array(
                        'status' => false,
                        "message" =>"Invalid coupon code"
                    ), 200);
                }
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!'
            ), 400);
        }

        
    }
    
    
    public function checkStateTax(Request $request){
        try {
            if ($request->ajax()) {
                // print_r("adad");
                $tax = Tax::where("state_id",$request->state)->first();
                if($tax){
                    return Response::json(array(
                        'status' => true,
                        'data' => $tax,
                        "message" =>"tax value found successfully"
                    ), 200);
                }else{
                    return Response::json(array(
                        'status' => false,
                        "message" =>"Invalid state"
                    ), 200);
                }
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!'
            ), 400);
        }

        
    }


    public function update(Request $request, $id)
    {

        $service_orders = ServiceOrders::where('id', $id)->first();

        if ($service_orders != '') {
            $service_orders->hawkin_scale = json_encode([$request->hawkin_scale]);
            $service_orders->default_value_day = json_encode(array("day_time" => $request->default_value_day_time, "value" => $request->default_value_day_value));
            $service_orders->default_value_night = json_encode(array("day_time" => $request->default_value_night_time, "value" => $request->default_value_night_value));
            $service_orders->default_value_booster = json_encode(array("day_time" => $request->default_value_booster_time, "value" => $request->default_value_booster_value));
            $service_orders->default_special_feq = json_encode($request->default_special_feq);

            $service_orders->save();
            return redirect("service-update/" . $service_orders->order_id);
        }

        return redirect()->back()->with('redirect-message', 'Something wrong!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request, $id)
    {

        if ($request->subscription_type != '' && $request->subscription_type != NULL && $request->hawkin_scale != '' && $request->hawkin_scale != NULL && count($request->hawkin_scale) > 0) {
            $service = Service::where('id', $id)->first();
            $session_id = Session::getId();
            $checkCart = Cart::where('session_id', $session_id)->first();
            if ($checkCart != '') {
                $checkCart->delete();
            }
            $newCart = new Cart();
            if (Auth::user()) {
                $newCart->user_id = Auth::user()->id;
            }

            $newCart->session_id = $session_id;
            $newCart->service_id = $id;
            $newCart->service_name = $service->service_name;
            $newCart->subscription_type = $request->subscription_type;
            $newCart->trial_period = $service->trial_period;
            $newCart->hawkin_scale = json_encode($request->hawkin_scale);
            $newCart->data_fields = $request->data_fields;
            $newCart->default_value_day = $service->default_value_day;
            $newCart->default_value_night = $service->default_value_night;
            $newCart->default_value_booster = $service->default_value_booster;
            $newCart->default_special_feq = $service->default_special_feq;
            $newCart->service_image_url = $service->service_image_url;

            $newCart->save();
            return redirect('checkout');
        } else {
            return redirect()->back()->with('redirect-message', 'Something wrong!');
        }

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

    public function checkoutPaymentSuccess(Request $request)
    {
    
        $order = Order::where('payment_token', $request->payment_token)->first();
        $cartData = Cart::where('session_id', $request->session_id)->first();
        
        if ($order) {
            $order->payment_status = "complete";
            $order->save();
            $order_id = $order->id;

            /**
             * Create Service Order
             */
            $newServiceOrders = new ServiceOrders();
            $newServiceOrders->service_id = $cartData->service_id;
            $newServiceOrders->order_id = $order_id;
            $newServiceOrders->hawkin_scale = $cartData->hawkin_scale;
            $newServiceOrders->data_fields = $cartData->data_fields;
            $newServiceOrders->default_value_day = $cartData->default_value_day;
            $newServiceOrders->default_value_night = $cartData->default_value_night;
            $newServiceOrders->default_value_booster = $cartData->default_value_booster;
            $newServiceOrders->default_special_feq = $cartData->default_special_feq;
            $newServiceOrders->created_by = $cartData->user_id;
            $newServiceOrders->updated_by = $cartData->user_id;
            
            $newServiceOrders->save();

            /**
             * Create Service Subscription
             */
            $newServiceSubscription = new ServiceSubscriptions();
            $newServiceSubscription->service_id = $cartData->service_id;
            $newServiceSubscription->order_id = $order_id;
            $newServiceSubscription->status = "active";
            $newServiceSubscription->payments_status = "completed";
            $newServiceSubscription->user_id = $cartData->user_id;
            $newServiceSubscription->monthly_amount = json_decode($cartData->subscription_type)->amount;
            // $newServiceSubscription->start_date = $cartData->default_value_day;
            // $newServiceSubscription->end_date = $cartData->default_value_night;
            // $newServiceSubscription->trial_end_date = $cartData->default_value_booster;
            // $newServiceSubscription->next_payment_date = $cartData->default_special_feq;
            // $newServiceSubscription->over_payment_date = $cartData->default_special_feq;
            // return $newServiceSubscription;
            $newServiceSubscription->save();
            $cartData->delete();
            return redirect('/')->with('redirect-message', 'Service Purchased Successfully');
        } else {
            return redirect('checkout')->with('redirect-message', 'Something wrong!');
        }

    }

    public function checkoutPayment(BillingRequest $request)
    {
        $session_id = Session::getId();
        $couponId = '';
        $checkCart = Cart::where('session_id', $session_id)->first();
        $paymentAmount = json_decode($checkCart->subscription_type)->amount;
        
        $billingAddress = new BillingAddress();
        $billingAddress->first_name = $request->first_name;
        $billingAddress->last_name = $request->last_name;
        $billingAddress->email = Auth::user()->email;
        $billingAddress->primary_address = $request->street_address;
        $billingAddress->city = $request->city;
        $billingAddress->state = $request->state;
        $billingAddress->zipcode = $request->zipcode;
        $billingAddress->country = $request->country;
        $billingAddress->save();
        $tax = Tax::where("state_id",$request->state)->first();
        $taxRate = 0;
        if($tax!=''){
            $taxRate = $tax->tax_rate;
            $paymentAmount = $paymentAmount - $tax->tax_rate;
        }
        if($request->coupon_code){
            $coupon = Coupon::where("coupon_code",$request->coupon_code)->first();
            
            if($coupon!=''){
                $couponId = $coupon->id;
                if($coupon->coupon_type=="fixed"){
                    $paymentAmount = $paymentAmount - $coupon->coupon_value;
                }else{
                    $paymentAmount = $paymentAmount - ($coupon->coupon_value/100)*$paymentAmount;
                }
            }
        }

        $paymentToken=md5(microtime(true).mt_Rand());

        $this->data['first_name'] = $request->first_name;
        $this->data['last_name'] = $request->last_name;
        $this->data['street_address'] = $request->street_address;
        $this->data['city'] = $request->city;
        $this->data['state'] = $request->state;
        $this->data['zipcode'] = $request->zipcode;
        $this->data['country'] = $request->country;
        $this->data['cart'] = Cart::where('session_id', $session_id)->first();
        $this->data['coupon_code'] = $request->coupon_code;
        $this->data['user'] = Auth::user();
        $this->data['paymentAmount'] = $paymentAmount;
        $this->data['paymentToken'] = $paymentToken;

        if ($request->payment_method == "paypal") {
            $paypalController = new PayPalPaymentController();
            $url = $paypalController->payment($this->data);

            if($url){
                /**
                 * Create Order
                 */
                
                $order = new Order();
                $order->user_id = $cartData->user_id;
                $order->payment_status = "pending";
                $order->payment_method = $request->payment_method;
                $order->payment_type = "sadasd";
                $order->total_amount = $paymentAmount;
                $order->tax = $tax;
                $order->payment_token = $paymentToken;
                $order->payment_url = $url;
                $order->coupon_id = $couponId;
                $order->service_id = $cartData->service_id;
                $order->save();

                // $checkCart->delete();
                return redirect()->to($url);

            }else{
                return redirect("/");
            }
            
            
        } elseif ($request->payment_method == "stripe") {
            $stripeController = new StripePaymentController();
            $url = $stripeController->payment($this->data);
            if($url){
                /**
                 * Create Order
                 */
                
                $order = new Order();
                $order->user_id = $checkCart->user_id;
                $order->payment_status = "pending";
                $order->payment_method = $request->payment_method;
                $order->payment_type = "sadasd";
                $order->total_amount = $paymentAmount;
                $order->tax = $taxRate;
                $order->payment_token = $paymentToken;
                $order->payment_url = $url;
                $order->coupon_id = $couponId;
                $order->service_id = $checkCart->service_id;

                $order->save();

                // $checkCart->delete();
                return redirect()->to($url);

            }else{
                return redirect("/");
            }
        }


    }
}
