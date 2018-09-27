<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medical Log</title>
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
    caption{
      font-family:verdana;
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
        <h1>Medical Log</h1>
      </center>

      <table style = "width:100%">
          <tr>
            <th>No</th>
            <th>Patient Name</th>
            <th>Type</th>
            <th>Activity/Concern</th>
            <th>Date</th>
            <th>Time in</th>
            <th>Time out</th>
          </tr>      
          <tbody>
            @php
              $ctr = 1;
            @endphp
           @foreach($clinicLogs as $log)
              <tr>
                <td>{{ $ctr }}</td>
                <td>{{ $log->lastName }}, {{ $log->firstName }} {{ $log->middleName }} {{ $log->quantifier }}</td>
                <td> 
                  @if($log->patientType == 1)
                    {{ "Student" }}
                  @elseif($log->patientType == 2)
                    {{ "Faculty/College" }}
                  @elseif($log->patientType == 3)
                    {{ "Admin/Dept" }}
                  @elseif($log->patientType == 4)
                    {{ "Visitor" }}
                  @endif
                </td>
                <td>
                  @if($log->concern == 0)
                    {{ "Consultation" }}
                  @elseif($log->concern == 1)
                    {{ "Letter/Certification" }}
                  @endif
                </td>
                <td> {{ date("F d, Y", strtotime($log->clinicLogDateTime)) }}</td>
                <td>{{ date("h:i a", strtotime($log->clinicLogDateTime)) }}</td>
                <td>
                  @if($log->timeOut)
                    {{ date('h:i a', strtotime($log->timeOut)) }}
                  @endif
                </td>
              </tr>
              @php($ctr++)
           @endforeach
          </tbody>
        </table>
    </div>
</body>
</html>