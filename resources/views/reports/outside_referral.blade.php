<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prescription</title>
  <link rel="stylesheet" href="">
  <style type="text/css" media="screen">
    table{
      font-family: verdana,arial;
      border-collapse: collapse;
      width: 100%;
    }

    td,th{
      border: 1px solid black;
      text-align: left;
      padding: 15px;
    }
    th{
      text-align: left;
    }
    tr:nth-child(even){
      background-color: #dddddd;
    }
    caption{
      font-family:verdana;
      font-size: 160%;
    }
  </style>
</head>
<body>
    <div>
      <center>
        <header style="font-size: 15px;">Republic of the Philippines</header><br>
        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header><br>
        <header style="font-size: 15px;">Sta. Mesa, Manila</header><br>
        <h1>Outside Referral</h1>
      </center>
      <p>Name: {{ $name }}</p>
      
      <label>To:</label>
          @if($outsideReferral['referTo'] == 0)
            {{ "Ortho-Surgeon of Choice" }}
          @elseif($outsideReferral['referTo'] == 1)
            {{ "Pulmonologist of Choice" }}
          @elseif($outsideReferral['referTo'] == 2)
            {{ "Cardiologist of Choice" }}
          @elseif($outsideReferral['referTo'] == 3)
            {{ $outsideReferral['referToOthers'] }}
          @endif

      <br>
      <label>Remarks:</label>
            {{ $outsideReferral['referralDescription'] }}
      <br>
      <br>
      <br>
      <label>Laboratory Referral:</label>
            <input type="checkbox" name="chestXrayPA" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
                    @if($outsideReferral['chestXrayPA'] == 1)
                      {{ "checked" }}
                    @endif
                    > PA
            <input type="checkbox" name="chestXrayAP_LAT" class="radio-past" style="margin-bottom:12px; margin-left:30px;" value="1"
            @if($outsideReferral['chestXrayAP_LAT'] == 1)
                      {{ "checked" }}
                    @endif> AP-LAT
            <br>
            <input type="checkbox" name="electrocardiography" class="radio-past" style="margin-bottom:12px;" value="1"
            @if($outsideReferral['electrocardiography'] == 1)
                      {{ "checked" }}
                    @endif> Electrocardiography (ECG)<br>
            <input type="checkbox" name="urinalysis" class="radio-past" style="margin-bottom:12px;" value="1"
            @if($outsideReferral['urinalysis'] == 1)
                      {{ "checked" }}
                    @endif> Urinalysis<br>
            <input type="checkbox" name="fecalysis" class="radio-past" style="margin-bottom:12px;" value="1"
            @if($outsideReferral['fecalysis'] == 1)
                      {{ "checked" }}
                    @endif> Fecalysis<br>
            <input type="checkbox" name="cbc" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['cbc'] == 1)
                      {{ "checked" }}
                    @endif> Complete Blood Count (CBC)<br>
            <input type="checkbox" name="fbs" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['fbs'] == 1)
                      {{ "checked" }}
                    @endif> Fasting Blood Sugar (FBS)<br>
            <input type="checkbox" name="bun" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['bun'] == 1)
                      {{ "checked" }}
                    @endif> Blood Urea Nitrogen (BUN)<br>
            <input type="checkbox" name="creatinine" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['creatinine'] == 1)
                      {{ "checked" }}
                    @endif> Creatinine<br>
            <input type="checkbox" name="cholesterol" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['cholesterol'] == 1)
                      {{ "checked" }}
                    @endif> Total Cholesterol<br>
            <input type="checkbox" name="triglycerides" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['triglycerides'] == 1)
                      {{ "checked" }}
                    @endif> Triglycerides<br>
            <input type="checkbox" name="hdl" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['hdl'] == 1)
                      {{ "checked" }}
                    @endif> High-Density Lipoprotein (HDL)<br>
            <input type="checkbox" name="ldl" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['ldl'] == 1)
                      {{ "checked" }}
                    @endif> Low-Density Lipoprotein (LDL)<br>
            <input type="checkbox" name="uricAcid" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['uricAcid'] == 1)
                      {{ "checked" }}
                    @endif> Uric Acid<br>
            <input type="checkbox" name="sgpt" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"
            @if($outsideReferral['sgpt'] == 1)
                      {{ "checked" }}
                    @endif> Serum Glutamic-Pyruvic Transaminase (SGPT)<br><br>
            <label style="margin-right:15px;">Others:</label>
            <textarea rows="4" class="form-control" placeholder="Other Request"
              style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="otherRequest">{{ $outsideReferral['otherRequest'] }}</textarea>
    </div>
</body>
</html>