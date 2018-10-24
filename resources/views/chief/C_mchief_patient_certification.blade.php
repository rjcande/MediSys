@extends('chief.layout.chief')

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
						<label style="margin-left: 5px;">Waiver</label> 
					<br>
					
				</div>

				<div style="float:left; font-size:15px; width:45%;">
					<!--<a href="{{ url('/physicianMedCertEnrollment') }}"><button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;">View Document</button></a><br>-->
					<button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;" data-toggle="modal" data-target="#modalCertEnrollment">View Document</button><br>
					<button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;" data-toggle="modal" data-target="#modalCertOffCampus">View Document</button><br>
					<button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;"data-toggle="modal" data-target="#modalCertAdmin">View Document</button><br>
					<button class"btn btn-default" style="border-radius: 8px; margin-bottom:8px;" data-toggle="modal" data-target="#modalCertExcuse">View Document</button><br>
					<button class"btn btn-default" style="border-radius: 8px" data-toggle="modal" data-target="#modalCertWaver">View Document</button><br>
				</div>

				<div style="margin-top: 25px;float: left;text-align: center;width: 100%">
					<button class="btn btn-success" id="btnDone" data-id="{{ $logReferral['logReferralID'] }}">DONE</button>
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

<div id="modalCertEnrollment" class="modal fade" role="dialog">
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

	        		<header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;margin-right: 10px;">Date <u>{{date('F d, Y',strtotime($logReferral['created_at']))}}</u></header>

	        		<header style="float: left; font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It 		May Concern:</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; margin-right: 10px;">This is to certify that <u>{{ $patientName }}</u> has been examined by the undersigned and found to be physically fit at the time of examination.</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This certification is issued upon request for <u><strong>ENROLLMENT</strong></u> 		purpose.</header>

	        		<header style="float: right; font-size: 18px; margin-top: 40px; text-align: right;margin-right: 10px;"><u>{{ Session::get('accountInfo.lastName') }}, {{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.quantifier') }}</u> M.D.</header>
	        		<header style="float: right; font-size: 18px;text-align: right; margin-right: 115px">Clinic Physician</header>
	        		<header style="float: right; font-size: 18px; margin-top: 20px; text-align: right; margin-right: 10px;"><u>{{ Session::get('accountInfo.licenseNumber') }}</u> Lic. No.</header>
	        	</div>

				<div class="modal-footer" style="margin-right:0%">
					<a href="{{ route('physician.generate.pdf.medical.cert.enrollment', [$logReferral['logReferralID'], $patientName]) }}" target="_blank"><button class="btn btn-success">SAVE & GENERATE MEDICAL CERTIFICATE</button></a>
					<button class="btn btn-danger" data-dismiss="modal">DONE</button>
				</div>
            </div>
        </div>
	</div>
    <!--END Modal-->
<form id="certOffCampus" action="{{ route('physician.generate.pdf.medical.cert.ojt.off_campus', [$logReferral['logReferralID'], $patientName]) }}" method="get" data-parsley-errors-messages-disabled target="_blank">
	@csrf()
<div id="modalCertOffCampus" class="modal fade" role="dialog">
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

	        		<header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;margin-right: 10px;">Date <u>{{date('F d, Y',strtotime($logReferral['created_at']))}}</u></header>

	        		<header style="float: left; font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It 		May Concern:</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This is to certify that <u>{{ $patientName }}</u> has been examined by the undersigned and found to be physically fit at the time of examination.</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This certification is issued upon request for <input type="text" name="certOffCampusPurpose" style="display: inline; width: 500px;" required value="{{$logReferral['ojtReqFor']}}"> purpose.
	        		</header>


	        		<header style="float: right; font-size: 18px; margin-top: 40px; text-align: right;margin-right: 10px;"><u>{{ Session::get('accountInfo.lastName') }}, {{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.quantifier') }}</u>< M.D.</header>
	        		<header style="float: right; font-size: 18px;text-align: right; margin-right: 115px">Clinic Physician</header>
	        		<header style="float: right; font-size: 18px; margin-top: 20px; text-align: right; margin-right: 10px;"><u>{{ Session::get('accountInfo.licenseNumber') }}</u> Lic. No.</header>
	        	</div>

				<div class="modal-footer" style="margin-right:0%">
					<button class="btn btn-success" type="submit">SAVE & GENERATE MEDICAL CERTIFICATE</button>
					<button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>
				</div>
            </div>
        </div>
	</div>
    <!--END Modal-->
</form>

<form id="certAdmin" action="{{ route('physician.generate.pdf.medical.cert.admin', [$logReferral['logReferralID'], $patientName]) }}" method="get" data-parsley-errors-messages-disabled target="_blank">
<div id="modalCertAdmin" class="modal fade" role="dialog">
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

	        		<header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;margin-right: 10px;">Date: <u>{{date('F d, Y',strtotime($logReferral['created_at']))}}</u></header>

	        		<header style="float: left; font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It 		May Concern:</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This is to certify that <u>{{ $patientName }}</u> has been examined by the undersigned at the PUP Medical Clinic on<input type="text" name="certAdminPurpose" style="display: inline; width: 370px;" required="" value="{{$logReferral['adminReqFor']}}">.</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This certification is issued upon request for <em><strong>Annual Medical Clearance</strong></em> but not for medico-legal purposes.</header>

	        		<header style="float: right; font-size: 18px; margin-top: 40px; text-align: right;margin-right: 10px;"><u>{{ Session::get('accountInfo.lastName') }}, {{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.quantifier') }}</u> M.D.</header>
	        		<header style="float: right; font-size: 18px;text-align: right; margin-right: 115px">Clinic Physician</header>
	        		<header style="float: right; font-size: 18px; margin-top: 20px; text-align: right; margin-right: 10px;"><u>{{ Session::get('accountInfo.licenseNumber') }}</u> Lic. No.</header>
	        	</div>

				<div class="modal-footer" style="margin-right:0%">
					<button class="btn btn-success">SAVE & GENERATE MEDICAL CERTIFICATE</button>
					<button class="btn btn-danger" data-dismiss="modal">CLOSE</button>
				</div>
            </div>
        </div>
	</div>
    <!--END Modal-->
</form>

<form id="excuseLetter" action="{{ route('physician.generate.pdf.excuse.letter', [$logReferral['logReferralID'], $patientName]) }}" method="get" data-parsley-errors-messages-disabled target="_blank">
<div id="modalCertExcuse" class="modal fade" role="dialog">
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
	        			<strong>EXCUSE FORM</strong>
	        		</header>

	        		<header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;margin-right: 10px;">Date: <u>{{date('F d, Y',strtotime($logReferral['created_at']))}}</u></header>

	        		<header style="float: left; font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This is to certify that <u>{{ $patientName }}</u> has been treated/is currently being treated for <input type="text" name="excuseReason" style="width: 200px;" required value="{{$logReferral['excuseLetterFor']}}">
	        		from <input type="text" name="excuseFrom" required value="{{$logReferral['excuseLetterFrom']}}"> to <input type="text" name="excuseTo" required value="{{$logReferral['excuseLetterTo']}}">.</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">This certification is issued upon request for <input type="text" name="excusePurpose" style="width: 300px;" required value="{{$logReferral['excuseLetterPurpose']}}">purpose.</header>

	        		<header style="float: right; font-size: 18px; margin-top: 40px; text-align: right;margin-right: 10px;"><u>{{ Session::get('accountInfo.lastName') }}, {{ Session::get('accountInfo.firstName') }} {{ Session::get('accountInfo.middleName') }} {{ Session::get('accountInfo.quantifier') }}</u> M.D.</header>
	        		<header style="float: right; font-size: 18px;text-align: right; margin-right: 115px">Clinic Physician</header>
	        	</div>

				<div class="modal-footer" style="margin-right:0%">
					<button class="btn btn-success">SAVE & GENERATE EXCUSE LETTER</button>
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
            </div>
        </div>
	</div>
    <!--END Modal-->
</form>
<form id="waver" action="{{ route('physician.generate.pdf.waver', [$logReferral['logReferralID'], $patientName]) }}" method="get" data-parsley-errors-messages-disabled target="_blank">
<div id="modalCertWaver" class="modal fade" role="dialog">
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

	        		<header style="float: right; font-size: 18px; margin-top: 30px; text-align: right;margin-right: 10px;">Date: <u>{{date('F d, Y',strtotime($logReferral['created_at']))}}</u></header>

	        		<header style="float: left; font-size: 18px; margin-top: 30px; margin-left: 40px;">To Whom It May Concern:</header>

	        		<header style="float: left; font-size: 18px; margin-top: 20px; margin-left: 40px; text-indent: 50px; margin-right: 10px;">I, <u>{{ $patientName }}</u> enrolled at the College of <input type="text" name="college" required value="{{ $logReferral['waiverCollegeOf'] }}"> Department of <input type="text" name="department" required value="{{ $logReferral['waiverDepartmentOf'] }}">, was seen and examined at the PUP Medical Clinic dated <u>@if(isset($logReferral['created_at'])){{date('F d, Y',strtotime($logReferral['created_at']))}}@else{{ date('F d, Y') }}@endif
</u> with the diagnosis of <input type="text" name="diagnosis" required value="{{ $logReferral['waiverDiagnosis'] }}"
>. I promise to come back for a follow-up <br>check-up on <input type="date" name="followUp" required value="{{ $logReferral['waiverFollowUp'] }}"> as advised.</header>

	        		<header style="float: right; font-size: 18px; margin-top: 40px; text-align: right;margin-right: 10px;">_______________________________</header>
	        		<header style="float: right; font-size: 18px;text-align: right; margin-right: 115px">Signature</header>
	        	</div>

				<div class="modal-footer" style="margin-right:0%">
					<button class="btn btn-success" type="submit">SAVE & GENERATE WAIVER</button>
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
            </div>
        </div>
	</div>
    <!--END Modal-->
</form>

<script>
	$(document).ready(function(){
		//bind forms for validation
		$('#certOffCampus').parsley();
		$('#certAdmin').parsley();
		$('#excuseLetter').parsley();
		$('#waver').parsley();
		 //reset form on modal hide
	    $('#modalCertOffCampus').on('hidden.bs.modal', function () {
	      $('#certOffCampus')[0].reset();
	    })

	    $('#modalCertAdmin').on('hidden.bs.modal', function () {
	      $('#certAdmin')[0].reset();
	    })

	    $('#modalCertExcuse').on('hidden.bs.modal', function () {
	      $('#excuseLetter')[0].reset();
	    })

	    $('#modalCertWaver').on('hidden.bs.modal', function () {
	    	$('#waver')[0].reset();
	    })

	    //Done
	    $('#btnDone').on('click', function(e){

	    	$.ajax({
	    		url:'/mchief/update/log/referrals/' + $(this).data('id'),
	    		type: 'get',
	    		data: {status: 2},
	    		success: function(){
	    			swal({
		                title: "Good job!",
		                icon: "success",
		                button: "OK",
		            })
	              	.then((value)=>{
	                	window.location.href = "/mchief/referred/patients";
	              	});
	    		}
	    	});
	    });
	});
</script>
@endsection