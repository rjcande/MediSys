<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/squares/main_logo.ico') }}" type="image/x-icon">

    <title>{{ __('MediSys | Create Account') }}</title>

    <!-- Bootstrap -->
    <link href={{asset("vendors/bootstrap/dist/css/bootstrap.min.css")}} rel="stylesheet">
    <!-- Font Awesome -->
    <link href={{asset("vendors/font-awesome/css/font-awesome.min.css")}} rel="stylesheet">
    <!-- NProgress -->
    <link href={{asset("vendors/nprogress/nprogress.css")}} rel="stylesheet">
    <!-- Animate.css -->
    <link href={{asset("vendors/animate.css/animate.min.css")}} rel="stylesheet">
    <!-- jQuery -->
    <script src={{asset("vendors/jquery/dist/jquery.min.js")}}></script>
     <!-- Parsley -->
    <script src={{asset("vendors/parsleyjs/dist/parsley.min.js")}}></script>

    <script src={{asset("vendors/sweetalert/sweetalert.min.js")}}></script>

    <!-- Custom Theme Style -->
    <link href={{asset("build/css/custom.min.css")}} rel="stylesheet">
  </head>

  <body class="login">
    <div style="width: 100%">
      <div style="width: 400px; margin: 0 auto;">
        <div>
          <section class="login_content">
              <h2 style="color:maroon;font-size: 3em;"><span><img src="{{ asset('images/squares/main_logo.ico') }}" alt="" width="40px" style="margin-bottom: 1%; margin-right:1%;"></span>MediSys</h2>
            <form id="registerForm" method="post" action="{{ route('saveAccount') }}">
              @csrf()
              <h1>Create Account</h1>
              @if($errors->first('rigister'))
                <div class="alert alert-danger">
                  <ul>
                    <li>{{ $errors->first('register') }}</li>
                  </ul>
                </div>
              @endif
              <!--First Name-->
              <label for="firstName" style="float: left;">First Name</label>
              <div style="float: left; width: 100%">
                <input type="text" name="firstName" class="form-control" placeholder="First Name" value="{{ old('firstName') }}" data-parsley-required="true">
              </div>

              <!--Middle Name-->
              <label for="middleName" style="float: left;">Middle Name</label>
              <div style="float: left; width: 100%">
                <input type="text" name="middleName" class="form-control" placeholder="Middle Name" value="{{ old('middleName') }}" />
              </div>

              <!--Last Name-->
              <label for="lastName" style="float: left;">Last Name</label>
              <div style="float: left; width: 100%">
                <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="{{ old('lastName') }}" / data-parsley-required="true">
              </div>

              <!--Quantifier-->
              <label for="quantifier" style="float: left;">Quantifier</label>
              <div style="float: left; width: 100%">
                <input type="text" name="quantifier" class="form-control" placeholder="Quantifier" value="{{ old('quantifier') }}" />
              </div>

              <!--Position-->
              <label for="position" style="float: left;">Position</label>
              <div style="float: left; width: 100%; margin-bottom: 15px;">
                <select class="form-control" name="position" data-parsley-required="true" value="{{ old('position') }}">
                  <option value=""disabled selected>Position</option>
                  <option value="2" @if(old('position') == 2){{ 'selected' }}@endif>Dental Chief</option>
                  <option value="3" @if(old('position') == 3){{ 'selected' }}@endif>Medical Chief</option>
                  <option value="4" @if(old('position') == 4){{ 'selected' }}@endif>Dentist</option>
                  <option value="5" @if(old('position') == 5){{ 'selected' }}@endif>Physician</option>
                  <option value="6" @if(old('position') == 6){{ 'selected' }}@endif>Nurse</option>
                </select>
              </div>

              <!--Specalization-->
              <label for="specialization" style="float: left;">Specialization</label>
              <div style="float: left; width: 100%">
                <input type="text" name="specialization"class="form-control" placeholder="Specialization" value="{{ old('specialization') }}"/ data-parsley-required="true">
              </div>

              <!--License-->
              <label for="specialization" style="float: left;">License Number</label>
              <div style="float: left; width: 100%">
                <input type="text" name="licenseNumber"class="form-control" placeholder="License Number" value="{{ old('licenseNumber') }}"/ data-parsley-required="true">
              </div>



              <!--Email-->
              <label for="email" style="float: left;">Email</label>
              <div style="float: left; width: 100%">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" data-parsley-required="true">
              </div>


              <!--Contact Number-->
              <label for="email" style="float: left;">Contact Number</label>
              <div style="float: left; width: 100%">
                <input type="text" name="contactNumber" class="form-control" placeholder="Contact Number" value="{{ old('contactNumber') }}"/ data-parsley-required="true" data-parsley-type="digits" data-parsley-minLength="11" data-parsley-maxLength="11">
              </div>



              <!--Username-->
              <label for="username" style="float: left;">Username</label>
              <div style="float: left; width: 100%">
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}"/ data-parsley-required="true">
              </div>



              <!--Password-->
              <label for="password" style="float: left;">Password</label>
              <div style="float: left; width: 100%">
                <input type="password" name="pw" id="pw" class="form-control" placeholder="Password"/ data-parsley-required="true">
              </div>



              <!--Password Confirmation-->
              <label for="password_confirmation" style="float: left;">Retype Password</label>
              <div style="float: left; width: 100%">
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Retype Password" data-parsley-equalto="#pw" data-parsley-required="true" data-parsley-equalto-message="Password does not match" />
              </div>

              <!--Create Account Button-->
              <div style="float: left; width: 100%; margin-left: 90px;">
                <input type="submit" name="btnCreate" class="btn btn-default" value="Create Account">

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="{{ url('/') }}" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />
              </div>
            </form>


          </section>
        </div>
      </div>
    </div>
  </body>
<script>
  $(document).ready(function(){
    $('#registerForm').parsley();
  });
</script>
{{--  <script>
  $('#registerForm').parsley();

  $('#registerForm').submit(function(e){
      e.preventDefault();

      if ($(this).parsley().isValid()) {
        $.ajax({
          url: '/account/save',
          type: 'get',
          data: $(this).serialize(),
          success: function(output){
              swal({
                title: "Good job!",
                text: output,
                icon: "success",
                button: "OK",
              })
              .then((value)=>{
                window.location.href = "/verifyAccount";
              });

          }
        });
      }
  });

</script>  --}}
</html>
