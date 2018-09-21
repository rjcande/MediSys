<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prescription</title>
  <link rel="stylesheet" href="">
  <style type="text/css" media="screen">
    table{
      font-family: verdana,arial;
      border-collapse: collapse;
      width: 100%;
    }

    td,th{
      border: 1px solid black;
      text-align: left;
      padding: 15px;
    }
    th{
      text-align: left;
    }
    tr:nth-child(even){
      background-color: #dddddd;
    }
    caption{
      /*font-family:verdana;*/
      font-size: 160%;
    }
  </style>
</head>
<body>
    <div>
      <center>
        <header style="font-size: 15px;">Republic of the Philippines</header><br>
        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header><br>
        <header style="font-size: 15px;">Sta. Mesa, Manila</header><br>
        <h1>Dental Log Records</h1>
      </center>
      {{-- <p>Name: {{ $dentalLogInfo['lastName'] }}, {{ $dentalLogInfo['firstName'] }} {{ $dentalLogInfo['middleName'] }} {{ $dentalLogInfo['quantifier'] }}</p>
      <p>Contact Number: {{ $dentalLogInfo['mobileNo'] }}</p> --}}

      <table style = "width:100%">
        <caption>Dental Logs
        </caption>
          <tr>
            <th>No</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Type</th>
            <th>Attending Dentist</th>
            <th>Date</th>
            <th>Time In</th>
            <th>Time Out</th>
          </tr>      
          <tbody>
          @php($ctr = 1)
          {{ Session::put('number', $ctr)}}
           @foreach($dentalLogs as $dentalLog)
              <tr>
                <td>{{ $ctr }}</td>
                <td>{{ $dentalLog->patientID }}</td>
                <td>{{$dentalLog->firstName}} {{$dentalLog->middleName}} {{$dentalLog->lastName}} {{$dentalLog->quantifier}}</td>
                <td class=" ">
                    @if($dentalLog->patientType == 1)
                    {{
                        'Student'
                    }}
                    @elseif($dentalLog->patientType == 2)
                    {{
                        'Faculty/College'
                    }}
                    @elseif($dentalLog->patientType == 3)
                    {{
                        'Admin/Dept'
                    }}
                    @endif
                </td>
                <td>{{$attendingDentist['lastName']}}, {{$attendingDentist['firstName']}} {{$attendingDentist['middleName']}} {{$attendingDentist['quantifier']}}</td>
                <td>{{ date("F d, Y", strtotime($dentalLog->clinicLogDateTime)) }}</td>
                <td>{{ date("h:i a", strtotime($dentalLog->clinicLogDateTime)) }}</td>
                @if(empty($dentalLog->timeOut))
                  <td></td>
                @else
                  <td>{{ date("h:i a", strtotime($dentalLog->timeOut))}}</td>
                @endif
              </tr>
           @php($ctr++)
           @endforeach
          </tbody>
        </table>

        <div style="width:100%;text-align: right; position: absolute; bottom: 0">
          <div style="text-align: center; margin-left: 500px;">
            <header style="font-size: 18px; margin-top: 40px;"><u>{{Session::get('accountInfo.firstName')}} {{Session::get('accountInfo.middleName')}} {{Session::get('accountInfo.lastName')}} {{Session::get('accountInfo.quantifier')}}</u> M.D.</header>
            <header style="font-size: 18px;">Clinic Physician</header>   
            <header style="font-size: 18px; margin-top: 20px; text-align: right;"><u style="text-align: center; padding: 0 0 4px;">{{Session::get('accountInfo.licenseNumber')}}</u> Lic. No.</header>
          </div>
        </div>
    </div>
</body>
</html>