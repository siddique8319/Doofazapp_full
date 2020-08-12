<?php

namespace App\Http\Controllers;
use App\PermissionMenu;
use App\PermissionSubMenu;
use App\Menu;
use App\Offer;
use App\SoftwareEntry;
use App\Message;
use App\IncomeType;
use App\Income;
use App\Designation;
use App\AccountHistory;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $designation=Designation::get();
      $income= Income::with('IncomeRelation')->orderBy('id','desc')->get();  
      $incomeType= IncomeType::orderBy('incomeTypeId','desc')->get(); 
      $messageCount= Message::where('receiverId',Auth::user()->id)->where('status',0)->count();
      $show= Offer::orderBy('id','desc')->where('status',0)->get(); 
      $software= SoftwareEntry::orderBy('id','desc')->where('status',0)->get();  
      $input= PermissionMenu::where('memberId',Auth::user()->id)->orderBy('permissionMenuId','asc')->get();
      return view('index')->with('input',$input)->with('software',$software)->with('show',$show)->with('messageCount',$messageCount)->with('incomeType',$incomeType)->with('income',$income)
      ->with('designation',$designation);
    }
    public function viewHistory($incomeType,$salesType)
    {
     
       $accountInfo=AccountHistory::where('customerId',Auth::user()->id)
        ->where('incomeType',$incomeType)
        ->where('salesType',$salesType)
        ->get();
        $designation=Designation::get();
        $income= Income::with('IncomeRelation')->orderBy('id','desc')->get();  
        $incomeType= IncomeType::orderBy('incomeTypeId','desc')->get(); 
        $messageCount= Message::where('receiverId',Auth::user()->id)->where('status',0)->count();
        $show= Offer::orderBy('id','desc')->where('status',0)->get(); 
        $software= SoftwareEntry::orderBy('id','desc')->where('status',0)->get();  
        $input= PermissionMenu::where('memberId',Auth::user()->id)->orderBy('permissionMenuId','asc')->get();
        return view('history')->with('accountInfo',$accountInfo)->with('input',$input)->with('software',$software)->with('show',$show)->with('messageCount',$messageCount)->with('incomeType',$incomeType)->with('income',$income)
        ->with('designation',$designation);
    }
  
}
