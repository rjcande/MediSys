@extends('dentist.layout.dentist')

@section('content')

<style>
    svg {
        width: 55px;
        height: 55px;
    }
    svg polyline,
    svg line,
    svg path,
    svg circle{
        fill: white;
        stroke: black;
    }
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
                <form method="post" action="{{ route('dentist.dentalchart.store',$dentalchart->dentalChartID) }}">
                @csrf
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

                                    <input placeholder="{{ $status55a }}" type="text"  name="txtBox55a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status54a }}" type="text"  name="txtBox54a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status53a }}" type="text"  name="txtBox53a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status52a }}" type="text"  name="txtBox52a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status51a }}" type="text"  name="txtBox51a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status61a }}" type="text"  name="txtBox61a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status62a }}" type="text"  name="txtBox62a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status63a }}" type="text"  name="txtBox63a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status64a }}" type="text"  name="txtBox64a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status65a }}" type="text"  name="txtBox65a" class="text-input" style="width:55px;">
                                    <label style="display: inline-block;width:100px;font-size: 12px; text-align:right;">STATUS LEFT</label>
                                    <br>
                                    <input placeholder="{{ $status55b }}" type="text"  name="txtBox55b" class="text-input" style="width:55px;margin-left: 179px;">
                                    <input placeholder="{{ $status54b }}" type="text"  name="txtBox54b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status53b }}" type="text"  name="txtBox53b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status52b }}" type="text"  name="txtBox52b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status51b }}" type="text"  name="txtBox51b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status61b }}" type="text"  name="txtBox61b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status62b }}" type="text"  name="txtBox62b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status63b }}" type="text"  name="txtBox63b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status64b }}" type="text"  name="txtBox64b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status65b }}" type="text"  name="txtBox65b" class="text-input" style="width:55px;">
                                    <br>
                                    <div style="margin-top: 5px;">
                                        <!--TOOTH NUMBER 55--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 178px;">
                                            <path    id="55l" onclick="isClicked('55l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="55t" onclick="isClicked('55t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="55r" onclick="isClicked('55r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="55b" onclick="isClicked('55b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="55m" onclick="isClicked('55m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
										<input type="number" name="txt55l" id="txt55l" hidden/>
                                        <input type="number" name="txt55t" id="txt55t" hidden/>
                                        <input type="number" name="txt55r" id="txt55r" hidden/>
                                        <input type="number" name="txt55b" id="txt55b" hidden/>
                                        <input type="number" name="txt55m" id="txt55m" hidden/>
                                        <!--TOOTH NUMBER 54--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="54l" onclick="isClicked('54l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="54t" onclick="isClicked('54t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="54r" onclick="isClicked('54r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="54b" onclick="isClicked('54b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="54m" onclick="isClicked('54m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt54l" id="txt54l" hidden/>
                                        <input type="number" name="txt54t" id="txt54t" hidden/>
                                        <input type="number" name="txt54r" id="txt54r" hidden/>
                                        <input type="number" name="txt54b" id="txt54b" hidden/>
                                        <input type="number" name="txt54m" id="txt54m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="53l" onclick="isClicked('53l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="53t" onclick="isClicked('53t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="53r" onclick="isClicked('53r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="53b" onclick="isClicked('53b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="53m" onclick="isClicked('53m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt53l" id="txt53l" hidden/>
                                        <input type="number" name="txt53t" id="txt53t" hidden/>
                                        <input type="number" name="txt53r" id="txt53r" hidden/>
                                        <input type="number" name="txt53b" id="txt53b" hidden/>
                                        <input type="number" name="txt53m" id="txt53m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="52l" onclick="isClicked('52l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="52t" onclick="isClicked('52t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="52r" onclick="isClicked('52r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="52b" onclick="isClicked('52b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="52m" onclick="isClicked('52m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt52l" id="txt52l" hidden/>
                                        <input type="number" name="txt52t" id="txt52t" hidden/>
                                        <input type="number" name="txt52r" id="txt52r" hidden/>
                                        <input type="number" name="txt52b" id="txt52b" hidden/>
                                        <input type="number" name="txt52m" id="txt52m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="51l" onclick="isClicked('51l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="51t" onclick="isClicked('51t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="51r" onclick="isClicked('51r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="51b" onclick="isClicked('51b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="51m" onclick="isClicked('51m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt51l" id="txt51l" hidden/>
                                        <input type="number" name="txt51t" id="txt51t" hidden/>
                                        <input type="number" name="txt51r" id="txt51r" hidden/>
                                        <input type="number" name="txt51b" id="txt51b" hidden/>
                                        <input type="number" name="txt51m" id="txt51m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="61l" onclick="isClicked('61l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="61t" onclick="isClicked('61t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="61r" onclick="isClicked('61r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="61b" onclick="isClicked('61b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="61m" onclick="isClicked('61m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt61l" id="txt61l" hidden/>
                                        <input type="number" name="txt61t" id="txt61t" hidden/>
                                        <input type="number" name="txt61r" id="txt61r" hidden/>
                                        <input type="number" name="txt61b" id="txt61b" hidden/>
                                        <input type="number" name="txt61m" id="txt61m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="62l" onclick="isClicked('62l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="62t" onclick="isClicked('62t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="62r" onclick="isClicked('62r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="62b" onclick="isClicked('62b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="62m" onclick="isClicked('62m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt62l" id="txt62l" hidden/>
                                        <input type="number" name="txt62t" id="txt62t" hidden/>
                                        <input type="number" name="txt62r" id="txt62r" hidden/>
                                        <input type="number" name="txt62b" id="txt62b" hidden/>
                                        <input type="number" name="txt62m" id="txt62m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="63l" onclick="isClicked('63l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="63t" onclick="isClicked('63t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="63r" onclick="isClicked('63r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="63b" onclick="isClicked('63b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="63m" onclick="isClicked('63m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt63l" id="txt63l" hidden/>
                                        <input type="number" name="txt63t" id="txt63t" hidden/>
                                        <input type="number" name="txt63r" id="txt63r" hidden/>
                                        <input type="number" name="txt63b" id="txt63b" hidden/>
                                        <input type="number" name="txt63m" id="txt63m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="64l" onclick="isClicked('64l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="64t" onclick="isClicked('64t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="64r" onclick="isClicked('64r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="64b" onclick="isClicked('64b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="64m" onclick="isClicked('64m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt64l" id="txt64l" hidden/>
                                        <input type="number" name="txt64t" id="txt64t" hidden/>
                                        <input type="number" name="txt64r" id="txt64r" hidden/>
                                        <input type="number" name="txt64b" id="txt64b" hidden/>
                                        <input type="number" name="txt64m" id="txt64m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="65l" onclick="isClicked('65l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="65t" onclick="isClicked('65t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="65r" onclick="isClicked('65r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="65b" onclick="isClicked('65b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="65m" onclick="isClicked('65m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt65l" id="txt65l" hidden/>
                                        <input type="number" name="txt65t" id="txt65t" hidden/>
                                        <input type="number" name="txt65r" id="txt65r" hidden/>
                                        <input type="number" name="txt65b" id="txt65b" hidden/>
                                        <input type="number" name="txt65m" id="txt65m" hidden/>

                                <div style="margin-top: 5px; margin-left: 180px">
                                    <a href="{{ route('dentist.dentalchart.each',55)}}"><button type="button" class="btn btn-warning">55</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',54)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;">54</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',53)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;">53</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',52)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;">52</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',51)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;">51</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',61)}}"><button type="button" class="btn btn-warning" style="margin-left: 5px;">61</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',62)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;">62</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',63)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;">63</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',64)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;">64</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',65)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;">65</button></a>
                                </div>

                                <!--18 TO 11 A AND B-->
                                <div style="float: left;margin-top: 25px;">
                                    <input placeholder="{{ $status18a }}" type="text"  name="txtBox18a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status17a }}" type="text"  name="txtBox17a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status16a }}" type="text"  name="txtBox16a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status15a }}" type="text"  name="txtBox15a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status14a }}" type="text"  name="txtBox14a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status13a }}" type="text"  name="txtBox13a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status12a }}" type="text"  name="txtBox12a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status11a }}" type="text"  name="txtBox11a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status28a }}" type="text"  name="txtBox21a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status27a }}" type="text"  name="txtBox22a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status26a }}" type="text"  name="txtBox23a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status25a }}" type="text"  name="txtBox24a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status24a }}" type="text"  name="txtBox25a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status23a }}" type="text"  name="txtBox26a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status22a }}" type="text"  name="txtBox27a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status21a }}" type="text"  name="txtBox28a" class="text-input" style="width:55px;">
                                    <br>
                                    <input placeholder="{{ $status18b }}" type="text"  name="txtBox18b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status17b }}" type="text"  name="txtBox17b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status16b }}" type="text"  name="txtBox16b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status15b }}" type="text"  name="txtBox15b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status14b }}" type="text"  name="txtBox14b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status13b }}" type="text"  name="txtBox13b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status12b }}" type="text"  name="txtBox12b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status11b }}" type="text"  name="txtBox11b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status28b }}" type="text"  name="txtBox21b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status27b }}" type="text"  name="txtBox22b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status26b }}" type="text"  name="txtBox23b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status25b }}" type="text"  name="txtBox24b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status24b }}" type="text"  name="txtBox25b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status23b }}" type="text"  name="txtBox26b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status22b }}" type="text"  name="txtBox27b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status21b }}" type="text"  name="txtBox28b" class="text-input" style="width:55px;"><br>
                                    <!-- <img src="{{ asset('images/part3_12-18.png') }}" width="470px"> -->
                                    <div style="margin-top: 3px;">
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="18l" onclick="isClicked('18l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="18t" onclick="isClicked('18t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="18r" onclick="isClicked('18r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="18b" onclick="isClicked('18b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="18m" onclick="isClicked('18m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt18l" id="txt18l" hidden/>
                                        <input type="number" name="txt18t" id="txt18t" hidden/>
                                        <input type="number" name="txt18r" id="txt18r" hidden/>
                                        <input type="number" name="txt18b" id="txt18b" hidden/>
                                        <input type="number" name="txt18m" id="txt18m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="17l" onclick="isClicked('17l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="17t" onclick="isClicked('17t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="17r" onclick="isClicked('17r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="17b" onclick="isClicked('17b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="17m" onclick="isClicked('17m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt17l" id="txt17l" hidden/>
                                        <input type="number" name="txt17t" id="txt17t" hidden/>
                                        <input type="number" name="txt17r" id="txt17r" hidden/>
                                        <input type="number" name="txt17b" id="txt17b" hidden/>
                                        <input type="number" name="txt17m" id="txt17m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="16l" onclick="isClicked('16l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="16t" onclick="isClicked('16t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="16r" onclick="isClicked('16r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="16b" onclick="isClicked('16b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="16m" onclick="isClicked('16m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt16l" id="txt16l" hidden/>
                                        <input type="number" name="txt16t" id="txt16t" hidden/>
                                        <input type="number" name="txt16r" id="txt16r" hidden/>
                                        <input type="number" name="txt16b" id="txt16b" hidden/>
                                        <input type="number" name="txt16m" id="txt16m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="15l" onclick="isClicked('15l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="15t" onclick="isClicked('15t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="15r" onclick="isClicked('15r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="15b" onclick="isClicked('15b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="15m" onclick="isClicked('15m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt15l" id="txt15l" hidden/>
                                        <input type="number" name="txt15t" id="txt15t" hidden/>
                                        <input type="number" name="txt15r" id="txt15r" hidden/>
                                        <input type="number" name="txt15b" id="txt15b" hidden/>
                                        <input type="number" name="txt15m" id="txt15m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="14l" onclick="isClicked('14l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="14t" onclick="isClicked('14t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="14r" onclick="isClicked('14r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="14b" onclick="isClicked('14b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="14m" onclick="isClicked('14m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt14l" id="txt14l" hidden/>
                                        <input type="number" name="txt14t" id="txt14t" hidden/>
                                        <input type="number" name="txt14r" id="txt14r" hidden/>
                                        <input type="number" name="txt14b" id="txt14b" hidden/>
                                        <input type="number" name="txt14m" id="txt14m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="13l" onclick="isClicked('13l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="13t" onclick="isClicked('13t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="13r" onclick="isClicked('13r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="13b" onclick="isClicked('13b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="13m" onclick="isClicked('13m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt13l" id="txt13l" hidden/>
                                        <input type="number" name="txt13t" id="txt13t" hidden/>
                                        <input type="number" name="txt13r" id="txt13r" hidden/>
                                        <input type="number" name="txt13b" id="txt13b" hidden/>
                                        <input type="number" name="txt13m" id="txt13m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="12l" onclick="isClicked('12l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="12t" onclick="isClicked('12t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="12r" onclick="isClicked('12r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="12b" onclick="isClicked('12b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="12m" onclick="isClicked('12m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt12l" id="txt12l" hidden/>
                                        <input type="number" name="txt12t" id="txt12t" hidden/>
                                        <input type="number" name="txt12r" id="txt12r" hidden/>
                                        <input type="number" name="txt12b" id="txt12b" hidden/>
                                        <input type="number" name="txt12m" id="txt12m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="11l" onclick="isClicked('11l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="11t" onclick="isClicked('11t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="11r" onclick="isClicked('11r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="11b" onclick="isClicked('11b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="11m" onclick="isClicked('11m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt11l" id="txt11l" hidden/>
                                        <input type="number" name="txt11t" id="txt11t" hidden/>
                                        <input type="number" name="txt11r" id="txt11r" hidden/>
                                        <input type="number" name="txt11b" id="txt11b" hidden/>
                                        <input type="number" name="txt11m" id="txt11m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="21l" onclick="isClicked('21l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="21t" onclick="isClicked('21t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="21r" onclick="isClicked('21r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="21b" onclick="isClicked('21b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="21m" onclick="isClicked('21m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt21l" id="txt21l" hidden/>
                                        <input type="number" name="txt21t" id="txt21t" hidden/>
                                        <input type="number" name="txt21r" id="txt21r" hidden/>
                                        <input type="number" name="txt21b" id="txt21b" hidden/>
                                        <input type="number" name="txt21m" id="txt21m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="22l" onclick="isClicked('22l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="22t" onclick="isClicked('22t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="22r" onclick="isClicked('22r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="22b" onclick="isClicked('22b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="22m" onclick="isClicked('22m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt22l" id="txt22l" hidden/>
                                        <input type="number" name="txt22t" id="txt22t" hidden/>
                                        <input type="number" name="txt22r" id="txt22r" hidden/>
                                        <input type="number" name="txt22b" id="txt22b" hidden/>
                                        <input type="number" name="txt22m" id="txt22m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="23l" onclick="isClicked('23l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="23t" onclick="isClicked('23t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="23r" onclick="isClicked('23r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="23b" onclick="isClicked('23b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="23m" onclick="isClicked('23m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt23l" id="txt23l" hidden/>
                                        <input type="number" name="txt23t" id="txt23t" hidden/>
                                        <input type="number" name="txt23r" id="txt23r" hidden/>
                                        <input type="number" name="txt23b" id="txt23b" hidden/>
                                        <input type="number" name="txt23m" id="txt23m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="24l" onclick="isClicked('24l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="24t" onclick="isClicked('24t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="24r" onclick="isClicked('24r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="24b" onclick="isClicked('24b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="24m" onclick="isClicked('24m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt24l" id="txt24l" hidden/>
                                        <input type="number" name="txt24t" id="txt24t" hidden/>
                                        <input type="number" name="txt24r" id="txt24r" hidden/>
                                        <input type="number" name="txt24b" id="txt24b" hidden/>
                                        <input type="number" name="txt24m" id="txt24m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="25l" onclick="isClicked('25l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="25t" onclick="isClicked('25t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="25r" onclick="isClicked('25r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="25b" onclick="isClicked('25b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="25m" onclick="isClicked('25m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt25l" id="txt25l" hidden/>
                                        <input type="number" name="txt25t" id="txt25t" hidden/>
                                        <input type="number" name="txt25r" id="txt25r" hidden/>
                                        <input type="number" name="txt25b" id="txt25b" hidden/>
                                        <input type="number" name="txt25m" id="txt25m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="26l" onclick="isClicked('26l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="26t" onclick="isClicked('26t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="26r" onclick="isClicked('26r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="26b" onclick="isClicked('26b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="26m" onclick="isClicked('26m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt26l" id="txt26l" hidden/>
                                        <input type="number" name="txt26t" id="txt26t" hidden/>
                                        <input type="number" name="txt26r" id="txt26r" hidden/>
                                        <input type="number" name="txt26b" id="txt26b" hidden/>
                                        <input type="number" name="txt26m" id="txt26m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="27l" onclick="isClicked('27l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="27t" onclick="isClicked('27t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="27r" onclick="isClicked('27r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="27b" onclick="isClicked('27b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="27m" onclick="isClicked('27m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt27l" id="txt27l" hidden/>
                                        <input type="number" name="txt27t" id="txt27t" hidden/>
                                        <input type="number" name="txt27r" id="txt27r" hidden/>
                                        <input type="number" name="txt27b" id="txt27b" hidden/>
                                        <input type="number" name="txt27m" id="txt27m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="28l" onclick="isClicked('28l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="28t" onclick="isClicked('28t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="28r" onclick="isClicked('28r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="28b" onclick="isClicked('28b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="28m" onclick="isClicked('28m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt28l" id="txt28l" hidden/>
                                        <input type="number" name="txt28t" id="txt28t" hidden/>
                                        <input type="number" name="txt28r" id="txt28r" hidden/>
                                        <input type="number" name="txt28b" id="txt28b" hidden/>
                                        <input type="number" name="txt28m" id="txt28m" hidden/>

                                    </div>
                                    <a href="{{ route('dentist.dentalchart.each',18)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">18</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',17)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">17</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',16)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">16</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',15)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">15</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',14)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">14</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',13)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">13</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',12)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">12</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',11)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">11</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',21)}}"><button type="button" class="btn btn-warning" style="margin-left: 5px; margin-top: 5px">21</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',22)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">22</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',23)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">23</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',24)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">24</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',25)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">25</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',26)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">26</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',27)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">27</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',28)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 5px">28</button></a>
                                </div>

                                <!--48 TO 41 AND 31 TO 38 A AND B-->
                                <div style="float: left;">
                                    <!-- <img src="{{ asset('images/part5_41-48.png') }}" width="470px"> -->
                                    <a href="{{ route('dentist.dentalchart.each',48)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">48</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',47)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">47</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',46)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">46</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',45)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">45</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',44)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">44</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',43)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">43</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',42)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">42</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',41)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 30px;">41</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',31)}}"><button type="button" class="btn btn-warning" style="margin-left: 5px; margin-top: 30px;">31</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',32)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">32</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',33)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">33</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',34)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">34</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',35)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">35</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',36)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">36</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',37)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">37</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',38)}}"><button type="button" class="btn btn-warning" style="margin-left: 10px;margin-top: 30px;">38</button></a>
                                    <br>
                                    <div style="margin-top: 3px;">
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="48l" onclick="isClicked('48l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="48t" onclick="isClicked('48t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="48r" onclick="isClicked('48r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="48b" onclick="isClicked('48b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="48m" onclick="isClicked('48m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt48l" id="txt48l" hidden/>
                                        <input type="number" name="txt48t" id="txt48t" hidden/>
                                        <input type="number" name="txt48r" id="txt48r" hidden/>
                                        <input type="number" name="txt48b" id="txt48b" hidden/>
                                        <input type="number" name="txt48m" id="txt48m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="47l" onclick="isClicked('47l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="47t" onclick="isClicked('47t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="47r" onclick="isClicked('47r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="47b" onclick="isClicked('47b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="47m" onclick="isClicked('47m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt47l" id="txt47l" hidden/>
                                        <input type="number" name="txt47t" id="txt47t" hidden/>
                                        <input type="number" name="txt47r" id="txt47r" hidden/>
                                        <input type="number" name="txt47b" id="txt47b" hidden/>
                                        <input type="number" name="txt47m" id="txt47m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="46l" onclick="isClicked('46l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="46t" onclick="isClicked('46t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="46r" onclick="isClicked('46r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="46b" onclick="isClicked('46b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="46m" onclick="isClicked('46m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt46l" id="txt46l" hidden/>
                                        <input type="number" name="txt46t" id="txt46t" hidden/>
                                        <input type="number" name="txt46r" id="txt46r" hidden/>
                                        <input type="number" name="txt46b" id="txt46b" hidden/>
                                        <input type="number" name="txt46m" id="txt46m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="45l" onclick="isClicked('45l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="45t" onclick="isClicked('45t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="45r" onclick="isClicked('45r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="45b" onclick="isClicked('45b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="45m" onclick="isClicked('45m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt45l" id="txt45l" hidden/>
                                        <input type="number" name="txt45t" id="txt45t" hidden/>
                                        <input type="number" name="txt45r" id="txt45r" hidden/>
                                        <input type="number" name="txt45b" id="txt45b" hidden/>
                                        <input type="number" name="txt45m" id="txt45m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="44l" onclick="isClicked('44l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="44t" onclick="isClicked('44t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="44r" onclick="isClicked('44r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="44b" onclick="isClicked('44b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="44m" onclick="isClicked('44m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt44l" id="txt44l" hidden/>
                                        <input type="number" name="txt44t" id="txt44t" hidden/>
                                        <input type="number" name="txt44r" id="txt44r" hidden/>
                                        <input type="number" name="txt44b" id="txt44b" hidden/>
                                        <input type="number" name="txt44m" id="txt44m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="43l" onclick="isClicked('43l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="43t" onclick="isClicked('43t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="43r" onclick="isClicked('43r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="43b" onclick="isClicked('43b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="43m" onclick="isClicked('43m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt43l" id="txt43l" hidden/>
                                        <input type="number" name="txt43t" id="txt43t" hidden/>
                                        <input type="number" name="txt43r" id="txt43r" hidden/>
                                        <input type="number" name="txt43b" id="txt43b" hidden/>
                                        <input type="number" name="txt43m" id="txt43m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="42l" onclick="isClicked('42l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="42t" onclick="isClicked('42t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="42r" onclick="isClicked('42r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="42b" onclick="isClicked('42b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="42m" onclick="isClicked('42m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt42l" id="txt42l" hidden/>
                                        <input type="number" name="txt42t" id="txt42t" hidden/>
                                        <input type="number" name="txt42r" id="txt42r" hidden/>
                                        <input type="number" name="txt42b" id="txt42b" hidden/>
                                        <input type="number" name="txt42m" id="txt42m" hidden/>
                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="41l" onclick="isClicked('41l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="41t" onclick="isClicked('41t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="41r" onclick="isClicked('41r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="41b" onclick="isClicked('41b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="41m" onclick="isClicked('41m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt41l" id="txt41l" hidden/>
                                        <input type="number" name="txt41t" id="txt41t" hidden/>
                                        <input type="number" name="txt41r" id="txt41r" hidden/>
                                        <input type="number" name="txt41b" id="txt41b" hidden/>
                                        <input type="number" name="txt41m" id="txt41m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="31l" onclick="isClicked('31l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="31t" onclick="isClicked('31t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="31r" onclick="isClicked('31r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="31b" onclick="isClicked('31b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="31m" onclick="isClicked('31m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt31l" id="txt31l" hidden/>
                                        <input type="number" name="txt31t" id="txt31t" hidden/>
                                        <input type="number" name="txt31r" id="txt31r" hidden/>
                                        <input type="number" name="txt31b" id="txt31b" hidden/>
                                        <input type="number" name="txt31m" id="txt31m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="32l" onclick="isClicked('32l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="32t" onclick="isClicked('32t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="32r" onclick="isClicked('32r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="32b" onclick="isClicked('32b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="32m" onclick="isClicked('32m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt32l" id="txt32l" hidden/>
                                        <input type="number" name="txt32t" id="txt32t" hidden/>
                                        <input type="number" name="txt32r" id="txt32r" hidden/>
                                        <input type="number" name="txt32b" id="txt32b" hidden/>
                                        <input type="number" name="txt32m" id="txt32m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="33l" onclick="isClicked('33l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="33t" onclick="isClicked('33t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="33r" onclick="isClicked('33r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="33b" onclick="isClicked('33b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="33m" onclick="isClicked('33m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt33l" id="txt33l" hidden/>
                                        <input type="number" name="txt33t" id="txt33t" hidden/>
                                        <input type="number" name="txt33r" id="txt33r" hidden/>
                                        <input type="number" name="txt33b" id="txt33b" hidden/>
                                        <input type="number" name="txt33m" id="txt33m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="34l" onclick="isClicked('34l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="34t" onclick="isClicked('34t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="34r" onclick="isClicked('34r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="34b" onclick="isClicked('34b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="34m" onclick="isClicked('34m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt34l" id="txt34l" hidden/>
                                        <input type="number" name="txt34t" id="txt34t" hidden/>
                                        <input type="number" name="txt34r" id="txt34r" hidden/>
                                        <input type="number" name="txt34b" id="txt34b" hidden/>
                                        <input type="number" name="txt34m" id="txt34m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="35l" onclick="isClicked('35l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="35t" onclick="isClicked('35t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="35r" onclick="isClicked('35r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="35b" onclick="isClicked('35b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="35m" onclick="isClicked('35m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt35l" id="txt35l" hidden/>
                                        <input type="number" name="txt35t" id="txt35t" hidden/>
                                        <input type="number" name="txt35r" id="txt35r" hidden/>
                                        <input type="number" name="txt35b" id="txt35b" hidden/>
                                        <input type="number" name="txt35m" id="txt35m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="36l" onclick="isClicked('36l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="36t" onclick="isClicked('36t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="36r" onclick="isClicked('36r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="36b" onclick="isClicked('36b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="36m" onclick="isClicked('36m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt36l" id="txt36l" hidden/>
                                        <input type="number" name="txt36t" id="txt36t" hidden/>
                                        <input type="number" name="txt36r" id="txt36r" hidden/>
                                        <input type="number" name="txt36b" id="txt36b" hidden/>
                                        <input type="number" name="txt36m" id="txt36m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="37l" onclick="isClicked('37l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="37t" onclick="isClicked('37t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="37r" onclick="isClicked('37r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="37b" onclick="isClicked('37b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="37m" onclick="isClicked('37m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt37l" id="txt37l" hidden/>
                                        <input type="number" name="txt37t" id="txt37t" hidden/>
                                        <input type="number" name="txt37r" id="txt37r" hidden/>
                                        <input type="number" name="txt37b" id="txt37b" hidden/>
                                        <input type="number" name="txt37m" id="txt37m" hidden/>

                                        <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                        <svg viewBox="0 0 25 25" class="tooth">
                                            <path    id="38l" onclick="isClicked('38l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                            <path    id="38t" onclick="isClicked('38t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                            <path    id="38r" onclick="isClicked('38r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                            <path    id="38b" onclick="isClicked('38b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                            <circle  id="38m" onclick="isClicked('38m')" cx="12.5" cy="12.5" r="4"                          />
                                        </svg>
                                        <input type="number" name="txt38l" id="txt38l" hidden/>
                                        <input type="number" name="txt38t" id="txt38t" hidden/>
                                        <input type="number" name="txt38r" id="txt38r" hidden/>
                                        <input type="number" name="txt38b" id="txt38b" hidden/>
                                        <input type="number" name="txt38m" id="txt38m" hidden/>
                                    </div>
                                    <input placeholder="{{ $status48a }}" type="text"  name="txtBox48a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status47a }}" type="text"  name="txtBox47a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status46a }}" type="text"  name="txtBox46a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status45a }}" type="text"  name="txtBox45a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status44a }}" type="text"  name="txtBox44a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status43a }}" type="text"  name="txtBox43a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status42a }}" type="text"  name="txtBox42a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status41a }}" type="text"  name="txtBox41a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status31a }}" type="text"  name="txtBox31a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status32a }}" type="text"  name="txtBox32a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status33a }}" type="text"  name="txtBox33a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status34a }}" type="text"  name="txtBox34a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status35a }}" type="text"  name="txtBox35a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status36a }}" type="text"  name="txtBox36a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status37a }}" type="text"  name="txtBox37a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status38a }}" type="text"  name="txtBox38a" class="text-input" style="width:55px;">

                                    <br>
                                    <input placeholder="{{ $status48b }}" type="text"  name="txtBox48b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status47b }}" type="text"  name="txtBox47b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status46b }}" type="text"  name="txtBox46b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status45b }}" type="text"  name="txtBox45b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status44b }}" type="text"  name="txtBox44b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status43b }}" type="text"  name="txtBox43b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status42b }}" type="text"  name="txtBox42b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status41b }}" type="text"  name="txtBox41b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status31b }}" type="text"  name="txtBox31b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status32b }}" type="text"  name="txtBox32b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status33b }}" type="text"  name="txtBox33b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status34b }}" type="text"  name="txtBox34b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status35b }}" type="text"  name="txtBox35b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status36b }}" type="text"  name="txtBox36b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status37b }}" type="text"  name="txtBox37b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status38b }}" type="text"  name="txtBox38b" class="text-input" style="width:55px;">
                                </div>

                                <!--71 TO 75 A AND B-->
                                <div style="float: left;margin-top: 25px;">
                                    <!-- <img src="{{ asset('images/part7_71-75.png') }}" width="300px" style="margin-left: 177px;"> -->
                                    <a href="{{ route('dentist.dentalchart.each',71)}}"><button type="button" class="btn btn-warning" style="margin-left: 185px; margin-top: 5px;">71</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',72)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">72</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',73)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">73</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',74)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">74</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',75)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">75</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',85)}}"><button type="button" class="btn btn-warning" style="margin-left: 5px; margin-top: 5px;">85</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',84)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">84</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',83)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">83</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',82)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">82</button></a>
                                    <a href="{{ route('dentist.dentalchart.each',81)}}"><button type="button" class="btn btn-warning" style="margin-left: 9px; margin-top: 5px;">81</button></a>
                                    <br>
                                    <div style="margin-top: 3px;">
                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth" style="margin-left:180px;">
                                                <path    id="71l" onclick="isClicked('71l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="71t" onclick="isClicked('71t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="71r" onclick="isClicked('71r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="71b" onclick="isClicked('71b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="71m" onclick="isClicked('71m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt71l" id="txt71l" hidden/>
                                            <input type="number" name="txt71t" id="txt71t" hidden/>
                                            <input type="number" name="txt71r" id="txt71r" hidden/>
                                            <input type="number" name="txt71b" id="txt71b" hidden/>
                                            <input type="number" name="txt71m" id="txt71m" hidden/>
                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="72l" onclick="isClicked('72l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="72t" onclick="isClicked('72t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="72r" onclick="isClicked('72r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="72b" onclick="isClicked('72b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="72m" onclick="isClicked('72m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt72l" id="txt72l" hidden/>
                                            <input type="number" name="txt72t" id="txt72t" hidden/>
                                            <input type="number" name="txt72r" id="txt72r" hidden/>
                                            <input type="number" name="txt72b" id="txt72b" hidden/>
                                            <input type="number" name="txt72m" id="txt72m" hidden/>
                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="73l" onclick="isClicked('73l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="73t" onclick="isClicked('73t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="73r" onclick="isClicked('73r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="73b" onclick="isClicked('73b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="73m" onclick="isClicked('73m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt73l" id="txt73l" hidden/>
                                            <input type="number" name="txt73t" id="txt73t" hidden/>
                                            <input type="number" name="txt73r" id="txt73r" hidden/>
                                            <input type="number" name="txt73b" id="txt73b" hidden/>
                                            <input type="number" name="txt73m" id="txt73m" hidden/>
                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="74l" onclick="isClicked('74l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="74t" onclick="isClicked('74t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="74r" onclick="isClicked('74r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="74b" onclick="isClicked('74b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="74m" onclick="isClicked('74m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt74l" id="txt74l" hidden/>
                                            <input type="number" name="txt74t" id="txt74t" hidden/>
                                            <input type="number" name="txt74r" id="txt74r" hidden/>
                                            <input type="number" name="txt74b" id="txt74b" hidden/>
                                            <input type="number" name="txt74m" id="txt74m" hidden/>
                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="75l" onclick="isClicked('75l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="75t" onclick="isClicked('75t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="75r" onclick="isClicked('75r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="75b" onclick="isClicked('75b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="75m" onclick="isClicked('75m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt75l" id="txt75l" hidden/>
                                            <input type="number" name="txt75t" id="txt75t" hidden/>
                                            <input type="number" name="txt75r" id="txt75r" hidden/>
                                            <input type="number" name="txt75b" id="txt75b" hidden/>
                                            <input type="number" name="txt75m" id="txt75m" hidden/>
                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="85l" onclick="isClicked('85l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="85t" onclick="isClicked('85t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="85r" onclick="isClicked('85r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="85b" onclick="isClicked('85b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="85m" onclick="isClicked('85m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt85l" id="txt85l" hidden/>
                                            <input type="number" name="txt85t" id="txt85t" hidden/>
                                            <input type="number" name="txt85r" id="txt85r" hidden/>
                                            <input type="number" name="txt85b" id="txt85b" hidden/>
                                            <input type="number" name="txt85m" id="txt85m" hidden/>
                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="84l" onclick="isClicked('84l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="84t" onclick="isClicked('84t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="84r" onclick="isClicked('84r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="84b" onclick="isClicked('84b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="84m" onclick="isClicked('84m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt84l" id="txt84l" hidden/>
                                            <input type="number" name="txt84t" id="txt84t" hidden/>
                                            <input type="number" name="txt84r" id="txt84r" hidden/>
                                            <input type="number" name="txt84b" id="txt84b" hidden/>
                                            <input type="number" name="txt84m" id="txt84m" hidden/>
                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="83l" onclick="isClicked('83l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="83t" onclick="isClicked('83t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="83r" onclick="isClicked('83r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="83b" onclick="isClicked('83b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="83m" onclick="isClicked('83m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt83l" id="txt83l" hidden/>
                                            <input type="number" name="txt83t" id="txt83t" hidden/>
                                            <input type="number" name="txt83r" id="txt83r" hidden/>
                                            <input type="number" name="txt83b" id="txt83b" hidden/>
                                            <input type="number" name="txt83m" id="txt83m" hidden/>

                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="82l" onclick="isClicked('82l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="82t" onclick="isClicked('82t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="82r" onclick="isClicked('82r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="82b" onclick="isClicked('82b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="82m" onclick="isClicked('82m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt82l" id="txt82l" hidden/>
                                            <input type="number" name="txt82t" id="txt82t" hidden/>
                                            <input type="number" name="txt82r" id="txt82r" hidden/>
                                            <input type="number" name="txt82b" id="txt82b" hidden/>
                                            <input type="number" name="txt82m" id="txt82m" hidden/>

                                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                            <svg viewBox="0 0 25 25" class="tooth">
                                                <path    id="81l" onclick="isClicked('81l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                                <path    id="81t" onclick="isClicked('81t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                                <path    id="81r" onclick="isClicked('81r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                                <path    id="81b" onclick="isClicked('81b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                                <circle  id="81m" onclick="isClicked('81m')" cx="12.5" cy="12.5" r="4"                          />
                                            </svg>
                                            <input type="number" name="txt81l" id="txt81l" hidden/>
                                            <input type="number" name="txt81t" id="txt81t" hidden/>
                                            <input type="number" name="txt81r" id="txt81r" hidden/>
                                            <input type="number" name="txt81b" id="txt81b" hidden/>
                                            <input type="number" name="txt81m" id="txt81m" hidden/>

                                        </div>
                                    <label style="display: inline-block;width:100px;font-size: 12px; margin-left:75px;">STATUS RIGHT</label>
                                    <input placeholder="{{ $status71a }}"  type="text"    name="txtBox71a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status72a }}"  type="text"    name="txtBox72a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status73a }}"  type="text"    name="txtBox73a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status74a }}"  type="text"    name="txtBox74a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status75a }}"  type="text"    name="txtBox75a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status85a }}"  type="text"    name="txtBox85a" class="text-input" style="width:55px;" style="margin-left: 54px;">
                                    <input placeholder="{{ $status84a }}"  type="text"    name="txtBox84a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status83a }}"  type="text"    name="txtBox83a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status82a }}"  type="text"    name="txtBox82a" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status81a }}"  type="text"    name="txtBox81a" class="text-input" style="width:55px;">
                                    <label style="display: inline-block;width:100px;font-size: 12px; text-align:right;">STATUS LEFT</label>
                                    <br>
                                    <input placeholder="{{ $status71b }}"  type="text"    name="txtBox71b" class="text-input" style="width:55px;margin-left:179px">
                                    <input placeholder="{{ $status72b }}"  type="text"    name="txtBox72b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status73b }}"  type="text"    name="txtBox73b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status74b }}"  type="text"    name="txtBox74b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status75b }}"  type="text"    name="txtBox75b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status85b }}"  type="text"    name="txtBox85b" class="text-input" style="width:55px;" style="margin-left: 54px;">
                                    <input placeholder="{{ $status84b }}"  type="text"    name="txtBox84b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status83b }}"  type="text"    name="txtBox83b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status82b }}"  type="text"    name="txtBox82b" class="text-input" style="width:55px;">
                                    <input placeholder="{{ $status81b }}"  type="text"    name="txtBox81b" class="text-input" style="width:55px;">
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

                        <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                                <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                                    height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b></p>
                                <textarea rows="7" name="diagnosisTextArea" class="form-control" required placeholder="Enter diagnosis here"
                                    style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">{{ $dentalchart->diagnosisDesc }}</textarea>
                        </div>

                        <div style="float: left;width: 100%;text-align: center;margin-top: 10px;">
                            <!-- <a href="C_dentist_dental_form.php"><button class="btn btn-primary">BACK</button></a> -->
                            <button type="submit" name="btnSave" class="btn btn-success">SAVE</button>
                        </form>
                            <a href="{{url('dentist/DentalLog')}}"><button type="button" class="btn btn-danger">CANCEL</button></a>
                        </div>
                    </div>

                   <!-- /Content -->
            <!-- /form input mask -->
        </div>
    </div>
    <script>
        var toothcons = {!! json_encode($toothconditions) !!};

        function darkenToothSide($toothSide){
            document.getElementById($toothSide).style.fill = "#222";
        }
        $(document).ready(function(){

            for(i=0; i<toothcons.length; i++){
                var toothNum = toothcons[i].toothNum;
                var left = toothNum + 'l';
                var top = toothNum + 't';
                var right = toothNum + 'r';
                var bottom = toothNum + 'b';
                var middle = toothNum + 'm';
                if(toothcons[i].leftSide == 1){
                    document.getElementById(left).style.fill = "#222";
                }
                if(toothcons[i].topSide == 1){
                    document.getElementById(top).style.fill = "#222";
                }
                if(toothcons[i].rightSide == 1){
                    document.getElementById(right).style.fill = "#222";
                }
                if(toothcons[i].bottomSide == 1){
                    document.getElementById(bottom).style.fill = "#222";
                }
                if(toothcons[i].middleSide == 1){
                    document.getElementById(middle).style.fill = "#222";
                }
            }

        });
        function isClicked($num){
            var tooth = document.getElementById($num);
            var numero = $num.substr(0,2);
            var side = $num.substr(2,1);
            var isDisabled = false;
            var inDatabase = false;

            var sideClicked = false;

            for(i=0; i<toothcons.length; i++){
                if(numero == toothcons[i].toothNum){
                    isInDB = true;
                    if(side == 'l'){
                        if(toothcons[i].leftSide == 1){
                            isDisabled = true;
                        }
                    }
                    if(side == 't'){
                        if(toothcons[i].topSide == 1){
                            isDisabled = true;
                        }
                    }
                    if(side == 'r'){
                        if(toothcons[i].rightSide == 1){
                            isDisabled = true;
                        }
                    }
                    if(side == 'b'){
                        if(toothcons[i].bottomSide == 1){
                            isDisabled = true;
                        }
                    }
                    if(side == 'm'){
                        if(toothcons[i].middleSide == 1){
                            isDisabled = true;
                        }
                    }
                    if(isDisabled == true){
                        alert('Already Disabled!');
                    }
                    else{
                        var toothside = 'txt' + $num;
                        if(inDatabase == true){
                            if(tooth.style.fill == 'white'){
                                tooth.style.fill = 'maroon';
                                document.getElementById(toothside).value = 1;
                            }
                            else{
                                tooth.style.fill = 'white';
                                document.getElementById(toothside).value = 0;
                            }
                        }
                    }
                    break;
                }
            }
            if(inDatabase == false && isDisabled == false){
                if(tooth.style.fill == 'white'){
                    tooth.style.fill = 'maroon';
                    document.getElementById(toothside).value = 1;
                }
                else{
                    tooth.style.fill = 'white';
                    document.getElementById(toothside).value = 0;
                }
            }
            isDisabled = false;
            isInDB = false;
        }
    </script>
@endsection
