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
     <img src={{asset("images/pup-logo.png")}} style="float: left;" width="100px" height="100px">
      <center>
        <header style="font-size: 25px;">Republic of the Philippines</header>
        <header style="font-size: 25px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header>
        <header style="font-size: 25px;">MEDICAL SERVICES DEPARTMENT</header>
        <header style="font-size: 25px;">Sta. Mesa, Manila</header>
        <hr>
        <h1>Medical Log</h1>
      </center>
      <label>Patient Name:{{ $patientInfo['lastName'] }}, {{ $patientInfo['firstName'] }} {{ $patientInfo['middleName']{0} }}@if($patientInfo['middleName']){{ '.' }}@endif {{ $patientInfo['quantifier'] }} </label><br>
      <label>
        Patient Type:
        @if($patientInfo['patientType'] == 1)
          {{ "Student" }}
        @elseif($patientInfo['patientType'] == 2)
          {{ "Faculty/College" }}
        @elseif($patientInfo['patientType'] == 3)
          {{ "Admin/Dept" }}
        @elseif($patientInfo['patientType'] == 4)
          {{ "Visitor" }}
        @endif
      </label>
      <caption>
        
      </caption>
      <table style = "width:100%">
          <tr>
            <th class="column-title">No </th>
            <th class="column-title">Activity/Concern</th>
            <th class="column-title">Date </th>
            <th class="column-title">Time In </th>
            <th class="column-title">Time Out</th>
          </tr>      
          <tbody>
            @php
              $ctr = 1;
            @endphp
           @foreach($medicalLogs as $log)
              <tr>
                <td>{{ $ctr }}</td>
                <td>@if($log->concern == 0)
                    {{ "Consultation" }}
                  @elseif($log->concern == 1)
                    {{ "Letter/Certification" }}
                  @endif</td>
                <td> 
                 {{ date("F d, Y", strtotime($log->clinicLogDateTime)) }}
                </td>
                <td>
                  {{ date("h:i a", strtotime($log->clinicLogDateTime)) }}
                </td>
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