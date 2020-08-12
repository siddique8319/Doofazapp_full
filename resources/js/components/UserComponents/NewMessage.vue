<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10 " >                
                <div class="panel panel-default">
                   
                    <h3 class="text-h1 ribbon-heading ribbon-primary bottom-left-right">New Message</h3>         
                                 
                                    
                   <div class="table-responsive">
                     
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Message</th>
                              <th>Time</th>                             
                              <th>Action</th>                            
                            </tr>
                          </thead>
                          <tbody>
                            <tr >
                               <tr v-for="(message, index ) in messages" :key="message.id" >
                               <td>{{ index+1 }}</td>
                               <td>{{ message.message }}</td>
                               <td>{{ message.created_at }}</td>
                                                                                          
                              <td>
                                 <router-link :to="{name: 'messageDetails', params: { id: message.id }}" class="btn btn-primary"><i class=" fa fa-eye"></i>View</router-link>
                                <!-- <button  class="btn btn-danger" @click.prevent="deleteMessage(message.id)"><i class=" fa fa-trash"></i>Delete</button>  -->
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
                  
            })  ,         
          messages:[],
        }
    },
     mounted() {
        this.message() ;
           
     },
    methods: {
           message(){
               axios.get('/message').then(res =>{
                 this.messages = res.data.message;
              })
           }
    }
  }
</script>