@extends('chief.layout.chief')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>List Of Medicine</h3><br>
                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->

               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <center>
                      <label>From:</label>
                      <input type="date" name="from" id="from" class="date-range-filter" style="height: 35px;">
                      <label>To:</label>
                      <input type="date" name="to" id="to" class="date-range-filter" style="height: 35px;">
                      <button type="button" class="btn btn-primary" id="filter">Apply</button>
                    </center>
                    
                    <div class="clearfix">
                    </div>
                  </div>

                  <div class="x_content">
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="medicineTable">
                        <thead>
                          <tr class="headings">
                          
                            <th class="column-title">Generic Name</th>
                            <th class="column-title">Brand Name</th>
                            <th class="column-title">Unit</th>
                            <th class="column-title">Dosage</th>
                            <th class="column-title">Date Modified</th>
                          
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($medicines as $medicine)
                            <tr class="even pointer">
                             
                              <td class=" ">{{ $medicine->genericName }}</td>
                              <td class=" ">{{ $medicine->brand }}</td>
                              <td class=" ">{{ $medicine->unit }}</td>
                              <td class=" ">{{ $medicine->dosage }}</td>
                              <td class=" ">
                                @if($medicine->updated_at)
                                  {{ date('Y-m-d', strtotime($medicine->updated_at)) }}
                                @else
                                  {{ "NONE" }}
                                @endif
                              </td>       
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    
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

          <div class="col-md-10 col-sm-12 col-xs-12 form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Dosage: </label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" style="border-radius:8px;" id="dosage" name="dosage">
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
        <h4 class="modal-title" id="myModalLabel2">Print Medicine List</h4>
      </div>
      <form id="printMedicalLog" action="{{ url('/print/medicine/list') }}" target="_blank" method="get">
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
     var table = $('#medicineTable').dataTable({
        
       'sDom': '<"top">rt<"bottom"B><"clear">',
        "buttons": [
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'background-color', 'white' )
                        
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
    });

  $('#filter').on('click', function(e){
    e.preventDefault();
    var startDate = $('#from').val(),
        endDate = $('#to').val();
    
    filterByDate(4, startDate, endDate); // We call our filter function
    
    table.dataTable().fnDraw(); // Manually redraw the table after filtering
  });

  var filterByDate = function(column, startDate, endDate) {
  // Custom filter syntax requires pushing the new filter to the global filter array
    $.fn.dataTableExt.afnFiltering.push(
        function( oSettings, aData, iDataIndex ) {
          var rowDate = normalizeDate(aData[column]),
              start = normalizeDate(startDate),
              end = normalizeDate(endDate);
          
          // If our date from the row is between the start and end
          if (start <= rowDate && rowDate <= end) {
            return true;
          } else if (rowDate >= start && end === '' && start !== ''){
            return true;
          } else if (rowDate <= end && start === '' && end !== ''){
            return true;
          } else {
            return false;
          }
        }
    );
  };

  // converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
var normalizeDate = function(dateString) {
  var date = new Date(dateString);
  var normalized = date.getFullYear() + '' + (("0" + (date.getMonth() + 1)).slice(-2)) + '' + ("0" + date.getDate()).slice(-2);
  return normalized;
}

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
            url: '/save/medicine',
            type: 'get',
            data: $(this).serialize(),
            success: function(output){
                swal({
                  title: output.title,
                  text: output.message,
                  icon: output.logo,
                  button: "OK",
                })
                .then((value)=>{
                  location.reload(true);
                });    
            }
          });
        }

      });

      $('#editMedForm').submit(function(e){
        e.preventDefault();

        if($(this).parsley().isValid()){
          $.ajax({
            url: '/edit/medicine',
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
            url: '/delete/medicine/' + $(this).attr('data-id'),
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
        var dosage = button.data('dosage');

        var modal = $(this);
        modal.find('.modal-body #genericName').val(genericName);
        modal.find('.modal-body #brandName').val(brand);
        modal.find('.modal-body #unit').val(unit);
        modal.find('.modal-body #dosage').val(dosage);
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
