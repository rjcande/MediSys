@extends('nurse.layout.nurse')

@section('content')
	
	<div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Patients List</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                      <a href="{{ url('/register/patient') }}">
                        <button class="btn btn-round btn-success">Register Patient</button>    
                      </a>
                    </div>
        			   
                    <div class="col-md-2 col-sm-12 col-xs-12" style="width: 350px; float: right;">
                      <input type="text" placeholder="Search" id="search" class="form-control" style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- Content -->
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Patient ID </th>
                            <th class="column-title">Patient Name </th>
                            <th class="column-title">Type </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="8">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($patientList as $patient)
                            <tr class="even pointer">
                              <td class=" ">{{ $patient->patientID }}</td>
                              <td class=" ">{{$patient->lastName}}, {{$patient->firstName}} {{ $patient->middleName{0} }}@if($patient->middleName){{ '.' }}@endif {{ $patient->quantifier }}</td>
                              <td class=" ">
                                @if($patient->patientType == 1)
                                  {{ "Student" }}
                                @elseif($patient->patientType == 2)
                                  {{ "Faculty/College" }}
                                @elseif($patient->patientType == 3)
                                  {{ "Admin/Dept" }}
                                 @elseif($patient->patientType == 4)
                                  {{ "Visitor" }}
                                @endif
                              </td>
                              <td class=" last">
                                    <a href="{{ route('personal.info', $patient->patientID) }}" title="">
                                      <button class="btn btn-info" data-toggle="tooltip" title="View More Info">
                                        <i class="fa fa-angle-double-right"></i>
                                      </button>
                                    </a>
                                    <button class="btn btn-danger delete-button" data-toggle="tooltip" title="Delete" data-id="{{ $patient->patientID }}" id="btnDelete">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                  
                                    <input type="hidden" name="type" value="view">
                                  </form>
                              </td>
                            </tr> 
                          @endforeach 
                        </tbody>
                      </table>
                     
                        <button type="button" class="btn btn-primary" type="button" data-toggle="modal" data-target="#printModal">
                          <i class="fa fa-print"></i> Print Patient List
                        </button>
                     
                    </div>
                    <!-- /Content -->
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
        <h4 class="modal-title" id="myModalLabel2">Print Patient List</h4>
      </div>
      <form id="printMedicalLog" action="{{ url('/print/patient/list') }}" target="_blank" method="get">
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

<!-- Messages -->

@if(Session::has('message'))
<script>
  $(document).ready(function(){
    new PNotify({
      title: 'Regular Success',
      text: '{{ Session::get('message') }}',
      type: 'success',
      styling: 'bootstrap3'
    });
  });
</script>
@endif
<!-- /Messages -->


<script>
	$(window).load(function(){
    //Data Table
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
    //Button clicks
    $('#patientTable').on('click', '.delete-button',  function(e){
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to view this record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
      .then((willDelete)=>{
        if (willDelete) {
          $.ajax({
            url: '/deletePatient/' + $(this).data('id'),
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
      });
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