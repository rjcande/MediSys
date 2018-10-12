<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Patient List</title>
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
        <header style="font-size: 18px;">Republic of the Philippines</header><br>
        <header style="font-size: 18px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
        <header style="font-size: 18px;">MEDICAL SERVICES DEPARTMENT</header><br>
        <header style="font-size: 18px;">Sta. Mesa, Manila</header><br>
        <h1>Lists of Patients</h1>
      </center>
      {{-- <p>Name: {{ $dentalLogInfo['lastName'] }}, {{ $dentalLogInfo['firstName'] }} {{ $dentalLogInfo['middleName'] }} {{ $dentalLogInfo['quantifier'] }}</p>
      <p>Contact Number: {{ $dentalLogInfo['mobileNo'] }}</p> --}}
      <caption>
        Student
        @if(isset($date['daily']) == 1 && !isset($date['yearly']) && !isset($date['monthly']) && !isset($date['weekly']))
          ({{ date('F d, Y', strtotime($date['date'])) }})
        @elseif(!isset($date['daily'])  && isset($date['yearly']) == 1 && !isset($date['monthly']) && !isset($date['weekly']))
          ({{ date('Y', strtotime($date['year'])) }})
        @elseif(!isset($date['daily']) && !isset($date['yearly']) && isset($date['monthly']) == 1 && !isset($date['weekly']))
          ({{ date('F, ', mktime(0,0,0, $date['month'], 10)) }} {{$date['year_month']}})
        @elseif(!isset($date['daily'])  && !isset($date['yearly']) && !isset($date['monthly']) && isset($date['weekly']) == 1)
          ({{ date('F d, Y', strtotime($date['weekFrom'])) }} - {{ date('F d, Y', strtotime($date['weekTo'])) }})

        
        @endif
      </caption>
      <table style = "width:100%; page-break-inside: auto;" >
        {{-- <caption>Dental Logs</caption> --}}
        <thead>
          <tr>
            <th>Student/Faculty Number</th>
            <th>Patient Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>Address</th>
          </tr>
        </thead>      
          <tbody>
           @foreach($patientListStudent as $patients)
              <tr>
                <td>{{ $patients->patientNumber }}</td>
                {{-- <td>{{ $patients->patientID }}</td> --}}
                <td>{{$patients->firstName}} {{$patients->middleName}} {{$patients->lastName}} {{$patients->quantifier}}</td>
                <td class=" ">{{date('F d, Y', strtotime($patients->birthDate))}}</td>
                <td>
                  @if($patients->gender == 1)
                    {{'Male'}}
                  @elseif($patients->gender == 0)
                    {{'Female'}}
                  @endif
                </td>
                <td>{{$patients->mobileNo}}</td>
                <td>{{$patients->address}}</td>
              </tr>
           @endforeach
          </tbody>
        </table>
          <br><br>
        <caption>
            Faculty
            @if(isset($date['daily']) == 1 && !isset($date['yearly']) && !isset($date['monthly']) && !isset($date['weekly']))
              ({{ date('F d, Y', strtotime($date['date'])) }})
            @elseif(!isset($date['daily'])  && isset($date['yearly']) == 1 && !isset($date['monthly']) && !isset($date['weekly']))
              ({{ date('Y', strtotime($date['year'])) }})
            @elseif(!isset($date['daily']) && !isset($date['yearly']) && isset($date['monthly']) == 1 && !isset($date['weekly']))
              ({{ date('F, ', mktime(0,0,0, $date['month'], 10)) }} {{$date['year_month']}})
            @elseif(!isset($date['daily'])  && !isset($date['yearly']) && !isset($date['monthly']) && isset($date['weekly']) == 1)
              ({{ date('F d, Y', strtotime($date['weekFrom'])) }} - {{ date('F d, Y', strtotime($date['weekTo'])) }})
            @endif
        </caption>
        <table style = "width:100%; page-break-inside: auto;" >
            {{-- <caption>Dental Logs</caption> --}}
            <thead>
              <tr>
                  <th>Student/Faculty Number</th>
                  <th>Patient Name</th>
                  <th>Birthday</th>
                  <th>Gender</th>
                  <th>Mobile Number</th>
                  <th>Address</th>
              </tr>
            </thead>      
            <tbody>
              @foreach($patientListStudent as $patients)
                  <tr>
                    <td>{{ $patients->patientNumber }}</td>
                    {{-- <td>{{ $patients->patientID }}</td> --}}
                    <td>{{$patients->firstName}} {{$patients->middleName}} {{$patients->lastName}} {{$patients->quantifier}}</td>
                    <td class=" ">{{date('F d, Y', strtotime($patients->birthDate))}}</td>
                    <td>
                      @if($patients->gender == 1)
                        {{'Male'}}
                      @elseif($patients->gender == 0)
                        {{'Female'}}
                      @endif
                    </td>
                    <td>{{$patients->mobileNo}}</td>
                    <td>{{$patients->address}}</td>
                  </tr>
              @endforeach
              </tbody>
            </table>
            <br><br>
            <caption>
                Admin/Dept
                @if(isset($date['daily']) == 1 && !isset($date['yearly']) && !isset($date['monthly']) && !isset($date['weekly']))
                  ({{ date('F d, Y', strtotime($date['date'])) }})
                @elseif(!isset($date['daily'])  && isset($date['yearly']) == 1 && !isset($date['monthly']) && !isset($date['weekly']))
                  ({{ date('Y', strtotime($date['year'])) }})
                @elseif(!isset($date['daily']) && !isset($date['yearly']) && isset($date['monthly']) == 1 && !isset($date['weekly']))
                  ({{ date('F, ', mktime(0,0,0, $date['month'], 10)) }} {{$date['year_month']}})
                @elseif(!isset($date['daily'])  && !isset($date['yearly']) && !isset($date['monthly']) && isset($date['weekly']) == 1)
                  ({{ date('F d, Y', strtotime($date['weekFrom'])) }} - {{ date('F d, Y', strtotime($date['weekTo'])) }})
                @endif
            </caption>
            <table style = "width:100%; page-break-inside: auto;" >
                {{-- <caption>Dental Logs</caption> --}}
                <thead>
                  <tr>
                      <th>Student/Faculty Number</th>
                      <th>Patient Name</th>
                      <th>Birthday</th>
                      <th>Gender</th>
                      <th>Mobile Number</th>
                      <th>Address</th>
                  </tr>
                </thead>      
                  <tbody>
                   @foreach($patientListAdmin as $patients)
                      <tr>
                        <td>{{ $patients->patientNumber }}</td>
                        <td>{{ $patients->patientID }}</td>
                        <td>{{$patients->firstName}} {{$patients->middleName}} {{$patients->lastName}} {{$patients->quantifier}}</td>
                        <td class=" ">
                            @if($patients->patientType == 1)
                            {{
                                'Student'
                            }}
                            @elseif($patients->patientType == 2)
                            {{
                                'Faculty/College'
                            }}
                            @elseif($patients->patientType == 3)
                            {{
                                'Admin/Dept'
                            }}
                            @endif
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
                </table>
                <br><br>
              <caption>
                Visitor
                @if(isset($date['daily']) == 1 && !isset($date['yearly']) && !isset($date['monthly']) && !isset($date['weekly']))
                  ({{ date('F d, Y', strtotime($date['date'])) }})
                @elseif(!isset($date['daily'])  && isset($date['yearly']) == 1 && !isset($date['monthly']) && !isset($date['weekly']))
                  ({{ date('Y', strtotime($date['year'])) }})
                @elseif(!isset($date['daily']) && !isset($date['yearly']) && isset($date['monthly']) == 1 && !isset($date['weekly']))
                  ({{ date('F, ', mktime(0,0,0, $date['month'], 10)) }} {{$date['year_month']}})
                @elseif(!isset($date['daily'])  && !isset($date['yearly']) && !isset($date['monthly']) && isset($date['weekly']) == 1)
                  ({{ date('F d, Y', strtotime($date['weekFrom'])) }} - {{ date('F d, Y', strtotime($date['weekTo'])) }})
                @endif
            </caption>
            <table style = "width:100%; page-break-inside: auto;" >
                {{-- <caption>Dental Logs</caption> --}}
                <thead>
                  <tr>
                      <th>Student/Faculty Number</th>
                      <th>Patient Name</th>
                      <th>Birthday</th>
                      <th>Gender</th>
                      <th>Mobile Number</th>
                      <th>Address</th>
                  </tr>
                </thead>      
                <tbody>
                @foreach($patientListStudent as $patients)
                    <tr>
                      <td>{{ $patients->patientNumber }}</td>
                      {{-- <td>{{ $patients->patientID }}</td> --}}
                      <td>{{$patients->firstName}} {{$patients->middleName}} {{$patients->lastName}} {{$patients->quantifier}}</td>
                      <td class=" ">{{date('F d, Y', strtotime($patients->birthDate))}}</td>
                      <td>
                        @if($patients->gender == 1)
                          {{'Male'}}
                        @elseif($patients->gender == 0)
                          {{'Female'}}
                        @endif
                      </td>
                      <td>{{$patients->mobileNo}}</td>
                      <td>{{$patients->address}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
 
        {{-- <div style="width:100%;text-align: right; position: absolute; ">
          <div style="text-align: center; margin-left: 500px;">
            <header style="font-size: 18px; margin-top: 40px;"><u>{{Session::get('accountInfo.firstName')}} {{Session::get('accountInfo.middleName')}} {{Session::get('accountInfo.lastName')}} {{Session::get('accountInfo.quantifier')}}</u> M.D.</header>
            <header style="font-size: 18px;">Clinic Dentist</header>   
            <header style="font-size: 18px; margin-top: 20px; text-align: right;"><u style="text-align: center; padding: 0 0 4px;">{{Session::get('accountInfo.licenseNumber')}}</u> Lic. No.</header>
          </div>
        </div> --}}
    </div>
</body>
</html>