@extends('dentist.layout.dentist')

@section('content')

	    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Dental Certification</h3>
            </div>
          </div>

            <div class="clearfix"></div>

          <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <div>
                    <label class="col-md-10 col-sm-12 col-xs-12"><h4>{{ Session::get('patientInfo.patientID') }}, <em> {{  Session::get('patientInfo.patientName') }}</em></h4>
                    </label>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <!-- Content -->
              
                    @csrf()
                  
                  <div id="request">
                    <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 95%;
                        background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Request for:</label>
                  </div><br>

                  <div style="float:left; margin-left:50px; font-size:18px; width:50%;">
                    <input type="checkbox" name="dentalCertChk" class="radio-past" style="margin-bottom:12px;" value="1" /><label style="margin-left: 5px;">Dental Certificate</label>
                    <button id="viewDocuBtn" style="margin-left: 45%" disabled data-target="#dentalCertModal" data-toggle="modal">View Document</button>
                    <br>
                    <input type="checkbox" name="outsideReferChk" class="radio-past" style="margin-bottom:12px;" value="1" /><label style="margin-left: 5px;">Outside Referral Slip</label>
                    <button id="viewReferBtn" style="margin-left: 40%" data-target="#outsideReferModal" data-toggle="modal">View Document</button>
                    <input type="hidden" name="patientID" value="{{ Session::get('patientInfo.patientID') }}">
                    <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('Y-m-d') }}" name="clinicLogDate">
                    <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('h:i A') }}" name="clinicLogTime">
                    
                  </div>

                      <div style="margin-top: 25px;float: left;text-align: center;width: 100%">
                        <button class="btn btn-success">SAVE</button>
                        <a href="{{url('/dentist/DentalLog')}}"><button type="button" class="btn btn-danger">CLOSE</button></a>
                      </div>
                  <!-- /Content -->
                </div>
              </div>
            </div>
            <!-- /form input mask -->  
          </div>
        </div>
      </div>

<!-- MODAL DENTAL CERTIFICATE-->
<div id="dentalCertModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 80%; height: auto; color: black;">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body" id="">
        <form method="get" target="_blank" action="{{route('dental.certification', ['patientID' => Session::get('patientInfo.patientID'), 'date' => Session::get('patientInfo.date')])}}">
          @csrf
        <div style="font-family: Arial; font-size: 20px; /*border: 1px solid black;*/">
          <center>
            Republic of The Philippines<br>
            POLYTECHNIC UNIVERSITY OF THE PHILIPPINES<br>
            <b>DENTAL SERVICES</b>
            <br><br>
            <b>CERTIFICATION</b>
          </center>
        </div>
        <div style="margin-left: 75%; margin-top: 20px; font-family: Arial; font-size: 15px;">
          <label>Date: </label>
          <input style="width: 63%" type="text" name="certDate" value="{{Session::get('patientInfo.date')}}">
        </div>
        <div style="font-size: 18px; font-family: Arial; margin-left: 5%;">
          <br><br>
          <p>To Whom it may Concern:</p>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThis is to certify that Mr./Ms. <input type="text" value="{{Session::get('patientInfo.patientName')}}" style="width: 70%" name="certPatientName"></p>
          <p>Has Undergone:
            <input style="margin-left: 10.5%" type="checkbox" value="1" name="certDentalExam">
            <label>&nbsp Dental Examination</label>
            <input style="margin-left: 20%" type="checkbox" value="1" name="certOralProphylaxis">
            <label>&nbsp Oral Prophylaxis</label>
            <div>
              <input style="margin-left: 22.5%" type="checkbox" value="1" name="certRestorationChk">
              <label>&nbsp Restoration &nbsp<input type="text" style="width:67%" placeholder="Tooth Number" name="certRestorationTxt"></label>
              <input style="margin-left: 3%" type="checkbox" value="1" name="certExtractionChk">
              <label>&nbsp Extraction &nbsp <input type="text" style="width:67%" placeholder="Tooth Number" name="certExtractionTxt"></label>
            </div>
            <div>
              <input style="margin-left: 22.5%" type="checkbox" value="1" name="certOthersChk">
              <label>&nbsp Others: &nbsp</label><textarea style="width: 62%; height: 90px" name="certOthersTextArea"></textarea>
            </div>
          </p>
          <p>Recommendation/s:</p>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea style=";width: 90%; height: 100px" name="certRecommendations"></textarea>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <em>This certification is being issued upon request of the above-named patient for whatever purpose it may <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp serve except medico-legal standards</em></p>
          <br>
          <input style="width: 27%; margin-left: 60%" name="certDentistSigned" value="{{Session::get('accountInfo.lastName')}}, {{Session::get('accountInfo.firstName')}} {{Session::get('accountInfo.middleName')}} {{Session::get('accountInfo.quantifier')}}" type="text">
          <label>D.M.D</label>
        </div>

      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <center><input type="submit" class="btn btn-success"></center>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- /MODAL -->

