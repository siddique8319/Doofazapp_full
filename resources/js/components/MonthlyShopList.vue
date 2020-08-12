<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10 " >                
                <div class="panel panel-default">
                   
                    <h3 class="text-h1 ribbon-heading ribbon-primary bottom-left-right">Monthly Shop List</h3>         
                                 
                                    
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
                              <th>Created_By</th>
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
                               <td v-if="shop.districtId==NULL"></td>
                               <td v-else v-for="allDistrict in allDistricts" :key="allDistrict.id" v-if="allDistrict.id== shop.districtId ">{{ allDistrict.name }}</td>
                               <td  v-if="shop.thanaId==NULL"></td> 
                               <td v-else v-for="allThana in allThanas" :key="allThana.id" v-if="allThana.id== shop.thanaId ">{{ allThana.name }}</td>                                 
                               <td v-if="shop.unionId ==NULL"></td>   
                               <td v-else>{{ shop.unionId }}</td> 
                               <td>{{ shop.address }}</td>  
                               <td  v-for="member in members" :key="member.id" v-if="member.id== shop.createdBy ">{{ member.name }}</td>
                               <td v-if="shop.status==2"><span class="btn btn-danger" @click.prevent="approve(shop.shopId)">pending</span></td>
                               <td v-else>
                               <button type="button" class="btn btn-success waves-effect waves-light" >Approve</button>                             
                               </td>                              
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
          members:[],  
          districtShowForm:false,
          upazila:false,
          unionForm:false  
        }
    },
     mounted() {
         
          
          this.division();           
          this.shop();
          this.allDistrict();
          this.allThana();
          this.member(); 
     },
    methods: {
         member(){
            axios.get('/member').then(res =>{
                 this.members = res.data.member;
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
                axios.get(`/newShopEntry/create`).then(res =>{
                 this.shops = res.data.shop ;                      
              })              
         } ,      
         approve(shopId){
                axios.get(`/monthlyShop/${shopId}`).then(res =>{
                this.shop();   
                Toast.fire({
                icon: 'success',
                title: 'Successfully Approved'
              });                    
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