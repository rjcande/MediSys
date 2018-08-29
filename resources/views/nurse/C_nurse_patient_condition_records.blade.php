@extends('nurse.layout.nurse')

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Patients' Conditions Statistics</h3>
      </div>
    </div>

    <div class="clearfix"></div>
      <div class="row">
              
      <!-- form input mask -->
      <div style="margin-bottom: 25%">
         <div style="float: left; height: 25%; width: 30%; margin-left: 1%; border-radius: 20px; background-color: #ffeaa7; margin-top: 2%">
            <div class="x_content">
               <table style="width:100%">
                  <tbody>
                     <tr>
                        <th style="width:37%;">
                           <p>Most Common Patient Conditions within the Week</p>
                        </th>

                        <th>
                           <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p>Condition</p>
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
                           <canvas width="175" height="175" class="canvasDoughnut" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;">
                           </canvas>
                        </td>
                        <td>
                           <table class="tile_info">
                              <tbody>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square blue"></i>IOS</p>
                                    </td>
                                    <td>30%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square green"></i>Android </p>
                                    </td>
                                    <td>10%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square purple"></i>Blackberry </p>
                                    </td>
                                    <td>20%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square aero"></i>Symbian </p>
                                    </td>
                                    <td>15%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square red"></i>Others </p>
                                    </td>
                                    <td>30%</td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>

         <div style="float: left; height: 25%; width: 30%; margin-left: 1%; border-radius: 20px; background-color: #ffeaa7; margin-top: 2%">
            <div class="x_content">
               <table style="width:100%">
                  <tbody>
                     <tr>
                        <th style="width:37%;">
                           <p>Most Common Patient Conditions within the Month</p>
                        </th>
                        <th>
                           <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p>Condition</p>
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
                           <canvas width="175" height="175" class="canvasDoughnut" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;">
                          </canvas>
                        </td>
                        <td>
                           <table class="tile_info">
                              <tbody>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square blue"></i>IOS </p>
                                    </td>
                                    <td>30%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square green"></i>Android </p>
                                    </td>
                                    <td>10%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square purple"></i>Blackberry </p>
                                    </td>
                                    <td>20%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square aero"></i>Symbian </p>
                                    </td>
                                    <td>15%</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square red"></i>Others </p>
                                    </td>
                                    <td>30%</td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>

         <div style="float: left; height: 25%; width: 30%; margin-left: 1%; border-radius: 20px; background-color: #ffeaa7; margin-top: 2%">
            <div class="x_content">
               <table style="width:100%">
                  <tbody>
                     <tr>
                        <th style="width:37%;">
                           <p>Most Common Patient Conditions within the Year</p>
                        </th>
                        <th>
                           <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p>Condition</p>
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
                           <canvas width="175" height="175" class="canvasDoughnut" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;">
                           </canvas>
                        </td>
                        <td>
                           <table class="tile_info">
                              <tbody>
                                 <tr>
                                    <td>
                                       <p><i class="fa fa-square blue"></i>IOS </p>
                                    </td>
                                    <td>30%</td>
                                 </tr>
                              <tr>
                                 <td>
                                    <p><i class="fa fa-square green"></i>Android </p>
                                 </td>
                                 <td>10%</td>
                              </tr>
                              <tr>
                                 <td>
                                    <p><i class="fa fa-square purple"></i>Blackberry </p>
                                 </td>
                                 <td>20%</td>
                              </tr>
                              <tr>
                                 <td>
                                    <p><i class="fa fa-square aero"></i>Symbian </p>
                                 </td>
                                 <td>15%</td>
                              </tr>
                              <tr>
                                 <td>
                                    <p><i class="fa fa-square red"></i>Others </p>
                                 </td>
                                 <td>30%</td>
                              </tr>
                           </tbody></table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <!----------------------------------------------------COLLAPSIBLE---------------------------------------------------->
      <div>
         <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
            <div class="panel">
               <a class="panel-heading collapsed" id="headingOne1" role="tab" aria-expanded="false" aria-controls="collapseOne" href="#collapseOne1" data-toggle="collapse" data-parent="#accordion1">
                  <h4 class="panel-title">Weekly (As of Month, Year)</h4>
               </a>
               <div class="panel-collapse collapse" id="collapseOne1" role="tabpanel" aria-expanded="false" aria-labelledby="headingOne" style="height: 0px;">
                  <div class="panel-body">

                  <!----------------------------------------------WEEKLY TABS--------------------------------------------->
                     <div role="tabpanel" data-example-id="togglable-tabs">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                           <li class="active" role="presentation">
                              <a id="home-tab" role="tab" aria-expanded="true" href="#tab_content1" data-toggle="tab">Week 1</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab" role="tab" aria-expanded="false" href="#tab_content2" data-toggle="tab">Week 2</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content3" data-toggle="tab">Week 3</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content4" data-toggle="tab">Week 4</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content16" data-toggle="tab">Week 5</a>
                           </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade active in" id="tab_content1" role="tabpanel" aria-labelledby="home-tab">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                          <header style="display: inline;">Number of Patients a Day</header>
                                          <th class="column-title" style="width: 20%">Condition</th>
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
                                       <tr class="even-pointer">
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="tab_content2" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                          <header style="display: inline;">Number of Patients a Day</header>
                                          <th class="column-title" style="width: 20%">Condition</th>
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
                                       <tr class="even-pointer">
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                          <td class=" "></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="tab_content3" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Day</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
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
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content4" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Day</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
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
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content16" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Day</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
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
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
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
                  <h4 class="panel-title">Monthly (As of Year)</h4>
               </a>
               <div class="panel-collapse collapse" id="collapseTwo1" role="tabpanel" aria-expanded="false" aria-labelledby="headingTwo" style="height: 0px;">
                  <div class="panel-body">
                     <!--------------------------------------------MONTHLY TABS------------------------------------------->
                     <div role="tabpanel" data-example-id="togglable-tabs">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                           <li class="active" role="presentation">
                              <a id="home-tab" role="tab" aria-expanded="true" href="#tab_content1" data-toggle="tab">January</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab" role="tab" aria-expanded="false" href="#tab_content13" data-toggle="tab">February</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content14" data-toggle="tab">March</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content15" data-toggle="tab">April</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content5" data-toggle="tab">May</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content6" data-toggle="tab">June</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content7" data-toggle="tab">July</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content8" data-toggle="tab">August</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content9" data-toggle="tab">September</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content10" data-toggle="tab">October</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content11" data-toggle="tab">November</a>
                           </li>
                           <li role="presentation">
                              <a id="profile-tab2" role="tab" aria-expanded="false" href="#tab_content12" data-toggle="tab">December</a>
                           </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade active in" id="tab_content1" role="tabpanel" aria-labelledby="home-tab">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                          <header style="display: inline;">Number of Patients a Week</header>
                                          <th class="column-title" style="width: 20%">Condition</th>
                                          <th class="column-title">Week 1</th>
                                          <th class="column-title">Week 2</th>
                                          <th class="column-title">Week 3</th>
                                          <th class="column-title">Week 4</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                       <tr class="even-pointer">
                                         <td class=" "></td>
                                         <td class=" "></td>
                                         <td class=" "></td>
                                         <td class=" "></td>
                                         <td class=" "></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="tab_content13" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                          <header style="display: inline;">Number of Patients a Week</header>
                                          <th class="column-title" style="width: 20%">Condition</th>
                                          <th class="column-title">Week 1</th>
                                          <th class="column-title">Week 2</th>
                                          <th class="column-title">Week 3</th>
                                          <th class="column-title">Week 4</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                       <tr class="even-pointer">
                                         <td class=" "></td>
                                         <td class=" "></td>
                                         <td class=" "></td>
                                         <td class=" "></td>
                                         <td class=" "></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="tab_content14" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content15" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content5" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content6" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content7" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content8" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content9" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content10" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content11" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_content12" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Patient Condition</header>
                                       <header style="display: inline;">Number of Patients a Week</header>
                                       <th class="column-title" style="width: 20%">Condition</th>
                                       <th class="column-title">Week 1</th>
                                       <th class="column-title">Week 2</th>
                                       <th class="column-title">Week 3</th>
                                       <th class="column-title">Week 4</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <tr class="even-pointer">
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                       <td class=" "></td>
                                    </tr>
                                 </tbody>
                              </table>
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
      
    </div>
  </div>
</div>
@endsection