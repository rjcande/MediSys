@extends('physician.layout.physician')

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
                <h2 style="display: inline"> {{ $consultInfo->patientID }} - <em> {{ $consultInfo->lastName }}, {{ $consultInfo->firstName }} {{ $consultInfo->middleName }} {{ $consultInfo->quantifier }}</em></h2>
                <div class="clearfix"></div>
              </div>
            <form id="saveForm">
              @csrf()
              <input type="hidden" name="clinicLogID" value="{{ $consultInfo->clinicLogID }}">
            <div class="x_content">   
            <!--Content-->
             <!-- SmartWizard html -->
            
            <div id="smartwizard">
                <ul>
                    <li><a href="#step-1">Step 1<br /><h4>Symptoms and Notes</h4></a></li>
                    <li><a href="#step-2">Step 2<br /><h4>Diagnosis</h4></a></li>
                    <li><a href="#step-3">Step 3<br /><h4>Treatment and Prescription</h4></a></li>
                    <li><a href="#step-4">Step 4<br /><h4>Recommendation</h4></a></li>
                    <li><a href="#step-5">Step 5<br /><h4>Outside Referral(Optional)</h4></a></li>  
                </ul>

                <div>
                    <div id="step-1" class="">
                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Symptoms and Notes</b>
                        </p>
                      </div>
                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%; margin-bottom: 20px;">
                        <div style="float: left; width: 98%; margin-bottom: 50px;">
                            <label style="color:white; font-size:18px; margin-left: 25px; width: 100%;
                              background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Symptoms
                            </label>
                            <div style="float: left; width: 95%; margin-left: 20px;margin-top: 10px;">
                              <textarea rows="7" class="form-control" placeholder="Enter diagnosis here" style="border-radius:12px;
                              border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px;" name="symptoms">{{ $consultInfo->symptoms }}</textarea>
                            </div>
                        </div>
                        <div style="float: left; width: 98%;">
                            <label style="color:white; font-size:18px; margin-left: 25px; width: 100%;
                              background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Notes
                            </label>
                            <div style="float: left; width: 95%; margin-left: 20px;margin-top: 10px;">
                              <textarea rows="7" class="form-control" placeholder="Notes" style="border-radius:12px;
                              border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px;" name="notes" readonly>{{ $consultInfo->notes }}</textarea>
                            </div>
                           
                        </div>
                       
                      </div>
                    </div>
                    <div id="step-2" class="">
                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%;">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b>
                        </p>
                      </div>
                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%; margin-bottom: 20px;">
                        <textarea rows="7" class="form-control" placeholder="Enter diagnosis here" style="border-radius:12px;
                            border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" data-parsley-required="true" data-parsley-group="first" name="diagnosis"></textarea>
                      </div>
                    </div>
                    <div id="step-3" class="">
                      <div id="prescription" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Treatment and Prescription</b></p>
                      </div>

                      <div id="prescription" style="float: left; width: 100%">
                        <div style="float: left; width: 98%; margin-bottom: 50px;">
                          <label style="color:white; font-size:18px; margin-left: 25px; width: 100%;
                            background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Treatment
                          </label>
                          <div style="float: left; width: 95%; margin-left: 20px;margin-top: 10px;">
                            <textarea rows="7" class="form-control" placeholder="Enter treatment here" style="border-radius:12px;
                            border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px;" name="treatment" required data-parsley-group="treatment"></textarea>
                          </div>
                        </div>
                      </div>

                      <div id="prescription">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
                              background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine
                        </label>
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
                              background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply
                        </label>
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
                              <input type="number" name="medQuantity" id="medQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="second" min = '1' data-parsley-error-message = "should be greater than or equal to 1"><br>
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
                          <button type="button" class="btn btn-default" style="float: right;" id="btnPrescribe">PRESCRIBE</button>
                        </div>  

                      </div>

              <!--MEDICAL SUPPLY------------------------------------------------------------------------>
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
                              <input type="number" name="medSuppQuantity" id="medSuppQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="third" min = '1' data-parsley-error-message = "should be greater than or equal to 1"><br>
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
                        <div class="table-responsive" style="width:100%; float: left;">
                          <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
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
                                <th class="column-title no-link last"><span class="nobr">Medication</th>
                                <th class="bulk-actions" colspan="5">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                            </thead>

                            <tbody id="tbodyMedicine">
                              @foreach($prescriptionInfo as $medicine)
                                <tr class="even pointer">
                                  <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                  </td>
                                  <td class=" ">{{ $medicine->genericName }}</td>
                                  <td class=" ">{{ $medicine->brand }}</td>
                                  <td class=" ">{{ $medicine->quantity }}</td>
                                  <td class=" ">{{ $medicine->unit }}</td>
                                  <td class=" ">{{ $medicine->dosage }}</td>
                                  <td class=" ">{{ $medicine->medication }}</td>
                                  
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                           <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                            <button type="button" class="btn btn-default" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>
                       <div id="medicineTable"class="row"
                            style="margin-top: 25px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; margin-left: 50px; width: 47%"><h4 style="margin-bottom:5px;">Used Medical Supply</h4>
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
                                <th class="column-title no-link last"><span class="nobr">Unit</span>
                                </th>
                                <th class="bulk-actions" colspan="8">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                            </thead>

                            <tbody id="tbodyMedicalSupply">
                            @foreach($usedMedSupply as $medicalSupply)
                              <tr class="even pointer">
                                <td class="a-center ">
                                  <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td class=" ">{{ $medicalSupply->medSupName }}</td>
                                <td class=" ">{{ $medicalSupply->brand }}</td>
                                <td class=" ">{{ $medicalSupply->quantity }}</td>
                                <td class=" ">{{ $medicalSupply->unit }}</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                           <button type="button" class="btn btn-default" style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                            <button type="button" class="btn btn-default" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>
                      </div>

                      <div id="medicineTable"class="row"
                        style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 20px; width: 970px;">
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
                                <th class="column-title">Medication</th>
                                <th class="column-title">Dosage</th>
                              </tr>
                            </thead>

                            <tbody id="tbodyPrescribedMedicine">
                        
                            </tbody>
                          </table>
                          <button type="button" class="btn btn-default"
                            style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                          <button type="button" class="btn btn-default"
                            style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>

                    </div>
                    <div id="step-4" class="">
                        <div id="recommendation" style="float:left; margin-top: 10px; width: 100%; margin-bottom: 20px;">
                          <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                          height:30px; border-radius:8px;">&nbsp<b>Recommendation/s</b></p>

                          <div style="float:left; margin-left:10px; margin-top: 10px; margin-bottom: 10px; font-size:18px; width:500px;">
                            <label>
                              <header style="margin-bottom:12px; margin-left:25px;"> Next Consultation</header>
                            </label>
                            <input type=date style="width:250px; border-radius:8px; margin-left:20px; 180px;height: 30px;" name="nextConsultation">
                          </div><br>

                        <textarea rows="7" class="form-control" placeholder="Enter recommendation/s here"
                          style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="recommendation"></textarea>
                      </div>

                    </div>

                    <div id="step-5" class="">
                      <div id="emergency" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                          height:30px; border-radius:8px;">&nbsp<b>Referral</b></p>
                        
                        <br>
                      </div>
                      <div id="emergencyReferral" style="float: left; width:100%;">
                        <div style="float:left; margin-left:10px; font-size:18px; width:50px;">
                          <label><header style="margin-bottom:0px; margin-left:25px;"> To</header>
                          </label>
                        </div>
                        <div style="float:left; margin-left:10px; font-size:18px; width:50px;">
                          <select style="width:250px; border-radius:8px; margin-bottom:0px; 172px;height: 25px;" name="referTo" data-parsley-required="true" id="referTo">
                            <option value="" selected></option>
                            <option value="0">Ortho-Surgeon of Choice</option>
                            <option value="1">Pulmonologist of Choice</option>
                            <option value="2">Cardiologist of Choice</option>
                            <option value="3">Other</option>
                          </select><br>
                        </div>
                        <div style="float:left; margin-left:22%;">
                          <label style="font-size:13px; color: #ff3f34;"><em>if other, please specify</em></label>
                          <input type="text" name="referToOthers" data-parsley-group="referral" style="width:350px; border-radius:8px; margin-bottom:12px;
                            margin-left: 20px; height: 25px; font-size: 18px" disabled id="referToOthers">
                        </div>
                      </div>

                      <div id="recommendation" style="float:left; margin-top: 10px; width: 100%">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 90%;
                            background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Remarks</label>
                        <textarea rows="7" class="form-control" placeholder="Enter remark/s here"
                          style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 30px; width: 95%;" name="remark" data-parsley-group="referral" id="remark"></textarea>
                      </div>

                      <div id="emergency" style="float:left; margin-top: 50px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                          height:30px; border-radius:8px;">&nbsp<b>Laboratory Referral</b>
                        </p><br>
                      </div>

                      <div>
                        <label style="width: 130px; margin-bottom:15px; font-size: 18px; margin-left: 20px">Request for: </label>

                        <header style="margin-right:15px; font-size: 18px; width: 10%; margin-left:25px;">Chest X-Ray</header>

                        <div style="float:left; margin-left:25px; font-size:18px; width:100%;">

                                  <input type="checkbox" name="chestXrayPA" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> PA
                          <input type="checkbox" name="chestXrayAP_LAT" class="radio-past" style="margin-bottom:12px; margin-left:30px;" value="1"> AP-LAT
                          <br>
                          <input type="checkbox" name="electrocardiography" class="radio-past" style="margin-bottom:12px;" value="1"> Electrocardiography (ECG)<br>
                          <input type="checkbox" name="urinalysis" class="radio-past" style="margin-bottom:12px;" value="1"> Urinalysis<br>
                          <input type="checkbox" name="fecalysis" class="radio-past" style="margin-bottom:12px;" value="1"> Fecalysis<br>
                          <input type="checkbox" name="cbc" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Complete Blood Count (CBC)<br>
                          <input type="checkbox" name="fbs" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Fasting Blood Sugar (FBS)<br>
                          <input type="checkbox" name="bun" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Blood Urea Nitrogen (BUN)<br>
                          <input type="checkbox" name="creatinine" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Creatinine<br>
                          <input type="checkbox" name="cholesterol" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Total Cholesterol<br>
                          <input type="checkbox" name="triglycerides" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Triglycerides<br>
                          <input type="checkbox" name="hdl" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> High-Density Lipoprotein (HDL)<br>
                          <input type="checkbox" name="ldl" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Low-Density Lipoprotein (LDL)<br>
                          <input type="checkbox" name="uricAcid" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Uric Acid<br>
                          <input type="checkbox" name="sgpt" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Serum Glutamic-Pyruvic Transaminase (SGPT)<br><br>
                          <label style="margin-right:15px;">Others:</label>
                          <textarea rows="4" class="form-control" placeholder="Other Request"
                            style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="otherRequest" data-parsley-group="referral"></textarea>
                          <input type="hidden" name="treatmentID" value="{{ $treatment['treatmentID'] }}">
                        </div>
                      </div>
                    </div>
                </div>
            </div>

        <div style="margin-top: 25px;margin-bottom: 30px;float: left;text-align: center;width: 100%">
          <a href="{{ route('physician.consult', ['id' => $consultInfo->patientID, 'clinicLogID' => $consultInfo->clinicLogID]) }}" target="_blank"><button type="button" class="btn btn-default">PAST HISTORY</button></a>
          <a href="{{ url('/physician/referred/patients') }}"><button type="button" class="btn btn-danger">CLOSE</button></a>

          <input type="hidden" name="logReferralID" value="{{ $consultInfo->logReferralID }}">
          <input type="hidden" name="treatmentID" value="{{ $consultInfo->treatmentID }}">
        </div>
        </form>
          <!--/Content-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
        <!-- /form input mask -->  
      </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->

