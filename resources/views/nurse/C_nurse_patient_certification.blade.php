@extends('nurse.layout.nurse')

@section('content')

		<div class="right_col" role="main">
        	<div class="">
        	<div class="page-title">
            <div class="title_left">
                <h3>Medical Log</h3>
            </div>
        </div>

        <div class="clearfix"></div>
			
			<div class="row">
            
       	<!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">

                <div>
            		<label class="col-md-10 col-sm-12 col-xs-12"><h4>{{ Session::get('request.patientID') }}, <em> {{  Session::get('request.patientName') }}</em></h4>
            		</label>
            	</div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
	        <!--Content-->
	        <form accept-charset="utf-8" id="saveForm">
	        	@csrf()
	        	<div id="attending-physician" style="float: left;">
					<div style="float:left; margin-left:10px; font-size:18px; width:200px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Attending Physician</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<select style="width:250px; border-radius:8px; margin-bottom:12px;height: 25px;" data-parsley-required="true" name="attendingPhysician">
							<option selected disabled hidden>Select Physician</option>
							@foreach($physicians as $physician)
                            	<option value="{{ $physician->id }}">{{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }}</option>
                          @endforeach
						</select><br>
					</div><br>
				</div>
				
				<div id="request">
					<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 95%;
							background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Request for:</label>
				</div><br>

				<div style="float:left; margin-left:50px; font-size:18px; width:50%;">
				
					<input type="checkbox" name="medCertEnrollment" class="radio-past" style="margin-bottom:12px;" value="1" data-parsley-multiple="certification" required data-parsley-error-message="Please select at least 1 of the certificates" data-parsley-errors-container="#error_container"/><label style="margin-left: 5px;">Medical Certificate for Enrollment</label>
					<br>
					<input type="checkbox" name="medCertOffOjt" class="radio-past" style="margin-bottom:12px;" value="1" data-parsley-multiple="certification">
					<label style="margin-left: 5px;" >Medical Certificate for OJT or Off-Campus Activity</label> 
					<br>
					<input type="checkbox" name="medCertAdminFaculty" class="radio-past" style="margin-bottom:12px;" value="1" data-parsley-multiple="certification"><label style="margin-left: 5px;">Medical Certificate for Administrative or Faculty</label>  <br>
					<input type="checkbox" name="medCertExcuseLetter" class="radio-past" style="margin-bottom:12px;" value="1" data-parsley-multiple="certification"><label style="margin-left: 5px;">Excuse Letter for Student</label> <br>
					<input type="checkbox" name="medCertWaver" class="radio-past" style="margin-bottom:12px;" value="1" data-parsley-multiple="certification"><label style="margin-left: 5px;">Waiver</label> 
					<br>
					<input type="hidden" name="patientID" value="{{ Session::get('request.patientID') }}">
					<input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('Y-m-d') }}" name="clinicLogDate">

          			<input type="hidden" class="form-control" style="border-radius:8px;" value="{{ date('h:i A') }}" name="clinicLogTime">

          			<div id="error_container">
          				
          			</div>
					
				</div>

				<div style="margin-top: 25px;float: left;text-align: center;width: 100%">
					<button class="btn btn-success">SAVE</button>
					<button class="btn btn-danger">CLOSE</button>
                </div>
            </form>
	        <!--/Content-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
        <!-- /form input mask -->  
			</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->

<script>
	$(document).ready(function(){
		//Bind Form for validation
		$('#saveForm').parsley();

		$('#saveForm').submit(function(e){
			e.preventDefault();
			$(this).parsley().validate();
			if ($(this).parsley().isValid()) {
				$.ajax({
					url: '/nurse/get/medical/certificate',
					type:'get',
					data: $(this).serialize(),
					success: function(output){
						swal({
							title: 'SUCCESS',
							text: output.message,
							icon: 'success'
						})
						.then((value)=>{
							window.location.href = '/nurse/patient/medical/log/edit/' + output.clinicLogID;
						});
					}
				});
			}
		});
	});
</script>

@endsection