<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\MedicalSupply;

use App\UsedMedSupply;

use Response;

use DB;

use Session;

use PDF;

class MedicalSupplyController extends Controller
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
        $id = DB::table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT as id')
                ->where('TABLE_SCHEMA','medisysdb')
                ->where('TABLE_NAME','medsupplies')
                ->first();
        $supplies = MedicalSupply::where('isDeleted', '=', '0')->get();
        return view('nurse.C_nurse_maintenance_medical_supply')->with(['supplies' => $supplies, 'id' => $id]);
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

        $isExisting = false;

        //QUERY FOR SEARCHING IF THE MEDICINE ENTERED EXISTS
        $existingSupply = MedicalSupply::select('medsupplies.medSupName', 'medsupplies.brand', 'medsupplies.unit')->where('medsupplies.isDeleted', '=', '0')->get();
        foreach($existingSupply as $key => $value)
        {
            if(strtolower($value->medSupName) == strtolower(Input::get('medSupName')) && strtolower($value->brand) == strtolower(Input::get('medSupBrandName')) && strtolower($value->unit) == strtolower(Input::get('medSupUnit')))
            {
                $isExisting = true;
            }
        }

        if($isExisting == false)
        {
            $supply = new MedicalSupply;
            if(Session::get('accountInfo.position') == 3){
                $supply->supType = 'm';
            }
            elseif (Session::get('accountInfo.position') == 2) {
                $supply->supType = 'd';
            }

            if ($isExisting == false) {
                 $supply = new MedicalSupply;
                if(Session::get('accountInfo.position') == 3){
                    $supply->supType = 'm';
                }elseif (Session::get('accountInfo.position') == 2) {
                    $supply->supType = 'd';
                }
                $supply->medSupName = Input::get('medSupName');
                $supply->brand = Input::get('medSupBrandName');
                $supply->unit = Input::get('medSupUnit');
                $supply->save();

            return Response::json(array('message' => 'Successfully Added!', 'logo'=>'success', 'title'=>'Good Job'));
            }
        }
        else{
            return Response::json(array('message' => 'A Medical Supply has already been entered!!', 'logo'=>'warning', 'title'=>'WARNING'));
        }

        
    }
     catch (Exception $e) {

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

            $supply = MedicalSupply::find(Input::get('medicineID'));

            $supply->medSupName = Input::get('genericName');
            $supply->brand = Input::get('brandName');
            $supply->unit = Input::get('unit');

            $supply->save();

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
            $medSupID = array();
            foreach (Input::all() as $key) {
                $medSupID = $key;
            }

           UsedMedSupply::whereIn('medSupplyUsedID', $medSupID)->update(['isDeleted' => 1]);


       } catch (Exception $e) {

       }
    }

    public function delete($id){
        try {

            $supply = MedicalSupply::find($id);

            $supply->isDeleted = '1';

            $supply->save();

            return Response::json(array('message' => 'Successfully Deleted!'));

        } catch (Exception $e) {

        }
    }

    //Get Medical Spply Brand
    public function brand(){

        $brand = MedicalSupply::where('medSupName', '=', Input::get('mName'))
                                ->where('supType', '=', 'm')
                                ->get();

        return Response::json($brand);
    }

    //GEt Medical SUpply Unit
    public function unit(){

        $unit = MedicalSupply::where('medSupName', '=', Input::get('mName'))
                ->where('brand', '=', Input::get('mBrand'))
                ->where('supType', '=', 'm')
                ->get();

        return Response::json($unit);
    }

    public function printMedicalList(Request $request)
    {
        if ($request->daily == 1 && $request->yearly == '' && $request->monthly == '') {
            $supply = MedicalSupply::where('isDeleted', '=', '0')
                        ->where('supType','=', 'm')
                        ->whereDate('created_at', '=', $request->date)
                        ->orderBy('medSupID', 'DESC')
                        ->get();
        }
        if ($request->monthly == 1 && $request->yearly == '' && $request->daily == '') {
            $supply = MedicalSupply::where('isDeleted', '=', '0')
                        ->where('supType','=', 'm')
                        ->whereMonth('created_at', '=', $request->month)
                        ->whereYear('created_at', '=', $request->year_month)
                        ->orderBy('medSupID', 'DESC')
                        ->get();
        }
        if ($request->yearly == 1 && $request->monthly == '' && $request->daily == '') {
            $supply = MedicalSupply::where('isDeleted', '=', '0')
                        ->where('supType','=', 'm')
                        ->whereYear('created_at', '=', $request->year)
                        ->orderBy('medSupID', 'DESC')
                        ->get();
        }

        if ($request->daily == 1 && $request->monthly == 1 && $request->yearly == 1) {
     
            $supply = MedicalSupply::where('isDeleted', '=', '0')
                        ->where('supType','=', 'm')
                        ->where(function($query) use ($request){
                            $query->WhereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month)
                            ->orwhereYear('created_at', '=', $request->year);
                        })
                        ->orderBy('medSupID', 'DESC')
                        ->get();
        }
        
        if ($request->daily == 1 && $request->monthly == 1 && $request->yearly == '') {
            $supply = MedicalSupply::where('isDeleted', '=', '0')
                        ->where('supType','=', 'm')
                        ->where(function($query) use ($request){
                            $query->WhereDate('created_at', '=', $request->date)
                            ->orWhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month);
                        })
                        ->orderBy('medSupID', 'DESC')
                        ->get();
        }    

        if ($request->monthly == 1 && $request->yearly == 1 && $request->daily == '') {
            $supply = MedicalSupply::where('isDeleted', '=', '0')
                        ->where('supType','=', 'm')
                        ->where(function($query) use ($request){
                            $query->WhereMonth('created_at', '=', $request->month)
                            ->whereYear('created_at', '=', $request->year_month)
                            ->orwhereYear('created_at', '=', $request->year);
                        })
                        ->orderBy('medSupID', 'DESC')
                        ->get();
        }

        if ($request->monthly == '' && $request->yearly == 1 && $request->daily == 1) {
            $supply = MedicalSupply::where('isDeleted', '=', '0')
                        ->where('supType','=', 'm')
                        ->where(function($query) use ($request){
                            $query->WhereDate('created_at', '=', $request->date)
                            ->orwhereYear('created_at', '=', $request->year);
                        })
                        ->orderBy('medSupID', 'DESC')
                        ->get();
        }  

        $pdf = PDF::loadView('reports.medical_supply_list', compact('supply'))->setPaper('legal', 'landscape');
        return $pdf->stream('reports.medical_supply_list');
    }
}
