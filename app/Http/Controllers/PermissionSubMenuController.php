<?php

namespace App\Http\Controllers;
use App\PermissionSubMenu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Menu;
use App\SubMenu;
class PermissionSubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission=PermissionSubMenu::with('menuRelation','subMenuRelation')->orderBy('permissionSubMenuId','desc')->get();
        return  ['permission' => $permission];
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
            'position' => 'required | unique:Permission_menus',
        ]);

        PermissionSubMenu::insert([
            'menuId' => $request->menuId,
            'subMenuId' => $request->subMenuId,
            'url' => $request->url,
            'userRole' => $request->userRole,
            'position' => $request->position,
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
        $delete=PermissionSubMenu::where('permissionSubMenuId',$id)->delete();
        return response()->json('successfully deleted');
    }
}
