@extends('dchief.layout.dchief')

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
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <!-- Content -->
                    <div>
                      <table class="table table-striped table-bordered jambo_table bulk_action" style="width:100%" id="patientTable">
                        <thead>
                            <tr class="headings">
                              <th class="column-title"></th>
                              <th class="column-title">Student/Faculty Number</th>
                              <th class="column-title">Patient ID </th>
                              <th class="column-title">Patient Name </th>
                              <th class="column-title">Type</th>
                              <th class="column-title"></th>
                            </tr>
                        </thead>
                      <tbody>
                        @foreach ($patient as $patients)
                          <tr class="even pointer">
                            <td class="a-center">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">{{$patients->patientNumber}}</td>
                            <td class=" ">{{$patients->patientID}}</td>
                            <td class=" ">{{$patients->lastName}}, {{$patients->firstName}} {{$patients->middleName}} {{$patients->quantifier}}</td>
                            <td class=" ">
                              @if($patients->patientType == 1)
                              {{
                                  'Student'
                              }}
                              @elseif($patients->patientType == 2)
                              {{
                                  'Faculty/College'
                              }}
                              @elseif($patients->patientType == 3)
                              {{
                                  'Admin/Dept'
                              }}
                              @endif
                            </td>
                            <td class=" ">
                              <a href="{{ route('dchief.patientList.viewMore', $patients->patientID) }}">  
                                <button class='btn btn-info' type="submit" title='View More Info'>View More</button>
                              </a>
                              <a href="{{ route('dchief.patient.consultations', $patients->patientID) }}">  
                                <button class='btn btn-default' type="submit" title='View More Info'>Consultation</button>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>   
                        </table>
                        <a target="_blank" href="{{route('dchief.generate.patientList')}}">
                          <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                        </a>
                      </div>
                    <!-- /Content -->
                  </div>
                </div>
              </div>
              <!-- /form input mask -->  
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