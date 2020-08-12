<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10 " >
                 <div v-for="banner in banners" :key="banner.id">
                   <img :src="'/images/'+banner.image" class="banner"  width="856px">
                 </div>
                <div class="panel panel-default">
                    <div class="panelcenter" >
                    <div style="background-color:rgba(160, 174, 178, 0.71)">
                     <form @submit.prevent="add"  class="col-md-offset-3" style="padding:10px 0 10px 0" >
                       <alert-error :form="form" message="There were some problems with your input."></alert-error>
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('name') }">
                               <label for="exampleFormControlInput1">Member Name</label>
                                <input  id="exampleFormControlInput1" placeholder="Name"  v-model="form.name" type="text" name="name"  class="form-control" >
                                <has-error :form="form" field="name"></has-error>
                            </div>
                          </div>
                        </div>
<!--                          <div class="row">-->
<!--                           <div class="col-md-8">-->
<!--                             <div class="form-group"  :class="{ 'has-error': form.errors.has('mobile') }">-->
<!--                               <label for="exampleFormControlInput1">Mobile No</label>-->
<!--                                <input  id="exampleFormControlInput1" placeholder="Mobile No"  v-model="form.mobile" type="text" name="mobile"  class="form-control" >-->
<!--                                <has-error :form="form" field="mobile"></has-error> -->
<!--                            </div>                             -->
<!--                          </div>-->
<!--                        </div>-->
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group" :class="{ 'has-error': form.errors.has('email') }">
                               <label for="exampleFormControlInput1">Email</label>
                                <input  id="exampleFormControlInput1" placeholder="Email"  v-model="form.email" type="text" name="email"  class="form-control"  >
                                <has-error  :form="form" field="email"></has-error>
                            </div>
                          </div>
                        </div>
<!--                        <div class="row">-->
<!--                           <div class="col-md-8">-->
<!--                             <div class="form-group"  :class="{ 'has-error': form.errors.has('nid') }">-->
<!--                               <label for="exampleFormControlInput1">NID</label>-->
<!--                                <input  id="exampleFormControlInput1" placeholder="NID"  v-model="form.nid" type="text" name="nid"  class="form-control" >-->
<!--                                <has-error :form="form" field="nid"></has-error> -->
<!--                            </div>                             -->
<!--                          </div>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                           <div class="col-md-8">  -->
<!--                             <div class="form-group"  >-->
<!--                                <label for="exampleFormControlSelect1">Select Blood Group</label>-->
<!--                                 <select class="form-control"   v-model="form.bloodGroup" id="exampleFormControlSelect1" >-->
<!--                                   <option value="A+">A+</option>-->
<!--                                   <option value="B+">B+</option>-->
<!--                                   <option value="A-">A-</option>-->
<!--                                   <option value="B-">B-</option>-->
<!--                                   <option value="AB+">AB+</option>-->
<!--                                   <option value="AB-">AB-</option>-->
<!--                                   <option value="O-">O-</option>-->
<!--                                   <option value="O+">O+</option>-->
<!--                                 </select>-->
<!--                            </div> -->
<!--                          </div>-->
<!--                        </div>  -->
<!--                        <div class="row">-->
<!--                           <div class="col-md-8">-->
<!--                             <div class="form-group">-->
<!--                                <label class="radio-inline">-->
<!--                                  <input type="radio" name="gender" v-model="form.gender" value="Male" checked>Male-->
<!--                                </label>-->
<!--                                <label class="radio-inline">-->
<!--                                  <input type="radio" v-model="form.gender" value="Female" name="gender">Female-->
<!--                                </label>-->
<!--                                <label class="radio-inline">-->
<!--                                  <input type="radio" v-model="form.gender" value="Other" name="gender">Other-->
<!--                                </label>-->
<!--                             </div>-->
<!--                           </div>-->
<!--                        </div>                            -->
                          <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('password') }">
                               <label for="exampleFormControlInput1">Password</label>
                                <input  id="exampleFormControlInput1" placeholder="Password"  v-model="form.password" type="text" name="password"  class="form-control" >
                                <has-error :form="form" field="password"></has-error>
                            </div>
                          </div>
                        </div>
