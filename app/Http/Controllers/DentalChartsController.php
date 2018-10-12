<?php

namespace App\Http\Controllers;

use App\DentalChart;
use App\ToothCondition;
use DB;
use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Diagnosis;
use Illuminate\Support\Facades\URL;

class DentalChartsController extends Controller
{
    public function create()
    {
        $patientid = Session::get('patientInfo.patientID');
        $dentalchart = DentalChart::where('patientID', $patientid)->first();
        if (empty($dentalchart)) {
            $dentalchart = new DentalChart;
            $dentalchart->patientID = $patientid;
            $dentalchart->save();
        }
        $dentalchart = DentalChart::where('patientID', $patientid)->orderBy('created_at', 'desc')->first();
        $toothconditions = ToothCondition::where('dentalChartID', $dentalchart->dentalChartID)->where('isRecent',"1")->where('isDeleted',0)->get();
        Session::put('dentalchartid',$dentalchart['dentalChartID']);
        return view('dentist.C_dentist_dental_chart')->with(['dentalchart' => $dentalchart, 'toothconditions' => $toothconditions]);
    }

    public function dchiefCreate()
    {
        $patientid = Session::get('patientInfo.patientID');
        $dentalchart = DentalChart::where('patientID', $patientid)->first();
        if (empty($dentalchart)) {
            $dentalchart = new DentalChart;
            $dentalchart->patientID = $patientid;
            $dentalchart->save();
        }
        $dentalchart = DentalChart::where('patientID', $patientid)->orderBy('created_at', 'desc')->first();
        $toothconditions = ToothCondition::where('dentalChartID', $dentalchart->dentalChartID)->where('isRecent',"1")->where('isDeleted',0)->get();
        Session::put('dentalchartid',$dentalchart['dentalChartID']);
        return view('dchief.C_dchief_dental_chart')->with(['dentalchart' => $dentalchart, 'toothconditions' => $toothconditions]);
    }
    public function store(Request $request, $dentalchartid)
    {
        for ($x = 11; $x <= 85; $x++) {
            if (($x >= 11 && $x <= 18) || ($x >= 21 && $x <= 28) || ($x >= 31 && $x <= 38) || ($x >= 41 && $x <= 48) || ($x >= 51 && $x <= 55) || ($x >= 61 && $x <= 65) || ($x >= 71 && $x <= 75) || ($x >= 81 && $x <= 85)) {
                $txtbox = 'txtBox' . $x;
                $txtboxa = $txtbox . 'a';
                $txtboxb = $txtbox . 'b';

                if ($request->$txtboxa != '' && $request->$txtboxb != '') {
                    $hasRecord = ToothCondition::where('dentalchartID', $dentalchartid)->where('toothNum', $x)->orderBy('created_at','desc')->first();
                    if (!empty($hasRecord)) {
                        $hasRecord->isRecent = "0";
                        $hasRecord->save();
                    }
                    $toothcondition = new ToothCondition;
                    $toothcondition->dentalchartid = $dentalchartid;
                    $toothcondition->toothNum = $x;
                    $toothcondition->toothStatusA = $request->$txtboxa;
                    $toothcondition->toothStatusB = $request->$txtboxb;
                    $toothcondition->isRecent = "1";
                    $toothcondition->save();
                }
                else if ($request->$txtboxa != '' && $request->$txtboxb == '') {
                    $hasRecord = ToothCondition::where('dentalchartID', $dentalchartid)->where('toothNum', $x)->orderBy('created_at','desc')->first();
                    if (!empty($hasRecord)) {
                        $hasRecord->isRecent = "0";
                        $hasRecord->save();
                    }
                    $toothcondition = new ToothCondition;
                    $toothcondition->dentalchartid = $dentalchartid;
                    $toothcondition->toothNum = $x;
                    $toothcondition->toothStatusA = $request->$txtboxa;
                    $toothcondition->isRecent = "1";
                    $toothcondition->save();
                }
                else if ($request->$txtboxb != '' && $request->$txtboxa == '') {
                    $hasRecord = ToothCondition::where('dentalchartID', $dentalchartid)->where('toothNum', $x)->orderBy('created_at','desc')->first();
                    if (!empty($hasRecord)) {
                        $hasRecord->isRecent = "0";
                        $hasRecord->save();
                    }
                    $toothcondition = new ToothCondition;
                    $toothcondition->dentalchartid = $dentalchartid;
                    $toothcondition->toothNum = $x;
                    $toothcondition->toothStatusB = $request->$txtboxb;
                    $toothcondition->isRecent = "1";
                    $toothcondition->save();
                }
                $txtbox = '';
            }
        }
        $display = '';
        for ($x = 11; $x <= 85; $x++) {
            if (($x >= 11 && $x <= 18) || ($x >= 21 && $x <= 28) || ($x >= 31 && $x <= 38) || ($x >= 41 && $x <= 48) || ($x >= 51 && $x <= 55) || ($x >= 61 && $x <= 65) || ($x >= 71 && $x <= 75) || ($x >= 81 && $x <= 85)) {
                $toothside = 'txt' . $x;
                $left = $toothside .'l';
                $top = $toothside .'t';
                $right = $toothside .'r';
                $bottom = $toothside .'b';
                $middle = $toothside .'m';

                $hasRecord = ToothCondition::where('dentalchartID', $dentalchartid)->where('toothNum', $x)->where('isRecent',1)->orderBy('created_at','desc')->first();

                if($request->$left != 0){
                    if ($hasRecord) {
                        $hasRecord->leftSide = "1";
                        $hasRecord->save();
                    }
                }
                if($request->$top != 0){
                    if ($hasRecord) {
                        $hasRecord->topSide = "1";
                        $hasRecord->save();
                    }
                }
                if($request->$right != 0){
                    if ($hasRecord) {
                        $hasRecord->rightSide = "1";
                        $hasRecord->save();
                    }
                }
                if($request->$bottom != 0){
                    if ($hasRecord) {
                        $hasRecord->bottomSide = "1";
                        $hasRecord->save();
                    }
                }
                if($request->$middle != 0){
                    if ($hasRecord) {
                        $hasRecord->middleSide = "1";
                        $hasRecord->save();
                    }
                }
                $toothside = '';
                $display = $display . '  |  ' . $x . '-' . $request->$left . '-' . $request->$top . '-' . $request->$right . '-' . $request->$bottom . '-' . $request->$middle;
            }

        }

        Session::put('diagnosis', $request->diagnosisTextArea);

        Session::put('dentalchartid', $dentalchartid);

        $dchart = DentalChart::find($dentalchartid);
        $toothconditions = ToothCondition::where('dentalChartID', $dchart->dentalChartID)->where('isRecent',"1")->get();
        $data = array(
            'dentalchart' => $dchart,
            'toothconditions' => $toothconditions,
        );
        return Redirect::route('dentist.patient.prescription',Session::get('patientInfo.patientID'));
    }

