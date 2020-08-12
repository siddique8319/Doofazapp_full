<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="updateSoftware" >
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Title</label>
                              <input  id="exampleFormControlInput1" placeholder="Title"  v-model="form.title" type="text" name="title" :class="{ 'is-invalid': form.errors.has('title') }" class="form-control" >
                               <has-error :form="form" field="title"></has-error> 
                            </div>                             
                          </div>
                        </div>    
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Price</label>
                              <input  id="exampleFormControlInput1" placeholder="Price"  v-model="form.price" type="text" name="price" :class="{ 'is-invalid': form.errors.has('price') }" class="form-control" >
                               <has-error :form="form" field="price"></has-error> 
                            </div>                             
                          </div>
                        </div>    
                         <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Image</label>                            
                              <input type="file" class="form-control-file" id="exampleFormControlFile1" @change="changeImage($event)"  name="image">
                              <img :src="OurPhoto()" name="image" class="img-responsive" height="70" width="90">                      
                        </div>
                                          
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>

                   <div class="table-responsive">
                        <table data-toggle="data-table" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Title</th>                              
                              <th>Price</th>  
                              <th>Image</th> 
                              <th>Status</th>                          
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(software, index ) in softwares" :key="software.id">
                               <td>{{ index+1 }}</td>
                               <td>{{ software.title }}</td>                             
                               <td>{{ software.price   }}</td> 
                               <td><img :src="'/images/'+software.image" class="img-responsive" height="70" width="90"></td>  
                                <td v-if="software.status==0">                                             
                                   <button  type="button" class="btn btn-success waves-effect waves-light" v-on:click="changePermission(software.id)">Active</button>                             
                                </td>
                                <td v-else>
                                  <button type="button" class="btn btn-danger waves-effect waves-light" v-on:click="changePermission(software.id)"><i class="mdi mdi-close"></i>Deactive</button>                             
                                 </td>                            
                                 <td>
                                 <router-link :to="{name: 'editSoftware', params: { id: software.id}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(software.id)"><i class=" fa fa-trash"></i>Delete</button> 
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
           title:'' ,   
           image:'' , 
           price:'',
          
            })  ,          
           softwares:[],      

        }
    },
     mounted() {
          this.software();            
          this.editSoftware() ;
     },
    methods: {
       editSoftware(){
            axios.get(`/software/${this.$route.params.id}/edit`).then(res =>{
                this.form.fill(res.data)
              })
         }, 
         updateSoftware(){
            axios.put(`/software/${this.$route.params.id}` ,this.form).then(res =>{
              this.$router.push({name: 'software'});
               Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
      },  
            
        software(){
            axios.get('/software').then(res =>{
                 this.softwares = res.data.software;
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
          OurPhoto(){
         let photo = this.form.image;
         if (photo.length >100 ){
              return this.form.image;
         }
         else{
           return `images/${this.form.image}`
         }
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
         changePermission(id){ 
          axios.get(`/software/${id}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Change Status!!!!'
              });   
            this.software();      
          });   
        },          
        deletePost(id) {
          axios.delete(`/software/${id}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.software();         
          });       
       },    
    }
  }
</script>