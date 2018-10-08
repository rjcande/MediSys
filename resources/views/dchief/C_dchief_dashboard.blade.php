@extends('dchief.layout.dchief')

@section('content')

   <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Frequency of Patient's Visit (Year)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lineChartPatient"></canvas>
                  </div>
                  <div style="float: right;">
                   <!--  <a href="{{ url('/dchief/patient/condition/reports') }}">
                      <button class="btn btn-info">Patients' Conditions Statistics</button>
                    </a> -->
                  </div>
                </div>
              </div>

             <!--  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Patients' Conditions Statistics</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">



                    <div id="chart_plot_03" class="demo-placeholder"></div>
                    <div style="float: right;">
                      <a href="{{ url('/physician/patient/condition/reports') }}">
                        <button class="btn btn-info">View More Statistics</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div> -->
               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel" style="height: 100%">
                  <div class="x_title">
                    <h2>Patients' Appointment Schedule</h2>
                    <div class="col-md-5 col-sm-12 col-xs-12" style="float: right;">
                      <input type="text" placeholder="Search" id="search" class="form-control" style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="appointmentTable">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Patient Name </th>
                            <th class="column-title">Dentist </th>
                            <th class="column-title">Date </th> 
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($patientNames as $name)
                            @foreach($dentists as $dentist)
                              @if($name->appointmentID == $dentist->appointmentID)
                                <tr class="even-pointer" data-toggle="modal" data-target="#appointmentModal" style="cursor: pointer;" data-name="{{ $name->lastName }}, {{ $name->firstName }} {{ $name->middleName }} {{ $name->quantifier }}" data-apptid="{{ $name->appointmentID }}" data-id="{{ $name->patientID }}" data-physician="{{ $dentist->lastName }}, {{ $dentist->firstName }} {{ $dentist->middleName }} {{ $dentist->quantifier }}" data-date="{{ date('F d, Y', strtotime($name->appointmentDate)) }}">
                                  <td class=" ">{{ $name->lastName }}, {{ $name->firstName }} {{ $name->middleName }} {{ $name->quantifier }}</td>
                                  <td class=" ">{{ $dentist->lastName }}, {{ $dentist->firstName }} {{ $dentist->middleName }} {{ $dentist->quantifier }}</td>
                                  <td class=" ">{{ date('F d, Y', strtotime($name->appointmentDate)) }}</td>
                                </tr>
                              @endif
                            @endforeach
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Medical Supplies Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="{{ url('/dchief/medicine/reports') }}">
                      <button type="button" class="btn btn-primary btn-block">Medicine Report</button>
                    </a>
                    <a href="{{ url('/dchief/medical/supplies/reports') }}">
                      <button type="button" class="btn btn-primary btn-block">Medical Supplies Report</button>
                    </a>
                  </div>
                </div>
              </div>



             
              <!-- /form input mask -->  

            </div>
          </div>
        </div>

<div id="appointmentModal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Medical Log Information</h4>
      </div>

      <div class="modal-body">
          <form id="logPatientForm" class="form-horizontal form-label-left">
          @csrf()
        
          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="col-md-3 col-sm-3 col-xs-3">Patient ID: </label>
            <div>
              <label class="col-md-1 col-sm-3 col-xs-3" id="patientID_label"></label>
              <input type="hidden" name="patientID" id="patientID">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="col-md-3 col-sm-3 col-xs-3">Patient Name: </label>
            <label class="col-md-7 col-sm-3 col-xs-3" id="patientName_label"></label>
            <input type="hidden" name="patientName" id="patientName">
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="col-md-3 col-sm-3 col-xs-3">Dentist: </label>
            <label class="col-md-7 col-sm-3 col-xs-3" id="physician"></label>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="col-md-3 col-sm-3 col-xs-3">Appointment Schedule: </label>
            <label class="col-md-7 col-sm-3 col-xs-3" id="date"></label>
            <input type="hidden" id="appointmentID" name="appointmentID" value="">
          </div>  
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnNoShow">No Show</button>
        {{-- <button type="button" class="btn btn-success" id="btnReferToPhysician">Refer To Physician</button> --}}
        <button type="button" class="btn btn-danger" id="btnCancelAppointment">Cancel Appointment</button>
      </div>
         </form>
    </div>
   
  </div>

</div>

<!-- script -->


