<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\DentalLog;
use App\VitalSigns;
use App\Account;
use App\Diagnosis;
use App\Treatment;
use App\Medicine;
use App\MedicalSupply;
use App\UserVerification;
use DB;
use Session;
use Redirect;

class ArchivesController extends Controller
{
    public function patientsList(){
        $patientList = Patient::where('isDeleted', 1)->orderBy('deleted_at', 'desc')->get();
        return view('dchief.archived_patient_list')->withPatient($patientList);
    }
    public function patientsList_viewMore($id){
        $patientViewMore = Patient::find($id);
        return view('dchief.archived_patient_list_view_more_info')->with('patientInfo',$patientViewMore);
    }
    public function patientsList_viewMore_Logs($id){
        $patientInfo = Patient::find($id);

        $patientAllLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                   ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                                   ->select('patients.*', 'cliniclogs.*', 'treatments.*')
                                   ->where('patients.patientID', '=', $id)
                                   ->where('cliniclogs.clinicType', '=', 'D')
                                   ->where('cliniclogs.isDeleted', '=', '0')
                                   ->get();

        $attendingDentist = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                                     ->select('users.*')
                                     ->where('cliniclogs.patientID','=', $id)
                                     ->where('users.isActive', '=', '1')
                                     ->first();

        $usedMedSupply = DentalLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                                  ->join('medsuppliesused', 'medsuppliesused.treatmentID', '=', 'treatments.treatmentID')
                                  ->join('medsupplies', 'medsuppliesused.medSupplyID', '=', 'medsupplies.medSupID')
                                  ->select('medsupplies.*', 'medsuppliesused.*', 'cliniclogs.clinicLogID')
                                  ->where('cliniclogs.isDeleted', '=', '0')
                                  ->where('cliniclogs.clinicType', '=', 'D')
                                  ->where('medsuppliesused.isDeleted', '=', '0')
                                  ->get();

        $usedMed = DentalLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                            ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
                            ->join('medicines' ,'prescriptions.medicineID','=', 'medicines.medicineID')
                            ->select('treatments.*', 'prescriptions.*','cliniclogs.clinicLogID', 'medicines.*')
                            ->where('cliniclogs.isDeleted', '=', '0')
                            ->where('cliniclogs.clinicType', '=', 'D')
                            ->where('prescriptions.isDeleted', '=', '0')
                            ->where('prescriptions.isGiven', '=', '1')
                            ->get();

        return view('dchief.archived_patient_list_view_more_info_logs')->with(['patientInfo'=>$patientInfo, 'patientAllLogs'=>$patientAllLogs, 'attendingDentist' => $attendingDentist, 'usedMedSupply'=>$usedMedSupply, 'usedMed'=>$usedMed]);
    }
    public function patientsList_concerns($id){
        $dentalLogs = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                               ->join('diagnoses', 'diagnoses.clinicLogID', '=', 'cliniclogs.clinicLogID')
                               ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                               ->select('users.*', 'diagnoses.*', 'treatments.*')
                               ->orderBy('cliniclogs.created_at', 'desc')
                               ->where('cliniclogs.patientID', '=', $id)
                               ->where('cliniclogs.isDeleted', '=', 0)
                               ->where('cliniclogs.clinicType', '=', 'D')
                               ->get();

        $certifications = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                   ->select('patients.*', 'cliniclogs.*')
                                   ->orderBy('cliniclogs.created_at', 'desc')
                                   ->where('cliniclogs.patientID', '=', $id)
                                   ->where('cliniclogs.clinicType', '=', 'D')
                                   ->where('cliniclogs.isDeleted', '=', 0)
                                   ->where('cliniclogs.reqForDentalCert', '=', '1')
                                   ->get();

        $vitalSigns = VitalSigns::where('isDeleted', '=', '0')->get();

        $attendingDentist = Account::where('isActive', '=', '1')->get();

        return view('dchief.archived_patient_list_concerns')->with(['dentalLog' => $dentalLogs, 'vitalSigns' =>$vitalSigns, 'attendingDentist'=>$attendingDentist,  'certifications'=>$certifications]);
    }
    public function dentalLogs()
    {
        $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                               ->select('cliniclogs.*', 'patients.*')
                               ->where([['cliniclogs.isDeleted', '1'], ['cliniclogs.clinicType', '=', 'D']])
                               ->orderBy('cliniclogs.created_at', 'desc')
                               ->get();
        $attendingDentist = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                                ->select('users.*')
                                ->first();

        return view ('dchief.archived_dental_logs')->with(['dentalLogs' => $dentalLogs, 'attendingDentist' => $attendingDentist]);
    }
    public function dentalLogs_viewMore($id)
    {
        $patientDentalLog = DentalLog::find($id);

        $patientDentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                      ->join('users', 'users.id', '=', 'cliniclogs.dentistID')
                                      ->select('patients.*', 'cliniclogs.*')
                                      ->where('cliniclogs.clinicLogID', '=', $id)
                                      ->get();

        $dentist = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                            ->select('users.*')
                            ->where('cliniclogs.clinicLogID', '=', $id)
                            ->first();

        $diagnosis = Diagnosis::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'diagnoses.clinicLogID')
                              ->select('diagnoses.*')
                              ->where('diagnoses.clinicLogID', '=', $id)
                              ->first();

