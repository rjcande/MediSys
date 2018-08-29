<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/sample', function(){
	return view('nurse.sample');
});

Route::get('/', function(){
	return view('login');
});

Route::get('/logout', 'AccountsController@logout');

Route::get('/create/new/account', function(){
	return view('register_account');
});

Route::get('/save/account', 'AccountsController@store');

Route::post('/login/user', 'AccountsController@show');

/*
 * Nurse Route
 *
 */



Route::get('/nurse/dashboard', 'DashboardController@nurseDashboard');

Route::get('/nurse/medical/supplies/reports', 'DashboardController@nurseSuppliesReports');

Route::get('/nurse/medicine/reports', 'DashboardController@nurseMedicineReports');

Route::get('physician/patient/condition/reports', function(){
	return view('physician.C_physician_patient_condition_records');
});


Route::get('/patient/list', 'PatientController@index');

Route::get('/register/patient', function(){
	return view('nurse.register_patient');
});

Route::get('/nurse/medical/log', 'ClinicLogController@index');

Route::get('/nurse/medical/Log/autocomplete/', 'ClinicLogController@autocomplete');

Route::post('/addPatient', 'PatientController@store')->name('add.patient');

Route::get('/nurse/medical/Log/autocomplete/name', 'ClinicLogController@autocompleteName');

Route::get('/get/med/brand', 'MedicineController@brand');

Route::get('/get/med/unit', 'MedicineController@unit');

Route::get('/get/medSupp/brand', 'MedicalSupplyController@brand');

Route::get('/get/medSupp/unit', 'MedicalSupplyController@unit');

Route::get('/personal/info/{id}', 'PatientController@show')->name('personal.info');

Route::get('/nurse/medical/log/each/{id}', 'ClinicLogController@showMedicalLogNurse')->name('nurse.medical.log.each');

Route::get('/nurse/log/patient', 'ClinicLogController@passToPrescription')->name('nurse.log.patient');

Route::get('/nurse/log/patient/create', 'ClinicLogController@create')->name('nurse.log.patient.create');

Route::get('/nurse/request/letter/certification', 'ClinicLogController@requestLetterCertification')->name('nurse.request.letter.certification');

Route::get('/nurse/log/patient/save', 'ClinicLogController@store')->name('nurse.log.patient.save');

Route::get('/nurse/set/timeout/{id}', 'ClinicLogController@timeOut');

Route::get('/nurse/vital/signs/save/{id}', 'VitalSignsController@update');

//Route::get('/nurse/patient/more/info/{id}', 'ClinicLogController@showMedicalLogMoreInfo')->name('nurse.patient.more.info');

Route::get('/nurse/patient/medical/log/edit/{id}', 'ClinicLogController@edit')->name('nurse.patient.medical.log.edit');

Route::get('/nurse/patient/medical/log/edit/clinicLogID/{id}', 'ClinicLogController@checkSymptomsAndPrescription');

Route::get('/nurse/medical/log/certificate/edit{id}', 'LogReferralsController@edit')->name('nurse.medical.log.certificate.edit');

Route::get('/nurse/delete/medicine', 'MedicineController@destroy');

Route::get('/nurse/delete/medical/supply', 'MedicalSupplyController@destroy');

Route::get('/nurse/delete/clinic/log/{id}', 'ClinicLogController@destroy');

Route::get('/nurse/patient/medical/log/edit/save/{id}', 'ClinicLogController@update')->name('nurse.patient.medical.log.edit.save');

Route::get('/update/patient/info/{id}', 'PatientController@edit')->name('update.patient.info');

Route::post('/updatePatient/{id}', 'PatientController@update')->name('update.patient');

Route::post('/addPatient', 'PatientController@store')->name('nurse.add.patient');

Route::get('/deletePatient/{id}', 'PatientController@destroy');

Route::get('/nurse/maintenance/medicine', 'MedicineController@create');

Route::get('save/medicine', 'MedicineController@store');

Route::get('/edit/medicine', 'MedicineController@update');

Route::get('/delete/medicine/{id}', 'MedicineController@delete');

Route::get('/nurse/maintenance/medical/supply', 'MedicalSupplyController@create');

Route::get('save/medical/supply', 'MedicalSupplyController@store');

Route::get('edit/medical/supply', 'MedicalSupplyController@update');

