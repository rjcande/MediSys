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
use App\VitalSigns;
use App\OutsideReferrals;

// use Carbon\Carbon;
use Response;
use Redirect;
use Session;
use DB;

class DentalPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientList = Patient::all();
        return view('dentist.C_dentist_patient_list')->with('patient', $patientList);
    }
    public function dchiefIndex()
    {
        $patientList = Patient::all();
        return view('dchief.C_dchief_patient_list')->with('patient', $patientList);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Session::put('patientNumber', $request->patientNumber);

        return view('dentist.C_dentist_register_patient');
    }
    public function dchiefCreate(Request $request)
    {
        // Session::put('patientNumber', $request->patientNumber);

        return view('dchief.C_dchief_register_patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

        $patient = new Patient;

        $patient->patientNumber = $request->studFacID;
        // $patient->nurseID = " ";
        $patient->dentistID = Session::get('accountInfo.id');
        $patient->firstName = $request->firstName;
        $patient->lastName = $request->lastName;
        $patient->middleName = $request->middleName;
        $patient->quantifier = $request->quantifier;
        $patient->patientType = $request->patientType;
        $patient->birthDate = $request->birthDay;
        $patient->age = $request->age;
        $patient->religion = $request->religion;
        $patient->nationality = $request->nationality;
        $patient->address = $request->address;
        $patient->gender = $request->gender;
        $patient->nickname = $request->nickname;
        $patient->homeNo = $request->homeNo;
        $patient->officeNo = $request->officeNo;
        $patient->faxNo = $request->faxNo;
        $patient->mobileNo = $request->mobileNo;
        $patient->emailAdd = $request->emailAdd;
        $patient->occupation = $request->occupation;
        $patient->dentalIns = $request->dentalInsurance;
        $patient->effectDate = $request->effectiveDate;
        $patient->guardianName = $request->parentGuardianName;
        $patient->guardianContact = $request->parentGuardianContact;

        $patient->save();

        $patientID = $patient->patientID;

        Session::flash('message', 'successfully added!');

        return Redirect::route('dentist.consultation.to.all.dentists', $patientID);

        dd(Session::get('accountInfo.id'));

        }

        catch (Exception $e){

            $error = "duplicate entry for Student/Faculty Number!!";
            return Redirect::back()->with('errors', $error);

        }
    }
    public function dchiefStore(Request $request)
    {
        try{

        $patient = new Patient;

        $patient->patientNumber = $request->studFacID;
        // $patient->nurseID = " ";
        $patient->dentistID = Session::get('accountInfo.id');
        $patient->firstName = $request->firstName;
        $patient->lastName = $request->lastName;
        $patient->middleName = $request->middleName;
        $patient->quantifier = $request->quantifier;
        $patient->patientType = $request->patientType;
        $patient->birthDate = $request->birthDay;
        $patient->age = $request->age;
        $patient->religion = $request->religion;
        $patient->nationality = $request->nationality;
        $patient->address = $request->address;
        $patient->gender = $request->gender;
        $patient->nickname = $request->nickname;
        $patient->homeNo = $request->homeNo;
        $patient->officeNo = $request->officeNo;
        $patient->faxNo = $request->faxNo;
        $patient->mobileNo = $request->mobileNo;
        $patient->emailAdd = $request->emailAdd;
        $patient->occupation = $request->occupation;
        $patient->dentalIns = $request->dentalInsurance;
        $patient->effectDate = $request->effectiveDate;
        $patient->guardianName = $request->parentGuardianName;
        $patient->guardianContact = $request->parentGuardianContact;

        $patient->save();

        $patientID = $patient->patientID;

        Session::flash('message', 'successfully added!');

        return Redirect::route('dchief.consultation.to.all.dentists', $patientID);

        dd(Session::get('accountInfo.id'));

        }

        catch (Exception $e){

            $error = "duplicate entry for Student/Faculty Number!!";
            return Redirect::back()->with('errors', $error);

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
        $patientInfo = Patient::find($id);

        return view ('dentist.C_dentist_patient_view_more_info')->with('patientInfo', $patientInfo);
    }
    public function dchiefShow($id)
    {
        $patientInfo = Patient::find($id);

        return view ('dchief.C_dchief_patient_view_more_info')->with('patientInfo', $patientInfo);
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

    public function dentalPatientRecords()
    { 
        // GATHERING DENTAL HISTORIES PER PATIENT
        $patientRecord = DentalLog::join('patients','patients.patientID','=','cliniclogs.patientID')
                                  ->join('dentalhistories','dentalhistories.patientID','=','patients.patientID')
                                  ->select('cliniclogs.*', 'dentalhistories.*', 'patients.*')
                                  ->where('cliniclogs.dentistID',Session::get('accountInfo.id'))
                                  ->groupBy('patients.patientID')
                                  ->get();

                                
        return view('dentist.C_dentist_patient_record')->with(['patientRecord'=>$patientRecord]);
    }
    public function dchiefDentalPatientRecords()
    { 
        // GATHERING DENTAL HISTORIES PER PATIENT
        $patientRecord = DentalLog::join('patients','patients.patientID','=','cliniclogs.patientID')
                                  ->join('dentalhistories','dentalhistories.patientID','=','patients.patientID')
                                  ->select('cliniclogs.*', 'dentalhistories.*', 'patients.*')
                                  ->where('cliniclogs.dentistID',Session::get('accountInfo.id'))
                                  ->groupBy('patients.patientID')
                                  ->get();

                                
        return view('dchief.C_dchief_patient_record')->with(['patientRecord'=>$patientRecord]);
    }

    public function patientConsultations($id)
    {

        $dentalLogs = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                               ->join('diagnoses', 'diagnoses.clinicLogID', '=', 'cliniclogs.clinicLogID')
                               ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                               ->select('users.*', 'diagnoses.*', 'treatments.*')
                               ->orderBy('cliniclogs.created_at', 'desc')
                               ->where('cliniclogs.patientID', '=', $id)
                               ->where('cliniclogs.clinicType', '=', 'D')
                               ->get();

        $certifications = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                   ->select('patients.*', 'cliniclogs.*')
                                   ->orderBy('cliniclogs.created_at', 'desc')
                                   ->where('cliniclogs.patientID', '=', $id)
                                   ->where('cliniclogs.clinicType', '=', 'D')
                                   ->where('cliniclogs.reqForDentalCert', '=', '1')
                                   ->get();

        $vitalSigns = VitalSigns::where('isDeleted', '=', '0')->get();

        $attendingDentist = Account::where('isActive', '=', '1')->get();

        // dd($consultInfo);
        return view('dentist.C_dentist_patients_consultations')->with(['dentalLog' => $dentalLogs, 'vitalSigns' =>$vitalSigns, 'attendingDentist'=>$attendingDentist,  'certifications'=>$certifications]);
    }
    
    public function dchiefPatientConsultations($id)
    {

        $dentalLogs = DentalLog::join('users', 'users.id', '=', 'cliniclogs.dentistID')
                               ->join('diagnoses', 'diagnoses.clinicLogID', '=', 'cliniclogs.clinicLogID')
                               ->join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
                               ->select('users.*', 'diagnoses.*', 'treatments.*')
                               ->orderBy('cliniclogs.created_at', 'desc')
                               ->where('cliniclogs.patientID', '=', $id)
                               ->where('cliniclogs.clinicType', '=', 'D')
                               ->get();

        $certifications = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                   ->select('patients.*', 'cliniclogs.*')
                                   ->orderBy('cliniclogs.created_at', 'desc')
                                   ->where('cliniclogs.patientID', '=', $id)
                                   ->where('cliniclogs.clinicType', '=', 'D')
                                   ->where('cliniclogs.reqForDentalCert', '=', '1')
                                   ->get();

        $vitalSigns = VitalSigns::where('isDeleted', '=', '0')->get();

        $attendingDentist = Account::where('isActive', '=', '1')->get();

        // dd($consultInfo);
        return view('dchief.C_dchief_patients_consultations')->with(['dentalLog' => $dentalLogs, 'vitalSigns' =>$vitalSigns, 'attendingDentist'=>$attendingDentist,  'certifications'=>$certifications]);
    }

}
