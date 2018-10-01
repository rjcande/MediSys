@extends('dentist.layout.dentist')

@section('content')

<style type="text/css">
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
              <h3>DentalChart ID: </h3>
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
                <div class="x_content">
                   <!-- Content -->
                    <div>
                        <h1 style="text-align: center;">DENTAL RECORD CHART</h1>
                        <h2>INTRAORAL EXAMINATION</h2>

                        <!-- TOOTH NUMBER 55 TO 51 AND 61 TO 65 -->
                        <div style="float: left; margin-top: 25px; margin-left: 120px;">
                            <label style="display: inline-block;width:100px;font-size: 12px;margin-left:75px">STATUS RIGHT</label>
                                
                            <input placeholder=""  type="text"    name="txtBox55a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox54a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox53a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox52a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox51a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox61a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox62a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox63a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox64a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox65a" class="text-input" style="width:55px;">
                            <label style="display: inline-block;width:100px;font-size: 12px; text-align:right;">STATUS LEFT</label>
                            <br>
                            <input placeholder=""  type="text"    name="txtBox55b" class="text-input" style="width:55px;margin-left: 179px;">
                            <input placeholder=""  type="text"    name="txtBox54b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox53b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox52b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox51b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox61b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox62b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox63b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox64b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox65b" class="text-input" style="width:55px;">

                            <div style="margin-top: 5px;">
                            <!--TOOTH NUMBER 55--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 177px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 177px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 54--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 53--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 52--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 51--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 61----------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 62--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 63--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 64--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 65--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                            </div>
                        </div>
                        
                        <div style="margin-top: 150px; margin-left: 300px">
                            <a href=""><button class="btn btn-warning">55</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">54</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">53</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">52</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">51</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 5px;">61</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">62</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">63</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">64</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">65</button></a>
                        </div>
                        
                        <!--18 TO 11 AND 21 TO 28 A AND B-->
                        <div style="float: left; margin-top: 30px; margin-left: 120px;">
                            <input placeholder=""  type="text"    name="txtBox18a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox17a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox16a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox15a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox14a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox13a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox12a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox11a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox21a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox22a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox23a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox24a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox25a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox26a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox27a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox28a" class="text-input" style="width:55px;">
                            <br>
                            <input placeholder=""  type="text"    name="txtBox18b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox17b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox16b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox15b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox14b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox13b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox12b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox11b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox21b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox22b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox23b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox24b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox25b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox26b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox27b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox28b" class="text-input" style="width:55px;">
                            <br>

                            <div style="margin-top: 5px;">
                            <!--TOOTH NUMBER 18--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 17--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 16--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 15--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 14--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 13--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 12--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 11--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 21--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 22--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 23--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 24--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 25--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 26--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 27--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 28--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                            </div>
                        </div>

                        <div style="margin-top: 150px; margin-left: 120px;">
                            <a href=""><button class="btn btn-warning">18</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">17</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">16</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">15</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">14</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">13</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">12</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">11</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 5px;">21</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">22</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">23</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">24</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">25</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">26</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">27</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">28</button></a>
                        </div>

                        <!--48 TO 41 AND 31 TO 38 A AND B-->
                        <div style="margin-top: 25px; margin-left: 120px;">
                            <a href=""><button class="btn btn-warning">48</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">47</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">46</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">45</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">44</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">43</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">42</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">41</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 5px;">31</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">32</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">33</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">34</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">35</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">36</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">37</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">38</button></a>
                        </div>
                        
                        <!--48 TO 41 A AND B-->
                        <div style="float: left; margin-left: 120px;">
                            
                            <div style="margin-top: 5px;">
                            <!--TOOTH NUMBER 48--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 47--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 46--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 45--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 44--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 43--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 42--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 41--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 31--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 32--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 33--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 34--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 35--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 36--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 37--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 38--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                            </div>

                            <input placeholder=""  type="text"    name="txtBox48a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox47a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox46a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox45a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox44a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox43a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox42a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox41a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox31a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox32a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox33a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox34a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox35a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox36a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox37a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox38a" class="text-input" style="width:55px;">
                            <br>
                            <input placeholder=""  type="text"    name="txtBox48b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox47b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox46b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox45b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox44b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox43b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox42b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox41b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox31b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox32b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox33b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox34b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox35b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox36b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox37b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox38b" class="text-input" style="width:55px;">
                            <br><br><br>
                        </div>

                        <div style="margin-left: 300px">
                            <a href=""><button class="btn btn-warning">71</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">72</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">73</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">74</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">75</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 5px;">85</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">84</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">83</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">82</button></a>
                            <a href=""><button class="btn btn-warning" style="margin-left: 10px;">81</button></a>
                        </div>
                        <!--TOOTH NUMBER 71 TO 75 AND 85 TO 81-->
                        <div style="float: left; margin-left: 120px">

                            <div style="margin-top: 5px;">
                            <!--TOOTH NUMBER 71--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 177px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 177px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 72--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 73--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 74--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 75--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                                <!--TOOTH NUMBER 85----------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 0px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 84--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 83--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 82--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->

                            <!--TOOTH NUMBER 81--------------------------------------------------------------------------->
                                <a href=""><img src="{{ asset('images/leftTooth.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/leftToothDis.png') }}" style="margin-left: 5px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/topTooth.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/topToothDis.png') }}" style="margin-left: -53px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/rightTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/rightToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/bottomTooth.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/bottomToothDis.png') }}" style="margin-left: -53.5px;
                                " width="300px" class="imgTeeth"></a> -->
                                <a href=""><img src="{{ asset('images/midTooth.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a>
                                <!-- <a href=""><img src="{{ asset('images/midToothDis.png') }}" style="margin-left: -54px;" width="300px" class="imgMidTeeth"></a> -->
                            </div>
                            <label style="display: inline-block;width:100px;font-size: 12px; margin-left:75px;">STATUS RIGHT</label>
                            <input placeholder=""  type="text"    name="txtBox71a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox72a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox73a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox74a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox75a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox85a" class="text-input" style="width:55px;" style="margin-left: 54px;">
                            <input placeholder=""  type="text"    name="txtBox84a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox83a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox82a" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox81a" class="text-input" style="width:55px;">
                            <label style="display: inline-block;width:100px;font-size: 12px; text-align:right;">STATUS LEFT</label>
                            <br>
                            <input placeholder=""  type="text"    name="txtBox71b" class="text-input" style="width:55px;margin-left:179px">
                            <input placeholder=""  type="text"    name="txtBox72b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox73b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox74b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox75b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox85b" class="text-input" style="width:55px;" style="margin-left: 54px;">
                            <input placeholder=""  type="text"    name="txtBox84b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox83b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox82b" class="text-input" style="width:55px;">
                            <input placeholder=""  type="text"    name="txtBox81b" class="text-input" style="width:55px;">
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
                                    style="border-radius:12px; border: 1px solid gray; box-shadow:2px 3px; margin-left: 20px; width: 95%;"></textarea>
                        </div>

                        <div style="float: left;width: 100%;text-align: center;margin-top: 10px;">
                            <a href="C_dentist_dental_form.php"><button class="btn btn-primary">BACK</button></a>
                            <button type="submit" name="btnSave" class="btn btn-success">SAVE</button>
                        </form>    
                            <a href="{{url('dentist/DentalLog')}}"><button class="btn btn-danger">CANCEL</button></a>
                        </div>
                    </div>
                    
                   <!-- /Content -->
            <!-- /form input mask -->
        </div>
    </div>
@endsection
