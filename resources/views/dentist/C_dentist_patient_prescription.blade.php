@extends('dentist.layout.dentist')

@section('content')

      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Dental Log</h3>
            </div>
          </div>

            <div class="clearfix"></div>

          <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>{{ Session::get('patientInfo.patientID') }}, {{ Session::get('patientInfo.patientName')}}</h2>
                    <button class="btn btn-success btn-round" style="float: right;" data-toggle="modal" data-target="#uploadImageModal" id="btnUpload">Upload Image</button>
                    {{-- <button class="btn btn-primary btn-round" style="float: right;" data-toggle="modal" data-target="#outsideReferModal" id="btnOutsideRefer">Refer Patient</button> --}}
                    <div class="clearfix"></div>
                  </div>
                  <form id="saveForm" data-id="{{Session::get('patientInfo.patientID')}}">
                  @csrf()
                <div class="x_content">
                  <!-- Content -->
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br />Symptoms and Treatments</a></li>
                            <li><a href="#step-2">Step 2<br />Prescriptions</a></li>
                            <li><a href="#step-3">Step 3<br/>Next Appointment(Optional)</a></li>
                            {{-- <li><a href="#step-4">Step 4<br />Outside Referral(Optional)</a></li> --}}
                        </ul>
                     
                        <div>
                            <div id="step-1" class="">
                              <!-- STEP 1 OPENING -->
                                <div id="diagnosis">
                                  <!-- PATIENT SYMPTOMS -->
                                  <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%;">
                                    <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                                      height:30px; border-radius:8px;">&nbsp<b>Patient Symptoms</b></p>
                                      
                                    <textarea name="symptoms" id="symptoms" data-parsley-required="true" rows="7" data-parsley-group="first" class="form-control" placeholder="Enter symptoms done here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%; height:100px;"></textarea>
                                  </div>
                                  
                                  <!-- TREATMENT DONE -->
                                  <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                                    <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                                      height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b></p>
                                    <div style="display: inline-block;width: 95%;">
                                      <input style="margin-left: 6%;" type="checkbox" value="1" data-parsley-group="first" name="dentalExam"><label>&nbspDental Examination</label>
                                      <input style="margin-left: 5%;" type="checkbox" value="1" data-parsley-group="first" name="oralProphylaxis"><label>&nbspOral Prophylaxis</label>
                                      <input style="margin-left: 5%" type="checkbox" value="1" data-parsley-group="first" name="restorationChk"><label>&nbspRestoration(Filling Tooth):</label>
                                      <input style="width:150px; border-radius:8px; margin-left:1%;" type="text" placeholder="Tooth Number" data-parsley-group="first" disabled name="restorationTxt">
                                      <input style="margin-left: 5%" type="checkbox" value="1" data-parsley-group="first" name="extractionChk"><label>&nbspExtraction:</label>
                                      <input style="width:150px; border-radius:8px; margin-left:1%;" type="text" placeholder="Tooth Number" data-parsley-group="first" disabled name="extractionTxt">
                                      <br>
                                      <input style="margin-left: 6%;" type="checkbox" value="1" data-parsley-group="first" name="othersTreatment"><label>&nbspOthers:</label>
                                      <textarea name="treatment" id="treatment" rows="7" data-parsley-group="first" disabled class="form-control" placeholder="Enter treatment done here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 100%; height:100px;  margin-bottom: 20px"></textarea>
                                    </div>
                                  </div>
 
                                  <br><br>
                                </div>
                              <!-- STEP 1 CLOSING -->
                            </div>
                            <div id="step-2" class="">
                              <!-- STEP 2 OPENING -->
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
                                      <select style="width:250px; border-radius:8px; margin-bottom:12px;height: 25px;" name="genericName" id="genericName" data-parsley-required="true" data-parsley-group="second">
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
                                      <input type="number" name="medQuantity" id="medQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="second" min="1" data-parsley-error-message = "Should be greater than or equal to 1"><br>
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
                                      {{-- <select name="dosage" id="dosage" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosage" data-parsley-error-message="dosage is required">
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
                                      <input type="number" name="hrs_day" min="1" style="width: 20%; border-radius: 10px;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="hrs/day is required">
                                      <header style="display: inline;">hrs/day</header>
                                      <header style="display: inline;">for</header>
                                      <input type="number" name="week" min="1" style="width: 20%; border-radius: 10px; display: inline;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="week/s is required">
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
                                      <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppName" id="medSuppName" data-parsley-required="true" data-parsley-group="third">
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
                                      <input type="number" name="medSuppQuantity" id="medSuppQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="third" min="1" data-parsley-error-message = "Should be greater than or equal to 1"><br>
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
                                          <th class="column-title">Dosage</th>
                                          <th class="column-title no-link last"><span class="nobr">Medication (a day)</span></th>
                                          <th class="bulk-actions" colspan="5">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                          </th>
                                        </tr>
                                      </thead>

                                      <tbody id="medicineTableBody">
                                        <!--  -->
                                      </tbody>
                                    </table>
                                     {{-- <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button> --}}
                                      {{-- <button type="button" class="btn btn-default" id="btnDeleteMed" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button> --}}
                                  </div>
                                </div>
                                
                                <!-- MEDICAL SUPPLIES GIVEN TABLE -->
                                <div id="medSupplyTable" class="row" style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 50px; width: 47%"><h4 style="margin-bottom:5px;">Used Medical Supply</h4>
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
                                      <!--  -->
                                      </tbody>
                                    </table>
                                    {{-- <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button> --}}
                                    {{-- <button type="button" class="btn btn-default" id="btnDeleteSupp" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button> --}}
                                  </div>
                                </div>
                              </div>
                            
                              <!-- PRESCRIBED MEDICINE TABLE -->
                              <div id="prescriptionTable" class="row" style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px;box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom:20px;width: 970px;">
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
                                        <th class="column-title">Dosage</th>
                                        <th class="column-title no-link last"><span class="nobr">Medication (a day)</span></th>
                                      </tr>
                                    </thead>

                                    <tbody id="prescribedMedTable">
                                  <!-- -->
                                    </tbody>
                                  </table>
                                  {{-- <button type="button" class="btn btn-default"
                                    style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button> --}}
                                  {{-- <button type="button" class="btn btn-default" id="btnDeletePres" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button> --}}
                                </div>
                              </div>

                              <!-- STEP 2 CLOSING -->
                            </div>
                            <div id="step-3" class="">
                              <!-- STEP 3 OPENING -->
                                <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 90%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">  Next Appointment</label>
                                <br>
                                <label style="margin-left:25px;font-size:18px"> Next Appointment date:  </label>
                                <input type="date" id="appointmentDate" name="appointmentDate" style="width:300px; border-radius:8px; font-size:18px; margin-bottom:12px;margin-left:5px" data-parsley-group="first">
                                <br>
                                <textarea name="appointmentDesc" id="appointmentDesc" rows="7" data-parsley-group="first" class="form-control" placeholder="Enter Appointment Reason Here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%; height:100px;  margin-bottom: 20px"></textarea>
                              <!-- STEP 3 CLOSING -->
                            </div>
                            {{-- <div id="step-4" class="">
                              <!-- STEP 4 OPENING -->
                                <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 90%;
                                  background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">View Referral Slip</label>
                                <button type="button" data-target="#outsideReferModal" data-toggle="modal" class="btn btn-success" style="margin-left: 50%"><i class="fa fa-download"></i> Referral Slip</button>
                              <!-- STEP 4 CLOSING -->
                            </div> --}}

                            
                        </div>
                    </div>
                  <!-- /Content -->
                </div>
              </form>
              </div>
            </div>
            <!-- /form input mask -->  
          </div>
        </div>
      </div>


<!-- MODAL OUTSIDE REFERRAL -->
<div id="outsideReferModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 50%; height: auto; color: black;">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body" id="">
        <form method="get" target="_blank" action="{{route('dentist.referral.slip', ['patientID' => Session::get('patientInfo.patientID'), 'date' => Session::get('patientInfo.date')])}}">
          @csrf
        <div style="font-family: Arial; font-size: 20px; /*border: 1px solid black;*/">
          <center>
            POLYTECHNIC UNIVERSITY OF THE PHILIPPINES<br>
            <b>DENTAL SERVICES</b><br>
            <em>STA. MESA, MANILA</em><br>
            <br>
            <b style="font-size: 30px ; ">REFERRAL SLIP</b>
          </center>
        </div>
        <div style="margin-left: 75%; margin-top: 20px; font-family: Arial; font-size: 15px;">
          <label>Date: </label>
          <input style="width: 63%" type="text" name="certDate" value="{{Session::get('patientInfo.date')}}">
        </div>
        <div style="font-size: 18px; font-family: Arial; margin-left: 5%;">
          <br><br>
          <p>TO: <input type="text" name="addressedDentist"></p>
          <p>Remark/s:</p>
          &nbsp&nbsp&nbsp&nbsp<textarea style=";width: 90%; height: 200px" name="remarks"></textarea>
          <br><br><br><br>
          <input style="width: 42%; margin-left: 54%" name="certDentistSigned" value="{{Session::get('accountInfo.lastName')}}, {{Session::get('accountInfo.firstName')}} {{Session::get('accountInfo.middleName')}} {{Session::get('accountInfo.quantifier')}}" type="text">
          <br>
          <label style="width: 35%; margin-left: 63%;">Referring Dentist</label><br><br>
          <div style="width: 50%; float: right; margin-right: 29px">
            <input type="text" style="float:right; width: 50%" name="licenseNumber" value="{{Session::get('accountInfo.licenseNumber')}}">
            <label style="width: 35%; float: right">License No.:</label>
          </div>
        </div><br><br><br>
        <div style="font-size: 18px; font-family: Arial; margin-left: 5%;">
          <input type="text" style="width: 40%" name="patientName" id="patientName" value="{{Session::get('patientInfo.patientName')}}"><br>
          <label>&emsp;&emsp;&emsp;Name of Patient</label>
        </div>

      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <center><button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Save And Print</button></center>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- /MODAL -->

<script>
$(document).ready(function(){

  var id_medBrandName = new Array();
  var medicineQuantity = new Array();
  var id_medSuppBrandName = new Array();
  var medSuppQuantity = new Array();
  var medication = new Array();
  var dosage = new Array();
  var isGiven = new Array();
  var isPrescribed = new Array();
  var medicineUnit = new Array();
  var id_medicineUnit = new Array();
  var array_med = {};
  var array_prescribed = {};
  var array_supp = {};
  var ctr_med = 0;
  var ctr_prescribed = 0;
  var ctr_supp = 0;

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

       // if($('button.sw-btn-next').hasClass('disabled')){
       //  $('.sw-btn-group-extra').show(); // show the button extra only in the last page
       //  }
       //  else{
       //    $('.sw-btn-group-extra').hide();        
       //  }

        if(stepNumber == 1 || stepNumber == 2 || stepNumber == 3){
          $('.sw-btn-group-extra').show();
        }
        else{
          $('.sw-btn-group-extra').hide();
        }
    });

  var btnFinish = $('<button></button>').text('Done')
                                        .addClass('btn btn-info')
                                        .on('click', function(e){ 
                                          //On form submit
                                          e.preventDefault();/////////////////
                                          this.disabled == true;
                                          $('#saveForm').parsley().validate('first');/////////////////
                                          if($('#saveForm').parsley().isValid('first')){/////////////////
                                            var id = {///////////////
                                              medArray: array_med,/////////////
                                              prescribedArray: array_prescribed,//////////
                                              suppArray:array_supp,
                                              isPrescribed: isPrescribed,///////////////
                                              isGiven: isGiven,///////////////
                                            }///////////////
                                            // alert('hey');

                                            $.ajax({///////////////
                                              type: 'get',///////////////
                                              url: "/dentist/log/patient/store",///////////////
                                              data: $('#saveForm').serialize() + "&" + $.param(id),///////////////
                                              success:function(output){///////////////
                                                // alert('success');
                                                swal({///////////////
                                                  title: "Dental Log Saved",///////////////
                                                  text: "Dental Log Saved!!",///////////////
                                                  icon: "success",///////////////
                                                  buttons: "CONFIRM",///////////////
                                                })///////////////
                                                .then((willRoute)=>{///////////////
                                                    window.location.href = "/dentist/DentalLog";
                                                });///////////////
                                              }///////////////
                                            });
                                          
                                          }///////////////
                                        });


  var btnCancel = $('<button></button>').text('Cancel')
                                       .addClass('btn btn-danger')
                                       .on('click', function(){ 
                                          $('#smartwizard').smartWizard("reset"); 
                                        });

  var btnRefer = $('<button type="button"></button>').text('REFER')
                                      .addClass('btn btn-primary')
                                      .attr('id', 'btnOutsideRefer')
                                      .on('click', function(){
                                        $('#outsideReferModal').modal('show');
                                      });


  $('#smartwizard').smartWizard({
    selected: 0,
    theme: 'arrows',
    transitionEffect: 'fade',
    autoAdjustHeight: true,
    showStepURLhash: true,
    toolbarSettings:{
                      toolbarPosition: 'bottom',
                      toolbarButtonPosition: 'end',
                      showNextButton: true,
                      showPreviousButton: true,
                      toolbarExtraButtons: [btnFinish, btnCancel, btnRefer]
                    },
    anchorSettings:{ 
      anchorClickable: true,
      enableAllAnchors: true,
    },
  });

      // Initialize the leaveStep event
    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
       if (stepNumber == 0) {
         $('#saveForm').parsley().validate('first');

         if ($('#saveForm').parsley().isValid('first')) {
            return true;
         }
         else{
            return false;
         }
       }
    });

    //   // Initialize the leaveStep event
    // $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
    //    if (stepNumber == 1) {
    //      $('#saveForm').parsley().validate('second');
    //      if ($('#saveForm').parsley().isValid('second')) {
    //       return true;
    //       }
    //      else{
    //         return false;
    //      }
    //    }
    // });

    // TO SELECT THE BRAND NAME OF THE SELECTED GENERIC MEDICINE NAME
      $('#genericName').on('change', function(e){
        var medicineName = $(this).find("option:selected").text();
        // alert();
        $.get('/get/medicine/brand?medicineName=' + medicineName, function(data){
          // console.log(data);
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

          $('#medicineBrand').append('<option value="" disabled selected hidden>Select Brand</option>');
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
          // console.log(data);
          $('#medSuppBrand').empty();
          $('#medSuppUnit').empty();
          $('#medSuppBrand').prop("disabled", false);
          $('#medSuppUnit').prop("disabled", false);
          
          $('#medSuppBrand').append('<option value="" disabled selected hidden>Select Brand</option>');
          $.each(data, function(index, suppBrand){
            $('#medSuppBrand').append('<option value="'+ suppBrand.medSupID +'">'+suppBrand.brand+'</option>');
            $('#medSuppUnit').append('<option value="'+ suppBrand.medSupID +'">'+suppBrand.unit+'</option>');
          });
        });
      });

      //VALIDATION IN ADDING MEDICINE
      $('#btnAddMed').click(function(event){
        event.preventDefault();
        // alert();
        $('#saveForm').parsley().validate('second');
        if ($('#saveForm').parsley().isValid('second')){
          if(Object.keys(array_med).length == 0){
            array_med[ctr_med] = {
              medicineGenericName: $('select#genericName option:selected').text(),
              medicineBrandName: $('select#medicineBrand option:selected').text(),
              // medicineMedication: "Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ",
              medicineMedication: $('#medication').val(),
              medicineUnit: $('select#medicineUnit option:selected').text(),
              medicineDosage: $('#dosage').val() + " " + $('#dosageUnit option:selected').val(),
              medicineID: $('select#medicineBrand option:selected').val(),
              medicineQuantity: $('#medQuantity').val(),
              isGiven: 1,
              isPrescribed: 0
            };
            // $('#medicineTable tbody').empty();
            removeItems();
            displayTableRow();
          }
          
          else{
            var isEqual = false;
            var key;
            
            for(var i = 0; i < Object.keys(array_med).length; i++){
              if(array_med[i].medicineID == $('select#medicineBrand').val() && array_med[i].medicineMedication == $('#medication').val() && array_med[i].medicineDosage == $('#dosage').val() + " " + $('#dosageUnit option:selected').val()){
                isEqual = true;
                key = i;
              }
            }
            
            if(isEqual == true){
              array_med[key].medicineQuantity = parseInt(array_med[key].medicineQuantity) + parseInt($('#medQuantity').val());
              // $('#medicineTable tbody').empty();
              removeItems();
              displayTableRow(); 
            }
            
            else if(isEqual == false){
              ctr_med++;
              array_med[ctr_med] = {
                medicineGenericName: $('select#genericName option:selected').text(),
                medicineBrandName: $('select#medicineBrand option:selected').text(),
                // medicineMedication: "Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ",
                medicineMedication: $('#medication').val(),
                medicineUnit: $('select#medicineUnit option:selected').text(),
                medicineDosage: $('#dosage').val() + " " + $('#dosageUnit option:selected').val(),
                medicineID: $('select#medicineBrand option:selected').val(),
                medicineQuantity: $('#medQuantity').val(),
                isGiven: 1,
                isPrescribed: 0
              };
              // $('#medicineTable tbody').empty();
              removeItems();
              displayTableRow(); 
            }
          
          }
          console.log(ctr_med);
          resetFields();
        }
        else{
          return false;
        }
      });

      // VALIDATION IN ADDING MEDICAL SUPPLIES
      $('#btnAddSup').click(function(event){
        event.preventDefault();
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
            // $('#medSuppTable tbody').empty();
            removeItemsSupp();
            displaySuppliesRow();
          }

          else{
            var isEqual = false;
            var key;

            for(i = 0; i < Object.keys(array_supp).length; i++){
              if(array_supp[i].medicalSupplyID == $('select#medSuppBrand').val()){
                isEqual = true;
                key = i;
              }
            }

            if(isEqual == true){
              array_supp[key].medicalSupplyQuantity = parseInt(array_supp[key].medicalSupplyQuantity) + parseInt($('#medSuppQuantity').val());
              // $('#medSuppTable tbody').empty();
              removeItemsSupp();
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
              // $('#medSuppTable tbody').empty();
              removeItemsSupp();
              displaySuppliesRow();
            }
          }
          resetSuppFields();
        }
        else{
          return false;
        }
      });

      //VALIDATION IN PRESCRIBING MEDICINE
      $('#btnPrescribe').click(function(event){
        event.preventDefault();
        // alert();
        $('#saveForm').parsley().validate('second');
        if ($('#saveForm').parsley().isValid('second')){
          if(Object.keys(array_prescribed).length == 0){
            array_prescribed[ctr_prescribed] = {
              medicineGenericName: $('select#genericName option:selected').text(),
              medicineBrandName: $('select#medicineBrand option:selected').text(),
              // medicineMedication: "Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ",
              medicineMedication: $('input[name=medication]').val(),
              medicineUnit: $('select#medicineUnit option:selected').text(),
              medicineDosage: $('#dosage').val() + " " + $('#dosageUnit option:selected').val(),
              medicineID: $('select#medicineBrand option:selected').val(),
              medicineQuantity: $('#medQuantity').val(),
              isGiven: 0,
              isPrescribed: 1
            };
            // $('#prescriptionTable tbody').empty();
            removeItemsPresc();
            displayPrescribedTableRow();
          }
          
          else{
            var isEqual = false;
            var key;
            
            for(var i = 0; i < Object.keys(array_prescribed).length; i++){
              if(array_prescribed[i].medicineID == $('select#medicineBrand').val() && array_prescribed[i].medicineMedication == $('#medication').val() && array_prescribed[i].medicineDosage == $('#dosage').val() + " " + $('#dosageUnit option:selected').val()){
                isEqual = true;
                key = i;
              }
            }
            
            if(isEqual == true){
              array_prescribed[key].medicineQuantity = parseInt(array_prescribed[key].medicineQuantity) + parseInt($('#medQuantity').val());
              // $('#prescriptionTable tbody').empty();
              removeItemsPresc();                                                                                                                                    
              displayPrescribedTableRow(); 
            }
            
            else if(isEqual == false){
              ctr_prescribed++;
              array_prescribed[ctr_prescribed] = {
                medicineGenericName: $('select#genericName option:selected').text(),
                medicineBrandName: $('select#medicineBrand option:selected').text(),
                // medicineMedication: "Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ",
                medicineMedication: $('input[name=medication]').val(),
                medicineUnit: $('select#medicineUnit option:selected').text(),
                medicineDosage: $('#dosage').val() + " " + $('#dosageUnit option:selected').val(),
                medicineID: $('select#medicineBrand option:selected').val(),
                medicineQuantity: $('#medQuantity').val(),
                isGiven: 0,
                isPrescribed: 1
              };
              // $('#prescriptionTable tbody').empty();
              removeItemsPresc();
              displayPrescribedTableRow();
            }
          
          }
          resetFields();
        }
        else{
          return false;
        }
      });

      function resetFields(){
          $('select#genericName').prop('selectedIndex', 0);
          $('select#medicineBrand').prop('selectedIndex', 0);
          $('select#medicineUnit').prop('selectedIndex', 0);
          $('select#medicineBrand').prop('disabled', true);
          $('select#medicineUnit').prop('disabled', true);
          $('select#dosageUnit').prop('disabled', true);
          $('#medQuantity').val(this.defaultValue);
          $('input[name=medication]').val(this.defaultValue);
          $('input[name=dosage]').val(this.defaultValue);
          $('select#dosageUnit').prop('selectedIndex',0);
      }
      
      function resetSuppFields(){
        $('#medSuppName').prop('selectedIndex', 0);
        $('#medSuppBrand').prop('selectedIndex', 0);
        $('#medSuppUnit').prop('selectedIndex', 0);
        $('#medSuppQuantity').val(this.defaultValue);
      };
    
    function displayTableRow(){
        for(var i = 0; i < Object.keys(array_med).length; i++){
          var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='medicineTable'></td><td class=' '>"+array_med[i].medicineGenericName+"</td><td class=' '>"+array_med[i].medicineBrandName+"</td><td class=' '>"+array_med[i].medicineQuantity+"</td><td class=' '>"+array_med[i].medicineUnit+"</td><td class= ' '>"+array_med[i].medicineDosage +"</td><td class=' '>"+array_med[i].medicineMedication+"</td></tr>";
          $(tr).prependTo('#medicineTableBody');
        }
    }

    function displaySuppliesRow(){
      // console.log(array_supp)
        for(var i = 0; i < Object.keys(array_supp).length; i++){
          var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='medicalSupplyTable'></td><td class=' '>"+array_supp[i].medicalSupplyName+"</td><td class=' '>"+array_supp[i].medicalSupplyBrand+"</td><td class=' '>"+array_supp[i].medicalSupplyQuantity+"</td><td class=' '>"+array_supp[i].medicalSupplyUnit+"</td></tr>";
          $(tr).prependTo('#medSuppTableBody');
        }
    }

    function displayPrescribedTableRow(){
      // console.log(array_prescribed)
        for(var i = 0; i < Object.keys(array_prescribed).length; i++){
          var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='prescriptionTable'></td><td class=' '>"+array_prescribed[i].medicineGenericName+"</td><td class=' '>"+array_prescribed[i].medicineBrandName+"</td><td class=' '>"+array_prescribed[i].medicineQuantity+"</td><td class=' '>"+array_prescribed[i].medicineUnit+"</td><td class= ' '>"+array_prescribed[i].medicineDosage +"</td><td class=' '>"+array_prescribed[i].medicineMedication+"</td></tr>";
          $(tr).prependTo('#prescribedMedTable');
        }
    }

    function removeItems(){
      $('#medicineTableBody .delete-row').remove();
    }

    function removeItemsSupp(){
      $('#medSuppTableBody .delete-row').remove();
    }

    function removeItemsPresc(){
      $('#prescribedMedTable .delete-row').remove();
    }

});
</script>

@endsection