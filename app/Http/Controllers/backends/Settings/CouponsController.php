<?php

namespace App\Http\Controllers\backends\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponsRequest;
use App\Models\Coupons;
use App\Service\CouponsService;
use App\Traits\Statusable;
use Illuminate\Http\Request;
use Response;

class CouponsController extends Controller
{
    use Statusable;

    private array $data = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:coupon-list|coupon-create|coupon-edit|coupon-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:coupon-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:coupon-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:coupon-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try {
            $coupon_service = new CouponsService($request->toArray());
            $this->data['coupons'] = $coupon_service->get();
        } catch (\Exception $exception) {

            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.settings.coupons.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backends.settings.coupons.create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponsRequest $request)
    {
        // dd($request);
        try {

            $couponObject = new Coupons();

            $couponObject->coupon_name = $request['coupon_name'];
            $couponObject->coupon_type = $request['coupon_type'];
            $couponObject->coupon_value = $request['coupon_value'];
            $couponObject->status = !empty($request['status']) == 'on' ? true : false;

            if ($couponObject->save()) {
                return redirect(route('coupons-list'))->with('redirect-message', 'Coupon successfully created!');
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
    public function edit($id)
    {
        try {
            if ($id) {
                $coupon_service = Coupons::find($id);
            }
            if (!empty($coupon_service)) {
                return view("backends.settings.coupons.edit", compact('coupon_service'));
            } else {
                return redirect()->back()->with('redirect-message', 'Something wrong!');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponsRequest $request, $id)
    {
        try {
            $coupon_service = Coupons::find($id);
            if (!empty($coupon_service)) {
                $coupon_service->coupon_name = $request['coupon_name'];
                $coupon_service->coupon_type = $request['coupon_type'];
                $coupon_service->coupon_value = $request['coupon_value'];
                $coupon_service->status = !empty($request['status']) == '1' ? true : false;
                if ($coupon_service->save()) {
                    return redirect(route('coupons-list'))->with('redirect-message', 'Coupon successfully Updated!');
                } else {
                    return redirect()->back()->with('redirect-message', 'Something wrong!');
                }
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        try {
            if ($request->ajax()) {
                $coupon_service = new CouponsService($request->toArray());
                $this->data['coupons'] = $coupon_service->statusUpdate();
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
                $coupon_service = new CouponsService($request->toArray());
                $this->data['coupons'] = $coupon_service->couponsDelete();
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!' . $exception->getMessage(),
            ), 400);
        }

        return Response::json(array(
            'status' => true,
            'data' => [],
            'message' => 'Coupon deleted successfully!'
        ), 200);
    }
}
