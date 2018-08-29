@extends('dchief.layout.dentalchief')

@section('content')

    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3></h3>
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
                    
                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b></p>
                        <textarea rows="7" name="diagnosisTextArea" class="form-control" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" readonly>{{$diagnosis['diagnosisDescription']}}</textarea>
                      </div>


                      <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                        <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white); height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b></p>
                        <textarea rows="7" class="form-control" readonly style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%; height:100px;">{{$treatment['treatmentDescription']}}</textarea>
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
                      <div class="row" style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
                        <div class="table-container" style="width:470px;">
                          <table class="table table-striped jambo_table bulk_action" style ="width: 470px;">
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

                            <tbody>
                              @foreach($medsGiven as $meds)
                                <td></td>
                                <td>{{$meds->genericName}}</td>
                                <td>{{$meds->brand}}</td>
                                <td>{{$meds->quantity}}</td>
                                <td>{{$meds->unit}}</td>
                                <td>{{$meds->medication}}</td>
                                <td>{{$meds->dosage}}</td>
                              @endforeach
                            </tbody>
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
                                <th class="column-title"></th>  
                              </tr>
                            </thead>

                            <tbody>
                              @foreach($medSupp as $medSupps)
                                <td></td>
                                <td>{{$medSupps->medSupName}}</td>
                                <td>{{$medSupps->brand}}</td>
                                <td>{{$medSupps->quantity}}</td>
                                <td>{{$medSupps->unit}}</td>
                              @endforeach
                            </tbody>
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

                            <tbody>
                              @foreach($prescribed as $prescribedMeds)
                                <td></td>
                                <td>{{$prescribedMeds->genericName}}</td>
                                <td>{{$prescribedMeds->brand}}</td>
                                <td>{{$prescribedMeds->quantity}}</td>
                                <td>{{$prescribedMeds->unit}}</td>
                                <td>{{$prescribedMeds->medication}}</td>
                                <td>{{$prescribedMeds->dosage}}</td>
                              @endforeach
                            </tbody>
                          </table>
                          <button type="button" class="btn btn-default"
                            style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
                          <button type="button" class="btn btn-default"
                            style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
                        </div>
                      </div>

                
                      <div style="margin-top: 25px;float: left;text-align: right;width: 100%">
                        <form method="post">
                          <!-- <button type="submit" class="btn btn-default" name="btnViewMore" style="background-color:#00d2d3; color:white;">VIEW MORE</button> -->
                          <input type="hidden" name="patientID">
                        </form>
                        <!--IF VIEW MORE BUTTON IS PRESSED -->
                        <!--<?php    
                          /*if(isset($_POST['btnViewMore']))
                          {
                            //$patientID = $_POST['patientID'];
                            //THIS MUST FIRST SEARCH FOR ANY EXISTING DENTAL PATIENT HISTORY IN THIS RECORD
                            //QUERY TO SEARCH FOR AN EXISTING DENTAL PATIENT HISTORY

                            $searchQuery = "SELECT DISTINCT patientID FROM dentalpatienthistory dp WHERE EXISTS (SELECT patientID FROM cliniclog cl WHERE cl.patientID = dp.patientID AND cl.patientID = '$displayPatientID')";
                            $searchResult = mysqli_query($conn,$searchQuery);
                             $num = mysqli_affected_rows($conn);
                              if ($num == 0) 
                              {
                                echo "<script>alert('There was no Patient History Record found!!')</script>";
                                echo "<script>if(window.confirm('Do you want to create a Patient History Record?'))
                                { 
                                  window.location.href ='C_dentist_dental_form.php?patientID=$displayPatientID&patientName=$patientName';
                                  exit();
                                }</script>";
                              }
                              elseif ($num > 0)
                              {
                              $_SESSION['currentPatientID'] = $_POST['patientID'];
                              echo "<script>window.location.href ='C_dentist_patient_view_history.php'</script>";
                              exit();
                              }
                            }
                            

                            /*
                            elseif($searchResult))
                            {
                              echo "<script>alert('There was no Patient History Record found!!')</script>";
                              echo "<script>if(window.confirm('Do you want to create a Patient History Record?'))
                              {
                                window.location.href ='C_dentist_dental_form.php';
                                exit();
                              }</script>";
                            }*/
                        ?>-->
                        <button data-id="{{$patientDentalLog->patientID}}" id="btnBack" class="btn btn-primary">BACK</button>
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
  $('#btnBack').click(function(e){
    window.location.href = '/patient/consultations/' + $('#btnBack').data('id');
  });
</script>

@endsection