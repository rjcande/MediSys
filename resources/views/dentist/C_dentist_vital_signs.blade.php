@extends('dentist.layout.dentist')

@section('content')

	    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Vital Signs</h3>
            </div>
          </div>

            <div class="clearfix"></div>

          <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>{{Session::get('patientInfo.patientID')}} - {{Session::get('patientInfo.patientName')}}</h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                  <!-- Content -->
                  <form id="saveForm">
                   <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white); height:30px; border-radius:8px;">&nbsp<b>Vital Signs</b></p>
                   <!-- BLOOD PRESSURE -->
                   <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px; font-size: 20px">Blood Pressure: </label>
                   @php
                      if($vitalSignsInfo['bloodPressure']){
                        $bloodPressure = preg_split('#/#', $vitalSignsInfo['bloodPressure']);
                      }
                   @endphp
                   <input type="text" name="systolic" value="@if($vitalSignsInfo['bloodPressure']){{$bloodPressure[0]}}@endif" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center; margin-right: 5px;" data-parsley-max="190"data-parsley-pattern="^\d{1,3}" data-parsley-errors-container="#error-bloodPressure" data-parsley-error-message="systolic should not be greater than 190" data-parsley-group="vitalSign" >
                   <label style="font-size: 20px;">/</label>
                   <input type="text" value="@if($vitalSignsInfo['bloodPressure']){{$bloodPressure[1]}}@endif" style="border-radius:6px; width:100px; margin-left: 5px; text-align: center;" name="bloodPressureDiastolic" data-parsley-group="vitalSign"  data-parsley-max="100" data-parsley-errors-container="#error-bloodPressure" data-parsley-error-message="diastolic should not be greater than 100" data-parsley-pattern="^\d{1,3}" placeholder="diastolic"><br>
                   <div id="error-bloodPressure" >
                               
                   </div>
                   <!-- HEART RATE -->
                   <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;font-size: 20px" >Heart Rate: </label>
                   <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="{{$vitalSignsInfo['heartRate']}}" name="heartRate" data-parsley-pattern="^\d{1,3}"  data-parsley-group="vitalSign" data-parsley-errors-container="#error-heartRate"><br>
                   <div id="error-heartRate">
                     
                   </div>
                   <!-- RESPIRATORY RATE -->
                   <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;font-size: 20px">Respiratory Rate: </label>
                   <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="{{$vitalSignsInfo['respiRate']}}" name="respiratoryRate" data-parsley-pattern="^\d{1,3}" data-parsley-group="vitalSign" data-parsley-errors-container="#error-respiratoryRate"><br>
                   <div id="error-respiratoryRate">
                     
                   </div>
                   <!-- TEMPERATURE -->
                   <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;font-size: 20px">Temperature: </label>
                   <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="{{$vitalSignsInfo['temperature']}}" name="temperature" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-temperature"><br>
                   <div id="error-temperature">
                     
                   </div>
                   <!-- HEIGHT -->
                   @php
                      if($vitalSignsInfo['height']){
                        $height = preg_split('# #', $vitalSignsInfo['height']);
                      }

                    @endphp
                   <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;font-size: 20px">Height: </label>
                   <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="@if($vitalSignsInfo['height']){{ $height[0] }}@endif" name="height" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-height">
                   <select name="heightUnit" id="heightUnit" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;">
                      <option value="cm"
                      @if($vitalSignsInfo['height'])
                        @if($height[1] == 'cm')
                          {{"selected"}}
                        @endif
                      @endif>centimeters</option>
                      <option value="ft"
                      @if($vitalSignsInfo['height'])
                        @if( $height[1] == 'ft' )
                          {{"selected"}}
                        @endif
                      @endif>feet</option>
                      <option value="in"
                      @if($vitalSignsInfo['height'])
                        @if($height[1]  == 'in')
                          {{"selected"}}
                        @endif
                      @endif>inches</option>
                   </select>
                   <br>
                   <div id="error-height" >
                               
                   </div>
                   <!-- WEIGHT -->
                   @php
                      if($vitalSignsInfo['weight']){
                        $weight = preg_split('# #', $vitalSignsInfo['weight']);
                      }
                    @endphp
                   <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;font-size: 20px">Weight: </label>
                   <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="@if($vitalSignsInfo['weight']){{ $weight[0] }}@endif" name="weight" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-weight">
                   <select name="weightUnit" id="weightUnit" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;">
                      <option value="kg"
                      @if($vitalSignsInfo['weight'])
                        @if($weight[1] == 'kg')
                          {{"selected"}}
                        @endif
                      @endif>kilograms</option>
                      <option value="lb"
                      @if($vitalSignsInfo['weight'])
                        @if($weight[1] == 'lb')
                          {{"selected"}}
                        @endif
                      @endif>pounds</option> 
                   </select>
                   <br>
                   <div id="error-weight" >
                               
                   </div>
                   <!-- BODY MASS INDEX TEXTBOX -->
                   <label style="display: inline-block;width: 170px; margin-bottom:10px; margin-left: 25px;font-size: 20px">Body Mass Index: </label>
                   <input type="text" style="border-radius:6px; width:100px; margin-left: 25px; text-align: center;" value="{{$vitalSignsInfo['bmiValue']}}" name="bmi" data-parsley-pattern="[0-9]*[.,]?[0-9]+" data-parsley-group="vitalSign" data-parsley-errors-container="#error-bmi" readonly><br>
                   <div id="error-bmi">
                               
                   </div>
                   <!-- BODY MASS INDEX RANGE -->
                   <label style="display: inline-block;width: 190px; margin-bottom:10px; margin-left: 25px;font-size: 20px">BMI Range: </label>

                   <input type="radio" name ="bmiRange" value="0" data-parsley-group="vitalSign"
                   @if($vitalSignsInfo['bmiRange'] == '0')
                              {{ 'checked' }}
                   @endif>&nbsp Underweight
                   <input type="radio" name ="bmiRange" value="1" data-parsley-group="vitalSign"
                   @if($vitalSignsInfo['bmiRange'] == '1')
                              {{ 'checked' }}
                   @endif>&nbsp Normal
                   <input type="radio" name ="bmiRange" value="2" data-parsley-group="vitalSign"
                   @if($vitalSignsInfo['bmiRange'] == '2')
                              {{ 'checked' }}
                   @endif>&nbsp Overweight
                   <input type="radio" name ="bmiRange" value="3" data-parsley-group="vitalSign"
                   @if($vitalSignsInfo['bmiRange'] == '3')
                              {{ 'checked' }}
                   @endif>&nbsp Obese Class I
                   <input type="radio" name ="bmiRange" value="4" data-parsley-group="vitalSign"
                   @if($vitalSignsInfo['bmiRange'] == '4')
                              {{ 'checked' }}
                   @endif>&nbsp Obese Class II
                   <input type="radio" name ="bmiRange" value="5" data-parsley-group="vitalSign"
                   @if($vitalSignsInfo['bmiRange'] == '5')
                              {{ 'checked' }}
                   @endif>&nbsp Obese Class III

                    <div style="float:left;text-align: center;width: 100%;">
                      <button type="submit" name="btnSave" class="btn btn-success" id="btnSave">SAVE</button>
                      <a href="{{url('/dentist/DentalLog')}}"><button class="btn btn-danger" type="button">CLOSE</button></a>
                    </div>
                  </form>
                  <!-- /Content -->
                </div>
              </div>
            </div>
            <!-- /form input mask -->  
          </div>
        </div>
      </div>

