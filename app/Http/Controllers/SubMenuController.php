<?php

namespace App\Http\Controllers;
use App\SubMenu;
use App\PermissionMenu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\PermissionSubMenu;
class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subMenu= SubMenu::with('MenuRelation')->orderBy('subMenuId','desc')->get();
        return  ['subMenu' => $subMenu];
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
            'subMenuName' => 'required | unique:sub_menus',
            'subMenuPosition' => 'required | unique:sub_menus',
            'subMenuUrl' => 'required | unique:sub_menus',
        ]);

        SubMenu::insert([
            'menuId' => $request->menuId,
            'subMenuName' => $request->subMenuName,
            'subMenuPosition' => $request->subMenuPosition,
            'subMenuUrl' => $request->subMenuUrl,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $allUser=User::orderBy('id','desc')->get(['id','type']);          
        foreach($allUser as $full){   
            if($full->type==1) {
                $ull=0; 
              $permission=new PermissionSubMenu();
              $permission->menuId=$request->menuId;
              $permission->subMenuName=$request->subMenuName;
              $permission->subMenuPosition=$request->subMenuPosition;
              $permission->subMenuUrl=$request->subMenuUrl;
              $permission->memberId=$ull;
              $permission->created_at=Carbon::now();
              $permission->save();
              
            }     
           else{
            PermissionSubMenu::insert([
                'menuId' => $request->menuId,
                'subMenuName' => $request->subMenuName,
                'subMenuPosition' => $request->subMenuPosition,
                'subMenuUrl' => $request->subMenuUrl,
                'memberId'=> $full->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ]);  
              $delete=PermissionSubMenu::where('memberId',0)->delete(); 
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
        $SubMenuList=PermissionSubMenu::where('menuId',$id)->get();
        return  ['SubMenuList' => $SubMenuList];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=SubMenu::where('subMenuId',$id)->first();
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
        
        $getSubMenu=SubMenu::where('subMenuId',$id)->get();        
        $getPSubMenu=PermissionSubMenu::get();    
        foreach($getPSubMenu as $getPSubM){
             foreach($getSubMenu as $getSubM){
                 if($getPSubM->subMenuName==$getSubM->subMenuName){
                   PermissionSubMenu::where('subMenuName',$getSubM->subMenuName)->update([
                      'menuId' => $request->menuId,
                      'subMenuName' => $request->subMenuName,
                      'subMenuPosition' => $request->subMenuPosition,
                      'subMenuUrl' => $request->subMenuUrl,
                      'created_at' => Carbon::now(),
                      'updated_at' => Carbon::now(),
                     ]);
                   }
                }
            }
            SubMenu::where('subMenuId',$id)->update([
                'menuId' => $request->menuId,
                'subMenuName' => $request->subMenuName,
                'subMenuPosition' => $request->subMenuPosition,
                'subMenuUrl' => $request->subMenuUrl,
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
        $getSubMenu=SubMenu::where('subMenuId',$id)->get();        
        $getPSubMenu=PermissionSubMenu::get();    
        foreach($getPSubMenu as $getPSubM){
             foreach($getSubMenu as $getSubM){
                 if($getPSubM->subMenuName==$getSubM->subMenuName){
                       $de=PermissionSubMenu::where('subMenuName',$getSubM->subMenuName)->delete();
                       
                       }
                 }
           }
           $delete=SubMenu::where('subMenuId',$id)->delete();
        return response()->json('successfully deleted');

        }

}
