<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\OutsideReferrals;

use App\ClinicLog;

use App\Treatments;

use PDF;

use Response;

class OutsideReferralsController extends Controller
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
        try {

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

            return Response::json(array('message' => 'Success'));

        } catch (Exception $e) {
            
        }
        
    }

    public function mChiefStore(Request $request)
    {
        try {

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

            return Response::json(array('message' => 'Success'));

        } catch (Exception $e) {
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    public function showPhysicianReferral($id)
    {
        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('patients.*','cliniclogs.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $treatment = Treatments::where('clinicLogID', '=', $id)->first();

        $outsideReferralDetails = OutsideReferrals::where('treatmentID', '=', $treatment['treatmentID'])->first();
        return view('physician.C_physician_referred_patient_referrals')->with(['clinicLogInfo' => $clinicLogInfo, 'treatment' => $treatment, 'details' => $outsideReferralDetails]);
    }

    public function mchiefPatientReferrals($id)
    {
        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('patients.*','cliniclogs.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $treatment = Treatments::where('clinicLogID', '=', $id)->first();

        $outsideReferralDetails = OutsideReferrals::where('treatmentID', '=', $treatment['treatmentID'])->first();

        return view('chief.C_mchief_patient_referrals')->with(['clinicLogInfo' => $clinicLogInfo, 'treatment' => $treatment, 'details' => $outsideReferralDetails]);
    }

    public function showPhysicianReferralMChief($id)
    {
        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('patients.*','cliniclogs.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $treatment = Treatments::where('clinicLogID', '=', $id)->first();

        $outsideReferralDetails = OutsideReferrals::where('treatmentID', '=', $treatment['treatmentID'])->first();

        return view('chief.C_mchief_referred_patient_referrals')->with(['clinicLogInfo' => $clinicLogInfo, 'treatment' => $treatment, 'details' => $outsideReferralDetails]);
    }

    public function showReferral($id)
    {
        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('patients.*','cliniclogs.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $treatment = Treatments::where('clinicLogID', '=', $id)->first();

        $outsideReferralDetails = OutsideReferrals::where('treatmentID', '=', $treatment['treatmentID'])->first();

        return view('physician.C_physician_patient_referrals')->with(['clinicLogInfo' => $clinicLogInfo, 'treatment' => $treatment, 'details' => $outsideReferralDetails]);
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

        $outsideReferral = OutsideReferrals::find($id);
        $outsideReferral->referralDescription = $request->remark;
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

        return Response::json(array('message' => 'Success'));

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
    public function generateOutsideReferral($id, $patientName)
    {
       $outsideReferral = OutsideReferrals::find($id);
       $name = $patientName;
       $pdf =  PDF::loadview('reports.outside_referral', compact('outsideReferral', 'name'));
       return $pdf->stream('reports.outside_referral');
    }
}
