@extends('physician.layout.physician')

@section('content')

    <div class="right_col" role="main">
          <div class="">
          <div class="page-title">
            <div class="title_left">
                <h3>Patient Records</h3>
            </div>
        </div>

        <div class="clearfix"></div>
      
      <div class="row">
            
        <!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">

                <div>
                  @if($diagnosis)
                    <label class="col-md-10 col-sm-12 col-xs-12"><h4>{{ $diagnosis->patientID }}, <em>{{ $diagnosis->lastName }}, {{ $diagnosis->firstName }} {{ $diagnosis->middleName }} {{ $diagnosis->quantifier }}</em></h4></label>
                  @endif
              </div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
          <!--Content-->
          @if($diagnosis)
            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                  height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b>
              </p>
            </div>
            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <textarea rows="7" class="form-control" placeholder="Enter diagnosis here" style="border-radius:12px;
                  border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">{{ $diagnosis->diagnosisDescription }}</textarea>
            </div>

            <div id="prescription">
                              <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
                                  background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine</label>
                              <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%;
                                  background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply</label>
                            </div><br>

            <div id="prescription" style="float: left; width: 50%">
                              <div style="float:left; margin-left:10px; font-size:18px; width:450px;">
                                <div style="float: left;">
                                  <div style="float: left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Generic Name</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px;height: 25px;" name="medGenericName" id="medGenericName"   data-parsley-required="true" data-parsley-group="second">
                                      <option value="" disabled selected hidden>Select Generic Name</option>
                                      @foreach($medicineName as $medicine)
                                        <option value="{{ $medicine->medicineID }}">{{ $medicine->genericName }}</option>
                                      @endforeach
                                  
                                    </select><br>
                                  </div>
                                </div>

                                <div style="float: left;">
                                  <div style="float: left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Brand</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medBrand" id="medBrand" data-parsley-required="true" data-parsley-group="second" disabled>
                                      <option value="" disabled="" selected="" hidden>Select Brand</option>
                                    </select><br>
                                  </div>
                                </div>

                                <div style="float: left;">
                                  <div style="float: left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Quantity</header>
                                  </div>

                                  <div style="float: left;">
                                    <input type="number" name="medQuantity" id="medQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="second"><br>
                                  </div>
                                </div>
                                
                                <div style="float: left;">
                                  <div style="float: left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Unit</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medUnit" id="medUnit" data-parsley-required="true" data-parsley-group="second" disabled>
                                      <option value="" disabled="" selected="" hidden></option>
                                    </select><br>
                                  </div>
                                  
                                </div>

                                <div style="float: left;">
                                  <div style="float:left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Dosage</header>
                                  </div>
                                  <div style="float:left;">
                                    <input type="text" style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" data-parsley-group="second" name="dosage" id="dosage"><br>
                                  </div><br>
                                </div>

                                <div style="float: left;">
                                  <div style="float:left; width: 150px;">
                                    <header style="margin-bottom:12px; margin-left:25px;"> Medication</header>
                                  </div>
                                  <div style="float:left;">
                                    <input type="text" style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" data-parsley-group="second" name="medication" id="medication"><br>
                                  </div><br>
                                </div>

                               
                               <button type="button" class="btn btn-success" style="float: right; margin-right:13%" name="btnMedAdd" id="btnMedAdd">ADD</button>  
                              </div>  

                            </div>
            
                            <div id="prescription" style="float: left; width: 50%">
                              <div style="float:left; margin-left:10px; font-size:18px;">
                                <div style="float: left;">
                                  <div style="float: left; width: 200px;">
                                    <header style="margin-bottom:12px; margin-left:10px;"> Medical Supply Name</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppName"  id="medSuppName" data-parsley-required="true" data-parsley-group="third">
                                      <option value="" disabled="" selected="">Select Supply Name</option>
                                      @foreach($medicalSupplyList as $medicalSupply)
                                        <option value="{{ $medicalSupply->medSupID }}">{{ $medicalSupply->medSupName }}</option> 
                                      @endforeach
                                    </select><br>
                                  </div>
                                  
                                </div>

                                <div style="float: left;">
                                  <div style="float: left; width: 200px;">
                                    <header style="margin-bottom:12px; margin-left:10px;"> Brand</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppBrand" id="medSuppBrand" data-parsley-required="true" data-parsley-group="third" disabled>
                                      <option value="" disabled="" selected="">Select Brand</option>
                                 
                                    </select><br>
                                  </div>
                                  
                                </div>

                                <div style="float: left;">
                                  <div style="float: left; width: 200px;">
                                    <header style="margin-bottom:12px; margin-left:10px;"> Quantity</header>
                                  </div>

                                  <div style="float: left;">
                                    <input type="text" name="medSuppQuantity" id="medSuppQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="third"><br>
                                  </div>
                                </div>
                               
                                <div style="float: left;">
                                  <div style="float: left; width: 200px;">
                                    <header style="margin-bottom:12px; margin-left:10px;"> Unit</header>
                                  </div>

                                  <div style="float: left;">
                                    <select style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" name="medSuppUnit" id="medSuppUnit" data-parsley-required="true" data-parsley-group="third" disabled>
                                        <option value="" disabled selected></option>
                          
                                    </select><br>
                                  </div>
                                  
                                </div>
                                <button type="button" class="btn btn-success" style="float: right; margin-right:10%" id="btnSuppAdd">ADD</button>
                              </div>  
                  
                            </div>

        <div id="medicineTable"class="row"
          style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
          <h4 style="margin-bottom:5px; margin-left:5px;"> Given Medicine</h4>
          <div class="table-responsive" style="width:500px;">
            <table class="table table-striped table-bordered jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th>
                  <input type="checkbox" id="check-all" class="flat">
                  </th>
                  <th class="column-title">Generic<br>Name </th>
                  <th class="column-title" style="padding-right:50px;">Brand </th>
                  <th class="column-title">Quantity<br>Used </th>
                  <th class="column-title">Unit </th>
                  <th class="column-title">Dosage</th>
                  <th class="column-title">Medication</th>
                  <th class="column-title"></th>
                </tr>
              </thead>

              <tbody>
                @foreach($prescriptionInfo as $medicine)
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" ">{{ $medicine->genericName }}</td>
                    <td class=" ">{{ $medicine->brand }}</td>
                    <td class=" ">{{ $medicine->quantity }}</td>
                    <td class=" ">{{ $medicine->unit }}</td>
                    <td class=" ">{{ $medicine->dosage }}</td>
                    <td class=" ">{{ $medicine->medication }}</td>
                    <td class=" "><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <button class="btn btn-default"
              style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
            <button class="btn btn-default"
              style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
          </div>
        </div>

        <div id="medSupplyTable" class="row"
          style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
          <h4 style="margin-bottom:5px; margin-left:5px;"> Given Medical Supply</h4>
          <div class="table-responsive" style="width:470px;">
            <table class="table table-striped table-bordered jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th>
                  <input type="checkbox" id="check-all" class="flat">
                  </th>
                  <th class="column-title">Generic Name </th>
                  <th class="column-title" style="padding-right:50px;">Brand </th>
                  <th class="column-title">Quantity<br>Used </th>
                  <th class="column-title">Unit </th>
                  <th class="column-title"></th>
                </tr>
              </thead>

              <tbody>
                @foreach($usedMedSupply as $medSupply)
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" ">{{ $medSupply->medSupName }}</td>
                    <td class=" ">{{ $medSupply->brand }}</td>
                    <td class=" ">{{ $medSupply->quantity }}</td>
                    <td class=" ">{{ $medSupply->unit }}</td>
                    <td class=" "><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <button class="btn btn-default"
              style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
            <button class="btn btn-default"
              style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
          </div>
        </div>

        <div id="medicineTable"class="row"
          style="margin-top: 25px; margin-left: 30px;border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;float: left;margin-bottom: 10px;">
          <h4 style="margin-bottom:5px; margin-left:5px;"> Prescribed Medicine</h4>
          <div class="table-responsive" style="width:990px;">
            <table class="table table-striped table-bordered jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th>
                  <input type="checkbox" id="check-all" class="flat">
                  </th>
                  <th class="column-title">Generic Name </th>
                  <th class="column-title" style="padding-right:50px;">Brand </th>
                  <th class="column-title">Quantity<br>Used </th>
                  <th class="column-title">Unit </th>
                  <th class="">Dosage</th>
                  <th class="column-title">Medication</th>
                  <th class="column-title"></th>
                </tr>
              </thead>

              <tbody>
                @foreach($prescriptionInfo as $medicine)
                  @if($medicine->isPrescribed == 1)
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" ">{{ $medicine->genericName }}</td>
                    <td class=" ">{{ $medicine->brand }}</td>
                    <td class=" ">{{ $medicine->quantity }}</td>
                    <td class=" ">{{ $medicine->unit }}</td>
                    <td class=" ">{{ $medicine->dosage }}</td>
                    <td class=" ">{{ $medicine->medication }}</td>
                    <td class=" "><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
            <button class="btn btn-default"
              style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
            <button class="btn btn-default"
              style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
          </div>
        </div>

        <div id="recommendation" style="float:left; margin-top: 50px; width: 100%">
          <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
            height:30px; border-radius:8px;">&nbsp<b>Recommendation/s</b></p>
          <textarea rows="7" class="form-control" placeholder="Enter recommendation/s here"
            style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;">{{ $diagnosis->recommendations }}</textarea>
        </div>

        <div style="margin-top: 25px;margin-bottom: 30px;float: left;text-align: center;width: 100%">
          <button type="submit" class="btn btn-success">SAVE</button>
          <a href="{{ route('physician.patient.diagnoses', $diagnosis->patientID) }}"><button class="btn btn-primary" type="button">BACK</button></a>
        </div>

        @else
          <center><p class="alert alert-info" style="color: black">NO DIAGNOSIS AND TREATMENT FOR THIS PATIENT.</p>
          <p><a href="">Create Record</a></p></center>
          
        @endif
          <!--/Content-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
        <!-- /form input mask -->  
      </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->

@endsection