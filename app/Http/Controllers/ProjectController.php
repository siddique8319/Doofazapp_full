<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Image;
use Carbon\Carbon;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectDetail= Project::orderBy('projectId','desc')->get();
        return  ['projectDetail' => $projectDetail];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'projectName' => 'required | unique:projects',
        ]);   
       $strpos=strpos($request->image,';' );
       $sub=substr($request->image,0,$strpos);
       $ex=explode('/',$sub)[1];
       $name=time().".".$ex;
       $img=Image::make($request->image)->resize(200,200);
       $upload_path=public_path()."/images/";
       $img->save($upload_path.$name);
       $form= new Project();
       $form->projectTypeId= $request->projectTypeId;
       $form->image=$name;
       $form->projectName= $request->projectName;
       $form->projectDescription= $request->projectDescription;
       $form->projectAdvantage= $request->projectAdvantage;
       $form->result= $request->result;
       $form->totalPrice= $request->totalPrice;
       $form->startDate= $request->startDate;
       $form->endDate= $request->endDate;
       $form->price= $request->price;
       $form->offer= $request->offer;
       $calculate=$request->price * $request->offer/100;
       $form->result=$request->price - $calculate;
       $form->save();
       return response()->json('successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Project::where('projectId',$id)->first();
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $calculate=$request->price * $request->offer/100;
        $output=$request->price - $calculate;
        if($strpos=strpos($request->image,';' ))
          {
                      
                        $strpos=strpos($request->image,';' );
                        $sub=substr($request->image,0,$strpos);
                        $ex=explode('/',$sub)[1];
                        $name=time().".".$ex;
                        $img=Image::make($request->image)->resize(200,200);
                        $upload_path=public_path()."/images/";
                        $img->save($upload_path.$name);
                    
                    Project::where('projectId',$id)->update([
                            'projectTypeId' => $request->projectTypeId,
                            'projectName' => $request->projectName,
                            'projectDescription' => $request->projectDescription,           
                            'projectAdvantage' => $request->projectAdvantage,
                            'result' => $output,
                            'totalPrice' => $request->totalPrice,
                            'startDate' => $request->startDate,
                            'endDate' => $request->endDate,
                            'price' => $request->price,
                            'offer' => $request->offer,
                            'image' => $name,
                            'created_at' => Carbon::now(),
                        ]);            
                    return response()->json('successfully updated');
           }   
           else{
            Project::where('projectId',$id)->update([
                'projectTypeId' => $request->projectTypeId,
                'projectName' => $request->projectName,
                'projectDescription' => $request->projectDescription,           
                'projectAdvantage' => $request->projectAdvantage,
                'result' => $output,
                'totalPrice' => $request->totalPrice,
                'startDate' => $request->startDate,
                'endDate' => $request->endDate,
                'price' => $request->price,
                'offer' => $request->offer,               
                'created_at' => Carbon::now(),
            ]);          
                    return response()->json('successfully updated');  
           } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete= Project::where('projectId',$id)->delete();
    }
}
