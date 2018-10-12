<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Account;

use Session;

use Response;

use Redirect;



class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            
        $accounts = new Account;

        $accounts->firstName = Input::get('firstName');
        $accounts->middleName = Input::get('middleName');
        $accounts->lastName = Input::get('lastName');
        $accounts->quantifier = Input::get('quantifier');
        $accounts->licenseNumber = Input::get('licenseNumber');
        $accounts->position = Input::get('position');
        $accounts->specialization = Input::get('specialization');
        $accounts->email = Input::get('email');
        $accounts->contactNumber = Input::get('contactNumber');
        $accounts->username = Input::get('username');
        $accounts->password = Input::get('password');
        // $accounts->password_confirmation = $request->

        $accounts->save();

        Response::json(['message' => 'Successfully Created']);

        } catch (Exception $e) {
            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $accountInfos = Account::where('username', '=', $username)
                               ->where('password', '=', $password)
                               ->select('users.*')
                               ->first();

        if(!empty($accountInfos)){

            Session::put('accountInfo', $accountInfos);

            if($accountInfos['position'] == 6){
                return Redirect::to('/nurse/dashboard');
            }
            elseif ($accountInfos['position'] == 5) {
                return Redirect::to('/physician/dashboard');
            }
            elseif ($accountInfos['position'] == 4) {
                return Redirect::to('/dentist/Dashboard');
            }
            elseif ($accountInfos['position'] == 2){
                return Redirect::to('/dchief/Dashboard');
            }
        }
        else{
            return back()->withErrors(['login' => 'Incorrect Username or Password']);
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
        $account = Account::find($id);

        $accounts->firstName = Input::get('firstName');
        $accounts->middleName = Input::get('middleName');
        $accounts->lastName = Input::get('lastName');
        $accounts->quantifier = Input::get('quantifier');
        $accounts->licenseNumber = Input::get('licenseNumber');
        $accounts->position = Input::get('position');
        $accounts->specialization = Input::get('specialization');
        $accounts->email = Input::get('email');
        $accounts->contactNumber = Input::get('contactNumber');
        $accounts->username = Input::get('username');
        $accounts->password = Input::get('password');

        $accounts->save();
        return Response::json(['message' => 'Successfully Updated']);

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

    public function logout()
    {
        Session::flush();

        return Redirect::to('/');
    }
}
