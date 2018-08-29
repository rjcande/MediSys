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
                            <th class="column-title">Assisting Nurse </th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Time </th>
                            <th class="column-title" style="width: 70px;">Response </th>
                            <th class="column-title no-link last" style="width: 70px;"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @php($ctr = 1)
                          @foreach($referrals as $referral)
                            <tr class="even pointer">
                              <td class=" ">
                                {{ $ctr }}
                              </td>
                              <td class=" ">
                                {{ $referral->lastName }}, {{ $referral->firstName }} {{ $referral->middleName }} {{ $referral->quantifier }}
                              </td>
                              <td class=" ">
                                @if($referral->patientType == 1)
                                  {{ "Student" }}
                                @elseif($referral->patientType == 2)
                                  {{ "Faculty/College" }}
                                @elseif($referral->patientType == 3)
                                  {{ "Admin/Dept" }}
                                 @elseif($referral->patientType == 4)
                                  {{ "Visitor" }}
                                @endif

                              </td>
                              <td class=" ">{{ $assistingNurse->lastName }}, {{ $assistingNurse->firstName }} {{ $assistingNurse->middleName }} {{ $assistingNurse->quantifier }}</td>
                              <td class=" ">{{ date('F d, Y', strtotime($referral->clinicLogDateTime)) }}</td>
                              <td class=" ">{{ date('h:i a', strtotime($referral->clinicLogDateTime)) }}</td>
                              <td class=" ">
                                @if($referral->logReferralStatus == 1 && $referral->concern == 0)
                                  <a href="{{ route('physician.consult.diagnosis',[ 'id' => $referral->clinicLogID, 'patientID' => $referral->patientID]) }}">
                                    <button class="btn btn-success">
                                      <i class="fa fa-check"></i>
                                    </button>
                                  </a>

                                  <button class="btn btn-danger btn-delete" data-id="{{ $referral->logReferralID }}">
                                    <i class="fa fa-close"></i>
                                  </button>
                                @elseif($referral->logReferralStatus == 2)
                                  {{ "ACCEPTED" }}
                                @elseif($referral->logReferralStatus == 3)
                                  {{ "DENIED" }}
                                @endif
                                @php($patientName = $referral->lastName.', '.$referral->firstName.' '.$referral->middleName.' '.$referral->quantifier)
                                @if($referral->concern == 1 && $referral->logReferralStatus == 1)
                                  <a href="{{ route('physician.certification', ['patientName' => $patientName, 'patientID' => $referral->patientID, 'logReferralID' => $referral->logReferralID]) }}">
                                    <button class="btn btn-success">
                                      <i class="fa fa-check"></i>
                                    </button>
                                  </a>

                                  <button class="btn btn-danger btn-delete" data-id="{{ $referral->logReferralID }}">
                                    <i class="fa fa-close"></i>
                                  </button>
                                @endif
                              </td>
                              <td class=" last">
                                <button class="btn btn-info" data-toggle="tooltip" title="View More Info" id="btnViewMore">
                                  <i class="fa fa-angle-double-right"></i>
                                </button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>  
                            @php($ctr++)
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
    $('#patientTable').dataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false });

    $('#btnViewMore').on('click', function(){
      $('#medicalLogMoreInfo').modal('show');
    });


    //on btn decline
    $(".btn-delete").on('click', function(){
      swal({
        title: "WARNING",
        text: "Are you sure you want to decline the referral?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDecline)=>{
        if (willDecline) {
          $.ajax({
            url: '/physician/decline/referred/patient/' + $(this).data('id'),
            type: 'get',
            success:function(output){
              location.reload(true);
            }
          });
        }
      });
    });


    setInterval(function() {
      $.get('/physician/last/referral/id', function(data){
      
        if ('{{ $lastReferralID['logReferralID'] }}' < data['lastReferralID'].logReferralID) {
            location.reload(true);
        }
      });
    }, 2000);

  });
  
</script>
@endsection