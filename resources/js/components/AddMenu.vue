<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="add" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Menu</label>
                              <input  id="exampleFormControlInput1" placeholder="Menu"  v-model="form.menuName" type="text" name="menuName" :class="{ 'is-invalid': form.errors.has('menuName') }" class="form-control" >
                               <has-error :form="form" field="menuName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Url</label>
                              <input  id="exampleFormControlInput1" placeholder="Menu Url"  v-model="form.menuUrl" type="text" name="menuUrl" :class="{ 'is-invalid': form.errors.has('menuUrl') }" class="form-control" >
                               <has-error :form="form" field="menuUrl"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Position</label>
                              <input  id="exampleFormControlInput1" placeholder="Menu Position"  v-model="form.menuPosition" type="text" name="menuPosition" :class="{ 'is-invalid': form.errors.has('menuPosition') }" class="form-control" >
                               <has-error :form="form" field="menuPosition"></has-error> 
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
                              <th>Menu</th>
                              <th>Position</th>
                              <th>URL</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(menu, index ) in menus" :key="menu.menuId">
                               <td>{{ index+1 }}</td>
                               <td>{{ menu.menuName }}</td>
                               <td>{{ menu.menuPosition }}</td>
                               <td>{{ menu.menuUrl }}</td>
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
          menuName:'',
          menuPosition:'',
          menuUrl:''
            })  ,
          menus:[],      
        }
    },
     mounted() {
          this.menu();     
     },
    methods: {
        add(){
           this.form.post('/menu').then(response => {
              this.form.reset(); 
              this.menu(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        menu(){
            axios.get('/menu').then(res =>{
                 this.menus = res.data.menu;
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