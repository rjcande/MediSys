<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medicine List</title>
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
      <img src={{asset("images/pup-logo.png")}} style="float: left;" width="120px" height="120px">
      <center>
        <header style="font-size: 20px;">Republic of the Philippines</header>
        <header style="font-size: 20px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header>
        <header style="font-size: 20px;">MEDICAL SERVICES DEPARTMENT</header>
        <header style="font-size: 20px;">Sta. Mesa, Manila</header>
        <h1>Medicine List</h1>
      </center>
      <caption></caption>
      <table style = "width:100%; margin-bottom: 50px;">
          <tr>
            <th>Generic Name</th>
            <th>Brand Name</th>
            <th>Unit</th>
            <th>Dosage</th>
          </tr>      
          <tbody>
            @foreach($medicines as $medicine)
              <tr>
                <td>{{$medicine->genericName}}</td>
                <td>{{$medicine->brand}}</td>
                <td>{{$medicine->unit}}</td>
                <td>{{$medicine->dosage}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</body>
</html>