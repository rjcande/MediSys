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
                  <form action="{{route('dentist.save.letter.request')}}">
                    @csrf()
                  
                  <div id="request">
                    <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 95%;
                        background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Request for:</label>
                  </div><br>

                  <div style="float:left; margin-left:50px; font-size:18px; width:50%;">
                    <input type="checkbox" name="dentalCertChk" class="radio-past" style="margin-bottom:12px;" value="1" /><label style="margin-left: 5px;">Dental Certificate</label>
                    <button type="button" id="viewDocuBtn" style="margin-left: 45%; border-radius: 8px" disabled data-target="#dentalCertModal" data-toggle="modal">View Document</button>
                    <br>
                    <input type="hidden" name="patientID" value="{{ Session::get('patientInfo.patientID') }}">
                    <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('Y-m-d') }}" name="clinicLogDate">
                    <input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('h:i A') }}" name="clinicLogTime">
                    
                  </div>

                      <div style="margin-top: 25px;float: left;text-align: center;width: 100%">
                        <button type="submit" class="btn btn-success" id="btnSave" disabled>SAVE</button>
                      
                        <a href="{{url('/dentist/DentalLog')}}"><button type="button" class="btn btn-danger">CLOSE</button></a>
                      </div>
                        </form>
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
        <form method="get" id="dentalCertModalForm" target="_blank" action="{{route('dentist.dental.certification', ['patientID' => Session::get('patientInfo.patientID'), 'date' => Session::get('patientInfo.date')])}}">
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
          <input style="width: 63%" type="text" name="certDate" readonly value="{{Session::get('patientInfo.date')}}">
        </div>
        <div style="font-size: 18px; font-family: Arial; margin-left: 5%;">
          <br><br>
          <p>To Whom it may Concern:</p>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThis is to certify that Mr./Ms. <input type="text" readonly value="{{Session::get('patientInfo.patientName')}}" style="width: 70%" name="certPatientName"></p>
          <p>Has Undergone:
            <input style="margin-left: 10.5%" type="checkbox" value="1" name="certDentalExam">
            <label>&nbsp Dental Examination</label>
            <input style="margin-left: 20%" type="checkbox" value="1" name="certOralProphylaxis">
            <label>&nbsp Oral Prophylaxis</label>
            <div>
              <input style="margin-left: 22.5%" type="checkbox" value="1" name="certRestorationChk">
              <label>&nbsp Restoration &nbsp<input type="text" disabled style="width:67%" placeholder="Tooth Number" name="certRestorationTxt" id="certRestorationTxt"></label>
              <input style="margin-left: 3%" type="checkbox" value="1" name="certExtractionChk">
              <label>&nbsp Extraction &nbsp <input type="text" disabled style="width:67%" placeholder="Tooth Number" name="certExtractionTxt" id="certExtractionTxt"></label>
            </div>
            <div>
              <input style="margin-left: 22.5%" type="checkbox" value="1" name="certOthersChk">
              <label>&nbsp Others: &nbsp</label><textarea style="width: 62%; height: 90px" disabled name="certOthersTextArea" id="certOthersTextArea"></textarea>
            </div>
          </p>
          <p>Recommendation/s:</p>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea style=";width: 90%; height: 100px" name="certRecommendations"></textarea>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <em>This certification is being issued upon request of the above-named patient for whatever purpose it may <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp serve except medico-legal standards</em></p>
          <br>
          <input style="width: 27%; margin-left: 60%" readonly name="certDentistSigned" value="{{Session::get('accountInfo.lastName')}}, {{Session::get('accountInfo.firstName')}} {{Session::get('accountInfo.middleName')}} {{Session::get('accountInfo.quantifier')}}" type="text">
          <label>D.M.D</label>
        </div>

      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <center><button type="submit" class="btn btn-primary btnSubmit"><i class="fa fa-print"></i> SAVE AND PRINT</button></center>
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
      $('#btnSave').prop('disabled', false);
    }
    else{
      $('#viewDocuBtn').prop('disabled', true);
      $('#btnSave').prop('disabled', true);
    }
  });

  $('input[name=certRestorationChk]').change(function(){
    if(this.checked){
      $('#certRestorationTxt').prop('disabled', false);
    }
    else{
      $('#certRestorationTxt').prop('disabled', true);
      $('#certRestorationTxt').val('');
    }
  });

  $('input[name=certExtractionChk]').change(function(){
    if(this.checked){
      $('#certExtractionTxt').prop('disabled', false);
    }
    else{
      $('#certExtractionTxt').prop('disabled', true);
      $('#certExtractionTxt').val('');
    }
  });

  $('input[name=certOthersChk]').change(function(){
    if(this.checked){
      $('#certOthersTextArea').prop('disabled', false);
    }
    else{
      $('#certOthersTextArea').prop('disabled', true);
      $('#certOthersTextArea').val('');
    }
  });

  $('.btnSubmit').click(function(){
    $('#dentalCertModal').modal('hide');
    // $('#dentalCertModalForm')[0].reset();
  });


  $(".modal").on("hidden.bs.modal", function(){
    $('#dentalCertModalForm')[0].reset();
  });
});

</script>

@endsection