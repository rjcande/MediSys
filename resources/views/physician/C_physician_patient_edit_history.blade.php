@extends('nurse.layout.nurse')

@section('content')

        <div class="right_col" role="main">
            <div class="">
            <div class="page-title">
            <div class="title_left">
                <h3>Patients Records</h3>
            </div>
        </div>

        <div class="clearfix"></div>
            
            <div class="row">
            
        <!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">

                <div>
                    <label class="col-md-10 col-sm-12 col-xs-12"><h4>Patient ID, <em>Patient Name</em></h4></label>
                </div>
                 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
            <!--Content-->
                
                <div id="past_medical_history" style="float:left; margin-top: 10px; width: 100%">
                    <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                        height:30px; border-radius:8px;">&nbsp<b>Past Medical History</b></p><br>
                </div>

                <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                    <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Asthma<br>
                    <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Heart Disease
                    <br>
                    <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Seizure Disorder<br>
                </div>

                <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                    <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Primary Complex
                    <br>
                    <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Hyperventilation<br>
                    <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Measles<br>
                </div>
                
                <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                    <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Chicken Pox<br>
                    <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Other 
                    <em>(please specify)</em>
                    <textarea style="height:50px; width:350px; border-radius:8px;"></textarea>
                </div>

                <div style="float: left;width:100%;">
                    <div style="float: left;width:500px; margin-left: 25px; margin-top: 25px; font-size:15px;">
                        <p>Previous Hospitalization:
                            <input type="radio" name="" style="margin-left: 50px;">Yes
                            <input type="radio" name="" style="margin-left: 15px;">No
                        </p>
                        <p style="font-size:15px; margin-left:20px;"><em>(if yes, please specify)</em></p>
                        <textarea style="height:50px; margin-left:20px; border-radius:8px; width: 450px;">
                        </textarea>
                    </div>

                    <div style="float: left;width:500px; margin-left: 25px; margin-top: 25px; font-size:15px;">
                        <p>Operation/Surgery:
                            <input type="radio" name="" style="margin-left: 50px;">Yes
                            <input type="radio" name="" style="margin-left: 15px;">No
                        </p>
                        <p style="font-size:15px; margin-left:20px;"><em>(if yes, please specify)</em></p>
                        <textarea style="height:50px; margin-left:20px; border-radius:8px; width: 450px;">
                        </textarea>
                    </div>
                            
                    <div style="float: left;width:500px; margin-left: 25px; margin-top: 25px; font-size:15px;">
                        <p>Current Medications:
                            <input type="radio" name="" style="margin-left: 50px;">Yes
                            <input type="radio" name="" style="margin-left: 15px;">No
                        </p>
                        <p style="font-size:15px; margin-left:20px;"><em>(if yes, please specify)</em></p>
                        <textarea style="height:50px; margin-left:20px; border-radius:8px; width: 450px;">
                        </textarea>
                    </div>
                </div>

                <div id="family-history" style="float:left; margin-top: 50px; width: 100%">
                    <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                        height:30px; border-radius:8px;">&nbsp<b>Family History</b></p><br>
                </div>

                <div "style="float:left; width:100%;">
                    <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                        <input type="checkbox" name="" class="radio-fam" style="margin-bottom:12px;"> Diabetes<br>
                        <input type="checkbox" name="" class="radio-fam" style="margin-bottom:12px;"> Hypertension<br>
                        <input type="checkbox" name="" class="radio-fam" style="margin-bottom:12px;"> Heart Disease
                        <br>
                        <input type="checkbox" name="" class="radio-fam" style="margin-bottom:12px;"> PTB<br>
                    </div>
                    
                    <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                        <input type="checkbox" name="" class="radio-fam" style="margin-bottom:12px;"> Cancer<br>
                        <input type="checkbox" name="" class="radio-fam" style="margin-bottom:12px;"> Other 
                        <em>(please specify)</em>
                        <textarea style="height:50px; width:350px; border-radius:8px;"></textarea>
                    </div>
                </div>
                
                <div id="physical-examination" style="float:left; margin-top: 50px; width: 100%;">
                    <p style="font-size:20px; color:white; background: linear-gradient(to right, #d63031, white);
                        height:30px; border-radius:8px;">&nbsp<b>Physical Examination</b></p><br>
                
                    <div id="physical-examination-head-throat">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width:45%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Head</label>
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 15px; width:45%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Throat</label>

                        <div style="float:left; margin-left:60px; font-size:15px; width:40%;">
                            <br>
                            <input type="checkbox" name="" class="radio-head" style="margin-bottom:12px;"> Wound
                            <br>
                            <input type="checkbox" name="" class="radio-head" style="margin-bottom:12px;"> Mass
                            <br>
                            <input type="checkbox" name="" class="radio-head" style="margin-bottom:12px;"> Alopecia
                            <br>
                        </div>
                                    
                        <div style="float:left; margin-left:80px; font-size:15px; width:40%;">
                            <br>
                            <input type="checkbox" name="" class="radio-throat" style="margin-bottom:12px;"> No TCP<br>
                            <input type="checkbox" name="" class="radio-throat" style="margin-bottom:12px;"> No Mass<br>
                            <input type="checkbox" name="" class="radio-throat" style="margin-bottom:12px;"> No Lymphadenopthy<br>
                        </div>
                    </div>

                    <div id="physical-examination-ears-extremities">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
                                    background: linear-gradient(to right, #192856, white); height:30px;
                                    border-radius:8px;">&nbsp Ears</label>
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
                                    background: linear-gradient(to right, #192856, white); height:30px;
                                    border-radius:8px;">&nbsp Extremities</label>
                    </div><br>  
                    
                    <div style="float:left; margin-left:60px; font-size:15px; width:40%;">
                        <input type="checkbox" name="" class="radio-ears" style="margin-bottom:12px;"> No Gross Deformity<br>
                        <input type="checkbox" name="" class="radio-ears" style="margin-bottom:12px;"> No Discharge <br>
                    </div>
                                    
                    <div style="float:left; margin-left:80px; font-size:15px; width:40%;">
                        <input type="checkbox" name="" class="radio-extremities" style="margin-bottom:12px;"> No Deformities<br>
                    </div>

                    <div id="physical-examination-eyes">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:92%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Eyes
                        </label>
                    </div><br>
                    
                    <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                        <input type="checkbox" name="" class="radio-eyes" style="margin-bottom:12px;"> Pale<br>
                        <input type="checkbox" name="" class="radio-eyes" style="margin-bottom:12px;"> Pink Palberal Conjunctiva <br>
                    </div>

                    <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                        <input type="checkbox" name="" class="radio-eyes" style="margin-bottom:12px;"> Icteric<br>
                        <input type="checkbox" name="" class="radio-eyes" style="margin-bottom:12px;"> Anicteric Sclera<br>
                    </div>

                    <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                        <input type="checkbox" name="" class="radio-eyes" style="margin-bottom:12px;"> With Glasses <em>(please specify grade)</em>
                        <input type="text" name="" class="" style="width:350px; border-radius:8px;">
                    </div>

                    <div id="physical-examination-chest-heart">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Chest/Lungs
                        </label>
                                    
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Heart
                        </label>
                    </div><br>
                    
                    <div style="float:left; margin-left:60px; font-size:15px; width:40%;">
                        <input type="checkbox" name="" class="radio-chest" style="margin-bottom:12px;"> Clear Breath Sounds<br>
                        <input type="checkbox" name="" class="radio-chest" style="margin-bottom:12px;"> Other <em>(please specify)</em>
                        <textarea style="height:50px; width:350px; border-radius:8px;"></textarea>
                    </div>
                                    
                    <div style="float:left; margin-left:80px; font-size:15px; width:40%;">
                        <input type="checkbox" name="" class="radio-heart" style="margin-bottom:12px;"> Regular Rate Rhythm<br>
                        <input type="checkbox" name="" class="radio-heart" style="margin-bottom:12px;"> Other <em>(please specify)</em>
                        <textarea style="height:50px; width:350px; border-radius:8px;"></textarea>
                    </div>

                    <div id="physical-examination-vcolumn-xray">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
                                    background: linear-gradient(to right, #192856, white); height:30px;
                                    border-radius:8px;">&nbsp Vertebral Column
                        </label>
                        
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Chest X-ray</label>
                    </div><br>

                    <div style="float:left; margin-left:60px; font-size:15px; width:40%;">
                        <input type="radio" name="vcolumn" class="radio-vcolumn" style="margin-bottom:12px;"> Normal<br>
                        <input type="radio" name="vcolumn" class="radio-vcolumn" style="margin-bottom:12px;"> With Deformities <em>(please specify)</em>
                        <textarea style="height:50px; width:350px; border-radius:8px;"></textarea>
                    </div>
                                    
                    <div style="float:left; margin-left:80px; font-size:15px; width:40%;">
                        <input type="radio" name="xray" class="radio-xray" style="margin-bottom:12px;"> Normal<br>
                        <input type="radio" name="xray" class="radio-xray" style="margin-bottom:12px;"> With Deformities <em>(please specify)</em>
                        <textarea style="height:50px; width:350px; border-radius:8px;"></textarea>
                    </div>

                    <div id="physical-examination-abdomen-breast">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Abdomen
                        </label>
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:45%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Breast
                        </label>
                    </div><br>

                    <div style="float:left; margin-left:80px; font-size:15px; width:40%;">
                        <input type="checkbox" name="" class="radio-abdomen" style="margin-bottom:12px;"> Normal
                        <br>
                    </div>
                                    
                    <div style="float:left; margin-left:60px; font-size:15px; width:40%;">
                        <input type="checkbox" name="" class="radio-breast" style="margin-bottom:12px;"> Normal
                        <br>
                    </div>
                            
                    <div id="physical-examination-skin">
                        <label style="color:white; font-size:18px; margin-left: 25px; margin-top: 25px; width:92%;
                                background: linear-gradient(to right, #192856, white); height:30px;
                                border-radius:8px;">&nbsp Skin
                        </label>
                    </div><br>

                    <div style="float:left; margin-left:60px; font-size:15px; width:40%;">
                        <input type="checkbox" name="" class="radio-skin" style="margin-bottom:12px;"> No Lesions
                        <br>
                        <input type="checkbox" name="" class="radio-skin" style="margin-bottom:12px;"> Other
                        <em>(please specify)</em>
                        <textarea style="height:50px; width:350px; border-radius:8px;"></textarea>
                    </div>
                </div>

                <div id="menstrual-history" style="float: left; margin-top: 50px; width: 100%">
                    <p style="font-size: 20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Menstrual History</b> <em>(Female)</em>
                    </p><br>

                    <div style="float:left; margin-left:25px; font-size:18px; width:250px;">
                        <header style="margin-bottom:12px;"> First Day of Last Menstruation</header>
                        <header style="margin-bottom:12px;"> Menarch</header>
                        <header style="margin-bottom:12px;"> Duration(days)</header>
                        <header style="margin-bottom:12px;"> Interval</header>
                        <header style="margin-bottom:12px;"> Amounts(soaked pads per day)</header>
                        <header style="margin-bottom:12px;"> Symptoms</header>
                    </div>
                        
                    <div style="float:left; margin-left:25px; font-size:18px; width:300px;">
                        <input type="text" name="" class="" style="width:350px; border-radius:8px;
                            margin-bottom:12px;">
                        <input type="text" name="" class="" style="width:350px; border-radius:8px;
                            margin-bottom:12px;">
                        <input type="text" name="" class="" style="width:350px; border-radius:8px;
                            margin-bottom:12px;">
                        <input type="text" name="" class="" style="width:350px; border-radius:8px;
                            margin-bottom:12px;">
                        <input type="text" name="" class="" style="width:350px; border-radius:8px;
                            margin-bottom:12px;">
                        <textarea style="height:50px; width:350px; border-radius:8px;"></textarea>
                    </div>
                </div>
                    
                <div id="circumcision-history" style="float: left; margin-top: 50px; width: 100%">
                    <p style="font-size: 20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Circumcision History</b> <em>(Male)</em>
                    </p><br>
                        
                    <div style="float:left; margin-left:25px; font-size:18px; width:250px;">
                        <header style="margin-bottom:12px;"> Day of Circumcision</header>
                    </div>
                    
                    <div style="float:left; margin-left:25px; font-size:18px; width:300px;">
                        <input type="text" name="" class="" style="width:350px; border-radius:8px;
                            margin-bottom:12px;">
                    </div>
                </div>

                <div id="immunization-history" style="float: left; margin-top: 50px; width: 100%">
                    <p style="font-size: 20px; color:white; background: linear-gradient(to right, #d63031, white);
                            height:30px; border-radius:8px;">&nbsp<b>Immunization History</b>
                    </p><br>
                    
                    <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                        <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Bacille Calmette Guerin<br>
                        <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Measles<br>
                        <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Mumps,Measles,and Ruvella<br>
                    </div>
                            
                    <div style="float:left; margin-left:25px; font-size:15px; width:300px;">
                        <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Varicella
                        <br>
                        <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Pneumonococcal<br>
                        <input type="checkbox" name="" class="radio-past" style="margin-bottom:12px;"> Haemophilius influenza B<br>
                    </div>
                            
                    <div style="float:left; margin-left:25px; font-size:15px; width:75px;">
                        <header style="margin-right:10px; margin-bottom:10px;">Hepatitis B</header>
                        <header style="margin-right:10px margin-bottom:10px;">DPT</header>
                    </div>
                            
                    <div style="float:left; margin-left:25px; font-size:15px; width:150px;">
                        <input type="radio" name="hepatitis" style="margin-bottom:15px;">1
                        <input type="radio" name="hepatitis">2
                        <input type="radio" name="hepatitis">3
                        <input type="radio" name="hepatitis">None<br>
                                
                                
                        <input type="radio" name="dpt">1
                        <input type="radio" name="dpt">2
                        <input type="radio" name="dpt">3
                        <input type="radio" name="dpt">None<br><br>
                    </div>
                            
                            
                </div>
                  
                <div style="margin-top: 25px;margin-bottom: 30px;float: left;text-align: right;width: 100%">
                      <a href="{{ url('/physicianViewHistory') }}"><button class="btn btn-success">SAVE</button></a>
                      <a href="{{ url('/physicianViewHistory') }}"><button class="btn btn-primary">BACK</button></a>
                    </div>


                <div style="margin:0px; position:fixed;left: 230px; bottom:-20px; width:100%; background:#999;">
                    <ul id = "patient_record" class="ul">
                      <li class = "site"><a href="#past_medical_history" class="a">Past Medical History</a></li>
                      <li class = "site"><a href="#family-history" class="a">Family History</a></li>
                      <li class = "site"><a href="#physical-examination" class="a">Physical Examination</a></li>
                      <li class = "site"><a href="#menstrual-history" style="width: 200px;" class="a">Menstrual/Circumcision History</a></li>
                      <li class = "site"><a href="#immunization-history" class="a">Immunization History</a></li>
                    </ul>
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

@endsection