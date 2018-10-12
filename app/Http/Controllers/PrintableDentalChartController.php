<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Session;
use App\DentalChart;
use App\ToothCondition;
use App\Patient;

class PrintableDentalChartController extends Controller
{
    public function show($patient){
        $patientid = $patient;
        $dentalchart = DentalChart::where('patientID', $patientid)->first();
        if (empty($dentalchart)) {
            $dentalchart = new DentalChart;
            $dentalchart->patientID = $patientid;
            $dentalchart->save();
        }
        $patient = Patient::where('patientID',$patientid)->first();
        $dentalchart = DentalChart::where('patientID', $patientid)->orderBy('created_at', 'desc')->first();
        $toothconditions = ToothCondition::where('dentalChartID', $dentalchart->dentalChartID)->where('isRecent',"1")->where('isDeleted',0)->get();
        Session::put('dentalchartid',$dentalchart['dentalChartID']);
        // return view('dentist.printable_dental_chart')->with(['dentalchart' => $dentalchart, 'toothconditions' => $toothconditions]);

        $pdf = PDF::loadView('dentist.printable_dental_chart',compact('dentalchart','toothconditions','patient'));

        return $pdf->stream('dentist.printable_dental_chart');
    }
}
