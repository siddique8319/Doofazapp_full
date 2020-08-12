@extends('project/inc/header')

          @section('content')
<div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container-fluid">
<h5>Flexiload > Buy Package</h5>
           
            <div class="row" data-toggle="isotope">

              <div class="item col-xs-12 col-md-9"  style="width:610px">
                   <div class="tabbable tabs-blocks">

                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#gp" data-toggle="tab"> <img src="{{asset('frontendadmin/images/gp3.jpg')}}" alt="" style="height: 20px ; width:auto" /> </br>Grameenphone</a></li>
                      <li><a href="#robi" data-toggle="tab"><img src="{{asset('frontendadmin/images/robi1.jpg')}}" alt="" style="height: 20px ; width:auto" /> </br>Robi</a></li>
                      <li><a href="#airtel" data-toggle="tab"><img src="{{asset('frontendadmin/images/airtel.jpg')}}" alt="" style="height: 20px ; width:auto" /> </br>Airtel</a></li>
                      <li><a href="#teletalk" data-toggle="tab"><img src="{{asset('frontendadmin/images/teletalk.jpg')}}" alt="" style="height: 20px ; width:auto" /> </br>Teletalk</a></li>
                    </ul>
                    <!-- // END Tabs -->

                    <!-- Panes -->
                    <div class="tab-content">
                      <div id="gp" class="tab-pane active">
                         <div class="tabbable tabs-primary">

                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#gp-minute" data-toggle="tab" style="height:35px; width:auto; color:black "> Minute</a></li>
                      <li><a href="#gp-data" data-toggle="tab" style="height:35px; width:auto; color:black ">Data</a></li>
                      <li><a href="#gp-sms" data-toggle="tab"style="height:35px; width:auto; color:black "> SMS</a></li>
                    
                    </ul>
                    <!-- // END Tabs -->

                    <!-- Panes -->
                    <div class="tab-content">
                      <div id="gp-minute" class="tab-pane active">
                        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Details</th>
                          <th>price</th>
                          <th>validaty</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>655 Min + 2 GB</td>
                          <td>378 Tk</td>
                         <td>30 Days Tk</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Buy Now</button></td>
                        </tr>
                            <tr>
                          <td>1</td>
                          <td>655 Min + 2 GB</td>
                          <td>378 Tk</td>
                         <td>30 Days Tk</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Buy Now</button></td>
                        </tr>
                      </tbody>
                    </table>
                      </div>
                      <div id="gp-data" class="tab-pane">
                       <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Grameenphone</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                            <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                      <div id="gp-sms" class="tab-pane">
                        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
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
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Grameenphone</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                    </div>
                    <!-- // END Panes -->

                  </div>
                      </div>
                      <div id="robi" class="tab-pane">
                       <div class="tabbable tabs-primary">

                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#robi-minute" data-toggle="tab" style="height:35px; width:auto "> Minute</a></li>
                      <li><a href="#robi-data" data-toggle="tab" style="height:35px; width:auto ">Data</a></li>
                      <li><a href="#robi-sms" data-toggle="tab"style="height:35px; width:auto "> SMS</a></li>
                    
                    </ul>
                    <!-- // END Tabs -->

                    <!-- Panes -->
                    <div class="tab-content">
                      <div id="robi-minute" class="tab-pane active">
                        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
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
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                      <div id="robi-data" class="tab-pane">
                       <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>robi</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                            <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                      <div id="robi-sms" class="tab-pane">
                        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
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
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>robi</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                    </div>
                    <!-- // END Panes -->

                  </div>
                      </div>
                      <div id="airtel" class="tab-pane">
                       <div class="tabbable tabs-primary">

                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#airtel-minute" data-toggle="tab" style="height:35px; width:auto "> Minute</a></li>
                      <li><a href="#airtel-data" data-toggle="tab" style="height:35px; width:auto ">Data</a></li>
                      <li><a href="#airtel-sms" data-toggle="tab"style="height:35px; width:auto "> SMS</a></li>
                    
                    </ul>
                    <!-- // END Tabs -->

                    <!-- Panes -->
                    <div class="tab-content">
                      <div id="airtel-minute" class="tab-pane active">
                        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
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
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                      <div id="airtel-data" class="tab-pane">
                       <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
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
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                      <div id="airtel-sms" class="tab-pane">
                        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
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
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                    </div>
                    <!-- // END Panes -->

                  </div>
                      </div>
                      <div id="teletalk" class="tab-pane">
                       <div class="tabbable tabs-primary">

                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#teletalk-minute" data-toggle="tab" style="height:35px; width:auto "> Minute</a></li>
                      <li><a href="#teletalk-data" data-toggle="tab" style="height:35px; width:auto ">Data</a></li>
                      <li><a href="#teletalk-sms" data-toggle="tab"style="height:35px; width:auto "> SMS</a></li>
                    
                    </ul>
                    <!-- // END Tabs -->

                    <!-- Panes -->
                    <div class="tab-content">
                      <div id="teletalk-minute" class="tab-pane active">
                        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Teletalk</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                            <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                      <div id="teletalk-data" class="tab-pane">
                       <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Teletalk</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                            <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                      <div id="teletalk-sms" class="tab-pane">
                        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Campagin ID</th>
                          <th>Time</th>
                          <th>Total Number</th>
                          <th>Total price</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                       <tfoot>
                        <tr >
                          <th colspan="3">Total Flexiload Price of this month :</th>
                        
                          <th></th>
                          <th>0 TK</th>
                          <th></th>
                        </tr>
                      </tfoot>
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
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                    </div>
                    <!-- // END Panes -->

                  </div>
                      </div>
                    </div>
                    <!-- // END Panes -->

                  </div>

              </div>

            

            


          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>


          @stop