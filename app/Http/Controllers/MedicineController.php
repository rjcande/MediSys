<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Medicine;

use App\Prescription;

use Response;

use DB;

use Session;

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

            $medicine = new Medicine;
            if(Session::get('accountInfo.position') == 3){
                $medicine->medType = 'm';
            }elseif (Session::get('accountInfo.position') == 2) {
                $medicine->medType = 'd';
            }
            $medicine->genericName = Input::get('genericName');
            $medicine->brand = Input::get('brandName');
            $medicine->unit = Input::get('unit');

            $medicine->save();

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

            $medicine = Medicine::find(Input::get('medicineID'));

            $medicine->genericName = Input::get('genericName');
            $medicine->brand = Input::get('brandName');
            $medicine->unit = Input::get('unit');

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
            $prescripitonID = array();
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
