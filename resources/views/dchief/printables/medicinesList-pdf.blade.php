<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medicines List</title>
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
          <b>DENTAL SERVICES</b>
          </p>
          <hr>
        <h1>Medicines List</h1>
      </center>
      {{-- <p>Name: {{ $dentalLogInfo['lastName'] }}, {{ $dentalLogInfo['firstName'] }} {{ $dentalLogInfo['middleName'] }} {{ $dentalLogInfo['quantifier'] }}</p>
      <p>Contact Number: {{ $dentalLogInfo['mobileNo'] }}</p> --}}

      <table style = "width:100%; page-break-inside: auto;" >
        {{-- <caption>Dental Logs</caption> --}}
        <thead>
          <tr>
            <th>Generic Name</th>
            <th>Brand Name</th>
            <th>Unit</th>
            <th>Dosage</th>
          </tr>
        </thead>      
          <tbody>
           @foreach($medicineList as $medicines)
              <tr>
                <td>{{ $medicines->genericName }}</td>
                <td>{{ $medicines->brand }}</td>
                <td>{{$medicines->unit}}</td>
                <td>{{$medicines->dosage}}</td>
              </tr>
           @endforeach
          </tbody>
        </table>
    </div>
</body>
</html>