<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medical Supply List</title>
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
        <h1>Medical Supply List</h1>
      </center>
      <caption></caption>
      <table style = "width:100%; margin-bottom: 50px;">
          <tr>
            <th>Medical Supply Name</th>
            <th>Brand Name</th>
            <th>Unit</th>
          </tr>      
          <tbody>
            @foreach($supply as $supp)
              <tr>
                <td>{{$supp->medSupName}}</td>
                <td>{{$supp->brand}}</td>
                <td>{{$supp->unit}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</body>
</html>