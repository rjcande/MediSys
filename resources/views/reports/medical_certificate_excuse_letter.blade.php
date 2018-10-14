<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Excuse Letter</title>
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
        <h1>EXCUSE FORM</h1>
      </center>
      <div style="width: 100%">
        <header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;">Date: <u>{{ date('F d, Y', strtotime($logreferrals['created_at'])) }}</u></header>
        <header style="font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>
        <header style="font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This is to certify that <u>{{ $name }}</u> has been treated/is currently being treated for <u>{{$logreferrals['excuseLetterFor']}}</u> from <u>{{$logreferrals['excuseLetterFrom']}}</u> to <u>{{$logreferrals['excuseLetterTo']}}</u>.</header>
        <header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This certification is issued upon request for <u>{{$logreferrals['excuseLetterPurpose']}}</u> purpose.</header>
      </div>
     
      <div style="width:100%; position: absolute; bottom: 0">
        <div>
          <header style="font-size: 18px; margin-top: 40px; text-align: right;"><u>{{ $physicianDetails->firstName }} {{ $physicianDetails->middleName }} {{ $physicianDetails->lastName }} {{ $physicianDetails->quantifier }}</u> M.D.</header>
          <header style="font-size: 18px; text-align: right;">Clinic Physician</header>   
          
        </div>
      </div>
    
    </div>
</body>
</html>