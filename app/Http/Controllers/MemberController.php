<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\MemberEntry;
use App\Designation;
use App\User;
use Illuminate\Http\Request;
use Image;
use App\Income;
use App\Menu;
use App\SubMenu;
use App\PermissionMenu;
use App\PermissionSubMenu;
use App\AccountInformation;
use App\FlashSale;
use App\DesignationUserCondition;
use Illuminate\Support\Facades\Hash;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = User::orderBy('id','desc')->whereNotIn('type', [1])->get();
        return  ['member' => $member];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = User::orderBy('id','desc')->whereNotIn('type', [1,2])->get();
        return  ['user' => $user];
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
//        'nid' => 'required | unique:users',
//        'mobile' => 'required | unique:users',
        'password' => 'required',
        ]);

        $allMember=User::orderBy('id','asc')->get(['id']);

        $idok=  User::insertGetId([
            'name' =>$request->name,
//            'nid' => $request->nid,
            'email' => $request->email,
//            'mobile' => $request->mobile,
//            'bloodGroup'=>$request->bloodGroup,
//            'gender'=>$request->gender,
//            'presentAddress'=>$request->presentAddress,
//            'permanentAddress'=>$request->permanentAddress,
//            'refferalId'=>$request->refferalId,
//            'sponsorId'=>$request->sponsorId,
//            'upLine'=>$allMember,
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
                FlashSale::insert([
                    'salesType'=>$salesType,
                    'created_at' => Carbon::now(),
                  ]);
                FlashSale::insert([
                    'incomeType' => 2,
                    'salesType'=>$salesType,
                    'created_at' => Carbon::now(),
                  ]);

                }
                DesignationUserCondition::insert([
                    'customerId'=>$idok,
                    'created_at' => Carbon::now(),

                  ]);
        $allSubMenu=SubMenu::distinct()->get(['menuId','subMenuName','subMenuPosition','subMenuUrl']);
        foreach($allSubMenu as $fullSubMenu){
            PermissionSubMenu::insert([
                'menuId' => $fullSubMenu->menuId,
                'subMenuName' => $fullSubMenu->subMenuName,
                'subMenuPosition' => $fullSubMenu->subMenuPosition,
                'subMenuUrl' => $fullSubMenu->subMenuUrl,
                'memberId'=> $idok,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ]);
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


        $update=User::where('id',$get)->update(
            ['type'=>3 ]
        );

        $delete=PermissionMenu::where('memberId',0)->delete();
        $deleteSubMenu=PermissionSubMenu::where('memberId',0)->delete();
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
        $edit=MemberEntry::where('memberId',$id)->first();
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
           if($strpos=strpos($request->image,';' ))
          {

                        $strpos=strpos($request->image,';' );
                        $sub=substr($request->image,0,$strpos);
                        $ex=explode('/',$sub)[1];
                        $name=time().".".$ex;
                        $img=Image::make($request->image)->resize(200,200);
                        $upload_path=public_path()."/images/";
                        $img->save($upload_path.$name);

                    MemberEntry::where('memberId',$id)->update([
                            'memberName' => $request->memberName,
                            'mobile' => $request->mobile,
                            'email' => $request->email,
                            'nid' => $request->nid,
                            'designationId' => $request->designationId,
                            'password' => $request->password,
                            'joiningDate' => $request->joiningDate,
                            'userName' => $request->userName,
                            'transectionPin' => $request->transectionPin,
                            'image' => $name,
                            'created_at' => Carbon::now(),
                        ]);
                    return response()->json('successfully updated');
           }
           else{
                    MemberEntry::where('memberId',$id)->update([
                        'memberName' => $request->memberName,
                        'mobileNo' => $request->mobileNo,
                        'email' => $request->email,
                        'nid' => $request->nid,
                        'designationId' => $request->designationId,
                        'password' => $request->password,
                        'joiningDate' => $request->joiningDate,
                        'userName' => $request->userName,
                        'transectionPin' => $request->transectionPin,
                        'created_at' => Carbon::now(),
                    ]);
                    return response()->json('successfully updated');
           }
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=MemberEntry::where('id',$id)->delete();
        $destroy=User::where('id',$id)->delete();
        return response()->json('successfully deleted');
    }
    public function search(Request $request)
    {
       $search=$request->get('q');
       return User::where('name',$search)->get();

    }

    public function searchRefferal(Request $request)
    {
       $searchRefferal=$request->get('q');
       return User::where('name',$searchRefferal)->get();

    }
}
