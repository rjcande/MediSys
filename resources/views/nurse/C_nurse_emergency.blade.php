@extends('nurse.layout.nurse')

@section('content')

		<div class="right_col" role="main">
        	<div class="">
        	<div class="page-title">
            <div class="title_left">
                <h3>EMERGENCY</h3>
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
            		<button class="btn btn-default" data-toggle="modal" data-target="#modalVitalSigns"
            				style="float: right;">Vital Signs</button>
            	</div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
	        <!--Content-->
	        	<div id="emergency" style="float:left; margin-top: 10px; width: 100%">
					<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
						height:30px; border-radius:8px;">&nbsp<b>Emergency Referral</b></p>
					
					<br>
				</div>
				<div id="emergencyReferral" style="float: left; width:100%;">
					<div style="float:left; margin-left:10px; font-size:18px; width:50px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> To</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;">
							<option>Ortho-Surgeon of Choice</option>
							<option>Pulmonologist of Choice</option>
							<option>Cardiologist of Choice</option>
							<option>Other</option>
						</select><br>
					</div><br>
				</div>

				<div style="float:left; margin-left:100px; font-size:13px; width:100%; color: #ff3f34;">
					<label><em>if other, please specify</em></label>
				</div>

				<div style="float:left; margin-left:100px; font-size:18px; width:100%;">
					<input type="text" name="" style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;">
				</div>

	        	<div id="symptoms" style="float:left; margin-top: 10px; width: 100%">
					<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
						height:30px; border-radius:8px;">&nbsp<b>Symptoms</b></p>
					<textarea rows="7" class="form-control" placeholder="Enter symptoms here"
						style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;"></textarea>
				</div>

				<div id="symptoms" style="float:left; margin-top: 50px; width: 100%">
					<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
						height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b></p>
					<textarea rows="7" class="form-control" placeholder="Enter treatment here"
						style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;"></textarea>
				</div>

				<div id="prescription" style="float:left; margin-top: 50px; width: 100%">
					<p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
						height:30px; border-radius:8px;">&nbsp<b>Prescription and Recommendation</b></p>
				</div>

				<div id="prescription">
					<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
							background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine</label>
					<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
							background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply</label>
				</div><br>
				<div id="medicine" style="float: left; width:480px;">
					<div style="float:left; margin-left:10px; font-size:18px; width:125px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Generic Name</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;">
						</select><br>
					</div><br>
				</div>

				<div id="medSupply" style="float: left;">
					<div style="float:left; margin-left:10px; font-size:18px; width:200px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Medical Supply Name</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;">
						</select><br>
					</div><br>
				</div><br>

				<div id="medicine" style="float: left; width:480px;">
					<div style="float:left; margin-left:10px; font-size:18px; width:125px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Brand</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;">
						</select><br>
					</div><br>
				</div>

				<div id="medSupply" style="float: left;">
					<div style="float:left; margin-left:10px; font-size:18px; width:200px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Brand</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;">
						</select><br>
					</div><br>
				</div><br>

				<div id="medicine" style="float: left; width:480px;">
					<div style="float:left; margin-left:10px; font-size:18px; width:125px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Quantity</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<input type="number" name="" style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;"><br>
					</div><br>
				</div>
				
				<div id="medSupply" style="float: left;">
					<div style="float:left; margin-left:10px; font-size:18px; width:200px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Quantity</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<input type="number" name="" style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;"required><br>
					</div><br>
				</div><br>

				<div id="medicine" style="float: left; width:480px;">
					<div style="float:left; margin-left:10px; font-size:18px; width:125px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Unit</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;">
						</select><br>
					</div><br>
				</div>

				<div id="medSupply" style="float: left;">
					<div style="float:left; margin-left:10px; font-size:18px; width:200px;">
						<label><header style="margin-bottom:12px; margin-left:25px;"> Unit</header>
						</label>
					</div>
					<div style="float:left; margin-left:40px; font-size:18px; width:300px;">
						<select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;">
						</select><br>
					</div><br>
				</div>

				<div id="medicineTable"class="row"
					style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
					<div class="table-container" style="width:470px;">
						<table class="table table-striped jambo_table bulk_action" style ="width: 470px;">
							<thead>
								<tr class="headings">
								  <th>
									<input type="checkbox" id="check-all" class="flat">
								  </th>
								  <th class="column-title">Generic Name </th>
								  <th class="column-title" style="padding-right:50px;">Brand </th>
								  <th class="column-title">Quantity<br>Used </th>
								  <th class="column-title">Unit </th>
								  <th class="column-title"></th>
								</tr>
							</thead>

							<tbody>
								<tr class="even pointer">
									<td class="a-center ">
										<input type="checkbox" class="flat" name="table_records">
									</td>
									<td class=" ">Paracetamol</td>
									<td class=" ">Biogesic</td>
									<td class=" ">2</td>
									<td class=" ">pcs</td>
									<td class=" "><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></td>
								</tr>
								<tr class="even pointer">
									<td class="a-center ">
										<input type="checkbox" class="flat" name="table_records">
									</td>
									<td class=" ">Paracetamol</td>
									<td class=" ">Biogesic</td>
									<td class=" ">2</td>
									<td class=" ">pcs</td>
									<td class=" "><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></td>
								</tr>
							</tbody>
						</table>
						<button class="btn btn-default"
							style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
						<button class="btn btn-default"
							style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
					</div>
				</div>

				<div id="medSupplyTable" class="row"
					style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
					<div class="table-container" style="width:470px;">
						<table class="table table-striped jambo_table bulk_action" style ="width: 470px;">
							<thead>
								<tr class="headings">
								  <th>
									<input type="checkbox" id="check-all" class="flat">
								  </th>
								  <th class="column-title">Generic Name </th>
								  <th class="column-title" style="padding-right:50px;">Brand </th>
								  <th class="column-title">Quantity<br>Used </th>
								  <th class="column-title">Unit </th>
								  <th class="column-title"></th>
								</tr>
							</thead>

							<tbody>
								<tr class="even pointer">
									<td class="a-center ">
										<input type="checkbox" class="flat" name="table_records">
									</td>
									<td class=" ">Paracetamol</td>
									<td class=" ">Biogesic</td>
									<td class=" ">2</td>
									<td class=" ">pcs</td>
									<td class=" "><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></td>
								</tr>
								<tr class="even pointer">
									<td class="a-center ">
										<input type="checkbox" class="flat" name="table_records">
									</td>
									<td class=" ">Paracetamol</td>
									<td class=" ">Biogesic</td>
									<td class=" ">2</td>
									<td class=" ">pcs</td>
									<td class=" "><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></td>
								</tr>
							</tbody>
						</table>
						<button class="btn btn-default"
							style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
						<button class="btn btn-default"
							style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
					</div>
				</div>

				<div id="recommendation" style="float:left; margin-top: 10px; width: 100%">
					<label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 90%;
							background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Recommendation/s</label>
					<textarea rows="7" class="form-control" placeholder="Enter recommendation/s here"
						style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 30px; width: 95%;"></textarea>
				</div>

				<div style="margin-top: 25px;float: left;text-align: center;width: 100%">
					<a href="C_nurse_medical_log.php"><button class="btn btn-success">SAVE</button></a>
					<a href="C_nurse_medical_log.php"><button class="btn btn-danger">CLOSE</button></a>
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
	<div id="modalVitalSigns" class="modal fade" role="dialog">
    	<div class="modal-dialog" style="width:680px">
        <!-- Modal content -->
            <div class="modal-content" style="background-color: #f7f1e3">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss = "modal">&times;</button>
						<h4 class="modal-title">Vital Signs</h4>
				</div>
                <div class="modal-body" style="color:#192a56; font-size:15px;">
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">No.: </label>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">1234 </label><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">Patient ID: </label>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">000001 </label><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">Blood Pressure: </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">Heart Rate: </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">Respiratory Rate: </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">Temperature: </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">Height (cm): </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">Weight (kg): </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">Body Mass Index: </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 170px; margin-bottom:10px;">BMI Range: </label>
					<input type="radio" class="flat" name ="bmi_range" checked="" required />&nbsp Normal
					<input type="radio" class="flat" name ="bmi_range"/>&nbsp Underweight
					<input type="radio" class="flat" name ="bmi_range"/>&nbsp Obese Class I
					<input type="radio" class="flat" name ="bmi_range"/>&nbsp Obese Class II
                </div>
				<div class="modal-footer" style="margin-right:0%">
					<a href="{{ url('/nursePrescription') }}"><button class="btn btn-success">DONE</button></a>
				</div>
            </div>
        </div>
	</div>
    <!--END Modal-->

