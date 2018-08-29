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
    {{-- @if($errors)
       <center>
            <div class="alert alert-danger col-6">
                    {{ $errors }}
                </div>
       </center>
    @endif --}}
    <div class="card" style="height:100%;">
        <div class="card-body">
            <center>
                <a href="/"><h1 style="text-decoration:none; font-size:3em; color:maroon;"><span><img class="mb-2" src="{{ asset('images/squares/main_logo.ico') }}" alt="Main Logo" width="40px"></span>Medisys</h1></a><br>
                <form action="{{route('verifyCode')}}" method="post">
                    @csrf()
                    <label for="verCode" class="h1">Enter Verification Code</label><br>
                    <input type="hidden" name="actualCode" value="{{ $verification['verificationCode'] }}">
                    <input type="hidden" name="userID" value="{{ $verification['userID'] }}">
                    <input type="text" name="verCode" id="verCode" style="font-size: 10em; font-weight:bold; width:41%; font-family:consolas; border-radius:15px;" maxlength="6" required autofocus><br><br>
                    <input type="submit" value="Verify" class="btn btn-lg btn-primary">
                </form>
            </center>
        </div>
    </div>
</body>
</html>