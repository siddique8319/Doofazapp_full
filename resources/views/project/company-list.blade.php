@extends('project/inc/header')
@section('content')

<div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container-fluid">
        <h5>Phonebook > Phonebook Group List</h5>
           
            <div class="row" data-toggle="isotope">

              <div class="item col-xs-12 col-md-9" style="width: 610px">
                 <p>
                        
                        <button class="btn btn-primary"> Add new book </button>
                        <button class="btn btn-success">Import Contact</button>
                         <button class="btn btn-danger">Add Single Contact </button>


                        <button class="btn btn-primary">Download Excel Demo </button>
                      </p>
                 <div class="panel panel-default">
                    <!-- Data table -->
                    <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Company </th>
                          <th>Todays SMS</th>
                          <th>Delivered SMS</th>
                          <th>Failed SMS </th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                    
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>DoofazIT</td>
                          <td>100</td>
                          <td>50</td>
                          <td>50</td>
                         <td><button class="btn btn-primary" style="width:90px">View More </button></td>
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