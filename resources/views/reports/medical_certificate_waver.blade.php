<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Waver</title>
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
      <img src={{asset("images/pup-logo.png")}} style="float: left; margin-right: 20px;" width="75px" height="75px">
      <center>
        <header style="font-size: 15px;">Republic of the Philippines</header>
        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header>
        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header>
        <header style="font-size: 15px;">Sta. Mesa, Manila</header>
        <h1>MEDICAL CLEARANCE</h1>
      </center>
      <div style="width: 100%">
        <header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;">Date: <u>{{ date('F d, Y', strtotime($logreferrals['created_at'])) }}</u></header>
        <header style="font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>
        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">I, <u>{{ $name }}</u> enrolled at the College of <u>{{ $logreferrals['waiverCollegeOf'] }}</u> Department of <u>{{ $logreferrals['waiverDepartmentOf'] }}</u>, was seen and examined at the PUP Medical Clinic dated <u>{{ date('F d, Y',strtotime($logreferrals['created_at'])) }}</u> with the diagnosis of <u>{{ $logreferrals['waiverDiagnosis'] }}</u>. I promise to come back for a follow-up check-up on <u>{{ date('F d, Y',strtotime($logreferrals['waiverFollowUp'])) }}</u> as advised.</header>
      </div>
     
      <div style="width:100%;text-align: right;">
        <div style="text-align: center; margin-left: 500px;">
         <header style="font-size: 18px; margin-top: 40px; text-align: right;margin-right: 10px;">_______________________________</header>
         <header style="font-size: 18px;text-align: right; margin-right: 115px">Signature</header>
          
        </div>
      </div>
    
    </div>
</body>
</html>