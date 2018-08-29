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
// use Carbon\Carbon;
use Response;
use Redirect;
use Session;
use DB;

class VitalSignsController extends Controller
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


        // dd($request->all());
            $vitalSigns = new VitalSigns;

            $vitalSigns->bloodPressure = Input::get('_bloodPressure');
            $vitalSigns->heartRate = Input::get('_heartRate');
            $vitalSigns->respiRate = Input::get('_respiratoryRate');
            $vitalSigns->temperature = Input::get('_temperature');
            $vitalSigns->height = Input::get('_height');
            $vitalSigns->weight = Input::get('_weight');
            $vitalSigns->bmiValue = Input::get('_bmi');
            $vitalSigns->bmiRange = Input::get('_bmiRange');

            $vitalSigns->save();

        return Response::json(['message' => 'Successfully Added!']);
    }

    public function dChiefStore(Request $request)
    {


        // dd($request->all());
            $vitalSigns = new VitalSigns;

            $vitalSigns->bloodPressure = Input::get('_bloodPressure');
            $vitalSigns->heartRate = Input::get('_heartRate');
            $vitalSigns->respiRate = Input::get('_respiratoryRate');
            $vitalSigns->temperature = Input::get('_temperature');
            $vitalSigns->height = Input::get('_height');
            $vitalSigns->weight = Input::get('_weight');
            $vitalSigns->bmiValue = Input::get('_bmi');
            $vitalSigns->bmiRange = Input::get('_bmiRange');

            $vitalSigns->save();

        return Response::json(['message' => 'Successfully Added!']);
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
        $vitalSigns = VitalSigns::find($id);

        $vitalSignsInfo = VitalSigns::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'vitalsigns.clinicLogID')
                                    ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                    ->select('vitalsigns.*', 'patients.*')
                                    ->where('cliniclogs.patientID', '=', $id)
                                    ->orderBy('vitalsigns.created_at', 'desc')
                                    ->first();

        return view('dentist.C_dentist_vital_signs')->with(['vitalSignsInfo' => $vitalSignsInfo, 'vitalSigns' => $vitalSigns]);
    }

    public function dChiefEdit($id)
    {
        $vitalSigns = VitalSigns::find($id);

        $vitalSignsInfo = VitalSigns::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'vitalsigns.clinicLogID')
                                    ->join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                    ->select('vitalsigns.*', 'patients.*')
                                    ->where('cliniclogs.patientID', '=', $id)
                                    ->orderBy('vitalsigns.created_at', 'desc')
                                    ->first();

        return view('dchief.C_dchief_vital_signs')->with(['vitalSignsInfo' => $vitalSignsInfo, 'vitalSigns' => $vitalSigns]);
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

            $idVitalSign = VitalSigns::select('vitalSignsID')->where('clinicLogID', '=', $id)->first();

            $vitalSigns = VitalSigns::find($idVitalSign)->first();

            $vitalSigns->bloodPressure = Input::get('bloodPressure');
            $vitalSigns->heartRate = Input::get('heartRate');
            $vitalSigns->respiRate = Input::get('respiratoryRate');
            $vitalSigns->temperature = Input::get('temperature');
            $vitalSigns->height = Input::get('height');
            $vitalSigns->weight = Input::get('weight');
            $vitalSigns->bmiValue = Input::get('bmi');
            $vitalSigns->bmiRange = Input::get('bmiRange');

            $vitalSigns->save();
            Session::flash('message', 'Successfully Saved!');
            return Response::json(['message' => 'Successfully Saved']);

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
        //
    }
}