Route::get('/delete/medical/supply/{id}', 'MedicalSupplyController@delete');

Route::get('/nurse/get/medical/certificate', 'LogReferralsController@medicalCertificate');

Route::get('/nurse/generate/pdf/prescription/{id}', 'PrescriptionController@generatePdf')->name('nurse.generate.pdf.prescription');


/*
 * Physician Route
 *
 */
Route::get('/physician/dashboard', 'DashboardController@physicianDashboard');

Route::get('/physician/delete/appointment/{id}', 'DashboardController@destroy');

Route::get('/physician/medicine/reports', 'DashboardController@reports');

Route::get('/physician/medical/supplies/reports', 'DashboardController@supplyReports');

Route::get('/physician/patient/list', 'PatientController@indexOfPhysician');

Route::get('/physician/medical/log', 'ClinicLogController@indexOfPhysician');

Route::get('/physician/referred/patients', 'LogReferralsController@index');

Route::get('/physician/last/referral/id', 'LogReferralsController@getLastReferralID');

Route::get('/physician/consult/diagnosis/{id}/{patientID}', 'LogReferralsController@accept')->name('physician.consult.diagnosis');

Route::get('/physician/patient/records', function(){
	return view('physician.C_physician_patient_record');
});

Route::get('/physician/patient/more/info/{id}', 'PatientController@showOfPhysician')->name('physician.patient.more.info');

Route::get('/physician/patient/logs/{id}', 'ClinicLogController@showMedicalLog');

Route::get('/physician/emergency', function(){
	return view('physician.C_physician_emergency');
});

Route::get('/physician/certification/{patientName}/{id}/{logReferralID}', 'LogReferralsController@medCertEnrollment')->name('physician.certification');

Route::get('/physician/consult/{id}/{clinicLogID}', 'MedicalHistoriesController@create')->name('physician.consult');

Route::get('/physician/create/medical/history/{id}', 'MedicalHistoriesController@store');

Route::get('/physician/update/medical/history/{id}', 'MedicalHistoriesController@update');

Route::get('/physician/refer/patient/outside', 'OutsideReferralsController@store');

Route::get('/physician/edit/history', function(){
	return view('physician.C_physician_patient_edit_history');
});

Route::get('physician/patient/record', 'DiagnosesController@index');

Route::get('/physician/view/history/{id}/{clinicLogID}', 'MedicalHistoriesController@show')->name('physician.view.history');

// Route::get('/physician/patient/diagnoses', function(){
// 	return view('physician.C_physician_referred_patient_diagnosis');
// });


Route::get('/physician/med/cert/enrollment', 'LogReferralsController@medCertEnrollment')->name('physician.med.cert.enrollment');

Route::get('/physician/referred/patient/diagnosis/{id}', 'ClinicLogController@showPhysicianPatientDiagnosis')->name('physician.referred.patient.diagnosis');

Route::get('/physician/referred/patient/referrals/{id}', 'OutsideReferralsController@showPhysicianReferral')->name('physician.referred.patient.referrals');

Route::get('/physician/referred/patient/diagnoses/edit/{id}', 'ClinicLogController@editPatientDiagnoses');

Route::get('/physician/patient/diagnoses/{id}', 'ClinicLogController@consultation')->name('physician.patient.diagnoses');

Route::get('/physician/patient/diagnosis/{id}', 'ClinicLogController@showPatientDiagnosis')->name('physician.patient.diagnosis');

Route::get('/physician/patient/referrals/{id}', 'OutsideReferralsController@showReferral')->name('physician.patient.referrals');

Route::get('/physician/referred/patient/diagnoses/{id}', 'ClinicLogController@consultationPhysician')->name('physician.referred.patient.diagnoses');

Route::get('/physician/decline/referred/patient/{id}', 'LogReferralsController@decline');

Route::get('/physician/save/diagnosis', 'DiagnosesController@store');

Route::get('/physician/generate/pdf/medical/cert/enrollment/{id}/{patientName}', 'LogReferralsController@generateMedCertEnrollment')->name('physician.generate.pdf.medical.cert.enrollment');

Route::get('/physician/generate/pdf/medical/cert/ojt/off_campus/{id}/{patientName}', 'LogReferralsController@generateMedCertOjtOffCampus')->name('physician.generate.pdf.medical.cert.ojt.off_campus');

