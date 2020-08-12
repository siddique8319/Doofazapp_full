<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SoftwareEntry;
use Image;
use Carbon\Carbon;

class SoftwareEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $software= SoftwareEntry::orderBy('id','desc')->get();
        return  ['software' => $software];
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
        $strpos=strpos($request->image,';' );
        $sub=substr($request->image,0,$strpos);
        $ex=explode('/',$sub)[1];
        $name=time().".".$ex;
        $img=Image::make($request->image)->resize(200,200);
        $upload_path=public_path()."/images/";
        $img->save($upload_path.$name);
        $form= new SoftwareEntry();
        $form->title= $request->title;
        $form->image=$name;
        $form->price= $request->price;
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
        $data=SoftwareEntry::where('id',$id)->first()->status;
        if($data==1){
            SoftwareEntry::where('id',$id)->update(['status'=>0 ]);            
               return response()->json('successfully updated');  
        }
        else{
            SoftwareEntry::where('id',$id)->update(['status'=>1 ]);            
            return response()->json('successfully updated'); 
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=SoftwareEntry::where('id',$id)->first();
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
        if($strpos=strpos($request->image,';' ))
        {
                    
                      $strpos=strpos($request->image,';' );
                      $sub=substr($request->image,0,$strpos);
                      $ex=explode('/',$sub)[1];
                      $name=time().".".$ex;
                      $img=Image::make($request->image)->resize(200,200);
                      $upload_path=public_path()."/images/";
                      $img->save($upload_path.$name);
                  
              SoftwareEntry::where('id',$id)->update([
                          'title' => $request->title,
                          'price' => $request->price,                          
                          'image' => $name,
                          'created_at' => Carbon::now(),
                      ]);            
                  return response()->json('successfully updated');
         }   
         else{
            SoftwareEntry::where('id',$id)->update([
                        'title' => $request->title,
                        'price' => $request->price,                          
                        
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
        $post = SoftwareEntry::find($id);
        $post->delete();
        return response()->json('successfully deleted');
    }
}
