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
          
                    <!-- // Data table -->
                  <div class="panel-body">
                  

                      <h5>Sender Campaign Category</h5>
                          <div class="form-group">
                              <select style="width: 100%;" data-toggle="select2">                         
                             <option value=""></option>     
                        </select>
                      </div>
                       
                 
                      <h5>Sender Operator</h5>
                          <div class="form-group">
                              <select style="width: 100%;" data-toggle="select2">                         
                             <option value=""></option>     
                        </select>
                      </div>
                      <p>
                        
                        <button class="btn btn-primary"><i class=" fa fa-plus"></i> ADD</button>
                        <button class="btn btn-success"><i class=" fa fa-rotate-left"></i> Reset</button>
                        
                      </p>
                    
                    </div>




                  </div>







                </div>
              </div>
          </div>
      </div>
  </div>
@stop