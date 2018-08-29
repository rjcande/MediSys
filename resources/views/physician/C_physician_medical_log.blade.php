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

                                {{--  <a href="">
                                  <button class="btn btn-primary" data-toggle="tooltip" title="View More Info">
                                    <i class="fa fa-angle-double-right"></i>
                                  </button>
                                </a>  --}}

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

<div id="medicalLogMoreInfo" class="modal fade" role="dialog">
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
            <label class="control-label col-md-3 col-sm-3 col-xs-3">No.:<span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-9">
               <label class="control-label col-md-1 col-sm-3 col-xs-3">3</label>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient ID: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientID" required>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Patient Name: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="patientName" required>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Assisting Nurse: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" readonly>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" required="required" readonly value="{{ date('F d, Y') }}">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Time: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" required="required" readonly value="{{ date('h:i a') }}">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Concern: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select name="" style="border-radius:8px;" class="form-control" required>
                <option value="" disabled selected>Concern</option>
                <option value="1">Consultation</option>
                <option value="2">Letter/Certification</option>
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
  $(document).ready(function(){
    $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false
    });

  });

</script>
@endsection