<script>
  $(document).ready(function(){
    var table = $('#appointmentTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": 5,
        "dom": '<"top"i>rt<"bottom"p><"clear">' 
    });

    $('#search').keyup(function(){
      table.search($(this).val()).draw();
    });

     //Opening Edit Modal
    $('#appointmentModal').on('show.bs.modal', function(e){
        var sourceElement = $(e.relatedTarget);
        var id = sourceElement.data('id');
        var apptid = sourceElement.data('apptid');
        var name = sourceElement.data('name');
        var physician = sourceElement.data('physician');
        var date = sourceElement.data('date');

        var modal = $(this);
        modal.find('.modal-body #patientName_label').text(name);
        modal.find('.modal-body #patientID_label').text(id);
        modal.find('.modal-body #physician').text(physician);
        modal.find('.modal-body #date').text(date);
        modal.find('.modal-body #appointmentID').val(apptid);
        modal.find('.modal-body #patientName').val(name);
        modal.find('.modal-body #patientID').val(id);
        

    });

    $('#btnNoShow').click(function(){
      $.ajax({
        url: '/dchief/delete/appointment/' + $('#appointmentID').val() + '/' + 'no_show',
        type: 'get',
        data: $(this).serialize(),
        success: function(output){
            swal({
                title: "Good job!",
                text: output.message,
                icon: "success",
                button: "OK",
              })
              .then((value)=>{
                location.reload(true);
              });
        } 
      });
    });

     $('#btnCancelAppointment').click(function(){
      $.ajax({
        url: '/dchief/delete/appointment/' + $('#appointmentID').val() + '/' + 'cancel_appointment',
        type: 'get',
        data: $(this).serialize(),
        success: function(output){
            swal({
                title: "Good job!",
                text: output.message,
                icon: "success",
                button: "OK",
              })
              .then((value)=>{
                location.reload(true);
              });
        } 
      });
    });

    // $('#btnReferToPhysician').click(function(){
    //   var checkRecord = 1;
    //   var hasRecord = { 
    //                     hasRecord: checkRecord,
    //                     hasAppointment: 1,
    //                     appointmentID: $('#appointmentID').val(),
    //                   };
    //   console.log($('#logPatientForm').serialize());
    //   $.ajax({
    //     url:'/nurse/log/patient',
    //     type:'get',
    //     data:$('#logPatientForm').serialize() + '&' + $.param(hasRecord),
    //     success: function(output){
    //         window.location.href = output.redirect;
    //     }
    //   });
    // });

     var totalPatientJanuary = 0;
     var totalPatientFebruary = 0;
     var totalPatientMarch = 0;
     var totalPatientApril = 0;
     var totalPatientMay = 0;
     var totalPatientJune = 0;
     var totalPatientJuly = 0;
     var totalPatientAugust = 0;
     var totalPatientSeptember = 0;
     var totalPatientOctober = 0;
     var totalPatientNovember = 0;
     var totalPatientDecember = 0;

     var array = {!! json_encode($totalPatient) !!};

     for (var i = 0; i < array.length; i++) {
        if (array[i].month == 1) {
              totalPatientJanuary = array[i].total;
          }

          if (array[i].month == 2) {
              totalPatientFebruary = array[i].total;
          }

          if (array[i].month == 3) {
              totalPatientMarch = array[i].total;
          }

          if (array[i].month == 4) {
              totalPatientApril = array[i].total;
          }

          if (array[i].month == 5) {
              totalPatientMay = array[i].total;
          }

          if (array[i].month == 6) {
              totalPatientJune = array[i].total;
          }

          if (array[i].month == 7) {
              totalPatientJuly = array[i].total;
          }

          if (array[i].month == 8) {
              totalPatientAugust =array[i].total;
          }

          if (array[i].month == 9) {
              totalPatientSeptember = array[i].total;
          }

          if (array[i].month == 10) {
              totalPatientOctober = array[i].total;
          }

          if (array[i].month == 11) {
              totalPatientNovember = array[i].total;
          }

          if (array[i].month == 12) {
              totalPatientDecember = array[i].total;
          }
     }


   

    if($("#lineChartPatient").length){
        var f=document.getElementById("lineChartPatient");
        new Chart(f,{type:"line",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov", "Dec"],datasets:[{label:"Patient",backgroundColor:"rgba(38, 185, 154, 0.31)",borderColor:"rgba(38, 185, 154, 0.7)",pointBorderColor:"rgba(38, 185, 154, 0.7)",pointBackgroundColor:"rgba(38, 185, 154, 0.7)",pointHoverBackgroundColor:"#fff",pointHoverBorderColor:"rgba(220,220,220,1)",pointBorderWidth:1,data:[totalPatientJanuary,totalPatientFebruary,totalPatientMarch,totalPatientApril,totalPatientMay,totalPatientJune,totalPatientJuly,totalPatientAugust,totalPatientSeptember,totalPatientOctober,totalPatientNovember,totalPatientDecember]}]}})
    }
  });
</script>
@endsection