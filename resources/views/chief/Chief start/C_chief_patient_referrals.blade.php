@extends('physician.layout.physician')

@section('content')

		<div class="right_col" role="main">
        	<div class="">
        	<div class="page-title">
            <div class="title_left">
                <h3>REFERRAL (List)</h3>
            </div>
        </div>

        <div class="clearfix"></div>
			
			<div class="row">
            
       	<!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">

                <div>
            		<label class="col-md-10 col-sm-12 col-xs-12"><h4>Patient ID, <em>Patient Name</em></h4></label>
               	</div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
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
					<div style="float:left; margin-left:10px; font-size:18px; width:80%;">
						<input style="width:350px; border-radius:8px; margin-bottom:0px; 172px;height: 25px;"></select><br>
					</div>
				</div>

				<div id="recommendation" style="float:left; margin-top: 10px; width: 100%">
					<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 90%;
							background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Remarks</label>
					<textarea rows="7" class="form-control" placeholder="Enter recommendation/s here"
						style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 30px; width: 95%;"></textarea>
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

		                <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> PA
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left:30px;"> AP-LAT
						<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Electrocardiography (ECG)<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Urinalysis<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Fecalysis<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Complete Blood Count (CBC)<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Fasting Blood Sugar (FBS)<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Blood Urea Nitrogen (BUN)<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Creatinine<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Total Cholesterol<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Triglycerides<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> High-Density Lipoprotein (HDL)<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Low-Density Lipoprotein (LDL)<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Uric Acid<br>
						<input type="checkbox" name="" class="radio-past" style="margin-bottom:12px; margin-left: 20px"> Serum Glutamic-Pyruvic Transaminase (SGPT)<br><br>
						<label style="margin-right:15px;">Others:</label>
						<textarea rows="4" class="form-control" placeholder="Enter diagnosis here"
							style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">
	              		</textarea>
	              	</div>
				</div>

				<div style="margin-top: 25px;float: left;text-align: center;width: 100%">
					<a href="{{ url('/physician/patient/diagnoses') }}"><button class="btn btn-primary">CLOSE</button></a>
                </div>
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
					<a href="{{ url('/physicianReferral') }}"><button class="btn btn-success">YES</button></a>
					<a href="{{ url('/physicianReferral') }}"><button class="btn btn-danger">NO</button></a>
				</div>
            </div>
        </div>
	</div>
<!--END Modal-->

@endsection