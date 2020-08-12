<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Carbon\Carbon;
use App\NewMemberEntry;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message= Message::where('receiverId',Auth::user()->id)->where('status',0)->get();
        return  ['message' => $message];
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message= Message::where('receiverId',Auth::user()->id)->where('status',1)->get();
        return  ['message' => $message];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = User::orderBy('id','desc')->whereNotIn('type', [1,2])->get(); 

       if($request->receiverId==""){
           foreach($user as $users){ Message::insert([
            'senderId' => Auth::user()->id,
            'receiverId' => $users->id,
            'message' => $request->message ,          
            'created_at' => Carbon::now(),
        ]);}}
        
       else{ Message::insert([
        'senderId' => Auth::user()->id,
        'receiverId' => $request->receiverId ,
        'message' => $request->message ,          
        'created_at' => Carbon::now(),
    ]);}
    }
    public function teamMessage(Request $request)
    {
        $member =NewMemberEntry::orderBy('level','asc')->where('upLine', $request->receiverId)->get();
        foreach($member as $members) {
        $generation = User::where('id',$members->downLine)->get(); 
        foreach($generation as $user){
            Message::insert([
                'senderId' => Auth::user()->id,
                'receiverId' => $user->id,
                'message' => $request->message ,          
                'created_at' => Carbon::now(),
            ]);
        }
        }      
        Message::insert([
        'senderId' => Auth::user()->id,
        'receiverId' => $request->receiverId ,
        'message' => $request->message ,          
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
        $messageDewtails= Message::where('id',$id)->first();
        Message::where('id',$id)->update(['status'=>1 ]);  
        return response()->json($messageDewtails); 
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete= Message::where('id',$id)->delete();
    }
}