<!-- MODAL OUTSIDE REFERRAL -->
<div id="outsideReferModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 50%; height: auto; color: black;">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body" id="">
        <form method="get" target="_blank" action="{{route('dental.certification', ['patientID' => Session::get('patientInfo.patientID'), 'date' => Session::get('patientInfo.date')])}}">
          @csrf
        <div style="font-family: Arial; font-size: 20px; /*border: 1px solid black;*/">
          <center>
            POLYTECHNIC UNIVERSITY OF THE PHILIPPINES<br>
            <b>DENTAL SERVICES</b><br>
            <em>STA. MESA, MANILA</em><br>
            <br>
            <b style="font-size: 30px ; ">REFERRAL SLIP</b>
          </center>
        </div>
        <div style="margin-left: 75%; margin-top: 20px; font-family: Arial; font-size: 15px;">
          <label>Date: </label>
          <input style="width: 63%" type="text" name="certDate" value="{{Session::get('patientInfo.date')}}">
        </div>
        <div style="font-size: 18px; font-family: Arial; margin-left: 5%;">
          <br><br>
          <p>TO: <input type="text" name="addressedDentist"></p>
          <p>Remark/s:</p>
          &nbsp&nbsp&nbsp&nbsp<textarea style=";width: 90%; height: 200px" name="remarks"></textarea>
          <br><br><br><br>
          <input style="width: 42%; margin-left: 54%" name="certDentistSigned" value="{{Session::get('accountInfo.lastName')}}, {{Session::get('accountInfo.firstName')}} {{Session::get('accountInfo.middleName')}} {{Session::get('accountInfo.quantifier')}}" type="text">
          <br>
          <label style="width: 35%; margin-left: 63%;">Referring Dentist</label><br><br>
          <div style="width: 50%; float: right; margin-right: 29px">
            <input type="text" style="float:right; width: 50%" name="licenseNumber" value="{{Session::get('accountInfo.licenseNumber')}}">
            <label style="width: 35%; float: right">License No.:</label>
          </div>
        </div><br><br><br>
        <div style="font-size: 18px; font-family: Arial; margin-left: 5%;">
          <input type="text" style="width: 40%" name="patientName" id="patientName" value="{{Session::get('patientInfo.patientName')}}"><br>
          <label>&emsp;&emsp;&emsp;Name of Patient</label>
        </div>

      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <center><input type="submit" class="btn btn-success"></center>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- /MODAL -->

<script>
$(document).ready(function(){
  $('input[name=dentalCertChk]').change(function(){
    if(this.checked){
      $('#viewDocuBtn').prop('disabled', false);
    }
    else{
      $('#viewDocuBtn').prop('disabled', true);
    }
  });

  $('input[name=outsideReferChk]').change(function(){
    if(this.checked){
      $('#viewReferBtn').prop('disabled', false);
    }
    else{
      $('#viewReferBtn').prop('disabled', true);
    }
  });
});

</script>

@endsection