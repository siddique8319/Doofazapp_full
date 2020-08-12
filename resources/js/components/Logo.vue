<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="add" >        
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Upload Logo</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" @change="changeImage($event)"  name="image">
                           <img :src="form.image" class="img-responsive" height="70" width="90">
                        </div>                                        
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>
                   <div class="table-responsive">
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>                               
                              <th>Logo</th>                                                    
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(logo, index ) in logos" :key="logo.id">
                               <td>{{ index+1 }}</td>                              
                                <td><img :src="'/images/'+logo.image" class="img-responsive" height="70" width="90"></td>                                                                      
                               <td>                                
                                <button  class="btn btn-danger" @click.prevent="deletePost(logo.id)"><i class=" fa fa-trash"></i>Delete</button> 
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
           image:'' ,   
            })  ,          
           logos:[],    

        }
    },
     mounted() {
          this.logo(); 
          
     },
    methods: {
        add(){
           this.form.post('/logo').then(response => {
              this.form.reset(); 
              this.logo(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        logo(){
            axios.get('/logo').then(res =>{
                 this.logos = res.data.logo;
              })
         }, 
         changeImage(event) {
                let file = event.target.files[0];
                let reader = new FileReader();
                reader.onload = event => {
                     this.form.image = event.target.result;
                     console.log( event.target.result)
                    };
                reader.readAsDataURL(file);
        
            },           
                
        deletePost(id) {
          axios.delete(`/logo/${id}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.logo();         
          });       
       },    
    }
  }
</script>