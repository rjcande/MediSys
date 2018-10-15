<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medical Log Each</title>
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
          <img src="{{asset('images/images/PUPLogo.png')}}" alt="PUP Logo" style="height: 100px; weight: 100px; float: left">
          <p style="margin-left: 25px">
          Republic of the Philippines <br>
          POLYTECHNIC UNIVERSITY OF THE PHILIPPINES<br>
          <em>Medical Services Department</em><br>
          <b>DENTAL SERVICES</b><br>
        <h1>Daily Treatment Record</h1>
      </center>
      {{-- @foreach ($patientDentalLogs as $dentalLogInfo) --}}
      <p style="font-size: 20px">Patient Name: {{ $patientInfo->lastName }}, {{ $patientInfo->firstName }} {{ $patientInfo->middleName }} {{ $patientInfo->quantifier }}</p>
      {{-- @endforeach --}}
      {{-- <p>Contact Number: {{ $dentalLogInfo['mobileNo'] }}</p> --}}

      <table style = "width:100%">
        <caption>Daily Treatment Record
        </caption>
          <tr>
            <th>No</th>
            <th>Concern</th>
            <th>Attending Dentist</th>
            <th>Date</th>
            <th>Time In</th>
            <th>Time Out</th>
            {{-- <th>Supply Name</th>
            <th>Medical Supply Brand</th>
            <th>Medication</th> --}}
          </tr>      
          <tbody>
          @php($ctr = sizeof($patientAllLogs))
           @foreach($patientAllLogs as $dentalLogs)
              <tr>
                <td>{{$ctr}}</td>
                @if($dentalLogs->concern == 0)
                  <td>{{ 'Consultation' }}</td>
                @elseif($dentalLogs->concern == 1)
                  <td>{{'Certification'}}</td>
                @endif
                <td>
                  @foreach($attendingDentist as $dentist)
                    @if($dentalLogs->clinicLogID == $dentist->clinicLogID)
                      {{$dentist->lastName}}, {{$dentist->firstName}} {{$dentist->middleName}} {{$dentist->quantifier}}
                    @endif
                  @endforeach
                </td>
                <td>{{ date('F d, Y', strtotime($dentalLogs->clinicLogDateTime)) }}</td>
                <td>{{ date('h:i a', strtotime($dentalLogs->clinicLogDateTime)) }}</td>
                @if(empty($dentalLogs->timeOut))  
                  <td>NONE</td>
                @else
                  <td>{{date("h:i a", strtotime($dentalLogs->timeOut))}}</td>
                @endif
              </tr>
              @php($ctr--)
            @endforeach
          </tbody>
        </table>

        {{-- <div style="width:100%;text-align: right; position: absolute; bottom: 0">
          <div style="text-align: center; margin-left: 500px;">
            <header style="font-size: 18px; margin-top: 40px;"><u>{{Session::get('accountInfo.firstName')}} {{Session::get('accountInfo.middleName')}} {{Session::get('accountInfo.lastName')}} {{Session::get('accountInfo.quantifier')}}</u> M.D.</header>
            <header style="font-size: 18px;">Clinic Dentist</header>   
            <header style="font-size: 18px; margin-top: 20px; text-align: right;"><u style="text-align: center; padding: 0 0 4px;">{{Session::get('accountInfo.licenseNumber')}}</u> Lic. No.</header>
          </div>
        </div> --}}
    </div>
</body>
</html>