        $treatment = Treatment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'treatments.clinicLogID')
                              ->select('treatments.*')
                              ->where('treatments.clinicLogID', '=', $id)
                              ->first();

        $medsGiven = DentalLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                               ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
                               ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                               ->select('medicines.*', 'prescriptions.*')
                               ->where('treatments.clinicLogID', '=', $id)
                               ->where('cliniclogs.clinicType', '=', 'D')
                               ->where('prescriptions.isGiven', '=', '1')
                               ->get();

        $prescribed = DentalLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                               ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
                               ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                               ->select('medicines.*', 'prescriptions.*')
                               ->where('treatments.clinicLogID', '=', $id)
                               ->where('cliniclogs.clinicType', '=', 'D')
                               ->where('prescriptions.isPrescribed', '=', '1')
                               ->get();

        $medSupp = DentalLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                            ->join('medsuppliesused', 'medsuppliesused.treatmentID', '=', 'treatments.treatmentID')
                            ->join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                            ->select('medsupplies.*', 'medsuppliesused.*')
                            ->where('treatments.clinicLogID', '=', $id)
                            ->where('cliniclogs.clinicType', '=', 'D')
                            ->get();

       foreach($patientDentalLogs as $dentalLog)
        {
            if($dentalLog->reqForDentalCert == 0){
                return view('dchief.archived_dental_logs_view_more')->with(['patientDentalLogs'=>$patientDentalLogs, 'dentalLogEach'=>$patientDentalLog, 'diagnosis'=>$diagnosis, 'treatment'=>$treatment, 'medsGiven'=>$medsGiven ,'prescribed'=>$prescribed, 'medSupp'=>$medSupp]);
            }
            elseif($dentalLog->reqForDentalCert == 1){
                return view('dchief.archived_dental_certificate')->with(['patientDentalLogs'=>$patientDentalLogs, 'treatment'=>$treatment, 'dentist'=>$dentist]);
            }
        }
    }
    public function accountsList(){
        $medicalstaff = Account::leftJoin('userverifications','users.id','=','userverifications.userID')->where('position',4)->where('isActive',0)->get();

        $lastUserID = Account::orderBy('created_at','desc')->first();
        Session::put('lastUserID',$lastUserID['id']);
        return view('dchief.archived_accounts')->withMedicalStaff($medicalstaff);
    }
    public function medicines(){
        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','safemedisysdb')
                ->where('TABLE_NAME','medicines')
                ->first();
        $medicines = Medicine::where('isDeleted', 1)->where('medType','d')->get();
        // return view('nurse.C_nurse_maintenance_medicine')->with(['medicines' => $medicine, 'id' => $id]);
        return view('dchief.archived_medicines')->with(['medicines' => $medicines, 'id' => $id]);
    }
    public function medicalSupplies(){

        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','safemedisysdb')
                ->where('TABLE_NAME','medsupplies')
                ->first();
        $supplies = MedicalSupply::where('isDeleted', 1)->where('supType','d')->get();
        return view('dchief.archived_medical_supplies')->with(['supplies' => $supplies, 'id' => $id]);
    }

    public function restore_patient($id){
        $patient = Patient::find($id);
        $patient->isDeleted = 0;
        $patient->deleted_at = null;
        $patient->save();
        return Redirect::to('/dchief/archived/patient/list');
    }
    public function restore_dental_log($id){
        $dentalLog = DentalLog::find($id);
        $dentalLog->isDeleted = 0;
        $dentalLog->deleted_at = null;
        $dentalLog->save();
        return Redirect::to('/dchief/archived/dental/logs');
    }
    public function restore_account($id){
        $user = Account::find($id);
        // dd($user);
        $user->isActive = '1';
        $user->deactivated_at = null;
        $user->save();
        return Redirect::to('/dchief/archived/accounts');
    }
    public function restore_medicine($id){
        $medicine = Medicine::find($id);
        $medicine->isDeleted = '0';
        $medicine->deleted_at = null;
        $medicine->save();
        return Redirect::to('/dchief/archived/medicines');
    }
    public function restore_medicalSupply($id){
        $medSupply = MedicalSupply::find($id);
        $medSupply->isDeleted = '0';
        $medSupply->deleted_at = null;
        $medSupply->save();
        return Redirect::to('/dchief/archived/medicalSupplies');
    }
}
