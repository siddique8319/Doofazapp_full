@extends('project/inc/header')
@section('content')

<div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container-fluid">

           
            <div class="row" data-toggle="isotope">

              <div class="item col-xs-12 col-md-9" style="width: 610px">
                 <div class="panel panel-default">
                    <!-- Data table -->
                    <div class="table-responsive">
                    <table data-toggle="data-table" class="table table-responsive" cellspacing="1" width="200%">
                      <thead style="background:#e4e6ed ">
                        <tr >
                          <th>SL</th>
                          <th >Campaign_Title</th>
                          <th>Submit_Time</th>
                          <th>SenderID</th>
                          <th>Submitted</th>
                          <th>Totalsent</th>
                          <th>Charge</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                     
                      <tbody>
                        <tr>
                          <td>50237563</td>
                          <td>Get</td>
                          <td>17:25pm16-Nov-2019 </td>
                          <td>88018445326</td>
                          <td>1</td>
                           <td>1</td>
                          <td>BDT 0.23</td>
                        <td><button class="btn btn-primary btn-xs" style="height:30px;">view </button></td>
                        </tr>
                           
                         <tr>
                          <td>50237563</td>
                          <td>Get</td>
                          <td>Sun, 22nd Dec </td>
                          <td>8809</td>
                          <td>1</td>
                           <td>1</td>
                          <td>BDT 0.23</td>
                        <td><button class="btn btn-primary btn-xs" style="height:30px;">view </button></td>
                        </tr>
                         <tr>
                          <td>50237563</td>
                          <td>Get</td>
                          <td>Sun, 22nd Dec </td>
                          <td>8809</td>
                          <td>1</td>
                           <td>1</td>
                          <td>BDT 0.23</td>
                        <td><button class="btn btn-primary btn-xs" style="height:30px;">view </button></td>
                        </tr>
                      </tbody>
                    </table></div>
                    <!-- // Data table -->
                  </div>







                </div>
              </div>
          </div>
      </div>
  </div>
@stop