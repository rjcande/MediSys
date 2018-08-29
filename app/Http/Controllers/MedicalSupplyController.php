<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\MedicalSupply;

use App\UsedMedSupply;

use Response;

use DB;

use Session;

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

            return Response::json(array('message' => 'Successfully Added!'));
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

        $brand = MedicalSupply::where('medSupName', '=', Input::get('mName'))->get();

        return Response::json($brand);
    }

    //GEt Medical SUpply Unit
    public function unit(){

        $unit = MedicalSupply::where('medSupName', '=', Input::get('mName'))
                ->where('brand', '=', Input::get('mBrand'))
                ->get();

        return Response::json($unit);
    }
}