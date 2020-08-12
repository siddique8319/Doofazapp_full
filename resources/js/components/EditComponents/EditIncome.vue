<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="update()" >
                        <div class="row">
                           <div class="col-md-6">  
                             <div class="form-group" :class="{ 'has-error': form.errors.has('incomeTypeId') }" >
                                <label for="exampleFormControlSelect1">Select Income Type</label>
                                 <select class="form-control"   v-model="form.incomeTypeId" id="exampleFormControlSelect1" name="incomeTypeId" :class="{ 'is-invalid': form.errors.has('incomeTypeId') }" >
                                   <option  v-for="incomeType in incomeTypes" :key="incomeType.incomeTypeId" v-bind:value=incomeType.incomeTypeId>{{incomeType.incomeTypeName}}</option>
                                 </select>
                                  <has-error :form="form" field="incomeTypeId"></has-error>
                            </div> 
                          </div>
                        </div> 
                         <div class="row">
                           <div class="col-md-8">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Project Type</label>
                                 <select class="form-control"   v-model="form.projectTypeId" id="exampleFormControlSelect1" name="projectTypeId" :class="{ 'is-invalid': form.errors.has('projectTypeId') }" >
                                   <option  v-for="project in projects" :key="project.projectTypeId" v-bind:value=project.projectTypeId>{{project.projectType}}</option>
                                 </select>
                                  <has-error :form="form" field="designationId"></has-error>
                            </div> 
                          </div>
                        </div>   
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Income Name</label>
                              <input  id="exampleFormControlInput1" placeholder="Income Name"  v-model="form.incomeName" type="text" name="incomeName" :class="{ 'is-invalid': form.errors.has('incomeName') }" class="form-control" >
                               <has-error :form="form" field="incomeName"></has-error> 
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
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Icon</label>
                              <input  id="exampleFormControlInput1" placeholder="Icon"  v-model="form.icon" type="text" name="icon" :class="{ 'is-invalid': form.errors.has('icon') }" class="form-control" >
                               <has-error :form="form" field="icon"></has-error> 
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
                              <th>Income Type</th>
                               <th>Project Type</th>
                              <th>Income Name</th>
                              <th>Amount</th>                            
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(income, index ) in incomes" :key="income.id">
                               <td>{{ index+1 }}</td>
                                 <td v-if="income.income_relation">{{ income.income_relation.incomeTypeName }}</td>
                               <td v-for="project in projects" :key="project.projectTypeId" v-if="project.projectTypeId==income.projectTypeId">{{ project.projectType }}</td>
                               <td>{{ income.incomeName   }}</td>
                               <td>{{ income.amount   }}</td>                              
                               <td>
                                 <router-link :to="{name: 'editIncome', params: { id: income.id}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(income.id)"><i class=" fa fa-trash"></i>Delete</button> 
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
            projectTypeId:'' , 
           incomeTypeId:'' ,   
           incomeName:'' , 
           amount:'',
           icon:''
          
            })  ,          
           incomes:[],           
           incomeTypes:[] , 
          projects:[], 
        }
    },
     mounted() {
          this.income(); 
          this.incomeType(); 
          this.editIncome() ;  
           this.project();
     },
    methods: {
       editIncome(){
             axios.get(`/income/${this.$route.params.id}/edit`).then(res =>{
                 this.form.fill(res.data)
               })
         },
        update(){
            axios.put(`/income/${this.$route.params.id}`,this.form).then(res =>{
              this.$router.push({name: 'income'});
              Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
         },       
        income(){
            axios.get('/income').then(res =>{
                 this.incomes = res.data.income;
              })
         },  
         incomeType(){
            axios.get('/incomeType').then(res =>{
                 this.incomeTypes = res.data.incomeType;
              })
         },  
         project(){
            axios.get('/projectType').then(res =>{
                 this.projects = res.data.project;
              })
         },      
        deletePost(id) {
          axios.delete(`/income/${id}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.income();         
          });       
       },    
    }
  }
</script>