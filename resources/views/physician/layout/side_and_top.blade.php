<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;background-color: #800000">
      <a class="site_title">
        <span>
          <img src={{ asset('images/squares/white_heart.ico')}} alt="" width="30px" style="margin-bottom: 3%; margin-right: 1%; margin-left:  5%;">
        </span>
        <span>Medical Clinic</span>
      </a>
    </div>
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src={{asset("images/physician.ico")}} alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        @if(Session::get('accountInfo.position') == 5)
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
          <li><a href="{{ url('physician/dashboard') }}"><i class="fa fa-home"></i>Dashboard <span></span></a>
          </li>
          <li><a><i class="fa fa-wheelchair"></i>Patient <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('/physician/patient/list')  }}"><i class="fa fa-list-alt"></i>List of Patients</a></li>
              <li><a href="{{ url('/physician/medical/log') }}"><i class="fa fa-edit"></i>Medical Log</a></li>
              <li><a href="{{ url('/physician/referred/patients')  }}"><i class="fa fa-external-link"></i>Referred Patients</a></li>
              <li><a href="{{ url('/physician/patient/record')  }}"><i class="fa fa-folder-open"></i>Patient Records</a></li>
            </ul>
          </li>
       
        </ul>
      </div>
    

    </div>
    
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
            <img src={{asset("images/physician.ico")}}>
            @if(Session::get('accountInfo.position') == 5)
            {{ Session::get('accountInfo.firstName') }} {{Session::get('accountInfo.middleName') }} {{Session::get('accountInfo.lastName') }} {{Session::get('accountInfo.quantifier') }}
            @endif
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="{{ url('/physician/profile') }}"> Profile</a></li>
         
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell-o"></i>
            <span class="badge bg-blue" id="notifNumber"></span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
           
            
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>

<script>
  $(document).ready(function(){
    $.ajax({
          url: '/get/notification',
          type: 'get',
          success: function(output){
              
              $('#notifNumber').text(Object.keys(output.logReferralNotifNurse).length);
              $('#menu1').empty();
              for (var i = 0; i <Object.keys(output.text).length ; i++) {
                $('#menu1').append(output.text[i]);
              }

          }
      });
    setInterval(function(){
        $.ajax({
          url: '/get/notification',
          type: 'get',
          success: function(output){
              
              $('#notifNumber').text(Object.keys(output.logReferralNotifNurse).length);
              $('#menu1').empty();
              for (var i = 0; i <Object.keys(output.text).length ; i++) {
                $('#menu1').append(output.text[i]);
              }

          }
        });
    }, 2000);
      
    // $('#menu1').on('click','.notification', function(){
    //     $.ajax({
    //       url: '/notification/clicked/' + $(this).data('id'),
    //       type: 'get',
    //       success:function(){

    //       }
    //     });
    // });

  });
</script> 
<!-- /top navigation -->