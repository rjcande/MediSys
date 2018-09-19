@extends('dentist.layout.dentist')

@section('content')

<style type="text/css">
    .btnTeeth
    {
        border-radius: 500px;
        width: 45px;
        height: 45px;
    }
    .imgTeeth
    {
        width: 50px;
        height: 50px;
    }
    .imgMidTeeth
    {
        width: 51px;
        height: 51px;
    }
</style>

    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>DentalChart ID: {{ $dentalchart['dentalChartID'] }}</h3>
            </div>
          </div>

            <div class="clearfix"></div>

          <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                   <!-- Content -->
                    @php
                        $status55a = '';
                        $status55b = '';
                        $status54a = '';
                        $status54b = '';
                        $status53a = '';
                        $status53b = '';
                        $status52a = '';
                        $status52b = '';
                        $status51a = '';
                        $status51b = '';

                        $status65a = '';
                        $status65b = '';
                        $status64a = '';
                        $status64b = '';
                        $status63a = '';
                        $status63b = '';
                        $status62a = '';
                        $status62b = '';
                        $status61a = '';
                        $status61b = '';

                        $status75a = '';
                        $status75b = '';
                        $status74a = '';
                        $status74b = '';
                        $status73a = '';
                        $status73b = '';
                        $status72a = '';
                        $status72b = '';
                        $status71a = '';
                        $status71b = '';

                        $status85a = '';
                        $status85b = '';
                        $status84a = '';
                        $status84b = '';
                        $status83a = '';
                        $status83b = '';
                        $status82a = '';
                        $status82b = '';
                        $status81a = '';
                        $status81b = '';
                        
                        $status11a = '';
                        $status11b = '';
                        $status12a = '';
                        $status12b = '';
                        $status13a = '';
                        $status13b = '';
                        $status14a = '';
                        $status14b = '';
                        $status15a = '';
                        $status15b = '';
                        $status16a = '';
                        $status16b = '';
                        $status17a = '';
                        $status17b = '';
                        $status18a = '';
                        $status18b = '';
                        $status11a = '';
                        $status11b = '';
                        $status12a = '';
                        $status12b = '';
                        $status13a = '';
                        $status13b = '';
                        $status14a = '';
                        $status14b = '';
                        $status15a = '';
                        $status15b = '';
                        $status16a = '';
                        $status16b = '';
                        $status17a = '';
                        $status17b = '';
                        $status18a = '';
                        $status18b = '';

                        $status21a = '';
                        $status21b = '';
                        $status22a = '';
                        $status22b = '';
                        $status23a = '';
                        $status23b = '';
                        $status24a = '';
                        $status24b = '';
                        $status25a = '';
                        $status25b = '';
                        $status26a = '';
                        $status26b = '';
                        $status27a = '';
                        $status27b = '';
                        $status28a = '';
                        $status28b = '';
                        $status21a = '';
                        $status21b = '';
                        $status22a = '';
                        $status22b = '';
                        $status23a = '';
                        $status23b = '';
                        $status24a = '';
                        $status24b = '';
                        $status25a = '';
                        $status25b = '';
                        $status26a = '';
                        $status26b = '';
                        $status27a = '';
                        $status27b = '';
                        $status28a = '';
                        $status28b = '';

                        $status31a = '';
                        $status31b = '';
                        $status32a = '';
                        $status32b = '';
                        $status33a = '';
                        $status33b = '';
                        $status34a = '';
                        $status34b = '';
                        $status35a = '';
                        $status35b = '';
                        $status36a = '';
                        $status36b = '';
                        $status37a = '';
                        $status37b = '';
                        $status38a = '';
                        $status38b = '';
                        $status31a = '';
                        $status31b = '';
                        $status32a = '';
                        $status32b = '';
                        $status33a = '';
                        $status33b = '';
                        $status34a = '';
                        $status34b = '';
                        $status35a = '';
                        $status35b = '';
                        $status36a = '';
                        $status36b = '';
                        $status37a = '';
                        $status37b = '';
                        $status38a = '';
                        $status38b = '';

                        $status41a = '';
                        $status41b = '';
                        $status42a = '';
                        $status42b = '';
                        $status43a = '';
                        $status43b = '';
                        $status44a = '';
                        $status44b = '';
                        $status45a = '';
                        $status45b = '';
                        $status46a = '';
                        $status46b = '';
                        $status47a = '';
                        $status47b = '';
                        $status48a = '';
                        $status48b = '';
                        $status41a = '';
                        $status41b = '';
                        $status42a = '';
                        $status42b = '';
                        $status43a = '';
                        $status43b = '';
                        $status44a = '';
                        $status44b = '';
                        $status45a = '';
                        $status45b = '';
                        $status46a = '';
                        $status46b = '';
                        $status47a = '';
                        $status47b = '';
                        $status48a = '';
                        $status48b = '';
                    @endphp
                   @if(count($toothconditions) > 0) 
                        @foreach($toothconditions as $toothcondition)
                        {{--  55 TO 51  --}}
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 55) 
                                @php $status55a = $toothcondition->toothStatusA;
                                $status55b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 54) 
                                @php $status54a = $toothcondition->toothStatusA;
                                $status54b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 53) 
                            @php $status53a = $toothcondition->toothStatusA;
                                $status53b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 52) 
                            @php $status52a = $toothcondition->toothStatusA;
                                $status52b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 51) 
                            @php $status51a = $toothcondition->toothStatusA;
                                $status51b = $toothcondition->toothStatusB; @endphp
                            @endif
                        {{--  65 TO 61  --}}
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 65) 
                                @php $status65a = $toothcondition->toothStatusA;
                                $status65b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 64) 
                                @php $status64a = $toothcondition->toothStatusA;
                                $status64b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 63) 
                            @php $status63a = $toothcondition->toothStatusA;
                                $status63b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 62) 
                            @php $status62a = $toothcondition->toothStatusA;
                                $status62b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 61) 
                            @php $status61a = $toothcondition->toothStatusA;
                                $status61b = $toothcondition->toothStatusB; @endphp
                            @endif
                        {{--  75 TO 71  --}}
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 75) 
                                @php $status75a = $toothcondition->toothStatusA;
                                $status75b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 74) 
                                @php $status74a = $toothcondition->toothStatusA;
                                $status74b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 73) 
                            @php $status73a = $toothcondition->toothStatusA;
                                $status73b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 72) 
                            @php $status72a = $toothcondition->toothStatusA;
                                $status72b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 71) 
                            @php $status71a = $toothcondition->toothStatusA;
                                $status71b = $toothcondition->toothStatusB; @endphp
                            @endif
                        {{--  85 TO 81  --}}
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 85) 
                                @php $status85a = $toothcondition->toothStatusA;
                                $status85b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 84) 
                                @php $status84a = $toothcondition->toothStatusA;
                                $status84b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 83) 
                            @php $status83a = $toothcondition->toothStatusA;
                                $status83b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 82) 
                            @php $status82a = $toothcondition->toothStatusA;
                                $status82b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 81) 
                            @php $status81a = $toothcondition->toothStatusA;
                                $status81b = $toothcondition->toothStatusB; @endphp
                            @endif
                            {{--  18 to 11  --}}
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 18) 
                                @php $status18a = $toothcondition->toothStatusA;
                                $status18b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 17) 
                                @php $status17a = $toothcondition->toothStatusA;
                                $status17b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 16) 
                            @php $status16a = $toothcondition->toothStatusA;
                                $status16b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 15) 
                                @php $status15a = $toothcondition->toothStatusA;
                                $status15b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 14) 
                                @php $status14a = $toothcondition->toothStatusA;
                                $status14b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 13) 
                            @php $status13a = $toothcondition->toothStatusA;
                                $status13b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 12) 
                            @php $status12a = $toothcondition->toothStatusA;
                                $status12b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 11) 
                            @php $status11a = $toothcondition->toothStatusA;
                                $status11b = $toothcondition->toothStatusB; @endphp
                            @endif
                            {{--  28 to 21  --}}
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 28) 
                                @php $status28a = $toothcondition->toothStatusA;
                                $status28b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 27) 
                                @php $status27a = $toothcondition->toothStatusA;
                                $status27b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 26) 
                            @php $status26a = $toothcondition->toothStatusA;
                                $status26b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 25) 
                                @php $status25a = $toothcondition->toothStatusA;
                                $status25b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 24) 
                                @php $status24a = $toothcondition->toothStatusA;
                                $status24b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 23) 
                            @php $status23a = $toothcondition->toothStatusA;
                                $status23b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 22) 
                            @php $status22a = $toothcondition->toothStatusA;
                                $status22b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 21) 
                            @php $status21a = $toothcondition->toothStatusA;
                                $status21b = $toothcondition->toothStatusB; @endphp
                            @endif
                            {{--  38 to 31  --}}
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 38) 
                                @php $status38a = $toothcondition->toothStatusA;
                                $status38b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 37) 
                                @php $status37a = $toothcondition->toothStatusA;
                                $status37b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 36) 
                            @php $status36a = $toothcondition->toothStatusA;
                                $status36b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 35) 
                                @php $status35a = $toothcondition->toothStatusA;
                                $status35b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 34) 
                                @php $status34a = $toothcondition->toothStatusA;
                                $status34b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 33) 
                            @php $status33a = $toothcondition->toothStatusA;
                                $status33b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 32) 
                            @php $status32a = $toothcondition->toothStatusA;
                                $status32b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 31) 
                            @php $status31a = $toothcondition->toothStatusA;
                                $status31b = $toothcondition->toothStatusB; @endphp
                            @endif
                            {{--  48 to 41  --}}
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 48) 
                                @php $status48a = $toothcondition->toothStatusA;
                                $status48b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 47) 
                                @php $status47a = $toothcondition->toothStatusA;
                                $status47b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 46) 
                            @php $status46a = $toothcondition->toothStatusA;
                                $status46b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 45) 
                                @php $status45a = $toothcondition->toothStatusA;
                                $status45b = $toothcondition->toothStatusB; @endphp
                              @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 44) 
                                @php $status44a = $toothcondition->toothStatusA;
                                $status44b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 43) 
                            @php $status43a = $toothcondition->toothStatusA;
                                $status43b = $toothcondition->toothStatusB; @endphp
                            @endif 
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 42) 
                            @php $status42a = $toothcondition->toothStatusA;
                                $status42b = $toothcondition->toothStatusB; @endphp
                            @endif
                            @if($toothcondition->isRecent == 1 && $toothcondition->toothNum == 41) 
                            @php $status41a = $toothcondition->toothStatusA;
                                $status41b = $toothcondition->toothStatusB; @endphp
                            @endif
                            
                        @endforeach 
                    @endif
                        <div>
                            <h1 style="text-align: center;">DENTAL RECORD CHART</h1>
                            <h2>INTRAORAL EXAMINATION</h2>
                            <!--55 TO 51 A AND B-->
                            
                            <div style="float: left;margin-top: 25px;">
                                <label style="display: inline-block;width:100px;font-size: 12px;margin-left:75px">STATUS RIGHT</label>
                                
                                <input value="{{ $status55a }}" type="text" readonly name="txtBox55a" class="text-input" style="width:55px;">
                                <input value="{{ $status54a }}" type="text" readonly name="txtBox54a" class="text-input" style="width:55px;">
                                <input value="{{ $status53a }}" type="text" readonly name="txtBox53a" class="text-input" style="width:55px;">
                                <input value="{{ $status52a }}" type="text" readonly name="txtBox52a" class="text-input" style="width:55px;">
                                <input value="{{ $status51a }}" type="text" readonly name="txtBox51a" class="text-input" style="width:55px;">
                                <input value="{{ $status61a }}" type="text" readonly name="txtBox61a" class="text-input" style="width:55px;">
                                <input value="{{ $status62a }}" type="text" readonly name="txtBox62a" class="text-input" style="width:55px;">
                                <input value="{{ $status63a }}" type="text" readonly name="txtBox63a" class="text-input" style="width:55px;">
                                <input value="{{ $status64a }}" type="text" readonly name="txtBox64a" class="text-input" style="width:55px;">
                                <input value="{{ $status65a }}" type="text" readonly name="txtBox65a" class="text-input" style="width:55px;">
                                <label style="display: inline-block;width:100px;font-size: 12px; text-align:right;">STATUS LEFT</label>
                                <br>
                                <input value="{{ $status55b }}" type="text" readonly name="txtBox55b" class="text-input" style="width:55px;margin-left: 179px;">
                                <input value="{{ $status54b }}" type="text" readonly name="txtBox54b" class="text-input" style="width:55px;">
                                <input value="{{ $status53b }}" type="text" readonly name="txtBox53b" class="text-input" style="width:55px;">
                                <input value="{{ $status52b }}" type="text" readonly name="txtBox52b" class="text-input" style="width:55px;">
                                <input value="{{ $status51b }}" type="text" readonly name="txtBox51b" class="text-input" style="width:55px;">
                                <input value="{{ $status61b }}" type="text" readonly name="txtBox61b" class="text-input" style="width:55px;">
                                <input value="{{ $status62b }}" type="text" readonly name="txtBox62b" class="text-input" style="width:55px;">
                                <input value="{{ $status63b }}" type="text" readonly name="txtBox63b" class="text-input" style="width:55px;">
                                <input value="{{ $status64b }}" type="text" readonly name="txtBox64b" class="text-input" style="width:55px;">
                                <input value="{{ $status65b }}" type="text" readonly name="txtBox65b" class="text-input" style="width:55px;">
                                <br>
                                <div style="margin-top: 5px;">
                                    <!--TOOTH NUMBER 55--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 177px;" width="300px" class="imgTeeth"></a>
                                        {{-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 177px;" width="300px" class="imgTeeth"></a> --}}
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 54--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 52--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 51--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                        <!--TOOTH NUMBER 61----------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 62--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 63--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 64--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 65--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                                    </div>
                                </div>
                            <div style="margin-top: 150px; margin-left: 180px">
                                <a href="{{ route('dchief.dentalchart.each',55)}}"><button class="btn btn-warning">55</button></a>
                                <a href="{{ route('dchief.dentalchart.each',54)}}"><button class="btn btn-warning" style="margin-left: 10px;">54</button></a>
                                <a href="{{ route('dchief.dentalchart.each',53)}}"><button class="btn btn-warning" style="margin-left: 10px;">53</button></a>
                                <a href="{{ route('dchief.dentalchart.each',52)}}"><button class="btn btn-warning" style="margin-left: 10px;">52</button></a>
                                <a href="{{ route('dchief.dentalchart.each',51)}}"><button class="btn btn-warning" style="margin-left: 10px;">51</button></a>
                                <a href="{{ route('dchief.dentalchart.each',61)}}"><button class="btn btn-warning" style="margin-left: 5px;">61</button></a>
                                <a href="{{ route('dchief.dentalchart.each',62)}}"><button class="btn btn-warning" style="margin-left: 10px;">62</button></a>
                                <a href="{{ route('dchief.dentalchart.each',63)}}"><button class="btn btn-warning" style="margin-left: 10px;">63</button></a>
                                <a href="{{ route('dchief.dentalchart.each',64)}}"><button class="btn btn-warning" style="margin-left: 10px;">64</button></a>
                                <a href="{{ route('dchief.dentalchart.each',65)}}"><button class="btn btn-warning" style="margin-left: 10px;">65</button></a>
                            </div>
                        
                            <!--18 TO 11 A AND B-->
                            <div style="float: left;margin-top: 25px;">
                                <input value="{{ $status18a }}" type="text" readonly name="txtBox18a" class="text-input" style="width:55px;">
                                <input value="{{ $status17a }}" type="text" readonly name="txtBox17a" class="text-input" style="width:55px;">
                                <input value="{{ $status16a }}" type="text" readonly name="txtBox16a" class="text-input" style="width:55px;">
                                <input value="{{ $status15a }}" type="text" readonly name="txtBox15a" class="text-input" style="width:55px;">
                                <input value="{{ $status14a }}" type="text" readonly name="txtBox14a" class="text-input" style="width:55px;">
                                <input value="{{ $status13a }}" type="text" readonly name="txtBox13a" class="text-input" style="width:55px;">
                                <input value="{{ $status12a }}" type="text" readonly name="txtBox12a" class="text-input" style="width:55px;">
                                <input value="{{ $status11a }}" type="text" readonly name="txtBox11a" class="text-input" style="width:55px;">
                                <input value="{{ $status28a }}" type="text" readonly name="txtBox21a" class="text-input" style="width:55px;">
                                <input value="{{ $status27a }}" type="text" readonly name="txtBox22a" class="text-input" style="width:55px;">
                                <input value="{{ $status26a }}" type="text" readonly name="txtBox23a" class="text-input" style="width:55px;">
                                <input value="{{ $status25a }}" type="text" readonly name="txtBox24a" class="text-input" style="width:55px;">
                                <input value="{{ $status24a }}" type="text" readonly name="txtBox25a" class="text-input" style="width:55px;">
                                <input value="{{ $status23a }}" type="text" readonly name="txtBox26a" class="text-input" style="width:55px;">
                                <input value="{{ $status22a }}" type="text" readonly name="txtBox27a" class="text-input" style="width:55px;">
                                <input value="{{ $status21a }}" type="text" readonly name="txtBox28a" class="text-input" style="width:55px;">
                                <br>
                                <input value="{{ $status18b }}" type="text" readonly name="txtBox18b" class="text-input" style="width:55px;">
                                <input value="{{ $status17b }}" type="text" readonly name="txtBox17b" class="text-input" style="width:55px;">
                                <input value="{{ $status16b }}" type="text" readonly name="txtBox16b" class="text-input" style="width:55px;">
                                <input value="{{ $status15b }}" type="text" readonly name="txtBox15b" class="text-input" style="width:55px;">
                                <input value="{{ $status14b }}" type="text" readonly name="txtBox14b" class="text-input" style="width:55px;">
                                <input value="{{ $status13b }}" type="text" readonly name="txtBox13b" class="text-input" style="width:55px;">
                                <input value="{{ $status12b }}" type="text" readonly name="txtBox12b" class="text-input" style="width:55px;">
                                <input value="{{ $status11b }}" type="text" readonly name="txtBox11b" class="text-input" style="width:55px;">
                                <input value="{{ $status28b }}" type="text" readonly name="txtBox21b" class="text-input" style="width:55px;">
                                <input value="{{ $status27b }}" type="text" readonly name="txtBox22b" class="text-input" style="width:55px;">
                                <input value="{{ $status26b }}" type="text" readonly name="txtBox23b" class="text-input" style="width:55px;">
                                <input value="{{ $status25b }}" type="text" readonly name="txtBox24b" class="text-input" style="width:55px;">
                                <input value="{{ $status24b }}" type="text" readonly name="txtBox25b" class="text-input" style="width:55px;">
                                <input value="{{ $status23b }}" type="text" readonly name="txtBox26b" class="text-input" style="width:55px;">
                                <input value="{{ $status22b }}" type="text" readonly name="txtBox27b" class="text-input" style="width:55px;">
                                <input value="{{ $status21b }}" type="text" readonly name="txtBox28b" class="text-input" style="width:55px;"><br>
                                <!-- <img src="{{ asset('images/part3_12-18.png') }}" width="470px"> -->
                                <div style="margin-top: 5px;">
                                    <!--TOOTH NUMBER 18--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 17--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 16--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 15--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 14--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 13--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 12--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 11--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 21--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 22--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 23--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 24--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 25--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 26--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 27--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
        
                                    <!--TOOTH NUMBER 28--------------------------------------------------------------------------->
                                        <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                        " width="300px" class="imgTeeth"></a> -->
                                        <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                        <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                                
                                </div>
                                <a href="{{ route('dchief.dentalchart.each',18)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">18</button></a>
                                <a href="{{ route('dchief.dentalchart.each',17)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">17</button></a>
                                <a href="{{ route('dchief.dentalchart.each',16)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">16</button></a>
                                <a href="{{ route('dchief.dentalchart.each',15)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">15</button></a>
                                <a href="{{ route('dchief.dentalchart.each',14)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">14</button></a>
                                <a href="{{ route('dchief.dentalchart.each',13)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">13</button></a>
                                <a href="{{ route('dchief.dentalchart.each',12)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">12</button></a>
                                <a href="{{ route('dchief.dentalchart.each',11)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">11</button></a>
                                <a href="{{ route('dchief.dentalchart.each',21)}}"><button type="button" class="btn btn-warning" style="margin-left: 5px; margin-top: 5px">21</button></a>
                                <a href="{{ route('dchief.dentalchart.each',22)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">22</button></a>
                                <a href="{{ route('dchief.dentalchart.each',23)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">23</button></a>
                                <a href="{{ route('dchief.dentalchart.each',24)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">24</button></a>
                                <a href="{{ route('dchief.dentalchart.each',25)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">25</button></a>
                                <a href="{{ route('dchief.dentalchart.each',26)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">26</button></a>
                                <a href="{{ route('dchief.dentalchart.each',27)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">27</button></a>
                                <a href="{{ route('dchief.dentalchart.each',28)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">28</button></a>
                            </div>
                        
                            <!--48 TO 41 AND 31 TO 38 A AND B-->
                            <div style="float: left;">
                                <!-- <img src="{{ asset('images/part5_41-48.png') }}" width="470px"> -->
                                <a href="{{ route('dchief.dentalchart.each',48)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">48</button></a>
                                <a href="{{ route('dchief.dentalchart.each',47)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">47</button></a>
                                <a href="{{ route('dchief.dentalchart.each',46)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">46</button></a>
                                <a href="{{ route('dchief.dentalchart.each',45)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">45</button></a>
                                <a href="{{ route('dchief.dentalchart.each',44)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">44</button></a>
                                <a href="{{ route('dchief.dentalchart.each',43)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">43</button></a>
                                <a href="{{ route('dchief.dentalchart.each',42)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">42</button></a>
                                <a href="{{ route('dchief.dentalchart.each',41)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">41</button></a>
                                <a href="{{ route('dchief.dentalchart.each',31)}}"><button type="button" class="btn btn-warning" style="margin-left: 5px; margin-top: 30px;">31</button></a>
                                <a href="{{ route('dchief.dentalchart.each',32)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">32</button></a>
                                <a href="{{ route('dchief.dentalchart.each',33)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">33</button></a>
                                <a href="{{ route('dchief.dentalchart.each',34)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">34</button></a>
                                <a href="{{ route('dchief.dentalchart.each',35)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">35</button></a>
                                <a href="{{ route('dchief.dentalchart.each',36)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">36</button></a>
                                <a href="{{ route('dchief.dentalchart.each',37)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">37</button></a>
                                <a href="{{ route('dchief.dentalchart.each',38)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">38</button></a>
                                <br>
                                <div style="margin-top: 5px;">
                                <!--TOOTH NUMBER 48--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 47--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 46--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 45--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 44--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 43--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 42--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 41--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                                <!--TOOTH NUMBER 31--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 32--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 33--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 34--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 35--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 36--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 37--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 38--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                                </div>
                                <input value="{{ $status48a }}" type="text" readonly name="txtBox48a" class="text-input" style="width:55px;">
                                <input value="{{ $status47a }}" type="text" readonly name="txtBox47a" class="text-input" style="width:55px;">
                                <input value="{{ $status46a }}" type="text" readonly name="txtBox46a" class="text-input" style="width:55px;">
                                <input value="{{ $status45a }}" type="text" readonly name="txtBox45a" class="text-input" style="width:55px;">
                                <input value="{{ $status44a }}" type="text" readonly name="txtBox44a" class="text-input" style="width:55px;">
                                <input value="{{ $status43a }}" type="text" readonly name="txtBox43a" class="text-input" style="width:55px;">
                                <input value="{{ $status42a }}" type="text" readonly name="txtBox42a" class="text-input" style="width:55px;">
                                <input value="{{ $status41a }}" type="text" readonly name="txtBox41a" class="text-input" style="width:55px;">
                                <input value="{{ $status31a }}" type="text" readonly name="txtBox31a" class="text-input" style="width:55px;">
                                <input value="{{ $status32a }}" type="text" readonly name="txtBox32a" class="text-input" style="width:55px;">
                                <input value="{{ $status33a }}" type="text" readonly name="txtBox33a" class="text-input" style="width:55px;">
                                <input value="{{ $status34a }}" type="text" readonly name="txtBox34a" class="text-input" style="width:55px;">
                                <input value="{{ $status35a }}" type="text" readonly name="txtBox35a" class="text-input" style="width:55px;">
                                <input value="{{ $status36a }}" type="text" readonly name="txtBox36a" class="text-input" style="width:55px;">
                                <input value="{{ $status37a }}" type="text" readonly name="txtBox37a" class="text-input" style="width:55px;">
                                <input value="{{ $status38a }}" type="text" readonly name="txtBox38a" class="text-input" style="width:55px;">
                                
                                <br>
                                <input value="{{ $status48b }}" type="text" readonly name="txtBox48b" class="text-input" style="width:55px;">
                                <input value="{{ $status47b }}" type="text" readonly name="txtBox47b" class="text-input" style="width:55px;">
                                <input value="{{ $status46b }}" type="text" readonly name="txtBox46b" class="text-input" style="width:55px;">
                                <input value="{{ $status45b }}" type="text" readonly name="txtBox45b" class="text-input" style="width:55px;">
                                <input value="{{ $status44b }}" type="text" readonly name="txtBox44b" class="text-input" style="width:55px;">
                                <input value="{{ $status43b }}" type="text" readonly name="txtBox43b" class="text-input" style="width:55px;">
                                <input value="{{ $status42b }}" type="text" readonly name="txtBox42b" class="text-input" style="width:55px;">
                                <input value="{{ $status41b }}" type="text" readonly name="txtBox41b" class="text-input" style="width:55px;">
                                <input value="{{ $status31b }}" type="text" readonly name="txtBox31b" class="text-input" style="width:55px;">
                                <input value="{{ $status32b }}" type="text" readonly name="txtBox32b" class="text-input" style="width:55px;">
                                <input value="{{ $status33b }}" type="text" readonly name="txtBox33b" class="text-input" style="width:55px;">
                                <input value="{{ $status34b }}" type="text" readonly name="txtBox34b" class="text-input" style="width:55px;">
                                <input value="{{ $status35b }}" type="text" readonly name="txtBox35b" class="text-input" style="width:55px;">
                                <input value="{{ $status36b }}" type="text" readonly name="txtBox36b" class="text-input" style="width:55px;">
                                <input value="{{ $status37b }}" type="text" readonly name="txtBox37b" class="text-input" style="width:55px;">
                                <input value="{{ $status38b }}" type="text" readonly name="txtBox38b" class="text-input" style="width:55px;">
                            </div>
                        
                            <!--71 TO 75 A AND B-->
                            <div style="float: left;margin-top: 25px;">
                                <!-- <img src="{{ asset('images/part7_71-75.png') }}" width="300px" style="margin-left: 177px;"> -->
                                <a href="{{ route('dchief.dentalchart.each',71)}}"><button type="button" class="btn btn-warning" style="margin-left: 185px; margin-top: 5px;">71</button></a>
                                <a href="{{ route('dchief.dentalchart.each',72)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">72</button></a>
                                <a href="{{ route('dchief.dentalchart.each',73)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">73</button></a>
                                <a href="{{ route('dchief.dentalchart.each',74)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">74</button></a>
                                <a href="{{ route('dchief.dentalchart.each',75)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">75</button></a>
                                <a href="{{ route('dchief.dentalchart.each',85)}}"><button type="button" class="btn btn-warning" style="margin-left: 5px; margin-top: 5px;">85</button></a>
                                <a href="{{ route('dchief.dentalchart.each',84)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">84</button></a>
                                <a href="{{ route('dchief.dentalchart.each',83)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">83</button></a>
                                <a href="{{ route('dchief.dentalchart.each',82)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">82</button></a>
                                <a href="{{ route('dchief.dentalchart.each',81)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">81</button></a>
                                <br>
                                <div style="margin-top: 5px;">
                                <!--TOOTH NUMBER 71--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 177px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 177px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 72--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 73--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 74--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 75--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 85----------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 84--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 83--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 82--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
    
                                <!--TOOTH NUMBER 81--------------------------------------------------------------------------->
                                    <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                    " width="300px" class="imgTeeth"></a> -->
                                    <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                    <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                                </div>
                                <label style="display: inline-block;width:100px;font-size: 12px; margin-left:75px;">STATUS RIGHT</label>
                                <input placeholder=""  type="text"    name="txtBox71a" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox72a" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox73a" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox74a" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox75a" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox85a" class="text-input" style="width:55px;" style="margin-left: 54px;">
                                <input placeholder=""  type="text"    name="txtBox84a" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox83a" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox82a" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox81a" class="text-input" style="width:55px;">
                                <label style="display: inline-block;width:100px;font-size: 12px; text-align:right;">STATUS LEFT</label>
                                <br>
                                <input placeholder=""  type="text"    name="txtBox71b" class="text-input" style="width:55px;margin-left:179px">
                                <input placeholder=""  type="text"    name="txtBox72b" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox73b" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox74b" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox75b" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox85b" class="text-input" style="width:55px;" style="margin-left: 54px;">
                                <input placeholder=""  type="text"    name="txtBox84b" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox83b" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox82b" class="text-input" style="width:55px;">
                                <input placeholder=""  type="text"    name="txtBox81b" class="text-input" style="width:55px;">
                                <br>
                            </div>
                    

                            <div style="float: left; margin-top: 30px; margin-left: 70px;">
                                <div style="float: left; margin-top: 25px;">
                                    <label style="font-size: 14px;margin-bottom: 15px;">Legend Condition</label>

                                    <p><i><b>D</b>- Decayed(Caries indicated for Filling)</i></p>
                                    <p><i><b>M</b>- Missing due to Caries</i></p>
                                    <p><i><b>F</b>- Filled</i></p>
                                    <p><i><b>I</b>- Caries Indicated for Extraction</i></p>
                                    <p><i><b>RF</b>- Root Fragment</i></p>
                                    <p><i><b>MO</b>- Missing</i></p>
                                    <p><i><b>Im</b>- Impacted Tooth</i></p>
                                </div>

                                <div style="float: left; margin-top: 25px;margin-left: 100px;">
                                    <label style="font-size: 14px;margin-bottom: 15px;">Restorations and Prosthetics</label>

                                    <p><b>J</b><i>- Jacket Crown</i></p>
                                    <p><b>A</b><i>- Amalgam Filling</i></p>
                                    <p><b>AB</b><i>- Abutment</i></p>
                                    <p><b>P</b><i>- Pontic</i></p>
                                    <p><b>In</b><i>- Inlay</i></p>
                                    <p><b>LC</b><i>- Light Cure Composite</i></p>
                                    <p><b>S</b><i>- Sealants</i></p>
                                    <p><b>Rm</b><i>- Removable Denture</i></p>
                                </div>

                                <div style="float: left; margin-top: 25px;margin-left: 100px;">
                                    <label style="font-size: 14px;margin-bottom: 15px;">Surgery</label>
                                    <p><b>X</b><i>- Extraction due to Caries</i></p>
                                    <p><b>XO</b><i>- Extraction due to Other Causes</i></p>
                                    <p><b><i class="fa fa-check"></i></b><i>- Present Teeth</i></p>
                                    <p><b>Cm</b><i>- Congenitally Missing</i></p>
                                    <p><b>Sp</b><i>- Supernumerary</i></p>
                                </div>
                            </div>
                        </div>

                        <div style="float: left;width: 100%;text-align: center;margin-top: 10px;">
                            <a href="{{URL::previous()}}"><button class="btn btn-primary">BACK</button></a>
                            <a href="{{url('/dchief/PatientRecord')}}"><button class="btn btn-danger">CLOSE</button></a>
                            <!-- <button type="submit" name="btnSave" class="btn btn-success">SAVE</button>
                        </form>     -->
                            <!-- <a href="{{url('dchief/DentalLog')}}"><button class="btn btn-danger">CANCEL</button></a> -->
                        </div>
                    </div>
                    
                   <!-- /Content -->
            <!-- /form input mask -->
        </div>
    </div>
@endsection
