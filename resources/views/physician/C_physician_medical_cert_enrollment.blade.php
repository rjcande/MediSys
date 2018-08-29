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
            		<label class="col-md-10 col-sm-12 col-xs-12"><h4>Patient ID, <em>Patient Name</em></h4>
            		</label>
            	</div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
	        <!--Content-->
	        	<div class="med-cert" style="float: left; margin-left: 50px; width: 90%; background-color: #f5f6fa;">
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

				<div style="margin-top: 25px;float: left;text-align: center;width: 100%">
					<a href="C_nurse_medical_log.php"><button class="btn btn-success">SAVE & PRINT</button></a>
					<a href="C_nurse_medical_log.php"><button class="btn btn-danger">CLOSE</button>
                </div>
	        <!--/Content-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
        <!-- /form input mask -->  
			</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->

@endsection