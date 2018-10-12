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

        $treatment = new Treatment;

        $treatment->dentalExamination = $certDentalExam;
        $treatment->oralProphylaxis = $certOralProphylaxis;
        $treatment->restoration = $certRestorationChk;
        $treatment->restorationTooth = $certRestorationTxt;
        $treatment->extraction = $certExtractionChk;
        $treatment->extractionTooth = $certExtractionTxt;
        $treatment->othersTreatment = $certOthersChk;
        $treatment->treatmentDescription = $certOthersChk;
        $treatment->recommendations = $certRecommendations;

        $treatment->save();

        $pdf = PDF::loadview('dentist.printables.dental_certificate', compact('certDate', 'certPatientName', 'certDentalExam', 'certOralProphylaxis', 'certRestorationChk', 'certRestorationTxt', 'certExtractionChk', 'certExtractionTxt', 'certOthersChk', 'certOthersTextArea', 'certRecommendations', 'certDentistSigned'));
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

        $treatment = new Treatment;

        $treatment->dentalExamination = $certDentalExam;
        $treatment->oralProphylaxis = $certOralProphylaxis;
        $treatment->restoration = $certRestorationChk;
        $treatment->restorationTooth = $certRestorationTxt;
        $treatment->extraction = $certExtractionChk;
        $treatment->extractionTooth = $certExtractionTxt;
        $treatment->othersTreatment = $certOthersChk;
        $treatment->treatmentDescription = $certOthersChk;
        $treatment->recommendations = $certRecommendations;

        $treatment->save();

        $pdf = PDF::loadview('dchief.printables.dental_certificate', compact('certDate', 'certPatientName', 'certDentalExam', 'certOralProphylaxis', 'certRestorationChk', 'certRestorationTxt', 'certExtractionChk', 'certExtractionTxt', 'certOthersChk', 'certOthersTextArea', 'certRecommendations', 'certDentistSigned'));
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

        $pdf = PDF::loadview('dentist.printables.dental_outside_refer', compact('referral', 'remarks', 'date', 'patientName', 'lastName', 'firstName', 'middleName', 'quantifier'));
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

        $pdf = PDF::loadview('dchief.printables.dental_outside_refer', compact('referral', 'remarks', 'date', 'patientName', 'lastName', 'firstName', 'middleName', 'quantifier'));
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


        $pdf = PDF::loadView('dentist.printables.prescription-pdf', compact('prescribed', 'dentalLogInfo'));
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


        $pdf = PDF::loadView('dchief.printables.prescription-pdf', compact('prescribed', 'dentalLogInfo'));
        return $pdf->stream('dchief.prescription-pdf');

    }

    public function generateDentalLogTable(Request $request)
    {
        $date = $request->all();
        if ($request->daily == 1 && $request->yearly == '' && $request->monthly == '' && $request->weekly == '') {
            $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'D')
                        ->whereDate('cliniclogs.clinicLogDateTime', '=', $request->date)
                        ->orderBy('cliniclogs.clinicLogID', 'ASC')
                        ->get();
        }
        if ($request->daily == '' && $request->yearly == '' && $request->monthly == '' && $request->weekly == 1){
            $from = $request->weekFrom;
            $to = $request->weekTo. ' 23:59:59';
            $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'D')
                        ->whereBetween('cliniclogs.clinicLogDateTime', [$from, $to])
                        ->orderBy('cliniclogs.clinicLogID', 'ASC')
                        ->get();
        }
        if ($request->monthly == 1 && $request->yearly == '' && $request->daily == '' && $request->weekly == '') {
            $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'D')
                        ->whereMonth('cliniclogs.clinicLogDateTime', '=', $request->month)
                        ->whereYear('cliniclogs.clinicLogDateTime', '=', $request->year_month)
                        ->orderBy('cliniclogs.clinicLogID', 'ASC')
                        ->get();
        }
        if ($request->yearly == 1 && $request->monthly == '' && $request->daily == '' && $request->weekly == '') {
            $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'D')
                        ->whereYear('cliniclogs.clinicLogDateTime', '=', $request->year)
                        ->orderBy('cliniclogs.clinicLogID', 'ASC')
                        ->get();
        }

        if ($request->daily == 1 && $request->monthly == 1 && $request->yearly == 1) {
     
            $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'D')
                        ->where(function($query) use ($request){
                            $query->WhereDate('cliniclogs.clinicLogDateTime', '=', $request->date)
                            ->orWhereMonth('cliniclogs.clinicLogDateTime', '=', $request->month)
                            ->whereYear('cliniclogs.clinicLogDateTime', '=', $request->year_month)
                            ->orwhereYear('cliniclogs.clinicLogDateTime', '=', $request->year);
                        })
                        ->orderBy('cliniclogs.clinicLogID', 'ASC')
                        ->get();
        }
        
        if ($request->daily == 1 && $request->monthly == 1 && $request->yearly == '') {
            $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'D')
                        ->where(function($query) use ($request){
                            $query->WhereDate('cliniclogs.clinicLogDateTime', '=', $request->date)
                            ->orWhereMonth('cliniclogs.clinicLogDateTime', '=', $request->month)
                            ->whereYear('cliniclogs.clinicLogDateTime', '=', $request->year_month);
                        })
                        ->orderBy('cliniclogs.clinicLogID', 'ASC')
                        ->get();
        }    

        if ($request->monthly == 1 && $request->yearly == 1 && $request->daily == '') {
            $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'D')
                        ->where(function($query) use ($request){
                            $query->WhereMonth('cliniclogs.clinicLogDateTime', '=', $request->month)
                            ->whereYear('cliniclogs.clinicLogDateTime', '=', $request->year_month)
                            ->orwhereYear('cliniclogs.clinicLogDateTime', '=', $request->year);
                        })
                        ->orderBy('cliniclogs.clinicLogID', 'ASC')
                        ->get();
        }

        if ($request->monthly == '' && $request->yearly == 1 && $request->daily == 1) {
            $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('patients.*', 'cliniclogs.*')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->where('cliniclogs.clinicType','=', 'D')
                        ->where(function($query) use ($request){
                            $query->WhereDate('cliniclogs.clinicLogDateTime', '=', $request->date)
                            ->orwhereYear('cliniclogs.clinicLogDateTime', '=', $request->year);
                        })
                        ->orderBy('cliniclogs.clinicLogID', 'ASC')
                        ->get();
        }  
        if(Session::get('accountInfo.position') == 4){
            $pdf = PDF::loadView('dentist.printables.dentalLogTable-pdf', compact('dentalLogs'));
            $pdf->setPaper('legal', 'landscape');
            return $pdf->stream('dentist.dentalLogtable-pdf');
        }
        else if(Session::get('accountInfo.position') == 2){
            $pdf = PDF::loadView('dentist.printables.dentalLogTable-pdf', compact('dentalLogs'));
            $pdf->setPaper('legal', 'landscape');
            return $pdf->stream('dchief.dentalLogtable-pdf');
        }
    }

    public function viewMoreCertificate($id)
    {
        $treatments = Treatment::find($id);
        $dentalLogs = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                            //    ->join('users', 'users.id', '=', 'cliniclogs.dentistID')
                               ->select('cliniclogs.*', 'patients.*')
                               ->where('cliniclogs.clinicLogID', '=', $treatments->clinicLogID)
                               ->first();
        $dentist = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                            ->select('users.*')
                            ->where('cliniclogs.clinicLogID', '=', $treatments->clinicLogID)
                            ->first();

        $certDate = date("F d, Y", strtotime($treatments['created_at'])) ;
        $certPatientName = $dentalLogs['lastName'] . ", " . $dentalLogs['firstName'] . " " . $dentalLogs['middleName'] . " " . $dentalLogs['quantifier'];
        $certDentalExam = $treatments['dentalExamination'];
        $certOralProphylaxis = $treatments['oralProphylaxis'];
        $certRestorationChk = $treatments['restoration'];
        $certRestorationTxt = $treatments['restorationTooth'];
        $certExtractionChk = $treatments['extraction'];
        $certExtractionTxt = $treatments['extractionTooth'];
        $certOthersChk = $treatments['othersTreatment'];
        $certOthersTextArea = $treatments['treatmentDescription'];
        $certRecommendations = $treatments['recommendations'];
        $certDentistSigned = $dentist['lastName'] . ", " . $dentist['firstName'] . " " . $dentist['middleName'] . " " . $dentist['quantifier'];

        if(Session::get('accountInfo.position') == 4){
            $pdf = PDF::loadview('dentist.printables.dental_certificate', compact('certDate', 'certPatientName', 'certDentalExam', 'certOralProphylaxis', 'certRestorationChk', 'certRestorationTxt', 'certExtractionChk', 'certExtractionTxt', 'certOthersChk', 'certOthersTextArea', 'certRecommendations', 'certDentistSigned'));
            return $pdf->stream('dental_certificate.pdf');
        }
        else if(Session::get('accountInfo.position') == 2){
            $pdf = PDF::loadview('dchief.printables.dental_certificate', compact('certDate', 'certPatientName', 'certDentalExam', 'certOralProphylaxis', 'certRestorationChk', 'certRestorationTxt', 'certExtractionChk', 'certExtractionTxt', 'certOthersChk', 'certOthersTextArea', 'certRecommendations', 'certDentistSigned'));
            return $pdf->stream('dental_certificate.pdf');
        }
    }

    public function generatePatientList(Request $request)
    {
        // $patientRecords = Patient::select('patients.*')
        //                         ->where('isDeleted', '=', '0')
        //                         ->get();

        // if ($request->daily == 1 && $request->yearly == '' && $request->monthly == '') {
        //     $patientRecords = Patient::select('patients.*')
        //                 ->whereDate('patients.created_at', '=', $request->date)
        //                 ->orderBy('patients.patientID', 'DESC')
        //                 ->get();

        // }

        if ($request->daily == 1 && $request->yearly == '' && $request->monthly == '' && $request->weekly == ''){
            $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->whereDate('created_at', '=', $request->date)
                       ->orderBy('patientID', 'DESC')
                       ->get();
            $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->whereDate('created_at', '=', $request->date)
                       ->orderBy('patientID', 'DESC')
                       ->get();

            $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->whereDate('created_at', '=', $request->date)
                       ->orderBy('patientID', 'DESC')
                       ->get();        

            $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->whereDate('created_at', '=', $request->date)
                       ->orderBy('patientID', 'DESC')
                       ->get();
        }
        if ($request->daily == '' && $request->yearly == '' && $request->monthly == '' && $request->weekly == 1){
            $from = $request->weekFrom;
            $to = $request->weekTo. ' 23:59:59';
            $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->whereBetween('created_at', [$from, $to])
                       ->orderBy('patientID', 'DESC')
                       ->get();
            $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->whereBetween('created_at', [$from, $to])
                       ->orderBy('patientID', 'DESC')
                       ->get();

            $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->whereBetween('created_at', [$from, $to])
                       ->orderBy('patientID', 'DESC')
                       ->get();        

            $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->whereBetween('created_at', [$from, $to])
                       ->orderBy('patientID', 'DESC')
                       ->get();
        }

        if ($request->monthly == 1 && $request->yearly == '' && $request->daily == '' && $request->weekly == ''){
             $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->whereMonth('created_at', '=', $request->month)
                       ->whereYear('created_at', '=', $request->year_month)
                       ->orderBy('patientID', 'DESC')
                       ->get();
            $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->whereMonth('created_at', '=', $request->month)
                       ->whereYear('created_at', '=', $request->year_month)
                       ->orderBy('patientID', 'DESC')
                       ->get();

            $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->whereMonth('created_at', '=', $request->month)
                       ->whereYear('created_at', '=', $request->year_month)
                       ->orderBy('patientID', 'DESC')
                       ->get();        

            $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->whereMonth('created_at', '=', $request->month)
                       ->whereYear('created_at', '=', $request->year_month)
                       ->orderBy('patientID', 'DESC')
                       ->get();
        }
        if ($request->yearly == 1 && $request->monthly == '' && $request->daily == '' && $request->weekly == ''){
            $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->whereYear('created_at', '=', $request->year)
                       ->orderBy('patientID', 'DESC')
                       ->get();
           
            $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->whereYear('created_at', '=', $request->year)
                       ->orderBy('patientID', 'DESC')
                       ->get();

            $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->whereYear('created_at', '=', $request->year)
                       ->orderBy('patientID', 'DESC')
                       ->get();        

            $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->whereYear('created_at', '=', $request->year)
                       ->orderBy('patientID', 'DESC')
                       ->get();
        }
        if ($request->daily == 1 && $request->monthly == 1 && $request->yearly == 1) {
            $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month)
                            ->orWhereYear('created_at', '=', $request->year);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();
            $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month)
                            ->orWhereYear('created_at', '=', $request->year);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();

            $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month)
                            ->orWhereYear('created_at', '=', $request->year);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();        

            $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month)
                            ->orWhereYear('created_at', '=', $request->year);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();
        }
        if ($request->daily == 1 && $request->monthly == 1 && $request->yearly == ''){
            $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();
            $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();

            $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();        

            $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();
        }
        if ($request->monthly == 1 && $request->yearly == 1 && $request->daily == ''){
            $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->where(function($query) use ($request){
                            $query->whereYear('created_at', '=', $request->year)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();
            $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->where(function($query) use ($request){
                            $query->whereYear('created_at', '=', $request->year)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();

            $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->where(function($query) use ($request){
                            $query->whereYear('created_at', '=', $request->year)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();        

            $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->where(function($query) use ($request){
                            $query->whereYear('created_at', '=', $request->year)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();
        }
        if ($request->monthly == '' && $request->yearly == 1 && $request->daily == 1){
            $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereYear('created_at', '=', $request->year);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();
            $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereYear('created_at', '=', $request->year);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();

            $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereYear('created_at', '=', $request->year);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();        

            $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->where(function($query) use ($request){
                            $query->whereDate('created_at', '=', $request->date)
                            ->orWhereYear('created_at', '=', $request->year);
                       })
                       ->orderBy('patientID', 'DESC')
                       ->get();
        }
        
        if(Session::get('accountInfo.position') == 4){
            $pdf = PDF::loadview('dentist.printables.patientList-pdf', compact('patientListStudent', 'patientListAdmin', 'patientListFaculty', 'patientListVisitor'));
            $pdf->setPaper('legal', 'landscape');
            return $pdf->stream('patientList-pdf');
        }
        elseif(Session::get('accountInfo.position') == 2){
            $pdf = PDF::loadview('dchief.printables.patientList-pdf', compact('patientRecords'));
            $pdf->setPaper('legal', 'landscape');
            return $pdf->stream('patientList-pdf');
        }
    }

    public function generateMedicineList(Request $request)
    {
        // $medicineList = Medicine::select('medicines.*')
        //                         ->where([['medicines.isDeleted', '<>', '1'], ['medicines.medType', '=', 'D']])
        //                         ->get();

        if ($request->monthly == 1 && $request->yearly == 1) {
     
            $medicineList = Medicine::select('medicines.*')
                                    ->where('medicines.isDeleted', '=', '0')
                                    ->where('medicines.medType','=', 'd')
                                    ->where(function($query) use ($request){
                                        $query->whereMonth('medicines.created_at', '=', $request->mon)
                                        ->whereYear('medicines.created_at', '=', $request->yearMonth)
                                        ->orwhereYear('medicines.created_at', '=', $request->year);
                                    })
                                    ->orderBy('medicines.medicineID', 'DESC')
                                    ->get();
            
        }
        
        if ($request->monthly == 1 && $request->yearly == '') {
            $medicineList = Medicine::select('medicines.*')
                                        ->where('medicines.isDeleted', '=', '0')
                                        ->where('medicines.medType','=', 'd')
                                        ->where(function($query) use ($request){
                                            $query->whereMonth('medicines.created_at', '=', $request->mon)
                                            ->whereYear('medicines.created_at', '=', $request->yearMonth);
                                        })
                                        ->orderBy('medicines.medicineID', 'DESC')
                                        ->get();

        }    

        if ($request->monthly == '' && $request->yearly == 1) {
            $medicineList = Medicine::select('medicines.*')
                                        ->where('medicines.isDeleted', '=', '0')
                                        ->where('medicines.medType','=', 'd')
                                        ->where(function($query) use ($request){
                                            $query->whereYear('medicines.created_at', '=', $request->year);
                                        })
                                        ->orderBy('medicines.medicineID', 'DESC')
                                        ->get();
        }
        
        $pdf = PDF::loadview('dchief.printables.medicinesList-pdf', compact('medicineList'));
        // $pdf->setPaper('legal', 'landscape');
        return $pdf->stream('medicineList-pdf');
    }

    public function generateMedicalSupplyList(Request $request)
    {
        // $medicalSupplyList = MedicalSupply::select('medsupplies.*')
        //                                 ->where([['medsupplies.isDeleted', '<>', '1'], ['medsupplies.supType', '=', 'D']])
        //                                 ->get();

        if ($request->monthly == 1 && $request->yearly == 1) {
     
            $medicalSupplyList = MedicalSupply::select('medsupplies.*')
                                    ->where('medsupplies.isDeleted', '=', '0')
                                    ->where('medsupplies.supType','=', 'd')
                                    ->where(function($query) use ($request){
                                        $query->whereMonth('medsupplies.created_at', '=', $request->mon)
                                        ->whereYear('medsupplies.created_at', '=', $request->yearMonth)
                                        ->orwhereYear('medsupplies.created_at', '=', $request->year);
                                    })
                                    ->orderBy('medsupplies.medSupID', 'DESC')
                                    ->get();
            
        }
        
        if ($request->monthly == 1 && $request->yearly == '') {
            $medicalSupplyList = MedicalSupply::select('medsupplies.*')
                                        ->where('medsupplies.isDeleted', '=', '0')
                                        ->where('medsupplies.supType','=', 'd')
                                        ->where(function($query) use ($request){
                                            $query->whereMonth('medsupplies.created_at', '=', $request->mon)
                                            ->whereYear('medsupplies.created_at', '=', $request->yearMonth);
                                        })
                                        ->orderBy('medsupplies.medSupID', 'DESC')
                                        ->get();

        }    

        if ($request->monthly == '' && $request->yearly == 1) {
            $medicalSupplyList = MedicalSupply::select('medsupplies.*')
                                        ->where('medsupplies.isDeleted', '=', '0')
                                        ->where('medsupplies.supType','=', 'd')
                                        ->where(function($query) use ($request){
                                            $query->whereYear('medsupplies.created_at', '=', $request->year);
                                        })
                                        ->orderBy('medsupplies.medSupID', 'DESC')
                                        ->get();
        }
                                        
        $pdf = PDF::loadview('dchief.printables.medicalSupplyList-pdf', compact('medicalSupplyList'));
        // $pdf->setPaper('legal', 'landscape');
        return $pdf->stream('medicalSupplyList-pdf');
    }

    public function generateDentalHistoryPdf($id)
    {
        $chosenHistory = Patient::find($id);

        $patientInfo = DentalHistory::join('patients', 'patients.patientID', '=', 'dentalhistories.patientID')
                                    ->select('patients.*', 'dentalhistories.*')
                                    ->where('dentalhistories.isDeleted', '=', '0')
                                    ->where('dentalhistories.patientID', '=', $id)
                                    ->first();

        if(Session::get('accountInfo.position') == 4){
            $pdf = PDF::loadview('dentist.printables.dental_history-pdf', compact('chosenHistory', 'patientInfo'));
            $pdf->setPaper('legal', 'portrait');
            return $pdf->stream('dental_history-pdf');
        }
        else if(Session::get('accountInfo.position') == 2){
            $pdf = PDF::loadview('dchief.printables.dental_history-pdf', compact('chosenHistory', 'patientInfo'));
            $pdf->setPaper('legal', 'portrait');
            return $pdf->stream('dental_history-pdf');
        }
    }

    public function generateMedicalLogEachPdf($id)
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
                                     ->select('users.*', 'cliniclogs.*')
                                     ->where('cliniclogs.patientID','=', $id)
                                     ->where('users.isActive', '=', '1')
                                     ->get();
                                    //  ->first();

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
        if(Session::get('accountInfo.position') == 4){
            $pdf = PDF::loadview('dentist.printables.medicalLogEach-pdf', compact('patientInfo','patientAllLogs', 'attendingDentist', 'usedMedSupply', 'usedMed'));
            $pdf->setPaper('legal', 'landscape');
            return $pdf->stream('medicalLogEach-pdf');
        }
        else if(Session::get('accountInfo.position') == 2){
            $pdf = PDF::loadview('dchief.printables.medicalLogEach-pdf', compact('patientInfo','patientAllLogs', 'attendingDentist', 'usedMedSupply', 'usedMed'));
            $pdf->setPaper('legal', 'landscape');
            return $pdf->stream('medicalLogEach-pdf');
        }
    }

}
