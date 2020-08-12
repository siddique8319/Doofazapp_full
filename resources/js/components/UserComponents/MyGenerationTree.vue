<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                  <div class="search-2 col-6">
                    <div class="input-group">
                    <input type="text" class="form-control form-control-w-150" v-model="form.name" name="name" @keyup="search" placeholder="Search ..">
                    <span class="input-group-btn">
                     <button class="btn btn-primary" @click.prevent="search" type="button"><i class="fa fa-search"></i></button>
                       </span>
                     </div>
                      </div>
                      
                    <center>                     
                        <button class="btn btn-success waves-effect waves-light" @click.prevent="backToTop(details.id)"> <i class="fa fa-arrow-circle-o-left"> </i>Back To Top</button>
                    </center> 
                     <div class="panel-body">
                      <div class="item col-md-4 col-xs-12" v-if="tree==true"  >
                      <div class="panel panel-default">
                       <table class="table table-striped margin-none">
                      
                        <thead>
                          <tr style="background-color: #d0d8d6;" >
                             <th>D. Sale</th>
                              <th class="text-right">Team sale</th>
                              <th class="text-right width-100">Member</th>
                          </tr>
                     
                        </thead>
                       <tbody>
                        <tr  v-for="me in myself" :key="me.id" style="background-color: #e0e5df;"> 
                          <td class="text-center">10</td>
                            <td class="text-center">60</td>
                            <td class="text-center">{{ me.memberCount }}</td>
                        </tr>                   
                    </tbody>
                  </table>
                </div>
              </div>
                   <div class="item col-md-4 col-xs-12" v-if="treeGeneration==true"  >
                      <div class="panel panel-default">
                       <table class="table table-striped margin-none">
                      
                        <thead>
                          <tr style="background-color: #d0d8d6;" >
                             <th>D. Sale</th>
                              <th class="text-right">Team sale</th>
                              <th class="text-right width-100">Member</th>
                          </tr>
                     
                        </thead>
                       <tbody>
                        <tr style="background-color: #e0e5df;">
                          <td class="text-center">10</td>
                            <td class="text-center">60</td>
                            <td class="text-center">{{ details.memberCount }}</td>
                        </tr>                   
                    </tbody>
                  </table>
                </div>
              </div>
                    
                     <div class=" my-4">                                                
                         <div class="col-10" v-if="tree==true" v-for="me in myself" :key="me.id">    
                            <a href="#">
                              <div class="generationTree">
                              </div>
                            </a>
                            <div class="generationTree1" >
                             <p>{{me.name}}<br>
                               {{ me.mobile }}<br>
                                Free Member<br>
                                Total-Earn:<br>
                                Member:{{ me.memberCount }}<br>
                             </p>
                            <i class="fa fa-arrow-down treeArrow"></i> 
                            </div>  
                                             
                          </div>    
                            <div class="col-10" v-if="treeGeneration==true" >    
                            <a href="#">
                              <div class="generationTree">
                              </div>
                            </a>
                            <div class="generationTree1" >
                             <p>{{details.name}}<br>
                               {{ details.mobile }}<br>
                                Free Member<br>
                                Total-Earn:<br>
                                Member:{{ details.memberCount }}<br>
                             </p>
                            <i class="fa fa-arrow-down treeArrow"></i> 
                            </div>  
                                             
                          </div>       
                        <div class="border"></div> 
                              
                         <div class="table-responsive">
                          <table class="">
                            <thead>
                              <tr>
                               
                                 <th class="treeTh"  v-for="tree in treeView" :key="tree.id">
                                   <i class="fa fa-arrow-down"></i>
                                    <router-link :to="{name: 'moreGenerationTree', params: { id: tree.id }}">
                                     <div class="generationTree">
                                     </div>
                                  </router-link>
                                    <div class="generationTree1">
                                        <p>
                                         {{tree.name}}<br>
                                         {{ tree.mobile }}<br>
                                          Free Member<br>
                                          Total-Earn:<br>
                                          Member:{{ tree.memberCount }}<br>
                                         </p>                                                                                  
                                    </div>                               
                                 </th>                                                           
                               </tr>
                             </thead>
                            
                          </table>
                        </div>
                       
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
             name:''  ,         
            })  ,
          myself:[],  
          treeView:[], 
          treeCount:[],
          users:[],
          countGeneration:"",   
           tree:true,
           treeGeneration:false,  
        }
    },
     mounted() {
          this.myGeneration(); 
          this.myGenerationCount();
          this. myGenerationTree();  
          this.myGenerationMemberCount(); 
          this.user(); 
     },
    methods: { 
       user(){
            axios.get('/newMemberEntry/create').then(res =>{
                 this.users = res.data.generation;
              })
         },        
        myGeneration(){
            axios.get('/myGeneration').then(res =>{
                 this.myself = res.data.me;
              })
         }, 
        myGenerationCount(){
            axios.get('/myGenerationCount').then(res =>{
                 this.countGeneration = res.data.count;
              })
         }, 
         myGenerationTree(){
            axios.get('/myGenerationTree').then(res =>{
                 this.treeView = res.data.tree;
              })
         }, 
          search(){
            axios.get('/searchMember?q='+this.form.name).then(res =>{                
                this.details = res.data; 
                this.tree=false,
                this.treeGeneration=true,
              axios.get('/searchMemberTree?q='+this.form.name).then(res =>{                
                 this.treeView = res.data; 
                 
              })                 
              })
           
         }, 
         backToTop(id){ 
            axios.get(`/backToTop/${id}`).then(res =>{
                  this.details = res.data.detail;
                axios.get(`/treeBackToTop/${id}`).then(res =>{
                 this.treeView = res.data.tree;
              })                   
               })            
         },  
         myGenerationMemberCount(){
            axios.get('/myGenerationMemberCount').then(res =>{
                 this.treeCount = res.data.memberCount;
              })
         },               
    }
  }
</script>