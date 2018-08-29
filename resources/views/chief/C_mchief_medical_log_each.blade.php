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
                      <table class="table table-striped table-bordered jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Symptoms </th>
                            <th class="column-title">Generic Name </th>
                            <th class="column-title">Brand </th>
                            <th class="column-title">Quantity Used </th>
                            <th class="column-title">Supply Name </th>
                            <th class="column-title">Brand </th>
                            <th class="column-title">Quantity Used </th>
                            <th class="column-title">Attending Physician </th>
                            <th class="column-title">Assisting Nurse </th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Time </th>
                          </tr>
                        </thead>

                        <tbody>
                        @php($ctr = 1)

                        @foreach($medicalLogs as $medicalLog)
                          <tr class="even pointer">
                            <td class="a-center">{{ $ctr }}</td>
                            <td class="">{{ $medicalLog->symptoms }}</td>
                            <td class=" ">
                                @foreach($usedMed as $medicine)
                                @if($medicine->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $medicine->genericName }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                               @foreach($usedMed as $medicine)
                                @if($medicine->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $medicine->brand }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                               @foreach($usedMed as $medicine)
                                @if($medicine->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $medicine->quantity }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                               @foreach($usedMedSupply as $supply)
                                @if($supply->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $supply->medSupName }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                             @foreach($usedMedSupply as $supply)
                                @if($supply->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $supply->brand }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                              @foreach($usedMedSupply as $supply)
                                @if($supply->clinicLogID == $medicalLog->clinicLogID)
                                  <p>
                                    {{ $supply->quantity }}
                                  </p>
                                @endif
                              @endforeach
                            </td>
                            <td class=" ">
                              @if($physician['lastName'])
                                {{ $physician['lastName'] }}, {{ $physician['firstName'] }} {{ $physician['middleName'] }} {{ $physician['quantifier'] }}
                              @endif
                            </td>
                            <td class=" ">
                               {{ $medicalLog->lastName }}, {{ $medicalLog->firstName }} {{ $medicalLog->middleName }} {{ $medicalLog->quantifer }}
                            </td>
                            <td class=" ">
                              {{ date('m-d-Y', strtotime($medicalLog->clinicLogDateTime)) }}
                            </td>
                            <td class=" last">{{ date('h:i a', strtotime($medicalLog->clinicLogDateTime)) }}</td>
                          </tr> 
                          @php($ctr++)
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    
                    <div style="float: right; margin-top:30px;">
                      <a href="{{ route('mchief.patient.more.info', $patientInfo->patientID) }}"> 
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

@endsection