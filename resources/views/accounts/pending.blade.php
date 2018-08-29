{{--  ACCOUNT VERIFICATION PENDING!!  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/squares/main_logo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
    <title>MediSys | User Verification</title>
</head>
<body>
    <div class="card" style="height:100%;">
        <div class="card-body">
            <center>
                <h1 style="font-size:3em; color:maroon;"><span><img class="mb-2" src="{{ asset('images/squares/main_logo.ico') }}" alt="Main Logo" width="40px"></span>Medisys</h1><br>
                <h1 style="color:blue;">Your Account is waiting to be verified.</h1><br>
                <a href="/verifyAccount"><button class="btn btn-lg btn-outline-primary">Check Verification Status</button></a>
            </center>
        </div>
    </div>
<script>
    setInterval(function(){
        $.get('/medicalchief/last/userid',function(data){
            if()
        })
    })
</script>
</body>
</html>