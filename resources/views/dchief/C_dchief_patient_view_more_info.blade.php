@extends('dentalchief.layout.dentalchief')

@section('content')

	    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Patient Personal Info</h3>
            </div>
          </div>

            <div class="clearfix"></div>

          <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Patient ID: {{$patientInfo->patientID}}</h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                  <!-- Content -->
                <!-- LEFT INPUT FIELDS -->
                  <div style="float:left; margin-left:25px; font-size:18px; width:500px; border:">
                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> Student/Faculty Number *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="studFacID" style="width:300px; border-radius:8px; margin-bottom:20px;margin-top: 10px;" data-parsley-pattern="[0-9]{4}-[0-9]{5}-[A-Za-z]{2}-[0-9]" value="{{ $patientInfo->patientNumber }}">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> Last Name *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="lastName" style="width:300px; border-radius:8px; margin-bottom:12px;" 
                        value="{{ $patientInfo->lastName }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> First Name *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="firstName" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->firstName }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> Middle Name</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="middleName" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->middleName }}" readonly>
                      </div>
                    </div>
                    
                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Name Extension</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="extension" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->quantifier }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Nickname</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="nickname" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->nickname }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Address *</header>
                      </div>
                      <div style="float: left;">
                        <textarea name="address" style="width:300px; border-radius:8px; margin-bottom:12px;" readonly>{{ $patientInfo->address }}</textarea>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Religion</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="religion" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->religion }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Occupation</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="occupation" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->occupation }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px; margin-bottom: 60px;"> Office No</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="officeNo" style="width:300px; border-radius:8px; margin-bottom:55px;" value="{{ $patientInfo->officeNo }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                         <header style="margin-bottom:15px; width: 150px;"> Dental Insurance</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="dentalInsurance" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->dentalIns }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Effective Date</header>
                      </div>
                      <div style="float: left;">
                        <input type="date" name="effectiveDate" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->effectDate }}" readonly>
                      </div>
                    </div>

                  </div>

                  <!-- RIGHT INPUT FIELDS -->
                  <div style="float:left; margin-left:80px; font-size:18px; width:420px;">
                    
                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Type *</header>
                      </div>
                      <div style="float: left;">
                        <select style="width:300px; border-radius:8px; margin-bottom:12px; height:30px;" name="patientType" required disabled>
                          <option value="" disabled selected>Patient Type</option>
                          <option value="1" 
                            @if($patientInfo->patientType == 1)
                              {{ "selected" }}
                            @endif>Student</option>
                          <option value="2"
                            @if($patientInfo->patientType == 2)
                              {{ "selected" }}
                            @endif
                          >Faculty/College</option>
                          <option value="3"
                            @if($patientInfo->patientType == 3)
                              {{ "selected" }}
                            @endif
                          >Admin/Dept.</option>
                        </select>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Birthday *</header>
                      </div>
                      <div style="float: left;">
                        <input type="date" id="birthDay" name="birthDay" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->birthDate }}" required readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Age</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="age" id="age"  style="width:300px; border-radius:8px;" value="{{ $patientInfo->age }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px; margin-top: 13px;"> Gender *</header>
                      </div>
                      <div style="float: left;">
                        <input type="radio" name="gender" value="1" disabled style="margin-top:20px; margin-bottom:25px; width:25px;" 
                          @if($patientInfo->gender == 'M' || $patientInfo->gender == 'm' || $patientInfo->gender == '1')
                            {{ "checked" }}
                          @endif
                        >Male&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="gender" value="0" disabled style="margin-top:20px; margin-bottom:25px; width:25px;"
                          @if($patientInfo->gender == 'F' || $patientInfo->gender == 'f' || $patientInfo->gender == '0')
                            {{ "checked" }}
                          @endif
                        >Female
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Mobile No</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="mobileNo" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->mobileNo }}" data-parsley-type="digits" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Email Address</header>
                      </div>
                      <div style="float: left;">
                        <input type="email" name="email" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->emailAdd }}" readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Home No</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="homeNo" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->homeNo }}" readonly>

                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Nationality *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="nationality" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->nationality }}" readonly>
                      </div>
                    </div>
                    
                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Fax No</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="faxNo" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->faxNo }}" readonly>
                      </div>
                    </div>

                  </div>
                
                <!-- LOWER DIV -->
                  <div style="float: left; margin-top: 50px; width: 100%">
                    <p style="font-size: 20px; color:white; background: linear-gradient(to right, #34495e, white); height:30px; border-radius:8px;">&nbsp<b><em>For Minors</em></b></p>
                    <br>
                    <div style="float:left; margin-left:25px; font-size:18px; width:500px;">
                      <div>
                        <div style="float: left;">
                          <header style="width: 200px;"> Parent/Guardian Name</header>
                        </div>
                        <div style="float: left;">
                          <input type="text" name="parentGuardianName" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->guardianName }}" readonly>
                        </div>
                      </div>

                      <div>
                        <div style="float: left;">
                          <header style="width: 200px;"> Contact Number</header>
                        </div>
                        <div style="float: left;">
                          <input type="text" name="parentGuardianContactNo" style="width:300px; border-radius:8px; margin-bottom:12px;" value="{{ $patientInfo->guardianContact }}" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- BUTTON DIV -->
                  <div style="float: left; text-align:center; width: 100%; margin-top:30px;">
                    <a href="{{ url('/dchief/PatientList') }}">
                      <button class="btn btn-primary">BACK</button>
                    </a>
                    <a href="{{ route('dchief.consultation.to.all.dentists', $patientInfo->patientID) }}">
                      <button class="btn btn-warning" type="button" >LOGS</button>
                    </a>
                  </div>
                  <!-- /Content -->
                </div>
              </div>
            </div>
            <!-- /form input mask -->  
          </div>
        </div>
      </div>

@endsection