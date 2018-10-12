@extends('chief.layout.chief')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Logs</h3>
                <label style="font-style: italic; font-size: 18px;">Patient ID: </label>
                <label style="font-style: italic; font-size: 18px;">
                  {{ $patientInfo->patientID }}
                </label><br>
                <label style="font-style: italic; font-size: 18px;">Patient Name: </label>
                <label style="font-style: italic; font-size: 18px;">
                  {{ $patientInfo->lastName }}, {{ $patientInfo->firstName }} {{ $patientInfo->middleName }} {{ $patientInfo->quantifier }}
                </label><br>
                <label style="font-style: italic; font-size: 18px;">Patient Type: </label>
                <label style="font-style: italic; font-size: 18px;">
                  @if($patientInfo->patientType == 1)
                    {{ "Student" }}
                  @elseif($patientInfo->patientType == 2)
                    {{ "Faculty/College" }}
                  @elseif($patientInfo->patientType == 3)
                    {{ "Admin/Dept" }}
                  @endif
                </label>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   <!-- Content -->
                    <div>
                      <p style="font-size: 20px; color:white; background: linear-gradient(to right, #16a085, white);height:30px; border-radius:8px;">&nbsp<b><em>Medical Log</em></b>
                      </p>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="medicalTable">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Activity/Concern</th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Time In </th>
                            <th class="column-title">Time Out</th>
                            <th class="column-title">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                        @php($ctr = 1)

                        @foreach($medicalLogs as $medicalLog)
                          <tr class="even pointer">
                            <td class="a-center">{{ $ctr }}</td>

                            <td>
                              @if($medicalLog->concern == 0)
                                {{ "Consultation" }}
                              @elseif($medicalLog->concern == 1)
                                {{ "Letter/Certification" }}
                              @endif

                            </td>
                            <td class=" ">
                             {{ date('F d, Y', strtotime($medicalLog->clinicLogDateTime)) }}
                            </td>
                            <td class=" ">
                              {{ date('h:i a', strtotime($medicalLog->clinicLogDateTime)) }}
                            </td>
                            <td class=" ">
                              @if($medicalLog->timeOut)
                                {{ date('h:i a', strtotime($medicalLog->timeOut)) }}
                              @else
                                {{ "NONE" }}
                              @endif
                            </td>
                           <td>
                              {{--  <!-- <a href="{{ route('nurse.patient.medical.log.edit', $medicalLog->clinicLogID) }}">
                                  <button class="btn btn-primary" data-toggle="tooltip" title="View More Info">
                                    <i class="fa fa-angle-double-right"></i>
                                  </button>
                                </a> -->  --}}

                                  <button class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                  </button>
                           </td>
                          </tr>
                          @php($ctr++)
                        @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div style="float: right; margin-top:30px;">
                      {{--  <a href="{{ url('/print/medical/log/each', $patientInfo->patientID) }}" target="_blank">
                          <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print Medical Logs</button>
                      </a>  --}}
                      <a href="{{ url('/mchief/archived/patients/viewMore', $patientInfo->patientID) }}">
                        <button class="btn btn-primary">BACK</button>
                      </a>
                      </div>
          </div>
        </div>
                   <!-- /Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<script>
  $(document).ready(function(){
    //delete button is clicked
    $('.delete-button').on('click', function(){
     swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
     .then((willDelete)=>{
        if (willDelete) {
          $.ajax({
            url: '/nurse/delete/clinic/log/' + $(this).data('id'),
            type: 'get',
            success: function(output){
              swal({
                title: "SUCCESS",
                text: output.message,
                icon: "success",
              })
              .then((value)=>{
                location.reload(true);
              });
            }
          });
        }
     })
    });
  });
</script>
@endsection