Route::get('/physician/generate/pdf/medical/cert/admin/{id}/{patientName}', 'LogReferralsController@generateMedCertAdmin')->name('physician.generate.pdf.medical.cert.admin');

Route::get('/physician/generate/pdf/excuse/letter/{id}/{patientName}', 'LogReferralsController@generateExcuseLetter')->name('physician.generate.pdf.excuse.letter');

Route::get('/physician/generate/pdf/waver/{id}/{patientName}', 'LogReferralsController@generateWaver')->name('physician.generate.pdf.waver');

Route::get('/physician/update/log/referrals/{id}', 'LogReferralsController@update');

Route::get('/physician/generate/outside/referral/{id}/{patientName}', 'OutsideReferralsController@generateOutsideReferral')->name('physician.generate.outside.referral');



/*
 * Chief Route
 *
 */

// Route::get('/chief/patient/list', 'PatientController@indexOfChief');

// Route::get('/chief/medical/log', 'ClinicLogController@indexOfChief');

// Route::get('/chief/patient/more/info/{id}', 'PatientController@showOfPhysician')->name('chief.patient.more.info');

// -------------------------------------------------------------------------------------------------------------------------
Route::get('/mchief/dashboard', 'DashboardController@mChiefDashboard');

Route::get('/mchief/medicine/reports', 'DashboardController@mChiefReports');

Route::get('/mchief/medical/supplies/reports', 'DashboardController@mChiefSupplyReports');

Route::get('/mchief/patient/condition/reports', 'DashboardController@mChiefPatientReports');

Route::get('/mchief/delete/appointment/{id}', 'DashboardController@mChiefDestroy');

Route::get('/mchief/patient/list', 'PatientController@indexOfMChief');

Route::get('/mchief/patient/more/info/{id}', 'PatientController@showOfMChief')->name('mchief.patient.more.info');

Route::get('/mchief/patient/diagnoses/{id}', 'ClinicLogController@mChiefConsultation')->name('mchief.patient.diagnoses');

Route::get('/mchief/medical/log', 'ClinicLogController@indexOfMChief');

Route::get('/mchief/referred/patients', 'LogReferralsController@indexOfMChief');

Route::get('/mchief/last/referral/id', 'LogReferralsController@mChiefGetLastReferralID');

Route::get('/mchief/consult/diagnosis/{id}/{patientID}', 'LogReferralsController@mChiefAccept')->name('mchief.consult.diagnosis');

Route::get('/mchief/patient/records', function(){
	return view('chief.C_mchief_patient_record');
});

Route::get('/mchief/patient/logs/{id}', 'ClinicLogController@showMedicalLogMChief');

Route::get('/mchief/certification/{patientName}/{id}/{logReferralID}', 'LogReferralsController@medCertEnrollment')->name('mchief.certification');

Route::get('/mchief/consult/{id}/{clinicLogID}', 'MedicalHistoriesController@mChiefCreate')->name('mchief.consult');

Route::get('/mchief/create/medical/history/{id}', 'MedicalHistoriesController@mChiefStore');

Route::get('/mchief/update/medical/history/{id}', 'MedicalHistoriesController@mChiefUpdate');

Route::get('/mchief/refer/patient/outside', 'OutsideReferralsController@mChiefStore');

Route::get('/mchief/edit/history', function(){
	return view('chief.C_mchief_patient_edit_history');
});

Route::get('mchief/patient/record', 'DiagnosesController@indexOfMChief');

Route::get('/mchief/view/history/{id}/{clinicLogID}', 'MedicalHistoriesController@mChiefShow')->name('mchief.view.history');

Route::get('/mchief/med/cert/enrollment', 'LogReferralsController@medCertEnrollmentMChief')->name('mchief.med.cert.enrollment');

Route::get('/mchief/referred/patient/diagnosis/{id}', 'ClinicLogController@showPhysicianPatientDiagnosisMChief')->name('mchief.referred.patient.diagnosis');

Route::get('/mchief/referred/patient/referrals/{id}', 'OutsideReferralsController@showPhysicianReferralMChief')->name('mchief.referred.patient.referrals');

Route::get('/mchief/referred/patient/diagnoses/edit/{id}', 'ClinicLogController@editPatientDiagnosesMChief');

