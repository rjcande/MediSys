@extends('physician.layout.physician')

@section('content')

		<div class="right_col" role="main">
        	<div class="">
        	<div class="page-title">
            <div class="title_left">
                <h3>Patient Records</h3>
            </div>
        </div>

        <div class="clearfix"></div>
			
			<div class="row">
            
       	<!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-2 col-sm-12 col-xs-12" style="width: 350px; float: right;">
                      <input type="text" placeholder="Search" id="search" class="form-control" style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                    </div>     
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
	        <!--Content-->
	        	<div>
                    <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Patient ID </th>
                              <th class="column-title">Patient Name </th>
                              <th class="column-title">Type </th>
                              <th class="column-title">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach($diagnoses as $info)
                                <tr class="even pointer">
                                    <td class=" ">{{ $info->patientID }}</td>
                                    <td class=" ">{{ $info->lastName }}, {{ $info->firstName }} {{ $info->middleName }} {{ $info->quantifier }}</td>
                                    <td class=" ">
                                        @if($info->patientType == 1)
                                            {{ "Student" }}
                                        @elseif($info->patientType == 2)
                                            {{ "Faculty/College" }}
                                        @elseif($info->patientType == 3)
                                            {{ "Admin/Dept" }}
                                        @elseif($info->patientType == 4)
                                            {{ "Visitor" }}
                                        @endif
                                    </td>
                                    <td class=" " style="width: 300px;">
                                        <a href="{{ route('physician.view.history', ['id' => $info->patientID, 'clinicLogID' => $info->clinicLogID]) }}""><button
                                            class="btn btn-default" style="background-color:#218c74; color:white">View History</button>
                                        </a>
                                        <a href="{{ route('physician.referred.patient.diagnoses', $info->patientID) }}"><button
                                            class="btn btn-default" style="background-color:#33d9b2; color:white;">Concerns</button>
                                        </a>
                                   
                                </tr>
                            @endforeach
                        </tbody>     
                    </table>
                </div>
	        <!--/Content-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
	        </div>	<!--wag burahin no matter what-->
        <!-- /form input mask -->  
			</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->
        	</div>	<!--wag burahin no matter what-->


<!-- script -->
<script>
    $(document).ready(function(){
        var table = $('#patientTable').DataTable({
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "dom": '<"top"i>rt<"bottom"p><"clear">' 
        });

        $('#search').keyup(function(){
            table.search($(this).val()).draw();
        });
    });
</script>

@endsection