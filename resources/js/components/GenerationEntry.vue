<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="add" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Generation Step</label>
                              <input  id="exampleFormControlInput1" placeholder="Generation Step"  v-model="form.generationStep" type="text" name="generationStep" :class="{ 'is-invalid': form.errors.has('generationStep') }" class="form-control" >
                               <has-error :form="form" field="generationStep"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Generation Amount</label>
                              <input  id="exampleFormControlInput1" placeholder="Generation Amount"  v-model="form.generationAmount" type="text" name="generationAmount" :class="{ 'is-invalid': form.errors.has('generationAmount') }" class="form-control" >
                               <has-error :form="form" field="generationAmount"></has-error> 
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
                              <th>Step</th>
                              <th>Amount</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(generation, index ) in generations" :key="generation.generationId">
                               <td>{{ index+1 }}</td>
                               <td>{{ generation.generationStep}}</td>
                               <td>{{ generation.generationAmount}}</td>
                              <td>
                                 <router-link :to="{name: 'editProjectName', params: { id: generation.generationId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(generation.generationId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          generationStep: '',
          generationAmount: '',
            })  ,
          generations:[],      
        }
    },
     mounted() {
          this.generation();     
     },
    methods: {
        add(){
           this.form.post('/generation').then(response => {
              this.form.reset(); 
              this.generation(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        generation(){
            axios.get('/generation').then(res =>{
                 this.generations = res.data.generation;
              })
         },    
        deletePost(generationId){
          axios.delete(`/generation/${generationId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.generation();         
          });       
       },    
    }
  }
</script>