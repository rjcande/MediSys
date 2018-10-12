<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medical Log</title>
  <link rel="stylesheet" href="">
  <style type="text/css" media="screen">
    table{
      font-family: verdana,arial;
      border-collapse: collapse;
      width: 100%;
    }

    td{
      width: 50%;
    }

    td,th{
      border: 1px solid black;
      text-align: left;
    }
    th{
      text-align: left;
    }
    caption{
      font-family:verdana;
      font-size: 160%;
    }
  </style>
</head>
<body>
    <div>
        <img src={{asset("images/pup-logo.png")}} style="float: left; margin-right: 20px;" width="75px" height="75px">
        <header style="font-size: 15px;">Republic of the Philippines</header>
        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header>
        <header style="font-size: 15px;">Office of the Vice President for Administration</header>
        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header>
        <hr>
        <center>
          <h3>HEALTH EXAMINATION RECORD</h3>
          <h3>FACULTY, ADMINISTRATIVE EMPLOYEE AND STUDENT</h3>
        </center>
      
      <table style = "width:100%">
          <tbody>
            <tr>
              <td>
                Name: {{ $medicalHistory['lastName'] }}, {{ $medicalHistory['firstName'] }} {{ $medicalHistory['middleName']{0} }}@if($medicalHistory['middleName']){{ '.' }}@endif {{ $medicalHistory['quantifier'] }}
              </td>
              <td>
                Date: {{ date('F d, Y') }}
              </td>
            </tr>
            <tr>
              <td>
                Address: {{ $medicalHistory['address'] }}
              </td>
              <td>
                College / Department:
              </td>
            </tr>
            <tr>
              <td>
                Contact No.: {{ $medicalHistory['mobileNo'] }}
              </td>
              <td>
                Course / School Year:
              </td>
            </tr>
            <tr>
              <td>
                Contact Person In Case of Emergency:
              </td>
              <td>
                Contact No.:
              </td>
            </tr>
            
            <tr>
              <td>
                Age: {{ $medicalHistory['age'] }}      Sex:  @if($medicalHistory['gender'] == '1')  {{ "Male" }} @elseif($medicalHistory['gender'] == '0') {{ "Female" }}@endif
              </td>
              <td></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;">
                <b>I. PAST MEDICAL HISTORY:</b>
              </td>
              
            </tr>
            <tr>
              <td>
                <i>Childhood Illness:</i>
              </td>
              <td>
                <b>Previous Hospitalization: </b>
                 <input type="radio" name="previousHospitalization" style="margin-left: 50px;" value="1" id="previousHospitalizationYes" @if($medicalHistory->pastMedPrevHosp == 1) {{ 'checked' }} @endif>Yes
                  <input type="radio" name="previousHospitalization" style="margin-left: 15px;" value="0" @if($medicalHistory->pastMedPrevHosp == '0') {{ 'checked' }} @endif>No
              </td> 
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="pastMedicalHistoryAsthma" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->pastMedAsthma == 1) {{ 'checked' }} @endif> Asthma
                <input type="checkbox" name="pastMedicalHistoryChickenPox" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->pastMedChickenPox == 1) {{ 'checked' }} @endif> Chicken Pox
                <input type="checkbox" name="famHistoryHeartDisease" class="radio-fam" style="margin-bottom:12px;" value="1" @if($medicalHistory->pastMedHeartDis == 1) {{ 'checked' }} @endif> Heart Disease<br>
                <input type="checkbox" name="pastMedicalHistoryMeasles" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->pastMedMeasles == 1) {{ 'checked' }} @endif> Measles
                <input type="checkbox" name="pastMedicalHistorySeizure" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->pastMedSeizure == 1) {{ 'checked' }} @endif> Seizure Disorder
                <input type="checkbox" name="pastMedicalHistoryHyperventilation" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->pastMedHypervent == 1) {{ 'checked' }} @endif> Hyperventilation<br>
                <input input type="checkbox" name="pastMedicalHistoryOther" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->pastMedOther == 1) {{ 'checked' }} @endif> Other
                @if($medicalHistory->pastMedOther == 1) <u>{{ $medicalHistory['pastMedOtherDetails'] }}</u> @endif
              </td>
              <td>
                <b>Operation/Surgery</b>
                 <input type="radio" name="operationSurgery" style="margin-left: 50px;" value="1" id="operationSurgeryYes" @if($medicalHistory->pastMedOprSrg == 1) {{ 'checked' }} @endif>Yes
                 <input type="radio" name="operationSurgery" style="margin-left: 15px;" value="0">No
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <b>Current Medications:</b>
                @if($medicalHistory->currentMeds == '1') <u>{{ $medicalHistory['currentMedsDetails'] }}</u> @endif
              </td>
              
            </tr>
            
            <tr>
              <td colspan="2" style="text-align: center"><b>II. FAMILY HISTORY</b></td>
              
            </tr>
            <tr>
              <td colspan="2">
                <input type="checkbox" name="famHistoryDiabetes" class="radio-fam" style="margin-bottom:12px;" value="1" @if($medicalHistory->famHistDiabetes == 1) {{ 'checked' }} @endif> Diabetes
                <input type="checkbox" name="famHistoryPTB" class="radio-fam" style="margin-bottom:12px;" value="1" @if($medicalHistory->famHistPTB == 1) {{ 'checked' }} @endif> PTB
                <input type="checkbox" name="famHistoryHyperTension" class="radio-fam" style="margin-bottom:12px;" value="1" @if($medicalHistory->famHistHypervent == 1) {{ 'checked' }} @endif> Hypertension
                <input type="checkbox" name="famHistoryCancer" class="radio-fam" style="margin-bottom:12px;" value="1" @if($medicalHistory->famHistCancer  == 1) {{ 'checked' }} @endif> Cancer
                <input type="checkbox" name="famHistoryOther" class="radio-fam" style="margin-bottom:12px;" value="1" @if($medicalHistory->otherFamHist  == 1) {{ 'checked' }} @endif> Other
                @if($medicalHistory->otherFamHist  == '1') <u>{{ $medicalHistory['otherFamHistDetails'] }}</u> @endif
              </td>
            </tr>
           
            <tr>
              <td colspan="2" style="text-align: center;"><b>III. Physical Examination</b></td>
            </tr>
            <tr>
              <td>
                <b>Head:</b>
                <input type="checkbox" name="headWound" class="radio-head" style="margin-bottom:12px;" value="1" @if($medicalHistory->headWound  == 1) {{ 'checked' }} @endif> Wound
                <input type="checkbox" name="headMass" class="radio-head" style="margin-bottom:12px;" value="1" @if($medicalHistory->headMass  == 1) {{ 'checked' }} @endif> Mass
                <input type="checkbox" name="headAlopecia" class="radio-head" style="margin-bottom:12px;" value="1" @if($medicalHistory->headAlopecia  == 1) {{ 'checked' }} @endif> Alopecia
              </td>
              <td>
                <b>Eyes:</b>
                 <input type="checkbox" name="eyesPale" class="radio-eyes" style="margin-bottom:12px;" value="1" @if($medicalHistory->eyesPale == 1) {{ 'checked' }} @endif> Pale
                 <input type="checkbox" name="eyesPinkPalberalConjunctiva" class="radio-eyes" style="margin-bottom:12px;" value="1" @if($medicalHistory->eyesPPC == 1) {{ 'checked' }} @endif> Pink Palberal Conjunctiva
                 <input type="checkbox" name="eyesIcteric" class="radio-eyes" style="margin-bottom:12px;" value="1" @if($medicalHistory->eyesIcteric == 1) {{ 'checked' }} @endif> Icteric<br>
                 <input type="checkbox" name="eyesAnictericSclera" class="radio-eyes" style="margin-bottom:12px;" value="1" @if($medicalHistory->eyesAnicScleric == 1) {{ 'checked' }} @endif> Anicteric Sclera<br>
              </td>
            </tr>
            <tr>
              <td>
                <b>Ears:</b>
                <input type="checkbox" name="earsNoGrossDetormity" class="radio-ears" style="margin-bottom:12px;" value="1" @if($medicalHistory->earsNoGrossDetor  == 1) {{ 'checked' }} @endif> No Gross Detormity
                <input type="checkbox" name="earsNoDischarge" class="radio-ears" style="margin-bottom:12px;" value="1" @if($medicalHistory->earsNoDischarge  == 1) {{ 'checked' }} @endif> No Discharge 
              </td>
              <td>
                <b>Throat:</b>
                <input type="checkbox" name="throatNoTcp" class="radio-throat" style="margin-bottom:12px;" value="1" @if($medicalHistory->throatNoTCP  == 1) {{ 'checked' }} @endif> No TCP
                <input type="checkbox" name="throatNoMass" class="radio-throat" style="margin-bottom:12px;" value="1" @if($medicalHistory->throatNoMass  == 1) {{ 'checked' }} @endif> No Mass<br>
                <input type="checkbox" name="throatNoLymphadenopthy" class="radio-throat" style="margin-bottom:12px;" value="1" @if($medicalHistory->throatNoLymph  == 1) {{ 'checked' }} @endif> No Lymphadenopthy
              </td>
            </tr>
            <tr>
              <td>
                <b>Chest/Lungs</b>
                <input type="checkbox" name="chestClearBreathSounds" class="radio-chest" style="margin-bottom:12px;" value="1" @if($medicalHistory->chestLungsClrBreathSnd == 1) {{ 'checked' }} @endif> Clear Breath Sounds<br>
                <input type="checkbox" name="chestOther" class="radio-chest" style="margin-bottom:12px;" value="1" @if($medicalHistory->chestLungsOther == 1) {{ 'checked' }} @endif> Other
                @if($medicalHistory->chestLungsOther == 1) <u>{{ $medicalHistory['chestLungsOtherDetails'] }}</u> @endif
              </td>
              <td>
                <b>Breast:</b>
                <input type="checkbox" name="breastNormal" class="radio-breast" style="margin-bottom:12px;" value="1" @if($medicalHistory->normalBreast == 1) {{ 'checked' }} @endif>Normal
              </td> 
            </tr>
            <tr>
              <td>
                <b>Vertebral Column:</b>
                <input type="radio" name="vcolumnState" class="radio-vcolumn" style="margin-bottom:12px;" value="0" @if($medicalHistory->vertColState == '0') {{ 'checked' }} @endif> Normal

                <input type="radio" name="vcolumnState" class="radio-vcolumn" style="margin-bottom:12px;" value="1" id="vcolumnStateYes" @if($medicalHistory->vertColState == 1) {{ 'checked' }} @endif> With Deformities
                @if($medicalHistory->vertColState == 1) <u>{{ $medicalHistory['vertColDeformDetails'] }}</u> @endif
              </td>
              <td>
                <b>Estremities:</b>
                <input type="checkbox" name="extremitiesNoDeformities" class="radio-extremities" style="margin-bottom:12px;" value="1" > No Deformities
                
              </td>
            </tr>
            <tr>
              <td><b>Chest X-Ray Result</b>
                <input type="radio"  class="radio-vcolumn" style="margin-bottom:12px;" value="0" @if($medicalHistory->chestXRayState == '0') {{ 'checked' }} @endif> Normal</td>
            
               <td>
                <b>Abdomen:</b>
                <input type="checkbox" name="abdomenNormal" class="radio-abdomen" style="margin-bottom:12px;" value="1" @if($medicalHistory->normalAbdomen == 1) {{ 'checked' }} @endif> Normal
              </td>
            </tr>
            <tr>
              <td>
                <b>Heart:</b>
                 <input type="checkbox" name="heartRegular" class="radio-heart" style="margin-bottom:12px;" value="1" @if($medicalHistory->heartRegularRate == 1) {{ 'checked' }} @endif> Regular Rate Rhythm
                  <input type="checkbox" name="heartOther" class="radio-heart" style="margin-bottom:12px;" @if($medicalHistory->heartOther == 1) {{ 'checked' }} @endif> Other
                  @if($medicalHistory->heartOther == 1) <u>{{ $medicalHistory['heartOtherDetails'] }}</u> @endif
              </td>
              <td>
                <b>Skin:</b>
                  <input type="checkbox" name="skinNoLesions" class="radio-skin" style="margin-bottom:12px;" value="1" @if($medicalHistory->skinNoLesions == 1) {{ 'checked' }} @endif> No Lesions
                  <input type="checkbox" name="skinOther" class="radio-skin" style="margin-bottom:12px;" value="1" @if($medicalHistory->skinOther == 1) {{ 'checked' }} @endif> Other
                  @if($medicalHistory->skinOther == 1) <u>{{ $medicalHistory['skinOtherDetails'] }}</u> @endif
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;"><b>IV. Menstrual History/Circumcision History</b></td>
            </tr>
            <tr>
              <td>
                <header> First Day of Last Menstruation: {{ date('F d, Y',strtotime($medicalHistory->firstDayOfLastMens)) }}</header>
                <header> Menarch: {{ date('F d, Y', strtotime($medicalHistory->menarche)) }}</header>
                <header> Duration(days): {{ $medicalHistory->mensDuration }}</header>
                <header> Interval: {{ $medicalHistory->mensInterval }}</header>
                <header> Amounts(soaked pads per day): {{ $medicalHistory->mensAmount }}</header>
                <header> Symptoms: {{ $medicalHistory->mensSymptoms }}</header>
              </td>
              <td>
                <header> Day of Circumcision: {{ date('F d, Y', strtotime($medicalHistory->circumcisionDate)) }}</header>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;"><b>V. Immunization History</b></td>
            </tr>
            <tr>
              <td colspan="2">
                 <input type="checkbox" name="immuBCG" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->immuBCG == 1) {{ 'checked' }} @endif> Bacille Calmette Guerin
                  <input type="checkbox" name="immuMeasles" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->immuMeasles == 1) {{ 'checked' }} @endif> Measles
                  <input type="checkbox" name="immuMMR" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->immuMMR == 1) {{ 'checked' }} @endif> Mumps,Measles,and Ruvella
                  <input type="checkbox" name="immuVaricella" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->immuVaricella == 1) {{ 'checked' }} @endif> Varicella
                  <input type="checkbox" name="immuPneumonococcal" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->immuPneumo == 1) {{ 'checked' }} @endif> Pneumonococcal<br>
                  <input type="checkbox" name="immuHInfluenza" class="radio-past" style="margin-bottom:12px;" value="1" @if($medicalHistory->immuHaemoInfluB == 1) {{ 'checked' }} @endif> Haemophilius influenza B
                  <header style="margin-right:10px; margin-bottom:10px; display: inline;">Hepatitis B</header>
                   <input type="radio" name="immuhepatitis" style="margin-bottom:15px;" value="1" @if($medicalHistory->immuHepaB == 1) {{ 'checked' }} @endif>1
                  <input type="radio" name="immuhepatitis" value="2" @if($medicalHistory->immuHepaB == 2) {{ 'checked' }} @endif>2
                  <input type="radio" name="immuhepatitis" value="3" @if($medicalHistory->immuHepaB == 3) {{ 'checked' }} @endif>3
                  <input type="radio" name="immuhepatitis" value="0" @if($medicalHistory->immuHepaB == '0') {{ 'checked' }} @endif>None
                  <header style="margin-right:10px margin-bottom:10px; display: inline;">DPT</header>
                  <input type="radio" name="immudpt" value="1" @if($medicalHistory->immuDPT == 1) {{ 'checked' }} @endif>1
                  <input type="radio" name="immudpt" value="2" @if($medicalHistory->immuDPT == 2) {{ 'checked' }} @endif>2
                  <input type="radio" name="immudpt" value="3" @if($medicalHistory->immuDPT == 3) {{ 'checked' }} @endif>3
                  <input type="radio" name="immudpt" value="0" @if($medicalHistory->immuDPT == '0') {{ 'checked' }} @endif>None
              </td>
            </tr>
            <tr>
              <td><b>Physician's Signature:</b></td>
              <td></td>
            </tr>
          </tbody>
      </table>
    </div>
</body>
</html>