Route::get('/mchief/patient/diagnosis/{id}', 'ClinicLogController@showPatientDiagnosisMChief')->name('mchief.patient.diagnosis');

Route::get('/mchief/patient/referrals/{id}', 'OutsideReferralsController@mchiefPatientReferrals')->name('mchief.patient.referrals');

Route::get('/mchief/referred/patient/diagnoses/{id}', 'ClinicLogController@consultationPhysicianMChief')->name('mchief.referred.patient.diagnoses');

Route::get('/mchief/decline/referred/patient/{id}', 'LogReferralsController@mChiefDecline');

Route::get('/mchief/save/diagnosis', 'DiagnosesController@mChiefStore');

Route::get('/mchief/generate/pdf/medical/cert/enrollment/{id}/{patientName}', 'LogReferralsController@generateMedCertEnrollmentMChief')->name('mchief.generate.pdf.medical.cert.enrollment');

Route::get('/mchief/generate/pdf/medical/cert/ojt/off_campus/{id}/{patientName}', 'LogReferralsController@generateMedCertOjtOffCampusMChief')->name('mchief.generate.pdf.medical.cert.ojt.off_campus');

Route::get('/mchief/generate/pdf/medical/cert/admin/{id}/{patientName}', 'LogReferralsController@generateMedCertAdminMChief')->name('mchief.generate.pdf.medical.cert.admin');

Route::get('/mchief/generate/pdf/excuse/letter/{id}/{patientName}', 'LogReferralsController@generateExcuseLetterMChief')->name('physician.generate.pdf.excuse.letter');

Route::get('/mchief/generate/pdf/waver/{id}/{patientName}', 'LogReferralsController@generateWaverMChief')->name('physician.generate.pdf.waver');

Route::get('/mchief/update/log/referrals/{id}', 'LogReferralsController@mChiefUpdate');
// -------------------------------------------------------------------------------------------------------------------------
//===========================================================================================================================

// Global Routes

// Route::get('/', 'GlobalController@showLoginPage')->name('showLoginPage');

// Route::get('/login', 'GlobalController@showLoginPage')->name('showLoginPage');

Route::post('/showUser', 'BothChiefsController@show')->name('showUser');

Route::get('/account/create', 'GlobalController@showCreateAccPage')->name('createAccount');

Route::post('/account/save', 'BothChiefsController@store')->name('saveAccount');

// Route::get('/logout', 'BothChiefsController@logout')->name('logoutUser');

//===========================================================================================================================

// Account Verification Routes

Route::get('/showVerificationPage', 'GlobalController@showVerificationPage')->name('showVerificationPage');

Route::get('/verifyAccount', 'BothChiefsController@verifyAccount')->name('verifyAccount');

Route::get('/verifySingleAccount/{userID}', 'BothChiefsController@verifySingleAccount')->name('verifySingleAccount');

Route::post('/verifyCode', 'BothChiefsController@verifyCode')->name('verifyCode');





//===========================================================================================================================

// Medical Chief Routes

Route::get('/mchief/patient/referrals/{id}', 'OutsideReferralsController@mchiefPatientReferrals')->name('mchief.patient.referrals');

Route::get('/mchief/patient/condition/reports', 'DashboardController@mChiefPatientReports');

Route::get('/medicalchief/accounts_maintenance', 'MedicalChiefController@maintainAccounts')->name('maintainAccounts');

Route::get('/medicalchief/medicines_maintenance', 'MedicalChiefController@maintainMedicines')->name('maintainMedicines');

Route::get('/medicalchief/medical_supplies_maintenance', 'MedicalChiefController@maintainMedSupplies')->name('maintainMedSupplies');

Route::get('/medicalchief/generate_verification_code/{userID}','MedicalChiefController@generateCode')->name('generateCode');

Route::get('/medicalchief/decline_account/{userID}','MedicalChiefController@declineAccount')->name('declineAccount');

Route::get('/medicalchief/delete_account/{userID}','MedicalChiefController@deleteAccount')->name('deleteAccount');

Route::get('/medicalchief/getLastUserID','MedicalChiefController@getlastUserID')->name('getLastUserID');



//=======================================================================================================
// Dentist Routes
//////////////DENTIST
///////////////// BAGO

Route::get('dentist/patient/condition/reports', function(){
	return view('dentist.C_dentist_patient_condition_records');
});

