@extends('chief.layout.chief')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Accounts List (Archived)</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="patientTable">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Number </th>
                            <th class="column-title">Username </th>
                            <th class="column-title">Name </th>
                            <th class="column-title">Position </th>
                            <th class="column-title">License Number </th>
                            <th class="column-title">Verification </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
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
                                  <span style="font-weight:bold; font-family:'century gothic'; font-size: 15px;z">
                                    @if($staff->isVerified == 1 || $staff->isVerified == 2)
                                      <span style="color:green">{{ $staff->verificationCode }}</span>
                                    @elseif($staff->isVerified == 3)
                                      <span style="color:red">Denied Account</span>
                                    @else
                                    <button class="btn btn-primary btn-verify" data-id={{ $staff->id }}><i class="fa fa-check"></i></button><button class="btn btn-danger btn-deny" data-id={{ $staff->id }}><i class="fa fa-close"></i></button>
                                    @endif
                                  </span>
                                </td>
                                <td><a href="{{ url('/mchief/restore/account',$staff->id) }}"><button class="btn btn-success"><i class="fa fa-refresh"></i></button><a/></td>
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
          url: '/medicalchief/decline_account/' + $(this).data('id'),
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
          url: '/medicalchief/generate_verification_code/' + $(this).data('id'),
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
          url: '/medicalchief/delete_account/' + $(this).data('id'),
          type: 'get',
          success:function(output){
           location.reload(true);
          }
        });
      }
    });
  });
</script>
@endsection
