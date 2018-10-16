<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Diagnoses;

use App\Treatments;

use App\ClinicLog;

use App\LogReferrals;

use App\Prescription;

use App\OutsideReferrals;

use App\UsedMedSupply;

use App\Appointment;

use Session;

use Illuminate\Support\Facades\Input;

class DiagnosesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $consultInfo = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
        //             ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
        //             ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
        //             ->select('patients.*', 'treatments.*', 'logreferrals.*', 'cliniclogs.*')
        //             ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
        //             ->groupBy('patients.patientID')
        //             ->get();
        // $diagnosed = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
        //             ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
        //             ->join('diagnoses', 'diagnoses.logReferralID', '=', 'Logreferrals.logReferralID')
        //             ->select('diagnoses.*')
        //             ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
        //             ->get();
        $diagnosed = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                        ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
                        ->groupBy('patients.patientID')
                        ->get();

        return view('physician.C_physician_patient_record')->with(['diagnoses' => $diagnosed]);
    }

    public function indexOfMChief()
    {
        // $consultInfo = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
        //             ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
        //             ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
        //             ->select('patients.*', 'treatments.*', 'logreferrals.*', 'cliniclogs.*')
        //             ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
        //             ->groupBy('patients.patientID')
        //             ->get();
        // $diagnosed = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
        //             ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
        //             ->join('diagnoses', 'diagnoses.logReferralID', '=', 'Logreferrals.logReferralID')
        //             ->select('diagnoses.*')
        //             ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
        //             ->get();
        $diagnosed = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                        ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
                        ->groupBy('patients.patientID')
                        ->get();

        return view('chief.C_mchief_patient_record')->with(['diagnoses' => $diagnosed]);
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

            $clinicLog = ClinicLog::find($request->clinicLogID);

            $clinicLog->symptoms = $request->symptoms;

            $clinicLog->save();


            $diagnosis = new Diagnoses;

            $diagnosis->logReferralID = Input::get('logReferralID');
            $diagnosis->diagnosisDescription = Input::get('diagnosis');

            $diagnosis->save();

            $diagnosisID = $diagnosis->diagnosisID;

            //Update the diagnosis ID of treatment
            $treatment = Treatments::find(Input::get('treatmentID'));

            $treatment->diagnosisID = $diagnosisID;
            $treatment->recommendations = Input::get('recommendation');
            $treatment->treatmentDescription = Input::get('treatment');

            $treatment->save();

            //Update LogReferral Status
            $logReferral = LogReferrals::find(Input::get('logReferralID'));

            $logReferral->logReferralStatus = 2;
            $logReferral->notif = 2;

            $logReferral->save();

            for ($i=0; $i < sizeof(Input::get('_medArray')); $i++) { 

                $prescription = new Prescription;

                $prescription->treatmentID = Input::get('treatmentID');
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

                $prescription->givenBy = Session::get('accountInfo.id');

                $prescription->save();
            }

            for ($i=0; $i < sizeof(Input::get('_medPrescribedArray')); $i++) { 

                $prescription = new Prescription;

                $prescription->treatmentID = Input::get('treatmentID');
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

                $prescription->givenBy = Session::get('accountInfo.id');

                $prescription->save();
            }

            for ($i=0; $i < sizeof(Input::get('_suppArray')); $i++) { 
                
                $usedMedSupply = new UsedMedSupply;

                $usedMedSupply->treatmentID = Input::get('treatmentID');
                $usedMedSupply->medSupplyID = Input::get('_suppArray')[$i]['suppID'];
                $usedMedSupply->quantity = Input::get('_suppArray')[$i]['suppQuantity'];

                $usedMedSupply->save();
            }


            if ($request->nextConsultation) {
                $appointment = new Appointment;

                $appointment->clinicLogID = $request->clinicLogID;
                $appointment->logReferralID = Input::get('logReferralID');
                $appointment->appointmentType = 1;
                $appointment->appointmentDate = $request->nextConsultation;

                $appointment->save();
            }

            $outsideReferral = new OutsideReferrals;

            $outsideReferral->treatmentID = $request->treatmentID;
            $outsideReferral->referralDescription = $request->remark;
            $outsideReferral->referralDate = date('y-m-d');
            $outsideReferral->referTo = $request->referTo;
            $outsideReferral->referToOthers = $request->referToOthers;
            $outsideReferral->chestXrayPA = $request->chestXrayPA;
            $outsideReferral->chestXrayAP_LAT = $request->chestXrayAP_LAT;
            $outsideReferral->electrocardiography = $request->electrocardiography;
            $outsideReferral->urinalysis = $request->urinalysis;
            $outsideReferral->fecalysis = $request->fecalysis;
            $outsideReferral->cbc = $request->cbc;
            $outsideReferral->fbs = $request->fbs;
            $outsideReferral->bun = $request->bun;
            $outsideReferral->creatinine = $request->creatinine;
            $outsideReferral->cholesterol = $request->cholesterol;
            $outsideReferral->triglycerides = $request->triglycerides;
            $outsideReferral->hdl = $request->hdl;
            $outsideReferral->ldl = $request->ldl;
            $outsideReferral->uricAcid = $request->uricAcid;
            $outsideReferral->sgpt = $request->sgpt;
            $outsideReferral->otherRequest = $request->otherRequest;

            $outsideReferral->save();

            // $appointment = Appointment::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
            //                         ->join('logreferrals', 'logreferrals.logReferralID', '=', 'appointments.logReferralID')
            //                         ->where('cliniclogs.patientID', '=',  $request->patientID)
            //                         ->where('isAppointed', '=', '0')
            //                         ->where('appointmentDate', '=', date('y-m-d'))
            //                         ->first();

            // $updateAppointment = Appointment::find($appointment['appointmentID']);

            // $updateAppointment->isAppointed = 2;

            // $updateAppointment->save();

            Session::flash('message', 'Successfully Saved!');

        } catch (Exception $e) {
            
        }
    }

    public function mChiefStore(Request $request)
    {
        try {

            $clinicLog = ClinicLog::find($request->clinicLogID);

            $clinicLog->symptoms = $request->symptoms;

            $clinicLog->save();


            $diagnosis = new Diagnoses;

            $diagnosis->logReferralID = Input::get('logReferralID');
            $diagnosis->diagnosisDescription = Input::get('diagnosis');

            $diagnosis->save();

            $diagnosisID = $diagnosis->diagnosisID;

            //Update the diagnosis ID of treatment
            $treatment = Treatments::find(Input::get('treatmentID'));

            $treatment->diagnosisID = $diagnosisID;
            $treatment->recommendations = Input::get('recommendation');
            $treatment->treatmentDescription = Input::get('treatment');

            $treatment->save();

            //Update LogReferral Status
            $logReferral = LogReferrals::find(Input::get('logReferralID'));

            $logReferral->logReferralStatus = 2;
            $logReferral->notif = 2;

            $logReferral->save();

            for ($i=0; $i < sizeof(Input::get('_medArray')); $i++) { 

                $prescription = new Prescription;

                $prescription->treatmentID = Input::get('treatmentID');
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

                $prescription->givenBy = Session::get('accountInfo.id');

                $prescription->save();
            }

            for ($i=0; $i < sizeof(Input::get('_medPrescribedArray')); $i++) { 

                $prescription = new Prescription;

                $prescription->treatmentID = Input::get('treatmentID');
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

                $prescription->givenBy = Session::get('accountInfo.id');

                $prescription->save();
            }

            for ($i=0; $i < sizeof(Input::get('_suppArray')); $i++) { 
                
                $usedMedSupply = new UsedMedSupply;

                $usedMedSupply->treatmentID = Input::get('treatmentID');
                $usedMedSupply->medSupplyID = Input::get('_suppArray')[$i]['suppID'];
                $usedMedSupply->quantity = Input::get('_suppArray')[$i]['suppQuantity'];

                $usedMedSupply->save();
            }


            if ($request->nextConsultation) {
                $appointment = new Appointment;

                $appointment->clinicLogID = $request->clinicLogID;
                $appointment->logReferralID = Input::get('logReferralID');
                $appointment->appointmentType = 1;
                $appointment->appointmentDate = $request->nextConsultation;

                $appointment->save();
            }

             $outsideReferral = new OutsideReferrals;

            $outsideReferral->treatmentID = $request->treatmentID;
            $outsideReferral->referralDescription = $request->remark;
            $outsideReferral->referralDate = date('y-m-d');
            $outsideReferral->referTo = $request->referTo;
            $outsideReferral->referToOthers = $request->referToOthers;
            $outsideReferral->chestXrayPA = $request->chestXrayPA;
            $outsideReferral->chestXrayAP_LAT = $request->chestXrayAP_LAT;
            $outsideReferral->electrocardiography = $request->electrocardiography;
            $outsideReferral->urinalysis = $request->urinalysis;
            $outsideReferral->fecalysis = $request->fecalysis;
            $outsideReferral->cbc = $request->cbc;
            $outsideReferral->fbs = $request->fbs;
            $outsideReferral->bun = $request->bun;
            $outsideReferral->creatinine = $request->creatinine;
            $outsideReferral->cholesterol = $request->cholesterol;
            $outsideReferral->triglycerides = $request->triglycerides;
            $outsideReferral->hdl = $request->hdl;
            $outsideReferral->ldl = $request->ldl;
            $outsideReferral->uricAcid = $request->uricAcid;
            $outsideReferral->sgpt = $request->sgpt;
            $outsideReferral->otherRequest = $request->otherRequest;

            $outsideReferral->save();

            Session::flash('message', 'Successfully Saved!');

        } catch (Exception $e) {
            
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
}
