@extends('physician.layout.physician')

@section('content')

   <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profile</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
               
               <!-- page content -->
              <div style="width: 100%">

                <div style="width: 600px; height: auto; margin: 0 auto; padding: 10px; position: relative;">
                  <form id="saveForm">
                  	@csrf()
                  <!--First Name-->
                  <label for="firstName" style="float: left;">First Name</label>
                  <div style="float: left; width: 100%">
                    <input type="text" name="firstName" class="form-control" placeholder="First Name" value="{{ Session::get('accountInfo.firstName') }}" data-parsley-required="true"/>
                  </div>
                  <!--Middle Name-->
                  <label for="middleName" style="float: left;">Middle Name</label>
                  <div style="float: left; width: 100%">
                    <input type="text" name="middleName" class="form-control" placeholder="Middle Name" value="{{ Session::get('accountInfo.middleName') }}" />
                  </div>

                  <!--Last Name-->
                  <label for="lastName" style="float: left;">Last Name</label>
                  <div style="float: left; width: 100%">
                    <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="{{ Session::get('accountInfo.lastName') }}" data-parsley-required="true"/>
                  </div>

                  <!--Quantifier-->
                  <label for="quantifier" style="float: left;">Quantifier</label>
                  <div style="float: left; width: 100%">
                    <input type="text" name="quantifier" class="form-control" placeholder="Quantifier" value="{{ Session::get('accountInfo.quantifier') }}" />
                  </div>

                  <!--Position-->
                  <label for="position" style="float: left;">Position</label>
                  <div style="float: left; width: 100%; margin-bottom: 15px;">
                    <select class="form-control" name="position" data-parsley-required="true">
                      <option value="" disabled selected>Position</option>
                      <option value="1"
                      	@if(Session::get('accountInfo.position') == 1)
                      		{{ "selected" }}
                      	@endif
                      >Director</option>
                      <option value="2"
                      	@if(Session::get('accountInfo.position') == 2)
                      		{{ "selected" }}
                      	@endif
                      >Chief Dental</option>
                      <option value="3"
                      	@if(Session::get('accountInfo.position') == 3)
                      		{{ "selected" }}
                      	@endif
                      >Chief Medical</option>
                      <option value="4"
                      	@if(Session::get('accountInfo.position') == 4)
                      		{{ "selected" }}
                      	@endif
                      >Dentist</option>
                      <option value="5"
                      	@if(Session::get('accountInfo.position') == 5)
                      		{{ "selected" }}
                      	@endif
                      >Physician</option>
                      <option value="6"
                      	@if(Session::get('accountInfo.position') == 6)
                      		{{ "selected" }}
                      	@endif
                      >Nurse</option>
                    </select>
                  </div>

                  <!--Specalization-->
                  <label for="specialization" style="float: left;">Specialization</label>
                  <div style="float: left; width: 100%">
                    <input type="text" name="specialization"class="form-control" placeholder="Specialization" value="{{ Session::get('accountInfo.specialization') }}"/>
                  </div>

                  <!--License-->
	              <label for="specialization" style="float: left;">License Number</label>
	              <div style="float: left; width: 100%">
	                <input type="text" name="licenseNumber"class="form-control" placeholder="License Number" value="{{ Session::get('accountInfo.licenseNumber') }}"/ data-parsley-required="true">
	              </div>

   
                  <!--Email-->
                  <label for="email" style="float: left;">Email</label>
                  <div style="float: left; width: 100%">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ Session::get('accountInfo.email') }}" data-parsley-required="true"/>
                  </div>
              
                  <!--Contact Number-->
                  <label for="email" style="float: left;">Contact Number</label>
                  <div style="float: left; width: 100%">
                    <input type="text" name="contactNumber" class="form-control" placeholder="Contact Number" value="{{ Session::get('accountInfo.contactNumber') }}" data-parsley-required="true" data-parsley-type="digits" data-parsley-minLength="11" data-parsley-maxLength="11"/>
                  </div>

                  <!--Username-->
                  <label for="username" style="float: left;">Username</label>
                  <div style="float: left; width: 100%">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ Session::get('accountInfo.username') }}" data-parsley-required="true"/>
                  </div>

                 <!--Password-->
                  <label for="password" style="float: left;">Password</label>
                  <div style="float: left; width: 100%">
                    <input type="password" name="password" id="pw" class="form-control" placeholder="Password" value="{{ Session::get('accountInfo.password') }}" data-parsley-required="true">
                  </div>

                  <!--Password Confirmation-->
                  <label for="password_confirmation" style="float: left;">Retype Password</label>
                  <div style="float: left; width: 100%">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password" data-parsley-equalto="#pw" data-parsley-required="true" data-parsley-equalto-message="Password does not match"/>
                  </div>
                
                </div>


              </div>
            </div>
            <div style="text-align: center;">
              <button type="submit" class="btn btn-success" name="btnSave">Save</button>
              </form>
              <a href="{{ url('/physician/dashboard') }}"><button class="btn btn-danger">Cancel</button></a>
            </div>
        <!-- /page content -->
             

              <!-- /form input mask -->  

            </div>
          </div>
        </div>
<script>
	$(document).ready(function(){
		$('#saveForm').parsley();

		$('#saveForm').submit(function(e){
			e.preventDefault();
			$.ajax({
				url: '/edit/profile/' + '{{ Session::get('accountInfo.id') }}',
				type: 'post',
				data: $(this).serialize(),
				success:function(output){
					swal({
		                title: "Good job!",
		                text: output.message,
		                icon: "success",
		                button: "OK",
	              	})
	              	.then((value)=>{
	                	window.location.href = "/logout";
	              	});
				}
			});
		});
	});
</script>
@endsection