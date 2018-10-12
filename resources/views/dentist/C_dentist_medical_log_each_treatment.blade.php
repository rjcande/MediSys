@extends('dentist.layout.dentist')

@section('content')

    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Treatments View</h3>
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
                <!-- Content -->
                  <div class="">
                    <br>
                    <div id="diagnosis">
            
                      {{-- <div id="symptoms" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Symptoms</b></p>
                        <textarea rows="7" name="diagnosisTextArea" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" readonly>{{$patientDentalLog->symptoms}}</textarea>
                      </div>
                    
                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b></p>
                        <textarea rows="7" name="diagnosisTextArea" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" readonly>{{$diagnosis['diagnosisDescription']}}</textarea>
                      </div> --}}


                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white); height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b></p>
                        {{-- <div style="display: inline-block;width: 95%;">
                          <input style="margin-left: 15%;" type="checkbox" value="1" readonly name="dentalExam"
                            @if($treatment['dentalExamination'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspDental Examination</label>
                          <input style="margin-left: 39.9%;" type="checkbox" value="1" readonly name="oralProphylaxis"
                            @if($treatment['oralProphylaxis'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspOral Prophylaxis</label>
                          <br>
                          <input style="margin-left: 15%;" type="checkbox" value="1" readonly name="othersTreatment"
                            @if($treatment['othersTreatment'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspOthers:</label>
                          <input style="margin-left: 10%" type="checkbox" value="1" readonly name="restorationChk"
                            @if($treatment['restoration'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspRestoration(Filling Tooth):</label>
                          <input style="width:150px; border-radius:8px; margin-left:1%;" type="text" value="{{$treatment['restorationTooth']}}" readonly name="restorationTxt">
                          <input style="margin-left: 6%" type="checkbox" value="1" name="extractionChk"
                            @if($treatment['extraction'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspExtraction:</label>
                          <input style="width:150px; border-radius:8px; margin-left:1%;" type="text" value="{{$treatment['extractionTooth']}}" readonly name="extractionTxt">
                          <textarea rows="7" class="form-control" readonly style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 100%; height:100px;">{{$treatment['treatmentDescription']}}</textarea>
                        </div> --}}
                        <div style="display: inline-block;width: 95%;">
                          <input style="margin-left: 6%;" type="checkbox" value="1" readonly data-parsley-group="first" name="dentalExam"
                            @if($treatment['dentalExamination'] == 1)
                            {{"checked"}}
                            @endif`     
                          ><label>&nbspDental Examination</label>
                          <input style="margin-left: 5%;" type="checkbox" value="1" readonly data-parsley-group="first" name="oralProphylaxis"
                            @if($treatment['oralProphylaxis'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspOral Prophylaxis</label>
                          <input style="margin-left: 5%" type="checkbox" value="1" readonly data-parsley-group="first" name="restorationChk"
                            @if($treatment['restoration'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspRestoration(Filling Tooth):</label>
                          <input style="width:150px; border-radius:8px; margin-left:1%;" type="text" readonly value="{{$treatment['restorationTooth']}}" data-parsley-group="first" readonly name="restorationTxt">
                          <input style="margin-left: 5%" type="checkbox" value="1" readonly data-parsley-group="first" name="extractionChk"
                            @if($treatment['extraction'] == 1)
                            {{"checked"}}
                            @endif
                          ><label>&nbspExtraction:</label>
                          <input style="width:150px; border-radius:8px; margin-left:1%;" type="text" value="{{$treatment['extractionTooth']}}" data-parsley-group="first" readonly name="extractionTxt">
                          <br>
                          <input style="margin-left: 6%;" type="checkbox" value="1" readonly data-parsley-group="first" name="othersTreatment"><label>&nbspOthers:</label>
                          <textarea name="treatment" id="treatment" readonly rows="7" data-parsley-group="first" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 100%; height:100px;  margin-bottom: 20px">{{$treatment['treatmentDescription']}}</textarea>
                        </div>
                      </div>
                      <br><br>
                
                      <div id="prescription" style="float:left; margin-top: 50px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                          height:30px; border-radius:8px;">&nbsp<b>Prescription and Recommendation</b></p>
                      </div>    
                
                      <div id="prescription">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine</label>
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply</label>
                      </div>

                      <br>
                      
                      <!-- MEDICINES GIVEN TABLE -->
                      <div class="row" style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px; width: 45%">
                        <div class="table-container" style="width:100%; float: left;">
                          <table class="table table-striped jambo_table bulk_action">
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
                              <tbody>
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
                        </div>
                      </div>
                      
                      <!-- MED SUPP TABLE -->
                      <div class="row" style="margin-top: 25px; margin-left: 70px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
                        <div class="table-container" style="width:470px;">
                          <table class="table table-striped jambo_table bulk_action" style ="width: 470px;">
                            <thead>
                              <tr class="headings">
                                <th>
                                <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Medical Supply Name </th>
                                <th class="column-title" style="padding-right:50px;">Brand </th>
                                <th class="column-title">Quantity Used </th>
                                <th class="column-title">Unit </th> 
                              </tr>
                            </thead>

                            @foreach($medSupp as $medSupps)
                              <tbody>
                                <td></td>
                                <td>{{$medSupps->medSupName}}</td>
                                <td>{{$medSupps->brand}}</td>
                                <td>{{$medSupps->quantity}}</td>
                                <td>{{$medSupps->unit}}</td>
                              </tbody>
                            @endforeach
                          </table>
                        </div>
                      </div>

                      <!-- PRESCRIBED MEDICINE TABLE -->
                    <div id="medicineTable"class="row" style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px;box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom:20px;width: 970px;">
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
                              <tbody>
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

                
                      <div style="margin-left: 50%;margin-top: 25px;float: left;;width: 50%">
                        {{-- <a href="{{route('dentist.dentalLog.edit', $patientDentalLog->clinicLogID)}}"><button class="btn btn-warning">EDIT</button></a> --}}
                        {{-- <a href="{{url('/dentist/DentalLog')}}"><button class="btn btn-primary">BACK</button></a> --}}
                        <a href="javascript:history.go(-1)"><button class="btn btn-primary">BACK</button></a>
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

@endsection