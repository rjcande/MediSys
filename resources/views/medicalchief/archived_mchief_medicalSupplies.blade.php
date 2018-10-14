@extends('chief.layout.chief')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Medical Supply</h3><br>
                <div style="width: 500px; font-size:18px">
                  {{--  <form id="saveMedForm">
                    @csrf()
                    <div>
                      <div style="float: left; width: 200px;">
                        <header style="margin-bottom:12px; margin-left:25px;">Medical Supply ID:</header>
                      </div>
                      <div style="float: left; margin-left: 15px;">
                        <input type="text" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" name="medSupID" data-parsley-required="true" value="{{ $id->id }}" readonly>
                      </div>
                    </div>
                    <div>
                      <div style="float: left; width: 200px;">
                        <header style="margin-bottom:12px; margin-left:25px;">Medical Supply Name:</header>
                      </div>
                      <div style="float: left; margin-left: 15px;">
                        <input type="text" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" name="medSupName" data-parsley-required="true">
                      </div>

                    </div>
                    <div>
                      <div style="float: left; width: 200px;">
                        <header style="margin-bottom:12px; margin-left:25px;">Brand Name:</header>
                      </div>
                      <div style="float: left; margin-left: 15px;">
                        <input type="text" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" name="medSupBrandName" data-parsley-required="true">
                      </div>
                    </div>
                    <div>
                      <div style="float: left; width: 200px;">
                        <header style="margin-bottom:12px; margin-left:25px;">Unit:</header>
                      </div>
                      <div style="float: left; margin-left: 15px;">
                        <input type="text" style="width:250px; border-radius:8px; margin-bottom:13px; 172px;height: 25px;" name="medSupUnit" data-parsley-required="true">
                      </div>
                    </div>
                    <div style="float: left; display: flex; justify-content: center; width: 100%">
                      <button type="submit" class="btn btn-success" id="btnAdd">ADD</button>
                      <button type="reset" class="btn btn-warning" id="btnReset">CLEAR</button>
                    </div>
                  </div>
                </form>  --}}
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->

               <div class="col-md-12 col-sm-12 col-xs-12" style="height:80vh;">
                <div class="x_panel">
                  <div class="x_title">
                    <h4 style="display: inline;">
                      List of Medical Supply
                    </h4>
                    <div class="col-md-2 col-sm-12 col-xs-12" style="width: 350px; float: right;">
                      <input type="text" placeholder="Search" id="search" class="form-control" style="height: 32px; font-size:15px; border-radius: 12px; border: 1.5px solid gray;">
                    </div>
                    <div class="clearfix">
                    </div>
                  </div>

                  <div class="x_content">
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="medicineTable">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Medical Supply Name</th>
                          <th class="column-title">Brand Name</th>
                            <th class="column-title">Unit</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="8">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($supplies as $supply)
                            <tr class="even pointer">
                              <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                              </td>
                              <td class=" ">{{ $supply->medSupName }}</td>
                              <td class=" ">{{ $supply->brand }}</td>
                              <td class=" ">{{ $supply->unit }}</td>
                              <td class="last">
                                {{--  <button class="btn btn-primary" id="btnEdit" data-toggle="modal" data-target="#medicineEditModal" data-genericname="{{ $supply->medSupName }}" data-brand="{{ $supply->brand }}" data-unit="{{ $supply->unit }}" data-id="{{ $supply->medSupID }}">
                                  <i class="fa fa-pencil"></i>
                                </button>  --}}

                                <a href="{{ url('/mchief/restore/medicalSupply',$supply->medSupID) }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-refresh"></i>
                                      </button>
                                </a>



                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                       {{--  <button type="button" class="btn btn-primary" type="button" data-toggle="modal" data-target="#printModal">
                          <i class="fa fa-print"></i> Print
                      </button>  --}}
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

<!-- Edit Modal -->
<div id="medicineEditModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Medicine</h4>
      </div>
      <div class="modal-body">
        <form id="editMedForm" class="form-horizontal form-label-left">
          @csrf()
          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Medicine ID: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="medicineID" readonly>
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Generic Name: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="genericName" required name="genericName">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Brand Name: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="brandName" name="brandName">
            </div>
          </div>

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Unit: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="unit" name="unit">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="medicineID">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>

  </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="printModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Print Medical Supply List</h4>
      </div>
      <form id="printMedicalLog" action="{{ url('/print/medical/supply/list') }}" target="_blank" method="get">
          @csrf()
      <div class="modal-body">
        <div class="col-md-4">
            <input type="checkbox" name="daily" id="daily" value="1" data-parsley-multiple="choices" required data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Daily</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" name="monthly" id="monthly" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Monthly</label>
        </div>
        <div class="col-md-4">
            <input type="checkbox" name="yearly" id="yearly" value="1" data-parsley-multiple="choices" data-parsley-error-message="Please select at least 1 of the choices" data-parsley-errors-container="#error_container"><label style="margin-left: 5px;">Yearly</label>
        </div>
        <div style="width: 100%" id="error_container">

        </div>
        <br><br>
        <div style="width: 100%">
          <div class="form-group">
            <label style="margin-left: 5px; width: 50px">Date: </label>
            <input type="date" name="date" style="width: 70%" disabled id="date">
          </div>

        </div>
        <div style="width: 100%">
            <label style="margin-left: 5px;  width: 50px">Month: </label>
            <select name="month" id="month" disabled data-parsley-errors-container="#error_container_month" data-parsley-error-message="Month is required">
              <option value="" selected></option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>

            <select name="year_month" class="year" id="year-month" disabled data-parsley-errors-container="#error_container_month" data-parsley-error-message="Year is required">
                <option value="" selected disabled>Year</option>
            </select>
        </div>
        <div style="width: 100%" id="error_container_month">

        </div>
        <div style="width: 100%">
            <label style="margin-left: 5px;  width: 50px">Year: </label>
            <select name="year" class="year" id="year" disabled data-parsley-errors-container="#error_container_year" data-parsley-error-message="Year is required">
                <option value="" selected disabled>Year</option>
            </select>
        </div>
        <div style="width: 100%" id="error_container_year">

        </div>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="submit" class="btn btn-success">Continue</button>
      </div>
      </form>

    </div>
  </div>
