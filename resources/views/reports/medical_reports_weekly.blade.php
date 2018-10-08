<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medicine Reports</title>
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
   <!-- jQuery -->
   <!--  <script src={{asset("../vendors/jquery/dist/jquery.min.js")}}></script> -->
     <!-- Bootstrap -->
 <!--    <link href={{asset("../vendors/bootstrap/dist/css/bootstrap.min.css")}} rel="stylesheet"> -->
 

    <!-- Custom Theme Style -->
 <!--    <link href={{asset("../build/css/custom.min.css")}} rel="stylesheet"> -->

</head>
<body>

    <div>
      <center>
        <header style="font-size: 15px;">Republic of the Philippines</header><br>
        <header style="font-size: 15px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</header><br>
        <header style="font-size: 15px;">MEDICAL SERVICES DEPARTMENT</header><br>
        <header style="font-size: 15px;">Sta. Mesa, Manila</header><br>
      
        <h1>Medicine Reports ({{ date('F') }})</h1>
      </center>
       @php
          $date = date('Y-m-t');   
       @endphp
      
      @if($currentWeek == 1)
        <caption>Number of Medical Supply Used a Day</caption>
        <table class="table table-striped table-bordered jambo_table bulk_action">
            <thead>
               <tr class="headings">
                  <th class="column-title" style="width: 20%">Medical Supply Name</th>
                  <th class="column-title">Day 1</th>
                  <th class="column-title">Day 2</th>
                  <th class="column-title">Day 3</th>
                  <th class="column-title">Day 4</th>
                  <th class="column-title">Day 5</th>
                  <th class="column-title">Day 6</th>
                  <th class="column-title">Day 7</th>
               </tr>
            </thead>

            <tbody>
               @foreach($results as $key => $supply)
                  <tr class="even-pointer">
                     <td class=" ">
                        @foreach($usedMedSupps as $medicalSupply)
                           @if($medicalSupply->medSupplyID == $key && $medicalSupply->month == date('m'))
                              {{ $medicalSupply->medSupName }} {{ $medicalSupply->brand }}
                            @break
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 1 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 2 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 3 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 4 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 5 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 6 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 7 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                  </tr>
           
               @endforeach
            </tbody>
         </table>
      @elseif($currentWeek == 2)
        <caption>Number of Medical Supply Used a Day</caption>
        <table class="table table-striped table-bordered jambo_table bulk_action">
            <thead>
               <tr class="headings">
                  <th class="column-title" style="width: 20%">Medical Supply Name</th>
                  <th class="column-title">Day 8</th>
                  <th class="column-title">Day 9</th>
                  <th class="column-title">Day 10</th>
                  <th class="column-title">Day 11</th>
                  <th class="column-title">Day 12</th>
                  <th class="column-title">Day 13</th>
                  <th class="column-title">Day 14</th>
               </tr>
            </thead>

            <tbody>
                @foreach($results as $key => $supply)
                  <tr class="even-pointer">
                     <td class=" ">
                        @foreach($usedMedSupps as $medicalSupply)
                           @if($medicalSupply->medSupplyID == $key && $medicalSupply->month == date('m'))
                              {{ $medicalSupply->medSupName }} {{ $medicalSupply->brand }}
                            @break
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 8 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 9 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 10 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 11 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 12 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 13 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                     <td class=" ">
                        @foreach($supply as $index => $value)
                           @if($value['day'] == 14 && $value['month'] == date('m') && $value['year'] == date('Y'))
                              {{ $value['total'] }}
                           @endif
                        @endforeach
                     </td>
                  </tr>
           
               @endforeach
            </tbody>
         </table>
      @elseif($currentWeek == 3)
        <caption>Number of Medical Supply Used a Day</caption>
        <table class="table table-striped table-bordered jambo_table bulk_action">
           <thead>
              <tr class="headings">
                 <th class="column-title" style="width: 20%">Medical Supply Name</th>
                 <th class="column-title">Day 15</th>
                 <th class="column-title">Day 16</th>
                 <th class="column-title">Day 17</th>
                 <th class="column-title">Day 18</th>
                 <th class="column-title">Day 19</th>
                 <th class="column-title">Day 20</th>
                 <th class="column-title">Day 21</th>
              </tr>
           </thead>

           <tbody>
               @foreach($results as $key => $supply)
                    <tr class="even-pointer">
                       <td class=" ">
                          @foreach($usedMedSupps as $medicalSupply)
                             @if($medicalSupply->medSupplyID == $key && $medicalSupply->month == date('m'))
                                {{ $medicalSupply->medSupName }} {{ $medicalSupply->brand }}
                              @break
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 15 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 16 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 17 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 18 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 19 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 20 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 21 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                    </tr>
             
                 @endforeach
           </tbody>
        </table>
      @elseif($currentWeek == 4)
        <caption>Number of Medical Supply Used a Day</caption>
        <table class="table table-striped table-bordered jambo_table bulk_action">
           <thead>
              <tr class="headings">
                 <th class="column-title" style="width: 20%">Medical Supply Name</th>
                 <th class="column-title">Day 22</th>
                 <th class="column-title">Day 23</th>
                 <th class="column-title">Day 24</th>
                 <th class="column-title">Day 25</th>
                 <th class="column-title">Day 26</th>
                 <th class="column-title">Day 27</th>
                 <th class="column-title">Day 28</th>
              </tr>
           </thead>

           <tbody>
               @foreach($results as $key => $supply)
                    <tr class="even-pointer">
                       <td class=" ">
                          @foreach($usedMedSupps as $medicalSupply)
                             @if($medicalSupply->medSupplyID == $key && $medicalSupply->month == date('m'))
                                {{ $medicalSupply->medSupName }} {{ $medicalSupply->brand }}
                              @break
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 22 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 23 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 24 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 25 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 26 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 27 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class=" ">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 28 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                    </tr>
             
                 @endforeach
           </tbody>
        </table>
      @elseif($currentWeek == 5)
        <caption>Number of Medical Supply Used a Day</caption>
        <table class="table table-striped table-bordered jambo_table bulk_action">
           <thead>
              <tr class="headings">
                 <th class="column-title" style="width: 20%">Medical Supply Name</th>
                  @if($maxDays == 29)
                    <th class="column-title">Day 29</th>
                 @elseif($maxDays == 30)
                    <th class="column-title">Day 29</th>
                    <th class="column-title">Day 30</th>
                 @elseif($maxDays == 31)
                    <th class="column-title">Day 29</th>
                    <th class="column-title">Day 30</th>
                    <th class="column-title">Day 31</th>
                 @endif
             
           </thead>

           <tbody>
              @foreach($results as $key => $supply)
                 <tr class="even-pointer">
                       <td class=" ">
                          @foreach($usedMedSupps as $medicalSupply)
                             @if($medicalSupply->medSupplyID == $key)
                                {{ $medicalSupply->medSupName }} {{ $medicalSupply->brand }}
                                @break
                             @endif
                          @endforeach
                       </td>
                    @if($maxDays == 29)
                       <td class="">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 29 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                    @elseif($maxDays == 30)
                       <td class="">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 29 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class="">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 30 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                    @elseif($maxDays == 31)
                       <td class="">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 29 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class="">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 30 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                       <td class="">
                          @foreach($supply as $index => $value)
                             @if($value['day'] == 31 && $value['month'] == date('m') && $value['year'] == date('Y'))
                                {{ $value['total'] }}
                             @endif
                          @endforeach
                       </td>
                    @endif
                 </tr>
              @endforeach
           </tbody>
        </table>
      @endif
       
    </div>
    <!-- Chart.js -->
  <!--   <script src={{asset("../vendors/Chart.js/dist/Chart.min.js")}}></script> -->
   
</body>
</html>