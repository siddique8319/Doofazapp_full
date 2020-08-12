<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="add" >
                       <div class="row">
                              <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Menu</label>
                                   <select class="form-control"   v-model="form.menuId" id="exampleFormControlSelect1" >
                                     <option  v-for="menu in menus" :key="menu.menuId" v-bind:value=menu.menuId>{{menu.menuName}}</option>                             
                                   </select>
                                </div>  
                          </div>
                          <div class="row">
                           <div class="form-group"  >
                              <label for="exampleFormControlSelect1">Select Sub Menu</label>
                               <select class="form-control"   v-model="form.subMenuId" id="exampleFormControlSelect1" >
                                 <option  v-for="submenu in subMenus" :key="submenu.subMenuId" v-bind:value=submenu.subMenuId>{{submenu.subMenuName}}</option>
                                </select>
                            </div>  
                        </div>    
                        <div class="row">
                            <div class="form-group" >
                               <label for="exampleFormControlSelect1">Select User</label>
                                <select class="form-control" v-model="form.userRole" id="exampleFormControlSelect1">
                                    <option v-bind:value=2 > Member </option>                                  
                                </select>
                            </div>  
                        </div>
                         <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleFormControlInput1">Sub Menu Position</label>
                              <input  id="exampleFormControlInput1" placeholder="Sub Menu Position"  v-model="form.position" type="text" name="position" :class="{ 'is-invalid': form.errors.has('position') }" class="form-control" >
                              <has-error :form="form" field="position"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleFormControlInput1">URL</label>
                              <input  id="exampleFormControlInput1" placeholder="URL"  v-model="form.url" type="text" name="url" :class="{ 'is-invalid': form.errors.has('url') }" class="form-control" >
                              <has-error :form="form" field="url"></has-error> 
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
                              <th>Sub Menu</th>
                              <th>User_Role</th>
                              <th>Position</th>
                              <th>Url</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(permission, index ) in permissions" :key="permission.permissionSubMenuId">
                               <td>{{ index+1 }}</td>
                               <td v-if="permission.menu_relation">{{ permission.menu_relation.menuName }}</td>
                               <td v-if="permission.sub_menu_relation">{{ permission.sub_menu_relation.subMenuName }}</td>
                               <td v-if="permission.userRole==2">Member</td>
                               <td>{{ permission.position }}</td>
                               <td>{{ permission.url }}</td>
                               <td v-if="permission.status==0">                                             
                               <button  type="button" class="btn btn-success waves-effect waves-light" v-on:click="changePermission(permission.permissionSubMenuId)">Active</button>                             
                               </td>
                               <td v-else>
                               <button type="button" class="btn btn-danger waves-effect waves-light" v-on:click="changePermission(permission.permissionSubMenuId)"><i class="mdi mdi-close"></i>Deactive</button>                             
                               </td> 
                               <td>
                                 <router-link :to="{name: 'editProjectName', params: { id: permission.permissionSubMenuId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(permission.permissionSubMenuId)"><i class=" fa fa-trash"></i>Delete</button> 
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
             menuId: '',
             userRole: '',
             position: '',
            })  ,
          permissions:[],  
          menus:[],  
          subMenus:[],    
        }
    },
     mounted() {
          this.permissionSubMenu();  
          this.menu();  
          this.subMenu();  
     },
    methods: {
        add(){
           this.form.post('/permissionSubMenu').then(response => {
              this.form.reset(); 
              this.permissionSubMenu(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        permissionSubMenu(){
            axios.get('/permissionSubMenu').then(res =>{
                 this.permissions = res.data.permission;
              })
         },   
        menu(){
            axios.get('/menu').then(res =>{
                 this.menus = res.data.menu;
              })
         }, 
        subMenu(){
            axios.get('/subMenu').then(res =>{
                 this.subMenus = res.data.subMenu;
              })
         },  
        changePermission(permissionSubMenuId){ 
          axios.get(`/permissionSubMenu/${permissionSubMenuId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Change Permission!!!!'
              });   
            this.permissionSubMenu();         
          });   
        },        
        deletePost(permissionSubMenuId){
          axios.delete(`/permissionSubMenu/${permissionSubMenuId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.permissionSubMenu();         
          });       
       },    
    }
  }
</script>