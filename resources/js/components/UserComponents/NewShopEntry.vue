<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10 " >                
                <div class="panel panel-default">
                    <div class="panelcenter" > 
                    <h3 class="text-h1 ribbon-heading ribbon-primary bottom-left-right"> Create New Shop</h3>         
                    <div style="background-color:rgba(160, 174, 178, 0.71)">                  
                     <form @submit.prevent="add"  class="col-md-offset-3" style="padding:10px 0 10px 0" >
                       <alert-error :form="form" message="There were some problems with your input."></alert-error>
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('shopName') }">
                               <label for="exampleFormControlInput1">Shop Name</label>
                                <input  id="exampleFormControlInput1" placeholder="Shop Name"  v-model="form.shopName" type="text" name="shopName"  class="form-control" >
                                <has-error :form="form" field="shopName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                          <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('ownerName') }">
                               <label for="exampleFormControlInput1">Owner Name</label>
                                <input  id="exampleFormControlInput1" placeholder="Owner Name"  v-model="form.ownerName" type="text" name="ownerName"  class="form-control" >
                                <has-error :form="form" field="ownerName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group" :class="{ 'has-error': form.errors.has('ownerMobile') }">
                               <label for="exampleFormControlInput1">Owner Mobile</label>
                                <input  id="exampleFormControlInput1" placeholder="Owner Mobile"  v-model="form.ownerMobile" type="text" name="ownerMobile"  class="form-control"  >
                                <has-error  :form="form" field="ownerMobile"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('representative') }">
                               <label for="exampleFormControlInput1">Representative </label>
                                <input  id="exampleFormControlInput1" placeholder="Representative "  v-model="form.representative" type="text" name="representative"  class="form-control" >
                                <has-error :form="form" field="representative"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('representativeMobile') }">
                               <label for="exampleFormControlInput1">Representative Mobile </label>
                                <input  id="exampleFormControlInput1" placeholder="Representative Mobile "  v-model="form.representativeMobile" type="text" name="representativeMobile"  class="form-control" >
                                <has-error :form="form" field="representativeMobile"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('businessEmail') }">
                               <label for="exampleFormControlInput1">Business Email</label>
                                <input  id="exampleFormControlInput1" placeholder="Business Email "  v-model="form.businessEmail" type="text" name="businessEmail"  class="form-control" >
                                <has-error :form="form" field="businessEmail"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-8">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Business Type </label>
                                 <select class="form-control"   v-model="form.businessType" id="exampleFormControlSelect1" >
                                   <option v-for="condition in conditions" :key="condition.shopTypeConditionId" :value=condition.shopTypeName>{{condition.shopTypeName}}</option>                                   
                                 </select>
                            </div> 
                          </div>
                        </div>                                                    
                          <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('marketName') }">
                               <label for="exampleFormControlInput1">Market/House Name </label>
                                <input  id="exampleFormControlInput1" placeholder="Market/House Name "  v-model="form.marketName" type="text" name="marketName"  class="form-control" >
                                <has-error :form="form" field="marketName"></has-error> 
                            </div>                             
                          </div>
                        </div>                                          
                       <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('shopNo') }">
                               <label for="exampleFormControlInput1">Shop No  </label>
                                <input  id="exampleFormControlInput1" placeholder="Shop No"  v-model="form.shopNo" type="text" name="shopNo"  class="form-control" >
                                <has-error :form="form" field="shopNo"></has-error> 
                            </div>                             
                          </div>
                        </div>  
                          <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('userName') }">
                               <label for="exampleFormControlInput1">User Name  </label>
                                <input  id="exampleFormControlInput1" placeholder="User Name"  v-model="form.userName" type="text" name="userName"  class="form-control" >
                                <has-error :form="form" field="userName"></has-error> 
                            </div>                             
                          </div>
                        </div>  
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group"  :class="{ 'has-error': form.errors.has('password') }">
                               <label for="exampleFormControlInput1">Password</label>
                                <input  id="exampleFormControlInput1" placeholder="Password"  v-model="form.password" type="password" name="password"  class="form-control" >
                                <has-error :form="form" field="password"></has-error> 
                            </div>                             
                           </div>
                         </div>                   
                           <div class="row">
                               <div class="col-md-4">
                                 <div class="form-group form-control-default">
                                    <label for="exampleFormControlInput1">Shop Front</label>   
                                  <input  id="exampleFormControlInput1" placeholder="Shop Front" v-model="form.shopFront"   type="text"   class="form-control" >                                 
                                  </div>                                                     
                                </div>
                              <div class="col-md-4">
                                <div class="form-group form-control-default">
                                  <label for="exampleFormControlInput1">Shop Behind</label>  
                                  <input  id="exampleFormControlInput1" placeholder="Shop Behind"  type="text" v-model="form.shopBehind"    class="form-control" >                                 
                                </div>                                                      
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-4">
                                <div class="form-group form-control-default">
                                  <label for="exampleFormControlInput1">Shop Left</label>  
                                  <input  id="exampleFormControlInput1"   type="text" placeholder="Shop Left" v-model="form.shopLeft"   class="form-control" >                                 
                                </div>                                                      
                             </div>
                             <div class="col-md-4">
                                <div class="form-group form-control-default">
                                  <label for="exampleFormControlInput1">Shop Right</label>  
                                  <input  id="exampleFormControlInput1"   type="text" placeholder="Shop Right" v-model="form.shopRight"     class="form-control" >                                 
                                </div>                                                      
                             </div>
                            </div> 
                         <div class="row">
                           <div class="col-md-8">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Division</label>
                                 <select class="form-control"    v-model="form.divisionId"  @change.prevent="districtShow()" id="exampleFormControlSelect1" >
                                   <option v-for="division in divisions" :key="division.id" :value=division.id>{{division.name}}</option>                                   
                                 </select>
                            </div> 
                          </div>
                        </div>
                        
                        <div class="row" v-if="districtShowForm">
                           <div class="col-md-8">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select District</label>
                                 <select class="form-control"   v-model="form.districtId"   @change.prevent="thanaShow()" id="exampleFormControlSelect1" >
                                   <option v-for="district in districts" :key="district.id" v-bind:value=district.id >{{district.name}}</option>                                   
                                 </select>
                            </div> 
                          </div>
                        </div> 
                        <div class="row" v-if="upazila==true">
                           <div class="col-md-8">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Thana</label>
                                 <select class="form-control"   v-model="form.thanaId"  @change.prevent="unionShow()" id="exampleFormControlSelect1" >
                                   <option v-for="thana in thanas" :key="thana.id" v-bind:value=thana.id>{{thana.name}}</option>
                                   
                                 </select>
                            </div> 
                          </div>
                        </div>   
                        <div class="row" v-if="unionForm==true">
                           <div class="col-md-8">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Union</label>
                                 <select class="form-control"   v-model="form.unionId"   id="exampleFormControlSelect1" >
                                   <option v-for="union in unions" :key="union.id" v-bind:value=union.name>{{union.name}}</option>
                                   
                                 </select>
                            </div> 
                          </div>
                        </div>                                                                            
                         <div class="row">
                           <div class="col-md-8">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Address</label>
                                <textarea  id="exampleFormControlInput1" placeholder="Address"  v-model="form.address" type="text" name="presentAddress"  class="form-control" ></textarea>                                 
                            </div>                             
                          </div>
                        </div>                                      
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form> 
                      </div>               
                    </div>                  
                   <div class="table-responsive">
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Shop_Name</th>
                              <th>Owner_Name</th>
                              <th>Owner_Mobile</th>
                              <th>Representative</th>
                              <th>Representative_Mobile</th>                              
                              <th>Business_Email</th>
                              <th>Business_Type</th>
                              <th>Market_Name</th>
                              <th>Shop_No</th>
                              <th>User_Name</th>
                              <th>Shop_Front</th>
                              <th>Shop_Behind</th>
                              <th>Shop_Left</th>
                              <th>Shop_Right</th>
                              <th>Division</th>
                              <th>District</th>
                              <th>Upazila</th>
                              <th>Union</th>
                              <th>Address</th>
                              <th>Status</th>
                              <!-- <th>Action</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(shop, index ) in shops" :key="shop.id" >
                               <td>{{ index+1 }}</td>
                               <td>{{ shop.shopName }}</td>
                               <td>{{ shop.ownerName }}</td>
                               <td>{{ shop.ownerMobile }}</td>
                               <td>{{ shop.representative }}</td>                              
                               <td>{{ shop.representativeMobile }}</td>
                               <td>{{ shop.businessEmail }}</td>
                               <td v-if="shop.businessType==NULL"></td> 
                               <td v-else>{{ shop.businessType }}</td>
                               <td>{{ shop.marketName }}</td>
                               <td>{{ shop.shopNo }}</td>
                               <td>{{ shop.userName }}</td>
                               <td>{{ shop.shopFront }}</td>
                               <td>{{ shop.shopBehind }}</td>  
                               <td>{{ shop.shopLeft }}</td>   
                               <td>{{ shop.shopRight }}</td>  
                               <td  v-for="division in divisions" :key="division.id" v-if="division.id== shop.divisionId ">{{division.name}} </td> 
                               
                               <td v-for="allDistrict in allDistricts" :key="allDistrict.id" v-if="allDistrict.id== shop.districtId ">{{ allDistrict.name }}</td>
                               
                               <td  v-for="allThana in allThanas" :key="allThana.id" v-if="allThana.id== shop.thanaId ">{{ allThana.name }}</td> 
                               
                               <td >{{ shop.unionId }}</td>   
                               <td>{{ shop.address }}</td>  
                               <td v-if="shop.status==0"><span class="btn btn-success">pending</span></td>                            
                              <!-- <td>
                                 <router-link :to="{name: 'editMemberEntry', params: { id: member.id }}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(member.id)"><i class=" fa fa-trash"></i>Delete</button> 
                              </td> -->
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
              shopName:'',
              ownerName:'',
              ownerMobile:'',
              representative:'',
              representativeMobile:'',
              businessEmail:'',
              businessType:'',
              marketName:'',
              shopNo:'',
              userName:'',
              password:'',
              shopFront:'',
              shopBehind:'',
              shopLeft:'',
              shopRight:'',
              address:'',                 
              divisionId:'',   
              districtId:'',
              thanaId:'',  
              unionId:'',        
            })  ,         
          shops:[],       
          conditions:[],          
          divisions:[],
          districts:[],
          allThanas:[],
          allDistricts:[],
          thanas:[],
          unions:[],
          districtShowForm:false,
          upazila:false,
          unionForm:false  
        }
    },
     mounted() {
         
          
          this.division(); 
          this.condition(); 
          this.shop();
          this.allDistrict();
          this.allThana();
        
     },
    methods: {
        add(){
           this.form.post('/newShopEntry',        
           ).then(response => {
              this.form.reset(); 
              this.shop(); 
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
        condition(){
            axios.get('/shopTypeCondition').then(res =>{
                 this.conditions = res.data.condition;
              })
         }, 
         division(){
                axios.get('/division').then(res =>{
                 this.divisions = res.data.division ;
              })
         } , 
         allDistrict(){
                axios.get('/allDistrict').then(res =>{
                 this.allDistricts = res.data.allDistrict ;
              })
         } , 
          allThana(){
                axios.get('/allThana').then(res =>{
                 this.allThanas = res.data.allThana ;
              })
         } , 
         districtShow(){
                axios.get('/district/'+this.form.divisionId).then(res =>{
                 this.districts = res.data.district ;               
                 this.districtShowForm=true;              
              })              
         } ,       
          
        thanaShow(){
                axios.get('/thana/'+this.form.districtId).then(res =>{
                 this.thanas = res.data.thana ;               
                 this.upazila=true;              
              })              
         } ,  
         unionShow(){
                axios.get('/union/'+this.form.thanaId).then(res =>{
                 this.unions = res.data.union ;               
                 this.unionForm=true;              
              })              
         } , 
        shop(){
                axios.get('/newShopEntry').then(res =>{
                 this.shops = res.data.shop ;                      
              })              
         } ,      
             
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