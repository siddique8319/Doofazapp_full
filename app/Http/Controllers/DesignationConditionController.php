<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\DesignationCondition;
use Illuminate\Http\Request;
use App\Designation;
class DesignationConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condition = DesignationCondition::with('designationRelation')->orderBy('designationConditionId','desc')->get();
        return  ['condition' => $condition ];
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
            'designationId' => 'required | unique:designation_conditions',            
            ]); 
        DesignationCondition::insert([
            'designationId' => $request->designationId            ,
            'directSaleTarget' => $request->directSaleTarget,
            'teamSaleTarget' => $request->teamSaleTarget,
            'memberTarget' => $request->memberTarget ,
            'type' => $request->type ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
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
        $edit=DesignationCondition::where('designationConditionId',$id)->first();
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
        DesignationCondition::where('designationConditionId',$id)->update([
            'designationId' => $request->designationId            ,
            'directSaleTarget' => $request->directSaleTarget,
            'teamSaleTarget' => $request->teamSaleTarget,
            'memberTarget' => $request->memberTarget ,
            'type' => $request->type ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json('Successfully Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=DesignationCondition::where('designationConditionId',$id)->delete();
        return response()->json('successfully deleted');
    }
}
