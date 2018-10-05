@extends('nurse.layout.nurse')

@section('content')

		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Medical Log</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  	<div class="col-md-6 col-sm-12 col-xs-12 form-group">
                  		<button class="btn btn-round btn-success" data-toggle="modal" data-target="#logPatientModal">Log Patient</button>
                  	</div>

                    <div class="col-md-2 col-sm-12 col-xs-12" style="width: 70px; float: right">
                      <button class="btn btn-round btn-default" data-toggle="modal" data-target="#modalFilter"><i class="fa fa-filter"></i>Filter</button>
                    </div>

                    <div class="col-md-2 col-sm-12 col-xs-12" style="width: 350px; float: right;">
                      <input type="text" placeholder="Search" id="search" class="form-control" style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!--Content-->
                    <label>{{date('F, Y')}}</label>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Patient Name </th>
                            <th class="column-title">Type </th>
                            <th class="column-title">Activity/Concern </th>
                            <th class="column-title">Date </th>
                            <th class="column-title" style="width: 60px">Time<br>In</th>
                            <th class="column-title" style="width: 60px">Time<br>Out</th>
                            <th class="column-title no-link last" style="width: 115px"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                           @php($ctr = 1)
                           {{ Session::put('number', $ctr) }}
                          @foreach($clinicLogs as $clinicLog)
                            <tr class="even pointer">
                              <td class=" ">{{ Session::get('number') }}</td>
                              <td class=" ">{{ $clinicLog->lastName }}, {{ $clinicLog->firstName }} {{ $clinicLog->middleName }} {{ $clinicLog->quantifier }}</td>
                              <td class=" ">
                                @if($clinicLog->patientType == 1)
                                  {{ "Student" }}
                                @elseif($clinicLog->patientType == 2)
                                  {{ "Faculty/College" }}
                                @elseif($clinicLog->patientType == 3)
                                  {{ "Admin/Dept" }}
                                @elseif($clinicLog->patientType == 4)
                                  {{ "Visitor" }}
                                @endif
                              </td>
                              <td class=" ">
                                @if($clinicLog->concern == 0)
                                  {{ "Consultation" }}
                                @elseif($clinicLog->concern == 1)
                                  {{ "Letter/Certification" }}
                                @endif
                              </td>
                              <td class=" ">
                                {{ date("F d, Y", strtotime($clinicLog->clinicLogDateTime)) }}
                              </td>
                              <td class=" ">
                                {{ date("h:i a", strtotime($clinicLog->clinicLogDateTime)) }}
                              </td>
                              <td class=" ">
                                @if(empty($clinicLog->timeOut))
                                  <button class="btn btn-success" name="time_out" data-id="{{ $clinicLog->clinicLogID }}" data-toggle="modal" data-target="#timeOut" id="time_out">
                                    <i class="fa fa-check"></i>
                                  </button>
                                @else
                                  {{ date('h:i a', strtotime($clinicLog->timeOut)) }}
                                @endif
                              </td>
                              <td class=" last">
                        
                                <a href="{{ route('nurse.patient.medical.log.edit', $clinicLog->clinicLogID) }}">
                                  <button class="btn btn-primary" data-toggle="tooltip" title="View More Info">
                                    <i class="fa fa-angle-double-right"></i>
                                  </button>
                                </a>
                                
                                  <button class="btn btn-danger delete-button" data-toggle="tooltip" title="Delete"  data-id="{{ $clinicLog->clinicLogID }}">
                                    <i class="fa fa-trash"></i>
                                  </button>

                              </td>
                            </tr>  
                            @php($ctr++)
                            {{ Session::put('number', $ctr) }}
                          @endforeach
                        </tbody>
                      </table>
                     <!--  <a href="{{ url('/print/medical/log') }}" target="_blank"> -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printModal">
                        <i class="fa fa-print"></i> Print
                      </button>
                   <!--    </a> -->
                      
                    </div>
                    <!--/Content-->
                  </div>
                </div>
              </div>
              <!-- /form input mask -->  

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
              <label class="control-label col-md-1 col-sm-3 col-xs-3" id="patientID"></label>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Student/Faculty Number: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientNumber" name="patientNumber" data-parsley-pattern="[0-9]{4}-[0-9]{5}-[A-Za-z]{2}-[0-9]" required data-parsley-group="patientNumber">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient Name: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientName" required name="patientName" placeholder="Last Name, First Name Middle Name">
            </div>
          </div>

          <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ Session::get('accountInfo.lastName') }}, {{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.quantifier') }}">

          <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('Y-m-d') }}" name="clinicLogDate">

          <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('h:i A') }}" name="clinicLogTime">

          <input type="hidden" name="patientID" value="">

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

  <!-- MODAL -->
  <div id="modalFilter" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width:680px">
        <!-- Modal content -->
            <div class="modal-content" style="background-color: #f7f1e3">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss = "modal">&times;</button>
            <h4 class="modal-title">Filter</h4>
        </div>

        <div class="modal-body" style="font-size:18px;">
          <label style="display: inline-block;width: 80px; margin-bottom:10px;">Month </label>
          <select style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;
            width: 170px;"><br>
            <option value="" disabled selected></option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <label style="display: inline-block; width: 50px; margin-bottom:10px; margin-left: 40px;">Day </label>
          <select style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px
              solid gray;">
            <option value="" disabled selected></option>
              @for($days = 1; $days < 32; $days++)
            <option value="$days">{{ $days }}</option>
              @endfor
          </select>
          <label style="display: inline-block; width: 60px; margin-bottom:10px; margin-left: 50px;">Year </label>
          <select style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px
              solid gray;">
            <option value="" disabled selected></option>
              @for($years = 2018; $years > 1903; $years--)
            <option value="$years">{{ $years }}</option>
              @endfor
          </select><br>
          <label style="display: inline-block; width: 80px; margin-bottom:10px;">Concern
          </label>
          <select style="height: 32px; font-size:15px; border-radius: 12px; width: 170px;
              border: 1.5px solid gray;">
            <option value="" disabled selected></option>
            <option value="0">Consultation</option>
            <option value="1">Letter/Certificate</option>
          </select>
        </div>
      
        <div class="modal-footer" style="margin-right:0%">
          <button class="btn btn-success">DONE</button>
        </div>
            </div>
        </div>
  </div>
    <!--END Modal-->

