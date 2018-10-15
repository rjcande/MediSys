@extends('dentalchief.layout.dentalchief')

@section('content')

      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Dental Log</h3>
            </div>
          </div>

            <div class="clearfix"></div>

          <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  {{-- <h2>{{date('F, Y')}}</h2> --}}
                  <button class="btn btn-round btn-success" data-toggle="modal" data-target="#logPatientModal" style="float:left">Log Patient</button>
                    <div style="float: right;">
                      
                      <div class="col-md-2 col-sm-12 col-xs-12" style="width: 70px; float: right">
                        <button class="btn btn-round btn-default" data-toggle="modal" data-target="#modalFilter"><i class="fa fa-filter"></i>Filter</button>
                      </div>
  
                      <div class="col-md-2 col-sm-12 col-xs-12" style="width: 350px; float: right;">
                        <input type="text" placeholder="Search" id="search" class="form-control" style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                      </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              <div class="x_content">
                <!-- Content -->
                  {{-- <button class="btn btn-round btn-success" data-toggle="modal" data-target="#logPatientModal" style="float:left">Log Patient</button> --}}
                    <div style="float:left; width:100%;padding:5px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white; margin-top: 15px;">
                    <h2 class="" style=" color: #273c75"><strong>{{date('F, Y')}}</strong></h2>
                    <table class="table table-striped table-bordered jambo_table bulk_action" style="width:100%" id="patientTable">
                      <thead>
                        <tr class="headings">
                            <th class="column-title"></th>
                            <th class="column-title">No </th>
                            <th class="column-title">Patient ID </th>
                            <th class="column-title">Patient Name </th>
                            <th class="column-title">Type </th>
                            <th class="column-title">Attending Dentist </th>
                            <th class="column-title">Concern</th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Time In</th>
                            <th class="column-title">Time Out</th>
                            <th class="column-title">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php($ctr = sizeof($dentalLogs))
                        {{ Session::put('number', $ctr)}}
                        @foreach ($dentalLogs as $dentalLog)
                        <tr class="even pointer">
                          <td class="a-center">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">{{$ctr}}</td>
                          <td class=" ">{{$dentalLog->patientID}}</td>
                          <td class=" ">{{$dentalLog->firstName}} {{$dentalLog->middleName}} {{$dentalLog->lastName}} {{$dentalLog->quantifier}}</td>
                          <td class=" ">
                            @if($dentalLog->patientType == 1)
                            {{
                                'Student'
                            }}
                            @elseif($dentalLog->patientType == 2)
                            {{
                                'Faculty/College'
                            }}
                            @elseif($dentalLog->patientType == 3)
                            {{
                                'Admin/Dept'
                            }}
                            @elseif($dentalLog->patientType == 4)
                            {{
                                'Visitor'
                            }}
                            @endif
                          </td>
                          <td class="">
                            @foreach($attendingDentist as $dentist)
                              @if($dentalLog->clinicLogID == $dentist->clinicLogID)
                                {{$dentist->lastName}}, {{$dentist->firstName}} {{$dentist->middleName}} {{$dentist->quantifier}}
                              @endif
                            @endforeach
                          </td>{{-- <td class="">{{$attendingDentist['id']}}</td> --}}
                          <td class="">
                            @if($dentalLog->concern == 0)
                            {{'Consultation'}}
                            @elseif($dentalLog->concern == 1)
                            {{'Certification'}}
                            @endif  
                          </td>
                          <td class=" ">{{ date("F d, Y", strtotime($dentalLog->clinicLogDateTime)) }}</td>
                          <td class=" ">{{ date("h:i a", strtotime($dentalLog->clinicLogDateTime)) }}</td>
                          <td class=" ">
                            @if(empty($dentalLog->timeOut))
                              <button class="btn btn-success" id="time_out" name="time_out" data-id="{{$dentalLog->clinicLogID}}">
                                <i class="fa fa-check"></i>
                              </button>
                            @else
                              {{ date("h:i a", strtotime($dentalLog->timeOut))}}
                            @endif
                          </td>
                          <td class=" ">
                            <a href="{{ route('dchief.dentalLog.moreInfo', $dentalLog->clinicLogID) }}">
                              <button type='submit' class='btn btn-info' name='btnViewMore' id="btnViewMore" title ='View More Info'>
                                <i class='fa fa-angle-double-right'></i>
                              </button>
                            </a>
                              {{-- @if($dentalLog->concern == 1)                                
                                <button type='submit' name='btnEdit' disabled id="btnEdit" class='btn btn-primary'><i class='fa fa-pencil'></i></button>
                              @elseif($dentalLog->concern == 0)
                                <a href="{{route('dchief.dentalLog.edit', $dentalLog->clinicLogID)}}">
                                  <button type='submit' name='btnEdit' id="btnEdit" class='btn btn-primary'><i class='fa fa-pencil'></i></button>
                                </a>
                              @endif --}}
                              <button name=btnDelete class='btn btn-danger delete-button' data-toggle="tooltip" title="Delete" data-id="{{$dentalLog->clinicLogID}}">
                                <i class='fa fa-trash'></i>
                              </button>
                          </td>
                        </tr>
                        @php($ctr--)
                        @endforeach
                      </tbody>
                    </table>
                    {{-- <a target="_blank" href="{{route('dentist.generate.dentalTable')}}"> --}}
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dentalTableModal"><i class="fa fa-print"></i> Print Dental Log Table</button>
                    {{-- </a> --}}
                    </div>
                <!--Content --> 
              </div name="x_content">
              </div name="x_panel">
            </div>
            <!-- /form input mask -->  
          </div>
        </div>
      </div>
  
