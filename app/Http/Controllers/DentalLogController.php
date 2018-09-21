<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\DentalLog;
use App\Patient;
use App\Account;
use App\Medicine;
use App\MedicalSupply;
use App\Treatment;
use App\Prescription;
use App\DentalHistory;
use App\UsedMedSupply;
use App\Diagnosis;
use App\DentalPhotos;
use App\VitalSigns;
use App\OutsideReferrals;
// use Carbon\Carbon;
use Response;
use Redirect;
use Session;
use DB;

class DentalLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                               ->select('cliniclogs.*', 'patients.*')
                               ->orderBy('cliniclogs.created_at', 'desc')
                               ->where([['cliniclogs.isDeleted', '<>', '1'], ['cliniclogs.clinicType', '=', 'D']])
                               ->get();
        $attendingDentist = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                                ->select('users.*')
                                ->first();
        return view ('dentist.C_dentist_medical_log')->with(['dentalLogs' => $dentalLogs, 'attendingDentist' => $attendingDentist]);
    }

    public function dchiefIndex()
    {

        $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                               ->select('cliniclogs.*', 'patients.*')
                               ->orderBy('cliniclogs.created_at', 'desc')
                               ->where([['cliniclogs.isDeleted', '<>', '1'], ['cliniclogs.clinicType', '=', 'D']])
                               ->get();
        $attendingDentist = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                                ->select('users.*')
                                ->first();
        return view ('dchief.C_dchief_medical_log')->with(['dentalLogs' => $dentalLogs, 'attendingDentist' => $attendingDentist]);
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

            $dentalLogInfo = Session::get('request');

            $date = $dentalLogInfo['date'];
            $time = $dentalLogInfo['time'];
            $datetime = date('Y-m-d H:i:s');

            $logPatient = new DentalLog;

            $logPatient->patientID = Session::get('patientInfo.patientID');
            $logPatient->dentistID = Session::get('accountInfo.id');
            $logPatient->clinicType = 'D';
            $logPatient->nurseID = " ";
            $logPatient->symptoms = $request->symptoms;
            $logPatient->clinicLogDateTime = $datetime;
            $logPatient->concern = Session::get('patientInfo.concern');

            $logPatient->save();

            // SAVE TO PRESCRIPTION

            //TAKING RECENTLY ADDED CLINIC LOG
            $clinicLogID = DentalLog::orderBy('created_at', 'desc')
                                    ->select('cliniclogs.clinicLogID')
                                    ->where([['cliniclogs.isDeleted', '<>', '1'],['cliniclogs.clinicType', '=', 'D']])
                                    ->first();

            //SAVE TO DIAGNOSIS
            $diagnosis = new Diagnosis;

            $diagnosis->clinicLogID = $clinicLogID['clinicLogID'];
            // $diagnosis->logReferralID = ' ';
            $diagnosis->diagnosisDescription = Session::get('diagnosis');
            $diagnosis->save();

            //SAVE CLINICLOGID TO VITALSIGNS
            $vitalSigns = VitalSigns::orderBy('created_at', 'desc')
                                    ->where('vitalsigns.isDeleted', '<>', '1')
                                    ->first();

            $vitalSigns->clinicLogID = $clinicLogID['clinicLogID'];
            $vitalSigns->save();


            //TAKING RECENTLY ADDED DIAGNOSIS FOR DIAGNOSIS ID INSERTION IN TREATMENT TABLE.
            $diagnosisID = Diagnosis::orderBy('created_at', 'desc')
                                    ->select('diagnoses.diagnosisID')
                                    ->where('diagnoses.isDeleted', '<>', '1')
                                    ->first();

            // SAVE TO TREATMENT
            $patientTreatment = new Treatment;

            $patientTreatment->clinicLogID = $clinicLogID['clinicLogID'];
            $patientTreatment->dentalExamination = $request->dentalExam;
            $patientTreatment->oralProphylaxis = $request->oralProphylaxis;
            $patientTreatment->othersTreatment = $request->othersTreatment;
            $patientTreatment->treatmentDescription = $request->treatment;
            $patientTreatment->restoration = $request->restorationChk;
            $patientTreatment->restorationTooth = $request->restorationTxt;
            $patientTreatment->extraction = $request->extractionChk;
            $patientTreatment->extractionTooth = $request->extractionTxt;
            $patientTreatment->diagnosisID = $diagnosisID['diagnosisID'];
            $patientTreatment->save();
            $patientTreatmentID = $patientTreatment->treatmentID;

            
            $outsideReferral = OutsideReferrals::orderBy('created_at', 'desc')
                                               ->where('outsidereferrals.isDeleted', '<>', '1')
                                               ->first();

            if(!empty($outsideReferral)){
            $outsideReferral->treatmentID = $patientTreatmentID;
            $outsideReferral->save();
            }
            
            

            for ($i=0; $i < count(Input::get('medicineID')) ; $i++) {

                $prescription = new Prescription;
                $prescription->treatmentID = $patientTreatmentID;
                $prescription->medicineID = Input::get('medicineID')[$i];
                $prescription->quantity = Input::get('medQuantity')[$i];
                $prescription->medicineUnit = Input::get('medicineUnit')[$i];
                $prescription->medication = Input::get('medication')[$i];
                $prescription->dosage = Input::get('dosage')[$i];
                $prescription->isPrescribed = Input::get('isPrescribed')[$i];
                $prescription->isGiven = Input::get('isGiven')[$i];
                $prescription->save();
            }

            for ($i=0; $i < count(Input::get('medSupplyID')) ; $i++){

                $usedMedSupply = new UsedMedSupply;
                $usedMedSupply->treatmentID = $patientTreatmentID;
                $usedMedSupply->medSupplyID = Input::get('medSupplyID')[$i];
                $usedMedSupply->quantity = Input::get('medSupplyQuantity')[$i];
                $usedMedSupply->suppliesUnit = Input::get('medSuppUnit')[$i];
                $usedMedSupply->save();
            }

            // //SAVING OF OUTSIDE REFERRAL
            // $outsideReferral = new OutsideReferrals;

            // $outsideReferral->treatmentID = $patientTreatmentID;
            // $outsideReferral->dentistRemarks = $request->remark;
            // $outsideReferral->referToOthers = $request->referToOthers;
            // $outsideReferral->referralDate = date('y-m-d');

            // $outsideReferral->save();



            return Response::json(['message' => 'Successfully Added!']);

        } catch (Exception $e) {

            $error = $e->getMessage();

            return Redirect::back()->with('error', $error)->withInput();
        }

    }
    public function dchiefStore(Request $request)
    {
        try {

            $dentalLogInfo = Session::get('request');

            $date = $dentalLogInfo['date'];
            $time = $dentalLogInfo['time'];
            $datetime = date('Y-m-d h:i:s');

            $logPatient = new DentalLog;

            $logPatient->patientID = Session::get('patientInfo.patientID');
            $logPatient->dentistID = Session::get('accountInfo.id');
            $logPatient->clinicType = 'D';
            $logPatient->nurseID = " ";
            $logPatient->symptoms = $request->symptoms;
            $logPatient->clinicLogDateTime = $datetime;
            $logPatient->concern = Session::get('patientInfo.concern');

            $logPatient->save();

            // SAVE TO PRESCRIPTION

            //TAKING RECENTLY ADDED CLINIC LOG
            $clinicLogID = DentalLog::orderBy('created_at', 'desc')
                                    ->select('cliniclogs.clinicLogID')
                                    ->where([['cliniclogs.isDeleted', '<>', '1'],['cliniclogs.clinicType', '=', 'D']])
                                    ->first();

            //SAVE TO DIAGNOSIS
            $diagnosis = new Diagnosis;

            $diagnosis->clinicLogID = $clinicLogID['clinicLogID'];
            // $diagnosis->logReferralID = ' ';
            $diagnosis->diagnosisDescription = Session::get('diagnosis');
            $diagnosis->save();

            //SAVE CLINICLOGID TO VITALSIGNS
            $vitalSigns = VitalSigns::orderBy('created_at', 'desc')
                                    ->where('vitalsigns.isDeleted', '<>', '1')
                                    ->first();

            $vitalSigns->clinicLogID = $clinicLogID['clinicLogID'];
            $vitalSigns->save();


            //TAKING RECENTLY ADDED DIAGNOSIS FOR DIAGNOSIS ID INSERTION IN TREATMENT TABLE.
            $diagnosisID = Diagnosis::orderBy('created_at', 'desc')
                                    ->select('diagnoses.diagnosisID')
                                    ->where('diagnoses.isDeleted', '<>', '1')
                                    ->first();

            // SAVE TO TREATMENT
            $patientTreatment = new Treatment;

            $patientTreatment->clinicLogID = $clinicLogID['clinicLogID'];
            $patientTreatment->dentalExamination = $request->dentalExam;
            $patientTreatment->oralProphylaxis = $request->oralProphylaxis;
            $patientTreatment->othersTreatment = $request->othersTreatment;
            $patientTreatment->treatmentDescription = $request->treatment;
            $patientTreatment->restoration = $request->restorationChk;
            $patientTreatment->restorationTooth = $request->restorationTxt;
            $patientTreatment->extraction = $request->extractionChk;
            $patientTreatment->extractionTooth = $request->extractionTxt;
            $patientTreatment->diagnosisID = $diagnosisID['diagnosisID'];
            $patientTreatment->save();
            $patientTreatmentID = $patientTreatment->treatmentID;

            $outsideReferral = OutsideReferrals::orderBy('created_at', 'desc')
                                               ->where('outsidereferrals.isDeleted', '<>', '1')
                                               ->first();

            if(!empty($outsideReferral)){
            $outsideReferral->treatmentID = $patientTreatmentID;
            $outsideReferral->save();
            }

            for ($i=0; $i < count(Input::get('medicineID')) ; $i++) {

                $prescription = new Prescription;
                $prescription->treatmentID = $patientTreatmentID;
                $prescription->medicineID = Input::get('medicineID')[$i];
                $prescription->quantity = Input::get('medQuantity')[$i];
                $prescription->medicineUnit = Input::get('medicineUnit')[$i];
                $prescription->medication = Input::get('medication')[$i];
                $prescription->dosage = Input::get('dosage')[$i];
                $prescription->isPrescribed = Input::get('isPrescribed')[$i];
                $prescription->isGiven = Input::get('isGiven')[$i];
                $prescription->save();
            }

            for ($i=0; $i < count(Input::get('medSupplyID')) ; $i++){

                $usedMedSupply = new UsedMedSupply;
                $usedMedSupply->treatmentID = $patientTreatmentID;
                $usedMedSupply->medSupplyID = Input::get('medSupplyID')[$i];
                $usedMedSupply->quantity = Input::get('medSupplyQuantity')[$i];
                $usedMedSupply->suppliesUnit = Input::get('medSuppUnit')[$i];
                $usedMedSupply->save();
            }

            // //SAVING OF OUTSIDE REFERRAL
            // $outsideReferral = new OutsideReferrals;

            // $outsideReferral->treatmentID = $patientTreatmentID;
            // $outsideReferral->dentistRemarks = $request->remark;
            // $outsideReferral->referToOthers = $request->referToOthers;
            // $outsideReferral->referralDate = date('y-m-d');

            // $outsideReferral->save();



            return Response::json(['message' => 'Successfully Added!']);

        } catch (Exception $e) {

            $error = $e->getMessage();

            return Redirect::back()->with('error', $error)->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patientDentalLog = DentalLog::find($id);

        $patientDentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                      ->select('patients.*', 'cliniclogs.*')
                                      ->where('cliniclogs.isDeleted', '=', '0')
                                      ->where('cliniclogs.clinicLogID', '=', $id)
                                      ->get();

        $diagnosis = Diagnosis::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'diagnoses.clinicLogID')
                              ->select('diagnoses.*')
                              ->where('diagnoses.isDeleted', '=', '0')
                              ->where('diagnoses.clinicLogID', '=', $id)
                              ->first();

        $treatment = Treatment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'treatments.clinicLogID')
                              ->select('treatments.*')
                              ->where('treatments.isDeleted', '=', '0')
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

        return view('dentist.C_dentist_patient_more_info')->with(['patientDentalLogs'=>$patientDentalLogs, 'dentalLogEach'=>$patientDentalLog, 'diagnosis'=>$diagnosis, 'treatment'=>$treatment, 'medsGiven'=>$medsGiven ,'prescribed'=>$prescribed, 'medSupp'=>$medSupp]);
    }
    public function dchiefShow($id)
    {
        $patientDentalLog = DentalLog::find($id);

        $patientDentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                      ->select('patients.*', 'cliniclogs.*')
                                      ->where('cliniclogs.isDeleted', '=', '0')
                                      ->where('cliniclogs.clinicLogID', '=', $id)
                                      ->get();

        $diagnosis = Diagnosis::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'diagnoses.clinicLogID')
                              ->select('diagnoses.*')
                              ->where('diagnoses.isDeleted', '=', '0')
                              ->where('diagnoses.clinicLogID', '=', $id)
                              ->first();

        $treatment = Treatment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'treatments.clinicLogID')
                              ->select('treatments.*')
                              ->where('treatments.isDeleted', '=', '0')
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

        return view('dchief.C_dchief_patient_more_info')->with(['patientDentalLogs'=>$patientDentalLogs, 'dentalLogEach'=>$patientDentalLog, 'diagnosis'=>$diagnosis, 'treatment'=>$treatment, 'medsGiven'=>$medsGiven ,'prescribed'=>$prescribed, 'medSupp'=>$medSupp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patientDentalLog = DentalLog::find($id);

        $patientDentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                      ->select('patients.*', 'cliniclogs.*')
                                      ->where('cliniclogs.isDeleted', '=', '0')
                                      ->where('cliniclogs.clinicLogID', '=', $id)
                                      ->get();

        $medicines = Medicine::all();
        $medSupplies = MedicalSupply::all();

        $diagnosis = Diagnosis::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'diagnoses.clinicLogID')
                              ->select('diagnoses.*')
                              ->where('diagnoses.isDeleted', '=', '0')
                              ->where('diagnoses.clinicLogID', '=', $id)
                              ->first();

        $treatment = Treatment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'treatments.clinicLogID')
                              ->select('treatments.*')
                              ->where('treatments.isDeleted', '=', '0')
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

        // $prescriptionID = Prescription::where('treatmentID', '=', $treatment['treatmentID'])->first();
        // dd($prescriptionID);

        return view('dentist.C_dentist_medical_log_edit')->with(['patientDentalLogs'=>$patientDentalLogs, 'dentalLogEach'=>$patientDentalLog, 'diagnosis'=>$diagnosis, 'medicines'=>$medicines, 'medSupplies'=>$medSupplies ,'treatment'=>$treatment, 'medsGiven'=>$medsGiven ,'prescribed'=>$prescribed, 'medSupp'=>$medSupp]);

    }
    public function dchiefEdit($id)
    {
        $patientDentalLog = DentalLog::find($id);

        $patientDentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                      ->select('patients.*', 'cliniclogs.*')
                                      ->where('cliniclogs.isDeleted', '=', '0')
                                      ->where('cliniclogs.clinicLogID', '=', $id)
                                      ->get();

        $medicines = Medicine::all();
        $medSupplies = MedicalSupply::all();

        $diagnosis = Diagnosis::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'diagnoses.clinicLogID')
                              ->select('diagnoses.*')
                              ->where('diagnoses.isDeleted', '=', '0')
                              ->where('diagnoses.clinicLogID', '=', $id)
                              ->first();

        $treatment = Treatment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'treatments.clinicLogID')
                              ->select('treatments.*')
                              ->where('treatments.isDeleted', '=', '0')
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

        // $prescriptionID = Prescription::where('treatmentID', '=', $treatment['treatmentID'])->first();
        // dd($prescriptionID);

        return view('dchief.C_dchief_medical_log_edit')->with(['patientDentalLogs'=>$patientDentalLogs, 'dentalLogEach'=>$patientDentalLog, 'diagnosis'=>$diagnosis, 'medicines'=>$medicines, 'medSupplies'=>$medSupplies ,'treatment'=>$treatment, 'medsGiven'=>$medsGiven ,'prescribed'=>$prescribed, 'medSupp'=>$medSupp]);

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
        try {
          $dentalLog = DentalLog::find($id);

          $dentalLog->symptoms = $request->symptoms;
          $dentalLog->save();


          $diagnosis = Diagnosis::where('clinicLogID', '=', $id)->first();

          $diagnosis->diagnosisDescription = $request->diagnosisTextArea;
          $diagnosis->save();

          $treatment = Treatment::where('clinicLogID', '=', $id)
                                ->where('diagnosisID', '=', $diagnosis['diagnosisID'])
                                ->first();

          $treatment->diagnosisID = $diagnosis['diagnosisID'];
          $treatment->dentalExamination = $request->dentalExam;
          $treatment->oralProphylaxis = $request->oralProphylaxis;
          $treatment->restoration = $request->restorationChk;
          $treatment->restorationTooth = $request->restorationTxt;
          $treatment->extraction = $request->extractionChk;
          $treatment->extractionTooth = $request->extractionTxt;
          $treatment->othersTreatment = $request->othersTreatment;
          $treatment->treatmentDescription = $request->treatment;
          $treatment->save();


          for ($i=0; $i < count(Input::get('medicineID')) ; $i++) {

            $prescription = new Prescription;

            $prescription->treatmentID = $treatment['treatmentID'];
            $prescription->medicineID = Input::get('medicineID')[$i];
            $prescription->quantity = Input::get('medQuantity')[$i];
            $prescription->medicineUnit = Input::get('medicineUnit')[$i];
            $prescription->medication = Input::get('medication')[$i];
            $prescription->dosage = Input::get('dosage')[$i];
            $prescription->isPrescribed = Input::get('isPrescribed')[$i];
            $prescription->isGiven = Input::get('isGiven')[$i];
            $prescription->save();
        }

        for ($i=0; $i < count(Input::get('medSupplyID')) ; $i++){
            $usedMedSupply = new UsedMedSupply;
            $usedMedSupply->treatmentID =$treatment['treatmentID'];
            $usedMedSupply->medSupplyID = Input::get('medSupplyID')[$i];
            $usedMedSupply->quantity = Input::get('medSupplyQuantity')[$i];
            $usedMedSupply->suppliesUnit = Input::get('medSuppUnit')[$i];
            $usedMedSupply->save();
        }

        } catch (Exception $e) {

        }

    }
    public function dchiefUpdate(Request $request, $id)
    {
        try {
          $dentalLog = DentalLog::find($id);

          $dentalLog->symptoms = $request->symptoms;
          $dentalLog->save();


          $diagnosis = Diagnosis::where('clinicLogID', '=', $id)->first();

          $diagnosis->diagnosisDescription = $request->diagnosisTextArea;
          $diagnosis->save();

          $treatment = Treatment::where('clinicLogID', '=', $id)
                                ->where('diagnosisID', '=', $diagnosis['diagnosisID'])
                                ->first();

          $treatment->diagnosisID = $diagnosis['diagnosisID'];
          $treatment->dentalExamination = $request->dentalExam;
          $treatment->oralProphylaxis = $request->oralProphylaxis;
          $treatment->restoration = $request->restorationChk;
          $treatment->restorationTooth = $request->restorationTxt;
          $treatment->extraction = $request->extractionChk;
          $treatment->extractionTooth = $request->extractionTxt;
          $treatment->othersTreatment = $request->othersTreatment;
          $treatment->treatmentDescription = $request->treatment;
          $treatment->save();


          for ($i=0; $i < count(Input::get('medicineID')) ; $i++) {

            $prescription = new Prescription;

            $prescription->treatmentID = $treatment['treatmentID'];
            $prescription->medicineID = Input::get('medicineID')[$i];
            $prescription->quantity = Input::get('medQuantity')[$i];
            $prescription->medicineUnit = Input::get('medicineUnit')[$i];
            $prescription->medication = Input::get('medication')[$i];
            $prescription->dosage = Input::get('dosage')[$i];
            $prescription->isPrescribed = Input::get('isPrescribed')[$i];
            $prescription->isGiven = Input::get('isGiven')[$i];
            $prescription->save();
        }

        for ($i=0; $i < count(Input::get('medSupplyID')) ; $i++){
            $usedMedSupply = new UsedMedSupply;
            $usedMedSupply->treatmentID =$treatment['treatmentID'];
            $usedMedSupply->medSupplyID = Input::get('medSupplyID')[$i];
            $usedMedSupply->quantity = Input::get('medSupplyQuantity')[$i];
            $usedMedSupply->suppliesUnit = Input::get('medSuppUnit')[$i];
            $usedMedSupply->save();
        }

        } catch (Exception $e) {

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteClinicLog = DentalLog::find($id);

        $deleteClinicLog->isDeleted = 1;

        $deleteClinicLog->save();

        return Response::json(array('message' => 'Successfully Deleted'));
    }
    public function dchiefDestroy($id)
    {
        $deleteClinicLog = DentalLog::find($id);

        $deleteClinicLog->isDeleted = 1;

        $deleteClinicLog->save();

        return Response::json(array('message' => 'Successfully Deleted'));
    }

// *************************************************************************

    public function showAllConsultations($id)
    {
        $patientDentalLog = DentalLog::find($id);

        $patientDentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                      ->select('patients.*', 'cliniclogs.*')
                                      ->where('cliniclogs.isDeleted', '=', '0')
                                      ->where('cliniclogs.clinicLogID', '=', $id)
                                      ->get();

        $diagnosis = Diagnosis::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'diagnoses.clinicLogID')
                              ->select('diagnoses.*')
                              ->where('diagnoses.isDeleted', '=', '0')
                              ->where('diagnoses.clinicLogID', '=', $id)
                              ->first();

        $treatment = Treatment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'treatments.clinicLogID')
                              ->select('treatments.*')
                              ->where('treatments.isDeleted', '=', '0')
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

         // dd($prescribed);

        return view('dentist.C_dentist_show_diagnosis')->with(['patientDentalLogs'=>$patientDentalLogs, 'dentalLogEach'=>$patientDentalLog,
          'diagnosis'=>$diagnosis, 'treatment'=>$treatment, 'medsGiven'=>$medsGiven ,'prescribed'=>$prescribed, 'medSupp'=>$medSupp]);
    }

    public function dchiefShowAllConsultations($id)
    {
        $patientDentalLog = DentalLog::find($id);

        $patientDentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                      ->select('patients.*', 'cliniclogs.*')
                                      ->where('cliniclogs.isDeleted', '=', '0')
                                      ->where('cliniclogs.clinicLogID', '=', $id)
                                      ->get();

        $diagnosis = Diagnosis::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'diagnoses.clinicLogID')
                              ->select('diagnoses.*')
                              ->where('diagnoses.isDeleted', '=', '0')
                              ->where('diagnoses.clinicLogID', '=', $id)
                              ->first();

        $treatment = Treatment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'treatments.clinicLogID')
                              ->select('treatments.*')
                              ->where('treatments.isDeleted', '=', '0')
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

         // dd($prescribed);

        return view('dchief.C_dchief_show_diagnosis')->with(['patientDentalLogs'=>$patientDentalLogs, 'dentalLogEach'=>$patientDentalLog,
          'diagnosis'=>$diagnosis, 'treatment'=>$treatment, 'medsGiven'=>$medsGiven ,'prescribed'=>$prescribed, 'medSupp'=>$medSupp]);
    }

    public function consultationsAllDentists($id)
    {
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

        return view('dentist.C_dentist_medical_log_each')->with(['patientInfo'=>$patientInfo, 'patientAllLogs'=>$patientAllLogs, 'attendingDentist' => $attendingDentist, 'usedMedSupply'=>$usedMedSupply, 'usedMed'=>$usedMed]);
    }

    public function dchiefConsultationsAllDentists($id)
    {
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

        return view('dchief.C_dchief_medical_log_each')->with(['patientInfo'=>$patientInfo, 'patientAllLogs'=>$patientAllLogs, 'attendingDentist' => $attendingDentist, 'usedMedSupply'=>$usedMedSupply, 'usedMed'=>$usedMed]);
    }

    public function patientPrescription(Request $request)
    {
      $medicines = Medicine::all();
      $medSupplies = MedicalSupply::all();

      return view('dentist.C_dentist_patient_prescription')->with(['medicines'=>$medicines, 'medSupplies'=>$medSupplies]);
    }
    public function dchiefPatientPrescription(Request $request)
    {
      $medicines = Medicine::all();
      $medSupplies = MedicalSupply::all();

      return view('dchief.C_dchief_patient_prescription')->with(['medicines'=>$medicines, 'medSupplies'=>$medSupplies]);
    }

    public function redirectPatient(Request $request)
    {
      //QUERY FOR SEARCHING IF THERE'S AN EXISTING DENTAL HISTORY RECORD
      $dentalHistory = DentalHistory::where('patientID', '=', Session::get('patientInfo.patientID'))->first();

      if(empty($dentalHistory)){

          $patientGender = Patient::select('patients.gender')
                                  ->where('patientID', '=', Session::get('patientInfo.patientID'))
                                  ->first();

          return view('dentist.C_dentist_dental_form')->with('patientGender', $patientGender);
      }
      else if(!empty($dentalHistory)){

          return Redirect::route('dentist.vitalSigns.index', Session::get('patientInfo.patientID'));
          // return Redirect::route('dentist.dentalchart');
      }
    }

    public function dchiefRedirectPatient(Request $request)
    {
      //QUERY FOR SEARCHING IF THERE'S AN EXISTING DENTAL HISTORY RECORD
      $dentalHistory = DentalHistory::where('patientID', '=', Session::get('patientInfo.patientID'))->first();

      if(empty($dentalHistory)){

          $patientGender = Patient::select('patients.gender')
                                  ->where('patientID', '=', Session::get('patientInfo.patientID'))
                                  ->first();

          return view('dchief.C_dchief_dental_form')->with('patientGender', $patientGender);
      }
      else if(!empty($dentalHistory)){



          return Redirect::route('dchief.vitalSigns.index', Session::get('patientInfo.patientID'));
          // return Redirect::route('dentist.dentalchart');
      }
    }

    //FUNCTION TO REDIRECT THE USER IN WHICH CONCERN
    public function redirectConcern (Request $request)
    {
      if(Input::get('hasRecord') == 1)
      {
        Session::put('patientInfo', $request->all());

        if(Session::get('patientInfo.concern') == 0)
        {

          return Response::json(array('redirect' => '/dentist/log/patient/redir'));
          // return Redirect::route('dentist.redirect.patient');

        }
        else if(Session::get('patientInfo.concern') == 1)
        {
          Session::put('patientInfo', $request->all());

          // return Redirect::route('dentist.letter.requesting');
          return Response::json(array('redirect' => '/dentist/patient/certification'));

        }
      }
      elseif(Input::get('hasRecord') == 0)
      {
          Session::flash('patientNumber', $request->patientNumber);

          return Response::json(array('redirect' => '/dentist/create/patientRecord'));
      }
    }

    //FUNCTION TO REDIRECT THE USER IN WHICH CONCERN
    public function dchiefRedirectConcern (Request $request)
    {
      if(Input::get('hasRecord') == 1)
      {
        Session::put('patientInfo', $request->all());

        if(Session::get('patientInfo.concern') == 0)
        {

          // return Response::json(array('redirect' => '/dentist/log/patient/redir'));
          return Response::json(array('redirect' => '/dchief/log/patient/redir'));
          // return Redirect::route('dentist.redirect.patient');

        }
        else if(Session::get('patientInfo.concern') == 1)
        {
          Session::put('patientInfo', $request->all());

          // return Redirect::route('dentist.letter.requesting');
          // return Response::json(array('redirect' => '/dentist/patient/certification'));
          return Response::json(array('redirect' => '/dchief/patient/certification'));

        }
      }
      elseif(Input::get('hasRecord') == 0)
      {
          Session::flash('patientNumber', $request->patientNumber);

          // return Response::json(array('redirect' => '/dentist/create/patientRecord'));
          return Response::json(array('redirect' => '/dchief/create/patientRecord'));
      }
    }

    public function requestLetterCertification()
    {
      return view ('dentist.C_dentist_patient_certification');
    }
    public function dchiefRequestLetterCertification()
    {
      return view ('dchief.C_dchief_patient_certification');
    }

    public function saveRequestLetterCertification()
    {
      $letterRequest = new DentalLog;

      $letterRequest->patientID = Session::get('patientInfo.patientID');
      $letterRequest->dentistID = Session::get('accountInfo.id');
      $letterRequest->clinicType = 'D';
      $letterRequest->symptoms = 'none';
      $letterRequest->clinicLogDateTime = DB::raw('NOW()');
      $letterRequest->concern = '1';
      $letterRequest->reqForDentalCert = '1';

      $letterRequest->save();

      return Redirect::to('/dentist/DentalLog');
    }
    public function dchiefSaveRequestLetterCertification()
    {
      $letterRequest = new DentalLog;

      $letterRequest->patientID = Session::get('patientInfo.patientID');
      $letterRequest->dentistID = Session::get('accountInfo.id');
      $letterRequest->clinicType = 'D';
      $letterRequest->symptoms = 'none';
      $letterRequest->clinicLogDateTime = DB::raw('NOW()');
      $letterRequest->concern = '1';
      $letterRequest->reqForDentalCert = '1';

      $letterRequest->save();

      return Redirect::to('/dchief/DentalLog');
    }

    public function medicalLogCreate(Request $request)
    {
      Session::put('patientInfo', $request->all());

      //QUERY FOR SEARCHING IF THERE'S AN EXISTING DENTAL HISTORY RECORD
      $dentalHistory = DentalHistory::where('patientID', '=', Session::get('patientInfo.patientID'))->first();

      if(empty($dentalHistory)){

          $patientGender = Patient::select('patients.gender')
                                  ->where('patientID', '=', Session::get('patientInfo.patientID'))
                                  ->first();

          return view('dentist.C_dentist_dental_form')->with('patientGender', $patientGender);
      }
      else if(!empty($dentalHistory)){
          return Redirect::route('dentist.dentalchart');
      }
    }

    public function timeout($id)
    {

        $timeout = DentalLog::find($id);

        $date = date("Y-m-d H:i:s A");

        $timeout->timeOut = $date;

        $timeout->save();

    }
    public function dchiefTimeout($id)
    {

        $timeout = DentalLog::find($id);

        $date = date("Y-m-d H:i:s A");

        $timeout->timeOut = $date;

        $timeout->save();

    }

    private function getAccounts()
    {
        $account = Account::where([['users.position', '=', '4'], ['users.isActive', '=', '1']])->get();
        return $account;
    }

    private function getRecordCounter()
    {
        //variable for making another dental Log
        $recordCounter = DentalLog::where('clinicType', '=', 'D')->count();
        $recordCounter++;

        return $recordCounter;
    }

    private function getPatientInfo()
    {
        $patientInfo = Patient::all();

        return $patientInfo;

    }
}