<!--                       <div class="row">-->
<!--                           <div class="col-md-8">-->
<!--                             <div class="form-group">-->
<!--                               <label for="exampleFormControlInput1">Sponsore Id</label>-->
<!--                                <input  id="exampleFormControlInput1"  @keyup="sponsor" placeholder="Sponsore Id" v-model="form.sponsorId" type="text" name="sponsorId"  class="form-control" >                                                               -->
<!--                            </div>                             -->
<!--                          </div>-->
<!--                        </div>-->
<!--                         <div v-if="searchresult==true">-->
<!--                           <div v-for="res in result" :key="res.id">-->
<!--                             <div class="row">-->
<!--                               <div class="col-md-4">-->
<!--                                 <div class="form-group form-control-default">-->
<!--                                  <input  id="exampleFormControlInput1"  disabled  :value="res.name" type="text"   class="form-control" >                                 -->
<!--                                  </div>                                                     -->
<!--                                </div>-->
<!--                              <div class="col-md-4">-->
<!--                                <div class="form-group form-control-default">-->
<!--                                  <input  id="exampleFormControlInput1"  disabled :value="res.mobile" type="text"   class="form-control" >                                 -->
<!--                                </div>                                                      -->
<!--                             </div>-->
<!--                            </div>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                        <div v-else-if="search==true">-->
<!--                         <h4 style='color:red'>Invalid Username</h4>-->
<!--                         </div>-->
<!--                        <div class="row">-->
<!--                           <div class="col-md-8">-->
<!--                             <div class="form-group">-->
<!--                               <label for="exampleFormControlInput1">Placement</label>-->
<!--                                <input  id="exampleFormControlInput1"  @keyup="refferal" placeholder="placement "  v-model="form.refferalId" type="text"   class="form-control" >                                 -->
<!--                            </div>                             -->
<!--                          </div>-->
<!--                        </div>-->
<!--                         <div v-if="searchresultRefferal==true">-->
<!--                           <div v-for="rea in resultRefferal" :key="rea.id">-->
<!--                             <div class="row">-->
<!--                               <div class="col-md-4">-->
<!--                                 <div class="form-group form-control-default">-->
<!--                                  <input  id="exampleFormControlInput1"  disabled :value="rea.name" type="text"   class="form-control" >                                 -->
<!--                                  </div>                                                     -->
<!--                                </div>-->
<!--                              <div class="col-md-4">-->
<!--                                <div class="form-group form-control-default">-->
<!--                                  <input  id="exampleFormControlInput1"  disabled :value="rea.mobile" type="text"   class="form-control" >                                 -->
<!--                                </div>                                                      -->
<!--                             </div>-->
<!--                            </div>-->
<!--                          </div>-->
<!--                        </div> -->
<!--                        -->
<!--                        <div v-else-if="searchRefferalError==true">-->
<!--                         <h4 style='color:red'>Invalid Username</h4>-->
<!--                         </div>            -->
<!--                         <div class="row">-->
<!--                           <div class="col-md-8">-->
<!--                             <div class="form-group">-->
<!--                               <label for="exampleFormControlInput1">Present Address</label>-->
<!--                                <textarea  id="exampleFormControlInput1" placeholder="Present Address"  v-model="form.presentAddress" type="text" name="presentAddress"  class="form-control" ></textarea>                                 -->
<!--                            </div>                             -->
<!--                          </div>-->
<!--                        </div>                        -->
<!--                          <div class="row">-->
<!--                           <div class="col-md-8">-->
<!--                             <div class="form-group">-->
<!--                               <label for="exampleFormControlInput1">Permanent Address</label>-->
<!--                                <textarea  id="exampleFormControlInput1" placeholder="Permanent Address"  v-model="form.permanentAddress" type="text" name="permanentAddress"  class="form-control" ></textarea>                                 -->
<!--                            </div>                             -->
<!--                          </div>-->
<!--                        </div>                      -->
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                      </div>
                    </div>
                   <div class="table-responsive">
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Member_Name</th>
<!--                              <th>Mobile</th>-->
                              <th>Email</th>
