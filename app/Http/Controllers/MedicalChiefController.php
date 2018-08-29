<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\UserVerification;
use Redirect;
use App\Medicine;
use App\MedicalSupply;
use DB;
use Response;
use Session;

class MedicalChiefController extends Controller
{
    public function maintainMedSupplies(){

        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','medisysdb')
                ->where('TABLE_NAME','medsupplies')
                ->first();
        $supplies = MedicalSupply::where('isDeleted', '=', '0')->where('supType','m')->get();
        return view('medicalchief.C_medicalchief_manage_medical_supplies')->with(['supplies' => $supplies, 'id' => $id]);
    }

    public function maintainMedicines(){

        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','medisysdb')
                ->where('TABLE_NAME','medicines')
                ->first();
        $medicines = Medicine::where('isDeleted', '=', '0')->where('medType','m')->get();
        // return view('nurse.C_nurse_maintenance_medicine')->with(['medicines' => $medicine, 'id' => $id]);
        return view('medicalchief.C_medicalchief_manage_medicines')->with(['medicines' => $medicines, 'id' => $id]);
    }
    public function maintainAccounts(){
        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->whereIn('position',[5,6])->where('isActive',1)->get();

        $lastUserID = Account::orderBy('created_at','desc')->first();
        Session::put('lastUserID',$lastUserID['id']);
        return view('medicalchief.C_medicalchief_manage_accounts')->withMedicalStaff($medicalstaff);
    }

    public function declineAccount($userID){
        $user = Account::find($userID);
        $user->isVerified = 3;
        $user->save();

        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->whereIn('position',[5,6])->where('isActive',1)->get();
        return Redirect::to('/medicalchief/accounts_maintenance')->withMedicalStaff($medicalstaff);
    }

    public function deleteAccount($userID){
        
        $user = Account::find($userID);
        $user->isActive = 0;
        $user->deactivated_at = DB::raw('now()');
        $user->save();

        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->whereIn('position',[5,6])->where('isActive',1)->get();
        return Redirect::to('/medicalchief/accounts_maintenance')->withMedicalStaff($medicalstaff);
    }
    public function generateCode($userID){
        $verificationCode = str_random(6);
        
        $chief = Account::where('isActive',1)->where('position',3)->orderBy('created_at','desc')->first();
        $userVerification = new UserVerification;
        $userVerification->userID = $userID;
        $userVerification->chiefID = $chief['id'];
        $userVerification->verificationCode = $verificationCode;
        $userVerification->save();

        $verifiedUser = Account::find($userID);
        $verifiedUser->isVerified = 1;
        $verifiedUser->save();
        // return view('medicalchief.C_medicalchief_create_verification_code');
        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->whereIn('position',[5,6])->get();
        
        return Redirect::to('/medicalchief/accounts_maintenance')->withMedicalStaff($medicalstaff);
    }

    public function getLastUserID()
    {
        $newLastUser = Account::orderBy('created_at','desc')->first();
        
        // dd($newLastUser['id']);
        return Response::json(array('newLastUser' => $newLastUser));
    }
}
