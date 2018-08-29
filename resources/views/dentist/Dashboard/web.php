Route::get('dentist/patient/condition/reports', function(){
	return view('dentist.C_dentist_patient_condition_records');
});

Route::get('dentist/medicine/reports', function(){
	return view('dentist.C_dentist_reports');
});