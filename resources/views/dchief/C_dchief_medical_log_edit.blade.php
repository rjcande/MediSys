@extends('dchief.layout.dchief')

@section('content')

    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Dashboard</h3>
          </div>
        </div>

          <div class="clearfix"></div>

        <div class="row">
          <!-- form input mask -->
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h3>
                  @foreach($patientDentalLogs as $patientDentalLog)
                  {{$patientDentalLog->patientID}}, {{$patientDentalLog->firstName}} {{$patientDentalLog->middleName}} {{$patientDentalLog->lastName}}
                  @endforeach
                </h3>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="saveForm">
                  @csrf
                <!-- Content -->
                  <div class="">
                    <br>
                    <div id="diagnosis">
            
                      <div id="symptoms" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Symptoms</b></p>
                        <textarea required rows="7" name="symptoms" id="symptoms" data-parsley-group="first" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">{{$patientDentalLog->symptoms}}</textarea>
                      </div>
                    
                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b></p>
                        <textarea required rows="7" name="diagnosisTextArea" id="diagnosisTextArea" data-parsley-group="first" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">{{$diagnosis['diagnosisDescription']}}</textarea>
                      </div>

                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white); height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b></p>
                        <div style="display: inline-block;width: 95%;">
                          <input style="margin-left: 6%;" type="checkbox" value="1" data-parsley-group="first" name="dentalExam"
                            @if($treatment['dentalExamination'] == 1)
                            {{"checked"}}
                            @endif`     
                          ><label>&nbspDental Examination</label>
                          <input style="margin-left: 5%;" type="checkbox" value="1" data-parsley-group="first" name="oralProphylaxis"
                            @if($treatment['oralProphylaxis'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspOral Prophylaxis</label>
                          <input style="margin-left: 5%" type="checkbox" value="1" data-parsley-group="first" name="restorationChk"
                            @if($treatment['restoration'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspRestoration(Filling Tooth):</label>
                          <input style="width:150px; border-radius:8px; margin-left:1%;" type="text" disabled value="{{$treatment['restorationTooth']}}" data-parsley-group="first" name="restorationTxt">
                          <input style="margin-left: 5%" type="checkbox" value="1" data-parsley-group="first" name="extractionChk"
                            @if($treatment['extraction'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspExtraction:</label>
                          <input style="width:150px; border-radius:8px; margin-left:1%;" disabled type="text" value="{{$treatment['extractionTooth']}}" data-parsley-group="first" name="extractionTxt">
                          <br>
                          <input style="margin-left: 6%;" type="checkbox" value="1" data-parsley-group="first" name="othersTreatment"><label>&nbspOthers:</label>
                          <textarea name="treatment" id="treatment" disabled rows="7" data-parsley-group="first" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 100%; height:100px;  margin-bottom: 20px">{{$treatment['treatmentDescription']}}</textarea>
                        </div>
                      </div>
                      <br><br>
                
                      <div id="prescription" style="float:left; margin-top: 50px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                          height:30px; border-radius:8px;">&nbsp<b>Prescription and Recommendation</b></p>
                      </div>    
                
                      <!-- <div id="prescription">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine</label>
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply</label>
                      </div> -->

<!--MEDICINE--------------------------------------------------------------------------------->  
                      <div id="prescription" style="float: left; width: 50%; margin-top: 30px">
                        <div style="float:left; margin-left:10px; font-size:18px; width:450px;">
                        <label style="color:white; font-size:18px; margin: 0 auto; width: 100%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine</label>
                          
                          <!--MEDICINE GENERIC NAME-->
                          <div style="float: left; margin-top: 20px;">
                            <div style="float: left; width: 150px;">
                              <header style="margin-bottom:12px; margin-left:25px;"> Generic Name</header>
                            </div>
                            <div style="float: left;">
                              <select style="width:250px; border-radius:8px; margin-bottom:12px;height: 25px;" name="genericName" id="genericName"   data-parsley-required="true" data-parsley-group="second">
                                <option value="" disabled selected hidden>Select Generic Name</option>
                                @foreach($medicines as $medicine)
                                  <option value="{{ $medicine->medicineID }}">{{ $medicine->genericName }}</option>
                                @endforeach
                              </select><br>
                            </div>
                          </div>

                          <!--MEDICINE BRAND DROPDOWN-->
                          <div style="float: left;">
                            <div style="float: left; width: 150px;">
                              <header style="margin-bottom:12px; margin-left:25px;"> Brand</header>
                            </div>
                            <div style="float: left;">
                              <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medicineBrand" id="medicineBrand" data-parsley-required="true" data-parsley-group="second" disabled>
                                <option value="" disabled="" selected="" hidden>Select Brand</option>
                                @foreach($medicines as $medicine)
                                  <option value="{{$medicine->medicineID}}">{{$medicine->brand}}</option>
                                @endforeach
                              </select><br>
                            </div>
                          </div>

                          <!--MEDICINE QUANTITY TEXTBOX -->
                          <div style="float: left;">
                            <div style="float: left; width: 150px;">
                              <header style="margin-bottom:12px; margin-left:25px;"> Quantity</header>
                            </div>
                            <div style="float: left;">
                              <input type="number" name="medQuantity" id="medQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="second"><br>
                            </div>
                          </div>

                          <!--MEDICINE UNIT DROPDOWN -->
                          <div style="float: left;">
                            <div style="float: left; width: 150px;">
                              <header style="margin-bottom:12px; margin-left:25px;"> Unit</header>
                            </div>
                            <div style="float: left;">
                              <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medicineUnit" id="medicineUnit" data-parsley-required="true" data-parsley-group="second" disabled>
                                <option value="" disabled="" selected="" hidden>Select Unit</option>
                                @foreach($medicines as $medicine)
                                  <option value="{{$medicine->unit}}">{{$medicine->unit}}</option>
                                @endforeach
                              </select><br>
                            </div>
                          </div>
                          
                          <!-- MEDICINE DOSAGE -->
                          <div style="float: left;">
                            <div style="float:left; width: 150px;">
                              <header style="margin-bottom:12px; margin-left:25px;"> Dosage</header>
                            </div>
                            <div style="float:left;">
                              {{-- <select name="dosage" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" id="dosage" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosage" data-parsley-error-message="dosage is required">
                                @foreach($medicines as $medicine)
                                  <option value="{{$medicine->dosage}}">{{$medicine->dosage}}</option>
                                @endforeach
                              </select> --}}
                              <input type="number" style="width:145px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" name="dosage" id="dosage" data-parsley-group="second" data-parsley-required="true" data-parsley-errors-container="#error-dosage" data-parsley-error-message="dosage is required">
                              <select name="dosageUnit" id="dosageUnit" style="width:100px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-group="second" data-parsley-required="true" data-parsley-errors-container="#error-dosage">
                                <option value="mg">mg</option>
                                <option value="g">g</option>
                                <option value="oz">oz</option>
                              </select>
                              <br>
                            </div><br>
                          </div>
                          <br>
                          <div style="float: left; width: 100%; padding-left: 150px;" id="error-dosage">
                            
                          </div>

                          <!-- MEDICATION INTAKE TEXTBOX -->
                          <div style="float: left;">
                            <div style="float:left; width: 150px;">
                              <header style="margin-bottom:12px; margin-left:25px;"> Medication</header>
                            </div>
                            <div style="float:left; width: 300px; font-size: 15px;">
                              {{-- <header style="display: inline;">every</header>
                              <input type="number" name="hrs_day" style="width: 20%; border-radius: 10px;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="hrs/day is required">
                              <header style="display: inline;">hrs/day</header>
                              <header style="display: inline;">for</header>
                              <input type="number" name="week" style="width: 20%; border-radius: 10px; display: inline;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="week/s is required">
                              <header style="display: inline;">week/s</header> --}}
                              <input type="text" name="medication" id="medication" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-errors-container="#error-medication" data-parsley-group="second" data-parsley-error-message = "Medication is Required">
                              <br>
                            </div><br><br>
                          </div>
                          <br>
                          <div style="float: left; width: 100%; padding-left: 150px;" id="error-medication">
                              
                          </div>

                          <!-- EEEEEEEENNNNNNNNDDDDDD -->
                         <button type="button" class="btn btn-success" style="float: right; margin-right:13%" name="btnAddMed" id="btnAddMed">ADD</button>  
                         <button type="button" class="btn btn-default" style="float: right;" name="btnPrescribe" id="btnPrescribe">PRESCRIBE</button>
                        
                        </div>
                      </div>
                      <!--MEDICAL SUPPLY FORM---------------------------------------------------------------->
                      <div id="prescription" style="float: left; width: 50%; margin-top: 30px; margin-bottom: 40px">
                        <div style="float:left; margin-left:10px; font-size:18px;">
                          <label style="color:white; font-size:18px; margin: 0 auto; width: 100%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply</label>
                        
                          <!-- MEDICAL SUPPLY NAME -->
                          <div style="float: left; margin-top: 20px;">
                            <div style="float: left; width: 200px;">
                              <header style="margin-bottom:12px; margin-left:10px;"> Medical Supply Name</header>
                            </div>
                            <div style="float: left;">
                              <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppName"  id="medSuppName" data-parsley-required="true" data-parsley-group="third">
                                <option value="" disabled="" selected="">Select Supply Name</option>
                                @foreach($medSupplies as $medSupply)
                                  <option value="{{$medSupply->medSupID}}">{{$medSupply->medSupName}}</option>
                                @endforeach
                              </select><br>
                            </div>
                          </div>

                          <!-- MEDICAL SUPPLY BRAND NAME -->
                          <div style="float: left;">
                            <div style="float: left; width: 200px;">
                              <header style="margin-bottom:12px; margin-left:10px;"> Brand</header>
                            </div>
                            <div style="float: left;">
                              <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppBrand" id="medSuppBrand" data-parsley-required="true" data-parsley-group="third" disabled>
                                <option value="" disabled="" selected="">Select Brand</option>
                                @foreach($medSupplies as $medSupply)
                                  <option value="{{$medSupply->medSupID}}">{{$medSupply->brand}}</option>
                                @endforeach
                              </select><br>
                            </div>
                          </div>

                          <!-- MEDICAL SUPPLY QUANTITY -->
                          <div style="float: left;">
                            <div style="float: left; width: 200px;">
                              <header style="margin-bottom:12px; margin-left:10px;"> Quantity</header>
                            </div>
                            <div style="float: left;">
                              <input type="text" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" name="medSuppQuantity" id="medSuppQuantity"  data-parsley-required="true" data-parsley-group="third"><br>
                            </div>
                          </div>

                          <!-- MEDICAL SUPPLY UNIT -->
                          <div style="float: left;">
                            <div style="float: left; width: 200px;">
                              <header style="margin-bottom:12px; margin-left:10px;"> Unit</header>
                            </div>
                            <div style="float: left;">
                              <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppUnit" id="medSuppUnit" data-parsley-required="true" data-parsley-group="third" disabled>
                                <option value="" disabled="" selected="">Select Unit</option>
                                  @foreach($medSupplies as $medSupply)
                                    <option value="{{$medSupply->medSupID}}">{{$medSupply->unit}}</option>
                                  @endforeach
                              </select><br>
                            </div>
                          </div>

                          <!-- EEEEEEEENNNNNNNNDDDDDD -->
                          <button type="button" id="btnAddSup" name="btnAddSup" class="btn btn-success" style="float: right; margin-right:25%">ADD</button>
                        </div>  
                      </div>
<!--//MEDICAL SUPPLY FORM---------------------------------------------------------------->
                      <br>
                      
                    <div style="float: left; width: 100%">
                      <!-- MEDICINE TABLE -->
                      <div id="medicineTable" class="row" style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 30px;width: 45%"><h4 style="margin-bottom:5px; margin-left:5px;"> Given Medicine</h4>
                        <div class="table-responsive" style="width:100%; float: left;">
                          <table class="table table-striped table-bordered jambo_table bulk_action" id="medicineTable">
                            <thead>
                              <tr class="headings">
                                <th>
                                  <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Generic Name </th>
                                <th class="column-title">Brand </th>
                                <th class="column-title">Quantity Used</th>
                                <th class="column-title">Unit</th>
                                <th class="column-title no-link last"><span class="nobr">Medication (a day)</span></th>
                                <th class="column-title">Dosage</th>
                                <th class="bulk-actions" colspan="5">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                            </thead>

                            <tbody id="medicineTableBody">
                              @foreach($medsGiven as $meds)
                              <tr class="even pointer">  
                                <td>
                                    <input type="checkbox" name="table_records_medicine" value="{{ $meds->prescriptionID }}" id="{{ $meds->prescriptionID }}">  
                                </td>                               
                                <td>{{$meds->genericName}}</td>
                                <td>{{$meds->brand}}</td>
                                <td>{{$meds->quantity}}</td>
                                <td>{{$meds->unit}}</td>
                                <td>{{$meds->medication}}</td>
                                <td>{{$meds->dosage}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                           {{-- <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button> --}}
                            <button type="button" class="btn btn-default" id="btnDeleteMed" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>
                      
                      <!-- MEDICAL SUPPLIES GIVEN TABLE -->
                      <div id="medSuppTable" class="row" style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 50px; width: 47%"><h4 style="margin-bottom:5px;">Used Medical Supply</h4>
                        <div class="table-responsive" style="width: 100%; float: left;">
                        
                          <table class="table table-striped table-bordered jambo_table bulk_action" id="medSuppTable">
                            <thead>
                              <tr class="headings">
                                <th>
                                  <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Supply Name </th>
                                <th class="column-title">Brand </th>
                                <th class="column-title">Quantity Used</th>
                                <th class="column-title no-link last"><span class="nobr">Unit</span></th>
                                <th class="bulk-actions" colspan="8">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                            </thead>

                          <tbody id="medSuppTableBody">
                            @foreach($medSupp as $medSupps)
                            <tr class="even pointer">
                              <td>
                                  <input type="checkbox" name="table_records_medSupp" value="{{ $medSupps->medSupplyUsedID }}" id="{{ $medSupps->medSupplyUsedID }}">  
                              </td> 
                              <td>{{$medSupps->medSupName}}</td>
                              <td>{{$medSupps->brand}}</td>
                              <td>{{$medSupps->quantity}}</td>
                              <td>{{$medSupps->unit}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                          </table>
                          {{-- <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button> --}}
                          <button type="button" class="btn btn-default" id="btnDeleteSupp" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>
                    </div>

                      <!-- PRESCRIBED MEDICINE TABLE -->
                    <div id="prescriptionTable"class="row" style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px;box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom:20px;width: 95%;">
                        <h4 style="margin-bottom:5px; margin-left:5px;"> Prescribed Medicine</h4>
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered jambo_table bulk_action" id="prescriptionTable">
                            <thead>
                              <tr class="headings">
                                <th>
                                <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Generic Name </th>
                                <th class="column-title" style="padding-right:50px;">Brand </th>
                                <th class="column-title">Quantity<br>Used </th>
                                <th class="column-title">Unit </th>
                                <th class="column-title">Medication<br>(a day)</th>
                                <th class="column-title">Dosage</th>
                              </tr>
                            </thead>

                            <tbody id="prescribedMedTable">
                              @foreach($prescribed as $prescribedMeds)
                              <tr class="even pointer">
                                <td>
                                    <input type="checkbox" name="table_records_presc" value="{{ $prescribedMeds->prescriptionID }}" id="{{ $prescribedMeds->prescriptionID }}">  
                                </td>   
                                <td>{{$prescribedMeds->genericName}}</td>
                                <td>{{$prescribedMeds->brand}}</td>
                                <td>{{$prescribedMeds->quantity}}</td>
                                <td>{{$prescribedMeds->unit}}</td>
                                <td>{{$prescribedMeds->medication}}</td>
                                <td>{{$prescribedMeds->dosage}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{-- <button type="button" class="btn btn-default"
                            style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button> --}}
                          <button type="button" class="btn btn-default" id="btnDeletePresc" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>

                
                      <div style="margin-left: 40%;margin-top: 25px;float: left;;width: 50%">
                        
                        <a href="{{route('dchief.generate.prescription', $patientDentalLog->clinicLogID)}}" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-download"></i>Print Prescription</button></a>
                        <button class="btn btn-success" id="btnSave" type="submit" >SAVE</button>
                        </form>
                        <a href="{{ url('/dchief/DentalLog') }}"><button class="btn btn-primary" type="button">BACK</button></a>
                      </div>
                      
                    </div>
                  </div>
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

  var id_medBrandName = new Array();
  var medicineQuantity = new Array();
  var id_medSuppBrandName = new Array();
  var medSuppQuantity = new Array();
  var medSuppUnit = new Array();
  var id_medSuppUnit = new Array();
  var medication = new Array();
  var dosage = new Array();
  var isGiven = new Array();
  var isPrescribed = new Array();
  var medicineUnit = new Array();
  var id_medicineUnit = new Array();
  var array_med = {};
  var array_presc = {};
  var array_supp = {};
  var ctr = 0;
  var ctr_supp = 0;

      //selected medicine
    var checkBoxMedID = new Array();
    var checkBoxPrescID = new Array();
    var checkBoxMedSupID = new Array();

  //checkbox Medicine and Medical Supply
   
  $('[name=table_records_medicine]').on('change', function(){
      checkBoxMedID[checkBoxMedID.length] = $(this).val();
  });

  $('[name=table_records_medSupp]').on('change', function(){
      checkBoxMedSupID[checkBoxMedSupID.length] = $(this).val();
  });

  $('[name=table_records_presc]').on('change', function(){
      checkBoxPrescID[checkBoxPrescID.length] = $(this).val();
  });


  $('#saveForm').parsley();

  //FUNCTION IN ENABLING THE TEXTAREA FOR THE TREATMENT
  $('input[name=othersTreatment]').change(function(){
    if(this.checked){
      $('#treatment').prop('disabled', false);
      $('#treatment').prop('required', true);
    }
    else{
      $('#treatment').prop("disabled", true);
      $('#treatment').prop('required', false);
      $('#treatment').val('');
    }
  });
  //FUNCTION IN ENABLING THE TXTBOXES
  $('input[name=restorationChk]').change(function(){
    if(this.checked){
      $('input[name=restorationTxt]').prop('disabled', false);
      $('input[name=restorationTxt]').attr('required',true);
    }
    else{
      $('input[name=restorationTxt]').prop('disabled',true);
      $('input[name=restorationTxt]').attr('required',false);
      $('input[name=restorationTxt]').val('');
    }
  });
  $('input[name=extractionChk]').change(function(){
    if(this.checked){
      $('input[name=extractionTxt]').prop('disabled', false);
      $('input[name=extractionTxt]').attr('required',true);
    }
    else{
      $('input[name=extractionTxt]').prop('disabled',true);
      $('input[name=extractionTxt]').attr('required',false);
      $('input[name=extractionTxt]').val('');
    }
  });



  // TO SELECT THE BRAND NAME OF THE SELECTED GENERIC MEDICINE NAME
  $('#genericName').on('change', function(e){
    var medicineName = $(this).find("option:selected").text();
    $.get('/get/medicine/brand?medicineName=' + medicineName, function(data){
      console.log(data);
      $('#medicineBrand').empty();
      $('#medicineUnit').empty();
      $('#medicineBrand').prop("disabled", false);
      $('#medicineUnit').prop("disabled", false);

      var str = data[0]['dosage'];
        var splitted = str.split(" ");

        $('#dosage').val(splitted[0]);
        if(splitted[1] == 'mg'){
          $('#dosageUnit').val("mg");
        }
        else if(splitted[1] == 'ml'){
          $('#dosageUnit').val("ml");
        }
        else if(splitted[1] == 'g'){
          $('#dosageUnit').val("g");
        }
        else if(splitted[1] == 'oz'){
          $('#dosageUnit').val("oz");
        }

      $.each(data, function(index, medBrand){
        $('#medicineBrand').append('<option value="'+medBrand.medicineID+'">'+medBrand.brand+'</option>');
        $('#medicineUnit').append('<option value="'+ medBrand.medicineID+'">'+medBrand.unit+'</option>');
      });
    });
  });


  // TO SELECT THE BRAND NAME OF THE SELECTED MEDICAL SUPPLY
  $('#medSuppName').on('change', function(e){
    
    var medSupplyName = $(this).find("option:selected").text();
    $.get('/get/medSupply/brand?medSupplyName=' + medSupplyName, function(data){
      console.log(data);
      $('#medSuppBrand').empty();
      $('#medSuppUnit').empty();
      $('#medSuppBrand').prop("disabled", false);
      $('#medSuppUnit').prop("disabled", false);

      $.each(data, function(index, suppBrand){
        $('#medSuppBrand').append('<option value="'+ suppBrand.medSupID +'">'+suppBrand.brand+'</option>');
        $('#medSuppUnit').append('<option value="'+ suppBrand.medSupID +'">'+suppBrand.unit+'</option>');
      });
      //condition for not requiring quantity if supply unit is a bottle
      if($('#medSuppUnit').find('option:selected').text() == 'bottle'){
          $('#medSuppQuantity').attr('data-parsley-required', 'false');
          $('#medSuppQuantity').attr('value', '1');
      }
    });
  });

  //VALIDATION IN ADDING MEDICINE
  $('#btnAddMed').click(function(event){
    event.preventDefault();

    $('#saveForm').parsley().validate('second');
    if ($('#saveForm').parsley().isValid('second')){
      
      if (Object.keys(array_med).length == 0){
          array_med[ctr] = {
            medicineGenericName: $('select[name=genericName] option:selected').text(),
            medicineBrand: $('select[name=medicineBrand] option:selected').text(),
            medicineUnit: $('select[name=medicineUnit]').text(),
            medicineQuantity: $('input[name=medQuantity]').val(),
            medicineDosage: $('input[name=dosage]').val() + " " + $('select[name=dosageUnit] option:selected').val(),
            medicineMedication: $('#medication').val(),
            medicineID: $('select[name=medicineBrand]').val(),
            isGiven: 1,
            isPrescribed: 0
          }
          displayTableRow();
      }
      else{
        var isEqual = false;
        var key;
        for(var i = 0; i<Object.keys(array_med).length; i++){
          if(array_med[i].medicineID == $('select[name=medicineBrand]').val() && array_med[i].medicineMedication == $('#medication').val() && array_med[i].medicineDosage == $('input[name=dosage]').val() + " " + $('select[name=dosageUnit] option:selected').val()){
            isEqual = true;
            key = i;
          }
        }

        if(isEqual == true){
          array_med[key].medicineQuantity = parseInt(array_med[key].medicineQuantity) + parseInt($('input[name=medQuantity]').val());
          removeItems();
          displayTableRow();
        }

        else if(isEqual == false){
          ctr++;
        
          array_med[ctr] = {
            medicineGenericName: $('select[name=genericName] option:selected').text(),
            medicineBrand: $('select[name=medicineBrand] option:selected').text(),
            medicineUnit: $('select[name=medicineUnit]').text(),
            medicineQuantity: $('input[name=medQuantity]').val(),
            medicineDosage: $('input[name=dosage]').val() + " " + $('select[name=dosageUnit] option:selected').val(),
            medicineMedication: $('#medication').val(),
            medicineID: $('select[name=medicineBrand]').val()
          };
          removeItems();
          displayTableRow();          
        }//closing brace "else if(isEqual == false)"

      }//closing brace "else"
      resetFields();


    }//closing brace "if ($('#saveForm').parsley().isValid('second'))"
    else{
      return false;
    }
  });

  function removeItems(){
    $('#medicineTableBody .delete-row').remove();
  }

  function displayTableRow(){
    for(var i = 0; i < Object.keys(array_med).length; i++){

      var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='medicineTable'></td><td>"+array_med[i].medicineGenericName+"</td><td>"+array_med[i].medicineBrand+"</td><td>"+array_med[i].medicineQuantity+"</td><td>"+array_med[i].medicineUnit+"</td><td>"+array_med[i].medicineMedication +"</td><td>"+array_med[i].medicineDosage+"</td></tr>";
      
      $(tr).prependTo('#medicineTableBody');
    }
  }

  function resetFields(){
    $('select[name=genericName]').prop('selectedIndex', 0);
    $('select[name=medicineBrand]').prop('selectedIndex', 0);
    $('select[name=medicineUnit]').prop('selectedIndex', 0);
    $('select[name=medicineBrand]').prop('disabled', true);
    $('select[name=medicineUnit]').prop('disabled', true);
    $('input[name=medQuantity]').val(this.defaultValue);
    $('#medication').val(this.defaultValue);
    $('input[name=dosage]').val(this.defaultValue);
    $('select[name=dosageUnit]').prop('selectedIndex', 0);
    // $('input[name=hrs_day]').val(this.defaultValue);
    // $('input[name=week]').val(this.defaultValue);
  }

    // VALIDATION IN ADDING MEDICAL SUPPLIES
    $('#btnAddSup').click(function(event){
      event.preventDefault();
      console.log($('#saveForm').serialize);
      //VARIABLE FOR VALIDATION OF ALL THE FIELDS
      $('#saveForm').parsley().validate('third');
      if ($('#saveForm').parsley().isValid('third')){
        if(Object.keys(array_supp).length == 0){
          array_supp[ctr_supp] = {
            medicalSupplyName: $('#medSuppName option:selected').text(),
            medicalSupplyBrand: $('#medSuppBrand option:selected').text(),
            medicalSupplyQuantity: $('#medSuppQuantity').val(),
            medicalSupplyUnit: $('#medSuppUnit option:selected').text(),
            medicalSupplyID: $('select#medSuppBrand option:selected').val(),
          };
          removeSuppItems();
          displaySuppliesRow();
        }
        else{
          var isEqual = false;
          var key;
          for (var i = 0; i < Object.keys(array_supp).length; i++) {
              if (array_supp[i].medicalSupplyID == $('select[name=medSuppBrand]').val()) {
                  isEqual = true;
                  key = i;
              }
          }

          if (isEqual == true) {
            array_supp[key].medicalSupplyQuantity = parseInt(array_supp[key].medicalSupplyQuantity) + parseInt($('input[name=medSuppQuantity]').val());
            removeSuppItems();
            displaySuppliesRow();
          }
          else if(isEqual == false){
            ctr_supp++;

            array_supp[ctr_supp] = {
            medicalSupplyName: $('#medSuppName option:selected').text(),
            medicalSupplyBrand: $('#medSuppBrand option:selected').text(),
            medicalSupplyQuantity: $('#medSuppQuantity').val(),
            medicalSupplyUnit: $('#medSuppUnit option:selected').text(),
            medicalSupplyID: $('select#medSuppBrand option:selected').val(),
            };
            removeSuppItems();
            displaySuppliesRow();
          }//ELSE IF END TAG

        }//ELSE END TAG
        resetSuppFields();
      }//if ($('#saveForm').parsley().isValid('third')) END TAG
    });

    function removeSuppItems(){
      $('#medSuppTableBody .delete-row').remove();
    }

    function displaySuppliesRow(){
      for (var i = 0; i < Object.keys(array_supp).length; i++) {

        var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='medSuppTable'></td><td class=' '>"+array_supp[i].medicalSupplyName+"</td><td class=' '>"+array_supp[i].medicalSupplyBrand+"</td><td class=' '>"+array_supp[i].medicalSupplyQuantity+"</td><td class=' '>"+array_supp[i].medicalSupplyUnit+"</td></tr>";
        $(tr).prependTo('#medSuppTableBody'); 
        console.log(array_supp);
      }
    }

    function resetSuppFields(){
      $('#medSuppName').prop('selectedIndex', 0);
      $('#medSuppBrand').prop('selectedIndex', 0);
      $('#medSuppUnit').prop('selectedIndex', 0);
      $('#medSuppBrand').prop('disabled', true);
      $('#medSuppUnit').prop('disabled', true);
      $('#medSuppQuantity').val(this.defaultValue);
    };


      //VALIDATION IN PRESCRIBING MEDICINE
      $('#btnPrescribe').click(function(event){
        event.preventDefault();

        $('#saveForm').parsley().validate('second');
        if ($('#saveForm').parsley().isValid('second')){
          
          if (Object.keys(array_presc).length == 0){
              array_presc[ctr] = {
                medicineGenericName: $('select[name=genericName] option:selected').text(),
                medicineBrand: $('select[name=medicineBrand] option:selected').text(),
                medicineUnit: $('select[name=medicineUnit]').text(),
                medicineQuantity: $('input[name=medQuantity]').val(),
                medicineDosage: $('input[name=dosage]').val() + " " + $('select[name=dosageUnit] option:selected').val(),
                medicineMedication: $('#medication').val(),
                medicineID: $('select[name=medicineBrand]').val(),
                isGiven: 0,
                isPrescribed: 1
              }
              displayPrescRow();
          }
          else{
            var isEqual = false;
            var key;
            for(var i = 0; i<Object.keys(array_presc).length; i++){
              if(array_presc[i].medicineID == $('select[name=medicineBrand]').val() && array_presc[i].medicineMedication == $('#medication').val() && array_presc[i].medicineDosage == $('input[name=dosage]').val() + " " + $('select[name=dosageUnit] option:selected').val()){
                isEqual = true;
                key = i;
              }
            }

            if(isEqual == true){
              array_presc[key].medicineQuantity = parseInt(array_presc[key].medicineQuantity) + parseInt($('input[name=medQuantity]').val());
              removePrescItems();
              displayPrescRow();
            }

            else if(isEqual == false){
              ctr++;
            
              array_presc[ctr] = {
                medicineGenericName: $('select[name=genericName] option:selected').text(),
                medicineBrand: $('select[name=medicineBrand] option:selected').text(),
                medicineUnit: $('select[name=medicineUnit]').text(),
                medicineQuantity: $('input[name=medQuantity]').val(),
                medicineDosage: $('input[name=dosage]').val() + " " + $('select[name=dosageUnit] option:selected').val(),
                medicineMedication: $('#medication').val(),
                medicineID: $('select[name=medicineBrand]').val()
              };
              removePrescItems();
              displayPrescRow();          
            }//closing brace "else if(isEqual == false)"

          }//closing brace "else"
          resetFields();


        }//closing brace "if ($('#saveForm').parsley().isValid('second'))"
        else{
          return false;
        }
      });

      function removePrescItems(){
        $('#prescribedMedTable .delete-row').remove();
      }

      function displayPrescRow(){
        for(var i = 0; i < Object.keys(array_presc).length; i++){

          var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='prescribedMedTable'></td><td>"+array_presc[i].medicineGenericName+"</td><td>"+array_presc[i].medicineBrand+"</td><td>"+array_presc[i].medicineQuantity+"</td><td>"+array_presc[i].medicineUnit+"</td><td>"+array_presc[i].medicineMedication +"</td><td>"+array_presc[i].medicineDosage+"</td></tr>";
          
          $(tr).prependTo('#prescribedMedTable');
        }
      }



      //UPDATE SAVE FUNCTION!!!
      $('#btnSave').click(function(e){/////////////////
        e.preventDefault();/////////////////

        $('#saveForm').parsley().validate('first');/////////////////
        if($('#saveForm').parsley().isValid('first')){/////////////////
          var id = {///////////////
            medicineID: id_medBrandName,///////////////
            medQuantity: medicineQuantity,/////////////////
            medicineUnit: id_medicineUnit,///////////
            medSupplyID: id_medSuppBrandName,///////////////
            medSupplyQuantity: medSuppQuantity,///////////////
            medSuppUnit: id_medSuppUnit,////////////
            medication: medication,///////////////
            dosage: dosage,///////////////
            isPrescribed: isPrescribed,///////////////
            isGiven: isGiven,///////////////

            _medArray: array_med,
            _suppArray: array_supp,
            _prescArray: array_presc,

          }///////////////
          // alert('hey');

          $.ajax({///////////////
            type: 'get',///////////////
            url: "/dchief/DentalLog/update/" + '{{$patientDentalLog->clinicLogID}}',///////////////
            data: $('#saveForm').serialize() + "&" + $.param(id),///////////////
            success:function(output){///////////////
              // alert('success');
              swal({///////////////
                title: "Dental Log Updated",///////////////
                text: "Dental Log Updated!!",///////////////
                icon: "success",///////////////
                buttons: "CONFIRM",///////////////
              })///////////////
              .then((willRoute)=>{///////////////
                  window.location.href = "/dchief/DentalLog";///////////////
              });///////////////
            }///////////////
          });
        
        }///////////////
      });///////////////

      //If Medicine button delete is clicked
      $('#btnDeleteMed').on('click', function(e){
          swal({
            title: "DELETE",
            text: "Are you sure you want to delete this?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              
              $.ajax({
                url: '/dchief/delete/medicine',
                type: 'get',
                data: {medicineID: checkBoxMedID},
                success:function(output){
                  swal("Successfully deleted!", {
                      icon: "success",
                  })
                  .then((value)=>{
                      $('table tr').has('input[name="table_records_medicine"]:checked').remove();

                  });
                }
              });
            
            }
          });
      });

      //If Prescribe button delete is clicked
      $('#btnDeletePresc').on('click', function(e){
          swal({
            title: "DELETE",
            text: "Are you sure you want to delete this?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              
              $.ajax({
                url: '/dchief/delete/medicine',
                type: 'get',
                data: {medicineID: checkBoxPrescID},
                success:function(output){
                  swal("Successfully deleted!", {
                      icon: "success",
                  })
                  .then((value)=>{
                      $('table tr').has('input[name="table_records_presc"]:checked').remove();

                  });
                }
              });
            
            }
          });
      });

      //If Medical button delete is clicked
      $('#btnDeleteSupp').on('click', function(e){
          swal({
            title: "DELETE",
            text: "Are  you sure you want to delete this?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              
              $.ajax({
                url: '/dchief/delete/medical/supply',
                type: 'get',
                data: {medSupID: checkBoxMedSupID},
                success:function(output){
                  swal("Successfully deleted!", {
                      icon: "success",
                  })
                  .then((value)=>{
                      $('table tr').has('input[name="table_records_medSupp"]:checked').remove();

                  });
                }
              });
            
            }
          });
      });

    

  });
</script>

@endsection