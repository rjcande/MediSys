<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DENTAL HISTORY </title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div class="header" style="align:right">
            <img src="{{asset('images/images/PUPLogo.png')}}" alt="PUP Logo" style="height: 100px; weight: 100px; float: left">
            <p style="margin-left: 25px">
            Republic of the Philippines <br>
            POLYTECHNIC UNIVERSITY OF THE PHILIPPINES<br>
            <em>Medical Services Department</em><br>
            <b>DENTAL SERVICES</b>
            </p>
            <hr>
        </div>
        <div>
            <h3>Patient ID: {{$patientInfo['patientID']}} <br> Patient Name: {{$patientInfo['lastName']}}, {{$patientInfo['firstName']}} {{$patientInfo['middleName']}} {{$patientInfo['quantifier']}}</h3>
            <p style="float:left; width: 300px;">Birthdate: {{ date('F d, Y', strtotime($patientInfo['birthDate'])) }}</p>  <p style="float:left; margin-top:0px; width: 200px">Age: {{$patientInfo['age']}}</p>
            <p style="float:left; margin-top:0px; width: 150px">Sex: @if($patientInfo['gender'] == 1){{'Male'}}@else{{'Female'}}@endif</p><br>
        </div>
        <div style="margin-top: 0px">
            <p style="float:left; margin-left:0px;width: 300px">Religion: {{$patientInfo['religion']}}</p><p style="float:left; margin-top:0px; width: 200px">Nationality: {{$patientInfo['nationality']}}</p>
            <p style="float:left; margin-top:0px; ">Nickname: </p><br>
        </div>
        <div>
            <p style="float:left; margin-left:0px; width: 300px">Home Address: {{$patientInfo['address']}}</p> <p style="float:left; margin-top: 0px ;margin-left: 200px"> Home No.: {{$patientInfo['homeNo']}}</p><br>
        </div>
        <div>
            <p style="float:left; width: 300px">Occupation: {{$patientInfo['occupation']}}</p><p style="float:left; margin-top: 0px ;margin-left: 200px"> Office No: {{$patientInfo['officeNo']}}</p><br>
        </div>
        <div>
            <p style="float: left; width: 300px">Dental Insurance: {{$patientInfo['dentalIns']}}</p><p style="float:left; margin-left:200px ;margin-top: 0px">Fax No: {{$patientInfo['faxNo']}}</p><br>
        </div>
        <div>
            <p style="float:left; width: 300px">Effective Date: {{$patientInfo['effectDate']}}</p><p style="float:left; margin-left: 200px; margin-top: 0px">Cel/Mobile No: {{$patientInfo['mobileNo']}}</p><br>
        </div>
        <div>
            <p style="float:left; width: 300px">For Minors:</p><p style="float:left; margin-left:200px; margin-top: 0px">Email Add.: {{$patientInfo['emailAdd']}}</p><br>
        </div>
        <div>
            <p style="float:left; width: 300px">Parent/Guardian Name: {{$patientInfo['guardianName']}}</p><p style="float:left; margin-left:200px; margin-top: 0px">Guardian Contact: {{$patientInfo['guardianContact']}}</p><br>
        </div>

        <div id="medical-history">
            <p><b>Medical History</b></p><br>
            <div style="float:left; margin-left:25px; font-size:18px;">
              <label style="margin-bottom:20px;">Name of Physician: </label><label>Dr. {{$patientInfo['physicianName']}}</label>
              <label style="margin-left:70px;">Specialty: </label><label>{{$patientInfo['physicianSpecialty']}}</label><br>
              <label style="margin-bottom:60px; width: 300px">Office Address: </label><label style="margin-left: 25px; width:300px">{{$patientInfo['phyOfficeAdd']}}</label>
              <label style="margin-left:46px;">Office Number: </label><label style="margin-left: 23px">{{$patientInfo['phyOfficeNum']}}</label><br>
            </div>
          </div>
        
        <div style="float: left;margin-top: 45px;width: 100%">
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px;">
                <p style="font-size:17px;">1. Are you in good health?
                    <input type="radio" disabled="disabled" style="margin-left: 300px;" 
                    @if($patientInfo['inGoodHealth'] == '1')
                    {{"checked"}}
                    @endif
                    >Yes
                    <input type="radio" disabled="disabled" style="margin-left: 15px;" 
                    @if($patientInfo['inGoodHealth'] == '0')
                    {{"checked"}}
                    @endif
                    >No
                </p>
            </div>
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:30px;">
                <p style="font-size:17px;">2. Are you under medical treatment now?
                    <input type="radio" disabled="disabled" style="margin-left: 198px;" 
                    @if($patientInfo['underMedTreatment'] == 1)
                    {{"checked"}}
                    @endif
                    >Yes
                    <input type="radio" disabled="disabled" style="margin-left: 15px;" 
                    @if($patientInfo['underMedTreatment'] == 0)
                    {{"checked"}}
                    @endif
                    >No
                </p>
                <p style="font-size:15px; margin-left:25px;"><em>(if so, what is the condition being treated?)</em></p>
                <textarea readonly style="height:50px; margin-left:25px; border-radius:8px; width:600px;">{{$patientInfo['conditionTreated']}}</textarea>
            </div>
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:180px;">
                <p style="font-size:17px;">3. Have you ever had serious illness or surgical operation?
                  <input type="radio" style="margin-left: 80px;" disabled="disabled" 
                  @if($patientInfo['hadIllnessSurgOpr'] == 1)
                    {{"checked"}}
                  @endif
                  >Yes
                  <input type="radio" style="margin-left: 15px;" disabled="disabled" 
                  @if($patientInfo['hadIllnessSurgOpr'] == 0)
                    {{"checked"}}
                  @endif
                  >No
                </p>
                <p style="font-size:15px; margin-left:25px;"><em>(if so, what illness or operation?)</em></p>
                <textarea readonly style="height:50px; margin-left:25px; border-radius:8px; width:600px;">{{$patientInfo['illnessSurgOprDetails']}}</textarea>
            </div>
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:330px;">
                <p style="font-size:17px;">4. Have you ever been hospitalized?
                  <input type="radio" style="margin-left: 230px;" disabled="disabled" 
                  @if($patientInfo['isHospitalized'] == 1)
                    {{"checked"}}
                  @endif
                  >Yes
                  <input type="radio" style="margin-left: 15px;" disabled="disabled" 
                  @if($patientInfo['isHospitalized'] == 0)
                    {{"checked"}}
                  @endif
                  >No
                </p>
                <p style="font-size:15px; margin-left:25px;"><em>(if so, when and why?)</em></p>
                <textarea readonly style="height:50px; margin-left:25px; border-radius:8px; width:600px;">{{$patientInfo['reasonForHosp']}}</textarea>
            </div>
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:480px;">
                <p style="font-size:17px;">5. Are you taking any prescription/non-prescription medication?
                  <input type="radio" style="margin-left: 40px;" disabled="disabled" 
                  @if($patientInfo['takesMedication'] == 1)
                    {{"checked"}}
                  @endif
                  >Yes
                  <input type="radio" style="margin-left: 15px;" disabled="disabled"
                  @if($patientInfo['takesMedication'] == 0)
                    {{"checked"}}
                  @endif
                  >No
                </p>
                <p style="font-size:15px; margin-left:25px;"><em>(if so, please specify)</em></p>
                <textarea readonly style="height:50px; margin-left:25px; border-radius:8px; width:600px;">{{$patientInfo['medSpecification']}}</textarea>
            </div>
        </div>
        <div style="float: left;margin-top: 45px;width: 100%">
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:550px;">
                <p style="font-size:17px;">6. Do you use tobacco products?
                  <input type="radio" style="margin-left: 250px;" disabled="disabled" 
                  @if($patientInfo['useTobacco'] == 1)
                    {{"checked"}}
                  @endif
                  >Yes
                  <input type="radio" style="margin-left: 15px;" disabled="disabled" 
                  @if($patientInfo['useTobacco'] == 0)
                    {{"checked"}}
                  @endif
                  >No
                </p>
            </div>
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:30px;">
                <p style="font-size:17px;">7. Do you use alcohol, cocaine or other dangerous drugs?
                  <input type="radio" style="margin-left: 81px;" disabled="disabled" 
                  @if($patientInfo['useAlcOrDrugs'] == 1)
                    {{"checked"}}
                  @endif
                  >Yes
                  <input type="radio" style="margin-left: 15px;" disabled="disabled" 
                  @if($patientInfo['useAlcOrDrugs'] == 0)
                    {{"checked"}}
                  @endif
                  >No
                </p>
            </div>
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:70px;">
                <p style="font-size:17px;">8. Are the gums bleeding?
                  <input type="radio" name="bleedingGumsRdBtn" disabled value="1" style="margin-left: 300px;"
                  @if($patientInfo['isBleeding'] == 1)
                    {{"checked"}}
                  @endif
                  >Yes
                  <input type="radio" name="bleedingGumsRdBtn" disabled value="0" style="margin-left: 15px;"
                  @if($patientInfo['isBleeding'] == 0)
                    {{"checked"}}
                  @endif
                  >No
                  <p style="font-size:15px; margin-left:25px;"><em>(if so, please enter how long)</em></p>
                  <input type="text" id="bleedingTimeTextbox" name="bleedingTimeTextbox" disabled style="width:350px; border-radius:8px; margin-left:40px;" value="{{$patientInfo['bleedingTime']}}">
                </p>
            </div>
            <div style="float: left;width:100%; margin-left: 50px; font-size:15px; margin-top:150px;">
                <p style="font-size:17px;">9. Are you allergic to any of the following:
                  <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                    <input type="checkbox" disabled="disabled" class="radio-past" style="margin-bottom:12px;" 
                    @if($patientInfo['allergicToLclAnesthetic'] == 1)
                    {{"checked"}}
                    @endif
                    > Local Anesthetic(ex. Lidocaine)<br>
                    <input type="checkbox" disabled="disabled" class="radio-past" style="margin-bottom:12px;" 
                    @if($patientInfo['allergicToSultaDrugs'] == 1)
                    {{"checked"}}
                    @endif
                    > Sulta drugs<br>
                    <input type="checkbox" disabled="disabled" class="radio-past" style="margin-bottom:12px;" 
                    @if($patientInfo['allergicToAspirin'] == 1)
                    {{"checked"}}
                    @endif
                    > Aspirin<br>
                    <input type="checkbox" disabled="disabled" class="radio-past" style="margin-bottom:12px;" 
                    @if($patientInfo['allergicToPenAntibiotics'] == 1)
                    {{"checked"}}
                    @endif
                    > Penicillin,Antibiotics<br><br>
                  </div>
            
                  <div style="float:left; margin-left:350px; font-size:15px; width:300px;">
                    <input type="checkbox" class="radio-past" disabled="disabled" style="margin-bottom:12px;" 
                    @if($patientInfo['allergicToLatex'] == 1)
                    {{"checked"}}
                    @endif
                    > Latex<br>
                    <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" 
                    @if($patientInfo['allergicToOther'] == 1)
                    {{"checked"}}
                    @endif
                    > Other <em>(please specify)</em>
                    <textarea style="height:50px; width:260px; border-radius:8px;" readonly>{{$patientInfo['OtherAllergyDetails']}}</textarea>
                  </div>
                </p>
            </div>
            <div style="margin-left:50px; margin-top: 360px">
                <p style="font-size: 17px">10. For Women Only</p>
                <p style="font-size:17px; margin-left:50px;">Are you pregnant?
                    <input type="radio" name="pregnant" disabled style="margin-left: 300px;" 
                    @if($patientInfo['isPregnant'] == 1)
                      {{"checked"}}
                    @endif
                    >Yes
                    <input type="radio" name="pregnant" disabled style="margin-left: 15px;"
                    @if($patientInfo['isPregnant'] == 0)
                      {{"checked"}}
                    @endif
                    >No
                </p>
                <p style="font-size:17px; margin-left:50px;">Are you nursing?
                    <input type="radio" name="nursing" value="1" disabled style="margin-left: 310px;"
                    @if($patientInfo['isNursing'] == 1)
                      {{"checked"}}
                    @endif
                    >Yes
                    <input type="radio" name="nursing" value="0" disabled style="margin-left: 15px;"
                    @if($patientInfo['isNursing'] == 0)
                      {{"checked"}}
                    @endif
                    >No
                </p>
                <p style="font-size:17px; margin-left:50px;">Are you taking birth control pills?
                    <input type="radio" name="birthControlPills" value="1" disabled style="margin-left: 195px;"
                    @if($patientInfo['isPregnant'] == 1)
                      {{"checked"}}
                    @endif
                    >Yes
                    <input type="radio" name="birthControlPills" value="0" disabled style="margin-left: 15px;"
                    @if($patientInfo['isPregnant'] == 0)
                      {{"checked"}}
                    @endif
                    >No
                </p>
            </div>
            <div style="margin-left:50px; margin-top: 25px">
                <p style="font-size:17px;">11. Blood Type
                    <input type="text" value="{{$patientInfo['bloodType']}}" readonly style="width:350px; border-radius:8px;;margin-left:70px;">
                </p>
            </div>
            <div style="margin-left:50px; margin-top: 25px">
                <p style="font-size:17px;">12. Do you have or have you had any of the following? Check which apply
                    <div style=" margin-left:0px; font-size:15px;">
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasHighBloodPress'] == 1){{"checked"}}@endif> High Blood Pressure   <input type="checkbox" class="radio-past" style="margin-left: 80px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasHeartDisease'] == 1){{"checked"}}@endif>Heart Disease                      <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 100px" disabled="disabled" @if($patientInfo['hasCancerTumor'] == 1){{"checked"}}@endif>Cancer/Tumors<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasLowBloodPress'] == 1){{"checked"}}@endif> Low Blood Pressure     <input type="checkbox" class="radio-past" style="margin-left: 82px; margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasHeartMurmur'] == 1){{"checked"}}@endif>Heart Murmur                       <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 95px" disabled="disabled"@if($patientInfo['hasAnemia'] == 1){{"checked"}}@endif>Anemia<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasEpiConvulsions'] == 1){{"checked"}}@endif> Epilepsy/Convulsions  <input type="checkbox" class="radio-past" style="margin-left: 74px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasHepaLiverDisease'] == 1){{"checked"}}@endif>Hepatitis/Liver Disease        <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 40px" disabled="disabled" @if($patientInfo['hasAngina'] == 1){{"checked"}}@endif>Angina<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasAidsHIV'] == 1){{"checked"}}@endif> Aids or HIV infection        <input type="checkbox" class="radio-past" style="margin-left: 76px; margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasRheumaticFever'] == 1){{"checked"}}@endif>Rheumatic Fever                 <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 75px" disabled="disabled"@if($patientInfo['hasAsthma'] == 1){{"checked"}}@endif>Asthma<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasSTD'] == 1){{"checked"}}@endif>Sexually Transmitted Disease      <input type="checkbox" class="radio-past" style="margin-left: 30px; margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasHayfeverAllergies'] == 1){{"checked"}}@endif>Hay fever/Allergies          <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 60px" disabled="disabled" @if($patientInfo['hasEmphysema'] == 1){{"checked"}}@endif>Emphysema<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasStomachTrbls'] == 1){{"checked"}}@endif>Stomach Troubles/Ulcers  <input type="checkbox" class="radio-past" style="margin-left: 60px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasRespiratoryProbs'] == 1){{"checked"}}@endif>Respiratory Problems           <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 40px" disabled="disabled" @if($patientInfo['hasBleedingProbs'] == 1){{"checked"}}@endif>Bleeding Problems<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasFaintingSeizure'] == 1){{"checked"}}@endif>Fainting Seizure      <input type="checkbox" class="radio-past" style="margin-left: 115px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasHepatitisJaundice'] == 1){{"checked"}}@endif>Hepatitis/Jaundice           <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 40px" disabled="disabled" @if($patientInfo['hasBloodDisease'] == 1){{"checked"}}@endif>Blood Disease<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasRapidWeightLoss'] == 1){{"checked"}}@endif>Rapid Weight Loss     <input type="checkbox" class="radio-past" style="margin-left: 100px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasTB'] == 1){{"checked"}}@endif>Tuberculosis                                <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 40px" disabled="disabled"@if($patientInfo['hasHeadInjuries'] == 1){{"checked"}}@endif>Head Injuries<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasRadiotheraphy'] == 1){{"checked"}}@endif>Radiation Therapy       <input type="checkbox" class="radio-past" style="margin-left: 100px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasSwollenAnkles'] == 1){{"checked"}}@endif>Swollen Ankles                   <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 40px" disabled="disabled" @if($patientInfo['hasArthritisRheuma'] == 1){{"checked"}}@endif>Arthritis/Rheumatism<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasJointRepImplacement'] == 1){{"checked"}}@endif>Joint Replacement/Implacement<input type="checkbox" class="radio-past" style="margin-left: 25px;margin-bottom:12px;" disabled="disabled"@if($patientInfo['hasKidneyDisease'] == 1){{"checked"}}@endif>Kidney Disease          <input type="checkbox" class="radio-past" style="margin-bottom:12px;margin-left: 40px" disabled="disabled" @if($patientInfo['hasOthers'] == 1){{"checked"}}@endif> Other<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasHeartSurgery'] == 1){{"checked"}}@endif>Heart Surgery            <input type="checkbox" class="radio-past" style="margin-left: 130px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasDiabetes'] == 1){{"checked"}}@endif>Diabetes<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasHeartAttack'] == 1){{"checked"}}@endif>Heart Attack              <input type="checkbox" class="radio-past" style="margin-left: 140px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasChestPain'] == 1){{"checked"}}@endif>Chest Pain<br>
                        <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasThyroidProbs'] == 1){{"checked"}}@endif>Thyroid Problem          <input type="checkbox" class="radio-past" style="margin-left: 110px;margin-bottom:12px;" disabled="disabled" @if($patientInfo['hasStroke'] == 1){{"checked"}}@endif>Stroke<br>
                    </div>
                </p>      
            </div>
            {{-- <div style="margin-left:250px; margin-top: 0px">
                <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" 
                    @if($patientInfo['hasHeartDisease'] == 1)
                    {{"checked"}}
                    @endif
                >Heart Disease<br>
                <input type="checkbox" class="radio-past" style="margin-bottom:12px;" disabled="disabled" 
                    @if($patientInfo['hasHeartMurmur'] == 1)
                    {{"checked"}}
                    @endif
                >Heart Murmur<br>
            </div> --}}
            
        </div>
        {{-- <div style="float:left;margin-top:245px;width:100%">
            <div style="float:left;width:100%; margin-left: 50px; font-size:15px; border:1px solid black">
                
            </div>
        </div> --}}

    </body>
</html>