<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DENTAL CERTIFICATE</title>
	<link rel="stylesheet" href="">
  	<style type="text/css" media="screen">
		.header{
			font-family: Arial;
			font-size: 20px;
			/*border: 1px solid black;*/
		}
		.date{
			/*display: inline-block;*/
			font-family: Arial;
			font-size: 20px;
			float: right;
			/*margin-right: 15%;*/
			margin-top: 20px;
			/*border: 1px solid black;*/
		}
		.body{
			font-size: 20px;
			font-family: Arial;
			/*margin-left: 15%;*/
			/*margin-right: 15%;*/
			/*border: 1px solid black;*/
		}
		.name{
			font-size: 20px;
			font-family: Arial;
			margin-left: 10%;
		}
		input[name="Name"]{
			width: 50%;
			font-size: 20px;
			/*border: 0;*/
		}
	</style>
</head>
<body>
	<div class="header">
		<center>
				<img src="{{asset('images/images/PUPLogo.png')}}" alt="PUP Logo" style="height: 100px; weight: 100px; float: left">
                <p style="margin-left: 25px">
                Republic of the Philippines <br>
                POLYTECHNIC UNIVERSITY OF THE PHILIPPINES<br>
                <em>Medical Services Department</em><br>
                <b>DENTAL SERVICES</b>
                </p>
            <b style="font-size: 30px ; ">REFERRAL SLIP</b>
		</center>
	</div>
	<div class="date">
		<label for="dateTxt">Date: <u>{{date('F d, Y', strtotime($date))}}</u></label>
	</div>
	<div class="body">
		<br><br>
		<p>TO: {{$referral}}</p>
		<p>Remark/s:</p>
		<textarea style="width: 100%; height: 200px; font-family:Arial;">{{$remarks}}</textarea>
		<br><br><br>
		<u style="width: 35%; margin-left: 60%;">{{$lastName}}, {{$firstName}} {{$middleName}} {{$quantifier}}</u><br>
		<label style=" float: right; margin-right: 10%"> Referring Dentist</label><br><br>
		<div style="width: 30%; float: right;">
           	<u>{{Session::get('accountInfo.licenseNumber')}}</u>
            <label style="width: 35%; float: right;">License Number:</label>
      	</div>
      	<br><br><br>
      	<div style="font-size: 18px; font-family: Arial;">
          <u>{{Session::get('patientInfo.patientName')}}</u><br>
          <label style="margin-left: 3%">Name of Patient</label>
        </div>
	</div>
</body>
</html>