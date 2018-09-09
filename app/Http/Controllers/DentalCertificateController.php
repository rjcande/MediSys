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
use PDF;

class DentalCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show()
    {
        $certDate = Input::get('certDate');
        $certPatientName = Input::get('certPatientName');
        $certDentalExam = Input::get('certDentalExam');
        $certOralProphylaxis = Input::get('certOralProphylaxis');
        $certRestorationChk = Input::get('certRestorationChk');
        $certRestorationTxt = Input::get('certRestorationTxt');
        $certExtractionChk = Input::get('certExtractionChk');
        $certExtractionTxt = Input::get('certExtractionTxt');
        $certOthersChk = Input::get('certOthersChk');
        $certOthersTextArea = Input::get('certOthersTextArea');
        $certRecommendations = Input::get('certRecommendations');
        $certDentistSigned = Input::get('certDentistSigned');

        $pdf = PDF::loadview('dentist.dental_certificate', compact('certDate', 'certPatientName', 'certDentalExam', 'certOralProphylaxis', 'certRestorationChk', 'certRestorationTxt', 'certExtractionChk', 'certExtractionTxt', 'certOthersChk', 'certOthersTextArea', 'certRecommendations', 'certDentistSigned'));
        return $pdf->stream('dental_certificate.pdf');
    }
    public function dchiefShow()
    {
        $certDate = Input::get('certDate');
        $certPatientName = Input::get('certPatientName');
        $certDentalExam = Input::get('certDentalExam');
        $certOralProphylaxis = Input::get('certOralProphylaxis');
        $certRestorationChk = Input::get('certRestorationChk');
        $certRestorationTxt = Input::get('certRestorationTxt');
        $certExtractionChk = Input::get('certExtractionChk');
        $certExtractionTxt = Input::get('certExtractionTxt');
        $certOthersChk = Input::get('certOthersChk');
        $certOthersTextArea = Input::get('certOthersTextArea');
        $certRecommendations = Input::get('certRecommendations');
        $certDentistSigned = Input::get('certDentistSigned');

        $pdf = PDF::loadview('dchief.dental_certificate', compact('certDate', 'certPatientName', 'certDentalExam', 'certOralProphylaxis', 'certRestorationChk', 'certRestorationTxt', 'certExtractionChk', 'certExtractionTxt', 'certOthersChk', 'certOthersTextArea', 'certRecommendations', 'certDentistSigned'));
        return $pdf->stream('dental_certificate.pdf');
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
    public function showOutsideRefer()
    {   
        $outsideReferrals = new OutsideReferrals;

        $referral = Input::get('addressedDentist');
        $outsideReferrals->referToOthers = $referral;
        $remarks = Input::get('remarks');
        $outsideReferrals->dentistRemarks = $remarks;
        $date = date('y-m-d');
        $outsideReferrals->referralDate = $date;
        $patientName = Session::get('patientInfo.patientName');
        $lastName = Session::get('accountInfo.lastName');
        $firstName = Session::get('accountInfo.firstName');
        $middleName = Session::get('accountInfo.middleName');
        $quantifier = Session::get('accountInfo.quantifier');

        $outsideReferrals->save();

        // dd($referral);

        $pdf = PDF::loadview('dentist.dental_outside_refer', compact('referral', 'remarks', 'date', 'patientName', 'lastName', 'firstName', 'middleName', 'quantifier'));
        return $pdf->stream('dental_outside_refer.pdf');
    }
    public function dchiefShowOutsideRefer()
    {   
        $outsideReferrals = new OutsideReferrals;

        $referral = Input::get('addressedDentist');
        $outsideReferrals->referToOthers = $referral;
        $remarks = Input::get('remarks');
        $outsideReferrals->dentistRemarks = $remarks;
        $date = date('y-m-d');
        $outsideReferrals->referralDate = $date;
        $patientName = Session::get('patientInfo.patientName');
        $lastName = Session::get('accountInfo.lastName');
        $firstName = Session::get('accountInfo.firstName');
        $middleName = Session::get('accountInfo.middleName');
        $quantifier = Session::get('accountInfo.quantifier');

        $outsideReferrals->save();

        // dd($referral);

        $pdf = PDF::loadview('dchief.dental_outside_refer', compact('referral', 'remarks', 'date', 'patientName', 'lastName', 'firstName', 'middleName', 'quantifier'));
        return $pdf->stream('dental_outside_refer.pdf');
    }

    public function generatePdf($id)
    {
        $dentalLogInfo = DentalLog::join('patients','patients.patientID', '=','cliniclogs.patientID')
                                  ->select('cliniclogs.*', 'patients.*')
                                  ->where('cliniclogs.isDeleted', '=', '0')
                                  ->where('cliniclogs.clinicLogID', '=', $id)
                                  ->first();

        // dd($dentalLogInfo);

        $prescribed = DentalLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                                ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
                                ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                                ->select('prescriptions.*', 'cliniclogs.*', 'medicines.*', 'treatments.*')
                                ->where('prescriptions.isDeleted' , '=', '0')
                                ->where('treatments.clinicLogID', '=', $id)
                                ->get();


        $pdf = PDF::loadView('dentist.prescription-pdf', compact('prescribed', 'dentalLogInfo'));
        return $pdf->stream('dentist.prescription-pdf');

    }
    public function dchiefGeneratePdf($id)
    {
        $dentalLogInfo = DentalLog::join('patients','patients.patientID', '=','cliniclogs.patientID')
                                  ->select('cliniclogs.*', 'patients.*')
                                  ->where('cliniclogs.isDeleted', '=', '0')
                                  ->where('cliniclogs.clinicLogID', '=', $id)
                                  ->first();

        // dd($dentalLogInfo);

        $prescribed = DentalLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                                ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
                                ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                                ->select('prescriptions.*', 'cliniclogs.*', 'medicines.*', 'treatments.*')
                                ->where('prescriptions.isDeleted' , '=', '0')
                                ->where('treatments.clinicLogID', '=', $id)
                                ->get();


        $pdf = PDF::loadView('dchief.prescription-pdf', compact('prescribed', 'dentalLogInfo'));
        return $pdf->stream('dchief.prescription-pdf');

    }

}
