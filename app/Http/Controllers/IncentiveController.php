<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Incentive;
use App\Designation;
class IncentiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incentive =Incentive::with('designationRelation')->orderBy('incentiveId','desc')->get();
        return  ['incentive' => $incentive];
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
           
            'designationId' => 'required | unique:incentives',
        ]);

        Incentive::insert([
            'designationId' => $request->designationId,
            'incentiveName' => $request->incentiveName,
            'incentiveAmount' => $request->incentiveAmount,
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
        $edit=Incentive::where('incentiveId',$id)->first();
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
        Incentive::where('incentiveId',$id)->update([
            'designationId' => $request->designationId,
            'incentiveName' => $request->incentiveName,
            'incentiveAmount' => $request->incentiveAmount,
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
        $delete=Incentive::where('incentiveId',$id)->delete();
        return response()->json('successfully deleted');
    }
}
