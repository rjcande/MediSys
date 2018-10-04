@extends('dchief.layout.dchief')

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
                <!-- Content -->
                  <button class="btn btn-default" data-toggle="modal" data-target="#logPatientModal" style="float:left; background-color:#00b894; border: 1px solid #ced6e0; border-radius: 20px; color: white">Log Patient</button>
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
                            <th class="column-title">Date </th>
                            <th class="column-title">Time In</th>
                            <th class="column-title">Time Out</th>
                            <th class="column-title"></th>
                        </tr>
                      </thead>

                      <tbody>
                        @php($ctr = 1)
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
                            @endif
                          </td>
                          <td class="">{{$attendingDentist['lastName']}}, {{$attendingDentist['firstName']}} {{$attendingDentist['middleName']}} {{$attendingDentist['quantifier']}}</td>
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
                              <button type='submit' class='btn btn-info' name='btnViewMore' title ='View More Info'>
                                <i class='fa fa-angle-double-right'></i>
                              </button>
                            </a>
                            @if($dentalLog->concern == 1)                                
                              <button type='submit' name='btnEdit' disabled id="btnEdit" class='btn btn-primary'><i class='fa fa-pencil'></i></button>
                            @elseif($dentalLog->concern == 0)
                              <a href="{{route('dchief.dentalLog.edit', $dentalLog->clinicLogID)}}">
                                <button type='submit' name='btnEdit' id="btnEdit" class='btn btn-primary'><i class='fa fa-pencil'></i></button>
                              </a>
                            @endif
                              <button name=btnDelete class='btn btn-danger delete-button' data-toggle="tooltip" title="Delete" data-id="{{$dentalLog->clinicLogID}}">
                                <i class='fa fa-trash'></i>
                              </button>
                          </td>
                        </tr>
                        @php($ctr++)
                        @endforeach
                      </tbody>
                    </table>
                    <a target="_blank" href="{{route('dchief.generate.dentalTable')}}">
                      <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                    </a>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Student/Faculty Number*: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientNumber" maxlength="17" name="patientNumber" data-parsley-pattern="[0-9]{4}-[0-9]{5}-[A-Za-z]{2}-[0-9]" required>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient Name*: </label>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Concern*: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" style="border-radius:8px;" required="required" id="concern" name="concern">
                <option value="" disabled selected>-SELECT CONCERN-</option>
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
    });

    $('#patientName').autocomplete({

      serviceUrl:'/dchief/dentalform/autocomplete/name',
      paramName: 'input',
      onSelect: function (suggestion) {
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
        url: '/dchief/log/timeOut/' + $(this).data('id'),
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

    $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false 
      });

  });

  //Reset form on page load
  $(window).bind("pageshow", function() {
    $('#logPatientForm')[0].reset();
  });
  
</script>

@endsection