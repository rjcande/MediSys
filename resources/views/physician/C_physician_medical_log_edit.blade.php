@extends('physician.layout.physician')

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
                              <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="attendingPhysician" disabled>
                                <option value="" disabled selected>Select Physician</option>
                                @foreach($physicians as $physician)
                                  <option value="{{ $physician->id }}" @if($physician->id == $attendingPhysician['id']){{ "selected" }} @endif>{{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }}</option>
                                @endforeach

                              </select>
                            </div>  
                            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);height:30px; border-radius:8px;">&nbsp<b>Symptoms</b></p>
                              <textarea rows="7" class="form-control" placeholder="Enter Symptoms here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="symptoms" required data-parsley-group="first" readonly>{{ $clinicLogInfo->symptoms }}</textarea>
                            </div> <br><br>
                            <div style="float: left;width: 100%; margin-top: 20px;">
                              <!-- <button type="button" class="btn btn-success btn-save" name="btnSave" style="margin-left: 40%">SAVE</button>         
                              <a href="{{url('/nurse/medical/log')}}"><button class="btn btn-danger" type="button">CLOSE</button></a> -->
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
                              <textarea rows="7" class="form-control" placeholder="Enter treatment done here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="treatment" data-parsley-group="first" readonly>{{ $recommendation['treatmentDescription'] }}</textarea>
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
                                      <input type="text" style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" data-parsley-group="second" name="medication" id="medication" data-parsley-required ="true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="Medication is required">
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
                                  <table class="table table-striped table-bordered jambo_table bulk_action" id="medTable">
                                   <thead>
                                        <tr class="headings">
                                          <th>
                                            <input type="checkbox" id="check-all">
                                          </th>
                                          <th class="column-title">Generic Name </th>
                                          <th class="column-title">Brand </th>
                                          <th class="column-title">Quantity Used </th>
                                          <th class="column-title">Unit</th>
                                          <th class="column-title">Dosage</th>
                                          <th class="column-title no-link last"><span class="nobr">Medication</span></th>
                                          <th class="bulk-actions" colspan="6">
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
                                    <button type="button" class="btn btn-default" style="float: right; background-color:#fdcb6e; color:white;" id="btnDeleteMed">DELETE</button>
                                  </div>
                                </div>

                                <div id="medicineTable"class="row"
                                style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 50px; width: 47%"><h4 style="margin-bottom:5px;">Used Medical Supply</h4>
                                <div class="table-responsive" style="width: 100%;">
                                <table class="table table-striped table-bordered jambo_table bulk_action" id="suppTable">
                                   <thead>
                                    <tr class="headings">
                                      <th>
                                        <input type="checkbox" id="check-all-supp">
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
                                style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="recommendation" readonly>{{ $recommendation['recommendations'] }}</textarea> 
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
                              <textarea rows="7" class="form-control" placeholder=""
                                style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="notes" readonly>{{ $clinicLogInfo->notes }}</textarea>
                            </div>

                            <div style="float: left;width: 100%; margin-top: 20px;">
                              <!-- <button type="button" class="btn btn-success btn-save" name="btnSave" style="margin-left: 40%">SAVE</button>
                            
                              <a href="{{url('/nurse/medical/log')}}"><button class="btn btn-danger" type="button">CLOSE</button></a> -->
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
                    <a href="{{ URL::previous() }}" title="">
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



<script>
  $(window).load(function(){
   
  });
</script>
@endsection