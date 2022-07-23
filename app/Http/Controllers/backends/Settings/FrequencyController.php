<?php

namespace App\Http\Controllers\backends\Settings;

use App\Http\Controllers\Controller;
use App\Service\FrequencyService;
use App\Http\Requests\UserRequest;
use App\Models\ProductsRegister;
use App\Models\Frequency;
use App\Service\UserService;
use App\Traits\Statusable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;

class FrequencyController extends Controller
{
    private array $data = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        try {
            $frequency_service = new FrequencyService($request->toArray());
     
            $this->data['frequency'] = $frequency_service->get();

        } catch (\Exception $exception) {
            
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.settings.frequency.index",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            if ($request->ajax()) {
                if($request->frequency_name!='' && $request->frequency_name!=NULL){
                    $frequencyObject = new Frequency();
                    $frequencyObject->frequency_name = $request->frequency_name;
                    $frequencyObject->save();
                }
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
            'data' => $frequencyObject,
            'message' => 'Frequency Created successfully!'
        ), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->ajax()) {
                if($request->frequency_name!='' && $request->frequency_name!=NULL){
                    $frequencyObject = new Frequency();
                    $frequencyObject->frequency_name = $request->frequency_name;
                    $frequencyObject->save();
                }
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
            'data' => $frequencyObject,
            'message' => 'Frequency Created successfully!'
        ), 200);
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
    public function update(Request $request)
    {
        try {
            if ($request->ajax()) {
                if($request->frequency_name!='' && $request->frequency_name!=NULL
                && $request->id!='' && $request->id!=NULL){
                    $frequencyObject = Frequency::where('id',$request->id)->first();
                    if($frequencyObject!=''){
                        $frequencyObject->frequency_name = $request->frequency_name;
                        $frequencyObject->save();
                    }else{
                        return Response::json(array(
                            'status' => false,
                            'data' => [],
                            'message' => 'Frequency not found'
                        ), 400);
                    }
                   
                }
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
            'data' => $frequencyObject,
            'message' => 'Frequency Updated successfully!'
        ), 200);
        
    }

    public function updateStatus(Request $request)
    {
        try {
            if ($request->ajax()) {
                $frequency_service = new FrequencyService($request->toArray());
                $this->data['frequency'] = $frequency_service->statusUpdate();
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
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $frequency_service = new FrequencyService($request->toArray());
                $this->data['frequency'] = $frequency_service->delete();
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
            'message' => 'Frequency deleted successfully!'
        ), 200);

    }
}
