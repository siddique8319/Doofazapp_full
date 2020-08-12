<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Income;
use App\User;
use App\AccountInformation;
use App\FlashSale;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income= Income::with('IncomeRelation')->orderBy('id','desc')->get();
        return  ['income' => $income];
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
           
            //  'incomeName' => 'required | unique:incomes',
        ]);

        $idok= Income::insertGetId([
            'incomeTypeId' => $request->incomeTypeId,
            'projectTypeId' => $request->projectTypeId,
            'incomeName' => $request->incomeName,
            'amount' => $request->amount,
            'icon' => $request->icon,
            'created_at' => Carbon::now(),
           
        ]);
        // $user = User::orderBy('id','desc')->whereNotIn('type', [1,2])->get();
        // foreach($user as $users){
        //    $get=$users->id;       
        //      AccountInformation::insert([
        //          'customerId' => $get,  
        //          'salesType'=>$idok,                          
        //          'created_at' => Carbon::now(),               
        //       ]);         
        //         AccountInformation::insert([
        //             'customerId' => $get,
        //             'incomeType' => 2, 
        //             'salesType'=>$idok,                                
        //             'created_at' => Carbon::now(),               
        //           ]);
        //         FlashSale::insert([                 
        //             'salesType'=>$idok,                                
        //             'created_at' => Carbon::now(),               
        //           ]);    
        //         FlashSale::insert([                   
        //             'incomeType' => 2, 
        //             'salesType'=>$idok,                                
        //             'created_at' => Carbon::now(),               
        //           ]);      
        //         }
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
        $edit=Income::where('id',$id)->first();
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
        

        Income::where('id',$id)->update([
            'incomeTypeId' => $request->incomeTypeId,
            'projectTypeId' => $request->projectTypeId,
            'incomeName' => $request->incomeName,
            'amount' => $request->amount,
            'icon' => $request->icon,
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
        $delete=Income::where('id',$id)->delete();
        return response()->json('successfully deleted');
    }
}
