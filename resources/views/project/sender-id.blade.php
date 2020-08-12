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
                    <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Sender ID</th>
                          <th>RequestedOn</th>
                          <th>Status</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                    
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>8801844532630</td>
                          <td>18-Aug-2019</td>
                          <td>Active</td>
                          <td>    
                        <button class="btn btn-primary">Make Default</button></td>
                         
                        </tr>
                     
                      </tbody>
                    </table>
                    <!-- // Data table -->
                  </div>







              	</div>
              </div>
          </div>
      </div>
  </div>
@stop