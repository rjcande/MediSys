@extends('nurse.layout.nurse')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{{ $clinicLogInfo->patientID }}, {{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <!-- Content -->
                    <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                      <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);height:30px; border-radius:8px;">&nbsp<b>Symptoms</b></p>
                      <textarea rows="7" class="form-control" placeholder="Enter Symptoms here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" readonly>{{ $clinicLogInfo->symptoms }}</textarea>
                    </div> <br><br>

                    <div style="position: absolute; top: 95%;width: 100%">
                      <button type="submit" class="btn btn-success" name="btnSave" style="margin-left: 40%">
                        SAVE
                      </button>
                      <button class="btn btn-success" name="btnSave" id="btnVitalSigns">
                        Vital Signs
                      </button>
                      <a href="{{ url('/nurse/medical/Log') }}">
                        <button class="btn btn-primary">BACK</button>
                      </a>
                    </div>
        
                    <div id="prescription" style="float:left; margin-top: 50px; width: 100%">
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
                      <div class="table-responsive" style="width:83%; float: left; margin-left: 25px;">
                        <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable" style="margin-top: 30px;">
                          <thead>
                            <tr class="headings">
                              <th class="column-title">Generic Name </th>
                              <th class="column-title">Brand </th>
                              <th class="column-title">Quantity Used </th>
                              <th class="column-title no-link last"><span class="nobr">Unit</span>
                              </th>
                            </tr>
                          </thead> 

                          <tbody>
                              @foreach($prescriptionInfo as $prescription)
                                <tr class="even pointer">
                                  <td class=" ">{{ $prescription->genericName }}</td>
                                  <td class=" ">{{ $prescription->brand }}</td>
                                  <td class=" ">{{ $prescription->quantity }}</td>
                                  <td class=" ">{{ $prescription->unit }}</td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
      
  <!--MEDICAL SUPPLY------------------------------------------------------------------------>
                    <div id="prescription" style="float: left; width: 50%;">
                      <div class="table-responsive" style="width: 90%; float: left;">
                        <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable" style="margin-top: 30px;">
                          <thead>
                            <tr class="headings">
                            
                              <th class="column-title">Medical Supply Name </th>
                              <th class="column-title">Brand </th>
                              <th class="column-title">Quantity Used </th>
                              <th class="column-title no-link last"><span class="nobr">Unit</span>
                              </th>
                              
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($usedMedSupply as $supply)
                               <tr class="even pointer">
                                 <td class=" ">{{ $supply->medSupName }}</td>
                                 <td class=" ">{{ $supply->brand }}</td>
                                 <td class=" ">{{ $supply->quantity }}</td>
                                 <td class=" ">{{ $supply->unit }}</td>
                               </tr>
                            @endforeach
                           
                          </tbody>
                        </table>
                      </div>
                    </div>

                   <div style="height: 80px;width: 100%; float: left;">
                      
                    </div>
                    <!-- /Content -->
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

<!-- MODAL -->
<div id="modalVitalSigns" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:680px">
    <!-- Modal content -->
    <form action="" method="get" accept-charset="utf-8">


      <div class="modal-content" style="background-color: #f7f1e3">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss = "modal">&times;</button>
         <h4 class="modal-title">Vital Signs</h4>
        </div>
        <div class="modal-body" style="color:#192a56; font-size:15px;">
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">Patient ID: </label>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">
          {{$clinicLogInfo->patientID}}
         </label><br>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">Blood Pressure: </label>
         <input type="text" style="border-radius:6px; width:455px;" value="{{$vitalSigns->bloodPressure}}"><br>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;" >Heart Rate: </label>
         <input type="text" style="border-radius:6px; width:455px;" value="{{$vitalSigns->heartRate}}"><br>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">Respiratory Rate: </label>
         <input type="text" style="border-radius:6px; width:455px;" value="{{$vitalSigns->respiRate}}"><br>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">Temperature: </label>
         <input type="text" style="border-radius:6px; width:455px;" value="{{$vitalSigns->temperature}}"><br>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">Height (cm): </label>
         <input type="text" style="border-radius:6px; width:455px;" value="{{$vitalSigns->height}}"><br>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">Weight (kg): </label>
         <input type="text" style="border-radius:6px; width:455px;" value="{{$vitalSigns->weight}}"><br>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">Body Mass Index: </label>
         <input type="text" style="border-radius:6px; width:455px;" value="{{ $vitalSigns->bmiValue}}"><br>
         <label style="display: inline-block;width: 170px; margin-bottom:10px;">BMI Range: </label>
         <input type="radio" name ="bmiRange" @if($vitalSigns->bmiRange == 0){{ "checked" }}@endif>&nbsp Normal
         <input type="radio" name ="bmiRange" @if($vitalSigns->bmiRange == 1){{ "checked" }}@endif>&nbsp Underweight
         <input type="radio" name ="bmiRange" @if($vitalSigns->bmiRange == 2){{ "checked" }}@endif>&nbsp Obese Class I
         <input type="radio" name ="bmiRange" @if($vitalSigns->bmiRange == 3){{ "checked" }}@endif>&nbsp Obese Class II
        </div>
      <div class="modal-footer" style="margin-right:0%">
        <button type="submit" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            </form>
      </div>
    </div>
  </div>
</div>
  <!--END Modal-->

<script>
 $(window).load(function(){
 
    $('#btnVitalSigns').on('click', function(){
      $('#modalVitalSigns').modal('show');
    });
  });
</script>
@endsection