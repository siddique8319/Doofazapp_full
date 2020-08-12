<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10 " >                
                <div class="panel panel-default">
                   
                    <h3 class="text-h1 ribbon-heading ribbon-primary bottom-left-right">Balance Sheet</h3>         
                                 
                                    
                   <div class="table-responsive">
                     
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Direct_Sale</th>
                              <th>Team_Sale</th>
                              <th>Sales_Comission</th>
                              <th>Monthly</th>
                              <th>Incentive</th> 
                            </tr>
                          </thead>
                          <tbody>
                            <tr >
                               <td>1</td>
                               <td>100</td>
                               <td>20</td>
                               <td>1000</td>
                               <td>200</td>
                               <td>20</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>

</template>

<script>

    export default {
        data(){
        return {
          form: new Form({
                  
            })  ,         
          
        }
    },
     mounted() {
         
           
     },
    methods: {
           
    }
  }
</script>