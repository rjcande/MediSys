@extends('nurse.layout.nurse')

@section('content')

 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Medical Log</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h4 style="display: inline">{{ Session::get('request.patientID') }} - <em> {{ Session::get('request.patientName') }}</em></h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <form id="saveForm">
                        @csrf()
                    <div id="smartwizard">
                      <ul>
                          <li><a href="#step-1">Step 1<br /><h4>Vital Signs</h4></a></li>
                          <li><a href="#step-2">Step 2<br /><h4>Symptoms and Attending Physician</h4></a></li>
                          <li><a href="#step-3">Step 3<br /><h4>Prescription</h4></a></li>
                          <li><a href="#step-4">Step 4<br /><h4>Notes</h4></a></li>
                      </ul>
     
                      <div>
                          <div id="step-1" class="" style="margin-top: 20px;">
                            <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                              height:30px; border-radius:8px;">&nbsp<b>Vital Signs</b></p>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Blood Pressure: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center; margin-right: 5px;" name="bloodPressureSystolic" data-parsley-pattern="^\d{1,3}" data-parsley-max="190" data-parsley-group="vitalSign" placeholder="systolic" data-parsley-errors-container="#error-bloodPressure" data-parsley-error-message="systolic should not be greater than 190">
                             <label style="font-size: 20px;">/</label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 5px; text-align: center;" name="bloodPressureDiastolic" data-parsley-pattern="^\d{1,3}" data-parsley-max="100" data-parsley-group="vitalSign" placeholder="diastolic" data-parsley-errors-container="#error-bloodPressure" data-parsley-error-message="diastolic should not be greater than 100"><br>
                             <div id="error-bloodPressure" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;" >Heart Rate: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="" name="heartRate" data-parsley-pattern="^\d{1,3}" data-parsley-group="vitalSign" data-parsley-errors-container="#error-heartRate"><br>
                             <div id="error-heartRate" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Respiratory Rate: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="" name="respiratoryRate" data-parsley-pattern="^\d{1,3}" data-parsley-group="vitalSign" data-parsley-errors-container="#error-respiratoryRate"><br>
                             <div id="error-respiratoryRate" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Temperature: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="" name="temperature" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-temperature"><br>
                             <div id="error-temperature" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Height: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="" name="height" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-height">
                             <select name="heightUnit" id="heightUnit" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;">
                               <option value="cm">centimeters</option>
                               <option value="ft">feet</option>
                               <option value="in">inches</option>
                             </select>
                             <br>
                            <div id="error-height" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Weight: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="" name="weight" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-weight">
                          
                            <select name="weightUnit" id="weightUnit" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;">
                               <option value="kg">kilograms</option>
                               <option value="lb">pounds</option>
                             </select>
                             <br>
                              <div id="error-weight" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Body Mass Index: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="" name="bmi" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-bmi" readonly><br>
                             <div id="error-bmi">
                               
                             </div>
                             <label style="display: inline-block;width: 190px; margin-bottom:10px; margin-left: 25px;">BMI Range: </label>
                             <input type="radio" name ="bmiRange" value="0" data-parsley-group="vitalSign">&nbsp Underweight
                             <input type="radio" name ="bmiRange" value="1" data-parsley-group="vitalSign">&nbsp Normal
                             <input type="radio" name ="bmiRange" value="2" data-parsley-group="vitalSign">&nbsp Overweight
                             <input type="radio" name ="bmiRange" value="3" data-parsley-group="vitalSign">&nbsp Obese Class I
                             <input type="radio" name ="bmiRange" value="4" data-parsley-group="vitalSign">&nbsp Obese Class II
                             <input type="radio" name ="bmiRange" value="5" data-parsley-group="vitalSign">&nbsp Obese Class III
                            
                          </div>
                          <div id="step-2" class="">
                            <div id="attending-physician" style="float: left; margin-top: 20px;">
                              <div style="float:left; margin-left:10px; font-size:18px; width:200px;">
                                <label><header style="margin-bottom:12px; margin-left:25px;"> Attending Physician</header>
                                </label>
                              </div>
                              <div style="float:left; margin-left:40px; font-size:18px; width:300px;">
                                <select name="attendingPhysician" style="width:250px; border-radius:8px; margin-bottom:12px;height: 25px;">
                                    <option value="" disabled selected>Select Physician</option>
                                    <option value=""></option>
                                    @foreach($physicians as $physician)
                                      <option value="{{ $physician->id }}">
                                        {{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }}
                                      </option>
                                    @endforeach
                                </select>
                              </div><br>
                            </div>
  
                            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%; margin-bottom: 20px;">
                              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);height:30px; border-radius:8px;">&nbsp<b>Symptoms</b></p>
                              <textarea rows="7" class="form-control" placeholder="Enter Symptoms here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="symptoms" data-parsley-group="first" required></textarea>
                            </div>
                          </div>
                          <div id="step-3" class="">
                            <div id="prescription" style="float:left; margin-top: 20px; width: 100%">
                              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                              height:30px; border-radius:8px;">&nbsp<b>Prescription</b></p>
                            </div>    
     
                            <div id="prescription">
                              <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
                                  background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine</label>
                              <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
                                  background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply</label>
                            </div><br>
      
                            <div id="prescription" style="float: left; width: 50%">
                              <div style="float:left; margin-left:10px; font-size:18px; width:450px;">
                                <div style="float: left;">
                                  <div style="float: left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Generic Name</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px;height: 25px;" name="medGenericName" id="medGenericName"   data-parsley-required="true" data-parsley-group="second">
                                      <option value="" disabled selected hidden>Select Generic Name</option>
                                      @foreach($medicineName as $medicine)
                                        <option value="{{ $medicine->medicineID }}">{{ $medicine->genericName }}</option>
                                      @endforeach
                                  
                                    </select><br>
                                  </div>
                                </div>

                                <div style="float: left;">
                                  <div style="float: left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Brand</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medBrand" id="medBrand" data-parsley-required="true" data-parsley-group="second" disabled>
                                      <option value="" disabled="" selected="" hidden>Select Brand</option>
                                    </select><br>
                                  </div>
                                </div>

                                <div style="float: left;">
                                  <div style="float: left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Quantity</header>
                                  </div>

                                  <div style="float: left;">
                                    <input type="number" name="medQuantity" id="medQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="second" min='1' data-parsley-error-message="should be greater than or equal to 1"><br>
                                  </div>
                                </div>
                                
                                <div style="float: left;">
                                  <div style="float: left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Unit</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medUnit" id="medUnit" data-parsley-required="true" data-parsley-group="second" disabled>
                                      <option value="" disabled="" selected="" hidden></option>
                                    </select><br>
                                  </div>
                                  
                                </div>

                                <div style="float: left;">
                                  <div style="float:left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Dosage</header>
                                  </div>
                                  <div style="float:left;">
                                    <input type="text" style="width:150px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" data-parsley-group="second" name="dosage" id="dosage" data-parsley-required = "true" data-parsley-errors-container="#error-dosage" data-parsley-error-message="dosage is required">
                                    <select name="dosageUnit" style="width: 95px; border-radius:8px; margin-bottom:12px; 172px;height: 25px; text-align: center" id="dosageUnit" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosage">
                                      <option value="mg">mg</option>
                                      <option value="ml">ml</option>
                                    </select>
                                    <br>
                                  </div><br>
                                </div>
                                <br>
                                <div style="float: left; width: 100%; padding-left: 150px;" id="error-dosage">
                                  
                                </div>

                              <div style="float: left;">
                                  <div style="float:left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Medication</header>
                                  </div>
                                  <div style="float:left; width: 300px; font-size: 15px;">
                                    <header style="display: inline;">every</header>
                                    <input type="number" name="hrs_day" style="width: 20%; border-radius: 10px;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="hrs/day is required">
                                    <header style="display: inline;">hrs/day</header>
                                    <header style="display: inline;">for</header>
                                    <input type="number" name="week" style="width: 20%; border-radius: 10px; display: inline;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="week/s is required">
                                    <header style="display: inline;">week/s</header>
                                    <br>
                                  </div><br><br>
                              </div>
                              <br>
                              <div style="float: left; width: 100%; padding-left: 150px;" id="error-dosageUnit">
                                  
                              </div>
                               
                               <button type="button" class="btn btn-success" style="float: right; margin-right:13%" name="btnMedAdd" id="btnMedAdd">ADD</button>  
                              </div>  

                            </div>
            
                            <div id="prescription" style="float: left; width: 50%">
                              <div style="float:left; margin-left:10px; font-size:18px;">
                                <div style="float: left;">
                                  <div style="float: left; width: 200px;">
                                    <header style="margin-bottom:12px; margin-left:10px;"> Medical Supply Name</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppName"  id="medSuppName" data-parsley-required="true" data-parsley-group="third">
                                      <option value="" disabled="" selected="">Select Supply Name</option>
                                      @foreach($medicalSupplyList as $medicalSupply)
                                        <option value="{{ $medicalSupply->medSupID }}">{{ $medicalSupply->medSupName }}</option> 
                                      @endforeach
                                    </select><br>
                                  </div>
                                  
                                </div>

                                <div style="float: left;">
                                  <div style="float: left; width: 200px;">
                                    <header style="margin-bottom:12px; margin-left:10px;"> Brand</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppBrand" id="medSuppBrand" data-parsley-required="true" data-parsley-group="third" disabled>
                                      <option value="" disabled="" selected="">Select Brand</option>
                                 
                                    </select><br>
                                  </div>
                                  
                                </div>

                                <div style="float: left;">
                                  <div style="float: left; width: 200px;">
                                    <header style="margin-bottom:12px; margin-left:10px;"> Quantity</header>
                                  </div>

                                  <div style="float: left;">
                                    <input type="number" name="medSuppQuantity" id="medSuppQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="third" min='1' data-parsley-error-message="should be greater than or equal to 1"><br>
                                  </div>
                                </div>
                               
                                <div style="float: left;">
                                  <div style="float: left; width: 200px;">
                                    <header style="margin-bottom:12px; margin-left:10px;"> Unit</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppUnit" id="medSuppUnit" data-parsley-required="true" data-parsley-group="third" disabled>
                                        <option value="" disabled selected></option>
                          
                                    </select><br>
                                  </div>
                                  
                                </div>
                                <button type="button" class="btn btn-success" style="float: right; margin-right:10%" id="btnSuppAdd">ADD</button>
                              </div>  
                  
                            </div>

                            <div style="float: left; width: 100%">
                              <div id="medicineTable"class="row"
                              style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 30px;width: 45%"><h4 style="margin-bottom:5px; margin-left:5px;"> Given Medicine</h4>
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                                  <thead>
                                    <tr class="headings">
                                      <th>
                                        
                                      </th>
                                      <th class="column-title">Generic Name </th>
                                      <th class="column-title">Brand </th>
                                      <th class="column-title">Quantity Used</th>
                                      <th class="column-title">Unit</th>
                                      <th class="column-title">Dosage</th>
                                      <th class="column-title no-link last"><span class="nobr">Medication</th>
                                      <th class="bulk-actions" colspan="5">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                      </th>
                                    </tr>
                                  </thead>

                                  <tbody id="tbodyMedicine">
                                   
                                  </tbody>
                                </table>
                                 <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                                  <button type="button" class="btn btn-default" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                                </div>
                              </div>

                              <div id="medicineTable"class="row"
                              style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 50px; width: 47%"><h4 style="margin-bottom:5px;">Used Medical Supply</h4>
                              <div class="table-responsive" style="margin-bottom: 20px;">
                                <table class="table table-striped table-bordered jambo_table bulk_action" id="medSuppTable">
                                  <thead>
                                    <tr class="headings">
                                      <th>
                                      
                                      </th>
                                      <th class="column-title">Supply Name </th>
                                      <th class="column-title">Brand </th>
                                      <th class="column-title">Quantity Used</th>
                                      <th class="column-title no-link last"><span class="nobr">Unit</span>
                                      </th>
                                      <th class="bulk-actions" colspan="8">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                      </th>
                                    </tr>
                                  </thead>

                                  <tbody id="tbodyMedicalSupply">
                                   
                                  </tbody>
                                </table>
                                 <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                                  <button type="button" class="btn btn-default" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                              </div>
                            </div>
                            </div>
                          </div>
                          <div id="step-4" class="">
                            <div id="recommendation" style="width: 100%;float: left; margin-top: 10px;">
                               <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                                height:30px; border-radius:8px;">&nbsp<b>Notes <em>(for Physician)</em></b></p>
                              <textarea rows="7" class="form-control" placeholder="Enter Notes Here"
                              style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="notes"></textarea>
                            </div>
                          </div>
                         </form>
                      </div>
              
                    </div>
                  </div>
                </div>
              </div>

 
              <!-- /form input mask -->  

            </div>
          </div>
        </div>