    public function dchiefStore(Request $request, $dentalchartid)
    {
        for ($x = 11; $x <= 85; $x++) {
            if (($x >= 11 && $x <= 18) || ($x >= 21 && $x <= 28) || ($x >= 31 && $x <= 38) || ($x >= 41 && $x <= 48) || ($x >= 51 && $x <= 55) || ($x >= 61 && $x <= 65) || ($x >= 71 && $x <= 75) || ($x >= 81 && $x <= 85)) {
                $txtbox = 'txtBox' . $x;
                $txtboxa = $txtbox . 'a';
                $txtboxb = $txtbox . 'b';

                if ($request->$txtboxa != '' && $request->$txtboxb != '') {
                    $hasRecord = ToothCondition::where('dentalchartID', $dentalchartid)->where('toothNum', $x)->orderBy('created_at','desc')->first();
                    if (!empty($hasRecord)) {
                        $hasRecord->isRecent = "0";
                        $hasRecord->save();
                    }
                    $toothcondition = new ToothCondition;
                    $toothcondition->dentalchartid = $dentalchartid;
                    $toothcondition->toothNum = $x;
                    $toothcondition->toothStatusA = $request->$txtboxa;
                    $toothcondition->toothStatusB = $request->$txtboxb;
                    $toothcondition->isRecent = "1";
                    $toothcondition->save();
                }
                else if ($request->$txtboxa != '' && $request->$txtboxb == '') {
                    $hasRecord = ToothCondition::where('dentalchartID', $dentalchartid)->where('toothNum', $x)->orderBy('created_at','desc')->first();
                    if (!empty($hasRecord)) {
                        $hasRecord->isRecent = "0";
                        $hasRecord->save();
                    }
                    $toothcondition = new ToothCondition;
                    $toothcondition->dentalchartid = $dentalchartid;
                    $toothcondition->toothNum = $x;
                    $toothcondition->toothStatusA = $request->$txtboxa;
                    $toothcondition->isRecent = "1";
                    $toothcondition->save();
                }
                else if ($request->$txtboxb != '' && $request->$txtboxa == '') {
                    $hasRecord = ToothCondition::where('dentalchartID', $dentalchartid)->where('toothNum', $x)->orderBy('created_at','desc')->first();
                    if (!empty($hasRecord)) {
                        $hasRecord->isRecent = "0";
                        $hasRecord->save();
                    }
                    $toothcondition = new ToothCondition;
                    $toothcondition->dentalchartid = $dentalchartid;
                    $toothcondition->toothNum = $x;
                    $toothcondition->toothStatusB = $request->$txtboxb;
                    $toothcondition->isRecent = "1";
                    $toothcondition->save();
                }
                $txtbox = '';
            }
        }
        $display = '';
        for ($x = 11; $x <= 85; $x++) {
            if (($x >= 11 && $x <= 18) || ($x >= 21 && $x <= 28) || ($x >= 31 && $x <= 38) || ($x >= 41 && $x <= 48) || ($x >= 51 && $x <= 55) || ($x >= 61 && $x <= 65) || ($x >= 71 && $x <= 75) || ($x >= 81 && $x <= 85)) {
                $toothside = 'txt' . $x;
                $left = $toothside .'l';
                $top = $toothside .'t';
                $right = $toothside .'r';
                $bottom = $toothside .'b';
                $middle = $toothside .'m';

                $hasRecord = ToothCondition::where('dentalchartID', $dentalchartid)->where('toothNum', $x)->where('isRecent',1)->orderBy('created_at','desc')->first();

                if($request->$left != 0){
                    if ($hasRecord) {
                        $hasRecord->leftSide = "1";
                        $hasRecord->save();
                    }
                }
                if($request->$top != 0){
                    if ($hasRecord) {
                        $hasRecord->topSide = "1";
                        $hasRecord->save();
                    }
                }
                if($request->$right != 0){
                    if ($hasRecord) {
                        $hasRecord->rightSide = "1";
                        $hasRecord->save();
                    }
                }
                if($request->$bottom != 0){
                    if ($hasRecord) {
                        $hasRecord->bottomSide = "1";
                        $hasRecord->save();
                    }
                }
                if($request->$middle != 0){
                    if ($hasRecord) {
                        $hasRecord->middleSide = "1";
                        $hasRecord->save();
                    }
                }
                $toothside = '';
            }

        }

        Session::put('diagnosis', $request->diagnosisTextArea);

        Session::put('dentalchartid', $dentalchartid);

        $dchart = DentalChart::find($dentalchartid);
        $toothconditions = ToothCondition::where('dentalChartID', $dchart->dentalChartID)->where('isRecent',"1")->get();
        $data = array(
            'dentalchart' => $dchart,
            'toothconditions' => $toothconditions,
        );
        return Redirect::route('dchief.patient.prescription',Session::get('patientInfo.patientID'));
    }
    public function eachtooth($toothNum)
    {
        $dchart = DentalChart::where('patientID',Session::get('patientInfo.patientID'))->first();
        $toothconditions = ToothCondition::where('dentalChartID', $dchart['dentalChartID'])
            ->where('toothNum',$toothNum)
            ->where('isDeleted',0)
            ->where('deleted_at',null)
            ->orderBy('created_at','desc')
            ->get();
        $data = array(
            'toothNum' => $toothNum,
            'toothconditions' => $toothconditions
        );
        return view('dentist.C_dentist_dental_chart_each')->with($data);
    }

