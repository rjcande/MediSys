@extends('dentalchief.layout.dentalchief')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Accounts List</h3>
              </div>
           
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
                    <center>
                      <label>From:</label>
                      <input type="date" name="from" id="from" class="date-range-filter" style="height: 35px;">
                      <label>To:</label>
                      <input type="date" name="to" id="to" class="date-range-filter" style="height: 35px;">
                      <button type="button" class="btn btn-primary" id="filter">Apply</button>
                      <button type="button" class="btn btn-warning" id="clearFilter">Clear Filter</button>
                    </center>
                    
                  
                    <!-- <div class="col-md-2 col-sm-12 col-xs-12" style="width: 350px; float: right;">
                      <input type="text" placeholder="Search" id="search" class="form-control" style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                    </div> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="accountTable">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Number </th>
                            <th class="column-title">Username </th>
                            <th class="column-title">Name </th>
                            <th class="column-title">Position </th>
                            <th class="column-title">License Number </th>
                            <th class="column-title">Verification </th>
                            <th class="column-title no-link last"><span class="nobr">Date Modified</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach ($medicalStaff as $staff)
                              <tr>
                                <td style="color:black">{{ $staff->id }}</td>
                                <td style="color:black">{{ $staff->username }}</td>
                                <td style="color:black">{{ $staff->firstName }} {{ $staff->middleName }} {{ $staff->lastName }} {{ $staff->quantifier }}</td>
                                <td style="color:black">
                                  <span>
                                    @switch($staff->position)
                                        @case(1)
                                            Director
                                            @break
                                        @case(2)
                                            Dental Chief
                                            @break
                                        @case(3)
                                            Medical Chief
                                            @break
                                        @case(4)
                                            Dentist
                                            @break
                                        @case(5)
                                            Physician
                                            @break
                                        @case(6)
                                            Nurse
                                            @break
                                    @endswitch
                                  </span>
                                </td>
                                <td style="color:black">{{ $staff->licenseNumber }}</td>
                                <td>
                                  <span style="font-weight:bold; font-family:'century gothic'; font-size: 15px;">
                                    @if($staff->isVerified == 1 || $staff->isVerified == 2)
                                      <span style="color:green">{{ $staff->verificationCode }}</span>
                                    @elseif($staff->isVerified == 3)
                                      <span style="color:red">Denied Account</span>
                                    @else
                                    <button class="btn btn-primary btn-verify" data-id={{ $staff->id }}><i class="fa fa-check"></i></button><button class="btn btn-danger btn-deny" data-id={{ $staff->id }}><i class="fa fa-close"></i></button>
                                    @endif
                                  </span>
                                </td>
                                <td>{{ date('Y-m-d', strtotime($staff->updated_at)) }}</td>
                              
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

<script type="text/javascript">
  $(window).load(function(){
     //Data Table
    var table = $('#accountTable').dataTable({
        
       'sDom': '<"top">rt<"bottom"B><"clear">',
        "buttons": [
            {
                extend: 'print',
                text: 'Print Account List',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'background-color', 'white' )
                        
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                 exportOptions: {
                  rows: ':visible',
                  columns: [0,2,3,4,6],
                }
            }
        ]
    });
    

    $('#clearFilter').on('click', function(e){
      e.preventDefault();
      $.fn.dataTableExt.afnFiltering.length = 0;
      table.dataTable().fnDraw();
    });

    $('#filter').on('click', function(e){
      e.preventDefault();
      var startDate = $('#from').val(),
          endDate = $('#to').val();
      
      filterByDate(6, startDate, endDate); // We call our filter function
        
      table.dataTable().fnDraw(); // Manually redraw the table after filtering
    });

    var filterByDate = function(column, startDate, endDate) {
    // Custom filter syntax requires pushing the new filter to the global filter array
      $.fn.dataTableExt.afnFiltering.push(
          function( oSettings, aData, iDataIndex ) {
            var rowDate = normalizeDate(aData[column]),
                start = normalizeDate(startDate),
                end = normalizeDate(endDate);
            
            // If our date from the row is between the start and end
            if (start <= rowDate && rowDate <= end) {
              return true;
            } else if (rowDate >= start && end === '' && start !== ''){
              return true;
            } else if (rowDate <= end && start === '' && end !== ''){
              return true;
            } else {
              return false;
            }
          }
      );
    };

      // converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
    var normalizeDate = function(dateString) {
      var date = new Date(dateString);
      var normalized = date.getFullYear() + '' + (("0" + (date.getMonth() + 1)).slice(-2)) + '' + ("0" + date.getDate()).slice(-2);
      return normalized;
    }
     setInterval(function() {
    $.get('/medicalchief/getLastUserID', function(data){

      if ('{{ Session::get('lastUserID') }}' < data['newLastUser'].id) {
          location.reload(true);
      }
    });
  }, 2 * 1000);

  //on btn decline
  $(".btn-deny").on('click', function(){
    swal({
      title: "WARNING",
      text: "Are you sure you want to decline the Account?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDeny)=>{
      if (willDeny) {
        $.ajax({
          url: '/dentalchief/decline_account/' + $(this).data('id'),
          type: 'get',
          success:function(output){
            location.reload(true);
          }
        });
      }
    });
  });
  $(".btn-verify").on('click', function(){
    swal({
      title: "Verify Account?",
      text: "Create Verification Code",
      icon: "info",
      buttons: true,
      dangerMode: true,
    })
    .then((willVerify)=>{
      if (willVerify) {
        $.ajax({
          url: '/dentalchief/generate_verification_code/' + $(this).data('id'),
          type: 'get',
          success:function(output){
            location.reload(true);
          }
        });
      }
    });
  });

  $(".btn-delete").on('click', function(){
    swal({
      title: "WARNING",
      text: "Are you sure you want to delete the Account?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete)=>{
      if (willDelete) {
        $.ajax({
          url: '/dentalchief/delete_account/' + $(this).data('id'),
          type: 'get',
          success:function(output){
           location.reload(true);
          }
        });
      }
    });
  });


  });

  
</script>
@endsection
