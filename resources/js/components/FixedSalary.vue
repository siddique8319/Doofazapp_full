<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="add" >
                        <div class="row">
                           <div class="col-md-6">  
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('designationId') }"  >
                                <label for="exampleFormControlSelect1">Select Designation</label>
                                 <select class="form-control"   v-model="form.designationId" id="exampleFormControlSelect1"  name="designationId" :class="{ 'is-invalid': form.errors.has('designationId') }">
                                   <option  v-for="designation in designations" :key="designation.designationId" v-bind:value=designation.designationId>{{designation.designationName}}</option>
                                 </select>
                                  <has-error :form="form" field="designationId"></has-error>
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
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>

                   <div class="table-responsive">
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Designartion</th>
                              <th>Amount</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(salary, index ) in salaries" :key="salary.fixedSalaryId">
                               <td>{{ index+1 }}</td>
                               <td v-if="salary.designation_relation">{{ salary.designation_relation.designationName}}</td>
                               <td>{{ salary.amount }}</td>
                                <td>{{ salary.status }}</td>
                              <td>
                                 <router-link :to="{name: 'editFixedSalaryEntry', params: { id: salary.fixedSalaryId }}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(salary.fixedSalaryId)"><i class=" fa fa-trash"></i>Delete</button> 
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
           designationId:'' ,   
           amount:''
            })  ,
          salaries:[],
          designations:[],      
        }
    },
     mounted() {
          this.designation(); 
          this.salary();     
     },
    methods: {
        add(){
           this.form.post('/salary').then(response => {
              this.form.reset(); 
              this.salary(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        salary(){
            axios.get('/salary').then(res =>{
                 this.salaries = res.data.salary;
              })
         },  
        designation(){
            axios.get('/designation').then(res =>{
                 this.designations = res.data.designation;
              })
         },    
        deletePost(fixedSalaryId){
          axios.delete(`/salary/${fixedSalaryId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.salary();         
          });       
       },    
    }
  }
</script>