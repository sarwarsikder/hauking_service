<?php

namespace App\Http\Controllers\backends\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailSettingsRequest;
use App\Models\EmailSettings;
use App\Service\EmailsService;
use App\Traits\Statusable;
use Illuminate\Http\Request;
use Response;

class EmailController extends Controller
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
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $email_service = new EmailsService($request->toArray());
            $this->data['emails'] = $email_service->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view("backends.settings.email.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backends.settings.email.create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailSettingsRequest $request)
    {
        // dd($request);
        try {

            $couponObject = new EmailSettings();

            $couponObject->mail_type = $request['mail_type'];
            $couponObject->email_subject = $request['email_subject'];
            $couponObject->email_body = $request['email_body'];
            $couponObject->status = !empty($request['status']) == 'on' ? true : false;

            if ($couponObject->save()) {
                return redirect(route('emails-list'))->with('redirect-message', 'E-mail successfully created!');
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
                $email_service = EmailSettings::find($id);
            }
            if (!empty($email_service)) {
                return view("backends.settings.email.edit", compact('email_service'));
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
    public function update(EmailSettingsRequest $request, $id)
    {
        try {
            $email_service = EmailSettings::find($id);
            if (!empty($email_service)) {
                $email_service->mail_type = $request['mail_type'];
                $email_service->email_subject = $request['email_subject'];
                $email_service->email_body = $request['email_body'];
                $email_service->status = !empty($request['status']) == '1' ? true : false;
                if ($email_service->save()) {
                    return redirect(route('emails-list'))->with('redirect-message', 'E-Mail successfully Updated!');
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
                $email_service = new EmailsService($request->toArray());
                $this->data['emails'] = $email_service->statusUpdate();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $coupon_service = new EmailsService($request->toArray());
                $this->data['emails'] = $coupon_service->emailDelete();
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
