@extends('dentalchief.layout.dentalchief')

@section('content')

      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Patient Record</h3>
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
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Patient ID </th>
                            <th class="column-title">Patient Name </th>
                            <th class="column-title">Type </th>
                            <th class="column-title no-link last"><span class="nobr"></span></th>
                            <th class="bulk-actions" colspan="8">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach ($patientRecord as $patientRecords)
                            <tr class="even pointer">
                              <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                              </td>
                              <td class=" ">{{$patientRecords->patientID}}</td>
                              <td class="">{{$patientRecords->firstName}} {{$patientRecords->middleName}} {{$patientRecords->lastName}} {{$patientRecords->quantifier}}</td>
                              <td class=" ">
                              @if($patientRecords->patientType == 1)
                              {{
                                  'Student'
                              }}
                              @elseif($patientRecords->patientType == 2)
                              {{
                                  'Faculty/College'
                              }}
                              @elseif($patientRecords->patientType == 3)
                              {{
                                  'Admin/Dept'
                              }}
                              @elseif($patientRecords->patientType == 4)
                              {{
                                  'Visitor'
                              }}
                              @endif
                              </td>
                              <td class=" last">
                              <a href="{{ route('dchief.view.dental.history', $patientRecords->dentalHistoryID)}}">
                              <button class='btn btn-success' name='btnViewHistory' type="submit" style='background-color:#218c74; color:white;'>View History</button></a>
                              <a href="{{ route('dchief.patient.consultations', $patientRecords->patientID) }}">  
                                <button class='btn btn-default' type="submit" title='View More Info'>Concerns</button>
                              </a>
                              <!-- <button class='btn btn-danger'><i class='fa fa-trash'></i></button></td> -->
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div> 

                  
                  <!--Content -->
              </div> <!-- name="x_content" -->
              </div> <!-- name="x_panel" -->
            </div>
            <!-- /form input mask -->  
          </div>
        </div>
      </div>

@endsection