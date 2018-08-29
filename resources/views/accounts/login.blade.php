<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/squares/main_logo.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href={{ asset('images/squares/main_logo.ico') }} type="image/x-icon">
    <title>{{ __('MediSys | Login') }}</title>

    <style type="text/css">
      .div-container{
        padding-right: 1em;
        padding-left: 1em;
        background: rgba(241, 241, 241, .5);
        /*border-radius: .3em;*/
      }
      .login-bg-img{
        background-image: url(images/clinicpics/pup.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }
      html, body {
        background-image: url(images/clinicpics/pup.jpg);
        background-size: cover;
        background-position: center;
        color: black;
        font-family: 'Arial', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
      }

      .full-height {
          height: 100vh;
      }

      .flex-center {
          align-items: center;
          display: flex;
          justify-content: center;
      }

      .position-ref {
          position: relative;
      }

      .top-right {
          position: absolute;
          right: 10px;
          top: 18px;
      }

      .content {
          text-align: center;
          background-color: rgba(180,180,180,.4);
          /*border-radius: 2%;*/
          min-width: 290px;
          min-height: 300px;
      }

      .title {
          font-size: 84px;
      }

      .links > a {
          color: black;
          padding: 0 25px;
          font-size: 12px;
          font-weight: 600;
          letter-spacing: .1rem;
          text-decoration: none;
          text-transform: uppercase;
      }
      #forgot{
          text-decoration: none;
          color: black;
      }
      #forgot:hover{
          font-weight: bold;
          color: maroon;
          text-decoration: maroon underline;
      }
      #brand{
          font-size: 2.5em;
          color: maroon;
          text-shadow: 1px 1px black;
          text-decoration: none;
          font-family: 'Arial';
      }
      #brand > span > img{
          margin-bottom: 3%;
          margin-right: 1%;
          box-shadow: 1px 1px 1px 0px black;
      }
      .m-b-md {
          margin-bottom: 30px;
      }
      .withShadow{
          box-shadow: 1px 1px 1px 0px black;
      }
      .marginT{
        margin-top: 4% !important;
      }
      .radii{
        border-radius: 3px;
        width: 250px;
        align-self: center;
        margin: auto;
        font-size: 1.3em;
        color: black;
      }

      .radii:focus{
          border-color: maroon;
          width: 260px;
          font-size: 1.4em;
      }
    </style>
  </head>

  <body class="login-bg-img">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <form class="form-signin" action="{{ route('showUser') }}" method="post">
                    @csrf()
                    <h1 id="brand"><span><img src="images/squares/main_logo.ico" width="40px"></span>MediSys</h1>
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" class="form-control withShadow radii" placeholder="Username" required autofocus>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" class="form-control withShadow radii marginT" placeholder="Password" required>
                    <br>
                    <button class="btn btn-md btn-primary withShadow" type="submit">Login</button>
                    <button class="btn btn-md btn-dark withShadow" type="reset">Reset</button>
                    @if($errors->first('login'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first('login') }}</li>
                            </ul>
                        </div>
                    @endif
                    <hr>
                    <div>
                        <p>
                            <a href={{ route('createAccount') }} id="forgot"><button class="btn btn-light btn-sm withShadow">Create Account</button></a> 
                        </p>
                    </div>
                </form>
            </div>
        </div>
      </div>
  </body>
</html>
