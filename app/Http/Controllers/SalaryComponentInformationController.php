<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\SalaryComponentInformation;
use App\SalaryComponent;
use Illuminate\Http\Request;
use App\FixedSalary;
class SalaryComponentInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sa = SalaryComponentInformation::with('fixedSalaryRelation','salaryComponentRelation')->orderBy('salaryComponentInfoId','desc')->get();
        return  ['sa' => $sa ];
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
        SalaryComponentInformation::insert([
            'salaryComponentId' => $request->salaryComponentId            ,
            'fixedSalaryId' => $request->fixedSalaryId ,
            'amount' => $request->amount ,
            'totalSalary' => $request->input('fixedSalaryId') * $request->input('amount')/100 ,
            'created_at' => Carbon::now(),
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
        $edit=SalaryComponentInformation::where('salaryComponentInfoId',$id)->first();
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
        SalaryComponentInformation::where('salaryComponentInfoId',$id)->update([
            'salaryComponentId' => $request->salaryComponentId            ,
            'fixedSalaryId' => $request->fixedSalaryId ,
            'amount' => $request->amount ,
            'totalSalary' => $request->input('fixedSalaryId') * $request->input('amount')/100 ,
            'created_at' => Carbon::now(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=SalaryComponentInformation::where('salaryComponentInfoId',$id)->delete();
        return response()->json('successfully deleted');
    }
}
