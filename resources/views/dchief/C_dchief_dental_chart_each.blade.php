@extends('dchief.layout.dchief')

@section('content')

	 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tooth Status ({{ $toothNum }})</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <!-- Content -->
                    <div>
                      <table class="table table-striped table-bordered jambo_table bulk_action" style="width:100%" id="patientTable">
                        <thead>
                            <tr class="headings">
                              <th class="column-title"></th>
                              <th class="column-title">Status Code</th>
                              <th class="column-title" style="width:400px;">Status</th>
                              <th class="column-title">Date</th>
                              <th class="column-title">Time</th>
                              <th class="column-title" style="width:20px;">Action</th>
                            </tr>
                        </thead>
                        @foreach($toothconditions as $toothcondition)
                        {{ Session::put('toothNum',$toothcondition->toothNum) }}
                      <tbody>
                          @if($toothcondition->toothStatusA != null)
                          <tr class="even pointer">
                            <td class="a-center">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td>{{ $toothcondition->toothStatusA }}</td>
                            <td class=" ">@switch($toothcondition->toothStatusA)
                              @case('D') <span>Decayed (Caries Indicated Filling)</span> @break
                              @case('M') <span>Missing due to Caries</span> @break
                              @case('F') <span>Filled</span> @break
                              @case('I') <span>Caries Indicated for Extraction</span> @break
                              @case('RF') <span>Root Fragment</span> @break
                              @case('MO') <span>Missing</span> @break
                              @case('Im') <span>Impacted Teeth</span> @break
                              @case('J') <span>jacket Crown</span> @break
                              @case('A') <span>Amalgam Filling</span> @break
                              @case('AB') <span>Abutment</span> @break
                              @case('P') <span>Pontic</span> @break
                              @case('In') <span>Inlay</span> @break
                              @case('LC') <span>Light Cure Composite</span> @break
                              @case('S') <span>Sealants</span> @break
                              @case('Rm') <span>Removable Denture</span> @break
                              @case('X') <span>Extraction due to Caries</span> @break
                              @case('XO') <span>Extraction due to Other Causes</span> @break
                              @case('PT') <span>Present Tooth</span> @break
                              @case('Cm') <span>Congenitally Missing</span> @break
                              @case('Sp') <span>Supermumerary</span> @break
                              @endswitch</td>
                            <td class=" ">{{ date("F d, Y", strtotime($toothcondition->created_at)) }}</td>
                            <td class=" ">{{ date("h:i a", strtotime($toothcondition->created_at)) }}</td>
                            <td><a href="{{ route('dchief.dentalchart.deleteToothCon',$toothcondition->toothConditionID) }}"><button class="btn btn-danger"><i class='fa fa-trash'></i></button></a></td>
                          </tr>
                          @endif
                          
                          @if($toothcondition->toothStatusB != null)
                          <tr class="even pointer">
                            <td class="a-center">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td>{{ $toothcondition->toothStatusB }}</td>                            
                            <td class=" ">@switch($toothcondition->toothStatusB)
                              @case('D') <span>Decayed (Caries Indicated Filling)</span> @break
                              @case('M') <span>Missing due to Caries</span> @break
                              @case('F') <span>Filled</span> @break
                              @case('I') <span>Caries Indicated for Extraction</span> @break
                              @case('RF') <span>Root Fragment</span> @break
                              @case('MO') <span>Missing</span> @break
                              @case('Im') <span>Impacted Teeth</span> @break
                              @case('J') <span>jacket Crown</span> @break
                              @case('A') <span>Amalgam Filling</span> @break
                              @case('AB') <span>Abutment</span> @break
                              @case('P') <span>Pontic</span> @break
                              @case('In') <span>Inlay</span> @break
                              @case('LC') <span>Light Cure Composite</span> @break
                              @case('S') <span>Sealants</span> @break
                              @case('Rm') <span>Removable Denture</span> @break
                              @case('X') <span>Extraction due to Caries</span> @break
                              @case('XO') <span>Extraction due to Other Causes</span> @break
                              @case('PT') <span>Present Tooth</span> @break
                              @case('Cm') <span>Congenitally Missing</span> @break
                              @case('Sp') <span>Supermumerary</span> @break
                              @endswitch</td>
                            <td class=" ">{{ date("F d, Y", strtotime($toothcondition->created_at)) }}</td>
                            <td class=" ">{{ date("h:i a", strtotime($toothcondition->created_at)) }}</td>
                            <td><a href="{{ route('dchief.dentalchart.deleteToothCon',$toothcondition->toothConditionID) }}"><button class="btn btn-danger"><i class='fa fa-trash'></i></button></a></td>
                          </tr>
                          @endif
                          
                        </tbody>
                        @endforeach
                        </table>
                      </div>
                      <div>
                        <a href="{{url()->previous()}}"><button type="button" class="btn btn-default" data-dismiss="modal" style="float: right">BACK</button></a>
                      </div>
                    <!-- /Content -->
                  </div>
                </div>
              </div>
              <!-- /form input mask -->  
            </div>
          </div>
        </div>

<!-- MODAL -->
<div id="eachToothModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Medical Log Information</h4>
      </div>
      <!-- Modal Body -->
        
      <div class="modal-body">
          <img src="{{ asset('images/sample.png') }}">
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Next" name="btnNext">
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      
    </div>

  </div>
</div>
<!-- /EndModal -->

@endsection