<!-- MODAL -->
	<div id="modalEmergency" class="modal fade" role="dialog">
    	<div class="modal-dialog" style="width:680px">
        <!-- Modal content -->
            <div class="modal-content" style="background-color: #f7f1e3">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss = "modal">&times;</button>
						<h4 class="modal-title">Emergency</h4>
				</div>
                <div class="modal-body" style="color:#192a56; font-size:15px;">
					<label style="display: inline-block; width: 130px; margin-bottom:10px;">Condition: </label>
					
					<select class="" style="height: 32px; font-size:15px; border-radius: 12px;
						border: 1.5px solid gray; width: 455px">
                    	<option value="" disabled selected></option>
                   		<option value="Conscious">Conscious</option>
                   		<option value="Unconscious">Unconscious</option>
                    </select>
					<label style="display: inline-block;width: 130px; margin-bottom:10px;">Patient ID: </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 130px; margin-bottom:10px;">Patient Name: </label>
					<input type="text" name="" style="border-radius:6px; width:455px;"><br>
					<label style="display: inline-block;width: 130px; margin-bottom:10px;">Type: </label>
					<select class="" style="height: 32px; font-size:15px; border-radius: 12px;
						border: 1.5px solid gray; width: 455px">
                    	<option value="" disabled selected></option>
                   		<option value="Conscious">Student</option>
                   		<option value="Unconscious">Faculty/College</option>
                   		<option value="Unconscious">Admin/Department</option>
                   		<option value="Unconscious">Visitor</option>
                    </select>
					<br>
                </div>
				<div class="modal-footer" style="margin-right:0%">
					<a href="{{ url('/nurseEmergency') }}"><button class="btn btn-success">PROCEED</button></a>
				</div>
            </div>
        </div>
	</div>
<!--END Modal-->

@endsection