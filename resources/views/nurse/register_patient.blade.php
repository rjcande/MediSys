@extends('nurse.layout.nurse')

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
                  <form id="addPatientForm" action="{{route('nurse.add.patient')}}" method="post">
                    @csrf
               		<div style="float:left; margin-left:25px; font-size:18px; width:500px; border:">
                    <div>
                      <div style="float: left;">
                        <header style="width: 150px"> Student/Faculty Number *</header>
                      </div>
                      <div style="float: left;">
                        <input type="text" name="studFacID" style="width:300px; border-radius:8px; margin-bottom:20px;margin-top: 10px;" data-parsley-pattern="[0-9]{4}-[0-9]{5}-[A-Za-z]{2}-[0-9]" value="{{ Session::get('patientNumber') }}">
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
                        <input type="text" name="extension" style="width:300px; border-radius:8px; margin-bottom:12px;" value="">
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
                        <input type="date" id="birthDay" max="{{ date('Y-m-d') }}" min="{{ date('Y-m-d', 0) }}" name="birthDay" style="width:300px; border-radius:8px; margin-bottom:12px;" value="" required >
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
                        <label >+63</label>
                        <input type="text" name="mobileNo" style="width:264px; border-radius:8px; margin-bottom:12px;" value="" data-parsley-type="digits" data-parsley-minLength="10" data-parsley-maxLength="10" pattern="^[9]\d{9}">
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
                        <select name="nationality" style="width:300px; border-radius:8px; margin-bottom:12px; height:30px;" required>
                          <option value=""></option>
                          <option value="afghan">Afghan</option>
                          <option value="albanian">Albanian</option>
                          <option value="algerian">Algerian</option>
                          <option value="american">American</option>
                          <option value="andorran">Andorran</option>
                          <option value="angolan">Angolan</option>
                          <option value="antiguans">Antiguans</option>
                          <option value="argentinean">Argentinean</option>
                          <option value="armenian">Armenian</option>
                          <option value="australian">Australian</option>
                          <option value="austrian">Austrian</option>
                          <option value="azerbaijani">Azerbaijani</option>
                          <option value="bahamian">Bahamian</option>
                          <option value="bahraini">Bahraini</option>
                          <option value="bangladeshi">Bangladeshi</option>
                          <option value="barbadian">Barbadian</option>
                          <option value="barbudans">Barbudans</option>
                          <option value="batswana">Batswana</option>
                          <option value="belarusian">Belarusian</option>
                          <option value="belgian">Belgian</option>
                          <option value="belizean">Belizean</option>
                          <option value="beninese">Beninese</option>
                          <option value="bhutanese">Bhutanese</option>
                          <option value="bolivian">Bolivian</option>
                          <option value="bosnian">Bosnian</option>
                          <option value="brazilian">Brazilian</option>
                          <option value="british">British</option>
                          <option value="bruneian">Bruneian</option>
                          <option value="bulgarian">Bulgarian</option>
                          <option value="burkinabe">Burkinabe</option>
                          <option value="burmese">Burmese</option>
                          <option value="burundian">Burundian</option>
                          <option value="cambodian">Cambodian</option>
                          <option value="cameroonian">Cameroonian</option>
                          <option value="canadian">Canadian</option>
                          <option value="cape verdean">Cape Verdean</option>
                          <option value="central african">Central African</option>
                          <option value="chadian">Chadian</option>
                          <option value="chilean">Chilean</option>
                          <option value="chinese">Chinese</option>
                          <option value="colombian">Colombian</option>
                          <option value="comoran">Comoran</option>
                          <option value="congolese">Congolese</option>
                          <option value="costa rican">Costa Rican</option>
                          <option value="croatian">Croatian</option>
                          <option value="cuban">Cuban</option>
                          <option value="cypriot">Cypriot</option>
                          <option value="czech">Czech</option>
                          <option value="danish">Danish</option>
                          <option value="djibouti">Djibouti</option>
                          <option value="dominican">Dominican</option>
                          <option value="dutch">Dutch</option>
                          <option value="east timorese">East Timorese</option>
                          <option value="ecuadorean">Ecuadorean</option>
                          <option value="egyptian">Egyptian</option>
                          <option value="emirian">Emirian</option>
                          <option value="equatorial guinean">Equatorial Guinean</option>
                          <option value="eritrean">Eritrean</option>
                          <option value="estonian">Estonian</option>
                          <option value="ethiopian">Ethiopian</option>
                          <option value="fijian">Fijian</option>
                          <option value="filipino">Filipino</option>
                          <option value="finnish">Finnish</option>
                          <option value="french">French</option>
                          <option value="gabonese">Gabonese</option>
                          <option value="gambian">Gambian</option>
                          <option value="georgian">Georgian</option>
                          <option value="german">German</option>
                          <option value="ghanaian">Ghanaian</option>
                          <option value="greek">Greek</option>
                          <option value="grenadian">Grenadian</option>
                          <option value="guatemalan">Guatemalan</option>
                          <option value="guinea-bissauan">Guinea-Bissauan</option>
                          <option value="guinean">Guinean</option>
                          <option value="guyanese">Guyanese</option>
                          <option value="haitian">Haitian</option>
                          <option value="herzegovinian">Herzegovinian</option>
                          <option value="honduran">Honduran</option>
                          <option value="hungarian">Hungarian</option>
                          <option value="icelander">Icelander</option>
                          <option value="indian">Indian</option>
                          <option value="indonesian">Indonesian</option>
                          <option value="iranian">Iranian</option>
                          <option value="iraqi">Iraqi</option>
                          <option value="irish">Irish</option>
                          <option value="israeli">Israeli</option>
                          <option value="italian">Italian</option>
                          <option value="ivorian">Ivorian</option>
                          <option value="jamaican">Jamaican</option>
                          <option value="japanese">Japanese</option>
                          <option value="jordanian">Jordanian</option>
                          <option value="kazakhstani">Kazakhstani</option>
                          <option value="kenyan">Kenyan</option>
                          <option value="kittian and nevisian">Kittian and Nevisian</option>
                          <option value="kuwaiti">Kuwaiti</option>
                          <option value="kyrgyz">Kyrgyz</option>
                          <option value="laotian">Laotian</option>
                          <option value="latvian">Latvian</option>
                          <option value="lebanese">Lebanese</option>
                          <option value="liberian">Liberian</option>
                          <option value="libyan">Libyan</option>
                          <option value="liechtensteiner">Liechtensteiner</option>
                          <option value="lithuanian">Lithuanian</option>
                          <option value="luxembourger">Luxembourger</option>
                          <option value="macedonian">Macedonian</option>
                          <option value="malagasy">Malagasy</option>
                          <option value="malawian">Malawian</option>
                          <option value="malaysian">Malaysian</option>
                          <option value="maldivan">Maldivan</option>
                          <option value="malian">Malian</option>
                          <option value="maltese">Maltese</option>
                          <option value="marshallese">Marshallese</option>
                          <option value="mauritanian">Mauritanian</option>
                          <option value="mauritian">Mauritian</option>
                          <option value="mexican">Mexican</option>
                          <option value="micronesian">Micronesian</option>
                          <option value="moldovan">Moldovan</option>
                          <option value="monacan">Monacan</option>
                          <option value="mongolian">Mongolian</option>
                          <option value="moroccan">Moroccan</option>
                          <option value="mosotho">Mosotho</option>
                          <option value="motswana">Motswana</option>
                          <option value="mozambican">Mozambican</option>
                          <option value="namibian">Namibian</option>
                          <option value="nauruan">Nauruan</option>
                          <option value="nepalese">Nepalese</option>
                          <option value="new zealander">New Zealander</option>
                          <option value="ni-vanuatu">Ni-Vanuatu</option>
                          <option value="nicaraguan">Nicaraguan</option>
                          <option value="nigerien">Nigerien</option>
                          <option value="north korean">North Korean</option>
                          <option value="northern irish">Northern Irish</option>
                          <option value="norwegian">Norwegian</option>
                          <option value="omani">Omani</option>
                          <option value="pakistani">Pakistani</option>
                          <option value="palauan">Palauan</option>
                          <option value="panamanian">Panamanian</option>
                          <option value="papua new guinean">Papua New Guinean</option>
                          <option value="paraguayan">Paraguayan</option>
                          <option value="peruvian">Peruvian</option>
                          <option value="polish">Polish</option>
                          <option value="portuguese">Portuguese</option>
                          <option value="qatari">Qatari</option>
                          <option value="romanian">Romanian</option>
                          <option value="russian">Russian</option>
                          <option value="rwandan">Rwandan</option>
                          <option value="saint lucian">Saint Lucian</option>
                          <option value="salvadoran">Salvadoran</option>
                          <option value="samoan">Samoan</option>
                          <option value="san marinese">San Marinese</option>
                          <option value="sao tomean">Sao Tomean</option>
                          <option value="saudi">Saudi</option>
                          <option value="scottish">Scottish</option>
                          <option value="senegalese">Senegalese</option>
                          <option value="serbian">Serbian</option>
                          <option value="seychellois">Seychellois</option>
                          <option value="sierra leonean">Sierra Leonean</option>
                          <option value="singaporean">Singaporean</option>
                          <option value="slovakian">Slovakian</option>
                          <option value="slovenian">Slovenian</option>
                          <option value="solomon islander">Solomon Islander</option>
                          <option value="somali">Somali</option>
                          <option value="south african">South African</option>
                          <option value="south korean">South Korean</option>
                          <option value="spanish">Spanish</option>
                          <option value="sri lankan">Sri Lankan</option>
                          <option value="sudanese">Sudanese</option>
                          <option value="surinamer">Surinamer</option>
                          <option value="swazi">Swazi</option>
                          <option value="swedish">Swedish</option>
                          <option value="swiss">Swiss</option>
                          <option value="syrian">Syrian</option>
                          <option value="taiwanese">Taiwanese</option>
                          <option value="tajik">Tajik</option>
                          <option value="tanzanian">Tanzanian</option>
                          <option value="thai">Thai</option>
                          <option value="togolese">Togolese</option>
                          <option value="tongan">Tongan</option>
                          <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                          <option value="tunisian">Tunisian</option>
                          <option value="turkish">Turkish</option>
                          <option value="tuvaluan">Tuvaluan</option>
                          <option value="ugandan">Ugandan</option>
                          <option value="ukrainian">Ukrainian</option>
                          <option value="uruguayan">Uruguayan</option>
                          <option value="uzbekistani">Uzbekistani</option>
                          <option value="venezuelan">Venezuelan</option>
                          <option value="vietnamese">Vietnamese</option>
                          <option value="welsh">Welsh</option>
                          <option value="yemenite">Yemenite</option>
                          <option value="zambian">Zambian</option>
                          <option value="zimbabwean">Zimbabwean</option>
                        </select>
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
                    <a href="{{ url('patient/list') }}"><button class="btn btn-primary" type="button" >BACK</button></a>
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

    //Set Max Date
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("birthDay").setAttribute("max", today);

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
        $('input[name=studFacID]').prop('disabled', false);
      }
      else if($(this).val() == 4){

         $('input[name=studFacID]').prop('required', false);
         $('input[name=studFacID]').prop('disabled', true);
         $('input[name=studFacID]').val('');

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