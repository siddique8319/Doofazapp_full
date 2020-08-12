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
                                  <option  v-for="menu in menus" :key="menu.menuId" v-bind:value=menu.menuName>{{menu.menuName}}</option>                             
                                 </select>
                            </div>  
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Sub Menu</label>
                              <input  id="exampleFormControlInput1" placeholder="Sub Menu"  v-model="form.subMenuName" type="text" name="subMenuName" :class="{ 'is-invalid': form.errors.has('subMenuName') }" class="form-control" >
                               <has-error :form="form" field="subMenuName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Sub Menu Url</label>
                              <input  id="exampleFormControlInput1" placeholder="Sub Menu Url"  v-model="form.subMenuUrl" type="text" name="subMenuUrl" :class="{ 'is-invalid': form.errors.has('subMenuUrl') }" class="form-control" >
                               <has-error :form="form" field="subMenuUrl"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Sub Menu Position</label>
                              <input  id="exampleFormControlInput1" placeholder="Sub Menu Position"  v-model="form.subMenuPosition" type="text" name="subMenuPosition" :class="{ 'is-invalid': form.errors.has('subMenuPosition') }" class="form-control" >
                               <has-error :form="form" field="subMenuPosition"></has-error> 
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
                              <th>Sub Menu position</th>
                              <th>Sub Menu Url</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(subMenu, index ) in subMenus" :key="subMenu.subMenuId">
                               <td>{{ index+1 }}</td>
                               <td >{{ subMenu.menuId}}</td>
                               <td>{{ subMenu.subMenuName }}</td>
                               <td>{{ subMenu.subMenuPosition }}</td>
                               <td>{{ subMenu.subMenuUrl }}</td>                              <td>
                                 <router-link :to="{name: 'editSubMenu', params: { id: subMenu.subMenuId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(subMenu.subMenuId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          subMenuName:'',
          subMenuPosition:'',
          subMenuUrl:'',
          menuId:''
            })  ,
          subMenus:[], 
          menus:[],       
        }
    },
     mounted() {
          this.subMenu(); 
          this.menu();    
     },
    methods: {
        add(){
           this.form.post('/subMenu').then(response => {
              this.form.reset(); 
              this.subMenu(); 
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
        subMenu(){
            axios.get('/subMenu').then(res =>{
                 this.subMenus = res.data.subMenu;
              })
         },    
        deletePost(subMenuId){
          axios.delete(`/subMenu/${subMenuId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.subMenu();         
          });       
       },    
    }
  }
</script>