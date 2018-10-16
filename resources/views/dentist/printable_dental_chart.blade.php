<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printable Dental Chart</title>
    <link rel="stylesheet" href={{asset("../vendors/bootstrap/dist/css/bootstrap.min.css")}}>
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
        table tr td{
            padding: 1px 13px 1px 13px;
            border: 1px solid black;
        }
        img{
            width: 40px;
        }
    </style>
    <script src={{asset("../vendors/jquery/dist/jquery.min.js")}}></script>
</head>
<body>
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                    <div class="x_content">
                        <!-- Content -->
                        @php
                            $status55a = '-';
                            $status55b = '-';
                            $status54a = '-';
                            $status54b = '-';
                            $status53a = '-';
                            $status53b = '-';
                            $status52a = '-';
                            $status52b = '-';
                            $status51a = '-';
                            $status51b = '-';

                            $status65a = '-';
                            $status65b = '-';
                            $status64a = '-';
                            $status64b = '-';
                            $status63a = '-';
                            $status63b = '-';
                            $status62a = '-';
                            $status62b = '-';
                            $status61a = '-';
                            $status61b = '-';

                            $status75a = '-';
                            $status75b = '-';
                            $status74a = '-';
                            $status74b = '-';
                            $status73a = '-';
                            $status73b = '-';
                            $status72a = '-';
                            $status72b = '-';
                            $status71a = '-';
                            $status71b = '-';

                            $status85a = '-';
                            $status85b = '-';
                            $status84a = '-';
                            $status84b = '-';
                            $status83a = '-';
                            $status83b = '-';
                            $status82a = '-';
                            $status82b = '-';
                            $status81a = '-';
                            $status81b = '-';

                            $status11a = '-';
                            $status11b = '-';
                            $status12a = '-';
                            $status12b = '-';
                            $status13a = '-';
                            $status13b = '-';
                            $status14a = '-';
                            $status14b = '-';
                            $status15a = '-';
                            $status15b = '-';
                            $status16a = '-';
                            $status16b = '-';
                            $status17a = '-';
                            $status17b = '-';
                            $status18a = '-';
                            $status18b = '-';
                            $status11a = '-';
                            $status11b = '-';
                            $status12a = '-';
                            $status12b = '-';
                            $status13a = '-';
                            $status13b = '-';
                            $status14a = '-';
                            $status14b = '-';
                            $status15a = '-';
                            $status15b = '-';
                            $status16a = '-';
                            $status16b = '-';
                            $status17a = '-';
                            $status17b = '-';
                            $status18a = '-';
                            $status18b = '-';

                            $status21a = '-';
                            $status21b = '-';
                            $status22a = '-';
                            $status22b = '-';
                            $status23a = '-';
                            $status23b = '-';
                            $status24a = '-';
                            $status24b = '-';
                            $status25a = '-';
                            $status25b = '-';
                            $status26a = '-';
                            $status26b = '-';
                            $status27a = '-';
                            $status27b = '-';
                            $status28a = '-';
                            $status28b = '-';
                            $status21a = '-';
                            $status21b = '-';
                            $status22a = '-';
                            $status22b = '-';
                            $status23a = '-';
                            $status23b = '-';
                            $status24a = '-';
                            $status24b = '-';
                            $status25a = '-';
                            $status25b = '-';
                            $status26a = '-';
                            $status26b = '-';
                            $status27a = '-';
                            $status27b = '-';
                            $status28a = '-';
                            $status28b = '-';

                            $status31a = '-';
                            $status31b = '-';
                            $status32a = '-';
                            $status32b = '-';
                            $status33a = '-';
                            $status33b = '-';
                            $status34a = '-';
                            $status34b = '-';
                            $status35a = '-';
                            $status35b = '-';
                            $status36a = '-';
                            $status36b = '-';
                            $status37a = '-';
                            $status37b = '-';
                            $status38a = '-';
                            $status38b = '-';
                            $status31a = '-';
                            $status31b = '-';
                            $status32a = '-';
                            $status32b = '-';
                            $status33a = '-';
                            $status33b = '-';
                            $status34a = '-';
                            $status34b = '-';
                            $status35a = '-';
                            $status35b = '-';
                            $status36a = '-';
                            $status36b = '-';
                            $status37a = '-';
                            $status37b = '-';
                            $status38a = '-';
                            $status38b = '-';

                            $status41a = '-';
                            $status41b = '-';
                            $status42a = '-';
                            $status42b = '-';
                            $status43a = '-';
                            $status43b = '-';
                            $status44a = '-';
                            $status44b = '-';
                            $status45a = '-';
                            $status45b = '-';
                            $status46a = '-';
                            $status46b = '-';
                            $status47a = '-';
                            $status47b = '-';
                            $status48a = '-';
                            $status48b = '-';
                            $status41a = '-';
                            $status41b = '-';
                            $status42a = '-';
                            $status42b = '-';
                            $status43a = '-';
                            $status43b = '-';
                            $status44a = '-';
                            $status44b = '-';
                            $status45a = '-';
                            $status45b = '-';
                            $status46a = '-';
                            $status46b = '-';
                            $status47a = '-';
                            $status47b = '-';
                            $status48a = '-';
                            $status48b = '-';
                        @endphp
                        @if(count($toothconditions) > 0)
                            @foreach($toothconditions as $toothcondition)

                            {{--  55 TO 51  --}}
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 55)
                                    @php
                                    $status55a = $toothcondition->toothStatusA;
                                    $status55b = $toothcondition->toothStatusB;
                                    @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 54)
                                    @php $status54a = $toothcondition->toothStatusA;
                                    $status54b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 53)
                                @php $status53a = $toothcondition->toothStatusA;
                                    $status53b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 52)
                                @php $status52a = $toothcondition->toothStatusA;
                                    $status52b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 51)
                                @php $status51a = $toothcondition->toothStatusA;
                                    $status51b = $toothcondition->toothStatusB; @endphp
                                @endif
                            {{--  65 TO 61  --}}
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 65)
                                    @php $status65a = $toothcondition->toothStatusA;
                                    $status65b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 64)
                                    @php $status64a = $toothcondition->toothStatusA;
                                    $status64b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 63)
                                @php $status63a = $toothcondition->toothStatusA;
                                    $status63b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 62)
                                @php $status62a = $toothcondition->toothStatusA;
                                    $status62b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 61)
                                @php $status61a = $toothcondition->toothStatusA;
                                    $status61b = $toothcondition->toothStatusB; @endphp
                                @endif
                            {{--  75 TO 71  --}}
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 75)
                                    @php $status75a = $toothcondition->toothStatusA;
                                    $status75b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 74)
                                    @php $status74a = $toothcondition->toothStatusA;
                                    $status74b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 73)
                                @php $status73a = $toothcondition->toothStatusA;
                                    $status73b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 72)
                                @php $status72a = $toothcondition->toothStatusA;
                                    $status72b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 71)
                                @php $status71a = $toothcondition->toothStatusA;
                                    $status71b = $toothcondition->toothStatusB; @endphp
                                @endif
                            {{--  85 TO 81  --}}
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 85)
                                    @php $status85a = $toothcondition->toothStatusA;
                                    $status85b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 84)
                                    @php $status84a = $toothcondition->toothStatusA;
                                    $status84b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 83)
                                @php $status83a = $toothcondition->toothStatusA;
                                    $status83b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 82)
                                @php $status82a = $toothcondition->toothStatusA;
                                    $status82b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 81)
                                @php $status81a = $toothcondition->toothStatusA;
                                    $status81b = $toothcondition->toothStatusB; @endphp
                                @endif
                                {{--  18 to 11  --}}
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 18)
                                    @php $status18a = $toothcondition->toothStatusA;
                                    $status18b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 17)
                                    @php $status17a = $toothcondition->toothStatusA;
                                    $status17b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 16)
                                @php $status16a = $toothcondition->toothStatusA;
                                    $status16b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 15)
                                    @php $status15a = $toothcondition->toothStatusA;
                                    $status15b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 14)
                                    @php $status14a = $toothcondition->toothStatusA;
                                    $status14b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 13)
                                @php $status13a = $toothcondition->toothStatusA;
                                    $status13b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 12)
                                @php $status12a = $toothcondition->toothStatusA;
                                    $status12b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 11)
                                @php $status11a = $toothcondition->toothStatusA;
                                    $status11b = $toothcondition->toothStatusB; @endphp
                                @endif
                                {{--  28 to 21  --}}
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 28)
                                    @php $status28a = $toothcondition->toothStatusA;
                                    $status28b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 27)
                                    @php $status27a = $toothcondition->toothStatusA;
                                    $status27b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 26)
                                @php $status26a = $toothcondition->toothStatusA;
                                    $status26b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 25)
                                    @php $status25a = $toothcondition->toothStatusA;
                                    $status25b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 24)
                                    @php $status24a = $toothcondition->toothStatusA;
                                    $status24b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 23)
                                @php $status23a = $toothcondition->toothStatusA;
                                    $status23b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 22)
                                @php $status22a = $toothcondition->toothStatusA;
                                    $status22b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 21)
                                @php $status21a = $toothcondition->toothStatusA;
                                    $status21b = $toothcondition->toothStatusB; @endphp
                                @endif
                                {{--  38 to 31  --}}
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 38)
                                    @php $status38a = $toothcondition->toothStatusA;
                                    $status38b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 37)
                                    @php $status37a = $toothcondition->toothStatusA;
                                    $status37b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 36)
                                @php $status36a = $toothcondition->toothStatusA;
                                    $status36b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 35)
                                    @php $status35a = $toothcondition->toothStatusA;
                                    $status35b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 34)
                                    @php $status34a = $toothcondition->toothStatusA;
                                    $status34b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 33)
                                @php $status33a = $toothcondition->toothStatusA;
                                    $status33b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 32)
                                @php $status32a = $toothcondition->toothStatusA;
                                    $status32b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 31)
                                @php $status31a = $toothcondition->toothStatusA;
                                    $status31b = $toothcondition->toothStatusB; @endphp
                                @endif
                                {{--  48 to 41  --}}
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 48)
                                    @php $status48a = $toothcondition->toothStatusA;
                                    $status48b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 47)
                                    @php $status47a = $toothcondition->toothStatusA;
                                    $status47b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 46)
                                @php $status46a = $toothcondition->toothStatusA;
                                    $status46b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 45)
                                    @php $status45a = $toothcondition->toothStatusA;
                                    $status45b = $toothcondition->toothStatusB; @endphp
                                    @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 44)
                                    @php $status44a = $toothcondition->toothStatusA;
                                    $status44b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 43)
                                @php $status43a = $toothcondition->toothStatusA;
                                    $status43b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 42)
                                @php $status42a = $toothcondition->toothStatusA;
                                    $status42b = $toothcondition->toothStatusB; @endphp
                                @endif
                                @if($toothcondition->isRecent == 1 && $toothcondition->isRecent == 1 && $toothcondition->toothNum == 41)
                                @php $status41a = $toothcondition->toothStatusA;
                                    $status41b = $toothcondition->toothStatusB; @endphp
                                @endif

                            @endforeach
                        @endif
                        <div>
                            <div>
                                <span><img style="float:left; padding-right:100px;" src="{{ asset('images/pup-logo.png') }}" width="100px"></span>
                                <div style="margin-left:50px;">
                                    <h6 style="padding:0; margin:0;">Republic of the Philippines</h6>
                                    <h6 style="padding:0; margin:0;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h6>
                                    <h6 style="padding:0; margin:0;">Medical Services Department</h6>
                                    <h6 style="padding:0; margin:0;"><b>DENTAL SERVICES</b></h6>
                                </div>
                                <hr>
                            </div>
                            <h3 style="text-align: center;padding:0; margin:0;">DENTAL RECORD CHART</h3>
                            <h4 style="text-align:center;padding:0; margin:0;">INTRAORAL EXAMINATION</h4>
                            <h5 style="padding:0; margin:0;">Patient Name: <u>{{ $patient->firstName }} {{ $patient->middleName }} {{ $patient->lastName }} {{ $patient->quantifier }}</u></h5>
                            <h5 style="padding:0; margin:0;">Patient Age: <u>{{ $patient->age }}</u></h5>
                            <br>
                            {{-- 55 ~ 65 --}}
                            <div>
                                <div>
                                    <table>
                                        <tr>
                                            <td><label style="text-align:center;font-size:15px;">55</label></td>
                                            <td><label style="text-align:center;font-size:15px;">54</label></td>
                                            <td><label style="text-align:center;font-size:15px;">53</label></td>
                                            <td><label style="text-align:center;font-size:15px;">52</label></td>
                                            <td><label style="text-align:center;font-size:15px;">51</label></td>

                                            <td><label style="text-align:center;font-size:15px;">61</label></td>
                                            <td><label style="text-align:center;font-size:15px;">62</label></td>
                                            <td><label style="text-align:center;font-size:15px;">63</label></td>
                                            <td><label style="text-align:center;font-size:15px;">64</label></td>
                                            <td><label style="text-align:center;font-size:15px;">65</label></td>
                                        </tr>
                                        <tr>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status55a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;" >{{ $status54a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status53a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status52a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status51a }}</label></td>

                                            <td><label style="text-align:center;font-size:15px;">{{ $status61a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status62a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status63a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status64a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status65a }}</label></td>
                                        </tr>
                                        <tr>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status55b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status54b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status53b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status52b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status51b }}</label></td>0
                                            <td><label style="text-align:center;font-size:10px;">{{ $status61b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status62b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status63b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status64b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status65b }}</label></td>
                                        </tr>

                                    </table>
                                </div>
                                <div style="padding-top: 5px;">
                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img id="54l" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img id="54t" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="54r" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="54b" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="54m" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img id="53l" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img id="53t" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="53r" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="53b" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="53m" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img id="52l" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img id="52t" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="52r" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="52b" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="52m" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img id="51l" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img id="51t" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="51r" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="51b" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img id="51m" src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                </div>
                            </div>

                            {{--  18 ~ 28  --}}
                            <div>
                                <div>
                                    <table>
                                        <tr>
                                            <td><label style="text-align:center;font-size:15px;">18</label></td>
                                            <td><label style="text-align:center;font-size:15px;">17</label></td>
                                            <td><label style="text-align:center;font-size:15px;">16</label></td>
                                            <td><label style="text-align:center;font-size:15px;">15</label></td>
                                            <td><label style="text-align:center;font-size:15px;">14</label></td>
                                            <td><label style="text-align:center;font-size:15px;">13</label></td>
                                            <td><label style="text-align:center;font-size:15px;">12</label></td>
                                            <td><label style="text-align:center;font-size:15px;">11</label></td>

                                            <td><label style="text-align:center;font-size:15px;">21</label></td>
                                            <td><label style="text-align:center;font-size:15px;">22</label></td>
                                            <td><label style="text-align:center;font-size:15px;">23</label></td>
                                            <td><label style="text-align:center;font-size:15px;">24</label></td>
                                            <td><label style="text-align:center;font-size:15px;">25</label></td>
                                            <td><label style="text-align:center;font-size:15px;">26</label></td>
                                            <td><label style="text-align:center;font-size:15px;">27</label></td>
                                            <td><label style="text-align:center;font-size:15px;">28</label></td>
                                        </tr>
                                        <tr>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status18a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status17a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status16a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status15a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status14a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status13a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status12a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status11a }}</label></td>

                                            <td><label style="text-align:center;font-size:15px;">{{ $status21a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status22a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status23a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status24a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status25a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status26a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status27a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status28a }}</label></td>
                                        </tr>
                                        <tr>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status18b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status17b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status16b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status15b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status14b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status13b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status12b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status11b }}</label></td>0
                                            <td><label style="text-align:center;font-size:10px;">{{ $status21b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status22b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status23b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status24b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status25b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status26b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status27b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status28b }}</label></td>
                                        </tr>

                                    </table>
                                </div>
                                <div style="padding-top: 5px;">
                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                    {{-- TOOOOOOOOOTH --}}
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                    <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                </div>
                            </div>

                            {{--  38 ~ 48  --}}
                            <div>
                                    <div style="padding-top: 5px;">
                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                        </div>
                                <div>
                                    <table>

                                        <tr>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status48a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status47a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status46a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status45a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status44a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status43a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status42a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status41a }}</label></td>

                                            <td><label style="text-align:center;font-size:15px;">{{ $status31a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status32a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status33a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status34a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status35a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status36a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status37a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status38a }}</label></td>
                                        </tr>
                                        <tr>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status48b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status47b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status46b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status45b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status44b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status43b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status42b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status41b }}</label></td>0
                                            <td><label style="text-align:center;font-size:10px;">{{ $status31b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status32b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status33b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status34b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status35b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status36b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status37b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status38b }}</label></td>
                                        </tr>
                                        <tr>
                                                <td><label style="text-align:center;font-size:15px;">48</label></td>
                                                <td><label style="text-align:center;font-size:15px;">47</label></td>
                                                <td><label style="text-align:center;font-size:15px;">46</label></td>
                                                <td><label style="text-align:center;font-size:15px;">45</label></td>
                                                <td><label style="text-align:center;font-size:15px;">44</label></td>
                                                <td><label style="text-align:center;font-size:15px;">43</label></td>
                                                <td><label style="text-align:center;font-size:15px;">42</label></td>
                                                <td><label style="text-align:center;font-size:15px;">41</label></td>

                                                <td><label style="text-align:center;font-size:15px;">31</label></td>
                                                <td><label style="text-align:center;font-size:15px;">32</label></td>
                                                <td><label style="text-align:center;font-size:15px;">33</label></td>
                                                <td><label style="text-align:center;font-size:15px;">34</label></td>
                                                <td><label style="text-align:center;font-size:15px;">35</label></td>
                                                <td><label style="text-align:center;font-size:15px;">36</label></td>
                                                <td><label style="text-align:center;font-size:15px;">37</label></td>
                                                <td><label style="text-align:center;font-size:15px;">38</label></td>
                                            </tr>
                                    </table>
                                </div>

                            </div>

                            {{--  75 ~ 85  --}}
                            <div>
                                    <div style="padding-top: 5px;">
                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:2.5px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">

                                            {{-- TOOOOOOOOOTH --}}
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->isRecent == 1 && $toothcondition->leftSide   == 1){{ asset('images/leftToothDis.png')   }} @break @else {{ asset('images/leftTooth.png')   }} @endif @endforeach @endif style="margin-left:1px;margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->isRecent == 1 && $toothcondition->topSide    == 1){{ asset('images/topToothDis.png')    }} @break @else {{ asset('images/topTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->isRecent == 1 && $toothcondition->rightSide  == 1){{ asset('images/rightToothDis.png')  }} @break @else {{ asset('images/rightTooth.png')  }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->isRecent == 1 && $toothcondition->bottomSide == 1){{ asset('images/bottomToothDis.png') }} @break @else {{ asset('images/bottomTooth.png') }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                            <img src=@if(count($toothconditions) > 0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->isRecent == 1 && $toothcondition->middleSide == 1){{ asset('images/midToothDis.png')    }} @break @else {{ asset('images/midTooth.png')    }} @endif @endforeach @endif style="margin-left:-44px; margin-top:3px;">
                                        </div>
                                <div>
                                    <table>

                                        <tr>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status75a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status74a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status73a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status72a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status71a }}</label></td>

                                            <td><label style="text-align:center;font-size:15px;">{{ $status81a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status82a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status83a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status84a }}</label></td>
                                            <td><label style="text-align:center;font-size:15px;">{{ $status85a }}</label></td>
                                        </tr>
                                        <tr>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status75b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status74b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status73b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status72b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status71b }}</label></td>0
                                            <td><label style="text-align:center;font-size:10px;">{{ $status81b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status82b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status83b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status84b }}</label></td>
                                            <td><label style="text-align:center;font-size:10px;">{{ $status85b }}</label></td>
                                        </tr>
                                        <tr>
                                                <td><label style="text-align:center;font-size:15px;">75</label></td>
                                                <td><label style="text-align:center;font-size:15px;">74</label></td>
                                                <td><label style="text-align:center;font-size:15px;">73</label></td>
                                                <td><label style="text-align:center;font-size:15px;">72</label></td>
                                                <td><label style="text-align:center;font-size:15px;">71</label></td>

                                                <td><label style="text-align:center;font-size:15px;">81</label></td>
                                                <td><label style="text-align:center;font-size:15px;">82</label></td>
                                                <td><label style="text-align:center;font-size:15px;">83</label></td>
                                                <td><label style="text-align:center;font-size:15px;">84</label></td>
                                                <td><label style="text-align:center;font-size:15px;">85</label></td>
                                            </tr>
                                    </table>

                                </div>

                            </div>
                            <div>
                                <div style="float:left; width:33.3%; margin-top:20px;">
                                    <label style="font-size: 11px; font-weight:bold;">Legend Condition</label>

                                    <p style="font-size: 11px;"><i><b>D</b>- Decayed(Caries indicated for Filling)</i></p>
                                    <p style="font-size: 11px;"><i><b>M</b>- Missing due to Caries</i></p>
                                    <p style="font-size: 11px;"><i><b>F</b>- Filled</i></p>
                                    <p style="font-size: 11px;"><i><b>I</b>- Caries Indicated for Extraction</i></p>
                                    <p style="font-size: 11px;"><i><b>RF</b>- Root Fragment</i></p>
                                    <p style="font-size: 11px;"><i><b>MO</b>- Missing</i></p>
                                    <p style="font-size: 11px;"><i><b>Im</b>- Impacted Tooth</i></p>
                                </div>

                                <div style="float:left; width:33.3%">
                                    <label style="font-size: 11px; font-weight:bold;">Restorations and Prosthetics</label>

                                    <p style="font-size: 11px;"><b>J</b><i>- Jacket Crown</i></p>
                                    <p style="font-size: 11px;"><b>A</b><i>- Amalgam Filling</i></p>
                                    <p style="font-size: 11px;"><b>AB</b><i>- Abutment</i></p>
                                    <p style="font-size: 11px;"><b>P</b><i>- Pontic</i></p>
                                    <p style="font-size: 11px;"><b>In</b><i>- Inlay</i></p>
                                    <p style="font-size: 11px;"><b>LC</b><i>- Light Cure Composite</i></p>
                                    <p style="font-size: 11px;"><b>S</b><i>- Sealants</i></p>
                                    <p style="font-size: 11px;"><b>Rm</b><i>- Removable Denture</i></p>
                                </div>

                                <div  style="float:left; width:33.3%">
                                    <label style="font-size: 11px; font-weight:bold;">Surgery</label>
                                    <p style="font-size: 11px;"><b>X</b><i>- Extraction due to Caries</i></p>
                                    <p style="font-size: 11px;"><b>XO</b><i>- Extraction due to Other Causes</i></p>
                                    <p style="font-size: 11px;"><b>/</b><i>- Present Teeth</i></p>
                                    <p style="font-size: 11px;"><b>Cm</b><i>- Congenitally Missing</i></p>
                                    <p style="font-size: 11px;"><b>Sp</b><i>- Supernumerary</i></p>
                                </div>
                            </div>
                            <br>
                            <h5 style="float:right;font-size:11px;margin-top:200px;">___________________________________</u></h5>
                            <h5 style="float:right;font-size:11px;margin-top:215px; margin-right:50px;">Dentist Signature</u></h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
