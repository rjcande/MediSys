@extends('chief.layout.chief')

@section('content')

		<div class="right_col" role="main">
        	<div class="">
        	<div class="page-title">
            <div class="title_left">
                <h3>Referred Patient</h3>
            </div>
        </div>

        <div class="clearfix"></div>
			
			<div class="row">
            
       	<!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">

                <div>
            		<label class="col-md-10 col-sm-12 col-xs-12"><h4>{{ $patient['patientID'] }}, <em>{{ $patient['lastName'] }}, {{ $patient['firstName'] }} {{ $patient['middleName'] }} {{ $patient['quantifier'] }}</em></h4></label>
            	</div>
                 
                <div class="clearfix"></div>
            </div>
           
            <div class="x_content">
                    
	        <!--Content-->
	        	  <!-- SmartWizard html -->
	        	   <form id="saveForm" data-id="{{ $patient['patientID'] }}" data-cliniclogid="{{ $clinicLogID }}" data-rec="@if($medicalHistory){{ '1' }}@else{{ '0' }}@endif" data-gender="{{ $patient['gender'] }}">
            		@csrf()
			        <div id="smartwizard">
			            <ul>
			                <li><a href="#step-1">Step 1<br /><h4>Past Medical History</h4></a></li>
			                <li><a href="#step-2">Step 2<br /><h4>Family History</h4></a></li>
			                <li><a href="#step-3">Step 3<br /><h4>Physical Examination</h4></a></li>
			                <li><a href="#step-4">Step 4<br /><h4>Menstrual History/Circumcision History</h4></a></li>
			                <li><a href="#step-5">Step 5<br /><h4>Immunization History</h4></a></li>
			            </ul>

			            <div>
			                <div id="step-1" class="">
			                            	
					        	<div id="past_medical_history" style="float:left; margin-top: 10px; width: 100%">
									<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
										height:30px; border-radius:8px;">&nbsp<b>Past Medical History</b></p><br>
								</div>

								<div style="float:left; margin-left:25px; font-size:15px; width:300px;">
									<input type="checkbox" name="pastMedicalHistoryAsthma" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory) @if($medicalHistory->pastMedAsthma == 1) {{ 'checked' }} @endif @endif> Asthma<br>
									<input type="checkbox" name="pastMedicalHistoryHeartDisease" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory) @if($medicalHistory->pastMedHeartDis == 1) {{ 'checked' }} @endif @endif> Heart Disease
									<br>
									<input type="checkbox" name="pastMedicalHistorySeizure" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory) @if($medicalHistory->pastMedSeizure == 1) {{ 'checked' }} @endif @endif> Seizure Disorder<br>
								</div>

								<div style="float:left; margin-left:25px; font-size:15px; width:300px;">
									<input type="checkbox" name="pastMedicalHistoryPrimaryComplex" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory) @if($medicalHistory->pastMedPrimComplex == 1) {{ 'checked' }} @endif @endif> Primary Complex
									<br>
									<input type="checkbox" name="pastMedicalHistoryHyperventilation" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory) @if($medicalHistory->pastMedHypervent == 1) {{ 'checked' }} @endif @endif> Hyperventilation<br>
									<input type="checkbox" name="pastMedicalHistoryMeasles" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory) @if($medicalHistory->pastMedMeasles == 1) {{ 'checked' }} @endif @endif> Measles<br>
								</div>
				                
								<div style="float:left; margin-left:25px; font-size:15px; width:300px;">
									<input type="checkbox" name="pastMedicalHistoryChickenPox" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory) @if($medicalHistory->pastMedChickenPox == 1) {{ 'checked' }} @endif @endif> Chicken Pox<br>
									<input input type="checkbox" name="pastMedicalHistoryOther" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory) @if($medicalHistory->pastMedOther == 1) {{ 'checked' }} @endif @endif> Other 
									<em>(please specify)</em>
									<textarea style="height:50px; width:350px; border-radius:8px;" name="pastMedicalHistoryOtherTextArea" id="pastMedicalHistoryOtherTextArea" disabled>@if($medicalHistory) @if($medicalHistory->pastMedOtherDetails) {{ $medicalHistory->pastMedOtherDetails }} @endif @endif</textarea>
								</div>

								<div style="float: left;width:100%;">
									<div style="float: left;width:500px; margin-left: 25px; margin-top: 25px; font-size:15px;">
										<p>Previous Hospitalization:
											<input type="radio" name="previousHospitalization" style="margin-left: 50px;" value="1" id="previousHospitalizationYes" 
											@if($medicalHistory) @if($medicalHistory->pastMedPrevHosp == 1) {{ 'checked' }} @endif @endif>Yes
											<input type="radio" name="previousHospitalization" style="margin-left: 15px;" value="0"
											@if($medicalHistory) @if($medicalHistory->pastMedPrevHosp == '0') {{ 'checked' }} @endif @endif>No

										</p>
										<p style="font-size:15px; margin-left:20px;"><em>(if yes, please specify)</em></p>
										<textarea style="height:50px; margin-left:20px; border-radius:8px; width: 450px;" name="previousHospitalizationTextArea" disabled id="previousHospitalizationTextArea">@if($medicalHistory) {{ $medicalHistory->pastMedPrevHospDetails }} @endif</textarea>
									</div>

									<div style="float: left;width:500px; margin-left: 25px; margin-top: 25px; font-size:15px;">
										<p>Operation/Surgery:
											<input type="radio" name="operationSurgery" style="margin-left: 50px;" value="1" id="operationSurgeryYes"
											@if($medicalHistory) @if($medicalHistory->pastMedOprSrg == 1) {{ 'checked' }} @endif @endif>Yes
											<input type="radio" name="operationSurgery" style="margin-left: 15px;" value="0"
											@if($medicalHistory) @if($medicalHistory->pastMedOprSrg == '0') {{ 'checked' }} @endif @endif>No

										</p>
										<p style="font-size:15px; margin-left:20px;"><em>(if yes, please specify)</em></p>
										<textarea style="height:50px; margin-left:20px; border-radius:8px; width: 450px;" name="operationSurgeryTextArea" disabled>@if($medicalHistory) {{ $medicalHistory->pastMedOprSrgDetails  }} @endif</textarea>
									</div>
											
									<div style="float: left;width:500px; margin-left: 25px; margin-top: 25px; font-size:15px; margin-bottom: 20px;">
										<p>Current Medications:
											<input type="radio" name="currentMedications" style="margin-left: 50px;" value="1" id="currentMedicationsYes"
											@if($medicalHistory) @if($medicalHistory->currentMeds == 1) {{ 'checked' }} @endif @endif>Yes
											<input type="radio" name="currentMedications" style="margin-left: 15px;" value="0"
											@if($medicalHistory) @if($medicalHistory->currentMeds == '0') {{ 'checked' }} @endif @endif>No

										</p>
										<p style="font-size:15px; margin-left:20px;"><em>(if yes, please specify)</em></p>
										<textarea style="height:50px; margin-left:20px; border-radius:8px; width: 450px;" name="currentMedicationsTextArea" disabled>@if($medicalHistory) {{ $medicalHistory->currentMedsDetails  }} @endif</textarea>
									</div>
								</div>
			                </div>
			                <div id="step-2" class="">
			                  	<div id="family-history" style="float:left; margin-top: 10px; width: 100%">
									<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
									height:30px; border-radius:8px;">&nbsp<b>Family History</b></p><br>
								</div>

								<div "style="float:left; width:100%;">
									<div style="float:left; margin-left:25px; font-size:15px; width:300px;">
										<input type="checkbox" name="famHistoryDiabetes" class="radio-fam" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->famHistDiabetes == 1) {{ 'checked' }} @endif @endif> Diabetes<br>
										<input type="checkbox" name="famHistoryHyperTension" class="radio-fam" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->famHistHypervent == 1) {{ 'checked' }} @endif @endif> Hypertension<br>
										<input type="checkbox" name="famHistoryHeartDisease" class="radio-fam" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->famHistHeartDis == 1) {{ 'checked' }} @endif @endif> Heart Disease<br>
										<input type="checkbox" name="famHistoryPTB" class="radio-fam" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->famHistPTB == 1) {{ 'checked' }} @endif @endif> PTB<br>
									</div>
					                
									<div style="float:left; margin-left:25px; font-size:15px; width:300px;">
										<input type="checkbox" name="famHistoryCancer" class="radio-fam" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->famHistCancer  == 1) {{ 'checked' }} @endif @endif> Cancer<br>
										<input type="checkbox" name="famHistoryOther" class="radio-fam" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->otherFamHist  == 1) {{ 'checked' }} @endif @endif> Other <em>(please specify)</em>
										<textarea style="height:50px; width:350px; border-radius:8px;" name="famHistoryOtherTextArea" disabled>@if($medicalHistory) {{ $medicalHistory->otherFamHistDetails  }} @endif</textarea>
									</div>
								</div>
			                </div>
			                <div id="step-3" class="">
			                    <div id="physical-examination" style="float:left; margin-top: 10px; width: 100%;">
									<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
										height:30px; border-radius:8px;">&nbsp<b>Physical Examination</b></p><br>
								
									<div id="physical-examination-head-throat">
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width:45%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Head</label>
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width:45%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Throat</label>

										<div style="float:left; margin-left:60px; font-size:15px; width:40%;">
											<br>
											<input type="checkbox" name="headWound" class="radio-head" style="margin-bottom:12px;" value="1"
											@if($medicalHistory) @if($medicalHistory->headWound  == 1) {{ 'checked' }} @endif @endif> Wound<br>
											<input type="checkbox" name="headMass" class="radio-head" style="margin-bottom:12px;" value="1"
											@if($medicalHistory) @if($medicalHistory->headMass  == 1) {{ 'checked' }} @endif @endif> Mass<br>
											<input type="checkbox" name="headAlopecia" class="radio-head" style="margin-bottom:12px;" value="1"
											@if($medicalHistory) @if($medicalHistory->headAlopecia  == 1) {{ 'checked' }} @endif @endif> Alopecia
											<br>
										</div>
													
										<div style="float:left; margin-left:80px; font-size:15px; width:40%;">
											<br>
											<input type="checkbox" name="throatNoTcp" class="radio-throat" style="margin-bottom:12px;" value="1"
											@if($medicalHistory) @if($medicalHistory->throatNoTCP  == 1) {{ 'checked' }} @endif @endif> No TCP<br>
											<input type="checkbox" name="throatNoMass" class="radio-throat" style="margin-bottom:12px;" value="1"
											@if($medicalHistory) @if($medicalHistory->throatNoMass  == 1) {{ 'checked' }} @endif @endif> No Mass<br>
											<input type="checkbox" name="throatNoLymphadenopthy" class="radio-throat" style="margin-bottom:12px;" value="1"
											@if($medicalHistory) @if($medicalHistory->throatNoLymph  == 1) {{ 'checked' }} @endif @endif> No Lymphadenopthy<br>
										</div>
									</div>

									<div id="physical-examination-ears-extremities">
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
													background: linear-gradient(to right, #192856, white); height:30px;
													border-radius:8px;">&nbsp Ears</label>
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
													background: linear-gradient(to right, #192856, white); height:30px;
													border-radius:8px;">&nbsp Extremities</label>
									</div><br>	
									
									<div style="float:left; margin-left:60px; font-size:15px; width:40%;">
										<input type="checkbox" name="earsNoGrossDetormity" class="radio-ears" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->earsNoGrossDetor  == 1) {{ 'checked' }} @endif @endif> No Gross Detormity<br>
										<input type="checkbox" name="earsNoDischarge" class="radio-ears" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->earsNoDischarge  == 1) {{ 'checked' }} @endif @endif> No Discharge <br>
									</div>
													
									<div style="float:left; margin-left:80px; font-size:15px; width:40%;">
										<input type="checkbox" name="extremitiesNoDeformities" class="radio-extremities" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->extremeNoDeform  == 1) {{ 'checked' }} @endif @endif> No Deformities<br>
									</div>

									<div id="physical-examination-eyes">
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:92%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Eyes
										</label>
									</div><br>
									
									<div style="float:left; margin-left:60px; font-size:15px; width:300px;">
										<input type="checkbox" name="eyesPale" class="radio-eyes" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->eyesPale == 1) {{ 'checked' }} @endif @endif> Pale<br>
										<input type="checkbox" name="eyesPinkPalberalConjunctiva" class="radio-eyes" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->eyesPPC == 1) {{ 'checked' }} @endif @endif> Pink Palberal Conjunctiva <br>
									</div>

									<div style="float:left; margin-left:25px; font-size:15px; width:170px;">
										<input type="checkbox" name="eyesIcteric" class="radio-eyes" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->eyesIcteric == 1) {{ 'checked' }} @endif @endif> Icteric<br>
										<input type="checkbox" name="eyesAnictericSclera" class="radio-eyes" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->eyesAnicScleric == 1) {{ 'checked' }} @endif @endif> Anicteric Sclera<br>
									</div>

									<div style="float:left; font-size:15px; width:300px;">
										<input type="checkbox" name="eyesWithGlasses" class="radio-eyes" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->eyesWithGlasses == 1) {{ 'checked' }} @endif @endif> With Glasses <em>(please specify grade)</em>
										<input type="text" name="eyesWithGlassesTextArea" class="" style="width:350px; border-radius:8px;" disabled value="@if($medicalHistory){{ $medicalHistory->eyeGlassesGrade }}@endif">
									</div>

									<div id="physical-examination-chest-heart">
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Chest/Lungs
										</label>
													
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Heart
										</label>
									</div><br>
									
									<div style="float:left; margin-left:60px; font-size:15px; width:40%;">
										<input type="checkbox" name="chestClearBreathSounds" class="radio-chest" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->chestLungsClrBreathSnd == 1) {{ 'checked' }} @endif @endif> Clear Breath Sounds<br>
										<input type="checkbox" name="chestOther" class="radio-chest" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->chestLungsOther == 1) {{ 'checked' }} @endif @endif> Other <em>(please specify)</em>
										<textarea style="height:50px; width:350px; border-radius:8px;" name="chestOtherTextArea" disabled>@if($medicalHistory) {{ $medicalHistory->chestLungsOtherDetails  }} @endif</textarea>
									</div>
													
									<div style="float:left; margin-left:80px; font-size:15px; width:40%;">
										<input type="checkbox" name="heartRegular" class="radio-heart" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->heartRegularRate == 1) {{ 'checked' }} @endif @endif> Regular Rate Rhythm<br>
										<input type="checkbox" name="heartOther" class="radio-heart" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->heartOther == 1) {{ 'checked' }} @endif @endif> Other <em>(please specify)</em>
										<textarea style="height:50px; width:350px; border-radius:8px;" name="heartOtherTextArea" form="saveForm" disabled>@if($medicalHistory) {{ $medicalHistory->heartOtherDetails }} @endif</textarea>
									</div>

									<div id="physical-examination-vcolumn-xray">
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
													background: linear-gradient(to right, #192856, white); height:30px;
													border-radius:8px;">&nbsp Vertebral Column
										</label>
										
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Chest X-ray</label>
									</div><br>

									<div style="float:left; margin-left:60px; font-size:15px; width:40%;">
										<input type="radio" name="vcolumnState" class="radio-vcolumn" style="margin-bottom:12px;" value="0"
										@if($medicalHistory) @if($medicalHistory->vertColState == '0') {{ 'checked' }} @endif @endif> Normal<br>
										<input type="radio" name="vcolumnState" class="radio-vcolumn" style="margin-bottom:12px;" value="1" id="vcolumnStateYes"
										@if($medicalHistory) @if($medicalHistory->vertColState == 1) {{ 'checked' }} @endif @endif> With Deformities <em>(please specify)</em>
										<textarea style="height:50px; width:350px; border-radius:8px;" name="vcolumnWithDeformitiesTextArea" disabled>@if($medicalHistory) {{ $medicalHistory->vertColDeformDetails }} @endif</textarea>
									</div>
													
									<div style="float:left; margin-left:80px; font-size:15px; width:40%;">
										<input type="radio" name="xrayState" class="radio-xray" style="margin-bottom:12px;" value="0"
										@if($medicalHistory) @if($medicalHistory->chestXRayState == '0') {{ 'checked' }} @endif @endif> Normal<br>
										<input type="radio" name="xrayState" class="radio-xray" style="margin-bottom:12px;" value="1" id="xrayStateYes"
										@if($medicalHistory) @if($medicalHistory->chestXRayState == 1) {{ 'checked' }} @endif @endif> With Deformities <em>(please specify)</em>
										<textarea style="height:50px; width:350px; border-radius:8px;" name="xrayWithDeformitiesTextArea" disabled>@if($medicalHistory) {{ $medicalHistory->chestXrayDeformDetails }} @endif</textarea>
									</div>

									<div id="physical-examination-abdomen-breast">
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Abdomen
										</label>
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Breast
										</label>
									</div><br>

									<div style="float:left; margin-left:80px; font-size:15px; width:40%;">
										<input type="checkbox" name="abdomenNormal" class="radio-abdomen" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->normalAbdomen == 1) {{ 'checked' }} @endif @endif> Normal<br>
									</div>
													
									<div style="float:left; margin-left:60px; font-size:15px; width:40%;">
										<input type="checkbox" name="breastNormal" class="radio-breast" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->normalBreast == 1) {{ 'checked' }} @endif @endif> Normal<br>
									</div>
											
									<div id="physical-examination-skin">
										<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:92%;
												background: linear-gradient(to right, #192856, white); height:30px;
												border-radius:8px;">&nbsp Skin
										</label>
									</div><br>

									<div style="float:left; margin-left:60px; font-size:15px; width:40%; margin-bottom: 20px;">
										<input type="checkbox" name="skinNoLesions" class="radio-skin" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->skinNoLesions == 1) {{ 'checked' }} @endif @endif> No Lesions<br>
										<input type="checkbox" name="skinOther" class="radio-skin" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->skinOther == 1) {{ 'checked' }} @endif @endif> Other <em>(please specify)</em>
										<textarea style="height:50px; width:350px; border-radius:8px;" name="skinOtherTextArea" disabled>@if($medicalHistory) {{ $medicalHistory->skinOtherDetails }} @endif</textarea>
									</div>
								</div>
			                </div>
			                <div id="step-4" class="">
			                   <div id="menstrual-history" style="float: left; margin-top: 10px; width: 100%">
									<p style="font-size: 20px; color:white; background: linear-gradient(to right, #d63031, white);
											height:30px; border-radius:8px;">&nbsp<b>Menstrual History</b> <em>(Female)</em>
									</p><br>

									<div style="float:left; margin-left:25px; font-size:18px; width:250px;">
										<header style="margin-bottom:12px;"> First Day of Last Menstruation</header>
										<header style="margin-bottom:12px;"> Menarch</header>
										<header style="margin-bottom:12px;"> Duration(days)</header>
										<header style="margin-bottom:12px;"> Interval</header>
										<header style="margin-bottom:12px;"> Amounts(soaked pads per day)</header>
										<header style="margin-bottom:12px;"> Symptoms</header>
									</div>
										
									<div style="float:left; margin-left:25px; font-size:18px; width:300px; margin-bottom: 20px;">
										<input type="date" name="mensFirstDay" class="" style="width:350px; border-radius:8px; margin-bottom:12px;"  value="@if($medicalHistory){{ $medicalHistory->firstDayOfLastMens }}@endif">
										<input type="date" name="mensMenarche" class="" style="width:350px; border-radius:8px; margin-bottom:12px;" value="@if($medicalHistory){{ $medicalHistory->menarche }}@endif">
										<input type="number" name="mensDuration" class="" style="width:350px; border-radius:8px; margin-bottom:12px;" value="@if($medicalHistory){{ $medicalHistory->mensDuration }}@endif">
										<input type="number" name="mensInterval" class="" style="width:350px; border-radius:8px; margin-bottom:12px;" value="@if($medicalHistory){{ $medicalHistory->mensInterval }}@endif">
										<input type="number" name="mensAmounts" class="" style="width:350px; border-radius:8px; margin-bottom:12px;" value="@if($medicalHistory){{ $medicalHistory->mensAmount }}@endif">
										<textarea style="height:50px; width:350px; border-radius:8px;" name="mensSymptoms">@if($medicalHistory){{ $medicalHistory->mensSymptoms }}@endif</textarea>
									</div>
								</div>
								<div id="circumcision-history" style="float: left; margin-top: 10px; width: 100%">
									<p style="font-size: 20px; color:white; background: linear-gradient(to right, #d63031, white);
											height:30px; border-radius:8px;">&nbsp<b>Circumcision History</b> <em>(Male)</em>
									</p><br>
										
									<div style="float:left; margin-left:25px; font-size:18px; width:250px;">
										<header style="margin-bottom:12px;"> Day of Circumcision</header>
									</div>
									
									<div style="float:left; margin-left:25px; font-size:18px; width:300px; margin-bottom: 20px;">
										<input type="date" name="circumcisionDate" class="" style="width:350px; border-radius:8px; margin-bottom:12px;"
										value="@if($medicalHistory){{ $medicalHistory->circumcisionDate }}@endif">
									</div>
								</div>
			                </div>
			                <div id="step-5" class="">
			                	<div id="immunization-history" style="float: left; margin-top: 20px; width: 100%">
									<p style="font-size: 20px; color:white; background: linear-gradient(to right, #d63031, white);
											height:30px; border-radius:8px;">&nbsp<b>Immunization History</b>
									</p><br>
									
									<div style="float:left; margin-left:25px; font-size:15px; width:300px;">
										<input type="checkbox" name="immuBCG" class="radio-past" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->immuBCG == 1) {{ 'checked' }} @endif @endif> Bacille Calmette Guerin<br>
										<input type="checkbox" name="immuMeasles" class="radio-past" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->immuMeasles == 1) {{ 'checked' }} @endif @endif> Measles<br>
										<input type="checkbox" name="immuMMR" class="radio-past" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->immuMMR == 1) {{ 'checked' }} @endif @endif> Mumps,Measles,and Ruvella<br>
									</div>
											
									<div style="float:left; margin-left:25px; font-size:15px; width:300px;">
										<input type="checkbox" name="immuVaricella" class="radio-past" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->immuVaricella == 1) {{ 'checked' }} @endif @endif> Varicella<br>
										<input type="checkbox" name="immuPneumonococcal" class="radio-past" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->immuPneumo == 1) {{ 'checked' }} @endif @endif> Pneumonococcal<br>
										<input type="checkbox" name="immuHInfluenza" class="radio-past" style="margin-bottom:12px;" value="1"
										@if($medicalHistory) @if($medicalHistory->immuHaemoInfluB == 1) {{ 'checked' }} @endif @endif> Haemophilius influenza B<br>
									</div>
											
									<div style="float:left; margin-left:25px; font-size:15px; width:75px;">
										<header style="margin-right:10px; margin-bottom:10px;">Hepatitis B</header>
										<header style="margin-right:10px margin-bottom:10px;">DPT</header>
									</div>
											
									<div style="float:left; margin-left:25px; font-size:15px; width:150px; margin-bottom: 20px;">
										<input type="radio" name="immuhepatitis" style="margin-bottom:15px;" value="1"
										@if($medicalHistory) @if($medicalHistory->immuHepaB == 1) {{ 'checked' }} @endif @endif>1
										<input type="radio" name="immuhepatitis" value="2"
										@if($medicalHistory) @if($medicalHistory->immuHepaB == 2) {{ 'checked' }} @endif @endif>2
										<input type="radio" name="immuhepatitis" value="3"
										@if($medicalHistory) @if($medicalHistory->immuHepaB == 3) {{ 'checked' }} @endif @endif>3
										<input type="radio" name="immuhepatitis" value="0"
										@if($medicalHistory) @if($medicalHistory->immuHepaB == '0') {{ 'checked' }} @endif @endif>None<br>
										
										
										<input type="radio" name="immudpt" value="1"
										@if($medicalHistory) @if($medicalHistory->immuDPT == 1) {{ 'checked' }} @endif @endif>1
										<input type="radio" name="immudpt" value="2"
										@if($medicalHistory) @if($medicalHistory->immuDPT == 2) {{ 'checked' }} @endif @endif>2
										<input type="radio" name="immudpt" value="3"
										@if($medicalHistory) @if($medicalHistory->immuDPT == 3) {{ 'checked' }} @endif @endif>3
										<input type="radio" name="immudpt" value="0"
										@if($medicalHistory) @if($medicalHistory->immuDPT == '0') {{ 'checked' }} @endif @endif>None<br><br>
									</div>	
								</div>
			                </div>
			            </div>
			        </div>
			        </form>
			    </div>
				
				
							
				 <div style="margin-top: 25px;margin-bottom: 30px;float: left;text-align: center;width: 100%">
                	<a href="{{ route('mchief.consult.diagnosis', [ 'id' => $clinicLogID, 'patientID' => $patient['patientID']]) }}">
                		<button class="btn btn-default" type="button">DIAGNOSIS</button>
                	</a>
                    
                	<a href="{{ route('mchief.consult.diagnosis', [ 'id' => $clinicLogID, 'patientID' => $patient['patientID']]) }}">
                    	<button class="btn btn-primary" type="button">BACK</button>
                    </a>
                
				</div>

				</div>
            </div>

	        <!--/Content-->
	        
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
        <!-- /form input mask -->  
			</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->

