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

Route::get('/sample', 'DashboardController@notificationNurse');

Route::get('/', function(){
	return view('login');
});

Route::get('/logout', 'AccountsController@logout');

Route::get('/create/new/account', function(){
	return view('register_account');
});

Route::get('/get/notification', 'DashboardController@notification');

Route::get('/get/notification/nurse', 'DashboardController@notificationNurse');

Route::get('/notification/clicked/{id}', 'DashboardController@notificationClicked');

Route::get('/save/account', 'AccountsController@store');

Route::post('/login/user', 'AccountsController@show');

Route::get('/print/medical/log', 'ClinicLogController@printMedicalLog');

Route::get('/print/patient/list', 'PatientController@printPatientList');

Route::get('/print/medicine/reports/{month}', 'DashboardController@printMedicineReports');

Route::get('/print/medicine/reports/week/{week}', 'DashboardController@printMedicineReportsWeek');

Route::get('/print/medical/reports/{month}', 'DashboardController@printMedicalReports');

Route::get('/print/medical/reports/week/{week}', 'DashboardController@printMedicalReportsWeek');

Route::get('/print/medicine/list', 'MedicineController@printMedicineList');

Route::get('/print/medical/supply/list', 'MedicalSupplyController@printMedicalList');

Route::get('/print/medical/history/{id}', 'MedicalHistoriesController@printMedicalHistory');

Route::get('/print/medical/log/each/{id}', 'ClinicLogController@printMedicalLogEach');


/*
 * Nurse Route
 *
 */

Route::get('/nurse/profile', function(){
	return view('nurse.C_nurse_profile');
});

Route::post('/edit/profile/{id}', 'AccountsController@update');

Route::get('/nurse/dashboard', 'DashboardController@dashboard');

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

Route::get('/nurse/delete/logReferral/{id}', 'LogReferralsController@destroy');

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

Route::get('/nurse/hasAppointment/{id}', 'AppointmentsController@update');

/*
 * Physician Route
 *
 */
Route::get('/physician/profile', function(){
	return view('physician.C_physician_profile');
});

Route::get('/physician/dashboard', 'DashboardController@dashboard');

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

Route::get('/physician/refer/patient/outside/{id}', 'OutsideReferralsController@update');

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
Route::get('/mchief/profile', function(){
	return view('chief.C_mchief_profile');
});

Route::get('/mchief/dashboard', 'DashboardController@dashboard');

Route::get('/mchief/medicine/reports', 'DashboardController@mChiefReports');

Route::get('/mchief/medical/supplies/reports', 'DashboardController@mChiefSupplyReports');

Route::get('/mchief/patient/condition/reports', 'DashboardController@mChiefPatientReports');

Route::get('/mchief/delete/appointment/{id}/{status}', 'DashboardController@mChiefDestroy');

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

//Route::get('/mchief/generate/pdf/excuse/letter/{id}/{patientName}', 'LogReferralsController@generateExcuseLetterMChief')->name('physician.generate.pdf.excuse.letter');

//Route::get('/mchief/generate/pdf/waver/{id}/{patientName}', 'LogReferralsController@generateWaverMChief')->name('physician.generate.pdf.waver');

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

Route::get('/mchief/archived/accounts', 'MedicalChiefArchivesController@accounts');
Route::get('/mchief/archived/medicines', 'MedicalChiefArchivesController@medicines');
Route::get('/mchief/archived/medicalSupplies', 'MedicalChiefArchivesController@medicalSupplies');
Route::get('/mchief/archived/patients', 'MedicalChiefArchivesController@patients');
Route::get('/mchief/archived/patients/concerns/{id}', 'MedicalChiefArchivesController@patients_concerns');
Route::get('/mchief/archived/patients/viewMore/{id}', 'MedicalChiefArchivesController@patients_viewMore');
Route::get('/mchief/archived/patients/viewMore/medicalLogs/{id}', 'MedicalChiefArchivesController@patients_viewMore_medicalLogs');
Route::get('/mchief/archived/medicalLogs', 'MedicalChiefArchivesController@medicalLogs');


