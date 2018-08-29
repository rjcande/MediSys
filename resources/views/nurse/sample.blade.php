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
                    <h2>Frequency of Patient's Visit (Year)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="january-tab" role="tab" data-toggle="tab" aria-expanded="true">January</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="february-tab" data-toggle="tab" aria-expanded="false">February</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="march-tab2" data-toggle="tab" aria-expanded="false">March</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="march-tab2" data-toggle="tab" aria-expanded="false">March</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered jambo_table bulk_action">
                                <thead>
                                   <tr class="headings">
                                      <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medical Supply</header>
                                      <header style="display: inline;">Number of Medical Supply Used a Week</header>
                                      <th class="column-title" style="width: 20%">Medical Supply Name</th>
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                           <div class="table-responsive">
                             <table class="table table-striped table-bordered jambo_table bulk_action">
                                <thead>
                                   <tr class="headings">
                                      <header style="display: inline;" class="col-md-6 col-sm-12 col-xs-12 form-group">Medical Supply</header>
                                      <header style="display: inline;">Number of Medical Supply Used a Week</header>
                                      <th class="column-title" style="width: 20%">Medical Supply Name</th>
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- /form input mask -->  

            </div>
          </div>
        </div>




@endsection