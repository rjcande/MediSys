<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function showLoginPage(){
        return view('accounts.login');
    }
    public function showCreateAccPage(){
        return view('accounts.create_account');
    }
    public function showVerificationPage(){
        return view('accounts.verification');
    }
    public function dentalchiefDashboard(){
        return view('dentalchief.C_dentalchief_dashboard');
    }
    public function medicalchiefDashboard(){
        return view('medicalchief.C_medicalchief_dashboard');
    }
    public function dentistDashboard(){
        return view('dentist.C_dentist_dashboard');
    }
    public function physicianDashboard(){
        return view('physician.C_physician_dashboard');
    }
    public function nurseDashboard(){
        return view('nurse.C_nurse_dashboard');
    }
}