Route::get('/mchief/restore/patient/{id}','MedicalChiefArchivesController@restore_patient');
Route::get('/mchief/restore/medical/log/{id}','MedicalChiefArchivesController@restore_medical_log');
Route::get('/mchief/restore/account/{id}','MedicalChiefArchivesController@restore_account');
Route::get('/mchief/restore/medicine/{id}','MedicalChiefArchivesController@restore_medicine');
Route::get('/mchief/restore/medicalSupply/{id}','MedicalChiefArchivesController@restore_medicalSupply');

Route::get('/medicalchief/queries/accounts', 'MedicalChiefController@accountQueries');

Route::get('/medicalchief/queries/medicines', 'MedicalChiefController@medicineQueries');

Route::get('/medicalchief/queries/medical/supply', 'MedicalChiefController@supplyQueries');

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

// Route::get('dentist/patient/condition/reports', function(){
// 	return view('dentist.C_dentist_patient_condition_records');
// });

// Route::get('dentist/medicine/reports', function(){
// 	return view('dentist.C_dentist_reports');
// });

// Route::get('dentist/dental/supplies/reports', function(){
// 	return view('dentist.C_dentist_dental_reports');
// });
///////////////// BAGO

//Routes
// Route::get('/dentist/dashboard', function(){
// 	return view('dentist.C_dentist_dashboard');
// });

Route::get('/dentist/dashboard', 'DashboardController@dashboard');
Route::get('/dentist/dentalchart/print/{id}', 'PrintableDentalChartController@show');

Route::get('/dentist/medical/supplies/reports', 'DashboardController@dentistSupplyReports');

Route::get('/dentist/medicine/reports', 'DashboardController@dentistReports');

Route::get('/dentist/delete/appointment/{id}', 'DashboardController@dentistDestroy');

