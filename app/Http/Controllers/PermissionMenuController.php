<?php

namespace App\Http\Controllers;
use App\PermissionMenu;
use App\PermissionSubMenu;
Use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PermissionMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $permission=PermissionMenu::distinct()->get('memberId');
         return  ['permission' => $permission];
    }
    public function menuShow($id)
    {
        
         $menuShow=PermissionMenu::where('memberId',$id)->get();
         return  ['menuShow' => $menuShow];
    }
    public function userShow()
    {
         $userShow=User::distinct()->get(['name','id']);
         return  ['userShow' => $userShow];
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
      $menuId=$request->menuId;
      if($request->subMenuId==[]){
        $permission=new PermissionMenu;
        $permission->memberId=$request->memberId;
        $permission->menuId=$menuId;      
        $permission->created_at=Carbon::now();
        $permission->save();  
        $update=User::where('id',$request->memberId)->update(
            ['type'=>3 ]
        );

      }
      else{
      $fullAccess=json_decode($request->getContent('subMenuId'),true);
      foreach($fullAccess['subMenuId'] as $full){
          $permission=new PermissionMenu;
          $permission->memberId=$request->memberId;
          $permission->menuId=$menuId;
          $permission->subMenuId=$full;
          $permission->created_at=Carbon::now();
          $permission->save();
          $update=User::where('id',$request->memberId)->update(
            ['type'=>3 ]
        );
      }

      }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=PermissionSubMenu::where('permissionSubMenuId',$id)->first()->status;
        if($data==1){
               PermissionSubMenu::where('permissionSubMenuId',$id)->update(['status'=>0 ]);            
               return response()->json('successfully updated');  
        }
        else{
            PermissionSubMenu::where('permissionSubMenuId',$id)->update(['status'=>1 ]);            
            return response()->json('successfully updated'); 
        }   
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
        $delete=PermissionMenu::where('permissionMenuId',$id)->delete();
        return response()->json('successfully deleted');
    }
}
