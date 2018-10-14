@extends('dentalchief.layout.dentalchief')

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
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <!-- Content -->
                    <div>
                      <table class="table table-striped table-bordered jambo_table bulk_action" style="width:100%" id="patientTable">
                        <thead>
                            <tr class="headings">
                              <th class="column-title"></th>
                              {{-- <th class="column-title">Student/Faculty Number</th> --}}
                              <th class="column-title">Patient ID </th>
                              <th class="column-title">Patient Name </th>
                              <th class="column-title">Type</th>
                              <th class="column-title"></th>
                            </tr>
                        </thead>
                      <tbody>
                        @foreach ($patient as $patients)
                          <tr class="even pointer">
                            <td class="a-center">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            {{-- <td class=" ">{{$patients->patientNumber}}</td> --}}
                            <td class=" ">{{$patients->patientID}}</td>
                            <td class=" ">{{$patients->lastName}}, {{$patients->firstName}} {{$patients->middleName}} {{$patients->quantifier}}</td>
                            <td class=" ">
                              @if($patients->patientType == 1)
                              {{
                                  'Student'
                              }}
                              @elseif($patients->patientType == 2)
                              {{
                                  'Faculty/College'
                              }}
                              @elseif($patients->patientType == 3)
                              {{
                                  'Admin/Dept'
                              }}
                              @elseif($patients->patientType == 4)
                              {{
                                  'Visitor'
                              }}
                              @endif
                            </td>
                            <td class=" ">
                              <a href="{{ route('dchief.patientList.viewMore', $patients->patientID) }}">  
                                <button class='btn btn-info' type="submit" title='View More Info'>View More</button>
                              </a>
                              
                              <a href="{{url('/dchief/patient/consultations', $patients->patientID)}}">
                                <button class='btn btn-default' type="submit" title='View More Info'>Concerns</button>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>   
                        </table>
                        {{-- <a target="_blank" href="{{route('dentist.generate.patientList')}}"> --}}
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patientListModal"><i class="fa fa-print"></i> Print Patient List</button>
                        {{-- </a> --}}
                      </div>
                    <!-- /Content -->
                  </div>
                </div>
              </div>
              <!-- /form input mask -->  
            </div>
          </div>
        </div>

<!-------------------------------------------------------------GENERATE PATIENT LIST MODAL---------------------------------------------------------------------->
<div class="modal fade" id="patientListModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Print Patient List</h4>
        </div>
        <form id="printPatientList" action="{{route('dentist.generate.patientList')}}" target="_blank" method="get">
          @csrf()
          <div class="modal-body">
              <div style="float:left; margin-left: 5px">
                  <input type="checkbox" name="daily" id="daily" value="1" data-parsley-multiple="choices" required data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Daily</label>
              </div>
              <div style="float:left; margin-left: 5px">
                  <input type="checkbox" name="weekly" id="weekly" value="1" data-parsley-multiple="choices" required data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Weekly</label>
              </div>
              <div style="float:left; margin-left: 5px">
                  <input type="checkbox" name="mon" id="mon" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Monthly</label>
              </div>
              <div style="float:left; margin-left: 5px">
                  <input type="checkbox" name="yearly" id="yearly" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Yearly</label>
              </div>
              <div style="100%" id="error_container">
              
              </div>
              <br><br>

              <div style="width: 100%">
                <div class="form-group">
                    <label style=" width: 50px">Date: </label>
                    <input type="date" name="date" style="width: 70%; border-radius: 5px" disabled id="date">
                </div>
              </div>

              <div style="width: 100%">
                <div class="form-group">
                    <label style=" width: 50px">Week: </label>
                    <label style="margin-left: 4px; width: 50px">From: </label>
                    <input type="date" name="weekFrom" style="width: 49%; border-radius: 5px" disabled id="weekFrom"><br>
                    <label style="margin-left: 55px; width: 50px"> To: </label>
                    <input type="date" name="weekTo" style="width: 50%; border-radius: 5px" disabled id="weekTo">

                </div>
              </div>

              <div style="width: 100%">
                  <label style="width: 50px">Month: </label>
                  <select name="month" id="month" style="border-radius: 5px; width: 50%" disabled data-parsley-errors-container="#error_container_month" data-parsley-error-message="Month is required">
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
              <div style="100%" id="error_container_month">
              
              </div>
              <div style="width: 100%">
                  <label >Year: </label>
                  <select name="year" class="year" id="year" style="margin-left:15px ;width: 70%; border-radius: 8%; text-align:center" disabled data-parsley-errors-container="#error_container_year" data-parsley-error-message="Year is required">
                      <option value="" selected disabled>Year</option>
                  </select>
              </div>
              <div style="width: 100%" id="error_container_year">
                
              </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-success" >Continue</button>
          </div>

        </form>

      </div>
    </div>
  </div>
<!-------------------------------------------------------------/GENERATE PATIENT LIST MODAL---------------------------------------------------------------------->
        
<script>
  $(document).ready(function(){
    var table = $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": '<"top"i>rt<"bottom"p><"clear">' 
    });

    //drop down of year
    for (i = new Date().getFullYear(); i > 1999; i--)
    {
        $('.year').append($('<option />').val(i).html(i));
    }

    //Printing of Dental Log
    $('#printPatientList').parsley();
    $('#printPatientList').submit(function(){
      $('#patientListModal').modal('hide');

    });

    //Validation For Printing of Dental Log
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
    $('#mon').on('change', function(){
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

    //reset form on modal hide
    $('#logPatientModal').on('hidden.bs.modal', function () {
      $('#logPatientForm')[0].reset();
      $('#patientID').text(' ');
    });

    $('#patientListModal').on('hidden.bs.modal', function () {
      $('#printPatientList')[0].reset();
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