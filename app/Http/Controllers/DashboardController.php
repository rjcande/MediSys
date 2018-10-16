<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointments;

use App\ClinicLog;

use App\LogReferrals;

use App\Prescription;

use App\UsedMedSupply;

use App\MedicalSupply;

use App\Medicine;

use App\Accounts;

use DB;

use Carbon\Carbon;

use Response;

use Session;

use PDF;
class DashboardController extends Controller
{

    public function notificationNurse()
    {
        $notification = LogReferrals::join('users', 'users.id', '=', 'logreferrals.physicianID')
                                    ->join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                                    ->where('cliniclogs.nurseID', '=', Session::get('accountInfo.id'))
                                    ->where('logreferrals.notif' , '=', 2)
                                    ->where('logreferrals.isDeleted', '=', 0)
                                    ->orderBy('logreferrals.created_at', 'desc')
                                    ->get();
        //dd($notification);
        
        $array = [];
        $ctr = 0;
        $notificationCounter = 0;
        $status = "";
        foreach ($notification as $key => $value) {
            if ($value['logReferralStatus'] == 2) {
                $text =  "<li class='notification' data-id=".$value["logReferralID"]."><a><span></span><a><span class='message'>".$value['firstName'].' '.$value['middleName']{0}.'. '. $value['lastName'] ." accepted your referral</span></a></a></li>";   
                $notificationCounter++; 
            }
            elseif ($value['logReferralStatus'] == 3) {
                $text =  "<li class='notification' data-id=".$value["logReferralID"]."><a><span></span><a><span class='message'>".$value['firstName'].' '.$value['middleName']{0}.'. '. $value['lastName'] ." declined your referral</span></a></a></li>";
                $notificationCounter++;
            }
            else{
                $text = "";
            }

            $array[$ctr] = $text; 
            $ctr++;
            
        }

        return Response::json(array('logReferralNotifNurse' => $notification, 'text' => $array, 'number' => $notificationCounter));
    } 

    public function notification()
    {
        $logReferralNotifNurse = LogReferrals::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'logreferrals.clinicLogID')
                                    ->join('users', 'users.id', '=', 'cliniclogs.nurseID')
                                    ->where('logreferrals.notif' , '=', 0)
                                    ->where('physicianID', '=', Session::get('accountInfo.id'))
                                    ->where('logreferrals.isDeleted', '=', 0)
                                    ->orderBy('logreferrals.created_at', 'desc')
                                    ->get();
        $accountNotif = Accounts::where('isVerified', '=', '0')
                                ->where(function ($query) {
                                    $query->where('position', '=', '6')
                                          ->orWhere('position', '=', '5');
                                })
                                ->get();


        $array = [];
        $ctr = 0;
        $concern = "";
        foreach ($logReferralNotifNurse as $key => $value) {
            if ($value['concern'] == 0) {
                $concern = "consultation";
            }
            elseif ($value['concern'] == 1) {
                $concern = "letter/certification";
            }
            if (Session::get('accountInfo.position') == 5) {
                $text =  "<li class='notification' data-id=".$value["logReferralID"]."><a><span></span><a href='/physician/referred/patients'><span class='message'>". $value['firstName'].' '.$value['middleName']{0}.'. '. $value['lastName'] ." referred a patient for ". $concern ."</span></a></a></li>";
            }
            elseif (Session::get('accountInfo.position') == 3) {
                $text =  "<li class='notification' data-id=".$value["logReferralID"]."><a><span></span><a href='/mchief/referred/patients'><span class='message'>". $value['firstName'].' '.$value['middleName']{0}.'. '. $value['lastName'] ." referred a patient for ". $concern ."</span></a></a></li>";
            }
            
            $array[$ctr] = $text; 
            $ctr++;
        }

        foreach ($accountNotif as $key => $value) {
            $text =  "<li class='notification'><a><span></span><a href='/medicalchief/accounts_maintenance'><span class='message'>". $value['firstName'].' '.$value['middleName']{0}.'. '. $value['lastName'] ." requests to make an account"."</span></a></a></li>";
            $array[$ctr] = $text; 
            $ctr++;
        }

        

