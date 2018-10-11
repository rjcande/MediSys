@extends('nurse.layout.nurse')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Logs</h3>
                <label style="font-style: italic; font-size: 18px;">Patient ID: </label>
                <label style="font-style: italic; font-size: 18px;">
                  {{ $patientInfo->patientID }}
                </label><br>
                <label style="font-style: italic; font-size: 18px;">Patient Name: </label>
                <label style="font-style: italic; font-size: 18px;">
                  {{ $patientInfo->lastName }}, {{ $patientInfo->firstName }} {{ $patientInfo->middleName }} {{ $patientInfo->quantifier }}
                </label><br>
                <label style="font-style: italic; font-size: 18px;">Patient Type: </label>
                <label style="font-style: italic; font-size: 18px;">
                  @if($patientInfo->patientType == 1)
                    {{ "Student" }}
                  @elseif($patientInfo->patientType == 2)
                    {{ "Faculty/College" }}
                  @elseif($patientInfo->patientType == 3)
                    {{ "Admin/Dept" }}
                  @endif
                </label>
               

              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <div class="x_title">
                      <button class="btn btn-success btn-round" id="btnAddRecord" style="float: right;">ADD RECORD</button>
                      <div class="clearfix"></div>
                    </div>
                   <!-- Content -->
                    <div>
                      <p style="font-size: 20px; color:white; background: linear-gradient(to right, #16a085, white);height:30px; border-radius:8px;">&nbsp<b><em>Medical Log</em></b>
                      </p>
                    </div>  
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="medicalTable">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Symptoms </th>
                            <th class="column-title">Generic Name </th>
                            <th class="column-title">Brand </th>
                            <th class="column-title">Quantity Used </th>
                            <th class="column-title">Supply Name </th>
                            <th class="column-title">Brand </th>
                            <th class="column-title">Quantity Used </th>
                            <th class="column-title">Attending Physician </th>
                            <th class="column-title">Assisting Nurse </th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Time </th>
                          </tr>
                        </thead>

                        <tbody>
                        @php($ctr = 1)

                        @foreach($medicalLogs as $medicalLog)
                          <tr class="even pointer">
                            <td class="a-center">{{ $ctr }}</td>
                            <td class="">{{ $medicalLog->symptoms }}</td>
                            <td class=" ">
                                @foreach($usedMed as $medicine)
                                @if($medicine->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $medicine->genericName }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                               @foreach($usedMed as $medicine)
                                @if($medicine->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $medicine->brand }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                               @foreach($usedMed as $medicine)
                                @if($medicine->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $medicine->quantity }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                               @foreach($usedMedSupply as $supply)
                                @if($supply->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $supply->medSupName }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                             @foreach($usedMedSupply as $supply)
                                @if($supply->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $supply->brand }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                              @foreach($usedMedSupply as $supply)
                                @if($supply->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $supply->quantity }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                              @if($physician['lastName'])
                                {{ $physician['lastName'] }}, {{ $physician['firstName'] }} {{ $physician['middleName']{0} }}@if($physician['middleName']){{ '.' }}@endif {{ $physician['quantifier'] }}
                              @endif
                            </td>
                            <td class=" ">
                               {{ $medicalLog->lastName }}, {{ $medicalLog->firstName }} {{ $medicalLog->middleName{0} }}@if($medicalLog->middleName){{ '.' }}@endif {{ $medicalLog->quantifer }}
                            </td>
                            <td class=" ">
                              {{ date('m-d-Y', strtotime($medicalLog->clinicLogDateTime)) }}
                            </td>
                            <td class=" last">{{ date('h:i a', strtotime($medicalLog->clinicLogDateTime)) }}</td>
                          </tr> 
                          @php($ctr++)
                        @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div style="float: right; margin-top:30px;">
                      <a href="{{ route('personal.info', $patientInfo->patientID) }}"> 
                        <button class="btn btn-primary">BACK</button>
                      </a>
                    </div>
                    </div>
                  </div>
                   <!-- /Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<div id="logPatientModal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Medical Log Information</h4>
      </div>

      <div class="modal-body">
          <form id="logPatientForm" class="form-horizontal form-label-left">
          @csrf()
         
          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient ID: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <label class="control-label col-md-1 col-sm-3 col-xs-3" id="patientID">{{ $patientInfo->patientID }}</label>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Student/Faculty Number: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientNumber" name="patientNumber" data-parsley-pattern="[0-9]{4}-[0-9]{5}-[A-Za-z]{2}-[0-9]" value="{{ $patientInfo->patientNumber }}">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient Name: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientName" required name="patientName" value="{{ $patientInfo->lastName }}, {{ $patientInfo->firstName }} {{ $patientInfo->middleName }} {{ $patientInfo->quantifier }}" placeholder="Last Name, First Name Middle Name">
            </div>
          </div>

          <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ Session::get('accountInfo.lastName') }}, {{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.quantifier') }}">

          <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('Y-m-d') }}" name="clinicLogDate">

          <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('h:i A') }}" name="clinicLogTime">

          <input type="hidden" name="patientID" value="{{ $patientInfo->patientID }}">

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Concern: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select name="concern" style="border-radius:8px;" class="form-control" required id="concern">
                <option value="" disabled selected></option>
                <option value="0">Consultation</option>
                <option value="1">Letter/Certification</option>
              </select>
             
            </div>
          </div>
      
      </div>
      <div class="modal-footer">
      
        <button type="submit" class="btn btn-success">Next</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
         </form>
    </div>
   
  </div>

</div>

<script>
  $(window).load(function(){
    $('#btnAddRecord').on('click', function(){
      $('#logPatientModal').modal('show');
    });

    $('#logPatientForm').parsley();

    
    //Log Patient Form Submit
    $('#logPatientForm').submit(function(e){
      e.preventDefault();

      if ($(this).parsley().isValid()) {

        var hasRecord = { hasRecord: 1 };
        $.ajax({
          url: '/nurse/log/patient',
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
 

    //reset form on modal hide
    $('#logPatientModal').on('hidden.bs.modal', function () {
      $('#logPatientForm')[0].reset();
      $('#patientID').text(' ');
    })

    $('#medicalTable').dataTable({
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
        "bPaginate": false

    });
  });
  //Reset form on page load
  $(window).bind("pageshow", function() {
    $('#logPatientForm')[0].reset();
  });
</script>
@endsection