<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group"  >
                             <label for="exampleFormControlSelect1">Select User</label>
                                <select class="form-control" v-model="memberId"  @change.prevent="menuShow()" id="exampleFormControlSelect1" >
                                    <option  v-for="member in members" :key="member.id" v-bind:value=member.id>{{member.name}}</option>                                  
                                </select>
                            </div>  
                        </div> 
                        <div class="table-responsive bg-white">
                          <table class="table table-hover table-bordered mb-0">
                            <thead>
                              <tr>
                                 <th  v-for="menuShow in menuShows" :key="menuShow.permissionMenuId" >
                                  <input  type="radio" v-model="menuId" :value="menuShow.menuName" @click="getSubmenu(menuShow.menuName)"><p class="radio-per">{{menuShow.menuName}}</p> 
                                                               
                                 </th>                                
                               </tr>
                             </thead>
                             <tbody>
                               <tr>
                                 <td colspan="15" class="p-0">
                                    <table class="table table-hover table-bordered mb-0">
                                      <tbody>
                                           <tr>
                                              <th> Submenu </th>
                                              <th> Access </th>                                              
                                            </tr>
                                            
                                             <tr v-for="subMenuShow in subMenuShows" :key=subMenuShow.subMenuId v-if="subMenuShow.memberId==memberId">
                                               <td>{{subMenuShow.subMenuName}}</td>
                                               <td v-if="subMenuShow.status==0">                                             
                                               <button  type="button" class="btn btn-success waves-effect waves-light" v-on:click="changePermission(subMenuShow.permissionSubMenuId)">Active</button>                             
                                               </td>
                                               <td v-else>
                                               <button type="button" class="btn btn-danger waves-effect waves-light" v-on:click="changePermission(subMenuShow.permissionSubMenuId)"><i class="mdi mdi-close"></i>Deactive</button>                             
                                               </td>                                                
                                             </tr>
                                            
                                      </tbody>
                                     </table>
                                  </td>
                                </tr>
                              </tbody>
                          </table>
                        </div>                                               
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
            }),
              menuId: [],
              menuInfoId:[],
              memberId: '',
              subMenuId: [],          
              ps:[],  
              menus:[],
              subMenuShows :[] ,
              members:[]   ,
              menuShows:[] ,
              userShows:[], 
              users:[],
              
        }
    },
     mounted() {
          this.menu();  
          this.member();   
          this.permissionMenu(); 
          this.menuShow();
          this.userShow();
          this.user();
          this.getSubmenu(menuId);
         
     },
      methods: {
        add(){
           axios.post('/permissionMenu',{
                      memberId : this.memberId,
                      menuId : this.menuId,
                      subMenuId : this.subMenuId,                            
              }).then(response => {
              this.memberId=[],
              this.menuId=[],
              this.subMenuId=[],
              this.permissionMenu(); 
              this.menuShow();
              this.userShow();
              this.user();
              Toast.fire({
                      icon: 'success',
                      title: 'Permission Successfully'
                });        
           })         
        },
        permissionMenu(){
            axios.get('/permissionMenu').then(res =>{
                 this.ps = res.data.permission;
              })
         },   
        menuShow(){
            axios.get('/menuShow/'+this.memberId).then(res =>{
                 this.menuShows = res.data.menuShow;
                
              })
            return this.memberId
         },   
         userShow(){
            axios.get('/userShow').then(res =>{
                 this.userShows = res.data.userShow;
              })
         },   
         menu(){
            axios.get('/menu').then(res =>{
                  this.menus = res.data.menu;
              })
         }, 
         getSubmenu(menuId){
           axios.get('/subMenu/'+menuId).then(res =>{
              this.subMenuShows = res.data.SubMenuList;
           })
          return this.menuId
         },
         member(){
            axios.get('/member').then(res =>{
                 this.members = res.data.member;
              })
         }, 
          user(){
            axios.get('/member/create').then(res =>{
                 this.users = res.data.user;
              })
         },     
        changePermission(permissionSubMenuId){ 
          axios.get(`/permissionMenu/${permissionSubMenuId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Change Permission!!!!'
              });   
           axios.get('/subMenu/'+this.menuId).then(res =>{
              this.subMenuShows = res.data.SubMenuList;
           })        
          });   
        },        
        deletePost(permissionMenuId){
          axios.delete(`/permissionMenu/${permissionMenuId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.menuShow();         
          });       
       },    
    }
   
  }
 
</script>
 