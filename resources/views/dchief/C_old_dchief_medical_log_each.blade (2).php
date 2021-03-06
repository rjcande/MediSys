@extends('dchief.layout.dentalchief')

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
                        <textarea rows="7" name="symptoms" id="symptoms" data-parsley-group="first" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">{{$patientDentalLog->symptoms}}</textarea>
                      </div>
                    
                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b></p>
                        <textarea rows="7" name="diagnosisTextArea" id="diagnosisTextArea" data-parsley-group="first" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">{{$diagnosis['diagnosisDescription']}}</textarea>
                      </div>

                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white); height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b></p>
                        <div style="display: inline-block;width: 95%;">
                          <input style="margin-left: 25%;" type="checkbox" data-parsley-group="first" value="1" name="dentalExam"
                            @if($treatment['dentalExamination'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspDental Examination</label>
                          <input style="margin-left: 20%;" type="checkbox" data-parsley-group="first" value="1" name="oralProphylaxis"
                            @if($treatment['oralProphylaxis'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspOral Prophylaxis</label>
                          <br>
                          <input style="margin-left: 10%" type="checkbox" data-parsley-group="first" value="1" name="restorationChk"
                            @if($treatment['restoration'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspRestoration(Filling Tooth):</label>
                          <input style="width: 10%" type="text" value="{{$treatment['restorationTooth']}}" disabled name="restorationTxt">
                          <input style="margin-left: 10%" type="checkbox" data-parsley-group="first" value="1" name="extractionChk"
                            @if($treatment['extraction'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspExtraction:</label>
                          <input style="width: 10%" type="text" value="{{$treatment['extractionTooth']}}" disabled name="extractionTxt">
                          <input style="margin-left: 15%;" type="checkbox" data-parsley-group="first" value="1" name="othersTreatment"
                            @if($treatment['othersTreatment'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspOthers:</label>
                          <textarea rows="7" class="form-control" data-parsley-group="first" id="treatment" disabled name="treatment" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 100%; height:100px;">{{$treatment['treatmentDescription']}}</textarea>
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

                          <!-- MEDICATION INTAKE TEXTBOX -->
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
                              <input type="text" name="medSuppQuantity" id="medSuppQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="third"><br>
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

                            @foreach($medsGiven as $meds)
                              <tbody id="medicineTableBody">
                                <td></td>
                                <td>{{$meds->genericName}}</td>
                                <td>{{$meds->brand}}</td>
                                <td>{{$meds->quantity}}</td>
                                <td>{{$meds->unit}}</td>
                                <td>{{$meds->medication}}</td>
                                <td>{{$meds->dosage}}</td>
                              </tbody>
                            @endforeach
                          </table>
                           <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                            <button type="button" class="btn btn-default" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>
                      
                      <!-- MEDICAL SUPPLIES GIVEN TABLE -->
                      <div id="medicineTable" class="row" style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 50px; width: 47%"><h4 style="margin-bottom:5px;">Used Medical Supply</h4>
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

                          @foreach($medSupp as $medSupps)
                            <tbody id="medSuppTableBody">
                              <td></td>
                              <td>{{$medSupps->medSupName}}</td>
                              <td>{{$medSupps->brand}}</td>
                              <td>{{$medSupps->quantity}}</td>
                              <td>{{$medSupps->unit}}</td>
                            </tbody>
                          @endforeach
                          </table>
                          <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                          <button type="button" class="btn btn-default" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>
                    </div>

                      <!-- PRESCRIBED MEDICINE TABLE -->
                    <div id="medicineTable"class="row" style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px;box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom:20px;width: 95%;">
                        <h4 style="margin-bottom:5px; margin-left:5px;"> Prescribed Medicine</h4>
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered jambo_table bulk_action">
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

                            @foreach($prescribed as $prescribedMeds)
                              <tbody id="prescribedMedTable">
                                <td></td>
                                <td>{{$prescribedMeds->genericName}}</td>
                                <td>{{$prescribedMeds->brand}}</td>
                                <td>{{$prescribedMeds->quantity}}</td>
                                <td>{{$prescribedMeds->unit}}</td>
                                <td>{{$prescribedMeds->medication}}</td>
                                <td>{{$prescribedMeds->dosage}}</td>
                              </tbody>
                            @endforeach
                          </table>
                          <button type="button" class="btn btn-default"
                            style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                          <button type="button" class="btn btn-default"
                            style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>

                
                      <div style="margin-left: 40%;margin-top: 25px;float: left;;width: 50%">
                        <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> GENERATE PDF</button>
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

<!-- MODAL -->
<div id="dentalCertModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 80%; height: auto; color: black;">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body" id="">
        <form method="get" action="{{route('dchief.dental.certification', ['patientID' => Session::get('patientInfo.patientID'), 'date' => Session::get('patientInfo.date')])}}">
          @csrf
        <div style="font-family: Arial; font-size: 20px; /*border: 1px solid black;*/">
          <center>
            Republic of The Philippines<br>
            POLYTECHNIC UNIVERSITY OF THE PHILIPPINES<br>
            <b>DENTAL SERVICES</b>
            <br><br>
            <b>CERTIFICATION</b>
          </center>
        </div>
        <div style="margin-left: 75%; margin-top: 20px; font-family: Arial; font-size: 15px;">
          <label>Date: </label>
          <input style="width: 63%" type="text" name="certDate" value="{{Session::get('patientInfo.date')}}">
        </div>
        <div style="font-size: 18px; font-family: Arial; margin-left: 5%;">
          <br><br>
          <p>To Whom it may Concern:</p>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThis is to certify that Mr./Ms. <input type="text" value="{{Session::get('patientInfo.patientName')}}" style="width: 70%" name="certPatientName"></p>
          <p>Has Undergone:
            <input style="margin-left: 10.5%" type="checkbox" value="1" name="certDentalExam">
            <label>&nbsp Dental Examination</label>
            <input style="margin-left: 20%" type="checkbox" value="1" name="certOralProphylaxis">
            <label>&nbsp Oral Prophylaxis</label>
            <div>
              <input style="margin-left: 22.5%" type="checkbox" value="1" name="certRestorationChk">
              <label>&nbsp Restoration &nbsp<input type="text" style="width:67%" placeholder="Tooth Number" name="certRestorationTxt"></label>
              <input style="margin-left: 3%" type="checkbox" value="1" name="certExtractionChk">
              <label>&nbsp Extraction &nbsp <input type="text" style="width:67%" placeholder="Tooth Number" name="certExtractionTxt"></label>
            </div>
            <div>
              <input style="margin-left: 22.5%" type="checkbox" value="1" name="certOthersChk">
              <label>&nbsp Others: &nbsp</label><textarea style="width: 62%; height: 90px" name="certOthersTextArea"></textarea>
            </div>
          </p>
          <p>Recommendation/s:</p>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea style=";width: 90%; height: 100px" name="certRecommendations"></textarea>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <em>This certification is being issued upon request of the above-named patient for whatever purpose it may <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp serve except medico-legal standards</em></p>
          <br>
          <input style="width: 27%; margin-left: 60%" name="certDentistSigned" value="{{Session::get('accountInfo.lastName')}}, {{Session::get('accountInfo.firstName')}} {{Session::get('accountInfo.middleName')}} {{Session::get('accountInfo.quantifier')}}" type="text">
          <label>D.M.D</label>
        </div>

      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <center><input type="submit" class="btn btn-success"></center>
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
  var medSuppUnit = new Array();
  var id_medSuppUnit = new Array();
  var medication = new Array();
  var dosage = new Array();
  var isGiven = new Array();
  var isPrescribed = new Array();
  var medicineUnit = new Array();
  var id_medicineUnit = new Array();

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
    }
  });
  //FUNCTION IN ENABLING THE TXTBOXES
  $('input[name=restorationChk]').change(function(){
    if(this.checked){
      $('input[name=restorationTxt]').prop('disabled', false);
    }
    else{
      $('input[name=restorationTxt]').prop('disabled',true);
    }
  });
  $('input[name=extractionChk]').change(function(){
    if(this.checked){
      $('input[name=extractionTxt]').prop('disabled', false);
    }
    else{
      $('input[name=extractionTxt]').prop('disabled',true);
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
      });
    });

    //VALIDATION IN ADDING MEDICINE
    $('#btnAddMed').click(function(event){
      event.preventDefault();
      // alert();
      $('#saveForm').parsley().validate('second');
      if ($('#saveForm').parsley().isValid('second')){
        var genericName = $('select#genericName option:selected').text();
        var id_genericName = $('select#genericName').val();
        var medBrandName = $('select#medicineBrand option:selected').text();
        id_medBrandName[id_medBrandName.length] = $('select#medicineBrand').val();
        medicineQuantity[medicineQuantity.length] = $('input#medQuantity').val();
        medicineUnit = $('select#medicineUnit option:selected').text();
        id_medicineUnit = $('select#medicineUnit').val();
        // dosage[dosage.length] = $('#dosage').val();
        // medication[medication.length] = $('#medication').val(); 
        dosage[dosage.length] = $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val();
        medication[medication.length] ="Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ";
        isPrescribed[isPrescribed.length] = 0;
        isGiven[isGiven.length] = 1;

        var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='medicineTable'></td><td class=' '>"+genericName+"</td><td class=' '>"+medBrandName+"</td><td class=' '>"+medicineQuantity[medicineQuantity.length-1]+"</td><td class=' '>"+medicineUnit+"</td><td class= ' '>"+medication[medication.length-1]+"</td><td class= ' '>"+dosage[dosage.length-1]+"</td></tr>";

        // $('#medicineTableBody').append(tr);
        $(tr).prependTo('#medicineTableBody');

      }
    });

    // VALIDATION IN ADDING MEDICAL SUPPLIES
    $('#btnAddSup').click(function(event){
      event.preventDefault();

      //VARIABLE FOR VALIDATION OF ALL THE FIELDS
      $('#saveForm').parsley().validate('third');
      if ($('#saveForm').parsley().isValid('third')){
        var medSuppName = $('select[name=medSuppName] option:selected').text();
        var id_medSuppName = $('select[name=medSuppName]').val();
        var medSuppBrandName = $('select[name=medSuppBrand] option:selected').text();
        id_medSuppBrandName[id_medSuppBrandName.length] = $('select[name=medSuppBrand]').val();
        medSuppQuantity[medSuppQuantity.length] = $('input[name=medSuppQuantity]').val();
        medSuppUnit = $('select[name=medSuppUnit] option:selected').text();
        id_medSuppUnit = $('select[name=medSuppUnit]').val();

        var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='medicineTable'></td><td class=' '>"+medSuppName+"</td><td class=' '>"+medSuppBrandName+"</td><td class=' '>"+medSuppQuantity[medSuppQuantity.length-1]+"</td><td class=' '>"+medSuppUnit+"</td></tr>";

        $(tr).prependTo('#medSuppTable');
        // $('#medSuppTable > tbody:last-child').append(tr);
      }
    });


      //VALIDATION IN PRESCRIBING MEDICINE
      $('#btnPrescribe').click(function(event){
        event.preventDefault();
        // alert();
        $('#saveForm').parsley().validate('second');
        if ($('#saveForm').parsley().isValid('second')){
          var genericName = $('select#genericName option:selected').text();
          var id_genericName = $('select#genericName').val();
          var medBrandName = $('select#medicineBrand option:selected').text();
          id_medBrandName[id_medBrandName.length] = $('select#medicineBrand').val();
          medicineQuantity[medicineQuantity.length] = $('input#medQuantity').val();
          medicineUnit = $('select#medicineUnit option:selected').text();
          id_medicineUnit = $('select#medicineUnit').val();
          // dosage[dosage.length] = $('#dosage').val();
          // medication[medication.length] = $('#medication').val();
          dosage[dosage.length] = $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val();
          medication[medication.length] ="Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ";
          isPrescribed[isPrescribed.length] = 1;
          isGiven[isGiven.length] = 0

          var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='medicineTable'></td><td class=' '>"+genericName+"</td><td class=' '>"+medBrandName+"</td><td class=' '>"+medicineQuantity[medicineQuantity.length-1]+"</td><td class=' '>"+medicineUnit+"</td><td class= ' '>"+medication[medication.length-1]+"</td><td class=' '>"+dosage[dosage.length-1]+"</tr>";

          $(tr).prependTo('#prescribedMedTable');
          // $('#prescribedMedTable').append(tr);

        }
      });



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
                buttons: "confirm",///////////////
              })///////////////
              .then((willRoute)=>{///////////////
                  window.location.href = "/dchief/DentalLog";///////////////
              });///////////////
            }///////////////
          });
        
        }///////////////
      });///////////////



      // // Step show event
      // $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
      //    //alert("You are on step "+stepNumber+" now");
      //    if(stepPosition === 'first'){
      //        $("#prev-btn").addClass('disabled');
      //    }else if(stepPosition === 'final'){
      //        $("#next-btn").addClass('disabled');
      //    }else{
      //        $("#prev-btn").removeClass('disabled');
      //        $("#next-btn").removeClass('disabled');
      //    }

      //   if($('button.sw-btn-next').hasClass('disabled')){
      //     $('.sw-btn-group-extra').show(); // show the button extra only in the last page
      //   }else{
      //     $('.sw-btn-group-extra').hide();        
      //   }
      // });

      // // Toolbar extra buttons
      // var btnFinish = $('<button></button>').text('Finish')
      //                   .addClass('btn btn-info')
      //                   .on('click', function(e){
      //                     //On form submit
      //                     e.preventDefault();

      //                     $('#saveForm').parsley();

      //                     if ($('#saveForm').parsley().isValid("first")) {
      //                         $.ajax({
      //                           url: '/dentist/dental/HistoryForm/store',
      //                           type: 'get',
      //                           data: $('#saveForm').serialize(),
      //                           success: function(output){
      //                             swal({
      //                               title: "Record Saved!",
      //                               text: "Dental History Record Saved!",
      //                               icon: "success",
      //                               button: "confirm",
      //                             })
      //                             .then((willRoute)=>{
      //                               if(willRoute){
      //                                 window.location.href = "/dentist/dentalchart";
      //                               }
      //                             });
      //                           }
      //                         });
      //                     }
      //                   });
      // var btnCancel = $('<button></button>').text('Cancel')
      //                                  .addClass('btn btn-danger')
      //                                  .on('click', function(){ $('#smartwizard').smartWizard("reset"); });


      // // Smart Wizard
      // $('#smartwizard').smartWizard({
      //         selected: 0,
      //         theme: 'default',
      //         transitionEffect:'fade',
      //         showStepURLhash: true,
      //         toolbarSettings: {toolbarPosition: 'bottom',
      //                           toolbarButtonPosition: 'end',
      //                           toolbarExtraButtons: [btnFinish, btnCancel]
      //                         }
      // });

      //     // Initialize the leaveStep event
      // $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
      //    if (stepNumber == 1) {
      //      $('#saveForm').parsley().validate('first');

      //      if ($('#saveForm').parsley().isValid('first')) {
      //         return true;
      //      }
      //      else{
      //         return false;
      //      }
      //    }
      // });
    

  });
</script>

@endsection