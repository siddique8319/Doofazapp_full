<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="updateIncentive" >
                       <div class="row">
                           <div class="col-md-6">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Designation</label>
                                 <select class="form-control"   v-model="form.designationId" id="exampleFormControlSelect1" >
                                   <option  v-for="designation in designations" :key="designation.designationId" v-bind:value=designation.designationId>{{designation.designationName}}</option>
                                 </select>
                            </div> 
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Incentive</label>
                              <input  id="exampleFormControlInput1" placeholder="Incentive"  v-model="form.incentiveName" type="text" name="incentiveName" :class="{ 'is-invalid': form.errors.has('incentiveName') }" class="form-control" >
                               <has-error :form="form" field="incentiveName"></has-error> 
                            </div>
                             
                          </div>

                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Amount</label>
                              <input  id="exampleFormControlInput1" placeholder="Amount"  v-model="form.incentiveAmount" type="text" name="incentiveAmount" :class="{ 'is-invalid': form.errors.has('incentiveAmount') }" class="form-control" >
                               <has-error :form="form" field="incentiveAmount"></has-error> 
                            </div>
                             
                          </div>

                        </div>
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>

                   <div class="table-responsive">
                        <table data-toggle="data-table" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Designation</th>
                              <th>Incentive_Name</th>
                              <th>Amount</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(incentive, index ) in incentives" :key="incentive.incentiveId">
                               <td>{{ index+1 }}</td>
                               <td v-if="incentive.designation_relation">{{ incentive.designation_relation.designationName }}</td>
                               <td>{{ incentive.incentiveName }}</td>
                               <td>{{ incentive.incentiveAmount }}</td>
                              <td>
                                 <router-link :to="{name: 'editIncentiveEntry', params: { id: incentive.incentiveId }}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(incentive.incentiveId)"><i class=" fa fa-trash"></i>Delete</button> 
                              </td>
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
           designationId:'', 
           incentiveName:'' ,   
           incentiveAmount:''
            })  ,
          incentives:[],  
          designations:[],    
        }
    },
     mounted() {
          this.incentive(); 
          this.designation(); 
          this.editIncentive();   
     },
    methods: {
        editIncentive(){
             axios.get(`/incentive/${this.$route.params.id}/edit`).then(res =>{
                 this.form.fill(res.data)
               })
         }, 
        incentive(){
            axios.get('/incentive').then(res =>{
                 this.incentives = res.data.incentive;
              })
         },  
          designation(){
            axios.get('/designation').then(res =>{
                 this.designations = res.data.designation;
              })
         }, 
         updateIncentive(){
            axios.put(`/incentive/${this.$route.params.id}`,this.form).then(res =>{
              this.$router.push({name: 'incentiveEntry'});
              Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
         },        
        deletePost(incentiveId){
          axios.delete(`/incentive/${incentiveId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.incentive();         
          });       
       },    
    }
  }
</script>