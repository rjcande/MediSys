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
                    <label class="col-md-10 col-sm-12 col-xs-12"><h4>{{ $diagnosis['patientID'] }} - <em>{{ $diagnosis['lastName'] }}, {{ $diagnosis->firstName }} {{ $diagnosis->middleName }} {{ $diagnosis['quantifier'] }}</em></h4></label>
                  @endif
              </div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
          <!--Content-->
          @if($diagnosis)
          <form id="saveForm">
          @csrf()
            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                  height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b>
              </p>
            </div>
            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <textarea rows="7" class="form-control" name="diagnosis" placeholder="Enter diagnosis here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" data-parsley-group="first" required>{{ $diagnosis->diagnosisDescription }}</textarea>
            </div>

            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                  height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b>
              </p>
              <textarea rows="7" class="form-control" name="treatment" placeholder="Enter treatment here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" data-parsley-group="first" required>{{ $diagnosis->treatmentDescription }}</textarea>
            </div>

            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                  height:30px; border-radius:8px;">&nbsp<b>Prescription and Recommendation</b>
              </p>
            </div>
            
            <div id="prescription">
              <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medicine</label>
              <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width: 45%; background: linear-gradient(to right, #192856, white); height:30px; border-radius:8px;">&nbsp Medical Supply</label>
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
                <input type="number" name="medQuantity" id="medQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="second" min='1' data-parsley-error-message="should be greater than or equal to 1"><br>
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
                <input type="text" style="width:150px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" data-parsley-group="second" name="dosage" id="dosage" data-parsley-required = "true" data-parsley-errors-container="#error-dosage" data-parsley-error-message="dosage is required">
                <select name="dosageUnit" style="width: 95px; border-radius:8px; margin-bottom:12px; 172px;height: 25px; text-align: center" id="dosageUnit" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosage">
                  <option value="mg">mg</option>
                  <option value="ml">ml</option>
                </select>
                <br>
              </div><br>
            </div>
            <br>
            <div style="float: left; width: 100%; padding-left: 150px;" id="error-dosage">
              
            </div>

          <div style="float: left;">
            <div style="float:left; width: 150px;">
                <header style="margin-bottom:12px; margin-left:25px;"> Medication</header>
            </div>
            <div style="float:left; width: 300px; font-size: 15px;">
                <header style="display: inline;">every</header>
                <input type="number" name="hrs_day" style="width: 20%; border-radius: 10px;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="hrs/day is required">
                <header style="display: inline;">hrs/day</header>
                <header style="display: inline;">for</header>
                <input type="number" name="week" style="width: 20%; border-radius: 10px; display: inline;" data-parsley-group="second" data-parsley-required = "true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="week/s is required">
                <header style="display: inline;">week/s</header>
                <br>
            </div><br><br>
          </div>
          <br>
          <div style="float: left; width: 100%; padding-left: 150px;" id="error-dosageUnit">
              
          </div>
           
          <button type="button" class="btn btn-success" style="float: right; margin-right:13%" name="btnMedAdd" id="btnMedAdd">ADD</button>  
          <button type="button" class="btn btn-default" style="float: right;" id="btnPrescribe">PRESCRIBE</button>
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
                <input type="number" name="medSuppQuantity" id="medSuppQuantity" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" data-parsley-required="true" data-parsley-group="third" min='1' data-parsley-error-message = "should be greater than or equal to 1"><br>
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
                    <input type="checkbox">
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
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox">
                    </td>
                    <td class=" ">{{ $medicine->genericName }}</td>
                    <td class=" ">{{ $medicine->brand }}</td>
                    <td class=" ">{{ $medicine->quantity }}</td>
                    <td class=" ">{{ $medicine->unit }}</td>
                    <td class=" ">{{ $medicine->dosage }}</td>
                    <td class=" ">{{ $medicine->medication }}</td>
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
                    <input type="checkbox">
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
                      <input type="checkbox">
                    </td>
                    <td class=" ">{{ $medSupply->medSupName }}</td>
                    <td class=" ">{{ $medSupply->brand }}</td>
                    <td class=" ">{{ $medSupply->quantity }}</td>
                    <td class=" ">{{ $medSupply->unit }}</td>
                   
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
                  <input type="checkbox">
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
                      <input type="checkbox">
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
            <button class="btn btn-default"
              style="float: right; background-color:#e77f67; color:white;">DELETE ALL</button>
            <button class="btn btn-default"
              style="float: right; background-color:#fdcb6e; color:white;">DELETE</button>
          </div>
        </div>

        <div id="recommendation" style="float:left; margin-top: 50px; width: 100%">
          <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
            height:30px; border-radius:8px;">&nbsp<b>Recommendation/s</b></p>
          <textarea rows="7" class="form-control" name="recommendation" placeholder="Enter recommendation/s here"
            style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" data-parsley-group="first">{{ $diagnosis->recommendations }}</textarea>
        </div>

        <div style="margin-top: 25px;margin-bottom: 30px;float: left;text-align: center;width: 100%">
          <button type="submit" class="btn btn-success" id="btnSave">SAVE</button>
          <a href="{{ URL::previous() }}"><button class="btn btn-primary" type="button">BACK</button></a>
        </div>

        @else
          <center><p class="alert alert-info" style="color: black">NO DIAGNOSIS AND TREATMENT FOR THIS PATIENT.</p>
          <p><a href="">Create Record</a></p></center>
        </form>
        @endif
          <!--/Content-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
        <!-- /form input mask -->  
      </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->
          </div>  <!--wag burahin no matter what-->

<!-- script -->
<script>
  $(document).ready(function(){
      $('#saveForm').parsley();
      //variables to use for getting the medicine
      var medicineID = new Array();
      var medicineName = '';
      var medicineBrand = '';
      var medQuantity = new Array();
      var medication = new Array();
      var dosage = new Array();
      var isPrescribed = new Array();
      var medUnit = '';
      //variables for the record of medical supply
      var medSuppID = new Array();
      var medSuppName = '';
      var medSuppBrand = '';
      var medSuppQuantity = new Array();
      var _idMedSuppBrand = new Array();
      var medUnit = '';


      //On change of Medicine Name
      $('#medGenericName').on('change', function(e){
          var mName = $(this).find("option:selected").text();
          $.get('/get/med/brand?mName=' + mName, function(data){
            console.log(data);
            $('#medBrand').empty();
            $('#medUnit').empty();
            $('#medBrand').prop('disabled', false);

            $('#medBrand').append('<option value="" disabled selected hidden>Select Brand</option>');
            $.each(data, function(index, brandObj){
              $('#medBrand').append('<option value="'+ brandObj.medicineID +'">'+brandObj.brand+'</option>');
            });
          });      
      });

      //On change of Med Brand
      $('#medBrand').on('change', function(){
          var mbrand = $(this).find("option:selected").text();
          var mName = $('#medGenericName').find("option:selected").text();
          $.get('/get/med/unit?mName=' + mName + "&mBrand=" + mbrand, function(data){
            console.log(data);
            $('#medUnit').prop('disabled', false);
            $('#medUnit').empty();
            $('#medUnit').append('<option value="'+ data[0]['medicineID'] +'">'+data[0]['unit']+'</option>')
          });      
      });

      //On change of Medical Supply Name
      $('#medSuppName').on('change', function(e){
          var mName = $(this).find("option:selected").text();
          $.get('/get/medSupp/brand?mName=' + mName, function(data){
            $('#medSuppBrand').empty();
            $('#medSuppUnit').empty();
            $('#medSuppBrand').prop('disabled', false);

            $('#medSuppBrand').append('<option value="" disabled selected hidden>Select Brand</option>');
            $.each(data, function(index, brandObj){
              $('#medSuppBrand').append('<option value="'+ brandObj.medSupID +'">'+brandObj.brand+'</option>');
            });
          });      
      });

      //On change of Medical Supply Name
      $('#medSuppBrand').on('change', function(e){
          var mBrand = $(this).find("option:selected").text();
          var mName = $('#medSuppName').find("option:selected").text();
          $.get('/get/medSupp/unit?mName=' + mName + "&mBrand=" + mBrand, function(data){
        
            $('#medSuppUnit').prop('disabled', false);
            $('#medSuppUnit').append('<option value="'+data[0].medSupID+'">'+data[0].unit+'</option>');
            
          });      
      });

      //Validation For adding Medicine
      $('#btnMedAdd').on('click', function(e){
        e.preventDefault();

        $('#saveForm').parsley().validate('second');

        if ($('#saveForm').parsley().isValid('second')) {

            medicineName = $('#medGenericName option:selected').text();
            medicineBrand = $('#medBrand option:selected').text();
            medicineID[medicineID.length] = $('#medBrand').val();
            medQuantity[medQuantity.length] = $('#medQuantity').val();
            medication[medication.length] ="Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ";
            dosage[dosage.length] = $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val();
            isPrescribed[isPrescribed.length] = 0;
            medUnit = $('#medUnit').text();

            var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medicineName+"</td><td class=' '>"+medicineBrand+"</td><td class=' '>"+medQuantity[medQuantity.length-1]+"</td><td class=' last'>"+medUnit+"</td><td class=''>"+dosage[dosage.length-1]+"</td><td class=''>"+medication[medication.length-1]+"</td></tr>"; 

          $(tr).prependTo('#tbodyMedicine');

          //Reset Med Fields
          $('select[name=medGenericName]').prop('selectedIndex', 0);
          $('select[name=medBrand]').prop('selectedIndex', 0);
          $('select[name=medUnit]').prop('selectedIndex', 0);
          $('select[name=medBrand]').prop('disabled', true);
          $('select[name=medUnit]').prop('disabled', true);
          $('input[name=medQuantity]').val(this.defaultValue);
          $('input[name=medication]').val(this.defaultValue);
          $('#dosage').val(this.defaultValue);
          $('input[name=hrs_day]').val(this.defaultValue);
          $('input[name=week]').val(this.defaultValue);
        }

      });

      //On click of Prescribe
      $('#btnPrescribe').on('click', function(e){
        e.preventDefault();

        $('#saveForm').parsley().validate('second');

        if ($('#saveForm').parsley().isValid('second')) {

            medicineName = $('#medGenericName option:selected').text();
            medicineBrand = $('#medBrand option:selected').text();
            medicineID[medicineID.length] = $('#medBrand').val();
            medQuantity[medQuantity.length] = $('#medQuantity').val();
            medication[medication.length] ="Every " + $('input[name=hrs_day]').val() + " hour/s a day for " + $('input[name=week]').val() + " week/s ";
            dosage[dosage.length] = $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val();
            medUnit = $('#medUnit').text();
            isPrescribed[isPrescribed.length] = 1;

            var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medicineName+"</td><td class=' '>"+medicineBrand+"</td><td class=' '>"+medQuantity[medQuantity.length-1]+"</td><td class=' last'>"+medUnit+"</td><td class=''>"+dosage[dosage.length-1]+"</td><td class=''>"+medication[medication.length-1]+"</td></tr>"; 

          $(tr).prependTo('#tbodyPrescribedMedicine');

          //Reset Med Fields
          $('select[name=medGenericName]').prop('selectedIndex', 0);
          $('select[name=medBrand]').prop('selectedIndex', 0);
          $('select[name=medUnit]').prop('selectedIndex', 0);
          $('select[name=medBrand]').prop('disabled', true);
          $('select[name=medUnit]').prop('disabled', true);
          $('input[name=medQuantity]').val(this.defaultValue);
          $('input[name=medication]').val(this.defaultValue);
          $('#dosage').val(this.defaultValue);
          $('input[name=hrs_day]').val(this.defaultValue);
          $('input[name=week]').val(this.defaultValue);
        }

      });

      $('#btnSuppAdd').click(function(event){
          event.preventDefault();

          // Validate all Medical Supply fields.
          $('#saveForm').parsley().validate('third');
          
          if ($('#saveForm').parsley().isValid('third')) {
            var medSuppName = $('select[name=medSuppName] option:selected').text();
            var _idMedSuppName = $('select[name=medSuppName]').val();
            var medSuppBrand = $('select[name=medSuppBrand] option:selected').text();
            _idMedSuppBrand[_idMedSuppBrand.length] = $('select[name=medSuppBrand]').val();
            medSuppQuantity[medSuppQuantity.length] = $('input[name=medSuppQuantity]').val();
            var medSuppUnit = $('select[name=medSuppUnit] option:selected').text();
            var _idMedSuppUnit = $('select[name=medSuppUnit]').val();

            var tr = "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+medSuppName+"</td><td class=' '>"+medSuppBrand+"</td><td class=' '>"+medSuppQuantity[medSuppQuantity.length-1]+"</td><td class=' last'>"+medSuppUnit+"</td></tr>";

            $(tr).prependTo("#tbodyMedicalSupply");

            //Reset Medical Supply Fields
            $('select[name=medSuppName]').prop('selectedIndex', 0);
            $('select[name=medSuppBrand]').prop('selectedIndex', 0);
            $('select[name=medSuppUnit]').prop('selectedIndex', 0);
            $('select[name=medSuppBrand]').prop('disabled', true);
            $('select[name=medSuppUnit]').prop('disabled', true);
            $('input[name=medSuppQuantity]').val(this.defaultValue);
       

          }
      });

      //on form submit
      $('#btnSave').click(function(e){
        e.preventDefault();
        $('#saveForm').parsley().validate('first');

        if ($('#saveForm').parsley().isValid('first')) {
          var data = {
              medicineID: medicineID,
              medQuantity: medQuantity,
              medication: medication,
              medSuppID: _idMedSuppBrand,
              medSuppQuantity: medSuppQuantity,
              isPrescribed: isPrescribed,
              dosage: dosage
          };
          //console.log($('#saveForm').serialize() + '&' + $.param(data));
          $.ajax({
            url: '/physician/referred/patient/diagnoses/edit/' + '{{ $diagnosis["clinicLogID"] }}',
            type: 'get',
            data: $('#saveForm').serialize() + '&' + $.param(data),
            success: function(output){
              swal({
                title:'SUCCESS',
                icon: 'success'
              })
              .then((value)=>{
                window.location.href = '/physician/referred/patient/diagnoses/' + '{{ $diagnosis["patientID"] }}';
              });
            }
          });
        }

      });
    
  });
</script>
@endsection