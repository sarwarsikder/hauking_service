<?php

namespace App\Http\Controllers\backends\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxSettingsRequest;
use App\Models\Tax;
use App\Service\TaxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Statusable;
use Response;

class TaxController extends Controller
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
        $this->middleware('permission:tax-list|tax-create|tax-edit|tax-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:tax-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tax-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tax-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $tax_service = new TaxService($request->toArray());
            $this->data['taxes'] = $tax_service->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.settings.tax.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $countries = DB::table('countries')->orderBy('country_name', 'asc')->get();
            if (!empty($countries)) {
                return view("backends.settings.tax.create", compact('countries'));
            } else {
                return redirect()->back()->with('redirect-message', 'Something wrong!');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function getState(Request $request)
    {
        try {
            $state = DB::table('states')->where('country_id', $request->country_id)->orderBy('state_name', 'asc')->get();
            if (!empty($state)) {
                return response()->json($state);
            } else {
                return redirect()->back()->with('redirect-message', 'Something wrong!');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    // public function getCity(Request $request)
    // {
    //     try {
    //         $city = DB::table('cities')->where('state_id', $request->state_id)->orderBy('city_name', 'asc')->get();
    //         if (!empty($city)) {
    //             return response()->json($city);
    //         } else {
    //             return redirect()->back()->with('redirect-message', 'Something wrong!');
    //         }
    //     } catch (\Exception $exception) {
    //         echo $exception->getMessage();
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxSettingsRequest $request)
    {
        try {
            $taxsObject = new Tax();

            $taxsObject->tax_type = $request['tax_type'];
            $taxsObject->country_id = $request['country'];
            $taxsObject->state_id = $request['state'];
            $taxsObject->city = $request['city'];
            $taxsObject->post_code = $request['post_code'];
            $taxsObject->tax_rate = $request['tax_rate'];
            $taxsObject->status = !empty($request['status']) == 'on' ? true : false;

            if ($taxsObject->save()) {
                return redirect(route('taxes-list'))->with('redirect-message', 'Taxs successfully created!');
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
        try {
            if ($id) {
                $tax_service = Tax::find($id);
            }
            if (!empty($tax_service)) {
                $countries = DB::table('countries')->orderBy('country_name', 'asc')->get();
                return view("backends.settings.tax.edit", compact('tax_service', 'countries'));
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
    public function update(TaxSettingsRequest $request, $id)
    {
        try {
            $tax_service = Tax::find($id);
            if (!empty($tax_service)) {
                $tax_service->tax_type = $request['tax_type'];
                $tax_service->country_id = $request['country'];
                $tax_service->state_id = $request['state'];
                $tax_service->city = $request['city'];
                $tax_service->post_code = $request['post_code'];
                $tax_service->tax_rate = $request['tax_rate'];
                $tax_service->status = !empty($request['status']) == '1' ? true : false;
                if ($tax_service->save()) {
                    return redirect(route('taxes-list'))->with('redirect-message', 'Tax successfully Updated!');
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
                $language_service = new TaxService($request->toArray());
                $this->data['taxes'] = $language_service->statusUpdate();
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!' . $exception->getMessage()
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
                $language_service = new TaxService($request->toArray());
                $this->data['taxes'] = $language_service->taxDelete();
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
            'message' => 'Tax deleted successfully!'
        ), 200);
    }
}
