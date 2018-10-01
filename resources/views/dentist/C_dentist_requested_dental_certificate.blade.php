@extends('dentist.layout.dentist')

@section('content')

	    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Dental Certificate</h3>
            </div>
          </div>

            <div class="clearfix"></div>

          <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                  <!-- Content -->
                  <div class="modal-body" id="">
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
                      <input style="width: 63%" type="text" name="certDate" readonly value="{{date("F d, Y", strtotime($treatment['created_at']))}}">
                    </div>
                    <div style="font-size: 18px; font-family: Arial; margin-left: 5%;">
                      <br><br>
                      <p>To Whom it may Concern:</p>
                      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThis is to certify that Mr./Ms. <input type="text" readonly value="{{Session::get('patientInfo.patientName')}}" style="width: 70%" name="certPatientName"></p>
                      <p>Has Undergone:
                        <input style="margin-left: 10.5%" type="checkbox" value="1" readonly name="certDentalExam"
                        @if($treatment['dentalExamination'] == 1)
                        {{"checked"}}
                        @endif>
                        <label>&nbsp Dental Examination</label>
                        <input style="margin-left: 20%" type="checkbox" value="1" readonly name="certOralProphylaxis"
                        @if($treatment['oralProphylaxis'] == 1)
                        {{"checked"}}
                        @endif>
                        <label>&nbsp Oral Prophylaxis</label>
                        <div>
                          <input style="margin-left: 22.5%" type="checkbox" value="1" readonly name="certRestorationChk"
                          @if($treatment['restoration'] == 1)
                          {{"checked"}}
                          @endif>
                          <label>&nbsp Restoration &nbsp<input type="text" style="width:67%" value="{{$treatment['restorationTooth']}}" name="certRestorationTxt"></label>
                          <input style="margin-left: 3%" type="checkbox" readonly value="1" name="certExtractionChk"
                          @if($treatment['extraction'] == 1)
                          {{"checked"}}
                          @endif>
                          <label>&nbsp Extraction &nbsp <input type="text" style="width:67%" placeholder="Tooth Number" value="{{$treatment['extractionTooth']}}" name="certExtractionTxt"></label>
                        </div>
                        <div>
                          <input style="margin-left: 22.5%" type="checkbox" readonly value="1" name="certOthersChk"
                          @if($treatment['othersTreatment'] == 1)
                          {{"checked"}}
                          @endif>
                        <label>&nbsp Others: &nbsp</label><textarea style="width: 62%; height: 90px" name="certOthersTextArea">{{$treatment['treatmentDescription']}}</textarea>
                        </div>
                      </p>
                      <p>Recommendation/s:</p>
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea style=";width: 90%; height: 100px" name="certRecommendations">{{$treatment['recommendations']}}</textarea>
                      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <em>This certification is being issued upon request of the above-named patient for whatever purpose it may <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp serve except medico-legal standards</em></p>
                      <br>
                      @foreach($patientDentalLogs as $dentalLog)
                        <input style="width: 27%; margin-left: 60%" name="certDentistSigned" value="{{$dentalLog->firstName}}, {{$dentalLog->middleName}} {{$dentalLog->lastName}}" readonly type="text">
                      @endforeach
                      <label>D.M.D</label>
                    </div>
            
                  </div>

                  <a href="javascript:history.go(-1)"><button type="button" class="btn btn-primary">BACK</button></a>
                  
                    
                  <!-- /Content -->
                </div>
              </div>
            </div>
            <!-- /form input mask -->  
          </div>
        </div>
      </div>

@endsection