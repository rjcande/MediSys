<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LogReferrals;

use App\ClinicLog;

use App\Medicine;

use App\MedicalSupply;

use App\MedicalHistories;

use App\Patient;

use App\Treatments;

use Response;

use Session;

use PDF;

use Illuminate\Support\Facades\Input;

class LogReferralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $referral = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                ->select('patients.*', 'cliniclogs.*', 'logreferrals.*')
                ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
                ->where('logreferrals.isDeleted', '=', '0')
                ->orderBy('logreferrals.created_at', 'desc')
                
                ->get(); 
        //dd($referral);
        $lastReferralID = LogReferrals::select('logReferralID')
                ->orderBy('logReferralID', 'desc')
                ->first();

        $assistingNurse = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                ->join('users', 'users.id', '=', 'cliniclogs.nurseID')
                ->select('users.*')
                ->first();

        return view('physician.C_physician_referred_patient')->with(['referrals' => $referral, 'assistingNurse' => $assistingNurse, 'lastReferralID' => $lastReferralID]);
    }

    public function indexOfMChief()
    {   
        $referral = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                ->select('patients.*', 'cliniclogs.*', 'logreferrals.*')
                ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
                ->where('logreferrals.isDeleted', '=', '0')
                ->orderBy('logreferrals.created_at', 'desc')
                ->get(); 
        //dd($referral);
        $lastReferralID = LogReferrals::select('logReferralID')
                ->orderBy('logReferralID', 'desc')
                ->first();

        $assistingNurse = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                ->join('users', 'users.id', '=', 'cliniclogs.nurseID')
                ->select('users.*')
                ->first();

        return view('chief.C_mchief_referred_patient')->with(['referrals' => $referral, 'assistingNurse' => $assistingNurse, 'lastReferralID' => $lastReferralID]);
    }

    public function getLastReferralID()
    {
        $lastReferralID = LogReferrals::select('logReferralID')
                ->orderBy('logReferralID', 'desc')
                ->first();

        return Response::json(array('lastReferralID' => $lastReferralID));
    }

    public function mChiefGetLastReferralID()
    {
        $lastReferralID = LogReferrals::select('logReferralID')
                ->orderBy('logReferralID', 'desc')
                ->first();

        return Response::json(array('lastReferralID' => $lastReferralID));
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
        $logReferral = LogReferrals::find($id);

        $logReferral->logReferralStatus = Input::get('status');
        $logReferral->notif = 2;

        $logReferral->save();
    }

    public function mChiefUpdate(Request $request, $id)
    {
        $logReferral = LogReferrals::find($id);

        $logReferral->logReferralStatus = Input::get('status');
        $logReferral->notif = 2;

        $logReferral->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logReferral = LogReferrals::find($id);

        $logReferral->isDeleted = 1;

        $logReferral->save();

        return Response::json(array('message' => 'Record Successfully Deleted'));
    }

    public function decline($id)
    {
        $logReferral = LogReferrals::find($id);

        $logReferral->logReferralStatus = "3";
        $logReferral->notif = 2;

        $logReferral->save();
    }

    public function mChiefDecline($id)
    {
        $logReferral = LogReferrals::find($id);

        $logReferral->logReferralStatus = "3";
        $logReferral->notif = 2;

        $logReferral->save();
    }

    //When Physician Accepts the referral
    public function accept($id, $patientID)
    {
        $consultInfo = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                    ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                    ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                    ->select('patients.*', 'treatments.*', 'logreferrals.*', 'cliniclogs.*')
                    ->where('logreferrals.clinicLogID', '=', $id)
                    ->first();

        $medicineList = Medicine::where('medType', '=', 'm')->get();
        $medicineName = Medicine::where('medtype', '=', 'm')
                                ->groupBy('genericName')
                                ->get();
        $medicalSupplyList = MedicalSupply::where('supType', '=', 'm')->get();

        $prescriptionInfo = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
            ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
            ->select('prescriptions.*', 'cliniclogs.*', 'medicines.*', 'treatments.*')
            ->where('prescriptions.isDeleted' , '=', '0')
            ->where('treatments.clinicLogID', '=', $id)
            ->get();

        $usedMedSupply = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('medsuppliesused', 'medsuppliesused.treatmentID', '=', 'treatments.treatmentID')
            ->join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
            ->select('medsuppliesused.*', 'cliniclogs.*', 'medsupplies.*', 'treatments.*')
            ->where('treatments.clinicLogID', '=', $id)
            ->where('medsuppliesused.isDeleted', '=', '0')
            ->get();

        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('patients.*','cliniclogs.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $treatment = Treatments::where('clinicLogID', '=', $id)->first();

        $medicalHistory = MedicalHistories::where('patientID', '=', $patientID)->first();

        if (!empty($medicalHistory)) {
                //dd($consultInfo);
          return view('physician.C_physician_patient_consult_diagnosis')->with(['consultInfo' => $consultInfo, 'medicineList' => $medicineList, 'medicalSupplyList' => $medicalSupplyList, 'prescriptionInfo' => $prescriptionInfo, 'usedMedSupply' => $usedMedSupply, 'medicineName' => $medicineName, 'clinicLogInfo' => $clinicLogInfo, 'treatment' => $treatment, 'medicalHistory' => $medicalHistory]);
        }
        else{
            $medicalHistory = MedicalHistories::where('patientID', '=', $patientID)->first();
            $patient = Patient::find($patientID);
            return view('physician.C_physician_patient_consult')->with(['medicalHistory' => $medicalHistory, 'patient' => $patient, 'clinicLogID' => $id]);
        }
        //dd($medicalHistory);

        //dd($consultInfo);
       

    }

    public function mChiefAccept($id, $patientID)
    {
        $consultInfo = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                    ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                    ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                    ->select('patients.*', 'treatments.*', 'logreferrals.*', 'cliniclogs.*')
                    ->where('logreferrals.clinicLogID', '=', $id)
                    ->first();

        $medicineList = Medicine::where('medType', '=', 'm')->get();
        $medicineName = Medicine::where('medtype', '=', 'm')
                                ->groupBy('genericName')
                                ->get();
        $medicalSupplyList = MedicalSupply::where('supType', '=', 'm')->get();

        $prescriptionInfo = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
            ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
            ->select('prescriptions.*', 'cliniclogs.*', 'medicines.*', 'treatments.*')
            ->where('prescriptions.isDeleted' , '=', '0')
            ->where('treatments.clinicLogID', '=', $id)
            ->get();

        $usedMedSupply = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('medsuppliesused', 'medsuppliesused.treatmentID', '=', 'treatments.treatmentID')
            ->join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
            ->select('medsuppliesused.*', 'cliniclogs.*', 'medsupplies.*', 'treatments.*')
            ->where('treatments.clinicLogID', '=', $id)
            ->where('medsuppliesused.isDeleted', '=', '0')
            ->get();

        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('patients.*','cliniclogs.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $treatment = Treatments::where('clinicLogID', '=', $id)->first();

        $medicalHistory = MedicalHistories::where('patientID', '=', $patientID)->first();

        if (!empty($medicalHistory)) {
                //dd($consultInfo);
          return view('chief.C_mchief_patient_consult_diagnosis')->with(['consultInfo' => $consultInfo, 'medicineList' => $medicineList, 'medicalSupplyList' => $medicalSupplyList, 'prescriptionInfo' => $prescriptionInfo, 'usedMedSupply' => $usedMedSupply, 'medicineName' => $medicineName, 'clinicLogInfo' => $clinicLogInfo, 'treatment' => $treatment, 'medicalHistory' => $medicalHistory]);
        }
        else{
            $medicalHistory = MedicalHistories::where('patientID', '=', $patientID)->first();
            $patient = Patient::find($patientID);
            return view('chief.C_mchief_patient_consult')->with(['medicalHistory' => $medicalHistory, 'patient' => $patient, 'clinicLogID' => $id]);
        }
        //dd($medicalHistory);

        //dd($consultInfo);
    }

    public function medicalCertificate(Request $request)
    {
        try {

            $clinicLog = new ClinicLog;
            $date = $request->clinicLogDate;
            $time = $request->clinicLogTime;
            $dateTime = date("Y-m-d H:i:s", strtotime($date . $time));

            $clinicLog->clinicType = 'M';
            $clinicLog->patientID = $request->patientID;
            $clinicLog->clinicLogDateTime = $dateTime;
            $clinicLog->concern = '1';
            $clinicLog->nurseID = Session::get('accountInfo.id');

            $clinicLog->save();
            $clinicLogID = $clinicLog->clinicLogID;

            $logReferral = new LogReferrals;

            $logReferral->clinicLogID = $clinicLogID;
            $logReferral->physicianID = Input::get('attendingPhysician');
            $logReferral->logReferralStatus = '1';
            $logReferral->reqForMedCertEnrol = Input::get('medCertEnrollment');
            $logReferral->reqForMedCertOffOJT = Input::get('medCertOffOjt');
            $logReferral->reqForMedCertAdminFaculty = Input::get('medCertAdminFaculty');
            $logReferral->reqForExcuseLetter = Input::get('medCertExcuseLetter');
            $logReferral->reqForWaver = Input::get('medCertWaver');

            $logReferral->save();

            //Saving of Treatment
            $treatment = new Treatments;
            $treatment->clinicLogID = $clinicLogID;
            $treatment->save();

            return Response::json(array('message', 'Successfully Referred!', 'clinicLogID' => $clinicLogID));


        } catch (Exception $e) {
            
        }
    }

    public function generateMedCertOjtOffCampus($id, $patientName)
    {
        $logreferrals = LogReferrals::find($id);

        $name = $patientName;
       
        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        if (!isset($logreferrals['ojtReqFor'])) {
            $purpose = Input::get('certOffCampusPurpose');
            $save = LogReferrals::find($id);

            $save->ojtReqFor = $purpose;

            $save->save();
        }
       
        
        //dd($logreferrals);
        $pdf = PDF::loadView('reports.medical_certificate_for_ojt_or_off_campus_activity', compact('name', 'physicianDetails', 'purpose', 'logreferrals'));
        return $pdf->stream('reports.medical_certificate_for_ojt_or_off_campus_activity');
    }

    public function generateMedCertOjtOffCampusMChief($id, $patientName)
    {
        $name = $patientName;
        $purpose = Input::get('certOffCampusPurpose');
        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        
        $pdf = PDF::loadView('reports.medical_certificate_for_ojt_or_off_campus_activity', compact('name', 'physicianDetails', 'purpose', 'logreferrals'));
        return $pdf->stream('reports.medical_certificate_for_ojt_or_off_campus_activity');
    }

    public function generateMedCertAdmin($id, $patientName)
    {
        $logreferrals = LogReferrals::find($id);
        $name = $patientName;

        if (!isset($logreferrals['adminReqFor'])) {
            $purpose = Input::get('certAdminPurpose');

            $save = LogReferrals::find($id);

            $save->adminReqFor = $purpose;

            $save->save();
        }
        

        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        // dd($logreferrals);
        $pdf = PDF::loadView('reports.medical_certificate_for_admin', compact('name', 'physicianDetails', 'purpose', 'logreferrals'));
        return $pdf->stream('reports.medical_certificate_for_admin');
    }

    public function generateMedCertAdminMChief($id, $patientName)
    {
        $name = $patientName;
        $purpose = Input::get('certAdminPurpose');
        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        $pdf = PDF::loadView('reports.medical_certificate_for_admin', compact('name', 'physicianDetails', 'purpose'));
        return $pdf->stream('reports.medical_certificate_for_admin');
    }

    public function generateExcuseLetter($id, $patientName)
    {
        $logreferrals = LogReferrals::find($id);
        $name = $patientName;
        if (!isset($logreferrals['excuseLetterFor']) && !isset($logreferrals['excuseLetterFrom']) && !isset($logreferrals['excuseLetterTo']) && !isset($logreferrals['excuseLetterPurpose'])) {
            $reason = Input::get('excuseReason');
            $from = Input::get('excuseFrom');
            $to  = Input::get('excuseTo');
            $purpose = Input::get('excusePurpose');

            $save = LogReferrals::find($id);

            $save->excuseLetterFor = $reason;
            $save->excuseLetterFrom = $from;
            $save->excuseLetterTo = $to;
            $save->excuseLetterPurpose = $purpose;

            $save->save();

        }
        

        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        $pdf = PDF::loadView('reports.medical_certificate_excuse_letter', compact('name', 'physicianDetails', 'purpose', 'reason', 'from', 'to', 'logreferrals'));
        return $pdf->stream('reports.medical_certificate_excuse_letter');
    }

    public function generateExcuseLetterMChief($id, $patientName)
    {
        $name = $patientName;
        $reason = Input::get('excuseReason');
        $from = Input::get('excuseFrom');
        $to  = Input::get('excuseTo');
        $purpose = Input::get('excusePurpose');
        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        $pdf = PDF::loadView('reports.medical_certificate_excuse_letter', compact('name', 'physicianDetails', 'purpose', 'reason', 'from', 'to'));
        return $pdf->stream('reports.medical_certificate_excuse_letter');
    }

    public function generateWaver($id, $patientName)
    {
        $logreferrals = LogReferrals::find($id);
        $name = $patientName;

        if (!isset($logreferrals['waiverCollegeOf']) && !isset($logreferrals['waiverDepartmentOf']) && !isset($logreferrals['waiverDiagnosis']) && !isset($logreferrals['waiverFollowUp'])) {
            $college = Input::get('college');
            $department = Input::get('department');
            $diagnosis  = Input::get('diagnosis');
            $followUp = Input::get('followUp');

            $save = LogReferrals::find($id);

            $save->waiverCollegeOf = $college;
            $save->waiverDepartmentOf = $department;
            $save->waiverDiagnosis = $diagnosis;
            $save->waiverFollowUp = $followUp;

            $save->save();
        }
        

        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        $pdf = PDF::loadView('reports.medical_certificate_waver', compact('name', 'physicianDetails', 'college', 'department', 'diagnosis', 'followUp', 'logreferrals'));

        return $pdf->stream('reports.medical_certificate_waver');
    }

    public function generateWaverMChief($id, $patientName)
    {
        $name = $patientName;
        $college = Input::get('college');
        $department = Input::get('department');
        $diagnosis  = Input::get('diagnosis');
        $followUp = Input::get('followUp');
        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        $pdf = PDF::loadView('reports.medical_certificate_waver', compact('name', 'physicianDetails', 'college', 'department', 'diagnosis', 'followUp'));

        return $pdf->stream('reports.medical_certificate_waver');
    }

    public function medCertEnrollment($patientName, $id, $logReferralID)
    {
        $name = $patientName;
        $patientID = $id;

        $logReferral = LogReferrals::find($logReferralID);
        if (Session::get('accountInfo.position') == 5) {
            return view('physician.C_physician_patient_certification')->with(['patientName' => $patientName, 'id' => $id, 'logReferral' => $logReferral]);
        }
        elseif (Session::get('accountInfo.position') == 3) {
            return view('chief.C_mchief_patient_certification')->with(['patientName' => $patientName, 'id' => $id, 'logReferral' => $logReferral]);
        }
        
    }

    public function medCertEnrollmentMChief($patientName, $id, $logReferralID)
    {
        $name = $patientName;
        $patientID = $id;

        $logReferral = LogReferrals::find($logReferralID);
        return view('chief.C_mchief_patient_certification')->with(['patientName' => $patientName, 'id' => $id, 'logReferral' => $logReferral]);
    }

    public function generateMedCertEnrollment($id, $patientName)
    {
        $name = $patientName;
        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        $logreferrals = LogReferrals::find($id);
        // dd($logreferrals);
        $pdf = PDF::loadView('reports.medical_certificate_for_enrollment', compact('name', 'physicianDetails', 'logreferrals'));
        return $pdf->stream('reports.medical_certificate_for_enrollment');
    }

    public function generateMedCertEnrollmentMChief($id, $patientName)
    {
        $name = $patientName;
        $physicianDetails = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                        ->select('users.*')
                                        ->where('logReferralID', '=', $id)
                                        ->first();
        $pdf = PDF::loadView('reports.medical_certificate_for_enrollment', compact('name', 'physicianDetails'));
        return $pdf->stream('reports.medical_certificate_for_enrollment');
    }


}
