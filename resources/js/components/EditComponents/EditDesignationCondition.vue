<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="updateDesignationCondition" >
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
                              <label for="exampleFormControlInput1">Direct Sale Target</label>
                              <input  id="exampleFormControlInput1" placeholder="Direct Sale Target"  v-model="form.directSaleTarget" type="text" name="directSaleTarget" :class="{ 'is-invalid': form.errors.has('directSaleTarget') }" class="form-control" >
                               <has-error :form="form" field="directSaleTarget"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Team Sale Target</label>
                              <input  id="exampleFormControlInput1" placeholder="Team Sale Target"  v-model="form.teamSaleTarget" type="text" name="teamSaleTarget" :class="{ 'is-invalid': form.errors.has('teamSaleTarget') }" class="form-control" >
                               <has-error :form="form" field="teamSaleTarget"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Designation</label>
                                 <select class="form-control"   v-model="form.type" id="exampleFormControlSelect1" >
                                   <option  v-for="designation in designations" :key="designation.designationId" v-bind:value=designation.designationId>{{designation.designationName}}</option>
                                 </select>
                            </div> 
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Member Target</label>
                              <input  id="exampleFormControlInput1" placeholder="Member Target"  v-model="form.memberTarget" type="text" name="memberTarget" :class="{ 'is-invalid': form.errors.has('memberTarget') }" class="form-control" >
                               <has-error :form="form" field="memberTarget"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>

                   <div class="table-responsive">
                        <table data-toggle="data-table" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Designation</th>
                              <th>Direct_Sale_Target</th>
                              <th>Team_Sale_Target</th>
                              <th>Member_Target</th>
                              <th>Type</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(condition, index ) in conditions" :key="condition.designationConditionId">
                               <td>{{ index+1 }}</td>
                               <td v-if="condition.designation_relation">{{ condition.designation_relation.designationName }}</td>
                               <td>{{ condition.directSaleTarget   }}</td>
                               <td>{{ condition.teamSaleTarget   }}</td>
                               <td>{{ condition.memberTarget   }}</td>
                               <td  v-for="designation in designations" :key="designation.designationId" v-if="condition.type==designation.designationId">{{ designation.designationName }}</td>
                               <td>
                                 <router-link :to="{name: 'editDesignationCondition', params: { id: condition.designationConditionId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(condition.designationConditionId)"><i class=" fa fa-trash"></i>Delete</button> 
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
           designationId:'' ,   
           directSaleTarget:'' , 
           teamSaleTarget:'',
           memberTarget:'',
           type:''
            })  ,          
           designations:[],
           conditions:[],   

        }
    },
     mounted() {
          this.condition(); 
          this.designation();  
          this.editDesignationCondition();  
     },
    methods: {
        editDesignationCondition(){
             axios.get(`/designationCondition/${this.$route.params.id}/edit`).then(res =>{
                 this.form.fill(res.data)
               })
         },  
        condition(){
            axios.get('/designationCondition').then(res =>{
                 this.conditions = res.data.condition;
              })
         },  
        designation(){
            axios.get('/designation').then(res =>{
                 this.designations = res.data.designation;
              })
         },
         updateDesignationCondition(){
            axios.put(`/designationCondition/${this.$route.params.id}`,this.form).then(res =>{
              this.$router.push({name: 'designationCondition'});
              Toast.fire({
                  icon: 'success',
                  title: 'Successfully Updated'
            });  
               
          })
         },          
        deletePost(designationConditionId) {
          axios.delete(`/designationCondition/${designationConditionId}`).then(response => {
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