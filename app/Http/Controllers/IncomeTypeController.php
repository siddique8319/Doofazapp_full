<?php

namespace App\Http\Controllers;
use App\IncomeType;
use Illuminate\Http\Request;
use Carbon\Carbon;
class IncomeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomeType= IncomeType::orderBy('incomeTypeId','desc')->get();
        return  ['incomeType' => $incomeType];
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
            'incomeTypeName' => 'required | unique:income_types',
        ]);

        IncomeType::insert([
            'incomeTypeName' => $request->incomeTypeName,
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
        $edit=IncomeType::where('incomeTypeId',$id)->first();
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
        IncomeType::where('incomeTypeId',$id)->update([
            'incomeTypeName' => $request->incomeTypeName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
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
        $delete=IncomeType::where('incomeTypeId',$id)->delete();
       return response()->json('successfully deleted');
    }
}
