<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="updateComponent()" >
                        <div class="row">
                           <div class="col-md-6">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Salary Component</label>
                                 <select class="form-control"   v-model="form.salaryComponentId" id="exampleFormControlSelect1" >
                                   <option  v-for="salaryComponent in salaryComponents" :key="salaryComponent.salaryComponentId" v-bind:value=salaryComponent.salaryComponentId>{{salaryComponent.salaryComponentName}}</option>
                                 </select>
                            </div> 
                          </div>
                        </div>  
                        <div class="row">
                           <div class="col-md-6">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Fixed Salary</label>
                                 <select class="form-control"   v-model="form.fixedSalaryId" id="exampleFormControlSelect1" >
                                   <option  v-for="salary in  salaries" :key="salary.fixedSalaryId" v-bind:value=salary.amount>{{salary.amount}}</option>
                                 </select>
                            </div> 
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Amount</label>
                              <input  id="exampleFormControlInput1" placeholder="Amount"  v-model="form.amount" type="text" name="amount" :class="{ 'is-invalid': form.errors.has('amount') }" class="form-control" >
                               <has-error :form="form" field="amount"></has-error> 
                            </div>
                             
                          </div>

                        </div>
                        <!-- <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Total Salary</label>
                              <input  id="exampleFormControlInput1" placeholder="Total Salary"  v-model="form.totalSalary" type="text" name="totalSalary" :class="{ 'is-invalid': form.errors.has('totalSalary') }" class="form-control" >
                               <has-error :form="form" field="totalSalary"></has-error> 
                            </div>
                             
                          </div>

                        </div> -->
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>

                   <div class="table-responsive">
                        <table data-toggle="data-table" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Salary Component</th>
                              <th>Fixed Salary Amount</th>
                              <th>Amount</th>
                              <th>Total Salary</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(information, index ) in s" :key="information.salaryComponentInfoId">
                               <td>{{ index+1 }}</td>
                               <td v-if="information.salary_component_relation">{{ information.salary_component_relation.salaryComponentName  }}</td>
                               <td >{{ information.fixedSalaryId   }}</td>
                               <td>{{ information.amount    }}%</td>
                               <td>{{ information.totalSalary    }}</td>
                               <td>
                                 <router-link :to="{name: 'editSalaryComponentInformation', params: { id: information.salaryComponentInfoId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(information.salaryComponentInfoId)"><i class=" fa fa-trash"></i>Delete</button> 
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
           salaryComponentId:'' ,   
           fixedSalaryId:'' , 
           amount:'',
           totalSalary:''
            })  ,
          salaries:[],
          s:[], 
          salaryComponents:[],    
        }
    },
     mounted() {
          this.salaryComponent(); 
          this.information(); 
          this.salary();
          this.editComponent();     
     },
    methods: {
        editComponent(){
             axios.get(`/salaryComponentInformation/${this.$route.params.id}/edit`).then(res =>{
                 this.form.fill(res.data)
               })
         },  
        salary(){
            axios.get('/salary').then(res =>{
                 this.salaries = res.data.salary;
              })
         },  
        information(){
            axios.get('/salaryComponentInformation').then(res =>{
                 this.s = res.data.sa;
              })
         },  
        salaryComponent(){
            axios.get('/salaryComponent').then(res =>{
                 this.salaryComponents = res.data.salaryComponent;
              })
         },  
          updateComponent(){
            axios.put(`/salaryComponentInformation/${this.$route.params.id}`,this.form).then(res =>{
              this.$router.push({name: 'salaryComponentInformation'});
              Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
         },      
        deletePost(salaryComponentInfoId) {
          axios.delete(`/salaryComponentInformation/${salaryComponentInfoId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.information();         
          });       
       },    
    }
  }
</script>