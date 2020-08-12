<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <h3 class="text-h1 ribbon-heading ribbon-primary bottom-left-right">Withdraw Balance</h3>   
                     <form @submit.prevent="add" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Withdraw Type</label>
                                 <select class="form-control"   v-model="form.bloodGroup" id="exampleFormControlSelect1" >
                                   <option value="Bkash">Bkash</option>
                                   <option value="Skrill">Skrill</option>
                                   <option value="Paypel">Paypel</option>
                                   <option value="Master Card">Master Card</option>
                                   <option value="Bank">Bank</option>                                 
                                 </select>
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Amount</label>
                              <input  id="exampleFormControlInput1" placeholder="Amount"  v-model="form.shopTypeName" type="text" name="shopTypeName" :class="{ 'is-invalid': form.errors.has('shopTypeName') }" class="form-control" >
                               <has-error :form="form" field="shopTypeName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Transection Password</label>
                              <input  id="exampleFormControlInput1" placeholder="Transection Password"  v-model="form.shopCondition" type="text" name="shopCondition" :class="{ 'is-invalid': form.errors.has('shopCondition') }" class="form-control" >
                               <has-error :form="form" field="shopCondition"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>

                   <div class="table-responsive">
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Withdraw_Type</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                               <!--   -->
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
          shopTypeCode:'',
          shopTypeName:'',
          shopCondition:''
            })  ,
          conditions:[],      
        }
    },
     mounted() {
          this.condition();     
     },
    methods: {
        add(){
           this.form.post('/shopTypeCondition').then(response => {
              this.form.reset(); 
              this.condition(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        condition(){
            axios.get('/shopTypeCondition').then(res =>{
                 this.conditions = res.data.condition;
              })
         },    
        deletePost(shopTypeConditionId){
          axios.delete(`/shopTypeCondition/${shopTypeConditionId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.condition();         
          });       
       },    
    }
  }
</script>