<!-- Edit Modal -->
<div id="timeOut" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form id="timeOutForm" class="form-horizontal form-label-left">
          @csrf()
          <label style="font-size: 16px">Time Out: </label>
          <input type="time" name="usr_time" style="width:150px; border-radius:8px; margin-bottom:13px; 172px;height: 30px;">
        
      </div>
      <div class="modal-footer">
        <input type="hidden" name="medicineID">
        <button type="submit" class="btn btn-success">Save</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>

  </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="printModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Print Medical Log</h4>
      </div>
      <form id="printMedicalLog" action="{{ url('/print/medical/log') }}" target="_blank" method="get">
          @csrf()
      <div class="modal-body">
        <div class="col-md-4">
            <input type="checkbox" name="daily" id="daily" value="1" data-parsley-multiple="choices" required data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Daily</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" name="monthly" id="monthly" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Monthly</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" name="yearly" id="yearly" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Yearly</label>
        </div>
        <div style="width: 100%" id="error_container">
          
        </div>
        <br><br>
        <div style="width: 100%">
          <div class="form-group">
            <label style="margin-left: 5px; width: 50px">Date: </label>
            <input type="date" name="date" style="width: 70%" disabled id="date">
          </div>
            
        </div>
        <div style="width: 100%">
            <label style="margin-left: 5px;  width: 50px">Month: </label>
            <select name="month" id="month" disabled data-parsley-errors-container="#error_container_month" data-parsley-error-message="Month is required">
              <option value="" selected></option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>

            <select name="year_month" class="year" id="year-month" disabled data-parsley-errors-container="#error_container_month" data-parsley-error-message="Year is required">
                <option value="" selected disabled>Year</option>
            </select>
        </div>
        <div style="width: 100%" id="error_container_month">
          
        </div>
        <div style="width: 100%">
            <label style="margin-left: 5px;  width: 50px">Year: </label>
            <select name="year" class="year" id="year" disabled data-parsley-errors-container="#error_container_year" data-parsley-error-message="Year is required">
                <option value="" selected disabled>Year</option>
            </select>
        </div>
        <div style="width: 100%" id="error_container_year">
          
        </div>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="submit" class="btn btn-success">Continue</button>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- Messages -->
@if(Session::has('message'))
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

<!-- Pass to Dental -->
<!-- @if(Session::has('passToDental'))
  <script>
    $(document).ready(function(){
      swal({
        title: 'SUCCESS',
        text: '{{ Session::get('passToDental') }}',
        icon: 'success'
      });
    });
  </script>
@endif -->

