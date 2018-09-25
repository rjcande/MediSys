<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medical Supplies Report</title>
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
        @php
          $dateObj = DateTime::createFromFormat('!m', $month);
          $monthName = $dateObj->format('F');
        @endphp
        <h1>Medical Supplies Reports ({{ $monthName }})</h1>
      </center>
       @php
          $date = date('Y-m-t');   
       @endphp
      <table style = "width:100%">
          <tr>
            <th>Generic Name/Brand</th>
            <th>Week 1</th>
            <th>Week 2</th>
            <th>Week 3</th>
            <th>Week 4</th>
            <th>Week 5</th>
          </tr>      
          <tbody>
           @foreach($results_for_month as $key => $medicine)
               <tr class="even-pointer">
                  <td class=" ">
                     @foreach($percentagePrescription_weekly as $prescription)
                        @if($prescription->medSupplyID == $key)
                           {{ $prescription->medSupName }} {{ $prescription->brand }}
                           @break
                        @endif
                     @endforeach
                  </td>
                  <td class=" ">
                     @php
                        $sumFirstWeek = 0;
                     @endphp
                     @foreach($medicine as $index => $value)
                        @if($value['week'] == 1 && $value['month'] == $month && $value['year'] == date('Y'))
                           @php
                              $sumFirstWeek +=$value['total'];
                           @endphp
                        @endif
                     @endforeach
                     {{ $sumFirstWeek }}
                  </td>
                  <td class=" ">
                     @php
                        $sumSecondWeek = 0;
                     @endphp
                     @foreach($medicine as $index => $value)
                        @if($value['week'] == 2 && $value['month'] == $month && $value['year'] == date('Y'))
                           @php
                              $sumSecondWeek +=$value['total'];
                           @endphp
                        @endif
                     @endforeach
                     {{ $sumSecondWeek }}
                  </td>
                  <td class=" ">
                     @php
                        $sumThirdWeek = 0;
                     @endphp
                     @foreach($medicine as $index => $value)
                        @if($value['week'] == 3 && $value['month'] == $month && $value['year'] == date('Y'))
                           @php
                              $sumThirdWeek +=$value['total'];
                           @endphp
                        @endif
                     @endforeach
                     {{ $sumThirdWeek }}
                  </td>
                  <td class=" ">
                     @php
                        $sumFourthWeek = 0;
                     @endphp
                     @foreach($medicine as $index => $value)
                        @if($value['week'] == 4 && $value['month'] == $month && $value['year'] == date('Y'))
                           @php
                              $sumFourthWeek +=$value['total'];
                           @endphp
                        @endif
                     @endforeach
                     {{ $sumFourthWeek }}
                  </td>

                  @if(($checkDate = date('t', strtotime($date))) == 31 || ($checkDate = date('t', strtotime($date))) == 30 || ($checkDate = date('t', strtotime($date))) == 29)
                     <td class=" ">
                        @php
                           $sumFifthWeek = 0;
                        @endphp
                        @foreach($medicine as $index => $value)
                           @if($value['week'] == 5 && $value['month'] == $month && $value['year'] == date('Y'))
                              @php
                                 $sumFifthWeek +=$value['total'];
                              @endphp
                           @endif
                        @endforeach
                        {{ $sumFifthWeek }}
                     </td>
                  @endif
                  
               </tr>
        
            @endforeach
          </tbody>
        </table>

       
    </div>
</body>
</html>