Route::get('dentist/medicine/reports', function(){
	return view('dentist.C_dentist_reports');
});

Route::get('dentist/dental/supplies/reports', function(){
	return view('dentist.C_dentist_dental_reports');
});
///////////////// BAGO

//Routes
Route::get('/dentist/Dashboard', function(){
	return view('dentist.C_dentist_dashboard');
});

//Controllers
Route::get('/dentist/dentalchart','DentalChartsController@create')->name('dentist.dentalchart');

Route::get('/dentist/dentalchart/each/{toothNum}','DentalChartsController@eachtooth')->name('dentist.dentalchart.each');

Route::get('/dentist/dentalchart/view/{id}', 'DentalChartsController@view')->name('dentist.dentalchart.view');

Route::get('/dentist/dentalchart/deleteToothCondition/{id}','DentalChartsController@delete')->name('dentist.dentalchart.deleteToothCon');

Route::post('/dentist/dentalchart/store/{id}','DentalChartsController@store')->name('dentist.dentalchart.store');

Route::get('/dentist/PatientList','DentalPatientController@index');

Route::get('/dentist/PatientRecord', 'DentalPatientController@dentalPatientRecords');

Route::get('/dentist/patient/ViewMore/{id}', 'DentalPatientController@show')->name('dentist.patientList.viewMore');

Route::get('/dentist/DentalLog','DentalLogController@index');

Route::get('/dentist/create/patientRecord', 'DentalPatientController@create')->name('dentist.create.patient');

Route::post('/dentist/add/patient', 'DentalPatientController@store')->name('dentist.add.patient');

Route::get('/dentist/patient/prescription/{id}', 'DentalLogController@patientPrescription')->name('dentist.patient.prescription');

Route::get('/dentist/DentalForm/Autocomplete', 'DentalHistoryController@autocomplete');

Route::get('/dentist/dentalform/autocomplete/name', 'DentalHistoryController@autocompleteName');

Route::get('/dentist/select/concern', 'DentalLogController@redirectConcern')->name('dentist.redirect.via.concern');

Route::get('/dentist/patient/certification', 'DentalLogController@requestLetterCertification')->name('dentist.letter.requesting');

Route::get('/dentist/dental/certificate', 'DentalCertificateController@show')->name('dentist.dental.certification');
/////////////////////////////////////////////////////////////////////////////// BAGO
Route::get('/dentist/dental/certificate/save', 'DentalLogController@saveRequestLetterCertification')->name('dentist.save.letter.request');

Route::get('/dentist/outside/referralSlip', 'DentalCertificateController@showOutsideRefer')->name('dentist.referral.slip');
////////////////////////////////////////////////////////////////////////////// BAGO
Route::get('/dentist/log/patient/redir', 'DentalLogController@redirectPatient')->name('dentist.redirect.patient');// MADE THIS FOR REDIRECTION AFTER DENTAL HISTORY

Route::get('/dentist/log/patient/each', 'DentalLogController@medicalLogCreate')->name('dentist.each.log.create');

Route::get('/dentist/log/patient/store', 'DentalLogController@store')->name('dentist.log.patient.store');

Route::get('/dentist/delete/dental/log/{id}','DentalLogController@destroy')->name('dentist.delete.dental.log');

Route::get('/dentist/DentalLog/MoreInfo/{id}', 'DentalLogController@show')->name('dentist.dentalLog.moreInfo');

Route::get('/dentist/DentalLog/edit/{id}', 'DentalLogController@edit')->name('dentist.dentalLog.edit'); // PROTOTYPE

Route::get('/dentist/DentalLog/update/{id}', 'DentalLogController@update');//PROTOTYPE

Route::get('/dentist/Prescription/{id}', 'PrescriptionController@index')->name('dentalLog.store');

Route::post('/updateLogPatient', 'PrescriptionController@update');

Route::get('/get/medicine/brand', 'MedicineController@getBrandName');

Route::get('/get/medSupply/brand', 'MedicalSuppliesController@getMedicalSupply');

Route::get('/dentist/dental/log/each/{id}', 'DentalLogController@consultationsAllDentists')->name('dentist.consultation.to.all.dentists');

Route::get('/dentist/patient/consultations/{id}', 'DentalPatientController@patientConsultations')->name('dentist.patient.consultations');

