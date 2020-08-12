<?php

namespace App\Http\Controllers;
use App\ShopCondition;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ShopConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condition= ShopCondition::orderBy('shopTypeConditionId','desc')->get();
        return  ['condition' => $condition];
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
        ShopCondition::insert([
            'shopTypeCode' => $request->shopTypeCode,
            'shopTypeName' => $request->shopTypeName,
            'shopCondition' => $request->shopCondition,          
            'created_at' => Carbon::now(),            
          ]);  
          return response()->json('successfully Saved');
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
        $edit=ShopCondition::where('shopTypeConditionId',$id)->first();
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
        ShopCondition::where('shopTypeConditionId',$id)->update([
            'shopTypeCode' => $request->shopTypeCode,
            'shopTypeName' => $request->shopTypeName,
            'shopCondition' => $request->shopCondition,          
            'created_at' => Carbon::now(),            
          ]);       
    return response()->json('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=ShopCondition::where('shopTypeConditionId',$id)->delete();
        return response()->json('successfully deleted');
    }
}