<script>
  $(document).ready(function(){
    //Bind Form for validation
    $('#saveForm').parsley();

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

    //variables for the record of medicine
    var medicineID = new Array();
    var medicineName = '';
    var medicineBrand = '';
    var medQuantity = new Array();
    var medication = new Array();
    var dosage = new Array();
    var isPrescribed = new Array();
    var medUnit = '';
    //On click of Medicine Add
    $('#btnMedAdd').on('click', function(e){
      e.preventDefault();

      $('#saveForm').parsley().validate('second');

      if ($('#saveForm').parsley().isValid('second')) {

          medicineName = $('#medGenericName option:selected').text();
          medicineBrand = $('#medBrand option:selected').text();
          medicineID[medicineID.length] = $('#medBrand').val();
          medQuantity[medQuantity.length] = $('#medQuantity').val();
          medication[medication.length] ="Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ";
          dosage[dosage.length] = $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val();
          isPrescribed[isPrescribed.length] = 0;
          medUnit = $('#medUnit').text();

          var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medicineName+"</td><td class=' '>"+medicineBrand+"</td><td class=' '>"+medQuantity[medQuantity.length-1]+"</td><td class=' last'>"+medUnit+"</td><td class=''>"+dosage[dosage.length-1]+"</td><td class=''>"+medication[medication.length-1]+"</td></tr>"; 

        $(tr).prependTo('#tbodyMedicine');

        //Reset Med Fields
        $('select[name=medGenericName]').prop('selectedIndex', 0);
        $('select[name=medBrand]').prop('selectedIndex', 0);
        $('select[name=medUnit]').prop('selectedIndex', 0);
        $('select[name=medBrand]').prop('disabled', true);
        $('select[name=medUnit]').prop('disabled', true);
        $('input[name=medQuantity]').val(this.defaultValue);
        $('input[name=medication]').val(this.defaultValue);
        $('#dosage').val(this.defaultValue);
        $('input[name=hrs_day]').val(this.defaultValue);
        $('input[name=week]').val(this.defaultValue);
      }

    });

    //On click of Prescribe
    $('#btnPrescribe').on('click', function(e){
      e.preventDefault();

      $('#saveForm').parsley().validate('second');

      if ($('#saveForm').parsley().isValid('second')) {

          medicineName = $('#medGenericName option:selected').text();
          medicineBrand = $('#medBrand option:selected').text();
          medicineID[medicineID.length] = $('#medBrand').val();
          medQuantity[medQuantity.length] = $('#medQuantity').val();
          medication[medication.length] ="Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ";
          dosage[dosage.length] = $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val();
          medUnit = $('#medUnit').text();
          isPrescribed[isPrescribed.length] = 1;

          var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medicineName+"</td><td class=' '>"+medicineBrand+"</td><td class=' '>"+medQuantity[medQuantity.length-1]+"</td><td class=' last'>"+medUnit+"</td><td class=''>"+dosage[dosage.length-1]+"</td><td class=''>"+medication[medication.length-1]+"</td></tr>"; 

        $(tr).prependTo('#tbodyPrescribedMedicine');

        //Reset Med Fields
        $('select[name=medGenericName]').prop('selectedIndex', 0);
        $('select[name=medBrand]').prop('selectedIndex', 0);
        $('select[name=medUnit]').prop('selectedIndex', 0);
        $('select[name=medBrand]').prop('disabled', true);
        $('select[name=medUnit]').prop('disabled', true);
        $('input[name=medQuantity]').val(this.defaultValue);
        $('input[name=medication]').val(this.defaultValue);
        $('#dosage').val(this.defaultValue);
        $('input[name=hrs_day]').val(this.defaultValue);
        $('input[name=week]').val(this.defaultValue);
      }

    });

   //variables for the record of medical supply
    var medSuppID = new Array();
    var medSuppName = '';
    var medSuppBrand = '';
    var medSuppQuantity = new Array();
    var medUnit = '';
    $('#btnSuppAdd').on('click', function(e){
      $('#saveForm').parsley().validate('third');

      if ($('#saveForm').parsley().isValid('third')) {

          medSuppName = $('#medSuppName option:selected').text();
          medSuppBrand = $('#medSuppBrand option:selected').text();
          medSuppID[medSuppID.length] = $('#medSuppBrand').val();
          medSuppQuantity[medSuppQuantity.length] = $('#medSuppQuantity').val();
          medSuppUnit = $('#medSuppUnit').text();

        var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medSuppName+"</td><td class=' '>"+medSuppBrand+"</td><td class=' '>"+medSuppQuantity[medSuppQuantity.length-1]+"</td><td class=' last'>"+medSuppUnit+"</td></tr>"; 

        $(tr).prependTo('#tbodyMedicalSupply');

        
        //Reset Medical Supply Fields
        $('select[name=medSuppName]').prop('selectedIndex', 0);
        $('select[name=medSuppBrand]').prop('selectedIndex', 0);
        $('select[name=medSuppUnit]').prop('selectedIndex', 0);
        $('select[name=medSuppBrand]').prop('disabled', true);
        $('select[name=medSuppUnit]').prop('disabled', true);
        $('input[name=medSuppQuantity]').val(this.defaultValue);

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

      if(stepNumber == 3 || stepNumber == 4){
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

                        $('#saveForm').parsley().validate("first");
                        $('#saveForm').parsley().validate("referral");

                        if ($('#saveForm').parsley().isValid("first") && $('#saveForm').parsley().validate("referral")) {
                            var data = {
                              medicineID: medicineID,
                              medQuantity: medQuantity,
                              medication: medication,
                              medSuppID: medSuppID,
                              medSuppQuantity: medSuppQuantity,
                              isPrescribed: isPrescribed,
                              dosage: dosage,
                              patientID: '{{ $consultInfo->patientID }}'
                            };
                            $.ajax({
                              url: '/physician/save/diagnosis',
                              type: 'get',
                              data: $('#saveForm').serialize() +"&"+ $.param(data),
                              success: function(output){
                                window.location.href = '/physician/referred/patient/diagnoses/' + '{{ $consultInfo->patientID }}';
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
            toolbarSettings: {
                toolbarPosition: 'bottom',
                toolbarButtonPosition: 'end',
                toolbarExtraButtons: [btnFinish, btnCancel]
            },
            anchorSettings: {
                 enableAllAnchors: true, // Activates all anchors clickable all times
            }
    });

        // Initialize the leaveStep event
    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
       if (stepNumber == 1 && stepDirection == 'forward') {
         $('#saveForm').parsley().validate('first');

         if ($('#saveForm').parsley().isValid('first')) {
            return true;
         }
         else{
            return false;
         }
       }
       else if(stepNumber == 1 && stepDirection == 'forward'){
        return true;
       }
       if (stepNumber == 2 && stepDirection == 'forward') {
          $('#saveForm').parsley().validate('treatment');

          if ($('#saveForm').parsley().isValid('treatment')) {
            return true;
          }
          else{
            return false;
          }
       }
    });

    //make remarks required in outside referral
    $('#referTo').on('change', function(){
      $('#remark').prop('required', true);

      if ($('#referTo').val() == '3') {
        $('#referToOthers').prop('disabled', false);
      }
      else{
        $('#referToOthers').prop('disabled', true);
      }
    })

  });
</script>
@endsection