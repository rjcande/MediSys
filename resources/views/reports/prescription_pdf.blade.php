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
    caption{
      font-family:verdana;
      font-size: 160%;
    }
  </style>
</head>
<body>
    <div>
      <img src={{asset("images/pup-logo.png")}} style="float: left;" width="75px" height="75px">
      <center>
        <header style="font-size: 15px;">Republic of the Philippines</header>
        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header>
        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header>
        <header style="font-size: 15px;">Sta. Mesa, Manila</header>
        <h1>Medication Prescription</h1>
      </center>
      <p>Patient Name: {{ $clinicLogInfo->lastName }}, {{ $clinicLogInfo->firstName }} {{ $clinicLogInfo->middleName }} {{ $clinicLogInfo->quantifier }}</p>

      <table style = "width:100%">
        <caption>Prescriptions
        </caption>
          <tr>
            <th>Generic Name</th>
            <th>Brand</th>
            <th>Dosage</th>
            <th>Medication</th>
          </tr>      
          <tbody>
           @foreach($prescriptionInfo as $prescription)
              <tr>
                <td>{{ $prescription->genericName }}</td>
                <td>{{ $prescription->brand }}</td>
                <td>{{ $prescription->dosage }}</td>
                <td>{{ $prescription->medication }}</td>
              </tr>
           @endforeach
          </tbody>
        </table>

        <div style="width:100%;text-align: right; position: absolute; bottom: 0">
          <div style="text-align: center; margin-left: 450px;">
            <header style="font-size: 18px; margin-top: 40px;"><u>{{ $attendingPhysician['firstName'] }} {{ $attendingPhysician['middleName'] }} {{ $attendingPhysician['lastName'] }} {{ $attendingPhysician['quantifier'] }}</u> M.D.</header>
            <header style="font-size: 18px;">Clinic Physician</header>   
            <header style="font-size: 18px; margin-top: 20px; text-align: right;"><u style="text-align: center; padding: 0 0 4px;">{{ $attendingPhysician['licenseNumber'] }}</u> Lic. No.</header>
          </div>
        </div>
    </div>
</body>
</html>