<?php

namespace App\Http\Controllers;
use App\Menu;
use App\PermissionMenu;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu= Menu::orderBy('menuId','desc')->get();
        return  ['menu' => $menu];
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
            'menuName' => 'required | unique:menus',
            'menuPosition' => 'required | unique:menus',
            'menuUrl' => 'required | unique:menus',
        ]);
        Menu::insert([
            'menuName' => $request->menuName,
            'menuPosition' => $request->menuPosition,
            'menuUrl' => $request->menuUrl,          
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);  
        $allUser=User::orderBy('id','desc')->get(['id','type']);          
        foreach($allUser as $full){   
            if($full->type==1) {
                $ull=0; 
              $permission=new PermissionMenu();
              $permission->menuName=$request->menuName;
              $permission->menuPosition=$request->menuPosition;
              $permission->menuUrl=$request->menuUrl;
              $permission->memberId=$ull;
              $permission->created_at=Carbon::now();
              $permission->save();
              
            }     
           else{
            PermissionMenu::insert([
                'menuName' => $request->menuName,
                'menuPosition' => $request->menuPosition,
                'menuUrl' => $request->menuUrl,
                'memberId'=> $full->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ]);  
              $delete=PermissionMenu::where('memberId',0)->delete(); 
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
        $edit=Menu::where('menuId',$id)->first();
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
        $getMenu=Menu::where('menuId',$id)->get();
        $getPMenu=PermissionMenu::get();    
        foreach($getPMenu as $getPM){
             foreach($getMenu as $getM){
                 if($getPM->menuName==$getM->menuName){
                    PermissionMenu::where('menuName',$getM->menuName)->update([
                        'menuName' => $request->menuName,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                      ]);
                      
                     }
                  }
            }   
            Menu::where('menuId',$id)->update([
                'menuName' => $request->menuName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
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
        $getMenu=Menu::where('menuId',$id)->get();        
        $getPMenu=PermissionMenu::get();    
        foreach($getPMenu as $getPM){
             foreach($getMenu as $getM){
                 if($getPM->menuName==$getM->menuName){
                       $de=PermissionMenu::where('menuName',$getM->menuName)->delete();
                       $delete=Menu::where('menuId',$id)->delete();
                       }
                 }
           }
        return response()->json('successfully deleted');
    }
}
