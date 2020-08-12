<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="update()" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Income Type</label>
                              <input  id="exampleFormControlInput1" placeholder="Income Type"  v-model="form.incomeTypeName" type="text" name="incomeTypeName" :class="{ 'is-invalid': form.errors.has('incomeTypeName') }" class="form-control" >
                               <has-error :form="form" field="incomeTypeName"></has-error> 
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
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(incomeType, index ) in incomeTypes" :key="incomeType.incomeTypeId">
                               <td>{{ index+1 }}</td>
                               <td>{{ incomeType.incomeTypeName }}</td>
                              <td>
                                 <router-link :to="{name: 'editIncomeType', params: { id: incomeType.incomeTypeId }}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(incomeType.incomeTypeId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          incomeTypeName: '',
            })  ,
          incomeTypes:[],      
        }
    },
     mounted() {
          this.incomeType();  
          this.edit() ;  
     },
    methods: {
        edit(){
             axios.get(`/incomeType/${this.$route.params.id}/edit`).then(res =>{
                 this.form.fill(res.data)
               })
         },  
        update(){
            axios.put(`/incomeType/${this.$route.params.id}`,this.form).then(res =>{
              this.$router.push({name: 'incomeType'});
              Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
         },     
        add(){
           this.form.post('/incomeType').then(response => {
              this.form.reset(); 
              this.incomeType(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        incomeType(){
            axios.get('/incomeType').then(res =>{
                 this.incomeTypes = res.data.incomeType;
              })
         },    
        deletePost(incomeTypeId){
          axios.delete(`/incomeType/${incomeTypeId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.incomeType();         
          });       
       },    
    }
  }
</script>