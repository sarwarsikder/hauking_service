<?php

namespace App\Http\Controllers\frontends;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendRequest\UserProfileRequest;
use App\Models\Country;
use App\Models\State;
use App\Models\Timezone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['user'] = User::where('id',2)->first();
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['timezones'] = Timezone::all();
        return view('frontends.users.user_account',$this->data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateUserProfile(UserProfileRequest $request, $id)
    {
        // dd($request, $id);
        try {

            $userObject = User::where('id',$id)->first();

            $userObject->first_name = $request['first_name'];
            $userObject->last_name = $request['last_name'];
            $userObject->email = $request['email'];
            $userObject->primary_address = $request['primary_address'];
            $userObject->city = $request['city'];
            $userObject->state = $request['state'];
            $userObject->zipcode = $request['zipcode'];
            $userObject->country = $request['country'];
            $userObject->email = $request['email'];
            $userObject->phone = $request['phone'];
            $userObject->timezone_id = $request['timezones'];
            if($request['password']){
                $userObject->password = Hash::make($request['password']);
            }

            if ($request->file('user_profile')) {
                $file = $request->file('user_profile');

                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('/images/user'), $filename);
                $userObject->user_profile = $filename;
            }

            if ($userObject->save()) {
                return redirect(route('user-account'))->with('redirect-message', 'User profile successfully updated!');
            } else {
                return redirect()->back()->with('redirect-message', 'Something wrong!');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