Route::get('/dentist/dental/HistoryForm/view/{id}', 'DentalHistoryController@showDentalHistory')->name('dentist.view.dental.history');

Route::get('/dentist/dental/HistoryForm', 'DentalHistoryController@index');

Route::get('/dentist/dental/HistoryForm/store', 'DentalHistoryController@store')->name('dentist.HistoryForm.store');

Route::get('/dentist/dental/HistoryForm/edit/{id}', 'DentalHistoryController@edit')->name('dentist.HistoryForm.edit');

Route::get('/dentist/dental/HistoryForm/update/{id}', 'DentalHistoryController@update')->name('dentist.HistoryForm.update');

Route::get('/dental/log/timeOut/{id}', 'DentalLogController@timeout')->name('dentalLog.timeOut');

Route::get('/dentist/vital/signs/{id}', 'VitalSignsController@edit')->name('dentist.vitalSigns.index');

Route::get('/dentist/vital/store', 'VitalSignsController@store')->name('dentist.vitalSigns.store');

Route::get('/dentist/show/consultations/{id}', 'DentalLogController@showAllConsultations')->name('dentist.show.all.consultations');

Route::get('/dentist/generate/prescription/{id}', 'DentalCertificateController@generatePdf')->name('dentist.generate.prescription');

/////////////NURSE

//Routes
Route::get('/nurseDashboard', function(){
	return view('nurse.dashboard');
});

Route::get('/patientList', function(){
	return view('nurse.patient_list');
});

//CONTROLLERS
Route::get('/nurseMedicalLog', 'PatientController@index');




//DENTAL CHIEF--------------------------------------------------------------------------------------------------------------
Route::get('dchief/patient/condition/reports', function(){
	return view('dchief.C_dchief_patient_condition_records');
});

Route::get('dchief/medicine/reports', function(){
	return view('dchief.C_dchief_reports');
});

Route::get('dchief/supplies/reports', function(){
	return view('dchief.C_dchief_medical_reports');
});

Route::get('/dchief/dashboard', function(){
	return view('dchief.C_dchief_dashboard');
});

Route::get('/dchief/dentalchart','DentalChartsController@dChiefCreate')->name('dchief.dentalchart');

Route::get('/dchief/dentalchart/each/{toothNum}','DentalChartsController@eachtoothDChief')->name('dchief.dentalchart.each');

Route::get('/dchief/dentalchart/view/{id}', 'DentalChartsController@dChiefView')->name('dchief.dentalchart.view');

Route::get('/dchief/dentalchart/deleteToothCondition/{id}','DentalChartsController@dChiefDelete')->name('dchief.dentalchart.deleteToothCon');

Route::post('/dchief/dentalchart/store/{id}','DentalChartsController@dChiefStore')->name('dchief.dentalchart.store');

Route::get('/dchief/PatientList','DentalPatientController@indexOfDentalChief');

Route::get('/dchief/PatientRecord', 'DentalPatientController@dentalPatientRecordsDChief');

Route::get('/dchief/patient/ViewMore/{id}', 'DentalPatientController@dChiefShow')->name('dchief.patientList.viewMore');

Route::get('/dchief/DentalLog','DentalLogController@indexOfDentalChief');

Route::get('/dchief/create/patientRecord', 'DentalPatientController@dChiefCreate')->name('create.patient');

Route::post('/dchief/add/patient', 'DentalPatientController@dChiefStore')->name('dchief.add.patient');

Route::get('/dchief/patient/prescription/{id}', 'DentalLogController@patientPrescriptionDChief')->name('patient.prescription');

Route::get('/dchief/DentalForm/Autocomplete', 'DentalHistoryController@autocompleteDChief');

Route::get('/dchief/dentalform/autocomplete/name', 'DentalHistoryController@autocompleteNameDChief');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/dchief/select/concern', 'DentalLogController@redirectConcernDChief')->name('redirect.via.concern');

Route::get('/dchief/log/patient', 'DentalLogController@dChiefStore')->name('dchief.log.patient');

Route::get('/dchief/patient/certification', 'DentalLogController@requestLetterCertificationDChief')->name('letter.requesting');

Route::get('/dchief/dental/certificate', 'DentalCertificateController@dChiefShow')->name('dchief.dental.certification');

