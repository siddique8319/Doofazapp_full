@extends('project/inc/header')
@section('content')

<div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container-fluid">
        <h5>Phonebook > Phonebook Group List</h5>
           
            <div class="row" data-toggle="isotope">

              <div class="item col-xs-12 col-md-9" style="width: 610px">
                 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
         
                 <p>
                       
                        
                        <button data-toggle="modal" data-target="#exampleModal"    class="btn btn-primary"><i class=" fa fa-plus"></i> Add new group </button>
                        <button class="btn btn-success"><i class=" fa fa-repeat"></i> Import Contact</button>
                         <button class="btn btn-danger"><i class="fa fa-plus"></i>Add Single Contact </button>
                      </p>
                 <div class="panel panel-default">
                    <!-- Data table -->
                    <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Group Name</th>
                          <th>Contact</th>
                          <th>Data</th>
                          <th>Action</th>
                          <th>System</th>
                        
                        </tr>
                      </thead>
                    
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   
                        <button class="btn btn-primary" style="height:30px;">Approved </button></td>
                        </tr>
                         
                            <tr>
                          <td>2</td>
                          <td>Bangladesh</td>
                          <td>Airtel</td>
                          <td> 0.5 </td>
                          <td>0.25</td>
                         <td>   
                        <button class="btn btn-primary" style="height:30px;">Approved </button></td>
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