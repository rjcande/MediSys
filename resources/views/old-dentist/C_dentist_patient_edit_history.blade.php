@extends('dentist.layout.dentist')

@section('content')

    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Dental Form</h3>
          </div>
        </div>

          <div class="clearfix"></div>

        <div class="row">
          <!-- form input mask -->
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <label class="col-md-10 col-sm-12 col-xs-12"><h4>{{$patientHistoryInfo['patientID']}} - <em>{{$patientHistoryInfo['lastName']}},  {{$patientHistoryInfo['firstName']}} {{$patientHistoryInfo['middleName']}} {{$patientHistoryInfo['quantifier']}}</em></h4></label>
                  @php
                    Session::put('patientID', $patientHistoryInfo['patientID']);
                  @endphp
                  <div class="clearfix"></div>
                </div>
              <form id="saveForm">
              @csrf()
              <div class="x_content" style="min-width: 100%; max-width: 100%; margin: 0 auto;">
                <!-- Content -->
                  <div>
                    <div id="smartwizard">
                      <ul>
                        <li><a href="#step-1">Step 1<br /><small>Past Physician Visited</small></a></li>
                        <li><a href="#step-2">Step 2<br /><small>Patient Health Status</small></a></li>
                        <li><a href="#step-3">Step 3<br /><small>Usage of Recreational Things and Allergies</small></a></li>
                        <li><a href="#step-4">Step 4<br /><small>Patient Contracted Diseases</small></a></li>
                      </ul>
                    <!-- MAIN DIV -->
                      <div>
                        <!-- MEDICAL HISTORY -->
                        <div id="step-1" class="">
                          <div id="medical-history" style="float:left; margin-top: 35px; width: 100%">
                            <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                              height:30px; border-radius:8px;">&nbsp<b>Medical History</b></p><br>
                              
                            <div style="float:left; margin-left:25px; font-size:18px; width:240px;">
                              <header style="margin-bottom:20px;">Name of Physician &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDr.</header>
                              <header style="margin-bottom:20px;">Specialty <em>(if applicable)</em></header>
                              <header style="margin-bottom:60px;"><em>Office Address</em></header>
                              <header style="margin-bottom:20px;"><em>Office Number</em></header>
                            </div>
                            
                            <div style="float:left; margin-left:15px; font-size:18px; width:300px;">
                              <input type="text" name="physicianName" style="width:350px; border-radius:8px; margin-bottom:12px;">
                              <input type="text" name="physicianSpecialty" style="width:350px; border-radius:8px; margin-bottom:12px;">
                              <textarea name="officeAddress" style="width:350px; border-radius:8px; margin-bottom:12px;"></textarea>
                              <input type="text" name="officeNumber" style="width:350px; border-radius:8px; margin-bottom:12px;">
                            </div>
                          </div>
                        </div>
                          
                        <div id="step-2" class="">  
                          <div style="float: left;margin-top: 45px;width: 100%">
                            <!-- GOOD HEALTH -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px;">
                              <p style="font-size:17px;">1. Are you in good health?
                                <input type="radio" name="goodHealth" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="goodHealth" value="0" style="margin-left: 15px;">No
                              </p>
                            </div>
                            
                            <!-- UNDER MEDICAL TREATMENT -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:10px;">
                              <p style="font-size:17px;">2. Are you under medical treatment now?
                                <input type="radio" name="medicalTreatmentRdBtn" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="medicalTreatmentRdBtn" value="0" style="margin-left: 15px;">No
                              </p>
                              <p style="font-size:15px; margin-left:25px;"><em>(if so, what is the condition being treated?)</em></p>
                              <textarea id="medicalTreatmentTextarea" name="medicalTreatmentTextarea" disabled="disabled" style="height:50px; margin-left:25px; border-radius:8px; width:900px;"></textarea>
                            </div>

                            <!-- SERIOUS ILLNESS OR SURGICAL OPERATION -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:20px;">
                              <p style="font-size:17px;">3. Have you ever had serious illness or surgical operation?
                                <input type="radio" name="seriousIllnessRdBtn" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="seriousIllnessRdBtn" value="0" style="margin-left: 15px;">No
                              </p>
                              <p style="font-size:15px; margin-left:25px;"><em>(if so, what illness or operation?)</em></p>
                              <textarea id="seriousIllnessTextarea" name="seriousIllnessTextarea" disabled="disabled" style="height:50px; margin-left:25px; border-radius:8px; width:900px;"></textarea>
                            </div>
                            
                            <!-- HOSPITALIZED -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:20px;">
                              <p style="font-size:17px;">4. Have you ever been hospitalized?
                                <input type="radio" name="hospitalizedRdBtn" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="hospitalizedRdBtn" value="0" style="margin-left: 15px;">No
                              </p>
                              <p style="font-size:15px; margin-left:25px;"><em>(if so, when and why?)</em></p>
                              <textarea id="hospitalizedTextarea" name="hospitalizedTextarea" disabled="disabled" style="height:50px; margin-left:25px; border-radius:8px; width:900px;"></textarea>
                            </div>

                            <!-- TAKING PRESCRIPTION MEDICATION -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:20px; margin-bottom: 20px">
                              <p style="font-size:17px;">5. Are you taking any prescription/non-prescription medication?
                                <input type="radio" name="medicationRdBtn" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="medicationRdBtn" value="0" style="margin-left: 15px;">No
                              </p>
                              <p style="font-size:15px; margin-left:25px;"><em>(if so, please specify)</em></p>
                              <textarea id="medicationTextarea" name="medicationTextarea" disabled="disabled" style="height:50px; margin-left:25px; border-radius:8px; width:900px;"></textarea>
                            </div>
                          </div>
                        </div>

                        <div id="step-3" class="">
                          <div style="float: left;margin-top: 30px;width: 100%">
                            <!-- USING TOBACCO -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; ">
                              <p style="font-size:17px;">6. Do you use tobacco products?
                                <input type="radio" name="tobacco" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="tobacco" value="0" style="margin-left: 15px;">No
                              </p>
                            </div>

                            <!-- USING ALCOHOL OR OTHERS -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:10px;">
                              <p style="font-size:17px;">7. Do you use alcohol, cocaine or other dangerous drugs?
                                <input type="radio" name="alcoholUse" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="alcoholUse" value="0" style="margin-left: 15px;">No
                              </p>
                            </div>

                            <!-- ALLERGIC TO ANY OF THE FOLLOWING -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:10px;">
                              <p style="font-size:17px;">8. Are you allergic to any of the following:
                                <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                                  <input type="checkbox" name="allergyLocalAnesthetic" value="1" class="radio-past" style="margin-bottom:12px;"> Local Anesthetic(ex. Lidocaine)<br>
                                  <input type="checkbox" name="allergySultaDrugs" value="1" class="radio-past" style="margin-bottom:12px;"> Sulta drugs<br>
                                  <input type="checkbox" name="allergyAspirin" value="1" class="radio-past" style="margin-bottom:12px;"> Aspirin<br>
                                  <input type="checkbox" name="allergyPenicillinAntibiotics" value="1" class="radio-past" style="margin-bottom:12px;"> Penicillin, Antibiotics<br><br>
                                </div>
                          
                                <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                                  <input type="checkbox" name="allergyLatex" value="1" class="radio-past" style="margin-bottom:12px;"> Latex<br>
                                  <input type="checkbox" name="allergyOthers" value="1" class="radio-past" style="margin-bottom:12px;"> Other <em>(please specify)</em>
                                  <textarea id="allergyOthersTextarea" name="allergyOthersTextarea" disabled style="height:50px; width:350px; border-radius:8px;"></textarea>
                                </div>
                              </p>
                            </div>

                            <!-- BLEEDING GUMS -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:10px;">
                              <p style="font-size:17px;">9. Are the gums bleeding?
                                <input type="radio" name="bleedingGumsRdBtn" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="bleedingGumsRdBtn" value="0" style="margin-left: 15px;">No
                                <p style="font-size:15px; margin-left:25px;"><em>(if so, please enter how long)</em></p>
                                <input type="text" id="bleedingTimeTextbox" name="bleedingTimeTextbox" disabled style="width:350px; border-radius:8px; margin-left:40px;">
                              </p>
                            </div>

                            <!--IF GENDER IS A WOMAN THEN ENABLED-->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:10px;">
                              <p style="font-size:17px;">10. For women only:</p>
                              <p style="font-size:17px; margin-left:50px;">Are you pregnant?
                                @if($patientHistoryInfo['gender'] == 'F' || $patientHistoryInfo['gender'] == 'f' || $patientHistoryInfo['gender'] == 0)
                                <input type="radio" name="pregnant" value="1" style="margin-left: 150px;">Yes
                                <input type="radio" name="pregnant" value="0" style="margin-left: 15px;">No
                                @elseif($patientHistoryInfo['gender'] == 'M' || $patientHistoryInfo['gender'] == 'm' || $patientHistoryInfo['gender'] == 1)
                                <input type="radio" name="pregnant" value="1" disabled style="margin-left: 150px;">Yes
                                <input type="radio" name="pregnant" value="0" disabled style="margin-left: 15px;">No
                                @endif
                              </p>
                              <p style="font-size:17px; margin-left:50px;">Are you nursing?
                                @if($patientHistoryInfo['gender'] == 'F' || $patientHistoryInfo['gender'] == 'f' || $patientHistoryInfo['gender'] == 0)
                                <input type="radio" name="nursing" value="1" style="margin-left: 165px;">Yes
                                <input type="radio" name="nursing" value="0" style="margin-left: 15px;">No
                                @elseif($patientHistoryInfo['gender'] == 'M' || $patientHistoryInfo['gender'] == 'm' || $patientHistoryInfo['gender'] == 1)
                                <input type="radio" name="nursing" value="1" disabled style="margin-left: 165px;">Yes
                                <input type="radio" name="nursing" value="0" disabled style="margin-left: 15px;">No
                                @endif
                              </p>
                              <p style="font-size:17px; margin-left:50px;">Are you taking birth control pills?
                                @if($patientHistoryInfo['gender'] == 'F' || $patientHistoryInfo['gender'] == 'f' || $patientHistoryInfo['gender'] == 0)
                                <input type="radio" name="birthControlPills" value="1" style="margin-left: 50px;">Yes
                                <input type="radio" name="birthControlPills" value="0" style="margin-left: 15px;">No
                                @elseif($patientHistoryInfo['gender'] == 'M' || $patientHistoryInfo['gender'] == 'm' || $patientHistoryInfo['gender'] == 1)
                                <input type="radio" name="birthControlPills" value="1" disabled style="margin-left: 50px;">Yes
                                <input type="radio" name="birthControlPills" value="0" disabled style="margin-left: 15px;">No
                                @endif
                              </p>
                            </div>
                            <!--*********************************************************-->

                            <!-- BLOOD TYPE -->
                            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:20px;">
                              <p style="font-size:17px;">11. Blood Type
                                <input type="text" name="bloodTypeTextbox" style="width:350px; border-radius:8px; margin-left:70px;">
                              </p>
                            </div>

                            <!-- BLOOD PRESSURE -->
                            <!-- <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:10px;">
                              <p style="font-size:17px;">12. Blood Pressure
                                <input type="text" name="bloodPressureTextbox" style="width:350px; border-radius:8px; margin-left:40px;">
                              </p>
                            </div>
 -->                          </div>
                        </div>
                          
                          <!-- ANY OF THE FOLLOWING CHECKBOXES -->
                        <div id="step-4" class="">
                          <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:10px;">
                            <p style="font-size:17px;">13. Do you have or have you had any of the following? Check which apply
                              <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                                <input type="checkbox" name="highBloodCheckbox" value="1" class="radio-past" style="margin-bottom:12px;"> High Blood Pressure<br>
                                <input type="checkbox" name="lowBloodCheckbox" value="1" class="radio-past" style="margin-bottom:12px;"> Low Blood Pressure<br>
                                <input type="checkbox" name="epilepsyCheckbox" value="1" class="radio-past" style="margin-bottom:12px;"> Epilepsy/Convulsions<br>
                                <input type="checkbox" name="aidsCheckbox" value="1" class="radio-past" style="margin-bottom:12px;"> Aids or HIV infection<br>
                                <input type="checkbox" name="stdCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Sexually Transmitted Disease<br>
                                <input type="checkbox" name="ulcersCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Stomach Troubles/Ulcers<br>
                                <input type="checkbox" name="faintingSeizuresCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Fainting Seizure<br>
                                <input type="checkbox" name="weightLossCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Rapid Weight Loss<br>
                                <input type="checkbox" name="radiationTherapyCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Radiation Therapy<br>
                                <input type="checkbox" name="jointReplacementCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Joint Replacement/Implacement<br>
                                <input type="checkbox" name="heartSurgeryCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Heart Surgery<br>
                                <input type="checkbox" name="heartAttackCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Heart Attack<br>
                                <input type="checkbox" name="thyroidProblemCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Thyroid Problem<br><br>
                              </div>

                              <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                                <input type="checkbox" name="heartDiseaseCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Heart Disease<br>
                                <input type="checkbox" name="heartMurmurCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Heart Murmur<br>
                                <input type="checkbox" name="liverDiseaseCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Hepatitis/Liver Disease<br>
                                <input type="checkbox" name="rheumaticCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Rheumatic Fever<br>
                                <input type="checkbox" name="hayFeverCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Hay fever/Allergies<br>
                                <input type="checkbox" name="respiratoryCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Respiratory Problems<br>
                                <input type="checkbox" name="hepatitisCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Hepatitis/Jaundice<br>
                                <input type="checkbox" name="tuberculosisCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Tuberculosis<br>
                                <input type="checkbox" name="swollenAnklesCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Swollen Ankles<br>
                                <input type="checkbox" name="kidneyDiseaseCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Kidney Disease<br>
                                <input type="checkbox" name="diabetesCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Diabetes<br>
                                <input type="checkbox" name="chestPainCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Chest Pain<br>
                                <input type="checkbox" name="strokeCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Stroke<br><br>
                              </div>

                              <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                                <input type="checkbox" name="cancerTumorsCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Cancer/Tumors<br>
                                <input type="checkbox" name="anemiaCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Anemia<br>
                                <input type="checkbox" name="anginaCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Angina<br>
                                <input type="checkbox" name="asthmaCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Asthma<br>
                                <input type="checkbox" name="emphysemaCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Emphysema<br>
                                <input type="checkbox" name="bleedingProblemsCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Bleeding Problems<br>
                                <input type="checkbox" name="bloodDiseaseCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Blood Disease<br>
                                <input type="checkbox" name="headInjuriesCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Head Injuries<br>
                                <input type="checkbox" name="arthritisCheckbox" value="1" class="radio-past" style="margin-bottom:12px;">Arthritis/Rheumatism<br>
                                <input type="checkbox" name="othersCheckbox" value="1" class="radio-past" style="margin-bottom:12px;"> Other <em>(please specify)</em>
                                <textarea id="othersCheckboxesTextArea" name="othersCheckboxesTextArea" disabled style="height:80px; width:250px; border-radius:8px;"></textarea>
                              </div>
                            </p>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- /MAIN DIV -->
                  </div>
                  
                    <div style="height:125px;width:100%; float: left"></div>

                    <div style="float:left;text-align: center;width: 100%">
                      <!-- <button type="submit" id="btnSave" class="btn btn-success">SAVE</button>
                      <button class="btn btn-default" style="background-color:#00d2d3; color:white;">DENTAL CHART</button> -->
                    
                    <!-- <a href="{{route('dentist.dentalchart')}}">
                      <button class="btn btn-default" style="background-color:#00d2d3; color:white;">DENTAL CHART</button>
                    </a> --> <!-- NAKALAGAY DIN TONG <A> SA DENTAL CHART BUTTON PERO NGAYON PINASOK KO LANG SA FORM -->
                      <a href="{{url('/dentist/PatientRecord')}}">
                        <button type="button" class="btn btn-danger">CLOSE</button>
                      </a>
                    </div>

                  </div>
                </form>
                <!-- /Content -->
              </div>
            </div>
          </div>
          <!-- /form input mask -->  
        </div>
      </div>
    </div>

