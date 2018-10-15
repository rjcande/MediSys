<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Medicine;

use App\Prescription;

use Response;

use DB;

use Session;

use PDF;

class MedicineController extends Controller
{

    public function brand(){

        $brand = Medicine::where('genericName', '=', Input::get('mName'))->get();

        return Response::json($brand);
    }

    public function unit(){
        $unit = Medicine::where('genericName', '=', Input::get('mName'))
                        ->where('brand', '=', Input::get('mBrand'))
                        ->get();

        return Response::json($unit);

    }

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
        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','medisysdb')
                ->where('TABLE_NAME','medicines')
                ->first();
        $medicine = Medicine::where('isDeleted', '=', '0')->get();
        return view('nurse.C_nurse_maintenance_medicine')->with(['medicines' => $medicine, 'id' => $id]);
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

            $dosage = strtolower(Input::get('_dosage'));

            $isExisting = false;

            //QUERY FOR SEARCHING IF THE MEDICINE ENTERED EXISTS
            $existingMedicine = Medicine::select('medicines.genericName', 'medicines.brand', 'medicines.unit', 'medicines.dosage')->where('medicines.isDeleted', '=', '0')->get();

            foreach($existingMedicine as $key => $value)
                {
                    if(strtolower($value->genericName) == strtolower(Input::get('genericName')) && strtolower($value->brand) == strtolower(Input::get('brandName')) && strtolower($value->unit) == strtolower(Input::get('unit')) && strtolower($value->dosage) == $dosage)
                    {
                        $isExisting = true;
                    }
                }
            
            if($isExisting == false){
                $medicine = new Medicine;
                if(Session::get('accountInfo.position') == 3){
                    $medicine->medType = 'm';
                }elseif (Session::get('accountInfo.position') == 2) {
                    $medicine->medType = 'd';
                }
                $medicine->genericName = Input::get('genericName');
                $medicine->brand = Input::get('brandName');
                $medicine->unit = Input::get('unit');
                $medicine->dosage = Input::get('_dosage'). ' '. Input::get('dosageUnit');

                $medicine->save();

                return Response::json(array('message' => 'Successfully Added!', 'logo'=>'success', 'title'=>'Good Job'));
            }
            elseif($isExisting == true){
                
                return Response::json(array('message' => 'A medicine has already been entered!!', 'logo'=>'warning', 'title'=>'WARNING'));

            }
            
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
    public function update(Request $request)
    {
        try {

            $medicine = Medicine::find(Input::get('medicineID'));

            $medicine->genericName = Input::get('genericName');
            $medicine->brand = Input::get('brandName');
            $medicine->unit = Input::get('unit');
            $medicine->dosage = Input::get('dosage');

            $medicine->save();

            return Response::json(array('message' => 'Successfully Updated!'));

        } catch (Exception $e) {

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
       try {
            $prescriptionID = array();
            foreach (Input::all() as $key) {
                $prescriptionID = $key;
            }

           Prescription::whereIn('prescriptionID', $prescriptionID)->update(['isDeleted' => 1]);

       } catch (Exception $e) {

       }


    }

    public function delete($id){
        try {

            $medicine = Medicine::find($id);

            $medicine->isDeleted = '1';

            $medicine->save();

            return Response::json(array('message' => 'Successfully Deleted!'));

        } catch (Exception $e) {

        }
    }

    public function printMedicineList(Request $request)
    {
        if ($request->daily == 1 && $request->yearly == '' && $request->monthly == '') {
            $medicines = Medicine::where('isDeleted', '=', '0')
                        ->where('medType','=', 'm')
                        ->whereDate('created_at', '=', $request->date)
                        ->orderBy('medicineID', 'DESC')
                        ->get();
        }
        if ($request->monthly == 1 && $request->yearly == '' && $request->daily == '') {
            $medicines = Medicine::where('isDeleted', '=', '0')
                        ->where('medType','=', 'm')
                        ->whereMonth('created_at', '=', $request->month)
                        ->whereYear('created_at', '=', $request->year_month)
                        ->orderBy('medicineID', 'DESC')
                        ->get();
        }
        if ($request->yearly == 1 && $request->monthly == '' && $request->daily == '') {
            $medicines = Medicine::where('isDeleted', '=', '0')
                        ->where('medType','=', 'm')
                        ->whereYear('created_at', '=', $request->year)
                        ->orderBy('medicineID', 'DESC')
                        ->get();
        }

        if ($request->daily == 1 && $request->monthly == 1 && $request->yearly == 1) {
     
            $medicines = Medicine::where('isDeleted', '=', '0')
                        ->where('medType','=', 'm')
                        ->where(function($query) use ($request){
                            $query->WhereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month)
                            ->orwhereYear('created_at', '=', $request->year);
                        })
                        ->orderBy('medicineID', 'DESC')
                        ->get();
        }
        
        if ($request->daily == 1 && $request->monthly == 1 && $request->yearly == '') {
            $medicines = Medicine::where('isDeleted', '=', '0')
                        ->where('medType','=', 'm')
                        ->where(function($query) use ($request){
                            $query->WhereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                        })
                        ->orderBy('medicineID', 'DESC')
                        ->get();
        }    

        if ($request->monthly == 1 && $request->yearly == 1 && $request->daily == '') {
            $medicines = Medicine::where('isDeleted', '=', '0')
                        ->where('medType','=', 'm')
                        ->where(function($query) use ($request){
                            $query->WhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month)
                            ->orwhereYear('created_at', '=', $request->year);
                        })
                        ->orderBy('medicineID', 'DESC')
                        ->get();
        }

        if ($request->monthly == '' && $request->yearly == 1 && $request->daily == 1) {
            $medicines = Medicine::where('isDeleted', '=', '0')
                        ->where('medType','=', 'm')
                        ->where(function($query) use ($request){
                            $query->WhereDate('created_at', '=', $request->date)
                            ->orwhereYear('created_at', '=', $request->year);
                        })
                        ->orderBy('medicineID', 'DESC')
                        ->get();
        }  

        $pdf = PDF::loadView('reports.medicine_list', compact('medicines'))->setPaper('legal', 'landscape');
        return $pdf->stream('reports.medicine_list');

    }
	// ***********************************************************************
    public function getBrandName()
    {
        $medicine = Medicine::where('genericName', '=', Input::get('medicineName'))->get();

        return response::json($medicine);
    }

    public function getBrandNameDChief()
    {
        $medicine = Medicine::where('genericName', '=', Input::get('medicineName'))->get();

        return response::json($medicine);
    }
}
