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
        <h1>List of Patients</h1>
      </center>
      <caption>Student</caption>
      <table style = "width:100%; margin-bottom: 50px;">
          <tr>
            <th>Student Number</th>
            <th>Patient Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>Address</th>
          </tr>      
          <tbody>
           @foreach($patientListStudent as $patient)
              <tr>
                <td>{{ $patient->patientNumber }}</td>
                <td>{{ $patient->lastName }}, {{ $patient->firstName }} {{ $patient->middleName }} {{ $patient->quantifier }}</td>
                <td>
                  {{ date('F d, Y', strtotime($patient->birthDate)) }}
                </td>
                <td>
                  @if($patient->gender == '1')
                    {{ "Male" }}
                  @elseif($patient->gender == '0')
                    {{ "Female" }}
                  @endif
                </td>
                <td>{{ $patient->mobileNo }}</td>
                <td>{{ $patient->address }}</td>
              </tr>
           @endforeach
          </tbody>
        </table>
        <caption>Faculty</caption>
        <table style = "width:100%; margin-bottom: 50px;">
          <tr>
            <th>Faculty Number</th>
            <th>Patient Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>Address</th>
          </tr>      
          <tbody>
           @foreach($patientListFaculty as $patient)
              <tr>
                <td>{{ $patient->patientNumber }}</td>
                <td>{{ $patient->lastName }}, {{ $patient->firstName }} {{ $patient->middleName }} {{ $patient->quantifier }}</td>
                <td>
                  {{ date('F d, Y', strtotime($patient->birthDate)) }}
                </td>
                <td>
                  @if($patient->gender == '1')
                    {{ "Male" }}
                  @elseif($patient->gender == '0')
                    {{ "Female" }}
                  @endif
                </td>
                <td>{{ $patient->mobileNo }}</td>
                <td>{{ $patient->address }}</td>
              </tr>
           @endforeach
          </tbody>
        </table>

        <caption>Admin/Dept</caption>
        <table style = "width:100%; margin-bottom: 50px;">
          <tr>
            <th>Faculty Number</th>
            <th>Patient Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>Address</th>
          </tr>      
          <tbody>
           @foreach($patientListAdmin as $patient)
              <tr>
                <td>{{ $patient->patientNumber }}</td>
                <td>{{ $patient->lastName }}, {{ $patient->firstName }} {{ $patient->middleName }} {{ $patient->quantifier }}</td>
                <td>
                  {{ date('F d, Y', strtotime($patient->birthDate)) }}
                </td>
                <td>
                  @if($patient->gender == '1')
                    {{ "Male" }}
                  @elseif($patient->gender == '0')
                    {{ "Female" }}
                  @endif
                </td>
                <td>{{ $patient->mobileNo }}</td>
                <td>{{ $patient->address }}</td>
              </tr>
           @endforeach
          </tbody>
        </table>
        <caption>Visitor</caption>
        <table style = "width:100%; margin-bottom: 50px;">
          <tr>
            <th>Patient Number</th>
            <th>Patient Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>Address</th>
          </tr>      
          <tbody>
           @foreach($patientListVisitor as $patient)
              <tr>
                <td>{{ $patient->patientNumber }}</td>
                <td>{{ $patient->lastName }}, {{ $patient->firstName }} {{ $patient->middleName }} {{ $patient->quantifier }}</td>
                <td>
                  {{ date('F d, Y', strtotime($patient->birthDate)) }}
                </td>
                <td>
                  @if($patient->gender == '1')
                    {{ "Male" }}
                  @elseif($patient->gender == '0')
                    {{ "Female" }}
                  @endif
                </td>
                <td>{{ $patient->mobileNo }}</td>
                <td>{{ $patient->address }}</td>
              </tr>
           @endforeach
          </tbody>
        </table>
    </div>
</body>
</html>