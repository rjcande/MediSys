@extends('dentist.layout.dentist')

@section('content')

	    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Logs</h3>
              <div class=" " style="font-size: 18px;">
                <label style="font-style: italic;">Patient ID: </label>
                <label style="font-style: italic;">{{$patientInfo->patientID}}</label><br>
                <label style="font-style: italic;">Patient Name: </label>
                <label style="font-style: italic;">{{$patientInfo->lastName}}, {{$patientInfo->firstName}} {{$patientInfo->middleName}} {{$patientInfo->quantifier}}</label><br>
                <label style="font-style: italic;">Patient Type: </label>
                <label style="font-style: italic;">
                  @if($patientInfo->patientType == 1)
                    {{ "Student" }}
                  @elseif($patientInfo->patientType == 2)
                    {{ "Faculty/College" }}
                  @elseif($patientInfo->patientType == 3)
                    {{ "Admin/Dept" }}
                  @elseif($patientInfo->patientType == 4)
                    {{ "Visitor" }}
                  @endif
                </label>
              </div>
            </div>
          </div>

            <div class="clearfix"></div>

          <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <button class="btn btn-success btn-round" id="btnAddRecord" data-toggle="modal" data-target="#logPatientModal" style="float: right;">ADD RECORD</button>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                  <!-- Content -->
                    <div id="circumcision-history" style="float: left; margin-left: 0px; width: 100%">
                      <p style="font-size: 20px; color:white; background: linear-gradient(to right, #16a085, white);
                        height:30px; border-radius:8px;">&nbsp<b><em>Dental Log</em></b></p>
                    </div>  
                      <div style="float:left; width:100%;padding:5px;border:2px solid #dd;
                      border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white; margin-top: 5px;">
                            
                        <table class="table table-striped table-bordered jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th class="column-title">No </th>
                                {{--<th class="column-title">Symptoms</th>
                                <th class="column-title">Treatment</th> --}}
                                {{-- <th class="column-title">Generic Name </th>
                                <th class="column-title">Brand </th>
                                <th class="column-title">Quantity Used </th>
                                <th class="column-title">Supply Name </th>
                                <th class="column-title">Brand </th>
                                <th class="column-title">Quantity Used </th> --}}
                                <th class="column-title">Concern</th>
                                <th class="column-title">Attending Dentist </th>
                                <th class="column-title">Date </th>
                                <th class="column-title">Time In</th>
                                <th class="column-title">Time Out</th>
                                <th class="column-title">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              @php($ctr = sizeof($patientAllLogs))
                              {{ Session::put('number', $ctr)}}
                              @foreach($patientAllLogs as $dentalLogsAll)
                                <tr class="even pointer">
                                  <td class="a-center">{{$ctr}}</td>
                                  @if($dentalLogsAll->concern == 0)
                                    <td>{{'Consultation'}}</td>
                                  @elseif($dentalLogsAll->concern == 1)
                                    <td>{{'Certification'}}</td>  
                                  @endif
                                  <td>
                                    @foreach($attendingDentist as $dentist)
                                      @if($dentalLogsAll->clinicLogID == $dentist->clinicLogID)
                                        {{$dentist->lastName}}, {{$dentist->firstName}} {{$dentist->middleName}} {{$dentist->quantifier}}
                                      @endif
                                    @endforeach
                                  </td>
                                  <td>
                                    {{ date('F d, Y', strtotime($dentalLogsAll->clinicLogDateTime)) }}
                                  </td>
                                  <td>
                                    {{ date('h:i a', strtotime($dentalLogsAll->clinicLogDateTime)) }}
                                  </td>
                                  @if(empty($dentalLogsAll->timeOut))
                                    <td>NONE</td>
                                  @else
                                    <td>{{ date("h:i a", strtotime($dentalLogsAll->timeOut))}}</td>
                                  @endif
                                  <td class=" ">
                                    <a href="{{ route('dentist.dentalLog.moreInfo', $dentalLogsAll->clinicLogID) }}">
                                      <button type='submit' class='btn btn-info' name='btnViewMore' id="btnViewMore" title ='View More Info'>
                                        <i class='fa fa-angle-double-right'></i>
                                      </button>
                                    </a>
                                      @if($dentalLogsAll->concern == 1)                                
                                        <button type='submit' name='btnEdit' disabled id="btnEdit" class='btn btn-primary'><i class='fa fa-pencil'></i></button>
                                      @elseif($dentalLogsAll->concern == 0)
                                        <a href="{{route('dentist.dentalLog.edit', $dentalLogsAll->clinicLogID)}}">
                                          <button type='submit' name='btnEdit' id="btnEdit" class='btn btn-primary'><i class='fa fa-pencil'></i></button>
                                        </a>
                                      @endif
                                      <button name=btnDelete class='btn btn-danger delete-button' data-toggle="tooltip" title="Delete" data-id="{{$dentalLogsAll->clinicLogID}}">
                                        <i class='fa fa-trash'></i>
                                      </button>
                                  </td>
                                  {{-- <td>{{$dentalLogsAll->symptoms}}</td> --}}
                                  {{-- <td class=" " style="text-align:center;">
                                      <a href="{{ route('dentist.dental.log.each.treatment', $dentalLogsAll->clinicLogID) }}">
                                          <button class="btn btn-default" style="background-color:#9AECDB; width:70%;">View </button>
                                      </a>
                                  </td> --}}
                                  {{-- <td class=" ">{{$dentalLogsAll->treatmentDescription}}</td> --}}
                                  {{-- <td class=" ">
                                    @foreach($usedMed as $usedMeds)
                                    @if($usedMeds->clinicLogID == $dentalLogsAll->clinicLogID)
                                      <p>
                                        {{$usedMeds->genericName}}
                                      </p>
                                    @endif
                                    @endforeach
                                  </td> --}}
                                  {{-- <td class=" ">
                                    @foreach($usedMed as $usedMeds)
                                    @if($usedMeds->clinicLogID == $dentalLogsAll->clinicLogID)
                                      <p>
                                        {{$usedMeds->brand}}
                                      </p>
                                    @endif
                                    @endforeach
                                  </td> --}}
                                  {{-- <td class=" ">
                                    @foreach($usedMed as $usedMeds)
                                    @if($usedMeds->clinicLogID == $dentalLogsAll->clinicLogID)
                                      <p>
                                        {{$usedMeds->quantity}}
                                      </p>
                                    @endif
                                    @endforeach
                                  </td> --}}
                                  {{-- <td class=" ">
                                    @foreach($usedMedSupply as $usedMedSupp)
                                    @if($usedMedSupp->clinicLogID == $dentalLogsAll->clinicLogID)
                                      <p>
                                        {{$usedMedSupp->medSupName}}
                                      </p>
                                    @endif
                                    @endforeach
                                  </td> --}}
                                  {{-- <td class=" ">
                                    @foreach($usedMedSupply as $usedMedSupp)
                                    @if($usedMedSupp->clinicLogID == $dentalLogsAll->clinicLogID)
                                      <p>
                                        {{$usedMedSupp->brand}}
                                      </p>
                                    @endif
                                    @endforeach
                                  </td> --}}
                                  {{-- <td class=" ">
                                    @foreach($usedMedSupply as $usedMedSupp)
                                    @if($usedMedSupp->clinicLogID == $dentalLogsAll->clinicLogID)
                                      <p>
                                        {{$usedMedSupp->quantity}}
                                      </p>
                                    @endif
                                    @endforeach
                                  </td> --}}
                                  
                                </tr>
                                @php($ctr--)
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                
                    <div style="float: right; margin-top:30px;">
                      <a href="{{ route('dentist.patientList.viewMore', $patientInfo->patientID) }}"> <button class="btn btn-primary">BACK</button></a>
                      {{-- @foreach($patientAllLogs as $dentalLogsAll) --}}
                      <a href="{{ route('dentist.generate.medicalLogEach', $patientInfo->patientID) }}" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-print"></i> PRINT MEDICAL LOG</button></a>
                      {{-- @endforeach --}}
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
<div id="logPatientModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Medical Log Information</h4>
      </div>
      <!-- Modal Body -->
        
      <div class="modal-body">
        <form id="logPatientForm" class="form-horizontal form-label-left" method="get">
          @csrf

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient ID: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              {{-- <input type="text" class="form-control" style="border-radius:8px;" id="patientID" name="patientID" required value="{{$patientInfo->patientID}}"> --}}
              <label class="control-label col-md-1 col-sm-3 col-xs-3" id="patientID" name="patientID" >{{$patientInfo->patientID}}</label>
              <input type="hidden" value="{{$patientInfo->patientID}}" id="patientID" name="patientID">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Student/Faculty Number: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientNumber" name="patientNumber" value="{{$patientInfo->patientNumber}}" required>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient Name: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientName" name="patientName" required value="{{$patientInfo->lastName}}, {{$patientInfo->firstName}} {{$patientInfo->middleName}} {{$patientInfo->quantifier}}">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Assisting Dentist: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" name="attendingDentist" value="{{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.lastName') }} {{ Session::get('accountInfo.quantifier') }}" readonly>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" required="required" name="date" readonly 
              value="{{ date('Y/m/d') }}">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Time: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" required="required" name="time" readonly 
              value="{{ date('h:i a') }}">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Concern: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" style="border-radius:8px;" required="required" id="concern" name="concern">
                <option value="" disabled selected></option>
                <option value="0">Consultation</option>
                <option value="1">Letter/Certification</option>
              </select>
            </div>
          </div>
      
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <!-- <input type="submit" class="btn btn-success" value="Next" name="btnNext"> -->
        <button type="submit" class="btn btn-success">Next</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- /MODAL -->

<script>
  $(document).ready(function(){

    var checkRecord = 1;

    //Log Patient Form Submit
    $('#logPatientForm').submit(function(e){
      e.preventDefault();
      if ($(this).parsley().isValid()) {
        var hasRecord = { hasRecord: checkRecord };
        $.ajax({
          url: '/dentist/select/concern',
          type: 'get',
          data: $(this).serialize() + '&' + $.param(hasRecord),
          success: function(output){
            if (output.redirect) {
              if(output.redirect){
                window.location.href = output.redirect;
              }
            }
          }
        });
      }
    });

    //delete button is clicked
    $('.delete-button').on('click', function(){
     swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
     .then((willDelete)=>{
        if (willDelete) {
          $.ajax({
            url: '/dentist/delete/dental/log/' + $(this).data('id'),
            type: 'get',
            success: function(output){
              swal({
                title: "",
                text: output.message,
                icon: "success",
              })
              .then((value)=>{
                location.reload(true);
              });
            }
          });
        }
     })
    });

    $('#logPatientForm').parsley();
    
    if({{$patientInfo->patientType}} == 4){
      $('#patientNumber').prop('required', false);
    }

  });
    
</script>

@endsection