<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginImage;
use Image;
use Carbon\Carbon;
class LoginImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login= LoginImage::orderBy('id','desc')->get();
        return  ['login' => $login];
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
       $form= new LoginImage();     
       $form->image=$name;      
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
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = LoginImage::find($id);
        $post->delete();
        return response()->json('successfully deleted');
    }
}