    public function dchiefEachtooth($toothNum)
    {
        $dchart = DentalChart::where('patientID',Session::get('patientInfo.patientID'))->first();
        $toothconditions = ToothCondition::where('dentalChartID', $dchart['dentalChartID'])
            ->where('toothNum',$toothNum)
            ->where('isDeleted',0)
            ->where('deleted_at',null)
            ->orderBy('created_at','desc')
            ->get();
        $data = array(
            'toothNum' => $toothNum,
            'toothconditions' => $toothconditions
        );
        return view('dchief.C_dchief_dental_chart_each')->with($data);
    }

    public function delete($toothconditionID){
        $toothcondition = ToothCondition::find($toothconditionID);
        $toothcondition->isDeleted = 1;
        $toothcondition->isRecent = 0;
        $toothcondition->deleted_at = DB::raw('now()');
        $toothcondition->save();
        return Redirect::route('dentist.dentalchart.each',$toothcondition->toothNum);
    }
    public function dchartDelete($toothconditionID){
        $toothcondition = ToothCondition::find($toothconditionID);
        $toothcondition->isDeleted = 1;
        $toothcondition->isRecent = 0;
        $toothcondition->deleted_at = DB::raw('now()');
        $toothcondition->save();
        return Redirect::route('dchief.dentalchart.each',$toothcondition->toothNum);
    }

    public function view($patientID){

        $dchart = DentalChart::where('patientID', '=', $patientID)->first();
        $toothconditions = ToothCondition::where('dentalChartID', $dchart['dentalChartID'])->where('isRecent',"1")->get();
        $data = array(
            'dentalchart' => $dchart,
            'toothconditions' => $toothconditions,
        );
        return view('dentist.C_dentist_dental_chart_view')->with($data);

    }

    public function dchiefView($patientID){

        $dchart = DentalChart::where('patientID', '=', $patientID)->first();
        $toothconditions = ToothCondition::where('dentalChartID', $dchart['dentalChartID'])->where('isRecent',"1")->get();
        $data = array(
            'dentalchart' => $dchart,
            'toothconditions' => $toothconditions,
        );

        return view('dchief.C_dchief_dental_chart_view')->with($data);
        // dd($toothconditions);
    }
}
