@extends('dentist.layout.dentist')

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
               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Frequency of Patient's Visit (Year)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lineChart"></canvas>
                  </div>
                  <div style="float: right;">
                    <a href="{{ url('/dentist/patient/condition/reports') }}">
                      <button class="btn btn-info">Patients' Conditions Statistics</button>
                    </a>
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

              <div class="col-md-6 col-sm-6 col-xs-12" style="position: absolute; margin-top: 28%; width: 42%">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dental Supplies Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="{{ url('/dentist/medicine/reports') }}">
                      <button type="button" class="btn btn-primary btn-block">Medicine Report</button>
                    </a>
                    <a href="{{ url('/dentist/dental/supplies/reports') }}">
                      <button type="button" class="btn btn-primary btn-block">Dental Supplies Report</button>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel" style="height: 100%">
                  <div class="x_title">
                    <h2>Appointment Schedule</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action">
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
                            @foreach($physicians as $physician)
                              @if($name->appointmentID == $physician->appointmentID)
                                <tr class="even-pointer" style="cursor: pointer;" data-name="{{ $name->lastName }}, {{ $name->firstName }} {{ $name->middleName }} {{ $name->quantifier }}" data-apptid="{{ $name->appointmentID }}" data-id="{{ $name->patientID }}" data-physician="{{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }}" data-date="{{ date('F d, Y', strtotime($name->appointmentDate)) }}">
                                  <td class=" ">{{ $name->lastName }}, {{ $name->firstName }} {{ $name->middleName }} {{ $name->quantifier }}</td>
                                  <td class=" ">{{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }}</td>
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
              <label class="col-md-1 col-sm-3 col-xs-3" id="patientID"></label>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="col-md-3 col-sm-3 col-xs-3">Patient Name: </label>
            <label class="col-md-7 col-sm-3 col-xs-3" id="patientName"></label>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="col-md-3 col-sm-3 col-xs-3">Physician: </label>
            <label class="col-md-7 col-sm-3 col-xs-3" id="physician"></label>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="col-md-3 col-sm-3 col-xs-3">Appointment Schedule: </label>
            <label class="col-md-7 col-sm-3 col-xs-3" id="date"></label>
            <input type="hidden" id="appointmentID" name="appointmentID" value="">
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btnDelete">Delete Appointment</button>
        <button type="button" class="btn btn-success" id="btnDone">Appointment Done</button>
      </div>
         </form>
    </div>
   
  </div>

</div>

<!-- script -->


<script>
  $(document).ready(function(){
    $('.even-pointer').click(function(){
      $('#appointmentModal').modal('show');
    });

     //Opening Edit Modal
    $('#appointmentModal').on('show.bs.modal', function(e){

        var id = $('.even-pointer').data('id');
        var apptid = $('.even-pointer').data('apptid');
        var name = $('.even-pointer').data('name');
        var physician = $('.even-pointer').data('physician');
        var date = $('.even-pointer').data('date');

        var modal = $(this);
        modal.find('.modal-body #patientName').text(name);
        modal.find('.modal-body #patientID').text(id);
        modal.find('.modal-body #physician').text(physician);
        modal.find('.modal-body #date').text(date);
        modal.find('.modal-body #appointmentID').val(apptid);

    });

     $('#btnDelete').click(function(){
      $.ajax({
        url: '/physician/delete/appointment/' + $('#appointmentID').val() ,
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

     $('#btnDone').click(function(){
      $.ajax({
        url: '/physician/delete/appointment/' + $('#appointmentID').val() ,
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


  });
</script>
@endsection