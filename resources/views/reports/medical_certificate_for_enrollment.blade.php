<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medical Certificate for Enrollment</title>
  <link rel="stylesheet" href="">
  <style type="text/css" media="screen">
    caption{
      font-family:verdana;
      font-size: 160%;
    }
  </style>
</head>
<body>
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
        <header style="font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It     May Concern:</header>
        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; text">
          This is to certify that <u>{{ $name }}</u> has been examined by the undersigned and found to be physically fit at the time of examination.
        </header>
        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px;">
          This certification is issued upon the request for <u><strong>ENROLLMENT</strong></u>purpose.
        </header>
      </div>
     
      <div style="width:100%;text-align: right;">
        <div style="text-align: center; margin-left: 500px;">
          <header style="font-size: 18px; margin-top: 40px;"><u>{{ $physicianDetails->firstName }} {{ $physicianDetails->middleName }} {{ $physicianDetails->lastName }} {{ $physicianDetails->quantifier }}</u> M.D.</header>
          <header style="font-size: 18px;">Clinic Physician</header>   
          <header style="font-size: 18px; margin-top: 20px; text-align: right;"><u style="text-align: center; padding: 0 0 4px;">{{ $physicianDetails->licenseNumber }}</u> Lic. No.</header>
        </div>
      </div>
    
    </div>
</body>
</html>