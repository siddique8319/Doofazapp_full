<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="updateProject" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group" :class="{ 'has-error': form.errors.has('projectType') }">
                              <label for="exampleFormControlInput1">Project Type</label>
                              <input  id="exampleFormControlInput1" placeholder="Project Type"  v-model="form.projectType" type="text" name="projectType" :class="{ 'is-invalid': form.errors.has('projectType') }" class="form-control" >
                               <has-error :form="form" field="projectType"></has-error> 
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
                              <th>Project Type</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(project, index ) in projects" :key="project.projectTypeId">
                               <td>{{ index+1 }}</td>
                               <td>{{ project.projectType }}</td>
                              <td>
                                 <router-link :to="{name: 'editProjectType', params: { id:project.projectTypeId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(project.projectTypeId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          projectType: '',
            })  ,
          projects:[],      
        }
    },
     mounted() {
          this.project(); 
          this.editProject() ;    
     },
    methods: {
         editProject(){
            axios.get(`/projectType/${this.$route.params.id}/edit`).then(res =>{
                this.form.fill(res.data)
              })
         }, 
         updateProject(){
            axios.put(`/projectType/${this.$route.params.id}` ,this.form).then(res =>{
              this.$router.push({name: 'projectType'});
               Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })},
        project(){
            axios.get('/projectType').then(res =>{
                 this.projects = res.data.project;
              })
         },    
        deletePost(projectTypeId){
          axios.delete(`/projectType/${projectTypeId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.project();         
          });       
       },    
    }
  }
</script>