<?php

namespace App\Http\Controllers;
use App\Designation;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation = Designation::orderBy('designationId','desc')->get();
        return  ['designation' => $designation];
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
            'designationName' => 'required | unique:designations',
        ]);

        Designation::insert([
            'designationName' => $request->designationName,
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
        $edit=Designation::where('designationId',$id)->first();
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
        Designation::where('designationId',$id)->update([
            'designationName' => $request->designationName,
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
       $delete=Designation::where('designationId',$id)->delete();
       return response()->json('successfully deleted');
    }
}
