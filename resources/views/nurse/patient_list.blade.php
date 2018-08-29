@extends('nurse.layout.nurse')

@section('content')
	
	<div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Patients List</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                      <a href="{{ url('/register/patient') }}">
                        <button class="btn btn-round btn-success">Register Patient</button>    
                      </a>
                    </div>
        			   
                    <div class="col-md-2 col-sm-12 col-xs-12" style="width: 350px; float: right;">
                      <input type="text" placeholder="Search" id="search" class="form-control" style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- Content -->
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Patient ID </th>
                            <th class="column-title">Patient Name </th>
                            <th class="column-title">Type </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="8">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($patientList as $patient)
                            <tr class="even pointer">
                              <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                              </td>
                              <td class=" ">{{ $patient->patientID }}</td>
                              <td class=" ">{{$patient->lastName}}, {{$patient->firstName}} {{ $patient->middleName }} {{ $patient->quantifier }}</td>
                              <td class=" ">
                                @if($patient->patientType == 1)
                                  {{ "Student" }}
                                @elseif($patient->patientType == 2)
                                  {{ "Faculty/College" }}
                                @elseif($patient->patientType == 3)
                                  {{ "Admin/Dept" }}
                                 @elseif($patient->patientType == 4)
                                  {{ "Visitor" }}
                                @endif
                              </td>
                              <td class=" last">
                                    <a href="{{ route('personal.info', $patient->patientID) }}" title="">
                                      <button class="btn btn-info" data-toggle="tooltip" title="View More Info">
                                        <i class="fa fa-angle-double-right"></i>
                                      </button>
                                    </a>
                                    <button class="btn btn-danger delete-button" data-toggle="tooltip" title="Delete" data-id="{{ $patient->patientID }}" id="btnDelete">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                  
                                    <input type="hidden" name="type" value="view">
                                  </form>
                              </td>
                            </tr> 
                          @endforeach 
                        </tbody>
                      </table>
                    </div>
                    <!-- /Content -->
                  </div>
                </div>
              </div>
              <!-- /form input mask -->  

            </div>
          </div>
        </div>

<!-- Messages -->

@if(Session::has('message'))
<script>
  $(document).ready(function(){
    new PNotify({
      title: 'Regular Success',
      text: '{{ Session::get('message') }}',
      type: 'success',
      styling: 'bootstrap3'
    });
  });
</script>
@endif
<!-- /Messages -->


<script>
	$(window).load(function(){
    //Data Table
		var table = $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": 't'  
    });

    $('#search').keyup(function(){
      table.search($(this).val()).draw();
    });
    //Button clicks
    $('.delete-button').on('click', function(e){
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to .......!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
      .then((willDelete)=>{
        if (willDelete) {
          $.ajax({
            url: '/deletePatient/' + $(this).data('id'),
            type: 'get',
            success: function(output){
               swal({
                title: "",
                text: output.message,
                icon: "success",
               })
               .then((value)=>{
                location.reload(true);
               });
            }
          });
        }
      });
    });

	});
	
</script>
@endsection