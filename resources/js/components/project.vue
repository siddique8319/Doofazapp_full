<template>
    <div class="row" data-toggle="isotope">
              <div class="item col-xs-12 col-md-10" >
                <div class="panel panel-default">
                    <div class="panel-body">
                     <form @submit.prevent="add" >
                        <div class="row">
                           <div class="col-md-8">  
                             <div class="form-group"  >
                                <label for="exampleFormControlSelect1">Select Project Type</label>
                                 <select class="form-control"   v-model="form.projectTypeId" id="exampleFormControlSelect1" name="projectTypeId" :class="{ 'is-invalid': form.errors.has('projectTypeId') }" >
                                   <option  v-for="project in projects" :key="project.projectTypeId" v-bind:value=project.projectTypeId>{{project.projectType}}</option>
                                 </select>
                                  <has-error :form="form" field="designationId"></has-error>
                            </div> 
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group" :class="{ 'has-error': form.errors.has('projectName') }">
                              <label for="exampleFormControlInput1">Project Name</label>
                              <input  id="exampleFormControlInput1" placeholder="Project Name"  v-model="form.projectName" type="text" name="projectName" :class="{ 'is-invalid': form.errors.has('projectName') }" class="form-control" >
                               <has-error :form="form" field="projectName"></has-error> 
                            </div>                             
                          </div>
                        </div>
                          <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Web Site Price</label>
                              <input  id="exampleFormControlInput1" placeholder="Web Site Price"  v-model="form.price" type="text" name="price" :class="{ 'is-invalid': form.errors.has('price') }" class="form-control" >
                               <has-error :form="form" field="price"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Offer</label>
                              <input  id="exampleFormControlInput1" placeholder="Offer"  v-model="form.offer" type="text" name="form.offer" :class="{ 'is-invalid': form.errors.has('offer') }" class="form-control" >
                               <has-error :form="form" field="offer"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">After Offer</label>
                              <input  id="exampleFormControlInput1" placeholder="Offer" v-model="result"  type="text" name="result" :class="{ 'is-invalid': form.errors.has('offer') }" class="form-control" >
                               <has-error :form="form" field="result"></has-error> 
                            </div>                             
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Total Price</label>
                              <input  id="exampleFormControlInput1" placeholder="Total Price"  v-model="form.totalPrice" type="text" name="offer" :class="{ 'is-invalid': form.errors.has('totalPrice') }" class="form-control" >
                               <has-error :form="form" field="totalPrice"></has-error> 
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Project Description</label>
                               <!-- <ckeditor :editor="editor" v-model="form.projectDescription" ></ckeditor>  -->
                                <vue-editor v-model="form.projectDescription"></vue-editor>
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Project Advantage</label>
                               <!-- <ckeditor :editor="editor" v-model="form.projectAdvantage" ></ckeditor>  -->
                                <vue-editor v-model="form.projectAdvantage"></vue-editor>
                            </div>                             
                          </div>
                        </div>          
                         <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Offer Start Date</label>
                              <date-picker v-model="form.startDate" valueType="format"></date-picker>
                            </div>                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Offer End Date</label>
                              <date-picker v-model="form.endDate" valueType="format"></date-picker>
                            </div>                             
                          </div>
                        </div>                       
                         <div class="form-group">
                          <label for="exampleFormControlFile1">Upload Image</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" @change="changeImage($event)"  name="image">
                           <img :src="form.image" class="img-responsive" height="70" width="90">
                        </div>                              
                         <button :disabled="form.busy" type="submit" class=" btn btn-primary">Submit</button>
                      </form>
                    </div>

                   <div class="table-responsive">
                        <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                          <thead style="background:#e4e6ed ">
                            <tr>
                              <th>ID</th>
                              <th>Project_Type</th>
                              <th>Project_Name</th>
                              <th>Price</th>
                              <th>Offer</th>
                               <th>Offer_Price</th>
                              <th>Total_Price</th>
                              <th>Project_Description</th>
                              <th>Project_Advantage</th>
                              <th>Offer_Start_Date</th>
                              <th>Offer_End_Date</th>
                              <th>Image</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(projectDetail, index ) in projectDetails" :key="projectDetail.projectId">
                               <td>{{ index+1 }}</td>
                               <td v-for="project in projects" :key="project.projectTypeId" v-if="project.projectTypeId==projectDetail.projectTypeId">{{project.projectType }}</td>
                               <td>{{ projectDetail.projectName    }}</td>
                               <td>{{ projectDetail.price  }}</td>
                               <td>{{ projectDetail.offer   }}</td>
                               <td>{{ projectDetail.result   }}</td>
                               <td>{{ projectDetail.totalPrice   }}</td>
                               <td>{{ projectDetail.projectDescription | striphtml }}</td>
                               <td>{{ projectDetail.projectAdvantage | striphtml  }}</td>
                               <td>{{ projectDetail.startDate  }}</td>
                               <td>{{ projectDetail.endDate  }}</td> 
                               <td><img :src="'/images/'+projectDetail.image" class="img-responsive" height="70" width="90"></td>                              
                               <td>
                                 <router-link :to="{name: 'editProject', params: { id: projectDetail.projectId}}" class="btn btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                                <button  class="btn btn-danger" @click.prevent="deletePost(projectDetail.projectId)"><i class=" fa fa-trash"></i>Delete</button> 
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
import { VueEditor } from "vue2-editor";
//  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
 import DatePicker from 'vue2-datepicker';
  import 'vue2-datepicker/index.css';
    export default {
        data(){
        return {
          form: new Form({
           projectTypeId:'' ,   
           projectName:'' , 
           projectDescription:'',
           projectAdvantage:'',
           price:'',
           offer:'',
           startDate:'',
           endDate:'',           
           totalPrice:'',
           image:'',
           
            })  ,          
           designations:[],
           projects:[], 
           projectDetails:[],     
          //  editor: ClassicEditor,
          
               
        }
    },
     components: { DatePicker,VueEditor },
    
     mounted() {
          this.project();
          this.projectDetail();           
          
     },  
     computed: {
          result:   function(){
             let calculate = this.form.price * this.form.offer/100;
             return this.form.price - calculate;
         },    
            },
    methods: {
        add(){
           this.form.post('/project').then(response => {
              this.form.reset();   
              this.projectDetail();         
              Toast.fire({
                      icon: 'success',
                      title: 'Successfully Saved'
                });        
           })         
        },
         project(){
            axios.get('/projectType').then(res =>{
                 this.projects = res.data.project;
              })
         },    
          projectDetail(){
            axios.get('/project').then(res =>{
                 this.projectDetails = res.data.projectDetail;
              })
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
        deletePost(projectId) {
          axios.delete(`/project/${projectId}`).then(response => {
             this.projectDetail();   
              Toast.fire({
                icon: 'success',
                title: 'Successfully Deleted'
              });   
                    
          });       
       },    
    }
  }
</script>