<script>
  $(document).ready(function(){
    //SCRIPT FOR ENABLING TEXTAREAS WHEN YES IS SELECTED AND DISABLED IF NO.

    //MEDICAL TREATMENT FUNCTION
    $('input[name=medicalTreatmentRdBtn]').click(function(){
      if($('input[name=medicalTreatmentRdBtn]:checked').val()=="1"){
        $('#medicalTreatmentTextarea').prop("disabled", false);
      }
      else{
        $('#medicalTreatmentTextarea').prop("disabled", true);
      }
    });

    //SERIOUS ILLNESS FUNCTION
    $('input[name=seriousIllnessRdBtn]').click(function(){
      if($('input[name=seriousIllnessRdBtn]:checked').val()=="1"){
        $("#seriousIllnessTextarea").prop("disabled", false);
      }
      else{
        $("#seriousIllnessTextarea").prop("disabled", true);
      }
    });

    //HOSPITALIZED FUNCTION
    $('input[name=hospitalizedRdBtn]').click(function(){
      if($('input[name=hospitalizedRdBtn]:checked').val()=="1"){
        $("#hospitalizedTextarea").prop("disabled", false);
      }
      else{
        $("#hospitalizedTextarea").prop("disabled", true);
      }
    });

    //MEDICATION FUNCTION
    $('input[name=medicationRdBtn]').click(function(){
      if($('input[name=medicationRdBtn]:checked').val()=="1"){
        $("#medicationTextarea").prop("disabled", false);
      }
      else{
        $("#medicationTextarea").prop("disabled", true);
      }
    });

    //ALLERGY OTHERS FUNCTION
    $('input[name=allergyOthers]').change(function(){
      if(this.checked){
        $("#allergyOthersTextarea").prop('disabled', false);
      }
      else
      {
        $("#allergyOthersTextarea").prop("disabled",true);
      }
    });

    //BLEEDING TIME FUNCTION
    $('input[name=bleedingGumsRdBtn]').click(function(){
      // alert();
      if($('input[name=bleedingGumsRdBtn]:checked').val()=="1"){
        $("#bleedingTimeTextbox").prop('disabled', false);
      }
      else{
        $("#bleedingTimeTextbox").prop('disabled', true);
      }
    });

    //OTHERS FUNCTION
    $('input[name=othersCheckbox]').change(function(){
      if(this.checked){
        $('#othersCheckboxesTextArea').prop('disabled', false);
      }
      else{
        $('#othersCheckboxesTextArea').prop('disabled', true);
      }
    });

    //SAVING FUNCTION

    // $('#saveForm').parsley();

    // $('#saveForm').submit(function(e){
    //   e.preventDefault();
    //   $.ajax({
    //     url: '/dentist/dental/HistoryForm/store',
    //     type: 'get',
    //     data: $('#saveForm').serialize(),
    //     success: function(output){
    //       swal({
    //         title: "Record Saved!",
    //         text: "Dental History Record Saved!",
    //         icon: "success",
    //         button: "confirm",
    //       })
    //       .then((willRoute)=>{
    //         if(willRoute){
    //           window.location.href = "/dentist/dentalchart";
    //         }
    //       });
    //     }
    //   });
    // });

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

      if($('button.sw-btn-next').hasClass('disabled')){
        $('.sw-btn-group-extra').show(); // show the button extra only in the last page
      }else{
        $('.sw-btn-group-extra').hide();        
      }
    });

    // Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finish')
                      .addClass('btn btn-info')
                      .on('click', function(e){
                        //On form submit
                        e.preventDefault();

                        $('#saveForm').parsley();

                        if ($('#saveForm').parsley().isValid("first")) {
                            $.ajax({
                              url: '/dentist/dental/HistoryForm/update/' + {{$patientHistoryInfo['dentalHistoryID']}},
                              type: 'get',
                              data: $('#saveForm').serialize(),
                              success: function(output){
                                swal({
                                  title: "Record Updated!",
                                  text: "Dental History Record Updated!",
                                  icon: "success",
                                  button: "confirm",
                                })
                                .then((willRoute)=>{
                                  if(willRoute){
                                    window.location.href = '/dentist/dental/HistoryForm/view/' + {{$patientHistoryInfo['dentalHistoryID']}} ;
                                  }
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
                            }
    });

        // Initialize the leaveStep event
    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
       if (stepNumber == 1) {
         $('#saveForm').parsley().validate('first');

         if ($('#saveForm').parsley().isValid('first')) {
            return true;
         }
         else{
            return false;
         }
       }
    });


  });
</script>

@endsection