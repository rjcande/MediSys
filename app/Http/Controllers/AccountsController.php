<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Accounts;

use Response;

use Redirect;

use Session;

class AccountsController extends Controller
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
            $account = new Accounts;

            $account->firstName = Input::get('firstName');
            $account->middleName = Input::get('middleName');
            $account->lastName = Input::get('lastName');
            $account->quantifier = Input::get('quantifier');
            $account->position = Input::get('position');
            $account->licenseNumber = Input::get('licenseNumber');
            $account->specialization = Input::get('specialization');
            $account->email = Input::get('email');
            $account->contactNumber = Input::get('contactNumber');
            $account->username = Input::get('username');
            $account->password = Input::get('pw');

            $account->save();
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

        $login = Accounts::where('username', '=', $username)
                        ->where('password', '=', $password)
                        ->select('users.*')
                        ->first();

        if (!empty($login)) {

            Session::put('accountInfo', $login);

            if ($login['position'] == 6) {
                return Redirect::to('/nurse/dashboard');
            }
            elseif ($login['position'] == 5) {
                return Redirect::to('/physician/dashboard');
            }
            elseif ($login['position'] == 4) {
                return Redirect::to('/dentist/Dashboard');
            }
            elseif ($login['position'] == 3){
                return Redirect::to('mchief/dashboard');
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

    public function logout(){
        Session::flush();

        return Redirect::to('/');
    }
}
