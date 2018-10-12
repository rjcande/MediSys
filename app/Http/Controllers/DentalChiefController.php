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

class DentalChiefController extends Controller
{
    public function maintainMedSupplies(){

        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','safemedisysdb')
                ->where('TABLE_NAME','medsupplies')
                ->first();
        $supplies = MedicalSupply::where('isDeleted', '=', '0')->where('supType','d')->get();
        return view('dentalchief.C_dentalchief_manage_medical_supplies')->with(['supplies' => $supplies, 'id' => $id]);
    }

    public function supplyQueries()
    {
        $supplies = MedicalSupply::where('isDeleted', '=', '0')->where('supType','d')->get();
        return view('dchief.C_dentalchief_manage_medical_supplies_queries')->with(['supplies' => $supplies]);
    }

    public function maintainMedicines(){

        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','safemedisysdb')
                ->where('TABLE_NAME','medicines')
                ->first();
        $medicines = Medicine::where('isDeleted', '=', '0')->where('medType','d')->get();
        // return view('nurse.C_nurse_maintenance_medicine')->with(['medicines' => $medicine, 'id' => $id]);
        return view('dentalchief.C_dentalchief_manage_medicines')->with(['medicines' => $medicines, 'id' => $id]);
    }
    public function medicineQueries()
    {
        $medicines = Medicine::where('isDeleted', '=', '0')->where('medType','d')->get();
        // return view('nurse.C_nurse_maintenance_medicine')->with(['medicines' => $medicine, 'id' => $id]);
        return view('dchief.C_dentalchief_manage_medicines_queries')->with(['medicines' => $medicines]);
    }
    public function maintainAccounts(){
        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->where('position',4)->where('isActive',1)->get();

        $lastUserID = Account::orderBy('created_at','desc')->first();
        Session::put('lastUserID',$lastUserID['id']);
        return view('dentalchief.C_dentalchief_manage_accounts')->withMedicalStaff($medicalstaff);
    }

    public function accountQueries()
    {
        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->where('position',4)->where('isActive',1)->get();

        $lastUserID = Account::orderBy('created_at','desc')->first();
        Session::put('lastUserID',$lastUserID['id']);
        return view('dchief.C_dentalchief_manage_accounts_queries')->withMedicalStaff($medicalstaff);
    }

    public function declineAccount($userID){
        $user = Account::find($userID);
        $user->isVerified = 3;
        $user->save();

        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->where('position',4)->where('isActive',1)->get();
        return Redirect::to('/dentalchief/accounts_maintenance')->withMedicalStaff($medicalstaff);
    }

    public function deleteAccount($userID){

        $user = Account::find($userID);
        $user->isActive = 0;
        $user->deactivated_at = DB::raw('now()');
        $user->save();

        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->where('position',4)->where('isActive',1)->get();
        return Redirect::to('/dentalchief/accounts_maintenance')->withMedicalStaff($medicalstaff);
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
        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->where('position',4)->get();

        return Redirect::to('/dentalchief/accounts_maintenance')->withMedicalStaff($medicalstaff);
    }

    public function getLastUserID()
    {
        $newLastUser = Account::orderBy('created_at','desc')->where('position',4)->where('isActive',1)->first();
        return Response::json(array('newLastUser' => $newLastUser));
    }
}
