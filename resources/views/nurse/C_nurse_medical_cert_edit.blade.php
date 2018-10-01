@extends('nurse.layout.nurse')

@section('content')
	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left" style="width: 100%">
                <h3>{{ $clinicLogInfo->patientID }}, {{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</h3>
              </div>
              
            </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <!-- Content -->
                   
                     <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                          <h4 class="panel-title">Medical Certificates</h4>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
                          <div class="panel-body">
                            <!-- start accordion -->
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                              @if($logReferral['reqForMedCertEnrol'] == 1)
                              <div class="panel">
                                <a class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                  <h4 class="panel-title">Medical Certificate for Enrollment</h4>
                                </a>
                                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                  <div class="panel-body">
                                    <div style="float: left; width: 100%">
                                      <center>
                                        <header style="font-size: 15px;">Republic of the Philippines</header><br>
                                        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
                                        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header><br>
                                        <header style="font-size: 15px;">Sta. Mesa, Manila</header><br>
                                        <h1>MEDICAL CLEARANCE</h1>
                                      </center>
                                      <div style="width: 98%; border: 1px;">
                                        <header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;">Date: <u>{{ date('F d, Y') }}</u></header>
                                        <header style="font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>
                                        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px;">This is to certify that <u>{{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</u> has been examined by the undersigned and found to be physically fit at the time of examination.
                                        </header>
                                        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px;">
                                          This certification is issued upon the request for <u><strong>ENROLLMENT</strong></u>purpose.
                                        </header>
                                      </div>
                                     
                                      <div style="width:100%; text-align: right;">
                                        <div style="text-align: right; margin-left: 500px;">
                                          <header style="font-size: 18px; margin-top: 40px;"><u>{{ $attendingPhysician['firstName'] }} {{ $attendingPhysician['middleName'] }} {{ $attendingPhysician['lastName'] }} {{ $attendingPhysician['quantifier'] }}</u> M.D.</header>
                                          <header style="font-size: 18px;">Clinic Physician</header>   
                                          <header style="font-size: 18px; margin-top: 20px; text-align: right;"><u style="text-align: center; padding: 0 0 4px;">{{ $attendingPhysician['licenseNumber'] }}</u> Lic. No.</header>
                                        </div>
                                      </div>
                                    
                                    </div>

                                    <a href="{{ route('physician.generate.pdf.medical.cert.enrollment', [$logReferral['logReferralID'], $patientName]) }}" target="_blank"><button class="btn btn-primary"><i class="fa fa-print"></i> SAVE & PRINT</button></a>
                                  </div>
                                </div>
                              </div>
                              @endif

                              @if($logReferral['reqForMedCertOffOJT'] == 1)
                              <form id="certOffCampus" action="{{ route('physician.generate.pdf.medical.cert.ojt.off_campus', [$logReferral['logReferralID'], $patientName]) }}" method="get" data-parsley-errors-messages-disabled target="_blank">
                                @csrf()
                              <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingSeven" data-toggle="collapse" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                  <h4 class="panel-title">Medical Certificate for OJT or Off-Campus Activity</h4>
                                </a>
                                <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                                  <div class="panel-body">
                                    <div style="float: left; width: 100%">
                                      <center>
                                        <header style="font-size: 15px;">Republic of the Philippines</header><br>
                                        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
                                        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header><br>
                                        <header style="font-size: 15px;">Sta. Mesa, Manila</header><br>
                                        <h1>MEDICAL CLEARANCE</h1>
                                      </center>
                                      <div style="width: 98%">
                                        <header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;">Date: <u>{{ date('F d, Y') }}</u></header>
                                        <header style="font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>
                                        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This is to certify that <u>{{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</u> has been examined by the undersigned and found to be physically fit at the time of examination.</header>
                                        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This certification is issued upon request for <input type="text" name="certOffCampusPurpose" style="display: inline; width: 500px;" required> purpose.</header>

                                      </div>
                                     
                                      <div style="width:100%;text-align: right;">
                                        <div style="text-align: right; margin-left: 500px;">
                                          <header style="font-size: 18px; margin-top: 40px;"><u>{{ $attendingPhysician['firstName'] }} {{ $attendingPhysician['middleName'] }} {{ $attendingPhysician['lastName'] }} {{ $attendingPhysician['quantifier'] }}</u> M.D.</header>
                                          <header style="font-size: 18px;">Clinic Physician</header>   
                                          <header style="font-size: 18px; margin-top: 20px; text-align: right;"><u style="text-align: center; padding: 0 0 4px;">{{ $attendingPhysician['licenseNumber'] }}</u> Lic. No.</header>
                                        </div>
                                      </div>
                                    
                                    </div>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> SAVE & PRINT</button>
                                  </div>
                                </div>
                              </div>
                              </form>
                              @endif

                              @if($logReferral['reqForMedCertAdminFaculty'] == 1)
                              <form id="certAdmin" action="{{ route('physician.generate.pdf.medical.cert.admin', [$logReferral['logReferralID'], $patientName]) }}" method="get" data-parsley-errors-messages-disabled target="_blank">
                              <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingEight" data-toggle="collapse" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                  <h4 class="panel-title">Medical Certificate for Administrative or Faculty</h4>
                                </a>
                                <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                                  <div class="panel-body">
                                     <div style="float: left; width: 100%">
                                      <center>
                                        <header style="font-size: 15px;">Republic of the Philippines</header><br>
                                        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
                                        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header><br>
                                        <header style="font-size: 15px;">Sta. Mesa, Manila</header><br>
                                        <h1>MEDICAL CLEARANCE</h1>
                                      </center>
                                      <div style="width: 100%">
                                        <header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;">Date: <u>{{ date('F d, Y') }}</u></header>
                                        <header style="font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>
                                        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This is to certify that <u>{{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</u> has been examined by the undersigned at the PUP Medical Clinic on <input type="text" name="certAdminPurpose" style="display: inline; width: 370px;" required="">.</header>
                                        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This certification is issued upon request for <em><strong>Annual Medical Clearance</strong></em> but not for medico-legal purposes.</header>
                                      </div>
                                     
                                      <div style="width:100%;text-align: right;">
                                        <div style="text-align: right;">
                                          <header style="font-size: 18px; margin-top: 40px;"><u>{{ $attendingPhysician['firstName'] }} {{ $attendingPhysician['middleName'] }} {{ $attendingPhysician['lastName'] }} {{ $attendingPhysician['quantifier'] }}</u> M.D.</header>
                                          <header style="font-size: 18px;">Clinic Physician</header>   
                                          <header style="font-size: 18px; margin-top: 20px; text-align: right;"><u style="text-align: center; padding: 0 0 4px;">{{ $attendingPhysician['licenseNumber'] }}</u> Lic. No.</header>
                                        </div>
                                      </div>
                                    
                                    </div>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> SAVE & PRINT</button>
                                  </div>
                                </div>
                              </div>
                              </form>
                              @endif

                              @if($logReferral['reqForExcuseLetter'] == 1)
                              <form id="excuseLetter" action="{{ route('physician.generate.pdf.excuse.letter', [$logReferral['logReferralID'], $patientName]) }}" method="get" data-parsley-errors-messages-disabled target="_blank">
                              <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingNine" data-toggle="collapse" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                  <h4 class="panel-title">Excuse Letter for Student</h4>
                                </a>
                                <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                                  <div class="panel-body">
                                    <div style="float: left; width: 100%">
                                      <center>
                                        <header style="font-size: 15px;">Republic of the Philippines</header><br>
                                        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
                                        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header><br>
                                        <header style="font-size: 15px;">Sta. Mesa, Manila</header><br>
                                        <h1>EXCUSE FORM</h1>
                                      </center>
                                      <div style="width: 100%">
                                        <header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;">Date: <u>{{ date('F d, Y') }}</u></header>
                                        <header style="font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>
                                        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This is to certify that <u>{{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</u> has been treated/is currently being treated for <input type="text" name="excuseReason" style="width: 200px;" required> from <input type="text" name="excuseFrom" required> to <input type="text" name="excuseTo" required>.</header>
                                        <header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This certification is issued upon request for <input type="text" name="excusePurpose" style="width: 300px;" required> purpose.</header>
                                      </div>
                                     
                                      <div style="width:100%;text-align: right;">
                                        <div style="text-align: right; margin-left: 500px;">
                                          <header style="font-size: 18px; margin-top: 150px;"><u>{{ $attendingPhysician['firstName'] }} {{ $attendingPhysician['middleName'] }} {{ $attendingPhysician['lastName'] }} {{ $attendingPhysician['quantifier'] }}</u> M.D.</header>
                                          <header style="font-size: 18px;">Clinic Physician</header>   
                                          
                                        </div>
                                      </div>
                                    
                                    </div>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> SAVE & PRINT</button>
                                  </div>
                                </div>
                              </div>
                              </form>
                              @endif

                              @if($logReferral['reqForWaver'] == 1)
                              <form id="waver" action="{{ route('physician.generate.pdf.waver', [$logReferral['logReferralID'], $patientName]) }}" method="get" data-parsley-errors-messages-disabled target="_blank">
                              <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingTen" data-toggle="collapse" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                  <h4 class="panel-title">Waiver</h4>
                                </a>
                                <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
                                  <div class="panel-body">
                                     <div style="float: left; width: 100%">
                                      <center>
                                        <header style="font-size: 15px;">Republic of the Philippines</header><br>
                                        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
                                        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header><br>
                                        <header style="font-size: 15px;">Sta. Mesa, Manila</header><br>
                                        <h1>MEDICAL CLEARANCE</h1>
                                      </center>
                                      <div style="width: 100%">
                                        <header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;">Date: <u>{{ date('F d, Y') }}</u></header>
                                        <header style="font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>
                                        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">I, <u>{{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</u> enrolled at the College of <input type="text" name="college" required> Department of <input type="text" name="department" required>, was seen and examined at the PUP Medical Clinic dated <u>{{ date('F m, Y') }}</u> with the diagnosis of <input type="text" name="diagnosis" required>. I promise to come back for a follow-up check-up on <input type="date" name="followUp" required> as advised.</header>
                                      </div>
                                     
                                      <div style="width:100%;float: right">
                                        <div style="text-align: center; margin-left: 500px; float: right;">
                                         <header style="font-size: 18px; margin-top: 40px; text-align: right;margin-right: 10px;">_______________________________</header>
                                         <header style="font-size: 18px;">Signature</header>
                                          
                                        </div>
                                      </div>
                                    
                                    </div>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> SAVE & PRINT</button>
                                  </div>
                                </div>
                              </div>
                              </form>
                              @endif
                            </div>
                            <!-- end of accordion -->
       
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->
                    <a href="{{ url('nurse/medical/log') }}" title="">
                      <button type="button" class="btn btn-primary" style="float: right; margin-top: 20px;">BACK</button>
                    </a>
                    <!-- /Content -->
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
<!-- Messagees -->
@if(Session::get('message'))
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


<script>
  $(document).ready(function(){
    //bind forms for validation
    $('#certOffCampus').parsley();
    $('#certAdmin').parsley();
    $('#excuseLetter').parsley();
    $('#waver').parsley();


  });
</script>
@endsection