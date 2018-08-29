@extends('physician.layout.physician')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Patient List</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
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
                              <td class=" ">{{$patient->lastName}}, {{$patient->firstName}} {{ $patient->middleName }}{{ $patient->quantifier }}</td>
                              <td class=" ">
                                @if($patient->patientType == 1)
                                  {{ "Student" }}
                                @elseif($patient->patientType == 2)
                                  {{ "Faculty/College" }}
                                @elseif($patient->patientType == 3)
                                  {{ "Admin/Dept" }}
                                @endif
                              </td>
                              <td class=" last">
                                <a href="{{ route('physician.patient.more.info', $patient->patientID) }}">
                                  <button class="btn btn-info" data-toggle="tooltip" title="View More Info">
                                    View More
                                  </button>
                                </a>
                                <a href="{{ route('physician.patient.diagnoses', $patient->patientID) }}">
                                  <button type="button" class="btn btn-default" data-toggle="tooltip" title="Consultation">Concerns</button>
                                </a>
                              </td>
                            </tr> 
                          @endforeach 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

<script>
  $(document).ready(function(){
    $('#patientTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false });
  });
</script>
@endsection