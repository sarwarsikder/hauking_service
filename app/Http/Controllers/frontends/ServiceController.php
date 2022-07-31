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
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Auth;

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

        return view('frontends.services.service_details',$this->data);

     
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $session_id = Session::getId();
        $checkCart = Cart::where('session_id',$session_id)->first();
        
        $this->data['checkCart'] = $checkCart;
        return view('frontends.services.service_checkout', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order_id)
    {
        
        return view('frontends.services.service_update');
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

        if($request->subscription_type!='' && $request->subscription_type!=NULL && $request->hawkin_scale!='' && $request->hawkin_scale!=NULL && count($request->hawkin_scale)>0){
            $service = Service::where('id', $id)->first();
            $session_id = Session::getId();
            $checkCart = Cart::where('session_id',$session_id)->first();
            if($checkCart!=''){
                $checkCart->delete();
            }
            $newCart = new Cart();
            if(Auth::user()){
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
        }else{
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
    
    
    public function checkoutPayment(BillingRequest $request)
    {
        $session_id = Session::getId();
        $checkCart = Cart::where('session_id',$session_id)->first();
        $this->data['first_name'] = $request->first_name;
        $this->data['last_name'] = $request->last_name;
        $this->data['street_address'] = $request->street_address;
        $this->data['city'] = $request->city;
        $this->data['state'] = $request->state;
        $this->data['zipcode'] = $request->zipcode;
        $this->data['country'] = $request->country;
        $this->data['cart'] = Cart::where('session_id',$session_id)->first();
        $this->data['user'] = Auth::user();


        if($request->payment_method=="paypal"){
            $paypalController = new PayPalPaymentController();
            $paypalController->payment($this->data);
        }elseif($request->payment_method=="stripe"){
            $stripeController = new StripePaymentController();
            $stripeController->payment($this->data);
        }
        

        echo "<pre>";
        print_r($this->data);
        die;
    }
}
