<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClinicLog;

use App\Patient;

use App\LogReferrals;

use App\Treatments;

use App\Medicine;

use App\Diagnoses;

use App\UsedMedSupply;

use App\Accounts;

use App\MedicalSupply;

use App\Prescription;

use Response;

use Illuminate\Support\Facades\Input;

use App\VitalSigns;

use App\Appointment;

//use Exception;

use DB;

use Redirect;

use Session;

use PDF;

class ClinicLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicLogs = ClinicLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'M')
                        ->orderBy('cliniclogs.clinicLogID', 'DESC')
                        ->get();
        return view('nurse.C_nurse_medical_log')->with(['clinicLogs' => $clinicLogs]);
       
    }

    public function indexOfPhysician()
    {
        $clinicLogs = ClinicLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->leftJoin('logreferrals', 'logreferrals.clinicLogID', '=', 'cliniclogs.clinicLogID')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->orderBy('cliniclogs.clinicLogID', 'DESC')
                        ->get();

        $attendingPhysician = logReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                        ->select('logreferrals.*', 'users.*')
                        ->get();

        $assistingNurse = Accounts::all();
                       

        return view('physician.C_physician_medical_log')->with(['clinicLogs' => $clinicLogs, 'attendingPhysician' => $attendingPhysician, 'assistingNurse' => $assistingNurse]);
    }

    public function indexOfMChief()
    {
        $clinicLogs = ClinicLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->leftJoin('logreferrals', 'logreferrals.clinicLogID', '=', 'cliniclogs.clinicLogID')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->orderBy('cliniclogs.clinicLogID', 'DESC')
                        ->get();

        $attendingPhysician = logReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                        ->select('logreferrals.*', 'users.*')
                        ->get();

        $assistingNurse = Accounts::all();
                       

        return view('chief.C_mchief_medical_log')->with(['clinicLogs' => $clinicLogs, 'attendingPhysician' => $attendingPhysician, 'assistingNurse' => $assistingNurse]);
    }

    public function autocomplete()
    {

        $patients = Patient::where('isDeleted', '=', '0')
                    ->where('patientNumber', 'LIKE' , '%' . Input::get('input')  . '%')
                    ->get();
        $results ['suggestions'] = [];
        foreach ($patients as $patient) {

            array_push( $results['suggestions'], array("value" => "$patient->patientNumber", "data" => "$patient->lastName, $patient->firstName $patient->middleName $patient->quantifier", "id" => "$patient->patientID", "number" => "$patient->patientNumber"));
        }


       return Response::json($results);

        
    }

     public function autocompleteName()
    {
       $patients = Patient::where('isDeleted', '=', '0')
                    ->where(DB::raw("CONCAT(patients.lastName,', ', patients.firstName,' ',IFNULL(patients.middleName, ''),' ', IFNULL(patients.quantifier, ''))"), 'LIKE' , '%' . Input::get('input')  . '%')
                    ->get();
        $results ['suggestions'] = [];
        foreach ($patients as $patient) {

            array_push( $results['suggestions'], array("value" => "$patient->lastName, $patient->firstName $patient->middleName $patient->quantifier", "id" => "$patient->patientID", "number" => "$patient->patientNumber"));
        }

       // dd($patients);
     return Response::json($results);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $medicineList = Medicine::all();
        $medicineName = Medicine::groupBy('genericName')->get();
        $medicalSupplyList = MedicalSupply::all();
        $physicians = Accounts::where('position', '=', '5')
                                ->orWhere('position', '=', '3')
                                ->get();
        $appointment = Appointment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
                                    ->join('logreferrals', 'logreferrals.logReferralID', '=', 'appointments.logReferralID')
                                    ->where('cliniclogs.patientID', '=',  Session::get('request.patientID'))
                                    ->where('isAppointed', '=', '0')
                                    ->where('appointmentDate', '=', date('y-m-d'))
                                    ->first();
        //dd($appointment);
        // if (count($appointment) > 0) {
            
        // }
        //dd($appointment);
        return view('nurse.C_nurse_patient_prescription')->with(['medicineList' => $medicineList, 'medicalSupplyList' => $medicalSupplyList, 'physicians' => $physicians, 'medicineName' => $medicineName, 'hasAppointment' => $appointment]);
        //return view('nurse.sample')->with(['medicineList' => $medicineList, 'medicalSupplyList' => $medicalSupplyList, 'physicians' => $physicians, 'medicineName' => $medicineName]);
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
            //variable for the last inserted ID of treatments table
            $treatmentID;
            //
            $medicalLogInfo = Session::get('request');
            //Date Time

            $dateTime = date("Y-m-d H:i:s");

            $clinicLog = new ClinicLog;

            $clinicLog->clinicType = 'M';
            $clinicLog->patientID = $medicalLogInfo['patientID'];
            $clinicLog->symptoms = $request->symptoms;
            $clinicLog->nurseID = Session::get('accountInfo.id');
            $clinicLog->clinicLogDateTime = $dateTime;
            $clinicLog->notes = $request->notes;
            $clinicLog->save();
            //Save to prescription
            $clinicLogID = $clinicLog->clinicLogID;

            //Save Vital Signs
            $vitalSigns = new VitalSigns;

            $vitalSigns->clinicLogID = $clinicLogID;
            $vitalSigns->bloodPressure = Input::get('_bloodPressure');
            $vitalSigns->heartRate = Input::get('_heartRate');
            $vitalSigns->respiRate = Input::get('_respiratoryRate');
            $vitalSigns->temperature = Input::get('_temperature');
            $vitalSigns->height = Input::get('_height');
            $vitalSigns->weight = Input::get('_weight');
            $vitalSigns->bmiValue = Input::get('_bmi');
            $vitalSigns->bmiRange = Input::get('_bmiRange');

            $vitalSigns->save();

            if (!empty(Input::get('attendingPhysician'))) {
                $logReferral = new LogReferrals;

                $logReferral->clinicLogID = $clinicLogID;
                $logReferral->physicianID = $request->attendingPhysician;
                $logReferral->logReferralStatus = 1;

                $logReferral->save();
            }

            //Saving of Treatment
            $treatment = new Treatments;
            $treatment->clinicLogID = $clinicLogID;
            $treatment->save();
            $treatmentID = $treatment->treatmentID;

        
            for ($i=0; $i < sizeof(Input::get('_medArray')); $i++) { 

                $prescription = new Prescription;
                $prescription->treatmentID =  $treatmentID;
                $prescription->medicineID = Input::get('_medArray')[$i]['medicineID'];
                $prescription->quantity = Input::get('_medArray')[$i]['medicineQuantity'];
                $prescription->medication = Input::get('_medArray')[$i]['medicineMedication'];
                $prescription->isGiven = '1';
                $prescription->dosage = Input::get('_medArray')[$i]['medicineDosage'];

                $prescription->save();

            }

            for ($i=0; $i < sizeof(Input::get('_suppArray')); $i++) { 
                
                $usedMedSupply = new UsedMedSupply;

                $usedMedSupply->treatmentID = $treatmentID;
                $usedMedSupply->medSupplyID = Input::get('_suppArray')[$i]['suppID'];
                $usedMedSupply->quantity = Input::get('_suppArray')[$i]['suppQuantity'];

                $usedMedSupply->save();
            }

            if (array_key_exists('hasAppointment', $medicalLogInfo)) {
                if ($medicalLogInfo['hasAppointment'] == 1) {
                    $appointment = Appointment::find($medicalLogInfo['appointmentID']);

                    $appointment->isAppointed = 4;

                    $appointment->save();
                } 
            }

            Session::flash('message', 'Successfully Saved!');
            return Response::json(array('clinicLogID' => $clinicLogID));
        } catch (Exception $e) {
            $error = $e->getMessage();
            return Redirect::back()->with('error', $error);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Medical Log for Physician
    public function showMedicalLog($id)
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

        return view('physician.C_physician_medical_log_each')->with(['patientInfo' => $patientInfo, 'medicalLogs' => $medicalLogs, 'usedMedSupply' => $usedMedSupply, 'usedMed' => $usedMed, 'physician' => $attendingPhysician]);
    }

    //Medical Log for Medical Chief
    public function showMedicalLogMChief($id)
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

        return view('chief.C_mchief_medical_log_each')->with(['patientInfo' => $patientInfo, 'medicalLogs' => $medicalLogs, 'usedMedSupply' => $usedMedSupply, 'usedMed' => $usedMed, 'physician' => $attendingPhysician]);
    }

    //Medical Log for Nurse
    public function showMedicalLogNurse($id)
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
      
        return view('nurse.C_nurse_medical_log_each')->with(['patientInfo' => $patientInfo, 'medicalLogs' => $medicalLogs, 'usedMedSupply' => $usedMedSupply, 'usedMed' => $usedMed, 'physician' => $attendingPhysician]);
    }
    //Medical Log More Info Nurse
    public function showMedicalLogMoreInfo($id)
    {
        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('patients.*','cliniclogs.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $prescriptionInfo = ClinicLog::join('prescription', 'prescription.clinicLogID', '=', 'clinicLog.clinicLogID')
            ->join('medicine', 'medicine.medicineID', '=', 'prescription.medicineID')
            ->select('prescription.*', 'cliniclogs.*', 'medicine.*')
            ->where('prescription.clinicLogID', '=', $id)
            ->get();

        $usedMedSupply = ClinicLog::join('medsuppliesused', 'medsuppliesused.clinicLogID', '=', 'clinicLog.clinicLogID')
            ->join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupID')
            ->select('medsuppliesused.*', 'cliniclogs.*', 'medsupplies.*')
            ->where('medsuppliesused.clinicLogID', '=', $id)
            ->get();

        $vitalSigns = VitalSigns::first();

        return view('nurse.C_nurse_patient_more_info')->with(['clinicLogInfo' => $clinicLogInfo, 'prescriptionInfo' => $prescriptionInfo, 'usedMedSupply' => $usedMedSupply, 'vitalSigns' => $vitalSigns]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('cliniclogs.*', 'patients.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $recommendations = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->select('treatments.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $attendingPhysician = ClinicLog::join('logReferrals', 'cliniclogs.clinicLogID', '=', 'logReferrals.clinicLogID')
            ->join('users', 'users.id', '=', 'logReferrals.physicianID')
            ->select('users.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();
        
        $physicians = Accounts::where('position', '=', '5')->orWhere('position', '=', '3')->get();

        $prescriptionInfo = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
            ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
            ->select('prescriptions.*', 'cliniclogs.*', 'treatments.*', 'genericName', 'brand', 'unit')
            ->where('prescriptions.isDeleted' , '=', '0')
            ->where('treatments.clinicLogID', '=', $id)
            ->get();

         $prescriptionID = Prescription::select('prescriptionID')
            ->orderBy('prescriptionID', 'desc')
            ->first();

        $usedMedSupply = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('medsuppliesused', 'medsuppliesused.treatmentID', '=', 'treatments.treatmentID')
            ->join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
            ->select('medsuppliesused.*', 'cliniclogs.*', 'medsupplies.*', 'treatments.*')
            ->where('treatments.clinicLogID', '=', $id)
            ->where('medsuppliesused.isDeleted', '=', '0')
            ->get();

        $medicineList = Medicine::all();
        $medicineName = Medicine::where('isDeleted', '=', 0)->groupBy('genericName')->get();
        $medicalSupplyList = MedicalSupply::all();

        $vitalSigns = ClinicLog::join('vitalSigns', 'vitalSigns.clinicLogID', '=', 'cliniclogs.clinicLogID')
                                ->select('vitalSigns.*')
                                ->where('vitalSigns.clinicLogID', '=', $id)
                                ->where('cliniclogs.isDeleted', '=', '0')
                                ->first();

        $logReferral = LogReferrals::where('clinicLogID', '=', $id)->first();
        $patientName = $clinicLogInfo->lastName.", ".$clinicLogInfo->firstName." ".$clinicLogInfo->middleName." ". $clinicLogInfo->quantifier;
        if ($logReferral['reqForMedCertEnrol'] == 1 || $logReferral['reqForMedCertOffOJT'] == 1 || $logReferral['reqForMedCertAdminFaculty'] == 1 || $logReferral['reqForWaver'] == 1 || $logReferral['reqForExcuseLetter'] == 1) {
            
            return view('nurse.C_nurse_medical_cert_edit')->with(['clinicLogInfo' => $clinicLogInfo, 'attendingPhysician' => $attendingPhysician, 'logReferral' => $logReferral, 'patientName' =>$patientName]);
        }
        else{

            return view('nurse.C_nurse_patient_medical_log_edit')->with(['clinicLogInfo' => $clinicLogInfo, 'prescriptionInfo' => $prescriptionInfo, 'usedMedSupply' => $usedMedSupply, 'attendingPhysician' => $attendingPhysician, 'physicians' => $physicians, 'medicineList' => $medicineList, 'medicalSupplyList' => $medicalSupplyList, 'vitalSign' => $vitalSigns, 'recommendation' => $recommendations, 'medicineName' => $medicineName, 'prescription' => $prescriptionID]);
        }
       
    }

    public function editPatientDiagnoses($id)
    {
        $logReferralID = LogReferrals::select('logReferralID')
                            ->where('clinicLogID', '=', $id)
                            ->first();

        $diagnosis = Diagnoses::select('diagnosisID')
                            ->where('logReferralID', '=', $logReferralID['logReferralID'])
                            ->first();
        $clinicLog = ClinicLog::find($id);

        $clinicLog->symptoms = Input::get('symptoms');

        $clinicLog->save();

        $edit = Diagnoses::find($diagnosis['diagnosisID']);

        $edit->diagnosisDescription = Input::get('diagnosis');

        $edit->save();

        $diagnosisID = $edit->diagnosisID;

        $treatmentID = Treatments::select('treatmentID')
                            ->where('diagnosisID', '=', $diagnosisID)
                            ->first();

        $treatment = Treatments::find($treatmentID['treatmentID']);

        $treatment->treatmentDescription = Input::get('treatment');
        $treatmentRecommendations = Input::get('recommendation');

        $treatment->save();

        $treatmentID = $treatment->treatmentID;

        for ($i=0; $i < sizeof(Input::get('_medArray')); $i++) { 

                $prescription = new Prescription;

                $prescription->treatmentID = $treatmentID;
                $prescription->medicineID = Input::get('_medArray')[$i]['medicineID'];
                $prescription->quantity = Input::get('_medArray')[$i]['medicineQuantity'];

                if (Input::get('isPrescribed')[$i] == 0) {
                    $prescription->isPrescribed = 0;
                    $prescription->isGiven = 1;
                }
                elseif (Input::get('isPrescribed')[$i] == 1) {
                    $prescription->isPrescribed = 1;
                    $prescription->isGiven = 0;
                }
                $prescription->dosage = Input::get('_medArray')[$i]['medicineDosage'];

                $prescription->medication = Input::get('_medArray')[$i]['medicineMedication'];

                $prescription->save();
            }

            for ($i=0; $i < sizeof(Input::get('_medPrescribedArray')); $i++) { 

                $prescription = new Prescription;

                $prescription->treatmentID = $treatmentID;
                $prescription->medicineID = Input::get('_medPrescribedArray')[$i]['medicineID'];
                $prescription->quantity = Input::get('_medPrescribedArray')[$i]['medicineQuantity'];

                if (Input::get('isPrescribed_other')[$i] == 0) {
                    $prescription->isPrescribed = 0;
                    $prescription->isGiven = 1;
                }
                elseif (Input::get('isPrescribed_other')[$i] == 1) {
                    $prescription->isPrescribed = 1;
                    $prescription->isGiven = 0;
                }
                $prescription->dosage = Input::get('_medPrescribedArray')[$i]['medicineDosage'];

                $prescription->medication = Input::get('_medPrescribedArray')[$i]['medicineMedication'];

                $prescription->save();
            }

            for ($i=0; $i < sizeof(Input::get('_suppArray')); $i++) { 
                
                $usedMedSupply = new UsedMedSupply;

                $usedMedSupply->treatmentID = $treatmentID;
                $usedMedSupply->medSupplyID = Input::get('_suppArray')[$i]['suppID'];
                $usedMedSupply->quantity = Input::get('_suppArray')[$i]['suppQuantity'];

                $usedMedSupply->save();
            }


        Session::flash('message', 'Successfully Saved!');
                
    }

    public function editPatientDiagnosesMChief($id)
    {
        $logReferralID = LogReferrals::select('logReferralID')
                            ->where('clinicLogID', '=', $id)
                            ->first();

        $diagnosis = Diagnoses::select('diagnosisID')
                            ->where('logReferralID', '=', $logReferralID['logReferralID'])
                            ->first();

        $edit = Diagnoses::find($diagnosis['diagnosisID']);

        $edit->diagnosisDescription = Input::get('diagnosis');

        $edit->save();

        $diagnosisID = $edit->diagnosisID;

        $treatmentID = Treatments::select('treatmentID')
                            ->where('diagnosisID', '=', $diagnosisID)
                            ->first();

        $treatment = Treatments::find($treatmentID['treatmentID']);

        $treatment->treatmentDescription = Input::get('treatment');
        $treatmentRecommendations = Input::get('recommendation');

        $treatment->save();

        $treatmentID = $treatment->treatmentID;

        for ($i=0; $i < count(Input::get('medicineID')); $i++) { 

            $prescription = new Prescription;

            $prescription->treatmentID = $treatmentID;
            $prescription->medicineID = Input::get('medicineID')[$i];
            $prescription->quantity = Input::get('medQuantity')[$i];

            if (Input::get('isPrescribed')[$i] == 0) {
                $prescription->isPrescribed = 0;
                $prescription->isGiven = 1;
            }
            elseif (Input::get('isPrescribed')[$i] == 1) {
                $prescription->isPrescribed = 1;
                $prescription->isGiven = 0;
            }
            $prescription->dosage = Input::get('dosage')[$i];

            $prescription->medication = Input::get('medication')[$i];

            $prescription->save();
        }

        for ($i=0; $i < count(Input::get('medSuppID')); $i++) { 
                
            $usedMedSupply = new UsedMedSupply;

            $usedMedSupply->treatmentID = $treatmentID;
            $usedMedSupply->medSupplyID = Input::get('medSuppID')[$i];
            $usedMedSupply->quantity = Input::get('medSuppQuantity')[$i];

            $usedMedSupply->save();
        }
        Session::flash('message', 'Successfully Saved!');
                
    }

    public function checkSymptomsAndPrescription($id)
    {
        $symptoms = ClinicLog::select('symptoms')
            ->where('clinicLogID', '=', $id)
            ->where('isDeleted', '=', 0)
            ->first();

        $prescription = Prescription::select('prescriptionID')
            ->orderBy('prescriptionID', 'desc')
            ->first();

        $treatment = Treatments::select('treatmentDescription')
            ->where('clinicLogID', '=', $id)
            ->first();

        return Response::json(array('symptoms' => $symptoms, 'prescription' => $prescription, 'treatment' => $treatment)); 
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
            
            $treatmentID;//variable for last inserted ID for treatments table

            $clinicLog = ClinicLog::find($id);

            $clinicLog->symptoms = $request->symptoms;

            $clinicLog->notes = $request->notes;

            $clinicLog->save();

            //Save to prescription
            $clinicLogID = $clinicLog->clinicLogID;
            
            if (!empty($request->attendingPhysician)) {
                $logReferral = LogReferrals::where('clinicLogID', '=', $id)->first();

                if (empty($logReferral)) {
                    $logReferral = new LogReferrals;

                    $logReferral->clinicLogID = $clinicLogID;
                    $logReferral->physicianID = $request->attendingPhysician;
                    $logReferral->logReferralStatus = 1;

                    $logReferral->save();
                }
                else{
                    $logReferral->clinicLogID = $clinicLogID;
                    $logReferral->physicianID = $request->attendingPhysician;
                    $logReferral->logReferralStatus = 1;

                    $logReferral->save();
                }
               
            }

            
            $treatment = Treatments::where('clinicLogID', '=', $id)->first();

            $treatment->recommendations = $request->recommendations;

            $treatment->save();
            $treatmentID = $treatment->treatmentID;

          
             for ($i=0; $i < sizeof(Input::get('_medArray')); $i++) { 

                $prescription = new Prescription;
                $prescription->treatmentID =  $treatmentID;
                $prescription->medicineID = Input::get('_medArray')[$i]['medicineID'];
                $prescription->quantity = Input::get('_medArray')[$i]['medicineQuantity'];
                $prescription->medication = Input::get('_medArray')[$i]['medicineMedication'];
                $prescription->isGiven = '1';
                $prescription->dosage = Input::get('_medArray')[$i]['medicineDosage'];

                $prescription->save();

            }

            for ($i=0; $i < sizeof(Input::get('_suppArray')); $i++) { 
                
                $usedMedSupply = new UsedMedSupply;

                $usedMedSupply->treatmentID = $treatmentID;
                $usedMedSupply->medSupplyID = Input::get('_suppArray')[$i]['suppID'];
                $usedMedSupply->quantity = Input::get('_suppArray')[$i]['suppQuantity'];

                $usedMedSupply->save();
            }

            Session::flash('message', 'Successfully Saved!');
            
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
        $clinicLog = ClinicLog::find($id);

        $clinicLog->isDeleted = 1;

        $clinicLog->save();

        return Response::json(array('message' => 'Successfully Deleted'));
    }

    public function passToPrescription(Request $request)
    {
        if (Input::get('hasRecord') == 1) {
            Session::put('request', $request->all());   
         
            if (Session::get('request.concern') == 0) {
                
                return Response::json(array('redirect' => '/nurse/log/patient/create'));
                
            }
            elseif (Session::get('request.concern') == 1) {

                return Response::json(array('redirect' => '/nurse/request/letter/certification'));
               
            }
        }

        elseif (Input::get('hasRecord') == 0) {
            Session::flash('patientNumber', $request->patientNumber);
            return Response::json(array('redirect' => '/register/patient'));
        }
 
    }

    public function requestLetterCertification()
    {
        $physicians = Accounts::where('position', '=', '5')
                        ->orWhere('position', '=', '3')
                        ->get();

        return view('nurse.C_nurse_patient_certification')->with(['physicians' => $physicians]);
    }

    public function consultation($id)
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
     
        return view('physician.C_physician_patients_diagnoses')->with(['clinicLogs' => $clinicLogs, 'attendingPhysicians' => $attendingPhysician, 'vitalSigns' => $vitalSigns, 'patient' => $patient, 'certifications' => $certifications]);
    }

    public function mChiefConsultation($id)
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
     
        return view('chief.C_mchief_patients_diagnoses')->with(['clinicLogs' => $clinicLogs, 'attendingPhysicians' => $attendingPhysician, 'vitalSigns' => $vitalSigns, 'patient' => $patient, 'certifications' => $certifications]);
    }

    public function showPhysicianPatientDiagnosis($id)
    {
        $diagnosis = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                    ->leftJoin('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                    ->join('diagnoses', 'diagnoses.diagnosisID', '=', 'treatments.diagnosisID')
                    ->select('diagnoses.*', 'patients.*', 'treatments.*', 'cliniclogs.*')
                    ->where('cliniclogs.clinicLogID', '=', $id)
                    ->first();

        $prescriptionInfo = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
            ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
            ->select('prescriptions.*', 'cliniclogs.*', 'medicines.genericName','medicines.brand','medicines.unit', 'treatments.*')
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

        $medicineList = Medicine::where('isDeleted', '=', 0)->get();
        $medicalSupplyList = MedicalSupply::where('isDeleted', '=', 0)->get();

        return view('physician.C_physician_referred_patient_diagnoses')->with(['diagnosis' => $diagnosis, 'prescriptionInfo' => $prescriptionInfo, 'usedMedSupply' => $usedMedSupply, 'medicineName' => $medicineList, 'medicalSupplyList' => $medicalSupplyList]);
    }

    public function showPhysicianPatientDiagnosisMChief($id)
    {
        $diagnosis = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                    ->leftJoin('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                    ->join('diagnoses', 'diagnoses.diagnosisID', '=', 'treatments.diagnosisID')
                    ->select('diagnoses.*', 'patients.*', 'treatments.*')
                    ->where('cliniclogs.clinicLogID', '=', $id)
                    ->first();

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

        $medicineList = Medicine::all();
        $medicalSupplyList = MedicalSupply::all();

        return view('chief.C_mchief_referred_patient_diagnoses')->with(['diagnosis' => $diagnosis, 'prescriptionInfo' => $prescriptionInfo, 'usedMedSupply' => $usedMedSupply, 'medicineName' => $medicineList, 'medicalSupplyList' => $medicalSupplyList]);
    }

    public function showPatientDiagnosis($id)
    {

        $diagnosis = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                    ->leftJoin('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                    ->join('diagnoses', 'diagnoses.diagnosisID', '=', 'treatments.diagnosisID')
                    ->select('diagnoses.*', 'patients.*', 'treatments.*', 'cliniclogs.*')
                    ->where('cliniclogs.clinicLogID', '=', $id)
                    ->first();

        $prescriptionInfo = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
            ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
            ->select('prescriptions.*', 'cliniclogs.*', 'medicines.genericName','medicines.brand','medicines.unit', 'treatments.*')
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

        $medicineList = Medicine::all();
        $medicalSupplyList = MedicalSupply::all();

        return view('physician.C_physician_patient_diagnoses')->with(['diagnosis' => $diagnosis, 'prescriptionInfo' => $prescriptionInfo, 'usedMedSupply' => $usedMedSupply, 'medicineName' => $medicineList, 'medicalSupplyList' => $medicalSupplyList]);
    }

    public function showPatientDiagnosisMChief($id)
    {

        $diagnosis = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                    ->leftJoin('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                    ->join('diagnoses', 'diagnoses.diagnosisID', '=', 'treatments.diagnosisID')
                    ->select('diagnoses.*', 'patients.*', 'treatments.*')
                    ->where('cliniclogs.clinicLogID', '=', $id)
                    ->first();

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

        $medicineList = Medicine::all();
        $medicalSupplyList = MedicalSupply::all();

        return view('chief.C_mchief_patient_diagnoses')->with(['diagnosis' => $diagnosis, 'prescriptionInfo' => $prescriptionInfo, 'usedMedSupply' => $usedMedSupply, 'medicineName' => $medicineList, 'medicalSupplyList' => $medicalSupplyList]);
    }

    public function consultationPhysician($id)
    {
    
        $clinicLogs = ClinicLog::join('users', 'users.id', '=', 'cliniclogs.nurseID')
                        ->join('logreferrals', 'logreferrals.clinicLogID', '=', 'cliniclogs.clinicLogID')
                        ->select('cliniclogs.*', 'users.*', 'logreferrals.*')
                        ->where('cliniclogs.patientID', '=', $id)
                        ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
                        ->where('logreferrals.isDeleted', '=', '0')
                        ->orderBy('cliniclogs.clinicLogDateTime', 'desc')
                        ->get();

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

        $patient = Patient::find($id); 

        $vitalSigns = VitalSigns::where('isDeleted', '=', '0')->get();

        $attendingPhysician = Accounts::where('isActive', '=', '1')->get();
        
        return view('physician.C_physician_referred_patient_diagnosis')->with(['clinicLogs' => $clinicLogs, 'attendingPhysicians' => $attendingPhysician, 'vitalSigns' => $vitalSigns, 'patient' => $patient, 'certifications' => $certifications]);
    }

    public function consultationPhysicianMChief($id)
    {
    
        $clinicLogs = ClinicLog::join('users', 'users.id', '=', 'cliniclogs.nurseID')
                        ->join('logreferrals', 'logreferrals.clinicLogID', '=', 'cliniclogs.clinicLogID')
                        ->select('cliniclogs.*', 'users.*', 'logreferrals.*')
                        ->where('cliniclogs.patientID', '=', $id)
                        ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
                        ->where('logreferrals.isDeleted', '=', '0')
                        ->orderBy('cliniclogs.clinicLogDateTime', 'desc')
                        ->get();

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

        $patient = Patient::find($id); 

        $vitalSigns = VitalSigns::where('isDeleted', '=', '0')->get();

        $attendingPhysician = Accounts::where('isActive', '=', '1')->get();
        
        return view('chief.C_mchief_referred_patient_diagnosis')->with(['clinicLogs' => $clinicLogs, 'attendingPhysicians' => $attendingPhysician, 'vitalSigns' => $vitalSigns, 'patient' => $patient, 'certifications' => $certifications]);
    }

    public function timeOut(Request $request,$id)
    {

        try {

            $timeOut = ClinicLog::find($id);

            $time = Input::get('timeOut'); //$request->input('')
            $date = date('y-m-d H:i:s', strtotime($time));
            $timeOut->timeOut = $date;

            $timeOut->save();

            return Response::json(array('message' => 'Success!'));

        } catch (Exception $e) {
            
        }
    }

    public function printMedicalLog(){
        $clinicLogs = ClinicLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'M')
                        ->orderBy('cliniclogs.clinicLogID', 'DESC')
                        ->get();

        $pdf = PDF::loadView('reports.medical_log', compact('clinicLogs'))->setPaper('legal', 'landscape');
        return $pdf->stream('reports.medical_log');

        //return view('reports.medical_log')->with(['clinicLogs' => $clinicLogs]);
    }
   
}
