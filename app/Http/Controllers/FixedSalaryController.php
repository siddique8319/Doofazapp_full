<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\FixedSalary;
use App\Designation;
class FixedSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = FixedSalary::with('designationRelation')->orderBy('fixedSalaryId','desc')->get();
        return  ['salary' => $salary];

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
            'designationId' => 'required| unique:fixed_salaries',
          
        ]);

        FixedSalary::insert([
            'designationId' => $request->designationId,
            'amount' => $request->amount,
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
        $edit=FixedSalary::where('fixedSalaryId',$id)->first();
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
        FixedSalary::where('fixedSalaryId',$id)->update([
            'designationId' => $request->designationId,
            'amount' => $request->amount,
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
        $delete=FixedSalary::where('fixedSalaryId',$id)->delete();
        return response()->json('successfully deleted');
    }
}
