@extends('chief.layout.chief')

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
           <div id="symptoms" style="float:left; margin-top: 10px; width: 100%">
              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                  height:30px; border-radius:8px;">&nbsp<b>Symptoms</b>
              </p>
            </div>
            <div id="symptoms" style="float:left; margin-top: 10px; margin-bottom: 25px; width: 100%">
              <textarea rows="7" class="form-control" name="symptoms" placeholder="Enter symptoms here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;" data-parsley-group="first" required>{{ $diagnosis->symptoms }}</textarea>
            </div>

            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                  height:30px; border-radius:8px;">&nbsp<b>Diagnosis</b>
              </p>
            </div>
            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <textarea rows="7" class="form-control" name="diagnosis" placeholder="Enter diagnosis here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px;  margin-bottom: 25px; width: 95%;" data-parsley-group="first" required>{{ $diagnosis->diagnosisDescription }}</textarea>
            </div>

            <div id="diagnosis" style="float:left; margin-top: 10px; width: 100%">
              <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                  height:30px; border-radius:8px;">&nbsp<b>Treatment Done</b>
              </p>
              <textarea rows="7" class="form-control" name="treatment" placeholder="Enter treatment here" style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; margin-bottom: 25px; width: 95%;" data-parsley-group="first" required>{{ $diagnosis->treatmentDescription }}</textarea>
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
                <input type="text" style="width:250px; border-radius:8px; margin-bottom:12px; 172px;height: 25px;" data-parsley-group="second" name="medication" id="medication" data-parsley-required ="true" data-parsley-errors-container="#error-dosageUnit" data-parsley-error-message="Medication is required">
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
      var isPrescribed_other = new Array();
      var medUnit = '';
      var array_med = {};
      var array_supp = {};
      var array_med_prescribed = {};
      var ctr = 0;
      var ctr_supp = 0;
      var ctr_prescribed = 0;
      //variables for the record of medical supply
      var medSuppID = new Array();
      var medSuppName = '';
      var medSuppBrand = '';
      var medSuppQuantity = new Array();
      var _idMedSuppBrand = new Array();
      var medUnit = '';
     //checkbox Medicine and Medical Supply
     //selected medicine
    var checkBoxMedID = new Array();
    var checkBoxMedSupID = new Array();
    var checkboxPrescribedID = new Array();

    $('[name=table_records_prescribed]').on('change', function(){
        checkboxPrescribedID[checkboxPrescribedID.length] = $(this).val();
    });

    $('[name=table_records_medicine]').on('change', function(){
        checkBoxMedID[checkBoxMedID.length] = $(this).val();
    });

    $('[name=table_records_medSupp]').on('change', function(){
        checkBoxMedSupID[checkBoxMedSupID.length] = $(this).val();
    }); 

    var $selectAll = $('#check-all'); // main checkbox inside table thead
    var $table = $('#medTable'); // table selector 
    var $tdCheckbox = $table.find('tbody input:checkbox'); // checkboxes inside table body
    var $tdCheckboxChecked = []; // checked checbox arr

    //Select or deselect all checkboxes on main checkbox change
    $selectAll.on('click', function () {
        $tdCheckbox.prop('checked', this.checked).change();
    });

    //Switch main checkbox state to checked when all checkboxes inside tbody tag is checked
    $tdCheckbox.on('change', function(){
        $tdCheckboxChecked = $table.find('tbody input:checkbox:checked');//Collect all checked checkboxes from tbody tag
        //if length of already checked checkboxes inside tbody tag is the same as all tbody checkboxes length, then set property of main checkbox to "true", else set to "false"
        $selectAll.prop('checked', ($tdCheckboxChecked.length == $tdCheckbox.length));
    })



    var $selectAllSupp = $('#check-all-supp'); // main checkbox inside table thead
    var $tableSupp = $('#suppTable'); // table selector 
    var $tdCheckboxSupp = $tableSupp.find('tbody input:checkbox'); // checkboxes inside table body
    var $tdCheckboxCheckedSupp = []; // checked checbox arr

    //Select or deselect all checkboxes on main checkbox change
    $selectAllSupp.on('click', function () {
        $tdCheckboxSupp.prop('checked', this.checked).change();
    });

    //Switch main checkbox state to checked when all checkboxes inside tbody tag is checked
    $tdCheckboxSupp.on('change', function(){
        $tdCheckboxCheckedSupp = $tableSupp.find('tbody input:checkbox:checked');//Collect all checked checkboxes from tbody tag
        //if length of already checked checkboxes inside tbody tag is the same as all tbody checkboxes length, then set property of main checkbox to "true", else set to "false"
        $selectAllSupp.prop('checked', ($tdCheckboxCheckedSupp.length == $tdCheckboxSupp.length));
    })

    var $selectAllPrescribed = $('#check-all-prescribed'); // main checkbox inside table thead
    var $tablePrescribed = $('#prescribeTable'); // table selector 
    var $tdCheckboxPrescribed = $tablePrescribed.find('tbody input:checkbox'); // checkboxes inside table body
    var $tdCheckboxCheckedPrescribed = []; // checked checbox arr

    //Select or deselect all checkboxes on main checkbox change
    $selectAllPrescribed.on('click', function () {
        $tdCheckboxPrescribed.prop('checked', this.checked).change();
    });

    //Switch main checkbox state to checked when all checkboxes inside tbody tag is checked
    $tdCheckboxPrescribed.on('change', function(){
        $tdCheckboxCheckedPrescribed = $tablePrescribed.find('tbody input:checkbox:checked');//Collect all checked checkboxes from tbody tag
        //if length of already checked checkboxes inside tbody tag is the same as all tbody checkboxes length, then set property of main checkbox to "true", else set to "false"
        $selectAllPrescribed.prop('checked', ($tdCheckboxCheckedPrescribed.length == $tdCheckboxPrescribed.length));
    })

    //If Medical button delete is clicked
    $('#btnMedSupDelete').on('click', function(e){
        swal({
          title: "DELETE",
          text: "Are  you sure you want to delete this?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
            $.ajax({
              url: '/nurse/delete/medical/supply',
              type: 'get',
              data: {medSupID: checkBoxMedSupID},
              success:function(output){
                 swal("Successfully deleted!", {
                    icon: "success",
                })
                 .then((value)=>{
                    $('table tr').has('input[name="table_records_medSupp"]:checked').remove();

                 });
              }
            });
           
          }
        });
    });



    //If Medicine button delete is clicked
    $('#btnDeleteMed').on('click', function(e){
        swal({
          title: "DELETE",
          text: "Are you sure you want to delete this?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
            $.ajax({
              url: '/nurse/delete/medicine',
              type: 'get',
              data: {medicineID: checkBoxMedID},
              success:function(output){
                 swal("Successfully deleted!", {
                    icon: "success",
                })
                 .then((value)=>{
                    $('table tr').has('input[name="table_records_medicine"]:checked').remove();

                 });
              }
            });
           
          }
        });
    });

    //If Medicine button delete is clicked
    $('#btnDeletePrescribed').on('click', function(e){
        swal({
          title: "DELETE",
          text: "Are you sure you want to delete this?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
            $.ajax({
              url: '/nurse/delete/medicine',
              type: 'get',
              data: {medicineID: checkboxPrescribedID},
              success:function(output){
                 swal("Successfully deleted!", {
                    icon: "success",
                })
                 .then((value)=>{
                    $('table tr').has('input[name="table_records_prescribed"]:checked').remove();

                 });
              }
            });
           
          }
        });
    });

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
            $('#medUnit').append('<option value="'+ data[0]['medicineID'] +'">'+data[0]['unit']+'</option>');
            var str = data[0]['dosage'];
            var splitted = str.split(" ");
            $('#dosage').val(splitted[0]);
            if (splitted[1] == "mg") {
              $('#dosageUnit').val("mg");
              $('#dosageUnit').prop('disabled', true);
            }
            else if(splitted[1] == "ml"){
              $('#dosageUnit').val("ml");
              $('#dosageUnit').prop('disabled', true);
            }
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

      //On click of Medicine Add
     $('#btnMedAdd').click( function(event) {
          event.preventDefault();
          
          // Validate all Medicine fields.
          $('#saveForm').parsley().validate('second');     
          if ($('#saveForm').parsley().isValid('second')) {
            
            if (Object.keys(array_med).length == 0) {
                isPrescribed[isPrescribed.length] = 0;
                array_med[ctr] = {
                    medicineGenericName: $('select[name=medGenericName] option:selected').text(),
                    medicineBrand: $('select[name=medBrand] option:selected').text(),
                    medicineUnit: $('select[name=medUnit] option:selected').text(),
                    medicineMedication: $('#medication').val(),
                    medicineDosage: $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val(),
                    medicineID:  $('select[name=medBrand]').val(),
                    medicineQuantity: $('input[name=medQuantity]').val(),
                };
                removeItems();
                displayTableRow();
            }
            else{
                var isEqual = false;
                var key;
                for (var i = 0; i < Object.keys(array_med).length; i++) {
                
                    if (array_med[i].medicineID == $('select[name=medBrand]').val() && array_med[i].medicineMedication == $('#medication').val() && array_med[i].medicineDosage == $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val()) {
                        isEqual = true;
                        key = i;
                    }
                    
                }
 
                if (isEqual == true) {
                  array_med[key].medicineQuantity = parseInt(array_med[key].medicineQuantity) + parseInt($('input[name=medQuantity]').val());
                  removeItems();
                  displayTableRow();
                }
                else if(isEqual == false){
                  ctr++;
                  isPrescribed[isPrescribed.length] = 0;
                  array_med[ctr] = {
                      medicineGenericName: $('select[name=medGenericName] option:selected').text(),
                      medicineBrand: $('select[name=medBrand] option:selected').text(),
                      medicineUnit: $('select[name=medUnit] option:selected').text(),
                      medicineMedication: $('#medication').val(),
                      medicineDosage: $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val(),
                      medicineID:  $('select[name=medBrand]').val(),
                      medicineQuantity: $('input[name=medQuantity]').val()
                  };
                  removeItems();
                  displayTableRow();
                }

            }      
            resetFields();
            console.log(Object.keys(array_med).length);
            console.log(array_med);
          }
          else{
            return false
          }
        });

        function removeItems(){
          $('#tbodyMedicine .delete-row').remove();
        }
        
        function displayTableRow(){
            for (var i = 0; i < Object.keys(array_med).length; i++) {

                var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+array_med[i].medicineGenericName+"</td><td class=' '>"+array_med[i].medicineBrand+"</td><td class=' '>"+array_med[i].medicineQuantity+"</td><td class=' '>"+array_med[i].medicineUnit+"</td><td>"+array_med[i].medicineDosage+"</td><td>"+array_med[i].medicineMedication+"</td></tr>";

                $(tr).prependTo('#tbodyMedicine');

            }
        }

        function resetFields(){
            $('select[name=medGenericName]').prop('selectedIndex', 0);
            $('select[name=medBrand]').prop('selectedIndex', 0);
            $('select[name=medUnit]').prop('selectedIndex', 0);
            $('select[name=medBrand]').prop('disabled', true);
            $('select[name=medUnit]').prop('disabled', true);
            $('input[name=medQuantity]').val(this.defaultValue);
            $('input[name=medication]').val(this.defaultValue);
            $('input[name=dosage]').val(this.defaultValue);
            $('input[name=hrs_day]').val(this.defaultValue);
            $('input[name=week]').val(this.defaultValue);
        }

    //On click of Prescribe
    $('#btnPrescribe').on('click', function(e){
      e.preventDefault();
      // Validate all Medicine fields.
          $('#saveForm').parsley().validate('second');     
          if ($('#saveForm').parsley().isValid('second')) {
            
            if (Object.keys(array_med_prescribed).length == 0) {
                isPrescribed_other[isPrescribed_other.length] = 1;
                array_med_prescribed[ctr_prescribed] = {
                    medicineGenericName: $('select[name=medGenericName] option:selected').text(),
                    medicineBrand: $('select[name=medBrand] option:selected').text(),
                    medicineUnit: $('select[name=medUnit] option:selected').text(),
                    medicineMedication: $('#medication').val(),
                    medicineDosage: $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val(),
                    medicineID:  $('select[name=medBrand]').val(),
                    medicineQuantity: $('input[name=medQuantity]').val(),
                };
                removeItemsPrescribe();
                displayTableRowPrescribed();
            }
            else{
                var isEqual = false;
                var key;
                for (var i = 0; i < Object.keys(array_med_prescribed).length; i++) {
                
                    if (array_med_prescribed[i].medicineID == $('select[name=medBrand]').val() && array_med_prescribed[i].medicineMedication == $('#medication').val() && array_med_prescribed[i].medicineDosage == $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val()) {
                        isEqual = true;
                        key = i;
                    }
                
                }

                if (isEqual == true) {
                  array_med_prescribed[key].medicineQuantity = parseInt(array_med_prescribed[key].medicineQuantity) + parseInt($('input[name=medQuantity]').val());
                  removeItemsPrescribe();
                  displayTableRowPrescribed();
                }
                else if(isEqual == false){
                  ctr_prescribed++;
                  isPrescribed_other[isPrescribed_other.length] = 1;
                  array_med_prescribed[ctr_prescribed] = {
                      medicineGenericName: $('select[name=medGenericName] option:selected').text(),
                      medicineBrand: $('select[name=medBrand] option:selected').text(),
                      medicineUnit: $('select[name=medUnit] option:selected').text(),
                      medicineMedication: $('#medication').val(),
                      medicineDosage: $('input[name=dosage]').val() + " " + $('#dosageUnit option:selected').val(),
                      medicineID:  $('select[name=medBrand]').val(),
                      medicineQuantity: $('input[name=medQuantity]').val()
                  };
                  removeItemsPrescribe();
                  displayTableRowPrescribed();
                }

            }      
            resetFields();
            
          }
          else{
            return false
          }

    });
    function removeItemsPrescribe(){
      $('#tbodyPrescribedMedicine .delete-row').remove();
    }
    function displayTableRowPrescribed(){
        for (var i = 0; i < Object.keys(array_med_prescribed).length; i++) {

            var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+array_med_prescribed[i].medicineGenericName+"</td><td class=' '>"+array_med_prescribed[i].medicineBrand+"</td><td class=' '>"+array_med_prescribed[i].medicineQuantity+"</td><td class=' '>"+array_med_prescribed[i].medicineUnit+"</td><td>"+array_med_prescribed[i].medicineDosage+"</td><td>"+array_med_prescribed[i].medicineMedication+"</td></tr>";

            $(tr).prependTo('#tbodyPrescribedMedicine');

        }
    }

   //variables for the record of medical supply
    var medSuppID = new Array();
    var medSuppName = '';
    var medSuppBrand = '';
    var medSuppQuantity = new Array();
    var medUnit = '';
    $('#btnSuppAdd').click(function(event){
          event.preventDefault();
          // Validate all Medical Supply fields.
          $('#saveForm').parsley().validate('third');
          
          if ($('#saveForm').parsley().isValid('third')) {

            if (Object.keys(array_supp).length == 0) {
                array_supp[ctr_supp] = {
                    suppGenericName: $('select[name=medSuppName] option:selected').text(),
                    suppBrand: $('select[name=medSuppBrand] option:selected').text(),
                    suppUnit: $('select[name=medSuppUnit] option:selected').text(),
                    suppID:  $('select[name=medSuppBrand]').val(),
                    suppQuantity: $('input[name=medSuppQuantity]').val()
                };
                removeItemsSupp();
                displayTableRowSupp();
            }
            else{
                var isEqual = false;
                var key;
                for (var i = 0; i < Object.keys(array_supp).length; i++) {
                
                    if (array_supp[i].suppID == $('select[name=medSuppBrand]').val()) {
                        isEqual = true;
                        key = i;
                    }
                    
                }

                if (isEqual == true) {
                  array_supp[key].suppQuantity = parseInt(array_supp[key].suppQuantity) + parseInt($('input[name=medSuppQuantity]').val());
                  removeItemsSupp();
                  displayTableRowSupp();
                }
                else if(isEqual == false){
                  ctr_supp++;
                  array_supp[ctr_supp] = {
                    suppGenericName: $('select[name=medSuppName] option:selected').text(),
                    suppBrand: $('select[name=medSuppBrand] option:selected').text(),
                    suppUnit: $('select[name=medSuppUnit] option:selected').text(),
                    suppID:  $('select[name=medSuppBrand]').val(),
                    suppQuantity: $('input[name=medSuppQuantity]').val()
                  };
                  removeItemsSupp();
                  displayTableRowSupp();
                }

            }

            //Reset Medical Supply Fields
            resetSuppFields();
       
          }
    });
    function removeItemsSupp(){
      $('#tbodyMedicalSupply .delete-row').remove();
    }
    function displayTableRowSupp(){
      for (var i = 0; i < Object.keys(array_supp).length; i++) {

                var tr = "<tr class='even pointer delete-row'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td><td class=' '>"+array_supp[i].suppGenericName+"</td><td class=' '>"+array_supp[i].suppBrand+"</td><td class=' '>"+array_supp[i].suppQuantity+"</td><td class=' '>"+array_supp[i].suppUnit+"</td>";

                $(tr).prependTo('#tbodyMedicalSupply');
                console.log(array_supp);

      }
    }

    function resetSuppFields(){
      $('select[name=medSuppName]').prop('selectedIndex', 0);
      $('select[name=medSuppBrand]').prop('selectedIndex', 0);
      $('select[name=medSuppUnit]').prop('selectedIndex', 0);
      $('select[name=medSuppBrand]').prop('disabled', true);
      $('select[name=medSuppUnit]').prop('disabled', true);
      $('input[name=medSuppQuantity]').val(this.defaultValue);
    }

      //on form submit
      $('#btnSave').click(function(e){
        e.preventDefault();
        $('#saveForm').parsley().validate('first');

        if ($('#saveForm').parsley().isValid('first')) {
          var data = {
              _medArray: array_med,
              _suppArray: array_supp,
              _medPrescribedArray: array_med_prescribed,
              isPrescribed: isPrescribed,
              isPrescribed_other: isPrescribed_other,
          };
         // console.log($.param(data));
          $.ajax({
            url: '/mchief/referred/patient/diagnoses/edit/' + '{{ $diagnosis["clinicLogID"] }}',
            type: 'get',
            data: $('#saveForm').serialize() + '&' + $.param(data),
            success: function(output){
              swal({
                title:'SUCCESS',
                icon: 'success'
              })
              .then((value)=>{
                window.location.href = '/mchief/referred/patient/diagnoses/' + '{{ $diagnosis["patientID"] }}';
              });
            }
          });
        }

      });
    
  });
</script>
@endsection