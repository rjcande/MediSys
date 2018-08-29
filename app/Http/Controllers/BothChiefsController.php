<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\UserVerification;
use Session;
use Redirect;
use Response;

// Please Add the List of functions that you've write :)
// Dodge Functions
// show
// store
// logout

// Igda Functions
//verifyAccount
//verifyCode

//Reven Functions



class BothChiefsController extends Controller
{
    public function show(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $loggedUser = Account::where('username', '=', $username)
                                ->where('password', '=', $password)
                                ->select('users.*')
                                ->first();

        if(!empty($loggedUser)){

            Session::put('accountInfo', $loggedUser);

            if($loggedUser['isActive'] == 1){
                if($loggedUser['position'] == 2){
                    return Redirect::to('/dchief/dashboard');
                }

                elseif($loggedUser['position'] == 3){
                    return Redirect::to('/mchief/dashboard');
                }

                elseif($loggedUser['position'] == 4){
                    if($loggedUser['isVerified'] == 2){
                        return Redirect::to('/dentist/Dashboard');
                    }
                    else{
                        return back()->withErrors(['login' => 'Invalid Username or Password!']);
                    }
                }

                elseif($loggedUser['position'] == 5){
                    if($loggedUser['isVerified'] == 2){
                        return Redirect::to('/physician/dashboard');
                    }
                    else{
                        return redirect()->route('verifySingleAccount',$loggedUser['id']);
                    }
                }

                elseif($loggedUser['position'] == 6){
                    if($loggedUser['isVerified'] == 2){
                        return Redirect::to('/nurse/dashboard');
                    }
                    else{
                        return redirect()->route('verifySingleAccount',$loggedUser['id']);
                    }
                }
            }
            else{
                return back()->withErrors(['login' => 'Invalid Username or Password!']);
            }
        }
        else{
            return back()->withErrors(['login' => 'Invalid Username or Password!']);
        }
    }


    public function store(Request $request)
    {
        try {
            $account = new Account;

            $account->firstName = $request->firstName;
            $account->middleName = $request->middleName;
            $account->lastName = $request->lastName;
            $account->quantifier = $request->quantifier;
            $account->position = $request->position;
            $account->licenseNumber = $request->licenseNumber;
            $account->specialization = $request->specialization;
            $account->email = $request->email;
            $account->contactNumber = $request->contactNumber;
            $account->username = $request->username;
            $account->password = $request->pw;
            if($request->position == 2 || $request->position == 3){
                $account->isVerified = 2;
            }

            $account->save();

            return Redirect::to('/verifyAccount');
            // Response::json(['message' => 'Successfully Created']);
        } catch (Exception $e) {
            alert($e.message);
        }
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }

    public function verifySingleAccount($userID){
        $verification = UserVerification::where('userID',$userID)->first();
        return view('accounts.verification')->withVerification($verification);
    }

    public function verifyAccount(){
        // dd(Session::get('accountInfo.position'));
        if(Session::get('accountInfo.position') == 3 || Session::get('accountInfo.position') == 5 || Session::get('accountInfo.position') == 6){
        $lastCreatedUser = Account::whereIn('position',[5,6])->orderBy('created_at','desc')->where('isActive',1)->first();
        }
        elseif(Session::get('accountInfo.position') == 2 || Session::get('accountInfo.position') == 4){
        $lastCreatedUser = Account::where('position',4)->orderBy('created_at','desc')->where('isActive',1)->first();
        }
        //check if medical chief has verified the medical staff account
        if(!empty($lastCreatedUser)){
            if($lastCreatedUser['isVerified'] == 0){
                return view('accounts.pending');
            }
            elseif($lastCreatedUser['isVerified'] == 1){
                $verification = UserVerification::where('userID',$lastCreatedUser['id'])->first();
                return view('accounts.verification')->withVerification($verification);
            }
            elseif($lastCreatedUser['isVerified'] == 2){
                return view('accounts.canLog');
            }
            elseif($lastCreatedUser['isVerified'] == 3){
                return view('accounts.unverified');
            }
        }
        else{
            return view('login');
        }
    }

    public function verifyCode(Request $request){
        if(strcmp($request->verCode,$request->actualCode) == 0){
            $userFinallyVerified = Account::find($request->userID);
            $userFinallyVerified->isVerified = 2;
            $userFinallyVerified->save();

            return view('accounts.canLog');
        }
        else{
            return back();
        }
    }

}
