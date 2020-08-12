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
                          <th>Country</th>
                          <th>Operator</th>
                          <th>Masking</th>
                          <th>NonMasking</th>
                          <th>Status</th>
                        
                        </tr>
                      </thead>
                    
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                         <tr>
                          <td>2</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                         <tr>
                          <td>3</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                         <tr>
                          <td>4</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                         <tr>
                          <td>5</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
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