<script type="text/javascript">
	$(document).ready(function(){
		//bind the form for validation
		$('#saveForm').parsley();
		//
		if ($('input[name=pastMedicalHistoryOtherTextArea]').val() !== null ) {
			$('#pastMedicalHistoryOtherTextArea').prop('disabled', false);
		}
		if ($('input[name=pastMedicalHistoryOtherTextArea]').val() == null ) {
			$('#pastMedicalHistoryOtherTextArea').prop('disabled', true);
		}
		

		// Get reference to checkbox, radio button, and textarea
		var pastMedicalHistoryOther = document.querySelector("input[name=pastMedicalHistoryOther]");
		var pastMedicalHistoryOtherTextArea = document.querySelector("textarea[name=pastMedicalHistoryOtherTextArea]");

		var previousHospitalization = document.querySelectorAll("input[name=previousHospitalization]");
		var previousHospitalizationTextArea = document.querySelector("textarea[name=previousHospitalizationTextArea]");

		var operationSurgery = document.querySelectorAll("input[name=operationSurgery]");
		var operationSurgeryTextArea = document.querySelector("textarea[name=operationSurgeryTextArea]");

		var currentMedications = document.querySelectorAll("input[name=currentMedications]");
		var currentMedicationsTextArea = document.querySelector("textarea[name=currentMedicationsTextArea]");

		var famHistoryOther = document.querySelector("input[name=famHistoryOther]");
		var famHistoryOtherTextArea = document.querySelector("textarea[name=famHistoryOtherTextArea]");

		var eyesWithGlasses = document.querySelector("input[name=eyesWithGlasses]");
		var eyesWithGlassesTextArea = document.querySelector("input[name=eyesWithGlassesTextArea]");

		var chestOther = document.querySelector("input[name=chestOther]");
		var chestOtherTextArea = document.querySelector("textarea[name=chestOtherTextArea]");

		var heartOther = document.querySelector("input[name=heartOther]");
		var heartOtherTextArea = document.querySelector("textarea[name=heartOtherTextArea]");

		var vcolumnState = document.querySelectorAll("input[name=vcolumnState]");
		var vcolumnWithDeformitiesTextArea = document.querySelector("textarea[name=vcolumnWithDeformitiesTextArea]");

		var xrayState = document.querySelectorAll("input[name=xrayState]");
		var xrayWithDeformitiesTextArea = document.querySelector("textarea[name=xrayWithDeformitiesTextArea]");

		var skinOther = document.querySelector("input[name=skinOther]");
		var skinOtherTextArea = document.querySelector("textarea[name=skinOtherTextArea]");
		//Add event handler
		pastMedicalHistoryOther.addEventListener("click", enable);
		famHistoryOther.addEventListener("click", enable);
		eyesWithGlasses.addEventListener("click", enable);
		chestOther.addEventListener("click", enable);
		heartOther.addEventListener("click", enable);
		skinOther.addEventListener("click", enable);
		for(var i = 0; i < 2; i++) {
		previousHospitalization[i].addEventListener("change", enable);
		operationSurgery[i].addEventListener("change", enable);
		currentMedications[i].addEventListener("change", enable);
		vcolumnState[i].addEventListener("change", enable);
		xrayState[i].addEventListener("change", enable);
		}

		function enable(){
			//alert(this.name);
			var temp = "";
			switch(this.name) {
			case "pastMedicalHistoryOther":
				pastMedicalHistoryOtherTextArea.disabled = !this.checked;
				if (this.checked == true) {
					pastMedicalHistoryOtherTextArea.required = true; 
				}
				else if (this.checked == false) {
					pastMedicalHistoryOtherTextArea.value = temp;
					pastMedicalHistoryOtherTextArea.required = false;
				}
				break;
			case "previousHospitalization":
				if (this.id == "previousHospitalizationYes") {
						previousHospitalizationTextArea.disabled = false;
						previousHospitalizationTextArea.required = true;
					}
				else{
					previousHospitalizationTextArea.disabled = true;
					previousHospitalizationTextArea.value = temp;
					previousHospitalizationTextArea.required = false;
				}
				break;
			case "operationSurgery":
				if (this.id == "operationSurgeryYes") {
						operationSurgeryTextArea.disabled = false;
						operationSurgeryTextArea.required = true;
					}
					else{
						operationSurgeryTextArea.disabled = true;
						operationSurgeryTextArea.value = temp;
						operationSurgeryTextArea.required = false;
					}
				break;
			case "currentMedications":
				if (this.id == "currentMedicationsYes") {
						currentMedicationsTextArea.disabled = false;
						currentMedicationsTextArea.required = true;
					}
					else{
						currentMedicationsTextArea.disabled = true;
						currentMedicationsTextArea.value = temp;
						currentMedicationsTextArea.required = false;
					}
				break;
			case "famHistoryOther":
				famHistoryOtherTextArea.disabled = !this.checked;
				if (this.checked == false) {
					famHistoryOtherTextArea.value = temp;
					famHistoryOtherTextArea.required = false;
				}
				else if(this.checked == true){
					famHistoryOtherTextArea.required = true;
				}
				break;
			case "eyesWithGlasses":
				eyesWithGlassesTextArea.disabled = !this.checked;
				if (this.checked == false) {
					eyesWithGlassesTextArea.value = temp;
					eyesWithGlassesTextArea.required = false;
				}
				else if(this.checked == true){
					eyesWithGlassesTextArea.required = true;
				}
				break;
			case "chestOther":
				chestOtherTextArea.disabled = !this.checked;
				if (this.checked == false) {
					chestOtherTextArea.value = temp;
					chestOtherTextArea.required = false;
				}
				else if(this.checked == true){
					chestOtherTextArea.required = true;
				}
				break;
			case "heartOther":
				heartOtherTextArea.disabled = !this.checked;
				if (this.checked == false) {
					heartOtherTextArea.value = temp;
					heartOtherTextArea.required = false;
				}
				else if(this.checked == true){
					heartOtherTextArea.required = true;
				}
				break;
			case "vcolumnState":
				if (this.id ==  "vcolumnStateYes") {
						vcolumnWithDeformitiesTextArea.disabled = false;
						vcolumnWithDeformitiesTextArea.required = true;
					}
				else{
						vcolumnWithDeformitiesTextArea.disabled = true;
						vcolumnWithDeformitiesTextArea.value = temp;
						vcolumnWithDeformitiesTextArea.required = false;
				}
				break;
			case "xrayState":
				if (this.id == "xrayStateYes") {
						xrayWithDeformitiesTextArea.disabled = false;
						xrayWithDeformitiesTextArea.required = true;
					}
					else{
						xrayWithDeformitiesTextArea.disabled = true;
						xrayWithDeformitiesTextArea.value = temp;
						xrayWithDeformitiesTextArea.required = false;
					}
				break;
			case "skinOther":
				skinOtherTextArea.disabled = !this.checked;
				if (this.checked == false) {
					skinOtherTextArea.value = temp;
					skinOtherTextArea.required = false;
				}
				else if(this.checked == true){
					skinOtherTextArea.required = true;
				}
				break;
			default:
				break;
			
			}
		}


		 // Step show event
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
           //alert("You are on step "+stepNumber+" now");
           if(stepPosition === 'first'){
               $("#prev-btn").addClass('disabled');
           }else if(stepPosition === 'final'){
               $("#next-btn").addClass('disabled');
           }else{
               $("#prev-btn").removeClass('disabled');
               $("#next-btn").removeClass('disabled');
           }
       
        });

        // Toolbar extra buttons
        var btnFinish = $('<button></button>').text('Done')
                            .addClass('btn btn-info')
                            .on('click', function(e){ 
                            	//When Save button is clicked	
								e.preventDefault();
								$('#saveForm').parsley().validate();

								if ($('#saveForm').parsley().isValid() && $('#saveForm').data('rec') == 0){
									$.ajax({
										url: '/mchief/create/medical/history/' + $('#saveForm').data('id'),
										type: 'get',
										data: $('#saveForm').serialize(),
										success: function(output){
											swal({
												title: 'Success',
												text: output.message,
												icon: 'success'
											})
											.then((value)=>{
												var location = "/mchief/consult/diagnosis/";
												var clinicLogID = $('#saveForm').data('cliniclogid')
												var patientID = $('#saveForm').data('id');
												window.location.href= location + clinicLogID + "/" + patientID ;
											});
										}
									});
								}
								else if($('#saveForm').parsley().isValid() && $('#saveForm').data('rec') == 1){
									$.ajax({
										url: '/mchief/update/medical/history/' + $('#saveForm').data('id'),
										type: 'get',
										data: $('#saveForm').serialize(),
										success: function(output){
											swal({
												title: 'Success',
												text: output.message,
												icon: 'success'
											})
											.then((value)=>{
												var location = "/mchief/consult/diagnosis/";
												var clinicLogID = $('#saveForm').data('cliniclogid')
												var patientID = $('#saveForm').data('id');
												window.location.href= location + clinicLogID + "/" + patientID ;
											});
										}
									});
								}

									
                            });
        var btnCancel = $('<button></button>').text('Cancel')
                                         .addClass('btn btn-danger')
                                         .on('click', function(){ $('#smartwizard').smartWizard("reset"); });


        // Smart Wizard
        $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                transitionEffect:'fade',
                showStepURLhash: true,
                toolbarSettings: {toolbarPosition: 'bottom',
                                  toolbarButtonPosition: 'end',
                                  toolbarExtraButtons: [btnFinish, btnCancel]
                                },
               	anchorSettings: {
	                
	                enableAllAnchors: true, // Activates all anchors clickable all times
	               
	            }
        });

        // Initialize the leaveStep event
	    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
        	
        	$('#saveForm').parsley().validate();

        	if ($('#saveForm').parsley().isValid()) {
        		return true;
        	}
        	else{
        		return false;
        	}

	    });

	    //Disable div base on patient's gender
	    if ($('#saveForm').data('gender') == 1) {
	    	$('#menstrual-history').hide();
	    }
	    else if($('#saveForm').data('gender') == 0){
	    	$('#circumcision-history').hide();
	    }
	});
  	
</script>


@endsection