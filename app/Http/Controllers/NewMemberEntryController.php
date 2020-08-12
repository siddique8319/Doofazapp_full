<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\NewMemberEntry;
use App\User;
use Illuminate\Http\Request;
use App\Menu;
use Auth;
use App\PermissionMenu;
use App\PermissionSubMenu;
use App\AccountInformation;
use App\Income;
use App\FlashSale;
use App\DesignationCondition;
use App\NewShopEntry;
use App\DesignationUserCondition;
use Illuminate\Support\Facades\Hash;
class NewMemberEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $member =NewMemberEntry::orderBy('level','asc')->where('upLine', Auth::user()->id)->get();   
            return  ['member' => $member];
       
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generation = User::orderBy('id','desc')->get();           
           return  ['generation' => $generation]; 
    }
    public function level2()
    {
        $mem = User::orderBy('id','desc')->where('joined_by', Auth::user()->id)->get();       
        return  ['mem' => $mem];   
    }
    public function myGeneration()
    {
        $me = User::orderBy('id','desc')->where('id', Auth::user()->id)->get();       
        return  ['me' => $me];   
    }
    public function myGenerationCount()
    {
        $count = User::orderBy('id','desc')->where('joined_by', Auth::user()->id)->count();       
        return  ['count' => $count];   
    }
    public function myGenerationTree()
    {
        $tree = User::orderBy('id','desc')->where('joined_by', Auth::user()->id)->get();       
        return  ['tree' => $tree];   
    }
    public function generationTree($id)
    {
        $tree = User::orderBy('id','desc')->where('joined_by', $id)->get();       
        return  ['tree' => $tree];   
    }
    public function treeBackToTop($id)
    {
         $member =User::where('id',$id)->get(); 
         foreach($member as $user)  {
             $backToTop=$user->joined_by;
         }
         $detail=User::where('id',$backToTop)->get();
         foreach($detail as $top){
             $tree=User::where('joined_by', $top->id)->get();
         }
          return  ['tree' => $tree];
             
    }
    public function backToTop($id)
    {
         $member =User::where('id',$id)->get(); 
         foreach($member as $user)  {
             $backToTop=$user->joined_by;
         }
         $detail=User::where('id',$backToTop)->first();        
          return  ['detail' => $detail];
             
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
            'email' => 'required | unique:users',
            'name'  => 'required | unique:users',
            'nid' => 'required | unique:users',
            'mobile' => 'required | unique:users',     
            'password' => 'required',
            ]);  
           
            $allMember=User::orderBy('id','asc')->get(['id']);
            
            $idok = User::insertGetId([
                'joined_by'=>Auth::user()->id,
                'name' =>$request->name,
                'nid' => $request->nid,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'bloodGroup'=>$request->bloodGroup,
                'gender'=>$request->gender,
                'presentAddress'=>$request->presentAddress,
                'permanentAddress'=>$request->permanentAddress,
                'refferalId'=>$request->refferalId,
                'sponsorId'=>Auth::user()->name,
                'upLine'=>$allMember,
                'password' => Hash::make($request->password),
            ]);            

            $income=Income::distinct()->get('id');
            foreach($income as $incomes){
             $salesType=$incomes->id;       
             AccountInformation::insert([
                 'customerId' => $idok,  
                 'salesType'=>$salesType,                          
                 'created_at' => Carbon::now(),               
              ]);         
                AccountInformation::insert([
                    'customerId' => $idok,
                    'incomeType' => 2, 
                    'salesType'=>$salesType,                                
                    'created_at' => Carbon::now(),               
                  ]); 
                
                    
                } 
                DesignationUserCondition::insert([                   
                    'customerId'=>$idok,                                
                    'created_at' => Carbon::now(),
                  ]);        
            $downId=$idok;
            for($i=1; $i<=20; $i++){
                $upId=User::where('id',$downId)->get();
                foreach($upId as $take){ 
                  $geta= $take->joined_by;
                 }
               NewMemberEntry::insert([
                         'downLine' => $idok,                    
                          'upLine'=> $geta,
                          'level'=> $i,
                          'created_at' => Carbon::now(),
                          'updated_at' => Carbon::now(),
                      ]);   
                      $downId=$geta;
            }
            $allMenu=Menu::distinct()->get(['menuName','menuPosition','menuUrl']);
            $allUser=User::orderBy('id','desc')->where('type',2)->get(['id']);
            foreach($allUser as $all){             
                 $get=$all->id;
            }   
            foreach($allMenu as $full){           
                PermissionMenu::insert([
                    'menuName' => $full->menuName,
                    'menuPosition' => $full->menuPosition,
                    'menuUrl' => $full->menuUrl,
                    'memberId'=> $get,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);    
            } 
            $allUser=User::orderBy('id','desc')->where('type',2)->get(['id']);
            foreach($allUser as $all){             
                 $get=$all->id;
            } 
            $allSubMenu=PermissionSubMenu::distinct()->get(['menuId','subMenuName','subMenuPosition','subMenuUrl']);
            foreach($allSubMenu as $fullSubMenu){           
                PermissionSubMenu::insert([
                    'menuId' => $fullSubMenu->menuId,
                    'subMenuName' => $fullSubMenu->subMenuName,
                    'subMenuPosition' => $fullSubMenu->subMenuPosition,
                    'subMenuUrl' => $fullSubMenu->subMenuUrl,
                    'memberId'=> $get,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                  ]);   
            } 
            $count = User::orderBy('id','desc')->where('joined_by', Auth::user()->id)->count(); 
            $updateCount=User::where('id',Auth::user()->id)->update(
                ['memberCount'=>$count ]
            );  
            $update=User::where('id',$get)->update(
                ['type'=>3 ]
            );      
            $delete=PermissionMenu::where('memberId',0)->delete();
            $deleteSubMenu=PermissionSubMenu::where('memberId',0)->delete();
            $designationUser=User::where('joined_by',Auth::user()->id)->where('designation',1)->count();
            $shop=NewShopEntry::where('createdBy',Auth::user()->id)->count();
            $condition = DesignationCondition::where('designationId',2)->get();
            foreach($condition as $conditions){
               if($conditions->directSaleTarget==$shop&&$conditions->memberTarget==$designationUser){
                User::where('id',Auth::user()->id)->update(
                    ['designation' => 2]
                );  
               }
            }
            return response()->json('successfully added');
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
        $detail=User::where('id',$id)->first();
        return  ['detail' => $detail];
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
        $destroy=User::where('id',$id)->delete();
        return response()->json('successfully deleted');
    }

    public function sponsor(Request $request)
    {
        $sponsor = User::where('id', Auth::user()->id)->get();
        return  ['sponsor' => $sponsor];       

    }   
    public function searchMemberTree(Request $request)
    {
       $search=$request->get('q');
       $member= User::where('name',$search)->get();       
        foreach($member as $user)  {
            $backToTopp=$user->id;
        }
       return User::where('joined_by',$backToTopp)->get();
       
         
    }
    public function searchMember(Request $request)
    {
       $search=$request->get('q');
       return User::where('name',$search)->first();        
    }
}