<script>
  $(document).ready(function(){
    var table = $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": '<"top"i>rt<"bottom"p><"clear">' 
    });

    $('#search').keyup(function(){
      table.search($(this).val()).draw();
    });

    //Printing of Medical Log
    $('#printMedicalLog').parsley();
    $('#printMedicalLog').submit(function(){
      $('#printModal').modal('hide');

    });
    
    //drop down of year
    for (i = new Date().getFullYear(); i > 1999; i--)
    {
        $('.year').append($('<option />').val(i).html(i));
    }
    //Validation For Printing of Medical Log
    $('#daily').on('change', function(){
      if ($(this).is(':checked')) {
        $('#date').prop('disabled', false);
        $('#date').prop('required', true);
      }
      else{
        $('#date').prop('disabled', true);
        $('#date').prop('required', false);
      }
    });
    $('#monthly').on('change', function(){
      if ($(this).is(':checked')) {
        $('#month').prop('disabled', false);
        $('#month').prop('required', true);
        $('#year-month').prop('disabled', false);
        $('#year-month').prop('required', true);
      }
      else{
        $('#month').prop('disabled', true);
        $('#month').prop('required', false);
        $('#year-month').prop('disabled', true);
        $('#year-month').prop('required', false);
      }
    });
    $('#yearly').on('change', function(){
      if ($(this).is(':checked')) {
        $('#year').prop('disabled', false);
        $('#year').prop('required', true);
      }
      else{
        $('#year').prop('disabled', true);
        $('#year').prop('required', false);
      }
    });

    //Variable to check if there is an existing record
    var checkRecord;
    $('#patientNumber').autocomplete({

      serviceUrl:'/nurse/medical/Log/autocomplete',
      paramName: 'input',
      minChars: 1,
      maxChars: 15,
      onSelect: function (suggestion) {
        $('#patientName').val(suggestion.data);
        $('#patientID').text(suggestion.id);
        $('input[name=patientID]').val(suggestion.id);
        checkRecord = 1;
      },
      autoSelectFirst: true,

      onSearchComplete: function (input, suggestions) {
        if(suggestions.length == 0 && input.length == 15){
          //  console.log('no suggestion');
          $('#logPatientForm').parsley().validate('patientNumber');
          
          if ($('#logPatientForm').parsley().isValid('patientNumber')) {
              checkRecord = 0;
              $('#patientName').prop('required', false);
              $('#concern').prop('required', false);
              swal({
                title: "WARNING",
                text: "Record not found! Do you want to create a record?",
                icon: "warning",
                buttons: true,
              })
              .then((willCreate)=>{
                if (willCreate) {
                  var hasRecord = { hasRecord: checkRecord };
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
            }
          }
      }
     
    });

    $('#patientName').autocomplete({

      serviceUrl:'/nurse/medical/Log/autocomplete/name',
      paramName: 'input',
      onSelect: function (suggestion) {
        $('#patientID').text(suggestion.id);
        $('#patientNumber').val(suggestion.number);
        $('input[name=patientID]').val(suggestion.id);
        checkRecord = 1;
      },
      autoSelectFirst: true,
      onSearchComplete: function (input, suggestions) {
        if(!suggestions.length){
            console.log('no suggestion');
            checkRecord = 0;
            $('#patientNumber').prop('required', false);
            $('#concern').prop('required', false);
        }
      }
    });

    $('#logPatientForm').parsley();

    //delete button is clicked
    $('.delete-button').on('click', function(){
     swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
     .then((willDelete)=>{
        if (willDelete) {
          $.ajax({
            url: '/nurse/delete/clinic/log/' + $(this).data('id'),
            type: 'get',
            success: function(output){
              swal({
                title: "SUCCESS",
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

    //Log Patient Form Submit
    $('#logPatientForm').submit(function(e){
      e.preventDefault();

      if ($(this).parsley().isValid()) {
        var hasRecord = { hasRecord: checkRecord };
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

    //Time out button is clicked
    $('#timeOutForm').submit(function(e){
        e.preventDefault();
        var time = $('input[name=usr_time]').val();
        $.ajax({
          url: "/nurse/set/timeout/" + $('#time_out').data('id'),
          type: "get",
          data: {
                  timeOut: time,
                },
          success: function(output){
            swal({
              title: 'SUCCESS',
              text: output.message,
              icon: 'success'
            })
            .then((value)=>{
              location.reload(true);
            });
          }
        });
    });

    //reset form on modal hide
    $('#logPatientModal').on('hidden.bs.modal', function () {
      $('#logPatientForm')[0].reset();
      $('#patientID').text(' ');
    });

    $('#printModal').on('hidden.bs.modal', function () {
      $('#printMedicalLog')[0].reset();
      $('#date').prop('disabled', true);
      $('#month').prop('disabled', true);
      $('#year-month').prop('disabled', true);
      $('#year').prop('disabled', true);
      $('#date').prop('required', false);
      $('#month').prop('required', false);
      $('#year-month').prop('required', false);
      $('#year').prop('required', false);
    });
    
  });
  
  //Reset form on page load
  $(window).bind("pageshow", function() {
    $('#logPatientForm')[0].reset();

  });
</script>
@endsection