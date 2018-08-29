@extends('dchief.layout.dentalchief')

@section('content')
	
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Personal Information</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                     <h2>Patient ID:</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <!--Content--> 
                  @if(count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        <li>{{$errors}}</li>
                      </ul>
                    </div>
                  @endif
                  <form id="addPatientForm" action="{{route('dchief.add.patient')}}" method="post">
                    @csrf
               		<div style="float:left; margin-left:25px; font-size:18px; width:500px; border:">
                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> Student/Faculty Number *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="studFacID" minlength="15" style="width:300px; border-radius:8px; margin-bottom:20px;margin-top: 10px;" data-parsley-pattern="[0-9]{4}-[0-9]{5}-[A-Za-z]{2}-[0-9]" value="{{ Session::get('patientInfo.patientNumber') }}">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> Last Name *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="lastName" style="width:300px; border-radius:8px; margin-bottom:12px;" value="" required>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> First Name *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="firstName" style="width:300px; border-radius:8px; margin-bottom:12px;" value="" required>
                      </div>
                      
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> Middle Name</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="middleName" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
                      </div>
                    </div>
                    
                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Name Extension</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="quantifer" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Nickname</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="nickname" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Address *</header>
                      </div>
                      <div style="float: left;">
                        <textarea name="address" style="width:300px; border-radius:8px; margin-bottom:12px;" required></textarea>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Religion</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="religion" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Occupation</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="occupation" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px; margin-bottom: 60px;"> Office No</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="officeNo" style="width:300px; border-radius:8px; margin-bottom:55px;" value="">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                         <header style="margin-bottom:15px; width: 150px;"> Dental Insurance</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="dentalInsurance" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 150px;"> Effective Date</header>
                      </div>
                      <div style="float: left;">
                        <input type="date" name="effectiveDate" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
                      </div>
                    </div>

                  </div>

                  <div style="float:left; margin-left:80px; font-size:18px; width:420px;">
                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Type *</header>
                      </div>
                      <div style="float: left;">
                        <select style="width:300px; border-radius:8px; margin-bottom:12px; height:30px;" name="patientType" required>
                          <option value="" disabled selected>Patient Type</option>
                          <option value="1">Student</option>
                          <option value="2">Faculty/College</option>
                          <option value="3">Admin/Dept.</option>
                          <option value="4">Visitor</option>
                        </select>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Birthday *</header>
                      </div>
                      <div style="float: left;">
                        <input type="date" id="birthDay" name="birthDay" style="width:300px; border-radius:8px; margin-bottom:12px;" value="" required >
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Age</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="age" id="age"  style="width:300px; border-radius:8px;" value=""readonly>
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px; margin-top: 13px;"> Gender *</header>
                      </div>
                      <div style="float: left;">
                        <p style="width: 300px;">
                          <input type="radio" name="gender" value="1" style="margin-top:20px; margin-bottom:25px; width:25px;" required>Male&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="gender" value="0" style="margin-top:20px; margin-bottom:25px; width:25px;">Female
                        </p>   
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Mobile No</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="mobileNo" style="width:300px; border-radius:8px; margin-bottom:12px;" value="" data-parsley-type="digits" data-parsley-minLength="11" data-parsley-maxLength="11">
                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Email Ad</header>
                      </div>
                      <div style="float: left;">
                        <input type="email" name="email" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">

                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Home No</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="homeNo" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">

                      </div>
                    </div>

                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Nationality *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="nationality" style="width:300px; border-radius:8px; margin-bottom:12px;" value="" required>
                      </div>
                    </div>
                    
                    <div>
                      <div style="float: left;">
                        <header style="width: 120px;"> Fax No</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="faxNo" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">

                      </div>
                    </div>

                  </div>
                  
                  <div style="float: left; margin-top: 50px; width: 100%">
                    <p style="font-size: 20px; color:white; background: linear-gradient(to right, #34495e, white); height:30px; border-radius:8px;">&nbsp<b><em>For Minors</em></b></p>
                    <br>
          
                    <div style="float:left; margin-left:25px; font-size:18px; width:500px;">
                      <div>
                        <div style="float: left;">
                          <header style="width: 200px;"> Parent/Guardian Name</header>
                        </div>
                        <div style="float: left;">
                          <input type="text" name="parentGuardianName" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
                        </div>
                      </div>

                      <div>
                        <div style="float: left;">
                          <header style="width: 200px;"> Contact Number</header>
                        </div>
                        <div style="float: left;">
                          <input type="text" name="parentGuardianContactNo" style="width:300px; border-radius:8px; margin-bottom:12px;" value="" data-parsley-minLength="11" data-parsley-maxLength="11">
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div style="float: left; text-align:center; width: 100%; margin-top:30px;">
                    <input type="submit" name="btnSave" class="btn btn-success" value="SAVE">
                    <a href="{{ url('/dchief/PatientList') }}"><button class="btn btn-primary" type="button" >BACK</button></a>
                  </div>
                  
                  </form>
                    <!--/Content-->
                  </div>
                </div>
              </div>
              <!-- /form input mask -->  

            </div>
          </div>
        </div>

<script>
  $(window).load(function(){

    $('#addPatientForm').parsley();

    // Getting the age from the birthday
    $('#birthDay').on("change", submitBirthDay);

    function submitBirthDay() {

      var birthDay = $('#birthDay').val();
      var Bday = +new Date(birthDay);
      var age = ((Date.now() - Bday) / (31557600000));
      $('#age').val(parseInt(age));

      if( $('#age').val() < 18 ){
        $('input[name=parentGuardianName]').prop('required', true);
        $('input[name=parentGuardianContactNo]').prop('required', true);

        $('input[name=parentGuardianName]').prop('disabled', false);
        $('input[name=parentGuardianContactNo]').prop('disabled', false);
      }
      else{
        $('input[name=parentGuardianName]').prop('required', false);
        $('input[name=parentGuardianContactNo]').prop('required', false);
        //disable 
        $('input[name=parentGuardianName]').prop('disabled', true);
        $('input[name=parentGuardianContactNo]').prop('disabled', true);

      }
      
  
    }

    //Get the patient type
    $('select[name=patientType]').on('change', function(){
      if ($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3) {
        
        $('input[name=studFacID]').prop('required', true);//make student/faculty number required

      }
      else if($(this).val() == 4){

         $('input[name=studFacID]').prop('required', false);

      }
    });

    //Capitalize First Name, Last Name, Middle Name, Quantifier
    $('input[name=lastName]').on('blur', function(){
      var lastName = $(this).val();
      $(this).val(toUpperName(lastName));

    });

    $('input[name=firstName]').on('blur', function(){
      var firstName = $(this).val();
      $(this).val( toUpperName(firstName));

    });

    $('input[name=middleName]').on('blur', function(){
      var middleName = $(this).val();
      $(this).val( toUpperName(middleName));

    });

    $('input[name=quantifer]').on('blur', function(){
      var quantifer = $(this).val();
      $(this).val( toUpperName(quantifer));
    });

    // $('input[name=patientNumber]').on('blur', function(){

    // });

    function toUpperName(str) {
       var splitStr = str.toLowerCase().split(' ');

       for (var i = 0; i < splitStr.length; i++) {
      
           splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
       }
       return splitStr.join(' '); 
      }

    //For Dental Insurance
    $('input[name=dentalInsurance]').on('blur', function(){
      if (!($('input[name=dentalInsurance]').val() === "")) {
        $('input[name=effectiveDate]').prop('required', true);
      }
      else{
        $('input[name=effectiveDate]').prop('required', false);
      }
    });

  });
  
</script>
@endsection