Route::get('/dchief/outside/referralSlip', 'DentalCertificateController@showOutsideReferDChief')->name('dchief.referral.slip');

Route::get('/dchief/log/patient/redir', 'DentalLogController@redirectPatientDChief')->name('dchief.redirect.patient');

Route::get('/dchief/log/patient/each', 'DentalLogController@medicalLogCreateDChief')->name('dchief.each.log.create');

Route::get('/dchief/log/patient/store', 'DentalLogController@dChiefStore')->name('dchief.log.patient.store');

Route::get('/dchief/delete/dental/log/{id}','DentalLogController@dChiefDestroy')->name('dchief.delete.dental.log');

Route::get('/dchief/DentalLog/MoreInfo/{id}', 'DentalLogController@dChiefShow')->name('dchief.dentalLog.moreInfo');

Route::get('/dchief/DentalLog/edit/{id}', 'DentalLogController@dChiefEdit')->name('dchief.dentalLog.edit');

Route::get('/dchief/DentalLog/update/{id}', 'DentalLogController@dChiefUpdate');

Route::get('/dchief/Prescription/{id}', 'PrescriptionController@indexOfDentalChief')->name('dentalLog.store');

Route::post('/updateLogPatient', 'PrescriptionController@dChiefUpdate');

Route::get('/get/medicine/brand', 'MedicineController@getBrandNameDChief');

Route::get('/get/medSupply/brand', 'MedicalSuppliesController@getMedicalSupplyDChief');

Route::get('/dchief/dental/log/each/{id}', 'DentalLogController@consultationsAllDentistsDChief')->name('dchief.consultation.to.all.dentists');

Route::get('/dchief/patient/consultations/{id}', 'DentalPatientController@patientConsultationsDChief')->name('dchief.patient.consultations');

Route::get('/dchief/dental/HistoryForm/view/{id}', 'DentalHistoryController@showDentalHistoryDChief')->name('dchief.view.dental.history');

Route::get('/dchief/dental/HistoryForm', 'DentalHistoryController@indexOfDentalChief');

Route::get('/dchief/dental/HistoryForm/store', 'DentalHistoryController@dChiefStore')->name('HistoryForm.store');

Route::get('/dchief/dental/HistoryForm/edit/{id}', 'DentalHistoryController@dChiefEdit')->name('dchief.HistoryForm.edit');

Route::get('/dchief/dental/HistoryForm/update/{id}', 'DentalHistoryController@dChiefUpdate')->name('HistoryForm.update');

Route::get('/dental/log/timeOut/{id}', 'DentalLogController@timeoutDChief')->name('dentalLog.timeOut');

Route::get('/dchief/vital/signs/{id}', 'VitalSignsController@dChiefEdit')->name('vitalSigns.index');

Route::get('/dchief/vital/store', 'VitalSignsController@dChiefStore')->name('vitalSigns.store');

Route::get('/dchief/show/consultations/{id}', 'DentalLogController@showAllConsultationsDChief')->name('dchief.show.all.consultations');

Route::get('/dchief/dental/certificate/save', 'DentalLogController@saveRequestLetterCertificationDChief')->name('dchief.save.letter.request');

Route::get('/dchief/generate/prescription/{id}', 'DentalCertificateController@dchiefgeneratePdf')->name('dchief.generate.prescription');

//===========================================================================================================================

// Dental Chief Routes

Route::get('/dentalchief/accounts_maintenance', 'DentalChiefController@maintainAccounts')->name('dentalMaintainAccounts');

Route::get('/dentalchief/medicines_maintenance', 'DentalChiefController@maintainMedicines')->name('dentalmaintainMedicines');

Route::get('/dentalchief/medical_supplies_maintenance', 'DentalChiefController@maintainMedSupplies')->name('dentalmaintainMedSupplies');

Route::get('/dentalchief/generate_verification_code/{userID}','DentalChiefController@generateCode')->name('dentalgenerateCode');

Route::get('/dentalchief/decline_account/{userID}','DentalChiefController@declineAccount')->name('dentaldeclineAccount');

Route::get('/dentalchief/delete_account/{userID}','DentalChiefController@deleteAccount')->name('dentaldeleteAccount');

Route::get('/dentalchief/getLastUserID','DentalChiefController@getlastUserID')->name('dentalgetLastUserID');
