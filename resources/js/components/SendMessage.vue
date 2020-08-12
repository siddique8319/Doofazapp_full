<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <h3 class="text-h1 ribbon-heading ribbon-primary bottom-left-right">Send New Message</h3> 
                      <div class="row">
                           <div class="col-md-8">
                             <div class="form-group">
                                <label class="radio-inline">
                                  <input type="radio"  @change.prevent="memberFrom()" name="radio"  value="1">Member
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" @change.prevent="allFrom()" name="radio" value="2" >All
                                </label>
                                 <label class="radio-inline">
                                  <input type="radio" @change.prevent="teamFrom()" name="radio" value="3" >Team
                                </label>                                 
                             </div>
                           </div>
                        </div> 
                      <div v-if="memberFromShow">    
                      <form @submit.prevent="send" >                        
                        <div class="row">
                          <div class="col-md-8">
                             <div class="form-group"  >
                             <label for="exampleFormControlSelect1">Select User</label>
                                <select class="form-control" v-model="form.receiverId"   id="exampleFormControlSelect1" >
                                    <option  v-for="member in members" :key="member.id" v-bind:value=member.id>{{member.name}}</option>                                  
                                </select>
                            </div>                              
                          </div>
                        </div>                          
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Message</label>
                                <textarea  id="exampleFormControlInput1" placeholder="Message"  v-model="form.message" type="text" name="message"  class="form-control" ></textarea>                                 
                            </div>                             
                          </div>
                        </div>  
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                      </div>
                       <div v-if="teamFromShow">    
                      <form @submit.prevent="teamMessage()" >                        
                        <div class="row">
                          <div class="col-md-8">
                             <div class="form-group"  >
                             <label for="exampleFormControlSelect1">Select User</label>
                                <select class="form-control" v-model="form.receiverId"   id="exampleFormControlSelect1" >
                                    <option  v-for="member in members" :key="member.id" v-bind:value=member.id>{{member.name}}</option>                                  
                                </select>
                            </div>                              
                          </div>
                        </div>                          
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Message</label>
                                <textarea  id="exampleFormControlInput1" placeholder="Message"  v-model="form.message" type="text" name="message"  class="form-control" ></textarea>                                 
                            </div>                             
                          </div>
                        </div>  
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                      </div>
                      <div v-if="allFromShow">    
                      <form @submit.prevent="sendMessage" >                                               
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Message</label>
                                <textarea  id="exampleFormControlInput1" placeholder="Message"  v-model="form.message" type="text" name="message"  class="form-control" ></textarea>                                 
                            </div>                             
                          </div>
                        </div>  
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
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
          receiverId:'',
          message:'',          
            })  ,
          members:[],
          memberFromShow:false,
          teamFromShow:false, 
          allFromShow:false,  
        }
    },
     mounted() {
          this.member();       
     },
    methods: {
        send(){
           this.form.post('/message',        
           ).then(response => {
              this.form.reset();              
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Sent Message!!!'
                });        
           })         
        },
         sendMessage(){
           this.form.post('/message',        
           ).then(response => {
              this.form.reset();              
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Sent Message!!!'
                });        
           })         
        },
        teamMessage(){
           this.form.post('/teamMessage',        
           ).then(response => {
              this.form.reset();              
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Sent Message!!!'
                });        
           })         
        },
        memberFrom(){
           this.memberFromShow  = true;
           this.allFromShow  = false;
           this.teamFromShow  = false;
         }, 
         allFrom(){
           this.allFromShow  = true;
           this.memberFromShow  = false;
           this.teamFromShow  = false;
         },
          teamFrom(){
           this.allFromShow  = false;
           this.memberFromShow  = false;
           this.teamFromShow  = true;
         },  
        member(){
            axios.get('/member').then(res =>{
                 this.members = res.data.member;
              })
         },    
        deletePost(shopTypeConditionId){
          axios.delete(`/shopTypeCondition/${shopTypeConditionId}`).then(response => {
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
            this.condition();         
          });       
       },    
    }
  }
</script>