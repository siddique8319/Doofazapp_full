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
                 
                    <table data-toggle="data-table" class="table table-responsive" cellspacing="1" width="200%">
                      <thead style="background:#e4e6ed ">
                        <tr >
                          <th>SL</th>
                          <th >Select Category</th>                         
                          <th>Numbers</th>
                        
                        </tr>
                      </thead>
                     
                      <tbody>
                      
                             <tr>
                          <td>1</td>
                          <td>  
                            <label style="text-indent: 1px" >
                             <input type="radio" name="optradio" checked >
                               Association_BAIRA</label>
                            </td>
                          
                          <td>1267</td>
                        
                        </tr>

                       <tr>
                          <td>1</td>
                          <td>  
                             <label style="text-indent: 1px" >  <input type="radio" name="optradio" >
                             Association_BAIRA</label>
                            </td>
                          
                          <td>1267</td>
                        
                        </tr><tr>
                          <td>1</td>
                          <td>  
                            <label style="text-indent: 1px" >
                             <input type="radio" name="optradio" >
                             Association_BAIRA</label>
                            </td>
                          
                          <td>1267</td>
                        
                        </tr><tr>
                          <td>1</td>
                          <td>  
                            <label style="text-indent: 1px" >
                             <input type="radio" name="optradio"  >
                            Association_BAIRA</label>
                            </td>
                          
                          <td>1267</td>
                        
                        </tr><tr>
                          <td>1</td>
                          <td> 
                          <label style="text-indent: 1px" > 
                             <input type="radio" name="optradio" >
                             Association_BAIRA</label>
                            </td>
                          
                          <td>1267</td>
                        
                        </tr><tr>
                          <td>1</td>
                          <td> 
                          <label style="text-indent: 1px" > 
                             <input type="radio" name="optradio"  >
                             Association_BAIRA</label>
                            </td>
                          
                          <td>1267</td>
                        
                        </tr>
                      </tbody>
                    </table>
                    <!-- // Data table -->
                  <div class="panel-body">
                     <div class="row">
                          <div class="col-md-6">
                            <div class="form-group form-control-default">
                              <label for="exampleInputFirstName">From</label>
                              <input type="email" class="form-control" id="exampleInputFirstName" >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group form-control-default">
                              <label for="exampleInputLastName">To</label>
                              <input type="email" class="form-control" id="exampleInputLastName">
                            </div>
                          </div>
                        </div>

                      <h5>Sender ID</h5>
                          <div class="form-group">
                              <select style="width: 100%;" data-toggle="select2">                         
                             <option value="">8801789797953</option>     
                        </select>
                      </div>
                       <h5>Cell phone</h5>
                    <div class="form-group">
                                                  
                            <textarea class="form-control" rows="5"></textarea>                                                 </div>               
                    
                        <h5>Select SMS Type</h5>
  
                      <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                        <label for="inlineRadio1">Text</label>
                      </div>
                      <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                        <label for="inlineRadio2">Flash</label>
                      </div>
                      <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio3" value="option3" name="radioInline">
                        <label for="inlineRadio3">Flash Unicode</label>
                      </div>
                    <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio4" value="option4" name="radioInline">
                        <label for="inlineRadio4">Unicode</label>
                      </div>
                    <h5>Enter SMS Content</h5>
                    <div class="form-group">
                                                  
                    <textarea class="form-control" rows="5"></textarea>                                                 </div>    
                              <h5>Schedule SMS</h5>
                              <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio5" value="option5" name="radioInline" >
                        <label for="inlineRadio5">Send Now</label>
                      </div>
                      <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio6" value="option6" name="radioInline">
                        <label for="inlineRadio6">Send Later</label>
                      </div>  
                  <h5>Compaign Title</h5>
                   <div class="form-group">
                        
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Type here..">
                        
                        </div>
                        
                      <p>
                        
                        <button class="btn btn-primary"><i class=" fa fa-location-arrow"></i> Send SMS</button>
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