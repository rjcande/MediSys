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
                                @elseif($clinicLog->concern == 2)
                                  {{ "Dental" }}
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
                                  <button class="btn btn-success" name="time_out" data-id="{{ $clinicLog->clinicLogID }}">
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
          <a href="{{ url('/nurseMedicalLog') }}"><button class="btn btn-success">DONE</button>
        </div>
            </div>
        </div>
  </div>
    <!--END Modal-->

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
@if(Session::has('passToDental'))
  <script>
    $(document).ready(function(){
      swal({
        title: 'SUCCESS',
        text: '{{ Session::get('passToDental') }}',
        icon: 'success'
      });
    });
  </script>
@endif

<script>
  $(document).ready(function(){
    var table = $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": 't' 
    });

    $('#search').keyup(function(){
      table.search($(this).val()).draw();
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
          text: "Once deleted, you will not be able to .......!",
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
    $('button[name=time_out]').on('click', function(e){
        e.preventDefault();

        $.ajax({
          url: "/nurse/set/timeout/" + $(this).data('id'),
          type: "get",
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
    })
    
  });
  
  //Reset form on page load
  $(window).bind("pageshow", function() {
    $('#logPatientForm')[0].reset();
  });
</script>
@endsection