<script>

   // var bloodPressureSystolic;
   // var bloodPressureDiastolic;
   // var heartRate;
   // var respiratoryRate;
   // var temperature;
   // var height
   // var weight;
   // var bmi;
   // var bmiRange;
   // var bloodPressure;

   $('#saveForm').submit(function(e){
    e.preventDefault();

      $('#saveForm').parsley().validate('vitalSign');

      if($('#saveForm').parsley().isValid('vitalSign')){

        if ($('input[name=systolic]').val() != '' && $('input[name=bloodPressureDiastolic]').val() != '') {
           var bloodPressure = $('input[name=systolic]').val() + "/" + $('input[name=bloodPressureDiastolic]').val();
          }
          else{
           var bloodPressure = '';
          }
          
         var heartRate = $('input[name=heartRate]').val();
         var respiratoryRate = $('input[name=respiratoryRate]').val();
         var temperature = $('input[name=temperature]').val();
         var height = $('input[name=height]').val() + ' ' + $('#heightUnit').val();
         var weight = $('input[name=weight]').val() + ' ' + $('#weightUnit').val();
         var bmi = $('input[name=bmi]').val();
         var bmiRange = $('input[name=bmiRange]:checked').val();

        var id = {
          _bloodPressure: bloodPressure,
          _heartRate: heartRate,
          _respiratoryRate: respiratoryRate,
          _temperature: temperature,
          _height: height,
          _weight: weight,
          _bmi: bmi,
          _bmiRange: bmiRange
        }

        console.log(id);
        // alert($('input[name=height]').val());
        
        $.ajax({
          url: '/dentist/vital/store',
          type: 'get',
          data: $('#saveForm').serialize() + "&" + $.param(id),
          success: function(output){
            swal({
              title: 'Success',
              text: 'Vital Signs Saved',
              icon: 'success',
              button: 'confirm',
            })
            .then((willRoute)=>{
              if(willRoute){
                // alert($('input[name=height]').val());
                window.location.href = "/dentist/dentalchart";
              }
            });
          }
        });
      }

   });



//Compute for the BMI
    var height;
    var weight;
    var meters;
    var kilograms;
    var bmi = 0;
    $('input[name=height]').on('keyup', function(){
      height = $('input[name=height]').val();
      computeBMI(height, weight);
    });

    $('input[name=weight]').on('keyup', function(){
      weight = $('input[name=weight]').val();
      computeBMI(height, weight);
    });
    
    function computeBMI(height, weight){
      //check the unit of height
      if ($('select[name=heightUnit]').val() == 'cm') {
          meters = height / 100;
      }
      else if ($('select[name=heightUnit]').val() == 'ft') {
          meters = height * 0.3048;
      }
      else if ($('select[name=heightUnit]').val() == 'in') {
          meters = height * 0.0254;
      }
      //check the unit of weight
      if ($('select[name=weightUnit]').val() == 'kg') {
        kilograms = weight;
      }
      else if ($('select[name=weightUnit]').val() == 'lb') {
        kilograms = weight * 0.453592;
      }

      //calculate BMI
      bmi = Math.round((kilograms / (meters * meters)) * 100) / 100;

      if (!isNaN(bmi)) {
        $('input[name=bmi]').val(bmi.toFixed(2));
      }
      
      if (bmi >= 0 && bmi <= 18.50) {
        $('input[name=bmiRange]').val([0]);
      }

      else if(bmi > 18.49 && bmi <= 24.99){
        $('input[name=bmiRange]').val([1]);
      }

      else if(bmi >= 25.00 && bmi <=29.99){
        $('input[name=bmiRange]').val([2]);
      }

      else if(bmi >=30.00 && bmi <=34.99){
        $('input[name=bmiRange]').val([3]);
      }

      else if(bmi >= 35.00 && bmi <=39.99){
        $('input[name=bmiRange]').val([4]);
      }

      else if(bmi >= 40.00){
        $('input[name=bmiRange]').val([5]);
      }
     

    }


</script>

@endsection