<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="add" >
                         <div class="row">
                           <div class="col-md-6">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Member</label>
                                 <select class="form-control"   v-model="form.memberId" id="exampleFormControlSelect1" >
                                   <option  v-for="member in members" :key="member.memberId" v-bind:value=member.id>{{member.name}}</option>
                                 </select>
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
                              <th>Member Type</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(memberType, index ) in types" :key="memberType.memberTypeId">
                               
                               <td>{{ index+1 }}</td>
                              
                               <td v-for="member in members" :key="member.memberId" v-if="member.id==memberType.memberId">{{ member.name}}</td>
                               
                               <td>
                                 <router-link :to="{name: 'editProjectName', params: { id: memberType.memberTypeId }}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(memberType.memberTypeId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          memberId: '',
            })  ,
          types:[],
          members:[],      
        }
    },
     mounted() {
          this.type();  
          this.member();    
     },
    methods: {
        add(){
           this.form.post('/memberType').then(response => {
              this.form.reset(); 
              this.type(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        type(){
            axios.get('/memberType').then(res =>{
                 this.types = res.data.type;
              })
         }, 
        member(){
            axios.get('/member').then(res =>{
                 this.members = res.data.member;
              })
         },     
        deletePost(memberTypeId){
          axios.delete(`/memberType/${memberTypeId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.type();         
          });       
       },    
    }
  }
</script>