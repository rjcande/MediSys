<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointments;

use App\ClinicLog;

use App\LogReferrals;

use App\Prescription;

use App\UsedMedSupply;

use App\MedicalSupply;

use App\Medicine;

use DB;

use Response;

class DashboardController extends Controller
{
    public function nurseDashboard()
    {
    	$patientName = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
    								->join('patients', 'cliniclogs.patientID', '=', 'patients.patientID')
    								->where('appointments.isDeleted', '=', 0)
    								->get();
    	$physician = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
    								->join('logreferrals', 'logreferrals.logReferralID', '=', 'appointments.logReferralID')
    								->join('users', 'users.id', '=', 'logreferrals.physicianID')
    								->where('appointments.isDeleted', '=', 0)
    								->get();

    	//dd($patientName);
		return view('nurse.dashboard')->with(['patientNames' => $patientName, 'physicians' => $physician]);
    }

    public function physicianDashboard()
    {
    	$patientName = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
    								->join('patients', 'cliniclogs.patientID', '=', 'patients.patientID')
    								->where('appointments.isDeleted', '=', 0)
    								->get();
    	$physician = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
    								->join('logreferrals', 'logreferrals.logReferralID', '=', 'appointments.logReferralID')
    								->join('users', 'users.id', '=', 'logreferrals.physicianID')
    								->where('appointments.isDeleted', '=', 0)
    								->get();

    	//dd($patientName);
		return view('physician.C_physician_dashboard')->with(['patientNames' => $patientName, 'physicians' => $physician]);
    }


    public function mChiefDashboard()
    {
        $patientName = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
                                    ->join('patients', 'cliniclogs.patientID', '=', 'patients.patientID')
                                    ->where('appointments.isDeleted', '=', 0)
                                    ->get();
        $physician = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
                                    ->join('logreferrals', 'logreferrals.logReferralID', '=', 'appointments.logReferralID')
                                    ->join('users', 'users.id', '=', 'logreferrals.physicianID')
                                    ->where('appointments.isDeleted', '=', 0)
                                    ->get();

        //dd($patientName);
        return view('chief.C_mchief_dashboard')->with(['patientNames' => $patientName, 'physicians' => $physician]);
    }

    public function destroy($id)
    {
    	$delete = Appointments::find($id);

    	$delete->isDeleted = 1;

    	$delete->save();

    	return Response::json(array('message' => 'Success'));
    }

    public function mChiefDestroy($id)
    {
        $delete = Appointments::find($id);

        $delete->isDeleted = 1;

        $delete->save();

        return Response::json(array('message' => 'Success'));
    }

    public function reports()
    {
        $prescription = Prescription::select(DB::raw("SUM(quantity) as total"), 'prescriptions.*', DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
                                    ->groupBy('medicineID', 'new_date')
                                    ->orderBy('total', 'desc')
                                    ->get();
        $medicine = Medicine::all();

        $mostPrescribed = Medicine::find($prescription[0]->medicineID);

       // dd($mostPrescribed);
    	return view('physician.C_physician_reports')->with(['prescriptions' => $prescription, 'medicines' =>$medicine, 'mostPrescribed' => $mostPrescribed]);
    }

    public function mChiefReports()
    {
        $prescription = Prescription::select(DB::raw("SUM(quantity) as total"), 'prescriptions.*', DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
                                    ->groupBy('medicineID', 'new_date')
                                    ->orderBy('total', 'desc')
                                    ->get();
        $medicine = Medicine::all();

        $mostPrescribed = Medicine::find($prescription[0]->medicineID);

       // dd($mostPrescribed);
        return view('chief.C_mchief_reports')->with(['prescriptions' => $prescription, 'medicines' =>$medicine, 'mostPrescribed' => $mostPrescribed]);
    }

     public function nurseMedicineReports()
    {
        $prescription = Prescription::select(DB::raw("SUM(quantity) as total"), 'prescriptions.*', DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
                                    ->groupBy('medicineID', 'new_date')
                                    ->orderBy('total', 'desc')
                                    ->get();
        $medicine = Medicine::all();

        $mostPrescribed = Medicine::find($prescription[0]->medicineID);

       // dd($mostPrescribed);
        return view('nurse.C_nurse_medicine_reports')->with(['prescriptions' => $prescription, 'medicines' =>$medicine, 'mostPrescribed' => $mostPrescribed]);
    }

     public function supplyReports()
    {
        $usedMed = UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*', DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
                                    ->groupBy('medSupplyID', 'new_date')
                                    ->orderBy('total', 'desc')
                                    ->get();
        $medicalSupply = MedicalSupply::all();

        if (count($usedMed) > 0) {
            $mostUsed = MedicalSupply::find($usedMed[0]->medSupplyID);
        }
        else{
            $mostUsed ="";
        }
    }
       
        public function mChiefSupplyReports()
    {
        $usedMed = UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*', DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
                                    ->groupBy('medSupplyID', 'new_date')
                                    ->orderBy('total', 'desc')
                                    ->get();
        $medicalSupply = MedicalSupply::all();

        if (count($usedMed) > 0) {
            $mostUsed = MedicalSupply::find($usedMed[0]->medSupplyID);
        }
        else{
            $mostUsed ="";
        }
    
      return view('chief.C_mchief_medical_reports')->with(['usedMeds' => $usedMed, 'medicalSupply' =>$medicalSupply, 'mostUsed' => $mostUsed]);
    }

       public function nurseSuppliesReports()
    {
        $usedMed = UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*', DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
                                    ->groupBy('medSupplyID', 'new_date')
                                    ->orderBy('total', 'desc')
                                    ->get();
        $medicalSupply = MedicalSupply::all();

        if (count($usedMed) > 0) {
            $mostUsed = MedicalSupply::find($usedMed[0]->medSupplyID);
        }
        else{
            $mostUsed ="";
        }
       

    
      return view('nurse.C_nurse_supplies_reports')->with(['usedMeds' => $usedMed, 'medicalSupply' =>$medicalSupply, 'mostUsed' => $mostUsed]);
    }
}
