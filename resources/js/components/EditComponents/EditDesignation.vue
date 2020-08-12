<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="updateDesignation" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Designation</label>
                              <input  id="exampleFormControlInput1" placeholder="Designation"  v-model="form.designationName" type="text" name="designationName" :class="{ 'is-invalid': form.errors.has('designationName') }" class="form-control" >
                               <has-error :form="form" field="designationName"></has-error> 
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
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(designation, index ) in designations" :key="designation.designationId">
                               <td>{{ index+1 }}</td>
                               <td>{{ designation.designationName }}</td>
                              <td>
                                 <router-link :to="{name: 'editDesignation', params: { id: designation.designationId }}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(designation.designationId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          designationName: '',
            })  ,
          designations:[],      
        }
    },
     mounted() {
          this.designation(); 
          this.editDesignation();    
     },
    methods: {
        editDesignation(){
             axios.get(`/designation/${this.$route.params.id}/edit`).then(res =>{
                 this.form.fill(res.data)
               })
         },  
        designation(){
            axios.get('/designation').then(res =>{
                 this.designations = res.data.designation;
              })
         },
         updateDesignation(){
            axios.put(`/designation/${this.$route.params.id}`,this.form).then(res =>{
              this.$router.push({name: 'designation'});
              Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
         },        
        deletePost(designationId){
          axios.delete(`/designation/${designationId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.designation();         
          });       
       },    
    }
  }
</script>