        return Response::json(array('logReferralNotifNurse' => $logReferralNotifNurse, 'text' => $array));


    }

    public function notificationClicked($id)
    {
        $id_cliniclog; 
        $logreferrals = LogReferrals::find($id);

        $logreferrals->notif = 1;
        $id_cliniclog = $logreferrals->clinicLogID;
        $logreferrals->save();

        return Response::json(array('id' => $id_cliniclog));
    }

    public function dchiefNotification()
    {

        $unverifiedAccounts = Accounts::select('users.*')->where('users.position', 4)->where('users.isVerified', 0)->get();
        
        // dd($unverifiedAccounts);

        $array = [];
        $accountCtr = 0;
        foreach($unverifiedAccounts as $key => $value){
            $message = "<li class='notification' data-id=".$value["userID"]."><a><span></span><a href='/dentalchief/accounts_maintenance'><span class='message'>". $value['firstName'].' '.$value['middleName']{0}.'. '. $value['lastName'] ." requests to make an account </span></a></a></li>";
            $array[$accountCtr] = $message; 
            $accountCtr++;
        }


        return Response::json(array('unverifiedAccounts' => $unverifiedAccounts, 'message' => $array));
        // return view('dentalchief.layout.side_and_top')->with(['unverifiedAccounts'=>$unverifiedAccounts, 'unverifiedAccountsCtr'=>$unverifiedAccountsCtr]);
    }

    public function dashboard()
    {
        //dd(Session::get('notification'));
    	$patientName = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
                                    ->join('patients', 'cliniclogs.patientID', '=', 'patients.patientID')
                                    ->select('patients.*', 'cliniclogs.*', 'appointments.*')
    								->where('appointments.isAppointed', '=', 0)
                                    ->orderBy("appointmentDate", 'desc')
    								->get();

    	$physician = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
    								->join('logreferrals', 'logreferrals.logReferralID', '=', 'appointments.logReferralID')
    								->join('users', 'users.id', '=', 'logreferrals.physicianID')
    								->where('appointments.isAppointed', '=', 0)
                                    ->get();
        $currentPhysician = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
                                    ->join('logreferrals', 'logreferrals.logReferralID', '=', 'appointments.logReferralID')
                                    ->join('users', 'users.id', '=', 'logreferrals.physicianID')
                                    ->where('appointments.isAppointed', '=', 0)
                                    ->where('logreferrals.physicianID', '=', Session::get('accountInfo.id'))
                                    ->get();
                                    
        $dentist = Appointments::join('cliniclogs', 'cliniclogs.clinicLogID', '=', 'appointments.clinicLogID')
                               ->join('users', 'users.id', '=', 'cliniclogs.dentistID')
                               ->where('appointments.isDeleted', '=', 0)
                               ->get();


        $totalPatient = ClinicLog::select(DB::raw("COUNT(clinicLogID) as total"), DB::raw("DATE_FORMAT(created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month, DAY(created_at) day'))
                                    ->where('clinicType', '=', 'M')
                                    ->groupBy('month','year')
                                    ->get();

        $totalPatientDental = ClinicLog::select(DB::raw("COUNT(clinicLogID) as total"), DB::raw("DATE_FORMAT(created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month, DAY(created_at) day'))
                                    ->where('clinicType', '=', 'D')
                                    ->groupBy('month','year')
                                    ->get();

        $count = count($totalPatient);
        $countDental = count($totalPatientDental);

        if (Session::get('accountInfo.position') == 6) {
            
            return view('nurse.dashboard')->with(['patientNames' => $patientName, 'physicians' => $physician, 'totalPatient' => $totalPatient]);

        }
        elseif (Session::get('accountInfo.position') == 5) {
            
            return view('physician.C_physician_dashboard')->with(['patientNames' => $patientName, 'physicians' => $currentPhysician, 'totalPatient' => $totalPatient, 'count' => $count]);

        }
        elseif (Session::get('accountInfo.position') == 3) {
            
            return view('chief.C_mchief_dashboard')->with(['patientNames' => $patientName, 'physicians' => $currentPhysician, 'totalPatient' => $totalPatient, 'count' => $count]);

        }
        elseif(Session::get('accountInfo.position') == 4){

            return view('dentist.C_dentist_dashboard')->with(['patientNames' => $patientName, 'dentists' => $dentist, 'totalPatient' => $totalPatientDental, 'count' => $countDental]);
       }
       elseif(Session::get('accountInfo.position') == 2){

            return view('dchief.C_dchief_dashboard')->with(['patientNames' => $patientName, 'dentists' => $dentist, 'totalPatient' => $totalPatientDental, 'count' => $countDental]);
       }
		        
    }


    public function destroy($id)
    {
    	$delete = Appointments::find($id);

    	$delete->isDeleted = 1;

    	$delete->save();

    	return Response::json(array('message' => 'Success'));
    }

    public function mChiefDestroy($id, $status)
    {
        $delete = Appointments::find($id);

        if ($status == "no_show") {
            $delete->isAppointed = 1;
        }
        elseif ($status == "cancel_appointment") {
            $delete->isAppointed = 2;
        }

        $delete->save();

        return Response::json(array('message' => 'Success'));
    }

    public function dChiefDestroy($id)
    {
        $delete = Appointments::find($id);

        if ($status == "no_show") {
            $delete->isAppointed = 1;
        }
        elseif ($status == "cancel_appointment") {
            $delete->isAppointed = 2;
        }

        $delete->save();

        return Response::json(array('message' => 'Success'));
    }

    public function dentistDestroy($id)
    {
        $delete = Appointments::find($id);

        if ($status == "no_show") {
            $delete->isAppointed = 1;
        }
        elseif ($status == "cancel_appointment") {
            $delete->isAppointed = 2;
        }

        $delete->save();

        return Response::json(array('message' => 'Success'));
    }

    public function dentistReports()
    {
        $medicine = Medicine::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $prescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('day', 'month', 'year')
                        ->groupBy('prescriptions.medicineID')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'd')
                        ->get();
        //percentage month
        $percentagePrescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'd')
                        ->limit(4)
                        ->get();
        $totalPrescription =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'd')
                        ->first();

       if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        //Percentage Year
        $percentagePrescription_year = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'd')
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'd')
                        ->first();

        $percentTopOne_year = 0;
        $percentTopTwo_year = 0;
        $percentTopThree_year = 0;
        $percentTopFour_year = 0;
        $percentOther_year = 0;

        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }
        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));




        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medicineID = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->whereMonth('prescriptions.created_at', '=', $month)
                            ->where('medicines.medType', '=', 'd')
                            ->get();
        $results = array();
        $id = array();
        foreach ($medicineID as $key) {
            $id[] = $key;
            $results[$key['medicineID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medicineID) {
            foreach ($prescription as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    array_push($results[$key['medicineID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }

        //Weekly Sum of medicine
        $percentagePrescription_weekly = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->groupBy('prescriptions.medicineID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->where('medicines.medType', '=', 'd')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('medicines.medicineID')
                            ->where('medicines.medType', '=', 'd')
                            ->groupBy('medicineID')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medicineID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medicineID'], 'genericName' => $key['genericName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'genericName' => $value['genericName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        
        if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));

        if(Session::get('accountInfo.position') == 4){
            return view('dentist.C_dentist_reports')->with(['prescriptions' => $prescription, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
        }
        elseif(Session::get('accountInfo.position') == 2){
            return view('dchief.C_dchief_reports')->with(['prescriptions' => $prescription, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
        }
    }

    public function reports()
    {
        $medicine = Medicine::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $prescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('day', 'month', 'year')
                        ->groupBy('prescriptions.medicineID')
                        ->where('medicines.medType', '=', 'm')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->get();
        //percentage month
        $percentagePrescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->where('medicines.medType', '=', 'm')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->limit(4)
                        ->get();
        $totalPrescription =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

       if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        //Percentage Year
        $percentagePrescription_year = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

        $percentTopOne_year = 0;
        $percentTopTwo_year = 0;
        $percentTopThree_year = 0;
        $percentTopFour_year = 0;
        $percentOther_year = 0;

        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }
        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));




        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medicineID = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->whereMonth('prescriptions.created_at', '=', $month)
                            ->where('medicines.medType', '=', 'm')
                            ->get();
        $results = array();
        $id = array();
        foreach ($medicineID as $key) {
            $id[] = $key;
            $results[$key['medicineID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medicineID) {
            foreach ($prescription as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    array_push($results[$key['medicineID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }

        //Weekly Sum of medicine
        $percentagePrescription_weekly = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->groupBy('prescriptions.medicineID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->where('medicines.medType', '=', 'm')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->where('medicines.medType', '=', 'm')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medicineID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medicineID'], 'genericName' => $key['genericName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'genericName' => $value['genericName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        
        if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));
        //dd($percentTopOne_weekly);
        return view('physician.C_physician_reports')->with(['prescriptions' => $prescription, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
    }

    public function mChiefReports()
    {
        $medicine = Medicine::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $prescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('day', 'month', 'year')
                        ->groupBy('prescriptions.medicineID')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->get();
        //percentage month
        $percentagePrescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->limit(4)
                        ->get();
        $totalPrescription =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

       if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        //Percentage Year
        $percentagePrescription_year = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

        $percentTopOne_year = 0;
        $percentTopTwo_year = 0;
        $percentTopThree_year = 0;
        $percentTopFour_year = 0;
        $percentOther_year = 0;

        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }
        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));




        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medicineID = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->whereMonth('prescriptions.created_at', '=', $month)
                            ->where('medicines.medType', '=', 'm')
                            ->get();
        $results = array();
        $id = array();
        foreach ($medicineID as $key) {
            $id[] = $key;
            $results[$key['medicineID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medicineID) {
            foreach ($prescription as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    array_push($results[$key['medicineID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }

        //Weekly Sum of medicine
        $percentagePrescription_weekly = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->groupBy('prescriptions.medicineID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->where('medicines.medType', '=', 'm')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->where('medicines.medType', '=', 'm')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medicineID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medicineID'], 'genericName' => $key['genericName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'genericName' => $value['genericName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        
        if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));
        //dd($percentTopOne_weekly);
        return view('chief.C_mchief_reports')->with(['prescriptions' => $prescription, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
    }

     public function nurseMedicineReports()
    {
        $medicine = Medicine::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $prescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->groupBy('day', 'month', 'year')
                        ->groupBy('prescriptions.medicineID')
                        ->orderBy('total', 'desc')
                        ->get();
        //percentage month
        $percentagePrescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->where('medicines.medType', '=', 'm')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->limit(4)
                        ->get();
        $totalPrescription =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

       if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }

        //Percentage Year
        $percentagePrescription_year = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

        $percentTopOne_year = 0;
        $percentTopTwo_year = 0;
        $percentTopThree_year = 0;
        $percentTopFour_year = 0;
        $percentOther_year = 0;

        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }


        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));

        if ($percentOther_year == 100) {
            $percentOther_year = 0;
        }



        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medicineID = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->whereMonth('prescriptions.created_at', '=', $month)
                            ->where('medicines.medType', '=', 'm')
                            ->get();
        $results = array();
        $id = array();
        foreach ($medicineID as $key) {
            $id[] = $key;
            $results[$key['medicineID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medicineID) {
            foreach ($prescription as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    array_push($results[$key['medicineID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }

        //Weekly Sum of medicine
        $percentagePrescription_weekly = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->groupBy('prescriptions.medicineID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->where('medicines.medType', '=', 'm')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->where('medicines.medType', '=', 'm')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medicineID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medicineID'], 'genericName' => $key['genericName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'genericName' => $value['genericName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        
        if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));

        if ($percentOther_weekly == 100) {
            $percentOther_weekly = 0;
        }
        
        return view('nurse.C_nurse_reports')->with(['prescriptions' => $prescription, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
    }
    public function dentistSupplyReports()
    {
         $medicalSupply = MedicalSupply::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $usedMedicalSupply = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                                ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                                ->orderBy('total', 'desc')
                                ->groupBy('day', 'month', 'year')
                                ->groupBy('medsuppliesused.medSupplyID')
                                ->whereMonth('medsuppliesused.created_at', '=', $month)
                                ->get();
        //dd($usedMedicalSupply);

        //percentage month
        $percentagePrescription = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->limit(4)
                        ->get();
        $totalPrescription =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->first();

        if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }


        //Percentage Year
        $percentagePrescription_year = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereYear('medsuppliesused.created_at', '=', $year)
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->first();


        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }


        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));

        if ($percentOther_year == 100) {
            $percentOther_year = 0;
        }





        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medSupplyID = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->whereMonth('medsuppliesused.created_at', '=', $month)
                            ->get();
        $results = array();
        $id = array();
        foreach ($medSupplyID as $key) {
            $id[] = $key;
            $results[$key['medSupplyID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medSuppID) {
            foreach ($usedMedicalSupply as $key) {
                if ($medSuppID['medSupplyID'] == $key['medSupplyID']) {
                    array_push($results[$key['medSupplyID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }
        ///////////////////////////////
         //Weekly Sum of medicine
        $percentagePrescription_weekly = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medSupplyID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medSupplyID'] == $key['medSupplyID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'medSupName' => $value['medSupName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));

        if ($percentOther_weekly == 100) {
            $percentOther_weekly = 0;
        }



       // dd($results);
    if(Session::get('accountInfo.position') == 4){
        return view('dentist.C_dentist_medical_reports')->with(['usedMedSupps' => $usedMedicalSupply, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
    }
    elseif(Session::get('accountInfo.position') == 2){
        return view('dchief.C_dchief_medical_reports')->with(['usedMedSupps' => $usedMedicalSupply, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
    }
    }

    public function supplyReports()
    {
        $medicalSupply = MedicalSupply::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $usedMedicalSupply = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                                ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                                ->orderBy('total', 'desc')
                                ->groupBy('day', 'month', 'year')
                                ->groupBy('medsuppliesused.medSupplyID')
                                ->whereMonth('medsuppliesused.created_at', '=', $month)
                                ->get();
        //dd($usedMedicalSupply);

        //percentage month
        $percentagePrescription = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->limit(4)
                        ->get();
        $totalPrescription =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->first();

        if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }


        //Percentage Year
        $percentagePrescription_year = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereYear('medsuppliesused.created_at', '=', $year)
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereYear('medsuppliesused.created_at', '=', $year)
                        ->first();


        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }


        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));

        if ($percentOther_year == 100) {
            $percentOther_year = 0;
        }





        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medSupplyID = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->whereMonth('medsuppliesused.created_at', '=', $month)
                            ->get();
        $results = array();
        $id = array();
        foreach ($medSupplyID as $key) {
            $id[] = $key;
            $results[$key['medSupplyID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medSuppID) {
            foreach ($usedMedicalSupply as $key) {
                if ($medSuppID['medSupplyID'] == $key['medSupplyID']) {
                    array_push($results[$key['medSupplyID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }
        ///////////////////////////////
         //Weekly Sum of medicine
        $percentagePrescription_weekly = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medSupplyID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medSupplyID'] == $key['medSupplyID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'medSupName' => $value['medSupName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));

        if ($percentOther_weekly == 100) {
            $percentOther_weekly = 0;
        }



       // dd($results);
    return view('physician.C_physician_medical_reports')->with(['usedMedSupps' => $usedMedicalSupply, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
    }

    public function mChiefSupplyReports()
    {
        $medicalSupply = MedicalSupply::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $usedMedicalSupply = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                                ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                                ->orderBy('total', 'desc')
                                ->groupBy('day', 'month', 'year')
                                ->groupBy('medsuppliesused.medSupplyID')
                                ->whereMonth('medsuppliesused.created_at', '=', $month)
                                ->get();
        //dd($usedMedicalSupply);

        //percentage month
        $percentagePrescription = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->limit(4)
                        ->get();
        $totalPrescription =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->first();

       if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }


        //Percentage Year
        $percentagePrescription_year = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereYear('medsuppliesused.created_at', '=', $year)
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereYear('medsuppliesused.created_at', '=', $year)
                        ->first();


        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }


        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));

        if ($percentOther_year == 100) {
            $percentOther_year = 0;
        }





        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medSupplyID = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->whereMonth('medsuppliesused.created_at', '=', $month)
                            ->get();
        $results = array();
        $id = array();
        foreach ($medSupplyID as $key) {
            $id[] = $key;
            $results[$key['medSupplyID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medSuppID) {
            foreach ($usedMedicalSupply as $key) {
                if ($medSuppID['medSupplyID'] == $key['medSupplyID']) {
                    array_push($results[$key['medSupplyID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }
        ///////////////////////////////
         //Weekly Sum of medicine
        $percentagePrescription_weekly = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medSupplyID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medSupplyID'] == $key['medSupplyID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'medSupName' => $value['medSupName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));

        if ($percentOther_weekly == 100) {
            $percentOther_weekly = 0;
        }



       // dd($results);
    return view('chief.C_mchief_medical_reports')->with(['usedMedSupps' => $usedMedicalSupply, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
    }

    public function mChiefPatientReports()
    {
        return view('chief.C_mchief_patient_condition_records');
    }

    public function nurseSuppliesReports()
    {
      $medicalSupply = MedicalSupply::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $usedMedicalSupply = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                                ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                                ->orderBy('total', 'desc')
                                ->groupBy('day', 'month', 'year')
                                ->groupBy('medsuppliesused.medSupplyID')
                                ->whereMonth('medsuppliesused.created_at', '=', $month)
                                ->get();
        //dd($usedMedicalSupply);

        //percentage month
        $percentagePrescription = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->limit(4)
                        ->get();
        $totalPrescription =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->first();

         if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }

        //Percentage Year
        $percentagePrescription_year = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereYear('medsuppliesused.created_at', '=', $year)
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereYear('medsuppliesused.created_at', '=', $year)
                        ->first();


        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }
        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));

        if ($percentOther_year == 100) {
            $percentOther_year = 0;
        }



        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medSupplyID = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->whereMonth('medsuppliesused.created_at', '=', $month)
                            ->get();
        $results = array();
        $id = array();
        foreach ($medSupplyID as $key) {
            $id[] = $key;
            $results[$key['medSupplyID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medSuppID) {
            foreach ($usedMedicalSupply as $key) {
                if ($medSuppID['medSupplyID'] == $key['medSupplyID']) {
                    array_push($results[$key['medSupplyID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }
        ///////////////////////////////
         //Weekly Sum of medicine
        $percentagePrescription_weekly = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medSupplyID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medSupplyID'] == $key['medSupplyID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'medSupName' => $value['medSupName']));
                    $total_weekly += $value['total'];
                }
            }
        }
         if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }

        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));
        if ($percentOther_weekly == 100) {
            $percentOther_weekly = 0;
        }

       // dd($results);
    return view('nurse.C_nurse_medical_reports')->with(['usedMedSupps' => $usedMedicalSupply, 'maxDays' => $numberOfDays, 'results' => $results, 'top1_month' => $percentTopOne_month, 'top2_month' => $percentTopTwo_month, 'top3_month' => $percentTopThree_month, 'top4_month' => $percentTopFour_month, 'topOther_month' => $percentOther_month, 'percent_month' => $percentagePrescription, 'top1_year' => $percentTopOne_year, 'top2_year' => $percentTopTwo_year, 'top3_year' => $percentTopThree_year, 'top4_year' => $percentTopFour_year, 'topOther_year' => $percentOther_year, 'percent_year' => $percentagePrescription_year, 'results_for_month' => $results_for_month,'percentagePrescription_weekly' => $percentagePrescription_weekly, 'top1_weekly' => $percentTopOne_weekly, 'top2_weekly' => $percentTopTwo_weekly, 'top3_weekly' => $percentTopThree_weekly, 'top4_weekly' => $percentTopFour_weekly, 'topOther_weekly' => $percentOther_weekly, 'top_weekly' => $top_weekly]);
    }

    public function printMedicineReportsWeek($currentWeek)
    {
        $medicine = Medicine::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $prescriptions = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('day', 'month', 'year')
                        ->groupBy('prescriptions.medicineID')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->get();
        //percentage month
        $percentagePrescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->limit(4)
                        ->get();
        $totalPrescription =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

        if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }



        //Percentage Year
        $percentagePrescription_year = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

        $percentTopOne_year = 0;
        $percentTopTwo_year = 0;
        $percentTopThree_year = 0;
        $percentTopFour_year = 0;
        $percentOther_year = 0;

        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }


        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));

        if ($percentOther_year == 100) {
            $percentOther_year = 0;
        }




        $maxDays = date('t');
        //get the medicineID of prescribed medicine
        $medicineID = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->whereMonth('prescriptions.created_at', '=', $month)
                            ->where('medicines.medType', '=', 'm')
                            ->get();
        $results = array();
        $id = array();
        foreach ($medicineID as $key) {
            $id[] = $key;
            $results[$key['medicineID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medicineID) {
            foreach ($prescriptions as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    array_push($results[$key['medicineID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }

        //Weekly Sum of medicine
        $percentagePrescription_weekly = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->groupBy('prescriptions.medicineID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->where('medicines.medType', '=', 'm')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medicineID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medicineID'], 'genericName' => $key['genericName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'genericName' => $value['genericName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        // $percentTopOne_weekly = 0;
        // $percentTopTwo_weekly = 0;
        // $percentTopThree_weekly = 0;
        // $percentTopFour_weekly = 0;
        // $percentOther_weekly = 0;

       if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));

        if ($percentOther_weekly == 100) {
            $percentOther_weekly = 0;
        }

        
      
        $pdf = PDF::loadView('reports.medicine_reports_weekly', compact('prescriptions', 'results_for_month', 'percentagePrescription_weekly','percentTopOne_month', 'percentTopTwo_month', 'percentTopThree_month','percentTopFour_month', 'percentOther_month', 'percentagePrescription', 'percentTopOne_year', 'percentTopTwo_year', 'percentTopThree_year', 'percentTopFour_year', 'percentOther_year', 'percentagePrescription_year', 'percentagePrescription_weekly', 'percentTopOne_weekly', 'percentTopTwo_weekly', 'percentTopThree_weekly', 'percentTopFour_weekly', 'percentOther_weekly', 'top_weekly', 'month', 'results', 'maxDays', 'currentWeek'))->setPaper('legal','landscape');
        return $pdf->stream('reports.medicine_reports_weekly');
    }

    public function printMedicineReports($month)
    {
        $medicine = Medicine::all();
       // $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $prescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('day', 'month', 'year')
                        ->groupBy('prescriptions.medicineID')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->get();
        //percentage month
        $percentagePrescription = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->limit(4)
                        ->get();
        $totalPrescription =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

        if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }


        //Percentage Year
        $percentagePrescription_year = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('prescriptions.medicineID')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->limit(4)
                        ->get();
        $totalPrescription_year =  Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), 'prescriptions.*')
                        ->whereYear('prescriptions.created_at', '=', $year)
                        ->where('medicines.medType', '=', 'm')
                        ->first();

        $percentTopOne_year = 0;
        $percentTopTwo_year = 0;
        $percentTopThree_year = 0;
        $percentTopFour_year = 0;
        $percentOther_year = 0;

        if (isset($percentagePrescription_year[0])) {
            $percentTopOne_year = intval(($percentagePrescription_year[0]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopOne_year = 0;
        }
        
        if (isset($percentagePrescription_year[1]->total)) {
            $percentTopTwo_year = intval(($percentagePrescription_year[1]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopTwo_year = 0;
        }

        if (isset($percentagePrescription_year[2]->total)) {
            $percentTopThree_year = intval(($percentagePrescription_year[2]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopThree_year = 0;
        }

        if (isset($percentagePrescription_year[3]->total)) {
            $percentTopFour_year = intval(($percentagePrescription_year[3]->total / $totalPrescription_year->total) * 100);
        }
        else{
            $percentTopFour_year = 0;
        }


        $percentOther_year = intval(100 - ($percentTopOne_year + $percentTopTwo_year + $percentTopThree_year+ $percentTopFour_year));

        if ($percentOther_year == 100) {
            $percentOther_year = 0;
        }




        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medicineID = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->whereMonth('prescriptions.created_at', '=', $month)
                            ->get();
        $results = array();
        $id = array();
        foreach ($medicineID as $key) {
            $id[] = $key;
            $results[$key['medicineID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medicineID) {
            foreach ($prescription as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    array_push($results[$key['medicineID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }

        //Weekly Sum of medicine
        $percentagePrescription_weekly = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(prescriptions.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month, DAY(prescriptions.created_at) day'), 'prescriptions.*', 'medicines.*')
                        ->groupBy('prescriptions.medicineID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->whereMonth('prescriptions.created_at', '=', $month)
                        ->where('medicines.medType', '=', 'm')
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = Prescription::join('medicines', 'medicines.medicineID', '=', 'prescriptions.medicineID')
                            ->select('prescriptions.medicineID')
                            ->groupBy('prescriptions.medicineID')
                            ->where('medicines.medType', '=', 'm')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medicineID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medicineID'] == $key['medicineID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medicineID'], 'genericName' => $key['genericName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medicineID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medicineID'], 'genericName' => $key['genericName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'genericName' => $value['genericName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        // $percentTopOne_weekly = 0;
        // $percentTopTwo_weekly = 0;
        // $percentTopThree_weekly = 0;
        // $percentTopFour_weekly = 0;
        // $percentOther_weekly = 0;

       if (isset($top_weekly[0]['total'])) {
            $percentTopOne_weekly = intval(($top_weekly[0]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopOne_weekly = 0;
        }
        if (isset($top_weekly[1]['total'])) {
            $percentTopTwo_weekly = intval(($top_weekly[1]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopTwo_weekly = 0;
        }    
        if (isset($top_weekly[2]['total'])) {
            $percentTopThree_weekly = intval(($top_weekly[2]['total'] / $total_weekly) * 100);
        }
        else{
            $percentTopThree_weekly = 0;
        }
        if (isset($top_weekly[3]['total'])) {
            $percentTopFour_weekly = intval(($top_weekly[3]['total'] / $total_weekly) * 100);
        }     
        else{
            $percentTopFour_weekly = 0;
        }
        $percentOther_weekly = intval(100 - ($percentTopOne_weekly + $percentTopTwo_weekly + $percentTopThree_weekly+ $percentTopFour_weekly));

        if ($percentOther_weekly == 100) {
            $percentOther_weekly = 0;
        }

        
      
        $pdf = PDF::loadView('reports.medicine_reports', compact('prescription', 'results_for_month', 'percentagePrescription_weekly','percentTopOne_month', 'percentTopTwo_month', 'percentTopThree_month','percentTopFour_month', 'percentOther_month', 'percentagePrescription', 'percentTopOne_year', 'percentTopTwo_year', 'percentTopThree_year', 'percentTopFour_year', 'percentOther_year', 'percentagePrescription_year', 'percentagePrescription_weekly', 'percentTopOne_weekly', 'percentTopTwo_weekly', 'percentTopThree_weekly', 'percentTopFour_weekly', 'percentOther_weekly', 'top_weekly', 'month'))->setPaper('legal','landscape');
        return $pdf->stream('reports.medicine_reports');

    }

    public function printMedicalReports($month)
    {
        $medicalSupply = MedicalSupply::all();
        //$month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $usedMedicalSupply = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                                ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                                ->orderBy('total', 'desc')
                                ->groupBy('day', 'month', 'year')
                                ->groupBy('medsuppliesused.medSupplyID')
                                ->whereMonth('medsuppliesused.created_at', '=', $month)
                                ->get();
        //dd($usedMedicalSupply);

        //percentage month
        $percentagePrescription = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->limit(4)
                        ->get();
        $totalPrescription =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->first();

        if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }


        $numberOfDays = date('t');
        //get the medicineID of prescribed medicine
        $medSupplyID = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->whereMonth('medsuppliesused.created_at', '=', $month)
                            ->get();
        $results = array();
        $id = array();
        foreach ($medSupplyID as $key) {
            $id[] = $key;
            $results[$key['medSupplyID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medSuppID) {
            foreach ($usedMedicalSupply as $key) {
                if ($medSuppID['medSupplyID'] == $key['medSupplyID']) {
                    array_push($results[$key['medSupplyID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }
        ///////////////////////////////
         //Weekly Sum of medicine
        $percentagePrescription_weekly = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medSupplyID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medSupplyID'] == $key['medSupplyID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'medSupName' => $value['medSupName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        

        $pdf = PDF::loadView('reports.medical_reports', compact('usedMedicalSupply', 'results_for_month', 'percentagePrescription_weekly','month'))->setPaper('legal','landscape');
        return $pdf->stream('reports.medicine_reports');
    }

    public function printMedicalReportsWeek($currentWeek)
    {
        $medicalSupply = MedicalSupply::all();
        $month = date('m');
        $year = date('Y');
        //query for the total of each prescribed medicine for the current month
        $usedMedSupps = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                                ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                                ->orderBy('total', 'desc')
                                ->groupBy('day', 'month', 'year')
                                ->groupBy('medsuppliesused.medSupplyID')
                                ->whereMonth('medsuppliesused.created_at', '=', $month)
                                ->get();
        //dd($usedMedicalSupply);

        //percentage month
        $percentagePrescription = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsupplies.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsupplies.created_at) year, MONTH(medsupplies.created_at) month, DAY(medsupplies.created_at) day'), 'medsupplies.*', 'medsupplies.*')
                        ->orderBy('total', 'desc')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->limit(4)
                        ->get();
        $totalPrescription =  UsedMedSupply::select(DB::raw("SUM(quantity) as total"), 'medsuppliesused.*')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->first();

        if (isset($percentagePrescription[0]->total)) {
            $percentTopOne_month = intval(($percentagePrescription[0]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopOne_month = 0;
        }

        if (isset($percentagePrescription[1]->total)) {
            $percentTopTwo_month = intval(($percentagePrescription[1]->total / $totalPrescription->total) * 100);
        }
        else{
            $percentTopTwo_month = 0;
        }
        
        if (isset($percentagePrescription[2]->total)) {
            $percentTopThree_month = intval(($percentagePrescription[2]->total / $totalPrescription->total) * 100);
        }
        
        else{
            $percentTopThree_month = 0;
        }
       
        if (isset($percentagePrescription[3]->total)) {
            $percentTopFour_month = intval(($percentagePrescription[3]->total / $totalPrescription->total) * 100);
        }

        else{
            $percentTopFour_month = 0;
        }
       
        $percentOther_month = intval(100 - ($percentTopOne_month + $percentTopTwo_month + $percentTopThree_month + $percentTopFour_month));

        if ($percentOther_month == 100) {
            $percentOther_month = 0;
        }


        $maxDays = date('t');
        //get the medicineID of prescribed medicine
        $medSupplyID = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->whereMonth('medsuppliesused.created_at', '=', $month)
                            ->get();
        $results = array();
        $id = array();
        foreach ($medSupplyID as $key) {
            $id[] = $key;
            $results[$key['medSupplyID']] = array();
        }
        //save into one array if medicineID is the same
        foreach ($id as $medSuppID) {
            foreach ($usedMedSupps as $key) {
                if ($medSuppID['medSupplyID'] == $key['medSupplyID']) {
                    array_push($results[$key['medSupplyID']], array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year']));
               }

            }
        }
        ///////////////////////////////
         //Weekly Sum of medicine
        $percentagePrescription_weekly = UsedMedSupply::join('medsupplies', 'medsupplies.medSupID', '=', 'medsuppliesused.medSupplyID')
                        ->select(DB::raw("SUM(quantity) as total"), DB::raw("DATE_FORMAT(medsuppliesused.created_at, '%m-%d-%Y') new_date"), DB::raw('YEAR(medsuppliesused.created_at) year, MONTH(medsuppliesused.created_at) month, DAY(medsuppliesused.created_at) day'), 'medsuppliesused.*', 'medsupplies.*')
                        ->groupBy('medsuppliesused.medSupplyID')
                        ->groupBy('month', 'year')
                        ->orderBy('total', 'desc')
                        ->whereMonth('medsuppliesused.created_at', '=', $month)
                        ->get();

        $id_for_month = array();
        $results_for_month = array();
        //get the medicineID of prescribed medicine
        $medicineID_for_month = UsedMedSupply::select('medSupplyID')
                            ->groupBy('medSupplyID')
                            ->get();

        foreach ($medicineID_for_month as $key) {
            $id_for_month[] = $key;
            $results_for_month[$key['medSupplyID']] = array();
        }
         //save into one array if medicineID is the same
        foreach ($id_for_month as $medicineID) {
            foreach ($percentagePrescription_weekly as $key) {
                if ($medicineID['medSupplyID'] == $key['medSupplyID']) {
                    if ($key['day'] >= 1 && $key['day'] <= 7 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '1', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName'] ));
                    }
                    elseif ($key['day'] >= 8 && $key['day'] <= 14 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '2', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 15 && $key['day'] <= 21 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '3', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 22 && $key['day'] <= 28 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '4', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
                    elseif ($key['day'] >= 29 && $key['day'] <= 31 && $key['year'] == $year) {
                        array_push($results_for_month[$key['medSupplyID']],array('day' => $key['day'], 'total' => $key['total'], 'month' => $key['month'], 'year' => $key['year'], 'week' => '5', 'id' => $key['medSupplyID'], 'medSupName' => $key['medSupName']));
                    }
               }

            }
        }
        $weekNow = 0;
        if (date('d') >= 1 && date('d') <= 7) {
            $weekNow = 1;
        }
        elseif (date('d') >= 8 && date('d') <= 14) {
            $weekNow = 2;
        }
        elseif (date('d') >= 15 && date('d') <= 21) {
            $weekNow = 3;
        }
        elseif (date('d') >= 22 && date('d') <= 28) {
            $weekNow = 4;
        }
        elseif (date('d') >= 29 && date('d') <= 31) {
            $weekNow = 5;
        }
       // dd($results_for_month);
        $top_weekly = array();
        $total_weekly = 0;
        foreach($results_for_month as $key => $medicine){
            foreach($medicine as $index => $value){
                if($value['week'] == $weekNow && $value['month'] == $month && $value['year'] == $year){
                    array_push($top_weekly, array('id' => $value['id'], 'total' => $value['total'], 'medSupName' => $value['medSupName']));
                    $total_weekly += $value['total'];
                }
            }
        }
        

        $pdf = PDF::loadView('reports.medical_reports_weekly', compact('usedMedSupps', 'results_for_month', 'percentagePrescription_weekly','month','currentWeek', 'results', 'maxDays'))->setPaper('legal','landscape');
        return $pdf->stream('reports.medicine_reports');
    }
}
