<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Medicine;
use App\MedicalSupply;
use App\Patient;
use App\ClinicLog;
use App\VitalSigns;
use App\LogReferrals;
use App\Accounts;
use Session;
use DB;

class MedicalChiefArchivesController extends Controller
{
    public function accounts(){
        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->whereIn('position',[5,6])->where('isActive',0)->get();

        $lastUserID = Account::orderBy('created_at','desc')->first();
        Session::put('lastUserID',$lastUserID['id']);
        return view('medicalchief.archived_mchief_accounts')->withMedicalStaff($medicalstaff);
    }
    public function medicalSupplies(){

        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','safemedisysdb')
                ->where('TABLE_NAME','medsupplies')
                ->first();
        $supplies = MedicalSupply::where('isDeleted', 1)->where('supType','m')->get();
        return view('medicalchief.archived_mchief_medicalSupplies')->with(['supplies' => $supplies, 'id' => $id]);
    }

    public function medicines(){

        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','safemedisysdb')
                ->where('TABLE_NAME','medicines')
                ->first();
        $medicines = Medicine::where('isDeleted', 1)->where('medType','m')->get();
        // return view('nurse.C_nurse_maintenance_medicine')->with(['medicines' => $medicine, 'id' => $id]);
        return view('medicalchief.archived_mchief_medicines')->with(['medicines' => $medicines, 'id' => $id]);
    }
    public function patients()
    {
        $patientList = Patient::where('isDeleted', 1)->get();
        return view('medicalchief.archived_mchief_patientsList')->with('patientList', $patientList);
    }
    public function patients_viewMore($id)
    {
        $patientInfo = Patient::find($id);
        return view('medicalchief.archived_mchief_patientsList_viewMore')->with('patientInfo', $patientInfo);
    }
    public function patients_viewMore_medicalLogs($id)
    {
       $patientInfo = Patient::find($id);

        $medicalLogs = ClinicLog::join('users', 'users.id', '=', 'cliniclogs.nurseID')
                        ->select('cliniclogs.*', 'users.*')
                        ->where('patientID', '=', $id)
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->get();

        $attendingPhysician = ClinicLog::join('logReferrals', 'logReferrals.clinicLogID', '=', 'cliniclogs.clinicLogID')
                        ->join('users', 'users.id', '=', 'logReferrals.physicianID')
                        ->select('users.*')
                        ->where('patientID', '=', $id)
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->first();

        $usedMedSupply = ClinicLog::join('treatments','cliniclogs.clinicLogID', '=', 'treatments.clinicLogID')
                        ->join('medsuppliesused', 'medsuppliesused.treatmentID', '=', 'treatments.treatmentID')
                        ->join('medsupplies', 'medsuppliesused.medSupplyID', '=', 'medsupplies.medSupID')
                        ->select('medsuppliesused.*','medsupplies.*', 'cliniclogs.clinicLogID')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('medsuppliesused.isDeleted', '=', '0')
                        ->get();
       // dd($usedMedSupply);
        $usedMed = ClinicLog::join('treatments','treatments.clinicLogID', '=','cliniclogs.clinicLogID')
                        ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
                        ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select('prescriptions.*','medicines.*', 'cliniclogs.clinicLogID')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('prescriptions.isDeleted', '=', '0')
                        ->get();

        return view('medicalchief.archived_mchief_patientsList_viewMore_medicalLogs')->with(['patientInfo' => $patientInfo, 'medicalLogs' => $medicalLogs, 'usedMedSupply' => $usedMedSupply, 'usedMed' => $usedMed, 'physician' => $attendingPhysician]);
    }
    public function patients_concerns($id)
    {
        $clinicLogs = ClinicLog::join('users', 'users.id', '=', 'cliniclogs.nurseID')
                        ->join('logreferrals', 'logreferrals.clinicLogID', '=', 'cliniclogs.clinicLogID')
                        ->select('cliniclogs.*', 'users.*', 'logreferrals.*')
                        ->where('cliniclogs.patientID', '=', $id)
                        ->where('logreferrals.isDeleted', '=', '0')
                        ->orderBy('cliniclogs.clinicLogDateTime', 'desc')
                        ->get();

        $vitalSigns = VitalSigns::where('isDeleted', '=', '0')->get();

        $certifications = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                        ->join('users', 'users.id', '=', 'cliniclogs.nurseID')
                        ->select('logreferrals.*', 'cliniclogs.*', 'users.*')
                        ->where('cliniclogs.patientID', '=', $id)
                        ->where(function($query){
                            $query->where('logreferrals.reqForMedCertEnrol', '=', '1')
                            ->orWhere('logreferrals.reqForMedCertOffOJT', '=', '1')
                            ->orWhere('logreferrals.reqForMedCertAdminFaculty', '=', '1')
                            ->orWhere('logreferrals.reqForWaver', '=', '1')
                            ->orWhere('logreferrals.reqForExcuseLetter', '=', '1');
                        })
                        ->where('logreferrals.isDeleted', '=', '0')
                        ->get();

        $attendingPhysician = Accounts::where('isActive', '=', '1')->get();

        $patient = Patient::find($id);

        return view('medicalchief.archived_mchief_patientsList_concerns')->with(['clinicLogs' => $clinicLogs, 'attendingPhysicians' => $attendingPhysician, 'vitalSigns' => $vitalSigns, 'patient' => $patient, 'certifications' => $certifications]);
    }
    public function medicalLogs()
    {
        $clinicLogs = ClinicLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->leftJoin('logreferrals', 'logreferrals.clinicLogID', '=', 'cliniclogs.clinicLogID')
                        ->where('cliniclogs.isDeleted', 1)
                        ->orderBy('cliniclogs.clinicLogID', 'DESC')
                        ->get();

        $attendingPhysician = logReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                        ->select('logreferrals.*', 'users.*')
                        ->get();

        $assistingNurse = Accounts::all();


        return view('medicalchief.archived_mchief_medicalLogs')->with(['clinicLogs' => $clinicLogs, 'attendingPhysician' => $attendingPhysician, 'assistingNurse' => $assistingNurse]);
    }
}