<!------------------------------------------------------------- LOG PATIENT MODAL---------------------------------------------------------------------->
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
              <label class="control-label col-md-1 col-sm-3 col-xs-3" id="patientID"></label>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Student/Faculty Number: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientNumber" maxlength="17" name="patientNumber" data-parsley-pattern="[0-9]{4}-[0-9]{5}-[A-Za-z]{2}-[0-9]" required data-parsley-group="patientNumber">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient Name: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientName" required name="patientName" placeholder="Last Name, First Name Middle Name">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Assisting Dentist: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" name="attendingDentist" value="{{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.lastName') }} {{ Session::get('accountInfo.quantifier') }}" readonly>
            </div>
          </div>

          <!-- KUNG KUKUNIN PA RIN BY LOGGED ACCOUNT SI DENTIST WITHOUT DISPLAYING THE NAME-->

         <!--  <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ Session::get('accountInfo.lastName') }}, {{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.quantifier') }}"> -->

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" required="required" name="date" readonly value="{{ date('Y/m/d') }}">
            </div>
          </div>


          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Time: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" required="required" name="time" readonly value="{{ date('h:i a') }}">
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

          <input type="hidden" name="patientID" value="">

          <!-- SA SUSUNOD NA PAGCOCODE AYUSIN NA YUNG UI, YUNG DATE, TIME, AT YUNG PAGKUHA NG DENTIST IS DAPAT NAKAHIDDEN NA. -->
      
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
<!-------------------------------------------------------------/LOG PATIENT MODAL---------------------------------------------------------------------->


<!-------------------------------------------------------------GENERATE DENTAL TABLE MODAL---------------------------------------------------------------------->
<div class="modal fade" id="dentalTableModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Print Dental Log</h4>
        </div>
        <form id="printDentalLog" action="{{route('dchief.generate.dentalTable')}}" target="_blank" method="get">
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
                  <select name="year" class="year" id="year" style="margin-left:15px ;width: 70%; border-radius: 8%" disabled data-parsley-errors-container="#error_container_year" data-parsley-error-message="Year is required">
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
<!-------------------------------------------------------------/GENERATE DENTAL TABLE MODAL---------------------------------------------------------------------->

<!-------------------------------------------------------------FILTER MODAL---------------------------------------------------------------------->
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
        <select style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;" id="filterDays">
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
        <label style="display: inline-block; width: 80px; margin-bottom:10px;">Concern
        </label>
        <select style="height: 32px; font-size:15px; border-radius: 12px; width: 170px;
            border: 1.5px solid gray;" id="filterConcern">
          <option value="" disabled selected></option>
          <option value="consultation">Consultation</option>
          <option value="letter/certification">Letter/Certificate</option>
        </select>
      </div>
    
      <div class="modal-footer" style="margin-right:0%">
        <button class="btn btn-primary" id="btnReset">Reset Filter</button>
        <button class="btn btn-success" id="btnDone" data-dismiss="modal">DONE</button>
      </div>

          </div>
      </div>
</div>



<!-------------------------------------------------------------/FILTER MODAL---------------------------------------------------------------------->

<script>
  $(document).ready(function(){
    
    //testing autocomplete
    var checkRecord;

    $('#patientNumber').autocomplete({
      serviceUrl:'/dchief/DentalForm/Autocomplete',
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

      onSearchComplete: function(input, suggestions){
        if(suggestions.length == 0 && input.length == 15){
          $('#logPatientForm').parsley().validate('patientNumber');

          if($('#logPatientForm').parsley().isValid('patientNumber')){
          
          checkRecord == 0
          $('#patientName').prop('required', false);
          $('#patientID').prop('required', false);
          swal({
            title: "No Record Found",
            text: "Record Not Found! Do you want to Create a record?",
            icon: "warning",
            buttons: true,
          })
          .then((willCreate)=>{
            if(willCreate){
              var hasRecord = {hasRecord: checkRecord};
              $.ajax({
                url: '/dchief/select/concern',
                type: 'get',
                data: $(this).serialize() + '&' + $.param(hasRecord),
                success: function(output){
                  if(output.redirect){
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

      serviceUrl:'/dchief/dentalform/autocomplete/name',
      paramName: 'input',
      onSelect: function (suggestion) {
        if(suggestion.number == ''){
          $('#patientNumber').prop('required', false);
        }
        $('#patientID').text(suggestion.id);
        $('#patientNumber').val(suggestion.number);
        $('input[name=patientID]').val(suggestion.id);
        checkRecord = 1;
      },
      autoSelectFirst: true,
      onSearchComplete: function (input, suggestions) {
        if(suggestions.length == 0){
            console.log('no suggestion');
            checkRecord = 0;
            $('#patientNumber').prop('required', false);
            $('#concern').prop('required', false);
           
        }
      }
    });

    //Log Patient Form Submit
    $('#logPatientForm').submit(function(e){
      e.preventDefault();
      if ($(this).parsley().isValid()) {
        var hasRecord = { hasRecord: checkRecord };
        $.ajax({
          url: '/dchief/select/concern',
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

		//End test
    
    $('#logPatientForm').parsley();

    //delete button is clicked
    $('#patientTable').on('click', '.delete-button',function(){
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
            url: '/dchief/delete/dental/log/' + $(this).data('id'),
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

    //if Time Out(check) button is Clicked
    $('#time_out').on('click', function(e){
      e.preventDefault();

      $.ajax({
        url: '/dental/log/timeOut/' + $(this).data('id'),
        type: 'get',
        success: function(output){
          swal({
            title: 'SUCCESS',
            text: 'Time Out Success',
            icon: "success",
          })
          .then((value)=>{
            location.reload(true);
          });
        }
      });
    });

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

    //Filtering of Data Table
    $('select').on('change', function(){
      var month = $('#filterMonth').val();
      var days = $('#filterDays').val();
      var year = $('#filterYear').val();
      var concern = $('#filterConcern').val();
      if (month == null) {
        month = ' ';
      }
      if (days == null) {
        days = ' ';
      }
      if (year == null) {
        year = ' ';
      }
      if (concern == null) {
        concern = ' ';
      }
      var date = month + ' ' + days + ' ' + year;

      table.column(8).search(date).draw();
      table.column(7).search(concern).draw();
   

    });

    $('#btnReset').click(function(){
      $('#filterConcern').val('');
      $('#filterYear').val('');
      $('#filterDays').val('');
      $('#filterMonth').val('');
      table.column(8).search('').draw();
      table.column(7).search('').draw();
    });

    //drop down of year
    for (i = new Date().getFullYear(); i > 1999; i--)
    {
        $('.year').append($('<option />').val(i).html(i));
    }

    //Printing of Dental Log
    $('#printDentalLog').parsley();
    $('#printDentalLog').submit(function(){
      $('#dentalTableModal').modal('hide');

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

    $('#dentalTableModal').on('hidden.bs.modal', function () {
      $('#printDentalLog')[0].reset();
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