@extends('nurse.layout.nurse')

@section('content')

    <div id="medicineTable"class="row"
          style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
          <h4 style="margin-bottom:5px; margin-left:5px;"> Given Medicine</h4>
          <div class="table-responsive" style="width:500px;">
            <table class="table table-striped table-bordered jambo_table bulk_action" id="medTable">
              <thead>
                <tr class="headings">
                  <th>
                    <input type="checkbox" id="check-all">
                  </th>
                  <th class="column-title">Generic<br>Name </th>
                  <th class="column-title" style="padding-right:50px;">Brand </th>
                  <th class="column-title">Quantity<br>Used </th>
                  <th class="column-title">Unit </th>
                  <th class="column-title">Dosage</th>
                  <th class="column-title">Medication</th>
               
                </tr>
              </thead>

              <tbody id="tbodyMedicine">
                @foreach($prescriptionInfo as $medicine)
                  @if($medicine->isPrescribed == 0)
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" name="table_records_medicine" value="{{ $medicine->prescriptionID }}" id="{{ $medicine->prescriptionID }}">
                    </td>
                    <td class=" ">{{ $medicine->genericName }}</td>
                    <td class=" ">{{ $medicine->brand }}</td>
                    <td class=" ">{{ $medicine->quantity }}</td>
                    <td class=" ">{{ $medicine->unit }}</td>
                    <td class=" ">{{ $medicine->dosage }}</td>
                    <td class=" ">{{ $medicine->medication }}</td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
         
            <button class="btn btn-default" id="btnDeleteMed" type="button" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
          </div>
        </div>

        <div id="supplyTable" class="row"
          style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
          <h4 style="margin-bottom:5px; margin-left:5px;"> Given Medical Supply</h4>
          <div class="table-responsive" style="width:470px;">
            <table class="table table-striped table-bordered jambo_table bulk_action" id="suppTable">
              <thead>
                <tr class="headings">
                  <th>
                    <input type="checkbox" id="check-all-supp">
                  </th>
                  <th class="column-title">Generic Name </th>
                  <th class="column-title" style="padding-right:50px;">Brand </th>
                  <th class="column-title">Quantity<br>Used </th>
                  <th class="column-title">Unit </th>
              
                </tr>
              </thead>

              <tbody id="tbodyMedicalSupply">
                @foreach($usedMedSupply as $medSupply)
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" name="table_records_medSupp" value="{{ $medSupply->medSupplyUsedID }}" id="{{ $medSupply->medSupplyUsedID }}">
                    </td>
                    <td class=" ">{{ $medSupply->medSupName }}</td>
                    <td class=" ">{{ $medSupply->brand }}</td>
                    <td class=" ">{{ $medSupply->quantity }}</td>
                    <td class=" ">{{ $medSupply->unit }}</td>
                   
                  </tr>
                @endforeach
              </tbody>
            </table>
       
            <button class="btn btn-default" type="button" id="btnMedSupDelete" style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
          </div>
        </div>
        <div id="medicineTable"class="row"
          style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
          <h4 style="margin-bottom:5px; margin-left:5px;"> Prescribed Medicine</h4>
          <div class="table-responsive" style="width:990px;">
            <table class="table table-striped table-bordered jambo_table bulk_action" id="prescribeTable">
              <thead>
                <tr class="headings">
                  <th>
                  <input type="checkbox" id="check-all-prescribed">
                  </th>
                  <th class="column-title">Generic Name </th>
                  <th class="column-title" style="padding-right:50px;">Brand </th>
                  <th class="column-title">Quantity<br>Used </th>
                  <th class="column-title">Unit </th>
                  <th class="">Dosage</th>
                  <th class="column-title">Medication</th>
                 
                </tr>
              </thead>

              <tbody id="tbodyPrescribedMedicine">
                @foreach($prescriptionInfo as $medicine)
                  @if($medicine->isPrescribed == 1)
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" name="table_records_prescribed" value="{{ $medicine->prescriptionID }}" id="{{ $medicine->prescriptionID }}">
                    </td>
                    <td class=" ">{{ $medicine->genericName }}</td>
                    <td class=" ">{{ $medicine->brand }}</td>
                    <td class=" ">{{ $medicine->quantity }}</td>
                    <td class=" ">{{ $medicine->unit }}</td>
                    <td class=" ">{{ $medicine->dosage }}</td>
                    <td class=" ">{{ $medicine->medication }}</td>
                    
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
    
            <button class="btn btn-default" type="button" id="btnDeletePrescribed"  style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
          </div>
        </div>
@endsection