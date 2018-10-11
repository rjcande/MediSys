@extends('physician.layout.physician')

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
                    <h2>{{date('F, Y')}}</h2>
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

                    <div class="table-responsive">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Patient Name </th>
                            <th class="column-title">Patient Type </th>
                            <th class="column-title">Attending Physician </th>
                            <th class="column-title">Assisting Nurse </th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Time </th>
                            <th class="column-title no-link last" style="width: 70px;"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                           @php($ctr = sizeof($clinicLogs))
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
                                @foreach($attendingPhysician as $physician)
                                   @if($clinicLog->clinicLogID == $physician->clinicLogID)
                                      {{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }}
                                   @endif
                                @endforeach

                              </td>
                              <td class=" ">
                                @foreach($assistingNurse as $nurse)
                                  @if($clinicLog->nurseID == $nurse->id)
                                    {{ $nurse->lastName }}, {{ $nurse->firstName }} {{ $nurse->middleName }} {{ $nurse->quantifier }}
                                  @endif
                                @endforeach
                              </td>
                              <td class=" ">
                                {{ date("F d, Y", strtotime($clinicLog->clinicLogDateTime)) }}
                              <td class=" ">
                                {{ date("h:i a", strtotime($clinicLog->clinicLogDateTime)) }}
                              </td>
                              </td>
                              <td class=" last">
                                  <button class="btn btn-danger delete-button" data-toggle="tooltip" title="Delete"  data-id="{{ $clinicLog->clinicLogID }}">
                                    <i class="fa fa-trash"></i>
                                  </button>

                              </td>
                            </tr>
                            @php($ctr--)
                            {{ Session::put('number', $ctr) }}
                          @endforeach
                        </tbody>
                      </table>
                      
                        <button type="button" class="btn btn-primary" type="button" data-toggle="modal" data-target="#printModal">
                          <i class="fa fa-print"></i> Print
                        </button>
                  
                    </div>
                    <!--/Content-->
                  </div>
                </div>
              </div>
              <!-- /form input mask -->

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
        <div style="float: left; margin-left: 5px">
            <input type="checkbox" name="daily" id="daily" value="1" data-parsley-multiple="choices" required data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Daily</label>
        </div>
        <div style="float: left; margin-left: 5px">
            <input type="checkbox" name="weekly" id="weekly" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Weekly</label>
        </div>
        <div style="float: left; margin-left: 5px">
            <input type="checkbox" name="monthly" id="monthly" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Monthly</label>
        </div>
        <div style="float: left; margin-left: 5px">
            <input type="checkbox" name="yearly" id="yearly" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Yearly</label>
        </div>
        <div style="width: 100%" id="error_container">
          
        </div>
        <br><br>
        <div style="width: 100%">
          <div class="form-group">
            <label style="margin-left: 5px; width: 50px">Date: </label>
            <input type="date" name="date" style="width: 70%; border-radius:6px" disabled id="date">
          </div>
            
        </div>
        <div style="width: 100%">
          <label style="margin-left: 5px; width: 50px">Week: </label>
          <label style="margin-left: 5px;">From: </label>
          <input type="date" name="weekFrom" style="width: 53%; border-radius:6px" disabled id="weekFrom">
          <br>
          <label style="margin-left: 65px; margin-right: 17px">To: </label>
          <input type="date" name="weekTo" style="width: 53%; border-radius:6px" disabled id="weekTo">
        </div>
        <br>
        <div style="width: 100%">
            <label style="margin-left: 5px;  width: 50px">Month: </label>
            <select name="month" id="month" disabled data-parsley-errors-container="#error_container_month" data-parsley-error-message="Month is required" style="border-radius:6px; width: 47%;">
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

            <select name="year_month" class="year" id="year-month" disabled data-parsley-errors-container="#error_container_month" data-parsley-error-message="Year is required" style="border-radius:6px">
                <option value="" selected disabled>Year</option>
            </select>
        </div>
        <div style="width: 100%" id="error_container_month">
          
        </div>
        <div style="width: 100%">
            <label style="margin-left: 5px;  width: 50px">Year: </label>
            <select name="year" class="year" id="year" disabled data-parsley-errors-container="#error_container_year" data-parsley-error-message="Year is required" style="border-radius: 6px; width: 70%; text-align: center;">
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

<!-- FILTER -->
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
            width: 170px;" id="filterMonth"><br>
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
              solid gray;" id="filterDays">
            <option value="" disabled selected></option>
              @for($days = 1; $days < 32; $days++)
                <option value="{{ $days }}">{{ $days }}</option>
              @endfor
          </select>
          <label style="display: inline-block; width: 60px; margin-bottom:10px; margin-left: 50px;">Year </label>
          <select style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px
              solid gray;" id="filterYear">
            <option value="" disabled selected></option>
              @for($years = 2018; $years > 1998; $years--)
                <option value="{{ $years }}">{{ $years }}</option>
              @endfor
          </select><br>
         <!--  <label style="display: inline-block; width: 80px; margin-bottom:10px;">Concern
          </label>
          <select style="height: 32px; font-size:15px; border-radius: 12px; width: 170px;
              border: 1.5px solid gray;" id="filterConcern">
            <option value="" disabled selected></option>
            <option value="consultation">Consultation</option>
            <option value="letter/certification">Letter/Certificate</option>
          </select> -->
        </div>
      
        <div class="modal-footer" style="margin-right:0%">
          <button class="btn btn-primary" id="btnReset">Reset Filter</button>
          <button class="btn btn-success" id="btnDone" data-dismiss="modal">DONE</button>
          
        </div>
            </div>
        </div>
  </div>
<script>
  $(document).ready(function(){
    var table = $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": '<"top"i>rt<"bottom"p><"clear">',
        "order": [[ 0, "desc" ]]
    });

    $('#search').keyup(function(){
      table.search($(this).val()).draw();
    });

     //Filtering of Data Table
    $('select').on('change', function(){
      var month = $('#filterMonth').val();
      var days = $('#filterDays').val();
      var year = $('#filterYear').val();
      //var concern = $('#filterConcern').val();
      if (month == null) {
        month = ' ';
      }
      if (days == null) {
        days = ' ';
      }
      if (year == null) {
        year = ' ';
      }
      // if (concern == null) {
      //   concern = ' ';
      // }
      var date = month + ' ' + days + ' ' + year;
      table.column(5).search(date).draw();
      //table.column(3).search(concern).draw();
   

    });

    $('#btnReset').click(function(){
      $('#filterConcern').val('');
      $('#filterYear').val('');
      $('#filterDays').val('');
      $('#filterMonth').val('');
      table.column(4).search('').draw();
      table.column(3).search('').draw();
    });

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
    $('#weekly').on('change', function(){
      if ($(this).is(':checked')) {
        $('#weekFrom').prop('disabled', false);
        $('#weekFrom').prop('required', true);
        $('#weekTo').prop('disabled', false);
        $('#weekTo').prop('required', true);
      }
      else{
        $('#weekFrom').prop('disabled', true);
        $('#weekFrom').prop('required', false);
        $('#weekTo').prop('disabled', true);
        $('#weekTo').prop('required', false);
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
      $('#weekFrom').prop('disabled', true);
      $('#weekFrom').prop('required', false);
      $('#weekTo').prop('disabled', true);
      $('#weekTo').prop('required', false);
    });

  });

</script>
@endsection
