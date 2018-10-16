@extends('dentist.layout.dentist')

@section('content')
<style>
        svg{
            width: 57px;
        }
        svg path, svg circle{
            fill: white;
            stroke: black;
        }
    </style>
@php
    $statusko = 1;
@endphp
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
                    <div>
                        <h1 style="text-align: center;">DENTAL RECORD CHART</h1>
                        <h2 style="text-align:center;">INTRAORAL EXAMINATION</h2>
                        <!--55 TO 51 A AND B-->
                        <div style="float: left;margin-top: 25px;">
                            <label style="display: inline-block;width:100px;font-size: 12px;margin-left:75px">STATUS RIGHT</label>
                            <select name="a55" id="a55" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(55)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m55" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo55" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 55 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a54" id="a54" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(54)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m54" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo54" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 54 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a53" id="a53" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(53)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m53" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo53" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 53 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a52" id="a52" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(52)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m52" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo52" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 52 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a51" id="a51" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(51)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m51" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo51" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 51 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a61" id="a61" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(61)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m61" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo61" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 61 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a62" id="a62" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(62)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m62" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo62" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 62 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a63" id="a63" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(63)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m63" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo63" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 63 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a64" id="a64" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(64)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m64" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo64" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 64 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a65" id="a65" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(65)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m65" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo65" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 65 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <label style="display: inline-block;width:100px;font-size: 12px; text-align:right;">STATUS LEFT</label>
                            <br>
                            <input readonly value="" type="text"  name="b55" id="b55" class="text-input" style="width:60px;margin-left: 179px;color:black;">
                            <input readonly value="" type="text"  name="b54" id="b54" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b53" id="b53" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b52" id="b52" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b51" id="b51" class="text-input" style="width:60px;color:black;">

                            <input readonly value="" type="text"  name="b61" id="b61" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b62" id="b62" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b63" id="b63" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b64" id="b64" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b65" id="b65" class="text-input" style="width:60px;color:black;">
                            <br>
                            <div style="margin-top: 5px;">
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 178px;">
                                    <path    id="55l" onclick="isClicked('55l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="55t" onclick="isClicked('55t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="55r" onclick="isClicked('55r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="55b" onclick="isClicked('55b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="55m" onclick="isClicked('55m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c55l" id="c55l" hidden/>
                                <input type="number" name="c55t" id="c55t" hidden/>
                                <input type="number" name="c55r" id="c55r" hidden/>
                                <input type="number" name="c55b" id="c55b" hidden/>
                                <input type="number" name="c55m" id="c55m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="54l" onclick="isClicked('54l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="54t" onclick="isClicked('54t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="54r" onclick="isClicked('54r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="54b" onclick="isClicked('54b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="54m" onclick="isClicked('54m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c54l" id="c54l" hidden/>
                                <input type="number" name="c54t" id="c54t" hidden/>
                                <input type="number" name="c54r" id="c54r" hidden/>
                                <input type="number" name="c54b" id="c54b" hidden/>
                                <input type="number" name="c54m" id="c54m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="53l" onclick="isClicked('53l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="53t" onclick="isClicked('53t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="53r" onclick="isClicked('53r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="53b" onclick="isClicked('53b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="53m" onclick="isClicked('53m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c53l" id="c53l" hidden/>
                                <input type="number" name="c53t" id="c53t" hidden/>
                                <input type="number" name="c53r" id="c53r" hidden/>
                                <input type="number" name="c53b" id="c53b" hidden/>
                                <input type="number" name="c53m" id="c53m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="52l" onclick="isClicked('52l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="52t" onclick="isClicked('52t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="52r" onclick="isClicked('52r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="52b" onclick="isClicked('52b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="52m" onclick="isClicked('52m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c52l" id="c52l" hidden/>
                                <input type="number" name="c52t" id="c52t" hidden/>
                                <input type="number" name="c52r" id="c52r" hidden/>
                                <input type="number" name="c52b" id="c52b" hidden/>
                                <input type="number" name="c52m" id="c52m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="51l" onclick="isClicked('51l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="51t" onclick="isClicked('51t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="51r" onclick="isClicked('51r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="51b" onclick="isClicked('51b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="51m" onclick="isClicked('51m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c51l" id="c51l" hidden/>
                                <input type="number" name="c51t" id="c51t" hidden/>
                                <input type="number" name="c51r" id="c51r" hidden/>
                                <input type="number" name="c51b" id="c51b" hidden/>
                                <input type="number" name="c51m" id="c51m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="61l" onclick="isClicked('61l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="61t" onclick="isClicked('61t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="61r" onclick="isClicked('61r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="61b" onclick="isClicked('61b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="61m" onclick="isClicked('61m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c61l" id="c61l" hidden/>
                                <input type="number" name="c61t" id="c61t" hidden/>
                                <input type="number" name="c61r" id="c61r" hidden/>
                                <input type="number" name="c61b" id="c61b" hidden/>
                                <input type="number" name="c61m" id="c61m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="62l" onclick="isClicked('62l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="62t" onclick="isClicked('62t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="62r" onclick="isClicked('62r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="62b" onclick="isClicked('62b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="62m" onclick="isClicked('62m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c62l" id="c62l" hidden/>
                                <input type="number" name="c62t" id="c62t" hidden/>
                                <input type="number" name="c62r" id="c62r" hidden/>
                                <input type="number" name="c62b" id="c62b" hidden/>
                                <input type="number" name="c62m" id="c62m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="63l" onclick="isClicked('63l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="63t" onclick="isClicked('63t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="63r" onclick="isClicked('63r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="63b" onclick="isClicked('63b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="63m" onclick="isClicked('63m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c63l" id="c63l" hidden/>
                                <input type="number" name="c63t" id="c63t" hidden/>
                                <input type="number" name="c63r" id="c63r" hidden/>
                                <input type="number" name="c63b" id="c63b" hidden/>
                                <input type="number" name="c63m" id="c63m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="64l" onclick="isClicked('64l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="64t" onclick="isClicked('64t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="64r" onclick="isClicked('64r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="64b" onclick="isClicked('64b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="64m" onclick="isClicked('64m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c64l" id="c64l" hidden/>
                                <input type="number" name="c64t" id="c64t" hidden/>
                                <input type="number" name="c64r" id="c64r" hidden/>
                                <input type="number" name="c64b" id="c64b" hidden/>
                                <input type="number" name="c64m" id="c64m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="65l" onclick="isClicked('65l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="65t" onclick="isClicked('65t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="65r" onclick="isClicked('65r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="65b" onclick="isClicked('65b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="65m" onclick="isClicked('65m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c65l" id="c65l" hidden/>
                                <input type="number" name="c65t" id="c65t" hidden/>
                                <input type="number" name="c65r" id="c65r" hidden/>
                                <input type="number" name="c65b" id="c65b" hidden/>
                                <input type="number" name="c65m" id="c65m" hidden/>
                            </div>

                            <div style="margin-top: 5px; margin-left: 178px">
                                <a href="{{ route('dentist.dentalchart.each',55)}}"><button type="button" class="btn btn-warning" style="width:55px;">55</button></a>
                                <a href="{{ route('dentist.dentalchart.each',54)}}"><button type="button" class="btn btn-warning" style="width:55px;">54</button></a>
                                <a href="{{ route('dentist.dentalchart.each',53)}}"><button type="button" class="btn btn-warning" style="width:55px;">53</button></a>
                                <a href="{{ route('dentist.dentalchart.each',52)}}"><button type="button" class="btn btn-warning" style="width:55px;">52</button></a>
                                <a href="{{ route('dentist.dentalchart.each',51)}}"><button type="button" class="btn btn-warning" style="width:55px;">51</button></a>
                                <a href="{{ route('dentist.dentalchart.each',61)}}"><button type="button" class="btn btn-warning" style="width:55px;">61</button></a>
                                <a href="{{ route('dentist.dentalchart.each',62)}}"><button type="button" class="btn btn-warning" style="width:55px;">62</button></a>
                                <a href="{{ route('dentist.dentalchart.each',63)}}"><button type="button" class="btn btn-warning" style="width:55px;">63</button></a>
                                <a href="{{ route('dentist.dentalchart.each',64)}}"><button type="button" class="btn btn-warning" style="width:55px;">64</button></a>
                                <a href="{{ route('dentist.dentalchart.each',65)}}"><button type="button" class="btn btn-warning" style="width:55px;">65</button></a>
                            </div>
                        </div>

						<div style="float: left;margin-top: 25px;">
                            <select name="a18" id="a18" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(18)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m18" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo18" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 18 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a17" id="a17" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(17)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m17" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo17" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 17 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a16" id="a16" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(16)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m16" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo16" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 16 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a15" id="a15" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(15)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m15" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo15" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 15 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a14" id="a14" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(14)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m14" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo14" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 14 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a13" id="a13" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(13)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m13" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo13" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 13 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a12" id="a12" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(12)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m12" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo12" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 12 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a11" id="a11" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(11)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m11" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo11" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 11 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a21" id="a21" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(21)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m21" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo21" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 21 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a22" id="a22" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(22)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m22" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo22" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 22 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a23" id="a23" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(23)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m23" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo23" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 23 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a24" id="a24" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(24)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m24" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo24" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 24 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a25" id="a25" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(25)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m25" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo25" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 25 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a26" id="a26" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(26)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m26" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo26" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 26 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a27" id="a27" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(27)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m27" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo27" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 27 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a28" id="a28" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(28)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m28" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo28" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 28 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <br>
                            <input readonly value="" type="text"  name="b18" id="b18" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b17" id="b17" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b16" id="b16" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b15" id="b15" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b14" id="b14" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b13" id="b13" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b12" id="b12" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b11" id="b11" class="text-input" style="width:60px;color:black;">

                            <input readonly value="" type="text"  name="b21" id="b21" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b22" id="b22" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b23" id="b23" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b24" id="b24" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b25" id="b25" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b26" id="b26" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b27" id="b27" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b28" id="b28" class="text-input" style="width:60px;color:black;">
                            <br>
                            <div style="margin-top: 5px;">
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px;">
                                    <path    id="18l" onclick="isClicked('18l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="18t" onclick="isClicked('18t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="18r" onclick="isClicked('18r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="18b" onclick="isClicked('18b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="18m" onclick="isClicked('18m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c18l" id="c18l" hidden/>
                                <input type="number" name="c18t" id="c18t" hidden/>
                                <input type="number" name="c18r" id="c18r" hidden/>
                                <input type="number" name="c18b" id="c18b" hidden/>
                                <input type="number" name="c18m" id="c18m" hidden/>

                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="17l" onclick="isClicked('17l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="17t" onclick="isClicked('17t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="17r" onclick="isClicked('17r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="17b" onclick="isClicked('17b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="17m" onclick="isClicked('17m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c17l" id="c17l" hidden/>
                                <input type="number" name="c17t" id="c17t" hidden/>
                                <input type="number" name="c17r" id="c17r" hidden/>
                                <input type="number" name="c17b" id="c17b" hidden/>
                                <input type="number" name="c17m" id="c17m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="16l" onclick="isClicked('16l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="16t" onclick="isClicked('16t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="16r" onclick="isClicked('16r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="16b" onclick="isClicked('16b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="16m" onclick="isClicked('16m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c16l" id="c16l" hidden/>
                                <input type="number" name="c16t" id="c16t" hidden/>
                                <input type="number" name="c16r" id="c16r" hidden/>
                                <input type="number" name="c16b" id="c16b" hidden/>
                                <input type="number" name="c16m" id="c16m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="15l" onclick="isClicked('15l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="15t" onclick="isClicked('15t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="15r" onclick="isClicked('15r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="15b" onclick="isClicked('15b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="15m" onclick="isClicked('15m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c15l" id="c15l" hidden/>
                                <input type="number" name="c15t" id="c15t" hidden/>
                                <input type="number" name="c15r" id="c15r" hidden/>
                                <input type="number" name="c15b" id="c15b" hidden/>
                                <input type="number" name="c15m" id="c15m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="15l" onclick="isClicked('15l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="15t" onclick="isClicked('15t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="15r" onclick="isClicked('15r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="15b" onclick="isClicked('15b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="15m" onclick="isClicked('15m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c14l" id="c14l" hidden/>
                                <input type="number" name="c14t" id="c14t" hidden/>
                                <input type="number" name="c14r" id="c14r" hidden/>
                                <input type="number" name="c14b" id="c14b" hidden/>
                                <input type="number" name="c14m" id="c14m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="13l" onclick="isClicked('13l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="13t" onclick="isClicked('13t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="13r" onclick="isClicked('13r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="13b" onclick="isClicked('13b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="13m" onclick="isClicked('13m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c13l" id="c13l" hidden/>
                                <input type="number" name="c13t" id="c13t" hidden/>
                                <input type="number" name="c13r" id="c13r" hidden/>
                                <input type="number" name="c13b" id="c13b" hidden/>
                                <input type="number" name="c13m" id="c13m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="12l" onclick="isClicked('12l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="12t" onclick="isClicked('12t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="12r" onclick="isClicked('12r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="12b" onclick="isClicked('12b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="12m" onclick="isClicked('12m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c12l" id="c12l" hidden/>
                                <input type="number" name="c12t" id="c12t" hidden/>
                                <input type="number" name="c12r" id="c12r" hidden/>
                                <input type="number" name="c12b" id="c12b" hidden/>
                                <input type="number" name="c12m" id="c12m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="11l" onclick="isClicked('11l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="11t" onclick="isClicked('11t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="11r" onclick="isClicked('11r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="11b" onclick="isClicked('11b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="11m" onclick="isClicked('11m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c11l" id="c11l" hidden/>
                                <input type="number" name="c11t" id="c11t" hidden/>
                                <input type="number" name="c11r" id="c11r" hidden/>
                                <input type="number" name="c11b" id="c11b" hidden/>
                                <input type="number" name="c11m" id="c11m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="21l" onclick="isClicked('21l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="21t" onclick="isClicked('21t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="21r" onclick="isClicked('21r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="21b" onclick="isClicked('21b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="21m" onclick="isClicked('21m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c21l" id="c21l" hidden/>
                                <input type="number" name="c21t" id="c21t" hidden/>
                                <input type="number" name="c21r" id="c21r" hidden/>
                                <input type="number" name="c21b" id="c21b" hidden/>
                                <input type="number" name="c21m" id="c21m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="22l" onclick="isClicked('22l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="22t" onclick="isClicked('22t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="22r" onclick="isClicked('22r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="22b" onclick="isClicked('22b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="22m" onclick="isClicked('22m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c22l" id="c22l" hidden/>
                                <input type="number" name="c22t" id="c22t" hidden/>
                                <input type="number" name="c22r" id="c22r" hidden/>
                                <input type="number" name="c22b" id="c22b" hidden/>
                                <input type="number" name="c22m" id="c22m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="23l" onclick="isClicked('23l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="23t" onclick="isClicked('23t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="23r" onclick="isClicked('23r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="23b" onclick="isClicked('23b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="23m" onclick="isClicked('23m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c23l" id="c23l" hidden/>
                                <input type="number" name="c23t" id="c23t" hidden/>
                                <input type="number" name="c23r" id="c23r" hidden/>
                                <input type="number" name="c23b" id="c23b" hidden/>
                                <input type="number" name="c23m" id="c23m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="24l" onclick="isClicked('24l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="24t" onclick="isClicked('24t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="24r" onclick="isClicked('24r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="24b" onclick="isClicked('24b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="24m" onclick="isClicked('24m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c24l" id="c24l" hidden/>
                                <input type="number" name="c24t" id="c24t" hidden/>
                                <input type="number" name="c24r" id="c24r" hidden/>
                                <input type="number" name="c24b" id="c24b" hidden/>
                                <input type="number" name="c24m" id="c24m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="25l" onclick="isClicked('25l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="25t" onclick="isClicked('25t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="25r" onclick="isClicked('25r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="25b" onclick="isClicked('25b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="25m" onclick="isClicked('25m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c25l" id="c25l" hidden/>
                                <input type="number" name="c25t" id="c25t" hidden/>
                                <input type="number" name="c25r" id="c25r" hidden/>
                                <input type="number" name="c25b" id="c25b" hidden/>
                                <input type="number" name="c25m" id="c25m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="26l" onclick="isClicked('26l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="26t" onclick="isClicked('26t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="26r" onclick="isClicked('26r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="26b" onclick="isClicked('26b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="26m" onclick="isClicked('26m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c26l" id="c26l" hidden/>
                                <input type="number" name="c26t" id="c26t" hidden/>
                                <input type="number" name="c26r" id="c26r" hidden/>
                                <input type="number" name="c26b" id="c26b" hidden/>
                                <input type="number" name="c26m" id="c26m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="27l" onclick="isClicked('27l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="27t" onclick="isClicked('27t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="27r" onclick="isClicked('27r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="27b" onclick="isClicked('27b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="27m" onclick="isClicked('27m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c27l" id="c27l" hidden/>
                                <input type="number" name="c27t" id="c27t" hidden/>
                                <input type="number" name="c27r" id="c27r" hidden/>
                                <input type="number" name="c27b" id="c27b" hidden/>
                                <input type="number" name="c27m" id="c27m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="28l" onclick="isClicked('28l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="28t" onclick="isClicked('28t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="28r" onclick="isClicked('28r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="28b" onclick="isClicked('28b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="28m" onclick="isClicked('28m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c28l" id="c28l" hidden/>
                                <input type="number" name="c28t" id="c28t" hidden/>
                                <input type="number" name="c28r" id="c28r" hidden/>
                                <input type="number" name="c28b" id="c28b" hidden/>
                                <input type="number" name="c28m" id="c28m" hidden/>

                            </div>

                            <div style="margin-top: 5px;">
                                <a href="{{ route('dentist.dentalchart.each',18)}}"><button type="button" class="btn btn-warning" style="width:55px;">18</button></a>
                                <a href="{{ route('dentist.dentalchart.each',17)}}"><button type="button" class="btn btn-warning" style="width:55px;">17</button></a>
                                <a href="{{ route('dentist.dentalchart.each',16)}}"><button type="button" class="btn btn-warning" style="width:55px;">16</button></a>
                                <a href="{{ route('dentist.dentalchart.each',15)}}"><button type="button" class="btn btn-warning" style="width:55px;">15</button></a>
                                <a href="{{ route('dentist.dentalchart.each',14)}}"><button type="button" class="btn btn-warning" style="width:55px;">14</button></a>
                                <a href="{{ route('dentist.dentalchart.each',13)}}"><button type="button" class="btn btn-warning" style="width:55px;">13</button></a>
                                <a href="{{ route('dentist.dentalchart.each',12)}}"><button type="button" class="btn btn-warning" style="width:55px;">12</button></a>
                                <a href="{{ route('dentist.dentalchart.each',11)}}"><button type="button" class="btn btn-warning" style="width:55px;">11</button></a>
                                <a href="{{ route('dentist.dentalchart.each',21)}}"><button type="button" class="btn btn-warning" style="width:55px;">21</button></a>
                                <a href="{{ route('dentist.dentalchart.each',22)}}"><button type="button" class="btn btn-warning" style="width:55px;">22</button></a>
                                <a href="{{ route('dentist.dentalchart.each',23)}}"><button type="button" class="btn btn-warning" style="width:55px;">23</button></a>
                                <a href="{{ route('dentist.dentalchart.each',24)}}"><button type="button" class="btn btn-warning" style="width:55px;">24</button></a>
                                <a href="{{ route('dentist.dentalchart.each',25)}}"><button type="button" class="btn btn-warning" style="width:55px;">25</button></a>
                                <a href="{{ route('dentist.dentalchart.each',26)}}"><button type="button" class="btn btn-warning" style="width:55px;">26</button></a>
                                <a href="{{ route('dentist.dentalchart.each',27)}}"><button type="button" class="btn btn-warning" style="width:55px;">27</button></a>
                                <a href="{{ route('dentist.dentalchart.each',28)}}"><button type="button" class="btn btn-warning" style="width:55px;">28</button></a>
                            </div>
                        </div>



						<div style="float: left;margin-top: 25px;">
							<div style="margin-top: 5px;">
                                <a href="{{ route('dentist.dentalchart.each',48)}}"><button type="button" class="btn btn-warning" style="width:55px;">48</button></a>
                                <a href="{{ route('dentist.dentalchart.each',47)}}"><button type="button" class="btn btn-warning" style="width:55px;">47</button></a>
                                <a href="{{ route('dentist.dentalchart.each',46)}}"><button type="button" class="btn btn-warning" style="width:55px;">46</button></a>
                                <a href="{{ route('dentist.dentalchart.each',45)}}"><button type="button" class="btn btn-warning" style="width:55px;">45</button></a>
                                <a href="{{ route('dentist.dentalchart.each',44)}}"><button type="button" class="btn btn-warning" style="width:55px;">44</button></a>
                                <a href="{{ route('dentist.dentalchart.each',43)}}"><button type="button" class="btn btn-warning" style="width:55px;">43</button></a>
                                <a href="{{ route('dentist.dentalchart.each',42)}}"><button type="button" class="btn btn-warning" style="width:55px;">42</button></a>
                                <a href="{{ route('dentist.dentalchart.each',41)}}"><button type="button" class="btn btn-warning" style="width:55px;">41</button></a>
                                <a href="{{ route('dentist.dentalchart.each',31)}}"><button type="button" class="btn btn-warning" style="width:55px;">31</button></a>
                                <a href="{{ route('dentist.dentalchart.each',32)}}"><button type="button" class="btn btn-warning" style="width:55px;">32</button></a>
                                <a href="{{ route('dentist.dentalchart.each',33)}}"><button type="button" class="btn btn-warning" style="width:55px;">33</button></a>
                                <a href="{{ route('dentist.dentalchart.each',34)}}"><button type="button" class="btn btn-warning" style="width:55px;">34</button></a>
                                <a href="{{ route('dentist.dentalchart.each',35)}}"><button type="button" class="btn btn-warning" style="width:55px;">35</button></a>
                                <a href="{{ route('dentist.dentalchart.each',36)}}"><button type="button" class="btn btn-warning" style="width:55px;">36</button></a>
                                <a href="{{ route('dentist.dentalchart.each',37)}}"><button type="button" class="btn btn-warning" style="width:55px;">37</button></a>
                                <a href="{{ route('dentist.dentalchart.each',38)}}"><button type="button" class="btn btn-warning" style="width:55px;">38</button></a>
                            </div>
							<div style="margin-top: 5px;">
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px;">
                                    <path    id="48l" onclick="isClicked('48l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="48t" onclick="isClicked('48t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="48r" onclick="isClicked('48r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="48b" onclick="isClicked('48b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="48m" onclick="isClicked('48m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c48l" id="c48l" hidden/>
                                <input type="number" name="c48t" id="c48t" hidden/>
                                <input type="number" name="c48r" id="c48r" hidden/>
                                <input type="number" name="c48b" id="c48b" hidden/>
                                <input type="number" name="c48m" id="c48m" hidden/>

                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="47l" onclick="isClicked('47l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="47t" onclick="isClicked('47t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="47r" onclick="isClicked('47r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="47b" onclick="isClicked('47b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="47m" onclick="isClicked('47m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c47l" id="c47l" hidden/>
                                <input type="number" name="c47t" id="c47t" hidden/>
                                <input type="number" name="c47r" id="c47r" hidden/>
                                <input type="number" name="c47b" id="c47b" hidden/>
                                <input type="number" name="c47m" id="c47m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="46l" onclick="isClicked('46l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="46t" onclick="isClicked('46t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="46r" onclick="isClicked('46r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="46b" onclick="isClicked('46b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="46m" onclick="isClicked('46m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c46l" id="c46l" hidden/>
                                <input type="number" name="c46t" id="c46t" hidden/>
                                <input type="number" name="c46r" id="c46r" hidden/>
                                <input type="number" name="c46b" id="c46b" hidden/>
                                <input type="number" name="c46m" id="c46m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="45l" onclick="isClicked('45l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="45t" onclick="isClicked('45t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="45r" onclick="isClicked('45r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="45b" onclick="isClicked('45b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="45m" onclick="isClicked('45m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c45l" id="c45l" hidden/>
                                <input type="number" name="c45t" id="c45t" hidden/>
                                <input type="number" name="c45r" id="c45r" hidden/>
                                <input type="number" name="c45b" id="c45b" hidden/>
                                <input type="number" name="c45m" id="c45m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="45l" onclick="isClicked('45l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="45t" onclick="isClicked('45t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="45r" onclick="isClicked('45r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="45b" onclick="isClicked('45b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="45m" onclick="isClicked('45m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c44l" id="c44l" hidden/>
                                <input type="number" name="c44t" id="c44t" hidden/>
                                <input type="number" name="c44r" id="c44r" hidden/>
                                <input type="number" name="c44b" id="c44b" hidden/>
                                <input type="number" name="c44m" id="c44m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="43l" onclick="isClicked('43l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="43t" onclick="isClicked('43t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="43r" onclick="isClicked('43r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="43b" onclick="isClicked('43b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="43m" onclick="isClicked('43m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c43l" id="c43l" hidden/>
                                <input type="number" name="c43t" id="c43t" hidden/>
                                <input type="number" name="c43r" id="c43r" hidden/>
                                <input type="number" name="c43b" id="c43b" hidden/>
                                <input type="number" name="c43m" id="c43m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="42l" onclick="isClicked('42l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="42t" onclick="isClicked('42t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="42r" onclick="isClicked('42r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="42b" onclick="isClicked('42b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="42m" onclick="isClicked('42m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c42l" id="c42l" hidden/>
                                <input type="number" name="c42t" id="c42t" hidden/>
                                <input type="number" name="c42r" id="c42r" hidden/>
                                <input type="number" name="c42b" id="c42b" hidden/>
                                <input type="number" name="c42m" id="c42m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="41l" onclick="isClicked('41l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="41t" onclick="isClicked('41t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="41r" onclick="isClicked('41r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="41b" onclick="isClicked('41b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="41m" onclick="isClicked('41m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c41l" id="c41l" hidden/>
                                <input type="number" name="c41t" id="c41t" hidden/>
                                <input type="number" name="c41r" id="c41r" hidden/>
                                <input type="number" name="c41b" id="c41b" hidden/>
                                <input type="number" name="c41m" id="c41m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="31l" onclick="isClicked('31l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="31t" onclick="isClicked('31t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="31r" onclick="isClicked('31r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="31b" onclick="isClicked('31b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="31m" onclick="isClicked('31m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c31l" id="c31l" hidden/>
                                <input type="number" name="c31t" id="c31t" hidden/>
                                <input type="number" name="c31r" id="c31r" hidden/>
                                <input type="number" name="c31b" id="c31b" hidden/>
                                <input type="number" name="c31m" id="c31m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="32l" onclick="isClicked('32l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="32t" onclick="isClicked('32t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="32r" onclick="isClicked('32r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="32b" onclick="isClicked('32b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="32m" onclick="isClicked('32m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c32l" id="c32l" hidden/>
                                <input type="number" name="c32t" id="c32t" hidden/>
                                <input type="number" name="c32r" id="c32r" hidden/>
                                <input type="number" name="c32b" id="c32b" hidden/>
                                <input type="number" name="c32m" id="c32m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="33l" onclick="isClicked('33l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="33t" onclick="isClicked('33t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="33r" onclick="isClicked('33r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="33b" onclick="isClicked('33b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="33m" onclick="isClicked('33m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c33l" id="c33l" hidden/>
                                <input type="number" name="c33t" id="c33t" hidden/>
                                <input type="number" name="c33r" id="c33r" hidden/>
                                <input type="number" name="c33b" id="c33b" hidden/>
                                <input type="number" name="c33m" id="c33m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="34l" onclick="isClicked('34l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="34t" onclick="isClicked('34t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="34r" onclick="isClicked('34r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="34b" onclick="isClicked('34b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="34m" onclick="isClicked('34m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c34l" id="c34l" hidden/>
                                <input type="number" name="c34t" id="c34t" hidden/>
                                <input type="number" name="c34r" id="c34r" hidden/>
                                <input type="number" name="c34b" id="c34b" hidden/>
                                <input type="number" name="c34m" id="c34m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="35l" onclick="isClicked('35l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="35t" onclick="isClicked('35t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="35r" onclick="isClicked('35r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="35b" onclick="isClicked('35b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="35m" onclick="isClicked('35m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c35l" id="c35l" hidden/>
                                <input type="number" name="c35t" id="c35t" hidden/>
                                <input type="number" name="c35r" id="c35r" hidden/>
                                <input type="number" name="c35b" id="c35b" hidden/>
                                <input type="number" name="c35m" id="c35m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="36l" onclick="isClicked('36l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="36t" onclick="isClicked('36t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="36r" onclick="isClicked('36r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="36b" onclick="isClicked('36b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="36m" onclick="isClicked('36m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c36l" id="c36l" hidden/>
                                <input type="number" name="c36t" id="c36t" hidden/>
                                <input type="number" name="c36r" id="c36r" hidden/>
                                <input type="number" name="c36b" id="c36b" hidden/>
                                <input type="number" name="c36m" id="c36m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="37l" onclick="isClicked('37l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="37t" onclick="isClicked('37t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="37r" onclick="isClicked('37r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="37b" onclick="isClicked('37b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="37m" onclick="isClicked('37m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c37l" id="c37l" hidden/>
                                <input type="number" name="c37t" id="c37t" hidden/>
                                <input type="number" name="c37r" id="c37r" hidden/>
                                <input type="number" name="c37b" id="c37b" hidden/>
                                <input type="number" name="c37m" id="c37m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 3px; ">
                                    <path    id="38l" onclick="isClicked('38l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="38t" onclick="isClicked('38t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="38r" onclick="isClicked('38r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="38b" onclick="isClicked('38b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="38m" onclick="isClicked('38m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c38l" id="c38l" hidden/>
                                <input type="number" name="c38t" id="c38t" hidden/>
                                <input type="number" name="c38r" id="c38r" hidden/>
                                <input type="number" name="c38b" id="c38b" hidden/>
                                <input type="number" name="c38m" id="c38m" hidden/>

                            </div>
                            <select name="a48" id="a48" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(48)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m48" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo48" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 48 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a47" id="a47" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(47)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m47" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo47" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 47 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a46" id="a46" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(46)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m46" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo46" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 46 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a45" id="a45" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(45)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m45" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo45" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 45 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a44" id="a44" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(44)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m44" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo44" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 44 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a43" id="a43" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(43)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m43" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo43" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 43 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a42" id="a42" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(42)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m42" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo42" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 42 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a41" id="a41" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(41)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m41" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo41" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 41 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a31" id="a31" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(31)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m31" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo31" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 31 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a32" id="a32" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(32)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m32" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo32" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 32 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a33" id="a33" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(33)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m33" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo33" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 33 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a34" id="a34" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(34)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m34" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo34" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 34 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a35" id="a35" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(35)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m35" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo35" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 35 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a36" id="a36" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(36)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m36" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo36" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 36 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a37" id="a37" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(37)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m37" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo37" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 37 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a38" id="a38" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(38)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m38" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo38" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 38 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <br>
                            <input readonly value="" type="text"  name="b48" id="b48" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b47" id="b47" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b46" id="b46" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b45" id="b45" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b44" id="b44" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b43" id="b43" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b42" id="b42" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b41" id="b41" class="text-input" style="width:60px;color:black;">

                            <input readonly value="" type="text"  name="b31" id="b31" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b32" id="b32" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b33" id="b33" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b34" id="b34" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b35" id="b35" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b36" id="b36" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b37" id="b37" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b38" id="b38" class="text-input" style="width:60px;color:black;">

                        </div>







						<div style="float: left;margin-top: 25px;">

                            <div style="margin-top: 5px; margin-left: 178px">
                                <a href="{{ route('dentist.dentalchart.each',75)}}"><button type="button" class="btn btn-warning" style="width:55px;">75</button></a>
                                <a href="{{ route('dentist.dentalchart.each',74)}}"><button type="button" class="btn btn-warning" style="width:55px;">74</button></a>
                                <a href="{{ route('dentist.dentalchart.each',73)}}"><button type="button" class="btn btn-warning" style="width:55px;">73</button></a>
                                <a href="{{ route('dentist.dentalchart.each',72)}}"><button type="button" class="btn btn-warning" style="width:55px;">72</button></a>
                                <a href="{{ route('dentist.dentalchart.each',71)}}"><button type="button" class="btn btn-warning" style="width:55px;">71</button></a>
                                <a href="{{ route('dentist.dentalchart.each',81)}}"><button type="button" class="btn btn-warning" style="width:55px;">81</button></a>
                                <a href="{{ route('dentist.dentalchart.each',82)}}"><button type="button" class="btn btn-warning" style="width:55px;">82</button></a>
                                <a href="{{ route('dentist.dentalchart.each',83)}}"><button type="button" class="btn btn-warning" style="width:55px;">83</button></a>
                                <a href="{{ route('dentist.dentalchart.each',84)}}"><button type="button" class="btn btn-warning" style="width:55px;">84</button></a>
                                <a href="{{ route('dentist.dentalchart.each',85)}}"><button type="button" class="btn btn-warning" style="width:55px;">85</button></a>
                            </div>
                            <div style="margin-top: 5px;">
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 178px;">
                                    <path    id="75l" onclick="isClicked('75l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="75t" onclick="isClicked('75t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="75r" onclick="isClicked('75r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="75b" onclick="isClicked('75b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="75m" onclick="isClicked('75m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c75l" id="c75l" hidden/>
                                <input type="number" name="c75t" id="c75t" hidden/>
                                <input type="number" name="c75r" id="c75r" hidden/>
                                <input type="number" name="c75b" id="c75b" hidden/>
                                <input type="number" name="c75m" id="c75m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="74l" onclick="isClicked('74l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="74t" onclick="isClicked('74t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="74r" onclick="isClicked('74r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="74b" onclick="isClicked('74b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="74m" onclick="isClicked('74m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c74l" id="c74l" hidden/>
                                <input type="number" name="c74t" id="c74t" hidden/>
                                <input type="number" name="c74r" id="c74r" hidden/>
                                <input type="number" name="c74b" id="c74b" hidden/>
                                <input type="number" name="c74m" id="c74m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="73l" onclick="isClicked('73l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="73t" onclick="isClicked('73t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="73r" onclick="isClicked('73r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="73b" onclick="isClicked('73b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="73m" onclick="isClicked('73m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c73l" id="c73l" hidden/>
                                <input type="number" name="c73t" id="c73t" hidden/>
                                <input type="number" name="c73r" id="c73r" hidden/>
                                <input type="number" name="c73b" id="c73b" hidden/>
                                <input type="number" name="c73m" id="c73m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="72l" onclick="isClicked('72l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="72t" onclick="isClicked('72t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="72r" onclick="isClicked('72r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="72b" onclick="isClicked('72b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="72m" onclick="isClicked('72m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c72l" id="c72l" hidden/>
                                <input type="number" name="c72t" id="c72t" hidden/>
                                <input type="number" name="c72r" id="c72r" hidden/>
                                <input type="number" name="c72b" id="c72b" hidden/>
                                <input type="number" name="c72m" id="c72m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="71l" onclick="isClicked('71l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="71t" onclick="isClicked('71t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="71r" onclick="isClicked('71r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="71b" onclick="isClicked('71b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="71m" onclick="isClicked('71m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c71l" id="c71l" hidden/>
                                <input type="number" name="c71t" id="c71t" hidden/>
                                <input type="number" name="c71r" id="c71r" hidden/>
                                <input type="number" name="c71b" id="c71b" hidden/>
                                <input type="number" name="c71m" id="c71m" hidden/>
								<svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="81l" onclick="isClicked('81l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="81t" onclick="isClicked('81t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="81r" onclick="isClicked('81r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="81b" onclick="isClicked('81b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="81m" onclick="isClicked('81m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c81l" id="c81l" hidden/>
                                <input type="number" name="c81t" id="c81t" hidden/>
                                <input type="number" name="c81r" id="c81r" hidden/>
                                <input type="number" name="c81b" id="c81b" hidden/>
                                <input type="number" name="c81m" id="c81m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="82l" onclick="isClicked('82l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="82t" onclick="isClicked('82t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="82r" onclick="isClicked('82r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="82b" onclick="isClicked('82b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="82m" onclick="isClicked('82m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c82l" id="c82l" hidden/>
                                <input type="number" name="c82t" id="c82t" hidden/>
                                <input type="number" name="c82r" id="c82r" hidden/>
                                <input type="number" name="c82b" id="c82b" hidden/>
                                <input type="number" name="c82m" id="c82m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="83l" onclick="isClicked('83l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="83t" onclick="isClicked('83t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="83r" onclick="isClicked('83r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="83b" onclick="isClicked('83b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="83m" onclick="isClicked('83m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c83l" id="c83l" hidden/>
                                <input type="number" name="c83t" id="c83t" hidden/>
                                <input type="number" name="c83r" id="c83r" hidden/>
                                <input type="number" name="c83b" id="c83b" hidden/>
                                <input type="number" name="c83m" id="c83m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="84l" onclick="isClicked('84l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="84t" onclick="isClicked('84t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="84r" onclick="isClicked('84r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="84b" onclick="isClicked('84b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="84m" onclick="isClicked('84m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c84l" id="c84l" hidden/>
                                <input type="number" name="c84t" id="c84t" hidden/>
                                <input type="number" name="c84r" id="c84r" hidden/>
                                <input type="number" name="c84b" id="c84b" hidden/>
                                <input type="number" name="c84m" id="c84m" hidden/>
                                <svg viewBox="0 0 25 25" class="tooth" style="margin-left: 2px; margin-right:2px;">
                                    <path    id="85l" onclick="isClicked('85l')" d="M5,5 Q-1.5,12.5 5,20 L10,15 Q8,12.5 10,10 Z"    />
                                    <path    id="85t" onclick="isClicked('85t')" d="M5,5 Q12.5,-1.5 20,5 L15,10 Q12.5,8 10,10 Z"    />
                                    <path    id="85r" onclick="isClicked('85r')" d="M20,5 Q26.5,12.5 20,20 L15,15 Q17,12.5 15,10 Z" />
                                    <path    id="85b" onclick="isClicked('85b')" d="M20,20 Q12.5,26.5 5,20 L10,15 Q12.5,17 15,15 Z" />
                                    <circle  id="85m" onclick="isClicked('85m')" cx="12.5" cy="12.5" r="4"                          />
                                </svg>
                                <input type="number" name="c85l" id="c85l" hidden/>
                                <input type="number" name="c85t" id="c85t" hidden/>
                                <input type="number" name="c85r" id="c85r" hidden/>
                                <input type="number" name="c85b" id="c85b" hidden/>
                                <input type="number" name="c85m" id="c85m" hidden/>
                            </div>
							<label style="display: inline-block;width:100px;font-size: 12px;margin-left:75px">STATUS RIGHT</label>
							<select name="a75" id="a75" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(75)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m75" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo75" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 75 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a74" id="a74" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(74)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m74" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo74" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 74 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a73" id="a73" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(73)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m73" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo73" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 73 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a72" id="a72" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(72)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m72" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo72" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 72 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a71" id="a71" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(71)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m71" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo71" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 71 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
							<select name="a81" id="a81" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(81)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m81" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo81" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 81 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a82" id="a82" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(82)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m82" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo82" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 82 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a83" id="a83" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(83)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m83" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo83" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 83 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a84" id="a84" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(84)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m84" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo84" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 84 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <select name="a85" id="a85" style="width:60px; height:27px; color:black;font-weight:bold; text-align:center;">
                                <option onclick="revert(85)" selected value=""></option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Decayed (Caries indicated for Filling)" value="D">D</option>
                                <option id="m85" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing due to Caries" value="M">M</option>
                                <option title="Filled" value="F">F</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Caries Indicated for Extraction" value="I">I</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Root Fragment" value="RF">RF</option>
                                <option id="mo85" @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "selected"}} {{ "disabled" }} @endif @endforeach @endif title="Missing" value="MO">MO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Impacted Tooth" value="Im">Im</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Jacket Crown" value="J">J</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Amalgam Filling" value="A">A</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Abutment" value="AB">AB</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Pontic" value="P">P</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Inlay" value="In">In</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Light Cure Composite" value="LC">LC</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Sealants" value="S">S</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Removable Denture" value="Rm">Rm</option>

                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Caries" value="X">X</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Extraction due to Other Causes" value="XO">XO</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Present Teeth" value="PT">PT</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Congenitally Missing" value="Cm">Cm</option>
                                <option @if(count($toothconditions) >0) @foreach($toothconditions as $toothcondition) @if($toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'MO' || $toothcondition->toothNum == 85 && $toothcondition->toothStatusA == 'M'){{ "disabled"}} @endif @endforeach @endif title="Supernumerary" value="Sp">Sp</option>
                            </select>
                            <label style="display: inline-block;width:100px;font-size: 12px; text-align:right;">STATUS LEFT</label>
                            <br>
                            <input readonly value="" type="text"  name="b75" id="b75" class="text-input" style="width:60px;margin-left: 179px;color:black;">
                            <input readonly value="" type="text"  name="b74" id="b74" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b73" id="b73" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b72" id="b72" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b71" id="b71" class="text-input" style="width:60px;color:black;">

                            <input readonly value="" type="text"  name="b81" id="b81" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b82" id="b82" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b83" id="b83" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b84" id="b84" class="text-input" style="width:60px;color:black;">
                            <input readonly value="" type="text"  name="b85" id="b85" class="text-input" style="width:60px;color:black;">
                        </div>

                        <div style="float: left; margin-top: 30px; margin-left: 70px;">
                            <div style="float: left; margin-top: 25px;">
                                <label style="font-size: 14px;margin-bottom: 15px;">Legend Condition</label>

                                <p><i><b>D</b> - Decayed (Caries indicated for Filling)</i></p>
                                <p><i><b>M</b> - Missing due to Caries</i></p>
                                <p><i><b>F</b> - Filled</i></p>
                                <p><i><b>I</b> - Caries Indicated for Extraction</i></p>
                                <p><i><b>RF</b> - Root Fragment</i></p>
                                <p><i><b>MO</b> - Missing</i></p>
                                <p><i><b>Im</b> - Impacted Tooth</i></p>
                            </div>

                            <div style="float: left; margin-top: 25px;margin-left: 100px;">
                                <label style="font-size: 14px;margin-bottom: 15px;">Restorations and Prosthetics</label>

                                <p><b>J</b><i> - Jacket Crown</i></p>
                                <p><b>A</b><i> - Amalgam Filling</i></p>
                                <p><b>AB</b><i> - Abutment</i></p>
                                <p><b>P</b><i> - Pontic</i></p>
                                <p><b>In</b><i> - Inlay</i></p>
                                <p><b>LC</b><i> - Light Cure Composite</i></p>
                                <p><b>S</b><i> - Sealants</i></p>
                                <p><b>Rm</b><i> - Removable Denture</i></p>
                            </div>

                            <div style="float: left; margin-top: 25px;margin-left: 100px;">
                                <label style="font-size: 14px;margin-bottom: 15px;">Surgery</label>
                                <p><b>X</b><i> - Extraction due to Caries</i></p>
                                <p><b>XO</b><i> - Extraction due to Other Causes</i></p>
                                <p><b>PT</i></b><i> - Present Teeth</i></p>
                                <p><b>Cm</b><i> - Congenitally Missing</i></p>
                                <p><b>Sp</b><i> - Supernumerary</i></p>
                            </div>
                        </div>

                        <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
                                <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                                    height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b></p>
                                <textarea rows="7" name="diagnosisTextArea" class="form-control" required placeholder="Enter diagnosis here"
                                    style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">{{ $dentalchart->diagnosisDesc }}</textarea>
                        </div>

                        <div style="float: left;width: 100%;text-align: center;margin-top: 10px;">
                            <button type="submit" name="btnSave" class="btn btn-success">SAVE</button>
                        </form>
                            <a href="{{url('dentist/DentalLog')}}"><button type="button" class="btn btn-danger">CANCEL</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('document').ready(function(){
            var toothcons = {!! json_encode($toothconditions) !!};
            for(i=0; i<toothcons.length; i++){
                var toothNum = toothcons[i].toothNum;
                var left = toothNum + 'l';
                var top = toothNum + 't';
                var right = toothNum + 'r';
                var bottom = toothNum + 'b';
                var middle = toothNum + 'm';
                var b = 'b' + toothNum;
                if(toothcons[i].toothStatusA == 'M' || toothcons[i].toothStatusA == 'MO'){
                    document.getElementById(b).value = toothcons[i].toothStatusB;
                    if(toothcons[i].leftSide == 1){
                        document.getElementById(left).style.fill = "black";
                    }
                    if(toothcons[i].topSide == 1){
                        document.getElementById(top).style.fill = "black";
                    }
                    if(toothcons[i].rightSide == 1){
                        document.getElementById(right).style.fill = "black";
                    }
                    if(toothcons[i].bottomSide == 1){
                        document.getElementById(bottom).style.fill = "black";
                    }
                    if(toothcons[i].middleSide == 1){
                        document.getElementById(middle).style.fill = "black";
                    }
                }
            }
        });
        function revert($num){
            var toothcons = {!! json_encode($toothconditions) !!};
            for(i=0; i<toothcons.length; i++){
                var toothNum = toothcons[i].toothNum;
                var left = toothNum + 'l';
                var top = toothNum + 't';
                var right = toothNum + 'r';
                var bottom = toothNum + 'b';
                var middle = toothNum + 'm';
                var m = '#m' + toothNum;
                var mo = '#mo' + toothNum;
                var a = 'a' + toothNum;
                var b = 'b' + toothNum;
                if(toothNum == $num){
                    if(toothcons[i].toothStatusA == 'M' || toothcons[i].toothStatusA == 'MO'){
                        document.getElementById(a).value = toothcons[i].toothStatusA;
                        document.getElementById(b).value = toothcons[i].toothStatusB;

                        if(toothcons[i].leftSide == 1){
                            document.getElementById(left).style.fill = "black";
                        }
                        if(toothcons[i].topSide == 1){
                            document.getElementById(top).style.fill = "black";
                        }
                        if(toothcons[i].rightSide == 1){
                            document.getElementById(right).style.fill = "black";
                        }
                        if(toothcons[i].bottomSide == 1){
                            document.getElementById(bottom).style.fill = "black";
                        }
                        if(toothcons[i].middleSide == 1){
                            document.getElementById(middle).style.fill = "black";
                        }
                    }
                }
            }
        }
        function isClicked($num){
            var surface = document.getElementById($num);
            var toothnum = $num.substr(0,2);
            var side = $num.charAt(2);
            var con = document.getElementById('a'+toothnum);
            var srfno = document.getElementById('b' + toothnum);
            var left = document.getElementById('c' + toothnum + 'l');
            var top = document.getElementById('c' + toothnum + 't');
            var right = document.getElementById('c' + toothnum + 'r');
            var bottom = document.getElementById('c' + toothnum + 'b');
            var middle = document.getElementById('c' + toothnum + 'm');
            var valueB = '';
            if(con.value == ''){
                swal("Ooops!", "Please choose value from the dropdown first!", "warning");
                valueB = '';
                top.value = 0;
                right.value = 0;
                bottom.value = 0;
                left.value = 0;
                middle.value = 0;
            }
            else if(surface.style.fill == 'black' && con.value != 'F'){
                swal("Ooops!", "Cannot input to Missing Tooth!", "error");
                valueB = '';
                top.value = 0;
                right.value = 0;
                bottom.value = 0;
                left.value = 0;
                middle.value = 0;
            }

            else{
                srfno.value = '';
                switch(side){
                    case 't': if(top.value == 1){top.value = 0; surface.style.fill = 'white';} else{ top.value = 1; surface.style.fill = 'maroon';} break;
                    case 'r': if(right.value == 1){right.value = 0; surface.style.fill = 'white';} else{ right.value = 1; surface.style.fill = 'maroon';} break;
                    case 'b': if(bottom.value == 1){bottom.value = 0; surface.style.fill = 'white';} else{ bottom.value = 1; surface.style.fill = 'maroon';} break;
                    case 'l': if(left.value == 1){left.value = 0; surface.style.fill = 'white';} else{ left.value = 1; surface.style.fill = 'maroon';} break;
                    case 'm': if(middle.value == 1){middle.value = 0; surface.style.fill = 'white';} else{ middle.value = 1; surface.style.fill = 'maroon';} break;
                }
                if(top.value == 1){
                    if(valueB != ''){
                        valueB = valueB + '1';
                    }
                    else{
                        valueB = '1';
                    }
                }
                else{
                    valueB = valueB.replace('1','');
                }
                if(right.value == 1){
                    if(valueB != ''){
                        valueB = valueB + '2';
                    }
                    else{
                        valueB = '2';
                    }
                }
                else{
                    valueB = valueB.replace('2','');
                }
                if(bottom.value == 1){
                    if(valueB != ''){
                        valueB = valueB + '3';
                    }
                    else{
                        valueB = '3';
                    }
                }
                else{
                    valueB = valueB.replace('3','');
                }
                if(left.value == 1){
                    if(valueB != ''){
                        valueB = valueB + '4';
                    }
                    else{
                        valueB = '4';
                    }
                }
                else{
                    valueB = valueB.replace('4','');
                }
                if(middle.value == 1){
                    if(valueB != ''){
                        valueB = valueB + '5';
                    }
                    else{
                        valueB = '5';
                    }
                }
                else{
                    valueB = valueB.replace('5','');
                }
                {{--  alert(valueB);  --}}
                srfno.value = valueB;
                valueB = '';
            }
            }
    </script>
@endsection
