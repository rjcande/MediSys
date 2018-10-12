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
                            <th class="column-title">Assisting Nurse </th>
                            <th class="column-title">Concern</th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Time </th>
                            <th class="column-title" style="width: 70px;">Response </th>
                            <th class="column-title no-link last" style="width: 70px;"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @php($ctr = sizeof($referrals))
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
                              <td class=" ">
                                @if($referral->concern == 0)
                                    {{ "Consultation" }}
                                @elseif($referral->concern == 1)
                                    {{ "Letter/Certification" }}
                                @endif
                              </td>
                              <td class=" ">{{ date('F d, Y', strtotime($referral->clinicLogDateTime)) }}</td>
                              <td class=" ">{{ date('h:i a', strtotime($referral->clinicLogDateTime)) }}</td>
                              <td class=" ">
                                @if($referral->logReferralStatus == 1 && $referral->concern == 0)
                                  <a href="{{ route('mchief.consult.diagnosis',[ 'id' => $referral->clinicLogID, 'patientID' => $referral->patientID]) }}">
                                    <button class="btn btn-success">
                                      <i class="fa fa-check"></i>
                                    </button>
                                  </a>

                                  <button class="btn btn-danger btn-delete" data-id="{{ $referral->logReferralID }}">
                                    <i class="fa fa-close"></i>
                                  </button>
                                @elseif($referral->logReferralStatus == 2 && $referral->concern == 0)
                                  {{ "TREATED" }}
                                @elseif($referral->logReferralStatus == 3)
                                  {{ "DENIED" }}
                                @elseif($referral->logReferralStatus == 2 && $referral->concern == 1)
                                  {{ "CERTIFICATE RELEASED" }}
                                @endif
                                @php($patientName = $referral->lastName.', '.$referral->firstName.' '.$referral->middleName.' '.$referral->quantifier)
                                @if($referral->concern == 1 && $referral->logReferralStatus == 1)
                                  <a href="{{ route('mchief.certification', ['patientName' => $patientName, 'patientID' => $referral->patientID, 'logReferralID' => $referral->logReferralID]) }}">
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
                                {{--  <button class="btn btn-info" data-toggle="tooltip" title="View More Info" id="btnViewMore">
                                  <i class="fa fa-angle-double-right"></i>
                                </button>  --}}
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                            @php($ctr--)
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
      table.column(5).search(date).draw();
      table.column(4).search(concern).draw();
   

    });

    $('#btnReset').click(function(){
      $('#filterConcern').val('');
      $('#filterYear').val('');
      $('#filterDays').val('');
      $('#filterMonth').val('');
      table.column(5).search('').draw();
      table.column(4).search('').draw();
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
            url: '/mchief/decline/referred/patient/' + $(this).data('id'),
            type: 'get',
            success:function(output){
              location.reload(true);
            }
          });
        }
      });
    });


    setInterval(function() {
      $.get('/mchief/last/referral/id', function(data){

        if ('{{ $lastReferralID['logReferralID'] }}' < data['lastReferralID'].logReferralID) {
            location.reload(true);
        }
      });
    }, 2000);

  });

</script>
@endsection
