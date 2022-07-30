<?php

namespace App\Http\Controllers\backends\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentSettingsRequest;
use App\Models\PaymentSettings;
use App\Service\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:payment-list|payment-create|payment-edit|payment-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:payment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:payment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $payment_service = new PaymentService($request->toArray());
            $this->data['payments'] = $payment_service->get();

        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.settings.payment.index", $this->data);
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
    public function update(PaymentSettingsRequest $request,)
    {
        try {
            $payment_service = PaymentSettings::find($request->id);
            if (!empty($payment_service)) {
                $payment_service->method_type = $request['method_type'];
                $payment_service->mode = $request['mode'];
                $payment_service->account_email = $request['account_email'];
                $payment_service->client_id = $request['client_id'];
                $payment_service->client_secret_key = $request['client_secret_key'];
                $payment_service->test_public_key = $request['test_public_key'];
                $payment_service->test_secret_key = $request['test_secret_key'];
                $payment_service->live_public_key = $request['live_public_key'];
                $payment_service->live_secret_key = $request['live_secret_key'];
                $payment_service->default_payment = !empty($request['default_payment']) == '1' ? true : false;
                $payment_service->status = !empty($request['status']) == '1' ? true : false;
                $payment_service->display_order = $request['display_order'];
                if ($payment_service->save()) {
                    return redirect(route('payments-list'))->with('redirect-message', 'Payment successfully Updated!');
                } else {
                    return redirect()->back()->with('redirect-message', 'Something wrong!');
                }
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
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
}
