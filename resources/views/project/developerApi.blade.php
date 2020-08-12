@extends('project/inc/header')
@section('content')

<div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container-fluid">

           
            <div class="row" data-toggle="isotope">

              <div class="item col-xs-12 col-md-9" style="width: 610px">
              

                     <div class="item col-xs-12 col-md-8" style="width: 610px">
                            <div class="panel panel-default">
                              <h3 style="color:green">Text SMS API</h3>
                              <p style="color:green">Your API Key : 44515732797792871573279779
                                      <button class="btn btn-success">Change Api Key</button>
                              </p>
                                </div>
                           </div>
                     <div class="item col-xs-12 col-md-8" style="width: 610px">
                           <div class="panel panel-default">
                              <p style="color:green">API URL (GET & POST) : http://sms.doofazit.com/api/v1/send?api_key=(API KEY)&contacts=(NUMBER)&senderid=(Approved Sender ID)&msg=(Message Content)

                              </p>
                                </div>
                           </div>

                     <div class="item col-xs-12 col-md-8" style="width: 610px">
                           <div class="panel panel-default">
                                 <h3 >Credit Balance API</h3>
                             
                           <table data-toggle="data-table" class="table table-responsive" cellspacing="1" width="200%">
                      <thead style="background:#e4e6ed ">
                        <tr >
                          <th>Parameter_Name</th>
                          <th >Meaning/Value  </th>                         
                          <th>Description</th>
                        
                        </tr>
                      </thead>
                     
                      <tbody>
                      
                             <tr>
                          <td>api_key</td>
                          <td>API Key</td>                          
                          <td>Your API Key (44515732797792871573279779)</td>
                        
                        </tr>

                             <tr>
                          <td>contacts</td>
                          <td>mobile numbe</td>                          
                          <td>Exp: 88017XXXXXXXX,88018XXXXXXXX,88019XXXXXXXX...</td>
                        
                        </tr>

                             <tr>
                          <td>msg</td>
                          <td>SMS body</td>                          
                          <td>N.B: Please use url encoding to send some special characters like &, $, @ etc</td>
                        
                        </tr>



                       
                      </tbody>
                    </table>

                                </div>
                           </div>


                              <div class="item col-xs-12 col-md-8" style="width: 610px">
                            <div class="panel panel-default">
                              <h3 style="color:green">Credit Balance API</h3>
                              <p style="color:green">
                                API URL : http://sms.doofazit.com/api/v1/balance?api_key=(API KEY)</br>
                                API URL : Your API Key ( 44515732797792871573279779 )
                              </p>
                                </div>
                           </div>





                </div>
              </div>
          </div>
      </div>
  </div>
@stop