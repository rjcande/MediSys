@include('medicalchief.layout.head')
  <body class="nav-md">
  	<div style="min-width: 1300px; max-width: 1910px; margin: 0 auto;">
  	
    <div class="container body">
      <div class="main_container">
        @include('medicalchief.layout.side_and_top')

        <!-- page content -->
        @if(Session::get('accountInfo') && Session::get('accountInfo.position') == 3)
            @yield('content')
        @else
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                    <div style="float: left; width: 100%; text-align: center;">
                        <h1 class="alert alert-danger"><strong>WARNING!!!</strong></h1>
                    </div>
                    </div>

                    <div class="clearfix"></div>

                  <div class="row">
                    <!-- form input mask -->
                     <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_content" style="text-align: center;">
                          <p class="alert alert-info" style="color: black;">You Need To Login First to View This Content</p>
                          <a href="{{ url('/') }}" title=""><u>LOGIN</u></a>
                        </div>
                      </div>
                    </div>

                    <!-- /form input mask -->  

                  </div>
                </div>
            </div>
        @endif
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  
    <!-- Bootstrap -->
    <script src={{asset("../vendors/bootstrap/dist/js/bootstrap.min.js")}}></script>
    <!-- FastClick -->
    <script src={{asset("../vendors/fastclick/lib/fastclick.js")}}></script>
    <!-- NProgress -->
    <script src={{asset("../vendors/nprogress/nprogress.js")}}></script>
    <!-- iCheck -->
    <script src={{asset("../vendors/iCheck/icheck.min.js")}}></script>
    <!-- Chart.js -->
    <script src={{asset("../vendors/Chart.js/dist/Chart.min.js")}}></script>
     <!-- FullCalendar -->
    <script src={{asset("../vendors/moment/min/moment.min.js")}}></script>
    <script src={{asset("../vendors/fullcalendar/dist/fullcalendar.min.js")}}></script>
    <!-- Datatables -->
    <script src={{asset("../vendors/datatables.net/js/jquery.dataTables.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-buttons/js/dataTables.buttons.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-buttons/js/buttons.flash.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-buttons/js/buttons.html5.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-buttons/js/buttons.print.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-responsive/js/dataTables.responsive.min.js")}}></script>
    <script src={{asset("../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")}}></script>
    <script src={{asset("../vendors/datatables.net-scroller/js/dataTables.scroller.min.js")}}></script>
    <script src={{asset("../vendors/jszip/dist/jszip.min.js")}}></script>
    <script src={{asset("../vendors/pdfmake/build/pdfmake.min.js")}}></script>
    <script src={{asset("../vendors/pdfmake/build/vfs_fonts.js")}}></script>

    <!-- Custom Theme Scripts -->
    <script src={{asset("../build/js/custom.min.js")}}></script>
    </div>
  </body>
</html>
