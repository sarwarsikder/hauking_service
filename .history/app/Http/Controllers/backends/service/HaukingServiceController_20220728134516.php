<?php

namespace App\Http\Controllers\backends\service;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Service\HaukingService;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Frequency;
use Response;
use Auth;

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
        die("sda");
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
        $frequency = Frequency::all();
        $this->data['frequency'] = $frequency;
        return view("backends.service.create",$this->data);
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
            $serviceObject->created_by = Auth::user()->id;
            $serviceObject->updated_by = Auth::user()->id;
            
            

            if ($request->file('service_image_url')) {
                $file = $request->file('service_image_url');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('/images/services'), $filename);
                $serviceObject->service_image_url = $filename;
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $frequency = Frequency::all();
        $service = Service::where('id',$id)->first();
        // return $service;
        $this->data['service'] = $service;
        $this->data['frequency'] = $frequency;
        return view("backends.service.edit",$this->data);
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

    public function updateStatus(Request $request)
    {
        try {
            if ($request->ajax()) {
                $service = new HaukingService($request->toArray());
                $this->data['services'] = $service->statusUpdate();
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!'
            ), 400);
        }

        return Response::json(array(
            'status' => true,
            'data' => [],
            'message' => 'Status updated successfully!'
        ), 200);

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
