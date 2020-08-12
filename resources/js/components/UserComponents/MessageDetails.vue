<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <h3 class="text-h1 ribbon-heading ribbon-primary bottom-left-right">Message Details</h3>                     
                      
                    
                      <div>    
                      <form @submit.prevent="sendMessage" >                                               
                        <div class="row">
                           <div class="col-md-8">
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Message</label>
                                <textarea  id="exampleFormControlInput1" placeholder="Message" disabled v-model="form.message" type="text" name="message"  class="form-control" ></textarea>                                 
                            </div>                             
                          </div>
                        </div>                        
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
         
          message:'',          
            })  ,         
          
        }
    },
     mounted() {
          this.messageDetails();       
     },
    methods: {
        messageDetails(){
             axios.get(`/message/${this.$route.params.id}/edit`).then(res =>{
                 this.form.fill(res.data)
               })
         },          
         
        deleteMessage(id){
          axios.delete(`/message/${id}`).then(response => {
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