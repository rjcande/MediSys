 <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;background-color: #800000">
                  <a class="site_title">
                    <span>
                      <img src={{ asset('images/squares/white_heart.ico')}} alt="" width="30px" style="margin-bottom: 3%; margin-right: 1%; margin-left:  5%;">
                    </span>
                    <span>Dental Clinic</span>
                  </a>
                </div>
                <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src={{asset("images/dentist.ico")}} alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                @if(Session::get('accountInfo.position') == 2)
                  <h2>{{ Session::get('accountInfo.firstName') }}</h2>
                @endif
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{{ url('dchief/dashboard') }}"><i class="fa fa-home"></i> Dashboard <span></span></a>
                  </li>
                  <li><a><i class="fa fa-wheelchair"></i>Patient <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('/dchief/PatientList') }}"><i class="fa fa-list-alt"></i>List of Patients</a></li>
                        <li><a href="{{ url('/dchief/DentalLog') }}"><i class="fa fa-edit"></i>Dental Log</a></li>
                        <li><a href="{{ url('/dchief/PatientRecord') }}"><i class="fa fa-folder-open"></i>Patient Records</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i>Maintenance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/dentalchief/accounts_maintenance"><i class="fa fa-user-md"></i>Accounts</a></li>
                        <li><a href="/dentalchief/medicines_maintenance"><i class="fa fa-medkit"></i>Medicines</a></li>
                        <li><a href="/dentalchief/medical_supplies_maintenance"><i class="fa fa-stethoscope"></i>Medical Supplies</a></li>
                    </ul>
                    </li>
                    <li><a><i class="fa fa-question-circle"></i>Queries <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="/dentalchief/accounts_maintenance_queries"><i class="fa fa-user-md"></i>Accounts</a></li>
                          <li><a href="/dentalchief/medicines_maintenance_queries"><i class="fa fa-medkit"></i>Medicines</a></li>
                          <li><a href="/dentalchief/medical_supplies_maintenance_queries"><i class="fa fa-stethoscope"></i>Medical Supplies</a></li>
                      </ul>
                      </li>
                  <li><a><i class="fa fa-archive"></i>Archive <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('/dchief/archived/patient/list') }}"><i class="fa fa-list-alt"></i>Patients List</a></li>
                        <li><a href="{{ url('/dchief/archived/dental/logs') }}"><i class="fa fa-edit"></i>Dental Logs</a></li>
                        <li><a href="{{ url('/dchief/archived/accounts') }}"><i class="fa fa-user-md"></i>Accounts List</a></li>
                        <li><a href="{{ url('/dchief/archived/medicines') }}"><i class="fa fa-medkit"></i>Medicines List</a></li>
                        <li><a href="{{ url('/dchief/archived/medicalSupplies') }}"><i class="fa fa-stethoscope"></i>Medical Supplies List</a></li>
                    </ul>
                  </li>

                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->
              <!-- /menu footer buttons -->
            {{--  <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>  --}}
            <!-- /menu footer buttons -->
          </div>
        </div>

          <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src={{asset("images/dentist.ico")}}>
                    @if(Session::get('accountInfo.position') == 2)
                    {{ Session::get('accountInfo.firstName') }} {{Session::get('accountInfo.middleName') }} {{Session::get('accountInfo.lastName') }} {{Session::get('accountInfo.quantifier') }}
                    @endif
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ url('/dchief/profile') }}"> Profile</a></li>

                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-blue">
                    @if(empty($unverifiedAccountsCtr))
                      <span class="badge bg-blue">0</span>
                    @elseif(!empty($unverifiedAccountsCtr))
                      <span class="badge bg-blue">{{ $unverifiedAccountsCtr }}</span>
                    @endif

                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    {{-- @if(empty($unverifiedAccounts))
                    @foreach($unverifiedAccounts as $notifAccount)
                    <li>
                      <a href="{{url('/dentalchief/accounts_maintenance')}}">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    @endforeach
                    @endif --}}
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

<script>
  $(document).ready(function(){
    $.ajax({
      url: 'dchief/get/notification',
          type: 'get',
          success: function(output){
              // $('#notifNumber').text(output.number);
              // $('#menu1').empty();
              // for (var i = 0; i <Object.keys(output.text).length ; i++) {
              //   $('#menu1').append(output.text[i]);
              // }

          }
    });
  }
</script>
