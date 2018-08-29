@extends('physician.layout.physician')

@section('content')

		<div class="right_col" role="main">
        	<div class="">
        	<div class="page-title">
            <div class="title_left">
                <h3>Referred Patient</h3>
            </div>
        </div>

        <div class="clearfix"></div>
			
			<div class="row">
            
       	<!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">

                <div>
            		<label class="col-md-10 col-sm-12 col-xs-12"><h4>{{ $id }}, <em>{{ $patientName }}</em></h4>
            		</label>
            	</div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
	        <!--Content-->
	        	<div id="request">
					<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 95%;
							background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Requesting for:</label>
				</div><br>
		
				<div style="float:left; margin-left:50px; font-size:18px; width:45%;">
					
					<input type="checkbox" name="medCertEnrollment" class="radio-past" style="margin-bottom:12px;" value="1"
					@if($logReferral['reqForMedCertEnrol'] == 1)
						{{ "checked" }}
					@endif>
					<label style="margin-left: 5px;">Medical Certificate for Enrollment</label>
					<br>
					<input type="checkbox" name="medCertOffOjt" class="radio-past" style="margin-bottom:12px;" value="1"
					@if($logReferral['reqForMedCertOffOJT'] == 1)
						{{ "checked" }}
					@endif>
					<label style="margin-left: 5px;">Medical Certificate for OJT or Off-Campus Activity</label> 
					<br>
					<input type="checkbox" name="medCertAdminFaculty" class="radio-past" style="margin-bottom:12px;" value="1"
					@if($logReferral['reqForMedCertAdminFaculty'] == 1)
						{{ "checked" }}
					@endif>
					<label style="margin-left: 5px;">Medical Certificate for Administrative or Faculty</label>  <br>
					<input type="checkbox" name="medCertExcuseLetter" class="radio-past" style="margin-bottom:12px;" value="1"
					@if($logReferral['reqForExcuseLetter'] == 1)
						{{ "checked" }}
					@endif>
					<label style="margin-left: 5px;">Excuse Letter for Student</label> <br>
					<input type="checkbox" name="medCertWaver" class="radio-past" style="margin-bottom:12px;" value="1"
					@if($logReferral['reqForWaver'] == 1)
						{{ "checked" }}
					@endif>
						<label style="margin-left: 5px;">Waver</label> 
					<br>
					
				</div>
				<div style="float:left; font-size:15px; width:45%;">
					<a href="{{ route('physician.generate.pdf.medical.cert.enrollment', [$logReferral['logReferralID'], $patientName]) }}" target="_blank">
						<button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;">View Document</button><br>
					</a>
					<button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;" data-toggle="modal" data-target="#modalCert">View Document</button><br>
					<button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;">View Document</button><br>
					<button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;">View Document</button><br>
					<button class"btn btn-default" style="border-radius: 8px">View Document</button><br>
				</div>

				<div style="margin-top: 25px;float: left;text-align: center;width: 100%">
					<a href="C_nurse_medical_log.php"><button class="btn btn-success">SAVE & PRINT</button></a>
					<a href="{{ URL::previous() }}"><button class="btn btn-danger">CLOSE</button></a>
                </div>
	        <!--/Content-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
        <!-- /form input mask -->  
			</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->

<div id="modalCert" class="modal fade" role="dialog">
    	<div class="modal-dialog" style="width:80%">
        <!-- Modal content -->
            <div class="modal-content" style="background-color: #f7f1e3">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss = "modal">&times;</button>
						<h4 class="modal-title">Medical Clearance</h4>
				</div>
                <div class="med-cert" style="float: left; margin-left: 50px; width: 90%; background-color: #f5f6fa; margin-bottom: 40px;">
	        		<header style="float: left; text-align: center; font-size: 15px;">Republic of the Philippines
	        		</header>
	        		<header style="float: left; text-align: center; font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
	        		</header>
	        		<header style="float: left; text-align: center; font-size: 15px;">MEDICAL SERVICES DEPARTMENT
	        		</header>
	        		<header style="float: left; text-align: center; font-size: 15px;">Sta. Mesa, Manila
	        		</header>

	        		<header style="float: left; text-align: center; font-size: 25px; margin-top: 20px;">
	        			<strong>MEDICAL CLEARANCE</strong>
	        		</header>

	        		<header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;">Date _________________________</header>

	        		<header style="float: left; font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It 		May Concern:</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; text">This is to certify that _______________________________________________ has been examined by<br>the undersigned and found to be physically fit at the time of examination.</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px;">This certification is issued upon the request for <u><strong>ENROLLMENT</strong></u> 		purpose.</header>

	        		<header style="float: right; font-size: 18px; margin-top: 40px; text-align: right;">_________________________ M.D.</header>
	        		<header style="float: right; font-size: 18px;text-align: right; margin-right: 90px">Clinic Physician</header>
	        		<header style="float: right; font-size: 18px; margin-top: 20px; text-align: right;">_______________________ Lic. No.</header>
	        	</div>

				<div class="modal-footer" style="margin-right:0%">
					<a href="{{ url('/physicianCertification') }}"><button class="btn btn-success">SAVE & PRINT</button></a>
					<button class="btn btn-danger" data-dismiss="modal">DONE</button>
				</div>
            </div>
        </div>
	</div>
    <!--END Modal-->

@endsection