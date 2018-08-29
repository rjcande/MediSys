<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClinicLog;

use PDF;

use App\Medicine;
use App\MedicalSupply;
use App\DentalLog;
use App\Patient;

use Session;
use DB;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $medicines = self::getMedicine();
        $medicalSupplies = self::getMedSupply();
        $medicineUnit = self::getMedicineUnit();
        $medSupplyUnit = self::getMedSupplyUnit();
        $dentalLog = self::getDentalLog();

        return view('dentist.C_dentist_patient_prescription')->with(['medicines'=>$medicines, 'medicalSupplies'=>$medicalSupplies, 'medicineUnit'=>$medicineUnit, 'medSupplyUnit'=>$medSupplyUnit, 'dentalLog'=>$dentalLog]);
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
        try {

            $dentalLog = DentalLog::find($id);

            $dentalLog->treatment = $request->treatment;

            $dentalLog->save();
        
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

    public function generatePdf($id)
    {
        $clinicLogInfo = ClinicLog::join('patients', 'patients.patientID','=', 'cliniclogs.patientID')
            ->select('cliniclogs.*', 'patients.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();

        $attendingPhysician = ClinicLog::join('logReferrals', 'cliniclogs.clinicLogID', '=', 'logReferrals.clinicLogID')
            ->join('users', 'users.id', '=', 'logReferrals.physicianID')
            ->select('users.*')
            ->where('cliniclogs.isDeleted', '=', '0')
            ->where('cliniclogs.clinicLogID', '=', $id)
            ->first();
    
        $prescriptionInfo = ClinicLog::join('treatments', 'treatments.clinicLogID', '=', 'cliniclogs.clinicLogID')
            ->join('prescriptions', 'prescriptions.treatmentID', '=', 'treatments.treatmentID')
            ->join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
            ->select('prescriptions.*', 'cliniclogs.*', 'medicines.*', 'treatments.*')
            ->where('prescriptions.isDeleted' , '=', '0')
            ->where('treatments.clinicLogID', '=', $id)
            ->get();


        $pdf = PDF::loadView('reports.prescription_pdf', compact('prescriptionInfo', 'attendingPhysician', 'clinicLogInfo'));
        return $pdf->stream('reports.prescription_pdf');
    }
	
	private function getMedicine()
    {
        $medicines = Medicine::where('isDeleted', '=', '0')->get(); 

        return $medicines;
    }
    private function getMedSupply()
    {
        $medicalSupplies = MedicalSupply::where('isDeleted', '=', '0')->get();

        return $medicalSupplies;
    }
    private function getMedicineUnit()
    {
        $medicineUnit = Medicine::distinct()->get(['unit']);

        return $medicineUnit;
    }
    private function getMedSupplyUnit()
    {
        $medSupplyUnit = MedicalSupply::distinct()->get(['unit']);

        return $medSupplyUnit;
    }
    private function getDentalLog()
    {

        $dentalLog = DentalLog::all()->sortByDesc('clinicLogID')->first();

        return $dentalLog;
    }
}
