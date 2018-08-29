<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log in</title>

    <style type="text/css">
      .div-container{
        padding-right: 1em;
        padding-left: 1em;
        background: rgba(241, 241, 241, .5);
        border-radius: .3em;
      }
      .login-bg-img{
        background-image: url(images/pup.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: 100%;
      }
    
    </style>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login-bg-img">
    <img src={{asset("images/pup.jpg")}} style="display:none;">
    <div>
      
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content  div-container">
            <form action="{{ route('showUser') }}" method="post">
              @csrf()
              <h1 style="color: black">Login Form</h1>
              <div>
                 <input type="text" class="form-control" placeholder="Username" name="username">
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
              <div style="margin-left: 100px;">
                <input type="submit" class="btn btn-default submit" value="Login" name="btnLogin">
              </div>

                
              <div class="clearfix"></div>
             @if($errors->first('login'))
                <div class="alert alert-danger">
                  <ul>
                    
                    <li>{{ $errors->first('login') }}</li>
            
                  </ul>
                </div>
              @endif
              <div class="separator">
               <p>
                  <a href="{{ route('createAccount') }}" style="color: black">Create Account</a>  
              </p>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1 style="color: white"><i class="fa fa-medkit"></i> MediSys</h1>
                </div>
              </div>
            </form>
          </section>
        </div>
        </div>
      </div>
  </body>
</html>
