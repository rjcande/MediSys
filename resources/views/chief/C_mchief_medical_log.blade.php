@extends('chief.layout.chief')

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
                    <div style="float: right;">
                      <select style="width: 150px; height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                        <option value="" disabled="" selected="">Month</option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                      </select>
                      <select style="width: 150px; height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                        <option value="" disabled selected>Day</option>
                        @for($days = 1;$days < 32; $days++)
                          <option value="{{ $days }}">{{ $days }}</option>
                        @endfor
                      </select>
                      <select style="width: 150px; height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                        <option>Year</option>
                        <option>2018-1940</option>
                      </select>
                      <button class="btn btn-round btn-primary">GO</button>
                      <button class="btn btn-round btn-default"><i class="fa fa-filter"></i>Filter</button>
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
                            @php($ctr++)
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


<script>
  $(document).ready(function(){
    $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false 
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
  
</script>
@endsection