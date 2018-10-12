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
			margin-top: 15px;
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
				<b>DENTAL SERVICES</b><br>
				<b style="margin-left: 70px">CERTIFICATION</b>
		</center>
	</div>
	<div class="date">
		<label for="dateTxt">Date: {{$certDate}}</label>
	</div>
	<div class="body">
		<br><br>
		<p>To Whom it may Concern:</p>
		<p class="name">This is to certify that Mr./Ms. <u>{{$certPatientName}}</u></p>
		<p>Has Undergone:
			<input style="margin-left: 7.5%" type="checkbox" 
			@if($certDentalExam == 1)
			{{"checked"}}
			@endif
			>
			<label>Dental Examination</label>
			<input style="margin-left: 9%" type="checkbox"
			@if($certOralProphylaxis == 1)
			{{"checked"}}
			@endif
			>
			<label>Oral Prophylaxis</label>
			<div>
				<input style="margin-left: 26%" type="checkbox"
				@if($certRestorationChk == 1)
				{{"checked"}}
				@endif
				>
				<label>Restoration: {{$certRestorationTxt}}</label>
				<input style="margin-left: 17.1%" type="checkbox"
				@if($certExtractionChk == 1)
				{{"checked"}}
				@endif
				>
				<label>Extraction: {{$certExtractionTxt}}</label>
			</div>
			<div>
				<br>
				<input style="margin-left: 26%" type="checkbox"
				@if($certOthersChk == 1)
				{{"checked"}}
				@endif
				>
				<label>Others:</label>
				<div style="border: 1px solid black; width: 66.6%; margin-left: 30%; padding: 10px;">
					{{$certOthersTextArea}}
				</div>
			</div>
		</p>
		<p>Recommendation/s:</p>
		<textarea style="width: 100%; height: 100px; font-family:Arial;">{{$certRecommendations}}</textarea>
		<p style="margin-left: 10%"><em>This certification is being issued upon request of the above-named patient for</em></p>
		<p><em>whatever purpose it may serve except medico-legal standards</em></p>
		<br>
		<u style="float: right;">{{$certDentistSigned}}</u><br>
		<label style=" float: right; margin-right: 10%"> D.M.D</label>
	</div>
</body>
</html>