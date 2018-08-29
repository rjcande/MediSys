@extends('chief.layout.chief')

@section('content')

		<div class="right_col" role="main">
        	<div class="">
        	<div class="page-title">
            <div class="title_left">
                <h3>REFERRAL</h3>
            </div>
        </div>

        <div class="clearfix"></div>
			
			<div class="row">
            
       	<!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">

                <div>
            		<label class="col-md-10 col-sm-12 col-xs-12"><h4>{{ $clinicLogInfo->patientID }}, <em>{{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</em></h4></label>
               	</div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="saveForm">
              	@csrf()
	        <!--Content-->
				<div id="emergency" style="float:left; margin-top: 10px; width: 100%">
					<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
						height:30px; border-radius:8px;">&nbsp<b>Referral</b></p>
					
					<br>
				</div>
				<div id="emergencyReferral" style="float: left; width:100%;">
					<div style="float:left; margin-left:10px; font-size:18px; width:50px;">
						<label><header style="margin-bottom:0px; margin-left:25px;"> To</header>
						</label>
					</div>
					<div style="float:left; margin-left:10px; font-size:18px; width:50px;">
						<select style="width:250px; border-radius:8px; margin-bottom:0px; 172px;height: 25px;" name="referTo" data-parsley-required="true">
							<option value="" disabled selected></option>
							<option value="0">Ortho-Surgeon of Choice</option>
							<option value="1">Pulmonologist of Choice</option>
							<option value="2">Cardiologist of Choice</option>
							<option value="3">Other</option>
						</select><br>
					</div>
					<div style="float:left; margin-left:22%; width:50%;">
						<label style="font-size:13px; color: #ff3f34;"><em>if other, please specify</em></label>
						<input type="text" name="referToOthers" style="width:350px; border-radius:8px; margin-bottom:12px;
							margin-left: 20px; height: 25px; font-size: 18px">
					</div>
				</div>

				<div id="recommendation" style="float:left; margin-top: 10px; width: 100%">
					<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 90%;
							background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Remarks</label>
					<textarea rows="7" class="form-control" placeholder="Enter remark/s here"
						style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 30px; width: 95%;" name="remark" data-parsley-required="true"></textarea>
				</div>

				<div id="emergency" style="float:left; margin-top: 50px; width: 100%">
					<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
						height:30px; border-radius:8px;">&nbsp<b>Laboratory Referral</b>
					</p><br>
				</div>

				<div>
					<label style="width: 130px; margin-bottom:15px; font-size: 18px; margin-left: 20px">Request for: </label>

					<header style="margin-right:15px; font-size: 18px; width: 10%; margin-left:25px;">Chest X-Ray</header>

					<div style="float:left; margin-left:25px; font-size:18px; width:100%;">

		                <input type="checkbox" name="chestXrayPA" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> PA
						<input type="checkbox" name="chestXrayAP_LAT" class="radio-past" style="margin-bottom:12px; margin-left:30px;" value="1"> AP-LAT
						<br>
						<input type="checkbox" name="electrocardiography" class="radio-past" style="margin-bottom:12px;" value="1"> Electrocardiography (ECG)<br>
						<input type="checkbox" name="urinalysis" class="radio-past" style="margin-bottom:12px;" value="1"> Urinalysis<br>
						<input type="checkbox" name="fecalysis" class="radio-past" style="margin-bottom:12px;" value="1"> Fecalysis<br>
						<input type="checkbox" name="cbc" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Complete Blood Count (CBC)<br>
						<input type="checkbox" name="fbs" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Fasting Blood Sugar (FBS)<br>
						<input type="checkbox" name="bun" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Blood Urea Nitrogen (BUN)<br>
						<input type="checkbox" name="creatinine" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Creatinine<br>
						<input type="checkbox" name="cholesterol" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Total Cholesterol<br>
						<input type="checkbox" name="triglycerides" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Triglycerides<br>
						<input type="checkbox" name="hdl" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> High-Density Lipoprotein (HDL)<br>
						<input type="checkbox" name="ldl" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Low-Density Lipoprotein (LDL)<br>
						<input type="checkbox" name="uricAcid" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Uric Acid<br>
						<input type="checkbox" name="sgpt" class="radio-past" style="margin-bottom:12px; margin-left: 20px" value="1"> Serum Glutamic-Pyruvic Transaminase (SGPT)<br><br>
						<label style="margin-right:15px;">Others:</label>
						<textarea rows="4" class="form-control" placeholder="Other Request"
							style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" name="otherRequest"></textarea>
						<input type="hidden" name="treatmentID" value="{{ $treatment['treatmentID'] }}">
	              	</div>
				</div>

				<div style="margin-top: 25px;float: left;text-align: center;width: 100%">
					<button class="btn btn-success" type="submit">SAVE</button>
					<a href="{{ URL::previous() }}"><button class="btn btn-danger" type="button">CLOSE</button></a>
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

<!-- MODAL -->
	<div id="modalPrint" class="modal fade" role="dialog">
    	<div class="modal-dialog" style="width:25%">
        <!-- Modal content -->
            <div class="modal-content" style="background-color: #f7f1e3">
				<div>
					<h4 style="display: inline-block; margin-top:20px; margin-left: 35px;">Print referral information?</h4>
				</div>
				<div class="modal-footer" style="margin-right:32%">
					<a href="{{ url('/mchief/referral') }}"><button class="btn btn-success">YES</button></a>
					<a href="{{ url('/mchief/referral') }}"><button class="btn btn-danger">NO</button></a>
				</div>
            </div>
        </div>
	</div>
<!--END Modal-->

<!-- script -->
<script>
	$(document).ready(function(){
		$('#saveForm').parsley();

		$('#saveForm').submit(function(e){
			e.preventDefault();

			if ($(this).parsley().isValid()) {
				$.ajax({
					url: '/mchief/refer/patient/outside',
					type: 'get',
					data: $(this).serialize(),
					success: function(output){
						alert(output.message);
					}
				});
			}
		})
	});
</script>
@endsection