</div>


<script>
  $(window).load(function(){
        //Data Table
     var table = $('#medicineTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": '<"top"i>rt<"bottom"p><"clear">'
    });

    $('#search').keyup(function(){
      table.search($(this).val()).draw();
    });
      //Form validation
      $('#saveMedForm').parsley();
      $('#editMedForm').parsley();
      //Submitting of Form
      $('#saveMedForm').submit(function(e){
        e.preventDefault();

        if ($(this).parsley().isValid()) {
          $.ajax({
            url: '/save/medical/supply',
            type: 'get',
            data: $(this).serialize(),
            success: function(output){
              if (output.message == "Medical Supply is already existing!") {
                swal({
                  title: "WARNING!",
                  text: output.message,
                  icon: "warning",
                  button: "OK",
                });
              }
              else{
                swal({
                  title: "Good job!",
                  text: output.message,
                  icon: "success",
                  button: "OK",
                })
                .then((value)=>{
                  location.reload(true);
                });
              }

            }
          });
        }

      });

      $('#editMedForm').submit(function(e){
        e.preventDefault();

        if($(this).parsley().isValid()){
          $.ajax({
            url: '/edit/medical/supply',
            type: 'get',
            data: $(this).serialize(),
            success: function(output){
              swal({
                title: "Good job!",
                text: output.message,
                icon: "success",
                button: "OK",
              })
              .then((value)=>{
                location.reload(true);
              });
            }
          });
        }
      });


    //button clicks
    $('#btnReset').on('click', function(){
      $('#saveMedForm')[0].reset();
    });

    $('.medicine-details').on('click',function(){
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
            url: '/delete/medical/supply/' + $(this).attr('data-id'),
            type: 'get',
            success: function(output){
              swal({
                title: "Good job!",
                text: output.message,
                icon: "success",
                button: "OK",
              })
              .then((value)=>{
                location.reload(true);
              });
            }
          });
        }
      });
    })
    //Opening Edit Modal
    $('#medicineEditModal').on('show.bs.modal', function(e){
        var button = $(e.relatedTarget);
        var genericName = button.data('genericname');
        var brand = button.data('brand');
        var unit = button.data('unit');
        var id = button.data('id');

        var modal = $(this);
        modal.find('.modal-body #genericName').val(genericName);
        modal.find('.modal-body #brandName').val(brand);
        modal.find('.modal-body #unit').val(unit);
        modal.find('.modal-body #medicineID').val(id);
        modal.find('.modal-footer input[name=medicineID]').val(id);
    });

    //Printing of Medical Log
    $('#printMedicalLog').parsley();
    $('#printMedicalLog').submit(function(){
      $('#printModal').modal('hide');

    });

    //drop down of year
    for (i = new Date().getFullYear(); i > 1999; i--)
    {
        $('.year').append($('<option />').val(i).html(i));
    }
    //Validation For Printing of Medical Log
    $('#daily').on('change', function(){
      if ($(this).is(':checked')) {
        $('#date').prop('disabled', false);
        $('#date').prop('required', true);
      }
      else{
        $('#date').prop('disabled', true);
        $('#date').prop('required', false);
      }
    });
    $('#monthly').on('change', function(){
      if ($(this).is(':checked')) {
        $('#month').prop('disabled', false);
        $('#month').prop('required', true);
        $('#year-month').prop('disabled', false);
        $('#year-month').prop('required', true);
      }
      else{
        $('#month').prop('disabled', true);
        $('#month').prop('required', false);
        $('#year-month').prop('disabled', true);
        $('#year-month').prop('required', false);
      }
    });
    $('#yearly').on('change', function(){
      if ($(this).is(':checked')) {
        $('#year').prop('disabled', false);
        $('#year').prop('required', true);
      }
      else{
        $('#year').prop('disabled', true);
        $('#year').prop('required', false);
      }
    });

    $('#printModal').on('hidden.bs.modal', function () {
      $('#printMedicalLog')[0].reset();
      $('#date').prop('disabled', true);
      $('#month').prop('disabled', true);
      $('#year-month').prop('disabled', true);
      $('#year').prop('disabled', true);
      $('#date').prop('required', false);
      $('#month').prop('required', false);
      $('#year-month').prop('required', false);
      $('#year').prop('required', false);
    });

  });
</script>
@endsection
