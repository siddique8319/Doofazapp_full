<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <h3 class="text-h1 ribbon-heading ribbon-primary bottom-left-right">Shop Type Condition</h3>   
                     <form @submit.prevent="add" >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Shop Type Code</label>
                              <input  id="exampleFormControlInput1" placeholder="Shop Type Code"  v-model="form.shopTypeCode" type="text" name="shopTypeCode" :class="{ 'is-invalid': form.errors.has('shopTypeCode') }" class="form-control" >
                               <has-error :form="form" field="shopTypeCode"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Shop Type Name</label>
                              <input  id="exampleFormControlInput1" placeholder="Shop Type Name"  v-model="form.shopTypeName" type="text" name="shopTypeName" :class="{ 'is-invalid': form.errors.has('shopTypeName') }" class="form-control" >
                               <has-error :form="form" field="shopTypeName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Shop Condition</label>
                              <input  id="exampleFormControlInput1" placeholder="shopCondition"  v-model="form.shopCondition" type="text" name="shopCondition" :class="{ 'is-invalid': form.errors.has('shopCondition') }" class="form-control" >
                               <has-error :form="form" field="shopCondition"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>

                   <div class="table-responsive">
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Shop_Type_Condition</th>
                              <th>Shop_Type_Name</th>
                              <th>Shop_Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(condition, index ) in conditions" :key="condition.shopTypeConditionId">
                               <td>{{ index+1 }}</td>
                               <td>{{ condition.shopTypeCode }}</td>
                               <td>{{ condition.shopTypeName }}</td>
                               <td>{{ condition.shopCondition }}</td>
                              <td>
                                 <router-link :to="{name: 'editShopTypeCondition', params: { id: condition.shopTypeConditionId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(condition.shopTypeConditionId)"><i class=" fa fa-trash"></i>Delete</button> 
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
          shopTypeCode:'',
          shopTypeName:'',
          shopCondition:''
            })  ,
          conditions:[],      
        }
    },
     mounted() {
          this.condition();     
     },
    methods: {
        add(){
           this.form.post('/shopTypeCondition').then(response => {
              this.form.reset(); 
              this.condition(); 
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