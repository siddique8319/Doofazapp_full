<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panelcenter" >
                     <form @submit.prevent="updateMember" >
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Member Name</label>
                                <input  id="exampleFormControlInput1" placeholder="Name"  v-model="form.memberName" type="text" name="memberName"  class="form-control" >
                                <has-error :form="form" field="memberName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                          <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Mobile No</label>
                                <input  id="exampleFormControlInput1" placeholder="Mobile No"  v-model="form.mobileNo" type="text" name="mobileNo"  class="form-control" >
                                <has-error :form="form" field="mobileNo"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Email</label>
                                <input  id="exampleFormControlInput1" placeholder="Email"  v-model="form.email" type="text" name="email"  class="form-control" >
                                <has-error :form="form" field="email"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">NID</label>
                                <input  id="exampleFormControlInput1" placeholder="NID"  v-model="form.nid" type="text" name="nid"  class="form-control" >
                                <has-error :form="form" field="nid"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Designation</label>
                                 <select class="form-control"   v-model="form.designationId" id="exampleFormControlSelect1" >
                                   <option  v-for="designation in designations" :key="designation.designationId" v-bind:value=designation.designationId>{{designation.designationName}}</option>
                                 </select>
                            </div> 
                          </div>
                        </div>  
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Joining Date</label>
                                <input  id="exampleFormControlInput1" placeholder="Joining Date"  v-model="form.joiningDate" type="text" name="joiningDate"  class="form-control" >
                                <has-error :form="form" field="joiningDate"></has-error> 
                            </div>                             
                          </div>
                        </div>
                          <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">User Name</label>
                                <input  id="exampleFormControlInput1" placeholder="User Name"  v-model="form.userName" type="text" name="userName"  class="form-control" >
                                <has-error :form="form" field="userName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                          <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Password</label>
                                <input  id="exampleFormControlInput1" placeholder="Password"  v-model="form.password" type="text" name="password"  class="form-control" >
                                <has-error :form="form" field="password"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Transection Pin</label>
                                <input  id="exampleFormControlInput1" placeholder="Transection Pin"  v-model="form.transectionPin" type="text" name="transectionPin"  class="form-control" >
                                <has-error :form="form" field="transectionPin"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Image</label>
                             <!-- <input type="file" class="form-control-file" id="exampleFormControlFile1" @change="changeImage($event)"  name="image">
                             <img :src="OurPhoto()"  name="image"  class="img-responsive" height="70" width="90"> -->
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
                              <th>Member_Name</th>
                              <th>Mobile</th>
                              <th>Email</th>
                              <th>NID</th>
                              <th>Designation</th>
                              <th>Joining_Date</th>
                              <th>User_name</th>
                              <th>Password</th>
                              <th>Transection_Pin</th>
                              <th>Image</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(member, index ) in members" :key="member.memberId">
                               <td>{{ index+1 }}</td>
                               <td>{{ member.memberName }}</td>
                               <td>{{ member.mobileNo }}</td>
                               <td>{{ member.email }}</td>
                               <td>{{ member.nid }}</td>
                               <td v-if="member.designation_relation">{{ member.designation_relation.designationName }}</td>
                               <td>{{ member.joiningDate }}</td>
                               <td>{{ member.userName }}</td>
                               <td>{{ member.password }}</td>
                               <td>{{ member.transectionPin }}</td>
                              <td>  <img :src="'/images/'+member.image" class="img-responsive" height="70" width="90"></td>  
                              <td>
                                 <router-link :to="{name: 'editMemberEntry', params: { id: member.memberId }}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(member.memberId)"><i class=" fa fa-trash"></i>Delete</button> 
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
              memberName:'',
              mobileNo:'',
              email:'',
              nid:'',
              designationId:'',
              joiningDate:'',
              image:'',
              userName:'',
              password:'',
              transectionPin:'',
            })  ,
          designations:[],
          members:[],      
        }
    },
     mounted() {
          this.designation(); 
          this.member();  
          this.editMember();   
     },    
     methods: {       
        member(){
            axios.get('/member').then(res =>{
                 this.members = res.data.member;
              })
         }, 
         designation(){
            axios.get('/designation').then(res =>{
                 this.designations = res.data.designation;
              })
         },   
         editMember(){
            axios.get(`/member/${this.$route.params.id}/edit`).then(res =>{
                this.form.fill(res.data)
              })
         },  
            
        deletePost(memberId){
          axios.delete(`/member/${memberId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.member();         
          });       
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
        updateMember(){
            axios.put(`/member/${this.$route.params.id}` ,this.form).then(res =>{
              this.$router.push({name: 'memberEntry'});
               Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
      }, 
    }
  }
</script>