Route::get('/dentist/profile', function(){
	return view('dentist.C_dentist_profile');
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

Route::get('/dentist/dental/log/each/treatment/{id}', 'DentalLogController@dentalLogEachTreatment')->name('dentist.dental.log.each.treatment');

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

Route::get('/dentist/delete/medicine', 'MedicineController@destroy');

Route::get('/dentist/delete/medical/supply', 'MedicalSupplyController@destroy');



Route::get('/dentist/generate/prescription/{id}', 'DentalCertificateController@generatePdf')->name('dentist.generate.prescription');

Route::get('/dentist/generate/logTable', 'DentalCertificateController@generateDentalLogTable')->name('dentist.generate.dentalTable');

Route::get('/dentist/generate/view/certificate/{id}', 'DentalCertificateController@viewMoreCertificate')->name('dentist.view.dental.certificate');

Route::get('/dentist/generate/patientlist', 'DentalCertificateController@generatePatientList')->name('dentist.generate.patientList');

Route::get('/dentist/generate/dentalHistory/{id}', 'DentalCertificateController@generateDentalHistoryPdf')->name('dentist.generate.dentalHistory');

Route::get('/dentist/generate/medicalLogEach/{id}', 'DentalCertificateController@generateMedicalLogEachPdf')->name('dentist.generate.medicalLogEach');

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




/////////////////////////DENTAL CHIEF



Route::get('/dchief/archived/patient/list', 'ArchivesController@patientsList');
Route::get('/dchief/archived/patient/list/ViewMore/{id}', 'ArchivesController@patientsList_viewMore');
Route::get('/dchief/archived/patient/list/viewMore/dental/log/each/{id}', 'ArchivesController@patientsList_viewMore_Logs');
Route::get('/dchief/archived/patient/list/concerns/{id}', 'ArchivesController@patientsList_concerns');
Route::get('/dchief/archived/dental/logs', 'ArchivesController@dentalLogs');
Route::get('/dchief/archived/dental/logs/viewMore/{id}', 'ArchivesController@dentalLogs_viewMore');
// Route::get('/dchief/archived/dental/logs/viewMore/{id}', 'ArchivesController@dentalLogs_viewMore');
Route::get('/dchief/archived/accounts', 'ArchivesController@accountsList');
Route::get('/dchief/archived/medicines', 'ArchivesController@medicines');
Route::get('/dchief/archived/medicalSupplies', 'ArchivesController@medicalSupplies');

Route::get('/dchief/restore/patient/{id}','ArchivesController@restore_patient');
Route::get('/dchief/restore/dental/log/{id}','ArchivesController@restore_dental_log');
Route::get('/dchief/restore/account/{id}','ArchivesController@restore_account');
Route::get('/dchief/restore/medicine/{id}','ArchivesController@restore_medicine');
Route::get('/dchief/restore/medicalSupply/{id}','ArchivesController@restore_medicalSupply');

Route::get('/dchief/dashboard', 'DashboardController@dashboard');

Route::get('/dchief/delete/appointment/{id}', 'DashboardController@dChiefDestroy');

Route::get('/dchief/profile', function(){
	return view('dchief.C_dchief_profile');
});


Route::get('/dchief/medical/supplies/reports', 'DashboardController@dentistSupplyReports');

Route::get('/dchief/medicine/reports', 'DashboardController@dentistReports');


Route::get('/dchief/get/notification', 'DashboardController@dchiefNotification');


Route::get('/dchief/PatientRecord', 'DentalPatientController@dchiefDentalPatientRecords');

Route::get('/dchief/patient/ViewMore/{id}', 'DentalPatientController@dchiefShow')->name('dchief.patientList.viewMore');

Route::get('/dchief/patient/consultations/{id}', 'DentalPatientController@dchiefPatientConsultations')->name('dchief.patient.consultations');

Route::get('/dchief/PatientList', 'DentalPatientController@dchiefIndex');

Route::get('/dchief/create/patientRecord', 'DentalPatientController@dchiefCreate')->name('dchief.create.patient');

Route::post('/dchief/add/patient', 'DentalPatientController@dchiefStore')->name('dchief.add.patient');



Route::get('/dchief/DentalLog', 'DentalLogController@dchiefIndex');

Route::get('/dchief/show/consultations/{id}', 'DentalLogController@dchiefShowAllConsultations')->name('dchief.show.all.consultations');

Route::get('/dchief/dental/log/each/{id}', 'DentalLogController@dchiefConsultationsAllDentists')->name('dchief.consultation.to.all.dentists');

Route::get('/dchief/select/concern', 'DentalLogController@dchiefRedirectConcern')->name('dchief.redirect.via.concern');

Route::get('/dchief/patient/prescription/{id}', 'DentalLogController@dchiefPatientPrescription')->name('dchief.patient.prescription');

Route::get('/dchief/delete/dental/log/{id}','DentalLogController@dchiefDestroy')->name('dchief.delete.dental.log');

Route::get('/dchief/log/patient/store', 'DentalLogController@dchiefStore')->name('dchief.log.patient.store');

Route::get('/dchief/log/timeOut/{id}', 'DentalLogController@dchiefTimeout')->name('dchief.dentalLog.timeOut');

Route::get('/dchief/DentalLog/MoreInfo/{id}', 'DentalLogController@dchiefShow')->name('dchief.dentalLog.moreInfo');

Route::get('/dchief/DentalLog/edit/{id}', 'DentalLogController@dchiefEdit')->name('dchief.dentalLog.edit');

Route::get('/dchief/DentalLog/update/{id}', 'DentalLogController@dchiefUpdate');//PROTOTYPE

Route::get('/dchief/log/patient/redir', 'DentalLogController@dchiefRedirectPatient')->name('dchief.redirect.patient');// MADE THIS FOR REDIRECTION AFTER DENTAL HISTORY

Route::get('/dchief/patient/certification', 'DentalLogController@dchiefRequestLetterCertification')->name('dchief.letter.requesting');

Route::get('/dchief/dental/certificate/save', 'DentalLogController@dchiefSaveRequestLetterCertification')->name('dchief.save.letter.request');



Route::get('/dchief/vital/signs/{id}', 'VitalSignsController@dchiefEdit')->name('dchief.vitalSigns.index');

Route::get('/dchief/vital/store', 'VitalSignsController@dchiefStore')->name('dchief.vitalSigns.store');


Route::get('/dchief/dentalchart','DentalChartsController@dchiefCreate')->name('dchief.dentalchart');

Route::get('/dchief/dentalchart/each/{toothNum}','DentalChartsController@dchiefEachtooth')->name('dchief.dentalchart.each');

Route::get('/dchief/dentalchart/view/{id}', 'DentalChartsController@dchiefView')->name('dchief.dentalchart.view');

Route::get('/dchief/dentalchart/deleteToothCondition/{id}','DentalChartsController@dchartDelete')->name('dchief.dentalchart.deleteToothCon');

Route::post('/dchief/dentalchart/store/{id}','DentalChartsController@dchiefStore')->name('dchief.dentalchart.store');



Route::get('/dchief/DentalForm/Autocomplete', 'DentalHistoryController@dchiefAutocomplete');

Route::get('/dchief/dentalform/autocomplete/name', 'DentalHistoryController@dchiefAutocompleteName');

Route::get('/dchief/dental/HistoryForm/view/{id}', 'DentalHistoryController@dchiefShowDentalHistory')->name('dchief.view.dental.history');

Route::get('/dchief/dental/HistoryForm/store', 'DentalHistoryController@dchiefStore')->name('dchief.HistoryForm.store');

Route::get('/dchief/dental/HistoryForm/edit/{id}', 'DentalHistoryController@dchiefEdit')->name('dchief.HistoryForm.edit');

Route::get('/dchief/dental/HistoryForm/update/{id}', 'DentalHistoryController@dchiefUpdate')->name('dchief.HistoryForm.update');


Route::get('/dchief/generate/prescription/{id}', 'DentalCertificateController@dchiefGeneratePdf')->name('dchief.generate.prescription');

Route::get('/dchief/outside/referralSlip', 'DentalCertificateController@dchiefShowOutsideRefer')->name('dchief.referral.slip');

Route::get('/dchief/dental/certificate', 'DentalCertificateController@dchiefShow')->name('dchief.dental.certification');

Route::get('/dchief/generate/logTable', 'DentalCertificateController@generateDentalLogTable')->name('dchief.generate.dentalTable');

Route::get('/dchief/generate/view/certificate/{id}', 'DentalCertificateController@viewMoreCertificate')->name('dchief.view.dental.certificate');

Route::get('/dchief/generate/patientlist', 'DentalCertificateController@generatePatientList')->name('dchief.generate.patientList');

Route::get('/dchief/generate/medicinesList', 'DentalCertificateController@generateMedicineList')->name('dchief.generate.medicineList');

Route::get('/dchief/generate/medicalSuppliesList', 'DentalCertificateController@generateMedicalSupplyList')->name('dchief.generate.medicalSupplyList');

Route::get('/dchief/generate/dentalHistory/{id}', 'DentalCertificateController@generateDentalHistoryPdf')->name('dchief.generate.dentalHistory');

Route::get('/dentalchief/accounts_maintenance_queries', 'DentalChiefController@accountQueries');

Route::get('/dentalchief/medicines_maintenance_queries', 'DentalChiefController@medicineQueries');

Route::get('/dentalchief/medical_supplies_maintenance_queries', 'DentalChiefController@supplyQueries');
 
//===========================================================================================================================

// Dental Chief Routes

Route::get('/dentalchief/accounts_maintenance', 'DentalChiefController@maintainAccounts')->name('dentalMaintainAccounts');

Route::get('/dentalchief/medicines_maintenance', 'DentalChiefController@maintainMedicines')->name('dentalmaintainMedicines');

Route::get('/dentalchief/medical_supplies_maintenance', 'DentalChiefController@maintainMedSupplies')->name('dentalmaintainMedSupplies');

Route::get('/dentalchief/generate_verification_code/{userID}','DentalChiefController@generateCode')->name('dentalgenerateCode');

Route::get('/dentalchief/decline_account/{userID}','DentalChiefController@declineAccount')->name('dentaldeclineAccount');

Route::get('/dentalchief/delete_account/{userID}','DentalChiefController@deleteAccount')->name('dentaldeleteAccount');

Route::get('/dentalchief/getLastUserID','DentalChiefController@getlastUserID')->name('dentalgetLastUserID');

