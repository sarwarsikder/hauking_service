<?php

namespace App\Http\Controllers\backends\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\ProductsRegister;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Service\UserService;
use App\Traits\Statusable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;


class UserController extends Controller
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
            $user_service = new UserService($request->toArray());
            $this->data['users'] = $user_service->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.user.index", $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $states = State::all();
        return $countries;
        $this->data['countries'] = $countries;
        $this->data['states'] = $states;
        return view("backends.user.create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {

            $userObject = new User();

            $userObject->first_name = $request['first_name'];
            $userObject->last_name = $request['last_name'];
            $userObject->email = $request['email'];
            $userObject->password = Hash::make($request['password']);
            $userObject->primary_address = $request['primary_address'];
            $userObject->city = $request['city'];
            $userObject->state = $request['state'];
            $userObject->zipcode = $request['zipcode'];
            $userObject->country = $request['country'];
            $userObject->email = $request['email'];

            if ($request->file('user_profile')) {
                $file = $request->file('user_profile');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/images/services'), $filename);
                $userObject->user_profile = $request['user_profile'];
            }

            if ($userObject->save()) {
                return redirect(route('users-list'))->with('redirect-message', 'User successfully added!');
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
                $user_service = new UserService($request->toArray());
                $this->data['users'] = $user_service->statusUpdate();
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
                $user_service = new UserService($request->toArray());
                $this->data['users'] = $user_service->userDelete();
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
            'message' => 'User deleted successfully!'
        ), 200);

    }
}
