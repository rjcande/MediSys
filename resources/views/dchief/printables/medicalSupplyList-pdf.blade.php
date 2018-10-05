<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medical Supplies List</title>
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
        <h1>Medical Supplies List</h1>
      </center>
      {{-- <p>Name: {{ $dentalLogInfo['lastName'] }}, {{ $dentalLogInfo['firstName'] }} {{ $dentalLogInfo['middleName'] }} {{ $dentalLogInfo['quantifier'] }}</p>
      <p>Contact Number: {{ $dentalLogInfo['mobileNo'] }}</p> --}}

      <table style = "width:100%; page-break-inside: auto;" >
        {{-- <caption>Dental Logs</caption> --}}
        <thead>
          <tr>
            <th>Medical Supply Name</th>
            <th>Brand Name</th>
            <th>Unit</th>
          </tr>
        </thead>      
          <tbody>
           @foreach($medicalSupplyList as $medicalSupplies)
              <tr>
                <td>{{$medicalSupplies->medSupName}}</td>
                <td>{{$medicalSupplies->brand}}</td>
                <td>{{$medicalSupplies->unit}}</td>
              </tr>
           @endforeach
          </tbody>
        </table>
    </div>
</body>
</html>