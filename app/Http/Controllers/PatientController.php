<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;

use App\ClinicLog;

use Exception;

use Redirect;

use Session;

use Response;

use PDF;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicLogs = ClinicLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                        ->select('cliniclogs.clinicLogID','cliniclogs.patientID', 'patients.lastName', 'patients.firstName', 'patients.middleName', 'patients.quantifier', 'patients.patientType', 'cliniclogs.clinicLogDateTime')
                        ->where('cliniclogs.isDeleted', '=', '0')
                        ->get();
        $patientList = Patient::where('isDeleted', '=', 0)->get();
        
        return view('nurse.patient_list')->with(['patientList' => $patientList, 'clinicLogs' => $clinicLogs]);
    }

    public function indexOfPhysician()
    {

        $patientList = Patient::where('isDeleted', '=', 0)->get();

        return view('physician.C_physician_patient_list')->with('patientList', $patientList);
    }

    public function indexOfMChief()
    {

        $patientList = Patient::where('isDeleted', '=', 0)->get();

        return view('chief.C_mchief_patient_list')->with('patientList', $patientList);
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

            $patient = new Patient;

            $patient->patientNumber = $request->studFacID;
            $patient->firstName = $request->firstName;
            $patient->middleName = $request->middleName;
            $patient->lastName = $request->lastName;
            $patient->quantifier = $request->extension;
            $patient->patientType = $request->patientType;
            $patient->birthDate = $request->birthDay;
            $patient->age = $request->age;
            $patient->religion = $request->religion;
            $patient->nationality = $request->nationality;
            $patient->address = $request->address;
            $patient->gender = $request->gender;
            $patient->nurseID = Session::get('accountInfo.id');
            $patient->nickname = $request->nickname;
            $patient->homeNo = $request->homeNo;
            $patient->officeNo = $request->officeNo;
            $patient->faxNo = $request->faxNo;
            $patient->mobileNo = $request->mobileNo;
            $patient->emailAdd = $request->email;
            $patient->occupation = $request->occupation;
            $patient->dentalIns = $request->dentalInsurance;
            $patient->effectDate = $request->effectiveDate;
            $patient->guardianName = $request->parentGuardianName;
            $patient->guardianContact = $request->parentGuardianContactNo;

            $patient->save();

            $patientID = $patient->patientID;

            Session::flash('message', 'Successfully Added!');


            return Redirect::route('nurse.medical.log.each', $patientID);
        } catch (Exception $e) {
            $error = "Duplicate entry for Student/Faculty Number";
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

        return view('nurse.C_nurse_patient_personal_more_info')->with('patientInfo', $patientInfo);
        
    }

    public function showOfPhysician($id)
    {
        $patientInfo = Patient::find($id);

        return view('physician.C_physician_patient_personal_more_info')->with('patientInfo', $patientInfo);
    }

    public function showOfMChief($id)
    {
        $patientInfo = Patient::find($id);

        return view('chief.C_mchief_patient_personal_more_info')->with('patientInfo', $patientInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patientInfo = Patient::find($id);

        return view('nurse.C_nurse_patient_edit_info')->with('patientInfo', $patientInfo);
        
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

            $patient = Patient::find($id);
            $patient->patientNumber = $request->studFacID;
            $patient->firstName = $request->firstName;
            $patient->middleName = $request->middleName;
            $patient->lastName = $request->lastName;
            $patient->quantifier = $request->extension;
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
            $patient->emailAdd = $request->email;
            $patient->occupation = $request->occupation;
            $patient->dentalIns = $request->dentalInsurance;
            $patient->effectDate = $request->effectiveDate;
            $patient->guardianName = $request->parentGuardianName;
            $patient->guardianContact = $request->parentGuardianContactNo;

            $patient->save();

            Session::flash('message', 'Successfully Updated!');
            return Redirect::route('personal.info', $id);

        } catch (Exception $e) {
            $error = "Duplicate entry for Student/Faculty Number";
            return Redirect::back()->with('errors', $error);
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
        try {
            
            $patient = Patient::find($id);

            $patient->isDeleted = 1;
            $patient->save();
            return Response::json(array('message' => 'Record Successfully Deleted!'));
        } catch (Exception $e) {
            $error = $e;
            dd($error);
            // return Redirect::back()->with('error', $error);
        }
    }

    public function printPatientList()
    {
        $patientListStudent = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '1')
                       ->get();

        $patientListFaculty = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '2')
                       ->get();

        $patientListAdmin = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '3')
                       ->get();        

        $patientListVisitor = Patient::where('isDeleted', '=', 0)
                       ->where('patientType', '=', '4')
                       ->get();
        $pdf = PDF::loadView('reports.patient_list', compact('patientListStudent', 'patientListFaculty', 'patientListAdmin', 'patientListVisitor'))->setPaper('legal', 'landscape');
        return $pdf->stream('reports.patient_list');
    }
}
