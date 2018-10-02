@extends('chief.layout.chief')

@section('content')

        <div class="right_col" role="main">
            <div class="">
            <div class="page-title">
            <div class="title_left">
                <h3>Consultations (Patient Records)</h3>
            </div>
        </div>

        <div class="clearfix"></div>
            
            <div class="row">
            
        <!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $patient['patientID'] }} - {{ $patient['lastName'] }}, {{ $patient['firstName'] }} {{ $patient['middleName'] }} {{ $patient['quantifier'] }}</h2>                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <!--Content-->
            <div id="diagnoses-referrals" style="float:left; margin-top:10px; margin-left:20px; width:98%">
                <p style="font-size: 20px; color:white; background:
                    linear-gradient(to right, #d63031, white); height:30px; border-radius:8px;">&nbsp<b>Diagnoses and Referrals</b>
                </p>
                
                <div style="float:left;margin-top: 10px; margin-left: 15px;width:98%;padding:5px;
                    border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2);
                    transition: all 200ms ease-out;background-color:white;">
                    <table class="table table-striped table-bordered jambo_table bulk_action" style="width:100%">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">Date </th>
                                    <th class="column-title">Time</th>
                                    <th class="column-title">Assisting Nurse</th>
                                    <th class="column-title">Attending Physician</th>
                                    <th class="column-title">Vital Signs</th>
                                    <th class="column-title" style="width:20%;">Diagnosis & Treatment</th>
                                    <th class="column-title">Referral</th>
                                    <th class="column-title" style="width:1%;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               @foreach($clinicLogs as $clinicLog)
                                  @if($clinicLog->symptoms != '')
                                    <tr class="even pointer">
                                        <td class=" ">{{ date('F d, Y', strtotime($clinicLog->clinicLogDateTime)) }}</td>
                                        <td class=" ">{{ date('h:i a', strtotime($clinicLog->clinicLogDateTime)) }}</td>
                                        <td class=" ">
                                            {{ $clinicLog->lastName }}, {{ $clinicLog->firstName }} {{ $clinicLog->middleName }} {{ $clinicLog->quantifier }}
                                        </td>
                                        <td class=" ">
                                            @foreach($attendingPhysicians as $physician)
                                                @if($physician->id == $clinicLog->physicianID)
                                                    {{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }} 
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class=" " style="text-align:center;">
                                            @foreach($vitalSigns as $vitalSign)
                                                @if($vitalSign->clinicLogID == $clinicLog->clinicLogID)
                                                    <button class="btn btn-default"
                                                data-toggle="modal" data-target="#modalVitalSigns" data-bp="{{ $vitalSign->bloodPressure }}" data-hr="{{ $vitalSign->heartRate }}" data-rr="{{ $vitalSign->respiRate }}" data-tmprtr="{{ $vitalSign->temperature }}" data-h="{{ $vitalSign->height }}" data-w="{{ $vitalSign->weight }}" data-bmi="{{ $vitalSign->bmiValue }}" data-bmirange="{{ $vitalSign->bmiRange }}" style="background-color:#9AECDB; width:70%;">View
                                                    </button>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class=" " style="text-align:center;">
                                            <a href="{{ route('mchief.referred.patient.diagnosis', $clinicLog->clinicLogID) }}">
                                                <button class="btn btn-default"
                                                    style="background-color:#9AECDB; width:70%;">View
                                                </button>
                                            </a>
                                        </td>
                                        <td class=" " style="text-align: center;">
                                            <a href="{{ route('mchief.referred.patient.referrals', $clinicLog->clinicLogID) }}">
                                                <button class="btn btn-default"
                                                    style="background-color:#9AECDB;">View
                                                </button>
                                            </a>
                                        </td>
                                        <td class=" " style="width: 120px;">
                                            <button class="btn btn-danger btn-delete" type="button" data-id="{{ $clinicLog->logReferralID }}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                 @endif
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="diagnoses-referrals" style="float:left; margin-top:5%; margin-left:20px; width:98%">
                    <p style="font-size: 20px; color:white; background:
                        linear-gradient(to right, #d63031, white); height:30px; border-radius:8px;">&nbsp<b>Medical Certifications</b>
                    </p>

                    <div style="float: right; margin-right: 1%; margin-top: 1%;">

                        <select style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                            <option value="" disabled="" selected="">Filter</option>
                            <option>None</option>
                            <option>Medical Certificate for Enrollment</option>
                            <option>Medical Certificate for OJT or Off-Campus Activity</option>
                            <option>Medical Certificate for Administrative or Faculty </option>
                            <option>Excuse Letter for Student </option>
                            <option>Waiver</option>
                        </select>
                    </div>

                    <div style="float:left;margin-top: 10px; margin-left: 15px;width:98%;padding:5px; border:2px solid #dd; border-radius: 3px; box-shadow: 0 0 0 2px rgba(0,0,0,0.2); transition: all 200ms ease-out;background-color:white;">
                        <table class="table table-striped table-bordered jambo_table bulk_action" style="width:100%">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">Date </th>
                                    <th class="column-title">Time</th>
                                    <th class="column-title">Assisting Nurse</th>
                                    <th class="column-title">Attending Physician</th>
                                    <th class="column-title">Medical Certificate</th>
                                    <th class="column-title" style="width:1%;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               @foreach($certifications as $certificate)
                                    <tr class="even pointer">
                                        <td class=" ">{{ date('F d, Y', strtotime($certificate->clinicLogDateTime)) }}</td>
                                        <td class=" ">{{ date('h:i a', strtotime($certificate->clinicLogDateTime)) }}</td>
                                        <td class=" ">
                                            {{ $certificate->lastName }}, {{ $certificate->firstName }} {{ $certificate->middleName }} {{ $certificate->quantifier }}
                                        </td>
                                        <td class=" ">
                                            @foreach($attendingPhysicians as $physician)
                                                @if($physician->id == $certificate->physicianID)
                                                    {{ $physician->lastName }}, {{ $physician->firstName }} {{ $physician->middleName }} {{ $physician->quantifier }} 
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class=" ">
                                            <ul>
                                                @if($certificate->reqForMedCertEnrol == '1')
                                                    <li>
                                                        <p>{{ "Medical Certificate for Enrollment" }}</p>
                                                    </li>
                                                @endif
                                                @if($certificate->reqForMedCertOffOJT == '1')
                                                    <li>
                                                        <p>{{ "Medical Certificate for OJT or Off-Campus Activity" }}</p>
                                                    </li>
                                                @endif
                                                @if($certificate->reqForMedCertAdminFaculty == '1')
                                                    <li>
                                                        <p>{{ "Medical Certificate for Administrative or Faculty" }}</p>
                                                    </li>
                                                @endif
                                                @if($certificate->reqForWaver == '1')
                                                    <li>
                                                        <p>{{ "Waiver" }}</p>
                                                    </li>
                                                @endif
                                                @if($certificate->reqForExcuseLetter == '1')
                                                    <li>
                                                        <p>{{ "Excuse Letter for Student" }}</p>
                                                    </li>
                                                @endif
                                            </ul>
                                        </td>
                                        <td class=" " style="width: 120px;">
                                            <button class="btn btn-danger  btn-delete-cert" data-id="{{ $certificate->logReferralID }}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div style="float: left;width: 100%;margin-top: 25px;text-align: right;">
                    <a href="{{ url('/mchief/patient/record') }}">
                        <button class="btn btn-primary">BACK</button>
                    </a>
                </div>
            </div>
            <!--/Content-->
            </div>  <!--wag burahin no matter what-->
            </div>  <!--wag burahin no matter what-->
            </div>  <!--wag burahin no matter what-->
        <!-- /form input mask -->  
            </div>  <!--wag burahin no matter what-->
            </div>  <!--wag burahin no matter what-->
            </div>  <!--wag burahin no matter what-->

<!-- MODAL -->
    <div id="modalVitalSigns" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:680px">
        <!-- Modal content -->
            <div class="modal-content" style="background-color: #f7f1e3">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss = "modal">&times;</button>
                        <h4 class="modal-title">Vital Signs</h4>
                </div>
                <div class="modal-body" style="color:#192a56; font-size:15px;">
                    <label style="display: inline-block;width: 170px; margin-bottom:10px;">Blood Pressure: </label>
                    <input type="text" name="bloodPressure" style="border-radius:6px; width:455px;"><br>
                    <label style="display: inline-block;width: 170px; margin-bottom:10px;">Heart Rate: </label>
                    <input type="text" name="heartRate" style="border-radius:6px; width:455px;"><br>
                    <label style="display: inline-block;width: 170px; margin-bottom:10px;">Respiratory Rate: </label>
                    <input type="text" name="respiratoryRate" style="border-radius:6px; width:455px;"><br>
                    <label style="display: inline-block;width: 170px; margin-bottom:10px;">Temperature: </label>
                    <input type="text" name="temperature" style="border-radius:6px; width:455px;"><br>
                    <label style="display: inline-block;width: 170px; margin-bottom:10px;">Height (cm): </label>
                    <input type="text" name="height" style="border-radius:6px; width:455px;"><br>
                    <label style="display: inline-block;width: 170px; margin-bottom:10px;">Weight (kg): </label>
                    <input type="text" name="weight" style="border-radius:6px; width:455px;"><br>
                    <label style="display: inline-block;width: 170px; margin-bottom:10px;">Body Mass Index: </label>
                    <input type="text" name="bmi" style="border-radius:6px; width:455px;"><br>
                    <label style="display: inline-block;width: 170px; margin-bottom:10px;">BMI Range: </label>
                    <input type="radio" name ="bmi_range" value="0" data-parsley-group="vitalSign">&nbsp Underweight
                    <input type="radio" name ="bmi_range" value="1" data-parsley-group="vitalSign">&nbsp Normal
                    <input type="radio" name ="bmi_range" value="2" data-parsley-group="vitalSign">&nbsp Overweight
                    <input type="radio" name ="bmi_range" value="3" data-parsley-group="vitalSign">&nbsp Obese Class I
                    <input type="radio" name ="bmi_range" value="4" data-parsley-group="vitalSign">&nbsp Obese Class II
                    <input type="radio" name ="bmi_range" value="5" data-parsley-group="vitalSign">&nbsp Obese Class III
                </div>
                <div class="modal-footer" style="margin-right:0%">
                    <button class="btn btn-success" data-dismiss="modal">DONE</button>
                </div>
            </div>
        </div>
    </div>
    <!--END Modal-->

<script>
    $(window).load(function(){
        $('#modalVitalSigns').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);

            var bp = button.data('bp');//Blood Pressure
            var hr = button.data('hr');//Heart Rate
            var rr = button.data('rr');//Respiratory Rate
            var tmprtr = button.data('tmprtr');//Temperature
            var h = button.data('h');//Height
            var w = button.data('w');//Weight
            var bmi = button.data('bmi');//Body Mass Index
            var bmiRange = button.data('bmirange');//BMI Range

            var modal = $(this);

            modal.find('.modal-body input[name=bloodPressure]').val(bp);
            modal.find('.modal-body input[name=heartRate]').val(hr);
            modal.find('.modal-body input[name=respiratoryRate]').val(rr);
            modal.find('.modal-body input[name=temperature]').val(tmprtr);
            modal.find('.modal-body input[name=height]').val(h);
            modal.find('.modal-body input[name=weight]').val(w);
            modal.find('.modal-body input[name=bmi]').val(bmi);
            modal.find(".modal-body input[name=bmi_range]").val([bmiRange]);

        });

        $('.btn-delete').on('click', function(){
            
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this record!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete)=>{
                if (willDelete) {
                  $.ajax({
                    url: '/nurse/delete/logReferral/' + $(this).data('id'),
                    type: 'get',
                    success: function(output){
                      swal({
                        title: "SUCCESS",
                        text: output.message,
                        icon: "success",
                      })
                      .then((value)=>{
                        location.reload(true);
                      });
                    }
                  });
                }
             });
        });

        $('.btn-delete-cert').on('click', function(){
             swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this record!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete)=>{
                if (willDelete) {
                  $.ajax({
                    url: '/nurse/delete/logReferral/' + $(this).data('id'),
                    type: 'get',
                    success: function(output){
                      swal({
                        title: "SUCCESS",
                        text: output.message,
                        icon: "success",
                      })
                      .then((value)=>{
                        location.reload(true);
                      });
                    }
                  });
                }
             })
        });
    });
</script>       

@endsection