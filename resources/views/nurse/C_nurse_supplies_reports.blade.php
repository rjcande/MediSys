@extends('nurse.layout.nurse')

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
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Medical Reports</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">January</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <!-- start accordion -->
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel">
                                <a class="panel-heading" role="tab" id="headingThirteen" data-toggle="collapse" href="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">
                                  <h4 class="panel-title">Current</h4>
                                </a>
                                <div id="collapseThirteen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThirteen">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered jambo_table bulk_action">
                                        <thead>
                                          <tr class="headings">
                                            <th class="column-title">No </th>
                                            <th class="column-title">Prescribed Medicine </th>
                                            <th class="column-title">Total Quantity </th>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                                
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingFourteen" data-toggle="collapse" href="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                  <h4 class="panel-title">Overall</h4>
                                </a>
                                <div id="collapseFourteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFourteen">
                                  <div class="panel-body">
                                   <div class="table-responsive">
                                      <caption>Most Prescribed Medicine:</caption>
                                      <table class="table table-striped table-bordered jambo_table bulk_action">
                                        <thead>
                                          <tr class="headings">
                                            <th class="column-title">No </th>
                                            <th class="column-title">Prescribed Medicine </th>
                                            <th class="column-title">Total Quantity </th>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                           
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                             
                            </div>
                            <!-- end of accordion -->
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">February</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <!-- start accordion -->
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel">
                                <a class="panel-heading" role="tab" id="headingFifteen" data-toggle="collapse" href="#collapseFifteen" aria-expanded="true" aria-controls="collapseFifteen">
                                  <h4 class="panel-title">Current</h4>
                                </a>
                                <div id="collapseFifteen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFifteen">
                                  <div class="panel-body">
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingSixteen" data-toggle="collapse" href="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                  <h4 class="panel-title">Overall</h4>
                                </a>
                                <div id="collapseSixteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSixteen">
                                  <div class="panel-body">
                                   
                                  </div>
                                </div>
                              </div>
                             
                            </div>
                            <!-- end of accordion -->
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">March</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          <h4 class="panel-title">April</h4>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          <h4 class="panel-title">May</h4>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          <h4 class="panel-title">June</h4>
                        </a>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>
                       

                        <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                          <h4 class="panel-title">July</h4>
                        </a>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingEight" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                          <h4 class="panel-title">August</h4>
                        </a>
                        <div id="collapseEight" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEight">
                          <div class="panel-body">
                            <!-- start accordion -->
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel">
                                <a class="panel-heading" role="tab" id="headingTwentySeven" data-toggle="collapse" href="#collapseTwentySeven" aria-expanded="true" aria-controls="collapseTwentySeven">
                                  <h4 class="panel-title">Current</h4>
                                </a>
                                <div id="collapseTwentySeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwentySeven">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered jambo_table bulk_action">
                                        <thead>
                                          <tr class="headings">
                                            <th class="column-title">No </th>
                                            <th class="column-title">Prescribed Medicine </th>
                                            <th class="column-title">Total Quantity </th>
                                            </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @php($ctr = 1)

                                          @foreach($usedMeds as $usedMed)
                                            @foreach($medicalSupply as $supply)
                                              @if($supply->medSupID == $usedMed->medSupplyID && $usedMed->month == 8 && $usedMed->year == date('Y'))
                                                <tr class="even-pointer">
                                                  <td class=" ">{{ $ctr }}</td>
                                                  <td class=" ">{{ $supply->medSupName }} {{ $supply->brand }}</td>
                                                  <td class=" ">{{ $usedMed->total }}</td>
                                                </tr> 
                                                @php($ctr++)
                                              @endif
                                            @endforeach
                                          @endforeach          
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingTwentyEight" data-toggle="collapse" href="#collapseTwentyEight" aria-expanded="false" aria-controls="collapseTwentyEight">
                                  <h4 class="panel-title">Overall</h4>
                                </a>
                                <div id="collapseTwentyEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwentyEight">
                                  <div class="panel-body">
                                   <div class="table-responsive">
                                      <caption>Most Used Medical Supply: <u>{{ $mostUsed->medSupName }} {{ $mostUsed->brand }}</u></caption>
                                      <table class="table table-striped table-bordered jambo_table bulk_action">
                                        <thead>
                                          <tr class="headings">
                                            <th class="column-title">No </th>
                                            <th class="column-title">Prescribed Medicine </th>
                                            <th class="column-title">2018 (Total Quantity) </th>
                                            <th>2019(Total Quantity)</th>
                                            <th>2020(Total Quantity)</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                       @php($ctr = 1)

                                          @foreach($usedMeds as $usedMed)
                                            @foreach($medicalSupply as $supply)
                                              @if($supply->medSupID == $usedMed->medSupplyID && $usedMed->month == 8 && $usedMed->year == date('Y'))
                                                <tr class="even-pointer">
                                                  <td class=" ">{{ $ctr }}</td>
                                                  <td class=" ">{{ $supply->medSupName }} {{ $supply->brand }}</td>
                                                  <td class=" ">{{ $usedMed->total }}</td>
                                                  <td></td>
                                                  <td></td>
                                                </tr> 
                                                @php($ctr++)
                                              @endif
                                            @endforeach
                                          @endforeach          
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                             
                            </div>
                            <!-- end of accordion -->
                          </div>
                        </div>
                      </div>

                     <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingNine" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                          <h4 class="panel-title">September</h4>
                        </a>
                        <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTen" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                          <h4 class="panel-title">October</h4>
                        </a>
                        <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingEleven" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                          <h4 class="panel-title">November</h4>
                        </a>
                        <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwelve" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                          <h4 class="panel-title">December</h4>
                        </a>
                        <div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwelve">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- end of accordion -->
                  </div>
                </div>
              </div>
              <!-- /form input mask -->  

            </div>
          </div>
        </div>


<!-- script -->
<script>
  $(document).ready(function(){
  

  });
</script>
@endsection