<!--                              <th>NID</th>                              -->
<!--                              <th>Joining_Date</th>-->
<!--                              <th>Blood_Group</th>-->
<!--                              <th>Gender</th>-->
                              <th>Password</th>
<!--                              <th>Sponsore_Id</th>-->
<!--                              <th>Refferal_Id</th>-->
<!--                              <th>Present_Address</th>-->
<!--                              <th>Permanent_Address</th>-->
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(member, index ) in members" :key="member.id" >
                               <td>{{ index+1 }}</td>
                               <td>{{ member.name }}</td>
<!--                               <td>{{ member.mobile }}</td>-->
                               <td>{{ member.email }}</td>
<!--                               <td>{{ member.nid }}</td>                              -->
<!--                               <td>{{ member.created_at }}</td>-->
<!--                               <td>{{ member.bloodGroup }}</td>-->
<!--                               <td>{{ member.gender }}</td>-->
                               <td>{{ member.password }}</td>
<!--                               <td>{{ member.sponsorId }}</td>-->
<!--                               <td>{{ member.refferalId }}</td>-->
<!--                               <td>{{ member.presentAddress }}</td>-->
<!--                               <td>{{ member.permanentAddress }}</td>                               -->
                              <td>
                                 <router-link :to="{name: 'editMemberEntry', params: { id: member.id }}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(member.id)"><i class=" fa fa-trash"></i>Delete</button>
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
              name:'',
              // mobile:'',
              email:'',
              // nid:'',
              // gender:'',
              // joiningDate:'',
              // bloodGroup:'',
              // sponsorId:'',
              // refferalId:'',
              password:'',
              // presentAddress:'',
              // permanentAddress:'',
            })  ,
          members:[],
          searchresult:false,
          result:[],
          searchRefferal:'',
          searchresultRefferal:false,
          resultRefferal:[],
          search:false,
          searchRefferalError:false,
          banners:[],

        }
    },
     mounted() {

          this.member();
          this.banner();
     },
    methods: {
        add(){
           this.form.post('/member',
           ).then(response => {
              this.form.reset();
              this.member();
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });
           })
        },
        member(){
            axios.get('/member').then(res =>{
                 this.members = res.data.member;
              })
         },
         banner(){
            axios.get('/bannerImage').then(res =>{
                 this.banners = res.data.banner;
              })
         },
        sponsor(){
            axios.get('/search?q='+this.form.sponsorId).then(res =>{
                if(res.data==''){
                 this.result = res.data;
                 this.search=true;
                 this.searchresult=false
                 }
                else{
                this.result = res.data;
                this.searchresult=true;
                this.search=false;
                }
              })

         },
         refferal(){
            axios.get('/searchRefferal?q='+this.form.refferalId).then(res =>{
                if(res.data==''){
                 this.resultRefferal = res.data;
                 this.searchRefferalError=true;
                 this.searchresultRefferal =false
                 }
                else{
                this.resultRefferal  = res.data;
                this.searchresultRefferal =true;
                this.searchRefferalError=false;
                }
              })
         },
         designation(){
            axios.get('/designation').then(res =>{
                 this.designations = res.data.designation;
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
       changeImage(event) {
          let file = event.target.files[0];
          let reader = new FileReader();
          reader.onload = event => {
           this.form.image = event.target.result;
           console.log( event.target.result)
             };
         reader.readAsDataURL(file);
         },
    }
  }
</script>
