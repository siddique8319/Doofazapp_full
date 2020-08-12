<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="add" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group"  :class="{ 'has-error': form.errors.has('salaryComponentName') }">
                              <label for="exampleFormControlInput1">Salary Component</label>
                              <input  id="exampleFormControlInput1" placeholder="Salary Component"  v-model="form.salaryComponentName" type="text" name="salaryComponentName" :class="{ 'is-invalid': form.errors.has('salaryComponentName') }" class="form-control" >
                               <has-error :form="form" field="salaryComponentName"></has-error> 
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
                              <th>Salary Component</th>
                               <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(salaryComponent, index ) in salaryComponents" :key="salaryComponent.salaryComponentId">
                               <td>{{ index+1 }}</td>
                               <td>{{ salaryComponent.salaryComponentName }}</td>
                               <td>{{salaryComponent.status}}</td>
                              <td>
                                 <router-link :to="{name: 'editSalaryComponent', params: { id: salaryComponent.salaryComponentId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(salaryComponent.salaryComponentId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          salaryComponentName: '',
            })  ,
          salaryComponents:[],      
        }
    },
     mounted() {
          this.salaryComponent();     
     },
    methods: {
        add(){
           this.form.post('/salaryComponent').then(response => {
              this.form.reset(); 
              this.salaryComponent(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        salaryComponent(){
            axios.get('/salaryComponent').then(res =>{
                 this.salaryComponents = res.data.salaryComponent;
              })
         },    
        deletePost(salaryComponentId){
          axios.delete(`/salaryComponent/${salaryComponentId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.salaryComponent();         
          });       
       },    
    }
  }
</script>