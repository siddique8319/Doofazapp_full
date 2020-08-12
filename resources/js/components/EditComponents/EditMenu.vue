<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="updateMenu" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Menu</label>
                              <input  id="exampleFormControlInput1" placeholder="Menu"  v-model="form.menuName" type="text" name="menuName" class="form-control">
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
                              <th>Menu</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(menu, index ) in menus" :key="menu.menuId">
                               <td>{{ index+1 }}</td>
                               <td>{{ menu.menuName }}</td>
                              <td>
                                 <router-link :to="{name: 'editMenu', params: { id: menu.menuId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(menu.menuId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          menuName:''
            })  ,
          menus:[],      
        }
    },
     mounted() {
          this.menu();     
          this.editMenu();
     },
    methods: {        
        menu(){
            axios.get('/menu').then(res =>{
                 this.menus = res.data.menu;
              })
         },
        editMenu(){
             axios.get(`/menu/${this.$route.params.id}/edit`).then(res =>{
                 this.form.fill(res.data)
               })
         },  
        updateMenu(){
            axios.put(`/menu/${this.$route.params.id}`,this.form).then(res =>{
              this.$router.push({name: 'addMenu'});
              Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
         },     
        deletePost(menuId){
          axios.delete(`/menu/${menuId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.menu();         
          });       
       },    
    }
  }
</script>