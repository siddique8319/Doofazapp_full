<template>
    <div class="row" data-toggle="isotope">
            
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default"> 
                  <center> <h2 >My Generation</h2> </center>                                  
                   <div class="table-responsive">
                        <table data-toggle="data-table" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Member_Name</th>
                              <th>Mobile</th>
                              <th>Email</th>                  
                              <th>Sponsore_Id</th>
                              <th>Refferal_Id</th>
                              <th>Joining_Date</th> 
                              <th>Level</th>                              
                            </tr>
                          </thead>
                          <tbody v-for="member in members" :key="member.id">                              
                            <tr  v-for="user in users" :key="user.id" v-if="user.id==member.downLine">
                               <td>{{ user.id }}</td>
                               <td>{{ user.name }}</td>
                               <td>{{ user.mobile }}</td>
                               <td>{{ user.email }}</td>                                      
                               <td>{{ user.sponsorId }}</td>
                               <td>{{ user.refferalId }}</td>
                               <td>{{ user.updated_at }}</td> 
                               <td>Level-{{ member.level }}</td>         
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
              mobile:'',
              email:'',
              nid:'',
              gender:'',
              joiningDate:'',
              bloodGroup:'',
              sponsorId:'',
              refferalId:'',
              password:'',
              presentAddress:'',
              permanentAddress:'',              
            })  ,         
          members:[],
          levelTwo:[],             
          searchresult:false,
          result:[], 
          searchRefferal:'',
          searchresultRefferal:false,
          resultRefferal:[],
          users:[],
          search:false,
          searchRefferalError:false
            
        }
    },
     mounted() {
         
           this.member(); 
           this.sponsor();
           this.level2();           
           this.user(); 
     },
    methods: {
        add(){
           this.form.post('/newMemberEntry',        
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
            axios.get('/newMemberEntry').then(res =>{
                 this.members = res.data.member;
              })
         }, 
          user(){
            axios.get('/newMemberEntry/create').then(res =>{
                 this.users = res.data.generation;
              })
         },   
           level2(){
            axios.get('/level2').then(res =>{
                 this.levelTwo = res.data.generation;
              })
         }, 
                
          
        sponsor(){
             axios.get('/sponsor').then(res =>{
                 this.sponsors = res.data.sponsor;
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
          axios.delete(`/newMemberEntry/${memberId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.member();         
          });       
       },          
    }
  }
</script>