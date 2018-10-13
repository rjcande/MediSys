@extends('dentalchief.layout.dentalchief')

@section('content')

   <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>List of Medical Supply</h3><br>
               
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
                      <button type="button" class="btn btn-warning" id="clearFilter">Clear Filter</button>
                    </center>
                    <div class="clearfix">
                    </div>
                  </div>

                  <div class="x_content">
                    <div class="">
                      <table class="table table-striped table-bordered jambo_table bulk_action" id="medicineTable">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">Medical Supply Name</th>
                            <th class="column-title">Brand Name</th>
                            <th class="column-title">Unit</th>
                            <th class="column-title">Date Modified</th>
                          
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($supplies as $supply)
                            <tr class="even pointer">
                              
                              <td class=" ">{{ $supply->medSupName }}</td>
                              <td class=" ">{{ $supply->brand }}</td>
                              <td class=" ">{{ $supply->unit }}</td>
                              <td class=" ">
                                @if($supply->updated_at)
                                  {{ date('Y-m-d', strtotime($supply->updated_at)) }}
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




<script>
  $(window).load(function(){
    //Data Table
    var table = $('#medicineTable').dataTable({
        
       'sDom': '<"top">rt<"bottom"B><"clear">',
        "buttons": [
            {
                extend: 'print',
                text: 'Print List of Medical Supplies',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'background-color', 'white' )
                        
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                 exportOptions: {
                  rows: ':visible'
                }
            }
        ]
    });

    $('#clearFilter').on('click', function(e){
      e.preventDefault();
      $.fn.dataTableExt.afnFiltering.length = 0;
      table.dataTable().fnDraw();
    });

    $('#filter').on('click', function(e){
    e.preventDefault();
    var startDate = $('#from').val(),
        endDate = $('#to').val();
    
    filterByDate(3, startDate, endDate); // We call our filter function
    
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
