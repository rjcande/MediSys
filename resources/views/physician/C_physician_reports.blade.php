
@extends('physician.layout.physician')

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Medicine Prescribed Statistics</h3>
      </div>
    </div>

    <div class="clearfix"></div>
      <div class="row">
              
      <!-- form input mask -->
      @if(count($top_weekly) >= 4)
      <div style="margin-bottom: 25%">
         <div style="float: left; height: 25%; width: 32%; margin-left: 1%; border-radius: 20px; background-color: #ffeaa7; margin-top: 2%">
            <div class="x_content">
               <table style="width:100%">
                  <tbody>
                     <tr>
                        <th style="width:37%;">
                           <p>Most Common Medicine Prescribed within the Week</p>
                        </th>

                        <th>
                           <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p>Medicine</p>
                           </div>
                           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                              <p>Percentage</p>
                           </div>
                        </th>
                     </tr>

                     <tr>
                        <td>
                           <iframe class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; width: 100%; height: 0px; right: 0px; bottom: 0px; display: block; position: absolute;">
                           </iframe>
                           <canvas width="175" height="175" id="medicine_weekly" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;">
                           </canvas>
                        </td>
                        <td>
                           <table class="tile_info">
                              <tbody>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square blue"></i>{{ $top_weekly[0]['genericName'] }} </p>
                                    </td>
                                    <td>{{ $top1_weekly }}%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square green"></i>@if(isset($top_weekly[1]['genericName'])){{ $top_weekly[1]['genericName'] }}@endif </p>
                                    </td>
                                    <td>{{ $top2_weekly }}%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square purple"></i>@if(isset($top_weekly[2]['genericName'])){{ $top_weekly[2]['genericName'] }}@endif </p>
                                    </td>
                                    <td>{{ $top3_weekly }}%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square aero"></i>@if(isset($top_weekly[3]['genericName'])){{ $top_weekly[3]['genericName'] }}@endif </p>
                                    </td>
                                    <td>{{ $top4_weekly }}%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square red"></i>Others </p>
                                    </td>
                                    <td>{{ $topOther_weekly }}%</td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>

         <div style="float: left; height: 25%; width: 32%; margin-left: 1%; border-radius: 20px; background-color: #ffeaa7; margin-top: 2%">
            <div class="x_content">
               <table style="width:100%">
                  <tbody>
                     <tr>
                        <th style="width:37%;">
                           <p>Most Common Medicine Prescribed within the Month</p>
                        </th>
                        <th>
                           <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p>Medicine</p>
                           </div>
                           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                              <p>Percentage</p>
                           </div>
                        </th>
                     </tr>
                     <tr>
                        <td>
                           <iframe class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; width: 100%; height: 0px; right: 0px; bottom: 0px; display: block; position: absolute;">
                           </iframe>
                           <canvas width="175" height="175" id="medicine_month" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;">
                          </canvas>
                        </td>
                        <td>
                           <table class="tile_info">
                              <tbody>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square blue"></i>{{ $percent_month[0]->genericName }} </p>
                                    </td>
                                    <td>{{ $top1_month }}%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square green"></i>{{ $percent_month[1]->genericName }} </p>
                                    </td>
                                    <td>{{ $top2_month }}%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square purple"></i>{{ $percent_month[2]->genericName }} </p>
                                    </td>
                                    <td>{{ $top3_month }}%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square aero"></i>@if(isset($percent_month[3]->genericName)){{ $percent_month[3]->genericName }}@endif </p>
                                    </td>
                                    <td>{{ $top4_month }}%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square red"></i>Others </p>
                                    </td>
                                    <td>{{ $topOther_month }}%</td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>

         <div style="float: left; height: 25%; width: 32%; margin-left: 1%; border-radius: 20px; background-color: #ffeaa7; margin-top: 2%;">
            <div class="x_content">
               <table style="width:100%">
                  <tbody>
                     <tr>
                        <th style="width:37%;">
                           <p>Most Common Medicine Prescribed within the Year</p>
                        </th>
                        <th>
                           <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p>Medicine</p>
                           </div>
                           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                              <p>Percentage</p>
                           </div>
                        </th>
                     </tr>
                     <tr>
                        <td>
                           <iframe class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; width: 100%; height: 0px; right: 0px; bottom: 0px; display: block; position: absolute;">
                           </iframe>
                           <canvas width="175" height="175" id="medicine_year" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;">
                           </canvas>
                        </td>
                        <td>
                           <table class="tile_info">
                              <tbody>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square blue"></i>{{ $percent_year[0]->genericName }} </p>
                                    </td>
                                    <td>{{ $top1_year }}%</td>
                                 </tr>
                              <tr>
                                 <td>
                                    <p><i class="fa fa-square green"></i>{{ $percent_year[1]->genericName }} </p>
                                 </td>
                                 <td>{{ $top2_year }}%</td>
                              </tr>
                              <tr>
                                 <td>
                                    <p><i class="fa fa-square purple"></i>{{ $percent_year[2]->genericName }} </p>
                                 </td>
                                 <td>{{ $top3_year }}%</td>
                              </tr>
                              <tr>
                                 <td>
                                    <p><i class="fa fa-square aero"></i>@if(isset($percent_year[3]->genericName)){{ $percent_year[3]->genericName }}@endif </p>
                                 </td>
                                 <td>{{ $top4_year }}%</td>
                              </tr>
                              <tr>
                                 <td>
                                    <p><i class="fa fa-square red"></i>Others </p>
                                 </td>
                                 <td>{{ $topOther_year }}%</td>
                              </tr>
                           </tbody></table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      @endif
      <!----------------------------------------------------COLLAPSIBLE---------------------------------------------------->
      <div style="margin-top: 20px; float: left; width: 100%">
         <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
            <div class="panel">
               <a class="panel-heading collapsed" id="headingOne1" role="tab" aria-expanded="false" aria-controls="collapseOne" href="#collapseOne1" data-toggle="collapse" data-parent="#accordion1">
                  <h4 class="panel-title">Weekly (As of {{ date('F') }}, {{ date('Y') }})</h4>
               </a>
               <div class="panel-collapse collapse " id="collapseOne1" role="tabpanel" aria-expanded="false" aria-labelledby="headingOne" style="height: 0px;">
                  <div class="panel-body">

                  <!----------------------------------------------WEEKLY TABS--------------------------------------------->
                     <div role="tabpanel" data-example-id="togglable-tabs">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                           @php
                              $active;
                              if(date('d') >= 1 && date('d') <= 7){
                                 $active = 1;
                              }
                              elseif(date('d') >= 8 && date('d') <= 14){
                                 $active = 2;
                              }
                              elseif(date('d') >= 15 && date('d') <= 21){
                                 $active = 3;
                              }
                              elseif(date('d') >= 22 && date('d') <= 28){
                                 $active = 4;
                              }
                              elseif(date('d') >= 29 && date('d') <= 31){
                                 $active = 5;
                              }
                           @endphp
                           <li role="presentation" class="@if($active == 1){{ 'active' }}@endif">
                              <a id="home-tab" role="tab" aria-expanded="true" href="#tab_content1" data-toggle="tab">Week 1</a>
                           </li>
                           <li role="presentation" class="@if($active == 2){{ 'active' }}@endif">
                              <a id="profile-tab" role="tab" aria-expanded="false" href="#tab_content2" data-toggle="tab">Week 2</a>
                           </li>
                           <li role="presentation" class="@if($active == 3){{ 'active' }}@endif">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content3" data-toggle="tab">Week 3</a>
                           </li>
                           <li role="presentation" class="@if($active == 4){{ 'active' }}@endif">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content4" data-toggle="tab">Week 4</a>
                           </li>
                           <li role="presentation" class="@if($active == 5){{ 'active' }}@endif">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content16" data-toggle="tab">Week 5</a>
                           </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade @if($active==1){{'active in'}}@endif" id="tab_content1" role="tabpanel" aria-labelledby="home-tab">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                          <header style="display: inline;">Number of Medicine Prescribed a Day</header>
                                          <th class="column-title" style="width: 20%">Brand Name</th>
                                          <th class="column-title">Day 1</th>
                                          <th class="column-title">Day 2</th>
                                          <th class="column-title">Day 3</th>
                                          <th class="column-title">Day 4</th>
                                          <th class="column-title">Day 5</th>
                                          <th class="column-title">Day 6</th>
                                          <th class="column-title">Day 7</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                       @foreach($results as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($prescriptions as $prescription)
                                                @if($prescription->medicineID == $key && $prescription->month == date('m'))
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                 @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 1 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 2 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 3 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 4 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 5 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 6 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 7 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                       </tr>
                                
                                    @endforeach
                                    </tbody>
                                 </table>
                                 <a href="{{ url('/print/medicine/reports/week', 1) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                                 </a>
                              </div>
                           </div>

                           <div class="tab-pane fade @if($active==2){{'active in'}}@endif" id="tab_content2" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                          <header style="display: inline;">Number of Medicine Prescribed a Day</header>
                                          <th class="column-title" style="width: 20%">Brand Name</th>
                                          <th class="column-title">Day 8</th>
                                          <th class="column-title">Day 9</th>
                                          <th class="column-title">Day 10</th>
                                          <th class="column-title">Day 11</th>
                                          <th class="column-title">Day 12</th>
                                          <th class="column-title">Day 13</th>
                                          <th class="column-title">Day 14</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($results as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($prescriptions as $prescription)
                                                @if($prescription->medicineID == $key && $prescription->month == date('m'))
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                 @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 8 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 9 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 10 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 11 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 12 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 13 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 14 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                       </tr>
                                
                                    @endforeach
                                    </tbody>
                                 </table>
                                 <a href="{{ url('/print/medicine/reports/week', 2) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                                 </a>
                              </div>
                           </div>

                           <div class="tab-pane fade @if($active==3){{'active in'}}@endif" id="tab_content3" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Day</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Day 15</th>
                                       <th class="column-title">Day 16</th>
                                       <th class="column-title">Day 17</th>
                                       <th class="column-title">Day 18</th>
                                       <th class="column-title">Day 19</th>
                                       <th class="column-title">Day 20</th>
                                       <th class="column-title">Day 21</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                     @foreach($results as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($prescriptions as $prescription)
                                                @if($prescription->medicineID == $key && $prescription->month == date('m'))
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                 @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 15 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 16 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 17 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 18 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 19 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 20 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 21 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports/week', 3) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($active==4){{'active in'}}@endif" id="tab_content4" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Day</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Day 22</th>
                                       <th class="column-title">Day 23</th>
                                       <th class="column-title">Day 24</th>
                                       <th class="column-title">Day 25</th>
                                       <th class="column-title">Day 26</th>
                                       <th class="column-title">Day 27</th>
                                       <th class="column-title">Day 28</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($prescriptions as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 22 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 23 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 24 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 25 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 26 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 27 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @foreach($medicine as $index => $value)
                                                @if($value['day'] == 28 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                   {{ $value['total'] }}
                                                @endif
                                             @endforeach
                                          </td>
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports/week', 4) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>
                        <div class="tab-pane fade @if($active==5){{'active in'}}@endif" id="tab_content16" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Day</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       @if($maxDays == 29)
                                          <th class="column-title">Day 29</th>
                                       @elseif($maxDays == 30)
                                          <th class="column-title">Day 29</th>
                                          <th class="column-title">Day 30</th>
                                       @elseif($maxDays == 31)
                                          <th class="column-title">Day 29</th>
                                          <th class="column-title">Day 30</th>
                                          <th class="column-title">Day 31</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results as $key => $medicine)
                                       <tr class="even-pointer">
                                             <td class=" ">
                                                @foreach($prescriptions as $prescription)
                                                   @if($prescription->medicineID == $key)
                                                      {{ $prescription->genericName }} {{ $prescription->brand }}
                                                      @break
                                                   @endif
                                                @endforeach
                                             </td>
                                          @if($maxDays == 29)
                                             <td class="">
                                                @foreach($medicine as $index => $value)
                                                   @if($value['day'] == 29 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                      {{ $value['total'] }}
                                                   @endif
                                                @endforeach
                                             </td>
                                          @elseif($maxDays == 30)
                                             <td class="">
                                                @foreach($medicine as $index => $value)
                                                   @if($value['day'] == 29 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                      {{ $value['total'] }}
                                                   @endif
                                                @endforeach
                                             </td>
                                             <td class="">
                                                @foreach($medicine as $index => $value)
                                                   @if($value['day'] == 30 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                      {{ $value['total'] }}
                                                   @endif
                                                @endforeach
                                             </td>
                                          @elseif($maxDays == 31)
                                             <td class="">
                                                @foreach($medicine as $index => $value)
                                                   @if($value['day'] == 29 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                      {{ $value['total'] }}
                                                   @endif
                                                @endforeach
                                             </td>
                                             <td class="">
                                                @foreach($medicine as $index => $value)
                                                   @if($value['day'] == 30 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                      {{ $value['total'] }}
                                                   @endif
                                                @endforeach
                                             </td>
                                             <td class="">
                                                @foreach($medicine as $index => $value)
                                                   @if($value['day'] == 31 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                                      {{ $value['total'] }}
                                                   @endif
                                                @endforeach
                                             </td>
                                          @endif
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports/week', 5) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>

                     </div>
                  </div>
                  <!---------------------------------------------END TABS-------------------------------------------->
                  </div>
               </div>
            </div>

            <div class="panel">
               <a class="panel-heading collapsed" id="headingTwo1" role="tab" aria-expanded="false" aria-controls="collapseTwo" href="#collapseTwo1" data-toggle="collapse" data-parent="#accordion1">
                  <h4 class="panel-title">Monthly (As of {{ date('Y') }})</h4>
               </a>
               <div class="panel-collapse collapse" id="collapseTwo1" role="tabpanel" aria-expanded="false" aria-labelledby="headingTwo" style="height: 0px;">
                  <div class="panel-body">
                     <!--------------------------------------------MONTHLY TABS------------------------------------------->
                     @php
                        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
                        $activeMonth = 0;
                        foreach($months as $month){
                           if(date('m') == $month){
                              $activeMonth = $month;
                           }
                        }
                     @endphp
                     <div role="tabpanel" data-example-id="togglable-tabs">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                           <li class="@if($activeMonth == 1){{ 'active' }}@endif" role="presentation">
                              <a id="home-tab" role="tab" aria-expanded="true" href="#tab_content17" data-toggle="tab">Jan</a>
                           </li>
                           <li class="@if($activeMonth == 2){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab" role="tab" aria-expanded="false" href="#tab_content13" data-toggle="tab">Feb</a>
                           </li>
                           <li class="@if($activeMonth == 3){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content14" data-toggle="tab">Mar</a>
                           </li>
                           <li class="@if($activeMonth == 4){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content15" data-toggle="tab">Apr</a>
                           </li>
                           <li class="@if($activeMonth == 5){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content5" data-toggle="tab">May</a>
                           </li>
                           <li class="@if($activeMonth == 6){{ 'active' }}@endif"  role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content6" data-toggle="tab">Jun</a>
                           </li>
                           <li class="@if($activeMonth == 7){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content7" data-toggle="tab">Jul</a>
                           </li>
                           <li class="@if($activeMonth == 8){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content8" data-toggle="tab">Aug</a>
                           </li>
                           <li class="@if($activeMonth == 9){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content9" data-toggle="tab">Sept</a>
                           </li>
                           <li class="@if($activeMonth == 10){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content10" data-toggle="tab">Oct</a>
                           </li>
                           <li class="@if($activeMonth == 11){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content11" data-toggle="tab">Nov</a>
                           </li>
                           <li class="@if($activeMonth == 12){{ 'active' }}@endif" role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content12" data-toggle="tab">Dec</a>
                           </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade @if($activeMonth == 1){{ 'active in' }}@endif" id="tab_content17" role="tabpanel" aria-labelledby="home-tab">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                          <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                          <th class="column-title" style="width: 20%">Brand Name</th>
                                          <th class="column-title">Week 1</th>
                                          <th class="column-title">Week 2</th>
                                          <th class="column-title">Week 3</th>
                                          <th class="column-title">Week 4</th>
                                       @php
                                             $date = date('Y-1-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJanuaryFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 1 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJanuaryFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJanuaryFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJanuarySecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 1 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJanuarySecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJanuarySecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJanuaryThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 1 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJanuaryThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJanuaryThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJanuaryFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 1 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJanuaryFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJanuaryFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumJanuaryFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 1 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumJanuaryFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumJanuaryFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                    </tbody>
                                 </table>
                                 <a href="{{ url('/print/medicine/reports', 1) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                                 </a>
                              </div>
                           </div>

                           <div class="tab-pane fade @if($activeMonth == 2){{ 'active in' }}@endif" id="tab_content13" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                          <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                          <th class="column-title" style="width: 20%">Brand Name</th>
                                          <th class="column-title">Week 1</th>
                                          <th class="column-title">Week 2</th>
                                          <th class="column-title">Week 3</th>
                                          <th class="column-title">Week 4</th>
                                       @php
                                             $date = date('Y-2-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumFebFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 2 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumFebFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumFebFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumFebSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 2 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumFebSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumFebSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumFebThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 2 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumFebThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumFebThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumFebFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 2 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumFebFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumFebFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumFebFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 2 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumFebFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumFebFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                    </tbody>
                                 </table>
                                 <a href="{{ url('/print/medicine/reports', 2) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                                 </a>
                              </div>
                           </div>

                           <div class="tab-pane fade @if($activeMonth == 3){{ 'active in' }}@endif" id="tab_content14" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                      @php
                                             $date = date('Y-3-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumMarFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 3 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumMarFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumMarFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumMarSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 3 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumMarSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumMarSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumMarThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 3 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumMarThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumMarThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumMarFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 3 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumMarFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumMarFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumMarFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 3 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumMarFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumMarFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 3) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 4){{ 'active in' }}@endif" id="tab_content15" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                     @php
                                             $date = date('Y-4-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumAprFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 4 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumAprFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumAprFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumAprSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 4 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumAprSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumAprSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumAprThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 4 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumAprThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumAprThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumAprFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 4 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumAprFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumAprFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumAprFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 4 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumAprFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumAprFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 4) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 5){{ 'active in' }}@endif" id="tab_content5" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                     @php
                                             $date = date('Y-5-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumMayFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 5 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumMayFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumMayFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumMaySecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 5 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumMaySecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumMaySecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumMayThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 5 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumMayThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumMayThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumMayFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 5 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumMayFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumMayFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumMayFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 5 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumMayFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumMayFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 5) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 6){{ 'active in' }}@endif" id="tab_content6" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                     @php
                                             $date = date('Y-6-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJunFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 6 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJunFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJunFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJunSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 6 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJunSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJunSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJunThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 6 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJunThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJunThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJunFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 6 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJunFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJunFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumJunFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 6 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumJunFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumJunFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 6) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 7){{ 'active in' }}@endif" id="tab_content7" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                     @php
                                             $date = date('Y-7-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJulFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 7 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJulFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJulFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJulSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 7 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJulSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJulSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJulThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 7 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJulThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJulThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumJulFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 7 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumJulFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumJulFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumJulFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 7 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumJulFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumJulFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 7) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 8){{ 'active in' }}@endif" id="tab_content8" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                       @php
                                             $date = date('Y-8-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumAugustFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 8 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumAugustFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumAugustFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumAugustSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 8 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumAugustSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumAugustSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumAugustThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 8 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumAugustThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumAugustThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumAugustFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 8 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumAugustFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumAugustFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumAugustFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 8 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumAugustFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumAugustFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 8) }}" target="_blank">
                                    <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                       <i class="fa fa-print"></i> Print Reports
                                    </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 9){{ 'active in' }}@endif" id="tab_content9" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                       @php
                                             $date = date('Y-9-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumSeptFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 9 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumSeptFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumSeptFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumSeptSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 9 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumSeptSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumSeptSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumSeptThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 9 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumSeptThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumSeptThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumSeptFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 9 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumSeptFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumSeptFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumSeptFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 9 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumSeptFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumSeptFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 9) }}" target="_blank">
                                 <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                    <i class="fa fa-print"></i> Print Reports
                                 </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 10){{ 'active in' }}@endif" id="tab_content10" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                       @php
                                             $date = date('Y-10-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumOctFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 10 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumOctFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumOctFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumOctSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 10 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumOctSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumOctSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumOctThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 10 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumOctThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumOctThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumOctFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 10 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumOctFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumOctFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumOctFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 10 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumOctFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumOctFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 10) }}" target="_blank">
                                 <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                    <i class="fa fa-print"></i> Print Reports
                                 </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 11){{ 'active in' }}@endif" id="tab_content11" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                       @php
                                             $date = date('Y-11-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumNovFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] == 11 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumNovFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumNovFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumNovSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 11 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumNovSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumNovSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumNovThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 11 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumNovThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumNovThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumNovFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 11 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumNovFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumNovFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumNovFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 11 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumNovFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumNovFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 11) }}" target="_blank">
                                 <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                    <i class="fa fa-print"></i> Print Reports
                                 </button>
                              </a>
                           </div>
                        </div>

                        <div class="tab-pane fade @if($activeMonth == 12){{ 'active in' }}@endif" id="tab_content12" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medicine</header>
                                       <header style="display: inline;">Number of Medicine Prescribed a Week</header>
                                       <th class="column-title" style="width: 20%">Brand Name</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                       @php
                                             $date = date('Y-12-t');   
                                       @endphp
                                       @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <th class="column-title">Week 5</th>
                                       @endif
                                    </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($results_for_month as $key => $medicine)
                                       <tr class="even-pointer">
                                          <td class=" ">
                                             @foreach($percentagePrescription_weekly as $prescription)
                                                @if($prescription->medicineID == $key)
                                                   {{ $prescription->genericName }} {{ $prescription->brand }}
                                                   @break
                                                @endif
                                             @endforeach
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumDecFirstWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 1 && $value['month'] ==12 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumDecFirstWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumDecFirstWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumDecSecondWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 2 && $value['month'] == 12 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumDecSecondWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumDecSecondWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumDecThirdWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 3 && $value['month'] == 12 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumDecThirdWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumDecThirdWeek }}
                                          </td>
                                          <td class=" ">
                                             @php
                                                $sumDecFourthWeek = 0;
                                             @endphp
                                             @foreach($medicine as $index => $value)
                                                @if($value['week'] == 4 && $value['month'] == 12 && $value['year'] == date('Y'))
                                                   @php
                                                      $sumDecFourthWeek +=$value['total'];
                                                   @endphp
                                                @endif
                                             @endforeach
                                             {{ $sumDecFourthWeek }}
                                          </td>

                                          @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                                             <td class=" ">
                                                @php
                                                   $sumDecFifthWeek = 0;
                                                @endphp
                                                @foreach($medicine as $index => $value)
                                                   @if($value['week'] == 5 && $value['month'] == 12 && $value['year'] == date('Y'))
                                                      @php
                                                         $sumDecFifthWeek +=$value['total'];
                                                      @endphp
                                                   @endif
                                                @endforeach
                                                {{ $sumDecFifthWeek }}
                                             </td>
                                          @endif
                                          
                                       </tr>
                                
                                    @endforeach
                                 </tbody>
                              </table>
                              <a href="{{ url('/print/medicine/reports', 12) }}" target="_blank">
                                 <button type="button" class="btn btn-primary" style="margin-top: 10px;">
                                    <i class="fa fa-print"></i> Print Reports
                                 </button>
                              </a>
                           </div>
                        </div>

                     </div>
                  </div>
                  <!---------------------------------------------END TABS-------------------------------------------->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--------------------------------------------------END COLLAPSIBLE-------------------------------------------------->
      <!-- /form input mask -->
      <a href="{{ url('/physician/dashboard') }}">
         <button type="button" class="btn btn-primary" style="margin-top: 20px; float: right;">BACK</button>
      </a>
    </div>
  </div>
</div>

<script>
   $(document).ready(function(){
      //Chart for Most Common Medicine Prescribed within the Month
      function init_chartMonth_doughnut(){
         if("undefined"!=typeof Chart&&(console.log("init_chart_doughnut"),$("#medicine_month").length)){
            var a={type:"doughnut",tooltipFillColor:"rgba(51, 51, 51, 0.55)",data:{labels:["@if(isset($percent_month[3]->genericName)){{ $percent_month[3]->genericName }}@endif","@if(isset($percent_month[2]->genericName)){{ $percent_month[2]->genericName }}@endif","Other","@if(isset($percent_month[1]->genericName)){{ $percent_month[1]->genericName }}@endif","@if(isset($percent_month[0]->genericName)){{ $percent_month[0]->genericName }}@endif"],datasets:[{data:['{{ $top4_month }}','{{ $top3_month }}','{{ $topOther_month }}','{{ $top2_month }}','{{ $top1_month }}'],backgroundColor:["#BDC3C7","#9B59B6","#E74C3C","#26B99A","#3498DB"],hoverBackgroundColor:["#CFD4D8","#B370CF","#E95E4F","#36CAAB","#49A9EA"]}]},options:{legend:!1,responsive:!1}};
            $("#medicine_month").each(function(){
               var b=$(this);new Chart(b,a)
            })
         }
      }

      //Chart for Most Common Medicine Prescribed within the Year
      function init_chartYear_doughnut(){
         if("undefined"!=typeof Chart&&(console.log("init_chart_doughnut"),$("#medicine_year").length)){
            var a={
               type:"doughnut",tooltipFillColor:"rgba(51, 51, 51, 0.55)",data:{labels:["@if(isset($percent_year[3]->genericName)){{ $percent_year[3]->genericName }}@endif","@if(isset($percent_year[2]->genericName)){{ $percent_year[2]->genericName }}@endif","Other","@if(isset($percent_year[1]->genericName)){{ $percent_year[1]->genericName }}@endif","@if(isset($percent_year[0]->genericName)){{ $percent_year[0]->genericName }}@endif"],datasets:[{data:['{{ $top4_year }}','{{ $top3_year }}','{{ $topOther_year }}','{{ $top2_year }}','{{ $top1_year }}'],backgroundColor:["#BDC3C7","#9B59B6","#E74C3C","#26B99A","#3498DB"],hoverBackgroundColor:["#CFD4D8","#B370CF","#E95E4F","#36CAAB","#49A9EA"]}]},options:{legend:!1,responsive:!1}
            };
            $("#medicine_year").each(function(){
               var b=$(this);new Chart(b,a)
            })
         }
      }

      //Chart for Most Common Medicine Prescribed Weekly
      function init_chartWeekly_doughnut(){
         if("undefined"!=typeof Chart&&(console.log("init_chart_doughnut"),$("#medicine_weekly").length)){
            var a={
               type:"doughnut",tooltipFillColor:"rgba(51, 51, 51, 0.55)",data:{labels:["@if(isset( $top_weekly[3]['genericName'])){{ $top_weekly[3]['genericName'] }}@endif","@if(isset($top_weekly[2]['genericName'])){{ $top_weekly[2]['genericName'] }}@endif","Other","@if(isset($top_weekly[1]['genericName'])){{ $top_weekly[1]['genericName'] }}@endif","@if(isset($top_weekly[0]['genericName'])){{ $top_weekly[0]['genericName'] }}@endif"],datasets:[{data:['{{ $top4_weekly }}','{{ $top3_weekly }}','{{ $topOther_weekly }}','{{ $top2_weekly }}','{{ $top1_weekly }}'],backgroundColor:["#BDC3C7","#9B59B6","#E74C3C","#26B99A","#3498DB"],hoverBackgroundColor:["#CFD4D8","#B370CF","#E95E4F","#36CAAB","#49A9EA"]}]},options:{legend:!1,responsive:!1}
            };
            $("#medicine_weekly").each(function(){
               var b=$(this);new Chart(b,a)
            })
         }
      }

      init_chartMonth_doughnut();
      init_chartWeekly_doughnut();
      init_chartYear_doughnut();
   });
</script>
@endsection