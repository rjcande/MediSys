@extends('nurse.layout.nurse')

@section('content')
  <form id="saveForm" data-id="{{ $clinicLogInfo->clinicLogID }}">
    @csrf()
	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left" style="width: 100%">
                <h3>{{ $clinicLogInfo->patientID }} - {{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</h3>
              </div>
              
            </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <!-- Content -->
                   
                     <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true" style="float: left; width: 100%"> 

                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Symptoms and Attending Physician</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <div style="float:left; margin-left:10px; font-size:18px; width:160px;">
                              <header style="margin-bottom:12px; margin-left:25px;"> Attending Physician</header>
                            </div>  
                            
                            <div style="float:left; margin-left:40px; font-size:18px; width:300px;margin-top: 20px;">
                              <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="attendingPhysician">
                                <option value="" disabled selected>Select Physician</option>
                                @foreach($physicians as $physician)
                                  <option value="{{ $physician->id }}" @if($physician->id == $attendingPhysician['id']){{ "selected" }} @endif>{{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }}</option>
                                @endforeach

                              </select>
                            </div>  
                            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);height:30px; border-radius:8px;">&nbsp<b>Symptoms</b></p>
                              <textarea rows="7" class="form-control" placeholder="Enter Symptoms here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="symptoms" required data-parsley-group="first">{{ $clinicLogInfo->symptoms }}</textarea>
                            </div> <br><br>
                            <div style="float: left;width: 100%; margin-top: 20px;">
                              <button type="button" class="btn btn-success btn-save" name="btnSave" style="margin-left: 40%">SAVE</button>         
                              <a href="{{url('/nurse/medical/log')}}"><button class="btn btn-danger" type="button">CLOSE</button></a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                          <h4 class="panel-title">Treatment</h4>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                          <div class="panel-body">
                            
                            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b></p>
                              <textarea rows="7" class="form-control" placeholder="Enter treatment done here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="treatment" data-parsley-group="first">{{ $recommendation['treatmentDescription'] }}</textarea>
                            </div> <br>
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Prescription and Recommendation</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <div id="prescription" style="float:left width: 100%">
                                <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                                  height:30px; border-radius:8px;">&nbsp<b>Prescription and Recommendation</b></p>
                              </div>    

                            
                              <div id="prescription">
                                <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
                                    background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine</label>
                                <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
                                    background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply</label>
                              </div><br>
            <!--MEDICINE--------------------------------------------------------------------------------->      
                
                              <div id="prescription" style="float: left; width: 50%">
                                <div style="float:left; margin-left:10px; font-size:18px; width:450px;">
                                  <div style="float: left;">
                                    <div style="float: left; width: 150px;">
                                      <header style="margin-bottom:12px; margin-left:25px;"> Generic Name</header>
                                    </div>

                                    <div style="float: left;">
                                      <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medGenericName" id="medGenericName" data-parsley-required="true" data-parsley-group="second">
                                       <option value="" disabled="" selected="">Select Generic Name</option>
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
                                        <option value="" disabled="" selected="">Select Brand</option>
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
                                        <option value="" disabled="" selected="">Select Medicine Unit</option>
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
                                
                                  <button class="btn btn-success" style="float: right; margin-right:13%" name="btnMedAdd" id="btnMedAdd" type="button">ADD</button>  
                                </div>  
                             

                              </div>
                
            <!--MEDICAL SUPPLY------------------------------------------------------------------------>
                              <div id="prescription" style="float: left; width: 50%;">
                                <div style="float:left; font-size:18px;">
                                  <div style="float: left;">
                                    <div style="float: left; width: 200px;">
                                      <header style="margin-bottom:12px; margin-left:10px;"> Medical Supply Name</header>
                                    </div>

                                    <div style="float: left;">
                                      <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppName" data-parsley-required="true" data-parsley-group="third" id="medSuppName">
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
                                      <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppBrand" data-parsley-required="true" id="medSuppBrand" disabled data-parsley-group="third">
                                        <option value="" disabled="" selected="">Select Brand</option>
                                        @foreach($medicalSupplyList as $medicalSupply)
                                          <option value="{{ $medicalSupply->medSupID }}">{{ $medicalSupply->brand }}</option> 
                                        @endforeach
                                      </select><br>
                                    </div>
                                    
                                  </div>

                                  <div style="float: left;">
                                    <div style="float: left; width: 200px;">
                                      <header style="margin-bottom:12px; margin-left:10px;"> Quantity</header>
                                    </div>

                                    <div style="float: left;">
                                      <input type="number" name="medSuppQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-type="integer" data-parsley-group="third" id="medSuppQuantity" min='1' data-parsley-error-message="should be greater than or equal to 1">
                                    </div>
                                    
                                  </div>
                                 
                                  <div style="float: left;">
                                    <div style="float: left; width: 200px;">
                                      <header style="margin-bottom:12px; margin-left:10px;"> Unit</header>
                                    </div>

                                    <div style="float: left;">
                                      <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppUnit" data-parsley-required="true" id="medSuppUnit" disabled data-parsley-group="third">
                                        <option value="" disabled="" selected="">
                                            Select Supply Unit
                                          </option>
                                        @foreach($medicalSupplyList as $medicalSupply)
                                          <option value="{{ $medicalSupply->medSupID }}">
                                            {{ $medicalSupply->unit }}
                                          </option>
                                        @endforeach
                                      </select><br>
                                      <button class="btn btn-success" style="float: right; margin-right:10%" id="btnSuppAdd">ADD</button>
                                    </div>
                                  </div> 
                                </div>  
            
                              </div>

                              <div style="float: left; width: 100%;">
                                <div id="medicineTable"class="row"
                                style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 30px;width: 45%"><h4 style="margin-bottom:5px; margin-left:5px;"> Given Medicine</h4>
                                <div class="table-responsive" style="width:100%;">
                                  <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                                   <thead>
                                        <tr class="headings">
                                          <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                          </th>
                                          <th class="column-title">Generic Name </th>
                                          <th class="column-title">Brand </th>
                                          <th class="column-title">Quantity Used </th>
                                          <th class="column-title">Unit</th>
                                          <th class="column-title">Dosage</th>
                                          <th class="column-title no-link last"><span class="nobr">Medication</span></th>
                                          <th class="bulk-actions" colspan="8">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                          </th>
                                        </tr>
                                      </thead> 

                                      <tbody id="tbodyMedicine">
                                          @foreach($prescriptionInfo as $prescription)
                                            <tr class="even pointer">
                                              <td class="a-center ">
                                                <input type="checkbox" name="table_records_medicine" value="{{ $prescription->prescriptionID }}" id="{{ $prescription->prescriptionID }}">
                                              </td>
                                              <td class=" ">{{ $prescription->genericName }}</td>
                                              <td class=" ">{{ $prescription->brand }}</td>
                                              <td class=" ">{{ $prescription->quantity }}</td>
                                              <td class=" ">{{ $prescription->unit }}</td>
                                              <td class=" ">{{ $prescription->dosage }}</td>
                                              <td class="last">{{ $prescription->medication }}</td>
                                            </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                                   <button class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                                    <button type="button" class="btn btn-default" style="float: right; background-color:#fdcb6e; color:white;" id="btnDeleteMed">DELETE</button>
                                  </div>
                                </div>

                                <div id="medicineTable"class="row"
                                style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 50px; width: 47%"><h4 style="margin-bottom:5px;">Used Medical Supply</h4>
                                <div class="table-responsive" style="width: 100%;">
                                <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                                   <thead>
                                    <tr class="headings">
                                      <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                      </th>
                                      <th class="column-title">Medical Supply Name </th>
                                      <th class="column-title">Brand </th>
                                      <th class="column-title">Quantity Used </th>
                                      <th class="column-title no-link last"><span class="nobr">Unit</span>
                                      </th>
                                      <th class="bulk-actions" colspan="8">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                      </th>
                                    </tr>
                                  </thead>

                                  <tbody id="tbodyMedSupp">
                                    @foreach($usedMedSupply as $supply)
                                       <tr class="even pointer">
                                          <td class="a-center ">
                                            <input type="checkbox" name="table_records_medSupp" value="{{ $supply->medSupplyUsedID }}" id="{{ $supply->medSupplyUsedID }}">
                                          </td>
                                          <td class=" ">{{ $supply->medSupName }}</td>
                                          <td class=" ">{{ $supply->brand }}</td>
                                          <td class=" ">{{ $supply->quantity }}</td>
                                          <td class=" ">{{ $supply->unit }}</td>
                                       </tr>
                                    @endforeach
                                   
                                  </tbody>
                                </table>
                                 <button class="btn btn-default" type="button" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                                  <button class="btn btn-default" type="button" style="float: right; background-color:#fdcb6e; color:white;" id="btnMedSupDelete">DELETE</button>
                              </div>
                              </div>
                              </div>
                             <div style="float: left;width: 100%; margin-top: 20px; text-align: center">
                              <a href="{{ route('nurse.generate.pdf.prescription', $clinicLogInfo->clinicLogID) }}" target="_blank">
                                <button type="button" class="btn btn-primary" id="printPrescription"><i class="fa fa-download"></i> GENERATE PDF</button>
                              </a>
                              <button type="button" class="btn btn-success btn-save" name="btnSave">SAVE</button>         
                              <a href="{{url('/nurse/medical/log')}}"><button class="btn btn-danger" type="button">CLOSE</button></a>
                            </div>
                            <div style="float: left; width: 100%">
                              <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 100%;
                                    background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Recommendation</label>
                              <textarea rows="7" class="form-control" placeholder="Enter recommendation/s here"
                                style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="recommendation">{{ $recommendation['recommendations'] }}</textarea> 
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Notes</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <div id="recommendation" style="width: 100%;float: left;">
                              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                                height:30px; border-radius:8px;">&nbsp<b>Notes (for Physician)</b></p>
                              <textarea rows="7" class="form-control" placeholder="Enter recommendation/s here"
                                style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="notes">{{ $clinicLogInfo->notes }}</textarea>
                            </div>

                            <div style="float: left;width: 100%; margin-top: 20px;">
                              <button type="button" class="btn btn-success btn-save" name="btnSave" style="margin-left: 40%">SAVE</button>
                            
                              <a href="{{url('/nurse/medical/log')}}"><button class="btn btn-danger" type="button">CLOSE</button></a>
                            </div>
                         </form>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                          <h4 class="panel-title">Vital Signs</h4>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                            <form id="vitalSignsForm" data-id="{{ $clinicLogInfo->clinicLogID }}">
                              @csrf()
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Blood Pressure: </label>
                             @php
                                if($vitalSign['bloodPressure']){
                                  $bloodPressure = preg_split("#/#", $vitalSign['bloodPressure']); 
                                }
                                
                             @endphp
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center; margin-right: 5px;" name="bloodPressureSystolic" data-parsley-pattern="^\d{1,3}" data-parsley-max="190" data-parsley-group="vitalSign" placeholder="systolic" data-parsley-errors-container="#error-bloodPressure" data-parsley-error-message="systolic should not be greater than 190" value="@if($vitalSign['bloodPressure']){{ $bloodPressure[0] }}@endif">
                             <label style="font-size: 20px;">/</label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 5px; text-align: center;" name="bloodPressureDiastolic" data-parsley-pattern="^\d{1,3}" data-parsley-max="100" data-parsley-group="vitalSign" placeholder="diastolic" data-parsley-errors-container="#error-bloodPressure" data-parsley-error-message="diastolic should not be greater than 100" value="@if($vitalSign['bloodPressure']){{ $bloodPressure[1] }}@endif"><br>

                             <div id="error-bloodPressure" >
                               
                             </div>

                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;" >Heart Rate: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" name="heartRate" data-parsley-pattern="^\d{1,3}" data-parsley-group="vitalSign" data-parsley-errors-container="#error-heartRate" value="{{ $vitalSign['heartRate'] }}"><br>
                             <div id="error-heartRate" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Respiratory Rate: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="{{ $vitalSign['respiRate'] }}" name="respiratoryRate" data-parsley-pattern="^\d{1,3}" data-parsley-group="vitalSign" data-parsley-errors-container="#error-respiratoryRate"><br>
                             <div id="error-respiratoryRate" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Temperature: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="{{ $vitalSign['temperature'] }}" name="temperature" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-temperature"><br>
                             <div id="error-temperature" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Height: </label>
                             @php
                              if($vitalSign['height']){
                                $height = preg_split('# #', $vitalSign['height']);
                              }

                             @endphp
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="@if($vitalSign['height']){{ $height[0] }}@endif" name="height" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-height">
                             <select name="heightUnit" id="heightUnit" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;">
                               <option value="cm"
                               @if($vitalSign['height'])
                                @if($height[1] == 'cm')
                                  {{ "selected" }}
                                @endif
                               @endif>centimeters</option>
                               <option value="ft"
                               @if($vitalSign['height'])
                                 @if($height[1] == 'ft')
                                  {{ "selected" }}
                                 @endif
                               @endif>feet</option>
                               <option value="in"
                               @if($vitalSign['height'])
                                 @if($height[1] == 'in')
                                  {{ "selected" }}
                                 @endif
                               @endif>inches</option>
                             </select>
                             <br>
                            <div id="error-height" >
                               
                            </div>
                            
                            <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Weight: </label>
                            @php
                              if($vitalSign['weight']){
                                $weight = preg_split('# #', $vitalSign['weight']);
                              }
                            @endphp
                            <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="@if($vitalSign['weight']){{ $weight[0] }}@endif" name="weight" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-weight">
                          
                            <select name="weightUnit" id="weightUnit" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;">
                               <option value="kg"
                               @if($vitalSign['weight'])
                                @if($weight[1] == 'kg')
                                  {{ "selected" }}
                                @endif
                               @endif>kilograms</option>
                               <option value="lb"
                               @if($vitalSign['weight'])
                                 @if($weight[1] == 'lb')
                                  {{ "selected" }}
                                 @endif
                               @endif>pounds</option>
                             </select>
                             <br>
                             <div id="error-weight" >
                               
                             </div>
                             <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;">Body Mass Index: </label>
                             <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="{{ $vitalSign['bmiValue'] }}" name="bmi" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign"><br>
                             <label style="display: inline-block;width: 190px; margin-bottom:10px; margin-left: 25px;">BMI Range: </label>
                             <input type="radio" name ="bmiRange" value="0" data-parsley-group="vitalSign"
                             @if($vitalSign['bmiRange'] == '0')
                              {{ 'checked' }}
                             @endif
                             >&nbsp Underweight
                             <input type="radio" name ="bmiRange" value="1" data-parsley-group="vitalSign"
                              @if($vitalSign['bmiRange'] == 1)
                              {{ 'checked' }}
                             @endif
                             >&nbsp Normal
                             <input type="radio" name ="bmiRange" value="2" data-parsley-group="vitalSign"
                              @if($vitalSign['bmiRange'] == 2)
                              {{ 'checked' }}
                             @endif
                             >&nbsp Overweight
                             <input type="radio" name ="bmiRange" value="2" data-parsley-group="vitalSign"
                              @if($vitalSign['bmiRange'] == 3)
                              {{ 'checked' }}
                             @endif
                             >&nbsp Obese Class I
                             <input type="radio" name ="bmiRange" value="3" data-parsley-group="vitalSign"
                              @if($vitalSign['bmiRange'] == 4)
                              {{ 'checked' }}
                             @endif
                             >&nbsp Obese Class II
                             <input type="radio" name ="bmiRange" value="3" data-parsley-group="vitalSign"
                              @if($vitalSign['bmiRange'] == 5)
                              {{ 'checked' }}
                             @endif
                             >&nbsp Obese Class III
                            
                             <div style="float: left; width: 100%; margin-top: 20px; text-align: center;">
                                <button type="submit" class="btn btn-success">SAVE</button>
                                <a href="{{url('/nurse/medical/log')}}"><button class="btn btn-danger" type="button">CLOSE</button></a>
                             </div>
                             
                          </form>
       
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->
                    <a href="{{ url('nurse/medical/log') }}" title="">
                      <button type="button" class="btn btn-primary" style="float: right; margin-top: 20px;">BACK</button>
                    </a>
                    <!-- /Content -->
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
<!-- Messagees -->
@if(Session::get('message'))
  <script>
    $(document).ready(function(){
      new PNotify({
        title: "Regular Success",
        text: "{{ Session::get('message') }}",
        type: "success",
        styling: "bootstrap3"
      });
    });
  </script>
@endif


<script>
  $(window).load(function(){
    //variables to use for getting the medicine
    var _idMedBrand = new Array();
    var medQuantity = new Array();
    var _idMedSuppBrand = new Array();
    var medSuppQuantity = new Array();
    var medication = new Array();
    var dosage = new Array();
    //selected medicine
    var checkBoxMedID = new Array();
    var checkBoxMedSupID = new Array();

    $('#saveForm').parsley();
    $('#vitalSignsForm').parsley();

    $('#btnRefer').on('click', function(){
      $('#modalReferral').modal('show ');
    });

    //checkbox Medicine and Medical Supply
   
    $('[name=table_records_medicine]').on('change', function(){
        checkBoxMedID[checkBoxMedID.length] = $(this).val();
    });

    $('[name=table_records_medSupp]').on('change', function(){
        checkBoxMedSupID[checkBoxMedSupID.length] = $(this).val();
    });

    //If Medicine button delete is clicked
    $('#btnDeleteMed').on('click', function(e){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to .......!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
            $.ajax({
              url: '/nurse/delete/medicine',
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

    //If Medical button delete is clicked
    $('#btnMedSupDelete').on('click', function(e){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to .......!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
            $.ajax({
              url: '/nurse/delete/medical/supply',
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

        var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medGenericName+"</td><td class=' '>"+medBrand+"</td><td class=' '>"+medQuantity[medQuantity.length-1]+"</td><td class=' last'>"+medUnit+"</td><td>"+dosage[dosage.length-1]+"</td><td>"+medication[medication.length - 1]+"</td></tr>";

          $(tr).prependTo('#tbodyMedicine');
          $('#printPrescription').prop('disabled', true);
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

        $(tr).prependTo('#tbodyMedSupp');

        //Reset Medical Supply Fields
        $('select[name=medSuppName]').prop('selectedIndex', 0);
        $('select[name=medSuppBrand]').prop('selectedIndex', 0);
        $('select[name=medSuppUnit]').prop('selectedIndex', 0);
        $('select[name=medSuppBrand]').prop('disabled', true);
        $('select[name=medSuppUnit]').prop('disabled', true);
        $('input[name=medSuppQuantity]').val(this.defaultValue);

      }
    });

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
      var mName = $(this).find("option:selected").text();;
      $.get('/get/medSupp/brand?mName=' + mName, function(data){
        console.log(data);
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

    //on Vital Signs Submit
    $('#vitalSignsForm').submit(function(e){
      e.preventDefault();

      if ($(this).parsley().isValid()) {
        var height;
        var weight;

        if ($('input[name=height]').val() != '') {
          height = $('input[name=height]').val() + ' ' + $('#heightUnit').val();
        }
        else{
          height = null;
        }

        if ($('input[name=weight]').val() != '') {
          weight = $('input[name=weight]').val() + ' ' + $('#weightUnit').val();
        }
        else{
          weight = null;
        }
        var data = {       
          bloodPressure: $('input[name=bloodPressureSystolic]').val() + "/" + $('input[name=bloodPressureDiastolic]').val(),   
          heartRate: $('input[name=heartRate]').val(),
          respiratoryRate: $('input[name=respiratoryRate]').val(),
          temperature: $('input[name=temperature]').val(),
          height: height,
          weight: weight,
          bmi: $('input[name=bmi]').val(),
          bmiRange: $('input[name=bmiRange]:checked').val()
        }
        $.ajax({
          url: '/nurse/vital/signs/save/' +  $(this).data('id'),
          type: 'get',
          data: data,
          success: function(){
              location.reload(true);
          }
        });
      }
    });

   //On form Submit
    $('.btn-save').click(function(e){
      e.preventDefault();
      $('#saveForm').parsley().validate('first');

      if($('#saveForm').parsley().isValid('first')){
        var id = {
          medicineID: _idMedBrand,
          medQuantity: medQuantity,
          medSuppID: _idMedSuppBrand,
          medSuppQuantity: medSuppQuantity,
          medication: medication,
          _dosage: dosage,

        }

        $.ajax({

          url: '/nurse/patient/medical/log/edit/save/' + $('#saveForm').data('id'),
          type:'get',
          data:$('#saveForm').serialize() + " & " + $.param(id),
          success:function(output){
            location.reload(true);
    
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
      //get value for weight - kilograms
      var kilograms = weight;
  
      //calculate BMI
      bmi = Math.round(kilograms * 10 / meters / meters) / 10;

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

    //Set Interval For the reloading of page
    // setInterval(function(){
  
    //   $.get('/nurse/patient/medical/log/edit/clinicLogID/' + '{{ $clinicLogInfo->clinicLogID }}', function(data){
      
    //   });
    // }, 2000);
     

  });
</script>
@endsection