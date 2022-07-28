<?php

namespace App\Http\Controllers\backends\service;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Service\HaukingService;
use Illuminate\Http\Request;
use App\Models\Service;
use Response;

class HaukingServiceController extends Controller
{
    private array $data = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

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

        return view("backends.service.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backends.service.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        try {
            echo "<pre>";
            print_r($request->all());
            print_r(Auth::user);
            die;
            $serviceObject = new Service();

            $serviceObject->service_name = $request->service_name;
            $serviceObject->subscription_type = $request->subscription_input_value;
            $serviceObject->trial_period = $request->trial_period;
            $serviceObject->hawkin_scale = json_encode($request->hawkin_scale);
            $serviceObject->data_fields = $request->dataField_form_input_value;
            $serviceObject->default_value_day = $age = json_encode(array("time"=>$request->default_value_day_time, "value"=>$request->default_value_day_value));
            $serviceObject->default_value_night = json_encode(array("time"=>$request->default_value_night_time, "value"=>$request->default_value_night_value));
            $serviceObject->default_value_booster = json_encode(array("time"=>$request->default_value_booster_time, "value"=>$request->default_value_booster_value));
            $serviceObject->default_special_feq = $request->default_special_feq;
            $serviceObject->created_by = $request->created_by;
            $serviceObject->updated_by = $request->updated_by;
            

            if ($request->file('service_image_url')) {
                $file = $request->file('service_image_url');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/images/services'), $filename);
                $userObject->service_image_url = $request['service_image_url'];
            }

            if ($serviceObject->save()) {
                return redirect(route('service-list'))->with('redirect-message', 'Service successfully added!');
            } else {
                return redirect()->back()->with('redirect-message', 'Something wrong!');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
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