<!-- @if(count($hasAppointment) > 0)
  <script>
      $(document).ready(function(){
          swal({
              title: "Appointment",
              text: "You have an appointment today!",
              icon: "info",
              buttons: true,
          }).then((ok)=>{
          if (ok) {
            $.ajax({
              url:'/nurse/hasAppointment/' + '{{ $hasAppointment["appointmentID"] }}',
              type:'get',
              success: function(output){
                
              }
            });
          }
          else{

          }
    });
      });
  </script>
@endif -->
<script>
  $(document).ready(function(){
    //variables to use for getting the medicine
   var _idMedBrand = new Array();
   var medQuantity = new Array();
   var _idMedSuppBrand = new Array();
   var medSuppQuantity = new Array();
   var medication = new Array();
   var dosage = new Array();
   //variables for storing vital signs
   var bloodPressureSystolic;
   var bloodPressureDiastolic;
   var heartRate;
   var respiratoryRate;
   var temperature;
   var height
   var weight;
   var bmi;
   var bmiRange;



    $('#saveForm').parsley();
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
                     e.preventDefault();

                      $('#saveForm').parsley().validate('first');

                      if($('#saveForm').parsley().isValid('first')){
                      
                        var id = {
                          _medicineID: _idMedBrand,
                          _medQuantity: medQuantity,
                          _medSuppID: _idMedSuppBrand,
                          _medSuppQuantity: medSuppQuantity,
                          _dosage: dosage,
                          _medication: medication,
                          _bloodPressure: bloodPressure,
                          _heartRate: heartRate,
                          _respiratoryRate: respiratoryRate,
                          _temperature: temperature,
                          _height: height,
                          _weight: weight,
                          _bmi: bmi,
                          _bmiRange: bmiRange
                        }
                       // console.log(id);
                        $.ajax({

                          url: '/nurse/log/patient/save',
                          type:'get',
                          data:$('#saveForm').serialize() + "&" + $.param(id),
                          success:function(output){
                            window.location.href = '/nurse/patient/medical/log/edit/' + output.clinicLogID;
                    
                          }
                        });
                      }

                  });
    var btnCancel = $('<button></button>').text('Cancel')
                                     .addClass('btn btn-danger')
                                     .on('click', function(){ 
                                      //window.location.href = '/nurse/log/patient/create';
                                     $('#smartwizard').smartWizard("reset"); 
                                   });


    $('#smartwizard').smartWizard({
      selected: 0,
      theme: 'arrows',
      transitionEffect:'fade',
      enableFinishButton: true,
      showStepURLhash: true,
      toolbarSettings: {
          toolbarPosition: 'bottom',
          toolbarButtonPosition: 'end',
          toolbarExtraButtons: [btnFinish,btnCancel]
      },
      anchorSettings: {
          anchorClickable: true, // Enable/Disable anchor navigation
          enableAllAnchors: true, // Activates all anchors clickable all times
      },
    });

        // Initialize the leaveStep event
    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
      if (stepNumber == 0) {
        $('#saveForm').parsley().validate('vitalSign');
        if ($('#saveForm').parsley().isValid('vitalSign')) {
           //variables for storing vital signs
          if ($('input[name=bloodPressureSystolic]').val() != '' && $('input[name=bloodPressureDiastolic]').val() != '') {
            bloodPressure = $('input[name=bloodPressureSystolic]').val() + "/" + $('input[name=bloodPressureDiastolic]').val();
          }
          else{
            bloodPressure = '';
          }
          
          heartRate = $('input[name=heartRate]').val();
          respiratoryRate = $('input[name=respiratoryRate]').val();
          temperature = $('input[name=temperature]').val();
          
          if ($('input[name=height]').val() != '' && $('input[name=weight]').val() != '') {
            height = $('input[name=height]').val() + " " + $('#heightUnit').val();
            weight = $('input[name=weight]').val() + " " + $('#weightUnit').val();
          }
          
          bmi = $('input[name=bmi]').val();
          bmiRange = $('input[name=bmiRange]:checked').val();
        }
        else{
          return false;
        }
      }
      if (stepNumber == 1 && stepDirection == 'forward') {
        $('#saveForm').parsley().validate('first');
        if ($('#saveForm').parsley().isValid('first')) {
          return true;
        }
        else{
          return false;
        }
      }
      else if(stepNumber == 1 && stepDirection == 'backward'){
        return true;
      }

    });

    // Initialize the showStep event
    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
      if (stepNumber == 2) {
        //On change of Medicine Name
        $('#medGenericName').on('change', function(e){
          var mName = $(this).find("option:selected").text();
          $.get('/get/med/brand?mName=' + mName, function(data){
            console.log(data);
            $('#medBrand').empty();
            $('#medUnit').empty();
            $('#medBrand').prop('disabled', false);

            $('#medBrand').append('<option value="" disabled selected hidden>Select Brand</option>');
            $.each(data, function(index, brandObj){
              $('#medBrand').append('<option value="'+ brandObj.medicineID +'">'+brandObj.brand+'</option>');
            });
          });      
        });

        //On change of Med Brand
        $('#medBrand').on('change', function(){
          var mbrand = $(this).find("option:selected").text();
          var mName = $('#medGenericName').find("option:selected").text();
          $.get('/get/med/unit?mName=' + mName + "&mBrand=" + mbrand, function(data){
            console.log(data);
            $('#medUnit').prop('disabled', false);
            $('#medUnit').empty();
            $('#medUnit').append('<option value="'+ data[0]['medicineID'] +'">'+data[0]['unit']+'</option>')
          });      
        });

        //On change of Medical Supply Name
        $('#medSuppName').on('change', function(e){
          var mName = $(this).find("option:selected").text();
          $.get('/get/medSupp/brand?mName=' + mName, function(data){
            $('#medSuppBrand').empty();
            $('#medSuppUnit').empty();
            $('#medSuppBrand').prop('disabled', false);

            $('#medSuppBrand').append('<option value="" disabled selected hidden>Select Brand</option>');
            $.each(data, function(index, brandObj){
              $('#medSuppBrand').append('<option value="'+ brandObj.medSupID +'">'+brandObj.brand+'</option>');
            });
          });      
        });

        //On change of Medical Supply Name
        $('#medSuppBrand').on('change', function(e){
          var mBrand = $(this).find("option:selected").text();
          var mName = $('#medSuppName').find("option:selected").text();
          $.get('/get/medSupp/unit?mName=' + mName + "&mBrand=" + mBrand, function(data){
        
            $('#medSuppUnit').prop('disabled', false);
            $('#medSuppUnit').append('<option value="'+data[0].medSupID+'">'+data[0].unit+'</option>');
            
          });      
        });

        //Validation For adding Medicine
        $('#btnMedAdd').click( function(event) {
          event.preventDefault();
          
          // Validate all Medicine fields.
          $('#saveForm').parsley().validate('second');     
          if ($('#saveForm').parsley().isValid('second')) {
            var medGenericName = $('select[name=medGenericName] option:selected').text();
            var _idMedGenericName = $('select[name=medGenericName]').val();
            var medBrand = $('select[name=medBrand] option:selected').text();
            _idMedBrand[_idMedBrand.length] = $('select[name=medBrand]').val();
            medQuantity[medQuantity.length] = $('input[name=medQuantity]').val();
            var medUnit = $('select[name=medUnit] option:selected').text();
            var _idMedUnit = $('select[name=medUnit]').val();
            medication[medication.length] ="Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ";
            dosage[dosage.length] = $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val();

            var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medGenericName+"</td><td class=' '>"+medBrand+"</td><td class=' '>"+medQuantity[medQuantity.length-1]+"</td><td class=' '>"+medUnit+"</td><td>"+dosage[dosage.length-1]+"</td><td>"+medication[medication.length-1]+"</td></tr>";

            $(tr).prependTo('#tbodyMedicine');
            //Reset Med Fields
            $('select[name=medGenericName]').prop('selectedIndex', 0);
            $('select[name=medBrand]').prop('selectedIndex', 0);
            $('select[name=medUnit]').prop('selectedIndex', 0);
            $('select[name=medBrand]').prop('disabled', true);
            $('select[name=medUnit]').prop('disabled', true);
            $('input[name=medQuantity]').val(this.defaultValue);
            $('input[name=medication]').val(this.defaultValue);
            $('input[name=dosage]').val(this.defaultValue);
            $('input[name=hrs_day]').val(this.defaultValue);
            $('input[name=week]').val(this.defaultValue);
          }
          else{
            return false
          }
        });

        $('#btnSuppAdd').click(function(event){
          event.preventDefault();

          // Validate all Medical Supply fields.
          $('#saveForm').parsley().validate('third');
          
          if ($('#saveForm').parsley().isValid('third')) {
            var medSuppName = $('select[name=medSuppName] option:selected').text();
            var _idMedSuppName = $('select[name=medSuppName]').val();
            var medSuppBrand = $('select[name=medSuppBrand] option:selected').text();
            _idMedSuppBrand[_idMedSuppBrand.length] = $('select[name=medSuppBrand]').val();
            medSuppQuantity[medSuppQuantity.length] = $('input[name=medSuppQuantity]').val();
            var medSuppUnit = $('select[name=medSuppUnit] option:selected').text();
            var _idMedSuppUnit = $('select[name=medSuppUnit]').val();

            var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medSuppName+"</td><td class=' '>"+medSuppBrand+"</td><td class=' '>"+medSuppQuantity[medSuppQuantity.length-1]+"</td><td class=' last'>"+medSuppUnit+"</td></tr>";

            $(tr).prependTo("#tbodyMedicalSupply");

            //Reset Medical Supply Fields
            $('select[name=medSuppName]').prop('selectedIndex', 0);
            $('select[name=medSuppBrand]').prop('selectedIndex', 0);
            $('select[name=medSuppUnit]').prop('selectedIndex', 0);
            $('select[name=medSuppBrand]').prop('disabled', true);
            $('select[name=medSuppUnit]').prop('disabled', true);
            $('input[name=medSuppQuantity]').val(this.defaultValue);
       

          }
        });

      }
    });

    //Compute for the BMI
    var height;
    var weight;
    var meters;
    var kilograms;
    var bmi = 0;
    $('input[name=height]').on('keyup', function(){
      height = $('input[name=height]').val();
      computeBMI(height, weight);
    });

    $('input[name=weight]').on('keyup', function(){
      weight = $('input[name=weight]').val();
      computeBMI(height, weight);
    });
    
    function computeBMI(height, weight){
      //check the unit of height
      if ($('select[name=heightUnit]').val() == 'cm') {
          meters = height / 100;
      }
      else if ($('select[name=heightUnit]').val() == 'ft') {
          meters = height * 0.3048;
      }
      else if ($('select[name=heightUnit]').val() == 'in') {
          meters = height * 0.0254;
      }
      //check the unit of weight
      if ($('select[name=weightUnit]').val() == 'kg') {
        kilograms = weight;
      }
      else if ($('select[name=weightUnit]').val() == 'lb') {
        kilograms = weight * 0.453592;
      }

      //calculate BMI
      bmi = Math.round((kilograms / (meters * meters)) * 100) / 100;

      if (!isNaN(bmi)) {
        $('input[name=bmi]').val(bmi.toFixed(2));
      }
      
      if (bmi >= 0 && bmi <= 18.50) {
        $('input[name=bmiRange]').val([0]);
      }

      else if(bmi > 18.49 && bmi <= 24.99){
        $('input[name=bmiRange]').val([1]);
      }

      else if(bmi >= 25.00 && bmi <=29.99){
        $('input[name=bmiRange]').val([2]);
      }

      else if(bmi >=30.00 && bmi <=34.99){
        $('input[name=bmiRange]').val([3]);
      }

      else if(bmi >= 35.00 && bmi <=39.99){
        $('input[name=bmiRange]').val([4]);
      }

      else if(bmi >= 40.00){
        $('input[name=bmiRange]').val([5]);
      }
     

    }
    
  });
</script>
@endsection