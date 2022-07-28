<?php

namespace App\Http\Controllers\backends\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageSettingsRequest;
use App\Models\LanguageSettings;
use App\Service\LanguageService;
use Illuminate\Http\Request;
use App\Traits\Statusable;
use Response;
class LanguageController extends Controller
{
    use Statusable;

    private array $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $language_service = new LanguageService($request->toArray());
            $this->data['languages'] = $language_service->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.settings.language.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backends.settings.language.create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageSettingsRequest $request)
    {
        try {

            $languageObject = new LanguageSettings();

            $languageObject->language_name = $request['language_name'];
            $languageObject->slug = $request['slug'];
            $languageObject->display_order = $request['display_order'];
            $languageObject->default = !empty($request['default']) == 'on' ? true : false;
            $languageObject->status = !empty($request['status']) == 'on' ? true : false;

            if ($languageObject->save()) {
                return redirect(route('languages-list'))->with('redirect-message', 'Language successfully created!');
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
        try {
            if ($id) {
                $language_service = LanguageSettings::find($id);
            }
            if (!empty($language_service)) {
                return view("backends.settings.language.edit", compact('language_service'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageSettingsRequest $request, $id)
    {
        try {
            $language_service = LanguageSettings::find($id);
            if (!empty($language_service)) {
                $language_service->language_name = $request['language_name'];
                $language_service->slug = $request['slug'];
                $language_service->display_order = $request['display_order'];
                $language_service->default = !empty($request['default']) == '1' ? true : false;
                $language_service->status = !empty($request['status']) == '1' ? true : false;
                if ($language_service->save()) {
                    return redirect(route('languages-list'))->with('redirect-message', 'Language successfully Updated!');
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
    public function updateDefault(Request $request)
    {
        try {
            if ($request->ajax()) {
                $language_service = new LanguageService($request->toArray());
                $this->data['languages'] = $language_service->statusDefault();
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!'.$exception->getMessage()
            ), 400);
        }

        return Response::json(array(
            'status' => true,
            'data' => [],
            'message' => 'Status updated successfully!'
        ), 200);
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
                $language_service = new LanguageService($request->toArray());
                $this->data['languages'] = $language_service->statusUpdate();
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!'.$exception->getMessage()
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $language_service = new LanguageService($request->toArray());
                $this->data['languages'] = $language_service->languageDelete();
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!'.$exception->getMessage(),
            ), 400);
        }

        return Response::json(array(
            'status' => true,
            'data' => [],
            'message' => 'Coupon deleted successfully!'
        ), 200);
    }
}
